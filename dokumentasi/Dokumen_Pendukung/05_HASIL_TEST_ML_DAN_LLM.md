## 1. Hasil Training Model

Dataset 5.000 sampel → 4.000 latih, 1.000 uji (stratified 80/20).

| Kelas | Precision | Recall | F1-Score | Sampel uji |
| --- | ---: | ---: | ---: | ---: |
| Sehat | 93,71% | 95,51% | 94,60% | 156 |
| Perlu perhatian | 92,26% | 92,86% | 92,56% | 308 |
| Berisiko | 97,74% | 96,83% | 97,28% | 536 |
| **Accuracy** | | | **95,40%** | 1.000 |

---

## 2. Evaluasi Standar: Confusion Matrix, Cross Validation & Confidence

Metodologi mengikuti praktik standar evaluasi klasifikasi:

- **Hold-out test set independen:** 3.000 data yang tidak pernah dipakai melatih model.
- **Stratified 10-fold cross validation:** setiap fold mempertahankan proporsi kelas.
- **Seed acak dikunci** (2026 untuk data uji, 42 untuk CV) agar hasil dapat direproduksi.
- **Pembanding baseline:** tebakan kelas mayoritas.
- **Metrik:** Precision, Recall, Specificity, F1 per kelas; macro & weighted average; Accuracy dengan interval kepercayaan 95% (Wilson); Balanced Accuracy; Cohen's Kappa; MCC.
- **Uji confidence:** ROC-AUC one-vs-rest, Log Loss, Brier Score, Expected Calibration Error (ECE), dan reliability table. Confidence diuji persis seperti yang ditampilkan aplikasi (setelah smoothing).

### 2.1 Confusion Matrix — Model Produksi (hold-out n = 3.000)

Distribusi kelas: Sehat 432, Perlu perhatian 905, Berisiko 1.663. Baseline kelas mayoritas: **55,43%**.

| Aktual \ Prediksi | Sehat | Perlu perhatian | Berisiko | Total |
| --- | ---: | ---: | ---: | ---: |
| **Sehat** | **412** (95,4%) | 20 (4,6%) | 0 (0,0%) | 432 |
| **Perlu perhatian** | 40 (4,4%) | **841** (92,9%) | 24 (2,7%) | 905 |
| **Berisiko** | 0 (0,0%) | 32 (1,9%) | **1.631** (98,1%) | 1.663 |

| Kelas | Precision | Recall | Specificity | F1-Score | Support |
| --- | ---: | ---: | ---: | ---: | ---: |
| Sehat | 91,15% | 95,37% | 98,44% | 93,21% | 432 |
| Perlu perhatian | 94,18% | 92,93% | 97,52% | 93,55% | 905 |
| Berisiko | 98,55% | 98,08% | 98,20% | 98,31% | 1.663 |
| **Macro avg** | 94,63% | 95,46% | | **95,02%** | 3.000 |
| **Weighted avg** | 96,17% | 96,13% | | 96,14% | 3.000 |

| Metrik keseluruhan | Nilai | Interpretasi |
| --- | --- | --- |
| Accuracy | **96,13%** (95% CI: 95,38% – 96,77%) | +40,7 poin di atas baseline |
| Balanced Accuracy | 95,46% | Tetap tinggi meski kelas tidak seimbang |
| Cohen's Kappa | 0,9336 | *Almost perfect agreement* (> 0,80, skala Landis & Koch) |
| MCC | 0,9337 | Korelasi prediksi–aktual sangat kuat (rentang −1 s.d. 1) |

**Analisis:**
- **Tidak ada satu pun** usaha *Berisiko* yang diprediksi *Sehat*, dan sebaliknya (0 kasus). Kesalahan hanya terjadi antar-kelas yang bersebelahan.
- Recall *Berisiko* 98,1%, yaitu kelas yang paling penting untuk peringatan dini.
- Kesalahan terbanyak adalah 40 kasus *Perlu perhatian* yang diprediksi *Sehat*. Kasus ini berada di sekitar ambang rasio pengeluaran 75% dan tren −10%.

### 2.2 Stratified 10-Fold Cross Validation (n = 5.000)

