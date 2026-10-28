PRD — Sistem Manajemen Keuangan UMKM Berbasis Machine Learning
UMKM Finance Intelligence
Product Requirements Document · MVP Version 1.0
Laravel
Filament
Decision Tree ML
LLM API Gratis

Sistem pencatatan keuangan UMKM yang membantu pemilik usaha mencatat transaksi, memantau kondisi keuangan, dan memperoleh rekomendasi berdasarkan pola keuangan serta penjelasan AI.

1. Latar belakang
UMKM sering kali mencatat pemasukan dan pengeluaran secara manual tanpa mengetahui kondisi keuangan usahanya secara menyeluruh. Akibatnya, pemilik usaha kesulitan menilai kesehatan keuangan, mendeteksi pengeluaran berlebihan, serta menentukan langkah yang tepat untuk menjaga arus kas.

Sistem ini dirancang untuk menyediakan pencatatan keuangan sederhana yang dipadukan dengan machine learning untuk mengklasifikasikan kondisi keuangan dan LLM untuk menjelaskan hasil analisis menggunakan bahasa yang mudah dipahami.
2. Tujuan produk
- Mempermudah pencatatan pemasukan dan pengeluaran.
- Menampilkan ringkasan kondisi keuangan usaha.
- Mengklasifikasikan kondisi keuangan menggunakan algoritma Decision Tree.
- Memberikan penjelasan dan rekomendasi yang mudah dipahami melalui LLM.
- Menyediakan laporan yang dapat dicetak atau diekspor.
Prinsip utama: pencatatan keuangan tetap menjadi fungsi inti. Machine learning digunakan untuk analisis, sedangkan LLM membantu menjelaskan hasilnya, bukan menentukan angka keuangan.
3. Target pengguna
- Pemilik UMKM yang ingin mengelola keuangan secara mandiri.
- Pelaku usaha mikro yang belum menggunakan software akuntansi kompleks.
- Pengguna yang membutuhkan ringkasan dan rekomendasi keuangan sederhana.
MVP difokuskan untuk satu pemilik usaha dengan satu profil UMKM per akun. Fitur multi-cabang, banyak karyawan, dan persetujuan transaksi belum menjadi prioritas.
4. Ruang lingkup fitur MVP
Dari 11 fitur pada sistem sebelumnya, saya sarankan cukup 6 menu utama, ditambah autentikasi. Fitur kategori, ekspor, dan pengaturan sederhana dapat digabungkan agar aplikasi tidak terlalu ramai.

1. Dashboard

Ringkasan kondisi keuangan usaha.
- Total pemasukan dan pengeluaran.
- Saldo bersih periode berjalan.
- Grafik arus kas.
- Transaksi terbaru.
- Ringkasan status keuangan dari Decision Tree.




2. Transaksi

Pencatatan pemasukan dan pengeluaran.
- Tambah, edit, hapus, dan lihat transaksi.
- Jenis transaksi: pemasukan atau pengeluaran.
- Nominal, tanggal, kategori, dan keterangan.
- Filter berdasarkan tanggal dan jenis transaksi.
- Validasi nominal dan kepemilikan data pengguna.




3. Profil UMKM

Identitas usaha dan parameter dasar analisis.
- Nama usaha.
- Jenis atau bidang usaha.
- Deskripsi singkat.
- Modal awal opsional.
- Informasi usaha yang digunakan sebagai konteks analisis.




4. Laporan Keuangan

Rekapitulasi keuangan berdasarkan transaksi.
- Total pemasukan dan pengeluaran.
- Saldo bersih selama periode.
- Rekap berdasarkan kategori.
- Laporan harian, bulanan, dan tahunan.
- Cetak PDF dan ekspor CSV.




5. Analisis Keuangan AI

Fitur pembeda utama aplikasi.
- Klasifikasi kondisi keuangan menggunakan Decision Tree.
- Indikator arus kas dan rasio pengeluaran.
- Faktor utama yang memengaruhi hasil klasifikasi.
- Penjelasan hasil analisis menggunakan LLM.
- Rekomendasi tindakan berdasarkan data keuangan.
- Riwayat analisis sebelumnya.




6. Pengaturan

Pengaturan dasar akun dan aplikasi.
- Ubah nama dan informasi akun.
- Ubah kata sandi.
- Kelola kategori transaksi.
- Logout.



Fitur Login dan Daftar Baru tetap tersedia, tetapi bukan menu di dalam dashboard. Dengan demikian, navigasi utama hanya memiliki enam menu.
5. Rancangan sistem Machine Learning
5.1 Algoritma Decision Tree
Decision Tree digunakan untuk mengklasifikasikan kondisi keuangan UMKM berdasarkan fitur yang diperoleh dari transaksi.

