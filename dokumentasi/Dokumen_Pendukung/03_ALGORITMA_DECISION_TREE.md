# 03 — Algoritma Model Decision Tree

Model klasifikasi kesehatan keuangan UMKM pada aplikasi ini memakai **Decision Tree (CART — Classification and Regression Tree)** dari pustaka **Rubix ML** (PHP murni, tanpa Python).

| Item | Nilai |
| --- | --- |
| Kelas algoritma | `Rubix\ML\Classifiers\ClassificationTree` |
| Kriteria pemisahan | Gini Impurity |
| Versi model | **1.1.0 (Decision Tree)** |
| Hyperparameter | `maxHeight = 10`, `maxLeafSize = 5`, `minPurityIncrease = 0.0001` (dipilih lewat stratified 5-fold CV) |
| Kalibrasi confidence | Additive smoothing ε = 0,02 (lihat bagian 6) |
| Jumlah fitur | 6 (numerik kontinu) |
| Kelas output | `Sehat`, `Perlu perhatian`, `Berisiko` |
| Data latih | 5.000 sampel sintetis UMKM, stratified split 80% latih / 20% uji |
| File model | `storage/app/ml/decision_tree.model` (serialisasi `Native`) |
| Kode | `app/Services/ML/FinancialDecisionTreeService.php`, `app/Services/ML/DatasetGenerator.php`, `app/Console/Commands/TrainDecisionTreeCommand.php` |

---

## 1. Alur Kerja Keseluruhan

```
 Transaksi (MySQL)                                     Groq LLM
       │                                                  ▲
       ▼                                                  │ fitur + label + faktor
 [1] Ekstraksi 6 fitur ──► [2] Decision Tree.predict() ──►[3] Penjelasan & rekomendasi
       (periode ini vs        label + probabilitas          (jika API gagal → fallback
        periode sebelumnya)   + faktor kunci                  rule-based)
                                                              │
                                                              ▼
                                    [4] Simpan ke financial_analyses + analysis_explanations
```

Dijalankan saat pengguna menekan **Jalankan Analisis Keuangan AI** (`CreateFinancialAnalysis::handleRecordCreation`).

---

## 2. Fitur Masukan (Feature Engineering)

Diambil oleh `extractFeatures($userId, $periodStart, $periodEnd)`. Periode pembanding = periode dengan durasi yang sama tepat sebelum periode aktif.

| No | Fitur | Rumus | Penanganan kasus khusus |
| :-: | --- | --- | --- |
| 1 | `total_income` | Σ amount (type = income) | — |
| 2 | `total_expense` | Σ amount (type = expense) | — |
| 3 | `net_cash_flow` | income − expense | — |
| 4 | `expense_ratio` | expense ÷ income | income = 0 dan ada pengeluaran → **1,5** (penalti); keduanya 0 → 0 |
| 5 | `income_trend` | (income − income_lalu) ÷ income_lalu | income_lalu = 0 → 0,20 jika ada pemasukan, selain itu 0 |
| 6 | `cash_flow_trend` | (net − net_lalu) ÷ \|net_lalu\| | net_lalu = 0 → +0,20 / −0,20 / 0 sesuai tanda net |

---

## 3. Pembentukan Dataset & Label (Ground Truth)

`DatasetGenerator::generate(n)` membuat sampel UMKM sintetis:

- Pemasukan acak Rp 3.000.000 – Rp 150.000.000
- Rasio pengeluaran 0,30 – 1,40 ditambah noise ±0,05 (dibatasi 0,20 – 1,60)
- Tren pemasukan −50% s.d. +50%, tren arus kas −60% s.d. +60%

Label diberikan dengan aturan keuangan berikut (`determineLabel`):

```
JIKA net_cash_flow < 0  ATAU  expense_ratio ≥ 0,95  ATAU  cash_flow_trend ≤ −0,35
      → "Berisiko"
JIKA net_cash_flow > 0  DAN  expense_ratio ≤ 0,75  DAN  income_trend ≥ −0,10  DAN  cash_flow_trend ≥ −0,10
      → "Sehat"
SELAIN ITU
      → "Perlu perhatian"
```

