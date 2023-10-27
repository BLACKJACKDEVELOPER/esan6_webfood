-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 01:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esan6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `profile` varchar(100) NOT NULL DEFAULT '''555''',
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `profile`, `address`) VALUES
(1, 'admins', 'admins', 'adminstators', '1', '157/88s');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `profile` varchar(100) NOT NULL DEFAULT '''555''',
  `address` text NOT NULL,
  `allow` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `profile`, `address`, `allow`) VALUES
(115789458, 'userman', 'lion4333', 'HELLO WORLD', '115789458', '157/88', 1),
(790463504, 'rest1', 'lion4333', 'สมชาย สายจุงเบิยย', 'default', '168/77', 1),
(1842420973, 'man', 'lion4333', 'man', '1842420973', 'man', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `profile` varchar(100) NOT NULL DEFAULT '''555''',
  `address` text NOT NULL,
  `allow` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `username`, `password`, `fullname`, `profile`, `address`, `allow`) VALUES
(643628298, 'deli', 'deli', 'li', 'default', 'li', 1),
(721216003, 'deli3', 'lion4333', 'deli3', '555', 'deli3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `code` varchar(100) NOT NULL,
  `percent` int(11) NOT NULL,
  `rest_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`code`, `percent`, `rest_id`) VALUES
('FASTFOOD', 50, '2'),
('HELLo', 50, '2');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `foodname` text NOT NULL,
  `des` text NOT NULL,
  `type` text NOT NULL,
  `price` int(11) NOT NULL,
  `rest_id` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `foodname`, `des`, `type`, `price`, `rest_id`, `image`) VALUES
(3, 'asdasd', 'asdasd', 'ทอด', 50, '2', '657377644'),
(4, 'ปีกไก่ทอดเกลือตะไคร้กรอบ', 'asdasd', 'ทอด', 50, '2', '215885899'),
(5, 'กิมจิ๋๋!!5', 'อรอ่ยๆ5', 'ต้ม', 205, '2', '182711909'),
(7, 'ข้าวผัดไข่', 'หอม ๆ อร่อย กลมกล่อม', 'ผัด', 60, '3', '759120974'),
(8, 'หมูทอดกระเทียม', 'หอมกลิ่นกระเทียมกรอบอร่อย', 'ทอด', 80, '3', '1052630713'),
(9, 'ฉู่ฉี่ปลาทอด', 'อร่อยมาก ๆ', 'ทอด', 85, '3', '1906075987'),
(10, 'แกงรัญจวน', 'แกงไทยโบราณหากินยาก', 'แกง', 90, '3', '691797367');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `profile` varchar(100) NOT NULL DEFAULT '''555''',
  `address` text NOT NULL,
  `allow` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `fullname`, `profile`, `address`, `allow`) VALUES
(208781489, 'rest3', 'lion4333', 'สมชาย555', '555', '157/88', 1),
(1160905275, 'd', 'd', 'd', '1160905275', 'd', 1),
(1482103565, 'rest001', '1234', 'Thanasorn Paisri', '1482103565', '14/25 Khon Kaen', 0),
(1501261638, 'fooder', 'lion4333', 'asdasd', '1501261638', 'asdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `c_id` text NOT NULL,
  `rest_id` text NOT NULL,
  `d_id` text DEFAULT NULL,
  `foodname` text NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` text NOT NULL,
  `payment_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `c_id`, `rest_id`, `d_id`, `foodname`, `price`, `amount`, `date`, `status`, `payment_method`, `payment_number`) VALUES
(3, '115789458', '2', '643628298', 'ปีกไก่ทอดเกลือตะไคร้กรอบ', 50, 2, '2022-10-23', 1, 'โอนชำระ', '1382727149'),
(4, '115789458', '2', '643628298', 'asdasd', 50, 2, '2022-10-23', 1, 'โอนชำระ', '1382727149'),
(5, '115789458', '2', '643628298', 'CHICKER', 50, 1, '2022-10-23', 1, 'โอนชำระ', '1382727149'),
(6, '115789458', '2', '643628298', 'asdasd', 50, 2, '2022-12-20', 1, 'โอนชำระ', '1032884283'),
(7, '115789458', '2', '643628298', 'ปีกไก่ทอดเกลือตะไคร้กรอบ', 50, 1, '2022-12-20', 1, 'โอนชำระ', '1032884283'),
(8, '115789458', '2', '643628298', 'CHICKER', 50, 1, '2022-12-20', 1, 'โอนชำระ', '1032884283'),
(9, '115789458', '2', NULL, 'asdasd', 50, 1, '2022-12-20', 0, 'โอนชำระ', '1019488929'),
(10, '115789458', '2', NULL, 'ปีกไก่ทอดเกลือตะไคร้กรอบ', 50, 1, '2022-12-20', 0, 'โอนชำระ', '1019488929'),
(11, '115789458', '2', NULL, 'กิมจิ๋๋!!5', 205, 1, '2022-12-20', 0, 'โอนชำระ', '1019488929');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `rest_name` varchar(100) NOT NULL DEFAULT '''ไม่มี''',
  `rest_type` varchar(100) NOT NULL DEFAULT '''ไม่มี''',
  `m_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `rest_name`, `rest_type`, `m_id`) VALUES
