-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 03:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerreview`
--

CREATE TABLE `customerreview` (
  `ReviewID` int(11) NOT NULL,
  `ItemID` varchar(10) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `Review` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerreview`
--

INSERT INTO `customerreview` (`ReviewID`, `ItemID`, `UserID`, `Review`, `Status`) VALUES
(1, '1', '1', 'baler juice purai taka noshto', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Stock` int(40) NOT NULL,
  `Price` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ItemID`, `ItemName`, `Category`, `Stock`, `Price`) VALUES
(1, 'Orange Juice', 'Drink', 21, 20),
(2, 'Pizza', 'Fast Food', 15, 100);

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `OrderID` int(10) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `DeliveryManName` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Bill` decimal(10,0) NOT NULL,
  `DeliveryDate` varchar(80) NOT NULL,
  `OrderDate` varchar(80) NOT NULL,
  `OrderStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderinfo`
--

INSERT INTO `orderinfo` (`OrderID`, `CustomerName`, `DeliveryManName`, `Address`, `Bill`, `DeliveryDate`, `OrderDate`, `OrderStatus`) VALUES
(1, '', '', '', 100, '', '', ''),
(2, '', '', '', 10, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(11) NOT NULL,
  `Fullname` varchar(80) NOT NULL,
  `Phone` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `DOB` varchar(80) NOT NULL,
  `Religion` varchar(80) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `ProfilePicture` varchar(80) NOT NULL,
  `Role` varchar(80) NOT NULL,
  `Status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `Fullname`, `Phone`, `Email`, `Address`, `DOB`, `Religion`, `Username`, `Password`, `ProfilePicture`, `Role`, `Status`) VALUES
(1, 'Rianul Amin', '01402246680', 'ppsppspsspss@gmail.com', '290/1 A Khilgaon Railgate, Dhaka 1219.', '19/01/2002', 'Islam', 'ppsppspsspss', '11111111', 'Uploads/Images/default_pfp.png', 'Customer', 'Active'),
(2, 'Rianul Amin', '01402246680', 'admin@gmail.com', '290/1 A Khilgaon railgatte', '2023-10-17', 'Islam', 'ppsppspsspss', '12345678', 'Uploads/Images/default_pfp.png', 'Admin', 'Active'),
(5, 'pea awevaidgve', '01822443771', 'rrrz@asa.com', 'aefcaededa', '01-01-2024', 'Islam', 'qwed', '12345678', 'Uploads/Images/default_pfp.png', 'Customer', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerreview`
--
ALTER TABLE `customerreview`
  ADD PRIMARY KEY (`ReviewID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerreview`
--
ALTER TABLE `customerreview`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
