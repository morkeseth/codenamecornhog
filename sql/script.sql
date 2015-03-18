-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 18. Mar, 2015 12:53 PM
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
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `rooms`
--

INSERT INTO `rooms` (`roomid`, `projector`, `students`, `date`, `from_time`, `to_time`, `available`) VALUES
(1, 'yes', 2, '2015-03-16', '00:00:00', '00:00:00', 'yes'),
(2, 'yes', 2, '2015-03-17', '00:00:00', '00:00:00', 'yes'),
(3, 'yes', 3, '2015-03-18', '00:00:00', '00:00:00', 'yes'),
(4, 'yes', 3, '2015-03-16', '00:00:00', '00:00:00', 'yes'),
(5, 'yes', 4, '2015-03-17', '00:00:00', '00:00:00', 'yes'),
(6, 'yes', 4, '2015-03-18', '00:00:00', '00:00:00', 'yes'),
(7, 'no', 2, '2015-03-16', '00:00:00', '00:00:00', 'yes'),
(8, 'no', 2, '2015-03-17', '00:00:00', '00:00:00', 'yes'),
(9, 'no', 2, '2015-03-18', '00:00:00', '00:00:00', 'yes'),
(10, 'no', 3, '2015-03-16', '00:00:00', '00:00:00', 'yes'),
(11, 'no', 3, '2015-03-17', '00:00:00', '00:00:00', 'yes'),
(12, 'no', 3, '2015-03-18', '00:00:00', '00:00:00', 'yes'),
(13, 'no', 4, '2015-03-16', '00:00:00', '00:00:00', 'yes'),
(14, 'no', 4, '2015-03-17', '00:00:00', '00:00:00', 'yes'),
(15, 'no', 4, '2015-03-18', '00:00:00', '00:00:00', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`roomid`);


-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 18. Mar, 2015 12:51 PM
-- Server-versjon: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pj2100`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `reservations`
--

CREATE TABLE `reservations` (
`id` int(10) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `roomid` int(50) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `projector` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `students` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 18. Mar, 2015 12:53 PM
-- Server-versjon: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pj2100`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `students`
--

INSERT INTO `students` (`id`, `lastname`, `firstname`, `email`, `password`) VALUES
(100000, 'Inu Bake', 'Txũtxũ', 'inutxu14@student.westerdals.no', 123),
(111111, 'Askeladd', 'Per', 'askper14@student.westerdals.no', 123),
(222222, 'Askeladd', 'Pål', 'askpål14@student.westerdals.no', 123),
(333333, 'Askeladd', 'Espen', 'askesp14@student.westerdals.no', 123),
(444444, 'Kenobi', 'Obi Wan', 'kenobi14@student.westerdals.no', 123),
(555555, 'Rogers', 'Kenny', 'rogken14@student.westerdals.no', 123),
(666666, 'Astley', 'Rick', 'astric14@student.westerdals.no', 123),
(701648, 'Schrøder', 'Christoffer', 'schchr13@student.westerdals.no', 123),
(701904, 'Meieran', 'Liam Alex Shane', 'meilia14@student.westerdals.no', 123),
(701948, 'Gundersen', 'Preben', 'gunpre14@student.westerdals.no', 123),
(702073, 'Mørkeseth', 'Patrik', 'morpat14@student.westerdals.no', 123),
(702220, 'Nguyen', 'Dang Cong', 'ngudan14@student.westerdals.no', 123),
(777777, 'Palpatine', 'Sheev', 'palshe14@student.westerdals.no', 123),
(888888, 'Nawa', 'Hushu', 'nawhus14@student.westerdals.no', 123),
(999999, 'Dua Bake', 'Txana Bane', 'duatxa14@student.westerdals.no', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `StudentID` (`id`), ADD UNIQUE KEY `Email` (`email`);