-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 06:27 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qna`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Id` int(11) NOT NULL,
  `q_Id` int(11) DEFAULT NULL,
  `u_Id` int(11) DEFAULT NULL,
  `ans_body` text NOT NULL,
  `likes` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Id` int(11) NOT NULL,
  `u_Id` int(11) NOT NULL,
  `q_title` varchar(300) NOT NULL,
  `q_body` text NOT NULL,
  `likes` int(11) NOT NULL,
  `q_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question_like`
--

CREATE TABLE `question_like` (
  `q_Id` int(11) DEFAULT NULL,
  `u_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `u_phone` bigint(11) NOT NULL,
  `clg_name` varchar(250) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `q_ask` int(11) NOT NULL,
  `q_ans` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `q_Id` (`q_Id`),
  ADD KEY `u_Id` (`u_Id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `u_Id` (`u_Id`);

--
-- Indexes for table `question_like`
--
ALTER TABLE `question_like`
  ADD KEY `q_Id` (`q_Id`),
  ADD KEY `u_Id` (`u_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`q_Id`) REFERENCES `question` (`Id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`u_Id`) REFERENCES `user` (`Id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`u_Id`) REFERENCES `user` (`Id`);

--
-- Constraints for table `question_like`
--
ALTER TABLE `question_like`
  ADD CONSTRAINT `question_like_ibfk_1` FOREIGN KEY (`q_Id`) REFERENCES `question` (`Id`),
  ADD CONSTRAINT `question_like_ibfk_2` FOREIGN KEY (`u_Id`) REFERENCES `user` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
