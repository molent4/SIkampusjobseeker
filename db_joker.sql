-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 06:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_joker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userAdmin` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role` enum('m','p','a') NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `username`, `password`, `image`, `role`, `is_active`, `date_created`) VALUES
(1, 'wahyutirta12345@gmail.com', 'wahyutirta', '$2y$10$KR0D7kOX9wrsargxr8Xwne9aIDa4lEjhiLEH9jp.DC6eJddxwEIza', 'default.jpg', 'a', 1, 0),
(2, 'wahyutirta123@gmail.com', 'admin1', '123456', 'default.jpg', 'a', 1, 0),
(3, 'wahyutirta27@gmail.com', 'wahyut', '123456', 'default.jpg', 'p', 1, 0),
(4, 'budi@email.com', 'admin2', '$2y$10$KkShWLaaz9D2FZaeGtvkbOwUfuEerMptmsaCZHYyFWUz40WRRqhXq', 'default.jpg', 'm', 1, 0),
(6, 'wahyutirta1233@gmail.com', 'admin3', '$2y$10$x.cf2uAc6L8lEmbsfrJMwOX5/ILBxN3vNw/BKsizQZ4W4VAWBMOku', 'default.jpg', 'p', 1, 1576947719),
(7, 'dewadeyuda12@gmail.com', 'admin4', '$2y$10$NL14ELcjTZi9zH2wJp9zou947K5LXq67OLkCJP.VBM1hWy8K2zrta', 'default.jpg', 'p', 1, 1577039828),
(8, 'yudadewa8888@gamil.com', 'wahyuttt', '$2y$10$MylYRr6ep8vmPGGBMMlGIurzW5zsoQaonapYSJ4ECp/.ots1LkOkW', 'default.jpg', 'm', 1, 1577050186),
(10, 'dewadeyuda1245@gmail.com', 'admin6', '$2y$10$iSZf3MPHWGpqEjOrI50FPO/RnSZGD3xWwZTtiJPPW0DBXTt96WI1S', 'default.jpg', 'm', 1, 1577068092),
(11, 'pesimis@gmail.com', 'pesimis', '$2y$10$Bw.Ebme4neW4/khw1XmeG.aApKHd15rYgZBIdxc.7tbkEbtcjbPOe', 'default.jpg', 'm', 1, 1577080588),
(12, 'perusahaanku@gmail.com', 'perusahaanku', '$2y$10$XJqsJkkLaAqoIU4uPwBTMOkP0cPUj9Ds8.iprnWBSgoKNJMOW9BBK', 'default.jpg', 'p', 1, 1577080770),
(13, 'perusahaanku2@gmail.com', 'perusahaanku2', '$2y$10$NLgVO19jyRBqnWpajEohPe0SyCEpKRESyx9HSUtnVhe9V770cMfhS', 'default.jpg', 'p', 1, 1577083001),
(14, 'perusahaanku3@gmail.com', 'perusahaanku3', '$2y$10$LoRIrlCy03a72zQXCv0jDOv9YZbsC8VVz17jSnwx3mHbu2kpufmpm', 'default.jpg', 'p', 1, 1577083048),
(15, 'perusahaanku34@gmail.com', 'perusahaanku34', '$2y$10$lV9y74UJBRYVdQqkz0zwLOFRiW8WCstiIg7PfMbkTyxhB0cn9rbWO', 'default.jpg', 'p', 1, 1577083082);

-- --------------------------------------------------------

--
-- Table structure for table `akun_menu`
--

CREATE TABLE `akun_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_menu`
--

INSERT INTO `akun_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa'),
(3, 'Perusahaan'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `akun_sub_menu`
--

CREATE TABLE `akun_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `ikon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_sub_menu`
--

