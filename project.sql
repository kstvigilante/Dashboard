-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 02:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `custrelation`
--

CREATE TABLE `custrelation` (
  `id` varchar(2) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custrelation`
--

INSERT INTO `custrelation` (`id`, `Name`, `status`) VALUES
('1', 'cust1', 'satisfied'),
('10', 'cust10', 'very satisfied'),
('11', 'cust11', 'very satisfied'),
('12', 'cust12', 'very satisfied'),
('13', 'cust13', 'very satisfied'),
('14', 'cust14', 'neutral'),
('15', 'cust15', 'neutral'),
('16', 'cust16', 'neutral'),
('17', 'cust17', 'neutral'),
('18', 'cust18', 'neutral'),
('19', 'cust19', 'neutral'),
('2', 'cust2', 'satisfied'),
('20', 'cust20', 'unsatisfied'),
('3', 'cust3', 'satisfied'),
('4', 'cust4', 'satisfied'),
('5', 'cust5', 'satisfied'),
('6', 'cust6', 'very satisfied'),
('7', 'cust7', 'very satisfied'),
('8', 'cust8', 'very satisfied'),
('9', 'cust9', 'very satisfied');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` varchar(2) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `Name`, `City`, `Gender`) VALUES
('1', 'Sita', 'noida', 'female'),
('10', 'Ritik', 'Agra', 'male'),
('11', 'Aditya', 'noida', 'male'),
('12', 'lokesh', 'greater noida', 'male'),
('13', 'akhilesh', 'lucknow', 'male'),
('2', 'Geeta', 'noida', 'female'),
('3', 'Riya', 'lucknow', 'female'),
('4', 'Teesta', 'patna', 'female'),
('5', 'Ram', 'patna', 'male'),
('6', 'Shyam', 'lucknow', 'male'),
('7', 'harsh', 'meerut', 'male'),
('8', 'shantanu', 'lucknow', 'male'),
('9', 'vardhan', 'meerut', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `empperformance`
--

CREATE TABLE `empperformance` (
  `id` varchar(2) NOT NULL,
  `Quarter` varchar(50) NOT NULL,
  `Emp1` int(10) NOT NULL,
  `Emp2` int(10) NOT NULL,
  `Emp3` int(10) NOT NULL,
  `Emp4` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empperformance`
--

INSERT INTO `empperformance` (`id`, `Quarter`, `Emp1`, `Emp2`, `Emp3`, `Emp4`) VALUES
('1', 'Q1', 758941, 859623, 452369, 405639),
('2', 'Q2', 623891, 735896, 545236, 250000),
('3', 'Q3', 423891, 766896, 495326, 380963),
('4', 'Q4', 798491, 889623, 626325, 345698);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` varchar(2) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `category`, `quantity`) VALUES
('1', 'Door Fitting', 20000),
('2', 'Adhesive', 12000),
('3', 'Plywood', 25000),
('4', 'Screws', 17500),
('5', 'Kitchen Basket', 6000),
('6', 'Hinges', 11000),
('7', 'Wire Mesh', 4000),
('8', 'Aluminium Ext.', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` varchar(2) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sales` int(10) NOT NULL,
  `expenses` int(10) NOT NULL,
  `profit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `year`, `sales`, `expenses`, `profit`) VALUES
('1', '2013-14', 22432250, 20029616, 2402634),
('2', '2014-15', 30925323, 27774537, 3150786),
('3', '2015-16', 33316553, 31059607, 2256946),
('4', '2016-17', 32580797, 30154199, 2426598),
('5', '2017-18', 36320502, 33319933, 3000569);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` varchar(2) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_name`, `quantity`) VALUES
('1', 'Door Fitting', 6000),
('2', 'Adhesive', 8500),
('3', 'Plywood', 13000),
('4', 'Screw', 6150),
('5', 'Kitchen Basket', 3500),
('6', 'Hinges', 5500),
('7', 'Wire Mesh', 2150),
('8', 'Aluminium Ext.', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `salesbystate`
--

CREATE TABLE `salesbystate` (
  `id` varchar(2) NOT NULL,
  `year` varchar(10) NOT NULL,
  `UP` int(10) NOT NULL,
  `Bihar` int(10) NOT NULL,
  `Gujarat` int(10) NOT NULL,
  `Maharashtra` int(10) NOT NULL,
  `Karnatak` int(10) NOT NULL,
  `Average` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesbystate`
--

INSERT INTO `salesbystate` (`id`, `year`, `UP`, `Bihar`, `Gujarat`, `Maharashtra`, `Karnatak`, `Average`) VALUES
('1', '2013-14', 8486450, 4086450, 2886450, 4486450, 2486450, 4486450),
('2', '2014-15', 10925323, 4700000, 4000000, 7000000, 4300000, 6185065),
('3', '2015-16', 10316553, 8060000, 5050000, 6940000, 2950000, 6663311),
('4', '2016-17', 12580000, 5500097, 4000000, 6500000, 4000700, 6516159),
('5', '2017-18', 14320500, 5100000, 5075000, 6825000, 5000002, 7264100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(2) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(7, 'Kunwar', 'Siddharth', 'kst85077@gmail.com', '6adfb183a4a2c94a2f92dab5ade762a47889a5a1'),
(8, 'Shantanu', 'Mehrotra', 'shanmeh.srt@gmail.com', '79120306519cc52b340f8cd724b6333e38df25a0'),
(9, 'Harsh', 'Vardhan', 'eric.cooper@gmail.com', '6adfb183a4a2c94a2f92dab5ade762a47889a5a1'),
(10, 'Raghav', 'Mehra', 'rag.neh@gmail.com', '6adfb183a4a2c94a2f92dab5ade762a47889a5a1'),
(11, 'Geeta', 'Singh', 'gita@gmail.com', '6adfb183a4a2c94a2f92dab5ade762a47889a5a1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custrelation`
--
ALTER TABLE `custrelation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empperformance`
--
ALTER TABLE `empperformance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesbystate`
--
ALTER TABLE `salesbystate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
