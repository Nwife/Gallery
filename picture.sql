-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 01:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `idGallery` int(11) NOT NULL,
  `titleGallery` longtext NOT NULL,
  `descGallery` longtext NOT NULL,
  `imgFullNameGallery` longtext NOT NULL,
  `orderGallery` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`idGallery`, `titleGallery`, `descGallery`, `imgFullNameGallery`, `orderGallery`) VALUES
(7, 'Olaff', 'Do you wan to build a Snowman', 'Olaff.5edd5e23e4e094.80260504.jpg', '2'),
(8, 'Supreme And Glasses', 'Peep the Drip!✨', 'Kosi.5edd5eeea9d456.97771484.jpg', '3'),
(9, 'Old And Young', 'Change is Constant', 'Generations.5edd5f7ea6f8f5.72340730.jpg', '4'),
(13, 'CSC 21', 'Class of \'21', '21.5edd611b21c066.59107607.jpg', '5'),
(14, 'Beard Gang', 'My Character Models', 'Beard Gang.5edde939499043.72240320.jpg', '6'),
(15, 'Bobo', 'Smile!', 'Bobo.5edde9dc43c079.10858206.jpg', '7'),
(16, 'Sisters', 'Coke and Fanta', 'sisters.5eddec763c3a29.66867375.jpg', '8'),
(18, 'G Wagon', 'Have Money', 'Benz.5ede7126b5ff49.01398147.png', '10'),
(19, 'zdfxtyh', 'estyfcuy', 'gcjgc.5f1b0f129cd5f7.20092949.jpg', '11'),
(20, 'Boyish', 'Boyish ', 'Boy.5f1b101d0453d4.37653989.jpg', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`idGallery`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `idGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