| Fold | Accuracy | Macro F1 | Kappa | MCC |
| :-: | ---: | ---: | ---: | ---: |
| 1 | 92,40% | 88,48% | 0,8731 | 0,8759 |
| 2 | 94,60% | 93,70% | 0,9089 | 0,9090 |
| 3 | 97,40% | 95,90% | 0,9561 | 0,9562 |
| 4 | 98,60% | 97,85% | 0,9763 | 0,9764 |
| 5 | 96,80% | 96,86% | 0,9460 | 0,9462 |
| 6 | 97,40% | 97,66% | 0,9561 | 0,9561 |
| 7 | 96,40% | 96,05% | 0,9391 | 0,9392 |
| 8 | 98,60% | 97,81% | 0,9763 | 0,9765 |
| 9 | 97,40% | 96,15% | 0,9564 | 0,9569 |
| 10 | 97,80% | 97,67% | 0,9628 | 0,9628 |
| **Mean ± Std** | **96,74% ± 1,91%** | **95,81% ± 2,88%** | **0,945 ± 0,032** | **0,946 ± 0,031** |

- Akurasi data latih rata-rata 97,59% dan data uji 96,74%, jadi **gap overfitting hanya 0,85%**.
- Confusion matrix gabungan out-of-fold:

| Aktual \ Prediksi | Sehat | Perlu perhatian | Berisiko |
| --- | ---: | ---: | ---: |
| **Sehat** | **701** | 33 | 1 |
| **Perlu perhatian** | 61 | **1.506** | 33 |
| **Berisiko** | 0 | 35 | **2.630** |

  Accuracy gabungan 96,74% (95% CI: 96,21% – 97,20%), Macro F1 95,75%.
- Hasil CV konsisten dengan hold-out (96,13%), sehingga model **tidak bergantung pada satu pembagian data tertentu**.

### 2.3 Uji Confidence Score

| Metrik | Model produksi (n = 3.000) | CV out-of-fold (n = 5.000) | Patokan |
| --- | ---: | ---: | --- |
| ROC-AUC Sehat | 0,9880 | 0,9891 | > 0,90 = sangat baik |
| ROC-AUC Perlu perhatian | 0,9728 | 0,9877 | |
| ROC-AUC Berisiko | 0,9889 | 0,9956 | |
| **ROC-AUC macro** | **0,9832** | **0,9908** | |
| **ECE (10 bin)** | **0,0101** | **0,0064** | ≤ 0,05 terkalibrasi baik ✅ |
| Log loss | 0,1540 | 0,1036 | makin kecil makin baik |
| Brier score (multikelas) | 0,0664 | 0,0478 | 0 = sempurna |
| Rata-rata confidence | 96,55% | 96,36% | ≈ akurasi (96,13% / 96,74%) ✅ |
| Confidence saat benar / salah | 97,05% / 84,17% | 97,13% / 73,42% | benar > salah ✅ |
| Prediksi dengan confidence 100% | 0% | 0% | |

**Reliability table (model produksi):**

| Rentang confidence | Jumlah | Rata-rata confidence | Akurasi aktual | Selisih |
| --- | ---: | ---: | ---: | ---: |
| 0,4 – 0,5 | 19 | 49,67% | 52,63% | −2,96% |
| 0,5 – 0,6 | 14 | 59,47% | 57,14% | +2,32% |
| 0,6 – 0,7 | 36 | 66,74% | 69,44% | −2,71% |
| 0,7 – 0,8 | 87 | 72,98% | 74,71% | −1,73% |
| 0,8 – 0,9 | 92 | 87,02% | 93,48% | −6,46% |
| 0,9 – 1,0 | 2.752 | 98,51% | 97,75% | +0,77% |

**Interpretasi:**
- Confidence sekarang **sesuai dengan kenyataan**. Contohnya, prediksi dengan confidence ±73% memang benar ±75% dari waktu, dan rata-rata confidence (96,6%) hampir sama dengan akurasi (96,1%). Pada v1.0.0 angkanya selalu 100% padahal akurasinya ±95%.
- Selisih di setiap rentang ≤ 6,5%. Selisih terbesar ada pada rentang dengan sampel sedikit.
- Karena itu, angka confidence di aplikasi kini dapat dibaca sebagai **perkiraan peluang prediksi benar**.

---

