-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2021 pada 09.12
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `foto`, `password`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '$2y$10$dE.DxJWCftB.bQPFLTAs0.nnMivCR4XBBIKVOFV0qlrXAQZ8JlVFm', 'Admin', '2021-07-04 09:13:30', '2021-07-04 09:13:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi_soal`
--

CREATE TABLE `distribusi_soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `distribusi_soal`
--

INSERT INTO `distribusi_soal` (`id`, `ujian_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(2, 2, 3, '2021-07-07 19:33:05', '2021-07-07 19:33:05'),
(6, 2, 5, '2021-07-26 17:59:01', '2021-07-26 17:59:01'),
(10, 1, 4, '2021-07-27 17:35:28', '2021-07-27 17:35:28'),
(11, 2, 4, '2021-07-27 17:56:12', '2021-07-27 17:56:12'),
(12, 3, 4, '2021-07-28 01:47:57', '2021-07-28 01:47:57'),
(13, 4, 4, '2021-08-25 12:28:13', '2021-08-25 12:28:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id`, `kode`, `guru_id`, `mapel_id`, `kelas_id`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(4, '9FbDl', 4, 1, 4, 'mari belajar', NULL, '2021-07-16 06:50:13', '2021-07-16 06:50:13'),
(5, 'hoqBD', 6, 3, 6, 'ghh', NULL, '2021-07-24 02:22:15', '2021-07-24 02:22:15'),
(6, 'G7BbN', 5, 7, 5, 'agama islalm', NULL, '2021-07-26 17:38:08', '2021-07-26 17:38:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup_aktivitas`
--

CREATE TABLE `grup_aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grup_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grup_aktivitas`
--

INSERT INTO `grup_aktivitas` (`id`, `grup_id`, `siswa_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(11, 5, 9, 'Melihat Daftar Materi Grup 7b', '2021-07-24 02:25:14', '2021-07-24 02:25:14'),
(12, 5, 9, 'Melihat Daftar Materi Grup 8a', '2021-07-26 18:10:40', '2021-07-26 18:10:40'),
(13, 5, 9, 'Melihat Detail Materi mari belajar bersama', '2021-07-26 18:10:43', '2021-07-26 18:10:43'),
(14, 5, 9, 'Melihat Daftar Materi Grup 8a', '2021-07-26 18:10:56', '2021-07-26 18:10:56'),
(15, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-26 18:11:07', '2021-07-26 18:11:07'),
(16, 4, 9, 'Melihat Detail Materi dengarkan ya nak', '2021-07-26 18:11:14', '2021-07-26 18:11:14'),
(17, 5, 9, 'Melihat Daftar Materi Grup 8a', '2021-07-26 18:14:10', '2021-07-26 18:14:10'),
(18, 5, 9, 'Keluar dari grup', '2021-07-26 18:14:19', '2021-07-26 18:14:19'),
(19, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-26 18:14:24', '2021-07-26 18:14:24'),
(20, 4, 9, 'Melihat Detail Materi dengarkan ya nak', '2021-07-26 18:14:31', '2021-07-26 18:14:31'),
(21, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-26 18:14:43', '2021-07-26 18:14:43'),
(22, 4, 9, 'Melihat Detail Materi materi B.indo', '2021-07-26 18:14:47', '2021-07-26 18:14:47'),
(23, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-26 18:21:58', '2021-07-26 18:21:58'),
(24, 4, 9, 'Melihat Detail Materi materi B.indo', '2021-07-26 18:22:02', '2021-07-26 18:22:02'),
(25, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-26 18:22:23', '2021-07-26 18:22:23'),
(26, 4, 9, 'Melihat Detail Materi dengarkan ya nak', '2021-07-26 18:22:26', '2021-07-26 18:22:26'),
(27, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-27 01:44:24', '2021-07-27 01:44:24'),
(28, 4, 9, 'Melihat Detail Materi materi B.indo', '2021-07-27 01:44:28', '2021-07-27 01:44:28'),
(29, 4, 9, 'Melihat Daftar Materi Grup 7a', '2021-07-27 01:45:01', '2021-07-27 01:45:01'),
(30, 4, 6, 'Melihat Daftar Materi Grup 7a', '2021-07-27 17:48:43', '2021-07-27 17:48:43'),
(31, 4, 6, 'Melihat Detail Materi dengarkan ya nak', '2021-07-27 17:48:47', '2021-07-27 17:48:47'),
(32, 4, 6, 'Melihat Daftar Materi Grup 7a', '2021-07-27 17:48:53', '2021-07-27 17:48:53'),
(33, 4, 6, 'Melihat Daftar Materi Grup 7a', '2021-07-27 18:06:14', '2021-07-27 18:06:14'),
(34, 4, 6, 'Melihat Daftar Materi Grup 7a', '2021-07-27 18:06:19', '2021-07-27 18:06:19'),
(35, 4, 11, 'Melihat Daftar Materi Grup 7a', '2021-07-28 01:20:05', '2021-07-28 01:20:05'),
(36, 4, 11, 'Melihat Detail Materi materi B.indo', '2021-07-28 01:20:12', '2021-07-28 01:20:12'),
(37, 4, 11, 'Melihat Daftar Materi Grup 7a', '2021-07-28 01:20:45', '2021-07-28 01:20:45'),
(38, 4, 6, 'Melihat Daftar Materi Grup 7a', '2021-07-28 01:29:18', '2021-07-28 01:29:18'),
(39, 4, 7, 'Melihat Daftar Materi Grup 7a', '2021-08-18 18:34:32', '2021-08-18 18:34:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup_materi`
--

CREATE TABLE `grup_materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grup_id` bigint(20) UNSIGNED NOT NULL,
  `materi_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grup_materi`
--

INSERT INTO `grup_materi` (`id`, `judul`, `grup_id`, `materi_id`, `guru_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'belajar', 5, 6, 6, '1', '2021-07-24 02:29:42', '2021-07-24 02:29:42'),
(5, 'dengarkan ya nak', 4, 5, 4, '1', '2021-07-26 18:07:30', '2021-07-26 18:07:30'),
(7, 'd', 4, 9, 4, '1', '2021-07-28 01:14:28', '2021-07-28 01:14:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup_siswa`
--

CREATE TABLE `grup_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `grup_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grup_siswa`
--

INSERT INTO `grup_siswa` (`id`, `siswa_id`, `grup_id`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 6, 4, '1', 'Di Undang', '2021-07-16 06:51:07', '2021-07-16 06:51:07'),
(4, 7, 4, '1', 'Di Undang', '2021-07-16 06:51:35', '2021-07-16 06:51:35'),
(5, 8, 5, '1', 'Di Undang', '2021-07-24 02:23:16', '2021-07-24 02:23:16'),
(7, 8, 4, '1', 'Di Undang', '2021-07-26 17:09:31', '2021-07-26 17:09:31'),
(8, 9, 4, '1', 'Di Undang', '2021-07-26 17:09:52', '2021-07-26 17:09:52'),
(9, 10, 4, '1', 'Di Undang', '2021-07-26 17:10:33', '2021-07-26 17:10:33'),
(10, 11, 4, '1', 'Di Undang', '2021-07-26 17:10:59', '2021-07-26 17:10:59'),
(11, 12, 4, '1', 'Di Undang', '2021-07-26 17:11:18', '2021-07-26 17:11:18'),
(12, 13, 4, '1', 'Di Undang', '2021-07-26 17:12:06', '2021-07-26 17:12:06'),
(13, 14, 4, '1', 'Di Undang', '2021-07-26 17:12:31', '2021-07-26 17:12:31'),
(14, 15, 4, '1', 'Di Undang', '2021-07-26 17:32:21', '2021-07-26 17:32:21'),
(15, 16, 4, '1', 'Di Undang', '2021-07-26 17:32:44', '2021-07-26 17:32:44'),
(16, 17, 4, '1', 'Di Undang', '2021-07-26 17:33:02', '2021-07-26 17:33:02'),
(17, 18, 4, '1', 'Di Undang', '2021-07-26 17:33:22', '2021-07-26 17:33:22'),
(18, 19, 4, '1', 'Di Undang', '2021-07-26 17:33:45', '2021-07-26 17:33:45'),
(19, 20, 4, '1', 'Di Undang', '2021-07-26 17:34:34', '2021-07-26 17:34:34'),
(20, 21, 4, '1', 'Di Undang', '2021-07-26 17:34:53', '2021-07-26 17:34:53'),
(21, 22, 4, '1', 'Di Undang', '2021-07-26 17:35:10', '2021-07-26 17:35:10'),
(22, 23, 4, '1', 'Di Undang', '2021-07-26 17:35:30', '2021-07-26 17:35:30'),
(23, 24, 4, '1', 'Di Undang', '2021-07-26 17:35:47', '2021-07-26 17:35:47'),
(24, 25, 4, '1', 'Di Undang', '2021-07-26 17:36:07', '2021-07-26 17:36:07'),
(25, 26, 6, '1', 'Di Undang', '2021-07-26 17:38:42', '2021-07-26 17:38:42'),
(26, 27, 6, '1', 'Di Undang', '2021-07-26 17:39:03', '2021-07-26 17:39:03'),
(27, 28, 6, '1', 'Di Undang', '2021-07-26 17:39:20', '2021-07-26 17:39:20'),
(28, 29, 6, '1', 'Di Undang', '2021-07-26 17:39:38', '2021-07-26 17:39:38'),
(29, 30, 6, '1', 'Di Undang', '2021-07-26 17:39:54', '2021-07-26 17:39:54'),
(30, 31, 6, '1', 'Di Undang', '2021-07-26 17:40:11', '2021-07-26 17:40:11'),
(31, 32, 6, '1', 'Di Undang', '2021-07-26 17:40:29', '2021-07-26 17:40:29'),
(32, 33, 6, '1', 'Di Undang', '2021-07-26 17:40:53', '2021-07-26 17:40:53'),
(33, 34, 6, '1', 'Di Undang', '2021-07-26 17:41:12', '2021-07-26 17:41:12'),
(34, 35, 6, '1', 'Di Undang', '2021-07-26 17:41:37', '2021-07-26 17:41:37'),
(35, 36, 6, '1', 'Di Undang', '2021-07-26 17:42:26', '2021-07-26 17:42:26'),
(36, 37, 6, '1', 'Di Undang', '2021-07-26 17:42:57', '2021-07-26 17:42:57'),
(37, 38, 6, '1', 'Di Undang', '2021-07-26 17:43:16', '2021-07-26 17:43:16'),
(38, 39, 6, '1', 'Di Undang', '2021-07-26 17:43:42', '2021-07-26 17:43:42'),
(39, 40, 6, '1', 'Di Undang', '2021-07-26 17:44:00', '2021-07-26 17:44:00'),
(40, 41, 6, '1', 'Di Undang', '2021-07-26 17:44:20', '2021-07-26 17:44:20'),
(41, 42, 6, '1', 'Di Undang', '2021-07-26 17:44:37', '2021-07-26 17:44:37'),
(42, 43, 6, '1', 'Di Undang', '2021-07-26 17:45:03', '2021-07-26 17:45:03'),
(43, 44, 6, '1', 'Di Undang', '2021-07-26 17:45:24', '2021-07-26 17:45:24'),
(44, 45, 6, '1', 'Di Undang', '2021-07-26 17:45:42', '2021-07-26 17:45:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` bigint(20) DEFAULT 1,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `no_induk`, `password`, `username`, `nama`, `mapel_id`, `golongan`, `lulusan`, `foto`, `tempat_lahir`, `tgl_lahir`, `agama`, `no_telp`, `alamat`, `jenkel`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, '197504082003122003', '$2y$10$YIDGofIUXjeDqc228adpuOztTioN/u1Lc61p/5gk3SIJPB2d/ajse', '197504082003122003', 'Soniah, S. Pd', 1, 'panata III/c', 'S1 B. Indonesia', 'public/foto/iWSusuQAoXxSY5tx9mbxhxGgxmej512LOVIzx8ih.jpg', 'jambi', '1975-08-04', 'Islam', '081268201776', 'Jl. gatot subroto NO 30 pandan lagan', 'Perempuan', '1', '-', '2021-07-14 17:00:00', '2021-08-24 17:00:00'),
(5, '196706242007011027', '$2y$10$ItMrGe.P/JK0Gu11xIT1u.1FS6INpjgHtqFz15cRh./nDU7tegYd.', '196706242007011027', 'Drs. Komari', 7, 'panata III/c', 'S.1 Turbiah', NULL, 'Tg. samak', '1967-06-24', 'Islam', '082269201988', 'Jl. gatot subroto NO 30 pandan lagan', 'Laki-laki', '1', '-', '2021-07-14 17:00:00', '2021-07-26 17:00:00'),
(6, '197712022009031003', '$2y$10$wrYbHIWV0z4fJhuW/cagXOYFB79ZdKVgzoFcyEMhJxD.Ga6aCQI8e', '197712022009031003', 'sunarto, S. pd. I', 4, 'panata III/c', 'S.1 Matematika', NULL, 'Jambi', '1977-02-12', 'Islam', '185266066286', 'Jl. gatot subroto NO. 30 pandan lagan', 'Laki-laki', '1', '-', '2021-07-14 17:00:00', '2021-07-26 17:00:00'),
(7, '1984092452010011012', '$2y$10$zMKwad53/5vvVp.jqXo7ge3TzBbgmPaCdvIyDYulogLqyRVFJiaWa', '1984092452010011012', 'wenda iriani, S. pd', 3, 'panata III/c', 'S.1 Ekonomi', NULL, 'jambi', '1984-09-24', 'Islam', '085232568722', 'Jl. gatot subroto NO 30 pandan lagan', 'Perempuan', '1', '-', '2021-07-14 17:00:00', '2021-07-26 17:00:00'),
(8, '197909212010011012', '$2y$10$Kq2kgBWGqjXCdJ2UUtV.X.IBnNgUd3TiVZqVzdwbV.RbzCAZa243S', '197909212010011012', 'Ruseffendi, S.pd', 3, 'panata III/c', 'S.1 Ekonomi', NULL, 'Tj. pauh suka jaya', '1979-09-21', 'Islam', '082233474872', 'Jl. gatot subroto NO 30 pandan lagan', 'Laki-laki', '1', '-', '2021-07-24 17:00:00', '2021-07-26 17:00:00'),
(9, '198209122009032006', '$2y$10$caaX9zDmgg2ujD/yz00L/.dZTbckBvU.X2pmTarOASZ20Q9RlF4L.', '198209122009032006', 'Ifut Zulystianingrum, S. pd', 6, 'panata III/c', 'S.1 Fisika', NULL, 'Jambi', '1984-09-24', 'Islam', '082233474872', 'Jl. gatot subroto NO 30 pandan lagan', 'Perempuan', '1', '-', '2021-07-24 17:00:00', '2021-07-26 17:00:00'),
(10, '198607132010012016', '$2y$10$LH8fBzmao1ujaDI99U1U7u9D6snpt.sP5dNEFjfIpAm9EgXjEA93.', '198607132010012016', 'Liza Rezeki, S. pd', 1, 'panata III/c', 'S1 B. Indonesia', NULL, 'mendalo darat', '1986-07-22', 'Islam', '082233474872', 'jl. gatot subroto NO.30 pandan lagan', 'Perempuan', '1', '-', '2021-07-25 17:00:00', '2021-07-26 17:00:00'),
(11, '197111292003121004', '$2y$10$lIk60tQDTmR6JhMw4.kmaOBML9B2MWrdUvw8N9w0ODZ7eblR.USYG', '197111292003121004', 'heru eko priharto,S. pd', 2, 'panata muda III/b', 'S.1 B.inggris', NULL, 'boyolali', '1971-12-30', 'Islam', '082233474872', 'jambi', 'Laki-laki', '1', '-', '2021-07-25 17:00:00', '2021-07-26 17:00:00'),
(12, '1989608012009032006', '$2y$10$N2EqaehAaMX3i9WVx0610.lNXoUKQPY1iCLexaQYM60hDX9ppY2e.', '1989608012009032006', 'emilia perwita S. pd', 1, 'panata III/c', 'S.1 Biologi', NULL, 'kota baru', '1986-07-27', 'Islam', '082233474872', 'Jl. gatot subroto NO. 30 pandan lagan', 'Perempuan', '1', '-', '2021-07-25 17:00:00', '2021-07-26 17:00:00'),
(13, '198612242010012016', '$2y$10$NVIbw4Dy.ZmAXU7vs/L3IO1NWDxppBuzwqkHId19ZoY98temfqHXK', '198612242010012016', 'henni sembiring, S. pd', 5, 'panata III/c', 'S.1 PPKN', NULL, 'jati kusuma', '1986-02-22', 'Islam', '082233474872', 'Jl. gatot subroto NO 30 pandan lagan', 'Perempuan', '1', '-', '2021-07-25 17:00:00', '2021-07-26 17:00:00'),
(14, '198712292011012008', '$2y$10$ztEM6rV6U1RnCf6k7DwdouzlMfu8wZejGe..bqkBggKQmnqYTNAGi', '198712292011012008', 'lisda wastrisa sihotang, S.pd', 4, 'panata muda III/b', 'S.1 Matematika', NULL, 'Muara sabak', '1987-12-29', 'Kristen', '082233474872', 'jl. gatot subroto NO. 30 pandan lagan', 'Perempuan', '1', '-', '2021-07-25 17:00:00', '2021-07-26 17:00:00'),
(15, 'TTUT', '$2y$10$KQ4cu9TEjDjoAbLZ8Aw7veGhxWgccFsjcS.xSXrkQxRX0OFh7GPve', 'TTUT', 'Nur hamimah S.kom', 11, '-', 'S.1 Komputer', NULL, 'pandan lagan', '1984-03-23', 'Islam', '081268201776', 'jl. gatot subroto NO.30 pandan lagan', 'Perempuan', '1', 'staff TU', '2021-07-26 17:00:00', '2021-07-26 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `guru_id`, `kelas`, `created_at`, `updated_at`) VALUES
(4, 4, '7a', '2021-07-15 14:32:49', '2021-07-15 14:32:49'),
(5, 5, '7b', '2021-07-15 14:33:11', '2021-07-25 17:00:00'),
(6, 6, '8a', '2021-07-15 14:33:37', '2021-07-25 17:00:00'),
(7, 7, '8b', '2021-07-27 14:08:01', '2021-07-27 14:08:01'),
(8, 9, '9a', '2021-07-27 14:08:19', '2021-07-27 14:08:19'),
(9, 11, '9b', '2021-07-27 14:08:43', '2021-07-27 14:08:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola_nilai`
--

CREATE TABLE `kelola_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `mapel`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bahas Indonesia', '2021-07-04 09:13:31', '2021-07-04 09:13:31'),
(2, '2', 'Bahas Inggris', '2021-07-04 09:13:31', '2021-07-23 17:00:00'),
(3, '3', 'IPS', '2021-07-07 19:05:40', '2021-07-25 17:00:00'),
(4, '4', 'Matematika', '2021-07-26 11:13:45', '2021-07-26 11:13:45'),
(5, '5', 'PPKN', '2021-07-26 11:14:20', '2021-07-26 11:14:20'),
(6, '6', 'IPA', '2021-07-26 11:15:17', '2021-07-26 11:15:17'),
(7, '7', 'Pendidikan Agama dan budi pekerti', '2021-07-26 11:16:39', '2021-07-26 11:16:39'),
(8, '8', 'Seni Budaya', '2021-07-26 11:17:01', '2021-07-26 11:17:01'),
(9, '9', 'PJOK', '2021-07-26 11:17:44', '2021-07-26 11:17:44'),
(10, '10', 'Prakarya', '2021-07-26 11:18:02', '2021-07-26 11:18:02'),
(11, '11', 'STAF TU', '2021-07-27 14:05:59', '2021-07-27 14:05:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul`, `guru_id`, `jenis`, `isi`, `created_at`, `updated_at`) VALUES
(5, 'dengarkan ya nak', 4, 'vidio', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iD5AW_Wo8EU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-07-16 06:54:23', '2021-07-26 18:12:57'),
(6, 'mari belajar bersama', 6, 'file', 'public/materi/UbQEEUHgfe2XQCL7ALMPV1lXtTV7Y45CPDjQ833N.docx', '2021-07-24 02:24:39', '2021-07-24 02:24:39'),
(7, 'ambil kesimpulan', 5, 'vidio', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iD5AW_Wo8EU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-07-26 17:48:36', '2021-07-26 17:48:36'),
(8, 'materi 2', 5, 'file', 'public/materi/5bgHP5wpJH19K71WUMFVUPRWORSnBqICdNZeYdCd.docx', '2021-07-26 17:49:25', '2021-07-26 17:49:25'),
(9, 'materi B.indo', 4, 'file', 'public/materi/aRDs7j7wDYXDszjAsBEVrAZHMAlJRjpztGMWLunk.docx', '2021-07-26 18:02:25', '2021-07-26 18:21:23'),
(10, 'a', 4, 'teks', 'qwedtghjjj', '2021-07-28 01:15:14', '2021-07-28 01:15:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_23_152954__create_admin_table', 1),
(5, '2021_04_21_062506_create_gurus_table', 1),
(6, '2021_04_21_062524_create_mapels_table', 1),
(7, '2021_04_22_081458__create_kelas_table', 1),
(8, '2021_04_22_084802__create_siswa_table', 1),
(9, '2021_04_23_051934_create_ujians_table', 1),
(10, '2021_04_23_052120_create_soal_essays_table', 1),
(11, '2021_04_23_052212_create_soal_pilgans_table', 1),
(12, '2021_04_28_075327__create_nilai_pilgan_table', 1),
(13, '2021_04_28_075350__create_nilai_essay_table', 1),
(14, '2021_04_28_075416_create_kelola_nilais_table', 1),
(15, '2021_04_28_103328__create_distribusi_soal_table', 1),
(16, '2021_04_30_041736_create_grups_table', 1),
(17, '2021_04_30_041843_create_materis_table', 1),
(18, '2021_04_30_041919_create_grup_materis_table', 1),
(19, '2021_04_30_041955_create_grup_siswas_table', 1),
(20, '2021_04_30_042030_create_grup_aktivitas_table', 1),
(21, '2021_04_30_042056_create_tugas_table', 1),
(22, '2021_05_01_061712__create_tugas_jawaban_table', 1),
(23, '2021_05_04_110700_create_siswa_ujians_table', 1),
(24, '2021_07_27_143253_add_any_table_guru', 2),
(25, '2021_07_27_170443__add_mapel_id_guru_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_essay`
--

CREATE TABLE `nilai_essay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_detail_soal_essay` int(11) NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jawab` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pilgan`
--

CREATE TABLE `nilai_pilgan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_soal_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pilihan` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` decimal(8,2) NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `kelas_id`, `no_induk`, `nisn`, `password`, `username`, `nama`, `foto`, `tempat_lahir`, `tgl_lahir`, `agama`, `no_telp`, `alamat`, `jenkel`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(6, 4, '3915', '3915', '$2y$10$Gb8IdjstVb9.CMnCPXJWruLRz0re9/O1xXHsEdjN2r85BYpU2HLPe', '3915', 'Anti Suryanti', NULL, 'jambi', '2008-08-12', 'Islam', '081268201776', 'tanjab timur', 'Perempuan', '1', '-', '2021-07-14 17:00:00', '2021-07-25 17:00:00'),
(7, 4, '3939', '3939', '$2y$10$8q2OJ2bk3B4VKQM11.c3redexfhn1k5zLsGNFzJ7ntRS9HlMDR7WC', '3939', 'anggun', NULL, 'jambi', '2008-12-11', 'Islam', '081268201776', 'pandan lagan', 'Perempuan', '1', '-', '2021-07-15 17:00:00', '2021-07-25 17:00:00'),
(8, 4, '3984', '3984', '$2y$10$/fw6piAJF4efxhO0C58Uyuha3.aEumf35JWtAaXeT1cBSs0oIPA3S', '3984', 'findriyani', NULL, 'jambi', '2008-02-01', 'Islam', '082269201988', 'tanjab timur', 'Perempuan', '1', '-', '2021-07-15 17:00:00', '2021-07-25 17:00:00'),
(9, 4, '3953', '3953', '$2y$10$5IvYUf9QQeZOv4.FGsDTF.yiWD1A2qRvqLsHSfWa19mZNeaQkgcgm', '3953', 'rahel tiur rosina', NULL, 'jambi', '2008-03-04', 'Islam', '082269201988', 'pandan lagan', 'Perempuan', '1', '-', '2021-07-15 17:00:00', '2021-07-25 17:00:00'),
(10, 4, '3987', '3987', '$2y$10$WiSML34pYcVdwMjMUaSOPu1ageNp20odA02EXjtBEcbRHyyuKL/uS', '3987', 'akmal apenja', NULL, 'jambi', '2007-06-12', 'Islam', '081268201776', 'pandan lagan', 'Laki-laki', '1', '-', '2021-07-15 17:00:00', '2021-07-25 17:00:00'),
(11, 4, '3976', '3976', '$2y$10$K4IvXDjaws04RAfU1/kLNeStGgxrs//2/PNrRnabG4P4MWQfrj4C2', '3976', 'dedi pratama', NULL, 'jambi', '2007-08-17', 'Islam', '082269201988', 'pandan lagan', 'Laki-laki', '1', '-', '2021-07-15 17:00:00', '2021-07-25 17:00:00'),
(12, 4, '9828', '9828', '$2y$10$XEVr9XgvSjPw9VX1DzRuzuzLw1spIx9hmwz4KsgEmgLLLG38uVALu', '9828', 'Alif Chailsan Pani', NULL, 'tanjab timur', '2007-07-05', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-08-20 17:00:00'),
(13, 4, '9823', '9823', '$2y$10$LilebZhMjxbQRQUyC8VB0uTzstyuNwL/20kCZ4GXt7TC3Arb.zVNe', '9823', 'Alda Rifa', NULL, 'Pandan lagan', '2007-05-20', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(14, 4, '9843', '9843', '$2y$10$3nPqRxzchfJKgep8r.Pn/ObUrH.EXixfxnJ6.uhANts34zV7YwLYG', '9843', 'ARASY NURIYAH RAHMADANI SIREGAR', NULL, 'tanjab timur', '2006-04-22', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(15, 4, '9851', '9851', '$2y$10$7QtEbEfeG.aNO0vG5Yg0C.eirSr/jfVa5ivIlK0T5jn5Mz0/Nmgem', '9851', 'Aziz Alhadid', NULL, 'tanjab timur', '2006-12-12', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(16, 4, '9852', '9852', '$2y$10$ILfolTLLW.LBrC1jIXe0BOnLe2g7WJbnSvBhuLwnKBB6p.tghvt0i', '9852', 'Aziz Athaya', NULL, 'Pandan lagan', '2007-04-22', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(17, 4, '9859', '9859', '$2y$10$dpCj71rFJ/KeUSdAUo62h.5pPw.go9syzS6o.klX5Hy7P.ryOaGUK', '9859', 'Bulan Octha Tiara Ramadhany', NULL, 'tanjab timur', '2006-09-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(18, 4, '9863', '9863', '$2y$10$j9KuEC.mhRSPC3qioI0Ak.FSK2gP8GAG343WwQw.p3oWXjz1RO7Ya', '9863', 'CLAUDIA PUTRI AYU LATRANITA BR GINTING', NULL, 'tanjab timur', '1999-08-02', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(19, 4, '9875', '9875', '$2y$10$ePCbIu6p8eDHFXzJEs0ljuTCnefd5OH31kEem402GdE.ittin3gB6', '9875', 'DIMAS DWI PRASETYO', NULL, 'tanjab timur', '2008-07-08', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(20, 4, '9878', '9878', '$2y$10$F.Oh6AT2t4HGzXqtfMs2quzvtmPbR/thd4mM1v.f3uYjc8zvEtF6m', '9878', 'DINDA TRI ANDINI', NULL, 'Pandan lagan', '2008-01-07', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(21, 4, '9881', '9881', '$2y$10$TygLPXaYbyNakWnJ8ymiTu.k1VPO4DoEoPMV40QYXbBXLuZmtwXom', '9881', 'Echa Harvionita', NULL, 'Janbi', '2001-03-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(22, 4, '9886', '9886', '$2y$10$0mOOyUuNI6E1/gXidVdYlOxq0w5fKemGSDdoQSyuEbFH37qXbX34.', '9886', 'Elviani Eka Putri', NULL, 'tanjab timur', '2002-08-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(23, 4, '9893', '9893', '$2y$10$mG31HFs2X61BZfohEGxxfeC0tYBnTvZ8OGgAYoql9wrzn8lnXciGq', '9893', 'Feby', NULL, 'tanjab timur', '2006-07-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(24, 4, '9894', '9894', '$2y$10$aBGBA3O/jdnQ/et0/IDNlOQ01eI79P8/g6WnWcZgjuokieL/KdWCi', '9894', 'FENESIA DELAYA WIJAYA', NULL, 'tanjab timur', '2007-05-03', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(25, 4, '9900', '9900', '$2y$10$Cs4cl5mwGuhxafxNT.yZduERbjKuF4pe.L.9/KZ7sqmxI2SxJ3ugO', '9900', 'Firyal Najla \'Afifah', NULL, 'Pandan lagan', '2007-09-02', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(26, 5, '9903', '9903', '$2y$10$Ru8VYroyDZwwtO2Ru6.Meuwjdm3iUy0R6wMGxv8fPJCYOBLwYsa7u', '9903', 'Gabby Cassey Adinda', NULL, 'tanjab timur', '2007-01-04', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(27, 5, '9905', '9905', '$2y$10$5znQZu154BfNrWt2JFAHIujg6jy7UphWvd3JHajSMH31nCYQjXqAW', '9905', 'GRACE OLIVIA SIMANJUNTAK', NULL, 'jambi', '2007-03-06', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(28, 5, '9906', '9906', '$2y$10$t3fxNHEi4pm9TfjkDId9RuAXqaqUw4JfoYHCTKLZ4uqmqza8Y22jS', '9906', 'Gustia Dwi Saraswati', NULL, 'Pandan lagan', '2007-04-06', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(29, 5, '9924', '9924', '$2y$10$TyNq32wJo2XLwjZnU79ZrefC6eKWMM5Dr3RwKcfI4ymnLJwYacPje', '9924', 'KHOIRUL MUBAROQ', NULL, 'Janbi', '2007-08-09', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(30, 5, '9937', '9937', '$2y$10$8rvAVAG/RGEsUAAMhZ4vlezlLODe6kVxqyPxR.yGvlfXevGSO1FeO', '9937', 'M.Iqbal Alfariz', NULL, 'tanjab timur', '2007-08-03', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(31, 5, '9941', '9941', '$2y$10$2fGEDEiGTk7NlpHQ09ROqeX/KO9mQeZ1JGAt.41lrOOtioiRMqYd6', '9941', 'Marsa Della Anjelica', NULL, 'Pandan lagan', '2007-08-01', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(32, 5, '9942', '9942', '$2y$10$udREwIzfHlTSvPTYQqi52eQ4Psk7smCdpP/gtuYR6cgwK0W47S2y2', '9942', 'MELANI SYAH RAHMADHANI', NULL, 'tanjab timur', '2008-08-08', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(33, 5, '9944', '9944', '$2y$10$NREUTSU7LsRBUfKzjaHq5ON9YQ7QXWP3lz9yzc0EFruYTsla3BVS.', '9944', 'Meliyana', NULL, 'jambi', '2007-09-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(34, 5, '9945', '9945', '$2y$10$JfJT9wOGFZa0KoilsR9LEOsp0m3t.uBl4A3cAxwj01ztGYOs.7aqq', '9945', 'Meryl Adelia Nababan', NULL, 'jambi', '2007-08-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(35, 5, '9946', '9946', '$2y$10$A6njwFu5vsQ0G0endj0YWuYFZ5UyH6SWP.tqRSfhn74Daf3bceKau', '9946', 'Muhamad Gilang Saputra', NULL, 'jambi', '2007-02-08', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(36, 5, '9985', '9985', '$2y$10$S93.48RBrNTFdGC4BT5xb.t3KseiwRJ6et5AVbPlYWrjPIup8/sKS', '9985', 'Muhamad Gilang Saputra', NULL, 'jambi', '2007-02-08', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(37, 5, '9987', '9987', '$2y$10$koEecDnCopBMBeE/jr/oaObeLj8zIQOblnvcZYXqhjida1RbGTkh.', '9987', 'Puan Maharani', NULL, 'jambi', '2007-07-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(38, 5, '9992', '9992', '$2y$10$4VwR1uiObsV5IHSfi89DCuC6T42ZmuEAvNov9dyMTqKCU7qeIzQVe', '9992', 'Rahmat Yeremia Hutagaol', NULL, 'Pandan lagan', '2007-09-09', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(39, 5, '10002', '10002', '$2y$10$/lTUhUcDqW.0ZRIKZGKarOui1V5RA1UBvNeCdCoM7bjL.kLKoxutO', '10002', 'Renata Ria Josephine Panjaitan', NULL, 'Pandan lagan', '2007-09-09', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(40, 5, '10009', '10009', '$2y$10$Q6gt2KOxqazVK3.Q2urIMej/lqgUeohKh.sZx06LFGts.M7V6ZllC', '10009', 'Rio Rhelanses Eliston Lubis', NULL, 'Pandan lagan', '2007-05-04', 'Islam', '082233474872', 'tanjab timur', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(41, 5, '10011', '10011', '$2y$10$Q6o/gJfjTbrcKaeliD76yuv0rXxd.wCiwqjyT8E8Gv1RlWwLt/eRG', '10011', 'RISKI PERMANA', NULL, 'rasau', '2007-06-23', 'Islam', '082233474872', 'jambi', 'Laki-laki', '1', 'siswa', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(42, 5, '10016', '10016', '$2y$10$uckAfdtNLLyuXjYmVitAxus/yxeu7XRq09TzzvJ7CzrnXBsL3stAW', '10016', 'RIZKY MARUDUR ULINA SIANIPAR', NULL, 'tanjab timur', '2007-03-23', 'Kristen', '082233474872', 'pandan lagan', 'Laki-laki', '1', '-', '2021-07-25 17:00:00', '2021-07-25 17:00:00'),
(43, 5, '10025', '10025', '$2y$10$p1d1C6vprST0miLSsYin4.QA3wTBG7A5wu4KH68G7gFY1hXAcz9xS', '10025', 'Samuel Tampubolon', NULL, 'Pandan lagan', '2008-12-16', 'Kristen', '082233474872', 'pandan lagan', 'Laki-laki', '1', '-', '2021-07-26 17:00:00', '2021-07-26 17:00:00'),
(44, 5, '10055', '10055', '$2y$10$nHEfsqb/5Qzh5VlWfwW7yOSgzJ6Ny3VcH33AOCBRotHyv9t.Iuwgi', '10055', 'YOANDA RISKI SALSABILA', NULL, 'Pandan lagan', '2007-07-23', 'Islam', '082233474872', 'pandan makmur', 'Perempuan', '1', '-', '2021-07-26 17:00:00', '2021-07-26 17:00:00'),
(45, 5, '10054', '10054', '$2y$10$QfLPceEK5jbkJ46CYFw.d.nqzYFuQ0ywnNivyZy52iwHmC2GQsEVq', '10054', 'Yolanda Emmanuella', NULL, 'Pandan lagan', '2007-11-19', 'Islam', '082233474872', 'tanjab timur', 'Perempuan', '1', '-', '2021-07-26 17:00:00', '2021-07-26 17:00:00'),
(46, 4, '9910', '9910', '$2y$10$A1nu6uxYYnbiXnIhfakJhO5aodIz1WicRspj4K0JWuvO9/ETIOhw6', '9910', 'Heldi Prasatya', NULL, 'pekan baru', '2007-09-19', 'Kristen', '081268201776', 'pandan sejahtera', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(47, 4, '9922', '9922', '$2y$10$/tmPxfCQXT90eb74U8ElueaUsTep3Cl51p/IHd6x8WsAdu5g8soCW', '9922', 'Kayla Putri Anindya', NULL, 'merlung', '2007-12-12', 'Islam', '082269201988', 'pandan lagan', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(48, 4, '9935', '9935', '$2y$10$t1o7v4O3Abv2TwNlNt6Ow.ym8JqnkytUBOs9w692HeGVVk/R3/Jyi', '9935', 'M. Fiqram Chan Safetra', NULL, 'Muara sabak', '2007-11-24', 'Islam', '082269201988', 'pandan lagan', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(49, 4, '9932', '9932', '$2y$10$5VibuiAsOrLtce/HHpP7eOdAWUTJvkPAjBEmE95R4M5eKIjcLV/.e', '9932', 'M. Raihan Khadafi', NULL, 'kuala tungkal', '2007-09-17', 'Islam', '082269201988', 'pandan sejahtera', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(50, 4, '9947', '9947', '$2y$10$sZGqo4wdmwxe41Pm31fnoesKCNHlhNbtw9Ico8nRo0t17waGVv8si', '9947', 'M.Adrian', NULL, 'merlung', '2007-11-19', 'Islam', '082269201988', 'pandan lagan', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(51, 4, '9940', '9940', '$2y$10$GJH7GMi3wQ9eE444m2jkpOpN05lYLKsVUnmGXQAWtbiuay5uouIe6', '9940', 'Madan Oza Saputra', NULL, 'pandan lagan', '2008-12-19', 'Islam', '081268201776', 'blok c pandan lagan', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(52, 4, '9948', '9948', '$2y$10$41Yi1hY12r2i02Ea/TNnXueHbPCaJsWGyf2AU5OuKAvUUvPfm4Huq', '9948', 'MUHAMMAD ARBAYA NUGRAHA', NULL, 'pandan sejahtera', '2008-08-25', 'Islam', '082269201988', 'pandan lagan', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(53, 4, '9949', '9949', '$2y$10$0sJIUJqJfXfxPAszsdZuV.xIPYYa533jWfUd2qN9yIB7/wy44bSIO', '9949', 'Muhammad Arnold Falah', NULL, 'plabi jhon 5', '2007-01-12', 'Islam', '082269201988', 'plabi', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(54, 4, '9972', '9972', '$2y$10$T/ASgQ0UgGuSOZxU.FSjhe.pp7nW11Dp6J/MOFf9t/kI2mP13sPSu', '9972', 'Nailah Arista Zahrani', NULL, 'pasar blok d', '2007-02-23', 'Islam', '082269201988', 'blok d', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(55, 4, '9980', '9980', '$2y$10$g9b7hxqSuutdsnJCSwVtlevPBILVZb1X6XanYBvGds1.boTwdVxum', '9980', 'Nina Yuliana', NULL, 'rimbo bujang', '2007-02-03', 'Islam', '081268201776', 'blok b', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(56, 5, '9988', '9988', '$2y$10$LdNkBeyaMHh0xw7Gv9QNgOxyJZN0mAiwQzXls3sdHi9tPkP4v9Tu6', '9988', 'PUTRA PRATAMA', NULL, 'pematang lumut', '2007-05-05', 'Islam', '081268201776', 'pematang lumut', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(57, 5, '9990', '9990', '$2y$10$dlTFBBfmTjDfXoEPETFB3uSiLuPaIf5l7mhQgMOIXhKE.ojGcQkqK', '9990', 'Putri Zahra Aisyah', NULL, 'palembang', '2007-12-11', 'Islam', '082269201988', 'pandan lagan', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(58, 5, '10024', '10024', '$2y$10$7iodjhIsKoLAlwJaWC2hiubI1SBugpLi5.M5e.UutxqZveN7CvzFW', '10024', 'Salsabila Nurul Badria', NULL, 'kampung laut', '2008-06-06', 'Islam', '082269201988', 'kampung laut', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(59, 5, '10047', '10047', '$2y$10$76cFPpVk5SdKeC.CYhJGouzByO2XlrItLhqNwXj8K60yJuFDG7rda', '10047', 'Wahyu Saputra Sidauruk', NULL, 'merlung', '2007-08-08', 'Kristen', '082269201988', 'pandan lagan', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(60, 5, '10050', '10050', '$2y$10$RwzSIY5nEOfxbZg6gtS7iOPzA7VmDsQCtduh4j83B.9vsy6jvcz5u', '10050', 'Winda Meilina Ginting', NULL, 'kalimantan', '2006-02-16', 'Islam', '082269201988', 'pandan sejahtera', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(61, 5, '9814', '9814', '$2y$10$kc67C7l2le2oT6OjoM/lEujpWkfjp0A66mZF3.WVwLsodlI5GrLeW', '9814', 'ADE SAPUTRA', NULL, 'jambi', '2007-12-12', 'Islam', '082269201988', 'jhon 5', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(62, 5, '9815', '9815', '$2y$10$gjW7tFWci5Yg7r1DO4HA8eavBAVb3lSnU8TIcHRDtAm7svrrC/p4.', '9815', 'ADELIA HANNA RIRIS SIHOMBING', NULL, 'pematang lumut', '2007-08-18', 'Kristen', '081268201776', 'pematang lumut', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(63, 5, '9817', '9817', '$2y$10$rCjUYoRiW7iMAYbSeeZn0ekcicRgS/VuwdZs7X15KNyUXbjrEGJCO', '9817', 'Affan Risfiantoro', NULL, 'aceh barat', '2008-08-08', 'Islam', '082269201988', 'pematang lumut', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(64, 5, '9819', '9819', '$2y$10$jq1J57zOCvAP1vqxYfyyvu5IcvFKNDl2djx6e73ASLrnCJ.Jct0eu', '9819', 'AHMAD HERYANSYAH', NULL, 'banyuwangi', '2007-02-04', 'Islam', '081268201776', 'pematang lumut', 'Laki-laki', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00'),
(65, 5, '9831', '9831', '$2y$10$mjseq5AhunJI4G6MzM9e8.T2povwzC4UZ3ABcwa9LnbJF2FOnE5iy', '9831', 'Amanda Harifah Putri Harahap', NULL, 'padang', '2007-03-04', 'Islam', '082269201988', 'jhon 5', 'Perempuan', '1', 'siswa', '2021-08-20 17:00:00', '2021-08-20 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_ujian`
--

CREATE TABLE `siswa_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa_ujian`
--

INSERT INTO `siswa_ujian` (`id`, `siswa_id`, `waktu_mulai`, `waktu_selesai`, `created_at`, `updated_at`) VALUES
(4, 7, '2021-07-16 14:10:08', NULL, '2021-07-16 07:10:08', '2021-07-16 07:10:08'),
(5, 9, '2021-07-27 01:23:00', NULL, '2021-07-26 18:23:00', '2021-07-26 18:23:00'),
(6, 9, '2021-07-27 01:24:16', NULL, '2021-07-26 18:24:16', '2021-07-26 18:24:16'),
(7, 9, '2021-07-27 01:24:28', NULL, '2021-07-26 18:24:28', '2021-07-26 18:24:28'),
(8, 9, '2021-07-27 01:24:50', NULL, '2021-07-26 18:24:50', '2021-07-26 18:24:50'),
(9, 6, '2021-07-27 09:07:58', NULL, '2021-07-27 02:07:58', '2021-07-27 02:07:58'),
(10, 6, '2021-07-27 09:10:52', NULL, '2021-07-27 02:10:52', '2021-07-27 02:10:52'),
(11, 6, '2021-07-27 10:07:25', NULL, '2021-07-27 03:07:25', '2021-07-27 03:07:25'),
(12, 6, '2021-07-28 01:05:21', NULL, '2021-07-27 18:05:21', '2021-07-27 18:05:21'),
(13, 11, '2021-07-28 08:21:10', NULL, '2021-07-28 01:21:10', '2021-07-28 01:21:10'),
(14, 11, '2021-07-28 08:21:16', NULL, '2021-07-28 01:21:16', '2021-07-28 01:21:16'),
(15, 11, '2021-07-28 08:22:18', NULL, '2021-07-28 01:22:18', '2021-07-28 01:22:18'),
(16, 6, '2021-07-28 08:30:29', NULL, '2021-07-28 01:30:29', '2021-07-28 01:30:29'),
(17, 10, '2021-07-28 08:50:09', NULL, '2021-07-28 01:50:09', '2021-07-28 01:50:09'),
(18, 10, '2021-07-28 08:50:42', NULL, '2021-07-28 01:50:42', '2021-07-28 01:50:42'),
(19, 6, '2021-07-28 08:59:14', NULL, '2021-07-28 01:59:14', '2021-07-28 01:59:14'),
(20, 13, '2021-07-28 09:01:31', NULL, '2021-07-28 02:01:31', '2021-07-28 02:01:31'),
(21, 7, '2021-07-28 09:13:15', NULL, '2021-07-28 02:13:15', '2021-07-28 02:13:15'),
(22, 42, '2021-08-03 19:11:05', NULL, '2021-08-03 12:11:05', '2021-08-03 12:11:05'),
(23, 7, '2021-08-19 01:30:53', NULL, '2021-08-18 18:30:53', '2021-08-18 18:30:53'),
(24, 7, '2021-08-19 01:32:06', NULL, '2021-08-18 18:32:06', '2021-08-18 18:32:06'),
(25, 7, '2021-08-19 01:33:48', NULL, '2021-08-18 18:33:48', '2021-08-18 18:33:48'),
(26, 6, '2021-08-25 19:30:38', NULL, '2021-08-25 12:30:38', '2021-08-25 12:30:38'),
(27, 6, '2021-08-25 19:30:56', NULL, '2021-08-25 12:30:56', '2021-08-25 12:30:56'),
(28, 6, '2021-08-25 19:31:13', NULL, '2021-08-25 12:31:13', '2021-08-25 12:31:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_essay`
--

CREATE TABLE `soal_essay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `soal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_pilgan`
--

CREATE TABLE `soal_pilgan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `pil_a` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pil_b` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pil_c` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pil_d` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal_pilgan`
--

INSERT INTO `soal_pilgan` (`id`, `soal`, `ujian_id`, `guru_id`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `jenis`, `skor`, `created_at`, `updated_at`) VALUES
(7, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">Berita tersebut berisikan tentang …</span><br></p>', 2, 4, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;kasus penganiayaan orang tua kandung terhadap anak</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;kekerasan orang tua oleh anak kandung</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;peristiwa pembunuhan seorang anak oleh ibu angkatnya sendiri</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;perlakuan layaknya budak oleh ibu angkat</span><br></p>', 'C', 'Latihan', 20, '2021-07-27 17:58:26', '2021-07-27 17:58:26'),
(8, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">Urutan penyampaian informasi pada paragraf berita di atas ialah …</span>', 2, 4, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Apa, Kenapa, Bagaimana</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Siapa, mengapa, apa</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Apa, apa, apa</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Kenapa, siapa, apa</span>', 'A', 'Latihan', 20, '2021-07-27 17:59:55', '2021-07-27 17:59:55'),
(9, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">Di bawah ini adalah peryataan yang tepat untuk dijadikan judul pada berita di atas ialah …</span>', 2, 4, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">Hujan di kota padang</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Warga masyarakat terganggu</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Hujan melanda kota Padang selama berhari-hari, Walikota Himbau agar sedia Jaz Hujan</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Walikota menghimbau agar warga membeli jaz hujan</span>', 'C', 'Latihan', 20, '2021-07-27 18:01:10', '2021-07-27 18:01:10'),
(10, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;di bawah ini contoh penulisan alamat pada surat dinas yang benar ialah …</span>', 2, 4, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Yth. Bapak Kepala SMA Muhammadiyah 03 Bangun Rejo</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">Yth. Bapak Kepala Sekolah SMAN BANGUN REJO</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;YTH. Kepada bapak kepala sekolah SMA Muhammadiyah 03 Bangun Rejo</span>', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word; color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">Yth. Kepsek SMA Muhammadiyah 03 Bangun Rejo</p>', 'A', 'Latihan', 20, '2021-07-27 18:02:41', '2021-07-27 18:02:41'),
(11, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Di bawah ini adalah ciri-ciri dari pantun, kecuali …</span>', 2, 4, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Terdiri dari bait yang ganjil</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Terdiri dari bait genap</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Tiap bait terdiri atas sampiran dan isi</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px;\">&nbsp;Bersajak</span>', 'A', 'Latihan', 20, '2021-07-27 18:04:04', '2021-07-27 18:04:04'),
(12, '<p><span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Penggunaan kata-kata asing yang mengandung arti pertempuran dapat ditemukan dalam jumlah kata....</span><br></p>', 3, 4, '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'A', 'Latihan', 50, '2021-07-28 01:46:42', '2021-07-28 01:48:30'),
(13, '<span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Penambahan asing yang mengandung lebih banyak atau berbeda arti dapat ditemukan di nomor kata.</span>', 3, 4, '1', '2', '3', '4', 'B', 'Latihan', 50, '2021-07-28 01:47:28', '2021-07-28 01:48:21'),
(14, '<span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">Dalam teks berikut Anda akan menemukan contoh majelis yang sesuai dengan konten teks deskripsi di atas.</span>', 1, 4, '<span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Rumah tradisional yang terbuat dari kayu berkualitas tinggi dengan dekorasi yang unik</span>', '<span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Ukiran di seluruh rumah berkontribusi pada penampilannya yang indah</span>', '<span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">Tongkonan dihiasi dengan tanduk kerbau yang tertanam</span>', '<span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Rumah Tongkonan, yang berbaris dengan baik dan rapi, mengundang.</span>', 'D', 'Ujian', 20, '2021-07-28 02:12:16', '2021-07-28 02:37:11'),
(15, '<p><span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">Sifat Nataga dalam kutipan teks pertama adalah.</span><br></p>', 1, 4, '<p><span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">Pengecut</span><br></p>', '<p><span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;berani</span><br></p>', '<p><span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Malas</span><br></p>', '<p><span style=\"color: rgb(44, 62, 80); font-family: sans-serif; font-size: 18px;\">&nbsp;Jolly</span><br></p>', 'B', 'Ujian', 20, '2021-07-28 02:39:37', '2021-07-28 02:39:37'),
(16, '<p><span style=\"text-shadow: rgba(0, 0, 0, 0.024) 1px 1px 1px; font-weight: 700; color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; -webkit-font-smoothing: antialiased !important; backface-visibility: hidden !important;\"><span style=\"font-weight: 500;\">Ruang kelas kami luas dan menyenangkan. Ukurannya 6 x 8 m. Penerangan listrik di dalam kelas dapat digunakan pada waktu mendung dan malam hari. Lantainya terbuat dari keramik berwarna putih. Ruangan dalam kelas itu dicat warna hijau telur bebek. Meja dan kursinya terbuat dari kayu dan diplitur. Ruangan itu sangat tenang dan sejuk karena jauh dari jalan raya.</span><br></span></p><p><span style=\"text-shadow: rgba(0, 0, 0, 0.024) 1px 1px 1px; font-weight: 700; color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; -webkit-font-smoothing: antialiased !important; backface-visibility: hidden !important;\">Paragraf tersebut merupakan pengembangan dari sebuah topik ….</span></p>', 4, 4, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">&nbsp;Ruang kelasku luas dan menyenangkan.</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">Ruanganku jauh dari jalan.</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">Ruang kelasku berlantai keramik.</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">Fasilitas ruangan kelasku.</span><br></p>', 'A', 'Ujian', 50, '2021-08-25 12:26:45', '2021-08-25 12:26:45'),
(17, '<p><span style=\"text-shadow: rgba(0, 0, 0, 0.024) 1px 1px 1px; font-weight: 700; color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; -webkit-font-smoothing: antialiased !important; backface-visibility: hidden !important;\"><span style=\"font-weight: 500;\">Ruang kelas kami luas dan menyenangkan. Ukurannya 6 x 8 m. Penerangan listrik di dalam kelas dapat digunakan pada waktu mendung dan malam hari. Lantainya terbuat dari keramik berwarna putih. Ruangan dalam kelas itu dicat warna hijau telur bebek. Meja dan kursinya terbuat dari kayu dan diplitur. Ruangan itu sangat tenang dan sejuk karena jauh dari jalan raya.</span><br></span></p><p><span style=\"text-shadow: rgba(0, 0, 0, 0.024) 1px 1px 1px; font-weight: 700; color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; -webkit-font-smoothing: antialiased !important; backface-visibility: hidden !important;\">Kalimat utama paragraf tersebut terletak ….</span></p>', 4, 4, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">di awal paragraf</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">di akhir paragraf</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">di awal dan akhir paragraf</span>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">menyebar ke seluruh paragraf</span>', 'B', 'Ujian', 50, '2021-08-25 12:28:04', '2021-08-25 12:28:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `grup_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `guru_id`, `grup_id`, `kelas_id`, `jenis`, `isi`, `batas_waktu`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'ambil kesimpulan dari video tersebut', 4, 4, 4, 'teks', 'https://youtu.be/Uro3GUlUfFQ', '2021-07-28 00:00:00', 'jangan sampai telat nak', '2021-07-15 17:00:00', '2021-07-27 17:00:00'),
(4, 'pahami dan ambil kesimpulan', 5, 6, 5, 'vidio', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iD5AW_Wo8EU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-07-28 11:59:00', 'jangan sampai telat ya nak!!!', '2021-07-26 17:00:00', '2021-07-26 17:00:00'),
(5, 'mari belajar bersama', 5, 6, 5, 'file', 'public/tugas/Dnk6uHk3KOjZuz8Kwfb2NzJtPsYZtJiukgJ3egnA.docx', '2021-07-28 11:59:00', 'semangat ya', '2021-07-26 17:00:00', '2021-07-26 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_jawaban`
--

CREATE TABLE `tugas_jawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas_jawaban`
--

INSERT INTO `tugas_jawaban` (`id`, `tugas_id`, `siswa_id`, `jenis`, `isi`, `score`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'teks', 'sdcygnhgjyfyjtg', '79', '3', 'hgchjqqqqqqqqq', '2021-07-15 17:00:00', '2021-07-27 17:46:35'),
(2, 1, 9, 'teks', 'sdfhlsiaufgwhefkhu', '70', '3', 'kyefgwelbhdksnjc', '2021-07-26 17:00:00', '2021-07-26 18:18:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` enum('Ujian','Latihan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id`, `mapel_id`, `guru_id`, `jenis`, `paket`, `deskripsi`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Ujian', 'Ujian MID', 'selamat ngerjakan!!!', '60', '2021-07-26 17:00:00', '2021-07-27 17:00:00'),
(2, 1, 4, 'Latihan', 'latihan 2', 'selamat mengerjakan', '60', '2021-07-27 17:00:00', '2021-07-27 17:00:00'),
(3, 1, 4, 'Latihan', 'latihan 3', 'jawab yg bner', '10', '2021-07-27 17:00:00', '2021-07-27 17:00:00'),
(4, 1, 4, 'Ujian', 'Mid', 'Abg', '60', '2021-08-24 17:00:00', '2021-08-24 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indeks untuk tabel `distribusi_soal`
--
ALTER TABLE `distribusi_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_guru_id_foreign` (`guru_id`),
  ADD KEY `grup_mapel_id_foreign` (`mapel_id`),
  ADD KEY `grup_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `grup_aktivitas`
--
ALTER TABLE `grup_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_aktivitas_grup_id_foreign` (`grup_id`),
  ADD KEY `grup_aktivitas_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `grup_materi`
--
ALTER TABLE `grup_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_materi_grup_id_foreign` (`grup_id`),
  ADD KEY `grup_materi_materi_id_foreign` (`materi_id`),
  ADD KEY `grup_materi_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `grup_siswa`
--
ALTER TABLE `grup_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_siswa_siswa_id_foreign` (`siswa_id`),
  ADD KEY `grup_siswa_grup_id_foreign` (`grup_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_no_induk_unique` (`no_induk`),
  ADD UNIQUE KEY `guru_username_unique` (`username`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `kelola_nilai`
--
ALTER TABLE `kelola_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelola_nilai_siswa_id_foreign` (`siswa_id`),
  ADD KEY `kelola_nilai_guru_id_foreign` (`guru_id`),
  ADD KEY `kelola_nilai_kelas_id_foreign` (`kelas_id`),
  ADD KEY `kelola_nilai_mapel_id_foreign` (`mapel_id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_essay`
--
ALTER TABLE `nilai_essay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_essay_ujian_id_foreign` (`ujian_id`),
  ADD KEY `nilai_essay_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `nilai_pilgan`
--
ALTER TABLE `nilai_pilgan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_pilgan_ujian_id_foreign` (`ujian_id`),
  ADD KEY `nilai_pilgan_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilai_pilgan_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_username_unique` (`username`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `siswa_ujian`
--
ALTER TABLE `siswa_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_ujian_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `soal_essay`
--
ALTER TABLE `soal_essay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_essay_ujian_id_foreign` (`ujian_id`),
  ADD KEY `soal_essay_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_pilgan_ujian_id_foreign` (`ujian_id`),
  ADD KEY `soal_pilgan_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_guru_id_foreign` (`guru_id`),
  ADD KEY `tugas_grup_id_foreign` (`grup_id`),
  ADD KEY `tugas_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tugas_jawaban`
--
ALTER TABLE `tugas_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_jawaban_tugas_id_foreign` (`tugas_id`),
  ADD KEY `tugas_jawaban_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujian_mapel_id_foreign` (`mapel_id`),
  ADD KEY `ujian_guru_id_foreign` (`guru_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `distribusi_soal`
--
ALTER TABLE `distribusi_soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `grup`
--
ALTER TABLE `grup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `grup_aktivitas`
--
ALTER TABLE `grup_aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `grup_materi`
--
ALTER TABLE `grup_materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `grup_siswa`
--
ALTER TABLE `grup_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kelola_nilai`
--
ALTER TABLE `kelola_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `nilai_essay`
--
ALTER TABLE `nilai_essay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai_pilgan`
--
ALTER TABLE `nilai_pilgan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `siswa_ujian`
--
ALTER TABLE `siswa_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tugas_jawaban`
--
ALTER TABLE `tugas_jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `grup_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `grup_aktivitas`
--
ALTER TABLE `grup_aktivitas`
  ADD CONSTRAINT `grup_aktivitas_grup_id_foreign` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_aktivitas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `grup_materi`
--
ALTER TABLE `grup_materi`
  ADD CONSTRAINT `grup_materi_grup_id_foreign` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_materi_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_materi_materi_id_foreign` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `grup_siswa`
--
ALTER TABLE `grup_siswa`
  ADD CONSTRAINT `grup_siswa_grup_id_foreign` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelola_nilai`
--
ALTER TABLE `kelola_nilai`
  ADD CONSTRAINT `kelola_nilai_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelola_nilai_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelola_nilai_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelola_nilai_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_essay`
--
ALTER TABLE `nilai_essay`
  ADD CONSTRAINT `nilai_essay_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_essay_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_pilgan`
--
ALTER TABLE `nilai_pilgan`
  ADD CONSTRAINT `nilai_pilgan_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_pilgan_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_pilgan_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_ujian`
--
ALTER TABLE `siswa_ujian`
  ADD CONSTRAINT `siswa_ujian_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_essay`
--
ALTER TABLE `soal_essay`
  ADD CONSTRAINT `soal_essay_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `soal_essay_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  ADD CONSTRAINT `soal_pilgan_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `soal_pilgan_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_grup_id_foreign` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas_jawaban`
--
ALTER TABLE `tugas_jawaban`
  ADD CONSTRAINT `tugas_jawaban_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_jawaban_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ujian_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
