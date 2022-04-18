-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 01:36 PM
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
(4, 7, 'No_dokumen_uat_internal_001', '2022-04-14', 'Sukses', 'Tidak Ada', 'list revisi', 'no_dokumen_user_001', '2022-04-14', 'Sukses', 'Tidak Ada', 'list revisi', NULL, 1, '2022-04-14 11:15:01'),
(5, 8, 'No_dokumen_uat_internal_001', '2022-04-14', 'Disetujui', 'Minor', 'List Revisi', 'no_dokumen_user_001', '2022-04-14', 'Disetujui', 'Minor', 'List Revisi', NULL, 1, '2022-04-14 15:10:09');

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

--
-- Dumping data for table `developer_input`
--

INSERT INTO `developer_input` (`id`, `input_id`, `tanggal_update`, `progress`, `keterangan`, `status_progress`, `tanggal_realisasi`, `response`, `tanggal_developer_input`) VALUES
(3, 7, '2022-04-14', 20, 'Keterangan Developer input', 'On Progress', '2022-04-15', 1, '2022-04-14 13:18:22'),
(5, 8, '2022-04-14', 20, 'Keterangan 123', 'On Progress', '2022-04-14', 1, '2022-04-14 15:08:33');

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
(19, 6, 'High', '2022-04-14', '2022-04-15', NULL, '2022-04-16', '2022-04-17', NULL, 'Anonymous 2', 'Keterangan Biasa', 1, '2022-04-14 09:03:35'),
(20, 7, 'High', '2022-04-14', '2022-04-15', NULL, '2022-04-16', '2022-04-17', NULL, 'Anonymous 2', 'Keterangan 123456', 1, '2022-04-14 10:45:26');

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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(2, 'Alfath2', '111', 'alfath2@gmail.com', 'alfath2', '18203dfeee87fd334b698e170052b335', '2022-04-08 01:10:25'),
(3, 'manager', '', 'manager@gmail.com', 'manager', '1d0258c2440a8d19e716292b231e3190', '2022-04-14 07:33:58'),
(4, 'developer', '', 'developer@gmail.com', 'developer', '5e8edd851d2fdfbd7415232c67367cc3', '2022-04-14 07:34:21'),
(5, 'amgr', '', 'amgr@gmail.com', 'amgr', '36f8e3133f67b5843842cb4d4983f08f', '2022-04-14 07:34:42');

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
(8, NULL, 'New Initiation', 'BNI Smarter', '11223344', '2022-04-14', '11223344', '2022-04-14 07:17:54', 'Simple description', 'file-upload-test.txt', 2),
(9, NULL, 'Enhancement', 'BNI Smarter', '11223344', '2022-04-14', '11223344', '2022-04-14 07:49:01', 'Simple description', 'file-upload-test.txt', 2);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `developer_input`
--
ALTER TABLE `developer_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager_input`
--
ALTER TABLE `manager_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_input`
--
ALTER TABLE `user_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
