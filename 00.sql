-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 05:20 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `00`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_peng`
--

CREATE TABLE IF NOT EXISTS `jenis_peng` (
  `id_jenis_peng` varchar(20) NOT NULL,
  `nm_jenis_peng` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_peng`
--

INSERT INTO `jenis_peng` (`id_jenis_peng`, `nm_jenis_peng`) VALUES
('JEN001', 'Norma'),
('JEN002', 'Kesehatan'),
('JEN003', 'Keselamatan');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE IF NOT EXISTS `keluhan` (
  `id_keluhan` varchar(30) NOT NULL,
  `nm_pengadu` varchar(30) NOT NULL,
  `nm_perusahaan` varchar(30) NOT NULL,
  `ket_pengaduan` varchar(80) NOT NULL,
  `jenis_pengaduan` varchar(20) NOT NULL,
  `nm_penyidik` varchar(30) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `nm_pengadu`, `nm_perusahaan`, `ket_pengaduan`, `jenis_pengaduan`, `nm_penyidik`, `tanggal`) VALUES
('KEL004', 'susan', 'PT.JayaMakmur', 'tak di bayar gaji', 'Norma', 'Agus', '2017-05-01'),
('KEL005', 'waesrtyuh', 'BANK', 'fghjkl;', 'Norma', 'neymar', '2017-05-03'),
('KEL006', 'saskia', 'BANK', 'kekerasan rumah tangga', 'Kesehatan', 'neymar', '2017-05-01'),
('KEL007', 'coba', 'BANK', 'sanf ajkn', 'Norma', 'neymar', '2017-05-21'),
('KEL008', 'tika', 'asia', 'askugdiauhk', 'Kesehatan', 'Agus', '2017-05-17'),
('KEL009', 'ardi', 'asia parma', 'gaji ', 'Keselamatan', 'Nanang', '2017-05-01'),
('KEL010', 'adit', 'asia parma', 'gaji', 'Norma', 'Nanang S.H', '2017-03-06'),
('KEL011', 'andi', 'inspired', 'masalah dengan bos', 'Norma', 'Agus S.kom', '2017-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `penyidik`
--

CREATE TABLE IF NOT EXISTS `penyidik` (
  `id_penyidik` varchar(20) NOT NULL,
  `nm_penyidik` varchar(32) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyidik`
--

INSERT INTO `penyidik` (`id_penyidik`, `nm_penyidik`, `alamat`, `no_telp`, `jenis_kelamin`, `pendidikan`, `jabatan`) VALUES
('PENY001', 'Agus S.kom', 'Jl.Sukarno Hatta Malang', '09574537384', 'L', 'S1', 'penyidik'),
('PENY002', 'Nanang S.H', 'Malang', '09746378', 'L', 'S1 Management', 'penyidik'),
('PENY003', 'ujang', 'gasek', '085746367465', 'L', 'sarjana', 'penyidik');

-- --------------------------------------------------------

--
-- Table structure for table `unit_krj`
--

CREATE TABLE IF NOT EXISTS `unit_krj` (
  `id_unit_krj` varchar(20) NOT NULL,
  `nm_unit_krj` varchar(32) NOT NULL,
  `lokasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_krj`
--

INSERT INTO `unit_krj` (`id_unit_krj`, `nm_unit_krj`, `lokasi`) VALUES
('PER001', 'PT.JayaMakmur', 'Jl.galunggung'),
('PER002', 'bca', 'Jl.galunggung'),
('PER003', 'inspired', 'jl.sukarno hatta'),
('PER004', 'bata', 'sukun'),
('PER005', 'asia parma', 'jemblung'),
('PER006', 'bri syariah', 'jl ijen Malang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` enum('admin','penyidik') NOT NULL,
  `blokir` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `no_hp`, `level`, `blokir`) VALUES
('USR001', 'admin', 'admin', 'Mochammad Khozinudin', '081224923354', 'admin', 'N'),
('USR002', 'messy', 'messi', 'Lionel Messi', '081365580887', 'penyidik', 'N'),
('USR004', 'daus', '12345', 'M. Firdaus ST', '+6281365580887', 'penyidik', 'N'),
('USR005', 'penyidik', 'penyidik', 'asdfgh', '+62789', 'penyidik', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_peng`
--
ALTER TABLE `jenis_peng`
 ADD PRIMARY KEY (`id_jenis_peng`), ADD KEY `id_jabatan` (`id_jenis_peng`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
 ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `penyidik`
--
ALTER TABLE `penyidik`
 ADD PRIMARY KEY (`id_penyidik`), ADD KEY `id_pangkat` (`id_penyidik`);

--
-- Indexes for table `unit_krj`
--
ALTER TABLE `unit_krj`
 ADD PRIMARY KEY (`id_unit_krj`), ADD KEY `id_unit_krj` (`id_unit_krj`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
