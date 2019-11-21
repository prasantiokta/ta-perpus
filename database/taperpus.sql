-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2019 pada 15.38
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_angg` bigint(20) UNSIGNED NOT NULL,
  `kodeangg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmangg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_angg`, `kodeangg`, `nmangg`, `kelas`, `jurusan`, `notelp`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RAFI-1', 'Rafiega Aji', '12', 'Multimedia', '123213132423', 'Jl. Simo Gunung A 11', 1, NULL, NULL),
(2, 'PRAS-2', 'Prasanti Oktav', '11', 'Rekayasa Perangkat Lunak', '543453421312', 'Jl. Aja Dulu No. 15', 1, NULL, NULL),
(3, 'ADRI-3', 'Adrian Ainur', '12', 'Teknik Komputer dan Jaringan', '543453421312', 'Jl. Aja Dulu No. 14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL,
  `nmcat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodebuku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `jenis_id`, `nmcat`, `kodebuku`, `judul`, `penerbit`, `penulis`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nonfiksi', 'LASK-1', 'Laskar Pelangi', 'Gramedia', 'Andrea Hirata', 0, NULL, NULL),
(2, 2, 'Fiksi', 'HYOU-2', 'Hyouka', 'Penerbit Haru', 'Honobu Yonezawa', 0, NULL, NULL),
(3, 2, 'Fiksi', 'EREB-3', 'Erebos', 'Gramedia', 'Ursula P.', 0, NULL, NULL),
(4, 4, 'Misteri', 'LOST-4', 'Lost Man Lane', 'Noura Books', 'Anna Katherine G.', 0, NULL, NULL),
(5, 2, 'Fiksi', 'LE P-5', 'Le Petit Prince', 'Elexmedia', 'Antonio G.', 1, NULL, NULL),
(6, 1, 'Nonfiksi', 'BUKU-6', 'Buku Rusak', 'Av', 'Avi', 2, NULL, NULL),
(7, 1, 'Nonfiksi', 'BUKU-7', 'Buku Hilang', 'Av', 'Avi', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dd`
--

CREATE TABLE `dd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `denda_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinjam_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `hari` int(11) NOT NULL,
  `ttl_denda` int(11) NOT NULL,
  `ttl_bayar` int(11) NOT NULL,
  `ttl_kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`id`, `pinjam_id`, `tgl_dikembalikan`, `hari`, `ttl_denda`, `ttl_bayar`, `ttl_kembalian`) VALUES