Decision Tree kemudian **belajar sendiri** ambang batas ini dari data (bukan di-hardcode di model).

---

## 4. Cara Kerja Algoritma CART

### 4.1 Gini Impurity

Untuk sebuah node berisi sampel dengan proporsi kelas *pᵢ*:

$$Gini = 1 - \sum_{i=1}^{k} p_i^2$$

- Gini = 0 → node murni (semua satu kelas)
- Gini maksimum untuk 3 kelas = 0,667

### 4.2 Pemilihan Split Terbaik

Untuk setiap fitur *f* dan setiap kandidat ambang *t*, data dibagi ke kiri (*f < t*) dan kanan (*f ≥ t*). Dipilih split dengan impurity berbobot terkecil:

$$Gini_{split} = \frac{n_{kiri}}{n} Gini_{kiri} + \frac{n_{kanan}}{n} Gini_{kanan}$$

Split hanya dilakukan bila penurunan impurity ≥ `minPurityIncrease` (0,0001).

### 4.3 Pseudocode Pelatihan

```
FUNCTION BuildTree(D, depth):
    IF depth = maxHeight(10) OR |D| ≤ maxLeafSize(5) OR Gini(D) = 0:
        RETURN Leaf(kelas mayoritas D, probabilitas tiap kelas)

    (f*, t*) ← argmin  Gini_split(D, f, t)   untuk semua fitur f dan ambang t
    IF Gini(D) − Gini_split(D, f*, t*) < minPurityIncrease:
        RETURN Leaf(kelas mayoritas D)

    D_kiri  ← { x ∈ D | x[f*] <  t* }
    D_kanan ← { x ∈ D | x[f*] ≥ t* }
    RETURN Node(f*, t*, BuildTree(D_kiri, depth+1), BuildTree(D_kanan, depth+1))
```

### 4.4 Pseudocode Prediksi

```
FUNCTION Predict(node, x):
    WHILE node bukan Leaf:
        node ← (x[node.fitur] < node.ambang) ? node.kiri : node.kanan
    p ← node.probabilitas
    p' ← (1 − ε) · p + ε / K                 ← smoothing (ε = 0,02, K = 3 kelas)
    RETURN argmax p', p'                      ← confidence = p' kelas terpilih
```

---

## 5. Struktur Pohon Hasil Pelatihan (model tersimpan v1.1.0)

Diekstrak langsung dari `storage/app/ml/decision_tree.model` (tinggi pohon = 11, data latih = 4.000 sampel). Tiga level teratas:

```
[cash_flow_trend < -0.3231]                    (n=4000, gini=0.5115)
├─ ya:
│   [cash_flow_trend < -0.3545]                (n=909,  gini=0.0469)
│   ├─ ya:  => Berisiko (n=818)
│   └─ tidak:
│       [total_expense < 65.620.360]           (n=91,   gini=0.3551)
│       ├─ ya:   [net_cash_flow < 1.377.103] …
│       └─ tidak:[cash_flow_trend < -0.35] …
└─ tidak:
    [income_trend < -0.1154]                   (n=3091, gini=0.5897)
    ├─ ya:
    │   [total_income < 16.715.818]            (n=1157, gini=0.4801)
    │   ├─ ya:   [expense_ratio < 0.905] …
    │   └─ tidak:[net_cash_flow < 588.136] …
    └─ tidak:
        [total_income < 39.653.000]            (n=1934, gini=0.6535)
        ├─ ya:   [total_expense < 27.366.804] …
        └─ tidak:[total_expense < 92.988.940] …
```

Interpretasi:
- Pemisahan pertama memakai **tren arus kas ≈ −32% s.d. −35%**, sangat dekat dengan ambang −35% pada aturan label *Berisiko*. Cabang ini langsung memisahkan 818 sampel Berisiko.
- Pemisahan berikutnya memakai **tren pemasukan ≈ −11,5%**, dekat ambang −10% pada aturan label *Sehat*.
- Pada level bawah, pohon memakai kombinasi `total_income` dan `total_expense` (secara tidak langsung, rasio dan arus kas). Model berhasil mempelajari kembali logika keuangan yang mendasari data.