INSERT INTO `akun_sub_menu` (`id`, `menu_id`, `title`, `url`, `ikon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'mahasiswa', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'mahasiswa/edit', 'fas fa-fw fa-user-edit', 1),
(4, 4, 'Menu Management', 'menu', 'far fa-fw fa-folder-open', 1),
(5, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-users-cog', 1),
(7, 1, 'Academic', 'admin/academic', 'fas fa-fw fa-university', 1),
(8, 3, 'My Profile', 'perusahaan', 'fas fa-fw fa-user', 1),
(9, 3, 'Edit Profile', 'perusahaan/edit', 'fas fa-fw fa-user-edit', 1),
(10, 3, 'Add Job', 'perusahaan/addjob', 'fas fa-fw fa-user-md', 1),
(11, 3, 'View Job', 'perusahaan/viewjob', 'far fa-fw fa-eye', 1),
(12, 2, 'Job List', 'mahasiswa/joblist', 'fas fa-fw fa-list', 1),
(13, 3, 'Employe', 'perusahaan/employe', 'fas fa-fw fa-address-card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Teknologi Informasi'),
(2, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lowongan`
--

CREATE TABLE `detail_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(40) NOT NULL,
  `bidang` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `gaji` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_lowongan`
--

INSERT INTO `detail_lowongan` (`id_lowongan`, `id_perusahaan`, `nama_pekerjaan`, `bidang`, `jenis`, `gaji`, `deskripsi`) VALUES
(3, 2, 'Back End DEV', 1, 1, '9000000000', 'pokoknya hadal dan jago coding, kalo tidak? kick!'),
(4, 3, 'Back End DEV', 1, 1, '1000000000', 'pokoknya hadal dan jago coding, kalo tidak? kick!'),
(5, 3, 'Front End DEV', 1, 1, '9000000', 'pokoknya hadal dan jago coding, kalo tidak? kick!'),
(6, 4, 'jual ginjal', 1, 1, '100000', 'ginjal aman'),
(7, 8, 'jual paru', 1, 1, '2000000', 'paruku parumu'),
(8, 4, 'job baru', 2, 1, '1000000000', 'cocok tanam');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Ilmu Budaya'),
(2, 'Teknik'),
(3, 'Ekonomi Dan Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `jenispekerjaan`
--

CREATE TABLE `jenispekerjaan` (
  `id_jenis` int(11) NOT NULL,
  `jenis_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispekerjaan`
--

INSERT INTO `jenispekerjaan` (`id_jenis`, `jenis_pekerjaan`) VALUES
(1, 'Daily Worker'),
(2, 'Part Time'),
(3, 'Internship');

-- --------------------------------------------------------

--
-- Table structure for table `lamar`
--

CREATE TABLE `lamar` (
  `id_lowongan` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `cv` varchar(128) NOT NULL,
  `apply_date` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamar`
--

INSERT INTO `lamar` (`id_lowongan`, `nim`, `cv`, `apply_date`) VALUES
(3, '1708561032', 'IMG001.pdf', 1577071980),
(3, '1708561036', 'IMG001.pdf', 1577074179),
(3, '', '', 1577080662),
(6, '1708561031', 'IMG0011.pdf', 1577080861),
(8, '1708561031', 'IMG002.pdf', 1577084480);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_perusahaan`, `status`) VALUES
(3, 2, 1),
(3, 3, 1),
(5, 3, 1),
(6, 4, 1),
(7, 8, 1),
(8, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` int(32) NOT NULL,
  `tmpt_lahir` varchar(20) NOT NULL,
  `fakultas` int(11) NOT NULL,
  `prodi` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` varchar(5) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_akun`, `nama`, `tgl_lahir`, `tmpt_lahir`, `fakultas`, `prodi`, `semester`, `ipk`, `no_hp`, `email`, `alamat`, `foto`) VALUES
('1708561032', 4, 'budi do re mii', 0, 'Denpasar', 2, 1, 2, '', '081237131016', 'budi@email.com', 'dalung permai', 'swirl_effecttt.png'),
('', 5, '', 0, '', 0, 0, 0, '', '', '', '', ''),
('1708561033', 8, 'budi', 2019, 'denpasar', 1, 2, 3, '', '081237131016', 'yudadewa8888@gamil.com', 'dalung', 'WIN_20191018_19_20_10_Pro.jpg'),
('1708561043', 9, 'Dewa Yudha Ari WIbawa', 1999, 'Klungkung', 1, 2, 1, '', '0895394611698', 'dewayudabagus@gmail.com', 'Jln. Kecubung', 'Foto_Yudha.jpg'),
('1708561036', 10, 'wahyu tirta', 2019, 'Denpasar', 2, 1, 3, '', '081237131016', 'dewadeyuda1245@gmail.com', 'Dalung Permai', 'foto_yudha1.jpg'),
('1708561031', 11, 'lanang', 0, 'denasar', 1, 1, 2, '', '09090912', 'pesimis@gmail.com', 'sempidi', 'foto_yudha2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_perusahaan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(14) NOT NULL,
  `email` varchar(32) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `id_akun`, `nama_perusahaan`, `alamat`, `kontak`, `email`, `foto`) VALUES
(2, 6, 'Maju Mundur', 'dalung permai', '081237131016', '', 'WIN_20191018_19_20_15_Pro.jpg'),
(3, 7, '', '', '', '', ''),
(4, 12, 'perusahaan yuda', 'des', '12212121', '', 'foto_yudha.jpg'),
(5, 13, '', '', '', '', ''),
(6, 14, '', '', '', '', ''),
(8, 15, 'perusahaan lanang', 'sempidi', '08131', '', '61_A_LKCT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_jurusan`, `id_fakultas`, `jurusan`) VALUES
(1, 1, 'Antropologi Budaya'),
(2, 1, 'Sastra Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_mhs`
--

CREATE TABLE `riwayat_mhs` (
  `nim` varchar(10) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `apply_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nama_pekerjaan` varchar(40) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(3) NOT NULL,
  `semester` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Table structure for table `user_acces_menu`
--

CREATE TABLE `user_acces_menu` (
  `id` int(11) NOT NULL,
  `role_id` enum('m','p','a') NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_acces_menu`
--

INSERT INTO `user_acces_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 'a', 1),
(2, 'a', 2),
(3, 'm', 2),
(4, 'a', 4),
(6, 'p', 3),
(7, 'a', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` varchar(3) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
('a', 'admin'),
('m', 'mahasiswa'),
('p', 'perusahaan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userAdmin`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `akun_menu`
--
ALTER TABLE `akun_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `akun_sub_menu`
--
ALTER TABLE `akun_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `bidang` (`bidang`,`jenis`),
  ADD KEY `jenis` (`jenis`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jenispekerjaan`
--
ALTER TABLE `jenispekerjaan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `riwayat_mhs`
--
ALTER TABLE `riwayat_mhs`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `akun_menu`
--
ALTER TABLE `akun_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `akun_sub_menu`
--
ALTER TABLE `akun_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenispekerjaan`
--
ALTER TABLE `jenispekerjaan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  ADD CONSTRAINT `user_acces_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `akun_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