(1, 5, '2019-11-22', 1, 1000, 4000, 3000),
(2, 7, '2019-11-22', 1, 1000, 4000, 3000),
(3, 6, '2019-11-22', 1, 1000, 2000, 1000),
(4, 6, '2019-11-22', 1, 1000, 4000, 3000),
(6, 10, '2019-11-25', 2, 4000, 10000, 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinjam_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `nmcat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodebuku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `details`
--

INSERT INTO `details` (`id`, `pinjam_id`, `buku_id`, `nmcat`, `kodebuku`, `judul`, `penerbit`, `penulis`, `status`) VALUES
(1, 1, 1, 'Nonfiksi', 'LASK-1', 'Laskar Pelangi', 'Gramedia', 'Andrea Hirata', 1),
(2, 1, 2, 'Fiksi', 'HYOU-2', 'Hyouka', 'Penerbit Haru', 'Honobu Yonezawa', 1),
(3, 1, 3, 'Fiksi', 'EREB-3', 'Erebos', 'Gramedia', 'Ursula P.', 1),
(4, 2, 1, 'Nonfiksi', 'LASK-1', 'Laskar Pelangi', 'Gramedia', 'Andrea Hirata', 1),
(5, 2, 2, 'Fiksi', 'HYOU-2', 'Hyouka', 'Penerbit Haru', 'Honobu Yonezawa', 1),
(6, 3, 3, 'Fiksi', 'EREB-3', 'Erebos', 'Gramedia', 'Ursula P.', 1),
(7, 3, 4, 'Misteri', 'LOST-4', 'Lost Man Lane', 'Noura Books', 'Anna Katherine G.', 1),
(8, 3, 5, 'Fiksi', 'LE P-5', 'Le Petit Prince', 'Elexmedia', 'Antonio G.', 1),
(9, 4, 3, 'Fiksi', 'EREB-3', 'Erebos', 'Gramedia', 'Ursula P.', 1),
(10, 4, 4, 'Misteri', 'LOST-4', 'Lost Man Lane', 'Noura Books', 'Anna Katherine G.', 1),
(11, 4, 5, 'Fiksi', 'LE P-5', 'Le Petit Prince', 'Elexmedia', 'Antonio G.', 1),
(12, 5, 4, 'Misteri', 'LOST-4', 'Lost Man Lane', 'Noura Books', 'Anna Katherine G.', 1),
(13, 5, 5, 'Fiksi', 'LE P-5', 'Le Petit Prince', 'Elexmedia', 'Antonio G.', 1),
(14, 6, 1, 'Nonfiksi', 'LASK-1', 'Laskar Pelangi', 'Gramedia', 'Andrea Hirata', 1),
(15, 6, 2, 'Fiksi', 'HYOU-2', 'Hyouka', 'Penerbit Haru', 'Honobu Yonezawa', 1),
(16, 7, 3, 'Fiksi', 'EREB-3', 'Erebos', 'Gramedia', 'Ursula P.', 1),
(17, 8, 4, 'Misteri', 'LOST-4', 'Lost Man Lane', 'Noura Books', 'Anna Katherine G.', 1),
(18, 8, 5, 'Fiksi', 'LE P-5', 'Le Petit Prince', 'Elexmedia', 'Antonio G.', 1),
(19, 9, 5, 'Fiksi', 'LE P-5', 'Le Petit Prince', 'Elexmedia', 'Antonio G.', 0),
(20, 10, 2, 'Fiksi', 'HYOU-2', 'Hyouka', 'Penerbit Haru', 'Honobu Yonezawa', 1),
(21, 10, 3, 'Fiksi', 'EREB-3', 'Erebos', 'Gramedia', 'Ursula P.', 1),
(22, 10, 4, 'Misteri', 'LOST-4', 'Lost Man Lane', 'Noura Books', 'Anna Katherine G.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_category`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Nonfiksi', NULL, NULL),
(2, 'Fiksi', NULL, NULL),
(3, 'Horror', NULL, NULL),
(4, 'Misteri', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2019_10_28_141353_users', 1),
(51, '2019_10_28_141457_passreset', 1),
(52, '2019_10_28_141537_anggota', 1),
(53, '2019_10_28_141623_kategori', 1),
(54, '2019_10_28_141722_buku', 1),
(55, '2019_11_08_121959_peminjaman', 1),
(56, '2019_11_08_122505_details', 1),
(57, '2019_11_14_135144_denda', 1),
(58, '2019_11_21_121541_dd', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodepinjam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `pustakawan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `nmangg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmpust` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dikembalikan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kodepinjam`, `anggota_id`, `pustakawan_id`, `tgl_pinjam`, `tgl_kembali`, `nmangg`, `nmpust`, `dikembalikan`, `created_at`, `updated_at`) VALUES
(1, '20191121-1', 3, 1, '2019-11-21', '2019-11-21', 'Adrian Ainur', 'Rap', 1, NULL, NULL),
(2, '20191121-2', 3, 1, '2019-11-21', '2019-11-21', 'Adrian Ainur', 'Rap', 1, NULL, NULL),
(3, '20191121-3', 2, 1, '2019-11-21', '2019-11-21', 'Prasanti Oktav', 'Rap', 1, NULL, NULL),
(4, '20191121-4', 2, 1, '2019-11-21', '2019-11-21', 'Prasanti Oktav', 'Rap', 1, NULL, NULL),
(5, '20191121-5', 2, 1, '2019-11-21', '2019-11-21', 'Prasanti Oktav', 'Rap', 1, NULL, NULL),
(6, '20191121-6', 3, 1, '2019-11-21', '2019-11-21', 'Adrian Ainur', 'Rap', 1, NULL, NULL),
(7, '20191121-7', 1, 1, '2019-11-21', '2019-11-21', 'Rafiega Aji', 'Rap', 1, NULL, NULL),
(8, '20191122-8', 1, 1, '2019-11-22', '2019-11-22', 'Rafiega Aji', 'Rap', 1, NULL, NULL),
(9, '20191122-9', 3, 1, '2019-11-22', '2019-11-22', 'Adrian Ainur', 'Rap', 0, NULL, NULL),
(10, '20191122-10', 3, 1, '2019-11-22', '2019-11-23', 'Adrian Ainur', 'Rap', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rap', 'animox@email.com', NULL, '$2y$10$gIfNq3JhpMK43FxgFWzvt.iHrtMI9Xeqqs/26igA97YNMEb3DgKqW', NULL, '2019-11-21 05:32:12', '2019-11-21 05:32:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_angg`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `buku_jenis_id_foreign` (`jenis_id`);

--
-- Indeks untuk tabel `dd`
--
ALTER TABLE `dd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dd_denda_id_foreign` (`denda_id`),
  ADD KEY `dd_buku_id_foreign` (`buku_id`);

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `denda_pinjam_id_foreign` (`pinjam_id`);

--
-- Indeks untuk tabel `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_pinjam_id_foreign` (`pinjam_id`),
  ADD KEY `details_buku_id_foreign` (`buku_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_anggota_id_foreign` (`anggota_id`),
  ADD KEY `peminjaman_pustakawan_id_foreign` (`pustakawan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_angg` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dd`
--
ALTER TABLE `dd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `kategori` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dd`
--
ALTER TABLE `dd`
  ADD CONSTRAINT `dd_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `details` (`buku_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dd_denda_id_foreign` FOREIGN KEY (`denda_id`) REFERENCES `denda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_pinjam_id_foreign` FOREIGN KEY (`pinjam_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_pinjam_id_foreign` FOREIGN KEY (`pinjam_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id_angg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_pustakawan_id_foreign` FOREIGN KEY (`pustakawan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
