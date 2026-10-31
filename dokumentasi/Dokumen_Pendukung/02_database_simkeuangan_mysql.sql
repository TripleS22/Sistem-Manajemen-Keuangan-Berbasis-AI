-- =====================================================================
-- Database  : Sistem Manajemen Keuangan UMKM Berbasis AI (simkeuangan)
-- Engine    : MySQL 8.x / MariaDB 10.4+  (InnoDB, utf8mb4)
-- Sumber    : struktur dari database/migrations, data dari database.sqlite
-- Import    : mysql -u root -p < 02_database_simkeuangan_mysql.sql
-- =====================================================================

CREATE DATABASE IF NOT EXISTS `simkeuangan` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `simkeuangan`;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `analysis_explanations`, `financial_analyses`, `transactions`,
  `transaction_categories`, `business_profiles`, `sessions`, `password_reset_tokens`,
  `users`, `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs`, `migrations`;

-- ---------------------------------------------------------------------
-- Tabel inti Laravel
-- ---------------------------------------------------------------------
CREATE TABLE `migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL DEFAULT 'owner' COMMENT 'admin = super admin, owner = pemilik UMKM',
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT UNSIGNED NOT NULL,
  `reserved_at` INT UNSIGNED NULL DEFAULT NULL,
  `available_at` INT UNSIGNED NOT NULL,
  `created_at` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT NOT NULL,
  `pending_jobs` INT NOT NULL,
  `failed_jobs` INT NOT NULL,
  `failed_job_ids` LONGTEXT NOT NULL,
  `options` MEDIUMTEXT NULL,
  `cancelled_at` INT NULL DEFAULT NULL,
  `created_at` INT NOT NULL,
  `finished_at` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Tabel domain aplikasi
-- ---------------------------------------------------------------------
CREATE TABLE `business_profiles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `business_name` VARCHAR(255) NOT NULL,
  `business_type` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL,
  `initial_capital` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `address` TEXT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `business_profiles_user_id_unique` (`user_id`),
  CONSTRAINT `business_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `transaction_categories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `type` ENUM('income','expense') NOT NULL,
  `color` VARCHAR(255) NULL DEFAULT NULL,
  `icon` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_categories_user_id_type_index` (`user_id`, `type`),
  CONSTRAINT `transaction_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `transactions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `transaction_category_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `type` ENUM('income','expense') NOT NULL,
  `amount` DECIMAL(15,2) NOT NULL,
  `transaction_date` DATE NOT NULL,
  `description` TEXT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_transaction_date_index` (`user_id`, `transaction_date`),
  KEY `transactions_user_id_type_index` (`user_id`, `type`),
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_transaction_category_id_foreign` FOREIGN KEY (`transaction_category_id`) REFERENCES `transaction_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `financial_analyses` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `period_start` DATE NOT NULL,
  `period_end` DATE NOT NULL,
  `total_income` DECIMAL(15,2) NOT NULL,
  `total_expense` DECIMAL(15,2) NOT NULL,
  `net_cash_flow` DECIMAL(15,2) NOT NULL,
  `expense_ratio` DECIMAL(8,4) NOT NULL,
  `income_trend` DECIMAL(8,4) NOT NULL DEFAULT 0.0000,
  `cash_flow_trend` DECIMAL(8,4) NOT NULL DEFAULT 0.0000,
  `prediction_label` VARCHAR(255) NOT NULL COMMENT 'Sehat | Perlu perhatian | Berisiko (hasil Decision Tree)',
  `confidence_score` DECIMAL(5,4) NULL DEFAULT NULL,
  `key_factors` JSON NULL,
  `model_version` VARCHAR(255) NOT NULL DEFAULT '1.0.0',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `financial_analyses_user_id_created_at_index` (`user_id`, `created_at`),
  CONSTRAINT `financial_analyses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `analysis_explanations` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `financial_analysis_id` BIGINT UNSIGNED NOT NULL,
  `explanation` LONGTEXT NULL,
  `recommendations` JSON NULL,
  `provider` VARCHAR(255) NOT NULL DEFAULT 'gemini' COMMENT 'groq | gemini-api | rule_based_fallback',
  `status` VARCHAR(255) NOT NULL DEFAULT 'pending' COMMENT 'success | fallback | completed | pending',
  `error_message` TEXT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `analysis_explanations_financial_analysis_id_foreign` FOREIGN KEY (`financial_analysis_id`) REFERENCES `financial_analyses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Data
-- ---------------------------------------------------------------------

-- migrations (9 baris)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_27_074505_add_role_to_users_table', 1),
(5, '2026_10_27_074540_create_business_profiles_table', 1),
(6, '2026_10_27_074556_create_transaction_categories_table', 1),
(7, '2026_10_27_074655_create_transactions_table', 1),
(8, '2026_10_27_074802_create_financial_analyses_table', 1),
(9, '2026_10_27_074817_create_analysis_explanations_table', 1);

-- users (3 baris)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Pemilik UMKM', 'admin@umkm.com', '2026-10-28 02:38:27', '$2y$12$3uPtOTIxynd8/QC0XuhLK.gkdI23HupwGwWqPA/aa/QlqVhOwNiYa', NULL, '2026-10-28 02:38:27', '2026-10-28 02:38:27', 'owner'),
(2, 'sigit', 's@smail.com', NULL, '$2y$12$lJ7AXCqh19lgJzsBCh/HW.aS09I1ED6pPbTzCU15Ynztl/sZ9Xgam', NULL, '2026-10-28 02:39:44', '2026-10-28 02:39:44', 'owner'),
(3, 'Super Admin', 'superadmin@umkm.com', NULL, '$2y$12$HhqoI.DSUAVTq0Im9JYD9.fYLj6Q56O/dyXVqPwLrfDEa94X9jJ5a', NULL, '2026-10-29 06:19:01', '2026-10-29 06:19:01', 'admin');

-- business_profiles (2 baris)
INSERT INTO `business_profiles` (`id`, `user_id`, `business_name`, `business_type`, `description`, `initial_capital`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kedai Kopi & Kuliner Berkah Nusantara', 'Kuliner & F&B', 'Usaha kuliner kopi artisan dan makanan ringan lokal khas nusantara. Melayani pelanggan walk-in dan pesanan katering.', 25000000, '081234567890', 'Jl. Merdeka No. 45, Jakarta Selatan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(2, 2, 'Toko Berkah Jaya ', 'Retail & Perdagangan', 'Usaha perdagangan retail kebutuhan harian, sembako, dan aneka perlengkapan rumah tangga dengan pelayanan prima.', 25000000, '081234567890', 'Jl. Merdeka No. 45, Jakarta Selatan', '2026-10-28 02:39:54', '2026-10-28 04:51:24');

-- transaction_categories (20 baris)
INSERT INTO `transaction_categories` (`id`, `user_id`, `name`, `type`, `color`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penjualan Produk', 'income', '#10b981', 'heroicon-o-shopping-bag', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(2, 1, 'Pendapatan Jasa / Katering', 'income', '#06b6d4', 'heroicon-o-briefcase', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(3, 1, 'Pendapatan Lain-lain', 'income', '#3b82f6', 'heroicon-o-plus-circle', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(4, 1, 'Modal / Investasi Masuk', 'income', '#8b5cf6', 'heroicon-o-banknotes', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(5, 1, 'Pembelian Bahan Baku', 'expense', '#ef4444', 'heroicon-o-archive-box', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(6, 1, 'Gaji & Upah Karyawan', 'expense', '#f97316', 'heroicon-o-user-group', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(7, 1, 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'expense', '#f59e0b', 'heroicon-o-home-modern', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(8, 1, 'Operasional & Perlengkapan', 'expense', '#64748b', 'heroicon-o-cog-6-tooth', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(9, 1, 'Pemasaran & Promosi', 'expense', '#ec4899', 'heroicon-o-megaphone', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(10, 1, 'Transportasi & Logistik', 'expense', '#a855f7', 'heroicon-o-truck', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(11, 2, 'Penjualan Produk', 'income', '#10b981', 'heroicon-o-shopping-bag', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(12, 2, 'Pendapatan Jasa / Katering', 'income', '#06b6d4', 'heroicon-o-briefcase', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(13, 2, 'Pendapatan Lain-lain', 'income', '#3b82f6', 'heroicon-o-plus-circle', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(14, 2, 'Modal / Investasi Masuk', 'income', '#8b5cf6', 'heroicon-o-banknotes', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(15, 2, 'Pembelian Bahan Baku', 'expense', '#ef4444', 'heroicon-o-archive-box', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(16, 2, 'Gaji & Upah Karyawan', 'expense', '#f97316', 'heroicon-o-user-group', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(17, 2, 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'expense', '#f59e0b', 'heroicon-o-home-modern', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(18, 2, 'Operasional & Perlengkapan', 'expense', '#64748b', 'heroicon-o-cog-6-tooth', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(19, 2, 'Pemasaran & Promosi', 'expense', '#ec4899', 'heroicon-o-megaphone', '2026-10-28 04:04:59', '2026-10-28 04:04:59'),
(20, 2, 'Transportasi & Logistik', 'expense', '#a855f7', 'heroicon-o-truck', '2026-10-28 04:04:59', '2026-10-28 04:04:59');

-- transactions (79 baris)
INSERT INTO `transactions` (`id`, `user_id`, `transaction_category_id`, `type`, `amount`, `transaction_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'income', 8500000, '2026-05-24 00:00:00', 'Penjualan produk bulan ke-1', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(2, 1, 2, 'income', 1200000, '2026-05-27 00:00:00', 'Jasa katering kecil', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(3, 1, 5, 'expense', 5800000, '2026-05-19 00:00:00', 'Bahan baku kopi dan makanan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(4, 1, 6, 'expense', 4000000, '2026-05-05 00:00:00', 'Gaji 2 karyawan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(5, 1, 7, 'expense', 2200000, '2026-05-13 00:00:00', 'Sewa dan utilitas', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(6, 1, 8, 'expense', 800000, '2026-05-12 00:00:00', 'Perlengkapan operasional', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(7, 1, 1, 'income', 11000000, '2026-06-10 00:00:00', 'Penjualan produk meningkat', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(8, 1, 2, 'income', 2500000, '2026-06-25 00:00:00', 'Katering acara perusahaan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(9, 1, 5, 'expense', 6200000, '2026-06-13 00:00:00', 'Bahan baku bulanan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(10, 1, 6, 'expense', 4000000, '2026-06-18 00:00:00', 'Gaji karyawan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(11, 1, 7, 'expense', 2200000, '2026-06-08 00:00:00', 'Sewa dan utilitas', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(12, 1, 9, 'expense', 600000, '2026-06-05 00:00:00', 'Iklan media sosial', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(13, 1, 1, 'income', 16500000, '2026-07-23 00:00:00', 'Penjualan produk peak season', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(14, 1, 2, 'income', 4000000, '2026-07-08 00:00:00', 'Katering acara pernikahan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(15, 1, 5, 'expense', 7500000, '2026-07-03 00:00:00', 'Bahan baku meningkat', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(16, 1, 6, 'expense', 4500000, '2026-07-21 00:00:00', 'Gaji + bonus karyawan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(17, 1, 7, 'expense', 2300000, '2026-07-02 00:00:00', 'Utilitas naik', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(18, 1, 10, 'expense', 500000, '2026-07-21 00:00:00', 'Ongkir bahan baku', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(19, 1, 1, 'income', 18000000, '2026-08-02 00:00:00', 'Penjualan terbaik', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(20, 1, 2, 'income', 3500000, '2026-08-16 00:00:00', 'Katering kantor rutin', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(21, 1, 5, 'expense', 7800000, '2026-08-25 00:00:00', 'Stok bahan baku lebih banyak', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(22, 1, 6, 'expense', 4500000, '2026-08-18 00:00:00', 'Gaji 3 karyawan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(23, 1, 7, 'expense', 2400000, '2026-08-13 00:00:00', 'Sewa dan utilitas', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(24, 1, 9, 'expense', 800000, '2026-08-06 00:00:00', 'Kampanye promo akhir bulan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(25, 1, 8, 'expense', 700000, '2026-08-18 00:00:00', 'Peralatan dapur', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(26, 1, 1, 'income', 14500000, '2026-09-17 00:00:00', 'Penjualan turun sedikit', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(27, 1, 2, 'income', 2800000, '2026-09-17 00:00:00', 'Pesanan katering berkurang', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(28, 1, 5, 'expense', 7200000, '2026-09-25 00:00:00', 'Bahan baku bulanan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(29, 1, 6, 'expense', 4500000, '2026-09-01 00:00:00', 'Gaji karyawan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(30, 1, 7, 'expense', 2400000, '2026-09-27 00:00:00', 'Tagihan utilitas', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(31, 1, 9, 'expense', 500000, '2026-09-21 00:00:00', 'Iklan sosmed', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(32, 1, 10, 'expense', 350000, '2026-09-08 00:00:00', 'Ongkir pengiriman', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(33, 1, 1, 'income', 12500000, '2026-10-17 00:00:00', 'Penjualan minggu ke-3', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(34, 1, 1, 'income', 9800000, '2026-10-28 00:00:00', 'Penjualan minggu ke-2', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(35, 1, 2, 'income', 3500000, '2026-10-23 00:00:00', 'Pesanan katering acara kantor', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(36, 1, 5, 'expense', 7200000, '2026-10-04 00:00:00', 'Biji kopi, susu, dan bahan masakan', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(37, 1, 7, 'expense', 2500000, '2026-10-16 00:00:00', 'Tagihan listrik dan internet', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(38, 1, 6, 'expense', 4500000, '2026-10-11 00:00:00', 'Gaji 2 barista', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(39, 1, 9, 'expense', 500000, '2026-10-09 00:00:00', 'Iklan media sosial', '2026-10-28 02:38:27', '2026-10-28 02:38:27'),
(40, 2, 11, 'income', 8500000, '2026-05-18 00:00:00', 'Penjualan produk bulan ke-1', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(41, 2, 12, 'income', 1200000, '2026-05-23 00:00:00', 'Jasa katering kecil', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(42, 2, 15, 'expense', 5800000, '2026-05-15 00:00:00', 'Bahan baku kopi dan makanan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(43, 2, 16, 'expense', 4000000, '2026-05-26 00:00:00', 'Gaji 2 karyawan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(44, 2, 17, 'expense', 2200000, '2026-05-22 00:00:00', 'Sewa dan utilitas', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(45, 2, 18, 'expense', 800000, '2026-05-04 00:00:00', 'Perlengkapan operasional', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(46, 2, 11, 'income', 11000000, '2026-06-01 00:00:00', 'Penjualan produk meningkat', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(47, 2, 12, 'income', 2500000, '2026-06-04 00:00:00', 'Katering acara perusahaan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(48, 2, 15, 'expense', 6200000, '2026-06-11 00:00:00', 'Bahan baku bulanan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(49, 2, 16, 'expense', 4000000, '2026-06-25 00:00:00', 'Gaji karyawan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(50, 2, 17, 'expense', 2200000, '2026-06-27 00:00:00', 'Sewa dan utilitas', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(51, 2, 19, 'expense', 600000, '2026-06-22 00:00:00', 'Iklan media sosial', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(52, 2, 11, 'income', 16500000, '2026-07-22 00:00:00', 'Penjualan produk peak season', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(53, 2, 12, 'income', 4000000, '2026-07-06 00:00:00', 'Katering acara pernikahan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(54, 2, 15, 'expense', 7500000, '2026-07-10 00:00:00', 'Bahan baku meningkat', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(55, 2, 16, 'expense', 4500000, '2026-07-16 00:00:00', 'Gaji + bonus karyawan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(56, 2, 17, 'expense', 2300000, '2026-07-16 00:00:00', 'Utilitas naik', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(57, 2, 20, 'expense', 500000, '2026-07-10 00:00:00', 'Ongkir bahan baku', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(58, 2, 11, 'income', 18000000, '2026-08-27 00:00:00', 'Penjualan terbaik', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(59, 2, 12, 'income', 3500000, '2026-08-20 00:00:00', 'Katering kantor rutin', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(60, 2, 15, 'expense', 7800000, '2026-08-22 00:00:00', 'Stok bahan baku lebih banyak', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(61, 2, 16, 'expense', 4500000, '2026-08-17 00:00:00', 'Gaji 3 karyawan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(62, 2, 17, 'expense', 2400000, '2026-08-06 00:00:00', 'Sewa dan utilitas', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(63, 2, 19, 'expense', 800000, '2026-08-28 00:00:00', 'Kampanye promo akhir bulan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(64, 2, 18, 'expense', 700000, '2026-08-27 00:00:00', 'Peralatan dapur', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(65, 2, 11, 'income', 14500000, '2026-09-27 00:00:00', 'Penjualan turun sedikit', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(66, 2, 12, 'income', 2800000, '2026-09-24 00:00:00', 'Pesanan katering berkurang', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(67, 2, 15, 'expense', 7200000, '2026-09-28 00:00:00', 'Bahan baku bulanan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(68, 2, 16, 'expense', 4500000, '2026-09-16 00:00:00', 'Gaji karyawan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(69, 2, 17, 'expense', 2400000, '2026-09-20 00:00:00', 'Tagihan utilitas', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(70, 2, 19, 'expense', 500000, '2026-09-25 00:00:00', 'Iklan sosmed', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(71, 2, 20, 'expense', 350000, '2026-09-12 00:00:00', 'Ongkir pengiriman', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(72, 2, 11, 'income', 12500000, '2026-10-14 00:00:00', 'Penjualan minggu ke-3', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(73, 2, 11, 'income', 9800000, '2026-10-16 00:00:00', 'Penjualan minggu ke-2', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(74, 2, 12, 'income', 3500000, '2026-10-04 00:00:00', 'Pesanan katering acara kantor', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(75, 2, 15, 'expense', 7200000, '2026-10-21 00:00:00', 'Biji kopi, susu, dan bahan masakan', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(76, 2, 17, 'expense', 2500000, '2026-10-17 00:00:00', 'Tagihan listrik dan internet', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(77, 2, 16, 'expense', 4500000, '2026-10-11 00:00:00', 'Gaji 2 barista', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(78, 2, 19, 'expense', 500000, '2026-10-28 00:00:00', 'Iklan media sosial', '2026-10-28 04:05:00', '2026-10-28 04:05:00'),
(79, 1, 6, 'expense', 1000000, '2026-10-28 00:00:00', 'menggaji', '2026-10-28 07:04:40', '2026-10-28 07:04:40');

-- financial_analyses (1 baris)
INSERT INTO `financial_analyses` (`id`, `user_id`, `period_start`, `period_end`, `total_income`, `total_expense`, `net_cash_flow`, `expense_ratio`, `income_trend`, `cash_flow_trend`, `prediction_label`, `confidence_score`, `key_factors`, `model_version`, `created_at`, `updated_at`) VALUES
(5, 2, '2026-10-01 00:00:00', '2026-10-28 00:00:00', 25800000, 14700000, 11100000, 0.5698, 0.4913, 3.7234, 'Sehat', 1, '["Arus kas operasional positif (surplus Rp 11.100.000)","Rasio pengeluaran efisien (57%), menyisakan margin kas yang sehat","Pertumbuhan omzet pemasukan sebesar 49.1% dibanding periode sebelumnya"]', '1.0.0 (Decision Tree)', '2026-10-28 04:11:25', '2026-10-28 04:11:25');

-- analysis_explanations (1 baris)
INSERT INTO `analysis_explanations` (`id`, `financial_analysis_id`, `explanation`, `recommendations`, `provider`, `status`, `error_message`, `created_at`, `updated_at`) VALUES
(5, 5, 'Berdasarkan evaluasi algoritma Decision Tree, kondisi keuangan Toko Berkah Jaya sigit pada periode ini tergolong SEHAT. Usaha berhasil mencatatkan surplus arus kas bersih sebesar Rp 11.100.000 dengan rasio pengeluaran yang terkontrol sebesar 57% dari total pemasukan Rp 25.800.000. Efisiensi operasional ini memberikan ruang likuiditas yang sangat baik bagi kelangsungan usaha.', '["Pertahankan efisiensi belanja bahan baku dan biaya operasional yang sedang berjalan.","Alokasikan sebagian surplus arus kas bersih ke rekening cadangan dana darurat (kas darurat operasional 3-6 bulan).","Pertimbangkan untuk reinvestasi terkontrol guna menambah stok produk terlaris atau ekspansi pemasaran."]', 'rule-based-engine (Fallback: Kunci API Gemini belum dikonfigurasi (.env))', 'completed', NULL, '2026-10-28 04:11:25', '2026-10-28 04:11:25');

SET FOREIGN_KEY_CHECKS = 1;
