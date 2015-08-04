-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2015 at 06:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rental_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `Book_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tittle` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`Book_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_ID`, `Tittle`, `Author`, `Category`, `Price`) VALUES
(9, 'An Introduction to the Theory of Statistics', 'Robindra Nath Shil', 'CSE', 160),
(18, 'Let Us C', 'Y. Kanet Kar', 'CSE', 129.56),
(19, 'ANSI C', 'E. Balagurushamy', 'CSE', 150),
(21, 'Vector Analysis', 'M.R Spiegel', 'Math', 75),
(22, 'Electro Chemistry ', 'Samuel glasstone', 'Humanities', 120),
(24, 'Complex Variable', 'M.R Spiegel', 'Math', 75.25);

-- --------------------------------------------------------

--
-- Table structure for table `book_group`
--

CREATE TABLE IF NOT EXISTS `book_group` (
  `BRN` int(20) NOT NULL AUTO_INCREMENT,
  `Group_ID` int(20) NOT NULL,
  `Book_ID` int(20) NOT NULL,
  `Rent_Time` varchar(30) NOT NULL,
  `Return_Time` varchar(30) NOT NULL,
  `Quantity` int(5) NOT NULL,
  PRIMARY KEY (`BRN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `book_group`
--

INSERT INTO `book_group` (`BRN`, `Group_ID`, `Book_ID`, `Rent_Time`, `Return_Time`, `Quantity`) VALUES
(8, 8, 9, 'Sun, 15 Mar 2015 19:10:01 PM', 'Wed, 16 Sep 2015', 2),
(11, 8, 21, 'Sun, 15 Mar 2015 19:17:17 PM', 'Wed, 16 Sep 2015', 2),
(12, 9, 9, 'Sun, 15 Mar 2015 20:57:57 PM', 'Wed, 16 Sep 2015', 2),
(13, 9, 21, 'Tue, 17 Mar 2015 19:52:40 PM', 'Fri, 18 Sep 2015', 2),
(16, 8, 19, 'Tue, 17 Mar 2015 23:22:34 PM', 'Fri, 18 Sep 2015', 5);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Rend` varchar(100) DEFAULT NULL,
  `Expire` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`ID`, `Rend`, `Expire`, `Remarks`) VALUES
(8, NULL, NULL, NULL),
(9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Roll` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Password` varchar(8) NOT NULL,
  PRIMARY KEY (`Roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Roll`, `Name`, `Mobile`, `Email`, `Address`, `Password`) VALUES
(1207001, 'Abdul Aziz', '01672893423', 'aziz@gmail.com', 'Lalan Shah', '1234'),
(1207002, 'Masum Billah', '01990201230', 'masum@hotmail.com', 'Lalan Shah', 'DUiY'),
(1207003, 'Tanim', '01679343294', 'tanim@gmail.com', 'Lalan Shah', '2IVg'),
(1207004, 'Ashad Opu', '01735567899', 'opu@yahoo.com', 'Lalan Shah', 'WlJk'),
(1207005, 'Asaf-Uddowla Golap', '01521453003', 'golapraj@yahoo.com', 'Lalan Shah', '1234'),
(1207006, 'Karima Zohra', '01712345678', 'zohra@jan.com', 'Begum Rokeya', '4Ctf'),
(1207007, 'Jannat Sharmi', '01523456789', 'sharmi@gmail.com', 'Begum Rokeya', 'm4Mv'),
(1207008, 'Muna', '01773737373', 'muna@gmail.com', 'Begum Rokeya', 'U8zJ'),
(1207009, 'Soma', '24324324324', 'Soma@gmail.com', 'Begum Rokeya', 'vhQE'),
(1207010, 'Kazi Afsana', '01912345678', 'mousomi@yahoo.com', 'Begum Rokeya', '2mZO'),
(1207011, 'Sawon', '94203402340', 'sawon@hmail.com', 'Lalan Shah', 'ySVI'),
(1207012, 'Masum Al Masba', '01712345678', 'masum_baccha@ymail.com', 'Lalan Shah', 'naRi'),
(1207013, 'N. Rahat', '01837478348', 'nrahat@ymail.com', 'Lalan Shah', '1aRd'),
(1207014, 'S. Hujur', '01912873812', 'salman@hujur.com', 'Lalan Shah', 'FJTY'),
(1207015, 'Tomal', '01745123456', 'tomal@gmail.com', 'Lalan Shah', 'HQM2'),
(1207018, 'Mahadi', '01789123456', 'mahadi@yahoo.com', 'Lalan Shah', 'wDL1'),
(1207021, 'Ahmad Musa', '01724123456', 'musa.kuet@ymail.com', 'Lalan Shah', 'e9Od'),
(1207023, 'Montasir Bin Koko', '01523456789', 'montasir.manoshi@gmail.com', 'Lalan Shah', 'leuB'),
(1207026, 'Sunanda Das', '01568678968', 'sunanda@yahoo.com', 'A.K Fazlul Haque', '1234'),
(1207030, 'Asif', '01724123456', 'asif@gmail.com', 'Lalan Shah', 'xPT7'),
(1207031, 'Fahad', '23782112819', 'fahad@ymail.com', 'Lalan Shah', 'AiTv'),
(1207032, 'Nafew', '01817271235', 'wayfarernafew@gmail.com', 'Lalan Shah', '5RJA'),
(1207034, 'aa', '01816940364', 'aw@gmail.com', 'Amar Ekushy', 'dX9q'),
(1207035, 'Tasnim prome', '1923456789', 'promeraj@gmail.com', 'Begum Rokeya', '65dg'),
(1207037, 'Aney Rani Paul', '1723456788', 'aney@yahoo.com', 'Begum Rokeya', 'aEcl'),
(1207039, 'Sumaiya Tasnim', '1523098765', 'mashfi@gmail.com', 'Begum Rokeya', 'fzvZ'),
(1207044, 'Foysal Ahmed', '1612345678', 'amil@hotmail.com', 'Bangobondhu Sheikh Mujibur Rahman', '5sFh'),
(1207047, 'Maaheer Amaeer', '01772345667', 'maaheer_amaeer@vaira.com', 'Bangobondhu Sheikh Mujibur Rahman', 'qRsQ'),
(1207048, 'Nasrin Akter Rima', '01521345678', 'Rimakhan@gmail.com', 'Begum Rokeya', 'icxF'),
(1207051, 'Pial Shuvro', '01734897654', 'pial@yahoo.com', 'Bangobondhu Sheikh Mujibur Rahman', 'ErqM');

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE IF NOT EXISTS `student_group` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Group_ID` int(100) NOT NULL,
  `Roll` int(10) NOT NULL,
  `Sesn` varchar(20) NOT NULL,
  `Term` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`ID`, `Group_ID`, `Roll`, `Sesn`, `Term`) VALUES
(26, 8, 1207001, '2012-2013', '1st'),
(27, 8, 1207002, '2012-2013', '1st'),
(28, 8, 1207003, '2012-2013', '1st'),
(29, 8, 1207004, '2012-2013', '1st'),
(30, 8, 1207005, '2012-2013', '1st'),
(31, 9, 1207006, '2012-2013', '1st'),
(32, 9, 1207007, '2012-2013', '1st'),
(33, 9, 1207008, '2012-2013', '1st'),
(34, 9, 1207009, '2012-2013', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE IF NOT EXISTS `thesis` (
  `Thesis_No` varchar(10) NOT NULL,
  `Thesis_Tittle` varchar(100) NOT NULL,
  `Roll1` int(7) NOT NULL,
  `Name1` varchar(50) NOT NULL,
  `Roll2` int(7) NOT NULL,
  `Name2` varchar(50) NOT NULL,
  `Roll3` int(7) NOT NULL,
  `Name3` varchar(50) NOT NULL,
  `Roll4` int(7) NOT NULL,
  `Name4` varchar(50) NOT NULL,
  `Thesis_Category` varchar(25) NOT NULL,
  `Supervisor_Name` varchar(50) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`Thesis_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`Thesis_No`, `Thesis_Tittle`, `Roll1`, `Name1`, `Roll2`, `Name2`, `Roll3`, `Name3`, `Roll4`, `Name4`, `Thesis_Category`, `Supervisor_Name`, `Remarks`) VALUES
('CSER-03-01', 'A Study on Grammatical Evolution.', 98724, 'Farhana Sharifa', 98744, 'Afroza Rahman', 0, '', 0, '', 'Thesis', '', ''),
('CSER-03-02', 'An approach to develop a web based educational learning environment by questioning and answering', 98731, 'Manik Chandra saha', 98748, 'A.S.M.Mukter-uz-zaman', 0, '', 0, '', 'Thesis', '', ''),
('CSER-03-03', 'Analysis design and implementation of the khulna pathology laboratory information system.', 98720, 'Debases das gupta', 98725, 'Shah mahammad azizul haque', 0, '', 0, '', 'Thesis', '', ''),
('CSER-03-04', 'Management automation of remote offices of dipu stone crashing industries.', 98704, 'Md. golam mostofa', 98708, 'Md. Anisur rahaman', 98746, 'Mohammad mosfequr rahman', 0, '', 'Thesis', '', ''),
('CSER-03-05', 'A Study on component based software development using Active x and Java_Beans Technology', 98727, 'Md. Shohal anowar', 98728, '98728', 0, '', 0, '', 'Thesis', '', ''),
('CSER-03-06', 'Bangla handwritten character recognition using syntactic method', 98730, 'Mollah masum billah azadi', 98735, 'Md. badiul alam', 0, '', 0, '', 'Thesis', '', ''),
('CSER-03-07', 'A project on automation of PABX telephone billing system with web facilities.', 98701, 'Sheikh mohammad masudul ahsan', 98709, 'Md. mafizur rahman', 0, '', 0, '', 'Thesis', '', ''),
('CSER-03-08', 'An approach to English to Bangali translation using NLP algorithom.', 98714, 'Shah Atiqur rahman', 98719, 'Kazi shahed mahmud', 0, '', 0, '', 'Thesis', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `type`, `url`) VALUES
(12, 'CSE-2202', 'Question', 'uploads/ban.jpg'),
(13, 'Book', 'Book', 'uploads/vaira.pdf'),
(14, 'map', 'Other', 'uploads/Capture.JPG'),
(15, 'code', 'Other', 'uploads/multistage.cpp'),
(16, 'software', 'Other', 'uploads/pixie.exe'),
(17, 'zip', 'Other', 'uploads/Siyam-Rupali-master.zip'),
(18, 'CSE-2207_2008', 'Question', 'uploads/Routine 22.JPG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
