-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 09:54 AM
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(24, 'John', 'Watson', 'armydoctor@gmail.com', '$2y$10$AW8Sa3jakg6a4Z3v0hJkx.2TmCQ4tEKmDbWxCmBJtWe5ElS6gSgE.'),
(25, 'Sherlock', 'Holmes', 'baskerville@gmail.com', '$2y$10$5O57Wa3zLGBpsMzH/GltPOeOoK0ZqObBk6a1B72PL8VJ/lUXooZ7i'),
(68, 'Hercule', 'Poirot', 'belgiandetective@perfection.com', '$2y$10$CgzBLPmoB6YJQC6DzFAVaeCtTl7g.i8vKeAIbyNqeMO/Vy3fLvSrS'),
(77, 'Jane', 'Marple', 'stmarymead@gmail.com', '$2y$10$QkD0EQeuKBKH3kKrgKz.ruVJNEhbxdNcJTMHrVIEEg0CJmeQYkQyS'),
(83, 'First', 'Last', 'test@email.com', '$2y$10$utINny8h.Cncisf8BM6B/.Qe/QYUsrssjryPCnj.6HLuO4Omw7h8m'),
(84, 'First', 'Last', 'test1@email.com', '$2y$10$JEF.UtG/sjT3v0Si7Bgp7e40npE3AOO2ULRU1NUhu4D66Geaqpz42'),
(85, 'First', 'Last', 'test2@email.com', '$2y$10$cxw/pOOkv2CYKhmuu68Mb.j6V.cKUl9Kb5ylbLW11O1bTq3J4X96O'),
(86, 'First', 'Last', 'test3@email.com', '$2y$10$U5FbXTMoBLngUBgRUi3/IO04impI8yfXMhUNDah2zKuKWbyjv8Gou'),
(87, 'First', 'Last', 'test4@email.com', '$2y$10$fDkbdj1XboWXbOmyge6PvOGPMJdZbLXoQqpEOS2UlXr96SvjwxK.O'),
(88, 'First', 'Last', 'test5@email.com', '$2y$10$NDSEXx/jeCZ2QAqKQZ.S/ebgDwI1dpyESjWVojOpXHRY/hGVYbZHK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
