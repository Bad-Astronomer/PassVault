-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 07:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passvault`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` text NOT NULL,
  `email` text NOT NULL,
  `ph_num` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `pwd` text NOT NULL,
  `OTP` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `pwd`, `OTP`) VALUES
('Ayush Khandare', 'ayush.khandare@somaiya.edu', 'jaQpIugTXO4=', '019845');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `website_usrnm` text NOT NULL,
  `website_pwd` text NOT NULL,
  `master_nm` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`website_usrnm`, `website_pwd`, `master_nm`) VALUES
('Instagram', 'j4d/FsFlSp12J6GpUQ==', 'Ayush Khandare'),
('Facebook', 'mpIPEst0JYtsP6yk', 'Ayush Khandare'),
('Linkedin', 'poQpELFRDb5/XY+b', 'Ayush Khandare'),
('Gmail', 'jpl9E8lmOJYaP8av', 'Ayush Khandare'),
('Bank of Maharashtra', 'ju0yBLIUALgNPQ==', 'Ayush Khandare'),
('ICICI', '/7skKOhnIKdNSIDEUQj4fA==', 'Ayush Khandare'),
('LMS', 'nZd5Z80bVvls', 'Ayush Khandare'),
('Bank', 'mpELGKZwPJR3S7fEW3s=', 'Ayush Khandare'),
('Spotify', 'nZ689QXCym57jkZFXNAepyjjOY464oHQ', 'Ayush Khandare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD KEY `master_nm` (`master_nm`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `website`
--
ALTER TABLE `website`
  ADD CONSTRAINT `website_ibfk_1` FOREIGN KEY (`master_nm`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
