-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 09:18 AM
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
(1, 'Alice in Wonderland', 'Lewis Carroll', 'media/book_img/Alice-in-Wonderland.jpg', 'media/book_file/Alice in Wonderland.pdf', 'A young girl named Alice, who falls into a subterranean fantasy world populated by peculiar, anthropomorphic creatures.', 2, 400),
(2, 'Artificial Intelligence - A Modern Approach', 'Pearson', 'media/book_img/Artificial-Intelligence-A-Modern-Approach.jpg', 'media/book_file/Artificial Intelligence - A Modern Approach.pdf', 'A Modern Approach explores the full breadth and depth of the field of artificial intelligence (AI).', 5, 550),
(3, 'Life of Captain Marvel', 'Stan Lee', 'media/book_img/Life-of-Captain-Marvel.jpg', 'media/book_file/Life of Captain Marvel.pdf', 'Carol Danvers is one of the mightiest heroes not just on Earth but in the entire galaxy! Now learn exactly how she became the woman she is - The Avenger', 3, 700),
(4, 'National Geographic - The Fight For Clean Air', 'NatGeo. April', 'media/book_img/National-Geographic-The-Fight-For-Clean-Air.jpg', 'media/book_file/National Geographic - The Fight For Clean Air.pdf', 'Air pollution kills millions every year, like a ‘pandemic in slow motion’.', 6, 150),
(5, 'Phoenix Project', 'Gene Kim', 'media/book_img/Phoenix-Project.jpg', 'media/book_file/Phoenix Project.pdf', 'The business novel tells the story of an IT manager who has ninety days to rescue an over-budget and late IT initiative, code-named The Phoenix.', 5, 350),
(6, 'Principle of Relativity', 'Albert Einstein', 'media/book_img/Principle-of-Relativity.jpg', 'media/book_file/Principle of Relativity.pdf', 'In physics, the principle of relativity is the requirement that the equations describing the laws of physics have the same form in all admissible frames of reference.', 1, 650),
(7, 'Quantum Physics', 'Douglas Ross FRS', 'media/book_img/Quantum-Physics.jpg', 'media/book_file/Quantum Physics.pdf', 'The physics that explains how everything works: the best description we have of the nature of the particles that make up matter and the forces with which they interact.', 1, 800),
(8, 'Romeo and Juliet', 'William Shakespeare', 'media/book_img/Romeo-and-Juliet.jpg', 'media/book_file/Romeo and Juliet.pdf', 'A tragedy written by William Shakespeare early in his career about two young Italian star-crossed lovers whose deaths ultimately reconcile their feuding families.', 2, 999),
(9, 'Spider-Verse', 'Stan Lee', 'media/book_img/Spider-Verse.jpg', 'media/book_file/Spider-Verse.pdf', 'After gaining superpowers from a spider bite, Miles Morales protects the city as Spider-Man. Soon, he meets alternate versions of himself and gets embroiled in an epic battle to save the multiverse.', 3, 750),
(10, 'The Invisible Man', 'H.G Wells', 'media/book_img/The-Invisible-Man.jpg', 'media/book_file/The Invisible Man.pdf', 'A brilliant scientist uncovers the secret to invisibility, but his grandiose dreams and the power he unleashes cause him to spiral into intrigue, madness, and murder.', 4, 249),
(11, 'Time Magazine - Women and the Pandemic', 'Time, March', 'media/book_img/Time-Magazine-Women-and-the-Pandemic.jpg', 'media/book_file/Time Magazine - Women and the Pandemic.pdf', 'COVID-19 has made it impossible to deny the ways broken systems hurt women.', 6, 199),
(12, 'The Black Cat', 'Edgar Allan Poe', 'media/book_img/The-Black-Cat.jpg', 'media/book_file/The Black Cat.pdf', 'In the story, an unnamed narrator has a strong affection for pets until he perversely turns to abusing them.', 4, 99),
(13, 'Sachin The Billion Dreams', 'Sachin Tendulkar', 'media/book_img/Sachin-The-Billion-Dreams.jpg', 'media/book_file/Sachin The Billion Dreams.pdf', 'Sachin Tendulkar recounts his journey of becoming one of the most famous names in cricket.', 7, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `itm_no` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`itm_no`, `cus_id`, `bid`) VALUES
(15, 1, 6),
(20, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_image` varchar(250) DEFAULT NULL,
  `cat_image1` varchar(250) DEFAULT NULL,
  `cat_desc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_image1`, `cat_desc`) VALUES
(1, 'SCIENCE', 'media/cat_img/science1.jpg', 'media/cat_img/science2.jpg', 'Everything You Need to Know About the World and How It Works.'),
(2, 'FICTION', 'media/cat_img/fiction1.jpg', 'media/cat_img/fiction2.jpg', 'Literature created from the imagination, not presented as fact, though it may be based on a true story or situation'),
(3, 'COMICS', 'media/cat_img/comics1.jpg', 'media/cat_img/comics2.jpg', 'Graphic novels, comics, and manga'),
(4, 'HORROR', 'media/cat_img/horror1.jpg', 'media/cat_img/horror2.jpg', 'Horror often overlaps science fiction or fantasy, all three of which categories'),
(5, 'TECHNOLOGY', 'media/cat_img/technology1.jpg', 'media/cat_img/technology2.jpg', 'Tools for Preparing Your Team for the Future.'),
(6, 'MAGAZINES', 'media/cat_img/magazines1.jpg', 'media/cat_img/magazines2.jpg', 'Popular magazines and top newspapers from Newsstand section'),
(7, 'SPORTS', 'media/cat_img/sports1.jpg', 'media/cat_img/sports2.jpg', 'Explore the Best Sports Biographies and Books');

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
(1, 2, 2, 'Fantastic!', '2021-05-15 15:24:50'),
(2, 3, 5, 'Amazing stuff', '2021-05-15 15:33:14'),
(3, 3, 6, 'Woww, must read book.', '2021-05-15 15:37:08'),
(4, 1, 10, 'Expected something more', '2021-05-15 15:38:34'),
(5, 3, 9, 'Nice Book', '2021-05-17 23:32:13'),
(6, 3, 5, 'Great book', '2021-05-17 23:39:21');

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
(1, 'Sachin', 'admin/media/profile_img/Sachin.jpeg', 'sachinraghult2002@gmail.com', 'sachin@T20'),
(2, 'Srivatsav', 'admin/media/profile_img/Srivatsav.jpg', 'srivatsavr02@gmail.com', 'Sri@123'),
(3, 'Sanjeev', 'admin/media/profile_img/Sanjeev.jpg', 'er.sanjeev.au@gmail.com', 'Sanjeev@1'),
(4, 'Rohit', 'admin/media/profile_img/Rohit.jpg', 'rohit45@gmail.com', 'Hitman@45'),
(5, 'Demo', 'admin/media/profile_img/profile5.jpg', 'demo@gmail.com', 'Demo@123'),
(6, 'New', 'admin/media/profile_img/profile6.jpg', 'new@gmail.com', 'New@123'),
(7, 'trial', 'admin/media/profile_img/def99864.jpg', 'trial@gmail.com', 'Trial@123');

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
(1, 'OD3910026', 1, 7, '2021-05-15 15:12:29'),
(2, 'OD7421216', 1, 9, '2021-05-15 15:13:39'),
(3, 'OD1038340', 2, 8, '2021-05-15 15:16:03'),
(4, 'OD9061260', 2, 2, '2021-05-15 15:16:44'),
(5, 'OD479970', 3, 6, '2021-05-15 15:17:44'),
(6, 'OD703829', 4, 4, '2021-05-15 15:19:00'),
(7, 'OD5112137', 1, 10, '2021-05-15 15:20:16'),
(8, 'OD3195304', 5, 3, '2021-05-15 15:21:16'),
(9, 'OD6159718', 3, 9, '2021-05-15 15:21:59'),
(10, 'OD5824685', 3, 5, '2021-05-15 15:22:29'),
(11, 'OD5648856', 7, 1, '2021-05-15 15:23:15'),
(12, 'OD1381200', 2, 9, '2021-05-15 15:25:21'),
(13, 'OD2595454', 3, 12, '2021-05-15 15:32:40'),
(14, 'OD999937', 1, 12, '2021-05-15 15:39:28'),
(15, 'OD3584137', 1, 13, '2021-05-15 16:07:15'),
(16, 'OD4620397', 3, 10, '2021-05-19 14:10:55'),
(17, 'OD4620397', 3, 13, '2021-05-19 14:10:55'),
(18, 'OD4620397', 3, 8, '2021-05-19 14:10:55'),
(19, 'OD8540852', 3, 4, '2021-05-19 14:13:24'),
(20, 'OD7443029', 3, 11, '2021-05-19 14:15:41'),
(21, 'OD5558278', 1, 4, '2021-05-19 14:22:54'),
(22, 'OD2595581', 1, 5, '2021-05-19 14:23:14'),
(23, 'OD9120726', 3, 7, '2021-05-19 22:21:16'),
(24, 'OD2289972', 3, 1, '2021-05-20 10:03:21'),
(25, 'OD2380734', 3, 3, '2021-05-20 12:24:58');

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
(1, 2, 'Programming PHP', 'Need a book on Web Designing', '2021-05-15 15:27:04'),
(2, 6, 'Behind Closed Doors by B A Paris', 'Wish to have Thriller Books :)', '2021-05-15 15:29:33'),
(4, 3, 'Grandma Tales', 'Needed story books for Bedtime :/', '2021-05-15 15:34:39');

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
(6, 'OD2861488', 3, 1),
(8, 'OD44734', 1, 10),
(14, 'OD1306308', 7, 11),
(16, 'OD8537612', 6, 11),
(17, 'OD270870', 1, 8),
(23, 'OD3622384', 3, 7),
(24, 'OD3030374', 3, 7),
(25, 'OD4464982', 3, 7),
(30, 'OD3400646', 3, 7),
(31, 'OD3400646', 3, 10),
(32, 'OD3400646', 3, 13),
(33, 'OD3400646', 3, 8),
(38, 'OD4580596', 3, 11),
(39, 'OD989536', 3, 11),
(41, 'OD6493209', 3, 2),
(42, 'OD6493209', 3, 1),
(43, 'OD9732930', 3, 2),
(44, 'OD9732930', 3, 1),
(45, 'OD4683399', 3, 2),
(46, 'OD4683399', 3, 1),
(47, 'OD171513', 3, 2),
(48, 'OD171513', 3, 1),
(51, 'OD6779269', 1, 3),
(52, 'OD6710951', 3, 7),
(53, 'OD7921949', 3, 7);

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`itm_no`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `bid` (`bid`);

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
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `itm_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temp_payments`
--
ALTER TABLE `temp_payments`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE;

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
-- Constraints for table `temp_payments`
--
ALTER TABLE `temp_payments`
  ADD CONSTRAINT `temp_payments_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `temp_payments_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
