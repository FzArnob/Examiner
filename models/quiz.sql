-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 12:41 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `qsn` varchar(200) NOT NULL,
  `qnum` int(50) NOT NULL,
  `sdate` date NOT NULL,
  `sh` int(50) NOT NULL,
  `sm` int(50) NOT NULL,
  `ss` int(50) NOT NULL,
  `edate` date NOT NULL,
  `eh` int(50) NOT NULL,
  `em` int(50) NOT NULL,
  `es` int(50) NOT NULL,
  `ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `title`, `qsn`, `qnum`, `sdate`, `sh`, `sm`, `ss`, `edate`, `eh`, `em`, `es`, `ans`) VALUES
(2, 'Higher Maths and Physics', 'hmp1.jpg', 25, '2020-09-27', 13, 32, 0, '2020-09-27', 21, 35, 0, 'AAAAAAAAAAAAAAAAAAAAAAAAA'),
(10, 'PHY', 'Phy1.jpg', 5, '2020-09-27', 20, 56, 0, '2020-09-28', 21, 0, 0, 'AAAAA');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(50) NOT NULL,
  `ex_title` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `atmp` int(50) NOT NULL,
  `score` int(50) NOT NULL,
  `qnum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `ex_title`, `User`, `u_email`, `atmp`, `score`, `qnum`) VALUES
(3, 'Higher Maths and Physics', 'Farhan', 'fz.arnob@gmail.com', 22, 17, 25),
(4, 'HM', 'a', 'a@as.sd', 15, 12, 15),
(5, 'Higher Maths and Physics', 'a', 'a@as.sd', 4, 4, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `dofb` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `number`, `dofb`, `institution`, `verified`, `token`, `password`) VALUES
(1, 'Md.Farhan', 'md.farhan.zaman@g.bracu.ac.bd', '01521581368', '1996-02-07', 'BRACU', 0, 'bf3aad9200a31c6063375294b5e1187d95e42a743663ce87c2b4ac1bddec3177e93f07cb32061677d2b5e3b8d01f7bd86ec3', '$2y$10$uAfxj2ebk9V/zcPFcbDI/OavBdRGoMPZpbBbXWOYCQ5AvQjxti0Hy'),
(3, 'FarhanZaman', 'farhanzamanarnob@gmail.com', '01521581368', '2000-03-06', 'baracu', 0, '710df4d3bfeb962078183a0261a16fcb542161031b272e4575954946288c274f7c0d12c70f5ea9e5fe46e61c52210f3b8fa9', '$2y$10$FeSmiTvpRza.hQ8h7bn3s.iFhnHuQTn1B0759MMQjeePxjjranhnK'),
(4, 'a', 'a@as.sd', 'a', '2000-12-31', 'a', 0, '1d570c3b31c9d5f358bd00c6f7e7ad933902e42ad2480a3504e19e6c06b9bb2be096a20277ebee4fba2f99b759b28a287971', '$2y$10$rIrsNQ0ynYuWNAq4IvJQle3dy7t5bfswjAc7UKQdcKV2/4cTYBbhe'),
(5, 'Farhan', 'fz.arnob@gmail.com', '015294161654', '1996-12-05', 'BracU', 0, 'ca0c06662497a5af22829d8ac0e43691814cdf4af55772a88b23d7ffec6611938574b4535df516b9e4e2873d9ac6cf610398', '$2y$10$ptJ9es.crU.aJAeyHdNYX.ixF2ia6kJLeQrxwT54mYx8La7amalD2'),
(7, '17101137', 'a@ddfjh.vd', '01521581368', '2020-09-23', 'BRACU', 0, 'b411be308bd9a0c0d9e06e58012745dd7b8e5219c50a38410ea901254032e3898751c5c0daa8d02eb2f4ca766f1e81c40090', '$2y$10$q/MdekyiHMst8ORxBoI7EO5RH0MAKRpQFxKY2UIjzOuOTLkaAnbla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
