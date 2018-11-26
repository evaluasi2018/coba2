-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Okt 2018 pada 09.19
-- Versi server: 5.7.19
-- Versi PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_epel`
--

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
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_07_18_014047_create_table_users', 1),
(6, '2018_07_18_014114_create_table_admin', 1);

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
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `nm_admin` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nm_admin`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 'administrator', 'administrator', '$2y$10$/5sUf/azmW7g1UxZzPgEEuBAzFfdKMYOZ0pVkKl/VdicRm7x5.OwW', 'Lvs8EdbnVRfH15MmjZaQHChIY0OQEk0Woc9GWfIv0iHIbjq8uvSJ1n3xz5lp', '2018-09-21 21:38:48', '2018-09-21 21:38:48', NULL),
(32, 'dsadasdsa', 'dsadsadsa', '7b71d9fdfe5b15a2d1a4968c195f93ae', NULL, '2018-10-04 01:04:07', '2018-10-04 01:04:12', '2018-10-04 08:04:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nip` varchar(18) NOT NULL,
  `nm_dosen` varchar(100) DEFAULT NULL,
  `id_prodi` varchar(3) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`nip`, `nm_dosen`, `id_prodi`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('111111111111111', 'Alex Surapati, ST, MT, ', 'G1D', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-20 22:20:17', NULL),
('12345678', 'baru', 'G1A', '$2y$10$BxGFOSAnyPW8LZMn/8SwjuY7uLiGyjk4rvKfvPP1KMWMlP7KZlqZe', '01WwONOeJRYHopSwAmsLhGvQ0akqbB9geDM54phN1V65y8BOqB1XjorMq62i', '2018-09-22 06:26:56', '2018-09-22 06:26:56'),
('195803051986031007', 'Drs. Asahar Johar, M.Si', 'G1A', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-20 22:20:17', NULL),
('19590424198602100', 'Drs. Boko Susilo, M.Kom', 'G1A', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-20 22:20:17', NULL),
('197308142006042001', 'Ernawati, ST, MCs', 'G1A', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-20 22:20:17', NULL),
('197812072005012001', 'Desi Andreswari, S.T., M.Cs', 'G1A', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-20 22:20:17', NULL),
('198909032015041004', 'Yudi Setiawan, S.T.,M.Eng.', 'G1A', '$2y$10$ZWantM5Ch1DtW6tiND0CYetkhv54G2NrX3yzBIghpWqf4OXIWflmC', 'aCLR536bMLSCTGM3wqmZVRqmdtSoYbj9dfsLvNZv8acR3lDU8ZqMh4zlYN4h', '2018-08-20 22:20:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_jadwal_perkuliahan` int(11) DEFAULT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `id_indikator` int(11) DEFAULT NULL,
  `nilai` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_evaluasi`, `id_jadwal_perkuliahan`, `npm`, `id_indikator`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'G1A016040', 1, 5, '2018-10-03 14:03:31', '2018-10-03 14:03:31', NULL),
(2, 7, 'G1A016040', 2, 5, '2018-10-03 14:03:31', '2018-10-03 14:03:31', NULL),
(3, 7, 'G1A016040', 3, 4, '2018-10-03 14:03:31', '2018-10-03 14:03:31', NULL),
(4, 7, 'G1A016040', 4, 4, '2018-10-03 14:03:31', '2018-10-03 14:03:31', NULL),
(5, 7, 'G1A016040', 5, 4, '2018-10-03 14:03:31', '2018-10-03 14:03:31', NULL),
(6, 7, 'G1A016040', 6, 4, '2018-10-03 14:03:31', '2018-10-03 14:03:31', NULL),
(7, 7, 'G1A016082', 1, 4, '2018-10-03 14:40:03', '2018-10-03 14:40:03', NULL),
(8, 7, 'G1A016082', 2, 4, '2018-10-03 14:40:03', '2018-10-03 14:40:03', NULL),
(9, 7, 'G1A016082', 3, 4, '2018-10-03 14:40:03', '2018-10-03 14:40:03', NULL),
(10, 7, 'G1A016082', 4, 4, '2018-10-03 14:40:03', '2018-10-03 14:40:03', NULL),
(11, 7, 'G1A016082', 5, 4, '2018-10-03 14:40:03', '2018-10-03 14:40:03', NULL),
(12, 7, 'G1A016082', 6, 4, '2018-10-03 14:40:03', '2018-10-03 14:40:03', NULL),
(13, 18, 'G1A016040', 1, 5, '2018-10-03 15:10:44', '2018-10-03 15:10:44', NULL),
(14, 18, 'G1A016040', 2, 3, '2018-10-03 15:10:44', '2018-10-03 15:10:44', NULL),
(15, 18, 'G1A016040', 3, 1, '2018-10-03 15:10:44', '2018-10-03 15:10:44', NULL),
(16, 18, 'G1A016040', 4, 3, '2018-10-03 15:10:44', '2018-10-03 15:10:44', NULL),
(17, 18, 'G1A016040', 5, 2, '2018-10-03 15:10:44', '2018-10-03 15:10:44', NULL),
(18, 18, 'G1A016040', 6, 3, '2018-10-03 15:10:44', '2018-10-03 15:10:44', NULL),
(19, 8, 'G1A016040', 1, 5, '2018-10-03 15:15:02', '2018-10-03 15:15:02', NULL),
(20, 8, 'G1A016040', 2, 5, '2018-10-03 15:15:02', '2018-10-03 15:15:02', NULL),
(21, 8, 'G1A016040', 3, 1, '2018-10-03 15:15:02', '2018-10-03 15:15:02', NULL),
(22, 8, 'G1A016040', 4, 5, '2018-10-03 15:15:02', '2018-10-03 15:15:02', NULL),
(23, 8, 'G1A016040', 5, 1, '2018-10-03 15:15:02', '2018-10-03 15:15:02', NULL),
(24, 8, 'G1A016040', 6, 2, '2018-10-03 15:15:02', '2018-10-03 15:15:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` varchar(1) NOT NULL,
  `nm_fakultas` varchar(50) DEFAULT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nm_fakultas`, `ket`) VALUES
('A', 'KEGURUAN DAN ILMU PENDIDIKAN', 'Fakultas FKIP'),
('G', 'TEKNIK', 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_indikator_penilaian`
--

CREATE TABLE `tb_indikator_penilaian` (
  `id_indikator` int(11) NOT NULL,
  `indikator` text,
  `id_jenis_indikator` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_indikator_penilaian`
--

INSERT INTO `tb_indikator_penilaian` (`id_indikator`, `indikator`, `id_jenis_indikator`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dosen terlihat siap dan menguasai materi perkuliahan yang diberikan kepada mahasiswa', 1, '2018-07-11 10:00:01', '2018-07-31 04:25:32', NULL),
(2, 'Dosen menyampaikan secara jelas Rencana Pembelajaran Semester (RPS)', 1, '2018-07-11 10:00:27', '2018-07-12 03:58:28', NULL),
(3, 'Dosen menguasai bidang ilmu yang diajarkan secara luas dan mendalam', 2, '2018-07-30 01:11:15', '2018-08-25 16:15:58', NULL),
(4, 'Dosen mengembangkan bahan ajar dan referensinya terkini', 2, '2018-07-30 01:11:35', '2018-08-25 16:15:58', NULL),
(5, 'sdsad edit lagi', 2, '2018-09-14 06:57:23', '2018-09-14 06:58:13', '2018-09-14'),
(6, 'dsadasd edit', 3, '2018-09-14 08:00:53', '2018-09-14 08:01:04', '2018-09-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_perkuliahan`
--

CREATE TABLE `tb_jadwal_perkuliahan` (
  `id_jadwal_perkuliahan` int(11) NOT NULL,
  `id_matkul` varchar(7) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `id_semester` int(11) DEFAULT NULL,
  `kelas` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal_perkuliahan`
--

INSERT INTO `tb_jadwal_perkuliahan` (`id_jadwal_perkuliahan`, `id_matkul`, `nip`, `id_semester`, `kelas`) VALUES
(7, 'TIF-323', '198909032015041004', 1, 'A'),
(8, 'TIF-323', '197812072005012001', 1, 'A'),
(9, 'TEE-112', '111111111111111', 1, 'B'),
(10, 'TIF-323', '195803051986031007', 1, 'B'),
(11, 'TED-111', '198909032015041004', 1, 'B'),
(12, 'TED-111', '19590424198602100', 1, 'B'),
(13, 'TED-111', '195803051986031007', 1, 'A'),
(14, 'TED-111', '197308142006042001', 1, 'B'),
(15, 'TIF-225', '198909032015041004', 1, 'A'),
(16, 'TIF-114', '198909032015041004', 1, 'B'),
(17, 'TIF-114', '195803051986031007', 1, 'A'),
(18, 'TIF-114', '198909032015041004', 1, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_indikator`
--

CREATE TABLE `tb_jenis_indikator` (
  `id_jenis_indikator` int(11) NOT NULL,
  `nm_jenis_indikator` varchar(100) DEFAULT NULL,
  `ket` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_indikator`
--

INSERT INTO `tb_jenis_indikator` (`id_jenis_indikator`, `nm_jenis_indikator`, `ket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KOMPETENSI PEDAGOGIK', 'Meliputi pemahaman dosen terhadap peserta didik, perancangan dan pelaksanaan pembelajaran, evaluasi hasil belajar, dan pengembangan peserta didik untuk mengaktualisasikan berbagai potensi yang dimiliki', '2018-07-11 09:54:01', '2018-08-26 03:47:39', NULL),
(2, 'KOMPETENSI PROFESIONAL', 'Meliputi penguasaan materi ajar, dan Kemampuan mengelola pembelajaran.', '2018-07-11 09:55:47', '2018-07-15 12:07:55', NULL),
(3, 'KOMPETENSI KEPRIBADIAN', 'Kompetensi kepribadian adalah kemampuan kepribadian yang mantap, berakhlak mulia, arif, dan berwibawa serta menjadi teladan peserta didik', '2018-07-11 09:56:26', '2018-08-13 03:19:14', NULL),
(4, 'tes', 'tes', '2018-08-25 16:22:34', '2018-08-25 16:26:57', '2018-08-25'),
(5, 'a', 'a', '2018-08-26 03:59:49', '2018-09-02 12:39:24', '2018-09-02'),
(6, 'sdsada edit', 'sdasd edit', '2018-09-14 06:43:41', '2018-09-14 06:44:14', '2018-09-14'),
(7, 'dasd', 'asdasd', '2018-09-14 07:59:33', '2018-09-14 07:59:36', '2018-09-14'),
(8, 'dsad', 'sadasd', '2018-09-14 07:59:59', '2018-09-14 08:00:02', '2018-09-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id_krs` int(11) NOT NULL,
  `npm` varchar(9) NOT NULL,
  `id_jadwal_perkuliahan` int(11) DEFAULT NULL,
  `kelas` varchar(1) NOT NULL,
  `id_matkul` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_krs`
--

INSERT INTO `tb_krs` (`id_krs`, `npm`, `id_jadwal_perkuliahan`, `kelas`, `id_matkul`) VALUES
(3, 'G1A016040', 7, 'A', 'TIF-323'),
(5, 'G1A016040', 17, 'A', 'TIF-114'),
(6, 'G1A016033', 17, 'A', 'TIF-114'),
(7, 'G1A016040', 11, 'A', 'TED-111'),
(8, 'G1A016082', 7, 'A', 'TIF-323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `npm` varchar(9) NOT NULL,
  `nm_mahasiswa` varchar(100) DEFAULT NULL,
  `id_prodi` varchar(3) DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`npm`, `nm_mahasiswa`, `id_prodi`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('G1A016033', 'Taufiq Dwi Harjanto', 'G1A', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-22 18:34:50', NULL),
('G1A016040', 'Anosa Putri Ruise', 'G1A', '$2y$10$xtnRlDW7TynlxLbO9ylVK.VNJ49R0rE4CwPkHuzPLe1LX5CnA3QYK', 'LB86FYWPdOUgcAuKHdE0uyeS6XwMsHZrzkVbb7K6WALJMLafIQms2OhcCsx8', '2018-08-22 18:34:50', NULL),
('G1A016082', 'Safroni Aziz', 'G1A', '$2y$10$xtnRlDW7TynlxLbO9ylVK.VNJ49R0rE4CwPkHuzPLe1LX5CnA3QYK', 'bXigmB2IHzZwjYoHhx8ID4vObPefNuVLjg3FWroeXDRRGS8yJtIrlKSmPOYK', '2018-09-22 12:14:29', NULL),
('G1B016082', 'Ilham Ilahi Dinha', 'G1B', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-22 18:34:50', NULL),
('G1C016082', 'Muhammad Alfikri', 'G1C', '5cbbf65923f824b65961c8436d24b96d', NULL, '2018-08-22 18:34:50', NULL),
('G1D016082', 'Muhammad Ihsan Alfaishol', 'G1D', '5cbbf65923f824b65961c8436d24b96d', 'yvSgkWF3ZttPeJPMHwnCVm51WhhWBYT1AadIhAdzHmyUHRDLRnSzawL08FKt', '2018-08-22 18:34:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` varchar(7) NOT NULL,
  `nm_matkul` varchar(100) DEFAULT NULL,
  `id_prodi` varchar(3) DEFAULT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `nm_matkul`, `id_prodi`, `ket`) VALUES
('MKU-101', 'Pancasila', 'G1A', 'Mata Kuliah Umum'),
('MKU-105', 'Bahasa Inggris', 'G1B', 'Mata Kuliah Umum'),
('TED-111', 'Kalkulus', 'G1B', 'Mata Kuliah Produktif'),
('TEE-112', 'Material Elektrik', 'G1B', 'Mata Kuliah Produktif'),
('TEE-113', 'Pengukuran Listrik', 'G1B', 'Mata Kuliah Produktif'),
('TEE-114', 'Dasar Pemrograman Komputer', 'G1B', 'Mata Kuliah Produktif'),
('TIF-114', 'Pengantar Pemrograman dan Rekayasa Perangkat Lunak', 'G1A', 'Mata Kuliah Produktif'),
('TIF-221', 'Metode Numerik', 'G1A', 'Mata Kuliah Produktif'),
('TIF-225', 'Teori Bahasa dan Automata', 'G1A', 'Mata Kuliah Produktif'),
('TIF-226', 'Pemrograman Berorientasi Obyek', 'G1A', 'Mata Kuliah Produktif'),
('TIF-227', 'Grafika Komputer', 'G1A', 'Mata Kuliah Produktif'),
('TIF-323', 'Pemrograman Internet dan E-Commerce', 'G1A', 'Mata Kuliah Produktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` varchar(3) NOT NULL,
  `id_fakultas` varchar(1) DEFAULT NULL,
  `nm_prodi` varchar(50) DEFAULT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nm_prodi`, `ket`) VALUES
('A1A', 'A', 'PENDIDIKAN BAHASA INDONESIA', 'prodi bahasa indonesia\r\n'),
('G1A', 'G', 'TEKNIK INFORMATIKA', 'Prodi Teknik Informatika'),
('G1B', 'G', 'TEKNIK SIPIL', 'prodi teknik sipil'),
('G1C', 'G', 'TEKNIK MESIN', 'prodi teknik mesin'),
('G1D', 'G', 'TEKNIK ELEKTRO', 'Prodi Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(11) NOT NULL,
  `id_jadwal_perkuliahan` int(11) NOT NULL,
  `npm` varchar(9) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `id_jadwal_perkuliahan`, `npm`, `saran`) VALUES
(5, 7, 'G1A016040', 'Saran Pertama'),
(6, 7, 'G1A016082', 'Setuju'),
(7, 18, 'G1A016040', 'Baru'),
(8, 8, 'G1A016040', 'dasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `nm_semester` varchar(10) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `nm_semester`, `tahun_ajaran`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SM Genap', '2016/2017', 'deaktif', NULL, '2018-09-01 04:12:34', '2018-09-01'),
(2, 'SM Ganjil', '2017/2018', 'nonaktif', NULL, '2018-09-01 04:48:00', '2018-09-01'),
(3, 'Semester', '2016/2017', 'deaktif', '2018-08-01 04:47:41', '2018-08-26 03:39:44', NULL),
(4, 'tes', '2017/2018', 'aktif', '2018-09-02 03:15:57', '2018-09-02 03:15:57', NULL),
(5, 'ss edit', '2017/2018', 'aktif', '2018-09-14 07:13:39', '2018-09-14 07:14:35', '2018-09-14'),
(6, 'dasdasd', '2017/2018', 'aktif', '2018-09-14 07:30:19', '2018-09-14 07:30:19', NULL),
(7, 'dasdsad', '2017/2018', 'aktif', '2018-09-14 07:36:47', '2018-09-14 07:36:47', NULL),
(8, 'dsad', '2016/2017', 'deaktif', '2018-10-04 05:19:18', '2018-10-04 05:19:22', '2018-10-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Safroni Aziz', '', 'safroni@gmail.com', '5cbbf65923f824b65961c8436d24b96d', 'QbjI9EO5G6pVc5nnC2fgha1RK3xdWxh7P0ECkHwS4TsuacBEnUEiQhV8Yqil', NULL, NULL),
(3, 'Safroni Aziz', 'safroniaziz', 'safroniaziz@gmail.com', '99747147dd94cabdacf50f0937398053', 'LNdzAyZiiwMsp62VbNEswc9zXCNUBHWbWUG7OZD0IWx77icvdFcoA10dnaro', '2018-07-19 01:44:49', '2018-07-19 01:44:49'),
(4, 'Muhammad Ihsan', 'mihsan', 'mihsan@gmail.com', 'ae673ee6c04410ed2782292ba8f8b690', 'ZQNvq3JShvtJ672mGB2v1OhP4XS3f9y69c3setql359Cb3aCsZgBHwIwGTBY', '2018-07-19 01:49:17', '2018-07-19 01:49:17');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_jadwal_perkuliahan` (`id_jadwal_perkuliahan`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tb_indikator_penilaian`
--
ALTER TABLE `tb_indikator_penilaian`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `id_jenis_indikator` (`id_jenis_indikator`);

--
-- Indeks untuk tabel `tb_jadwal_perkuliahan`
--
ALTER TABLE `tb_jadwal_perkuliahan`
  ADD PRIMARY KEY (`id_jadwal_perkuliahan`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_dosen` (`nip`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indeks untuk tabel `tb_jenis_indikator`
--
ALTER TABLE `tb_jenis_indikator`
  ADD PRIMARY KEY (`id_jenis_indikator`);

--
-- Indeks untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_jadwal_perkuliahan` (`id_jadwal_perkuliahan`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_jadwal_perkuliahan` (`id_jadwal_perkuliahan`) USING BTREE;

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_indikator_penilaian`
--
ALTER TABLE `tb_indikator_penilaian`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_perkuliahan`
--
ALTER TABLE `tb_jadwal_perkuliahan`
  MODIFY `id_jadwal_perkuliahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_indikator`
--
ALTER TABLE `tb_jenis_indikator`
  MODIFY `id_jenis_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD CONSTRAINT `tb_evaluasi_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `tb_indikator_penilaian` (`id_indikator`),
  ADD CONSTRAINT `tb_evaluasi_ibfk_2` FOREIGN KEY (`id_jadwal_perkuliahan`) REFERENCES `tb_jadwal_perkuliahan` (`id_jadwal_perkuliahan`),
  ADD CONSTRAINT `tb_evaluasi_ibfk_3` FOREIGN KEY (`npm`) REFERENCES `tb_mahasiswa` (`npm`);

--
-- Ketidakleluasaan untuk tabel `tb_indikator_penilaian`
--
ALTER TABLE `tb_indikator_penilaian`
  ADD CONSTRAINT `tb_indikator_penilaian_ibfk_1` FOREIGN KEY (`id_jenis_indikator`) REFERENCES `tb_jenis_indikator` (`id_jenis_indikator`);

--
-- Ketidakleluasaan untuk tabel `tb_jadwal_perkuliahan`
--
ALTER TABLE `tb_jadwal_perkuliahan`
  ADD CONSTRAINT `tb_jadwal_perkuliahan_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`),
  ADD CONSTRAINT `tb_jadwal_perkuliahan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`),
  ADD CONSTRAINT `tb_jadwal_perkuliahan_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `tb_semester` (`id_semester`);

--
-- Ketidakleluasaan untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD CONSTRAINT `tb_krs_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `tb_mahasiswa` (`npm`),
  ADD CONSTRAINT `tb_krs_ibfk_2` FOREIGN KEY (`id_jadwal_perkuliahan`) REFERENCES `tb_jadwal_perkuliahan` (`id_jadwal_perkuliahan`);

--
-- Ketidakleluasaan untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD CONSTRAINT `tb_matkul_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `tb_prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `tb_fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD CONSTRAINT `tb_saran_ibfk_1` FOREIGN KEY (`id_jadwal_perkuliahan`) REFERENCES `tb_jadwal_perkuliahan` (`id_jadwal_perkuliahan`),
  ADD CONSTRAINT `tb_saran_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `tb_mahasiswa` (`npm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
