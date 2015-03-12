-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 12. Mar, 2015 11:58 AM
-- Server-versjon: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pj2100`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `rooms`
--

CREATE TABLE `rooms` (
  `roomid` int(55) NOT NULL,
  `projector` varchar(55) NOT NULL,
  `students` int(55) NOT NULL,
  `date` date NOT NULL,
  `from_time` datetime NOT NULL,
  `to_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `rooms`
--

INSERT INTO `rooms` (`roomid`, `projector`, `students`, `date`, `from_time`, `to_time`) VALUES
(1, 'yes', 2, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'yes', 2, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'yes', 3, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'yes', 3, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'yes', 4, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'yes', 4, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'no', 2, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'no', 2, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'no', 2, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'no', 3, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'no', 3, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'no', 3, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'no', 4, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'no', 4, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'no', 4, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`roomid`);