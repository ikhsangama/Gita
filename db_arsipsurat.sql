-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 02:54 AM
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
  `no_hal_surat` varchar(11) NOT NULL,
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
(9, '2', '2018-03-18', '02/SMAN1/03', 'Permohonan Pembicara', 'Kepala SMA N 1 Brebes', 'uploads/cth_keluar1.jpg'),
(11, '422.3', '2018-04-08', '012/SMAN1/2018', 'Surat Pemberitahuan', 'Wali murid', 'uploads/cth_keluar2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_hal_surat` varchar(11) NOT NULL,
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

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_hal_surat`, `tgl_disurat`, `asal_surat`, `tgl_surat_diterima`, `no_surat_masuk`, `perihal`, `tujuan`, `status_surat`, `hasil_scan`, `tgl_disposisi`, `diteruskan_ke`, `pesan`) VALUES
(13, '418.47', '2018-01-10', 'Dinas Pendidikan', '2018-01-17', '420/5624/418.47/2018', 'Mutasi Siswa', 'Kepala Sekolah', 'Sudah Disposisi', 'uploads/cth_masuk1.jpg', '2018-05-15', ' waka humas', ' ya'),
(16, '422.3', '2018-06-01', 'Universitas Diponegoro', '2018-06-03', '99/PRP/2018', 'Permohonan PKL', 'Kepala Sekolah', 'Belum Disposisi', 'uploads/cth_masuk2.jpg', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` int(1) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `jabatan`, `nama_jabatan`) VALUES
(1, 'Amelia Gita Pertiwi', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', 0, 'Admin'),
(13, 'Masduki, S.Pd, M.Pd', 'kepsek', '4a7d1ed414474e4033ac29ccb8653d9b', 1, 'Kepala Sekolah');

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
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
