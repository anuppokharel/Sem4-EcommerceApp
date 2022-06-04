-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 01:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `name`, `email`, `password`, `status`, `username`) VALUES
(1, 'Debendra Lama', 'debendra@gmail.com', 'bebc708058223d309c00c5e2b1d3a020', 1, 'debey1'),
(2, 'Krishna Thapa', 'krishna@gmail.com', '8854b47fc05990266cc6df7f69d1adeb', 1, NULL),
(3, 'Krishna Thapa', 'krishna@gmail.com', '8854b47fc05990266cc6df7f69d1adeb', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `id` int(11) NOT NULL,
  `number_of_products` bigint(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `featured_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `status`) VALUES
(2, 'Electronics', 1),
(3, 'Cloths', 1),
(4, 'Groceries', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`name`, `email`, `message`) VALUES
('Devendra Lama', 'deve@gmail.com', 'Wassup bitches');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_featured_products`
--

CREATE TABLE `tbl_featured_products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_featured_products`
--

INSERT INTO `tbl_featured_products` (`id`, `title`, `price`, `category_id`, `image`, `status`) VALUES
(1, 'Airpods Max', 54213, 2, '6295a24cbb273_81thV7SoLZL._AC_SL1500_.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `title`, `price`, `category_id`, `image`, `status`) VALUES
(1, 'Apple iPhone 12', '100000', 2, '62846cb7e8362_iphone-12-white-select-2020.png', 1),
(4, 'Apple Airpods Pro', '45000', 2, '62848f0b56b8b_MWP22.jpg', 1),
(6, 'Apple iPhone 13', '150000', 2, '6284a1df2516b_iphone-13-starlight-select-2021.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `gender` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `phone`, `status`, `gender`, `address`, `image`) VALUES
(2, 'Hanna Emrie', 'hana1', 'hana@gmail.com', '3b7972d6e14381a8f234aaf14c813d2e', 9812343284, 1, 'Female', 'Osaka, Japan', '62848b56b6b3b_download.jpg'),
(4, 'Anup Pokharel', 'anup1', 'anup.pokharel30@gmail.com', 'e6e6249a9d25e5917fb924679cf53369', 9841852133, 1, 'Male', 'Hattidada', '62848e7f5893a_-1_orig (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`user_id`),
  ADD UNIQUE KEY `featured_product_id` (`featured_product_id`,`user_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_featured_products`
--
ALTER TABLE `tbl_featured_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_featured_products`
--
ALTER TABLE `tbl_featured_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_featured_products`
--
ALTER TABLE `tbl_featured_products`
  ADD CONSTRAINT `tbl_featured_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
