-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 12:41 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsipsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_hal_surat` int(11) NOT NULL,
  `tgl_surat_dikeluarkan` date NOT NULL,
  `no_surat_keluar` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `hasil_scan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_hal_surat`, `tgl_surat_dikeluarkan`, `no_surat_keluar`, `perihal`, `tujuan`, `hasil_scan`) VALUES
(8, 121, '2018-04-01', '1212122', 'apa wis', 'Wali murid', 'uploads/IMG_20160604_064353.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_hal_surat` varchar(11) NOT NULL,
  `no_urut_surat` int(11) NOT NULL,
  `tgl_disurat` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tgl_surat_diterima` date NOT NULL,
  `no_surat_masuk` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `status_surat` varchar(50) NOT NULL,
  `hasil_scan` varchar(50) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `diteruskan_ke` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_hal_surat`, `no_urut_surat`, `tgl_disurat`, `asal_surat`, `tgl_surat_diterima`, `no_surat_masuk`, `perihal`, `tujuan`, `status_surat`, `hasil_scan`, `tgl_disposisi`, `diteruskan_ke`, `pesan`) VALUES
(2, 'qqq', 0, '2018-01-20', 'qqq', '2018-01-22', 'qqq', 'qqq', 'qqq', 'Sudah Disposisi', 'uploads/2013-08-15 18.06.25_.jpg', '2018-02-02', 'Kasubag Kepegawaian dan Keuangan', ' Sip'),
(5, '227.1', 100, '2018-01-10', 'Universitas Diponegoro', '2018-01-28', '112/DL/SF/123', 'Permohonan Ijin PKL', 'Kepala Sekolah', 'Sudah Disposisi', 'uploads/2013-08-15 18.53.30_.jpg', '2018-02-02', 'Kasubag Akademik', ' Ya lanjutkan oke'),
(9, '443', 0, '2018-01-03', 'Universitas Diponegoro', '2018-01-31', '125/SSS/3737/P', 'Apa wis', 'Kepala Sekolah', 'Sudah Disposisi', 'uploads/BeautyPlus_20170128001214_save.jpg', '2018-02-06', ' Kepala Humas', ' Tolong dilanjutkan'),
(10, '442', 0, '2018-04-10', 'Universitas Diponegoro', '2018-04-13', 'ABC/111/P/2018', 'Surat Pemberitahuan', 'Kepala Sekolah', 'Belum Disposisi', 'uploads/khs gita.png', '0000-00-00', '', ''),
(11, '111', 0, '2018-04-02', 'qqqqq', '2018-04-08', '121212asasa', 'qwqwq', 'qwqw', 'Belum Disposisi', 'uploads/khs gita.pdf', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `jabatan`, `nama_jabatan`) VALUES
(1, 'Amelia Gita Pertiwi', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', 0, 'Admin'),
(3, 'Milochaaaaaaaaan', 'kepsek', '4a7d1ed414474e4033ac29ccb8653d9b', 1, 'Kepala Sekolah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
