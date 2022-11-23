-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 11:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lutfia`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas`
--

CREATE TABLE `m_kelas` (
  `k_id` int(10) UNSIGNED NOT NULL,
  `wali` int(10) UNSIGNED NOT NULL,
  `tingkat` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_kelas`
--

INSERT INTO `m_kelas` (`k_id`, `wali`, `tingkat`, `k_nama`) VALUES
(90, 360, '10', 'xi ipa');

-- --------------------------------------------------------

--
-- Table structure for table `m_kh`
--

CREATE TABLE `m_kh` (
  `kh_id` int(10) UNSIGNED NOT NULL,
  `kh_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kkm` int(11) NOT NULL,
  `aspek1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspek2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspek3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspek4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_a1` double(6,2) NOT NULL,
  `max_a2` double(6,2) NOT NULL,
  `max_a3` double(6,2) NOT NULL,
  `max_a4` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_kh`
--

INSERT INTO `m_kh` (`kh_id`, `kh_nama`, `singkatan`, `kkm`, `aspek1`, `aspek2`, `aspek3`, `aspek4`, `max_a1`, `max_a2`, `max_a3`, `max_a4`) VALUES
(1, 'Bahasa Arab', 'BA', 70, 'Penguasaan Materi/Isi', 'Talaffudz', 'Intonasi', 'Kehadiran dan Gaya/Ekspresi', 40.00, 30.00, 10.00, 20.00),
(2, 'Ibadah Amaliyah', 'IA', 70, 'Ketuntasan', 'Kelancaran', 'Kefasihan', 'Kehadiran', 40.00, 30.00, 20.00, 10.00),
(3, 'Hafalan Surat Pendek', 'HSP', 70, 'Ketuntasan', 'Tajwid', 'Kelancaran', 'Kehadiran', 40.00, 30.00, 20.00, 10.00),
(4, 'Bahasa Inggris', 'BI', 70, 'Grammar and Comprehension', 'Pronounciation', 'Fluency', 'Presence', 40.00, 30.00, 20.00, 10.00),
(5, 'Dzikrul Ghofilin', 'Dzikrul', 75, 'Ketuntasan', 'Kelancaran', 'Kefasihan', 'Kehadiran', 30.00, 30.00, 30.00, 10.00),
(6, 'tes', NULL, 80, 'tes', 'tes', 'tes', 'tes', 100.00, 100.00, 100.00, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `m_siswa`
--

CREATE TABLE `m_siswa` (
  `s_id` int(10) UNSIGNED NOT NULL,
  `k_id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kel` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PUTRA',
  `transkrip_kh` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `th_lulus` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketuntasan` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_keuangan` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `bukti_perpus` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_keuangan` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_pondok` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `nominal_pondok` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pondok` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_pondok` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_aman_pa` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `nominal_aman_pa` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_aman_pa` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_aman_pa` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_dzikrul` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `nilai_dzikrul` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_paper` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `ket_paper` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_perpus` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `denda_perpus` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_perpus` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ijazah` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengambil` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tanggungan_smt`
--

CREATE TABLE `tanggungan_smt` (
  `tg_id` int(10) UNSIGNED NOT NULL,
  `ta_id` int(10) UNSIGNED NOT NULL,
  `s_id` int(10) UNSIGNED DEFAULT NULL,
  `keuangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `ket_keu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_hijau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `ket_k_h` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `ket_ppr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu_aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `ketuntasan` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TIDAK TUNTAS',
  `ujian` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `osis` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `da` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS',
  `pmr` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT 'TIDAK TUNTAS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `uji_kh`
--

CREATE TABLE `uji_kh` (
  `uji_id` int(10) UNSIGNED NOT NULL,
  `kh_id` int(10) UNSIGNED NOT NULL,
  `penguji` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_id` int(10) UNSIGNED NOT NULL,
  `ta_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `foto`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(359, 'admin', 'admin', '', 'admin', '$2y$10$DgqEc.IaYXDiW8Q0llM/G.sCIqa4CUsF08.G1MLx3YAumjowEQK4O', NULL, NULL, NULL),
(360, 'Lutfia Rahma', 'lutfia', 'avatar.jpg', 'guru', '$2y$10$02iZDw8eEsNKC.J5/GRbje23j/.xPLTiDd/d6BC9oCrGnKrss0ypu', NULL, '2022-11-16 02:05:02', '2022-11-16 02:05:02'),
(361, 'panitia', 'panitia123', NULL, 'panitia', '12345678', NULL, NULL, NULL),
(363, 'guru', 'guru', NULL, 'guru', 'guru123', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`k_id`) USING BTREE,
  ADD KEY `m_kelas_wali_foreign` (`wali`) USING BTREE;

--
-- Indexes for table `m_kh`
--
ALTER TABLE `m_kh`
  ADD PRIMARY KEY (`kh_id`) USING BTREE;

--
-- Indexes for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD PRIMARY KEY (`s_id`) USING BTREE,
  ADD UNIQUE KEY `m_siswa_s_id_unique` (`s_id`) USING BTREE,
  ADD UNIQUE KEY `m_siswa_nis_unique` (`nis`) USING BTREE,
  ADD KEY `m_siswa_k_id_foreign` (`k_id`) USING BTREE;

--
-- Indexes for table `tanggungan_smt`
--
ALTER TABLE `tanggungan_smt`
  ADD PRIMARY KEY (`tg_id`) USING BTREE,
  ADD KEY `tanggungan_smt_ta_id_foreign` (`ta_id`) USING BTREE,
  ADD KEY `tanggungan_smt_s_id_foreign` (`s_id`) USING BTREE;

--
-- Indexes for table `uji_kh`
--
ALTER TABLE `uji_kh`
  ADD PRIMARY KEY (`uji_id`) USING BTREE,
  ADD KEY `uji_kh_kh_id_foreign` (`kh_id`) USING BTREE,
  ADD KEY `uji_kh_k_id_foreign` (`k_id`) USING BTREE,
  ADD KEY `uji_kh_ta_id_foreign` (`ta_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_username_unique` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kelas`
--
ALTER TABLE `m_kelas`
  MODIFY `k_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `m_kh`
--
ALTER TABLE `m_kh`
  MODIFY `kh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_siswa`
--
ALTER TABLE `m_siswa`
  MODIFY `s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2421;

--
-- AUTO_INCREMENT for table `tanggungan_smt`
--
ALTER TABLE `tanggungan_smt`
  MODIFY `tg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9960;

--
-- AUTO_INCREMENT for table `uji_kh`
--
ALTER TABLE `uji_kh`
  MODIFY `uji_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3229;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD CONSTRAINT `m_siswa_k_id_foreign` FOREIGN KEY (`k_id`) REFERENCES `m_kelas` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