## 3. Uji Langsung Fitur Prediksi (3 Skenario UMKM)

Memanggil `FinancialDecisionTreeService::predict()` seperti saat pengguna menjalankan analisis.

| Skenario | Input utama | Harapan | Prediksi | Confidence | Status |
| --- | --- | --- | --- | ---: | :-: |
| 1. Usaha sehat | Pemasukan 25 jt, pengeluaran 15 jt, rasio 60%, omzet +12% | Sehat | **Sehat** | 96,33% | ✅ LULUS |
| 2. Margin tipis | Pemasukan 20 jt, pengeluaran 17 jt, rasio 85%, omzet −5% | Perlu perhatian | **Perlu perhatian** | 98,67% | ✅ LULUS |
| 3. Defisit | Pemasukan 12 jt, pengeluaran 15 jt, rasio 125%, omzet −30% | Berisiko | **Berisiko** | 98,67% | ✅ LULUS |

Distribusi probabilitas skenario 1: Sehat 96,3%, Perlu perhatian 3,0%, Berisiko 0,7%.

Faktor kunci skenario 3 yang dihasilkan sistem:
- Arus kas operasional negatif (defisit Rp 3.000.000)
- Rasio pengeluaran tinggi (125%), menyerap hampir seluruh atau melebihi pemasukan
- Penurunan omzet pemasukan sebesar 30% dibanding periode sebelumnya
- Penurunan arus kas bersih sebesar 50%

Pada data uji 1.000 sampel di script ini: akurasi **96,40%**, waktu inferensi 0,007 ms per sampel.

---

## 4. Uji Langsung Fitur Penjelasan AI (LLM) via API Asli

Memanggil `GroqExplanationService::explain()` dengan token di `.env`, untuk ketiga skenario di atas.

### 4.1 Model `openai/gpt-oss-20b` (model yang dikonfigurasi aplikasi)

| Kriteria uji | Skenario 1 | Skenario 2 | Skenario 3 |
| --- | :-: | :-: | :-: |
| API merespons (status `success`, bukan fallback) | ✅ | ✅ | ✅ |
| Output JSON berisi `explanation` | ✅ | ✅ | ✅ |
| Rekomendasi ≥ 3 poin | ✅ | ✅ | ✅ |
| Tidak mengubah label Decision Tree | ✅ | ✅ | ✅ |
| Angka arus kas sama dengan data sumber | ✅ | ✅ | ⚠️ * |
| Waktu respons | 1,03 s | 0,99 s | 1,13 s |

\* Pada skenario 3 angka tetap benar, tetapi LLM menuliskannya `Rp 3 000 000` (pemisah spasi), bukan `Rp 3.000.000`. Akibatnya pencocokan teks otomatis gagal. Ini masalah format penulisan, bukan halusinasi angka.

**Contoh output LLM (Skenario 2):**

> Model Decision Tree menilai Warung Kopi Sejahtera perlu perhatian karena meskipun arus kas operasional bersih positif sebesar Rp 3.000.000, rasio pengeluaran masih tinggi (85%) dan cadangan kas terbatas. Selain itu, tren pemasukan menurun 5 %, …
>
> Rekomendasi: (1) Tingkatkan cadangan kas dengan menabung sebagian arus kas bersih setiap bulan … (2) Evaluasi kembali struktur biaya … (3) Kembangkan strategi pertumbuhan pendapatan …

Output lengkap ada di `hasil_test_live_fitur.txt`.

**Catatan:**
- Teks LLM dapat berbeda di setiap pemanggilan.
- Pada pengujian sebelumnya, satu rekomendasi pernah terpecah menjadi dua poin dan muncul satu poin kosong. Penyebab pastinya belum diperiksa dari respons mentah API.
- Perbaikan yang disarankan: buang elemen kosong dari `recommendations` sebelum disimpan.
- Kode belum memiliki validasi otomatis bahwa angka di teks LLM sama dengan data sumber.

### 4.2 Model Llama `llama-3.3-70b-versatile`

| Kriteria | Hasil |
| --- | --- |
| Respons API | ❌ HTTP 404 `model_not_found` |
| Perilaku aplikasi | ✅ Otomatis beralih ke penjelasan rule-based (`status = fallback`), tetap 3 rekomendasi, label tidak berubah |

