-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 07:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'Alice in Wonderland', 'Lewis Carroll', 'media/book_img/Alice-in-Wonderland.jpg', 'media/book_file/Alice in Wonderland.pdf', 'A young girl named Alice, who falls into a subterranean fantasy world populated by peculiar, anthropomorphic creatures.', 8, 400),
(2, 'Artificial Intelligence - A Modern Approach', 'Pearson', 'media/book_img/Artificial-Intelligence-A-Modern-Approach.jpg', 'media/book_file/Artificial Intelligence - A Modern Approach.pdf', 'A Modern Approach explores the full breadth and depth of the field of artificial intelligence (AI).', 5, 550),
(3, 'Life of Captain Marvel', 'Stan Lee', 'media/book_img/Life-of-Captain-Marvel.jpg', 'media/book_file/Life of Captain Marvel.pdf', 'Carol Danvers is one of the mightiest heroes not just on Earth but in the entire galaxy! Now learn exactly how she became the woman she is - The Avenger', 3, 700),
(4, 'National Geographic - The Fight For Clean Air', 'NatGeo. April', 'media/book_img/National-Geographic-The-Fight-For-Clean-Air.jpg', 'media/book_file/National Geographic - The Fight For Clean Air.pdf', 'Air pollution kills millions every year, like a ‘pandemic in slow motion’.', 6, 150),
(5, 'Phoenix Project', 'Gene Kim', 'media/book_img/Phoenix-Project.jpg', 'media/book_file/Phoenix Project.pdf', 'The business novel tells the story of an IT manager who has ninety days to rescue an over-budget and late IT initiative, code-named The Phoenix.', 5, 350),
(6, 'Principle of Relativity', 'Albert Einstein', 'media/book_img/Principle-of-Relativity.jpg', 'media/book_file/Principle of Relativity.pdf', 'In physics, the principle of relativity is the requirement that the equations describing the laws of physics have the same form in all admissible frames of reference.', 1, 699),
(7, 'Quantum Physics', 'Douglas Ross FRS', 'media/book_img/Quantum-Physics.jpg', 'media/book_file/Quantum Physics.pdf', 'The physics that explains how everything works: the best description we have of the nature of the particles that make up matter and the forces with which they interact.', 1, 800),
(8, 'Romeo and Juliet', 'William Shakespeare', 'media/book_img/Romeo-and-Juliet.jpg', 'media/book_file/Romeo and Juliet.pdf', 'A tragedy written by William Shakespeare early in his career about two young Italian star-crossed lovers whose deaths ultimately reconcile their feuding families.', 10, 999),
(9, 'Spider-Verse', 'Stan Lee', 'media/book_img/Spider-Verse.jpg', 'media/book_file/Spider-Verse.pdf', 'After gaining superpowers from a spider bite, Miles Morales protects the city as Spider-Man. Soon, he meets alternate versions of himself and gets embroiled in an epic battle to save the multiverse.', 3, 750),
(10, 'The Invisible Man', 'H.G Wells', 'media/book_img/The-Invisible-Man.jpg', 'media/book_file/The Invisible Man.pdf', 'A brilliant scientist uncovers the secret to invisibility, but his grandiose dreams and the power he unleashes cause him to spiral into intrigue, madness, and murder.', 4, 249),
(11, 'Time Magazine - Women and the Pandemic', 'Time, March', 'media/book_img/Time-Magazine-Women-and-the-Pandemic.jpg', 'media/book_file/Time Magazine - Women and the Pandemic.pdf', 'COVID-19 has made it impossible to deny the ways broken systems hurt women.', 6, 199),
(12, 'The Black Cat', 'Edgar Allan Poe', 'media/book_img/The-Black-Cat.jpg', 'media/book_file/The Black Cat.pdf', 'In the story, an unnamed narrator has a strong affection for pets until he perversely turns to abusing them.', 4, 99),
(13, 'Sachin The Billion Dreams', 'Sachin Tendulkar', 'media/book_img/Sachin-The-Billion-Dreams.jpg', 'media/book_file/Sachin The Billion Dreams.pdf', 'Sachin Tendulkar recounts his journey of becoming one of the most famous names in cricket.', 9, 1200),
(14, 'A Real Life Story - W.George Bush', 'Beatrice Gormley', 'media/book_img/A-Real-Life-Story---W.George-Bush.jpg', 'media/book_file/A Real Life Story - W.George Bush.pdf', 'How Bad Can a President Be? A new biography exposes the mysterious confidence behind George W. Bush\'s greatest failures.', 9, 600),
(15, 'The Story of My Experiments with Truth', 'M.K.Gandhi', 'media/book_img/M.K.Gandhi-The-Story-of-My-Experiments-with-Truth.jpg', 'media/book_file/M.K.Gandhi-The Story of My Experiments with Truth.pdf', 'The Story of My Experiments with Truth is the autobiography of Mohandas K. Gandhi, covering his life from early childhood.', 9, 750),
(16, 'Steve Jobs-Biography', 'Walter Isaacson', 'media/book_img/Steve-Jobs-Biography.jpg', 'media/book_file/Steve Jobs-Biography.pdf', 'Steve Jobs is the authorized self-titled biography of Steve Jobs. The book was written at the request of Jobs by Walter Isaacson, a former executive at CNN and TIME.', 9, 399),
(17, 'Vikram and Betaal', 'Mahakavi  Somdev Bhatt', 'media/book_img/Vikram-and-Betaal.jpg', 'media/book_file/Vikram and Betaal.pdf', 'These stories were written nearly 2,500 years ago by Mahakavi Somdev Bhatt. These are spellbinding stories told to the wise King Vikramaditya by the wily ghost Betal.', 8, 249),
(18, 'Oliver Twist-A Classic Tale', 'Charles Dickens', 'media/book_img/Oliver-Twist-A-Classic-Tale.jpg', 'media/book_file/Oliver Twist-A Classic Tale.pdf', 'The story of the orphan Oliver, who runs away from the workhouse only to be taken in by a den of thieves, shocked readers when it was first published.', 8, 299),
(19, 'Pwning Tomorrow', 'Electronic Frontier Foundation', 'media/book_img/Pwning-Tomorrow.jpg', 'media/book_file/Pwning Tomorrow.pdf', 'Pwning Tomorrow is an anthology of short fiction curated by EFF!', 8, 80),
(20, 'The Wedding Date', 'Jasmine Guillory', 'media/book_img/The-Wedding-Date.jpg', 'media/book_file/The-Wedding-Date.pdf', 'A feel-good romance to warm your heart. Though the plot is cheesy at times, it is still entertaining.', 10, 400),
(21, 'The Notebook', 'Nicholas Spark', 'media/book_img/The-Notebook---Nicholas-Spark.jpg', 'media/book_file/The Notebook - Nicholas Spark.pdf', 'The Notebook is an achingly tender story about the enduring power of love, a story of miracles that will stay with you forever.', 10, 289),
(22, 'Call Me by Your Name', 'Andre Aciman', 'media/book_img/Call-Me-by-Your-Name.jpg', 'media/book_file/Call Me by Your Name.pdf', 'It centers on a blossoming romantic relationship between an intellectually precocious American-Italian Jewish boy named Elio Perlman and a visiting American Jewish scholar named Oliver.', 10, 550),
(23, 'Born A crime', 'Trevor Noah', 'media/book_img/Born-a-crime-trevor-noah.jpg', 'media/book_file/Born-a-crime-trevor-noah.pdf', 'Stories from a South African Childhood is an autobiographical comedy book written by the South African comedian Trevor Noah, published in 2016.', 11, 399),
(24, 'Good Omens', 'Neil Gaiman and Terry Pratchett', 'media/book_img/Good-Omens---Neil-Gaiman-and-Terry-Pratchett.jpg', 'media/book_file/Good Omens - Neil Gaiman and Terry Pratchett.pdf', 'This book is a comedy about the birth of the son of Satan and the coming of the End Times.', 11, 240),
(25, 'Mr.Beans Holiday', 'Rowan Atkinson', 'media/book_img/Mr-Beans-holiday.jpg', 'media/book_file/Mr-Beans-holiday.pdf', 'Mr. Bean wins a holiday to France and sets out on his journey. Once there, he unknowingly separates a father-son duo and then decides to reunite them.', 11, 830),
(26, 'Midsummer Night Dream', 'William Shakespeare', 'media/book_img/Midsummer-Night-Dream.jpg', 'media/book_file/Midsummer Night Dream.pdf', 'The play is set in Athens, and consists of several subplots that revolve around the marriage of Theseus and Hippolyta.', 11, 660),
(27, 'A History of India', 'Hermann Kulke and Dietmar Rothermund', 'media/book_img/A-History-of-India.jpg', 'media/book_file/A History of India.pdf', 'A History of India presents the grand sweep of Indian history from antiquity to the present in a compact and readable survey.', 12, 380),
(28, 'An Army at Dawn-The War in North Africa', 'Rick Atkinson', 'media/book_img/An-Army-at-Dawn-The-War-in-North-Africa-1942-1943.jpg', 'media/book_file/An Army at Dawn-The War in North Africa 1942-1943.pdf', 'The book is a history of the North African Campaign, particularly focused on the role of the United States military.', 12, 250),
(29, 'Argumentative Indian', 'Amartya Sen', 'media/book_img/Argumentative-Indian.jpg', 'media/book_file/Argumentative Indian.pdf', 'It is a collection of essays that discuss Indian history and identity, focusing on the traditions of public debate and intellectual pluralism.', 12, 320),
(30, 'A History of the Classical Greek World', 'P.J.Rhodes', 'media/book_img/A-History-of-the-Classical-Greek-World-478-323-BC.jpg', 'media/book_file/A History of the Classical Greek World 478-323 BC.pdf', 'This book gives an accessible account of classical Greek history, from the aftermath of the Persian Wars in 478 bc to the death of Alexander the Great in 323 bc.', 12, 400),
(31, 'The Selfish Gene', 'R.Dawkins', 'media/book_img/The-Selfish-Gene-R.Dawkins.jpg', 'media/book_file/The Selfish Gene R.Dawkins.pdf', 'The Selfish Gene is a 1976 book on evolution by the Ethologist Richard Dawkins, in which the author builds upon the principal theory of George C. Williams Adaptation and Natural Selection.', 1, 900),
(32, 'What is Life', 'Schrodinger', 'media/book_img/What-is-Life.jpg', 'media/book_file/What is Life.pdf', 'What Is Life? The Physical Aspect of the Living Cell is a 1944 science book written for the lay reader by physicist Erwin Schrödinger.', 1, 1350),
(33, 'Overkill', 'Christina Engela', 'media/book_img/Overkill.jpg', 'media/book_file/Overkill.pdf', 'Overkill provides a glimpse into the life and background of one of the main characters of the Galaxii Series and contains over 15000 words worth of new material not seen in any of the novels!', 2, 700),
(34, '1984-George Orwell', 'George Orwell', 'media/book_img/1984-George-Orwell.jpg', 'media/book_file/1984-George Orwell.pdf', 'This dystopian novel set in 1984 provided a riveting description of citizens lives being in constant war, oppressive government surveillance, rule, and propaganda.', 2, 499),
(35, 'The Fall of the Gods', 'Nicola Bagala', 'media/book_img/The-Fall-of-the-Gods.jpg', 'media/book_file/The Fall of the Gods.pdf', 'When new graduate Yuki Kashizawa moves to London for her PhD, she is certainly not expecting to be dragged into a mystery.', 2, 999),
(36, 'Mercury Rising', 'Christina Engela', 'media/book_img/Mercury-Rising.jpg', 'media/book_file/Mercury Rising.pdf', 'Mercury Rising is a preview of Panic! Horror In Space - a series of sci-fi-horror misadventures in deep space with the crew of the I.S.S.', 2, 789),
(37, 'Doctor Strange', 'Mark Waid', 'media/book_img/Doctor-Strange.jpg', 'media/book_file/Doctor Strange.pdf', 'A window-crashing, high-flying, globe-traveling, ghost-battling adventure from the earliest days of Doctor Strange training in the mystic arts!', 3, 1500),
(38, 'Ant-man and The Wasp', 'Ralph Macchio', 'media/book_img/Ant-man-and-The-Wasp.jpg', 'media/book_file/Ant-man and The Wasp.pdf', 'Despite being under house arrest, Scott Lang, along with the Wasp, sets out to help Dr.Hank Pym to enter the quantum realm as they face new enemies along the way.', 3, 800),
(39, '114Mimosa', 'J Bennington', 'media/book_img/114Mimosa.jpg', 'media/book_file/114Mimosa.pdf', 'Jonas visits a fortune teller first and she sends him to eliminate his chronically ill wife. And is delivered with instructions that were not followed and a triumphant demon does what he loves the best.', 4, 300),
(40, 'Scarecrow', 'Darren G. Burton', 'media/book_img/Scarecrow.jpg', 'media/book_file/Scarecrow.pdf', 'Three college graduates dive for lost Spanish treasure. three men open an underwater cave, Headless corpses wash up on the beaches. But only one man knows the secret of the SCARECROW.', 4, 449),
(41, 'Zombie Chronicles', 'Chrissy Peebles', 'media/book_img/ZombieChronicles.jpg', 'media/book_file/ZombieChronicles.pdf', 'The Zombie Chronicles is a young adult dystopian thriller for fans of The Walking Dead and Hollowland written by Chrissy Peebles.', 4, 370),
(42, 'Post Corona', 'Scott Galloway', 'media/book_img/Post-Corona.jpg', 'media/book_file/Post Corona.pdf', 'It demonstrates how the largest technology companies turned the crisis of the pandemic into the market-share-grabbing opportunity of a lifetime.', 5, 400),
(43, 'Hackers Heroes of the Computer Revolution', 'Steven Levy', 'media/book_img/Hackers-Heroes-of-the-Computer-Revolution.jpg', 'media/book_file/Hackers Heroes of the Computer Revolution.pdf', 'Steven Levy shows us how a historical book about an industry should be written. It contains an unfolding, interrelated emotional story of people and technology.', 5, 1100),
(44, 'Time-Visions of Equity', 'Time, May', 'media/book_img/Time-24-31-May.jpg', 'media/book_file/Time 24-31 May.pdf', 'Visions of Equity is a special project conceived and curated by TIMEs BIPOC staff, featuring stories about the fight for racial justice and ways to build a better world.', 6, 120),
(45, 'THE WEEK-THIS VIRUS IS INDEED MAN-MADE', 'The Week, October', 'media/book_img/THE-WEEK-11-OCT-2020.jpg', 'media/book_file/THE WEEK 11 OCT 2020.pdf', 'This is based on the facts and assumptions on the virus which is indeed man-made.', 6, 70),
(46, 'Soccer Brain', 'Dan Abrahams', 'media/book_img/Soccer-Brain.jpg', 'media/book_file/Soccer Brain.pdf', 'Soccer Brain teaches coaches to train players to compete with confidence, with commitment, with intelligence, and as part of a team.', 7, 600),
(47, 'The Spirit of Cricket', 'Rob Smyth', 'media/book_img/The-Spirit-of-Cricket.jpg', 'media/book_file/The Spirit of Cricket.pdf', 'Never wish them pain. That is not who you are. If they caused you pain, they must have pain inside. Wish them healing - The Spirit of Cricket.', 7, 1750),
(48, 'Chess-The Complete Guide To Chess', 'Logan Donovan', 'media/book_img/Chess-The-Complete-Guide-To-Chess.jpg', 'media/book_file/Chess-The Complete Guide To Chess.pdf', 'Discover Secret Strategies, Moves, and Traps to Control the Chess Board from Move One and Quickly Achieve Checkmate', 7, 350),
(49, 'Nutrition for Sports and Exercise', 'Regina Belski', 'media/book_img/Nutrition-for-Sport-Exercise-and-Performance.jpg', 'media/book_file/Nutrition for Sport, Exercise and Performance.pdf', 'Nutrition for Sport, Exercise and Performance offers a clear, practical and accessible guide to the fundamentals of sport and exercise nutrition.', 7, 200);

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
(8, 10, 12),
(17, 1, 37);

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
(2, 'SCI-FI', 'media/cat_img/fiction1.jpg', 'media/cat_img/fiction2.jpg', 'If you\'re looking for even more stories to take you to another world, discover these science fiction books.'),
(3, 'COMICS', 'media/cat_img/comics1.jpg', 'media/cat_img/comics2.jpg', 'Graphic novels, comics, and manga'),
(4, 'HORROR', 'media/cat_img/horror1.jpg', 'media/cat_img/horror2.jpg', 'Horror often overlaps science fiction or fantasy, all three of which categories'),
(5, 'TECHNOLOGY', 'media/cat_img/technology1.jpg', 'media/cat_img/technology2.jpg', 'Tools for Preparing Your Team for the Future.'),
(6, 'MAGAZINES', 'media/cat_img/magazines1.jpg', 'media/cat_img/magazines2.jpg', 'Popular magazines and top newspapers from Newsstand section'),
(7, 'SPORTS', 'media/cat_img/sports1.jpg', 'media/cat_img/sports2.jpg', 'Explore the Best Sports Biographies and Books'),
(8, 'STORIES', 'media/cat_img/stories1.jpg', 'media/cat_img/stories2.jpg', 'Stories are of great value to human culture, and are some of the oldest, most important parts of life.'),
(9, 'BIOGRAPHY', 'media/cat_img/biography1.jpg', 'media/cat_img/biography2.jpg', 'Whether it\'s the final journey of a spiritual mentor or an innovative young computer genius-Biographies at best'),
(10, 'ROMANCE', 'media/cat_img/romance1.jpg', 'media/cat_img/romance2.jpg', 'The Best Romantic books to Sweep You Off Your Feet.'),
(11, 'COMEDY', 'media/cat_img/comedy1.jpg', 'media/cat_img/comedy28563.jpg', 'Funny as Hell! Rounding up the best comedy books for troubling times.'),
(12, 'HISTORY', 'media/cat_img/history1.jpg', 'media/cat_img/history2.jpg', 'A Book that has as its setting a period of history and that attempts to convey the spirit, manners, and social conditions of a past age with realistic.');

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
(6, 1, 9, 'Uhhhh', '2021-05-18 18:39:18'),
(7, 1, 33, 'hiiii very\'s bad', '2021-05-22 12:59:10'),
(8, 1, 7, 'Mind blowing!', '2021-05-27 22:52:28');

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
(7, 'trial', 'admin/media/profile_img/def99864.jpg', 'trial@gmail.com', 'Trial@123'),
(8, 'Unknown', 'admin/media/profile_img/Rohit3747.jpg', 'unknown@gmail.com', 'Unknown@123'),
(9, 'MSD', 'admin/media/profile_img/Dhoni.jpg', 'msd@gmail.com', 'Thala@7'),
(10, 'Virat', 'admin/media/profile_img/Virat.jpg', 'virat@gmail.com', 'King@18');

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
(16, 'OD6787210', 1, 8, '2021-05-18 16:21:19'),
(17, 'OD7410009', 10, 13, '2021-05-18 16:58:04'),
(18, 'OD6761260', 10, 3, '2021-05-18 17:03:49'),
(19, 'OD5281954', 10, 9, '2021-05-18 17:04:41'),
(20, 'OD2032527', 1, 6, '2021-05-20 07:11:09'),
(21, 'OD2032527', 1, 4, '2021-05-20 07:11:09'),
(22, 'OD6117644', 10, 1, '2021-05-20 07:52:26'),
(23, 'OD6117644', 10, 11, '2021-05-20 07:52:26'),
(24, 'OD3102141', 4, 9, '2021-05-20 07:56:06'),
(25, 'OD946759', 4, 13, '2021-05-20 07:57:00'),
(26, 'OD4148659', 9, 11, '2021-05-20 08:49:58'),
(27, 'OD4148659', 9, 8, '2021-05-20 08:49:58'),
(28, 'OD6251326', 9, 13, '2021-05-20 08:51:09'),
(29, 'OD2357994', 2, 6, '2021-05-20 12:26:09'),
(30, 'OD588258', 1, 33, '2021-05-22 10:36:26'),
(31, 'OD494625', 1, 17, '2021-05-27 22:53:46');

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
(4, 3, 'Grandma Tales', 'Needed story books for Bedtime :/', '2021-05-15 15:34:39'),
(6, 10, 'The Guest', 'Much awaited for thrillers', '2021-05-18 17:10:45'),
(7, 1, 'Java Programming', 'I need this book sir!', '2021-05-18 18:24:25'),
(8, 1, 'Tinkle', 'I love Suppandi comedies.', '2021-05-27 22:56:58');

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
(25, 'OD6612601', 1, 6),
(26, 'OD1874447', 1, 6),
(29, 'OD6526280', 1, 3),
(30, 'OD7044830', 1, 3),
(31, 'OD9920144', 1, 3),
(34, 'OD3528278', 10, 12),
(44, 'OD1200735', 1, 31);

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
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `itm_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_payments`
--
ALTER TABLE `temp_payments`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
