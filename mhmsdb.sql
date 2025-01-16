-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 07:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin User', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Dusting', '2023-03-31 12:52:51'),
(2, 'Mopping', '2023-03-31 12:52:51'),
(3, 'Dusting and Mopping', '2023-03-31 12:52:51'),
(4, 'Utensil Cleaning', '2023-03-31 12:52:51'),
(5, 'Toilet Cleaning', '2023-03-31 12:52:51'),
(6, 'Dusting, Utensil and Mopping', '2023-03-31 12:52:51'),
(8, 'Others', '2023-03-31 12:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaid`
--

CREATE TABLE `tblmaid` (
  `ID` int(5) NOT NULL,
  `CatID` int(5) DEFAULT NULL,
  `MaidId` varchar(250) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Gender` varchar(250) DEFAULT NULL,
  `Experience` varchar(250) DEFAULT NULL,
  `Dateofbirth` date DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `IdProof` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmaid`
--

INSERT INTO `tblmaid` (`ID`, `CatID`, `MaidId`, `Name`, `Email`, `ContactNumber`, `Gender`, `Experience`, `Dateofbirth`, `Address`, `Description`, `ProfilePic`, `IdProof`, `RegDate`) VALUES
(1, 1, 'Meena1234', 'Meena Das', 'meena@gmail.com', 8979879797, 'Male', '2.5', '1989-09-06', 'J-890, Kasi basti Wesbengal', 'ghfghfytr\r\nuv4i5oyiuy6i\r\noiuiyi6yiu', '3dfb1c8dbdcc05745b5fefc573a2a85f1680270088.png', '008301d87dab266223707a580dbb35771680270088.jpg', '2023-03-31 13:41:28'),
(2, 6, 'mh123', 'Neena', 'neena@gmail.com', 9779789879, 'Female', '3', '1986-02-06', 'K-908', 'hkjhkjhdfkdhkg\r\nrjtetiuaeoy\r\njtgertiouo\r\noiuouoiuo\r\nopipoipoipoipoipoikpokfwf', 'ac510893dc8d91e7a0d7b9f4d7c45e221680333111.jpg', '3f72678c4339b844781889070368cc631680333512.jpg', '2023-03-31 14:39:09'),
(3, 5, 'm1234', 'Krisha', 'krisha@gmail.com', 8789789789, 'Female', '12', '1978-01-05', 'nangloi NewDelhi', 'hjghjgjhgjyyutuy', '3f3141ed3b2293aaa6b66587343daa091680536067.jpg', '57a88eacc86363dbe4ea87c74b4bfc991680536067.png', '2023-04-03 15:34:27'),
(4, 2, 'm12', 'Ramu', 'ramu@gmail.com', 1231231230, 'Male', '10', '2011-01-05', 'kanakna goi Bihar', 'hiuyiuyiuyiuyuiu', 'fc5bf5c9948c416f7c1046c8f91ba9a91680536429.png', '48828368a938efd32d079dd542c28ebf1680536429.png', '2023-04-03 15:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaidbooking`
--

CREATE TABLE `tblmaidbooking` (
  `ID` int(5) NOT NULL,
  `BookingID` int(10) DEFAULT NULL,
  `CatID` int(5) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `WorkingShiftFrom` time DEFAULT NULL,
  `WorkingShiftTo` time DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `AssignTo` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmaidbooking`
--

INSERT INTO `tblmaidbooking` (`ID`, `BookingID`, `CatID`, `Name`, `ContactNumber`, `Email`, `Address`, `Gender`, `WorkingShiftFrom`, `WorkingShiftTo`, `StartDate`, `Notes`, `BookingDate`, `Remark`, `Status`, `AssignTo`, `UpdationDate`) VALUES
(1, 504180769, 6, 'Ashutosh Singh', 9797797879, 'ashu@gmail.com', 'J-890, J&K block Laxmi Nagar, New Delhi', 'Female', '07:30:00', '08:30:00', '2023-04-02', 'Do the nnedfull', '2023-04-01 14:20:11', 'Approved', 'Approved', 'Meena1234', '2023-04-03 04:46:56'),
(2, 651150319, 1, 'abc', 8788798798, 'dgf@gmail.com', 'jhgjghjghjgjjgjhgjh', 'Male', '09:30:00', '10:30:00', '2023-04-10', 'ddtrertert', '2023-04-03 05:09:58', 'Cancel', 'Cancelled', 'Cancel', '2023-04-03 05:12:01'),
(3, 689758471, 3, 'Amit Kumar', 456321023, 'amitk@test.com', 'A 123 KW Shristi Raj Nagar Extension201017', 'Male', '22:00:00', '17:30:00', '2023-04-20', 'NA', '2023-04-11 16:41:32', 'NA', 'Approved', 'mh123', '2023-04-11 17:13:40'),
(4, 182765979, 2, 'Amita Singh', 7412330012, 'amitak@test.com', 'A 1232 XYZ Apartment Ghazibad', 'Female', '21:20:00', '23:00:00', '2023-05-01', 'NA', '2023-04-11 17:30:50', 'Request Rejected', 'Approved', 'm12', '2023-04-11 17:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', 'Maid Hiring Management System\r\nMaid Hiring System offers trained personnel that are pandemic prepared for your home. Select the best maid service and maid agency for your new domestic help. ', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'info@gmail.com', 7896541239, NULL, '10:30 am to 7:30 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmaid`
--
ALTER TABLE `tblmaid`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmaidbooking`
--
ALTER TABLE `tblmaidbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblmaid`
--
ALTER TABLE `tblmaid`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmaidbooking`
--
ALTER TABLE `tblmaidbooking`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