Input model yang direkomendasikan:
Fitur	Deskripsi
total_income	Total pemasukan dalam periode
total_expense	Total pengeluaran dalam periode
net_cash_flow	Pemasukan dikurangi pengeluaran
expense_ratio	Rasio pengeluaran terhadap pemasukan
income_trend	Perubahan pemasukan dibanding periode sebelumnya
cash_flow_trend	Perubahan arus kas dibanding periode sebelumnya

Output model:
- Sehat: indikator keuangan memenuhi kriteria sehat.
- Perlu perhatian: terdapat indikator yang perlu dievaluasi.
- Berisiko: terdapat indikator keuangan yang menunjukkan risiko.
Label tersebut merupakan kategori analisis, bukan diagnosis keuangan atau prediksi kebangkrutan yang pasti.
5.2 Alur machine learning
Data transaksi UMKM

Pemasukan, pengeluaran, tanggal, kategori

Feature Engineering

Menghitung rasio, saldo bersih, dan tren

Decision Tree Classifier

Memproses fitur dan menghasilkan klasifikasi

Hasil analisis terstruktur

Label, probabilitas model, dan faktor penentu

Penjelasan oleh LLM

Interpretasi dan rekomendasi berdasarkan data


Catatan penting untuk implementasi: model Decision Tree harus dilatih menggunakan dataset yang memiliki label yang dapat dipertanggungjawabkan. Jika belum ada dataset UMKM berlabel, buat dataset awal yang disetujui ahli atau gunakan aturan yang transparan untuk menghasilkan label sementara, kemudian evaluasi model dengan data terpisah. Jangan mengklaim akurasi tinggi hanya karena model berhasil berjalan.

Untuk pengembangan awal, model dapat dibuat menggunakan Python dan scikit-learn, kemudian diekspos melalui REST API yang dipanggil Laravel.
6. Integrasi LLM API gratis
LLM digunakan untuk mengubah hasil model menjadi penjelasan yang mudah dimengerti pemilik usaha. LLM tidak bertugas menghitung ulang transaksi atau menggantikan keputusan Decision Tree.

Contoh hasil yang ditampilkan:
Contoh analisis keuangan

Simulasi

Periode: September 2026
Pemasukan
Rp8.000.000


Pengeluaran
Rp6.800.000



Arus kas bersih

Rp1.200.000


Penjelasan AI

Usaha mencatat arus kas bersih positif sebesar Rp1.200.000 pada periode ini. Namun, pengeluaran setara dengan 85% dari pemasukan sehingga ruang keuangan yang tersisa relatif terbatas.

Rekomendasi
- Evaluasi kategori pengeluaran terbesar untuk mencari peluang penghematan.
- Pantau perubahan pemasukan dan pengeluaran selama beberapa bulan.
- Siapkan cadangan kas untuk kebutuhan operasional mendatang.
Ilustrasi keluaran LLM, bukan hasil model yang benar-benar dijalankan.

Ketentuan integrasi
- Menggunakan penyedia LLM yang menawarkan free tier atau kuota gratis saat implementasi.
- API key disimpan di .env, bukan di frontend atau repository.
- Laravel mengirimkan ringkasan data dan hasil Decision Tree ke LLM.
- Prompt membatasi model agar tidak mengarang angka, transaksi, atau fakta.
- Jika API tidak tersedia atau kuota habis, hasil klasifikasi Decision Tree tetap dapat dilihat.
- Pengguna diberi tahu bahwa penjelasan dihasilkan AI.
Kuota gratis dan ketentuan layanan penyedia dapat berubah. Karena itu, penyedia LLM dibuat dapat diganti melalui konfigurasi, bukan ditanam permanen ke dalam logika aplikasi.
7. Kebutuhan teknis
Komponen	Rekomendasi
Backend	Laravel
Admin panel dan UI	Filament
Database	MySQL atau MariaDB
Autentikasi	Laravel + autentikasi Filament
Machine learning	Python, pandas, scikit-learn
API model	FastAPI atau REST API sejenis
LLM	Penyedia API dengan free tier
Grafik	Chart.js atau grafik bawaan Filament
Laporan	PDF dan CSV
Testing	PHPUnit/Pest dan pengujian model Python

Filament digunakan untuk membangun dashboard, tabel, formulir, filter, dan halaman pengelolaan dengan lebih cepat. Tampilan utama tidak perlu dibangun ulang menggunakan framework frontend terpisah.
8. Rancangan database awal
users

Akun pengguna, email, kata sandi, dan role.


business_profiles

