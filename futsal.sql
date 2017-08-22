-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2017 at 03:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `isi`) VALUES
(1, '<p><strong>Boyolali Futsal</strong></p>\r\n\r\n<p>Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Jl. Kemuning boyolali</p>\r\n\r\n<p>Kode Pos &nbsp; &nbsp; &nbsp; : 45571</p>\r\n\r\n<p>Fax/Telp. &nbsp; &nbsp; &nbsp; &nbsp;: 081874687243</p>\r\n'),
(2, '<ul>\r\n	<li>Dilarang membuang puntung rokok yang masih menyala di sembarang tempat</li>\r\n	<li>Dilarang bermain api dan membawa bahan kimia yang membahayakan</li>\r\n	<li>Dilarang membawa minuman keras dan obat-obatan terlarang ke dalam kompleks</li>\r\n	<li>Dilarang mencoret dinding dan merusak fasilitas olah raga&nbsp;</li>\r\n	<li>Dilarang membawa senjata tajam atau senjata api kecuali yang bertugas khusus</li>\r\n	<li>Dilarang berbuat tindakan amoral (judi, asusila dan pornografi lainnya)</li>\r\n	<li>Dilarang membuang sampah atau sisa makanan di sembarang tempat</li>\r\n	<li>Seluruh pengunjung tetap bertanggung jawab terhadap bawaan barang pribadi kecuali dititipkan secara sah dan disertai surat tanda terima</li>\r\n	<li>Kehilangan barang berharga atau barang lainnya yang tidak dititipkan secara sah kepada pengelola yang bertugas di luar tanggung jawab kami</li>\r\n	<li>Untuk menghindari risiko kehilangan barang-barang berharga seperti uang dan perhiasan, sebaiknya tidak dititipkan dan disimpan/diamankan secara pribadi oleh pengunjung sendiri</li>\r\n	<li>Kenyamanan dan keamanan bersama selalu menjadi perhatian kami, namun sebaliknya koordinasi, laporan dan kritik atas segala keterbatasan dan kekurangan pelayanan kami menjadi harapan guna perbaikan selanjutnya.</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `email`, `foto`) VALUES
(25, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin boyolali futsal', 'adminboyolalifutsal@gmail.com', '61logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `waktu` varchar(40) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `waktu`, `harga`) VALUES
(1, 'siang', '80000'),
(2, 'malam', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(2) NOT NULL,
  `nama_hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu'),
(7, 'minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jam` time NOT NULL,
  `id_harga` int(11) NOT NULL,
  `jams` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam`, `id_harga`, `jams`) VALUES
(1, '08:00:00', 1, '08.00-09.00'),
(3, '09:00:00', 1, '09.00-10.00'),
(4, '10:00:00', 1, '10.00-11.00'),
(5, '11:00:00', 1, '11.00-12.00'),
(6, '12:00:00', 1, '12.00-13.00'),
(7, '13:00:00', 1, '13.00-14.00'),
(8, '14:00:00', 1, '14.00-15.00'),
(9, '15:00:00', 1, '15.00-16.00'),
(10, '16:00:00', 1, '16.00-17.00'),
(11, '18:00:00', 2, '18.00-19.00'),
(12, '19:00:00', 2, '19.00-20.00'),
(13, '20:00:00', 2, '20.00-21.00'),
(14, '21:00:00', 2, '21.00-22.00'),
(15, '22:00:00', 2, '22.00-23.00'),
(16, '23:00:00', 2, '23.00-24.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nama_klub` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `nama_klub`, `email`, `alamat`, `no_telpon`) VALUES
(15, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'test fc', 'testfc@yahoo.com', 'Desa Garawangi No. 195', '021547896'),
(19, 'rojak', '944b2a47cfbde4eb5144d3b9a00063e4', 'Rojak Surdiyana', 'PSBS FC', 'rojaksurdiyana@live.com', 'Desa Margamukti RT.001/RW.005 ', '085794212222'),
(20, 'yana', 'e1ce1e8d0877b06b55b613d5b22b0251', 'Yana Hadiningrat', 'Pesantren FC', 'yanahadiningrat14@gmail.com', 'Ds Cineumbeuy No 178 RT06/RW02', '087745565579'),
(21, 'mulyadi', 'ef34c0dc47139e55c72bb333c3810131', 'mulyadi sumirat', 'Pangumbahan FC', 'mulyadisumingrat@ymail.com', 'Ds Cinagara RT08/RW05', '08565987456');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_klub` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(12) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(100) NOT NULL,
  `harga` char(10) NOT NULL,
  `dp` char(10) NOT NULL,
  `sisa` char(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_admin`, `id_pelanggan`, `id_harga`, `id_jadwal`, `username`, `nama_klub`, `alamat`, `no_telpon`, `tanggal`, `jam`, `harga`, `dp`, `sisa`, `status`) VALUES
(44, 0, 15, 2, 11, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-08-11', '18.00-19.00', '120000', '0', '0', 'Lunas'),
(45, 0, 15, 2, 12, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-08-11', '19.00-20.00', '120000', '0', '0', 'Lunas'),
(46, 25, 0, 2, 13, 'mulyadi', 'Pangumbahan FC', 'Ds Cinagara RT08/RW05', '08565987456', '2016-08-11', '20.00-21.00', '120000', '0', '', 'Lunas'),
(47, 0, 15, 1, 1, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-09-02', '08.00-09.00', '80000', '0', '0', 'Lunas'),
(48, 0, 15, 1, 1, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-09-04', '08.00-09.00', '80000', '0', '0', 'Lunas'),
(49, 0, 15, 1, 1, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-11-01', '08.00-09.00', '80000', '0', '0', 'Lunas'),
(50, 25, 0, 1, 1, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-11-24', '08.00-09.00', '80000', '0', '0', 'Lunas'),
(51, 0, 15, 1, 1, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2016-11-25', '08.00-09.00', '80000', '0', '0', 'Lunas'),
(52, 0, 15, 1, 1, 'user', 'test fc', 'Desa Garawangi No. 195', '021547896', '2017-08-31', '08.00-09.00', '80000', '', '', 'Tertunda');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `namafutsal` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `fax` char(20) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `namafutsal`, `alamat`, `kodepos`, `fax`, `no_hp`) VALUES
(1, 'Boyolali Futsal', 'boyolali', '45571', '09828937823', '07238472389');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
