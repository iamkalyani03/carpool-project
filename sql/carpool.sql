-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2022 at 07:39 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` bigint(20) NOT NULL,
  `rideId` bigint(20) NOT NULL,
  `pickupUserId` bigint(20) NOT NULL,
  `rideUserId` bigint(20) NOT NULL,
  `passenger` int(11) NOT NULL,
  `totalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `rideId`, `pickupUserId`, `rideUserId`, `passenger`, `totalPrice`) VALUES
(1, 5, 1001, 1013, 1, 121),
(2, 5, 1001, 1013, 1, 121),
(3, 7, 1001, 1013, 1, 224);

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
(4, 1001, 'Aurangabad', 'Pune', 'Bus Stop', 'Railway Station', '2022-06-14', '18:00:00', 567, 5, 'MH15GA0425'),
(5, 1001, 'Pune', 'Mumbai', 'Railway Station', 'Railway Station', '2022-06-03', '01:02:00', 121, 1, 'MH15GA0425'),
(6, 1001, 'Nashik', 'Pune', 'Bus Stop', 'Railway Station', '2022-06-02', '01:53:00', 232, 1, 'MH15GA0425'),
(7, 1001, 'Pune', 'Mumbai', 'Bus Stop', 'Railway Station', '2022-06-03', '02:14:00', 224, 1, 'MH15GA0425'),
(8, 1001, 'Mumbai', 'Mumbai', 'Bus Stop', 'Railway Station', '2022-06-02', '02:15:00', 212, 1, 'MH15GA0425'),
(9, 1001, 'Nagpur', 'Aurangabad', 'Railway Station', 'Railway Station', '2022-06-02', '02:17:00', 333, 1, 'MH15GA0425'),
(10, 1001, 'Pune', 'Nagpur', 'Bus Stop', 'Railway Station', '2022-06-02', '02:20:00', 234, 1, 'MH15GA0425'),
(11, 1001, 'Pune', 'Aurangabad', 'Bus Stop', 'Bus Stop', '2022-06-02', '02:21:00', 234, 1, 'MH15GA0425'),
(12, 1013, 'Pune', 'Mumbai', 'Bus Stop', 'Bus Stop', '2022-06-03', '02:47:00', 788, 1, 'GJ01KA2211');

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
(1010, 'taulauprihitra-3933@yopmail.com', 'Oracle@123', 'Oracleeeee', 'Devataaaa', 9191919192),
(1011, 'jadu@gmail.com', 'Jadu@123', 'jadu', 'mil', 9988776655),
(1012, 'tcspostest1101@yopmail.com', 'Kalynai@123', 'kalyani', 'shimpi', 7788665544),
(1013, 'tuka@ram.com', 'Tuka@123', 'kalyani', 'shimpi', 8877665544);

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
('GJ01KA2211', 1013, 'BMW'),
('MH15GA0425', 1001, 'Alto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `fk_rideId` (`rideId`),
  ADD KEY `fk_pickup_user` (`pickupUserId`),
  ADD KEY `fk_ride_user` (`rideUserId`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `rideId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_pickup_user` FOREIGN KEY (`pickupUserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rideId` FOREIGN KEY (`rideId`) REFERENCES `ride` (`rideId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ride_user` FOREIGN KEY (`rideUserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