### Kontribusi Fitur (feature importance, dinormalisasi)

| Fitur | Kontribusi |
| --- | ---: |
| total_income | 32,1% |
| cash_flow_trend | 19,7% |
| net_cash_flow | 15,2% |
| total_expense | 14,6% |
| expense_ratio | 14,6% |
| income_trend | 3,9% |

Catatan:
- Rubix ML mengembalikan nilai importance yang totalnya > 100%, jadi nilai di atas dinormalisasi agar total = 100%.
- `total_income` tinggi karena pohon memakainya berulang kali di level bawah untuk membentuk ambang rasio/arus kas.
- Feature importance pada pohon tunggal dapat berubah antar-pelatihan.

---

## 6. Kalibrasi Confidence (Probability Smoothing)

**Masalah pada versi 1.0.0** (`maxLeafSize = 3`, 1.500 data): sebagian besar daun pohon hanya berisi satu kelas, sehingga **87% prediksi bernilai confidence 100%**, padahal akurasi sebenarnya ≈ 95%. Model menjadi *overconfident* (ECE 0,058, log loss 1,46).

**Perbaikan pada versi 1.1.0:**

1. **Data latih 1.500 → 5.000 sampel**: pohon lebih stabil dan akurat.
2. **`maxLeafSize` 3 → 5**: setiap daun minimal mewakili lebih banyak sampel.
3. **Additive smoothing** pada probabilitas daun (`smoothProbabilities()`):

$$p'_k = (1-\varepsilon)\,p_k + \frac{\varepsilon}{K}, \quad \varepsilon = 0{,}02,\; K = 3$$

   - Confidence maksimum menjadi 98,67%, bukan 100%. Kelas lain mendapat peluang minimum 0,67%.
   - **Urutan probabilitas tidak berubah, jadi hasil prediksi identik.** Yang berubah hanya angka confidence.
   - Nilai ε dan `maxLeafSize` dipilih lewat stratified 5-fold cross validation dengan meminimalkan log loss. Data uji tidak dipakai untuk pemilihan ini, sehingga evaluasi tetap jujur.

Hasil (detail di `05_HASIL_TEST_ML_DAN_LLM.md`): ECE 0,058 → **0,010**, log loss 1,46 → **0,15**, prediksi dengan confidence 100%: 87% → **0%**.

---

## 7. Faktor Kunci (Explainability)

Setelah prediksi, `determineKeyFactors()` menyusun alasan yang dapat dibaca manusia dan dikirim ke LLM:

| Kondisi | Faktor yang ditampilkan |
| --- | --- |
| net_cash_flow < 0 / ≥ 0 | Arus kas negatif (defisit) / positif (surplus) |
| expense_ratio ≥ 0,90 | Rasio pengeluaran tinggi |
| expense_ratio ≤ 0,70 | Rasio pengeluaran efisien |
| 0,70 < expense_ratio < 0,90 | Rasio pengeluaran moderat |
| income_trend < −0,15 / > 0,15 | Penurunan / pertumbuhan omzet |
| cash_flow_trend < −0,25 | Penurunan arus kas bersih |

---

## 8. Melatih Ulang Model

```bash
php artisan ml:train-decision-tree
```

- Default perintah ini memakai 5.000 sampel. Opsi `--samples=N` dapat dipakai untuk mengubahnya.
- Perintah ini membuat dataset baru, melatih model, mengevaluasinya pada 20% data uji (stratified), lalu menimpa `storage/app/ml/decision_tree.model`.
- Jika file model tidak ada, model otomatis dilatih saat prediksi pertama.
- Model versi 1.0.0 disimpan sebagai cadangan di `storage/app/ml/decision_tree.v1.0.0.model.bak`.
