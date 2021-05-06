-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2021 pada 12.25
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_learning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$VPLfDBrraCiMJAHDCYu9Ie.SrGmFUjHRM6Q1sgN4CeIdNZtiKriKC', 'Admin', '2021-04-30 22:00:11', '2021-04-30 22:00:11');

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
(1, 1, 1, '2021-04-30 23:39:54', '2021-04-30 23:39:54'),
(2, 2, 1, '2021-05-01 19:47:47', '2021-05-01 19:47:47'),
(3, 3, 1, '2021-05-01 20:07:26', '2021-05-01 20:07:26'),
(4, 4, 1, '2021-05-01 23:11:28', '2021-05-01 23:11:28'),
(5, 5, 2, '2021-05-01 23:32:08', '2021-05-01 23:32:08'),
(6, 6, 1, '2021-05-02 01:45:02', '2021-05-02 01:45:02'),
(7, 7, 1, '2021-05-02 02:29:43', '2021-05-02 02:29:43'),
(8, 8, 1, '2021-05-02 02:31:20', '2021-05-02 02:31:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'fiNNq', 1, 1, 1, 'a', NULL, '2021-04-30 22:01:18', '2021-04-30 22:01:18'),
(2, 'oIWnc', 3, 1, 2, 'a', NULL, '2021-05-01 23:30:03', '2021-05-01 23:30:03');

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
(3, 1, 1, 'Melihat Daftar Materi Grup 7A', '2021-04-30 22:50:09', '2021-04-30 22:50:09'),
(4, 1, 1, 'Melihat Daftar Materi Grup 7A', '2021-04-30 22:50:33', '2021-04-30 22:50:33'),
(5, 1, 1, 'Melihat Daftar Materi Grup 7A', '2021-04-30 22:50:37', '2021-04-30 22:50:37'),
(6, 1, 1, 'Keluar dari grup', '2021-05-01 06:55:11', '2021-05-01 06:55:11'),
(7, 1, 1, 'Melihat Daftar Materi Grup 7A', '2021-05-02 02:49:50', '2021-05-02 02:49:50');

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
(19, 3, 1, '1', 'Di Undang', '2021-05-01 00:24:04', '2021-05-01 00:24:04'),
(22, 1, 1, '1', 'Di Undang', '2021-05-01 06:56:01', '2021-05-01 06:56:01'),
(23, 2, 2, '1', 'Di Undang', '2021-05-01 23:30:16', '2021-05-01 23:30:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `no_induk`, `password`, `username`, `nama`, `tempat_lahir`, `tgl_lahir`, `agama`, `no_telp`, `alamat`, `jenkel`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '1', '$2y$10$ODTlw/A89K0mO.BrmXy/ieLg9gd/0ZP3wdcUdnqKWBXnXoU4ITAQu', 'guru', 'Guru', 'Jambi', '2021-05-01', 'Islam', '089998', 'Jambi', 'L', '1', 'guru1', '2021-04-30 22:00:11', '2021-04-30 22:00:11'),
(2, '2', '$2y$10$BKFzn8K6QTr09NIwNgNA0.wnZZXp1oYVaxDJWHL3VPZZdhKPaLsiO', 'guru2', 'Guru2', 'Jambi', '2021-05-01', 'Islam', '089998', 'Jambi', 'L', '1', 'guru1', '2021-04-30 22:00:11', '2021-04-30 22:00:11'),
(3, '3', '$2y$10$m1ZPXwiWmSDxLMwbv0oRn.qXJUkb1Sx00bpQoJJR6FGc1W39DyXUC', 'wedus', 'wedus', 'Jambi', '2021-01-01', 'Islam', 'wedus', 'a', 'L', '1', 'a', '2021-05-01 17:00:00', '2021-05-01 17:00:00');

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
(1, 1, '7A', '2021-04-30 22:00:11', '2021-04-30 22:00:11'),
(2, 2, '7B', '2021-04-30 22:00:11', '2021-04-30 22:00:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola_nilai`
--

CREATE TABLE `kelola_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelola_nilai`
--

INSERT INTO `kelola_nilai` (`id`, `siswa_id`, `kelas_id`, `mapel_id`, `guru_id`, `nilai`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 100, 'Latihan', NULL, NULL),
(2, 1, 1, 1, 1, 100, 'tugas', NULL, NULL);

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
(1, '1', 'Bahas Indo', '2021-04-30 22:00:11', '2021-04-30 22:00:11'),
(2, '2', 'Bahasa Inggris', '2021-04-30 22:03:41', '2021-04-30 22:03:41');

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
(8, 'Materi 1', 1, 'file', 'public/materi/PVZU8JM6zR2edaYxDJTm9FdedQhtbNH6iDHoF6uu.docx', '2021-05-01 23:09:40', '2021-05-01 23:09:40');

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
(22, '2021_04_30_042120_create_tugas_jawabans_table', 1),
(23, '2021_05_01_061712__create_tugas_jawaban_table', 2);

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

--
-- Dumping data untuk tabel `nilai_essay`
--

INSERT INTO `nilai_essay` (`id`, `id_detail_soal_essay`, `ujian_id`, `siswa_id`, `jawab`, `score`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 1, 'Doa indonesia aman', '0.00', 1, '2021-05-02 02:14:15', '2021-05-02 02:22:11'),
(2, 4, 8, 1, 'Iya', '0.00', 1, '2021-05-02 02:32:29', '2021-05-02 02:32:43'),
(3, 5, 8, 1, 'Pasti Lah', '0.00', 1, '2021-05-02 02:32:39', '2021-05-02 02:32:43'),
(4, 2, 4, 1, 'Mboh', '0.00', 1, '2021-05-02 03:22:02', '2021-05-02 03:22:05');

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

--
-- Dumping data untuk tabel `nilai_pilgan`
--

INSERT INTO `nilai_pilgan` (`id`, `no_soal_id`, `ujian_id`, `siswa_id`, `kelas_id`, `nama`, `pilihan`, `benar`, `salah`, `score`, `status`, `revisi`, `created_at`, `updated_at`) VALUES
(1, '20', 7, 1, 1, 'Siswa', 'A', '1', '0', '50.00', '1', 0, '2021-05-02 03:20:20', '2021-05-02 03:20:33'),
(2, '21', 7, 1, 1, 'Siswa', 'D', '1', '0', '50.00', '1', 0, '2021-05-02 03:20:29', '2021-05-02 03:20:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `kelas_id`, `no_induk`, `password`, `username`, `nama`, `tempat_lahir`, `tgl_lahir`, `agama`, `no_telp`, `alamat`, `jenkel`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '$2y$10$4Xbdju4zY1kIVf/hX6NP.uavUG9atsHeLhOGJNjXvLSI8f15hD7V.', 'siswa', 'Siswa', 'Jambi', '2021-05-01', 'Islam', '0899898', 'Jambi', 'L', '1', 'siswa1', '2021-04-30 22:00:11', '2021-04-30 22:00:11'),
(2, 2, '2', '$2y$10$RJEELP6V6.Pbo4mOHTQxUeRxGQ5krqXjAPfR2tpwl3.SdfiML1V1i', 'siswa2', 'Siswa2', 'Jambi', '2021-05-01', 'Islam', '0899898', 'Jambi', 'L', '1', 'siswa1', '2021-04-30 22:00:11', '2021-04-30 22:00:11'),
(3, 1, '1234', '$2y$10$roERBSZyKbFxbMSplMgzSOnG6D3KbD44rVwy9vA0Dp9KM8uKT6jIC', 'yessi', 'Yessi', 'Jambi', '2021-05-19', 'Islam', '08765435578', 'a', 'P', '1', 'a', '2021-04-30 17:00:00', '2021-04-30 17:00:00');

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

--
-- Dumping data untuk tabel `soal_essay`
--

INSERT INTO `soal_essay` (`id`, `ujian_id`, `guru_id`, `soal`, `jenis`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '<p>Siapa Dia?</p>', 'Ujian', '2021-05-02 01:42:46', '2021-05-02 01:42:46'),
(3, 6, 1, '<p>Apa Kepanjangan DIA?</p>', 'Ujian', '2021-05-02 01:44:57', '2021-05-02 01:44:57'),
(4, 8, 1, 'Suka Main Pubg?', 'Latihan', '2021-05-02 02:30:29', '2021-05-02 02:30:29'),
(5, 8, 1, 'FF Burik?', 'Latihan', '2021-05-02 02:30:37', '2021-05-02 02:30:37');

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
(16, '<p><img src=\"data:image/png;base64,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\" data-filename=\"pngwing.com.png\" style=\"width: 25%;\">&nbsp;Gambar Apakah Itu?<br></p>', 4, 1, '<p>Buku</p>', '<p>Gambar Mobil</p>', '<p>Motor</p>', '<p>Rumah</p>', 'A', 'Ujian', 100, '2021-05-01 23:11:23', '2021-05-01 23:11:23'),
(17, '<p>A</p>', 5, 3, '<p>A</p>', '<p>A</p>', '<p>A</p>', '<p>A</p>', 'A', 'Ujian', 100, '2021-05-01 23:32:20', '2021-05-01 23:32:20'),
(18, '<p>Siapa Dia?</p>', 6, 1, '<p>Orang</p>', '<p>Manusia</p>', '<p>Hewan</p>', '<p>Kubu</p>', 'A', 'Ujian', 50, '2021-05-02 01:43:39', '2021-05-02 01:43:39');
INSERT INTO `soal_pilgan` (`id`, `soal`, `ujian_id`, `guru_id`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `jenis`, `skor`, `created_at`, `updated_at`) VALUES
(19, '<p><img src=\"data:image/jpeg;base64,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\" data-filename=\"WhatsApp Image 2021-02-13 at 12.50.02 PM (1).jpeg\" style=\"width: 25%;\">Gambar di samping adalaha gambar?</p>', 6, 1, 'Kertas', 'Soal', 'Ujian', 'Dokumen', 'A', 'Ujian', 50, '2021-05-02 01:44:37', '2021-05-02 01:44:37');
INSERT INTO `soal_pilgan` (`id`, `soal`, `ujian_id`, `guru_id`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `jenis`, `skor`, `created_at`, `updated_at`) VALUES
(20, '<p>Wedus</p>', 7, 1, '<p>gembel</p>', '<p>elit</p>', '<p>pas</p>', '<p>ff burik</p>', 'A', 'Latihan', 50, '2021-05-02 02:29:14', '2021-05-02 02:29:14'),
(21, 'PUBG', 7, 1, 'bagis', 'mantap', 'gak burik', 'ok', 'D', 'Latihan', 50, '2021-05-02 02:29:38', '2021-05-02 02:29:38');

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
  `batas_waktu` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `guru_id`, `grup_id`, `kelas_id`, `jenis`, `isi`, `batas_waktu`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Tugas 1', 1, 1, 1, 'file', 'public/tugas/UmSVTp1bPIlhT3kaFr9tdXglpuulltTGKKfIGdq2.pdf', '2021-05-08', 'a', '2021-04-30 17:00:00', '2021-04-30 17:00:00'),
(2, 'Tugas 1', 3, 2, 2, 'teks', 'A', '2021-05-03', 'A', '2021-05-01 17:00:00', '2021-05-01 17:00:00'),
(3, 'Tugas 2', 3, 2, 2, 'file', 'public/tugas/EBcZM0OcZNbt4B8myF4iSclR1i5SHLAAIXN7SaHg.docx', '2021-05-08', 'Kejrakan sendiri', '2021-05-01 17:00:00', '2021-05-01 17:00:00');

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
(1, 1, 1, 'file', 'public/tugas/LLceTZqtR8y2K1uZLTOwoHJSjIa7IJTlDy4ndjQf.pdf', '100', '3', 'a', '2021-04-30 17:00:00', '2021-05-02 03:23:30'),
(2, 2, 2, 'teks', 'Iya', '80', '3', 'Iya', '2021-05-01 17:00:00', '2021-05-01 23:39:57'),
(3, 3, 2, 'file', 'public/tugas/C0eYFLIlKD3HgfZjdHt5DyxzBcQoBhATq8axWhNr.pdf', NULL, '1', 'a', '2021-05-01 17:00:00', '2021-05-01 23:46:01');

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
(4, 1, 1, 'Ujian', 'Ujian Semester', 'J', '15', '2021-05-01 17:00:00', '2021-05-01 17:00:00'),
(5, 1, 3, 'Ujian', 'Ujian Semester', 'A', '15', '2021-05-01 17:00:00', '2021-05-01 17:00:00'),
(6, 1, 1, 'Ujian', 'Ujian Semester', 'Kerjakan Sendiri', '15', '2021-05-01 17:00:00', '2021-05-01 17:00:00'),
(7, 1, 1, 'Latihan', 'Latihan 1', 'Kerjakan Soal Ini', '15', '2021-05-01 17:00:00', '2021-05-01 17:00:00'),
(8, 1, 1, 'Latihan', 'Latihan 2 Essay', 'Kerjakan dengan teliti', '15', '2021-05-01 17:00:00', '2021-05-01 17:00:00');

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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_username_unique` (`username`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `grup`
--
ALTER TABLE `grup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `grup_aktivitas`
--
ALTER TABLE `grup_aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `grup_materi`
--
ALTER TABLE `grup_materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `grup_siswa`
--
ALTER TABLE `grup_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelola_nilai`
--
ALTER TABLE `kelola_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `nilai_essay`
--
ALTER TABLE `nilai_essay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_pilgan`
--
ALTER TABLE `nilai_pilgan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tugas_jawaban`
--
ALTER TABLE `tugas_jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
