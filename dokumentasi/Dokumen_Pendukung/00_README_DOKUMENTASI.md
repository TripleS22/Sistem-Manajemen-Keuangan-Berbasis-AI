# Dokumentasi — Sistem Manajemen Keuangan UMKM Berbasis AI

| No | File | Isi |
| :-: | --- | --- |
| 1 | `../01_SOURCE_CODE_LENGKAP.md` (di luar folder ini) | Seluruh source code aplikasi (104 file: app, routes, config, migrations, seeders, factories, views, tests) |
| 2 | `02_database_simkeuangan_mysql.sql` | Struktur + data database untuk MySQL/MariaDB (siap import) |
| 3 | `03_ALGORITMA_DECISION_TREE.md` | Algoritma, rumus Gini, pseudocode, struktur pohon hasil training, feature importance |
| 4 | `04_TOKEN_API_LLAMA_AI.md` | Lokasi & konfigurasi token Groq, status ketersediaan model Llama, format request API |
| 5 | `05_HASIL_TEST_ML_DAN_LLM.md` | Hasil uji model ML & LLM (akurasi, confusion matrix, uji API langsung, PHPUnit) |
| — | `test_live_fitur.php` | Script uji langsung fitur ML + LLM yang dapat dijalankan ulang |
| — | `evaluasi_standar_model.php` | Evaluasi standar: confusion matrix, 10-fold CV, Kappa, MCC, ROC-AUC, kalibrasi confidence |
| — | `hasil_test_live_fitur.txt`, `hasil_training_model.txt`, `hasil_evaluasi_standar_model.txt` | Output mentah pengujian |

## Import Database MySQL

```bash
mysql -u root -p < dokumentasi/Dokumen_Pendukung/02_database_simkeuangan_mysql.sql
```

Lalu atur `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simkeuangan
DB_USERNAME=root
DB_PASSWORD=
```

Akun demo dari seeder: `superadmin@umkm.com` (admin) dan `admin@umkm.com` (owner), kata sandi `password`.

## Menjalankan Pengujian Ulang

```bash
php artisan test --testdox
php artisan ml:train-decision-tree --samples=1500
php dokumentasi/Dokumen_Pendukung/test_live_fitur.php
```
