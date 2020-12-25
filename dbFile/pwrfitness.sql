-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 05:04 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwrfitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `userregis`
--

CREATE TABLE `userregis` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_date_birth` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_addr` varchar(255) NOT NULL,
  `user_postel` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_cemail` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_cpass` varchar(255) NOT NULL,
  `user_agree` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregis`
--

INSERT INTO `userregis` (`id`, `username`, `user_date_birth`, `user_gender`, `user_mobile`, `user_addr`, `user_postel`, `user_email`, `user_cemail`, `user_pass`, `user_cpass`, `user_agree`, `token`, `status`) VALUES
(1, 'shubham saini', '1996-08-29', 'Male', '1234567890', 'test', 'test123', 'test@one.com', 'test@one.com', '$2y$10$gWsFNzkKi7dHyyk645AA.uIqo82mdmlLrsOjrcU6A5/EmAxk.wJXu', '$2y$10$zlvmKIBNlNE/GwzeuduTJeRkdxhzJgVAwgE1HK7ZilT/hgJRQxgfK', 'Agree', '', ''),
(2, 'ram', '2020-10-21', 'Male', '1234567890', 'test2', 'test1234', 'admin@gmail.com', 'admin@gmail.com', '$2y$10$tSvQA29Uq68z8P9BEqHRheBDwkDCnpr.tpb.ghWW.cYaQN0sOrjvW', '$2y$10$3UUNpdUUxv4qIfoyvSfVsuyBAhxYv6.FhWF3o4I7F.JuJrWv5ipoS', 'Agree', '', ''),
(3, 'ram', '2020-10-14', 'Male', '1234567890', 'test3`', 'test123', 'admin@one.com', 'admin@one.com', '$2y$10$spZClviltyTiTArHq9PeLuFZvTjPf.aWPGCyBGg9u55nyPs68q0Gu', '$2y$10$5mDwvH9KCPnJUHPj5gnbuuoijC7769iwxS3jwkTX7Ms/xWtCQ1AjS', 'Agree', '', ''),
(4, '', '', 'Male', '', '', '', 'admin@two.com', 'admin@two.com', '$2y$10$YX7Y8AFsWcHy47QFRDs.8eE2/aH0Nlrgp2W5UeEybFrV8DUJImQ.e', '$2y$10$QbdOdJJYOrLG5cpAcGGs6ehI1KLgQ3pWEK5ihs5d7uffb.mV5BOnO', 'Agree', '', ''),
(5, 'ravi', '2020-11-11', 'Male', '123457890', 'testravi', 'testravi123', 'ad@gmail.com', 'ad@gmail.com', '$2y$10$pxmKVYV/DSuGkAkSGdhvAuRVrmXWmEAsULwEi/V1pXImeWypAavpy', '$2y$10$78Gw31F3b6kVaFtKW3wimuOBHTUvYqVBu6h05ZZwx6U4Ui4Z/1Y62', 'Agree', '8e317caf803b7caa9ac60a96247934', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userregis`
--
ALTER TABLE `userregis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userregis`
--
ALTER TABLE `userregis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
