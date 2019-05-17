-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 03:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krishna1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `about` varchar(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `contact_no`, `email`, `address`, `gstin`, `about`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Customer', '565786', '6565@asrdtfr', 'trfttrdgfdgfg', '12', 'fgtftrft', 1, NULL, '2019-04-23 05:35:50', '2019-04-23 05:36:13', NULL),
(2, 'Customer1', '123456789', 'gfdf@rtf', 'tftgfdtrrtytttftyft', '11', 'tyfthfhgfthft', 1, NULL, '2019-04-23 05:37:14', '2019-04-23 05:37:14', NULL),
(3, 'Customer2', '454566', '5ttrt@rdtrdtr', 'dfgcggftrftyrftftfgd', '18', 'erdgfdgtfgfgh', 1, NULL, '2019-04-23 05:37:40', '2019-04-23 05:37:48', '2019-04-23 05:37:48'),
(4, 'aaaaaaaa', '34567', 'rerr@esef', 'werrdfdf', '12', 'eresrfsf', 1, NULL, '2019-04-25 11:44:49', '2019-04-30 09:45:57', NULL),
(5, 'Ashutosh Kumar Choubey', '9658476170', 'ashutoshkumarchoubey@gmail.com', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', '35ddf', 'dfg', 1, NULL, '2019-04-30 08:19:29', '2019-04-30 08:19:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(11) NOT NULL,
  `distributor_name` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `status` int(155) NOT NULL DEFAULT '1',
  `user_id` int(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `distributor_name`, `contact_no`, `email`, `gstin`, `address`, `about`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fgd', '4335', 'ashutoshkumarchoubey@gmail.com', '456fghfgh', 'ashutoshkumarchoubey@gmail,com, plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ghgfh', 1, NULL, '2019-04-19 05:43:05', NULL, NULL),
(2, 'dfg', '5345345', 'dfgdf@ddfg.ry', 're345', 'rerer@dfh.egre', 'fg', 1, 1, '2019-04-19 05:44:10', '2019-04-19 05:44:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(100) DEFAULT NULL,
  `emp_contact_no` varchar(100) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `emp_mail` varchar(100) DEFAULT NULL,
  `user_id` int(155) NOT NULL,
  `department` varchar(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `emp_contact_no`, `emp_address`, `designation`, `emp_mail`, `user_id`, `department`, `created_at`, `deleted_at`, `updated_at`) VALUES
(2, 'Ashutosh Kumar Choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com, plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'sdfsdf', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 08:29:04', '0000-00-00 00:00:00', '2019-05-01 08:29:04'),
(3, 'Ashutosh Kumar Choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com, plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'sdfsdf', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 08:29:24', '0000-00-00 00:00:00', '2019-05-01 08:29:24'),
(4, 'Ashutosh Kumar Choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com, plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'sdfsdf', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 08:29:50', '0000-00-00 00:00:00', '2019-05-01 08:29:50'),
(5, 'Ashutosh Kumar Choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com, plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'dfgd', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 09:32:52', NULL, '2019-05-01 09:32:52'),
(6, 'erfvfdr Choubey', '9658476170', 'as', 'sdf', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 09:36:30', NULL, '2019-05-01 09:36:30'),
(7, 'erfvfdr Choubey', '9658476170', 'as', 'sdf', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 09:38:58', NULL, '2019-05-01 09:38:58'),
(8, 'aaaa', '9658476170', 'bbb', 'dddd', 'ccccashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-01 09:39:44', NULL, '2019-05-01 09:40:54'),
(9, 'Ashutosh Kumar Choubey111', '9658476170', 'ashutoshkumarchoubey@gmail,com, plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'fdsfdf', 'ashutoshkumarchoubey@gmail.com', 1, NULL, '2019-05-14 13:21:15', NULL, '2019-05-14 13:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `item_catagories`
--

CREATE TABLE `item_catagories` (
  `id` int(11) NOT NULL,
  `user_id` int(155) NOT NULL,
  `item_category_name` varchar(100) DEFAULT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `status` int(155) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_catagories`
--

INSERT INTO `item_catagories` (`id`, `user_id`, `item_category_name`, `item_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, 'demo0', 'bbb0', 1, '2019-04-18 18:51:23', '2019-04-18 19:37:13', '2019-04-18 19:37:13'),
(12, 1, 'demo2', '34535', 1, '2019-04-18 19:36:09', '2019-04-18 19:36:09', NULL),
(13, 1, 'demo3', 'dfdf', 1, '2019-04-18 19:37:29', '2019-04-18 19:37:29', NULL),
(14, 1, 'demo 4', '444', 1, '2019-04-19 06:50:34', '2019-04-19 06:50:51', NULL),
(15, 1, 'demo5', 'esefsfd', 1, '2019-04-22 08:04:10', '2019-04-22 08:04:10', NULL),
(16, 1, 'aaaa', 'jfjhj', 1, '2019-04-25 13:30:57', '2019-04-25 13:30:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_names`
--

CREATE TABLE `item_names` (
  `id` int(11) NOT NULL,
  `item_catagories_id` varchar(100) DEFAULT NULL,
  `item_cat_name` varchar(155) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `hsn_code` varchar(100) DEFAULT NULL,
  `specification` varchar(100) DEFAULT NULL,
  `item_cgst` int(11) NOT NULL DEFAULT '0',
  `item_sgst` int(11) NOT NULL DEFAULT '0',
  `item_igst` int(11) NOT NULL DEFAULT '0',
  `item_gst` int(11) NOT NULL DEFAULT '0',
  `details` varchar(500) DEFAULT NULL,
  `stock_in` varchar(100) DEFAULT '0',
  `stock_out` varchar(100) NOT NULL DEFAULT '0',
  `available_stock` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_names`
--

INSERT INTO `item_names` (`id`, `item_catagories_id`, `item_cat_name`, `item_name`, `hsn_code`, `specification`, `item_cgst`, `item_sgst`, `item_igst`, `item_gst`, `details`, `stock_in`, `stock_out`, `available_stock`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, '12', 'demo2', 'sdf', 'sdf', 'xdf', 2, 3, 5, 10, 'dg', '61', '0', '61', 1, '2019-04-19 13:03:53', '2019-05-14 10:37:33', NULL),
(13, '13', 'demo3', 'ghyttyrt', '453', 'sdfsdf', 5, 5, 0, 10, 'dfgbvn', '22', '0', '22', 1, '2019-04-19 13:04:15', '2019-04-19 19:35:45', NULL),
(14, '15', 'demo5', 'aaaaaajhfhn', '121', 'essfdfdfdfd', 0, 0, 0, 0, 'wesfdf', '0', '0', '0', 1, '2019-04-22 08:04:35', '2019-04-25 13:32:33', NULL),
(15, '13', 'demo3', 'tyfyhghghgh', '3445', 'errerdrdrd', 0, 0, 0, 0, 'rertrtrtrtr', '0', '0', '0', 1, '2019-04-22 10:38:20', '2019-04-22 10:38:20', NULL),
(16, '16', 'aaaa', 'hjfjhy', '67FSF', 'jfjr', 3, 9, 3, 15, 'gjut', '54', '0', '54', 1, '2019-04-25 13:31:53', '2019-05-14 10:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measurement_datas`
--

CREATE TABLE `measurement_datas` (
  `id` int(155) NOT NULL,
  `measurement_id` int(155) DEFAULT NULL,
  `drawing` varchar(155) DEFAULT NULL,
  `window_des` varchar(155) DEFAULT NULL,
  `width` varchar(155) DEFAULT NULL,
  `height` varchar(155) DEFAULT NULL,
  `area` varchar(155) DEFAULT NULL,
  `quantity` double(155,2) DEFAULT NULL,
  `glass` varchar(155) DEFAULT NULL,
  `drawing_description` text,
  `user_id` int(155) DEFAULT NULL,
  `status` varchar(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_datas`
--

INSERT INTO `measurement_datas` (`id`, `measurement_id`, `drawing`, `window_des`, `width`, `height`, `area`, `quantity`, `glass`, `drawing_description`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 3, 'K345', 'Choubey', '345', '4353', '435', 2.00, '6', '6', 1, '1', '2019-05-02 06:02:06', '2019-05-02 06:02:06', NULL),
(8, 3, 'nhyt', 'rrt', '4', '345', '345', 345.00, 'dfggf', 'dfgdfg', 1, '1', '2019-05-02 06:02:06', '2019-05-02 06:02:06', NULL),
(9, 3, 'xdty', 'mkoiu', '3', '34', '34', 43.00, 'frettttttttttttttttttttttttdsfdsf', 'ttttttsdfdsf', 1, '1', '2019-05-02 06:02:06', '2019-05-02 06:02:06', NULL),
(10, 4, 'K345', 'Choubey', '345', '4353', '435', 2.00, '6', '6', 1, '1', '2019-05-02 06:11:41', '2019-05-02 06:11:41', NULL),
(11, 4, 'nhyt', 'rrt', '4', '345', '345', 345.00, 'dfggf', 'dfgdfg', 1, '1', '2019-05-02 06:11:41', '2019-05-02 06:11:41', NULL),
(12, 4, 'xdty', 'mkoiu', '3', '34', '34', 43.00, 'frettttttttttttttttttttttttdsfdsf', 'ttttttsdfdsf', 1, '1', '2019-05-02 06:11:41', '2019-05-02 06:11:41', NULL),
(13, 5, 'K345', 'Choubey', '345', '4353', '435', 2.00, '6', '6', 1, '1', '2019-05-02 06:20:21', '2019-05-02 06:20:21', NULL),
(14, 5, 'nhyt', 'rrt', '4', '345', '345', 345.00, 'dfggf', 'dfgdfg', 1, '1', '2019-05-02 06:20:21', '2019-05-02 06:20:21', NULL),
(15, 5, 'xdty', 'mkoiu', '3', '34', '34', 43.00, 'frettttttttttttttttttttttttdsfdsf', 'ttttttsdfdsf', 1, '1', '2019-05-02 06:20:21', '2019-05-02 06:20:21', NULL),
(16, 6, 'K', 'Choubey', '45', '45', '345', 435.00, 'dfg', 'dfg', 1, '1', '2019-05-14 10:33:21', '2019-05-14 10:33:21', NULL),
(17, 6, 'fg', 'dfgdfg', '5', '5', '45345', 435.00, 'ty', 'rey', 1, '1', '2019-05-14 10:33:21', '2019-05-14 10:33:21', NULL),
(18, 7, 'sdfsdf', 'dffdff', '10', '20', '200', 5.00, 'dsdfsf', 'sdf', 1, '1', '2019-05-14 13:00:04', '2019-05-14 13:00:04', NULL),
(19, 7, 'gggg', 'fffff', '5', '2', '10', 10.00, 'fas', 'fasdasd', 1, '1', '2019-05-14 13:00:05', '2019-05-14 13:00:05', NULL),
(20, 7, 'tttt', 'hhhh', '4', '6', '18', 45.00, 'dfdsf', 'sdfsdf', 1, '1', '2019-05-14 13:00:05', '2019-05-14 13:00:05', NULL),
(21, 7, 'rassere', 'wewersds', '434', '345', '34534534', 0.00, 'sdfdsf', 'dsfdsfd', 1, '1', '2019-05-14 13:00:05', '2019-05-14 13:00:05', NULL),
(22, 7, 'rytyxXz', 'asdsrer', '34', '345', '5345', 0.00, 'sdfdsfdsfdsfsdf', 'sd', 1, '1', '2019-05-14 13:00:05', '2019-05-14 13:00:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measurement_quatations`
--

CREATE TABLE `measurement_quatations` (
  `id` int(155) NOT NULL,
  `customer_name` varchar(155) DEFAULT NULL,
  `contact_no` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `contact_person` varchar(155) DEFAULT NULL,
  `about` varchar(155) DEFAULT NULL,
  `measurement_onfirmed_by` varchar(155) DEFAULT NULL,
  `measurement_taken_by` varchar(155) DEFAULT NULL,
  `measurement_received_for_production` varchar(155) DEFAULT NULL,
  `measurement_amount` varchar(155) DEFAULT NULL,
  `name_of_qua_for_measu` varchar(155) DEFAULT NULL,
  `user_id` int(155) DEFAULT NULL,
  `status` varchar(155) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_quatations`
--

INSERT INTO `measurement_quatations` (`id`, `customer_name`, `contact_no`, `email`, `contact_person`, `about`, `measurement_onfirmed_by`, `measurement_taken_by`, `measurement_received_for_production`, `measurement_amount`, `name_of_qua_for_measu`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '2', '9658476170', 'ashutoshkumarchoubey@gmail.com', 'Ashutosh Kumar Choubey', 'dfgdfg', 'dfg', 'dfg', 'dfgd', '34', 'Ashutosh', NULL, '', '2019-05-02 06:02:06', '2019-05-02 06:02:06', NULL),
(4, '2', '9658476170', 'ashutoshkumarchoubey@gmail.com', 'Ashutosh Kumar Choubey', 'dfgdfg', 'dfg', 'dfg', 'dfgd', '34', 'Ashutosh', NULL, '', '2019-05-02 06:11:41', '2019-05-02 06:11:41', NULL),
(5, '2', '9658476170', 'ashutoshkumarchoubey@gmail.com', 'Ashutosh Kumar Choubey', 'dfgdfg', 'dfg', 'dfg', 'dfgd', '34', 'Ashutosh', NULL, '', '2019-05-02 06:20:21', '2019-05-02 06:20:21', NULL),
(6, '4', '9658476170', 'ashutoshkumarchoubey@gmail.com', 'Ashutosh Kumar Choubey', 'dfgf', 'dfgfd', 'dfg', 'dfg', '45', 'Ashutosh', NULL, '', '2019-05-14 10:33:21', '2019-05-14 10:33:21', NULL),
(7, '5', '9658476170', 'ashutoshkumarchoubey@gmail.com', 'Ashutosh Kumar Choubey', NULL, 'subrat mallic', 'mukesh ambani', 'komal kahan', '20102', 'table', NULL, '', '2019-05-14 13:00:04', '2019-05-14 13:00:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` varchar(100) DEFAULT NULL,
  `purchase_invoice_id` varchar(100) DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_contact_no` varchar(100) DEFAULT NULL,
  `supplier_email` varchar(100) DEFAULT NULL,
  `supplier_address` varchar(100) DEFAULT NULL,
  `purchase_invoice_no` varchar(100) DEFAULT NULL,
  `purchase_invoice_date` date DEFAULT NULL,
  `purchase_invoice_amount` varchar(100) DEFAULT NULL,
  `purchase_discription` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL COMMENT '1=>By Cash,2=>By Internate Banking,3=>By Cheque	',
  `item_name` varchar(100) DEFAULT NULL,
  `item_catagory` varchar(100) DEFAULT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `gst` double(155,2) NOT NULL DEFAULT '0.00',
  `quantity` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `total_tax` double(155,2) NOT NULL DEFAULT '0.00',
  `total_amount` double(155,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `purchase_invoice_id`, `supplier_name`, `supplier_contact_no`, `supplier_email`, `supplier_address`, `purchase_invoice_no`, `purchase_invoice_date`, `purchase_invoice_amount`, `purchase_discription`, `payment_type`, `item_name`, `item_catagory`, `hsn`, `gst`, `quantity`, `price`, `total_tax`, `total_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, '2', '14', 'fff', '345345345', 'gdfgdf@ffdgh.fgd', 'dfgdf', '11111', '2019-04-18', '20', 'dfgdf', '2', '12', '12', 'sdf', 10.00, '5', '10', 5.00, 55.00, '2019-04-19 19:35:45', '2019-04-19 19:35:45', NULL),
(14, '2', '14', 'fff', '345345345', 'gdfgdf@ffdgh.fgd', 'dfgdf', '11111', '2019-04-18', '20', 'dfgdf', '2', '13', '13', '453', 10.00, '10', '5', 5.00, 55.00, '2019-04-19 19:35:45', '2019-04-19 19:35:45', NULL),
(15, '1', '15', 'sfs', '3453453453', 'sdfs@fh.dg', 'dgfg', '1323423', '2019-04-22', '100', 'redrgfdfdfx', '1', '12', '12', 'sdf', 10.00, '1', '150', 15.00, 165.00, '2019-04-22 08:03:00', '2019-04-22 08:03:00', NULL),
(16, '3', '16', 'nnnnn', '674764', 'jgyf@yjt.gur', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', '34535', '2019-04-23', '2000', 'dfgfd', '2', '16', '16', '67FSF', 15.00, '20', '100', 300.00, 2300.00, '2019-04-25 13:36:16', '2019-04-25 13:36:16', NULL),
(17, '2', '17', 'fff', '345345345', 'gdfgdf@ffdgh.fgd', 'dfgdf', '334', '1970-01-01', '34', 'dfdfg', '1', '12', '12', 'sdf', 10.00, '45', '345', 1552.50, 17077.50, '2019-05-14 10:37:32', '2019-05-14 10:37:32', NULL),
(18, '2', '17', 'fff', '345345345', 'gdfgdf@ffdgh.fgd', 'dfgdf', '334', '1970-01-01', '34', 'dfdfg', '1', '16', '16', '67FSF', 15.00, '34', '35', 178.50, 1368.50, '2019-05-14 10:37:33', '2019-05-14 10:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `id` int(11) NOT NULL,
  `supplier_id` varchar(100) DEFAULT NULL,
  `supplier_name` varchar(155) DEFAULT NULL,
  `purchase_invoice_number` varchar(100) DEFAULT NULL,
  `supplier_contact_no` varchar(155) DEFAULT NULL,
  `supplier_address` varchar(155) DEFAULT NULL,
  `supplier_email` varchar(155) DEFAULT NULL,
  `purchase_invoice_date` varchar(100) DEFAULT NULL,
  `purchase_invoice_amount` varchar(100) DEFAULT NULL,
  `gstin` varchar(155) NOT NULL,
  `purchase_discription` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `total_purchase_amount` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`id`, `supplier_id`, `supplier_name`, `purchase_invoice_number`, `supplier_contact_no`, `supplier_address`, `supplier_email`, `purchase_invoice_date`, `purchase_invoice_amount`, `gstin`, `purchase_discription`, `payment_type`, `total_purchase_amount`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, '2', 'fff', '11111', '345345345', 'dfgdf', 'gdfgdf@ffdgh.fgd', '2019-04-18 00:00:00', '20', 'FFDS345', 'dfgdf', '2', '110', 1, NULL, '2019-04-19 19:35:45', '2019-04-19 19:35:45', NULL),
(15, '1', 'sfs', '1323423', '3453453453', 'dgfg', 'sdfs@fh.dg', '2019-04-22 00:00:00', '100', '12', 'redrgfdfdfx', '1', '165', 1, NULL, '2019-04-22 08:03:00', '2019-04-22 08:03:00', NULL),
(16, '3', 'nnnnn', '34535', '674764', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'jgyf@yjt.gur', '2019-04-23 00:00:00', '2000', '3534', 'dfgfd', '2', '2300', 1, NULL, '2019-04-25 13:36:16', '2019-04-25 13:36:16', NULL),
(17, '2', 'fff', '334', '345345345', 'dfgdf', 'gdfgdf@ffdgh.fgd', '1970-01-01 05:30:00', '34', '2e23432', 'dfdfg', '1', '18446', 1, NULL, '2019-05-14 10:37:31', '2019-05-14 10:37:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` int(11) NOT NULL,
  `retailer_name` varchar(100) DEFAULT NULL,
  `retailer_contact_no` varchar(100) DEFAULT NULL,
  `retailer_email` varchar(100) DEFAULT NULL,
  `retailer_address` varchar(100) DEFAULT NULL,
  `retailer_gstin` varchar(100) DEFAULT NULL,
  `retailer_about` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `retailer_name`, `retailer_contact_no`, `retailer_email`, `retailer_address`, `retailer_gstin`, `retailer_about`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dfgdfg', '45645645', 'dfhgf@g.dfg', '435fdg', 'gdfg', 'dfgdf', 1, NULL, '2019-04-19 05:54:41', NULL, NULL),
(2, 'dfgdfg', '45645645', 'dfhgf@g.dfg', '435fdg', 'gdfg', 'dfgdf', 1, NULL, '2019-04-19 05:54:41', '2019-04-19 05:58:34', '2019-04-19 05:58:34'),
(3, 'aaa', '111111111111', 'ddddddddd', 'bbbbbbbb', 'cccccc', 'eeee', 1, 1, '2019-04-19 05:58:00', '2019-04-19 05:58:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `sale_invoice_id` int(100) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_contact_no` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `sale_invoice_no` varchar(100) DEFAULT NULL,
  `sale_invoice_date` varchar(6) DEFAULT NULL,
  `sale_invoice_amount` varchar(100) DEFAULT NULL,
  `sale_description` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_catagory` varchar(100) DEFAULT NULL,
  `gst` varchar(100) DEFAULT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `quality` varchar(100) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `total_tax` varchar(100) DEFAULT NULL,
  `total_amount` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_contact_no` varchar(100) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `sale_invoice_no` varchar(100) DEFAULT NULL,
  `sale_invoice_date` varchar(100) DEFAULT NULL,
  `sale_invoice_amount` varchar(100) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `sale_description` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `total_sale_amount` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_invoices`
--

INSERT INTO `sale_invoices` (`id`, `customer_id`, `customer_name`, `customer_contact_no`, `customer_address`, `customer_email`, `sale_invoice_no`, `sale_invoice_date`, `sale_invoice_amount`, `gstin`, `sale_description`, `payment_type`, `total_sale_amount`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', NULL, '+919658476170', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ashutoshkumarchoubey@gmail.com', NULL, '1970-01-01 05:30:00', NULL, NULL, 'dfg', '1', NULL, NULL, NULL, '2019-05-14 10:31:58', '2019-05-14 10:31:58', NULL),
(2, '2', NULL, '9658476170', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ashutoshkumarchoubey@gmail.com', NULL, '1970-01-01 05:30:00', NULL, NULL, 'dfgdfg', '1', NULL, NULL, NULL, '2019-05-14 13:27:34', '2019-05-14 13:27:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `user_id` int(55) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `contact_no`, `email`, `address`, `gstin`, `about`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sfs', '3453453453', 'sdfs@fh.dg', 'dgfg', 'DG%', 'fghf', NULL, 1, '2019-04-19 05:37:54', NULL, NULL),
(2, 'fff', '345345345', 'gdfgdf@ffdgh.fgd', 'dfgdf', '56fdh', 'dfgd', 1, 1, '2019-04-19 05:38:23', '2019-04-19 05:38:23', NULL),
(3, 'nnnnn', '674764', 'jgyf@yjt.gur', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', '3453', 'efe', 1, 1, '2019-04-25 13:33:28', '2019-04-25 13:33:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashutosh Kumar Choubey', 'admin@admin.com', NULL, '$2y$10$NiiE56HeoFfvpel6t9m2kOLNQKj1W6Gz7Tut0HMH1jDOTnXiGDv3S', NULL, '2019-04-17 23:54:47', '2019-04-17 23:54:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_catagories`
--
ALTER TABLE `item_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_names`
--
ALTER TABLE `item_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement_datas`
--
ALTER TABLE `measurement_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement_quatations`
--
ALTER TABLE `measurement_quatations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item_catagories`
--
ALTER TABLE `item_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `item_names`
--
ALTER TABLE `item_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `measurement_datas`
--
ALTER TABLE `measurement_datas`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `measurement_quatations`
--
ALTER TABLE `measurement_quatations`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
