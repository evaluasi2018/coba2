-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Nov 2018 pada 16.07
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
(31, 'administrator', 'administrator', '$2y$10$/5sUf/azmW7g1UxZzPgEEuBAzFfdKMYOZ0pVkKl/VdicRm7x5.OwW', 'Zb0wzYEmc4IsEaNz0mWCdfr0ExEbcaMui68Z1H4yTYg3y74EEy9Edqc0Qc9A', '2018-09-21 21:38:48', '2018-09-21 21:38:48', NULL),
(33, 'bismillah', 'bismillah', '$2y$10$28kHNhZlJQooDrI.3eFHM.rHmuzapiMlMP4RfEl1HYUR7eUZMoMKy', 'VMyj3kJEuZPI0gWyOXasUQ2kMVHccDNdYyguWzMcht40fTalA9suYrNiPgtX', '2018-11-24 23:45:08', '2018-11-24 23:45:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `nip` varchar(18) NOT NULL,
  `nm_dosen` varchar(30) NOT NULL,
  `id_matkul` varchar(10) NOT NULL,
  `nm_matkul` varchar(20) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `semester` int(5) DEFAULT NULL,
  `id_indikator` int(11) DEFAULT NULL,
  `nilai` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_evaluasi`, `npm`, `nip`, `nm_dosen`, `id_matkul`, `nm_matkul`, `id_kelas`, `semester`, `id_indikator`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(162, 'G1A016082', '197308142006042001', 'ErnawatiS.T., M.Cs', 'TIF-314', 'Jaringan Komputer', '2511420007701', 20181, 1, 5, '2018-11-25 20:29:46', '2018-11-25 20:29:46', NULL),
(163, 'G1A016082', '197308142006042001', 'ErnawatiS.T., M.Cs', 'TIF-314', 'Jaringan Komputer', '2511420007701', 20181, 2, 4, '2018-11-25 20:29:46', '2018-11-25 20:29:46', NULL),
(164, 'G1A016082', '197308142006042001', 'ErnawatiS.T., M.Cs', 'TIF-314', 'Jaringan Komputer', '2511420007701', 20181, 3, 5, '2018-11-25 20:29:46', '2018-11-25 20:29:46', NULL),
(165, 'G1A016082', '197308142006042001', 'ErnawatiS.T., M.Cs', 'TIF-314', 'Jaringan Komputer', '2511420007701', 20181, 4, 4, '2018-11-25 20:29:46', '2018-11-25 20:29:46', NULL);

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
(2, 'Dosen menyampaikan secara jelas Rencana Pembelajaran Semester (RPS)', 2, '2018-07-11 10:00:27', '2018-07-12 03:58:28', NULL),
(3, 'Dosen menguasai bidang ilmu yang diajarkan secara luas dan mendalam', 3, '2018-07-30 01:11:15', '2018-08-25 16:15:58', NULL),
(4, 'Dosen mengembangkan bahan ajar dan referensinya terkini', 1, '2018-07-30 01:11:35', '2018-10-27 17:56:57', NULL);

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
(3, 'KOMPETENSI KEPRIBADIAN', 'Kompetensi kepribadian adalah kemampuan kepribadian yang mantap, berakhlak mulia, arif, dan berwibawa serta menjadi teladan peserta didik', '2018-07-11 09:56:26', '2018-08-13 03:19:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(11) NOT NULL,
  `npm` varchar(9) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nm_dosen` varchar(30) NOT NULL,
  `id_matkul` varchar(10) NOT NULL,
  `nm_matkul` varchar(50) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `semester` int(5) NOT NULL,
  `saran` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `npm`, `nip`, `nm_dosen`, `id_matkul`, `nm_matkul`, `id_kelas`, `semester`, `saran`, `created_at`) VALUES
(26, 'G1A016082', '197308142006042001', 'ErnawatiS.T., M.Cs', 'TIF-314', 'Jaringan Komputer', '2511420007701', 20181, 'Bismillah', NULL);

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
-- Indeks untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indeks untuk tabel `tb_indikator_penilaian`
--
ALTER TABLE `tb_indikator_penilaian`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `id_jenis_indikator` (`id_jenis_indikator`) USING BTREE;

--
-- Indeks untuk tabel `tb_jenis_indikator`
--
ALTER TABLE `tb_jenis_indikator`
  ADD PRIMARY KEY (`id_jenis_indikator`);

--
-- Indeks untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`);

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
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT untuk tabel `tb_indikator_penilaian`
--
ALTER TABLE `tb_indikator_penilaian`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_indikator`
--
ALTER TABLE `tb_jenis_indikator`
  MODIFY `id_jenis_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD CONSTRAINT `tb_evaluasi_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `tb_indikator_penilaian` (`id_indikator`);

--
-- Ketidakleluasaan untuk tabel `tb_indikator_penilaian`
--
ALTER TABLE `tb_indikator_penilaian`
  ADD CONSTRAINT `tb_indikator_penilaian_ibfk_1` FOREIGN KEY (`id_jenis_indikator`) REFERENCES `tb_jenis_indikator` (`id_jenis_indikator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
