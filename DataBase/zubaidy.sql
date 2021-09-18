-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 10:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zubaidy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL,
  `admin_fullname` varchar(35) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`, `admin_image`) VALUES
(3, 'z@gmail.com', '123456', 'Mohammad Alzubaidi', 'MzubaidiPC.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(5) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(1, 'Mobile Phones', 'download.jpg'),
(2, 'Computer', 'ComCat.jpg'),
(3, 'Mobile Phones Accessories', 'mobile-phones-wholesale.jpg'),
(4, 'Computer Accessories', 'all-computer-accessories.jpeg'),
(25, 'Electronics', 'Crown.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(3) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_price` double NOT NULL,
  `cat_id` int(3) NOT NULL,
  `pro_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_desc`, `pro_price`, `cat_id`, `pro_image`) VALUES
(1, 'Samsung S20', 'Meet Galaxy S20, S20+, and S20 Ultra. With revolutionary 8K Video Snap changing how you capture not just video, but photography.', 1500, 1, 's20.jpg'),
(2, 'oppo', 'Explore the latest innovative OPPO smartphones and accessories and leap into the future with OPPO Reno5 Series, OPPO Find X3 Pro, OPPO A94 and OPPO', 800, 1, 'oppo.jpg'),
(3, 'Samsung Note20 ', 'With S Pen Support, We Bring You The Galaxy Note Experience To The Infinity Flex Display. Introducing The New Galaxy Z Fold3 5G', 1200, 1, 'note20.jpg'),
(4, 'Huawei Y7a', 'Released 2020, October 30 · 206g, 9.3mm thickness · Android 10, EMUI 10.1 · 64GB/128GB storage, micro SDXC .', 620, 1, 'hwawei.jpg'),
(20, 'Dell pc', 'Shop for Desktop Computers and All-in-One PCs at Dell.com', 850, 2, 'dellpc.jpg'),
(21, 'HP pc', 'Get the best for your HP printer at amazing prizes. Pay less and enjoy more reliable. printing services.', 980, 2, 'hppc.jpg'),
(22, 'iphone 12 pro case', 'Find iPhone cases and screen protectors to defend your phone against water, dust, and shock. Shop iPhone protective covers today. ', 55, 3, 'iphonecase.jpg'),
(23, 'Samsung HeadeSet', 'Select and compare the latest features and innovations available in the new Headphones Audio. Find the perfect Samsung audio for you!', 72, 3, 'samshs.jpeg'),
(24, 'Dell Latop', 'Shop Dell laptops and 2-in-1s today! Find the latest XPS laptops, Inspiron notebooks, high-performance Alienware Gaming laptops. FAST & FREE SHIPPING.', 1500, 2, 'dellLaptop.jpg'),
(25, 'Computer Mouse With High Performance', 'A computer mouse (plural mice, rarely mousses) is a hand-held pointing device that detects two-dimensional motion relative to a surface.', 80, 4, 'mouse.jpg'),
(26, 'asd', 'ssssssss', 1200, 3, 'dev-team.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
