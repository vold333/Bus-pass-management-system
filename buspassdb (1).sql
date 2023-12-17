-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 03:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buspassdb`
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
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 1234567891, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-04-14 06:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(8, 'AC Bus', '2021-07-04 14:27:53'),
(9, 'Non AC Bus', '2021-07-04 14:28:32'),
(10, 'Volvo Bus', '2021-07-04 14:28:47'),
(11, 'Delux Bus', '2021-07-04 14:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Anuj', 'AKKK@GMAIL.COM', 'This is for testing.', '2021-07-11 08:55:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<font color=\"#747474\" face=\"Roboto, sans-serif, arial\"><span style=\"font-size: 13px;\"><b>Public Transportation Service, Tamil Nadu</b></span></font>', NULL, NULL, '2023-08-10 03:50:45'),
(2, 'contactus', 'Contact Us', '               Public Transportation office, Chennai, Tamil Nadu.', 'infotest@gmail.com', 9688844421, '2023-07-28 13:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblpass`
--

CREATE TABLE `tblpass` (
  `ID` int(10) NOT NULL,
  `PassNumber` varchar(200) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `ProfileImage` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `IdentityType` varchar(200) DEFAULT NULL,
  `IdentityCardno` varchar(200) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Source` varchar(200) DEFAULT NULL,
  `Destination` varchar(200) DEFAULT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `uploadapplicationform` varchar(200) DEFAULT NULL,
  `PasscreationDate` timestamp NULL DEFAULT current_timestamp(),
  `form` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpass`
--

INSERT INTO `tblpass` (`ID`, `PassNumber`, `FullName`, `ProfileImage`, `ContactNumber`, `Email`, `IdentityType`, `IdentityCardno`, `Category`, `Source`, `Destination`, `FromDate`, `ToDate`, `Cost`, `uploadapplicationform`, `PasscreationDate`, `form`) VALUES
(9, '932495158', 'vignesh', '42d38fdff39b0a3a1fa757ed574b2f681691233689.jpg', 8954712368, 'vicky@mail.com', 'Voter Card', '234324', 'Volvo Bus', 'vano', 'err', '2023-08-13', '2023-08-15', 500, NULL, '2023-08-05 11:08:09', '42d38fdff39b0a3a1fa757ed574b2f681691233689.jpg'),
(10, '454899398', 'zoro', 'a22a794c036c06431e632f9d5e2e298f1691233982.jpg', 8542631456, 'zoro@lost.com', 'Voter Card', '344223', 'AC Bus', 'aa', 'bb', '2023-08-05', '2023-08-30', 333, NULL, '2023-08-05 11:13:02', '38f6c12ad6a4b42c94a79d97ea9ab4451691233982.png'),
(11, '923249674', 'lucy', '70202af91cf108d971edbb87e73c1adf1691235125.jpg', 8954712368, 'lucy@gmail.com', 'Voter Card', 'cfddfff', 'AC Bus', 'vano', 'thanjavur', '2023-08-04', '2023-10-25', 400, NULL, '2023-08-05 11:32:05', '70202af91cf108d971edbb87e73c1adf1691235125.jpg'),
(12, '255660571', 'nami', '614c56ae534580c13cf76e630207525b1693747099.jpg', 9688844421, 'sudharsanselvaraj333@gmail.com', 'Adhar Card', '234324', 'AC Bus', 'woraiyur', 'Malaikottai', '2023-09-03', '2023-10-03', 0, NULL, '2023-09-03 13:18:19', NULL),
(13, '612569801', 'buggy', '852556abe9edb9c04de52518e6fc678d1693747559.jpg', 9688844421, 'sudharsanselvaraj333@gmail.com', 'Adhar Card', '534535', 'AC Bus', 'woraiyur', 'malaikottai', '2023-09-03', '2023-10-03', 100, NULL, '2023-09-03 13:25:59', NULL),
(14, '297922356', 'usopp', '852556abe9edb9c04de52518e6fc678d1693998830.jpg', 9688844421, 'sudharsanselvaraj333@gmail.com', 'PAN Card', '789456128541', 'AC Bus', 'GL', 'NW', '2023-09-06', '2023-10-06', 0, NULL, '2023-09-06 11:13:50', NULL),
(16, '815390618', 'akshya ', 'bcd1425476dd9ad39ceb06fa351cfae11693999882.jpg', 999999999, 'zoro@lost.com', 'Passport', '5586776', 'Non AC Bus', 'woraiyur', 'malaikottai', '2023-09-21', '2023-10-13', 100, NULL, '2023-09-06 11:31:22', '852556abe9edb9c04de52518e6fc678d1693999882.jpg'),
(27, '496535541', 'SUDHARSAN S', '8ca4fa95225d4e1c68021d69fb9c99b91694617226.jpg', 9688844421, 'sudharsanselvaraj333@gmail.com', 'Voter Card', 'dfg56', 'AC Bus', 'manachanallur', 'thuraiyur', '2023-09-22', '2023-10-05', 100, NULL, '2023-09-13 15:00:26', 'aa8ed906b3f9d39b3889d2543fbc73761694617226.pdf'),
(28, '923921795', 'kaido', 'e90464261182c7575ac2b9f64e3ae6f41694699409.jpg', 9894598771, 'wano@gmail.com', 'Driving License', '6474774', 'Delux Bus', 'lalgudi', 'manapparai', '2023-09-15', '2023-10-15', 200, NULL, '2023-09-14 13:50:09', '10f134ce86822c8f4f64305177a97ea01694699409.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `password`) VALUES
(1, 'user', 2147483647, 'user'),
(2, 'suda', 2147483647, 'suda');

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
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpass`
--
ALTER TABLE `tblpass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpass`
--
ALTER TABLE `tblpass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
