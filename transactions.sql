-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 09:48 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khadipremium`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(100) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `productinfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `cart_id`, `firstname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `total`, `productinfo`) VALUES
(1, 0, 'Sumit', 'sksksharma0@gmail.com', '8286864601', '302 B-7 Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(2, 0, 'Sumit', 'sksksharma0@gmail.com', '8286864601', '302 B-7 Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(3, 4, 'Sumit', 'sksksharma0@gmail.com', '8286864601', '302 B-7 Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(4, 4, 'Sumit Sharma', 'sksksharma0@gmail.com', '8286864601', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(5, 4, 'Sumit Sharma', 'sksksharma0@gmail.com', '8286864601', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(6, 4, 'Sumit Sharma', 'sksksharma0@gmail.com', '8286864601', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(7, 4, 'Sumit Sharma', 'sksksharma0@gmail.com', '8286864601', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road  E ', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(8, 4, 'Test', 'test@gmail.com', '1234567890', 'dcs', 'djc jw', 'c s', '', 'cdmskm', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1'),
(9, 4, 'Test', 'test@gmail.com', '1234567890', 'dcs', 'djc jw', 'c s', '', 'cdmskm', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1) - ? 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