(2, 'ร้านขายข้าวนี้แหละ99', 'ร้านส้มตำ', '1501261638'),
(3, 'ร้านธนศร', 'ร้านอาหารไทย', '1482103565'),
(5, 'ไม่มี', 'ไม่มี', '208781489'),
(6, 'ไม่มี', 'ไม่มี', '1160905275');

-- --------------------------------------------------------

--
-- Table structure for table `resttype`
--

CREATE TABLE `resttype` (
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resttype`
--

INSERT INTO `resttype` (`type`) VALUES
('ร้านอาหารตามสั่ง'),
('ร้านอาหารเกาหลี'),
('ร้านอาหารไทย');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `f_id` text NOT NULL,
  `c_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `text`, `f_id`, `c_name`) VALUES
(3, 'hello', '3', 'man'),
(4, '555', '3', 'man');

-- --------------------------------------------------------

--
-- Table structure for table `typefood`
--

CREATE TABLE `typefood` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `rest_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typefood`
--

INSERT INTO `typefood` (`id`, `type`, `rest_id`) VALUES
(5, 'ลาบ', '2'),
(6, 'ต้ม', '2'),
(7, 'ทอด', '2'),
(8, 'ยำ', '2'),
(9, 'ผัด', '3'),
(10, 'ทอด', '3'),
(12, 'ต้ม', '3'),
(13, 'แกง', '3');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `id` int(11) NOT NULL,
  `foodname` text NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `rest_id` text NOT NULL,
  `f_id` text NOT NULL,
  `c_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`id`, `foodname`, `price`, `amount`, `rest_id`, `f_id`, `c_id`) VALUES
(8, 'CHICKER', 50, 5, '2', '2', '1501261638'),
(9, 'กิมจิ๋๋!!', 20, 2, '2', '5', '1501261638'),
(13, 'ข้าวผัดไข่', 60, 1, '3', '6', '1482103565'),
(14, 'ข้าวผัดไข่', 60, 3, '3', '7', '115789458'),
(15, 'หมูทอดกระเทียม', 80, 2, '3', '8', '1482103565'),
(16, 'ฉู่ฉี่ปลาทอด', 80, 2, '3', '9', '1482103565'),
(17, 'ปีกไก่ทอดเกลือตะไคร้กรอบ', 50, 1, '2', '4', '1842420973'),
(18, 'แกงรัญจวน', 90, 1, '3', '10', '1482103565'),
(19, 'asdasd', 50, 6, '2', '3', '1842420973'),
(20, 'หมูทอดกระเทียม', 80, 1, '3', '8', '1842420973'),
(21, 'ข้าวผัดไข่', 60, 1, '3', '7', '1842420973');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resttype`
--
ALTER TABLE `resttype`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typefood`
--
ALTER TABLE `typefood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typefood`
--
ALTER TABLE `typefood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
