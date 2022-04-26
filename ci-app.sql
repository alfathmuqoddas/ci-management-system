-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 08:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `amgr_input`
--

CREATE TABLE `amgr_input` (
  `id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `no_dok_uat_int` varchar(64) DEFAULT NULL,
  `tanggal_uat_int` date DEFAULT NULL,
  `hasil_uat_int` text,
  `status_revisi_int` varchar(20) DEFAULT NULL,
  `list_revisi_int` text,
  `no_dok_uat_usr` varchar(64) DEFAULT NULL,
  `tanggal_uat_usr` date DEFAULT NULL,
  `hasil_uat_usr` text,
  `status_revisi_usr` varchar(20) DEFAULT NULL,
  `list_revisi_usr` text,
  `dokumen_uat` varchar(64) DEFAULT NULL,
  `response` tinyint(1) DEFAULT NULL,
  `tanggal_amgr_input` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amgr_input`
--

INSERT INTO `amgr_input` (`id`, `input_id`, `no_dok_uat_int`, `tanggal_uat_int`, `hasil_uat_int`, `status_revisi_int`, `list_revisi_int`, `no_dok_uat_usr`, `tanggal_uat_usr`, `hasil_uat_usr`, `status_revisi_usr`, `list_revisi_usr`, `dokumen_uat`, `response`, `tanggal_amgr_input`) VALUES
(4, 7, 'No_dokumen_uat_internal_001', '2022-04-14', 'Sukses', 'Tidak Ada', 'list revisi', 'no_dokumen_user_001', '2022-04-14', 'Sukses', 'Tidak Ada', 'list revisi', NULL, 1, '2022-04-14 11:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 2, '1', '2022-04-08 01:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `developer_input`
--

CREATE TABLE `developer_input` (
  `id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `tanggal_update` date NOT NULL,
  `progress` int(11) DEFAULT NULL,
  `keterangan` text,
  `status_progress` varchar(20) DEFAULT NULL,
  `tanggal_realisasi` date DEFAULT NULL,
  `response` tinyint(1) DEFAULT NULL,
  `tanggal_developer_input` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'user_biasa', 'user biasa'),
(4, 'manager', 'Manager'),
(5, 'developer', 'developer'),
(6, 'amgr', 'amgr');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'alfath2', 1650262746),
(2, '::1', 'alfath2', 1650263138);

-- --------------------------------------------------------

--
-- Table structure for table `manager_input`
--

CREATE TABLE `manager_input` (
  `id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `prioritas` varchar(20) DEFAULT NULL,
  `tanggal_diskusi_internal` varchar(20) DEFAULT NULL,
  `tanggal_diskusi_owner` varchar(20) DEFAULT NULL,
  `timeline` text,
  `start_dev` varchar(20) DEFAULT NULL,
  `finish_dev` varchar(20) DEFAULT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  `pic_developer` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `response` tinyint(1) DEFAULT NULL,
  `tanggal_manager_input` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_input`
--

INSERT INTO `manager_input` (`id`, `input_id`, `prioritas`, `tanggal_diskusi_internal`, `tanggal_diskusi_owner`, `timeline`, `start_dev`, `finish_dev`, `jumlah_hari`, `pic_developer`, `keterangan`, `response`, `tanggal_manager_input`) VALUES
(22, 11, 'High', '2022-04-18', '2022-04-18', NULL, '2022-04-18', '2022-04-19', NULL, 'Anonymous', 'Keterangan 123', 1, '2022-04-18 21:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(1, 1, 2, 'Post 1', 'Post-1', '<p>This is the post 1 that has been edited</p>\r\n', 'noimage.jpg', '2022-04-08 01:11:57'),
(2, 1, 2, 'This is the post 3', 'This-is-the-post-3', '<p>This is the body of post 3</p>\r\n', 'Screenshot (1).png', '2022-04-12 07:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$b8QHTEJeDjWJbxLzNVnXyuGuHzTNc/qBo1gMT.fMhAXtrgEDwfmXu', 'admin@admin.com', NULL, '', NULL, NULL, NULL, '998afefd6f8078c7b48eb359a9a35f6680514c12', '$2y$10$6Yi7UaxZz//OQ58TofFqbeX9YnkPNik53WUQKvQszv1.df2UnzqwG', 1268889823, 1650291265, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, '::1', NULL, '$2y$10$O0oCjmnU.mpj0QuBLBGRHefjhlvrPiBkObNFrhO84WkotHpX.0hty', 'alfath.muqoddas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1650266324, NULL, 1, 'Alfath', 'Muqoddas', '', ''),
(4, '::1', NULL, '$2y$10$MzFjlwBDbuUNZL5XNYu4fOzNyt8rWgeZHMzN1cLEw4CP9FYwqnUc6', 'manager@manager.com', NULL, NULL, NULL, NULL, NULL, '4cb76ffc396ffb6428ce13dd080ed93d69fc4e1e', '$2y$10$CnSLmeQt/tO9eNcUAdcXf.jgxNQzKYly//NvP5tcEkIVH7jx032Z6', 1650266395, 1650291287, 1, 'Manager', 'Manager', '', ''),
(5, '::1', NULL, '$2y$10$MhzKK6XrSs.bb.An9E41L.ssaiXo7bRjlctJZ1ZDoK/p.ZRTl6lPW', 'developer@developer.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1650266430, NULL, 1, 'Developer', 'Developer', '', ''),
(6, '::1', NULL, '$2y$10$a/x2o0dsTkVj5vWtwcvoheZYaTXjiVkZM6PsoUIBe9Q8rt9xBWjJy', 'amgr@amgr.com', NULL, NULL, NULL, NULL, NULL, 'd41c6b5548c12048bbeac15f44faefdf8e8a3412', '$2y$10$0OH/J93NtXFA./MpfmmuNuDrxfIv9OYAvzHDDJl6Z9yi6ytRoUlEa', 1650266462, 1650268722, 1, 'Amgr', 'Amgr', '', ''),
(7, '::1', NULL, '$2y$10$YndnhY0uvcX0NYpXBYqYq.bpCqBtJJyQEQCL//lpIqIS3LJ55lEfC', 'user@biasa.com', NULL, NULL, NULL, NULL, NULL, '7c2270a912f380b84df074ccfa242dadbd8b558e', '$2y$10$iz.D.1jQSRLJUl5aJku89OHJMMusU0fUfb.5O3EtcshS7p3OsKAZ.', 1650268586, 1650271254, 1, 'User', 'Biasa', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 1, 1),
(12, 3, 1),
(6, 4, 4),
(8, 5, 5),
(14, 6, 6),
(16, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_input`
--

CREATE TABLE `user_input` (
  `id` int(11) NOT NULL,
  `no_id_pengembangan` varchar(64) DEFAULT NULL,
  `jenis` varchar(64) NOT NULL,
  `source_aplikasi` varchar(64) NOT NULL,
  `no_notin` varchar(64) DEFAULT NULL,
  `tanggal_notin` date NOT NULL,
  `no_user_request` varchar(64) DEFAULT NULL,
  `tanggal_user_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_desc` text,
  `dokumen` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_input`
--

INSERT INTO `user_input` (`id`, `no_id_pengembangan`, `jenis`, `source_aplikasi`, `no_notin`, `tanggal_notin`, `no_user_request`, `tanggal_user_request`, `short_desc`, `dokumen`, `user_id`) VALUES
(11, NULL, 'New Initiation', 'BNI Smarter', '11223344', '2022-04-18', '11223344', '2022-04-18 07:39:21', 'Simple description file upload', 'no file uploaded', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amgr_input`
--
ALTER TABLE `amgr_input`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_id` (`input_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer_input`
--
ALTER TABLE `developer_input`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_id` (`input_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_input`
--
ALTER TABLE `manager_input`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_id` (`input_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_input`
--
ALTER TABLE `user_input`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amgr_input`
--
ALTER TABLE `amgr_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developer_input`
--
ALTER TABLE `developer_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager_input`
--
ALTER TABLE `manager_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_input`
--
ALTER TABLE `user_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
