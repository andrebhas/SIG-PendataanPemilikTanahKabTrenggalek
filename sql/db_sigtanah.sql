-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 08:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigtanah`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `penulis`, `tanggal`) VALUES
(1, 'dasasd', 'sdsds', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_tanah`
--

CREATE TABLE IF NOT EXISTS `data_tanah` (
  `id_tanah` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_jenis_bangunan` int(11) NOT NULL,
  `penginput` int(11) NOT NULL,
  `persil` varchar(128) NOT NULL,
  `luas_tanah` varchar(128) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_tanah`
--

INSERT INTO `data_tanah` (`id_tanah`, `id_penduduk`, `id_jenis_bangunan`, `penginput`, `persil`, `luas_tanah`, `lat`, `lng`, `gambar`, `tanggal`) VALUES
(11, 15, 6, 1, '999111', '20 m2', '-8.310889958117642', '111.59834494921267', '12.jpg', '2016-08-06 02:54:55'),
(12, 15, 5, 1, '18731231', '2000m2', '-8.307174282628008', '111.59722915026248', 'earth-day-vector-02.jpg', '2016-08-06 02:55:42'),
(13, 16, 5, 1, '12783234862', '23123123m2', '-8.301961661429932', '111.603087094751', 'Factory09.jpg', '2016-08-06 02:57:15'),
(14, 16, 4, 1, '32423423', '12387236m2', '-8.324637651251285', '111.60557618471682', 'green_icons.jpg', '2016-08-06 02:58:13'),
(15, 16, 6, 1, '233123', '2323423', '-8.324213019301027', '111.59733643862319', 'cincin-blue-topaz-cz-ring-6.jpg', '2016-08-06 05:24:48'),
(16, 17, 5, 1, '644764', '143', '-8.3086711732724', '111.60086622568667', 'kebun1.jpg', '2016-08-07 09:31:55'),
(17, 17, 5, 1, '87632423', '726342', '-8.318671530144947', '111.59991135927737', 'buler.jpg', '2016-08-07 11:07:25'),
(18, 17, 6, 1, '13344234', '1000 hektar', '-8.310974887431703', '111.59755101534427', 'rumah1.jpg', '2016-08-07 13:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'staf pegawai', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bangunan`
--

CREATE TABLE IF NOT EXISTS `jenis_bangunan` (
  `id_jenis_bangunan` int(11) NOT NULL,
  `nama_bangunan` varchar(128) NOT NULL,
  `icon_marker` varchar(56) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bangunan`
--

INSERT INTO `jenis_bangunan` (`id_jenis_bangunan`, `nama_bangunan`, `icon_marker`) VALUES
(4, 'Sawah', 'rice.png'),
(5, 'Kebun', 'tree.png'),
(6, 'Rumah', 'ne_barn-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_telepon` varchar(56) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `no_induk`, `nama`, `alamat`, `no_telepon`) VALUES
(15, 2147483647, 'tester', 'Jln tester no 45 jember', '082333817317'),
(16, 2147483647, 'tester2', 'Jln Tester 2 Jember', '08999633043'),
(17, 1245, 'jayeng hardika', 'tawing rt 16', '08898090-9');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `keterangan1` varchar(128) NOT NULL,
  `keterangan2` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`, `keterangan1`, `keterangan2`) VALUES
(4, 'bg3.jpg', 'Welcome', 'SIGTANAH'),
(6, 'bupati-wakil-bupati-trenggalek-emil-elestianto-dardak-kiri-dan-mochamad-_160217165249-138.jpg', 'iki bupatiku rek....', 'coblos no 1...'),
(7, 'bmbhiacae30.jpg', 'SISTEM INFORMASI GEOGRAFIS PEMETAAN TANAH PADA DESA TAWING KAB.TRENGGALEK', 'SEMUA BISA TERATASI.....');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `nama_lengkap` varchar(256) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `phone`, `email`, `foto`, `last_login`, `ip_address`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `active`) VALUES
(1, 'Administrator', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '0', 'admin@admin.com', '', 1470594895, '127.0.0.1', '', '', NULL, NULL, NULL, 1268889823, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `penulis` (`penulis`);

--
-- Indexes for table `data_tanah`
--
ALTER TABLE `data_tanah`
  ADD PRIMARY KEY (`id_tanah`),
  ADD KEY `id_tanah` (`id_tanah`,`id_jenis_bangunan`,`penginput`,`persil`,`luas_tanah`,`lat`,`lng`,`gambar`,`tanggal`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bangunan`
--
ALTER TABLE `jenis_bangunan`
  ADD PRIMARY KEY (`id_jenis_bangunan`),
  ADD KEY `id_jenis_bangunan` (`id_jenis_bangunan`,`nama_bangunan`,`icon_marker`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD KEY `id_penduduk` (`id_penduduk`,`no_induk`,`nama`,`alamat`,`no_telepon`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_tanah`
--
ALTER TABLE `data_tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_bangunan`
--
ALTER TABLE `jenis_bangunan`
  MODIFY `id_jenis_bangunan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
