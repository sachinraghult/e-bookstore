-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 05:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(250) NOT NULL,
  `apass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bid` int(11) NOT NULL,
  `bname` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `bimage` varchar(250) NOT NULL,
  `bfile` varchar(250) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `bname`, `author`, `bimage`, `bfile`, `keywords`, `cat_id`, `price`) VALUES
(1, 'hello world', 'sanjeev', 'image.png', 'book1.pdf', 'hello', 2, 200),
(2, 'xampp', 'apache', 'bit.image', 'bit.pdf', 'bit', 4, 150),
(3, 'gisd', 'bdabsd', 'media/book_img/Desktop.jpg', 'media/book_file/Desktop.jpg', 'dbusba', 1, 100),
(4, 'os', 'sanjeev', 'media/book_img/13.png', 'media/book_file/DBMS - tutorials point.pdf', 'lab works', 7, 999);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'MAGAZINES'),
(2, 'COMICS'),
(3, 'LITERATURE'),
(4, 'SCIENCE'),
(5, 'HORROR'),
(6, 'THRILLER'),
(7, 'STORY'),
(8, 'SUMMA'),
(9, 'SUMMA'),
(10, 'CRINGE');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `logs` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `cus_id`, `bid`, `comment`, `logs`) VALUES
(3, 2, 1, 'Very nice', '2021-05-27 03:26:20'),
(16, 3, 2, 'hello', '2021-05-11 21:31:42'),
(18, 3, 2, 'hello', '2021-05-11 21:37:41'),
(21, 3, 2, 'hdiwh', '2021-05-11 21:52:13'),
(22, 4, 2, 'dwio', '2021-05-12 20:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
  `cus_image` varchar(250) NOT NULL,
  `cus_mail` varchar(250) NOT NULL,
  `cus_pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_image`, `cus_mail`, `cus_pass`) VALUES
(1, 'Hello', 'image.cd', 'cueifwhdius', 'sdadads'),
(2, 'dasdas', 'sdasd.f', 'dsadsaf', 'dsdagf'),
(3, 'Sanjeev', 'admin/media/profile_img/Profile (2).jpg', 'er.sanjeev.au@gmail.com', '123'),
(4, 'demo', 'admin/media/profile_img/Desktop.jpg', 'demo@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `bill_id` int(11) NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `logs` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`bill_id`, `txn_id`, `cus_id`, `bid`, `logs`) VALUES
(1, 'dsdad', 1, 1, NULL),
(2, 'dsfgg', 2, 1, NULL),
(3, 'fsssd', 2, 2, NULL),
(4, 'sadasd', 1, 1, NULL),
(5, 'djiow', 3, 2, NULL),
(7, 'OD3175311', 3, 3, '2021-05-12 19:55:28'),
(8, 'OD6858816', 4, 2, '2021-05-12 20:14:20'),
(9, 'OD4798135', 4, 1, '2021-05-12 20:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `rid` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bname` varchar(250) NOT NULL,
  `request` varchar(250) NOT NULL,
  `logs` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `cus_id`, `bname`, `request`, `logs`) VALUES
(3, 1, 'comp sci', 'I need urgently', '2021-05-18 07:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `subs_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_payments`
--

CREATE TABLE `temp_payments` (
  `bill_id` int(11) NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_payments`
--

INSERT INTO `temp_payments` (`bill_id`, `txn_id`, `cus_id`, `bid`) VALUES
(1, 'OD431230', 3, 3),
(2, 'OD4522417', 3, 3),
(3, 'OD1616906', 3, 3),
(4, 'OD406465', 3, 3),
(5, 'OD6188748', 3, 3),
(6, 'OD7305684', 3, 3),
(9, 'OD648327', 4, 3),
(11, 'OD3692858', 4, 1),
(13, 'OD1178565', 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`subs_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `temp_payments`
--
ALTER TABLE `temp_payments`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `bid` (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_payments`
--
ALTER TABLE `temp_payments`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE;

--
-- Constraints for table `subs`
--
ALTER TABLE `subs`
  ADD CONSTRAINT `subs_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subs_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `temp_payments`
--
ALTER TABLE `temp_payments`
  ADD CONSTRAINT `temp_payments_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `temp_payments_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
