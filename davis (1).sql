-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `davis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `updated_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_time`, `updated_time`) VALUES
(1, 'Aditya', 'davis2316672@gmail.com', 'davisweety', '2025-01-09 23:57:23', '2025-01-10 01:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `updated_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image`, `created_time`, `updated_time`) VALUES
(1, 'Sport England', '1736026137506brand-6.png', '2024-12-29 18:09:22', '2025-01-05 02:59:11'),
(2, 'QUINTILES', '1736026037461brand-1.png', '2025-01-05 02:57:17', '2025-01-05 02:57:17'),
(3, 'IndiaCapital', '1736026059165brand-2.png', '2025-01-05 02:57:39', '2025-01-05 02:57:39'),
(4, 'Paperlinx', '1736026076488brand-3.png', '2025-01-05 02:57:56', '2025-01-05 02:57:56'),
(5, 'Erlang', '1736026090822brand-5.png', '2025-01-05 02:58:10', '2025-01-05 02:58:10'),
(6, 'InfraRed', '173602617810brand-4.png', '2025-01-05 02:59:38', '2025-01-05 02:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	1 for in cart and 2 for in order	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(32, 0, 22, 5, 1, '2025-01-20 20:04:02', '2025-01-28 14:19:17'),
(33, 7, 23, 1, 2, '2025-01-20 20:05:33', '2025-01-20 20:18:51'),
(34, 7, 24, 2, 2, '2025-01-20 20:05:37', '2025-01-22 15:58:31'),
(35, 7, 21, 1, 2, '2025-01-20 20:05:46', '2025-01-20 20:18:51'),
(36, 7, 8, 2, 2, '2025-01-20 20:18:18', '2025-01-21 04:49:40'),
(37, 7, 10, 1, 2, '2025-01-21 04:50:33', '2025-01-21 06:33:25'),
(38, 7, 7, 1, 2, '2025-01-21 04:54:31', '2025-01-21 06:33:25'),
(39, 7, 7, 1, 2, '2025-01-21 06:46:37', '2025-01-21 06:47:03'),
(40, 7, 7, 1, 2, '2025-01-21 07:27:59', '2025-01-21 07:28:17'),
(41, 7, 7, 1, 2, '2025-01-21 15:00:56', '2025-01-21 15:01:16'),
(42, 7, 8, 1, 2, '2025-01-21 15:03:46', '2025-01-21 15:04:08'),
(43, 7, 7, 8, 2, '2025-01-21 15:25:15', '2025-01-21 15:26:02'),
(44, 0, 24, 2, 1, '2025-01-22 15:57:54', '2025-01-22 15:58:31'),
(45, 7, 23, 2, 2, '2025-01-22 15:58:39', '2025-01-22 16:04:40'),
(46, 7, 7, 2, 1, '2025-01-24 08:41:06', '2025-01-28 14:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_time` datetime DEFAULT current_timestamp(),
  `updated_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `image_name`, `status`, `created_time`, `updated_time`) VALUES
(2, 'Females Collections', '1736328496195female collection.png', 1, '2025-01-05 02:42:06', '2025-01-08 14:01:00'),
(3, 'Mens Collection ', '1736330193436category-4.jpg', 1, '2025-01-05 02:42:21', '2025-01-08 15:01:00'),
(4, 'Kids Collection ', '1736332103313Kids-collection.png', 1, '2025-01-05 02:42:43', '2025-01-08 15:01:00'),
(5, 'Couple Collection ', '1736332143487couple collections.png', 1, '2025-01-08 15:56:55', '2025-01-08 15:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `subject`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Aditya Vishvakarma', 'Application for php devloper role ', 'adityav2316672@gmail.com', 'Dear Mr. John Doe, I hope this email finds you well. I am writing to express my interest in the PHP Developer position at Tech Solutions Ltd., as advertised on LinkedIn. With a strong foundation in PHP development and experience in building dynamic, user-friendly web applications, I am confident that my skills align with the requirements of this role. Here are some key qualifications and highlights of my experience: Proficiency in PHP, MySQL, JavaScript, HTML, and CSS. Hands-on experience with popular PHP frameworks like Laravel, CodeIgniter, and Symfony. Strong understanding of object-oriented programming (OOP) and MVC architecture. Experience in designing, developing, and maintaining databases, including writing complex queries. Familiarity with version control systems like Git. Ability to work in a collaborative, fast-paced environment and meet project deadlines. I am eager to bring my technical skills and passion for web development to your team. I would welcome the opportunity to further discuss how my experience and skills can contribute to the success of Tech Solutions Ltd.. Please find my resume attached for your consideration. I look forward to the possibility of discussing my application further. Thank you for considering my application.', '2025-01-29 12:46:04', '2025-01-29 12:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `shipping_charg` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('placed','shipped','delivered','canceled') NOT NULL COMMENT '1 for palce rode',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `sub_total`, `shipping_charg`, `payment_method`, `total`, `status`, `created_at`, `update_at`) VALUES
(1, 7, 1599, 50, 'cash_on_delevery', 1649, 'placed', '2025-01-20 18:28:38', '2025-01-20 18:28:38'),
(2, 7, 37987, 50, 'cash_on_delevery', 38037, 'placed', '2025-01-20 20:18:51', '2025-01-20 20:18:51'),
(3, 7, 8165, 50, 'cash_on_delevery', 8215, 'placed', '2025-01-21 06:33:25', '2025-01-21 06:33:25'),
(4, 7, 6599, 50, 'cash_on_delevery', 6649, 'placed', '2025-01-21 06:47:03', '2025-01-21 06:47:03'),
(10, 7, 6599, 50, 'cash_on_delevery', 6649, 'placed', '2025-01-21 07:28:17', '2025-01-21 07:28:17'),
(11, 7, 6599, 50, 'cash_on_delevery', 6649, 'placed', '2025-01-21 07:29:24', '2025-01-21 07:29:24'),
(12, 7, 6599, 50, 'cash_on_delevery', 6649, 'placed', '2025-01-21 07:29:48', '2025-01-21 07:29:48'),
(13, 7, 6599, 50, 'cash_on_delevery', 6649, 'placed', '2025-01-21 15:01:16', '2025-01-21 15:01:16'),
(14, 7, 6599, 50, 'cash_on_delevery', 6649, 'placed', '2025-01-21 15:04:08', '2025-01-21 15:04:08'),
(15, 7, 52792, 50, 'cash_on_delevery', 52842, 'placed', '2025-01-21 15:26:02', '2025-01-21 15:26:02'),
(16, 7, 1600, 50, 'cash_on_delevery', 1650, 'placed', '2025-01-22 16:04:40', '2025-01-22 16:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(11) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `name`, `user_id`, `email`, `mobile`, `address`, `city`, `state`, `pin_code`, `country`, `order_id`, `order_date`) VALUES
(1, '', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', '', '', '222144', '', 1, '2025-01-20 18:28:38'),
(2, '', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', '', '', '222144', '', 2, '2025-01-20 20:18:51'),
(3, '', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', '', '', '222144', '', 3, '2025-01-21 06:33:26'),
(4, '', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', '', '', '222144', '', 4, '2025-01-21 06:47:03'),
(5, 'Aditya Vishvakarma', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', 'jaunpur', 'jaunpur', '222144', 'india', 14, '2025-01-21 15:04:08'),
(6, 'Aditya Vishvakarma', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', 'jaunpur', 'up', '222144', 'india', 15, '2025-01-21 15:26:02'),
(7, 'Aditya Vishvakarma', 7, 'adityav2316672@gmail.com', '9517485106', 'jaunpur', 'jaunpur', 'jaunpur', '222144', 'india', 16, '2025-01-22 16:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `selling_price`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 1, 1599, '2025-01-20 18:28:38', '2025-01-20 18:28:38'),
(2, 2, 8, 1, 6599, '2025-01-20 20:18:51', '2025-01-20 20:18:51'),
(3, 2, 21, 1, 25589, '2025-01-20 20:18:51', '2025-01-20 20:18:51'),
(4, 2, 24, 1, 4999, '2025-01-20 20:18:51', '2025-01-20 20:18:51'),
(5, 2, 23, 1, 800, '2025-01-20 20:18:51', '2025-01-20 20:18:51'),
(6, 3, 7, 1, 6599, '2025-01-21 06:33:25', '2025-01-21 06:33:25'),
(7, 3, 10, 1, 1566, '2025-01-21 06:33:25', '2025-01-21 06:33:25'),
(8, 4, 7, 1, 6599, '2025-01-21 06:47:03', '2025-01-21 06:47:03'),
(9, 10, 7, 1, 6599, '2025-01-21 07:28:17', '2025-01-21 07:28:17'),
(10, 13, 7, 1, 6599, '2025-01-21 15:01:16', '2025-01-21 15:01:16'),
(11, 14, 8, 1, 6599, '2025-01-21 15:04:08', '2025-01-21 15:04:08'),
(12, 15, 7, 8, 6599, '2025-01-21 15:26:02', '2025-01-21 15:26:02'),
(13, 16, 23, 2, 800, '2025-01-22 16:04:40', '2025-01-22 16:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `selling_price` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `discount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `sub_category_id`, `brand_id`, `product_img`, `description`, `selling_price`, `mrp`, `discount`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Female', 2, 3, 3, '1736154414244product-1.png', '                                        for hot girls lestest item                                     ', 6599, 7999, 17.5, 13, 1, '2025-01-06 09:06:54', '2025-01-21 15:26:02'),
(8, 'For Princess', 2, 3, 3, '17361545451product-2.png', '                                        white out fit look wow                                     ', 6599, 6999, 5.72, 13, 1, '2025-01-06 09:09:05', '2025-01-21 15:04:08'),
(9, 'fomal  maN', 3, 3, 4, '1736154629519product-3.png', '                                        Forlmal  daress for men                                    ', 4500, 5999, 24.99, 327, 1, '2025-01-06 09:10:29', '2025-01-20 18:23:32'),
(10, 'Couple', 5, 3, 2, '1736154744709product-4.png', '                                        for copule combo                                     ', 1566, 11999, 86.95, 14, 1, '2025-01-06 09:12:24', '2025-01-21 06:33:25'),
(11, 'Jacket for Girls', 2, 3, 6, '1736155048266product-5.png', '                                        Beaty for  black                                     ', 1599, 1788, 10.57, 23, 1, '2025-01-06 09:17:28', '2025-01-20 18:28:38'),
(12, 'black party  darss ', 2, 3, 5, '1736272516500product-6.png', '                            only for girls                        ', 5858, 8587, 31.78, 547, 1, '2025-01-07 17:55:16', '2025-01-08 10:32:23'),
(13, 'Jogers', 3, 3, 5, '1736332538586product-9.png', 'Men for toor ', 499, 655, 23.82, 25, 1, '2025-01-08 10:35:38', '2025-01-08 10:35:38'),
(14, 'Goa ', 2, 2, 5, '1736334664502gils2.jpg', '                                        sea in goa                                     ', 650, 699, 7.01, 25, 1, '2025-01-08 10:37:00', '2025-01-08 11:11:04'),
(15, 'Daily outfit', 2, 3, 2, '1736332734782product-8.png', 'daily out fit', 959, 999, 4, 25, 1, '2025-01-08 10:38:54', '2025-01-08 10:38:54'),
(16, 'girls a', 2, 3, 3, '1736334543458girlis1.jpg', '                                        for girl                                    ', 1999, 2555, 21.76, 25, 1, '2025-01-08 11:06:46', '2025-01-08 11:09:03'),
(17, 'Couple outfit', 5, 3, 1, '1736335190330coluple1.jpg', '                                        marrise couple dress', 999, 8888, 88.76, 88, 1, '2025-01-08 11:19:50', '2025-01-08 11:20:27'),
(18, 'couple party daress', 5, 3, 1, '1736335330266colupl 3.jpg', 'Black out fit couples ', 14000, 15000, 6.67, 255, 1, '2025-01-08 11:22:10', '2025-01-08 11:22:10'),
(19, 'daly wear ', 5, 3, 4, '1736335409380couple 3.jpg', 'new couple darss', 18333, 19000, 3.51, 58, 1, '2025-01-08 11:23:29', '2025-01-08 11:23:29'),
(20, 'persinal outfil', 5, 3, 4, '1736335487129couple2.jpg', 'for romantic moment out fit ', 1499, 1555, 3.6, 585, 2, '2025-01-08 11:24:47', '2025-01-08 11:24:47'),
(21, 'Angesnment outfit', 5, 3, 3, '1736335633541couple4.jpg', 'sapacile out fit couple', 25589, 26999, 5.22, 257, 1, '2025-01-08 11:27:13', '2025-01-20 20:18:51'),
(22, 'Huddi', 3, 3, 3, '1736336235966men1.jpg', '                                        huddi for mens                                    ', 499, 599, 16.69, 58, 1, '2025-01-08 11:37:15', '2025-01-08 11:38:00'),
(23, 'men', 3, 3, 4, '1736336426397men2.jpg', '                                        for boys                                    ', 800, 900, 11.11, 21, 1, '2025-01-08 11:40:26', '2025-01-22 16:04:40'),
(24, 'Jacket for Boys', 3, 2, 3, '1736336642528men3.jpg', 'for men', 4999, 5255, 4.87, 27, 2, '2025-01-08 11:44:02', '2025-01-20 20:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `reviewer_name` varchar(100) NOT NULL,
  `review_text` text NOT NULL,
  `rating` tinyint(4) NOT NULL CHECK (`rating` between 1 and 5),
  `review_date` date NOT NULL,
  `review_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `updated_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_name`, `created_time`, `updated_time`) VALUES
(2, '1736024983235slider-2.jpg', '2025-01-05 02:39:43', '2025-01-05 02:39:43'),
(3, '1736024994304slider-3.jpg', '2025-01-05 02:39:54', '2025-01-05 02:39:54'),
(4, '1736277025963slider1.png', '2025-01-08 00:40:25', '2025-01-08 00:40:25'),
(5, '1736277030441slider2.png', '2025-01-08 00:40:30', '2025-01-08 00:40:30'),
(6, '1736277035179slider3.png', '2025-01-08 00:40:35', '2025-01-08 00:40:35'),
(7, '173627704057slider4.png', '2025-01-08 00:40:40', '2025-01-08 00:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_time` datetime DEFAULT current_timestamp(),
  `updated_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `sub_name`, `category_id`, `sub_image`, `status`, `created_time`, `updated_time`) VALUES
(2, 'Pizza', 4, '31735193008Screenshot (43).png', 1, '2024-12-26 11:33:28', '2024-12-26 11:33:28'),
(3, 'electric', 1, '2381735475575c2.jpg', 1, '2024-12-29 18:02:55', '2024-12-29 18:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(245) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `updated_time` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `address`, `password`, `created_time`, `updated_time`) VALUES
(7, 'Aditya', 'Vishvakarma', 'adityav2316672@gmail.com', 9517485106, 'jaunpur', 'davisweety', '2025-01-11 13:40:37', '2025-01-13 05:05:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
