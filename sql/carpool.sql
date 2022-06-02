-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2022 at 09:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `rideId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `pickupCity` varchar(256) NOT NULL,
  `dropCity` varchar(256) NOT NULL,
  `pickupLocation` varchar(256) NOT NULL,
  `dropLocation` varchar(256) NOT NULL,
  `pickupDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `price` float NOT NULL,
  `passenger` int(11) NOT NULL,
  `vehicle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`rideId`, `userId`, `pickupCity`, `dropCity`, `pickupLocation`, `dropLocation`, `pickupDate`, `pickupTime`, `price`, `passenger`, `vehicle`) VALUES
(2, 1001, 'Nashik', 'Pune', 'Bus Stop', 'Bus Stop', '2022-06-02', '00:14:00', 324, 1, 'MH15GA0425'),
(3, 1001, 'Mumbai', 'Nagpur', 'Bus Stop', 'Railway Station', '2022-06-02', '16:36:00', 545, 1, 'MH15GA0425'),
(4, 1001, 'Aurangabad', 'Pune', 'Bus Stop', 'Railway Station', '2022-06-14', '18:00:00', 567, 5, 'MH15GA0425');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` bigint(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `password`, `firstname`, `lastname`, `mobile`) VALUES
(1001, 'taulauprihitra-3935@yopmail.com', 'Oracle@123', 'Oracle', 'Devata', 9876543210),
(1010, 'taulauprihitra-3933@yopmail.com', 'Oracle@123', 'Oracleeeee', 'Devataaaa', 9191919192);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vnumber` varchar(256) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `vname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vnumber`, `userId`, `vname`) VALUES
('MH15GA0425', 1001, 'Alto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`rideId`),
  ADD KEY `fk_userId_ride` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email_index` (`email`),
  ADD UNIQUE KEY `mob_index` (`mobile`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vnumber`),
  ADD KEY `fk_userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `rideId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `fk_userId_ride` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