Model chat Llama tidak lagi tersedia untuk token Groq ini (lihat `04_TOKEN_API_LLAMA_AI.md`).

### 4.3 Uji Ketahanan: Token Tidak Valid

| Kondisi | Respons API | Status sistem | Hasil |
| --- | --- | --- | :-: |
| `GROQ_API_KEY` diganti token palsu | HTTP 401 | `fallback`, penjelasan + 3 rekomendasi tetap tampil | ✅ LULUS |

---

## 5. Uji Otomatis (PHPUnit)

```
OK (60 tests, 18671 assertions)
```

| Kelompok uji | Jumlah | Hasil | Yang diuji |
| --- | :-: | :-: | --- |
| Decision Tree Evaluation (ML) | 8 | ✅ | Lihat tabel 6.1 |
| Feature Extraction (ML) | 10 | ✅ | Kunci fitur lengkap, total pemasukan, arus kas, rasio pengeluaran, penalti income = 0, dataset 6 fitur & 3 kelas |
| Financial Analysis (ML + LLM) | 8 | ✅ | Label valid, confidence 0–1, key_factors array, relasi penjelasan, analisis tetap ada saat LLM fallback |
| Groq Explanation Service (LLM) | 4 | ✅ | Fallback jika key kosong, parsing respons sukses, fallback jika API error, routing default ke Groq |
| Authentication | 7 | ✅ | Login, logout, proteksi panel admin |
| Data Isolation / Tenant | 9 | ✅ | Data antar-UMKM tidak bocor, super admin dapat berpindah tenant |
| Transaction | 8 | ✅ | CRUD transaksi, total per periode |
| Dashboard & Laporan Cetak | 4 | ✅ | Widget, filter periode, total laporan konsisten |
| Contoh bawaan | 2 | ✅ | — |

### 5.1 Uji Standar Model (`tests/Unit/DecisionTreeEvaluationTest.php`)

| Tes | Kriteria lulus |
| --- | --- |
| Confusion matrix valid | Matriks 3×3, total = jumlah sampel, total baris = jumlah label aktual |
| Akurasi model produksi | ≥ 85% dan ≥ baseline + 20 poin |
| Metrik per kelas | Precision, Recall, F1 tiap kelas ≥ 75%; Recall Berisiko ≥ 90%; Macro F1 ≥ 85% |
| Distribusi probabilitas | Tiap probabilitas 0–1, total = 1, kelas prediksi = probabilitas tertinggi |
| Confidence bermakna | Rata-rata confidence prediksi benar > prediksi salah |
| **Kalibrasi confidence** | Confidence < 100%, smoothing tidak mengubah prediksi, **ECE ≤ 0,05** |
| Confidence di service | `confidence` = probabilitas kelas terprediksi, dalam rentang 0–1 |
| Stratified 5-fold CV | Mean accuracy ≥ 85%, std ≤ 6%, fold terburuk ≥ 80% |

---

## 6. Kesimpulan

1. **Decision Tree v1.1.0** mencapai akurasi **96,13%** (95% CI 95,38–96,77%) pada hold-out 3.000 data, dan **96,74% ± 1,91%** pada stratified 10-fold CV.
   - Macro F1 95,0%, Kappa 0,93, MCC 0,93, ROC-AUC macro 0,98.
   - Recall kelas *Berisiko* 98,1%, dan tidak ada kesalahan *Berisiko ↔ Sehat*.
   - Overfitting sangat kecil (gap 0,85%).
2. **Confidence score terkalibrasi baik**: ECE 0,010 (sebelumnya 0,058) dan log loss 0,15 (sebelumnya 1,46). Tidak ada lagi prediksi dengan confidence 100%, dan rata-rata confidence setara dengan akurasi aktual.
3. **LLM via Groq (`openai/gpt-oss-20b`)** berhasil menjelaskan hasil model dalam ±1 detik, mematuhi format JSON, dan tidak mengubah label model.
4. **Llama (`llama-3.3-70b-versatile`)** sudah tidak tersedia di akun Groq. Mekanisme fallback terbukti bekerja, sehingga aplikasi tetap berjalan.
5. Seluruh **60 uji otomatis lulus**.
