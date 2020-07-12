-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 01:29 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomarce`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory_subcatagory`
--

CREATE TABLE `catagory_subcatagory` (
  `id` int(11) NOT NULL,
  `catagoryname` varchar(100) NOT NULL,
  `subcatagoryname` varchar(100) DEFAULT NULL,
  `catagoryicon` varchar(100) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory_subcatagory`
--

INSERT INTO `catagory_subcatagory` (`id`, `catagoryname`, `subcatagoryname`, `catagoryicon`, `serial`, `is_show`, `data`) VALUES
(28, 'খাবার সামগ্রী', NULL, '31276.jpeg', 1, 1, '2020-06-30 14:56:00'),
(29, 'অফিস পণ্য', NULL, '91062.jpg', 2, 1, '2020-06-30 14:56:59'),
(30, 'মুদি', 'মাছ এবং মাংস', '15172.jpg', 4, 1, '2020-06-30 14:57:45'),
(31, 'পরিষ্কারের সামগ্রী', NULL, '34146.jpg', 3, 1, '2020-06-30 14:58:41'),
(32, 'খেলনা ও ক্রীড়া', NULL, '27111.jpeg', 5, 1, '2020-06-30 14:59:28'),
(33, 'শো-পিস', NULL, '55723.jpg', 7, 1, '2020-06-30 15:00:42'),
(34, 'স্টেশনারি আইটেম', NULL, '27674.jpg', 10, 1, '2020-06-30 15:07:31'),
(35, '	ইলেকট্রিক সামগ্রি', NULL, '55246.jpg', 11, 1, '2020-06-30 15:09:52'),
(36, 'গৃহস্থালি জিনিসপত্র', NULL, '95912.jpg', 13, 1, '2020-06-30 15:10:56'),
(37, 'ক্রোকারীজ', NULL, '94246.jpg', 14, 1, '2020-06-30 15:11:52'),
(40, 'মুদি', 'চিনি', 'NULL', NULL, 0, '2020-07-04 07:12:58'),
(41, 'কসমেটিক্স সামগ্রী', NULL, '26462.jpg', 27, 1, '2020-07-07 17:50:17'),
(42, 'কসমেটিক্স সামগ্রী', 'HAIR OIL', 'NULL', NULL, 0, '2020-07-07 17:50:42'),
(43, 'কসমেটিক্স সামগ্রী', 'Hair Cream', 'NULL', NULL, 0, '2020-07-07 17:53:26'),
(44, 'কসমেটিক্স সামগ্রী', 'Shampo', 'NULL', NULL, 0, '2020-07-07 17:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `productmanagment`
--

CREATE TABLE `productmanagment` (
  `id` int(11) NOT NULL,
  `catagoryId` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductDetails` varchar(100) NOT NULL,
  `ProductImage` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productmanagment`
--

INSERT INTO `productmanagment` (`id`, `catagoryId`, `ProductName`, `ProductDetails`, `ProductImage`, `date`) VALUES
(3, 42, 'PARASUT COCO 500ML', 'PARASUT COCO 500ML', '77876.jpg', '2020-07-07 17:55:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory_subcatagory`
--
ALTER TABLE `catagory_subcatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productmanagment`
--
ALTER TABLE `productmanagment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ProductName` (`ProductName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory_subcatagory`
--
ALTER TABLE `catagory_subcatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `productmanagment`
--
ALTER TABLE `productmanagment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
