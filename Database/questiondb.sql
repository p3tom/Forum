-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 10:54 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questiondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `message` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `ques_id`, `user_id`, `post_date`, `message`, `score`) VALUES
(3, 1, 1, '2018-07-30 06:23:42', 'test answer 1', 1),
(4, 1, 2, '2018-07-30 06:33:46', 'test answer 2', 0),
(5, 1, 2, '2018-07-30 06:38:00', 'test answer 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `followup_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `message` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`followup_id`, `answer_id`, `user_id`, `post_date`, `message`, `score`) VALUES
(1, 3, 3, '2018-07-30 06:45:41', 'test followup 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(24, 'John', 'Watson', 'armydoctor@gmail.com', '$2y$10$AW8Sa3jakg6a4Z3v0hJkx.2TmCQ4tEKmDbWxCmBJtWe5ElS6gSgE.'),
(25, 'Sherlock', 'Holmes', 'baskerville@gmail.com', '$2y$10$5O57Wa3zLGBpsMzH/GltPOeOoK0ZqObBk6a1B72PL8VJ/lUXooZ7i'),
(68, 'Hercule', 'Poirot', 'belgiandetective@perfection.com', '$2y$10$CgzBLPmoB6YJQC6DzFAVaeCtTl7g.i8vKeAIbyNqeMO/Vy3fLvSrS'),
(77, 'Jane', 'Marple', 'stmarymead@gmail.com', '$2y$10$QkD0EQeuKBKH3kKrgKz.ruVJNEhbxdNcJTMHrVIEEg0CJmeQYkQyS'),
(83, 'First', 'Last', 'test@email.com', '$2y$10$utINny8h.Cncisf8BM6B/.Qe/QYUsrssjryPCnj.6HLuO4Omw7h8m'),
(84, 'First', 'Last', 'test1@email.com', '$2y$10$JEF.UtG/sjT3v0Si7Bgp7e40npE3AOO2ULRU1NUhu4D66Geaqpz42'),
(85, 'First', 'Last', 'test2@email.com', '$2y$10$cxw/pOOkv2CYKhmuu68Mb.j6V.cKUl9Kb5ylbLW11O1bTq3J4X96O'),
(86, 'First', 'Last', 'test3@email.com', '$2y$10$U5FbXTMoBLngUBgRUi3/IO04impI8yfXMhUNDah2zKuKWbyjv8Gou'),
(87, 'First', 'Last', 'test4@email.com', '$2y$10$fDkbdj1XboWXbOmyge6PvOGPMJdZbLXoQqpEOS2UlXr96SvjwxK.O'),
(88, 'First', 'Last', 'test5@email.com', '$2y$10$NDSEXx/jeCZ2QAqKQZ.S/ebgDwI1dpyESjWVojOpXHRY/hGVYbZHK'),
(89, 'First', 'Last', 'test10@email.com', '$2y$10$06vvUw.6TYggQdqPaE.1JOyJaljTQP9gzqGefQscTD2Rbxt//v16q'),
(90, 'First', 'Last', 'test25@email.com', '$2y$10$e3DJCIX48x5qVfyeh7W8kOarKc3Zy7oOigic.hqep8kKwTrBClnMW'),
(91, 'First', 'Last', 'uhhyhyhyg@email.com', '$2y$10$MNdxA1Jm8TprC5KaIeqCTegR/0GTSWhBseO2pEQSY6poLoP.au6De'),
(92, 'First', 'Last', 'test6@email.com', '$2y$10$gm4bljkagZ.RUQlrdApyPuWHfduZQhg7D9DniBtm36PW3ZuFonpt2'),
(93, 'First', 'Last', 'test7@email.com', '$2y$10$Y55bmaOLMGcKeL.u97LH1e9jB4hkW74bncLdUnEEYGep7LeKMBqIy'),
(94, 'First', 'Last', 'test8@email.com', '$2y$10$XJYN/jN.a5MoyK.Qh82SYOvwbnxQ95gK53fNZ8lBSCw1ptEV0bXfC'),
(95, 'First', 'Last', 'test9@email.com', '$2y$10$kZGQpouotC6Qxube8/ZS9.yVCKmbF28K9.EcCknSpDxZ5d/yDYSty'),
(96, 'First', 'Last', 'test11@email.com', '$2y$10$Qq7S0QoN7VqVWAyZqWUaUuJUtEcE8GvIymALs6DUquDjC5W0b8zNq'),
(97, 'First', 'Last', 'test12@email.com', '$2y$10$VoulQzFKvqfm.6ZviF7wkOuGZNkcswMu6X1Ysj5Hxt/bGZZPK/x9e'),
(98, 'First', 'Last', 'test13@email.com', '$2y$10$Q1jkVWxeH15HNzSO33S2/O/mh7J3C7.WNeXaLYwHVo23tlzMLNY5e'),
(99, 'First', 'Last', 'test14@email.com', '$2y$10$e4AwGhLCL3M3COvFlxovlukKqyRURNClBZgRp5LsJ6LEes/1rCVTK'),
(100, 'First', 'Last', 'test15@email.com', '$2y$10$8/t8WB1Fa7RhMtyOaeYnfu5qRi/jPAo35ZhmpVpRBbLbUbNYuBhT2'),
(101, 'First', 'Last', 'test16@email.com', '$2y$10$x5Muc.0IUXQsin3anPV3vuLTwOeqvBzxYJE0oE61TGi3MfQjbB1zm'),
(102, 'Captain', 'Haddock', 'blistering@barnacles.com', '$2y$10$xUf6S2WgAE7o0uHR7NSdpu3PgWb0d9H5pBdwiqmQBT46zMqQrVDi.');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `message` text NOT NULL,
  `ques_title` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `user_id`, `post_date`, `message`, `ques_title`, `score`) VALUES
(1, 1, '2018-07-30 06:28:25', 'edited question 1', 'title 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD PRIMARY KEY (`followup_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `followup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`);

--
-- Constraints for table `followup`
--
ALTER TABLE `followup`
  ADD CONSTRAINT `followup_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
