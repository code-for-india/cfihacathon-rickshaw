-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2014 at 01:35 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cfi_hack`
--

-- --------------------------------------------------------

--
-- Table structure for table `rikshaw_details`
--

CREATE TABLE IF NOT EXISTS `rikshaw_details` (
  `Rickshaw_Id` varchar(50) NOT NULL,
  `Phone Number` bigint(20) NOT NULL,
  `Status` varchar(11) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rikshaw_details`
--

INSERT INTO `rikshaw_details` (`Rickshaw_Id`, `Phone Number`, `Status`, `Password`) VALUES
('123', 9786150638, 'Busy', 'tendu'),
('345', 9786150639, 'Busy', 'tendu2'),
('Rickshaw_123', 9786150640, 'Available', 'tendu2'),
('xyz123', 9786150642, 'Available', 'tendu2'),
('xyz200', 9786150643, 'Available', 'tendu2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