Identitas dan informasi usaha; terhubung ke pengguna.


transaction_categories

Nama kategori, tipe pemasukan/pengeluaran, dan kepemilikan.


transactions

Tanggal, tipe, kategori, nominal, deskripsi, dan user ID.


financial_analyses

Periode analisis, fitur model, label prediksi, versi model, dan waktu analisis.


analysis_explanations

Penjelasan LLM, rekomendasi, status permintaan, dan identitas penyedia.


Seluruh transaksi dan hasil analisis harus dibatasi berdasarkan pemilik akun. Data milik satu UMKM tidak boleh dapat diakses atau diekspor oleh pengguna lain.
9. Kebutuhan fungsional dan kriteria penerimaan
ID	Kebutuhan	Kriteria penerimaan
FR-01	Autentikasi	Pengguna dapat mendaftar, login, logout, dan mengubah kata sandi.
FR-02	Transaksi	Pengguna dapat menambah, mengubah, menghapus, dan memfilter transaksi.
FR-03	Dashboard	Ringkasan sesuai dengan hasil perhitungan transaksi dalam periode terpilih.
FR-04	Laporan	Laporan dapat difilter dan diekspor dengan total yang konsisten.
FR-05	Decision Tree	Sistem menghasilkan klasifikasi dari fitur keuangan yang valid.
FR-06	Penjelasan LLM	Hasil model dapat dijelaskan melalui API tanpa mengubah data sumber.
FR-07	Ketahanan layanan	Jika API LLM gagal, pencatatan dan klasifikasi tetap berfungsi.
FR-08	Keamanan	Pengguna tidak dapat mengakses transaksi atau analisis milik pengguna lain.

10. Fitur yang belum dikerjakan
Agar pengembangan tidak melebar, fitur berikut tidak termasuk MVP:
- Integrasi rekening bank atau payment gateway.
- Multi-cabang dan multi-role kompleks.
- Stok barang dan akuntansi double-entry lengkap.
- Prediksi omzet jangka panjang.
- Chatbot AI yang bisa menjawab pertanyaan bebas.
- Notifikasi WhatsApp dan email otomatis.
- Integrasi pajak dan pelaporan perpajakan.
- Aplikasi Android atau iOS terpisah.
Fitur-fitur tersebut bisa dipertimbangkan setelah versi awal diuji oleh pengguna UMKM.
11. Tahapan pengembangan
1. Tahap 1 — Fondasi aplikasi
   
   Setup Laravel, Filament, database, autentikasi, profil UMKM, dan otorisasi data.
2. Tahap 2 — Pencatatan dan laporan
   
   CRUD transaksi, kategori, dashboard, perhitungan saldo, filter periode, PDF, dan CSV.
3. Tahap 3 — Machine learning
   
   Persiapan dataset, feature engineering, training Decision Tree, evaluasi, dan endpoint prediksi.
4. Tahap 4 — Integrasi LLM
   
   Penyusunan prompt, penjelasan hasil, rekomendasi, batasan kuota, dan fallback.
5. Tahap 5 — Pengujian dan deployment
   
   Pengujian perhitungan, isolasi data, akurasi model, kegagalan API, dan deployment.
12. Indikator keberhasilan
- Seluruh transaksi dapat dicatat dan dihitung secara konsisten.
- Total pada dashboard dan laporan sama untuk periode yang sama.
- Model diuji dengan metrik evaluasi yang sesuai, termasuk precision, recall, dan confusion matrix.
- Penjelasan LLM sesuai dengan hasil klasifikasi dan angka sumber.
- Aplikasi tetap dapat dipakai saat layanan LLM tidak tersedia.
- Tidak ditemukan akses silang terhadap data antar pengguna dalam pengujian.
13. Keputusan produk yang perlu dipegang
Ada dua hal yang penting agar sistem ini layak digunakan dan dipertanggungjawabkan sebagai proyek machine learning:
1. Decision Tree harus benar-benar digunakan untuk prediksi. Jangan hanya membuat percabangan if-else lalu menyebutnya machine learning. Aturan bisnis boleh digunakan untuk validasi atau baseline, tetapi model harus dilatih dan dievaluasi.
2. LLM adalah lapisan penjelasan. Hasil finansial dan label klasifikasi berasal dari perhitungan serta model. LLM menerjemahkan hasil tersebut menjadi penjelasan yang berguna, bukan menciptakan kesimpulan tanpa dasar.
Dengan batasan ini, produk tetap sederhana bagi UMKM, cukup realistis dibangun menggunakan Laravel Filament, dan memiliki komponen machine learning yang jelas untuk pengembangan maupun penelitian.