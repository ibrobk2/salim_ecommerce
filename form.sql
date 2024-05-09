-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 04:54 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `product`, `qty`, `price`, `total`) VALUES
(1, '', 'Black Denim Jeans', '2', '20,000', '40'),
(15, 'Abdul', 'Apple Smartwatch SE Series', '45', '21,000', '945'),
(16, 'Abdul', 'GAN 13 Maglev Rubiks Cube', '4', '25,000', '100'),
(18, 'Zacks', 'GAN 356 RS Rubiks Cube', '7', '20,000', '140');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(9, 'Accessories'),
(5, 'Automobile'),
(1, 'Electronics'),
(4, 'Food stuffs'),
(7, 'Kids'),
(6, 'Mobile'),
(8, 'Stationaries'),
(3, 'Textiles');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `image_url` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`, `category`, `price`, `quantity`, `image_url`, `description`, `created_on`) VALUES
(1, 'TECNO SPARK 10', 'Mobile', '105,000', '20', 'tecno-spark10.jpg', '', '2023-09-09 22:29:58'),
(2, 'Iphone 14', 'Mobile', '550,000', '30', 'iphone 14.jpg', '', '2023-09-09 22:30:29'),
(3, 'Electric Kettle', 'Mobile', '6,000', '68', 'kettle.jpg', '', '2023-09-09 22:31:04'),
(4, 'GAN 13 Maglev Rubiks Cube', 'Kids', '25,000', '35', 'maglev.jpg', '', '2023-09-09 22:32:26'),
(5, 'AIR pro 6 TWS Wireless Headphones', 'Electronics', '15,000', '25', 'airpro6twswirelss.jpg', '', '2023-09-09 22:33:54'),
(6, 'Apple Smartwatch SE Series', 'Mobile', '21,000', '7', 'AMAZON-Apple-Watch-SE-859x1024.jpg', '', '2023-09-09 22:35:28'),
(7, 'Infinix Note 10', 'Mobile', '65,000', '55', 'innote10.jpg', '', '2023-09-09 22:36:02'),
(8, 'SAMSUNG Galaxy 22 Ultra', 'Mobile', '90,000', '40', 'samgals22ultra.jpg', '', '2023-09-09 22:36:53'),
(9, 'SAMSUNG Galaxy 23 Series', 'Mobile', '120,000', '21', 'gals23series.jpg', '', '2023-09-09 22:37:40'),
(10, 'GAN 356 RS Rubiks Cube', 'Kids', '20,000', '15', 'gan356rs.jpg', '', '2023-09-09 22:38:18'),
(11, 'DELL Laptop Core i7 2019', 'Mobile', '150,000', '23', 'dell.jpg', '', '2023-09-09 22:39:23'),
(13, 'Black Denim Jeans', 'Textiles', '20,000', '105', 'blackjeans.jpg', '', '2023-09-10 13:31:45'),
(15, 'Cotton Blue Shirt', 'Textiles', '6,000', '67', 'cotton blue t-shirt.jpg', 'Oxford light blue cotton T-shirt, XXL size for men. Made in England.', '2023-09-10 23:40:27'),
(16, 'Hisense VIDAA TV 65 inch', 'Electronics', '500,000', '6', 'hisense.jpg', 'Hisense with high display resolution', '2023-09-12 08:05:10'),
(17, 'Test', 'Accessories', '100', '20', 'Screenshot_20230207-180712 (2).png', 'Just for testing', '2024-03-07 14:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `username`, `amount`, `reference`, `date`) VALUES
(1, 'Abdul', '25000', 'DEMO-25202396', '2024-01-29 15:06:19'),
(2, 'Abdul', '20000', 'DEMO-516576640', '2024-02-12 20:38:24'),
(3, 'Zacks', '240000', 'DEMO-437123217', '2024-03-11 11:36:34'),
(4, 'Abdul', '15000', 'DEMO-54386105', '2024-03-20 14:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `dob`, `gender`, `state`, `password`, `verified`, `token`, `created_on`) VALUES
(1, 'Yusuf Bakori', 'Yusuf', 'yahya220909@gmail.com', '2021-12-16', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '061613', '2023-08-29 09:16:31'),
(2, 'Moses David', 'Mosaic', 'yahya220909@gmail.com', '2013-03-08', 'Male', '', '5bd2026f128662763c532f2f4b6f2476', 0, '334457', '2023-08-29 10:38:47'),
(4, 'David Sunaic', 'Sonic', 'ysy2209@gmail.com', '2001-11-25', 'Male', '', '5bd2026f128662763c532f2f4b6f2476', 1, '666721', '2023-08-29 10:54:07'),
(5, 'Michael Efe', 'Efe', 'yahya220909@gmail.com', '2023-09-12', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', 0, '714523', '2023-09-12 14:12:14'),
(7, 'Abdulbaatin Yusuf', 'Abdul', 'yahya220909@gmail.com', '2023-09-23', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '121825', '2023-09-13 15:11:49'),
(8, 'Madara Uchiha', 'Susano', 'unimportant21cm@gmail.com', '2023-10-07', 'Female', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '966100', '2023-10-11 09:55:36'),
(10, 'Itadori Yuji ', 'Itadori', 'yahya220909@gmail.com', '2023-10-16', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '316886', '2023-10-11 10:30:56'),
(11, 'Eren Jeager', 'Eren', 'yahya220909@gmail.com', '2023-10-05', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '632355', '2023-10-11 10:30:13'),
(12, 'Karim Benzema', 'Benzema', 'yahya220909@gmail.com', '2022-08-12', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '580121', '2023-10-12 08:04:03'),
(13, 'Neymar Jr.', 'Neymar', 'yahya220909@gmail.com', '2023-10-03', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '111289', '2023-10-12 08:04:20'),
(14, 'Ahmad Mustapha', 'Ahmad', 'yahya220909@gmail.com', '2023-08-17', 'Male', '', '3ab896b5b94e97beb42b6d91294dbd62', 1, '634294', '2023-12-19 07:29:38'),
(15, 'Zacks', 'Zacks', 'zacksabubkr@gmail.com', '1989-02-02', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '020678', '2024-03-11 11:34:05'),
(16, 'Abubakar sani bala', 'bapparh', 'abubakarsanibala1@gmail.com', '2005-12-18', 'Male', '', 'f056aa87896a676478bbbfec2469337a', 0, '633413', '2024-03-26 11:26:32'),
(17, 'muhammad nasir', 'mnasir', 'mnasir8336@gmail.com', '2024-03-21', 'Male', '', 'e10adc3949ba59abbe56e057f20f883e', 0, '344862', '2024-03-26 11:27:26'),
(18, 'Abubakar Abubakar Yau', 'AAY', 'abubakarabubakaryau01@gmail.com', '2024-03-26', 'Male', '', 'e82c4b19b8151ddc25d4d93baf7b908f', 0, '413320', '2024-03-26 11:28:17'),
(20, 'Adnan Usman', 'ad_narn', 'adnusy2023@gmail.com', '2004-08-18', 'Male', '', 'ccf285981d4de9b2473463fecb7d05ff', 0, '259293', '2024-03-26 11:28:35'),
(21, 'Ahmad Nura Ahmad ', 'Ahmadnbaffa', 'ahmadnbaffa@gmail.com', '2003-07-23', 'Male', '', 'c02a96f271d35043eaf2ed1841dc1574', 1, '410589', '2024-03-26 11:30:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`),
  ADD UNIQUE KEY `category_2` (`category`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_url` (`image_url`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fullname` (`fullname`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`,`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
