-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 08:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

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
(3, 'PHP', 'Tutor Joes', 'media/book_img/Sachin.jpeg', 'media/book_file/OS_LAB_13.pdf', 'PHP Backend Webdesigning', 4, 450),
(4, 'Aadhar', 'Modi', 'media/book_img/WhatsApp Image 2020-08-03 at 11.06.08 PM.jpeg', 'media/book_file/DBMS_LAB_1.pdf', 'India Swach Bharath', 1, 300),
(5, 'abcdefg', 'xyz', 'media/book_img/Sachin.jpeg', 'media/book_file/Full-HD-Desktop-Wallpaper.jpg', 'lmnopq', 2, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
