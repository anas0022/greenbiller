-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 21, 2024 at 04:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `opening_balance` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `store_id` varchar(255) NOT NULL,
  `delete_bit` varchar(255) NOT NULL DEFAULT '1',
  `sort_code` varchar(255) DEFAULT NULL,
  `count_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `parent_id`, `account_number`, `opening_balance`, `note`, `status`, `created_at`, `updated_at`, `account_name`, `created_by`, `type`, `store_id`, `delete_bit`, `sort_code`, `count_id`) VALUES
(3, 'main account', 'AC-1-0002 45221200', '456', 'this is a accounts', 'active', '2024-10-20 09:25:45', '2024-10-27 05:25:23', 'Anas', '2', '', '3', '0', '', '1'),
(5, '0', 'AC-10-0001', '0', 'Default note or description', 'active', '2024-10-27 13:08:33', '2024-10-27 13:08:33', 'Main Account', '1', 'system', '10', '0', NULL, '1'),
(6, '0', 'AC-11-0001', '0', 'Default note or description', 'active', '2024-10-27 13:11:05', '2024-10-27 13:11:05', 'Main Account', '1', 'system', '11', '0', NULL, '1'),
(7, '0', 'AC-12-0001', '0', 'Default note or description', 'active', '2024-10-27 13:24:09', '2024-10-27 13:24:09', 'Main Account', '1', 'system', '12', '0', NULL, '1'),
(8, '0', 'AC-6-0001', '0', 'Default note or description', 'active', '2024-10-28 16:12:59', '2024-10-28 16:12:59', 'Main Account', '1', 'system', '6', '0', NULL, '1'),
(9, '0', 'AC-1-0001', '0', 'Default note or description', 'active', '2024-10-28 16:57:06', '2024-10-28 16:57:06', 'Main Account', '1', 'system', '1', '0', NULL, '1'),
(10, '0', 'AC-2-0001', '0', 'Default note or description', 'active', '2024-10-28 16:58:25', '2024-10-28 16:58:25', 'Main Account', '1', 'system', '2', '0', NULL, '1'),
(11, '0', 'AC-3-0001', '0', 'Default note or description', 'active', '2024-10-28 16:59:33', '2024-10-28 16:59:33', 'Main Account', '1', 'system', '3', '0', NULL, '1'),
(12, '0', 'AC-4-0001', '0', 'Default note or description', 'active', '2024-10-28 17:00:14', '2024-10-28 17:00:14', 'Main Account', '1', 'system', '4', '0', NULL, '1'),
(13, '0', 'AC-5-0001', '0', 'Default note or description', 'active', '2024-10-28 17:00:55', '2024-10-28 17:00:55', 'Main Account', '1', 'system', '5', '0', NULL, '1'),
(14, '0', 'AC-6-0001', '0', 'Default note or description', 'active', '2024-11-10 02:07:49', '2024-11-10 02:07:49', 'Main Account', '1', 'system', '6', '0', NULL, '1'),
(15, '0', 'AC-7-0001', '0', 'Default note or description', 'active', '2024-11-10 02:20:43', '2024-11-10 02:20:43', 'Main Account', '1', 'system', '7', '0', NULL, '1'),
(16, '0', 'AC-17-0001', '0', 'Default note or description', 'active', '2024-11-10 02:35:45', '2024-11-10 02:35:45', 'Main Account', '1', 'system', '17', '0', NULL, '1'),
(17, '0', 'AC-18-0001', '0', 'Default note or description', 'active', '2024-11-10 02:36:28', '2024-11-10 02:36:28', 'Main Account', '1', 'system', '18', '0', NULL, '1'),
(18, '0', 'AC-19-0001', '0', 'Default note or description', 'active', '2024-11-10 02:38:52', '2024-11-10 02:38:52', 'Main Account', '1', 'system', '19', '0', NULL, '1'),
(19, '0', 'AC-20-0001', '0', 'Default note or description', 'active', '2024-11-10 02:39:39', '2024-11-10 02:39:39', 'Main Account', '1', 'system', '20', '0', NULL, '1'),
(20, '0', 'AC-21-0001', '0', 'Default note or description', 'active', '2024-11-10 02:47:15', '2024-11-10 02:47:15', 'Main Account', '1', 'system', '21', '0', NULL, '1'),
(21, '0', 'AC-22-0001', '0', 'Default note or description', 'active', '2024-11-10 02:47:43', '2024-11-10 02:47:43', 'Main Account', '1', 'system', '22', '0', NULL, '1'),
(22, '0', 'AC-23-0001', '0', 'Default note or description', 'active', '2024-11-10 02:48:08', '2024-11-10 02:48:08', 'Main Account', '1', 'system', '23', '0', NULL, '1'),
(23, '0', 'AC-24-0001', '0', 'Default note or description', 'active', '2024-11-10 02:48:18', '2024-11-10 02:48:18', 'Main Account', '1', 'system', '24', '0', NULL, '1'),
(24, '0', 'AC-25-0001', '0', 'Default note or description', 'active', '2024-11-10 02:51:43', '2024-11-10 02:51:43', 'Main Account', '1', 'system', '25', '0', NULL, '1'),
(25, '0', 'AC-26-0001', '0', 'Default note or description', 'active', '2024-11-10 02:52:42', '2024-11-10 02:52:42', 'Main Account', '1', 'system', '26', '0', NULL, '1'),
(26, '0', 'AC-27-0001', '0', 'Default note or description', 'active', '2024-11-10 03:29:19', '2024-11-10 03:29:19', 'Main Account', '1', 'system', '27', '0', NULL, '1'),
(27, '0', 'AC-28-0001', '0', 'Default note or description', 'active', '2024-11-10 03:30:08', '2024-11-10 03:30:08', 'Main Account', '1', 'system', '28', '0', NULL, '1'),
(28, '0', 'AC-29-0001', '0', 'Default note or description', 'active', '2024-11-10 03:30:55', '2024-11-10 03:30:55', 'Main Account', '1', 'system', '29', '0', NULL, '1'),
(29, '0', 'AC-30-0001', '0', 'Default note or description', 'active', '2024-11-10 03:32:08', '2024-11-10 03:32:08', 'Main Account', '1', 'system', '30', '0', NULL, '1'),
(30, '0', 'AC-31-0001', '0', 'Default note or description', 'active', '2024-11-10 03:33:39', '2024-11-10 03:33:39', 'Main Account', '1', 'system', '31', '0', NULL, '1'),
(31, '0', 'AC-32-0001', '0', 'Default note or description', 'active', '2024-11-10 03:35:05', '2024-11-10 03:35:05', 'Main Account', '1', 'system', '32', '0', NULL, '1'),
(32, '0', 'AC-33-0001', '0', 'Default note or description', 'active', '2024-11-10 03:36:51', '2024-11-10 03:36:51', 'Main Account', '1', 'system', '33', '0', NULL, '1'),
(33, '0', 'AC-34-0001', '0', 'Default note or description', 'active', '2024-11-10 03:38:33', '2024-11-10 03:38:33', 'Main Account', '1', 'system', '34', '0', NULL, '1'),
(34, '0', 'AC-35-0001', '0', 'Default note or description', 'active', '2024-12-02 22:19:07', '2024-12-02 22:19:07', 'Main Account', '1', 'system', '35', '0', NULL, '1'),
(35, '0', 'AC-36-0001', '0', 'Default note or description', 'active', '2024-12-02 22:20:42', '2024-12-02 22:20:42', 'Main Account', '1', 'system', '36', '0', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ac_accounts`
--

CREATE TABLE `ac_accounts` (
  `id` int(5) NOT NULL,
  `count_id` int(5) DEFAULT NULL,
  `store_id` int(5) DEFAULT NULL,
  `parent_id` int(5) DEFAULT NULL,
  `sort_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `account_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `account_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `balance` double(20,4) DEFAULT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `delete_bit` int(1) DEFAULT 0,
  `account_selection_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `paymenttypes_id` int(1) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `expense_id` int(5) DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_accounts`
--

INSERT INTO `ac_accounts` (`id`, `count_id`, `store_id`, `parent_id`, `sort_code`, `account_name`, `account_code`, `balance`, `note`, `status`, `delete_bit`, `account_selection_name`, `paymenttypes_id`, `customer_id`, `supplier_id`, `expense_id`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 1, 1, 0, NULL, 'Main account', 'AC-1-0001', 0.0000, '', 1, 0, NULL, NULL, NULL, NULL, NULL, '2', '2023-11-25 23:15:41', '2023-11-25 23:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `ac_moneydeposits`
--

CREATE TABLE `ac_moneydeposits` (
  `id` int(5) NOT NULL,
  `store_id` int(5) DEFAULT NULL,
  `deposit_date` date DEFAULT NULL,
  `reference_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `debit_account_id` int(11) DEFAULT NULL,
  `credit_account_id` int(11) DEFAULT NULL,
  `amount` double(20,4) DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_moneytransfer`
--

CREATE TABLE `ac_moneytransfer` (
  `id` int(5) NOT NULL,
  `store_id` int(5) DEFAULT NULL,
  `count_id` int(10) DEFAULT NULL,
  `transfer_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `reference_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `debit_account_id` int(11) DEFAULT NULL,
  `credit_account_id` int(11) DEFAULT NULL,
  `amount` double(20,4) DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_transactions`
--

CREATE TABLE `ac_transactions` (
  `id` int(5) NOT NULL,
  `store_id` int(5) DEFAULT NULL,
  `payment_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `transaction_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `debit_account_id` int(5) DEFAULT NULL,
  `credit_account_id` int(5) DEFAULT NULL,
  `debit_amt` double(20,4) DEFAULT NULL,
  `credit_amt` double(20,4) DEFAULT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ref_accounts_id` int(5) DEFAULT NULL COMMENT 'reference table',
  `ref_moneytransfer_id` int(5) DEFAULT NULL COMMENT 'reference table',
  `ref_moneydeposits_id` int(5) DEFAULT NULL COMMENT 'reference table',
  `ref_salespayments_id` int(5) DEFAULT NULL,
  `ref_salespaymentsreturn_id` int(5) DEFAULT NULL,
  `ref_purchasepayments_id` int(5) DEFAULT NULL,
  `ref_purchasepaymentsreturn_id` int(5) DEFAULT NULL,
  `ref_expense_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `short_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_by` int(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_transactions`
--

INSERT INTO `ac_transactions` (`id`, `store_id`, `payment_code`, `transaction_date`, `transaction_type`, `debit_account_id`, `credit_account_id`, `debit_amt`, `credit_amt`, `note`, `ref_accounts_id`, `ref_moneytransfer_id`, `ref_moneydeposits_id`, `ref_salespayments_id`, `ref_salespaymentsreturn_id`, `ref_purchasepayments_id`, `ref_purchasepaymentsreturn_id`, `ref_expense_id`, `customer_id`, `supplier_id`, `short_code`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 1, 'PP-1-0001', '2024-02-20', 'PURCHASE PAYMENT', 1, NULL, 3150.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 2, '2024-02-20 13:42:15', '2024-02-20 13:42:15'),
(2, 1, 'PP-1-0002', '2024-02-20', 'PURCHASE PAYMENT', 1, NULL, 8000.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 2, NULL, 2, '2024-02-20 13:43:00', '2024-02-20 13:43:00'),
(3, 1, 'EXP-1-0002', '2024-03-19', 'EXPENSE PAYMENT', 1, NULL, 400.0000, NULL, 'sfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 2, '2024-03-19 16:10:38', '2024-03-19 16:35:30'),
(4, 1, 'PP-1-0003', '2024-03-19', 'PURCHASE PAYMENT', 1, NULL, 100.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, 2, '2024-03-19 21:41:32', '2024-03-19 21:41:32'),
(6, 1, 'PRP-1-0001', '2024-03-21', 'PURCHASE PAYMENT RETURN', 1, NULL, 8000.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2, NULL, 2, '2024-03-21 18:11:36', '2024-03-21 18:11:36'),
(7, 1, 'PRP-1-0001', '2024-03-21', 'PURCHASE PAYMENT RETURN', 1, NULL, 8000.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2, NULL, 2, '2024-03-21 18:13:34', '2024-03-21 18:13:34'),
(8, 1, 'PRP-1-0001', '2024-03-21', 'PURCHASE PAYMENT RETURN', 1, NULL, 8000.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2, NULL, 2, '2024-03-21 18:14:53', '2024-03-21 18:14:53'),
(9, 1, 'PP-1-0003', '2024-03-21', 'PURCHASE PAYMENT', 1, NULL, 1575.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 1, NULL, 2, '2024-03-21 18:48:01', '2024-03-21 18:48:01'),
(10, 1, 'PP-1-0004', '2024-03-21', 'PURCHASE PAYMENT', 1, NULL, 1575.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 1, NULL, 2, '2024-03-21 18:57:00', '2024-03-21 18:57:00'),
(11, 1, 'PRP-1-0002', '2024-03-21', 'PURCHASE PAYMENT RETURN', 1, NULL, 1575.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, '2024-03-21 19:21:36', '2024-03-21 19:21:36'),
(12, 1, 'PRP-1-0003', '2024-03-21', 'PURCHASE PAYMENT RETURN', 1, NULL, 105.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 2, NULL, 2, '2024-03-21 19:29:07', '2024-03-21 19:29:07'),
(13, 1, 'PRP-1-0004', '2024-03-21', 'PURCHASE PAYMENT RETURN', 1, NULL, 628.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, '2024-03-21 19:31:35', '2024-03-21 19:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `adjust`
--

CREATE TABLE `adjust` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `quantity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quantity`)),
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `transfer_from` varchar(255) DEFAULT NULL,
  `transfer_to` varchar(255) DEFAULT NULL,
  `transfer_date` varchar(255) DEFAULT NULL,
  `transfer_status` varchar(255) NOT NULL DEFAULT 'none_tranfered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adjust`
--

INSERT INTO `adjust` (`id`, `warehouse`, `date`, `reference_no`, `total`, `note`, `created_at`, `updated_at`, `name`, `quantity`, `email`, `mobile`, `transfer_from`, `transfer_to`, `transfer_date`, `transfer_status`) VALUES
(2, 'anas00455', '2024-10-09', '12345', '100', '456445', '2024-10-16 05:55:04', '2024-10-16 05:55:04', '\"Item\"', '\"4\"', '', '', NULL, NULL, NULL, 'none_tranfered'),
(3, 'anas00455', '2024-10-15', '12345', '20', '4563', '2024-10-16 05:55:54', '2024-10-16 05:55:54', '\"Item\"', '\"4\"', '', '', NULL, NULL, NULL, 'none_tranfered'),
(4, 'anas00455', '2024-10-10', '12345', '10', 'uhjkhj', '2024-10-16 06:00:57', '2024-10-16 06:00:57', '\"Item\"', '\"4\"', '', '', NULL, NULL, NULL, 'none_tranfered'),
(5, 'anas00455', '2024-10-11', '12345', '45', 'jghghj', '2024-10-16 06:06:42', '2024-10-16 06:06:42', '[\"Item\",\"Item\",\"null\"]', '[null,null,null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(6, 'anas00455', '2024-10-17', '12345', '45', 'dfsdf', '2024-10-16 06:08:49', '2024-10-16 06:08:49', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(7, 'kariyakkad', '2024-10-16', '12345', '2', 'this a adjust', '2024-10-16 07:20:47', '2024-10-16 07:20:47', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(8, 'anas00455', '2024-10-16', '12345', '2', 'fbfghbfghf', '2024-10-16 07:22:00', '2024-10-16 07:22:00', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(9, 'anas00455', '2024-10-10', '12345', '3', 'this is not', '2024-10-16 08:01:39', '2024-10-16 08:01:39', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(10, 'anas00455', '2024-10-25', '12345AZ9063829', '3', 'fhdbfndsbf', '2024-10-16 08:02:38', '2024-10-16 08:02:38', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(11, 'anas00455', '2024-10-18', '12345.0AZ9063829', '3', 'jugjghj', '2024-10-16 08:08:15', '2024-10-16 08:08:15', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(12, 'anas00455', '2024-10-18', '12345', '3', 'rdsefsdf', '2024-10-16 08:11:29', '2024-10-16 08:11:29', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(13, 'anas00455', '2024-10-18', '12345', '3', 'rdsefsdf', '2024-10-16 08:12:39', '2024-10-16 08:12:39', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(14, 'anas00455', '2024-10-18', '12345', '2', 'gfdg', '2024-10-16 08:12:54', '2024-10-16 08:12:54', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(15, 'anas00455', '2024-10-10', '12345AZ9063829', '3', 'fhfhfh', '2024-10-16 08:14:03', '2024-10-16 08:14:03', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(16, 'anas00455', '2024-10-10', '12345AZ9063829', '3', 'fhfhfh', '2024-10-16 08:15:01', '2024-10-16 08:15:01', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(17, 'anas00455', '2024-10-03', '12345AZ9063829', '3', 'thfghg', '2024-10-16 08:15:59', '2024-10-16 08:15:59', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(18, 'anas00455', '2024-10-18', '12345AZ9063829', '2', 'bvbvb', '2024-10-16 08:17:19', '2024-10-16 08:17:19', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(19, 'anas00455', '2024-10-11', '12345', '2', 'fdfgdfg', '2024-10-16 08:19:15', '2024-10-16 08:19:15', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(20, 'anas00455', '2024-10-24', '12345', '2', 'gdfgf', '2024-10-16 08:29:27', '2024-10-16 08:29:27', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(21, 'anas00455', '2024-10-04', '12345AZ9063829', '2', 'rfdsfdf', '2024-10-16 08:31:39', '2024-10-16 08:31:39', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(22, 'kariyakkad', '2024-10-10', '12345', '2', 'asxdsad', '2024-10-16 08:32:30', '2024-10-16 08:32:30', '[\"Item\",\"Item\"]', '[\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(23, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:40:26', '2024-10-16 22:40:26', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(24, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:41:35', '2024-10-16 22:41:35', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(25, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:43:10', '2024-10-16 22:43:10', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(26, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:43:42', '2024-10-16 22:43:42', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(27, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:44:01', '2024-10-16 22:44:01', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(28, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:44:11', '2024-10-16 22:44:11', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(29, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:44:30', '2024-10-16 22:44:30', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(30, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:47:31', '2024-10-16 22:47:31', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(31, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:48:05', '2024-10-16 22:48:05', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(32, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:48:13', '2024-10-16 22:48:13', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(33, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:48:54', '2024-10-16 22:48:54', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(34, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:49:14', '2024-10-16 22:49:14', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(35, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:49:54', '2024-10-16 22:49:54', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(36, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:51:23', '2024-10-16 22:51:23', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(37, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:52:31', '2024-10-16 22:52:31', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(38, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:52:39', '2024-10-16 22:52:39', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(39, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:52:48', '2024-10-16 22:52:48', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(40, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:53:06', '2024-10-16 22:53:06', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(41, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:53:51', '2024-10-16 22:53:51', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(42, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:54:04', '2024-10-16 22:54:04', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(43, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:54:14', '2024-10-16 22:54:14', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(44, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:54:25', '2024-10-16 22:54:25', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(45, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:54:33', '2024-10-16 22:54:33', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(46, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:56:11', '2024-10-16 22:56:11', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(47, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:56:53', '2024-10-16 22:56:53', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(48, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:57:02', '2024-10-16 22:57:02', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(49, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:57:19', '2024-10-16 22:57:19', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(50, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:57:38', '2024-10-16 22:57:38', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(51, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:58:18', '2024-10-16 22:58:18', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(52, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:58:28', '2024-10-16 22:58:28', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(53, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:58:57', '2024-10-16 22:58:57', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(54, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 22:59:28', '2024-10-16 22:59:28', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(55, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:01:14', '2024-10-16 23:01:14', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(56, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:01:41', '2024-10-16 23:01:41', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(57, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:01:57', '2024-10-16 23:01:57', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(58, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:02:50', '2024-10-16 23:02:50', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(59, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:03:01', '2024-10-16 23:03:01', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(60, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:03:12', '2024-10-16 23:03:12', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(61, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:03:24', '2024-10-16 23:03:24', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(62, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:03:36', '2024-10-16 23:03:36', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(63, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:04:50', '2024-10-16 23:04:50', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(64, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:05:24', '2024-10-16 23:05:24', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(65, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:05:53', '2024-10-16 23:05:53', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(66, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:06:05', '2024-10-16 23:06:05', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(67, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:06:30', '2024-10-16 23:06:30', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(68, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:07:13', '2024-10-16 23:07:13', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(69, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:08:29', '2024-10-16 23:08:29', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(70, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:08:43', '2024-10-16 23:08:43', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(71, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:09:04', '2024-10-16 23:09:04', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(72, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:09:12', '2024-10-16 23:09:12', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(73, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:09:21', '2024-10-16 23:09:21', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(74, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:09:33', '2024-10-16 23:09:33', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(75, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:10:11', '2024-10-16 23:10:11', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(76, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:10:21', '2024-10-16 23:10:21', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(77, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:10:34', '2024-10-16 23:10:34', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(78, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:10:43', '2024-10-16 23:10:43', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(79, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:12:08', '2024-10-16 23:12:08', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(80, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:12:26', '2024-10-16 23:12:26', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(81, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:12:38', '2024-10-16 23:12:38', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(82, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:12:59', '2024-10-16 23:12:59', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(83, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:13:53', '2024-10-16 23:13:53', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(84, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:14:24', '2024-10-16 23:14:24', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(85, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:14:36', '2024-10-16 23:14:36', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(86, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:14:54', '2024-10-16 23:14:54', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(87, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:15:06', '2024-10-16 23:15:06', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(88, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:15:25', '2024-10-16 23:15:25', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(89, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:15:44', '2024-10-16 23:15:44', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(90, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:15:58', '2024-10-16 23:15:58', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(91, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:16:48', '2024-10-16 23:16:48', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(92, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:18:20', '2024-10-16 23:18:20', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(93, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:18:52', '2024-10-16 23:18:52', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(94, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:19:22', '2024-10-16 23:19:22', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(95, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:19:30', '2024-10-16 23:19:30', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(96, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:20:51', '2024-10-16 23:20:51', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(97, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:22:09', '2024-10-16 23:22:09', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(98, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:22:19', '2024-10-16 23:22:19', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(99, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:22:42', '2024-10-16 23:22:42', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(100, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:22:52', '2024-10-16 23:22:52', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(101, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:23:17', '2024-10-16 23:23:17', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(102, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:24:22', '2024-10-16 23:24:22', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(103, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:24:37', '2024-10-16 23:24:37', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(104, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:24:59', '2024-10-16 23:24:59', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(105, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:25:09', '2024-10-16 23:25:09', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(106, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:25:47', '2024-10-16 23:25:47', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(107, 'anas00455', '2024-10-24', '12345', '6', 'this is a perfect items', '2024-10-16 23:26:33', '2024-10-16 23:26:33', '[\"Item\",\"Item\",\"Itemmmmms\",\"Itemmmmms\",\"Item\",\"Item\"]', '[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"]', '', '', NULL, NULL, NULL, 'none_tranfered'),
(108, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:43:29', '2024-10-16 23:43:29', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(109, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:44:57', '2024-10-16 23:44:57', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(110, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:49:15', '2024-10-16 23:49:15', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(111, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:49:27', '2024-10-16 23:49:27', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(112, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:49:36', '2024-10-16 23:49:36', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(113, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:49:48', '2024-10-16 23:49:48', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(114, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:49:56', '2024-10-16 23:49:56', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(115, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:50:33', '2024-10-16 23:50:33', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(116, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:50:56', '2024-10-16 23:50:56', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(117, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:51:39', '2024-10-16 23:51:39', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(118, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:52:03', '2024-10-16 23:52:03', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(119, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:52:15', '2024-10-16 23:52:15', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(120, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:52:45', '2024-10-16 23:52:45', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(121, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:53:06', '2024-10-16 23:53:06', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(122, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:53:23', '2024-10-16 23:53:23', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(123, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:54:00', '2024-10-16 23:54:00', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(124, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:54:22', '2024-10-16 23:54:22', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(125, 'kariyakkad', '2024-10-10', '12345300614831', '4', 'jhbjhbhj', '2024-10-16 23:54:53', '2024-10-16 23:54:53', '[\"Item\",\"Item\",\"null\",\"Itemmmmms\"]', '[\"4\",\"4\",null,\"4\"]', 'extramindtech@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(126, 'anas00455', '2024-10-11', '12345', '3', 'jhfhgcgcgc', '2024-10-17 00:09:08', '2024-10-17 00:09:08', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', 'anasfamilyman@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered'),
(127, 'anas00455', '2024-10-11', '12345', '3', 'jhfhgcgcgc', '2024-10-17 00:10:12', '2024-10-17 00:10:12', '[\"Item\",\"Item\",\"null\"]', '[\"4\",\"4\",null]', 'anasfamilyman@gmail.com', '08547554648', NULL, NULL, NULL, 'none_tranfered');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notification_type` int(11) NOT NULL COMMENT '1-order\r\n2-delivered order\r\n3-payout request from store\r\n4-payout request from delivery boy',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance`
--

CREATE TABLE `advance` (
  `date` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `employ_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `store_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance`
--

INSERT INTO `advance` (`date`, `name`, `amount`, `type`, `note`, `id`, `employ_id`, `created_at`, `updated_at`, `status`, `store_id`) VALUES
('2024-12-01', NULL, '454540', 'cash', 'fsdfsdf', 6, '8', '2024-12-01 01:13:32', '2024-12-01 01:13:32', 'active', '5'),
('2024-12-01', NULL, '554', 'cash', 'dfgdfg', 7, '10', '2024-12-01 01:14:25', '2024-12-01 01:14:25', 'active', '5'),
('2024-12-01', NULL, '200', 'cash', 'dfsdf', 8, '8', '2024-12-01 01:15:48', '2024-12-01 01:15:48', 'active', '5');

-- --------------------------------------------------------

--
-- Table structure for table `app_banner`
--
-- Error reading structure for table cargroup.app_banner: #1932 - Table 'cargroup.app_banner' doesn't exist in engine
-- Error reading data for table cargroup.app_banner: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`app_banner`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `app_delivery_time_slote`
--

CREATE TABLE `app_delivery_time_slote` (
  `id` int(11) NOT NULL,
  `store_id` int(250) NOT NULL,
  `slots` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 to disable\r\n1-enable',
  `created_by` int(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_delivery_time_slote`
--

INSERT INTO `app_delivery_time_slote` (`id`, `store_id`, `slots`, `status`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 1, 'Today Morning', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '10am to 12pm', 1, 2, '2024-03-24 21:16:40', '2024-03-24 21:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `app_layout`
--

CREATE TABLE `app_layout` (
  `id` int(11) NOT NULL,
  `store_id` int(150) NOT NULL,
  `block_1_cat` int(150) NOT NULL,
  `block_2_cat` int(150) NOT NULL,
  `block_3_cat` int(150) NOT NULL,
  `block_4_cat` int(150) NOT NULL,
  `block_5_cat` int(150) NOT NULL,
  `block_6_cat` int(150) NOT NULL,
  `created_by` int(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barndname` varchar(255) DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `barndname`, `discription`, `image`, `created_at`, `updated_at`, `status`) VALUES
(28, 'ALLIED WESTLAKEs', 'ALLIED WESTLAKEs', 'brand/FGG3vghdavx8U2f54eLNb9dgf3VsY7GsGdOqQMj4.png', '2024-10-28 16:42:20', '2024-11-30 11:03:43', 'inactive'),
(30, 'Anabond', 'Anabond', 'brand/Ko1KVSUZsKahxcdBTkAPOw1np6O3a4fZQuHqm9ye.png', '2024-10-28 16:43:01', '2024-10-28 16:43:01', 'active'),
(31, 'APR BEARING', 'APR BEARING', 'brand/rDlypvWg2WUxD8sYVQiLOkEWIpDVXReSxDTWAAoD.png', '2024-10-28 16:43:14', '2024-10-28 16:43:14', 'active'),
(32, 'ARALDITE', 'ARALDITE', 'brand/SVzH5zehM36LattPkHB21edWPFndWpiDHmO6PO6A.png', '2024-10-28 16:43:33', '2024-10-28 16:43:33', 'active'),
(33, 'AUTOWIPE', 'AUTOWIPE', 'brand/p5bH85k3ZoyK0bBWnhKNkW4fZyk7V5iKKJwyvcJv.png', '2024-10-28 16:43:49', '2024-10-28 16:43:49', 'active'),
(34, 'AUX Bearing*', 'AUX Bearing*', 'brand/tgYzXZhCBoGswcspIwz4PSxJKxVtLIJ4iXULNkzG.png', '2024-10-28 16:44:08', '2024-10-28 16:44:08', 'active'),
(35, 'Best Lube', 'Best Lube', 'brand/BKM5aI6EWR91Occsus4FZwEuo4pSs8FlRwxWYT4Y.png', '2024-10-28 16:44:27', '2024-10-28 16:44:27', 'active'),
(36, 'Wiper Blade Bosch', 'Wiper Blade Bosch', 'brand/xzMyfEZC5Fpslihs1BeCZs19wnC8SJ3EVEUaBtDH.png', '2024-10-28 16:44:39', '2024-10-28 16:44:39', 'active'),
(37, 'Bosch', 'Bosch', 'brand/ns7rvMZc2MQ4GQYoxSm8ItSlgS1v4cFVv2hUbL1t.png', '2024-10-28 16:44:51', '2024-10-28 16:44:51', 'active'),
(38, 'Break Fluid', 'Break Fluid', 'brand/2EoBNaJiREbBL2QKJ28JW1SACxc75nC7ct9Nzr5e.png', '2024-10-28 16:45:04', '2024-10-28 16:45:04', 'active'),
(39, 'DANILO', 'DANILO', 'brand/B8i0vntR15z3GPRrD2YK3KZsYY2EDdYedtBUgS7F.png', '2024-10-28 16:45:17', '2024-10-28 16:45:17', 'active'),
(40, 'Anabond', 'Anabond', 'brand/oVx7Lm2lWVdSbYwTBrikR1lEbmdEMzIrGAFXsuQU.png', '2024-10-28 16:45:31', '2024-10-28 16:45:31', 'active'),
(41, 'Zoomol', 'Zoomol', 'brand/s7c6jYfswtj2ZWZEK79WCN3ORz3kcrA0io1VKAUK.png', '2024-10-28 16:45:44', '2024-10-28 16:45:44', 'active'),
(42, 'ZAAN JACK', 'ZAAN JACK', 'brand/Hys2dUQvCALdMqvvk0CkmDDpe5bkf3GOyEknIKg2.png', '2024-10-28 16:45:57', '2024-10-28 16:45:57', 'active'),
(43, 'XTRA TIRUPATHI', 'XTRA TIRUPATHI', 'brand/XkAfHWYiK4iVQ8Stzn3jgE9qvPxjmqSxd1k1HODH.png', '2024-10-28 16:46:10', '2024-10-28 16:46:10', 'active'),
(44, 'X-10', 'X-10', 'brand/r2WEN4mZE98S7FBxUN2AAiX4r8GDE4zseuMtfSWU.png', '2024-10-28 16:46:22', '2024-10-28 16:46:22', 'active'),
(45, 'Wiper Blade', 'Wiper Blade', 'brand/FEyGlm4GJj8siQ8DobiaRoFCtDEKsI2roU0dMNPd.png', '2024-10-28 16:46:39', '2024-10-28 16:46:39', 'active'),
(46, 'vonee', 'vonee', 'brand/P7P6yTf6Wx3ktykCCKr4lb7SOVYzCWFOtDPHgmzB.png', '2024-10-28 16:46:54', '2024-10-28 16:46:54', 'active'),
(47, 'VERICOOL', 'VERICOOL', 'brand/nWMtuYIeShhQZTwknHtMIKYaAVVGvHuw5UIXl6rp.png', '2024-10-28 16:47:07', '2024-10-28 16:47:07', 'active'),
(48, 'Valeo Wiper Blade', 'Valeo Wiper Blade', 'brand/45y9nuv2gh2Ty5ffdCFjs727teWEYYzO1EODACyn.png', '2024-10-28 16:47:21', '2024-10-28 16:47:21', 'active'),
(49, 'Valeo Clutch', 'Valeo Clutch', 'brand/RVKgJxUqBsPdKlPROmNxyPTOSFbIGe1Eg9jhHBOq.png', '2024-10-28 16:47:34', '2024-10-28 16:47:34', 'active'),
(50, 'TVS*', 'TVS*', 'brand/twg6xGAIggqC8CAMpiLLhls5wpeHSjcYc5QSvQXW.png', '2024-10-28 16:47:47', '2024-10-28 16:47:47', 'active'),
(51, 'KTEK', 'KTEK', 'brand/i59InvnZl4pE3GJ8siHCTNGvzMIaWPA1SRkTiR4T.png', '2024-10-28 16:48:00', '2024-10-28 16:48:00', 'active'),
(52, 'JCB', 'JCB', 'brand/okVdxQMoK7OBQUW6FzWrwuTKLBOgaOkgGKQdLI5Z.png', '2024-10-28 16:48:12', '2024-10-28 16:48:12', 'active'),
(53, 'Instaklin', 'Instaklin', 'brand/THHFDJIO9eq5za29ELopgcrrK1ZHwCSgBqGrWBHR.png', '2024-10-28 16:48:25', '2024-10-28 16:48:25', 'active'),
(54, 'Ideal', 'Ideal', 'brand/xdyqLf8FjgYDxEoh9DIRnrI0uQ0407BrIG8yI0pZ.png', '2024-10-28 16:48:48', '2024-10-28 16:48:48', 'active'),
(55, 'Grease', 'Grease', 'brand/VMxiWFLdF7mO0l9XfZ6Sifi030X0mXJZKZvXHkZr.png', '2024-10-28 16:49:00', '2024-10-28 16:49:00', 'active'),
(56, 'GOMECHANIC', 'GOMECHANIC', 'brand/PfErXwJ5eJDWqse4UKn2gG86k3P3ExKqCuE961Nb.png', '2024-10-28 16:49:13', '2024-10-28 16:49:13', 'active'),
(57, 'Glass Sealent', 'Glass Sealent', 'brand/9oSXB0Fn5asiEz7j7xBYLOa6nlfm1rMfHL7rAUWI.png', '2024-10-28 16:49:25', '2024-10-28 16:49:25', 'active'),
(58, 'FLEETGUARD', 'FLEETGUARD', 'brand/gxM4gRCFbKwOY2OCQbM05UpJLMMWAHPSkzwjJfDB.png', '2024-10-28 16:49:38', '2024-10-28 16:49:38', 'active'),
(59, 'ELOFIC', 'ELOFIC', 'brand/OVfOEsnIdo7fqXm73hkDQFzTNxnklwLs618Y65S8.png', '2024-10-28 16:49:55', '2024-10-28 16:49:55', 'active'),
(60, 'Dr.cool', 'Dr.cool', 'brand/5hk3ORkO5r2tnc8Cb9RvzJK7vvMaDpXN0PPLlbhc.png', '2024-10-28 16:50:08', '2024-10-28 16:50:08', 'active'),
(61, 'Dignolub', 'Dignolub', 'brand/zIfHIcRABRw0SytqWeHrVLTHEPnseMbw93EzT2vT.png', '2024-10-28 16:50:21', '2024-10-28 16:50:21', 'active'),
(62, 'Desno Spark Plug', 'Desno Spark Plug', 'brand/3YA2QfEXkA30VDEtgqFwK8PyZnwxQ186Zw50McyQ.png', '2024-10-28 16:50:35', '2024-10-28 16:50:35', 'active'),
(63, 'DANILO', 'DANILO', 'brand/h18mewRqs2gZBk7mwYaGqOPUhN5Fm3qMslG2n6Pe.png', '2024-10-28 16:50:49', '2024-10-28 16:50:49', 'active'),
(64, 'Coolent', 'Coolent', 'brand/tqnt55mTyKCZvVfje80GjG7SQsivJdk2q2cFiEwo.png', '2024-10-28 16:51:03', '2024-10-28 16:51:03', 'active'),
(65, 'CHAMPION PLUG', 'CHAMPION PLUG', 'brand/dseCUpxmkjVol58rMxO6dPOdGaXEl1ldVBm47x5I.png', '2024-10-28 16:51:14', '2024-10-28 16:51:14', 'active'),
(66, 'CAMPO GOLD', 'CAMPO GOLD', 'brand/nb6kITFjjNFwZKA7nnok8TghwLAOP1ggN4mlhYCK.png', '2024-10-28 16:51:26', '2024-10-28 16:51:26', 'active'),
(67, 'BULB', 'BULB', 'brand/kpTszqzBqZZ8TPqREuOprDDQA6bakkL906yRYGDU.png', '2024-10-28 16:51:37', '2024-10-28 16:51:37', 'active'),
(68, 'TRW', 'TRW', 'brand/4Qtemkd8hLgc2wapEamSNN67QNDEklRwzacTmBST.png', '2024-10-28 16:52:31', '2024-10-28 16:52:31', 'active'),
(69, 'THARIKA', 'THARIKA', 'brand/X6nywHhc9f1ZWAx6gVM0vw2oy9Arl5dDh0qV8xx5.png', '2024-10-28 16:52:45', '2024-10-28 16:52:45', 'active'),
(70, 'TEXSPIN BEARING', 'TEXSPIN BEARING', 'brand/YCJIIL1McnCeLHkY1SYproQvzw1sIrr9ppnVXHwS.png', '2024-10-28 16:52:58', '2024-10-28 16:52:58', 'active'),
(71, 'Tape', 'Tape', 'brand/T3KpwwALRraN0SlUzMSiPdzKSxJXkoNS36na0DWG.png', '2024-10-28 16:53:14', '2024-10-28 16:53:14', 'active'),
(72, 'Sparco', 'Sparco', 'brand/1dfk8jjqqOfTQKARuR2nDCpzxadRXOaoQWQLZN7z.png', '2024-10-28 16:53:27', '2024-10-28 16:53:27', 'active'),
(73, 'SOFIMA', 'SOFIMA', 'brand/ePSrOXxZhs5KiassWEaexakhsff0uonr3OM7RTw5.png', '2024-10-28 16:53:40', '2024-10-28 16:53:40', 'active'),
(74, 'smith', 'smith', 'brand/wElBhYOPXWXjYdKXN9pYOd94LgNzOBOeNxxCESwd.png', '2024-10-28 16:53:54', '2024-10-28 16:53:54', 'active'),
(75, 'SINTEXX', 'SINTEXX', 'brand/qys4IsPLB1z1xj3k6FkGCAimacZ47nSoh1YF37xn.png', '2024-10-28 16:54:07', '2024-10-28 16:54:07', 'active'),
(76, 'SIKAFLEXX', 'SIKAFLEXX', 'brand/xOguXuXu5pPpthiJAtpMYaQWqmPb1DOAZ9r8fjlL.png', '2024-10-28 16:54:20', '2024-10-28 16:54:20', 'active'),
(77, 'SHEVARON', 'SHEVARON', 'brand/IbjQMNbM41GaQunuDKip7G4r4BDfHc2vP8gVokji.png', '2024-10-28 16:54:33', '2024-10-28 16:54:33', 'active'),
(78, 'ROULUNDS', 'ROULUNDS', 'brand/ZOzac4rpt2LEevhGyQ0u2vTXnlhZ24VQ3Wdr3x3r.png', '2024-10-28 16:54:45', '2024-10-28 16:54:45', 'active'),
(79, 'ROOTS HORN', 'ROOTS HORN', 'brand/VzVDuAMQpAVIuAnMzRaZw0wCjhOm8wSpDi6TIdOh.png', '2024-10-28 16:54:59', '2024-10-28 16:54:59', 'active'),
(80, 'RANE DISC ROTOR', 'RANE DISC ROTOR', 'brand/lohGtEQRvnhZ5Dj0bGK9y7Aj3xP3krvzVIzX99Yj.png', '2024-10-28 16:55:13', '2024-10-28 16:55:13', 'active'),
(81, 'RANE', 'RANE', 'brand/SDQXIeCDmWn5OJCrvc5YKvefzO9h0fo8E5cjAn9P.png', '2024-10-28 16:55:27', '2024-10-28 16:55:27', 'active'),
(82, 'PUROLATOR', 'PUROLATOR', 'brand/J9RJ2QdmlIqMVXtmn54fOF2FlYq5MS1KEevvuReT.png', '2024-10-28 16:55:40', '2024-10-28 16:55:40', 'active'),
(83, 'POTAUTO', 'POTAUTO', 'brand/qQyqfNtCqQ6F4x8itpEbvpt1byrLAg2ZgmGM107o.png', '2024-10-28 16:55:53', '2024-10-28 16:55:53', 'active'),
(84, 'O SRAM BLUB', 'O SRAM BLUB', 'brand/XxP2NKFZAWpCpCHKNMLE64yhOKuO2PDGt9ePwhbz.png', '2024-10-28 16:56:07', '2024-10-28 16:56:07', 'active'),
(85, 'NGK', 'NGK', 'brand/MjMBFiKljuQNXfn1kqyw0jUOYqfgx29CMyTkFRgy.png', '2024-10-28 16:56:20', '2024-10-28 16:56:20', 'active'),
(86, 'NEEJ', 'NEEJ', 'brand/Th8BJMnwESikcAk6dCwMdxgoUXqU4cmWhPtiEbDy.png', '2024-10-28 16:56:36', '2024-10-28 16:56:36', 'active'),
(87, 'MAHLE', 'MAHLE', 'brand/IqqOj5ljaKZaWzzROGrVDW3U1teQyjWboaVPqVOC.png', '2024-10-28 16:56:50', '2024-10-28 16:56:50', 'active'),
(88, 'LUMAX', 'LUMAX', 'brand/yWPbcv8JJ5nOFawRXB1HdgptlApLOmdaQwqUcRMQ.png', '2024-10-28 16:57:01', '2024-10-28 16:57:01', 'active'),
(89, 'REPSOL', 'REPSOL', 'brand/6n7q5MG4EyPtLEIx7oLJp64pN8CjFqlhC3GtqAa9.png', '2024-10-28 16:57:14', '2024-10-28 16:57:14', 'active'),
(90, 'Lohmann', 'Lohmann', 'brand/PNLN6x1sxSRqtSsg6Mux4mjAysVzen56MRP7dehv.png', '2024-10-28 16:57:30', '2024-10-28 16:57:30', 'active'),
(91, 'LOCTITE', 'LOCTITE', 'brand/E6CDES6QvUKkyDVuSoDz4QUj24L4TzxbBpAQjc3V.png', '2024-10-28 16:57:41', '2024-10-28 16:57:41', 'active'),
(92, 'Liners India', 'Liners India', 'brand/kaO8C3HdvN0bTwTp5NIt2ZM7ULChKnJExRnoYkWk.png', '2024-10-28 16:57:54', '2024-10-28 16:57:54', 'active'),
(94, 'category', 'fsdf', 'brand/FIV7VVW4WRxpAMGEIRFiCNJPoo69Df5IguvzoXjj.jpg', '2024-11-29 03:51:54', '2024-11-29 03:56:16', 'active'),
(95, 'ersdf', 'dsfdsf', 'brand/LbGQRU4uwsJ29UqCfZKlBbFrnuWp9sNILVlw0b8G.jpg', '2024-11-30 11:05:38', '2024-11-30 11:05:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `store_id` int(100) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `count_id` int(250) NOT NULL,
  `brand_code` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(1) NOT NULL,
  `inapp_view` int(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `store_id`, `slug`, `count_id`, `brand_code`, `brand_name`, `image`, `description`, `status`, `inapp_view`, `created_on`, `updated_on`) VALUES
(1, 1, '7start-5akhniwqbq7wvrl', 1, 'CT-1-0001', '7start', '', '', 1, 0, '2023-11-25 22:48:07', '2023-11-25 22:48:07'),
(2, 1, 'dr01-ml1qdssi10ne5ea', 2, 'CT-1-0002', 'DR01', 'uploads/brands/1711031345.jpg', '', 1, 0, '2023-11-25 22:48:15', '2024-03-21 19:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `user_id` int(150) NOT NULL,
  `item_id` int(150) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `total_price` decimal(30,2) NOT NULL,
  `if_offer` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `parent`, `discription`, `status`, `created_at`, `updated_at`, `image`) VALUES
(19, 'ALASCA OIL', 'ALASCA OIL', 'ALASCA OIL', 'active', '2024-10-28 15:43:21', '2024-10-28 15:43:21', 'category/DTkBhnxGTuBhqJ91kyHuihwRBoqQhtvnUNGaeNNQ.png'),
(20, 'ALLIED WESTLAKE*', 'ALLIED WESTLAKE*', 'ALLIED WESTLAKE*', 'active', '2024-10-28 15:43:41', '2024-10-28 15:43:41', 'category/2KkiKRgsn3FHX9GCz5rKrrwJGjPR2yvFhUutO7kn.png'),
(21, 'Anabond', 'Anabond', 'Anabond', 'active', '2024-10-28 15:43:54', '2024-10-28 15:43:54', 'category/qzDee2GwLZqELQ3ctsOSscGk2lTaIJ5RQtwlprVd.png'),
(22, 'APR BEARING', 'APR BEARING', 'APR BEARING', 'active', '2024-10-28 15:44:10', '2024-10-28 15:44:10', 'category/A0OZ3v2XzUPvvGKlSJSCC5ibp6NxYZOTfcW32pSc.png'),
(23, 'ARALDITE', 'ARALDITE', 'ARALDITE', 'active', '2024-10-28 15:44:21', '2024-10-28 15:44:21', 'category/HOjJiVWnhk86NIDVIhsny9pYf5X1CzRJdshTDqta.png'),
(24, 'AUTOWIPE', 'AUTOWIPE', 'AUTOWIPE', 'active', '2024-10-28 15:44:32', '2024-10-28 15:44:32', 'category/qu3cnMBwAgxegxzrBLG2FAznpfsaIfiSBO3Xc1F8.png'),
(25, 'AUX Bearing*', 'AUX Bearing*', 'AUX Bearing*', 'active', '2024-10-28 15:44:45', '2024-10-28 15:44:45', 'category/a09vHdHheFuwJdhcJvLAHbnajTZ22FCs3YE40X2l.png'),
(26, 'Best Lube', 'Best Lube', 'Best Lube', 'active', '2024-10-28 15:44:58', '2024-10-28 15:44:58', 'category/TnOuX0pxYktHrBMZMwlBnTgqYMqnD7pKv2e8tc0Q.png'),
(27, 'Wiper Blade Bosch', 'Wiper Blade Bosch', 'Wiper Blade Bosch', 'active', '2024-10-28 15:45:12', '2024-10-28 15:45:12', 'category/6HUCt6kWwnuQNpOSYDAfOgqFIDILNOTeP5HklnZk.png'),
(28, 'Bosch', 'Bosch', 'Bosch', 'active', '2024-10-28 15:45:25', '2024-10-28 15:45:25', 'category/iZQMKUBFmWIP6EeSKwYV8ZEj2lEGUBz0OHrnHBrJ.png'),
(29, 'Break Fluid', 'Break Fluid', 'Break Fluid', 'active', '2024-10-28 15:45:37', '2024-10-28 15:45:37', 'category/p5TZbyt9lTok5liADOt9m2jKoqhzwfEs7UZnMVGT.png'),
(30, 'DANILO', 'DANILO', 'DANILO', 'active', '2024-10-28 15:47:31', '2024-10-28 15:47:31', 'category/eRMbtTTg5SMH3QYQWI040qBs4cheffnsKHDySRc8.png'),
(31, 'Anabond', 'Anabond', 'Anabond', 'active', '2024-10-28 15:48:38', '2024-10-28 15:48:38', 'category/SPNLclK4mf5XTnmmm3rbvN7lSf3n8klKWObghMj8.png'),
(32, 'Zoomol', 'Zoomol', 'zoomol', 'active', '2024-10-28 16:00:07', '2024-10-28 16:00:07', 'category/s22ck3tO5y7CtuQBkeq2bwilVwbbcPHk8ATNvSzn.png'),
(33, 'ZAAN JACK', 'ZAAN JACK', 'ZAAN JACK', 'active', '2024-10-28 16:00:32', '2024-10-28 16:00:32', 'category/v4MbQimgz4T5cZcY3OQQKIhxFsdPXO6EqKMuSJTI.png'),
(34, 'XTRA TIRUPATHI', 'XTRA TIRUPATHI', 'XTRA TIRUPATHI', 'active', '2024-10-28 16:01:07', '2024-10-28 16:01:07', 'category/DkbxXcPIYCAbcAGJkJigfzoL7khiDevsSsudX8Zh.png'),
(35, 'X-10', 'X-10', 'X-10', 'active', '2024-10-28 16:01:31', '2024-10-28 16:01:31', 'category/ivNqHBxjSBy6vKMkuNgJAc3c0dnsP0BgR4ZkGiuh.png'),
(36, 'Wiper Blade', 'Wiper Blade', 'Wiper Blade', 'active', '2024-10-28 16:01:55', '2024-10-28 16:01:55', 'category/IdI3HYhtyazr6xZlNcwMhLpuY5zkCg9uHhk2mu6b.png'),
(37, 'vonee', 'vonee', 'vonee', 'active', '2024-10-28 16:02:32', '2024-10-28 16:02:32', 'category/uWGIcEMlkW9O5QsJZWO5jJaI2PoA7u0AMsY237pl.png'),
(38, 'VERICOOL', 'VERICOOL', 'VERICOOL', 'active', '2024-10-28 16:02:59', '2024-10-28 16:02:59', 'category/LQ4bVm8VZyMZR1ESe4FRDsz9gjlprtyipyPP0bBj.png'),
(39, 'Valeo Wiper Blade', 'Valeo Wiper Blade', 'Valeo Wiper Blade', 'active', '2024-10-28 16:03:32', '2024-10-28 16:03:32', 'category/BWlGNZWbOVBnOwODPQGt3LLesOHuJ46xwfPMByCs.png'),
(40, 'Valeo Clutch', 'Valeo Clutch', 'Valeo Clutch', 'active', '2024-10-28 16:04:06', '2024-10-28 16:04:06', 'category/LklzGTrENkoAgnLrq40BETPtEfNoTqH38o7uV1Ef.png'),
(41, 'TVS*', 'TVS*', 'TVS*', 'active', '2024-10-28 16:04:25', '2024-10-28 16:04:25', 'category/6GN6Qi2CoSRWsZ656Fx760CAdcgNoK4XAjVvTPXE.png'),
(42, 'TRW', 'TRW', 'TRW', 'active', '2024-10-28 16:04:39', '2024-10-28 16:04:39', 'category/M3xmR9cGzIma4nOVXV79WCDi0uVBxZLiEK5h9vQT.png'),
(43, 'THARIKA', 'THARIKA', 'THARIKA', 'active', '2024-10-28 16:05:07', '2024-10-28 16:05:07', 'category/UG33n3kNtOxDeJeVTJ6zEH0aJHbHglFcnQ3jRJ8x.png'),
(44, 'TEXSPIN BEARING', 'TEXSPIN BEARING', 'TEXSPIN BEARING', 'active', '2024-10-28 16:05:42', '2024-10-28 16:05:42', 'category/ZgXRW3U6G3lYWL78OCy7oZW4PJIMzIFGHER0i7Fs.png'),
(45, 'Tape', 'Tape', 'Tape', 'active', '2024-10-28 16:05:56', '2024-10-28 16:05:56', 'category/VmEO7ye53TadMv9xv7AnsjU0sJC8UQGvm2GhcTA1.png'),
(46, 'Sparco', 'Sparco', 'Sparco', 'active', '2024-10-28 16:06:13', '2024-10-28 16:06:13', 'category/kiZhQ2nvsAm1TZPjeimESaKgWMAu7SM2lVPbR07h.png'),
(47, 'SOFIMA', 'SOFIMA', 'SOFIMA', 'active', '2024-10-28 16:06:36', '2024-10-28 16:06:36', 'category/bMcosKa4DD7bH3DzC8HaB0Yv2NFQ1nOEqU19kj2l.png'),
(48, 'smith', 'smith', 'smith', 'active', '2024-10-28 16:07:00', '2024-10-28 16:07:00', 'category/roz2ey1vXH3yrQfMYbnObEMMBfIYWSEqFTCrjWc6.png'),
(49, 'SINTEXX', 'SINTEXX', 'SINTEXX', 'active', '2024-10-28 16:07:36', '2024-10-28 16:07:36', 'category/U5wijuToPs48aHNYIHYpZiOq8t932w36Q95p4q3S.png'),
(50, 'SIKAFLEXX', 'SIKAFLEXX', 'SIKAFLEXX', 'active', '2024-10-28 16:07:59', '2024-10-28 16:07:59', 'category/wPik9g2K30TGel3UuwiYWbnkzORcP6bApbCcJdDE.png'),
(51, 'SHEVARON', 'SHEVARON', 'SHEVARON', 'active', '2024-10-28 16:08:35', '2024-10-28 16:08:35', 'category/NVr7CXVstEv8WZzbSEwhKg8UE65XVU2HNw5VJlKx.png'),
(52, 'ROULUNDS', 'ROULUNDS', 'ROULUNDS', 'active', '2024-10-28 16:10:54', '2024-10-28 16:10:54', 'category/1oRvG5ldo0V7Gce8W9KywNfjnoDcOcJl5cuFEb0W.png'),
(53, 'ROOTS HORN', 'ROOTS HORN', 'ROOTS HORN', 'active', '2024-10-28 16:11:20', '2024-10-28 16:11:20', 'category/7aZbSJVVJHw7UWoTKa5TvhGYa5JPJtb229s0cxwK.png'),
(54, 'RANE DISC ROTOR', 'RANE DISC ROTOR', 'RANE DISC ROTOR', 'active', '2024-10-28 16:11:52', '2024-10-28 16:11:52', 'category/Q3G4QG4Kx4scoi1BKcAnEQGzbrNe8v2c3LUHhJYa.png'),
(55, 'RANE', 'RANE', 'RANE', 'active', '2024-10-28 16:12:11', '2024-10-28 16:12:11', 'category/yprxOJ2z5IFefpMTGNqL8leVu2FTRQTaZeIPxphM.png'),
(56, 'PUROLATOR', 'PUROLATOR', 'PUROLATOR', 'active', '2024-10-28 16:12:33', '2024-10-28 16:12:33', 'category/PR9RgGCZYvRsX45ffZuVSBb3hOMxkDPbegOl5lUc.png'),
(57, 'POTAUTO', 'POTAUTO', 'POTAUTO', 'active', '2024-10-28 16:12:54', '2024-10-28 16:12:54', 'category/mupEU1PecB5vZho1Vd93pjjl5eFzB2r6pNfxSSpF.png'),
(58, 'O SRAM BLUB', 'O SRAM BLUB', 'O SRAM BLUB', 'active', '2024-10-28 16:13:14', '2024-10-28 16:13:14', 'category/F4KAgKSZ90m5RqC7cXyWBcJ736QyauYnDv9Cq3Wj.png'),
(59, 'NGK', 'NGK', 'NGK', 'active', '2024-10-28 16:13:35', '2024-10-28 16:13:35', 'category/iK7W02E9gjy0STVENRZYbxVf434bAEAp9OJeH4TX.png'),
(60, 'NEEJ', 'NEEJ', 'NEEJ', 'active', '2024-10-28 16:14:16', '2024-10-28 16:14:16', 'category/RQB0RLQzmgFKMigLmvb96S7dJrobWDycIe1sxFgM.png'),
(61, 'MAHLE', 'MAHLE', 'MAHLE', 'active', '2024-10-28 16:14:35', '2024-10-28 16:14:35', 'category/gUKB8yYW8X1qA32g9i5mX0mqs3mbxRa0mnJBtmyB.png'),
(62, 'LUMAX', 'LUMAX', 'LUMAX', 'active', '2024-10-28 16:14:50', '2024-10-28 16:14:50', 'category/MLok3fYT22cqSNlCN7Dng3CyPHkLMnRkxoMRWvU2.png'),
(63, 'REPSOL', 'REPSOL', 'REPSOL', 'active', '2024-10-28 16:15:06', '2024-10-28 16:15:06', 'category/7xC49jPsNTCulhMc79fdaC43mvwjh3Zms7MFZrj1.png'),
(64, 'Lohmann', 'Lohmann', 'Lohmann', 'active', '2024-10-28 16:15:30', '2024-10-28 16:15:30', 'category/QMwtZm7pxF22Kli4g4Zp1plBoPKOAvYjszip6a46.png'),
(65, 'LOCTITE', 'LOCTITE', 'LOCTITE', 'active', '2024-10-28 16:15:48', '2024-10-28 16:15:48', 'category/RIaFtQWTH6dIFMihaZDisDjq3c0RloK8G1xzCRO1.png'),
(66, 'Liners India', 'Liners India', 'Liners India', 'active', '2024-10-28 16:16:13', '2024-10-28 16:16:13', 'category/ZM3lRV73mVUMH9YpS2QESw8X0yAVEIhdH7ozwbXm.png'),
(67, 'KTEK', 'KTEK', 'KTEK', 'active', '2024-10-28 16:16:28', '2024-10-28 16:16:28', 'category/YPYjcK0VmZHXkvVZqncvLQy3AyNsvHb7UMnvOqQh.png'),
(68, 'JCB', 'JCB', 'JCB', 'active', '2024-10-28 16:16:47', '2024-10-28 16:16:47', 'category/ioABLscCG07qAM5785nRiczt8V3jW3GqW6ygHtU9.png'),
(69, 'IPOL', 'IPOL', 'IPOL', 'active', '2024-10-28 16:17:08', '2024-10-28 16:17:08', 'category/uNEyXPpYBxu6foJKk1rV1NZEMUYHa049LvCwd4UJ.png'),
(70, 'Instaklin', 'Instaklin', 'Instaklin', 'active', '2024-10-28 16:17:32', '2024-10-28 16:17:32', 'category/jPR0n3YjpvOawsVpZbeU0P68j8OWKAbZu6QY75fY.png'),
(71, 'Ideal', 'Ideal', 'Ideal', 'active', '2024-10-28 16:17:48', '2024-10-28 16:17:48', 'category/2mc1GY4l6gbqZ4eHHLPCYlUuEbnCVtlxBzon07Qg.png'),
(73, 'GOMECHANIC', 'GOMECHANIC', 'GOMECHANIC', 'active', '2024-10-28 16:18:28', '2024-10-28 16:18:28', 'category/ymidGHlMtfZ6KSSFgHspAu7A8Ytdj5A7NJFr5UYs.png'),
(74, 'Glass Sealent', 'Glass Sealent', 'Glass Sealent', 'active', '2024-10-28 16:18:50', '2024-10-28 16:18:50', 'category/dx6Zd16qUYHTTY82LwMzqWaW8kxC2EqEv4E63gQT.png'),
(77, 'Dr.cool', 'Dr.cool', 'Dr.cool', 'active', '2024-10-28 16:20:26', '2024-10-28 16:20:26', 'category/mObq2ihbbflRE4k0nVBCrow4rue39jsj9PdAHnW4.png'),
(78, 'Dignolubs', 'Dignolubs', 'Dignolub', 'active', '2024-10-28 16:21:38', '2024-11-30 10:58:47', 'category/FPI7lMap9Mfa0bgylwtWAKZYefgUWeatVhRwsYY7.png'),
(89, 'sdfsdf', 'sdfsdf', 'fsdfsf', 'active', '2024-11-30 10:59:15', '2024-11-30 10:59:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `closing`
--

CREATE TABLE `closing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prefix` varchar(150) NOT NULL,
  `closing_code` int(200) NOT NULL,
  `date` date NOT NULL,
  `invoice_count` varchar(255) NOT NULL,
  `purchase_count` int(200) NOT NULL,
  `total_sale` varchar(255) NOT NULL,
  `store_id` int(200) NOT NULL,
  `total_purchase` int(200) NOT NULL,
  `total_expense` varchar(255) NOT NULL,
  `closing_amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `opening_balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `closing`
--

INSERT INTO `closing` (`id`, `prefix`, `closing_code`, `date`, `invoice_count`, `purchase_count`, `total_sale`, `store_id`, `total_purchase`, `total_expense`, `closing_amount`, `created_at`, `updated_at`, `opening_balance`) VALUES
(1, 'CS-2024-', 1, '2024-11-29', '5', 2, '20976.85', 5, 12288008, '79243', '-12346274.15', '2024-11-29 12:40:14', '2024-11-29 12:40:14', '0'),
(2, 'CS-2024-', 2, '2024-11-29', '1', 2, '9000', 5, 897, '898', '7205', '2024-11-29 14:09:15', '2024-11-29 14:09:15', '-12346274.15');

-- --------------------------------------------------------

--
-- Table structure for table `country_settings`
--

CREATE TABLE `country_settings` (
  `name` varchar(250) NOT NULL,
  `mobile_code` varchar(250) NOT NULL,
  `currency_code` varchar(250) NOT NULL,
  `currency_symble` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country_settings`
--

INSERT INTO `country_settings` (`name`, `mobile_code`, `currency_code`, `currency_symble`, `status`, `created_at`, `updated_at`, `id`) VALUES
('UAE', '971', 'AED', 'درهم', 'inactive', NULL, '2024-10-25 03:47:14', 2),
('india', '91', 'INR', '$', 'active', '2024-10-24 09:22:44', '2024-10-26 04:01:52', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cronjob_log`
--

CREATE TABLE `cronjob_log` (
  `id` int(11) NOT NULL,
  `day` varchar(110) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `no_request` varchar(250) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `code`, `symbol`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek'),
(2, 'America', 'Dollars', 'USD', '$'),
(3, 'Afghanistan', 'Afghanis', 'AFN', '؋'),
(4, 'Argentina', 'Pesos', 'ARS', '$'),
(5, 'Aruba', 'Guilders', 'AWG', 'Afl'),
(6, 'Australia', 'Dollars', 'AUD', '$'),
(7, 'Azerbaijan', 'New Manats', 'AZN', '₼'),
(8, 'Bahamas', 'Dollars', 'BSD', '$'),
(9, 'Barbados', 'Dollars', 'BBD', '$'),
(10, 'Belarus', 'Rubles', 'BYR', 'p.'),
(11, 'Belgium', 'Euro', 'EUR', '€'),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$'),
(13, 'Bermuda', 'Dollars', 'BMD', '$'),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b'),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM'),
(16, 'Botswana', 'Pula', 'BWP', 'P'),
(17, 'Bulgaria', 'Leva', 'BGN', 'Лв.'),
(18, 'Brazil', 'Reais', 'BRL', 'R$'),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£\r\n'),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$'),
(21, 'Cambodia', 'Riels', 'KHR', '៛'),
(22, 'Canada', 'Dollars', 'CAD', '$'),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$'),
(24, 'Chile', 'Pesos', 'CLP', '$'),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥'),
(26, 'Colombia', 'Pesos', 'COP', '$'),
(27, 'Costa Rica', 'Colón', 'CRC', '₡'),
(28, 'Croatia', 'Kuna', 'HRK', 'kn'),
(29, 'Cuba', 'Pesos', 'CUP', '₱'),
(30, 'Cyprus', 'Euro', 'EUR', '€'),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč'),
(32, 'Denmark', 'Kroner', 'DKK', 'kr'),
(33, 'Dominican Republic', 'Pesos', 'DOP', 'RD$'),
(34, 'East Caribbean', 'Dollars', 'XCD', '$'),
(35, 'Egypt', 'Pounds', 'EGP', '£'),
(36, 'El Salvador', 'Colones', 'SVC', '$'),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£'),
(38, 'Euro', 'Euro', 'EUR', '€'),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£'),
(40, 'Fiji', 'Dollars', 'FJD', '$'),
(41, 'France', 'Euro', 'EUR', '€'),
(42, 'Ghana', 'Cedis', 'GHC', 'GH₵'),
(43, 'Gibraltar', 'Pounds', 'GIP', '£'),
(44, 'Greece', 'Euro', 'EUR', '€'),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q'),
(46, 'Guernsey', 'Pounds', 'GGP', '£'),
(47, 'Guyana', 'Dollars', 'GYD', '$'),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€'),
(49, 'Honduras', 'Lempiras', 'HNL', 'L'),
(50, 'Hong Kong', 'Dollars', 'HKD', '$'),
(51, 'Hungary', 'Forint', 'HUF', 'Ft'),
(52, 'Iceland', 'Kronur', 'ISK', 'kr'),
(53, 'India', 'Rupees', 'INR', '₹'),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp'),
(55, 'Iran', 'Rials', 'IRR', '﷼'),
(56, 'Ireland', 'Euro', 'EUR', '€'),
(57, 'Isle of Man', 'Pounds', 'IMP', '£'),
(58, 'Israel', 'New Shekels', 'ILS', '₪'),
(59, 'Italy', 'Euro', 'EUR', '€'),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$'),
(61, 'Japan', 'Yen', 'JPY', '¥'),
(62, 'Jersey', 'Pounds', 'JEP', '£'),
(63, 'Kazakhstan', 'Tenge', 'KZT', '₸'),
(64, 'Korea (North)', 'Won', 'KPW', '₩'),
(65, 'Korea (South)', 'Won', 'KRW', '₩'),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'Лв'),
(67, 'Laos', 'Kips', 'LAK', '	₭'),
(68, 'Latvia', 'Lati', 'LVL', 'Ls'),
(69, 'Lebanon', 'Pounds', 'LBP', '£'),
(70, 'Liberia', 'Dollars', 'LRD', '$'),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF'),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt'),
(73, 'Luxembourg', 'Euro', 'EUR', '€'),
(74, 'Macedonia', 'Denars', 'MKD', 'Ден\r\n'),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM'),
(76, 'Malta', 'Euro', 'EUR', '€'),
(77, 'Mauritius', 'Rupees', 'MUR', '₹'),
(78, 'Mexico', 'Pesos', 'MXN', '$'),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮'),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT'),
(81, 'Namibia', 'Dollars', 'NAD', '$'),
(82, 'Nepal', 'Rupees', 'NPR', '₹'),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ'),
(84, 'Netherlands', 'Euro', 'EUR', '€'),
(85, 'New Zealand', 'Dollars', 'NZD', '$'),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$'),
(87, 'Nigeria', 'Nairas', 'NGN', '₦'),
(88, 'North Korea', 'Won', 'KPW', '₩'),
(89, 'Norway', 'Krone', 'NOK', 'kr'),
(90, 'Oman', 'Rials', 'OMR', '﷼'),
(91, 'Pakistan', 'Rupees', 'PKR', '₹'),
(92, 'Panama', 'Balboa', 'PAB', 'B/.'),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs'),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.'),
(95, 'Philippines', 'Pesos', 'PHP', 'Php'),
(96, 'Poland', 'Zlotych', 'PLN', 'zł'),
(97, 'Qatar', 'Rials', 'QAR', '﷼'),
(98, 'Romania', 'New Lei', 'RON', 'lei'),
(99, 'Russia', 'Rubles', 'RUB', '₽'),
(100, 'Saint Helena', 'Pounds', 'SHP', '£'),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼'),
(102, 'Serbia', 'Dinars', 'RSD', 'ع.د'),
(103, 'Seychelles', 'Rupees', 'SCR', '₹'),
(104, 'Singapore', 'Dollars', 'SGD', '$'),
(105, 'Slovenia', 'Euro', 'EUR', '€'),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$'),
(107, 'Somalia', 'Shillings', 'SOS', 'S'),
(108, 'South Africa', 'Rand', 'ZAR', 'R'),
(109, 'South Korea', 'Won', 'KRW', '₩'),
(110, 'Spain', 'Euro', 'EUR', '€'),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₹'),
(112, 'Sweden', 'Kronor', 'SEK', 'kr'),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF'),
(114, 'Suriname', 'Dollars', 'SRD', '$'),
(115, 'Syria', 'Pounds', 'SYP', '£'),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$'),
(117, 'Thailand', 'Baht', 'THB', '฿'),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$'),
(119, 'Turkey', 'Lira', 'TRY', 'TL'),
(120, 'Turkey', 'Liras', 'TRL', '₺'),
(121, 'Tuvalu', 'Dollars', 'TVD', '$'),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴'),
(123, 'United Kingdom', 'Pounds', 'GBP', '£'),
(124, 'United States of America', 'Dollars', 'USD', '$'),
(125, 'United Arab Emirates', 'Dirham', 'AED', 'د.إ'),
(126, 'Uzbekistan', 'Sums', 'UZS', 'so\'m'),
(127, 'Vatican City', 'Euro', 'EUR', '€'),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs'),
(129, 'Vietnam', 'Dong', 'VND', '₫'),
(130, 'Yemen', 'Rials', 'YER', '﷼'),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `credit_limit` varchar(255) DEFAULT NULL,
  `previous_due` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_state` varchar(255) DEFAULT NULL,
  `ship_postcode` varchar(255) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `price_level` varchar(255) DEFAULT NULL,
  `price_leveltype` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `store_id` varchar(255) NOT NULL,
  `sale_executive_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_name`, `mobile`, `email`, `gst_number`, `tax_number`, `credit_limit`, `previous_due`, `address`, `city`, `state`, `postcode`, `country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `ship_country`, `price_level`, `price_leveltype`, `created_at`, `updated_at`, `status`, `id`, `created_by`, `customer_id`, `store_id`, `sale_executive_id`) VALUES
('Abis Auto Garage Marathamkuzhy', '8945456555', 'agsjhfdgagsfhjasghf@gmal.com', '798556455', '79552622', '0', '155398', 'dsfsgsfg', 'fsgfsgfg', 'fdgdfgfdg', '84545', '2', 'dfgdfgdfg', 'thrissue', 'dfgdfg', 'dfgdfg', 'cust->ship_country}}', '00', 'cust->price_leveltype}}', '2024-10-29 08:32:09', '2024-12-01 01:09:56', 'active', 3, 'Abhilash', 'CUS-5-0003', '5', ''),
('ACTIVA SERVICE CENTRE OTTUKUZHI', '906160812', 'anas@gmail.com', 'Gst@1345600000000', 'tax number', '0', '16447415', 'address', 'city', 'kerala', '89076', NULL, 'ahsgdhg', 'jhsavdnb', 'kgjhagdhj', 'sd,ghjds', '3', 'sdsdf', NULL, '2024-10-29 08:32:09', '2024-11-17 12:52:38', 'active', 5, 'Abhilash', 'CUS-5-0005', '5', ''),
('AISWARYA SPARE PARTS POTHENCODE', '9062735372', NULL, '9062735372', NULL, '0', '9862435.385', 'sdfghsdvfhj sdhgfhjdsfhjds\r\nlksjvdfhgshdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-12-20 02:27:36', 'active', 6, 'Abhilash', 'CUS-5-0006', '5', ''),
('AJI AUTOMOBILES KATTAKADA', '8548654555', NULL, '8548654555', NULL, '0', '13127149.472736', '90616085454', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-12-01 07:54:09', 'active', 7, 'Abhilash', 'CUS-5-0007', '5', ''),
('Aji Two Wheeler   Karamana', NULL, NULL, NULL, NULL, '0', '141019.48790106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-11-13 23:11:05', 'active', 8, 'Abhilash', 'CUS-5-0008', '5', ''),
('A.M MOTOR & SERVICE CHAKKA', NULL, NULL, NULL, NULL, '0', '15430', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 9, 'Abhilash', 'CUS-5-0009', '5', ''),
('ANAND  MOTORS TVM', NULL, NULL, NULL, NULL, '0', '29197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 10, 'Abhilash', 'CUS-5-0010', '5', ''),
('ANIL AUTO PARTS PONGUMOODU', NULL, NULL, NULL, NULL, '0', '7265', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 11, 'Abhilash', 'CUS-5-0011', '5', ''),
('Aswathy Automobiles Peroorkada', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 12, 'Abhilash', 'CUS-5-0012', '5', ''),
('ASWATHY  TWO WHEELER  KUDAPPANAKUNNU', NULL, NULL, NULL, NULL, '0', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 13, 'Abhilash', 'CUS-5-0013', '5', ''),
('Auto  Crews  TVM', NULL, NULL, NULL, NULL, '0', '13895', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 14, 'Abhilash', 'CUS-5-0014', '5', ''),
('AVM MOTORS VIDHURA', NULL, NULL, NULL, NULL, '0', '18040', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 15, 'Abhilash', 'CUS-5-0015', '5', ''),
('BAB AMEER  TWO  WHEELER , MANALIMUKKU,VEMBAYAM', NULL, NULL, NULL, NULL, '0', '4240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 16, 'Abhilash', 'CUS-5-0016', '5', ''),
('BASHA CAR GARAGE ATTINGAL', NULL, NULL, NULL, NULL, '0', '5610', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 17, 'Abhilash', 'CUS-5-0017', '5', ''),
('BIKE ENGINEERS VATTIYOORKAVU', NULL, NULL, NULL, NULL, '0', '18780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 18, 'Abhilash', 'CUS-5-0018', '5', ''),
('BIKE HUB MOTORS SANTHIGIRI POTHENCODE', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 19, 'Abhilash', 'CUS-5-0019', '5', ''),
('CAR CLINIC REMESH', NULL, NULL, NULL, NULL, '0', '4308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 20, 'Abhilash', 'CUS-5-0020', '5', ''),
('CARE  BAJAJ MARUTHENKUZHI TVM', NULL, NULL, NULL, NULL, '0', '14035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 21, 'Abhilash', 'CUS-5-0021', '5', ''),
('Chain  Automobiles  Chirayankeezhu', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 22, 'Abhilash', 'CUS-5-0022', '5', ''),
('Check & Go  Bullet, Vattiyoorkavu', NULL, NULL, NULL, NULL, '0', '10804', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 23, 'Abhilash', 'CUS-5-0023', '5', ''),
('CHINCHU TWO WHEELER', NULL, NULL, NULL, NULL, '0', '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 24, 'Abhilash', 'CUS-5-0024', '5', ''),
('CITY ENGINEERING POOJPURA', NULL, NULL, NULL, NULL, '0', '10400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 25, 'Abhilash', 'CUS-5-0025', '5', ''),
('CLASSIC MOTORS MELEKARIYAM', NULL, NULL, NULL, NULL, NULL, '7900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 26, 'Abhilash', 'CUS-5-0026', '5', ''),
('DEVI AUTO WORKS CHEMBAZHANTHY', NULL, NULL, NULL, NULL, NULL, '3280', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 27, 'Abhilash', 'CUS-5-0027', '5', ''),
('Devi Tyre and Lubricants Kattayikonam', NULL, NULL, NULL, NULL, NULL, '5620', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 28, 'Abhilash', 'CUS-5-0028', '5', ''),
('DHANYA MOTORS AMBALAMUKKU , TRIVANDRUM', NULL, NULL, NULL, NULL, NULL, '5340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 29, 'Abhilash', 'CUS-5-0029', '5', ''),
('Diagno Car Garage-Pothencode', NULL, NULL, NULL, NULL, NULL, '8871', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 30, 'Abhilash', 'CUS-5-0030', '5', ''),
('DIYA MOTOR KAZHAKOOTAM', NULL, NULL, NULL, NULL, NULL, '54912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 31, 'Abhilash', 'CUS-5-0031', '5', ''),
('Dream  Motors -Piraappanakode', NULL, NULL, NULL, NULL, NULL, '11994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 32, 'Abhilash', 'CUS-5-0032', '5', ''),
('DREAM RIDERS CHELLAMANGALAM', NULL, NULL, NULL, NULL, NULL, '5380', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 33, 'Abhilash', 'CUS-5-0033', '5', ''),
('Elankath Automobiles & Traders Tvm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 34, 'Abhilash', 'CUS-5-0034', '5', ''),
('ENGINE PALACE', NULL, NULL, NULL, NULL, NULL, '1502', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 35, 'Abhilash', 'CUS-5-0035', '5', ''),
('Ever Last Autoworks', NULL, NULL, NULL, NULL, NULL, '4422', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 36, 'Abhilash', 'CUS-5-0036', '5', ''),
('FAST LANE GARAGE MANIKANDESWWARAM', NULL, NULL, NULL, NULL, NULL, '11090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 37, 'Abhilash', 'CUS-5-0037', '5', ''),
('FIVE STAR MOTOR MARUTHOOR', NULL, NULL, NULL, NULL, NULL, '7520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 38, 'Abhilash', 'CUS-5-0038', '5', ''),
('Fly Wheel Two Wheeler Kallara', NULL, NULL, NULL, NULL, NULL, '5005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 39, 'Abhilash', 'CUS-5-0039', '5', ''),
('Friends Auto Garage Korani', NULL, NULL, NULL, NULL, NULL, '1420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 40, 'Abhilash', 'CUS-5-0040', '5', ''),
('Friends Two Wheeler Pothencode', NULL, NULL, NULL, NULL, NULL, '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 41, 'Abhilash', 'CUS-5-0041', '5', ''),
('GALAXY TYRE AND ACCESSORIES POTHENCODE', NULL, NULL, NULL, NULL, NULL, '11220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 42, 'Abhilash', 'CUS-5-0042', '5', ''),
('Geetha Auto Works', NULL, NULL, NULL, NULL, NULL, '2410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 43, 'Abhilash', 'CUS-5-0043', '5', ''),
('GERMAN MOTORS POTHENCODE', NULL, NULL, NULL, NULL, NULL, '4170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 44, 'Abhilash', 'CUS-5-0044', '5', ''),
('Gopu  Two Wheeler  Tvm', NULL, NULL, NULL, NULL, NULL, '1485', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 45, 'Abhilash', 'CUS-5-0045', '5', ''),
('GRACE AUTOMOBLIES MANAKADU', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 46, 'Abhilash', 'CUS-5-0046', '5', ''),
('HIGH LIGHT MOTORS KAZHAKOOTTAM', NULL, NULL, NULL, NULL, NULL, '8604', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 47, 'Abhilash', 'CUS-5-0047', '5', ''),
('HIMALAYA ROYAL GARAGE POTHENCODE', NULL, NULL, NULL, NULL, NULL, '8530', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 48, 'Abhilash', 'CUS-5-0048', '5', ''),
('Hi Tech Car Automobiles Kazhakoottam', NULL, NULL, NULL, NULL, NULL, '11472', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 49, 'Abhilash', 'CUS-5-0049', '5', ''),
('INTIMATE CAR CARE CHOOZHAMPALA,MUTTADA,TVM', NULL, NULL, NULL, NULL, NULL, '11700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 50, 'Abhilash', 'CUS-5-0050', '5', ''),
('Jaganath  Bullet', NULL, NULL, NULL, NULL, NULL, '16752', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 51, 'Abhilash', 'CUS-5-0051', '5', ''),
('JAYADEEPM CAR WORKS CHEMBAZHATHY', NULL, NULL, NULL, NULL, NULL, '2470', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 52, 'Abhilash', 'CUS-5-0052', '5', ''),
('JINI AUTOMOBILES PAUDIKONAM', NULL, NULL, NULL, NULL, NULL, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 53, 'Abhilash', 'CUS-5-0053', '5', ''),
('JOHNSON \'S GARAGE THYCADU TVM', NULL, NULL, NULL, NULL, NULL, '18060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 54, 'Abhilash', 'CUS-5-0054', '5', ''),
('JOSH AUTOMOBLIES CHANNANKARA', NULL, NULL, NULL, NULL, NULL, '4729', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 55, 'Abhilash', 'CUS-5-0055', '5', ''),
('KADAYARA CAR CARE , CHIRAYINKEEZHU', NULL, NULL, NULL, NULL, NULL, '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 56, 'Abhilash', 'CUS-5-0056', '5', ''),
('KAIRALI TYRE WORKS', NULL, NULL, NULL, NULL, NULL, '2336', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 57, 'Abhilash', 'CUS-5-0057', '5', ''),
('KARTHIKA MARUTHI SERVICE , VEMBAYAM', NULL, NULL, NULL, NULL, NULL, '4900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 58, 'Abhilash', 'CUS-5-0058', '5', ''),
('K B Two Wheeler Korani', NULL, NULL, NULL, NULL, NULL, '7940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 59, 'Abhilash', 'CUS-5-0059', '5', ''),
('KINETIC IN CARE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 60, 'Abhilash', 'CUS-5-0060', '5', ''),
('K N Two   Wheeler Pothencode', NULL, NULL, NULL, NULL, NULL, '8573', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 61, 'Abhilash', 'CUS-5-0061', '5', ''),
('Leksmi Tyre Works Pothencode', NULL, NULL, NULL, NULL, NULL, '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 62, 'Abhilash', 'CUS-5-0062', '5', ''),
('MASTER MOTORS KANIYAPURAM', NULL, NULL, NULL, NULL, NULL, '7420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 63, 'Abhilash', 'CUS-5-0063', '5', ''),
('M M Motors Brand Two Wheeler Works Pothencode', NULL, NULL, NULL, NULL, NULL, '3720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 64, 'Abhilash', 'CUS-5-0064', '5', ''),
('M.M MOTORS JAGATHY', NULL, NULL, NULL, NULL, NULL, '3170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 65, 'Abhilash', 'CUS-5-0065', '5', ''),
('MOHANAN TWO WHEELER PEROORKADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 66, 'Abhilash', 'CUS-5-0066', '5', ''),
('MOTO EMPIRE CHANTHAPAD', NULL, NULL, NULL, NULL, NULL, '4647', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 67, 'Abhilash', 'CUS-5-0067', '5', ''),
('MOTOR CRAFT AUTOMOBILES KARAMANA', NULL, NULL, NULL, NULL, NULL, '1260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 68, 'Abhilash', 'CUS-5-0068', '5', ''),
('MOTO SPARE ( NIBIN)', NULL, NULL, NULL, NULL, NULL, '17858', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 69, 'Abhilash', 'CUS-5-0069', '5', ''),
('MOTO TRACK TWO WHEELER WORK SHOP POWDIKONAM', NULL, NULL, NULL, NULL, NULL, '5170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 70, 'Abhilash', 'CUS-5-0070', '5', ''),
('MOTO WINGS POTHENCODE', NULL, NULL, NULL, NULL, NULL, '7270', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 71, 'Abhilash', 'CUS-5-0071', '5', ''),
('M R TWO WHEELER   WORKS & SERVICE', NULL, NULL, NULL, NULL, NULL, '4520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 72, 'Abhilash', 'CUS-5-0072', '5', ''),
('NEW GEN PHARMA KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 73, 'Abhilash', 'CUS-5-0073', '5', ''),
('NIRMALA MOTORS POTHENCODE', NULL, NULL, NULL, NULL, NULL, '5285', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 74, 'Abhilash', 'CUS-5-0074', '5', ''),
('NS AUTOMOBILES VAVARAMBALAM', NULL, NULL, NULL, NULL, NULL, '6360', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 75, 'Abhilash', 'CUS-5-0075', '5', ''),
('N.S TWO WHEELER PAPPANAMKODE', NULL, NULL, NULL, NULL, NULL, '6790', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 76, 'Abhilash', 'CUS-5-0076', '5', ''),
('PERFECT MARUTHI KAZHAKUTTAM', NULL, NULL, NULL, NULL, NULL, '17340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 77, 'Abhilash', 'CUS-5-0077', '5', ''),
('PONNUS TWO WHEELER WORKS ATTINGAL', NULL, NULL, NULL, NULL, NULL, '5330', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 78, 'Abhilash', 'CUS-5-0078', '5', ''),
('PRAISE  TWO WHEELER  WORKSHOP', NULL, NULL, NULL, NULL, NULL, '3225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 79, 'Abhilash', 'CUS-5-0079', '5', ''),
('P.V TWO WHEELER PANKALAMUKKU', NULL, NULL, NULL, NULL, NULL, '3020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 80, 'Abhilash', 'CUS-5-0080', '5', ''),
('RAGAM AUTO PARTS POTHENCODE', NULL, NULL, NULL, NULL, NULL, '2510', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 81, 'Abhilash', 'CUS-5-0081', '5', ''),
('Rakhi Engineering Works  Edapazhanji Tvm', NULL, NULL, NULL, NULL, NULL, '2126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 82, 'Abhilash', 'CUS-5-0082', '5', ''),
('RC MOTORS POTHENCODE', NULL, NULL, NULL, NULL, NULL, '5074', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 83, 'Abhilash', 'CUS-5-0083', '5', ''),
('REBOOT  CHEMPAZTHY', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 84, 'Abhilash', 'CUS-5-0084', '5', ''),
('REENA MOTORS VELI.THRIVANDRUM', NULL, NULL, NULL, NULL, NULL, '19489', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 85, 'Abhilash', 'CUS-5-0085', '5', ''),
('Renjith  Vattiyoorkavu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 86, 'Abhilash', 'CUS-5-0086', '5', ''),
('Royal Motors  Two Wheeler Venjaramoodu', NULL, NULL, NULL, NULL, NULL, '4110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 87, 'Abhilash', 'CUS-5-0087', '5', ''),
('ROYAL WINGS EDAPAZHANJI', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 88, 'Abhilash', 'CUS-5-0088', '5', ''),
('R.R CAR CARE KUDAPPANAKKUNNU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 89, 'Abhilash', 'CUS-5-0089', '5', ''),
('S.B AUTO TWO WHEELER OOKODE', NULL, NULL, NULL, NULL, NULL, '1425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 90, 'Abhilash', 'CUS-5-0090', '5', ''),
('Shanavas Automobiles ,Vattiyoorkavu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 91, 'Abhilash', 'CUS-5-0091', '5', ''),
('SIM ENTREPRISES SANTHGIRI', NULL, NULL, NULL, NULL, NULL, '16992', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 92, 'Abhilash', 'CUS-5-0092', '5', ''),
('SIVASHAKTHI AUTOMOBLIES MARUTHENKUZHI', NULL, NULL, NULL, NULL, NULL, '13076', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 93, 'Abhilash', 'CUS-5-0093', '5', ''),
('SK MARUTHI SERVICE CENTRE KANIYAPURAM', NULL, NULL, NULL, NULL, NULL, '3800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 94, 'Abhilash', 'CUS-5-0094', '5', ''),
('S L Battery Shop Kulathoor', NULL, NULL, NULL, NULL, NULL, '19617', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 95, 'Abhilash', 'CUS-5-0095', '5', ''),
('SL MOTORS SHANTHIGIRI POTHENCODE', NULL, NULL, NULL, NULL, NULL, '4340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 96, 'Abhilash', 'CUS-5-0096', '5', ''),
('SREE BHADRA BULLET GARAGE KALLIYOOR', NULL, NULL, NULL, NULL, NULL, '2038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 97, 'Abhilash', 'CUS-5-0097', '5', ''),
('Sreedeepam  Auto Garage Kulathoor', NULL, NULL, NULL, NULL, NULL, '1590', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 98, 'Abhilash', 'CUS-5-0098', '5', ''),
('Sreekrishna  Motors  Thycadu ,Venjaramoodu', NULL, NULL, NULL, NULL, NULL, '1990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 99, 'Abhilash', 'CUS-5-0099', '5', ''),
('Sreekrishna Two Wheeler   Sreevaragam', NULL, NULL, NULL, NULL, NULL, '4300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 100, 'Abhilash', 'CUS-5-0100', '5', ''),
('SREE MURUGA TWO WHEELER', NULL, NULL, NULL, NULL, NULL, '5370', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 101, 'Abhilash', 'CUS-5-0101', '5', ''),
('SREE PUNARTHAM PAUDIKONAM', NULL, NULL, NULL, NULL, NULL, '3442', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 102, 'Abhilash', 'CUS-5-0102', '5', ''),
('SREEVINAYAKA AUTO GARAGE PULIYARAKONAM', NULL, NULL, NULL, NULL, NULL, '6968', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 103, 'Abhilash', 'CUS-5-0103', '5', ''),
('SREEVINAYAKA POTHENCODE', NULL, NULL, NULL, NULL, NULL, '2850', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 104, 'Abhilash', 'CUS-5-0104', '5', ''),
('SREE VINAYAKA SHEET AND METAL REPARING POTHENCODE', NULL, NULL, NULL, NULL, NULL, '20100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 105, 'Abhilash', 'CUS-5-0105', '5', ''),
('SUMMER CABS MOTORS KILLIPALAM,ATTUKAL', NULL, NULL, NULL, NULL, NULL, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 106, 'Abhilash', 'CUS-5-0106', '5', ''),
('S V Automobiles', NULL, NULL, NULL, NULL, NULL, '2828', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 107, 'Abhilash', 'CUS-5-0107', '5', ''),
('S.V Two Wheeler Kannettumukku Tvm', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 108, 'Abhilash', 'CUS-5-0108', '5', ''),
('SWATHIKRISHNA TWO WHEELER WORKS CHIRAYINKEEZHU', NULL, NULL, NULL, NULL, NULL, '6505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 109, 'Abhilash', 'CUS-5-0109', '5', ''),
('TEAM MERE MECH POTHECODE', NULL, NULL, NULL, NULL, NULL, '10620', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 110, 'Abhilash', 'CUS-5-0110', '5', ''),
('Thampuran  Car Work Shop', NULL, NULL, NULL, NULL, NULL, '2045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 111, 'Abhilash', 'CUS-5-0111', '5', ''),
('THOTTATHIL AUTO MOBILES CHEMBAKAMANGALAM', NULL, NULL, NULL, NULL, NULL, '9174', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 112, 'Abhilash', 'CUS-5-0112', '5', ''),
('TORRETO\'S GARAGE PALLIPURAM,TVM', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 113, 'Abhilash', 'CUS-5-0113', '5', ''),
('ULTIMATE ENGINEERS THALIYAL KARAMANA', NULL, NULL, NULL, NULL, NULL, '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 114, 'Abhilash', 'CUS-5-0114', '5', ''),
('UTHRAM  TWO ,THREE SPARE  PARTS  SREEKARYAM', NULL, NULL, NULL, NULL, NULL, '2870', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 115, 'Abhilash', 'CUS-5-0115', '5', ''),
('Vahab  Vattiyoorkavu', NULL, NULL, NULL, NULL, NULL, '2640', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 116, 'Abhilash', 'CUS-5-0116', '5', ''),
('Varna Motors  Vilappilsala Tvm', NULL, NULL, NULL, NULL, NULL, '13540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 117, 'Abhilash', 'CUS-5-0117', '5', ''),
('Venus Motors', NULL, NULL, NULL, NULL, NULL, '7068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 118, 'Abhilash', 'CUS-5-0118', '5', ''),
('Vijaya Motors  Kudappanakunnu', NULL, NULL, NULL, NULL, NULL, '14543', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 119, 'Abhilash', 'CUS-5-0119', '5', ''),
('VINAYAKA  MOTORS NETTAYAM', NULL, NULL, NULL, NULL, NULL, '6566', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 120, 'Abhilash', 'CUS-5-0120', '5', ''),
('VINAYAKA TWO WHEELER MANNANTHALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 121, 'Abhilash', 'CUS-5-0121', '5', ''),
('VISHNU AUTO WORKS (SANTOSH) KULATHOOR', NULL, NULL, NULL, NULL, NULL, '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 122, 'Abhilash', 'CUS-5-0122', '5', ''),
('V V N Tyre  Care and Accessories    Karatte', NULL, NULL, NULL, NULL, NULL, '1972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 123, 'Abhilash', 'CUS-5-0123', '5', ''),
('MOTO AVENUE TWO WHEELER SPARE PARTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 124, 'ADARSH', 'CUS-5-0124', '5', ''),
('J.R AUTOMOBILES ARUMURIKADA KUNDARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 125, 'Ajesh', 'CUS-5-0125', '5', ''),
('KETTUNGAL AUTO SPARES & AGENCIES Parakkode', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 126, 'Ajesh', 'CUS-5-0126', '5', ''),
('Sarangam Auto Spares Anchal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 127, 'Ajesh', 'CUS-5-0127', '5', ''),
('SREE SUGATHAN AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 128, 'Ajesh', 'CUS-5-0128', '5', ''),
('Vinayakan AutoSpares Kottarakkara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 129, 'Ajesh', 'CUS-5-0129', '5', ''),
('Vinayaka Two Wheeler Chirankkavu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 130, 'Ajesh', 'CUS-5-0130', '5', ''),
('Abhi Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 131, 'Arun', 'CUS-5-0131', '5', ''),
('A B STANDARD AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '13066', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 132, 'Arun', 'CUS-5-0132', '5', ''),
('ADERSH CAR STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 133, 'Arun', 'CUS-5-0133', '5', ''),
('AJITH STAFF TVM', NULL, NULL, NULL, NULL, NULL, '265', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 134, 'Arun', 'CUS-5-0134', '5', ''),
('Akhil Car Staff', NULL, NULL, NULL, NULL, NULL, '707', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 135, 'Arun', 'CUS-5-0135', '5', ''),
('Akhil Staff', NULL, NULL, NULL, NULL, NULL, '240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 136, 'Arun', 'CUS-5-0136', '5', ''),
('Alfi Eravipuram', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 137, 'Arun', 'CUS-5-0137', '5', ''),
('AMAR KARICODE C/O FAHIM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 138, 'Arun', 'CUS-5-0138', '5', ''),
('Ameer Loading  AITUC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 139, 'Arun', 'CUS-5-0139', '5', ''),
('Anil Kumar Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 140, 'Arun', 'CUS-5-0140', '5', ''),
('Anil Madannada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 141, 'Arun', 'CUS-5-0141', '5', ''),
('ANIL QUILON KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 142, 'Arun', 'CUS-5-0142', '5', ''),
('Anstin  M -Shoppe Tvm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 143, 'Arun', 'CUS-5-0143', '5', ''),
('ANUS AUTO MOBILES MATHILIL', NULL, NULL, NULL, NULL, NULL, '540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 144, 'Arun', 'CUS-5-0144', '5', ''),
('A One Maruti Services Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 145, 'Arun', 'CUS-5-0145', '5', ''),
('APS Auto Spares', NULL, NULL, NULL, NULL, NULL, '1069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 146, 'Arun', 'CUS-5-0146', '5', ''),
('Arjun Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 147, 'Arun', 'CUS-5-0147', '5', ''),
('ARUN STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 148, 'Arun', 'CUS-5-0148', '5', ''),
('ATLAS DREDGING PVT.LTD PALAKKAD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 149, 'Arun', 'CUS-5-0149', '5', ''),
('Auto Marine Beachroad', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 150, 'Arun', 'CUS-5-0150', '5', ''),
('Babu PBM', NULL, NULL, NULL, NULL, NULL, '147', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 151, 'Arun', 'CUS-5-0151', '5', ''),
('Baiju   9995797234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 152, 'Arun', 'CUS-5-0152', '5', ''),
('BASHIR PALLIKKARA', NULL, NULL, NULL, NULL, NULL, '2473', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 153, 'Arun', 'CUS-5-0153', '5', ''),
('Benny Vaddy  9895774750', NULL, NULL, NULL, NULL, NULL, '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 154, 'Arun', 'CUS-5-0154', '5', ''),
('Best Automobiles Kollam', NULL, NULL, NULL, NULL, NULL, '9073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 155, 'Arun', 'CUS-5-0155', '5', ''),
('Bibin Kollam Lyth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 156, 'Arun', 'CUS-5-0156', '5', ''),
('BIJITHRAJ PERUMPUZHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 157, 'Arun', 'CUS-5-0157', '5', ''),
('B.K SERVICE STATION', NULL, NULL, NULL, NULL, NULL, '4369', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 158, 'Arun', 'CUS-5-0158', '5', ''),
('BMP Auto Parts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 159, 'Arun', 'CUS-5-0159', '5', ''),
('Bus Operators Associates Spare Parts Wings', NULL, NULL, NULL, NULL, NULL, '6178', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 160, 'Arun', 'CUS-5-0160', '5', ''),
('EBEN EZER WHEELS & TYRES ,ANGAMALY', NULL, NULL, NULL, NULL, NULL, '2226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 161, 'Arun', 'CUS-5-0161', '5', ''),
('E-VISION AUTO MOBILES', NULL, NULL, NULL, NULL, NULL, '2243', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 162, 'Arun', 'CUS-5-0162', '5', ''),
('Expert All Car Service', NULL, NULL, NULL, NULL, NULL, '21600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 163, 'Arun', 'CUS-5-0163', '5', ''),
('FAYAS STAFF QAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 164, 'Arun', 'CUS-5-0164', '5', ''),
('Friends Automobiles (Kadappakkada)', NULL, NULL, NULL, NULL, NULL, '8713', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 165, 'Arun', 'CUS-5-0165', '5', ''),
('Ganesh Kareepra', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 166, 'Arun', 'CUS-5-0166', '5', ''),
('GREEN TECH ECO CONSULTANCY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 167, 'Arun', 'CUS-5-0167', '5', ''),
('G&T Auto Garage Kollam', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 168, 'Arun', 'CUS-5-0168', '5', ''),
('HARIKRISHNAN STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 169, 'Arun', 'CUS-5-0169', '5', ''),
('Honest Auto Care  Kureeppally', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 170, 'Arun', 'CUS-5-0170', '5', ''),
('Jamsheer Kolloorvila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 171, 'Arun', 'CUS-5-0171', '5', ''),
('JAYSONS AGENCIES', NULL, NULL, NULL, NULL, NULL, '1509', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 172, 'Arun', 'CUS-5-0172', '5', ''),
('Jishnu QAS', NULL, NULL, NULL, NULL, NULL, '1456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 173, 'Arun', 'CUS-5-0173', '5', ''),
('JOSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 174, 'Arun', 'CUS-5-0174', '5', ''),
('KOLLAM AUTO ENGINEERING KADAPPAKADA', NULL, NULL, NULL, NULL, NULL, '1914', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 175, 'Arun', 'CUS-5-0175', '5', ''),
('Lal Auto Garage (Harilal)', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 176, 'Arun', 'CUS-5-0176', '5', ''),
('L C G C Environmental Engineering LLP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 177, 'Arun', 'CUS-5-0177', '5', ''),
('LEKSHMI GLASS AGENCIES', NULL, NULL, NULL, NULL, NULL, '49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 178, 'Arun', 'CUS-5-0178', '5', ''),
('Liju Puthoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 179, 'Arun', 'CUS-5-0179', '5', ''),
('Loyid Kollam', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 180, 'Arun', 'CUS-5-0180', '5', ''),
('MADHU PBM', NULL, NULL, NULL, NULL, NULL, '1148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 181, 'Arun', 'CUS-5-0181', '5', ''),
('Mahaboob Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 182, 'Arun', 'CUS-5-0182', '5', ''),
('Mahesh', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 183, 'Arun', 'CUS-5-0183', '5', ''),
('MAHINDRA AUTO MARTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 184, 'Arun', 'CUS-5-0184', '5', ''),
('Matha Auto Garage(Ajith)', NULL, NULL, NULL, NULL, NULL, '277.28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 185, 'Arun', 'CUS-5-0185', '5', ''),
('MAYA STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 186, 'Arun', 'CUS-5-0186', '5', ''),
('Micle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 187, 'Arun', 'CUS-5-0187', '5', ''),
('Midhilaj Ustad', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 188, 'Arun', 'CUS-5-0188', '5', ''),
('Mohan Das Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 189, 'Arun', 'CUS-5-0189', '5', ''),
('Mookambika  Traders', NULL, NULL, NULL, NULL, NULL, '2850', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 190, 'Arun', 'CUS-5-0190', '5', ''),
('MY TVS PARTS MART KLM  (FOCUS PARTS  MART)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 191, 'Arun', 'CUS-5-0191', '5', ''),
('Nicxon Kuzhiyam', NULL, NULL, NULL, NULL, NULL, '121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 192, 'Arun', 'CUS-5-0192', '5', ''),
('NOUSHAD KARIKODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 193, 'Arun', 'CUS-5-0193', '5', ''),
('Omel Lal', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 194, 'Arun', 'CUS-5-0194', '5', ''),
('PBM AUTO PARTS', NULL, NULL, NULL, NULL, NULL, '3770', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 195, 'Arun', 'CUS-5-0195', '5', ''),
('PINNACLE MOTORS WORKS PVT LTD   KALLUMTHAZHAM', NULL, NULL, NULL, NULL, NULL, '240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 196, 'Arun', 'CUS-5-0196', '5', ''),
('PODIMON', NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 197, 'Arun', 'CUS-5-0197', '5', ''),
('Pramod Qas Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 198, 'Arun', 'CUS-5-0198', '5', ''),
('Prasad Automobiles', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 199, 'Arun', 'CUS-5-0199', '5', ''),
('PRASEETHA QAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 200, 'Arun', 'CUS-5-0200', '5', ''),
('Prince Mynagappally', NULL, NULL, NULL, NULL, NULL, '680', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 201, 'Arun', 'CUS-5-0201', '5', ''),
('RAJEEV', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 202, 'Arun', 'CUS-5-0202', '5', ''),
('RAJKUMAR  STAFF', NULL, NULL, NULL, NULL, NULL, '519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 203, 'Arun', 'CUS-5-0203', '5', ''),
('RATHEESH STAFF', NULL, NULL, NULL, NULL, NULL, '275', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 204, 'Arun', 'CUS-5-0204', '5', ''),
('SAHAD KOLLAM LYTH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 205, 'Arun', 'CUS-5-0205', '5', ''),
('SAHARA INTERNATIONAL ERNAKULAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 206, 'Arun', 'CUS-5-0206', '5', ''),
('SAJEEVAN QAS', NULL, NULL, NULL, NULL, NULL, '1185', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 207, 'Arun', 'CUS-5-0207', '5', ''),
('SAJI STAFF', NULL, NULL, NULL, NULL, NULL, '778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 208, 'Arun', 'CUS-5-0208', '5', ''),
('Salam', NULL, NULL, NULL, NULL, NULL, '1049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 209, 'Arun', 'CUS-5-0209', '5', ''),
('SAM STAFF', NULL, NULL, NULL, NULL, NULL, '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 210, 'Arun', 'CUS-5-0210', '5', ''),
('Satheesh Repsol Tvm Staff', NULL, NULL, NULL, NULL, NULL, '351', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 211, 'Arun', 'CUS-5-0211', '5', ''),
('Shafeek Kollam Ban', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 212, 'Arun', 'CUS-5-0212', '5', ''),
('Shahudeen Karikode', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 213, 'Arun', 'CUS-5-0213', '5', ''),
('SHANAVAS CAR STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 214, 'Arun', 'CUS-5-0214', '5', ''),
('Shibu Pooyappally', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 215, 'Arun', 'CUS-5-0215', '5', '');
INSERT INTO `customer` (`customer_name`, `mobile`, `email`, `gst_number`, `tax_number`, `credit_limit`, `previous_due`, `address`, `city`, `state`, `postcode`, `country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `ship_country`, `price_level`, `price_leveltype`, `created_at`, `updated_at`, `status`, `id`, `created_by`, `customer_id`, `store_id`, `sale_executive_id`) VALUES
('SINDHU STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 216, 'Arun', 'CUS-5-0216', '5', ''),
('Sivan Ithikkara', NULL, NULL, NULL, NULL, NULL, '27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 217, 'Arun', 'CUS-5-0217', '5', ''),
('Skilltech Kadappakada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 218, 'Arun', 'CUS-5-0218', '5', ''),
('Sreekanth  Anchalumoodu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 219, 'Arun', 'CUS-5-0219', '5', ''),
('SREENATH C/0 SIYAD', NULL, NULL, NULL, NULL, NULL, '2328', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 220, 'Arun', 'CUS-5-0220', '5', ''),
('SREENEE STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 221, 'Arun', 'CUS-5-0221', '5', ''),
('SUMI STAFF QAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 222, 'Arun', 'CUS-5-0222', '5', ''),
('SUNIL AARATHY A/M', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 223, 'Arun', 'CUS-5-0223', '5', ''),
('SURESH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 224, 'Arun', 'CUS-5-0224', '5', ''),
('SURESH AUTO ELECTRICALS', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 225, 'Arun', 'CUS-5-0225', '5', ''),
('Thenguvilyil Automobiles', NULL, NULL, NULL, NULL, NULL, '3030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 226, 'Arun', 'CUS-5-0226', '5', ''),
('UNNI QAS STAFF', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 227, 'Arun', 'CUS-5-0227', '5', ''),
('Vaishak Staff', NULL, NULL, NULL, NULL, NULL, '351', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 228, 'Arun', 'CUS-5-0228', '5', ''),
('VIBIL STAFF', NULL, NULL, NULL, NULL, NULL, '306', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 229, 'Arun', 'CUS-5-0229', '5', ''),
('VINOD INSURANCE', NULL, NULL, NULL, NULL, NULL, '1329', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 230, 'Arun', 'CUS-5-0230', '5', ''),
('Vishnu IInd Mile Stone', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 231, 'Arun', 'CUS-5-0231', '5', ''),
('VISHNU   RANDAMKUTTY', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 232, 'Arun', 'CUS-5-0232', '5', ''),
('Auto Care Changankulangara', NULL, NULL, NULL, NULL, NULL, '4295', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 233, 'BINU', 'CUS-5-0233', '5', ''),
('Silver Star Auto Garage (Ratheesh)', NULL, NULL, NULL, NULL, NULL, '9590', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 234, 'BINU', 'CUS-5-0234', '5', ''),
('Sreelatha Motors', NULL, NULL, NULL, NULL, NULL, '1449', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 235, 'BINU', 'CUS-5-0235', '5', ''),
('Akhil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 236, 'David', 'CUS-5-0236', '5', ''),
('ANU RAJ   KOTTARAKKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 237, 'David', 'CUS-5-0237', '5', ''),
('Binoy Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 238, 'David', 'CUS-5-0238', '5', ''),
('CAR WEST  AUTO MOBILE WORKSHOP KUNNUKARA', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 239, 'David', 'CUS-5-0239', '5', ''),
('E.S ENTERPRISES KALLIYODE,ANAD,TRIVANDRAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 240, 'David', 'CUS-5-0240', '5', ''),
('FISHERMAN WELFARE SOCIETY MOOTHAKKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 241, 'David', 'CUS-5-0241', '5', ''),
('Gen Max Diesels', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 242, 'David', 'CUS-5-0242', '5', ''),
('JITHU MYLAPORE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 243, 'David', 'CUS-5-0243', '5', ''),
('SIVARAJAN NEENDAKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 244, 'David', 'CUS-5-0244', '5', ''),
('SLOVAK TECHNOLOGIES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 245, 'David', 'CUS-5-0245', '5', ''),
('Team Automobiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 246, 'David', 'CUS-5-0246', '5', ''),
('TFD WCSDF (Q) 43/92 THANGASSERY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 247, 'David', 'CUS-5-0247', '5', ''),
('Thomas  Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 248, 'David', 'CUS-5-0248', '5', ''),
('VIJIL JOSE C/O SABARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 249, 'David', 'CUS-5-0249', '5', ''),
('Abhi S Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 250, 'Mahesh', 'CUS-5-0250', '5', ''),
('AJESH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 251, 'Mahesh', 'CUS-5-0251', '5', ''),
('AJIMYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 252, 'Mahesh', 'CUS-5-0252', '5', ''),
('Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 253, 'Mahesh', 'CUS-5-0253', '5', ''),
('Anil  Asramam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 254, 'Mahesh', 'CUS-5-0254', '5', ''),
('Beena AB Cargo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 255, 'Mahesh', 'CUS-5-0255', '5', ''),
('BHAVANI ERECTORS  PRIVATE  LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 256, 'Mahesh', 'CUS-5-0256', '5', ''),
('Chalil Traders Meenambalam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 257, 'Mahesh', 'CUS-5-0257', '5', ''),
('DAVID QAS STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 258, 'Mahesh', 'CUS-5-0258', '5', ''),
('DINESH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 259, 'Mahesh', 'CUS-5-0259', '5', ''),
('Galaxy Chanthanathope', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 260, 'Mahesh', 'CUS-5-0260', '5', ''),
('GOPU C/O ANIL QAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 261, 'Mahesh', 'CUS-5-0261', '5', ''),
('HINDUSTAN AUTO DISTRIBUTORS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 262, 'Mahesh', 'CUS-5-0262', '5', ''),
('Hi Tech Traders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 263, 'Mahesh', 'CUS-5-0263', '5', ''),
('Jack & West', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 264, 'Mahesh', 'CUS-5-0264', '5', ''),
('Jagadheesh Jawrani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 265, 'Mahesh', 'CUS-5-0265', '5', ''),
('JAYASHANKAR CHANGANASHERY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 266, 'Mahesh', 'CUS-5-0266', '5', ''),
('Jibin Mohan Nedumbana Kananalloor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 267, 'Mahesh', 'CUS-5-0267', '5', ''),
('Karuna Motor Works Keralapuram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 268, 'Mahesh', 'CUS-5-0268', '5', ''),
('MANIKANDAN KOLLOM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 269, 'Mahesh', 'CUS-5-0269', '5', ''),
('Manoj 8893315119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 270, 'Mahesh', 'CUS-5-0270', '5', ''),
('Manoj Chathannoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 271, 'Mahesh', 'CUS-5-0271', '5', ''),
('Michael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 272, 'Mahesh', 'CUS-5-0272', '5', ''),
('MONACHAN, KADAPPAKKADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 273, 'Mahesh', 'CUS-5-0273', '5', ''),
('Narayanan Amaron Battery', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 274, 'Mahesh', 'CUS-5-0274', '5', ''),
('New Benz Automobiles Kasargod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 275, 'Mahesh', 'CUS-5-0275', '5', ''),
('NEW BENZ  DISTRIBUTORS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 276, 'Mahesh', 'CUS-5-0276', '5', ''),
('Nidhin Staff.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 277, 'Mahesh', 'CUS-5-0277', '5', ''),
('PRANA POWERS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 278, 'Mahesh', 'CUS-5-0278', '5', ''),
('RAJANESH PADINJAREKAVILA  WEST KLLADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 279, 'Mahesh', 'CUS-5-0279', '5', ''),
('SADHATH  POLAYATHODU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 280, 'Mahesh', 'CUS-5-0280', '5', ''),
('Saefan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 281, 'Mahesh', 'CUS-5-0281', '5', ''),
('SALEEM KARUNAGAPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 282, 'Mahesh', 'CUS-5-0282', '5', ''),
('Salim Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 283, 'Mahesh', 'CUS-5-0283', '5', ''),
('Sanjay Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 284, 'Mahesh', 'CUS-5-0284', '5', ''),
('Shahul Chandhanathope', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 285, 'Mahesh', 'CUS-5-0285', '5', ''),
('SHANAVAS ZOOMOL STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 286, 'Mahesh', 'CUS-5-0286', '5', ''),
('SHANKAR CHANTHANATHOPE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 287, 'Mahesh', 'CUS-5-0287', '5', ''),
('SIJU,  CHATHAKULAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 288, 'Mahesh', 'CUS-5-0288', '5', ''),
('S M  TRADERS ERNAKULAM', NULL, NULL, NULL, NULL, NULL, '23541', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 289, 'Mahesh', 'CUS-5-0289', '5', ''),
('Star Automobiles Mamood', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 290, 'Mahesh', 'CUS-5-0290', '5', ''),
('SUBHASH ANCHALUMOODU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 291, 'Mahesh', 'CUS-5-0291', '5', ''),
('SUDHEESH STAFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 292, 'Mahesh', 'CUS-5-0292', '5', ''),
('SUNIL CAR AM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 293, 'Mahesh', 'CUS-5-0293', '5', ''),
('Sunil Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 294, 'Mahesh', 'CUS-5-0294', '5', ''),
('THADEVUS ERANAKULAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 295, 'Mahesh', 'CUS-5-0295', '5', ''),
('Vinod Asramam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 296, 'Mahesh', 'CUS-5-0296', '5', ''),
('Vishnu Focuz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 297, 'Mahesh', 'CUS-5-0297', '5', ''),
('V-Tech Enterprices', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 298, 'Mahesh', 'CUS-5-0298', '5', ''),
('XAVIERS  KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 299, 'Mahesh', 'CUS-5-0299', '5', ''),
('YAZEEN AUTO ELECTRICALS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 300, 'Mahesh', 'CUS-5-0300', '5', ''),
('Zam  & Zam Borvel Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 301, 'Mahesh', 'CUS-5-0301', '5', ''),
('CAR AUTOMOBILES 11', NULL, NULL, NULL, NULL, NULL, '216206', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 302, 'PRASEETHA', 'CUS-5-0302', '5', ''),
('CAR AUTO MOBILES(RTL)TVM', NULL, NULL, NULL, NULL, NULL, '211007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 303, 'PRASEETHA', 'CUS-5-0303', '5', ''),
('CAR AUTOMOBILES TVM (ZOOMOL)', NULL, NULL, NULL, NULL, NULL, '363586', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 304, 'PRASEETHA', 'CUS-5-0304', '5', ''),
('MAHINDRA AUTOMARTS (M SHOPPE),TVM', NULL, NULL, NULL, NULL, NULL, '10941', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 305, 'PRASEETHA', 'CUS-5-0305', '5', ''),
('PENTAGON ASSOCIATES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 306, 'PRASEETHA', 'CUS-5-0306', '5', ''),
('UNNI KOLLAM', '56545', 'jfglsdgkj@gmail.com', '644411', '654651', '600', '0', 'fdhjkfgjn', NULL, 'lkfsdgklfmdg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-11-28 02:30:48', 'active', 307, 'PRASEETHA', 'CUS-5-0307', '5', ''),
('Friend  Auto Garage SOOJIKKARANMUKKU', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 308, 'Rajkumar', 'CUS-5-0308', '5', ''),
('Praveen Automobiles(Sathyan)', NULL, NULL, NULL, NULL, NULL, '340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 309, 'Rajkumar', 'CUS-5-0309', '5', ''),
('Professional Auto Garage', NULL, NULL, NULL, NULL, NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 310, 'Rajkumar', 'CUS-5-0310', '5', ''),
('Quality Auto Spares(Hashim)', NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 311, 'Rajkumar', 'CUS-5-0311', '5', ''),
('ROOPAM AUTO GARAGE(SHAIJU )', NULL, NULL, NULL, NULL, NULL, '153', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 312, 'Rajkumar', 'CUS-5-0312', '5', ''),
('ROYAL EMIRATES(SHEFEEK )', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 313, 'Rajkumar', 'CUS-5-0313', '5', ''),
('Royal Two Wheeler Alamcode', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 314, 'Rajkumar', 'CUS-5-0314', '5', ''),
('SIVAGANGA TWOWHEELER', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 315, 'Rajkumar', 'CUS-5-0315', '5', ''),
('SK CRANE CRAFT', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 316, 'Rajkumar', 'CUS-5-0316', '5', ''),
('Sree Durga Two Wheeler(Shaiju)', NULL, NULL, NULL, NULL, NULL, '701', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 317, 'Rajkumar', 'CUS-5-0317', '5', ''),
('Team Torque Car Care(Sreekumar)', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 318, 'Rajkumar', 'CUS-5-0318', '5', ''),
('Thiruvathira Three Wheeler Works(Ramesh)', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 319, 'Rajkumar', 'CUS-5-0319', '5', ''),
('Thiruvonam Automobiles Changankulangara', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 320, 'Rajkumar', 'CUS-5-0320', '5', ''),
('Vishnu Two Wheeler Works(Ajayakumar)', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 321, 'Rajkumar', 'CUS-5-0321', '5', ''),
('AADHYA AUTO SPARES EDAKKULANGARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 322, 'Sajeev', 'CUS-5-0322', '5', ''),
('A . K TYRES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 323, 'Sajeev', 'CUS-5-0323', '5', ''),
('A.K TYRES PERAYAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 324, 'Sajeev', 'CUS-5-0324', '5', ''),
('GOOD WAY TYRES BEACH ROAD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 325, 'Sajeev', 'CUS-5-0325', '5', ''),
('NEW AUTO GARAGE THAMARAKKULAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 326, 'Sajeev', 'CUS-5-0326', '5', ''),
('PRAVEEN AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 327, 'Sajeev', 'CUS-5-0327', '5', ''),
('TOP COOL ALL CAR SERVICE', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 328, 'Sajeev', 'CUS-5-0328', '5', ''),
('UNIVERSAL AUTO GARAGE AYATHIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 329, 'Sajeev', 'CUS-5-0329', '5', ''),
('VATHIYATH AUTO SPARES PANMANA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 330, 'Sajeev', 'CUS-5-0330', '5', ''),
('YESS BULLET SERVICE AYATHIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 331, 'Sajeev', 'CUS-5-0331', '5', ''),
('AARAV MOTORS NEDUMANGADU', NULL, NULL, NULL, NULL, NULL, '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 332, 'SATHEESH', 'CUS-5-0332', '5', ''),
('AJAYAN AUTO GARAGE PERUMPAZHUTHOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 333, 'SATHEESH', 'CUS-5-0333', '5', ''),
('AJI  SPARE PARTS WORKSHOP', NULL, NULL, NULL, NULL, NULL, '2920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 334, 'SATHEESH', 'CUS-5-0334', '5', ''),
('ALAN T/WHEELER KATTAKADA', NULL, NULL, NULL, NULL, NULL, '3660', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 335, 'SATHEESH', 'CUS-5-0335', '5', ''),
('ALBY MOTORS ANTHIYOORKONAM', NULL, NULL, NULL, NULL, NULL, '2890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 336, 'SATHEESH', 'CUS-5-0336', '5', ''),
('AMMA AUTOMOTIVESPA CARWASH AND TYRES VIZHINJAM', NULL, NULL, NULL, NULL, NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 337, 'SATHEESH', 'CUS-5-0337', '5', ''),
('AMMA BULLET WORKS KUNDAMANKADAVU', NULL, NULL, NULL, NULL, NULL, '2150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 338, 'SATHEESH', 'CUS-5-0338', '5', ''),
('A P Motors , Nadakkavu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 339, 'SATHEESH', 'CUS-5-0339', '5', ''),
('A.S CAR WORKSHOP KATTAKADA', NULL, NULL, NULL, NULL, NULL, '1450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 340, 'SATHEESH', 'CUS-5-0340', '5', ''),
('ASHIN TWO WHEELER AMBOORI', NULL, NULL, NULL, NULL, NULL, '2060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 341, 'SATHEESH', 'CUS-5-0341', '5', ''),
('A.S SECOND SPARE PARTS BHALARAMAPURAM', NULL, NULL, NULL, NULL, NULL, '7160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 342, 'SATHEESH', 'CUS-5-0342', '5', ''),
('Aswathy  Auto Mobiles Uchakada Tvm', NULL, NULL, NULL, NULL, NULL, '4029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 343, 'SATHEESH', 'CUS-5-0343', '5', ''),
('ASWATHY MOTORS NILAMAMODU  TVM', NULL, NULL, NULL, NULL, NULL, '2408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 344, 'SATHEESH', 'CUS-5-0344', '5', ''),
('ASWIN MOTOR SPARE (T/W PARTS)PALLICHAL', NULL, NULL, NULL, NULL, NULL, '2805', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 345, 'SATHEESH', 'CUS-5-0345', '5', ''),
('Babu House Kattakada', NULL, NULL, NULL, NULL, NULL, '10763', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 346, 'SATHEESH', 'CUS-5-0346', '5', ''),
('BHARAT TWO WHEELER MANDAPATHINKADAVU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 347, 'SATHEESH', 'CUS-5-0347', '5', ''),
('Bike World Two Wheeler  Workshop Tvm', NULL, NULL, NULL, NULL, NULL, '5368', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 348, 'SATHEESH', 'CUS-5-0348', '5', ''),
('Binu Automobiles Kovalam', NULL, NULL, NULL, NULL, NULL, '15051', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 349, 'SATHEESH', 'CUS-5-0349', '5', ''),
('BINU TWO WHEELER KEELIYODU', NULL, NULL, NULL, NULL, NULL, '980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 350, 'SATHEESH', 'CUS-5-0350', '5', ''),
('BROTHERS AUTO WORKS PANAYARAKUNNU', NULL, NULL, NULL, NULL, NULL, '2210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 351, 'SATHEESH', 'CUS-5-0351', '5', ''),
('CAR CARE CHENKAVILA', NULL, NULL, NULL, NULL, NULL, '192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 352, 'SATHEESH', 'CUS-5-0352', '5', ''),
('CAR CARE NEDUMANGADU', NULL, NULL, NULL, NULL, NULL, '4620', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 353, 'SATHEESH', 'CUS-5-0353', '5', ''),
('CAR SPOT CAR ACCESSORIES UCHAKKADA', NULL, NULL, NULL, NULL, NULL, '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 354, 'SATHEESH', 'CUS-5-0354', '5', ''),
('CHECK AND RACE TWO WHEELER', NULL, NULL, NULL, NULL, NULL, '3400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 355, 'SATHEESH', 'CUS-5-0355', '5', ''),
('CITY MOTORS - VAALICODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 356, 'SATHEESH', 'CUS-5-0356', '5', ''),
('CRAZY MOTOR (PRAVASI A/M) KATTAKADA', NULL, NULL, NULL, NULL, NULL, '624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 357, 'SATHEESH', 'CUS-5-0357', '5', ''),
('DEVI MOTORS & TRAVELS PACHALLOOR', NULL, NULL, NULL, NULL, NULL, '1880', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:09', '2024-10-29 08:32:09', 'active', 358, 'SATHEESH', 'CUS-5-0358', '5', ''),
('Devi  Two Wheeler Kattakada', NULL, NULL, NULL, NULL, NULL, '2188', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 359, 'SATHEESH', 'CUS-5-0359', '5', ''),
('DIVINE MOTORS TWO WHEELER SPARES', NULL, NULL, NULL, NULL, NULL, '3200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 360, 'SATHEESH', 'CUS-5-0360', '5', ''),
('DIXON GARAGE', NULL, NULL, NULL, NULL, NULL, '2700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 361, 'SATHEESH', 'CUS-5-0361', '5', ''),
('DNA MOTORS MANGALATHUKONAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 362, 'SATHEESH', 'CUS-5-0362', '5', ''),
('DRISHYA PAINTS THIRUMALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 363, 'SATHEESH', 'CUS-5-0363', '5', ''),
('EDEN TWO WHEELER VELLARADA', NULL, NULL, NULL, NULL, NULL, '4620', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 364, 'SATHEESH', 'CUS-5-0364', '5', ''),
('EMMANUEL AUTO PARTS URIYAKODE', NULL, NULL, NULL, NULL, NULL, '7808', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 365, 'SATHEESH', 'CUS-5-0365', '5', ''),
('Enfield Moto Care Kottukalkonam', NULL, NULL, NULL, NULL, NULL, '2092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 366, 'SATHEESH', 'CUS-5-0366', '5', ''),
('FRIENDS AUTO WORKS KURUMKUTTY, PARASALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 367, 'SATHEESH', 'CUS-5-0367', '5', ''),
('FRIENDS TWO WHEELER RAMAPURAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 368, 'SATHEESH', 'CUS-5-0368', '5', ''),
('G J  AUTOGARAGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 369, 'SATHEESH', 'CUS-5-0369', '5', ''),
('GOPI MOTORS VELLARADA', NULL, NULL, NULL, NULL, NULL, '2250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 370, 'SATHEESH', 'CUS-5-0370', '5', ''),
('Grand Motors Killy', NULL, NULL, NULL, NULL, NULL, '10603', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 371, 'SATHEESH', 'CUS-5-0371', '5', ''),
('GR MOTORS RAJU', NULL, NULL, NULL, NULL, NULL, '29422', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 372, 'SATHEESH', 'CUS-5-0372', '5', ''),
('HARIPRASAD  ROYAL ENFIELD  TRIVANDRUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 373, 'SATHEESH', 'CUS-5-0373', '5', ''),
('INSPIRE AUTOMOTIVES', NULL, NULL, NULL, NULL, NULL, '4479', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 374, 'SATHEESH', 'CUS-5-0374', '5', ''),
('KODIYIL TRADERS SPARE PARTS PERUMPAZHUTHOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 375, 'SATHEESH', 'CUS-5-0375', '5', ''),
('KRIPA AUTOMOBILES RAMAPURAM', NULL, NULL, NULL, NULL, NULL, '3950', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 376, 'SATHEESH', 'CUS-5-0376', '5', ''),
('Krishna Auto Garage Balaramapuram', NULL, NULL, NULL, NULL, NULL, '11470', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 377, 'SATHEESH', 'CUS-5-0377', '5', ''),
('M 6 SPARES PARTS POOVACHAL', NULL, NULL, NULL, NULL, NULL, '1340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 378, 'SATHEESH', 'CUS-5-0378', '5', ''),
('MARI TWO WHEELER SPARE PARTS KUDAPANAMOODU', NULL, NULL, NULL, NULL, NULL, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 379, 'SATHEESH', 'CUS-5-0379', '5', ''),
('MARIYA TYRES  KATTAKADA', NULL, NULL, NULL, NULL, NULL, '220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 380, 'SATHEESH', 'CUS-5-0380', '5', ''),
('Maruthi Auto Garage Shaji Tvm', NULL, NULL, NULL, NULL, NULL, '10830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 381, 'SATHEESH', 'CUS-5-0381', '5', ''),
('MAS GARAGE URIYACODE  TVM', NULL, NULL, NULL, NULL, NULL, '250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 382, 'SATHEESH', 'CUS-5-0382', '5', ''),
('MATHA TWO WHEELER WORKS THOZHUKKAL', NULL, NULL, NULL, NULL, NULL, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 383, 'SATHEESH', 'CUS-5-0383', '5', ''),
('MIKHEAL WIRE EDM SOLUTION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 384, 'SATHEESH', 'CUS-5-0384', '5', ''),
('MIZPA AUTO SPA & AUTO GARAGE', NULL, NULL, NULL, NULL, NULL, '2597', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 385, 'SATHEESH', 'CUS-5-0385', '5', ''),
('M - Tech  Motors, Nedunagadu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 386, 'SATHEESH', 'CUS-5-0386', '5', ''),
('NADAKKAL AUTOMOBILES AMBOORI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 387, 'SATHEESH', 'CUS-5-0387', '5', ''),
('NION MOTOR THACHOTTUKAVU', NULL, NULL, NULL, NULL, NULL, '5840', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 388, 'SATHEESH', 'CUS-5-0388', '5', ''),
('OFF ROAD AUTOMOBILES KIDAKUZHI UCHAKKADA', NULL, NULL, NULL, NULL, NULL, '2180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 389, 'SATHEESH', 'CUS-5-0389', '5', ''),
('PITSTOP T/W WORKS NEDUMANGADU', NULL, NULL, NULL, NULL, NULL, '752', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 390, 'SATHEESH', 'CUS-5-0390', '5', ''),
('RECODE AUTOMOTIVE VAZHIMUKKU', NULL, NULL, NULL, NULL, NULL, '2290', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 391, 'SATHEESH', 'CUS-5-0391', '5', ''),
('ROYAL HONDA - TRIVANDRUM', NULL, NULL, NULL, NULL, NULL, '770', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 392, 'SATHEESH', 'CUS-5-0392', '5', ''),
('R R  MOTORS  KODANGAVILLA', NULL, NULL, NULL, NULL, NULL, '72', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 393, 'SATHEESH', 'CUS-5-0393', '5', ''),
('SANJU AUTO GARAGE PUTHENPALAM,NEDUMANGADU', NULL, NULL, NULL, NULL, NULL, '2150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 394, 'SATHEESH', 'CUS-5-0394', '5', ''),
('SANTHOSH  TWO WHEELER  KATTAKADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 395, 'SATHEESH', 'CUS-5-0395', '5', ''),
('SATHEESH STAFF', NULL, NULL, NULL, NULL, NULL, '249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 396, 'SATHEESH', 'CUS-5-0396', '5', ''),
('S.G BATTARY SHOP SALES & SERVICE', NULL, NULL, NULL, NULL, NULL, '9645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 397, 'SATHEESH', 'CUS-5-0397', '5', ''),
('SHIJIN AUTOMOBILES ALL CAR SERVICE  CENTER', NULL, NULL, NULL, NULL, NULL, '33900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 398, 'SATHEESH', 'CUS-5-0398', '5', ''),
('Sivasakthi  Auto Garage  Azhakulam', NULL, NULL, NULL, NULL, NULL, '11991', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 399, 'SATHEESH', 'CUS-5-0399', '5', ''),
('S K  Two Wheeler  Udayankulangara', NULL, NULL, NULL, NULL, NULL, '13312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 400, 'SATHEESH', 'CUS-5-0400', '5', ''),
('S.M AUTO SPARES KUNDAMANKADAVU', NULL, NULL, NULL, NULL, NULL, '1870', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 401, 'SATHEESH', 'CUS-5-0401', '5', ''),
('Sree Ganapathy Pazhakutty', NULL, NULL, NULL, NULL, NULL, '9953', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 402, 'SATHEESH', 'CUS-5-0402', '5', ''),
('S.S AUTOTECH MANDAPATHINKADAVU', NULL, NULL, NULL, NULL, NULL, '6054', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 403, 'SATHEESH', 'CUS-5-0403', '5', ''),
('STAR AUTOMOBLIES VELLARADA', NULL, NULL, NULL, NULL, NULL, '2371', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 404, 'SATHEESH', 'CUS-5-0404', '5', ''),
('SUBASH TWO WHEELER WORKS KURUMKUTTY', NULL, NULL, NULL, NULL, NULL, '3930', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 405, 'SATHEESH', 'CUS-5-0405', '5', ''),
('SUN AUTO SPARE PARTS MARATHOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 406, 'SATHEESH', 'CUS-5-0406', '5', ''),
('THANGAM  AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '21341', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 407, 'SATHEESH', 'CUS-5-0407', '5', ''),
('THREE STAR AUTOMOILES BALARAMAPURAM', NULL, NULL, NULL, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 408, 'SATHEESH', 'CUS-5-0408', '5', ''),
('VAIGA MOTORS UCHAKKADA', NULL, NULL, NULL, NULL, NULL, '860', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 409, 'SATHEESH', 'CUS-5-0409', '5', ''),
('VIJU AUTOMOBILES MUKKOLA,VENGANOOR', NULL, NULL, NULL, NULL, NULL, '355', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 410, 'SATHEESH', 'CUS-5-0410', '5', ''),
('V.S TWO WHEELER AMBOORI', NULL, NULL, NULL, NULL, NULL, '2558', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 411, 'SATHEESH', 'CUS-5-0411', '5', ''),
('02 Garage', NULL, NULL, NULL, NULL, NULL, '15031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 412, 'Siyad', 'CUS-5-0412', '5', ''),
('4 K AUTOMOTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 413, 'Siyad', 'CUS-5-0413', '5', ''),
('AARKEY MOTOR KOTTAKKAGAM HIGHSCHOOL', NULL, NULL, NULL, NULL, NULL, '992', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 414, 'Siyad', 'CUS-5-0414', '5', ''),
('ABDUL MANAF A.A.M MANZIL PADA NORTH KARUNAGAPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 415, 'Siyad', 'CUS-5-0415', '5', ''),
('Accord Maruthi Service Karunagappally', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 416, 'Siyad', 'CUS-5-0416', '5', ''),
('ACE AUTOMOBILE WORK SHOP KALLAMBALAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 417, 'Siyad', 'CUS-5-0417', '5', ''),
('Adithya Spare Parts Kulatupuzha', NULL, NULL, NULL, NULL, NULL, '393', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 418, 'Siyad', 'CUS-5-0418', '5', ''),
('Afsana Electricals Chakkuvally', NULL, NULL, NULL, NULL, NULL, '7727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 419, 'Siyad', 'CUS-5-0419', '5', ''),
('Aiswarya Auto Garage (Chathannoor)', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 420, 'Siyad', 'CUS-5-0420', '5', ''),
('Ajay Automobiles (ATTINGAL)', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 421, 'Siyad', 'CUS-5-0421', '5', ''),
('Ajay Two Wheeler(Kundara)', NULL, NULL, NULL, NULL, NULL, '7300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 422, 'Siyad', 'CUS-5-0422', '5', ''),
('Ajith (Asramam)', NULL, NULL, NULL, NULL, NULL, '72', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 423, 'Siyad', 'CUS-5-0423', '5', ''),
('A.K.Automobiles Ckp Junction Kadavoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 424, 'Siyad', 'CUS-5-0424', '5', ''),
('AKSHAY MOTOR KAVALAYOOR', NULL, NULL, NULL, NULL, NULL, '2307', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 425, 'Siyad', 'CUS-5-0425', '5', ''),
('Al-Ain Auto Garage(Kadackal)', NULL, NULL, NULL, NULL, NULL, '6204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 426, 'Siyad', 'CUS-5-0426', '5', ''),
('ALFI SPARE PARTS ERAVIPURAM', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 427, 'Siyad', 'CUS-5-0427', '5', ''),
('ALWIN DISTRIBUTORS PUTHIYAKAVU', NULL, NULL, NULL, NULL, NULL, '6040', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 428, 'Siyad', 'CUS-5-0428', '5', ''),
('Amritha Two Wheeler  Oyoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 429, 'Siyad', 'CUS-5-0429', '5', '');
INSERT INTO `customer` (`customer_name`, `mobile`, `email`, `gst_number`, `tax_number`, `credit_limit`, `previous_due`, `address`, `city`, `state`, `postcode`, `country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `ship_country`, `price_level`, `price_leveltype`, `created_at`, `updated_at`, `status`, `id`, `created_by`, `customer_id`, `store_id`, `sale_executive_id`) VALUES
('Anaswara Motors Anchalumodu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 430, 'Siyad', 'CUS-5-0430', '5', ''),
('ANEESH PERUMPUZHA', NULL, NULL, NULL, NULL, NULL, '45855', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 431, 'Siyad', 'CUS-5-0431', '5', ''),
('Anil Bullet Work Shop Paravoor', NULL, NULL, NULL, NULL, NULL, '12068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 432, 'Siyad', 'CUS-5-0432', '5', ''),
('ANSAR PANAYAM', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 433, 'Siyad', 'CUS-5-0433', '5', ''),
('Anson Two Wheeler(Anchalumood)', NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 434, 'Siyad', 'CUS-5-0434', '5', ''),
('Anu Two Wheeler Works (Karunagappally)', NULL, NULL, NULL, NULL, NULL, '339', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 435, 'Siyad', 'CUS-5-0435', '5', ''),
('Appus Automobiles (Vavvakkavu)', NULL, NULL, NULL, NULL, NULL, '370', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 436, 'Siyad', 'CUS-5-0436', '5', ''),
('A S Automobiles (Kannanalloor)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 437, 'Siyad', 'CUS-5-0437', '5', ''),
('As Auto Spares Paravoor', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 438, 'Siyad', 'CUS-5-0438', '5', ''),
('Ashokan Parippally', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 439, 'Siyad', 'CUS-5-0439', '5', ''),
('Asian Motors', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 440, 'Siyad', 'CUS-5-0440', '5', ''),
('Auto Craft Thirumukku Chathanoor', NULL, NULL, NULL, NULL, NULL, '290', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 441, 'Siyad', 'CUS-5-0441', '5', ''),
('AUTOHUB MANANAKKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 442, 'Siyad', 'CUS-5-0442', '5', ''),
('AUTOMOTIVE  SPARE & TOOLS', NULL, NULL, NULL, NULL, NULL, '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 443, 'Siyad', 'CUS-5-0443', '5', ''),
('AUTO TECH KARUNAGAPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 444, 'Siyad', 'CUS-5-0444', '5', ''),
('AUTO VIBES CHITTUMALA', NULL, NULL, NULL, NULL, NULL, '14880', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 445, 'Siyad', 'CUS-5-0445', '5', ''),
('AUTO WORLD AUTOSPARES ALAMCODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 446, 'Siyad', 'CUS-5-0446', '5', ''),
('Auto World Puthoor', NULL, NULL, NULL, NULL, NULL, '5182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 447, 'Siyad', 'CUS-5-0447', '5', ''),
('Avinash   Motors', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 448, 'Siyad', 'CUS-5-0448', '5', ''),
('AVM MOTOR WORKS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 449, 'Siyad', 'CUS-5-0449', '5', ''),
('Babuji   Hero Honda Clinic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 450, 'Siyad', 'CUS-5-0450', '5', ''),
('Babu (Oachira)', NULL, NULL, NULL, NULL, NULL, '43197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 451, 'Siyad', 'CUS-5-0451', '5', ''),
('B B R   Royal Enfiled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 452, 'Siyad', 'CUS-5-0452', '5', ''),
('BHARATH AUTO GARAGE BYPASS', NULL, NULL, NULL, NULL, NULL, '8561', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 453, 'Siyad', 'CUS-5-0453', '5', ''),
('Bharath Motors by Pass', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 454, 'Siyad', 'CUS-5-0454', '5', ''),
('Bibin Kollam Leyth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 455, 'Siyad', 'CUS-5-0455', '5', ''),
('BIKE CARE  PARAVOOR', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 456, 'Siyad', 'CUS-5-0456', '5', ''),
('BIKE POINT NEDUNGOLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 457, 'Siyad', 'CUS-5-0457', '5', ''),
('BIKE ZONE POOVATHUR KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '1422', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 458, 'Siyad', 'CUS-5-0458', '5', ''),
('BINDHU AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '32212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 459, 'Siyad', 'CUS-5-0459', '5', ''),
('BINU MOTOR WORK GOPALASSERY  AYATHIL', NULL, NULL, NULL, NULL, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 460, 'Siyad', 'CUS-5-0460', '5', ''),
('Bismllah Auto Garage (Ali)', NULL, NULL, NULL, NULL, NULL, '570', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 461, 'Siyad', 'CUS-5-0461', '5', ''),
('B J AUTOMOILES', NULL, NULL, NULL, NULL, NULL, '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 462, 'Siyad', 'CUS-5-0462', '5', ''),
('Bright Asramam', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 463, 'Siyad', 'CUS-5-0463', '5', ''),
('Bright Auto Elecctricals Keralapuram', NULL, NULL, NULL, NULL, NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 464, 'Siyad', 'CUS-5-0464', '5', ''),
('BROTHERS MARUTHADY', NULL, NULL, NULL, NULL, NULL, '36138', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 465, 'Siyad', 'CUS-5-0465', '5', ''),
('Brothers Maruti Services Nellimukku', NULL, NULL, NULL, NULL, NULL, '2381', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 466, 'Siyad', 'CUS-5-0466', '5', ''),
('Brothers Motor Works Kalluvathukkal', NULL, NULL, NULL, NULL, NULL, '51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 467, 'Siyad', 'CUS-5-0467', '5', ''),
('Brothers Two Wheeler Works Poovanpuzha', NULL, NULL, NULL, NULL, NULL, '95', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 468, 'Siyad', 'CUS-5-0468', '5', ''),
('Bullet Auto Garage Pollayathode', NULL, NULL, NULL, NULL, NULL, '9005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 469, 'Siyad', 'CUS-5-0469', '5', ''),
('Bullet Babu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 470, 'Siyad', 'CUS-5-0470', '5', ''),
('CAR AUTOMOBILES NEDIYAVILLA EZHAMMILE', NULL, NULL, NULL, NULL, NULL, '6333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 471, 'Siyad', 'CUS-5-0471', '5', ''),
('CAR TEL AUTOMOBILES BHARANIKAVU', NULL, NULL, NULL, NULL, NULL, '5580', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 472, 'Siyad', 'CUS-5-0472', '5', ''),
('CHANGATHY PUTHENKADA JUNCTION', NULL, NULL, NULL, NULL, NULL, '3896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 473, 'Siyad', 'CUS-5-0473', '5', ''),
('CHIRAKKADAVU TRAVELS NEDUVATHOOR', NULL, NULL, NULL, NULL, NULL, '192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 474, 'Siyad', 'CUS-5-0474', '5', ''),
('Choice Automoive Engineering Work', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 475, 'Siyad', 'CUS-5-0475', '5', ''),
('CHOICE TWO WHEELER  EDAYANAMBALAM', NULL, NULL, NULL, NULL, NULL, '7578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 476, 'Siyad', 'CUS-5-0476', '5', ''),
('CLASSIC AUTOMOBLIES ELAMBALLOOR', NULL, NULL, NULL, NULL, NULL, '492', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 477, 'Siyad', 'CUS-5-0477', '5', ''),
('CLASSIC GARAGE MODEENMUKKU PERUMPUZHA', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 478, 'Siyad', 'CUS-5-0478', '5', ''),
('Craze Motors', NULL, NULL, NULL, NULL, NULL, '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 479, 'Siyad', 'CUS-5-0479', '5', ''),
('C S AUTOMOBILES KORANI', NULL, NULL, NULL, NULL, NULL, '555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 480, 'Siyad', 'CUS-5-0480', '5', ''),
('C.S TWO  WHEELER GARAGE PARAVOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 481, 'Siyad', 'CUS-5-0481', '5', ''),
('CX-AUTO HUB , CAR SERVICE', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 482, 'Siyad', 'CUS-5-0482', '5', ''),
('DEAL AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '12572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 483, 'Siyad', 'CUS-5-0483', '5', ''),
('Devi Motors Elamadu Ambhalamkunnu', NULL, NULL, NULL, NULL, NULL, '1792', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 484, 'Siyad', 'CUS-5-0484', '5', ''),
('Devi Motor Works Kulathupuzha', NULL, NULL, NULL, NULL, NULL, '20281', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 485, 'Siyad', 'CUS-5-0485', '5', ''),
('Devi Two Wheeler  Workshop C/G JNTN', NULL, NULL, NULL, NULL, NULL, '5680', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 486, 'Siyad', 'CUS-5-0486', '5', ''),
('Devi  Two Wheeler Works Mullaseri Mukku Kudikode', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 487, 'Siyad', 'CUS-5-0487', '5', ''),
('DEVU AGENCIES THIRUMUKKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 488, 'Siyad', 'CUS-5-0488', '5', ''),
('Dileep.S', NULL, NULL, NULL, NULL, NULL, '423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 489, 'Siyad', 'CUS-5-0489', '5', ''),
('Divine Auto Garage (Jonakappuaram)', NULL, NULL, NULL, NULL, NULL, '285', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 490, 'Siyad', 'CUS-5-0490', '5', ''),
('Diya Car Service (Manappally)', NULL, NULL, NULL, NULL, NULL, '6503', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 491, 'Siyad', 'CUS-5-0491', '5', ''),
('DREAMS  MOTORS KANIYAMTHODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 492, 'Siyad', 'CUS-5-0492', '5', ''),
('Dreams  Mughathala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 493, 'Siyad', 'CUS-5-0493', '5', ''),
('Emima Two Wheeler Garage Punalur', NULL, NULL, NULL, NULL, NULL, '1267', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 494, 'Siyad', 'CUS-5-0494', '5', ''),
('Enfield India Auto Garage (Mani)', NULL, NULL, NULL, NULL, NULL, '16579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 495, 'Siyad', 'CUS-5-0495', '5', ''),
('ESSEN AUTO GARAGE KULAPADAM', NULL, NULL, NULL, NULL, NULL, '11080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 496, 'Siyad', 'CUS-5-0496', '5', ''),
('EXCELLENT CAR CARE MEENAMBALAM', NULL, NULL, NULL, NULL, NULL, '42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 497, 'Siyad', 'CUS-5-0497', '5', ''),
('Excellent Two Wheeler Work Sooranad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 498, 'Siyad', 'CUS-5-0498', '5', ''),
('Excel Leyland Spares (Shibu)', NULL, NULL, NULL, NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 499, 'Siyad', 'CUS-5-0499', '5', ''),
('EXCEL-T- AUTOMOBILES CHATHANNOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 500, 'Siyad', 'CUS-5-0500', '5', ''),
('Friendly Auto Tech (Zakkir Hussain)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 501, 'Siyad', 'CUS-5-0501', '5', ''),
('Friends Auto Garage  Chithumla', NULL, NULL, NULL, NULL, NULL, '7600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 502, 'Siyad', 'CUS-5-0502', '5', ''),
('FRIENDS AUTO GARAGE KULAPPADAM', NULL, NULL, NULL, NULL, NULL, '5100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 503, 'Siyad', 'CUS-5-0503', '5', ''),
('Friends Auto Garage(Poovanpara)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 504, 'Siyad', 'CUS-5-0504', '5', ''),
('Friends Automobiles and Industrial  Workshop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 505, 'Siyad', 'CUS-5-0505', '5', ''),
('FRIENDS AUTOMOBILES CHEMMAKADU', NULL, NULL, NULL, NULL, NULL, '10504', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 506, 'Siyad', 'CUS-5-0506', '5', ''),
('FRIENDS AUTOMOBILES KANNANALLOOR ( BIJU )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 507, 'Siyad', 'CUS-5-0507', '5', ''),
('FRIENDS AUTOMOBILES THENGATH JN NJEKKANAL OACHIRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 508, 'Siyad', 'CUS-5-0508', '5', ''),
('Friends Maruti (Chakkuvally)', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 509, 'Siyad', 'CUS-5-0509', '5', ''),
('Friends Motors(Kottiyam)', NULL, NULL, NULL, NULL, NULL, '974', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 510, 'Siyad', 'CUS-5-0510', '5', ''),
('Friends Two Wheeler  Chittumala', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 511, 'Siyad', 'CUS-5-0511', '5', ''),
('GAD MOTORS AYATHIL', NULL, NULL, NULL, NULL, NULL, '319', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 512, 'Siyad', 'CUS-5-0512', '5', ''),
('Ganga Twowheeler   Attingal', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 513, 'Siyad', 'CUS-5-0513', '5', ''),
('GENERAL GARGE CARTECH AUTO CENTER', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 514, 'Siyad', 'CUS-5-0514', '5', ''),
('GENUINE CARTECH PARIPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 515, 'Siyad', 'CUS-5-0515', '5', ''),
('Gireeshan Kadackal', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 516, 'Siyad', 'CUS-5-0516', '5', ''),
('Godvin Automobiles Ammannada', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 517, 'Siyad', 'CUS-5-0517', '5', ''),
('Gramasree (Ajith)', NULL, NULL, NULL, NULL, NULL, '385', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 518, 'Siyad', 'CUS-5-0518', '5', ''),
('Grand Motors  Kottiyam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 519, 'Siyad', 'CUS-5-0519', '5', ''),
('GREAT ENGINEERING POLAYATHODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 520, 'Siyad', 'CUS-5-0520', '5', ''),
('Green Motors  Manapally', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 521, 'Siyad', 'CUS-5-0521', '5', ''),
('GREENVALLY AUTOMOBILES NELLIKUNNU', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 522, 'Siyad', 'CUS-5-0522', '5', ''),
('GULF MOTORS KANNANALOOR', NULL, NULL, NULL, NULL, NULL, '1506', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 523, 'Siyad', 'CUS-5-0523', '5', ''),
('HARI MARUTHADY', NULL, NULL, NULL, NULL, NULL, '1460', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 524, 'Siyad', 'CUS-5-0524', '5', ''),
('HELP MATE MARUTI SERVICE KOTTIYAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 525, 'Siyad', 'CUS-5-0525', '5', ''),
('HI-TECH AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '128', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 526, 'Siyad', 'CUS-5-0526', '5', ''),
('HI-TECH KADAMBANADU', NULL, NULL, NULL, NULL, NULL, '2558.04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 527, 'Siyad', 'CUS-5-0527', '5', ''),
('H M AUTO CARE (CHANDANATHOPE)', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 528, 'Siyad', 'CUS-5-0528', '5', ''),
('HOLY CRANK AUTO MOTIVES', NULL, NULL, NULL, NULL, NULL, '26421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 529, 'Siyad', 'CUS-5-0529', '5', ''),
('Hussain', NULL, NULL, NULL, NULL, NULL, '327', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 530, 'Siyad', 'CUS-5-0530', '5', ''),
('IBIS AUTOMOBILES (KUNDARA)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 531, 'Siyad', 'CUS-5-0531', '5', ''),
('IDEAL AUTO GAEAGE KANETTIPALAM', NULL, NULL, NULL, NULL, NULL, '2580', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 532, 'Siyad', 'CUS-5-0532', '5', ''),
('Ideal Two Wheeler Works(Jayesh)', NULL, NULL, NULL, NULL, NULL, '1255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 533, 'Siyad', 'CUS-5-0533', '5', ''),
('Indian Spare Parts  Varkala', NULL, NULL, NULL, NULL, NULL, '22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 534, 'Siyad', 'CUS-5-0534', '5', ''),
('International Auto Garage Kundara', NULL, NULL, NULL, NULL, NULL, '71', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 535, 'Siyad', 'CUS-5-0535', '5', ''),
('JACOB KALLUVETTAMKUZHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 536, 'Siyad', 'CUS-5-0536', '5', ''),
('James', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 537, 'Siyad', 'CUS-5-0537', '5', ''),
('JANASEVANAM AUTOS PUNTHALATHAZHAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 538, 'Siyad', 'CUS-5-0538', '5', ''),
('JANATHA GARAGE MADANNADA', NULL, NULL, NULL, NULL, NULL, '746', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 539, 'Siyad', 'CUS-5-0539', '5', ''),
('JANATHA GARAGE OPP.RAMRAJ THEATRE PUNALUR', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 540, 'Siyad', 'CUS-5-0540', '5', ''),
('JAYAKUMAR KUZHIYAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 541, 'Siyad', 'CUS-5-0541', '5', ''),
('Jithin  Adichanalloor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 542, 'Siyad', 'CUS-5-0542', '5', ''),
('J.R Automobiles', NULL, NULL, NULL, NULL, NULL, '63', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 543, 'Siyad', 'CUS-5-0543', '5', ''),
('KABEER JAREENA -KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 544, 'Siyad', 'CUS-5-0544', '5', ''),
('KAILIAN HARDWARE VADDY', NULL, NULL, NULL, NULL, NULL, '930', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 545, 'Siyad', 'CUS-5-0545', '5', ''),
('KARTHIKA AUTOMOBILES GARAGE East Kallada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 546, 'Siyad', 'CUS-5-0546', '5', ''),
('Karthik Two Wheeler Mamoodu', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 547, 'Siyad', 'CUS-5-0547', '5', ''),
('Karunya Two Wheeler', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 548, 'Siyad', 'CUS-5-0548', '5', ''),
('KASHINATHAN AUTO GARAGE (Kallambalam)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 549, 'Siyad', 'CUS-5-0549', '5', ''),
('Kerala Auto Garage Pukkulam', NULL, NULL, NULL, NULL, NULL, '4550', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 550, 'Siyad', 'CUS-5-0550', '5', ''),
('Kerala Auto Mobiles Mamoodu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 551, 'Siyad', 'CUS-5-0551', '5', ''),
('KMA MOTORS POOYAPPALLY', NULL, NULL, NULL, NULL, NULL, '2090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 552, 'Siyad', 'CUS-5-0552', '5', ''),
('Kollam Royal Enfield  East  Kllada', NULL, NULL, NULL, NULL, NULL, '49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 553, 'Siyad', 'CUS-5-0553', '5', ''),
('KRISHNA AUTOMOBILES ETHIKARA ROAD OYOOR', NULL, NULL, NULL, NULL, NULL, '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 554, 'Siyad', 'CUS-5-0554', '5', ''),
('KUMAR AUTO GARAGE KUREEPUZHA', NULL, NULL, NULL, NULL, NULL, '6492', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 555, 'Siyad', 'CUS-5-0555', '5', ''),
('KUMAR CYLINDER BORING WORK SHOP MADANNADA', NULL, NULL, NULL, NULL, NULL, '7485', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 556, 'Siyad', 'CUS-5-0556', '5', ''),
('LAL AUTO GARAGE CHITHARA', NULL, NULL, NULL, NULL, NULL, '5483', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 557, 'Siyad', 'CUS-5-0557', '5', ''),
('Lal Kallambalam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 558, 'Siyad', 'CUS-5-0558', '5', ''),
('Lenoir  Automobiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 559, 'Siyad', 'CUS-5-0559', '5', ''),
('M4 MECH KALLAUMTAZHAM', NULL, NULL, NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 560, 'Siyad', 'CUS-5-0560', '5', ''),
('MANI KANNANKULANGARA EDAPPALICOTTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 561, 'Siyad', 'CUS-5-0561', '5', ''),
('Mani Motor Works (Manikandan)', NULL, NULL, NULL, NULL, NULL, '179', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 562, 'Siyad', 'CUS-5-0562', '5', ''),
('Manoj Bullet', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 563, 'Siyad', 'CUS-5-0563', '5', ''),
('MANOJ TRUCKZ MOTOR KAVANADU', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 564, 'Siyad', 'CUS-5-0564', '5', ''),
('Master\'s Auto Makers', NULL, NULL, NULL, NULL, NULL, '182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 565, 'Siyad', 'CUS-5-0565', '5', ''),
('MAX BULLET WORKSHOP ANCHALUMOOD', NULL, NULL, NULL, NULL, NULL, '16999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 566, 'Siyad', 'CUS-5-0566', '5', ''),
('MECH AND TECH FRIENDS CHERUNNIYOOR', NULL, NULL, NULL, NULL, NULL, '3814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 567, 'Siyad', 'CUS-5-0567', '5', ''),
('Meenus Auto Center', NULL, NULL, NULL, NULL, NULL, '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 568, 'Siyad', 'CUS-5-0568', '5', ''),
('Mk Automobiles Kannankulangara Panmana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 569, 'Siyad', 'CUS-5-0569', '5', ''),
('MOHAN\'S TWO WHEELER  KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '16440', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 570, 'Siyad', 'CUS-5-0570', '5', ''),
('MOON STAR AUTO GARAGE MOONAMKUTTY', NULL, NULL, NULL, NULL, NULL, '10410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 571, 'Siyad', 'CUS-5-0571', '5', ''),
('MOTO DOC TWO WHEELER WORKS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 572, 'Siyad', 'CUS-5-0572', '5', ''),
('MOTO GARAGE ODANAVATTOM', NULL, NULL, NULL, NULL, NULL, '586', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 573, 'Siyad', 'CUS-5-0573', '5', ''),
('Moto Tech Bullet', NULL, NULL, NULL, NULL, NULL, '102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 574, 'Siyad', 'CUS-5-0574', '5', ''),
('M.P.M SPARE PARTS TWO WHEELER WORKSHOP CHEMKULAM OY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 575, 'Siyad', 'CUS-5-0575', '5', ''),
('M R  Auto Consultant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 576, 'Siyad', 'CUS-5-0576', '5', ''),
('M R Traders (Rajendran)', NULL, NULL, NULL, NULL, NULL, '90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 577, 'Siyad', 'CUS-5-0577', '5', ''),
('MR Y UK CARBON CLEAN & CAR DETAILING', NULL, NULL, NULL, NULL, NULL, '2845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 578, 'Siyad', 'CUS-5-0578', '5', ''),
('M.S AUTO SPARES THATTAMALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 579, 'Siyad', 'CUS-5-0579', '5', ''),
('M S Spares Kallumthazham', NULL, NULL, NULL, NULL, NULL, '119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 580, 'Siyad', 'CUS-5-0580', '5', ''),
('M.S TWO WHEELER AUTO SPARES AND ACCESSORIES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 581, 'Siyad', 'CUS-5-0581', '5', ''),
('M S TWO WHEELER VARKALA TOWN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 582, 'Siyad', 'CUS-5-0582', '5', ''),
('Muneer', NULL, NULL, NULL, NULL, NULL, '1076', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 583, 'Siyad', 'CUS-5-0583', '5', ''),
('Nandanam Two Wheeler Vallikkavu', NULL, NULL, NULL, NULL, NULL, '3960', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 584, 'Siyad', 'CUS-5-0584', '5', ''),
('NEPOLEAN AUTO MOBILES KUDIKODE', NULL, NULL, NULL, NULL, NULL, '368', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 585, 'Siyad', 'CUS-5-0585', '5', ''),
('New Anjaneya Auto Garage(Ravi)', NULL, NULL, NULL, NULL, NULL, '627', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 586, 'Siyad', 'CUS-5-0586', '5', ''),
('NEW GEN MOTORS BYPASS KALLUMTHAZHAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 587, 'Siyad', 'CUS-5-0587', '5', ''),
('NEW KARUNA KERALAPURAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 588, 'Siyad', 'CUS-5-0588', '5', ''),
('New Riders Modification Works Karicode', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 589, 'Siyad', 'CUS-5-0589', '5', ''),
('New Skill Tech(Mamood)', NULL, NULL, NULL, NULL, NULL, '97', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 590, 'Siyad', 'CUS-5-0590', '5', ''),
('NEW TECH SERVICE CENTER PERUMPUZHA KUNDARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 591, 'Siyad', 'CUS-5-0591', '5', ''),
('Nibu  Auto Garage - Mammoodu', NULL, NULL, NULL, NULL, NULL, '1620', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 592, 'Siyad', 'CUS-5-0592', '5', ''),
('N.S.M AUTO GARAGE VALLIKKEEZHU', NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 593, 'Siyad', 'CUS-5-0593', '5', ''),
('Omanakuttan Kilimannoor', NULL, NULL, NULL, NULL, NULL, '5940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 594, 'Siyad', 'CUS-5-0594', '5', ''),
('OMSAKTHI ATTNGAL', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 595, 'Siyad', 'CUS-5-0595', '5', ''),
('OVER SEAS GAREGE ADICHANALLOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 596, 'Siyad', 'CUS-5-0596', '5', ''),
('PADINJATTATHIL AUTOMOBILES ODANAVATTOM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 597, 'Siyad', 'CUS-5-0597', '5', ''),
('PANCHAMY AUTOMOBILE  WORKSHOP  PEROOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 598, 'Siyad', 'CUS-5-0598', '5', ''),
('PHOENIX AUTOCARE PATHANAPURAM', NULL, NULL, NULL, NULL, NULL, '248', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 599, 'Siyad', 'CUS-5-0599', '5', ''),
('PHOENIX AUTO MOBILES AYOOR', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 600, 'Siyad', 'CUS-5-0600', '5', ''),
('Planet Motor Spares Alamcode', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 601, 'Siyad', 'CUS-5-0601', '5', ''),
('PONNU KICHU BULLET, VATTAVILA, PALLIMON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 602, 'Siyad', 'CUS-5-0602', '5', ''),
('PRAKASH THOTTATHILMUKKU PUNNOLIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 603, 'Siyad', 'CUS-5-0603', '5', ''),
('PRAMOD ASRAMAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 604, 'Siyad', 'CUS-5-0604', '5', ''),
('PRAMOD CAR CARE PALATHARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 605, 'Siyad', 'CUS-5-0605', '5', ''),
('PRASAD KAPPALANDYMUKKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 606, 'Siyad', 'CUS-5-0606', '5', ''),
('PRAVASI AUTOMOBILES DECENT JN.', NULL, NULL, NULL, NULL, NULL, '250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 607, 'Siyad', 'CUS-5-0607', '5', ''),
('PRESIDENT FDWCSDF(Q)42/92 VADDY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 608, 'Siyad', 'CUS-5-0608', '5', ''),
('PRINCE AUTO GARAGE', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 609, 'Siyad', 'CUS-5-0609', '5', ''),
('Puthenveetil Automobiles', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 610, 'Siyad', 'CUS-5-0610', '5', ''),
('Q BAGS  PVT LTD KUDIKODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 611, 'Siyad', 'CUS-5-0611', '5', ''),
('QUICK CARE AUTO POINT ANCHAL', NULL, NULL, NULL, NULL, NULL, '7435', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 612, 'Siyad', 'CUS-5-0612', '5', ''),
('QUILON AUTO GARAGE THAMARAKKULAM', NULL, NULL, NULL, NULL, NULL, '740', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 613, 'Siyad', 'CUS-5-0613', '5', ''),
('RAJAN TWO WHEELER (RENJITH) Bharanicavu', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 614, 'Siyad', 'CUS-5-0614', '5', ''),
('RAJEEV TWO WHEELERS VARKKALA', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 615, 'Siyad', 'CUS-5-0615', '5', ''),
('RAMS SPARES OACHIRA', NULL, NULL, NULL, NULL, NULL, '5423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 616, 'Siyad', 'CUS-5-0616', '5', ''),
('RANEEF AUTOMOBILES(HAKKIM )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 617, 'Siyad', 'CUS-5-0617', '5', ''),
('RAS AUTO\'S CHANGANKULANGARA', NULL, NULL, NULL, NULL, NULL, '10793', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 618, 'Siyad', 'CUS-5-0618', '5', ''),
('RESHMI MOTORS KOTTIYAM', NULL, NULL, NULL, NULL, NULL, '7544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 619, 'Siyad', 'CUS-5-0619', '5', ''),
('Riders  Two Wheeler  Works', NULL, NULL, NULL, NULL, NULL, '2885', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 620, 'Siyad', 'CUS-5-0620', '5', ''),
('Royal Automobiles Kottiyam', NULL, NULL, NULL, NULL, NULL, '3086', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 621, 'Siyad', 'CUS-5-0621', '5', ''),
('Roy Mundakkal', NULL, NULL, NULL, NULL, NULL, '340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 622, 'Siyad', 'CUS-5-0622', '5', ''),
('R S AUTOMOBILE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 623, 'Siyad', 'CUS-5-0623', '5', ''),
('Sagariga Automobiles(Shine)', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 624, 'Siyad', 'CUS-5-0624', '5', ''),
('Sajeev Keralapuram', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 625, 'Siyad', 'CUS-5-0625', '5', ''),
('SAJEEV  MARUTHADI', NULL, NULL, NULL, NULL, NULL, '377', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 626, 'Siyad', 'CUS-5-0626', '5', ''),
('Samad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 627, 'Siyad', 'CUS-5-0627', '5', ''),
('SANJUS BULLET HOUSE', NULL, NULL, NULL, NULL, NULL, '3616', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 628, 'Siyad', 'CUS-5-0628', '5', ''),
('Sankaranarayana Two Wheeler', NULL, NULL, NULL, NULL, NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 629, 'Siyad', 'CUS-5-0629', '5', ''),
('SANTHOSH ALAMCODE', NULL, NULL, NULL, NULL, NULL, '30014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 630, 'Siyad', 'CUS-5-0630', '5', ''),
('Selvan Auto Garage', NULL, NULL, NULL, NULL, NULL, '450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 631, 'Siyad', 'CUS-5-0631', '5', ''),
('Shalom Two Wheeler Works Veliyam', NULL, NULL, NULL, NULL, NULL, '865', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 632, 'Siyad', 'CUS-5-0632', '5', ''),
('Shan Kannanalloor', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 633, 'Siyad', 'CUS-5-0633', '5', ''),
('Shanthi Kollam', NULL, NULL, NULL, NULL, NULL, '1001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 634, 'Siyad', 'CUS-5-0634', '5', ''),
('Shibu Perumpuzha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 635, 'Siyad', 'CUS-5-0635', '5', ''),
('Shiju Anchalumood', NULL, NULL, NULL, NULL, NULL, '131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 636, 'Siyad', 'CUS-5-0636', '5', ''),
('SHIVADHAM AUTO GARAGE UMAYANALLOOR', NULL, NULL, NULL, NULL, NULL, '1997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 637, 'Siyad', 'CUS-5-0637', '5', ''),
('Sivan Auto Centre  Town Limit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 638, 'Siyad', 'CUS-5-0638', '5', ''),
('Sivan Auto Mobiles Padappanal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 639, 'Siyad', 'CUS-5-0639', '5', ''),
('SIVARAM AUTO SPARES KUREEPUZHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 640, 'Siyad', 'CUS-5-0640', '5', ''),
('SIVA SANJU TWO WHEELER ODANAVATTOM', NULL, NULL, NULL, NULL, NULL, '210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 641, 'Siyad', 'CUS-5-0641', '5', ''),
('SIVASILAM AUTOMOBILES KUREEPALLY', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 642, 'Siyad', 'CUS-5-0642', '5', '');
INSERT INTO `customer` (`customer_name`, `mobile`, `email`, `gst_number`, `tax_number`, `credit_limit`, `previous_due`, `address`, `city`, `state`, `postcode`, `country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `ship_country`, `price_level`, `price_leveltype`, `created_at`, `updated_at`, `status`, `id`, `created_by`, `customer_id`, `store_id`, `sale_executive_id`) VALUES
('SIYAD STAFF', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 643, 'Siyad', 'CUS-5-0643', '5', ''),
('S K AUTO GARAGE KUTTICHIRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 644, 'Siyad', 'CUS-5-0644', '5', ''),
('SKILLTECH TWO WHEELER WORKS  PARIPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 645, 'Siyad', 'CUS-5-0645', '5', ''),
('S M Sha(Ayathil)', NULL, NULL, NULL, NULL, NULL, '465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 646, 'Siyad', 'CUS-5-0646', '5', ''),
('S.N AUTO GARAGE ANCHALUMOODU', NULL, NULL, NULL, NULL, NULL, '5810', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 647, 'Siyad', 'CUS-5-0647', '5', ''),
('Speed Bay Auto Garage(Thattamala)', NULL, NULL, NULL, NULL, NULL, '9148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 648, 'Siyad', 'CUS-5-0648', '5', ''),
('SPEEDTECH CHAKKUVALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 649, 'Siyad', 'CUS-5-0649', '5', ''),
('S.R Automobiles Bharanicavu', NULL, NULL, NULL, NULL, NULL, '16748', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 650, 'Siyad', 'CUS-5-0650', '5', ''),
('Sreehari   Motors  Bypass', NULL, NULL, NULL, NULL, NULL, '392', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 651, 'Siyad', 'CUS-5-0651', '5', ''),
('SREE HARI MOTORS KOTTANKULANGARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 652, 'Siyad', 'CUS-5-0652', '5', ''),
('Sreekrishna Automobile Workshop Chithara', NULL, NULL, NULL, NULL, NULL, '77', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 653, 'Siyad', 'CUS-5-0653', '5', ''),
('SREE MURARI AUTO GARGE MUKATHALA', NULL, NULL, NULL, NULL, NULL, '2050', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 654, 'Siyad', 'CUS-5-0654', '5', ''),
('SREE TWO WHEELER WORK VARAVILA', NULL, NULL, NULL, NULL, NULL, '21998', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 655, 'Siyad', 'CUS-5-0655', '5', ''),
('S.R.V Two Wheeler Mathilil', NULL, NULL, NULL, NULL, NULL, '375', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 656, 'Siyad', 'CUS-5-0656', '5', ''),
('S S Auto Garage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 657, 'Siyad', 'CUS-5-0657', '5', ''),
('S.S AUTO GARAGE NALLILA', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 658, 'Siyad', 'CUS-5-0658', '5', ''),
('SS LUBE SHOP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 659, 'Siyad', 'CUS-5-0659', '5', ''),
('S.S PAINTING WORKES AYATHIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 660, 'Siyad', 'CUS-5-0660', '5', ''),
('SUJITH(MANPPALLY)', NULL, NULL, NULL, NULL, NULL, '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 661, 'Siyad', 'CUS-5-0661', '5', ''),
('SUNIL AUTO GARAGE KOTTIYAM', NULL, NULL, NULL, NULL, NULL, '34300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 662, 'Siyad', 'CUS-5-0662', '5', ''),
('SUNIL MOTORS VAVVAKAVU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 663, 'Siyad', 'CUS-5-0663', '5', ''),
('Suresh Auto Care Keralapuram', NULL, NULL, NULL, NULL, NULL, '21733', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 664, 'Siyad', 'CUS-5-0664', '5', ''),
('Syams Varkkala', NULL, NULL, NULL, NULL, NULL, '3917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 665, 'Siyad', 'CUS-5-0665', '5', ''),
('Tata Auto Care', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 666, 'Siyad', 'CUS-5-0666', '5', ''),
('Techno Vavvakkavu C/o S R Bharanacavu', NULL, NULL, NULL, NULL, NULL, '5738', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 667, 'Siyad', 'CUS-5-0667', '5', ''),
('THEERTHA AUTO GARAGE BYPASS KOLLAM', NULL, NULL, NULL, NULL, NULL, '452', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 668, 'Siyad', 'CUS-5-0668', '5', ''),
('Thundil Motors', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 669, 'Siyad', 'CUS-5-0669', '5', ''),
('Torq Auto Solution Keralapuram', NULL, NULL, NULL, NULL, NULL, '12211', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 670, 'Siyad', 'CUS-5-0670', '5', ''),
('TYRE PALACE POLAYATHODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 671, 'Siyad', 'CUS-5-0671', '5', ''),
('Tyre Town (Andamukkam)', NULL, NULL, NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 672, 'Siyad', 'CUS-5-0672', '5', ''),
('Union Garage (Jayan)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 673, 'Siyad', 'CUS-5-0673', '5', ''),
('Unni Krishnan C/o Prince  Mynagappally', NULL, NULL, NULL, NULL, NULL, '837', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 674, 'Siyad', 'CUS-5-0674', '5', ''),
('VALIYA VEETIL MOTORS [SABU] PARAVOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 675, 'Siyad', 'CUS-5-0675', '5', ''),
('Vignesh Auto Garage Mampuzha', NULL, NULL, NULL, NULL, NULL, '1260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 676, 'Siyad', 'CUS-5-0676', '5', ''),
('Vigneswara Auto Garage Oyoor', NULL, NULL, NULL, NULL, NULL, '280', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 677, 'Siyad', 'CUS-5-0677', '5', ''),
('Vijaya Motor Works  Karunagapally', NULL, NULL, NULL, NULL, NULL, '1380', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 678, 'Siyad', 'CUS-5-0678', '5', ''),
('VIJAYAN VARKKALA', NULL, NULL, NULL, NULL, NULL, '67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 679, 'Siyad', 'CUS-5-0679', '5', ''),
('VINAYAGA AUTO GARAGE  BEACH ROAD KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 680, 'Siyad', 'CUS-5-0680', '5', ''),
('VINAYAKA AUTO GARAGE ATTINGAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 681, 'Siyad', 'CUS-5-0681', '5', ''),
('Vishnu Nandanam Two Wheeler Works', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 682, 'Siyad', 'CUS-5-0682', '5', ''),
('VISHNU TWO WHEELER PARIPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 683, 'Siyad', 'CUS-5-0683', '5', ''),
('VI-TECH BI-WHEELZ THIRUMULLAVARAM', NULL, NULL, NULL, NULL, NULL, '1715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 684, 'Siyad', 'CUS-5-0684', '5', ''),
('VIVEK AUTO GAREGE PUTHUCHIRA', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 685, 'Siyad', 'CUS-5-0685', '5', ''),
('V.J TWO WHEELER', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 686, 'Siyad', 'CUS-5-0686', '5', ''),
('Vrinda Automobiles(Sajeev)', NULL, NULL, NULL, NULL, NULL, '471.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 687, 'Siyad', 'CUS-5-0687', '5', ''),
('V.S Two Wheeler Garage(Vijayan)', NULL, NULL, NULL, NULL, NULL, '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 688, 'Siyad', 'CUS-5-0688', '5', ''),
('V TECH AUTO CARE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 689, 'Siyad', 'CUS-5-0689', '5', ''),
('WASHING TOWN CAR WASH ASHTTAMUDIMUKKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 690, 'Siyad', 'CUS-5-0690', '5', ''),
('We Care Auto Garage Thazhuthala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 691, 'Siyad', 'CUS-5-0691', '5', ''),
('WE TECH AUTO CARE KANIYAMTHODE MUKATHALA', NULL, NULL, NULL, NULL, NULL, '8150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 692, 'Siyad', 'CUS-5-0692', '5', ''),
('Zero Two Garage Pallimukku', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 693, 'Siyad', 'CUS-5-0693', '5', ''),
('BULLET POINT VALIYAVILA , UCHAKKADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 694, 'SREENI', 'CUS-5-0694', '5', ''),
('DIYA TWO WHEELER VIZHINJAM ROAD KOVALAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 695, 'SREENI', 'CUS-5-0695', '5', ''),
('Kairali Automobiles -Valiyathara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 696, 'SREENI', 'CUS-5-0696', '5', ''),
('SIGNATURE AUTOMOBILES PRAVACHAMBALAM PALLICHAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 697, 'SREENI', 'CUS-5-0697', '5', ''),
('SREE VINAYAKA KAZHAKKOOTTAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 698, 'SREENI', 'CUS-5-0698', '5', ''),
('S.S AUTOMOBILES KATTAKADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 699, 'SREENI', 'CUS-5-0699', '5', ''),
('THE BIKE ZONE NETTAYAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 700, 'SREENI', 'CUS-5-0700', '5', ''),
('3D-K- ROSA ROJA, KILIMANOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 701, 'Vaishak', 'CUS-5-0701', '5', ''),
('4 B Automobiles', NULL, NULL, NULL, NULL, NULL, '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 702, 'Vaishak', 'CUS-5-0702', '5', ''),
('Agesh Anchal', NULL, NULL, NULL, NULL, NULL, '114', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 703, 'Vaishak', 'CUS-5-0703', '5', ''),
('A.H.S APE MAINTANCE WORKS RAMANKULANGARA', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 704, 'Vaishak', 'CUS-5-0704', '5', ''),
('AISWARYA TRADERS THUMBODU', NULL, NULL, NULL, NULL, NULL, '141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 705, 'Vaishak', 'CUS-5-0705', '5', ''),
('Aiswarya Two Wheeler Injakad', NULL, NULL, NULL, NULL, NULL, '85', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 706, 'Vaishak', 'CUS-5-0706', '5', ''),
('AL-NAYIF HITECH AUTOMOBLIES KOTTIYAM', NULL, NULL, NULL, NULL, NULL, '4025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 707, 'Vaishak', 'CUS-5-0707', '5', ''),
('AMBADY TWO WHEELER KIZHAKKANELA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 708, 'Vaishak', 'CUS-5-0708', '5', ''),
('A M F A   MECH LLP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 709, 'Vaishak', 'CUS-5-0709', '5', ''),
('AMMU EXIDE SHOP KUNNIKODU KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 710, 'Vaishak', 'CUS-5-0710', '5', ''),
('ANANDA AUTO GARAGE KUNDARA', NULL, NULL, NULL, NULL, NULL, '9360', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 711, 'Vaishak', 'CUS-5-0711', '5', ''),
('A N CONSTRUCTION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 712, 'Vaishak', 'CUS-5-0712', '5', ''),
('ANIL TWO WHEELER PARIPPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 713, 'Vaishak', 'CUS-5-0713', '5', ''),
('Annapoorna Paultry Farm Kulathupuzha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 714, 'Vaishak', 'CUS-5-0714', '5', ''),
('A R ENFIELD AUTOSPARES AND LUBRICANT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 715, 'Vaishak', 'CUS-5-0715', '5', ''),
('Arun Motor Works(Punalur)', NULL, NULL, NULL, NULL, NULL, '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 716, 'Vaishak', 'CUS-5-0716', '5', ''),
('ARZENAL -KUNDRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 717, 'Vaishak', 'CUS-5-0717', '5', ''),
('A S Auto Electrical Works Anchal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 718, 'Vaishak', 'CUS-5-0718', '5', ''),
('A.S AUTO PARTS AYIRAKUZHI CHITHARA', NULL, NULL, NULL, NULL, NULL, '547', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 719, 'Vaishak', 'CUS-5-0719', '5', ''),
('A.S Autoparts Nedungolam', NULL, NULL, NULL, NULL, NULL, '245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 720, 'Vaishak', 'CUS-5-0720', '5', ''),
('A.S AUTO SPARES ODANAVATTOM', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 721, 'Vaishak', 'CUS-5-0721', '5', ''),
('ASHWATHY AUTOMOBILES PUNALOOR', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 722, 'Vaishak', 'CUS-5-0722', '5', ''),
('A.S INDUSTRIES MEEYANNOOR', NULL, NULL, NULL, NULL, NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 723, 'Vaishak', 'CUS-5-0723', '5', ''),
('A S MOTORS KOTTARAKARA INCHAKADU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 724, 'Vaishak', 'CUS-5-0724', '5', ''),
('AUTO CARE KULATHUPUZHA', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 725, 'Vaishak', 'CUS-5-0725', '5', ''),
('AUTOCAT AUTOMOTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 726, 'Vaishak', 'CUS-5-0726', '5', ''),
('AUTO CRAFT NILAMEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 727, 'Vaishak', 'CUS-5-0727', '5', ''),
('Autos Automobiles (Anchal)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 728, 'Vaishak', 'CUS-5-0728', '5', ''),
('Autos Spares Agasthyakode, Anchal', NULL, NULL, NULL, NULL, NULL, '3743', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 729, 'Vaishak', 'CUS-5-0729', '5', ''),
('AUTO TECH SPARE PARTS SHOP VELIYAM', NULL, NULL, NULL, NULL, NULL, '145', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 730, 'Vaishak', 'CUS-5-0730', '5', ''),
('Ayoob (Kottarakkara)', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 731, 'Vaishak', 'CUS-5-0731', '5', ''),
('BADRI SPARE PARTS ANCHAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 732, 'Vaishak', 'CUS-5-0732', '5', ''),
('BAIJU ANCHAL', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 733, 'Vaishak', 'CUS-5-0733', '5', ''),
('Bike Point Spare Parts Kadambanad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 734, 'Vaishak', 'CUS-5-0734', '5', ''),
('B.J AUTOMOBILES MC ROAD KULAKKADA ENATH', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 735, 'Vaishak', 'CUS-5-0735', '5', ''),
('Blulit Energy Solutions Private Limited', NULL, NULL, NULL, NULL, NULL, '10078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 736, 'Vaishak', 'CUS-5-0736', '5', ''),
('BREEZE AUTOMECH MECKON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 737, 'Vaishak', 'CUS-5-0737', '5', ''),
('BRIGHT AUTO ELECTRICAL ANCHAL', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 738, 'Vaishak', 'CUS-5-0738', '5', ''),
('BRIGHT MOTORS KILLIMANOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 739, 'Vaishak', 'CUS-5-0739', '5', ''),
('BROTHERS ANCHAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 740, 'Vaishak', 'CUS-5-0740', '5', ''),
('Brothers Auto Garage Madavoor', NULL, NULL, NULL, NULL, NULL, '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 741, 'Vaishak', 'CUS-5-0741', '5', ''),
('BROTHERS TWO WHEELER SPARES THATTAMALA', NULL, NULL, NULL, NULL, NULL, '6767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 742, 'Vaishak', 'CUS-5-0742', '5', ''),
('B.S AGENCIES KILIKOLLOOR', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 743, 'Vaishak', 'CUS-5-0743', '5', ''),
('CAR MAGIC CAR ACCESSORIES KOCHUPILAMOODU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 744, 'Vaishak', 'CUS-5-0744', '5', ''),
('CAR MAN CHADAYAMANGALAM AYOOR', NULL, NULL, NULL, NULL, NULL, '2887', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 745, 'Vaishak', 'CUS-5-0745', '5', ''),
('CAR MECH AYOOR', NULL, NULL, NULL, NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 746, 'Vaishak', 'CUS-5-0746', '5', ''),
('CAR POINT POOVATHOOR', NULL, NULL, NULL, NULL, NULL, '3467', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 747, 'Vaishak', 'CUS-5-0747', '5', ''),
('Chandrashekar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 748, 'Vaishak', 'CUS-5-0748', '5', ''),
('CLEAN & CARE AUTO SPA KALLAMBHALAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 749, 'Vaishak', 'CUS-5-0749', '5', ''),
('DEV AUTO TECH KOTTARAKKARA', NULL, NULL, NULL, NULL, NULL, '45240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 750, 'Vaishak', 'CUS-5-0750', '5', ''),
('DEVI AGENCIES ASRAMAM', NULL, NULL, NULL, NULL, NULL, '9275', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 751, 'Vaishak', 'CUS-5-0751', '5', ''),
('DEVI AUTOMOBILES  KUNDARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 752, 'Vaishak', 'CUS-5-0752', '5', ''),
('Devi Automobiles Puthoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 753, 'Vaishak', 'CUS-5-0753', '5', ''),
('D G Motors Vilakkudy', NULL, NULL, NULL, NULL, NULL, '303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 754, 'Vaishak', 'CUS-5-0754', '5', ''),
('EXPO MOTOR CYCLE SPARES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 755, 'Vaishak', 'CUS-5-0755', '5', ''),
('FAIR  AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '10052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 756, 'Vaishak', 'CUS-5-0756', '5', ''),
('Falkon Automotive Adoor', NULL, NULL, NULL, NULL, NULL, '54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 757, 'Vaishak', 'CUS-5-0757', '5', ''),
('FATHIMA AUTO SPARE NELLIMUKKU', NULL, NULL, NULL, NULL, NULL, '5148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 758, 'Vaishak', 'CUS-5-0758', '5', ''),
('FOREMAN KADAKKAL', NULL, NULL, NULL, NULL, NULL, '148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 759, 'Vaishak', 'CUS-5-0759', '5', ''),
('Galaxy Four Wheeler Bharanikavu Road Chakkuvally', NULL, NULL, NULL, NULL, NULL, '330', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 760, 'Vaishak', 'CUS-5-0760', '5', ''),
('Ganapathy Two Wheeler Enath', NULL, NULL, NULL, NULL, NULL, '110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 761, 'Vaishak', 'CUS-5-0761', '5', ''),
('Ganga Motor Works', NULL, NULL, NULL, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 762, 'Vaishak', 'CUS-5-0762', '5', ''),
('G.B TRADER\'S KOTTAMUKKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 763, 'Vaishak', 'CUS-5-0763', '5', ''),
('Ginu Power Thumbode', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 764, 'Vaishak', 'CUS-5-0764', '5', ''),
('GLOWMAX  ADOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 765, 'Vaishak', 'CUS-5-0765', '5', ''),
('G.M SPARES PLAVILAYIL KAITHAPARAMBU PO.ENATHU', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 766, 'Vaishak', 'CUS-5-0766', '5', ''),
('HARITHA BENZ AUTOMBILES OYOOR', NULL, NULL, NULL, NULL, NULL, '1746', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 767, 'Vaishak', 'CUS-5-0767', '5', ''),
('HINDUSTAN RADIATORS & BATTERIES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 768, 'Vaishak', 'CUS-5-0768', '5', ''),
('HI TECH AUTOMOBILES EZHUKONE', NULL, NULL, NULL, NULL, NULL, '3492', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 769, 'Vaishak', 'CUS-5-0769', '5', ''),
('HONDA AUTO GAREGE CHAMAKKADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 770, 'Vaishak', 'CUS-5-0770', '5', ''),
('H V Hardware (Fasaludheen)', NULL, NULL, NULL, NULL, NULL, '330', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 771, 'Vaishak', 'CUS-5-0771', '5', ''),
('IDEAL AUTO SPARES AMMACHIVEEDU', NULL, NULL, NULL, NULL, NULL, '2856', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 772, 'Vaishak', 'CUS-5-0772', '5', ''),
('Indian  Motors Exports & Imports Co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 773, 'Vaishak', 'CUS-5-0773', '5', ''),
('INFINITY MULAVANA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 774, 'Vaishak', 'CUS-5-0774', '5', ''),
('J . J AUTO SPARES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 775, 'Vaishak', 'CUS-5-0775', '5', ''),
('J K Automobiles', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 776, 'Vaishak', 'CUS-5-0776', '5', ''),
('J.R TWO WHEELER WORKS KUNDARA', NULL, NULL, NULL, NULL, NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 777, 'Vaishak', 'CUS-5-0777', '5', ''),
('J&V Earthmovers Spare', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 778, 'Vaishak', 'CUS-5-0778', '5', ''),
('JYOTHISH PUNALUR', NULL, NULL, NULL, NULL, NULL, '348', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 779, 'Vaishak', 'CUS-5-0779', '5', ''),
('Kairali Automobile Engineering Works', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 780, 'Vaishak', 'CUS-5-0780', '5', ''),
('KAIRALI SPARES PALLIMUKKU', NULL, NULL, NULL, NULL, NULL, '7110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 781, 'Vaishak', 'CUS-5-0781', '5', ''),
('Kamar Automobiles Kollam', NULL, NULL, NULL, NULL, NULL, '14703', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 782, 'Vaishak', 'CUS-5-0782', '5', ''),
('KARALIL AUTO SPARES KAPPALANDIMUKKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 783, 'Vaishak', 'CUS-5-0783', '5', ''),
('KASHI  FOOT WEAR & FANCY', NULL, NULL, NULL, NULL, NULL, '18074', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 784, 'Vaishak', 'CUS-5-0784', '5', ''),
('K C Auto Spa Kareette', NULL, NULL, NULL, NULL, NULL, '2275', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 785, 'Vaishak', 'CUS-5-0785', '5', ''),
('KEERTHI AUTO SPARE BHARANIKKAVU', NULL, NULL, NULL, NULL, NULL, '35412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 786, 'Vaishak', 'CUS-5-0786', '5', ''),
('K F K Traders Ambalamkunnu', NULL, NULL, NULL, NULL, NULL, '4988', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 787, 'Vaishak', 'CUS-5-0787', '5', ''),
('KHAN AUTO SPARE & MOBILES OYOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 788, 'Vaishak', 'CUS-5-0788', '5', ''),
('KILITHATTIL MARGIN FREE LUBE SHOP', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 789, 'Vaishak', 'CUS-5-0789', '5', ''),
('KITTU\'S AUTO SPARES KODALIMUKKU', NULL, NULL, NULL, NULL, NULL, '388', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 790, 'Vaishak', 'CUS-5-0790', '5', ''),
('K&K  AUTO MOBILES PAZHAYEROOR', NULL, NULL, NULL, NULL, NULL, '2499', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 791, 'Vaishak', 'CUS-5-0791', '5', ''),
('K.K.V AGENCIES MUKATHALA', NULL, NULL, NULL, NULL, NULL, '6158', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 792, 'Vaishak', 'CUS-5-0792', '5', ''),
('KOTTAKKAKAM TYRE ILLAM', NULL, NULL, NULL, NULL, NULL, '4608', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 793, 'Vaishak', 'CUS-5-0793', '5', ''),
('K S R Auto Parts Kottamugal', NULL, NULL, NULL, NULL, NULL, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 794, 'Vaishak', 'CUS-5-0794', '5', ''),
('K S R  PATHANAPURAM', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 795, 'Vaishak', 'CUS-5-0795', '5', ''),
('KUNNIL AUTO SPARES KADAKKAL', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 796, 'Vaishak', 'CUS-5-0796', '5', ''),
('Kunninkulangara Auto Garage Nagaroor', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 797, 'Vaishak', 'CUS-5-0797', '5', ''),
('KUZHIVELIL AUTO SPARES VANCHIMUKKU', NULL, NULL, NULL, NULL, NULL, '2452', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 798, 'Vaishak', 'CUS-5-0798', '5', ''),
('K.Y AUTOMOBILES MC ROAD AYOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 799, 'Vaishak', 'CUS-5-0799', '5', ''),
('Lalu Motors (Anchal)', NULL, NULL, NULL, NULL, NULL, '64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 800, 'Vaishak', 'CUS-5-0800', '5', ''),
('Lavanya  Automobiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 801, 'Vaishak', 'CUS-5-0801', '5', ''),
('LEKSHMI MARUTHI PUNALUR(ANEESH )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 802, 'Vaishak', 'CUS-5-0802', '5', ''),
('Ley-Tech Automobiles Perumpuzha', NULL, NULL, NULL, NULL, NULL, '33532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 803, 'Vaishak', 'CUS-5-0803', '5', ''),
('Madhu Auto Works  Palikkal ,Aaanakkunnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 804, 'Vaishak', 'CUS-5-0804', '5', ''),
('Mahadever Two Wheeler & Service  Centre', NULL, NULL, NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 805, 'Vaishak', 'CUS-5-0805', '5', ''),
('MALU TWO WHEELER SPARE AND APPOLO TYRES VARKKALA', NULL, NULL, NULL, NULL, NULL, '12722', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 806, 'Vaishak', 'CUS-5-0806', '5', ''),
('MANGALASSERY MOTOR COMPANY CHENGAMANADU KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '63', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 807, 'Vaishak', 'CUS-5-0807', '5', ''),
('MANILAL SADHANDHAPURAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 808, 'Vaishak', 'CUS-5-0808', '5', ''),
('Manjima Tyre', NULL, NULL, NULL, NULL, NULL, '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 809, 'Vaishak', 'CUS-5-0809', '5', ''),
('MANOJ KUMAR SARANYA KTR', NULL, NULL, NULL, NULL, NULL, '9120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 810, 'Vaishak', 'CUS-5-0810', '5', ''),
('Mariya Tyres Anchal', NULL, NULL, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 811, 'Vaishak', 'CUS-5-0811', '5', ''),
('Maruthi Auto Clinic  Madavoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 812, 'Vaishak', 'CUS-5-0812', '5', ''),
('MATHA TWO WHEELER WORKS PERUMPUZHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 813, 'Vaishak', 'CUS-5-0813', '5', ''),
('M C B Moto Club Spares & Accessories Kilimannoor', NULL, NULL, NULL, NULL, NULL, '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 814, 'Vaishak', 'CUS-5-0814', '5', ''),
('M K AUTO SPARES PARIPALLY', NULL, NULL, NULL, NULL, NULL, '424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 815, 'Vaishak', 'CUS-5-0815', '5', ''),
('Mohanan Kunnikode Kottarakara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 816, 'Vaishak', 'CUS-5-0816', '5', ''),
('Moto Cross  Royal Enfield Service Centre', NULL, NULL, NULL, NULL, NULL, '790', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 817, 'Vaishak', 'CUS-5-0817', '5', ''),
('Moto Medic Madathara', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 818, 'Vaishak', 'CUS-5-0818', '5', ''),
('MOTOR CRAFT GARAGE CHEMMATHOOR PUNALUR', NULL, NULL, NULL, NULL, NULL, '1296', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 819, 'Vaishak', 'CUS-5-0819', '5', ''),
('M S Oil Shop & Spares Pathanapuram', NULL, NULL, NULL, NULL, NULL, '1100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 820, 'Vaishak', 'CUS-5-0820', '5', ''),
('M S Spares & Accessories Pathanapuram', NULL, NULL, NULL, NULL, NULL, '9625', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 821, 'Vaishak', 'CUS-5-0821', '5', ''),
('NAIS AGENCIES KAVANADU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 822, 'Vaishak', 'CUS-5-0822', '5', ''),
('National Auto Parts  Attingal', NULL, NULL, NULL, NULL, NULL, '5278', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 823, 'Vaishak', 'CUS-5-0823', '5', ''),
('NEW UNITED  AUTO GARAGE', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 824, 'Vaishak', 'CUS-5-0824', '5', ''),
('Nijin Automobiles Chithara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 825, 'Vaishak', 'CUS-5-0825', '5', ''),
('Nine Star Lubricants Nagaroor', NULL, NULL, NULL, NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 826, 'Vaishak', 'CUS-5-0826', '5', ''),
('ONE STOP MOTO HUB', NULL, NULL, NULL, NULL, NULL, '5210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 827, 'Vaishak', 'CUS-5-0827', '5', ''),
('ORYX TRADING CUTCHERY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 828, 'Vaishak', 'CUS-5-0828', '5', ''),
('Perfect Auto Garage Madathara', NULL, NULL, NULL, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 829, 'Vaishak', 'CUS-5-0829', '5', ''),
('PMP AUTOMOBILES Puthoor', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 830, 'Vaishak', 'CUS-5-0830', '5', ''),
('POIKAVILAYIL AUTOMOBILE WORKSHOP', NULL, NULL, NULL, NULL, NULL, '5821', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 831, 'Vaishak', 'CUS-5-0831', '5', ''),
('PRADHEEP AUTOMOBILES PORIKKAL PUTHOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 832, 'Vaishak', 'CUS-5-0832', '5', ''),
('Prasanth Kilimannoor', NULL, NULL, NULL, NULL, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 833, 'Vaishak', 'CUS-5-0833', '5', ''),
('Premier Traders (Thomas)', NULL, NULL, NULL, NULL, NULL, '6806', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 834, 'Vaishak', 'CUS-5-0834', '5', ''),
('P.V ENTERPRISES KAVANADU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 835, 'Vaishak', 'CUS-5-0835', '5', ''),
('RAJAN TWO WHEELER(RAJAN)Ezhukone', NULL, NULL, NULL, NULL, NULL, '83', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 836, 'Vaishak', 'CUS-5-0836', '5', ''),
('RAJEEEV.K NEDIYARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 837, 'Vaishak', 'CUS-5-0837', '5', ''),
('RAJU AUTO SPARES KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '3664', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 838, 'Vaishak', 'CUS-5-0838', '5', ''),
('RAMAS EARTH MOVING PARTS', NULL, NULL, NULL, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 839, 'Vaishak', 'CUS-5-0839', '5', ''),
('Regency Car Service Puthoor', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 840, 'Vaishak', 'CUS-5-0840', '5', ''),
('Rinchu Auto Garage Oyoor', NULL, NULL, NULL, NULL, NULL, '710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 841, 'Vaishak', 'CUS-5-0841', '5', ''),
('ROHINI AUTOMOBILES ENGINEERING WORKS Thenmala', NULL, NULL, NULL, NULL, NULL, '1767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 842, 'Vaishak', 'CUS-5-0842', '5', ''),
('ROHINI AUTO MOBILES NAGAROOR', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 843, 'Vaishak', 'CUS-5-0843', '5', ''),
('Rosa Roja Automobiles Nilamel', NULL, NULL, NULL, NULL, NULL, '47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 844, 'Vaishak', 'CUS-5-0844', '5', ''),
('ROSHNI,PUNALUR', NULL, NULL, NULL, NULL, NULL, '305', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 845, 'Vaishak', 'CUS-5-0845', '5', ''),
('ROYAL AUTOMOBILES KOTTAMUKKU ,CUTCHERY', NULL, NULL, NULL, NULL, NULL, '19980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 846, 'Vaishak', 'CUS-5-0846', '5', ''),
('SABARI AUTO SPARE KALLUTHAZHAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 847, 'Vaishak', 'CUS-5-0847', '5', ''),
('Safa Auto Spares Manappally', NULL, NULL, NULL, NULL, NULL, '855', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 848, 'Vaishak', 'CUS-5-0848', '5', ''),
('SAI AUTO  DISTRIBUTORS    EDAKKULANGARA', NULL, NULL, NULL, NULL, NULL, '56256', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 849, 'Vaishak', 'CUS-5-0849', '5', ''),
('Saraswathy Motors, Punalur', NULL, NULL, NULL, NULL, NULL, '2610', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 850, 'Vaishak', 'CUS-5-0850', '5', ''),
('SEESUN AUTOMOBILES OACHIRA', NULL, NULL, NULL, NULL, NULL, '1784', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 851, 'Vaishak', 'CUS-5-0851', '5', ''),
('SEVEN STAR AUTO CENTER RANDAMKUTTI', NULL, NULL, NULL, NULL, NULL, '2010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 852, 'Vaishak', 'CUS-5-0852', '5', ''),
('Seyara Auto Garage Chethady', NULL, NULL, NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 853, 'Vaishak', 'CUS-5-0853', '5', '');
INSERT INTO `customer` (`customer_name`, `mobile`, `email`, `gst_number`, `tax_number`, `credit_limit`, `previous_due`, `address`, `city`, `state`, `postcode`, `country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `ship_country`, `price_level`, `price_leveltype`, `created_at`, `updated_at`, `status`, `id`, `created_by`, `customer_id`, `store_id`, `sale_executive_id`) VALUES
('SHAKTHI AUTOMOBILES KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 854, 'Vaishak', 'CUS-5-0854', '5', ''),
('Shibin Automobiles Chithara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 855, 'Vaishak', 'CUS-5-0855', '5', ''),
('Shiju Ponganadu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 856, 'Vaishak', 'CUS-5-0856', '5', ''),
('SHIRAS STEEL TRADERS', NULL, NULL, NULL, NULL, NULL, '7015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 857, 'Vaishak', 'CUS-5-0857', '5', ''),
('Siva Auto Spares Ayoor', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 858, 'Vaishak', 'CUS-5-0858', '5', ''),
('Sivaganga Bullet Works Alanchery', NULL, NULL, NULL, NULL, NULL, '6896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 859, 'Vaishak', 'CUS-5-0859', '5', ''),
('SIVA SURYA AUTOMOBILES PUTHOOR', NULL, NULL, NULL, NULL, NULL, '1700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 860, 'Vaishak', 'CUS-5-0860', '5', ''),
('SIVA TWO WHEELER WORK SHOP, PUTHUOOR', NULL, NULL, NULL, NULL, NULL, '41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 861, 'Vaishak', 'CUS-5-0861', '5', ''),
('S.K GARAGE ANCHAL', NULL, NULL, NULL, NULL, NULL, '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 862, 'Vaishak', 'CUS-5-0862', '5', ''),
('Skill Mech Car Care Chadayamangalam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 863, 'Vaishak', 'CUS-5-0863', '5', ''),
('SMART TWO WHEELER PUNALR', NULL, NULL, NULL, NULL, NULL, '4397', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 864, 'Vaishak', 'CUS-5-0864', '5', ''),
('S N R Construction Pathanapuram', NULL, NULL, NULL, NULL, NULL, '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 865, 'Vaishak', 'CUS-5-0865', '5', ''),
('SOORYA TWO WHEELER WORKS ALAMCHERY', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 866, 'Vaishak', 'CUS-5-0866', '5', ''),
('SOUPARNIKA SPARE PARTS Anchal', NULL, NULL, NULL, NULL, NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 867, 'Vaishak', 'CUS-5-0867', '5', ''),
('Spanner Auto Garage', NULL, NULL, NULL, NULL, NULL, '4451', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 868, 'Vaishak', 'CUS-5-0868', '5', ''),
('SPARE HUB KARUNAGAPPALLY', NULL, NULL, NULL, NULL, NULL, '362', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 869, 'Vaishak', 'CUS-5-0869', '5', ''),
('Spare World Kilimannoor New', NULL, NULL, NULL, NULL, NULL, '4808', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 870, 'Vaishak', 'CUS-5-0870', '5', ''),
('SPARE WORLD KILIMANOOR', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 871, 'Vaishak', 'CUS-5-0871', '5', ''),
('Spare Zone (Kadakkal)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 872, 'Vaishak', 'CUS-5-0872', '5', ''),
('Spartech Kottarakkara', NULL, NULL, NULL, NULL, NULL, '54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 873, 'Vaishak', 'CUS-5-0873', '5', ''),
('SPEED MARINE  ALTHARAMOODU KOLLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 874, 'Vaishak', 'CUS-5-0874', '5', ''),
('Sradha Automobiles Anchalumood', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 875, 'Vaishak', 'CUS-5-0875', '5', ''),
('S.R Automobiles Thenmala', NULL, NULL, NULL, NULL, NULL, '262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 876, 'Vaishak', 'CUS-5-0876', '5', ''),
('SREE ANJANEYA TWO WHEELER AANDANMUKKAM', NULL, NULL, NULL, NULL, NULL, '1580', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 877, 'Vaishak', 'CUS-5-0877', '5', ''),
('SREE BALAJI AUTO SPARES MAIN ROAD PUNALUR', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 878, 'Vaishak', 'CUS-5-0878', '5', ''),
('SREE GANESH AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 879, 'Vaishak', 'CUS-5-0879', '5', ''),
('SREE GANESH SPARES OYOOR', NULL, NULL, NULL, NULL, NULL, '158', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 880, 'Vaishak', 'CUS-5-0880', '5', ''),
('SREE KRISHNA MOTORS Pappala', NULL, NULL, NULL, NULL, NULL, '132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 881, 'Vaishak', 'CUS-5-0881', '5', ''),
('SREENILAYAM MOTORS PUTHIYAKKAVU', NULL, NULL, NULL, NULL, NULL, '2564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 882, 'Vaishak', 'CUS-5-0882', '5', ''),
('Sree Padmam Two Wheeler& Autospare Parts', NULL, NULL, NULL, NULL, NULL, '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 883, 'Vaishak', 'CUS-5-0883', '5', ''),
('SREE SASTHA AUTO GARAGE KULATHUPUZHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 884, 'Vaishak', 'CUS-5-0884', '5', ''),
('S.S AUTO GARAGE, PUTHUOOR', NULL, NULL, NULL, NULL, NULL, '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 885, 'Vaishak', 'CUS-5-0885', '5', ''),
('S S CARTECH AVANISWARAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 886, 'Vaishak', 'CUS-5-0886', '5', ''),
('Star Auto Spares (Kumar) Ayathil', NULL, NULL, NULL, NULL, NULL, '6046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 887, 'Vaishak', 'CUS-5-0887', '5', ''),
('STAR INDUSTRIES VAYANAMOOLA,AYOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 888, 'Vaishak', 'CUS-5-0888', '5', ''),
('Sudheer Nilamel', NULL, NULL, NULL, NULL, NULL, '23902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 889, 'Vaishak', 'CUS-5-0889', '5', ''),
('SUJATHA  LUBRICANTS', NULL, NULL, NULL, NULL, NULL, '27158', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 890, 'Vaishak', 'CUS-5-0890', '5', ''),
('Sukumaran Eroor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 891, 'Vaishak', 'CUS-5-0891', '5', ''),
('SUNIL AUTO GARAGE MUKHATHALA', NULL, NULL, NULL, NULL, NULL, '5838', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 892, 'Vaishak', 'CUS-5-0892', '5', ''),
('SUN STAR AUTO PARTS CHATHANOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 893, 'Vaishak', 'CUS-5-0893', '5', ''),
('Surya Spares Madathara', NULL, NULL, NULL, NULL, NULL, '3935', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 894, 'Vaishak', 'CUS-5-0894', '5', ''),
('Suseela Traders(Vijayakumar)', NULL, NULL, NULL, NULL, NULL, '1607', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 895, 'Vaishak', 'CUS-5-0895', '5', ''),
('THANNICKAL BRICKS KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 896, 'Vaishak', 'CUS-5-0896', '5', ''),
('Thiruvathira Automobiles Kilimannoor', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 897, 'Vaishak', 'CUS-5-0897', '5', ''),
('TNR TWO WHEELER KADAMBANAD EZHAMMILE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 898, 'Vaishak', 'CUS-5-0898', '5', ''),
('Trends Two Wheeler Works(Deepu)', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 899, 'Vaishak', 'CUS-5-0899', '5', ''),
('TYRE PALACE BEACH ROAD', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 900, 'Vaishak', 'CUS-5-0900', '5', ''),
('UNIVERSAL COMPANY KILIMANOOR', NULL, NULL, NULL, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 901, 'Vaishak', 'CUS-5-0901', '5', ''),
('USHUS AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 902, 'Vaishak', 'CUS-5-0902', '5', ''),
('VAZ AUTO GARAGE THANKASSERY', NULL, NULL, NULL, NULL, NULL, '726', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 903, 'Vaishak', 'CUS-5-0903', '5', ''),
('Vega Motors Puthoor', NULL, NULL, NULL, NULL, NULL, '277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 904, 'Vaishak', 'CUS-5-0904', '5', ''),
('VICTORY KOATTAKKARA', NULL, NULL, NULL, NULL, NULL, '62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 905, 'Vaishak', 'CUS-5-0905', '5', ''),
('VICTORY MOTORS, PUTHOOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 906, 'Vaishak', 'CUS-5-0906', '5', ''),
('VIGHNESWARA MOTO HUB KUNNICODE', NULL, NULL, NULL, NULL, NULL, '10970', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 907, 'Vaishak', 'CUS-5-0907', '5', ''),
('VIJAYAKUMAR AUTO GARAGE KULATHUPUZHA', NULL, NULL, NULL, NULL, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 908, 'Vaishak', 'CUS-5-0908', '5', ''),
('VIJAYARAJ MOTORS KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 909, 'Vaishak', 'CUS-5-0909', '5', ''),
('Vijay Auto Care Neduvathoor', NULL, NULL, NULL, NULL, NULL, '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 910, 'Vaishak', 'CUS-5-0910', '5', ''),
('VINAYAKA SPARES MADANNADA', NULL, NULL, NULL, NULL, NULL, '2201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 911, 'Vaishak', 'CUS-5-0911', '5', ''),
('Vinayaka Work Shop THAZHAMEL', NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 912, 'Vaishak', 'CUS-5-0912', '5', ''),
('Vinu Motor Works(Vasudevan)', NULL, NULL, NULL, NULL, NULL, '8148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 913, 'Vaishak', 'CUS-5-0913', '5', ''),
('Vishnu Auto Clinic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 914, 'Vaishak', 'CUS-5-0914', '5', ''),
('VISION AUTOMOBILES CHEMMANTHOOR', NULL, NULL, NULL, NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 915, 'Vaishak', 'CUS-5-0915', '5', ''),
('We Care Auto Garage(Shan)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 916, 'Vaishak', 'CUS-5-0916', '5', ''),
('Yogeswari Spare Parts Thenmala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 917, 'Vaishak', 'CUS-5-0917', '5', ''),
('Grace Two Wheeler Work Shop Nellikkunnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 918, 'VIBIL', 'CUS-5-0918', '5', ''),
('Hi-Tech Kallumthazham', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 919, 'VIBIL', 'CUS-5-0919', '5', ''),
('Krishna Two Wheeler (Manappally)', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 920, 'VIBIL', 'CUS-5-0920', '5', ''),
('Lulu Automobiles (Bashir)', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 921, 'VIBIL', 'CUS-5-0921', '5', ''),
('One Stop Karicode', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 922, 'VIBIL', 'CUS-5-0922', '5', ''),
('Prakash Auto Parts (Prakash)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 923, 'VIBIL', 'CUS-5-0923', '5', ''),
('P. V . AGENCIES SAKTHIKULANGARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 924, 'VIBIL', 'CUS-5-0924', '5', ''),
('Rahul Pallimukku', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 925, 'VIBIL', 'CUS-5-0925', '5', ''),
('Royal Mech Vallikkavu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 926, 'VIBIL', 'CUS-5-0926', '5', ''),
('Shaji Automobiles Varkkala', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 927, 'VIBIL', 'CUS-5-0927', '5', ''),
('SIVAKAMI AUTO MOBILES POOTHAKULAM', NULL, NULL, NULL, NULL, NULL, '138.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 928, 'VIBIL', 'CUS-5-0928', '5', ''),
('Smarya Marketing Kallumthazham', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 929, 'VIBIL', 'CUS-5-0929', '5', ''),
('SNOW COOL CAR A/C AND ELETRICALS  VILLAGE JN', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 930, 'VIBIL', 'CUS-5-0930', '5', ''),
('Sree Krishna Two Wheeler Koduvillamukku Alamcodu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 931, 'VIBIL', 'CUS-5-0931', '5', ''),
('SREE SANGETHAM AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 932, 'VIBIL', 'CUS-5-0932', '5', ''),
('Sree Vinayaka Twowheeler Iverkala', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 933, 'VIBIL', 'CUS-5-0933', '5', ''),
('S.S.Royal Automobiles Vadassery Konam', NULL, NULL, NULL, NULL, NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 934, 'VIBIL', 'CUS-5-0934', '5', ''),
('STAR AUTOMOBILES VENDERMUKKU KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 935, 'VIBIL', 'CUS-5-0935', '5', ''),
('Star Bikes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 936, 'VIBIL', 'CUS-5-0936', '5', ''),
('SUDHA TWO WHEELER PALAKKADAVU KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 937, 'VIBIL', 'CUS-5-0937', '5', ''),
('Vijaya Enterprises Kollam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 938, 'VIBIL', 'CUS-5-0938', '5', ''),
('VINAYAK. V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 939, 'VIBIL', 'CUS-5-0939', '5', ''),
('Viva Automobiles Ambalamkunnu', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-29 08:32:10', '2024-10-29 08:32:10', 'active', 940, 'VIBIL', 'CUS-5-0940', '5', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:14:14', '2024-11-06 07:14:14', 'active', 941, '1', 'CUS-1-0941', '1', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:22:30', '2024-11-06 07:22:30', 'active', 942, '1', 'CUS-1-0941', '3', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '2', NULL, NULL, '2024-11-06 07:23:21', '2024-11-06 07:23:21', 'active', 943, '1', 'CUS-1-0941', '2', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '2', NULL, NULL, '2024-11-06 07:24:04', '2024-11-06 07:24:04', 'active', 944, '1', 'CUS-1-0941', '2', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:27:22', '2024-11-06 07:27:22', 'active', 945, '1', 'CUS-1-0941', '4', ''),
('anas ka', '08547554648', 'anasfamilyman@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:30:14', '2024-11-06 07:30:14', 'active', 946, '1', 'CUS-1-0941', '3', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '2', NULL, NULL, '2024-11-06 07:31:43', '2024-11-06 07:31:43', 'active', 947, '1', 'CUS-1-0941', '2', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:32:32', '2024-11-06 07:32:32', 'active', 948, '1', 'CUS-1-0941', '3', ''),
('anas ka', '08547554648', 'anasfamilyman@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:33:30', '2024-11-06 07:33:30', 'active', 949, '1', 'CUS-1-0941', '4', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '3', NULL, NULL, '2024-11-06 07:34:07', '2024-11-06 07:34:07', 'active', 950, '1', 'CUS-1-0941', '3', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '2', NULL, NULL, '2024-11-06 07:35:43', '2024-11-06 07:35:43', 'active', 951, '1', 'CUS-1-0941', '2', ''),
('anas ka', '08547554648', 'anashomey@gmail.com', 'Gst123243', '7889', '-1.000', '0.000', 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', NULL, 'kariyakkad\r\n10', 'thrissur', 'kerala', '680501', '2', NULL, NULL, '2024-11-06 07:36:17', '2024-11-06 07:36:17', 'active', 952, '1', 'CUS-1-0941', '1', ''),
('anas', '9061608128', 'asdasdf@hfghfgh.com', '789255225', 'sdfsdf', '-1.000', '4000', 'dsfsdfsdf', 'sdfsdfsd', 'fsdfsdf', 'w543e64567', 'cust->country}}', 'asdfsdf', 'sdfsdfsd', 'sdfsd', 'sdfsdf', 'cust->ship_country}}', '00', 'cust->price_leveltype}}', '2024-11-06 07:44:39', '2024-11-06 09:16:18', 'active', 953, '3', 'CUS-1-0941', '5', ''),
('02 Garage', NULL, NULL, NULL, NULL, NULL, '9889.44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 954, '1', 'CUS-3-0941', '3', ''),
('4 K AUTOMOTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 955, '1', 'CUS-3-0941', '3', ''),
('ABDHUL  RAHIM IBRAHIM KUTTY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 956, '1', 'CUS-3-0941', '3', ''),
('ABHIJITH SURENDRAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 957, '1', 'CUS-3-0941', '3', ''),
('ABM CIVIL VENTURES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 958, '1', 'CUS-3-0941', '3', ''),
('Acko General Insurance Ltd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 959, '1', 'CUS-3-0941', '3', ''),
('AF  TRADERS KALLUMTHAZHAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 960, '1', 'CUS-3-0941', '3', ''),
('AION BACKUPS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 961, '1', 'CUS-3-0941', '3', ''),
('Aiswarya Associates', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 962, '1', 'CUS-3-0941', '3', ''),
('AJS ASSOCIATES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 963, '1', 'CUS-3-0941', '3', ''),
('AKBAR PUBLICITY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 964, '1', 'CUS-3-0941', '3', ''),
('Akshaya Electrical', NULL, NULL, NULL, NULL, NULL, '1350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 965, '1', 'CUS-3-0941', '3', ''),
('ALLU AUTO ELECTRICALS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 966, '1', 'CUS-3-0941', '3', ''),
('AMEERHAMSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 967, '1', 'CUS-3-0941', '3', ''),
('AMN EVENTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 968, '1', 'CUS-3-0941', '3', ''),
('A ONE MILK PRODUCT PVT .LTD', NULL, NULL, NULL, NULL, NULL, '1280', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 969, '1', 'CUS-3-0941', '3', ''),
('ARUN', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 970, '1', 'CUS-3-0941', '3', ''),
('As Industries  Meeyannoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 971, '1', 'CUS-3-0941', '3', ''),
('A S Motors', NULL, NULL, NULL, NULL, NULL, '17704', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 972, '1', 'CUS-3-0941', '3', ''),
('AS MOTORS & TRADING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 973, '1', 'CUS-3-0941', '3', ''),
('Asst.Forest  Conservator', NULL, NULL, NULL, NULL, NULL, '3545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 974, '1', 'CUS-3-0941', '3', ''),
('AUTO MITHRA INDIA PVT LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 975, '1', 'CUS-3-0941', '3', ''),
('AYIDHIN CONSTRUCTIONS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 976, '1', 'CUS-3-0941', '3', ''),
('Babith Raj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 977, '1', 'CUS-3-0941', '3', ''),
('BAJAJ ALLIANNZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 978, '1', 'CUS-3-0941', '3', ''),
('Bajaj Allianz General Insurance Company Ltd', NULL, NULL, NULL, NULL, NULL, '2444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 979, '1', 'CUS-3-0941', '3', ''),
('BB TRADERS', NULL, NULL, NULL, NULL, NULL, '9137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 980, '1', 'CUS-3-0941', '3', ''),
('BHAGATH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 981, '1', 'CUS-3-0941', '3', ''),
('BOOMER ADVERTISERS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 982, '1', 'CUS-3-0941', '3', ''),
('BROADWAY ALUMINIUM  HOUSE ,KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 983, '1', 'CUS-3-0941', '3', ''),
('CAR AUTOMOBILES KOLLAM', NULL, NULL, NULL, NULL, NULL, '11664', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 984, '1', 'CUS-3-0941', '3', ''),
('CAR AUTOMOBILES  TVM', NULL, NULL, NULL, NULL, NULL, '35565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 985, '1', 'CUS-3-0941', '3', ''),
('Car Care', NULL, NULL, NULL, NULL, NULL, '8100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 986, '1', 'CUS-3-0941', '3', ''),
('CARMAKE', NULL, NULL, NULL, NULL, NULL, '7920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 987, '1', 'CUS-3-0941', '3', ''),
('CHERIYAN  VARKEY CONSTRUCTION CO PVT LTD', NULL, NULL, NULL, NULL, NULL, '9930', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 988, '1', 'CUS-3-0941', '3', ''),
('CHOLA MS GENERAL INSURANCE  CO  LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 989, '1', 'CUS-3-0941', '3', ''),
('CHUNGATH SPRISE MOTORS PVT. LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 990, '1', 'CUS-3-0941', '3', ''),
('CRAYONE RESIDENCY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 991, '1', 'CUS-3-0941', '3', ''),
('C S  MOTORS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 992, '1', 'CUS-3-0941', '3', ''),
('Dileepan S', NULL, NULL, NULL, NULL, NULL, '3980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 993, '1', 'CUS-3-0941', '3', ''),
('DILEEP KUMAR PT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 994, '1', 'CUS-3-0941', '3', ''),
('DIRECTOR SFTI ARIPPA', NULL, NULL, NULL, NULL, NULL, '980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 995, '1', 'CUS-3-0941', '3', ''),
('District  Medical Officer ( Health ) Kollam', NULL, NULL, NULL, NULL, NULL, '1100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 996, '1', 'CUS-3-0941', '3', ''),
('DISTRICT OFFICER GWD KLM', NULL, NULL, NULL, NULL, NULL, '7505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 997, '1', 'CUS-3-0941', '3', ''),
('DIYA AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 998, '1', 'CUS-3-0941', '3', ''),
('DMOH  KOLLAM', NULL, NULL, NULL, NULL, NULL, '4802', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 999, '1', 'CUS-3-0941', '3', ''),
('DR KOSHI PANICKAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1000, '1', 'CUS-3-0941', '3', ''),
('EMART ELECTRICALS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1001, '1', 'CUS-3-0941', '3', ''),
('EVM PASSENGER CARS INDA PVT LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1002, '1', 'CUS-3-0941', '3', ''),
('Expert All Car Service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1003, '1', 'CUS-3-0941', '3', ''),
('Focuz Atuomobile Service Ltd', NULL, NULL, NULL, NULL, NULL, '2330', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1004, '1', 'CUS-3-0941', '3', ''),
('FOCUZ PARTS MART KOTTARAKARA', NULL, NULL, NULL, NULL, NULL, '5100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1005, '1', 'CUS-3-0941', '3', ''),
('FOCUZ PARTS MART PVT LTD', NULL, NULL, NULL, NULL, NULL, '1834.72', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1006, '1', 'CUS-3-0941', '3', ''),
('FRANCIS C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1007, '1', 'CUS-3-0941', '3', ''),
('FRANCIS TRISSUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1008, '1', 'CUS-3-0941', '3', ''),
('FRIENDS ATTINGAL', NULL, NULL, NULL, NULL, NULL, '18651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1009, '1', 'CUS-3-0941', '3', ''),
('Friends Auto Garage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1010, '1', 'CUS-3-0941', '3', ''),
('FRIENDS GARAGE KOTTIYAM', NULL, NULL, NULL, NULL, NULL, '12750', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1011, '1', 'CUS-3-0941', '3', ''),
('FUTURE GENERALI INDIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1012, '1', 'CUS-3-0941', '3', ''),
('GENERAL GARAGE  CAR TECH  AUTO CENTRE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1013, '1', 'CUS-3-0941', '3', ''),
('GLOBAL TRADE LINKS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1014, '1', 'CUS-3-0941', '3', ''),
('GREEN TRANSPORT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1015, '1', 'CUS-3-0941', '3', ''),
('HONEY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1016, '1', 'CUS-3-0941', '3', ''),
('IFFCO TOKIO GENERAL INSURANCE CO LTD', NULL, NULL, NULL, NULL, NULL, '1370', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1017, '1', 'CUS-3-0941', '3', ''),
('INDIAN MOTORS EXPORTS &IMPORTS CO', NULL, NULL, NULL, NULL, NULL, '530', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1018, '1', 'CUS-3-0941', '3', ''),
('INDUS  MOTORS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1019, '1', 'CUS-3-0941', '3', ''),
('In Sight  Technologies', NULL, NULL, NULL, NULL, NULL, '1390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1020, '1', 'CUS-3-0941', '3', ''),
('INTER NATIONAL  TRADING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1021, '1', 'CUS-3-0941', '3', ''),
('INTRO FURNITURE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1022, '1', 'CUS-3-0941', '3', ''),
('IRSHAD ENTERPRISES KERALA', NULL, NULL, NULL, NULL, NULL, '9720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1023, '1', 'CUS-3-0941', '3', ''),
('JANATHA GARRAGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1024, '1', 'CUS-3-0941', '3', ''),
('JARCCPS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1025, '1', 'CUS-3-0941', '3', ''),
('JD  HYDRAULICS AND EQUIPMENTS , KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1026, '1', 'CUS-3-0941', '3', ''),
('J MEDIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1027, '1', 'CUS-3-0941', '3', ''),
('JOSCO JEWELLERY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1028, '1', 'CUS-3-0941', '3', ''),
('KAIRALI JEWELLERY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1029, '1', 'CUS-3-0941', '3', ''),
('Keerthi Automotive', NULL, NULL, NULL, NULL, NULL, '11004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1030, '1', 'CUS-3-0941', '3', ''),
('KI MOBILITY SOLUTIONS PVT LTD', NULL, NULL, NULL, NULL, NULL, '42301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1031, '1', 'CUS-3-0941', '3', ''),
('KL 01 BK 8221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1032, '1', 'CUS-3-0941', '3', ''),
('KL 01CB 3162', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1033, '1', 'CUS-3-0941', '3', ''),
('KL 23G 9837', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1034, '1', 'CUS-3-0941', '3', ''),
('KOLLAM AUTO ENGINEERING', NULL, NULL, NULL, NULL, NULL, '9920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1035, '1', 'CUS-3-0941', '3', ''),
('Kollam District Labour Contract S.O.O.P Society Ltd', NULL, NULL, NULL, NULL, NULL, '3729', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1036, '1', 'CUS-3-0941', '3', ''),
('KRISHNA PILLA', NULL, NULL, NULL, NULL, NULL, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1037, '1', 'CUS-3-0941', '3', ''),
('KS AGENCIES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1038, '1', 'CUS-3-0941', '3', ''),
('KSEB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1039, '1', 'CUS-3-0941', '3', ''),
('K SUDARSANAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1040, '1', 'CUS-3-0941', '3', ''),
('KUMAKA AUTOMOBILE SERVICE &SPARE PARTS PVT LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1041, '1', 'CUS-3-0941', '3', ''),
('KUTTIKKATTU MOTORS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1042, '1', 'CUS-3-0941', '3', ''),
('KWA SECTION 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1043, '1', 'CUS-3-0941', '3', ''),
('LIBERTY GENERAL INSURANCE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1044, '1', 'CUS-3-0941', '3', ''),
('LOKARAKSHA HOSPITAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1045, '1', 'CUS-3-0941', '3', ''),
('LULU ICE CREAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1046, '1', 'CUS-3-0941', '3', ''),
('Mahadevan', NULL, NULL, NULL, NULL, NULL, '3140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1047, '1', 'CUS-3-0941', '3', ''),
('Mahindra Auto Mart Tvm', NULL, NULL, NULL, NULL, NULL, '16180.18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1048, '1', 'CUS-3-0941', '3', ''),
('Malsyafed Tvm', NULL, NULL, NULL, NULL, NULL, '578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1049, '1', 'CUS-3-0941', '3', ''),
('MANNIL AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1050, '1', 'CUS-3-0941', '3', ''),
('MANOJ ALAMCODU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1051, '1', 'CUS-3-0941', '3', ''),
('MASS MOTORS ATTINGAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1052, '1', 'CUS-3-0941', '3', ''),
('MEDICAL OFFICER CHC THRIKKADAVOOR', NULL, NULL, NULL, NULL, NULL, '160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1053, '1', 'CUS-3-0941', '3', ''),
('MERCYFUL LOVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1054, '1', 'CUS-3-0941', '3', ''),
('MODEL ENGINEERING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1055, '1', 'CUS-3-0941', '3', ''),
('MOONLIGHT CONSTRUCTOINS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1056, '1', 'CUS-3-0941', '3', ''),
('MUTHOOT TATA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1057, '1', 'CUS-3-0941', '3', ''),
('NAFESIYA ENTERPRISE', NULL, NULL, NULL, NULL, NULL, '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1058, '1', 'CUS-3-0941', '3', ''),
('NATIONAL PROJECTS  COMPANY , PRAKULAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1059, '1', 'CUS-3-0941', '3', ''),
('NAVAS', NULL, NULL, NULL, NULL, NULL, '6993', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1060, '1', 'CUS-3-0941', '3', ''),
('NAZEEM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1061, '1', 'CUS-3-0941', '3', ''),
('NEW LAND CAR CITY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1062, '1', 'CUS-3-0941', '3', ''),
('NEW RAJEENA TEXTILES  ,KADAKKAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1063, '1', 'CUS-3-0941', '3', ''),
('N G P GROUP', NULL, NULL, NULL, NULL, NULL, '560', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1064, '1', 'CUS-3-0941', '3', ''),
('NIPPON MOTOR  CORPORATION PVT LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1065, '1', 'CUS-3-0941', '3', ''),
('NIPPON MOTORS CORPORATION PVT LTD', NULL, NULL, NULL, NULL, NULL, '365', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1066, '1', 'CUS-3-0941', '3', '');
INSERT INTO `customer` (`customer_name`, `mobile`, `email`, `gst_number`, `tax_number`, `credit_limit`, `previous_due`, `address`, `city`, `state`, `postcode`, `country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `ship_country`, `price_level`, `price_leveltype`, `created_at`, `updated_at`, `status`, `id`, `created_by`, `customer_id`, `store_id`, `sale_executive_id`) VALUES
('NISWAS FARMACIES', NULL, NULL, NULL, NULL, NULL, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1067, '1', 'CUS-3-0941', '3', ''),
('Oriental Insurance Company', NULL, NULL, NULL, NULL, NULL, '58205.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1068, '1', 'CUS-3-0941', '3', ''),
('P.L  TECHNOLOGY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1069, '1', 'CUS-3-0941', '3', ''),
('POPULAR KOTTARAKKARA', NULL, NULL, NULL, NULL, NULL, '5700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1070, '1', 'CUS-3-0941', '3', ''),
('PRANAVAM KADAPAKADA', NULL, NULL, NULL, NULL, NULL, '72342', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1071, '1', 'CUS-3-0941', '3', ''),
('Prashanthi Cashew Company', NULL, NULL, NULL, NULL, NULL, '1280', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1072, '1', 'CUS-3-0941', '3', ''),
('PRAVEEN RAJ CASHEW  CO', NULL, NULL, NULL, NULL, NULL, '6300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1073, '1', 'CUS-3-0941', '3', ''),
('PRIME ENTERPRISES', NULL, NULL, NULL, NULL, NULL, '3880', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1074, '1', 'CUS-3-0941', '3', ''),
('Pulimootil  Silks & Apparel Pvt Lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1075, '1', 'CUS-3-0941', '3', ''),
('PULIYANNAVILCONSTRUCTIONS PVT LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1076, '1', 'CUS-3-0941', '3', ''),
('Quilon Leather Mart', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1077, '1', 'CUS-3-0941', '3', ''),
('RAJAN BINOY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1078, '1', 'CUS-3-0941', '3', ''),
('RAJAPUDRA VISHUAL MEDIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1079, '1', 'CUS-3-0941', '3', ''),
('Rajeev Anchal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1080, '1', 'CUS-3-0941', '3', ''),
('Rajeev K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1081, '1', 'CUS-3-0941', '3', ''),
('Rajendran', NULL, NULL, NULL, NULL, NULL, '1090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1082, '1', 'CUS-3-0941', '3', ''),
('RAJENDRAN CHADAYAMANGALAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1083, '1', 'CUS-3-0941', '3', ''),
('RATHEESH VARKKALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1084, '1', 'CUS-3-0941', '3', ''),
('Reliance General Insurance', NULL, NULL, NULL, NULL, NULL, '18316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1085, '1', 'CUS-3-0941', '3', ''),
('Reliance General Insurance Co Ltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1086, '1', 'CUS-3-0941', '3', ''),
('RJTV TRADE LINKS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1087, '1', 'CUS-3-0941', '3', ''),
('SABU ABRAHAM', NULL, NULL, NULL, NULL, NULL, '28653', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1088, '1', 'CUS-3-0941', '3', ''),
('SAI KRISHNA ENGINEER CHENNAI', NULL, NULL, NULL, NULL, NULL, '735', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1089, '1', 'CUS-3-0941', '3', ''),
('SAJEER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1090, '1', 'CUS-3-0941', '3', ''),
('SAKTHI AGENCIES', NULL, NULL, NULL, NULL, NULL, '42385', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1091, '1', 'CUS-3-0941', '3', ''),
('SALAM TRADING COMPANY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1092, '1', 'CUS-3-0941', '3', ''),
('SAM MATHEW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1093, '1', 'CUS-3-0941', '3', ''),
('SANKERS HOSPITAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1094, '1', 'CUS-3-0941', '3', ''),
('SASI FOUNDRY ENGINEERING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1095, '1', 'CUS-3-0941', '3', ''),
('SDE BSNL OFFICE', NULL, NULL, NULL, NULL, NULL, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1096, '1', 'CUS-3-0941', '3', ''),
('S .Deepak Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1097, '1', 'CUS-3-0941', '3', ''),
('SECURE VALUE INDIA LTD KOLLAM', NULL, NULL, NULL, NULL, NULL, '210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1098, '1', 'CUS-3-0941', '3', ''),
('SEVEN STAR AUTO AGENCY-BGL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1099, '1', 'CUS-3-0941', '3', ''),
('SHAFI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1100, '1', 'CUS-3-0941', '3', ''),
('SHAHAL', NULL, NULL, NULL, NULL, NULL, '350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1101, '1', 'CUS-3-0941', '3', ''),
('SHANMUGHAN SASIDHARAN PILLAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1102, '1', 'CUS-3-0941', '3', ''),
('SHARATON BISMILLAH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1103, '1', 'CUS-3-0941', '3', ''),
('SHIBU .S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1104, '1', 'CUS-3-0941', '3', ''),
('SHIVA AGENCIES', NULL, NULL, NULL, NULL, NULL, '1300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1105, '1', 'CUS-3-0941', '3', ''),
('Shivaram Auto Space', NULL, NULL, NULL, NULL, NULL, '10470', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1106, '1', 'CUS-3-0941', '3', ''),
('SINOJ I V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1107, '1', 'CUS-3-0941', '3', ''),
('SIVAGIRI   SREE NARAYANA MEDICAL MISSION HOSPITAL', NULL, NULL, NULL, NULL, NULL, '37516.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1108, '1', 'CUS-3-0941', '3', ''),
('SIVA TYRES & LUBRICANTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1109, '1', 'CUS-3-0941', '3', ''),
('SKILMECH CAR CARE', NULL, NULL, NULL, NULL, NULL, '45078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1110, '1', 'CUS-3-0941', '3', ''),
('SK TRADERS', NULL, NULL, NULL, NULL, NULL, '11230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1111, '1', 'CUS-3-0941', '3', ''),
('SOMARAJ', NULL, NULL, NULL, NULL, NULL, '3950', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1112, '1', 'CUS-3-0941', '3', ''),
('SPOT PICK CARGO MOVERS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1113, '1', 'CUS-3-0941', '3', ''),
('S R CONSTRUCTIONS KTRKRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1114, '1', 'CUS-3-0941', '3', ''),
('SS Car Painting Shop', NULL, NULL, NULL, NULL, NULL, '36563', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1115, '1', 'CUS-3-0941', '3', ''),
('S.S Hyundai Kottarakara', NULL, NULL, NULL, NULL, NULL, '1780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1116, '1', 'CUS-3-0941', '3', ''),
('STEELEX TRADERS KOLLAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1117, '1', 'CUS-3-0941', '3', ''),
('SUDHIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1118, '1', 'CUS-3-0941', '3', ''),
('SUDHIN DELHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1119, '1', 'CUS-3-0941', '3', ''),
('SUJAI.S THEVALAKKARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1120, '1', 'CUS-3-0941', '3', ''),
('SUKUMARAN  EROOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1121, '1', 'CUS-3-0941', '3', ''),
('SULFI SOORATH WEDDING CENTRE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1122, '1', 'CUS-3-0941', '3', ''),
('Sumo', NULL, NULL, NULL, NULL, NULL, '3003.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1123, '1', 'CUS-3-0941', '3', ''),
('SUNIL KUMAR  KL23A5', NULL, NULL, NULL, NULL, NULL, '2310', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1124, '1', 'CUS-3-0941', '3', ''),
('SUN SYSTEMS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1125, '1', 'CUS-3-0941', '3', ''),
('Sup.Customes Preventive Unit', NULL, NULL, NULL, NULL, NULL, '3600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1126, '1', 'CUS-3-0941', '3', ''),
('SURESH KOZHIKODE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1127, '1', 'CUS-3-0941', '3', ''),
('SURESH PATHANAPURAM', NULL, NULL, NULL, NULL, NULL, '2100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1128, '1', 'CUS-3-0941', '3', ''),
('TATA AIA LIC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1129, '1', 'CUS-3-0941', '3', ''),
('TEAM AUTOMOBILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1130, '1', 'CUS-3-0941', '3', ''),
('TECHBAND TECHNOLOGIES PVT LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1131, '1', 'CUS-3-0941', '3', ''),
('TECHNO KARUNAGAPALLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1132, '1', 'CUS-3-0941', '3', ''),
('Terrace Architects & Bright Eco- Tech Consultants', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1133, '1', 'CUS-3-0941', '3', ''),
('THANNITHODE INDANE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1134, '1', 'CUS-3-0941', '3', ''),
('THE CITY POLICE COMMISSIONER OFFICE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1135, '1', 'CUS-3-0941', '3', ''),
('The Deputy  Conservator  of  Forests', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1136, '1', 'CUS-3-0941', '3', ''),
('The Detailing Doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1137, '1', 'CUS-3-0941', '3', ''),
('THE SUP OF POLICE CRIME BRANCH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1138, '1', 'CUS-3-0941', '3', ''),
('TN 66 A 7078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1139, '1', 'CUS-3-0941', '3', ''),
('TRANSWORLD SCALES SERVICES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1140, '1', 'CUS-3-0941', '3', ''),
('Union  Driving School', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1141, '1', 'CUS-3-0941', '3', ''),
('UNITED INDIA INSURANCE', NULL, NULL, NULL, NULL, NULL, '303304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1142, '1', 'CUS-3-0941', '3', ''),
('Universal Auto Spares', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1143, '1', 'CUS-3-0941', '3', ''),
('UNIVERSAL SOMPO GIC LTD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1144, '1', 'CUS-3-0941', '3', ''),
('UNNONNI AND SONS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1145, '1', 'CUS-3-0941', '3', ''),
('VANCHINAD BUILDERS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1146, '1', 'CUS-3-0941', '3', ''),
('VEENA VENUGOPAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1147, '1', 'CUS-3-0941', '3', ''),
('VINAYAKA  COMPLETE PRINTING  SOLUTION ,NEDUMANKAV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1148, '1', 'CUS-3-0941', '3', ''),
('VIPIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1149, '1', 'CUS-3-0941', '3', ''),
('V N DISTRIBUTORS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1150, '1', 'CUS-3-0941', '3', ''),
('WEDLAND WEDDINGS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1151, '1', 'CUS-3-0941', '3', ''),
('YARITEX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1152, '1', 'CUS-3-0941', '3', ''),
('Yohannan', NULL, NULL, NULL, NULL, NULL, '800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1153, '1', 'CUS-3-0941', '3', ''),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1154, '1', 'CUS-3-0941', '3', ''),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 11:37:18', '2024-11-07 11:37:18', 'active', 1155, '1', 'CUS-3-0941', '3', ''),
('sdfsdf', '6765756', 'jhfk@gmail.com', '98654654', '987555', '-1.000', '200', 'sdfsdff', 'sdfsdfsdf', 'dsfmdf', '96545', NULL, 'dfgfsdgfg', 'fdgdfg', 'fgfdg', '6555', '2', NULL, NULL, '2024-11-20 01:51:29', '2024-11-20 01:51:29', 'active', 1157, '1', 'CUS-1-0941', '5', '18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `user_id` int(250) NOT NULL,
  `count_id` int(10) DEFAULT NULL COMMENT 'Use to create Customer Code',
  `customer_code` varchar(20) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `tax_number` varchar(50) DEFAULT NULL,
  `vatin` varchar(100) DEFAULT NULL,
  `opening_balance` double(20,4) DEFAULT NULL,
  `sales_due` double(20,4) DEFAULT NULL,
  `sales_return_due` double(20,4) DEFAULT NULL,
  `country_id` int(50) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `location_link` text DEFAULT NULL,
  `attachment_1` text DEFAULT NULL,
  `price_level_type` varchar(50) DEFAULT 'Increase',
  `price_level` double(20,4) DEFAULT 0.0000,
  `delete_bit` int(1) DEFAULT 0,
  `tot_advance` double(20,4) DEFAULT NULL,
  `credit_limit` double(20,4) DEFAULT -1.0000,
  `shippingaddress_id` int(10) DEFAULT NULL,
  `status` int(5) NOT NULL,
  `created_by` int(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `store_id`, `user_id`, `count_id`, `customer_code`, `customer_name`, `mobile`, `phone`, `email`, `gstin`, `tax_number`, `vatin`, `opening_balance`, `sales_due`, `sales_return_due`, `country_id`, `state`, `city`, `postcode`, `address`, `location_link`, `attachment_1`, `price_level_type`, `price_level`, `delete_bit`, `tot_advance`, `credit_limit`, `shippingaddress_id`, `status`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 1, 0, 1, 'CUS0001', 'Walk-in customer', NULL, NULL, NULL, '', '', NULL, 0.0000, 1858.9100, NULL, 1, '', '', '', '', NULL, NULL, 'Increase', 0.0000, 1, NULL, -1.0000, NULL, 1, 2, '2023-11-25 19:18:21', '2024-09-30 13:57:15'),
(2, 1, 8, 2, 'CUS0002', 'Unnikrishnan', '9020583270', NULL, 'unnicodetest@gmail.com', '', '', NULL, 0.0000, 100.0000, NULL, 1, 'Kerala', 'Kollam', '691577', 'Avittom, Mukhtahha', NULL, NULL, 'Increase', 0.0000, 0, 500.0000, -1.0000, NULL, 1, 2, '2023-11-25 19:18:21', '2024-03-15 12:11:29'),
(3, 1, 9, 3, 'CUS-1-0003', 'testcustomer', '123456789', NULL, '', '', '', NULL, 0.0000, NULL, NULL, 1, 'Kerala', 'Kollam', '6912545', 'Avittom, Mukhtahha', NULL, NULL, 'Increase', 0.0000, 0, NULL, -1.0000, NULL, 1, 2, '2023-11-25 23:09:41', '2023-11-25 23:09:41'),
(4, 1, 10, 4, 'CUS-1-0004', 'Unnikrishnan', '1555656', NULL, 'saf@ffff.com', '54585', '545574', NULL, 0.0000, 0.0000, NULL, 1, 'kerala', 'Kollam', '682022', 'dsfgs', NULL, NULL, 'Increase', 0.0000, 0, NULL, -1.0000, NULL, 1, 2, '2023-12-10 18:19:42', '2024-02-20 12:04:14'),
(5, 1, 11, 5, 'CUS-1-0005', 'adhya', '5868686868', NULL, 'ahya@adhya.com', 'adf66666', 'adf66556', NULL, 0.0000, NULL, NULL, 1, 'Kerala', 'Kollam', '', '', NULL, NULL, '', 0.0000, 0, NULL, -1.0000, NULL, 1, 2, '2023-12-10 20:02:17', '2023-12-10 20:02:17'),
(6, 1, 12, 6, 'CUS-1-0006', 'sdafsa', '155', NULL, 'unnicodetest@gmail.com', '', '', NULL, 0.0000, NULL, NULL, 1, '', '', '', '', NULL, NULL, '', 0.0000, 0, NULL, -1.0000, NULL, 1, 2, '2023-12-10 20:16:51', '2023-12-10 20:16:51'),
(7, 1, 13, 7, 'CUS-1-0007', '', '1588888', NULL, 'unnikochu@gmail.com', '', '', NULL, 0.0000, NULL, NULL, 1, '', '', '', '', NULL, NULL, '', 0.0000, 0, NULL, -1.0000, NULL, 1, 2, '2023-12-10 20:17:51', '2023-12-10 20:17:51'),
(8, 1, 14, 8, 'CUS-1-0008', '', '19898989', NULL, 'unnikochu@gmail.com', '', '', NULL, 0.0000, NULL, NULL, 1, 'Kerala', 'Kollam', '682022', 'Avittom, mukhtathala', NULL, NULL, 'Increase', 0.0000, 0, NULL, -1.0000, NULL, 1, 2, '2023-12-10 20:20:30', '2023-12-10 20:20:30'),
(9, 1, 16, 9, 'CUS-1-0009', 'Unnikrishnan', '9020583270', NULL, 'gggggggg@gg.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Kerala', 'Kollam', '691777', 'Avittttttt', NULL, NULL, 'Increase', 0.0000, 0, NULL, -1.0000, NULL, 1, 0, '2024-03-08 00:09:46', '2024-03-08 00:09:46'),
(10, 1, 19, 10, 'CUS-1-0010', 'tutu', '9496328016', NULL, 'tutu@trutu.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ghhhh', 'ddd', '52655', 'ddd', NULL, NULL, 'Increase', 0.0000, 0, NULL, -1.0000, NULL, 1, 0, '2024-06-28 18:21:11', '2024-06-28 18:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `customer_advance`
--

CREATE TABLE `customer_advance` (
  `id` int(5) NOT NULL,
  `store_id` int(5) DEFAULT NULL,
  `count_id` int(5) DEFAULT NULL,
  `payment_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `amount` double(20,4) DEFAULT NULL,
  `payment_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_advance`
--

INSERT INTO `customer_advance` (`id`, `store_id`, `count_id`, `payment_code`, `payment_date`, `customer_id`, `amount`, `payment_type`, `note`, `status`, `created_by`, `created_on`, `updated_on`) VALUES
(2, 1, 3, 'CA-1-0001', '2023-12-02', 2, 500.0000, '1', 'kippp', 1, 2, '2023-12-02 11:48:09', '2023-12-02 11:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

CREATE TABLE `customer_payments` (
  `id` int(5) NOT NULL,
  `salespayment_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment` double(10,2) DEFAULT NULL,
  `payment_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_shippingaddress`
--

CREATE TABLE `customer_shippingaddress` (
  `id` int(10) NOT NULL,
  `user_id` int(250) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `store_id` int(10) DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `city` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `shipping_name` varchar(150) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `location_link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact_no` varchar(150) NOT NULL,
  `default` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_shippingaddress`
--

INSERT INTO `customer_shippingaddress` (`id`, `user_id`, `customer_id`, `store_id`, `country_id`, `state`, `city`, `postcode`, `address`, `shipping_name`, `status`, `location_link`, `contact_no`, `default`, `created_on`, `updated_on`) VALUES
(1, 10, 4, 1, 1, 'kerala', 'Kollam', '', 'dsfgs', '', 1, NULL, '', 0, '2023-12-10 18:19:42', '2023-12-10 18:19:42'),
(2, 11, 5, 1, 1, 'kerala', 'Kollam', '691577', 'dhghdls', '', 1, NULL, '', 0, '2023-12-10 20:02:17', '2023-12-10 20:02:17'),
(3, 12, 6, 1, 1, '', '', '', '', '', 1, NULL, '', 0, '2023-12-10 20:16:51', '2023-12-10 20:16:51'),
(4, 13, 7, 1, 1, '', '', '', '', '', 1, NULL, '', 1, '2023-12-10 20:17:51', '2023-12-10 20:17:51'),
(5, 14, 8, 1, 1, '', '', '', '', '', 1, NULL, '', 0, '2023-12-10 20:20:30', '2023-12-10 20:20:30'),
(6, 8, 2, 1, 0, 'Kerala', 'Kollam', '691777', 'Avittttttt', 'Kochu', 1, NULL, '9496328013', 0, '2024-02-15 20:27:07', '2024-02-15 20:27:07'),
(7, 16, 9, 1, 1, 'Kerala', 'Kollam', '691777', 'Avittttttt', '', 1, NULL, '', 0, '2024-03-08 00:09:46', '2024-03-08 00:09:46'),
(8, 19, 10, 1, 1, 'ghhhh', 'ddd', '52655', 'ddd', '', 1, NULL, '', 0, '2024-06-28 18:21:11', '2024-06-28 18:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `delete_account_request`
--

CREATE TABLE `delete_account_request` (
  `id` int(11) NOT NULL,
  `store_id` int(150) NOT NULL,
  `users_id` int(250) NOT NULL,
  `satus` int(110) NOT NULL COMMENT '1 for approved',
  `status_detail` text DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expensecategory`
--

CREATE TABLE `expensecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expensecategory`
--

INSERT INTO `expensecategory` (`id`, `name`, `dis`, `created_at`, `updated_at`, `status`) VALUES
(2, 'shopping', 'this is a expense', '2024-10-17 07:19:44', '2024-10-17 07:19:44', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `expense_for` varchar(255) NOT NULL,
  `expence_by` int(200) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `expence_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `store_id` int(11) DEFAULT NULL,
  `count_id` int(50) NOT NULL,
  `category_code` varchar(50) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`store_id`, `count_id`, `category_code`, `category_name`, `description`, `created_by`, `status`, `created_at`, `updated_at`, `id`, `parent_id`) VALUES
(5, 1, 'CT-5-0001', 'petroll', 'fgsfdg', '1', 1, '2024-11-20 04:54:46', '2024-11-20 04:54:46', 1, 0),
(4, 2, 'CT-4-0002', 'travel', 'fdgdfg', '1', 1, '2024-11-20 04:55:26', '2024-11-20 04:55:26', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firebase_device_id`
--

CREATE TABLE `firebase_device_id` (
  `id` int(11) NOT NULL,
  `user_id` int(250) NOT NULL,
  `device_id` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slId` int(200) DEFAULT NULL,
  `item_code` varchar(155) DEFAULT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `brand_id` varchar(255) DEFAULT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `alert_quantity` int(255) DEFAULT NULL,
  `seller_point` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `Expiry_date` varchar(255) DEFAULT NULL,
  `dis` varchar(255) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `purchase_price` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `slno` int(100) DEFAULT NULL,
  `tax_type` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `profit_margin` varchar(255) DEFAULT NULL,
  `sales_price` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `ware_house_id` varchar(255) DEFAULT NULL,
  `opening_stock` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `show_app` varchar(255) DEFAULT NULL,
  `app_price` varchar(255) DEFAULT NULL,
  `tax_amount` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `store_id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alt_unit` varchar(255) DEFAULT NULL,
  `second_store_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(17, 1, 'IT-0013', '(MF 390-)', 'Motor Flush 300mls', '21', '31', '8', '5454', '38111900', 1121, '465465', '65465465', '2024-11-30', 'fdgfg', 'Fixed', '54545', '20000', '12', 0, 'Exclusive', '23600', '100', '40000', '2000', '26', '11', 'active', 'none_app', NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-12-20 06:32:55', '20', '0'),
(18, 1, 'IT-0014', '(Ot -511)', 'Oil Treatments', '21', '30', '8', '5454', '27101990', 200, '54545', '546564654', '2024-11-30', 'fsfsf', 'Fixed', '200', '200', '12', 100, 'Exclusive', '236', '455', '1110', '200', '26', '9', 'active', 'none_app', NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-12-16 05:37:17', NULL, '0'),
(19, NULL, 'IT-0015', '20', 'PVC INSULATION  TAPE  BLACK  ABRO ', '18', '26', '7', NULL, '85469', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 200, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-12-20 02:27:36', '90', ''),
(20, NULL, 'IT-0016', '(Rf-505)', 'Raditor Flush  354  ML Abro ', '18', '26', '7', NULL, '3811', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '49', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-12-20 02:27:17', '20', ''),
(21, NULL, 'IT-0017', '900', 'Spray Paint Gloss Black (Abro) ', '18', '26', '7', NULL, '32082090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-27 03:25:41', '90', ''),
(22, NULL, 'IT-0018', '90', 'SPRAY PAINT  MATT BLACK ABRO ', '18', '26', '7', NULL, '3208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-219', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-28 02:01:18', '9', ''),
(23, NULL, 'IT-0019', '(SP-36)', 'SPRAY PAINT SILVER  ABRO ', '18', '26', '7', NULL, '3208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-26 10:52:29', '20', ''),
(24, NULL, 'IT-0020', '100', 'ENGINE OIL 15 W 40 CH4 210LTR (ALE21015W40CH)', '19', '27', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-625', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-03 04:17:33', NULL, ''),
(25, NULL, 'IT-0021', NULL, 'ENGINE OIL 2T 210 LTR (ALE0210 2TGOLD)', '19', '27', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-27 02:06:25', NULL, ''),
(26, NULL, 'IT-0022', NULL, 'ENGINE OIL 2T 210LTR GREEN (ALE0210 2TGREEN)', '19', '27', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(27, NULL, 'IT-0023', NULL, 'ENGINE OIL 2T 50LT (ALE050 2TGREEN)', '19', '27', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(28, NULL, 'IT-0024', '(AWK871027)', 'ACCENT CRDI / ELENTRA  6 SPRING DSL ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-511', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-19 06:21:29', '20', ''),
(29, NULL, 'IT-0025', '(AWK871007)', 'ACE/MAGIC TATA DSL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1188', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-27 00:25:06', '200', ''),
(30, NULL, 'IT-0026', '20', 'ALTO K10/WAGNR K10 1L(YG4 MINOR)PTL CLUTCH ALLIED', NULL, NULL, NULL, 'null', 'ALTO K10/WAGNR K10 1L(YG4 MINOR)PTL CLUTCH ALLIED', 90, '90', 'khjhvjbb90,jvhv', '2024-10-17', 'jvhjbhjb', 'Fixed', '90', '1000', NULL, 0, 'Exclusive', '1280', '800', '9000', '90', '2', '-91', 'active', 'none_app', NULL, NULL, '1', '5', 'item/SNPFdHesUqQxQQJiXyEOSa8jxJyHjtbsPmKwo1qc.png', '2024-10-30 03:34:06', '2024-11-19 06:10:28', '20', ''),
(31, NULL, 'IT-0027', '(AWK871119)', 'ALTO STD , LXI , PETROL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-201', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-13 01:00:08', '90', ''),
(32, NULL, 'IT-0028', '(AWK871021)', 'ALTO VX, VXI WAGONR R 1999>2101 (P) ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-407', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-14 02:24:07', '180', ''),
(33, NULL, 'IT-0029', '(AWK871011)', 'ASTAR/ALTO K 10WAGR K10 CELERIO (P) CLUTCH ALLIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-163', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-13 05:39:34', '90', ''),
(34, NULL, 'IT-0030', '(AWK871127)', 'BEAT DIESEL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-37', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-08 23:34:28', '220', ''),
(35, NULL, 'IT-0031', '(AWK871016)', 'BEAT PETROL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-19 06:23:56', NULL, ''),
(36, NULL, 'IT-0032', '(AWK871001)', 'BOLERO 4 SPRING DSL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(37, NULL, 'IT-0033', '(AWK871095)', 'Bolero 6 Spring Dsl Clutch  Allied ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(38, NULL, 'IT-0034', '(AWK871020)', 'CAR 800 CC PETROL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(39, NULL, 'IT-0035', '(AWK871103)', 'DOST LEYLAND 1.25 TON 1.5 BSS111/IV ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(40, NULL, 'IT-0036', '(AWK871087)', 'EECO MARUTHI CUTCH SET (A) ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(41, NULL, 'IT-0037', '(AWK871044)', 'ESTEEM/ZEN(D)/BALENO(P) CLUTCH SET ALLIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(42, NULL, 'IT-0038', '(AWK871008)', 'INDICA/ INDIGO DSL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(43, NULL, 'IT-0039', '(AWK871023)', 'INDIGO/ INDICA DICORE [TCIC]DSL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(44, NULL, 'IT-0040', '(AWK871002)', 'INNOVA TOYOTA DSL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(45, NULL, 'IT-0041', '(AWK871113)', 'JEETO MAHINDRA DSL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(46, NULL, 'IT-0042', '(AWK871020)', 'Maruti 800 Clutch Allide ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(47, NULL, 'IT-0043', '(AWK871003)', 'MAXIMO/SUPRO/JEETO DIESEL CLUTCH ALIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-27 06:48:10', NULL, ''),
(48, NULL, 'IT-0044', '(AWK871038)', 'QUALIS TOYOTA DIESEL ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(49, NULL, 'IT-0045', '(AWK871025)', 'SANTRO/ EON  PETROL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(50, NULL, 'IT-0046', '(AWK871031)', 'SCORPIO CRDI DSL CLUTCH ALLIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(51, NULL, 'IT-0047', '(AWK871017)', 'SPARK CHEVROLET PETROL CLUTCH ALLIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-123', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-02 11:49:12', NULL, ''),
(52, NULL, 'IT-0048', '(AWK871121)', 'SUPER ACE TATA/VENTURE DSL CLUTCH ALLIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(53, NULL, 'IT-0049', '(AWK871005)', 'SWIFT/DEZIRE/RITZ/SX4 DIESEL CLUTCH ALLIED ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-09 06:49:36', NULL, ''),
(54, NULL, 'IT-0050', '(AWK871026)', 'TAVERA DSL CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(55, NULL, 'IT-0051', '(AWK871010)', 'TRAVELLER BS 3, FORCE TRAX DSL  ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(56, NULL, 'IT-0052', '(AWK871006)', 'VAN MARUTHI PTROL ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(57, NULL, 'IT-0053', '(AWK871070)', 'VISTA LINEA MANZA DSL, QUADRAJET ALLIED CLUTCH ', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(58, NULL, 'IT-0054', '(AWK871055)', 'Zen/ MATIZ PETROL  ALLIED CLUTCH', 'No Data', 'No Data', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(59, NULL, 'IT-0055', NULL, 'AB-60 85ML (AB-60)', '21', '30', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(60, NULL, 'IT-0056', NULL, 'ADL333-85ML (ADL85ML)', '21', '30', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '36', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(61, NULL, 'IT-0057', NULL, 'Anabond 122-4ML Thread Locker', '21', '30', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(62, NULL, 'IT-0058', NULL, 'Anabond 412-4ML Bearin Retainer', '21', '30', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '210', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(63, NULL, 'IT-0059', NULL, 'Anabond 666T-Max 25gm(White)', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '155', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(64, NULL, 'IT-0060', NULL, 'Anabond 666T Maxx 100gms(White)', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(65, NULL, 'IT-0061', NULL, 'Anabond Auto Gasket Maker Blue 25gm', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '69', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-02 23:41:15', NULL, ''),
(66, NULL, 'IT-0062', NULL, 'Anabond Auto Gasket Maker Grey 25gm', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(67, NULL, 'IT-0063', NULL, 'Anabond Auto Gasket Maker Grey 85gm', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(68, NULL, 'IT-0064', NULL, 'Anabond Auto Gasket Maker Red 25gm', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '69', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(69, NULL, 'IT-0065', NULL, 'Anabond Auto Gasket Maker Red 33gm', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(70, NULL, 'IT-0066', NULL, 'Anabond Auto Gasket Maker Red 85gm', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(71, NULL, 'IT-0067', NULL, 'ANABOND BLACK 25 GM', '21', '30', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(72, NULL, 'IT-0068', NULL, 'ANABOND CYNO-S2-20GMS(FLEX QUICK)', '21', '30', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '55', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-09 22:55:22', NULL, ''),
(73, NULL, 'IT-0069', NULL, 'ANABOND FLEXBOND 20GMS (FLEX BOND)', '21', '30', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(74, NULL, 'IT-0070', NULL, 'Anabond Super Glue 2gm', '21', '30', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '123', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(75, NULL, 'IT-0071', NULL, 'Anabond Super Glue-500mg', '21', '30', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '705', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(76, NULL, 'IT-0072', NULL, 'TEMPO TRAVALLER CLUTCH BEARING (APR MC-71)', '22', '31', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(77, NULL, 'IT-0073', NULL, 'ARALDITE 10 GRM KLEAR (10GM)', '23', '32', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-12 01:40:07', NULL, ''),
(78, NULL, 'IT-0074', NULL, 'ARALDITE 13 GRM STANDARD (13 GRM)', '23', '32', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '68', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(79, NULL, 'IT-0075', NULL, 'ARALDITE 26GM KLEAR (26GRM)', '23', '32', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(80, NULL, 'IT-0076', NULL, 'ARALDITE 36 GRM STANDARD (36GRM)', '23', '32', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(81, NULL, 'IT-0077', '(SP-24)', 'AUTO WIPE 24\" WIPER BLADE ', '24', '33', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(82, NULL, 'IT-0078', '(SP-19)', 'AUTO WIPE WIPER BLADE \"19 ', '24', '33', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(83, NULL, 'IT-0079', '(SP-20)', 'AUTOWIPE  WIPER BLADE \"20 ', '24', '33', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(84, NULL, 'IT-0080', '(SP-21)', 'AUTOWIPE  WIPER BLADE  \"21 ', '24', '33', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(85, NULL, 'IT-0081', '(SP-22)', 'AUTOWIPE  WIPER BLADE \"22 ', '24', '33', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(86, NULL, 'IT-0082', '(SP-12(M)B)', 'AUTO WIPE  WIPER BLADE 12\" (M)B ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '48', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(87, NULL, 'IT-0083', '(SP-12(M) H)', 'AUTO WIPE  WIPER BLADE 12\"(M) H ', '24', '33', '7', NULL, '8/512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '46', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(88, NULL, 'IT-0084', '(SP-16)', 'AUTO WIPE WIPER  BLADE 16\" ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '46', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(89, NULL, 'IT-0085', '(SP-17(M) S)', 'AUTO WIPE WIPER BLADE 17\"(M)S ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '29', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(90, NULL, 'IT-0086', NULL, 'AUTO WIPE WIPER BLADE 18\" ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '42', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-03 02:25:36', NULL, ''),
(91, NULL, 'IT-0087', '(SP-18(M)A)', 'AUTO WIPE WIPER BLADE 18\"(M)A ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(92, NULL, 'IT-0088', '(SP-20 A)', 'AUTO WIPE WIPER BLADE 20\" A ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '23', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(93, NULL, 'IT-0089', '(SP-20B)', 'AUTO WIPE WIPER BLADE 20\" B ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(94, NULL, 'IT-0090', '(SP-20C)', 'AUTO WIPE WIPER BLADE  20\" C ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-11-04 01:39:14', '90', ''),
(95, NULL, 'IT-0091', '(SP-24(B))', 'AUTO WIPE WIPER BLADE 24\" (B) ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(96, NULL, 'IT-0092', '(SP-28B)', 'AUTO WIPE WIPER BLADE 28\" B ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(97, NULL, 'IT-0093', '(SP-9)', 'AUTO WIPE WIPER BLADE 9\" ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(98, NULL, 'IT-0094', '(SP9(M))', 'AUTOWIPE WIPER BLADE MAHINDRA COMMANDER (HOOK) ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(99, NULL, 'IT-0095', '(SPA-T/ACE LH)', 'WIPER ARM  ACE MAGIC HOOK LH  AUTO WIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(100, NULL, 'IT-0096', '(SPA-J-16A)', 'WIPER ARM BOLERO PICK UP HOOK (R/L) AUTOWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(101, NULL, 'IT-0097', '(SPA-T/L28)', 'WIPER ARM EXTRA LONG ARM FOR BUS AUTOWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(102, NULL, 'IT-0098', '(SPA-E18)', 'WIPER ARM  LOAD KING /MAZDA /EICHER ( BAYONET ) AUT ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(103, NULL, 'IT-0099', '(SPA-J12B)', 'WIPER ARM  M-550MDI NUT TYPE (R) AUTO WIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(104, NULL, 'IT-0100', '(SPA-M17A-LT)', 'WIPER ARM MARUTHI 800 (HOOK) LH AUTO WIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '35', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(105, NULL, 'IT-0101', '(SPA-M17A-RT)', 'WIPER ARM MARUTHI 800(HOOK) RH  AUOTWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '37', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:06', '2024-10-30 03:34:06', NULL, ''),
(106, NULL, 'IT-0102', '(SPA-E18U)', 'WIPER ARM  MAZDA /EICHER LCV (R/L )HOOK  AUTOWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(107, NULL, 'IT-0103', '(SPA-M12A-LT)', 'WIPER ARM OMNI (HOOK ) LH AUTOWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(108, NULL, 'IT-0104', '(SPA-M12A-RT)', 'WIPER ARM  OMNI (HOOK) RH AUTOWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(109, NULL, 'IT-0105', '(SPA-T/L20)', 'WIPER ARM TATA 407 /608/709  (L) AUTO WIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(110, NULL, 'IT-0106', '(SPA-T/ACE RH)', 'WIPER ARM TATA ACE  MAGIC HOOK (R/L) AUTOWIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(111, NULL, 'IT-0107', '(SPA-T/ACE -N-R)', 'WIPER ARM TATA ACE (N) RH AUTO WIPE ', '24', '33', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(112, NULL, 'IT-0108', '(DCS-0172D)', 'WIPER BLADE 17 (425MM) DENSO ', '24', '33', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(113, NULL, 'IT-0109', '(DCS-0162D)', 'WIPPER BLADE DEN16(400MM ) DENSO ', '24', '33', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(114, NULL, 'IT-0110', '(6005 2RS)', '6005 2rs Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(115, NULL, 'IT-0111', '(PRB 04)', 'Accent Clutch Bearing ', '25', '34', '7', NULL, '84828000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(116, NULL, 'IT-0112', '(25BWD01)', 'Alto/WagnoR/Estilo R/W Beraing ', '25', '34', '7', NULL, '84821000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(117, NULL, 'IT-0113', '(11949/10)', 'Bearing 11949/10 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(118, NULL, 'IT-0114', '(44649/10)', 'BEARING  44649/10 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(119, NULL, 'IT-0115', '(501349/14)', 'Bearing 501349/14 ', '25', '34', '7', NULL, '84822000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(120, NULL, 'IT-0116', '(6302 2RS)', 'BEARING 6302 2RS ', '25', '34', '7', NULL, '84821011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(121, NULL, 'IT-0117', '(6303 2RS)', 'Bearing 6303 2RS ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(122, NULL, 'IT-0118', '(DAC 34640037 2RS)', 'Beat F/W Bearing DAC 3464 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(123, NULL, 'IT-0119', '(DAC 3668 2RS)', 'Car T-2/ Van/ Esteem 805172 2RS F/W Bearing ', '25', '34', '7', NULL, '84821000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(124, NULL, 'IT-0120', '(DAC 407442 ABS)', 'Corolla/Altis ABS F/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(125, NULL, 'IT-0121', '(50CRN31P-4B)', 'Corolla Clutch Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(126, NULL, 'IT-0122', '(DAC 407442)', 'Corolla Non ABS F/W Bearing (40BWD12CA) ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(127, NULL, 'IT-0123', '(KT0514/108)', 'Cruze T-1 Clutch Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(128, NULL, 'IT-0124', '(AUX0006B)', 'Cruze T-2 Clutch Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(129, NULL, 'IT-0125', '(TX41 WH)', 'DOST CLUTCH BEARING WITH HUB ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(130, NULL, 'IT-0126', '(DAC 306248)', 'Duster/Terano ABS R/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(131, NULL, 'IT-0127', '(DAC 3666)', 'Eon F/W Bearing 52710 4N000 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(132, NULL, 'IT-0128', '(DAC 265644)', 'Eon R/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(133, NULL, 'IT-0129', '(BAHB311396)', 'Fiesta F/W Bearing DAC 39720037 4RS ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(134, NULL, 'IT-0130', '(DAC 3872)', 'Handa City T-1 / T-2 F/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(135, NULL, 'IT-0131', '(38BWD26 ABS)', 'Honda City T-3/T-4 F/w Bearing ABS ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(136, NULL, 'IT-0132', '(DAC 437844)', 'Honda Civic F/W Bearing ABS ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(137, NULL, 'IT-0133', '(387237)', 'I.20 Elite F/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(138, NULL, 'IT-0134', '(06-10-8017)', 'Indica/indigo/Super Ace/winger Clutch Bearing ', '25', '34', '7', NULL, '84828000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(139, NULL, 'IT-0135', '(562587)', 'Indica Vista Clutch Beaaring ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(140, NULL, 'IT-0136', '(31230-35070)', 'Innova Clutch Bearing 31230-35070 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(141, NULL, 'IT-0137', '(43KWD07)', 'Innova F/W ABS ', '25', '34', '7', NULL, '84821030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(142, NULL, 'IT-0138', '(BTH 1238)', 'Iris/Zip R/W Bearing 1238ZZ ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(143, NULL, 'IT-0139', '(BAH 0265)', 'Kwid F/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(144, NULL, 'IT-0140', '(224837)', 'Kwid/Redigo/Duster R/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(145, NULL, 'IT-0141', '(48TKB3201)', 'Lancer Clutch Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(146, NULL, 'IT-0142', '(DAC 37720037 2RS)', 'Logan F/W Bearing ', '25', '34', '7', NULL, '84821000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(147, NULL, 'IT-0143', '(BAH0052C)', 'MAXIMO F/W BEARING N/M ', '25', '34', '7', NULL, '84821030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(148, NULL, 'IT-0144', '(DAC 37720037 ABS)', 'Micra/Punto/Logan/Verito F/W Bearing ABS ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(149, NULL, 'IT-0145', '(AU 0504-S)', 'Micra/Sunny R/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(150, NULL, 'IT-0146', '(02T14416)', 'Polo Dsl Clutch Bearing Vw500044010 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(151, NULL, 'IT-0147', '(50 SCRN 40P)', 'Qualis Clutch Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(152, NULL, 'IT-0148', '(PRB 25)', 'Santro / I.10/i.20 Ptl Clutch Bearing ', '25', '34', '7', NULL, '84828000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(153, NULL, 'IT-0149', '(DAC 3870)', 'Santro/I.10/I.20/Verna O/M F/W Bearing 387037 ', '25', '34', '7', NULL, '84821000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(154, NULL, 'IT-0150', '(11749/10)', 'Santro T-1/Cielo/Opel Corsa R/W Bearing ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(155, NULL, 'IT-0151', '(407236)', 'Swift F/W Bearing ABS 805800 ', '25', '34', '7', NULL, '8482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(156, NULL, 'IT-0152', '(30205)', 'Tata Ace/Matiz/Spark R/W Bearing 30205 ', '25', '34', '7', NULL, '84822000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(157, NULL, 'IT-0153', NULL, 'Best Lub Victroy 5W30 API-SN 1ltr', '26', '35', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(158, NULL, 'IT-0154', NULL, 'Best Lub XP 90 GL-4 0.5ltr', '26', '35', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(159, NULL, 'IT-0155', '(3397011642)', 'Bosch WB 12\" Eco ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(160, NULL, 'IT-0156', '(3397004875)', 'Bosch WB 13/13\" Eco ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(161, NULL, 'IT-0157', '(3397006504)', 'Bosch WB 18\" Clr Advt ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(162, NULL, 'IT-0158', '(3397011647)', 'Bosch WB 19\" Eco ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(163, NULL, 'IT-0159', '(3397006506)', 'Bosch Wb 20\" Clr Adv ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No Data', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(164, NULL, 'IT-0160', '(3397011649)', 'Bosch WB 21\" Eco ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '19', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(165, NULL, 'IT-0161', '(3397011651)', 'Bosch WB 24\" Eco ', '27', '36', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(166, NULL, 'IT-0162', '(9451037422)', 'B275 OIL FILTER BOSCH ', '28', '37', '7', NULL, '8412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(167, NULL, 'IT-0163', '(F002 H60 016 8f8)', 'Dot 3 Brake Fluid 100ml Bosch ', '29', '38', '7', NULL, '381910010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(168, NULL, 'IT-0164', '(BF300)', 'Kbx Dot3 100ml ', '29', '38', '7', NULL, '38.1.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '160', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-16 01:56:53', '5', ''),
(169, NULL, 'IT-0165', '(BF312)', 'KBX Dot 3 1/2 Lt ', '29', '38', '7', NULL, '38.1.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '80', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(170, NULL, 'IT-0166', '(BF314)', 'Kbx Dot 3 1/4 Lt ', '29', '38', '7', NULL, '38.1.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '143', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(171, NULL, 'IT-0167', '(BF400)', 'Kbx Dot 4 100ml ', '29', '38', '7', NULL, '38.1.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '80', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-19 02:38:37', NULL, ''),
(172, NULL, 'IT-0168', '(BF412)', 'Kbx Dot 4 1/2Lt ', '29', '38', '7', NULL, '38.1.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '65', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(173, NULL, 'IT-0169', '(BF414)', 'KBX DOT4 250ml ', '29', '38', '7', NULL, '38.1.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '96', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(174, NULL, 'IT-0170', 'uijj', 'COM WB 16Y CAP LESS 1016 BULB YELLOW COMET (WB16Y)', '84', '67', '7', NULL, '85392930', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(175, NULL, 'IT-0171', '(CP 477)', 'PVC TAPE 12.5MTR ', '83', '66', '7', NULL, '3917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '52', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(176, NULL, 'IT-0172', '(CP 478)', 'PVC TAPE 25MTR ', '83', '66', '7', NULL, '3917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '56', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(177, NULL, 'IT-0173', '(CP 479)', 'PVC TAPE 50MTR ', '83', '66', '7', NULL, '3917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(178, NULL, 'IT-0174', '(CP 476)', 'PVC TAPE 6.25MTR ', '83', '66', '7', NULL, '3917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '60', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(179, NULL, 'IT-0175', '(RA7YC)', 'ALTO800 WAGON R 800CC 5 GEAR ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(180, NULL, 'IT-0176', '(CCHRA7YCKAM4)', 'Alto K 10 Sparkplug ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(181, NULL, 'IT-0177', '(RA7YC-K)', 'Alto/ Wagonor K Series  Spark Plug ', '82', '65', '7', NULL, '8511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(182, NULL, 'IT-0178', '(RC10YC4)', 'HYNDAI SANTRO ;I10;VERNA; HONDA BRIO SPARK PLUG ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-12 05:06:27', '20', ''),
(183, NULL, 'IT-0179', '(TER8YC)', 'HYUNDAI I 10, KAPPA, I 20  PLUG[C] ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(184, NULL, 'IT-0180', '(CCHTER8YCAM)', 'I.10 Kappa Finished Spark Plug ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-133', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-04 15:59:59', '20', ''),
(185, NULL, 'IT-0181', '(RC8YC)', 'MARUTI MPFI, ESTEEM & ZEN ESTILO PLUG CHAMPION ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(186, NULL, 'IT-0182', '(N10YC)', 'MARUTI NON MPFI, ZE,800,GYPSY&OMINI PLUG CHAMPION ', '82', '65', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(187, NULL, 'IT-0183', NULL, 'COOLANT GREEN 5LTR', '81', '64', '8', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(188, NULL, 'IT-0184', NULL, 'COOLENT GREEN  50 LTR', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(189, NULL, 'IT-0185', NULL, 'Mahel Coolent Green 1ltr (KFW9844014)', '81', '64', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(190, NULL, 'IT-0186', NULL, 'Safe Coolant Green 1 Lt', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '22', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-26 10:30:14', NULL, ''),
(191, NULL, 'IT-0187', NULL, 'SAFE COOL COOLANT BLUE 1 LTR', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(192, NULL, 'IT-0188', NULL, 'SAFE COOLENT  1 LTR  GREEN | 1:7', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(193, NULL, 'IT-0189', NULL, 'SAFE COOLENT 1 LTR RED  | 1:7', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(194, NULL, 'IT-0190', NULL, 'SAFE COOLENT BLUE  500 ML', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(195, NULL, 'IT-0191', NULL, 'Safe Coolent Green 0.5ltr', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(196, NULL, 'IT-0192', NULL, 'Safe Coolent Pink 1ltt', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(197, NULL, 'IT-0193', NULL, 'Safe Coolent Red 0.5ltr', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(198, NULL, 'IT-0194', NULL, 'Safe Coolent Red 1ltr', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '34', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(199, NULL, 'IT-0195', NULL, 'Safe Cool Green Coolent 5ltr', '81', '64', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(200, NULL, 'IT-0196', NULL, 'Safe Cool Red Coolent 5ltr', '81', '64', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(201, NULL, 'IT-0197', NULL, 'TCL Coolent Blue  0.5ltr (1:3) (13005-B)', '81', '64', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(202, NULL, 'IT-0198', NULL, 'TCL Coolent Green 0.5ltr (1:3) (13005-G)', '81', '64', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(203, NULL, 'IT-0199', NULL, 'TCL Coolent Red 0.5ltr (1:3) (13005-R)', '81', '64', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(204, NULL, 'IT-0200', NULL, 'AUTO TECH 20W50 API SN-GREEN 2.1 LTR DANILO', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(205, NULL, 'IT-0201', NULL, 'DANILO 10W30 900ML', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(206, NULL, 'IT-0202', NULL, 'Danilo 15W40 CH4 6L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(207, NULL, 'IT-0203', NULL, 'Danilo 15w50 Api Sn 2.5 L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(208, NULL, 'IT-0204', NULL, 'Danilo 20 W 40 4T 210 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(209, NULL, 'IT-0205', NULL, 'DANILO 20W50 500ML', '30', '39', '8', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '45', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(210, NULL, 'IT-0206', NULL, 'DANILO 20W50 APSI SN GREEN 2.1 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(211, NULL, 'IT-0207', NULL, 'Danilo 5w30 210 L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(212, NULL, 'IT-0208', NULL, 'DANILO 5W30 3.5LTR', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '38', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(213, NULL, 'IT-0209', NULL, 'DANILO  5W30 3 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '31', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(214, NULL, 'IT-0210', NULL, 'Danilo 5w30 500ml', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(215, NULL, 'IT-0211', NULL, 'Danilo 5 W30 50 Ltr', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(216, NULL, 'IT-0212', NULL, 'Danilo 5w40 Fully Synthetic 1lt', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(217, NULL, 'IT-0213', NULL, 'Danilo 5w40 Fully Synthetic 500ml', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(218, NULL, 'IT-0214', NULL, 'DANILO 75W90 1 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(219, NULL, 'IT-0215', NULL, 'Danilo 80w90 1L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(220, NULL, 'IT-0216', NULL, 'DANILO 80W90 500 ML', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '38', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(221, NULL, 'IT-0217', NULL, 'DANILO 80W90 50 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(222, NULL, 'IT-0218', NULL, 'DANILO 80W90  5 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(223, NULL, 'IT-0219', NULL, 'DANILO ADVANCE 75W90 GL-5 2.5 LTR', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(224, NULL, 'IT-0220', NULL, 'Danilo Advanced Gear EP-90 GL-4 1lt', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '22', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(225, NULL, 'IT-0221', NULL, 'Danilo Advanced Gear EP-90 GL-4 500ml', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '23', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(226, NULL, 'IT-0222', NULL, 'Danilo Advanced Gear Oil 85w140 Gl 500ml', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(227, NULL, 'IT-0223', NULL, 'DANILO ADVANCE GEAR EP-140 -500ML', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(228, NULL, 'IT-0224', NULL, 'Danilo Advance Gear Oil 85w140 Gl 5lt', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(229, NULL, 'IT-0225', NULL, 'Danilo Advance G Ep 140 GL -1L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(230, NULL, 'IT-0226', NULL, 'Danilo DEF -5L (Add Blue)', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(231, NULL, 'IT-0227', NULL, 'DANILO DEF  ADD BLUE 10 L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(232, NULL, 'IT-0228', NULL, 'Danilo Def- Diesel Exaust Fluid 20L (Add Blue)', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(233, NULL, 'IT-0229', NULL, 'DANILO EP 140 210 Ltr', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(234, NULL, 'IT-0230', NULL, 'DANILO GERA OIL 85W140 20L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(235, NULL, 'IT-0231', NULL, 'DANILO GTI 20W50 SN/CH4 210LR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(236, NULL, 'IT-0232', NULL, 'Danilo Hydraulic 46- 26L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(237, NULL, 'IT-0233', NULL, 'DANILO HYDRAULIC  68 -26 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(238, NULL, 'IT-0234', NULL, 'Danilo Hydrolic 68  -5L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(239, NULL, 'IT-0235', NULL, 'DANILO MULTI TECH TDI 15W40SN CH 4 -3.5L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(240, NULL, 'IT-0236', NULL, 'DANILO MULTI TECH TDI 15W40 SNCH4 50LT (15W40 SN/CH4 50L DANILO)', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(241, NULL, 'IT-0237', NULL, 'Danilo Radiator Coolant Green 5Lt', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(242, NULL, 'IT-0238', NULL, 'Danilo Radiator Coolant Red 1L', '30', '39', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(243, NULL, 'IT-0239', NULL, 'Danilo Raditor  Coolant  Green 1 Ltr', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '80', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(244, NULL, 'IT-0240', NULL, 'DANILO RADITOR   COOLANT  GREEN 500 ML', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '65', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(245, NULL, 'IT-0241', NULL, 'DANILO RADITOR COOLENT BLUE 1 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(246, NULL, 'IT-0242', NULL, 'DANILO SPORT 4T 10W 30 API SN 210 L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(247, NULL, 'IT-0243', NULL, 'DANILO SPORT 4T 10W30 API SN 50 L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(248, NULL, 'IT-0244', NULL, 'Danilo Sport 4T 10w30 API SN 800ml', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '155', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(249, NULL, 'IT-0245', NULL, 'Danilo Sport 4T 20w40 API SN 1LT', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '112', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(250, NULL, 'IT-0246', NULL, 'DANILO SPORT 4T 20W40  API SN 900 ML', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '120', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(251, NULL, 'IT-0247', NULL, 'DANILO  TQ ATF 0.5LT', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '107', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(252, NULL, 'IT-0248', NULL, 'DANILO TQ ATF  1L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(253, NULL, 'IT-0249', NULL, 'DANILO  TQ ATF 500 ML', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(254, NULL, 'IT-0250', NULL, 'Danilo Ultratech 20w40 CH4/SF 1L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(255, NULL, 'IT-0251', NULL, 'Danilo Ultratech 20W40 CH4/SF 500ml', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '23', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(256, NULL, 'IT-0252', NULL, 'Danilo Ultratech 20w40 CH4/SF 5L', '30', '39', '8', NULL, '27101980', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(257, NULL, 'IT-0253', NULL, 'Danilo Ultratech 20w40 CH 4/SF Oil 50L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(258, NULL, 'IT-0254', NULL, 'DANILO  UNIVERSAL 15W40 CH 4 2LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(259, NULL, 'IT-0255', NULL, 'Danilo Universal Gti 20w50 SN/CH4 3.5', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(260, NULL, 'IT-0256', NULL, 'Danilo Universal Gti 20w50 SN/CH4 3.5L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '45', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(261, NULL, 'IT-0257', NULL, 'Danilo Universal GTI 20w50 SN/CH4 3L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(262, NULL, 'IT-0258', NULL, 'DANILO UNIVERSAL TURBO 15W40 CH 4-0.5L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '27', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(263, NULL, 'IT-0259', NULL, 'DANILO UNIVERSAL TURBO 15W40 CH4-1L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(264, NULL, 'IT-0260', NULL, 'Danilo  Universal   Turbo  15w40 CH4 20 LTR', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(265, NULL, 'IT-0261', NULL, 'Danilo Universal Turbo 15w40 CH4 210L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(266, NULL, 'IT-0262', NULL, 'DANILO UNIVERSAL  TURBO 15W40 CH4 3L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(267, NULL, 'IT-0263', NULL, 'DANILO UNIVERSAL TURBO 15W40 CH4 50L (15W40 CH4 50L)', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(268, NULL, 'IT-0264', NULL, 'Danlio 5w30 1 Ltr', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(269, NULL, 'IT-0265', NULL, 'DANLIO UNIVERSAL HD 15W40 CI-4 PLUS  210 L', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(270, NULL, 'IT-0266', NULL, 'GEL GREASE  RED 500 GM  DANILO', '30', '39', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(271, NULL, 'IT-0267', NULL, 'Hydrolic 68 Danilo 210 L', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(272, NULL, 'IT-0268', NULL, 'RADITOR COOLENT RED 500 ML   DANILO', '30', '39', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(273, NULL, 'IT-0269', NULL, 'Hyundai Santro/Accent/Honda City Spark Plug (K 16 PRU-11)', 'No Data', 'No Data', '7', NULL, '8511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(274, NULL, 'IT-0270', NULL, 'I 10 Kappa Spark Plug Denso (XU20HR9)', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(275, NULL, 'IT-0271', '800', 'Maruti 800cc/Zen/Esteem Spark Plug (067700-5960) (W 16 EPR-U)', 'No Data', 'No Data', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '190', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-18 04:32:31', '20', ''),
(276, NULL, 'IT-0272', NULL, 'MARUTI WAGON-R/ALTO/800 MPFI PLUG (XU 22 ERP-U)', 'No Data', 'No Data', '7', NULL, '8511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(277, NULL, 'IT-0273', NULL, 'Maruti Wagon-R/Alto/800 MPFI Spaark Plug (XU 22 EPR-U)', 'No Data', 'No Data', '7', NULL, '8511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '122', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(278, NULL, 'IT-0274', NULL, 'MARUTI ZEN/ ESTEEM MPFI SPARK PLUG (K 20 PR-U)', 'No Data', 'No Data', '7', NULL, '85111000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '68', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(279, NULL, 'IT-0275', NULL, 'DIGGNOLUB 15W40- 50 LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(280, NULL, 'IT-0276', NULL, 'Dignolub  10w30 800ml', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '456', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(281, NULL, 'IT-0277', NULL, 'Dignolub  10w30 Ci -4 Plus 4.5 Ltr', '78', '61', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(282, NULL, 'IT-0278', NULL, 'DIGNOLUB  10W30 SL 900ML', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '49', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(283, NULL, 'IT-0279', NULL, 'DIGNOLUB 15W40 CF4-1 LTR', '78', '61', '8', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '58', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(284, NULL, 'IT-0280', NULL, 'DIGNOLUB  15W40 CF4- 3LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '32', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(285, NULL, 'IT-0281', NULL, 'DIGNOLUB  15W40  CF 4 500 ML', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '85', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(286, NULL, 'IT-0282', NULL, 'DIGNOLUB 15W40  CF4 50LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(287, NULL, 'IT-0283', NULL, 'DIGNOLUB  15W40  CF-4 5 LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(288, NULL, 'IT-0284', NULL, 'Dignolub  15w40 Ch-4 10 Ltr', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(289, NULL, 'IT-0285', NULL, 'DIGNOLUB 15W40 CI 4-10 LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(290, NULL, 'IT-0286', NULL, 'Dignolub  15w40 Ci-4 7.5 Ltr', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(291, NULL, 'IT-0287', NULL, 'Dignolub 20w40  1 Ltr', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '127', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(292, NULL, 'IT-0288', NULL, 'DIGNOLUB 20W40 SL 900 ML', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '248', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(293, NULL, 'IT-0289', NULL, 'DIGNOLUB 20W40 SL/CF-3LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(294, NULL, 'IT-0290', NULL, 'DIGNOLUB  20W40 SL/CF 500 ML', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '88', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(295, NULL, 'IT-0291', NULL, 'DIGNOLUB 20W50 SN3 BULLET 3LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(296, NULL, 'IT-0292', NULL, 'DIGNOLUB 20W50 SN 3LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '46', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(297, NULL, 'IT-0293', NULL, 'DIGNOLUBE 15W40 CF4-10 LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(298, NULL, 'IT-0294', NULL, 'DIGNOLUBE 15W40 CF4 -3.5LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(299, NULL, 'IT-0295', NULL, 'DIGNOLUBE 15W40 CF4 -7.5 LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(300, NULL, 'IT-0296', NULL, 'DIGNOLUBE  15W40  CH4  26 LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(301, NULL, 'IT-0297', NULL, 'DIGNOLUBE 15W40 CH4 50 LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(302, NULL, 'IT-0298', NULL, 'DIGNOLUBE  15W40 CH-4 7.5 LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(303, NULL, 'IT-0299', NULL, 'Digno Lube 20w40 SL-1Ltr', '78', '61', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '180', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(304, NULL, 'IT-0300', NULL, 'DIGNOLUBE 20W40 SL/CF- 50 LTR', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(305, NULL, 'IT-0301', NULL, 'DIGNOLUB  GEAR OIL 140 -26 LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(306, NULL, 'IT-0302', NULL, 'DIGNOLUB  GEAR OIL 140 GL4 1 LTR (10 GL4-1)', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '51', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(307, NULL, 'IT-0303', NULL, 'DIGNOLUB GEAR OIL 140 GL4 500ML (140 GL4 500)', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(308, NULL, 'IT-0304', NULL, 'DIGNOLUB GEAR OIL 90 26-LTR', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(309, NULL, 'IT-0305', NULL, 'DIGNOLUB GEAR OIL 90 GL 4- 1LTR (90-GL4-1)', '78', '61', '8', NULL, '20101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '47', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(310, NULL, 'IT-0306', NULL, 'DIGNOLUB GEAR OIL 90 GL4 500 ML (90 GL 40-500)', '78', '61', '8', NULL, '27101972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '42', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(311, NULL, 'IT-0307', NULL, 'DIGNOLUB  GEAR OIL 90 -GL4-50 LTR', '78', '61', '8', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(312, NULL, 'IT-0308', NULL, 'FORK OIL 350 ML DIGNOLUB', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '63', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(313, NULL, 'IT-0309', NULL, 'GEAR OIL EP- 140  50 LTR DIGNOLUBE', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(314, NULL, 'IT-0310', NULL, 'MARINE 2T ENGINE OIL TC -W3-4L DIGNOLUB', '78', '61', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(315, NULL, 'IT-0311', NULL, 'DR.COOL COOLENT GREEN 1LT', '77', '60', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(316, NULL, 'IT-0312', NULL, 'Dr. Cool Radiator Coolent Blue 1ltr', '77', '60', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(317, NULL, 'IT-0313', NULL, 'Dr. Cool Radiator Coolent Green 1/2ltr', '77', '60', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(318, NULL, 'IT-0314', NULL, 'Dr. Cool Radiatro Coolent Red 1ltr', '77', '60', '8', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(319, NULL, 'IT-0315', 'Ek 6218', 'Accent CRDI Dsl Fuel Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(320, NULL, 'IT-0316', 'EK -4737', 'AIR FILTER JEETO  ELOFIC ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(321, NULL, 'IT-0317', 'EK5145', 'Alto 800 Air Filter  (E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(322, NULL, 'IT-0318', 'Ek 4240', 'Alto Fuel Filter ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(323, NULL, 'IT-0319', 'Ek 5012', 'Alto/wgonR Air Filter(E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(324, NULL, 'IT-0320', 'EK 137', 'Ambassador Oil Filter Felt (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(325, NULL, 'IT-0321', 'EK-4560', 'ARMAD AIR FILTER E ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(326, NULL, 'IT-0322', 'EK 5136', 'BALENO DSL AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(327, NULL, 'IT-0323', 'EK 6189', 'BALWAN/TRAVELLER OIL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(328, NULL, 'IT-0324', 'Ek 4386', 'Beat/Enjoy DSL Oil Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(329, NULL, 'IT-0325', 'EK-6302', 'BEAT PTL OILFILTER(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(330, NULL, 'IT-0326', 'EK 4615', 'Bullet Air Filter ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(331, NULL, 'IT-0327', 'EK 4616', 'BULLET AIR FILTER 500CC ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(332, NULL, 'IT-0328', 'EK 4345', 'Bullet Oil Filter ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-136', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(333, NULL, 'IT-0329', 'EK--4756', 'BULLET OIL FILTER  WITH O RING ELOFIC ', '76', '59', '7', NULL, '8412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(334, NULL, 'IT-0330', 'EK-2552', 'CABIN AC FILTER  ALCZR/CRETA (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(335, NULL, 'IT-0331', '(EK-2546)', 'CABIN  AIR FILTER KWID (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(336, NULL, 'IT-0332', 'EK-2515', 'CABIN FILTER  ACCENT /EON/ GRAND I-10 (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(337, NULL, 'IT-0333', 'EK 2506', 'CABIN FILTER ALTO 800/ K10 ', '76', '59', '7', NULL, '84213920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(338, NULL, 'IT-0334', 'EK 2550', 'CABIN FILTER BEAT  (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(339, NULL, 'IT-0335', 'EK-2507', 'CABIN FILTER BREZZA ( E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(340, NULL, 'IT-0336', 'EK-2549', 'CABIN  FILTER  SANTRO  (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(341, NULL, 'IT-0337', 'EK -2551', 'CABIN FILTER SUNNY/ MICRA (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(342, NULL, 'IT-0338', 'EK 2502', 'CABIN FILTER SWIFT DSL & PTL ', '76', '59', '7', NULL, '84213920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(343, NULL, 'IT-0339', 'EK-2516', 'CABIN FILTER  SWIFT  (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(344, NULL, 'IT-0340', 'EK 1542', 'CAV FUEL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(345, NULL, 'IT-0341', 'EK 6087', 'DI OIL FILTER ( E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(346, NULL, 'IT-0342', 'EK 4625', 'DOST AIR FILTER (E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(347, NULL, 'IT-0343', 'EK 4419', 'DOST FUEL FILTER( E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(348, NULL, 'IT-0344', 'EK6485', 'DOST N/M OIL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(349, NULL, 'IT-0345', 'EK 6409', 'DOST OIL FILTER O/M ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(350, NULL, 'IT-0346', 'Ek 6413', 'Duster/ Sunny DSL Oil Filter (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(351, NULL, 'IT-0347', 'EK 5066', 'Eecco Versa Air Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(352, NULL, 'IT-0348', 'EK 4110', 'EICHER OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(353, NULL, 'IT-0349', 'EK 5127', 'EON PTRL A/F (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(354, NULL, 'IT-0350', 'EK 5110', 'ERTIGA CIAZ PTL  SWIFT T1 AIR FILTER ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(355, NULL, 'IT-0351', 'EK 4411', 'Etios Corola DSL Oil Filter(E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(356, NULL, 'IT-0352', 'Ek6410', 'Etios Dsl Oil Filter (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(357, NULL, 'IT-0353', 'EK 5041', 'FORD FIESTA/FIGO DSL A/F (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(358, NULL, 'IT-0354', 'Ek 4316', 'Ford Fiesta Oil Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(359, NULL, 'IT-0355', 'EK 288', 'FUEL FILTER .5 LTR COIL ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(360, NULL, 'IT-0356', 'EK-4420', 'FUEL FILTER SCORPIO  (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(361, NULL, 'IT-0357', 'EK 5123', 'HONDA AMAZE DSL AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(362, NULL, 'IT-0358', 'EK 6393', 'Honda City/Amaze DSL Oil Filter (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(363, NULL, 'IT-0359', 'Ek 6299', 'HONDA CITY V  OIL FILTER ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(364, NULL, 'IT-0360', 'EK 5063', 'Hyundai I.10 /Kappa Air Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(365, NULL, 'IT-0361', 'EK 5122', 'Hyundai Xcent Air Filter (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(366, NULL, 'IT-0362', 'EK-5048', 'I.10 AIR FILTER  (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(367, NULL, 'IT-0363', 'EK 5062', 'I.20/VERNA FLUDIC AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(368, NULL, 'IT-0364', 'EK 6249', 'INDICA/ACE OIL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(369, NULL, 'IT-0365', 'EK 5001', 'INDICA AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(370, NULL, 'IT-0366', 'EK 5045', 'INDICA VISTA AIR FLITER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(371, NULL, 'IT-0367', 'EK 6250', 'Indigo Oil Filter (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(372, NULL, 'IT-0368', 'EK 4582', 'INNOVA AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(373, NULL, 'IT-0369', 'EK 2503', 'Innova/Fortune/Corola Air Filter ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(374, NULL, 'IT-0370', 'Ek 4298', 'Innova Fuel Filter (E) ', '76', '59', '7', NULL, '842123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(375, NULL, 'IT-0371', 'EK 6205', 'Innova Oil Filter (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(376, NULL, 'IT-0372', 'EK 4640', 'IRIZ AIR FILTER (E)', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(377, NULL, 'IT-0373', 'EK 6050', 'Izusu DSL/ Contessa New O/F (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(378, NULL, 'IT-0374', 'EK 6275', 'JEETO 1.1 Oil Filter (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(379, NULL, 'IT-0375', 'EK 6109', 'Lancer DSL Oil Filter Elofic (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(380, NULL, 'IT-0376', 'EK -5033', 'LOGAN DSL  AIR FILTER ELOFIC (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(381, NULL, 'IT-0377', 'EK 6234', 'LOGAN DSL OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(382, NULL, 'IT-0378', 'EK 4367', 'MAHIN0DRA M2D CR F/F (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(383, NULL, 'IT-0379', 'EK 3970', 'Maruti 800 Fuel Filter (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(384, NULL, 'IT-0380', 'Ek 4244', 'Maruti 800 MPFI Fuel Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(385, NULL, 'IT-0381', 'Ek 5053', 'Maruti K 10/ Zen Estilo Ptl Air Filter (E)', '76', '59', '7', NULL, '84212100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(386, NULL, 'IT-0382', 'EK 6286', 'Maruti K Series Oil Filter (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(387, NULL, 'IT-0383', 'EK 6042', 'MARUTI O/M OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(388, NULL, 'IT-0384', 'EK4622', 'MAXIMO AIR FILTER (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(389, NULL, 'IT-0385', 'EK4340', 'MAXIMO FUEL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(390, NULL, 'IT-0386', 'EK 6338', 'MAXIMO OILFILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(391, NULL, 'IT-0387', 'EK 6282', 'Maximo Oil Filter(Elofic) (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(392, NULL, 'IT-0388', 'EK 3916', 'M/CAR AIR FILTER/800 O/M (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(393, NULL, 'IT-0389', 'EK 5009', 'M/CAR MPFI AIR FILTER (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(394, NULL, 'IT-0390', 'EK-6300', 'MICRA OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(395, NULL, 'IT-0391', 'EK 3848', 'M&M JEEP INTERNATIONAL B-275 O/F(E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(396, NULL, 'IT-0392', 'EK 6100', 'MPFI OIL FILTER (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-27', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(397, NULL, 'IT-0393', 'EK-6520 T', 'MPFI  OIL FILTER ELOFIC (E)', '76', '59', '7', NULL, '84212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(398, NULL, 'IT-0394', 'EK 5146', 'MTI BREEZA DSL AIR FILTER (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(399, NULL, 'IT-0395', 'EK 6264', 'Nano Oil Filter (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(400, NULL, 'IT-0396', 'EK-6308', 'OIL FILTER TOYOTA COROLLAALTIS (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(401, NULL, 'IT-0397', 'EK 3965', 'OMINI VAN FUEL FILTER (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(402, NULL, 'IT-0398', 'EK 3994', 'Omini Van/ Gipsy Air Filter (E)', '76', '59', '7', NULL, '48239090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(403, NULL, 'IT-0399', 'EK 6327', 'PGT/NISSAN/SCORPIO/XYLO/BOLERO PICK UP (E) OIL FILT (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '37', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(404, NULL, 'IT-0400', 'EK-4757', 'POLO OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(405, NULL, 'IT-0401', 'EK 6059', 'Qualis Fuel Filter Big (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(406, NULL, 'IT-0402', 'EK 4230', 'Qualis Fuel Filter Small (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(407, NULL, 'IT-0403', 'EK1513', 'QUALIS O/F F/F KIT (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(408, NULL, 'IT-0404', 'EK 6149', 'Qualis T2 Oil Filter Elofic (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(409, NULL, 'IT-0405', 'EK 4548', 'QUALIZ AIR FILTER (E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(410, NULL, 'IT-0406', 'EK 6464', 'RENULT KWID/ DATSUN REDIGO OIL FILTER (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(411, NULL, 'IT-0407', 'Ek 6073', 'S4/S3 Oil Filter Spin on (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(412, NULL, 'IT-0408', 'EK 5005', 'Santro Air Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(413, NULL, 'IT-0409', 'EK 6348', 'Santro Oli Filter (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(414, NULL, 'IT-0410', 'EK 5049', 'Santro Xing Air Filter (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(415, NULL, 'IT-0411', 'EK 4555', 'SCORPIO AIR FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(416, NULL, 'IT-0412', 'Ek 5025', 'Scorpio Crde Air Filter(E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(417, NULL, 'IT-0413', 'EK 6217', 'SPARK OIL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(418, NULL, 'IT-0414', 'EK-6312', 'SUMO GOLD OILFILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(419, NULL, 'IT-0415', 'EK 4236', 'SUMO SPACIO OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(420, NULL, 'IT-0416', 'Ek6437', 'Super Carry/ Celerio DSL Oil Filter (E)', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(421, NULL, 'IT-0417', 'EK5032', 'SWIFT/CRDI/ERTIGA/RITZ/DEZIRE/ DISEAL AIR FILTER(E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(422, NULL, 'IT-0418', 'EK 4392', 'SWIFT DEZIR / SWIFT TYPE II / SX4 FUEL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(423, NULL, 'IT-0419', 'EK 4314', 'SWIFT DSL OIL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(424, NULL, 'IT-0420', 'EK 5153', 'SWIFT DSL T3 AIR FILTER (E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(425, NULL, 'IT-0421', 'Ek 6212', 'Swift Dsl /xylo CRDE Fuel Filter (E)', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(426, NULL, 'IT-0422', 'EK 5023', 'SWIFT PETROL AIR FILTER (E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(427, NULL, 'IT-0423', 'EK 3975', 'Tata 407 Oil Filter (E) ', '76', '59', '7', NULL, '48239090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(428, NULL, 'IT-0424', 'EK 6110', 'Tata Cummin/EX Fuel Filter ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(429, NULL, 'IT-0425', 'EK 5020', 'Tata Indigo Turbo Air Filter(E)', '76', '59', '7', NULL, '84212300.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(430, NULL, 'IT-0426', 'EK 4562', 'TAVERA AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(431, NULL, 'IT-0427', 'EK 6195', 'TAVERA FUEL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(432, NULL, 'IT-0428', 'EK 6192', 'TAVERA OIL FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(433, NULL, 'IT-0429', 'EK 6487', 'Tiago Tiger/nexon PTL Oil Filter ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(434, NULL, 'IT-0430', 'EK 6060', 'Toyota Qualis Euro 1 Oil Filter (E) ', '76', '59', '7', NULL, '842123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(435, NULL, 'IT-0431', 'EK 6095', 'Uno PTL/DSL Oil Filter Elofic ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(436, NULL, 'IT-0432', 'EK 4241', 'VAN MPFI FUEL FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(437, NULL, 'IT-0433', 'Ek 4318', 'Verna CRDI Old Model DSL Oilfilter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(438, NULL, 'IT-0434', 'EK 5052', 'Wagon R K Series Air Filter (E) ', '76', '59', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(439, NULL, 'IT-0435', 'EK 4459', 'Xcent/I.20/Creta, Verna DSL Oil Filter(E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(440, NULL, 'IT-0436', 'EK 5043', 'XYLO AIR FILTER (E) ', '76', '59', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(441, NULL, 'IT-0437', 'EK 5011', 'ZEN AIR FILTER (E) ', '76', '59', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(442, NULL, 'IT-0438', 'EK-4558', 'ZEN DSL AIR FILTER ( E) ', '76', '59', '7', NULL, '84213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-11-14 05:24:26', NULL, ''),
(443, NULL, 'IT-0439', '(503219900)', 'BADA  DOST AIRFILTER  FLEETGUARD ', '75', '58', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(444, NULL, 'IT-0440', '(AF2609200)', 'DOST BS III,IV AIRFILTER FLEETGUARD ', '75', '58', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(445, NULL, 'IT-0441', '(LF1631100)', 'DOST N/M OIL FILTER FLEETGUARD ', '75', '58', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(446, NULL, 'IT-0442', '(LF 1623500)', 'DOST OIL FILTER FLEETGUARD ', '75', '58', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(447, NULL, 'IT-0443', NULL, 'Aimseal Sealent', '74', '57', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(448, NULL, 'IT-0444', '(35069999)', 'AIS-AUTO SEAL ', '74', '57', '7', NULL, '35069999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(449, NULL, 'IT-0445', NULL, 'GOMECHANIC SPEED 5W30 PLUS 210L (GMUNZZLB006)', '73', '56', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(450, NULL, 'IT-0446', NULL, 'SAVO MAX 100gm GREASE', '72', '55', '7', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(451, NULL, 'IT-0447', NULL, 'Bulb 1141 Ideal', '71', '54', '7', NULL, '8539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(452, NULL, 'IT-0448', NULL, 'RADIATOR FLESH (09-0/N-500)', 'No Data', 'No Data', '7', NULL, '34020000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(453, NULL, 'IT-0449', NULL, 'Windshield Cleaner Rane (09-0/kk-10/5)', 'No Data', 'No Data', '7', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(454, NULL, 'IT-0450', NULL, 'REVERSE  HORN TUK TUK (SQR-117)', 'No Data', 'No Data', '7', NULL, '8531', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(455, NULL, 'IT-0451', NULL, 'HYDROLIC OIL AW 68-26 LTR IPOL', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(456, NULL, 'IT-0452', NULL, 'Hydropac Aw 32-26L IPOL', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(457, NULL, 'IT-0453', NULL, 'Hydropac Aw  46-26 Ltr Ipol', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(458, NULL, 'IT-0454', NULL, 'IPOL  API SN/CF  5W-30 50 LTR', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(459, NULL, 'IT-0455', NULL, 'IPOL FRONT FORK OIL -0.35L X 20TIN', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(460, NULL, 'IT-0456', NULL, 'IPOL HIGH  PERFORMANCE COOLENT  GREEN 1. LTR', '69', 'No Data', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(461, NULL, 'IT-0457', NULL, 'IPOL HYDRAUALIC OIL AW 68-210LTR', '69', 'No Data', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(462, NULL, 'IT-0458', NULL, 'IPOL SUPER RR 3 PREMIEUM GREASE 200GM', '69', 'No Data', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(463, NULL, 'IT-0459', NULL, 'IPOL SUPER RR3 PREMIUM GREASE 0.5KG X 12 TIN ( RED', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(464, NULL, 'IT-0460', NULL, 'IPOL SUPER RR3 PREMIUM GREASE 100 GM', '69', 'No Data', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '161', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(465, NULL, 'IT-0461', NULL, 'IPOL SYNCRO EP 80W 90 GL4 -1L', '69', 'No Data', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(466, NULL, 'IT-0462', NULL, 'IPOL SYNCRO EP 90 GL 4-1 LTR', '69', 'No Data', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(467, NULL, 'IT-0463', NULL, 'MFG ECO GREEN 20W50 1LTR', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(468, NULL, 'IT-0464', NULL, 'MGF ECO GREEN 20W50 ( CNG/LPG)  1 LTR', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(469, NULL, 'IT-0465', NULL, 'MGF ECO GREEN 20W50 CNG/LPG 3LTR', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(470, NULL, 'IT-0466', NULL, 'SCOOTER  PRIME  PRO 5W30 API  600ML IPOL', '69', 'No Data', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(471, NULL, 'IT-0467', '(A 46425)', 'Jcb Air Filter Kirloker Eng (Set) ', '68', '52', '7', NULL, '84212100/4823', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(472, NULL, 'IT-0468', '(F 33563-T)', 'Jcb Engine Fuel Filter ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(473, NULL, 'IT-0469', '(F 33673)', 'Jcb Engine Fuel Filter (EG) ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(474, NULL, 'IT-0470', '(EK 6400)', 'Jcb Engine Oil Filter (E) ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(475, NULL, 'IT-0471', '(H 77264)', 'Jcb Kilosker Engine  Hyd Filter (EG) ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(476, NULL, 'IT-0472', '(F 33113 EG)', 'Jcb Kirloker Engine Fuel Filter (EG) Cloth Type 1lt ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(477, NULL, 'IT-0473', '(F 33112 EG)', 'JCB Kirlosker Eng Fuel Filter(EG)Paper Type 1ltr ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(478, NULL, 'IT-0474', '(Ek 6259)', 'JCB Kirlosker Engine Oil Filter (E) ', '68', '52', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(479, NULL, 'IT-0475', '(0204N171507GM)', 'DUSTER BRAKEPAD   KBX ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(480, NULL, 'IT-0476', NULL, 'WHEEL CYILINDER ASSY WAGON R/ALTO (KBX-P7040503)', 'No Data', 'No Data', '7', NULL, '870830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(481, NULL, 'IT-0477', NULL, 'WHEEL CYLINDER ASSY ALTO K-10 (KBX-716800)', 'No Data', 'No Data', '7', NULL, '870830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(482, NULL, 'IT-0478', NULL, 'WHEEL CYLINDER ASSY  ERTIGA KBX (KBX-0204L820817GM)', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(483, NULL, 'IT-0479', NULL, 'WHEEL  CYLINDER ASSY  KBX CAR 800 (020471383407GM)', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(484, NULL, 'IT-0480', '(KEBDM1004)', 'Brake Drum Alto (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(485, NULL, 'IT-0481', '(KEBDL003)', 'Brake Drum Bada Dost (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(486, NULL, 'IT-0482', '(KEBDM013)', 'Brake Drum Bolero PWR Plus(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(487, NULL, 'IT-0483', '(KEBDG002)', 'Brake Drum Enjoy (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(488, NULL, 'IT-0484', '(KEBDT1001)', 'Brake Drum Innova RR (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(489, NULL, 'IT-0485', '(KEBDM011)', 'Brake Drum Jeeto(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(490, NULL, 'IT-0486', '(KEBDM009)', 'Brake Drum KUV 100(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(491, NULL, 'IT-0487', '(KEBDM006)', 'Brake Drumlogan Dsl(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(492, NULL, 'IT-0488', '(KEBDM001)', 'Brake Drummah Bolero Pickup (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(493, NULL, 'IT-0489', '(KEBDM002)', 'Brake Drum Mah Scorpio Old (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(494, NULL, 'IT-0490', '(KEBDM007)', 'Brake Drum Mah S Sereis -S2 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(495, NULL, 'IT-0491', '(KEBDM1008)', 'Brake Drum Ominivan Frt(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(496, NULL, 'IT-0492', '(KEBDM004)', 'Brake Drum Scorpio Mhawk(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(497, NULL, 'IT-0493', '(KEBDT015)', 'Brake Drum Super Ace/ Venture (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(498, NULL, 'IT-0494', '(KEBDM010)', 'Brake Drum Supro Maxi Truck (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(499, NULL, 'IT-0495', '(KEBDG001)', 'Brake Drum Tavera (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(500, NULL, 'IT-0496', '(KEBDM1005)', 'Brake Drum Van(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(501, NULL, 'IT-0497', '(KEH019)', 'Ddisc Rotor Eon 2018(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(502, NULL, 'IT-0498', '(KEM012)', 'Dics Rotor Mah Jeeto/Maximo Pass N/m 024/012 ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(503, NULL, 'IT-0499', '(KET026)', 'Disc Rotor Ace  Cr2 Dicor (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(504, NULL, 'IT-0500', '(KET1018)', 'Disc Rotor Altis N/M Frt(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:07', '2024-10-30 03:34:07', NULL, ''),
(505, NULL, 'IT-0501', '(KES005)', 'Disc Rotor Alto/zen (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(506, NULL, 'IT-0502', '(KES008)', 'Disc Rotor A-Star(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(507, NULL, 'IT-0503', '(KEL004)', 'Disc Rotor Bada Dost(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(508, NULL, 'IT-0504', '(KES016)', 'Disc Rotor Baleno N/m Swift N/m(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(509, NULL, 'IT-0505', '(KEG006)', 'Disc Rotor Beat (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(510, NULL, 'IT-0506', '(KES014)', 'DISC ROTOR BOLENO O/M(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(511, NULL, 'IT-0507', '(KEM006)', 'Disc Rotor Bolero Pick Up Vent(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(512, NULL, 'IT-0508', '(KET034)', 'Disc Rotor Bolt (K) ', '67', '51', '7', NULL, '87083000', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(513, NULL, 'IT-0509', '(KES013)', 'Disc Rotor Ciaz(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(514, NULL, 'IT-0510', '(KEH0011)', 'Disc Rotor Creta(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(515, NULL, 'IT-0511', '(KEG007)', 'Disc Rotor Cruze (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(516, NULL, 'IT-0512', '(KEN003)', 'Disc Rotor Datsun Go (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(517, NULL, 'IT-0513', '(KEL001)', 'Disc Rotor Dost(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(518, NULL, 'IT-0514', '(KEL003)', 'Disc Rotor Dost Plus (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(519, NULL, 'IT-0515', '(KER002)', 'Disc Rotor Duster N/M (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(520, NULL, 'IT-0516', '(KER001)', 'Disc Rotor Duster O/M (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(521, NULL, 'IT-0517', '(KER007)', 'DISC ROTOR  DUSTER PLUS ', '67', '51', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(522, NULL, 'IT-0518', '(KEG010)', 'Disc Rotor Enjoy(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(523, NULL, 'IT-0519', '(KEH009)', 'Disc Rotor Eon(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(524, NULL, 'IT-0520', '(KES001)', 'Disc Rotor Ertiga(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(525, NULL, 'IT-0521', '(KES003)', 'Disc Rotor Esteem(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(526, NULL, 'IT-0522', '(KET1009)', 'Disc Rotor Etios (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(527, NULL, 'IT-0523', '(KEF1002)', 'Disc Rotor Ford Fiesta (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(528, NULL, 'IT-0524', '(KEF1001)', 'Disc Rotor Ford Ikon/ Figo (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(529, NULL, 'IT-0525', '(KEH1001)', 'Disc Rotor Honda T1 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(530, NULL, 'IT-0526', '(KEH1003)', 'Disc Rotor Honda T3 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(531, NULL, 'IT-0527', '(KEH004)', 'Disc Rotor Hyu I-10 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(532, NULL, 'IT-0528', '(KEH003)', 'Disc Rotor Hyu Santro Xing N/M Vent(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(533, NULL, 'IT-0529', '(KEH013)', 'Disc Rotor I.10 Grand/ Xcent (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(534, NULL, 'IT-0530', '(KET010)', 'Disc Rotor Indica Vent (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(535, NULL, 'IT-0531', '(KET012)', 'DISC ROTOR INDIGO ', '67', '51', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(536, NULL, 'IT-0532', '(KET1017)', 'Disc Rotor Innova Crysta(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(537, NULL, 'IT-0533', '(KET041)', 'Disc Rotor Intra (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(538, NULL, 'IT-0534', '(KES011)', 'Disc Rotor K10/wagonR /Celerio011/006/012 ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(539, NULL, 'IT-0535', '(KES012)', 'Disc Rotor K10/WagR/celerio KES011/006/012 ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(540, NULL, 'IT-0536', '(KER008)', 'Disc Rotor Kwid(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(541, NULL, 'IT-0537', '(KER009)', 'Disc Rotor Kwid N/M 10.2019 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(542, NULL, 'IT-0538', '(KEM1001)', 'Disc Rotor Lancer (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(543, NULL, 'IT-0539', '(KEM025)', 'Disc Rotor Marazzo FRT(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(544, NULL, 'IT-0540', '(KEM026)', 'Disc Rotor Marazzo RR(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(545, NULL, 'IT-0541', '(KES009)', 'Disc Rotor Maruti Vers/ Eeco(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(546, NULL, 'IT-0542', '(KEG001)', 'Disc Rotor Matiz/spark KEG001/KED001 ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(547, NULL, 'IT-0543', '(KEM011)', 'Disc Rotor Maximo (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(548, NULL, 'IT-0544', '(KES004)', 'Disc Rotor M.Car/Van(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(549, NULL, 'IT-0545', '(KEN008)', 'Disc Rotor Micra Ptrl (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(550, NULL, 'IT-0546', '(KEN001)', 'Disc Rotor Micra/ Sunny (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(551, NULL, 'IT-0547', '(KEH1007)', 'Disc Rotor Mobilio/Honda City 5(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(552, NULL, 'IT-0548', '(KEM008)', 'Disc Rotor New Logan DSL 008/ Verito 015 ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(553, NULL, 'IT-0549', '(KET039)', 'Disc Rotor Nexon (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(554, NULL, 'IT-0550', '(KEV001)', 'Disc Rotor Polo/Vento KEV001/KEV002 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(555, NULL, 'IT-0551', '(KEF2002)', 'Disc Rotor Punto/ Linia/ Wikend KEF2005/KEF2002 (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(556, NULL, 'IT-0552', '(KET1001)', 'Disc Rotor Qualis (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(557, NULL, 'IT-0553', '(KEN009)', 'Disc Rotor Redi Go (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(558, NULL, 'IT-0554', '(KEG015)', 'Disc Rotor Sail  Dsl ', '67', '51', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(559, NULL, 'IT-0555', '(KEM005LH)', 'Disc Rotor Scor M-Hawk Lh with Sensor(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(560, NULL, 'IT-0556', '(KEM005RH)', 'Disc Rotor Scor M-Hawk Rh with Sensor (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(561, NULL, 'IT-0557', '(KEM004RH)', 'Disc Rotor Scor M-Hawk Rh W/out Sensor(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(562, NULL, 'IT-0558', '(KEM003)', 'Disc Rotor Scorpio CRDE (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(563, NULL, 'IT-0559', '(KEM002)', 'Disc Rotor Scorpio Old Vent(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(564, NULL, 'IT-0560', '(KEM-016)', 'DISC ROTOR SCORPIO   S-SERIES  KTEK ', '67', '51', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(565, NULL, 'IT-0561', '(KEM004LH)', 'Disc Rotor Scorp M-Hawk Lh W/Out Sensor (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(566, NULL, 'IT-0562', '(KES022)', 'Disc Rotor S Preeso (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(567, NULL, 'IT-0563', '(KET006)', 'Disc Rotor Sumo Grand(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(568, NULL, 'IT-0564', '(KET002)', 'Disc Rotor Sumo Vent (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(569, NULL, 'IT-0565', '(KET016)', 'Disc Rotor Super Ace/ Venture (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(570, NULL, 'IT-0566', '(KEM023)', 'Disc Rotor Supro Maxi Truck (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(571, NULL, 'IT-0567', '(KES007)', 'Disc Rotor Swift/Ritz/Dzire ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(572, NULL, 'IT-0568', '(KET003)', 'Disc Rotor T/207 DI Ex ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(573, NULL, 'IT-0569', '(KET 007)', 'DISC ROTOR  TATA SAFARI OLD ', '67', '51', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(574, NULL, 'IT-0570', '(KET027)', 'Disc Rotor Tata Zest (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(575, NULL, 'IT-0571', '(KEG002)', 'Disc Rotor Tavera ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(576, NULL, 'IT-0572', '(KET033)', 'Disc Rotor Tiago (K) ', '67', '51', '7', NULL, '8708300087083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(577, NULL, 'IT-0573', '(KEM017)', 'Disc Rotor TUV 300(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(578, NULL, 'IT-0574', '(KEM015)', 'Disc Rotor Verito / Logan N/m Dsl 008/015 ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(579, NULL, 'IT-0575', '(KET011)', 'Disc Rotor Vista Manza/Quadrajet ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(580, NULL, 'IT-0576', '(KET032)', 'Disc Rotor Xenon Pick Up (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(581, NULL, 'IT-0577', '(KET040)', 'Disc Rotor Xenon Yodha (K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(582, NULL, 'IT-0578', '(KEM028)', 'Disc Rotor XUV 300RR(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(583, NULL, 'IT-0579', '(KEM013)', 'Disc Rotor XUV 500 Frt ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(584, NULL, 'IT-0580', '(KEM014)', 'Disc Rotor XUV 500 RR ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(585, NULL, 'IT-0581', '(KEM007LH)', 'Disc Rotor Xylo Lh ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(586, NULL, 'IT-0582', '(KEM007RH)', 'Disc Rotor Xylo RH(K) ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(587, NULL, 'IT-0583', '(KEM029)', 'Dsc Rotor Bolero Power+Abs ', '67', '51', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(588, NULL, 'IT-0584', '(KET1006)', 'Dsic Rotor Innova (K) ', '67', '51', '7', NULL, '87063000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(589, NULL, 'IT-0585', '(KEM024)', 'JEETO DISC ROTOR KTEK ', '67', '51', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(590, NULL, 'IT-0586', 'LI-432', 'Alto K-10/ K-Series Cylinder Sleev - L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(591, NULL, 'IT-0587', 'LI-453', 'Ashok Leyland / Dost Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(592, NULL, 'IT-0588', 'LI-318 A-AVL 475', 'Bolero/DI/MDI Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '23', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(593, NULL, 'IT-0589', 'LI-245 A', 'Bolero-Xd3p Passanger Cylinder Sleev - L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(594, NULL, 'IT-0590', 'LI 409', 'EON CYLINDER SLEEVE ', '66', '92', '7', NULL, '8409990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(595, NULL, 'IT-0591', 'LI-438', 'Ford Fiesta Cylinder Sleev-L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(596, NULL, 'IT-0592', 'LI-407', 'Hyundai/ Santro OD 2.706\" Cylinder Sleev- L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(597, NULL, 'IT-0593', 'LI-446', 'Hyundai Verna Cylinder Sleev (L) ', '66', '92', '7', NULL, '8409990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(598, NULL, 'IT-0594', 'LI-458', 'Hyundai Verna Fludiccylinder Sleev-L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(599, NULL, 'IT-0595', 'LI-3406', 'Indica/ Ace/ Indigo Cylinder Sleev - L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(600, NULL, 'IT-0596', 'LI-366', 'JCB 106 MM Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(601, NULL, 'IT-0597', 'LI-318 AVL 575', 'JEEP MDI LONG PF CYLINDER SLEEV (L) ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(602, NULL, 'IT-0598', 'LI-301-B275', 'Jeep O/m Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(603, NULL, 'IT-0599', 'LI-3219', 'JEETO CYLINDER  LINERS ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(604, NULL, 'IT-0600', 'LI-358', 'Kirloskar R-1040 Cylinder Sleev-L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(605, NULL, 'IT-0601', 'Li-318a C W 5.8', 'Li-318 A Cw 5.8 Avl 475 Short  C W 5.80mm Cylinder ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(606, NULL, 'IT-0602', 'LI437', 'MAHINDRA MAXXIMO CYLLINDER  LINERS ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(607, NULL, 'IT-0603', 'LI-436', 'Mahindra Xylo D-3 Dsl Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(608, NULL, 'IT-0604', 'LI-3401', 'Maruti 800/ Alto/ WagonR Cylinder Sleev -L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(609, NULL, 'IT-0605', 'LI-434', 'Maruti Ecco Cylinder Sleev- L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(610, NULL, 'IT-0606', 'LI-217', 'MM 540 Jeep/peugeot Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(611, NULL, 'IT-0607', 'LI 219', 'PEUGEOT DG CYLINDER LI ', '66', '92', '7', NULL, '840888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(612, NULL, 'IT-0608', 'LI-407 Xing 1.1', 'Santro Xing 1.1 Cylinder Sleev - L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(613, NULL, 'IT-0609', 'LI-435', 'SCORPIO M-HAWK DSL CYLINDERS  LINERS INDIA ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(614, NULL, 'IT-0610', 'LI-222', 'Scorpio P/F Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(615, NULL, 'IT-0611', 'LI-426', 'Skoda Cylinder Sleev-L ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(616, NULL, 'IT-0612', 'LIL -404  P', 'SLEEVE ZEN PTL ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(617, NULL, 'IT-0613', 'LI-428 K', 'Swift /Indica Vista/Punto Linia Dsl Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(618, NULL, 'IT-0614', 'LI-424 E', 'TAVERA   SLEEVE  PF(SPL.STEEL)CYLINDER LINERS ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(619, NULL, 'IT-0615', 'LI-422', 'Toyota Innova Cylinder Sleev ', '66', '92', '7', NULL, '84099990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(620, NULL, 'IT-0616', 'Li -404', 'Zen Dsl Cylinder Sleeve ', '66', '92', '7', NULL, '8409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(621, NULL, 'IT-0617', '(2642131)', 'BLACK 25 GM SUPER FLEX 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '370', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(622, NULL, 'IT-0618', '(2642107)', 'Black 85gm SUPER FLEX 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '56', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(623, NULL, 'IT-0619', '(2641849)', 'BLUE 85GM SUPER FLE24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '60', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(624, NULL, 'IT-0620', '(1656499)', 'BODY SEALENT WHITE MS930 310ml ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(625, NULL, 'IT-0621', '(1788108)', 'CARBURETER / THROT 315GM CLENER ', '65', '91', '7', NULL, '34029092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-38', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(626, NULL, 'IT-0622', '(1644282)', 'Carburetr/throt70gm Clener Sf 7262loctite ', '65', '91', '7', NULL, '34029092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '62', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(627, NULL, 'IT-0623', '(1644300)', 'CHAIN LUBE SF7263     70 GM ', '65', '91', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '249', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(628, NULL, 'IT-0624', '(1616799)', 'GREY 85 GM SUPER FLEX 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(629, NULL, 'IT-0625', '(24C23)', 'LOCTITE 3463 METAL MAGIC STEEL -113 GM ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(630, NULL, 'IT-0626', '(2642783)', 'LOCTITE BLUE 25 GM SUPER FLEX 24 ', '65', '91', '7', NULL, '3210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '176', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(631, NULL, 'IT-0627', '(2642124)', 'LOCTITE CLEAR 85gm SUPER FLEX 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(632, NULL, 'IT-0628', '(225661123213)', 'LOCTITE FREEZE & RELEASE LB 8040 -310 GM ', '65', '91', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(633, NULL, 'IT-0629', '(1616705)', 'Loctite Grey 25gm SI 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '233', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(634, NULL, 'IT-0630', NULL, 'LOCTITE RED 25 Gm', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '465', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(635, NULL, 'IT-0631', NULL, 'LOCTITE  SF 7262  CRAB THORTT CLANER -315 GM', '65', '91', '7', NULL, '3402', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(636, NULL, 'IT-0632', '(230853)', 'LOCTITE SF 7735 BREAK CLUTCH CLEANER 350 GM ', '65', '91', '7', NULL, '34029092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '45', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(637, NULL, 'IT-0633', '(240547)', 'LOCTITE SF 7735  BREAK  CLUTCH  CLEANER 70 GM ', '65', '91', '7', NULL, '3208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '49', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(638, NULL, 'IT-0634', NULL, 'LOCTITE  SF 7737 RUST BUST -32 GM', '65', '91', '7', NULL, '3403', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '463', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(639, NULL, 'IT-0635', NULL, 'LOCTITE  TEROSON  BOND 180-310 ML', '65', '91', '7', NULL, '3214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(640, NULL, 'IT-0636', NULL, 'LOCTITE TEROSON BOND 180-600 ML', '65', '91', '7', NULL, '3214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '120', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(641, NULL, 'IT-0637', '(IS42203386)', 'LOCTITE TEROSON MS 930 WHITE  -310 ML ', '65', '91', '7', NULL, '3214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '58', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(642, NULL, 'IT-0638', '(258912681)', 'LOCTITE TEROSON PU 9108 WHITE-600 ML ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '95', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(643, NULL, 'IT-0639', NULL, 'LOCTITE    WHITE  SUPER FLEX 25 GM', '65', '91', '7', NULL, '3214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '198', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(644, NULL, 'IT-0640', '(2642129)', 'Loctitie Clear 25gm Super Flex 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '199', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(645, NULL, 'IT-0641', '(1616706)', 'RED 85 GM SUPER FLEX 24 ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '115', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(646, NULL, 'IT-0642', '(1644275)', 'RUST BUST 70G SF7737 ', '65', '91', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '167', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(647, NULL, 'IT-0643', '(1909755)', 'RUST BUST 7737 315GM ', '65', '91', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(648, NULL, 'IT-0644', '(1752556)', 'SILICONE RTV [ GASKET  GUM ] 50 ML ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(649, NULL, 'IT-0645', '(2715251)', 'Superwiz 0.5gm ', '65', '91', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(650, NULL, 'IT-0646', '(2332260)', 'Superwiz Blister 4gm ', '65', '91', '7', NULL, '35061000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '70', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(651, NULL, 'IT-0647', NULL, 'SYNTHENTIC GREASE 8035 350 GM', '65', '91', '7', NULL, '3403', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(652, NULL, 'IT-0648', '(1644283)', 'SYNTHETIC GREAS 350GM ', '65', '91', '7', NULL, '34031900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(653, NULL, 'IT-0649', '(2269326)', 'UNDER BODY COATING RB 2010 1kg ', '65', '91', '7', NULL, '32141000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(654, NULL, 'IT-0650', NULL, 'WELD  THROUGH PRIMER', '65', '91', '7', NULL, '1673', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(655, NULL, 'IT-0651', '(1673787)', 'WELD THROUGH PRIMER SF 3013 300GM ', '65', '91', '7', NULL, '32089090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '39', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(656, NULL, 'IT-0652', NULL, 'Lohmann Attachment Tape 12 x 10 Mtr', '64', '90', '7', NULL, '3919', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(657, NULL, 'IT-0653', NULL, 'Lohmann Attachment  Tape 12 X4 Mtr', '64', '90', '7', NULL, '3919', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '27', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(658, NULL, 'IT-0654', NULL, 'HONDA REPSOL  MOTO BIKER HXTI 10W30 API SL 1 LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(659, NULL, 'IT-0655', NULL, 'HONDA REPSOL MOTO  BIKER  HXTI 10W30 API SL 900 ML', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '39', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(660, NULL, 'IT-0656', NULL, 'Honda Repsol Moto Scooter Hxti 10w30  800 MI', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(661, NULL, 'IT-0657', NULL, 'IPOL FRONT  FORK OIL .175ML', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(662, NULL, 'IT-0658', NULL, 'REPSOL 10W30 800 ML', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(663, NULL, 'IT-0659', NULL, 'REPSOL DIESEL MULTI G XTI 15W40 CF 4 -1 L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(664, NULL, 'IT-0660', NULL, 'REPSOL DIESEL MULTI  GXTI 15W40 CF4-6L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(665, NULL, 'IT-0661', NULL, 'REPSOL DIESEL SUPER  TURBO 15W40 CH 4-3L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(666, NULL, 'IT-0662', NULL, 'REPSOL DIESEL SUPER TURBO 15W40 CH4 -5L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(667, NULL, 'IT-0663', NULL, 'REPSOL DIESEL SUPER TURBO 15W40 CH 4-7.5 Lt', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(668, NULL, 'IT-0664', NULL, 'REPSOL DIESEL SUPER TURBO 15W40 CH4-7 L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(669, NULL, 'IT-0665', NULL, 'Repsol Diesel Turbo 15w40 CH4 -210 L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(670, NULL, 'IT-0666', NULL, 'REPSOL  DSL MULTI  G AGRI 20W40 CF4 -7.5 LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(671, NULL, 'IT-0667', NULL, 'REPSOL DSL  MULTI   GXTI  15W40 CF 4 -50 LTR', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(672, NULL, 'IT-0668', NULL, 'REPSOL DSL MULTI G XTI 15W40 CF4 -7.5', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(673, NULL, 'IT-0669', NULL, 'REPSOL DSL MULTI G XTI 15W40 CF4 -7.5 L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(674, NULL, 'IT-0670', NULL, 'REPSOL DSL  MULTIO G XTI  15W40 CF4 -3L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(675, NULL, 'IT-0671', NULL, 'REPSOL DSL SUPER TURBO 15W40 CH4 -10 LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(676, NULL, 'IT-0672', NULL, 'REPSOL DSL SUPER TURBO 15W40 CH4- 50 L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(677, NULL, 'IT-0673', NULL, 'REPSOL DSL TURBO PLUS 15W40 CI4 PLUS -4LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(678, NULL, 'IT-0674', NULL, 'REPSOL ELITE NEO 5W30 - 210 L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(679, NULL, 'IT-0675', NULL, 'REPSOL ELITE NEO  5W30 -3.5 L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '41', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(680, NULL, 'IT-0676', NULL, 'REPSOL ELITE NEO 5W30 3 LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '44', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(681, NULL, 'IT-0677', NULL, 'REPSOL ELITE  NEO 5W30 -54 LTR', '63', '89', '8', NULL, '2910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(682, NULL, 'IT-0678', NULL, 'REPSOL  ELITE NEO XTI 5W40 -4 LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(683, NULL, 'IT-0679', NULL, 'REPSOL  ELITE SUPER XTI 20W50 -1LTR', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '31', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(684, NULL, 'IT-0680', NULL, 'REPSOL ELITE  SUPER  XTI  20W50-3L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(685, NULL, 'IT-0681', NULL, 'Repsol Elite Super Xti 20w50- 50L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(686, NULL, 'IT-0682', NULL, 'Repsol Moto Matic Mb 4T 10w30-0.8L', '63', '89', '8', NULL, '270101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(687, NULL, 'IT-0683', NULL, 'Repsol  Moto Matic Mb 4t 10w30 -50 L Drum', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(688, NULL, 'IT-0684', NULL, 'REPSOL MOTO RIDER 4T 10W30-1 L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '171', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(689, NULL, 'IT-0685', NULL, 'REPSOL  MOTO RIDER 4T 10W30 900ML', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '139', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(690, NULL, 'IT-0686', NULL, 'REPSOL MOTO RIDER 4T 20W40-50L DRUM', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(691, NULL, 'IT-0687', NULL, 'REPSOL MOTO RIDER 4T 20W40 SL-09 L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '223', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(692, NULL, 'IT-0688', NULL, 'REPSOL  MOTO RIDER 4T  20W40  SL -1L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '96', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(693, NULL, 'IT-0689', NULL, 'REPSOL MOTO RIDER 4T 20W40 SL -210 L', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(694, NULL, 'IT-0690', NULL, 'REPSOL MOTO SINTETICO 4T 10W40 1LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(695, NULL, 'IT-0691', NULL, 'REPSOL MOTO SINTETICO  4T 10W50 1 LTR', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(696, NULL, 'IT-0692', NULL, 'Repsol Moto Sport XTI 20w40 Sn-1L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '211', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(697, NULL, 'IT-0693', NULL, 'Repsol Moto Sport Xti 20w40 Sn-50 L Drum', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(698, NULL, 'IT-0694', NULL, 'Repsol Moto Sport XTI 20w50 Sn-1.2L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(699, NULL, 'IT-0695', NULL, 'REPSOL MOTO SPORT XTI 20W50 SN-1L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(700, NULL, 'IT-0696', NULL, 'REPSOL MOTO SPORT X TI 4T 15W -50 2.5L', '63', '89', '8', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(701, NULL, 'IT-0697', NULL, 'Repsol Moto Sport Xti 4t 15w50 -50 Ltr', '63', '89', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(702, NULL, 'IT-0698', '(060L-STD-15)', 'Lumax Wiper Blade 15 ', '62', '88', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(703, NULL, 'IT-0699', '(060L-STD-19)', 'Lumax Wiper Blade 19 ', '62', '88', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(704, NULL, 'IT-0700', '(060L-STD-20)', 'Standard Wiper Blade 20 ', '62', '88', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(705, NULL, 'IT-0701', '(OX-1085)', 'BEAT DSL OIL FILTER ', '61', '87', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(706, NULL, 'IT-0702', NULL, 'CONTACT CLEANER SF 7039 400ML', '61', '87', '7', NULL, '3814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(707, NULL, 'IT-0703', '(OC-746)', 'DUSTER OIL FILTER ', '61', '87', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(708, NULL, 'IT-0704', NULL, 'ENGINE FLUSH 250 ML', '61', '87', '7', NULL, '3811', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(709, NULL, 'IT-0705', '(C3CEF0001)', 'ENGINE FLUSH 355 ML MAHLE ', '61', '87', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(710, NULL, 'IT-0706', '(KX638)', 'ETIOS /CROSS /LIVA/ (D) FUEL FILTER  MAHLE ', '61', '87', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(711, NULL, 'IT-0707', '(KL1220)', 'FIGO /FIESTA/IKON FUEL FILTER  MAHLE ', '61', '87', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(712, NULL, 'IT-0708', '(OX-1056)', 'I.20 DSL, VERNA DISC  OIL FILTER ', '61', '87', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(713, NULL, 'IT-0709', '(Kfw9844041)', 'Mahel Coolent Blue 1ltr ', '61', '87', '7', NULL, '38200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(714, NULL, 'IT-0710', '(LX3929)', 'MAHLE DOST AIR FILTER ', '61', '87', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(715, NULL, 'IT-0711', '(KC 367)', 'MAHLE VERNA DSL FUEL FILTER ', '61', '87', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '51', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(716, NULL, 'IT-0712', '(OC-740)', 'OILFILTER  ACCENT DSL ', '61', '87', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(717, NULL, 'IT-0713', '(OC-1549)', 'OIL FILTER HONDA AMAZE DSL MAHLE ', '61', '87', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(718, NULL, 'IT-0714', '(OX422D)', 'POLO DSL  OIL FILTER MAHLE ', '61', '87', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(719, NULL, 'IT-0715', NULL, 'Raditor Cleaner  355 Mahle', '61', '87', '7', NULL, '8412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(720, NULL, 'IT-0716', '(OC-797)', 'SUNNY /MICRA PTL OIL FILTER ', '61', '87', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(721, NULL, 'IT-0717', NULL, 'MAXMOL GREASE 200 GM', 'No Data', 'No Data', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(722, NULL, 'IT-0718', '(004007V)', 'BEAT/ AVEO DISC ROTOR NEEJ ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(723, NULL, 'IT-0719', '(010001V)', 'DISC ROTOR CITY T/1,/ AMAZE NEEJ ', '60', '86', '7', NULL, '87083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(724, NULL, 'IT-0720', '(010004v)', 'Disc Rotor Honda City T5  Neej ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(725, NULL, 'IT-0721', '(015012V)', 'DISC ROTOR JEETO /MAXIMO PASSENGER  NEEJ ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(726, NULL, 'IT-0722', '(001001V)', 'DOST 4 HOLE DISC ROTOR  NEEJ ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(727, NULL, 'IT-0723', '(001002V)', 'DOST PLUS DISC ROTOR NEEJ ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(728, NULL, 'IT-0724', '(020006V)', 'DUSTER 85 BHP DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(729, NULL, 'IT-0725', '(020002V)', 'DUSTER T2 FLUENCE DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(730, NULL, 'IT-0726', '(02001V)', 'DUSTER /TERRANO DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(731, NULL, 'IT-0727', '(014012V)', 'ECCO /VERSA DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(732, NULL, 'IT-0728', '(004008V)', 'Enjoy Disc Rotor Neej ', '60', '86', '7', NULL, '87083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(733, NULL, 'IT-0729', '(008003V)', 'FIESTA /FIGO  NW/FUSION DISK ROTOR NEEJ ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(734, NULL, 'IT-0730', '(009003V)', 'HYUNDAI I 10 CLUTCH ', '60', '86', '7', NULL, '8708300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(735, NULL, 'IT-0731', '(008001v)', 'Ikon/escort /fusion Disc Rotor Neej ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(736, NULL, 'IT-0732', '(023003V)', 'INDICA VISTA PTL DISC ROTOR NEEJ ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(737, NULL, 'IT-0733', '(024002V)', 'INNOVA DISC ROTOR NEEJ ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(738, NULL, 'IT-0734', NULL, 'JEEP COMPASS  DISC ROTOR  NEEJ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(739, NULL, 'IT-0735', '(015026V)', 'MARAZZO FRNT DIS C ROTOR NEEJ ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(740, NULL, 'IT-0736', '(015027S)', 'MARAZZO REAR DISC ROTOR  NEEJ ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(741, NULL, 'IT-0737', '(015011V)', 'MAXIMO O/M BIG HALL NEEJ DISC  ROTOR ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(742, NULL, 'IT-0738', '(018001v)', 'Micra / Sunny Disc Rotor Neej ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(743, NULL, 'IT-0739', '(009002v)', 'Santro Xing Disc Rotor Neej ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(744, NULL, 'IT-0740', '(015013V)', 'SCORPIO  MHAWK RH W/ABS SENSOR NEEJ DISC ROTOR ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(745, NULL, 'IT-0741', '(023006V)', 'SUMO GRAND , XENON 1 S 5 INCH 296 MM ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(746, NULL, 'IT-0742', '(023005V)', 'SUMO NM/207DI /207EX DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(747, NULL, 'IT-0743', '(023008V)', 'SUPER ACE /ACE ADVENTURE  DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(748, NULL, 'IT-0744', '(015023V)', 'SUPRO NEEJ DISC ROTOR ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(749, NULL, 'IT-0745', '(004001V)', 'TAVERA DISC ROTOR NEEJ ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(750, NULL, 'IT-0746', '(009007V)', 'VERNA FLUIDIC /I20 NM/ELITE DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-11-14 05:13:57', NULL, ''),
(751, NULL, 'IT-0747', '(015018V)', 'XUV 500 DISC ROTOR NE ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(752, NULL, 'IT-0748', '(015017S)', 'XUV 500 REAR NEEJ DISC ROTOR ', '60', '86', '7', NULL, '8708300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(753, NULL, 'IT-0749', '(015009 V)', 'XYLO( LH) GENIO/QUANTO/NEEJ DISK ROTOR  ', '60', '86', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(754, NULL, 'IT-0750', '(015008V)', 'XYLO(RH) ,GENIO ,QUANTO  NEEJ DISC ROTOR ', '60', '86', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(755, NULL, 'IT-0751', '(KR6A 10)', 'ASTAR, RITZ, WAGONR K ALTO K10 SWIFT, DZIRE PLUG ', '59', '85', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(756, NULL, 'IT-0752', '(NGK-LKR6D)', 'I.10 KAPPA/I.20 PLUG NGK ', '59', '85', '7', NULL, '85.111.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(757, NULL, 'IT-0753', '(NGK-ZKR74)', 'INDICA VISTA PLUG NGK ', '59', '85', '7', NULL, '85111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(758, NULL, 'IT-0754', '(DCPR7E)', 'MPFI, ALTO WAGONR, ESTILO, BEAT SPARK PLUG NGK ', '59', '85', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(759, NULL, 'IT-0755', '(BPR5EY)', 'Mti 800,1000, Zen1.0,Gypsy1.3, Omini0.8, Omini Mpfi ', '59', '85', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(760, NULL, 'IT-0756', '(BKR 6E)', 'VERSA 1.3, SX4, SWIFT 1.3.BOLENO 1.6 ZEN 1.0EEC NGK ', '59', '85', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(761, NULL, 'IT-0757', NULL, 'DSL FIlter Coil 0.5Lt (308EF9014F)', 'No Data', 'No Data', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(762, NULL, 'IT-0758', '(2827)', 'OSRAM 2827/ 5W 12V W2 1*9 (W5W AMBER) ', 'No Data', 'No Data', '7', NULL, '85.392.940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(763, NULL, 'IT-0759', '(AM331340155)', 'OSRAM-45210CW 25W PX26D 3XFS10X2, H7 LED 6000K ', 'No Data', 'No Data', '7', NULL, '85395000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-11-14 05:30:17', NULL, ''),
(764, NULL, 'IT-0760', '(AB4036300CL)', 'OSRAM-62185RL/45/40W 12V PX43T ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(765, NULL, 'IT-0761', '(62204HW SVS)', 'OSRAM-62204HW SVS 100/90W ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '29', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(766, NULL, 'IT-0762', '(B1FC-4008321396327)', 'OSRAM-64185/HS1 12V 35/35W PX43T 10X10X1 ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '53', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(767, NULL, 'IT-0763', '(64185SVS)', 'OSRAM-64185SVS-01B/HS1 12V 35/35W ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(768, NULL, 'IT-0764', '(A3335742502)', 'OSRAM-64193SVS/H4 12V 60/55W P43t SVS ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(769, NULL, 'IT-0765', '(A36211907DC)', 'OSRAM-64198 H4 12V 60/55W P45T ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(770, NULL, 'IT-0766', '(A41821601DC)', 'OSRAM-64204 H4 12V 100/90W P45T ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '51', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(771, NULL, 'IT-0767', '(7285)', 'OSRAM 7285 CW 5/5.W 12V PX43T  BULB ', 'No Data', 'No Data', '7', NULL, '85.395.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(772, NULL, 'IT-0768', '(9005 CLC)', 'OSRAM-9005 CLC 60W 12V P20D FS1 ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(773, NULL, 'IT-0769', '(9006 CLC)', 'OSRAM -9006 CLC 51W 12V P22D FS1 ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(774, NULL, 'IT-0770', '(64219 L)', 'OSRAM H 16 BULB  64219L+19W 12 V ', 'No Data', 'No Data', '7', NULL, '8539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(775, NULL, 'IT-0771', '(B1-4008321781)', 'OSRM-2825/5W 12V W2.1X9.505XFS 10 ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(776, NULL, 'IT-0772', '(BA155 5XFS10B1)', 'OSRM-5008/67 10W/12V ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(777, NULL, 'IT-0773', '(BA155 5XFS10 IN)', 'OSRM-5637/10W 24V 2467 ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '90', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(778, NULL, 'IT-0774', '(12V H1 100W)', 'OSRM-62200RL/100W 12V H1 100W F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(779, NULL, 'IT-0775', '(12V H3 100)', 'OSRM-62201RL/100W 12V H3 100 F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '35', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(780, NULL, 'IT-0776', '(4008321295514)', 'OSRM-62204CB/H4 100/90W 12V P43T H/L BULB COOL BLUE ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '46', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(781, NULL, 'IT-0777', '(62204)', 'OSRM-62204/H4 12 V P 43T 100/90 ', 'No Data', 'No Data', '7', NULL, '8539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(782, NULL, 'IT-0778', '(A41820A07DC)', 'OSRM-62204/H4 12V P43t 100/90 H/L BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-22', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(783, NULL, 'IT-0779', '(AA435220002)', 'OSRM-62204/RL H4 12V P43T 100/90 H/L BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '66', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-11-11 22:18:19', NULL, ''),
(784, NULL, 'IT-0780', '(62204 SB/100/90W)', 'OSRM -62204SB/100/90W 12V P43T SUPER BRIGHT ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '61', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(785, NULL, 'IT-0781', '(4052899360785)', 'OSRM 62218RL/130/100W 12V P43T H/L BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(786, NULL, 'IT-0782', '(62245)', 'OSRM-62245/H4 24 V 100/90  P45T ', 'No Data', 'No Data', '7', NULL, '8539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(787, NULL, 'IT-0783', '(4008321775092)', 'OSRM-62248/H4 24V 100/90W P43t BULB ', 'No Data', 'No Data', '7', NULL, '85392', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(788, NULL, 'IT-0784', '(A41841B02DC)', 'OSRM-62249/H4 24V 130/100W P43T ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(789, NULL, 'IT-0785', '(AA43523002)', 'OSRM-62261/H7 80W 12V PX26D F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(790, NULL, 'IT-0786', '(A27776704DC)', 'OSRM-62327/BA20D 12V 35/35W ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(791, NULL, 'IT-0787', '(A57079600DC)', 'OSRM-62327CB/ 35/35W 12V BA20D COOL BLUE ', 'No Data', 'No Data', '7', NULL, '85.932.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(792, NULL, 'IT-0788', '(A57077E00DC)', 'OSRM-62327SVS/35/35W 12V BA20D SILVER STAR ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '31', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(793, NULL, 'IT-0789', '(A2828180013)', 'OSRM-64150/H1 12V 55W P14.5s(AM) F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(794, NULL, 'IT-0790', '(H3 12V 55W)', 'OSRM-64151/H3 12V 55W F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(795, NULL, 'IT-0791', '(10XBLI1OSRAM)', 'OSRM-64185ALS-01B/35/35W 12V PX43T ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(796, NULL, 'IT-0792', '(A74274E00DC)', 'OSRM-64185CBM-018/ HS1 12V 35/35W PX43T ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(797, NULL, 'IT-0793', '(A36192108DC)', 'OSRM-64193/H4 P43t12V 60/55W HEAD LIGHT ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(798, NULL, 'IT-0794', '(PX26d(AM)/A39451E0102)', 'OSRM-64210 H7 12V 55W F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '43', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(799, NULL, 'IT-0795', '(55W 12V H11)', 'OSRM-64211CLC 55W 12V H11 ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(800, NULL, 'IT-0796', '(1A(H8)-4050300498751)', 'OSRM-64212 35W  12V PGJ19-1 F/LAMP BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(801, NULL, 'IT-0797', '(6438/10W)', 'OSRM-6438/10W 12V SV 8.5-8 HSS TUBE BULB ', 'No Data', 'No Data', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(802, NULL, 'IT-0798', '(A61904201G0)', 'OSRM-7506/21W 12V 1141 ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(803, NULL, 'IT-0799', '(BAU 15S 5XFS10)', 'OSRM-7507/21W 12V (1141) YELLOW BEND LEG ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(804, NULL, 'IT-0800', '(7511)', 'OSRM-7511/21W (2441) BULB ', 'No Data', 'No Data', '7', NULL, '8539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '118', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(805, NULL, 'IT-0801', '(A729478(D/F))', 'OSRM-7528/21/5W 12V (1016) ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(806, NULL, 'IT-0802', '(A70942101B2)', 'OSRM-881/H27/2 12V 27W PGI 13 (H27/2) ', 'No Data', 'No Data', '7', NULL, '85.392.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(807, NULL, 'IT-0803', '(12V 67 CAPLESS)', 'OSRM-921 16W 12V W2.1X9.5D 67CAPLESS ', 'No Data', 'No Data', '7', NULL, '85392940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '163', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(808, NULL, 'IT-0804', '(W2.1X9.5D 10XBL12)', 'OSRM-2825DW3/1W 12V LED P/L BULB SET ', 'No Data', 'No Data', '7', NULL, '85395000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No Data', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(809, NULL, 'IT-0805', '(12NNBLH 4F)', 'OSRM-7185CW HS1 LED 2W 5/6W 12V PX43t BIKE H/L BULB ', 'No Data', 'No Data', '7', NULL, '85392', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No Data', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(810, NULL, 'IT-0806', '(14402)', 'POTAUTO 14\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(811, NULL, 'IT-0807', '(17405)', 'POTAUTO 17\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(812, NULL, 'IT-0808', '(18406)', 'POTAUTO 18\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(813, NULL, 'IT-0809', '(19407)', 'POTAUTO 19\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(814, NULL, 'IT-0810', '(20408)', 'POTAUTO 20\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(815, NULL, 'IT-0811', '(21409)', 'POTAUTO 21\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(816, NULL, 'IT-0812', '(22410)', 'POTAUTO 22\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(817, NULL, 'IT-0813', '(24411)', 'POTAUTO 24\" U HOOK BLADE ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(818, NULL, 'IT-0814', '(504)', 'POTAUTO WIPER BLDE FLEXIBLE 16\" ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(819, NULL, 'IT-0815', '(507)', 'POTAUTO WIPER BLDE FLEXIBLE 19\" ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(820, NULL, 'IT-0816', '(511)', 'POTAUTO WIPER BLDE FLEXIBLE 24\" ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(821, NULL, 'IT-0817', '(512)', 'POTAUTO WIPER BLDE FLEXIBLE 26\" ', '57', '83', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(822, NULL, 'IT-0818', 'PI-1152', '407 OIL FILTER PURLATOR (PI-1152)', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(823, NULL, 'IT-0819', '(PI-2820)', 'ACE AIRFILTER  PURLATOR ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(824, NULL, 'IT-0820', '(PI 2241)', 'ALTO 800 AIR FILTER ', '56', '82', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(825, NULL, 'IT-0821', '(PI 3419)', 'Ambassador/indica Fuel Filter CAV ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(826, NULL, 'IT-0822', '(PI 4561)', 'BEAT PTL OIL FILTER ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(827, NULL, 'IT-0823', '(PI 9193)', 'BOLERO M2Di FUEL FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(828, NULL, 'IT-0824', '(PI 5320)', 'DI OIL FITER  PURLATOR ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(829, NULL, 'IT-0825', '(PI 3827)', 'Dost Fuel Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(830, NULL, 'IT-0826', '(PI-5411)', 'DOST N/M OIL FILTER (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(831, NULL, 'IT-0827', '(PI-3872)', 'DUSTER SUNNY  MICRA DSL  FUEL FILTER  PURLATOR ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(832, NULL, 'IT-0828', '(PI 6210)', 'Eeco Versa Air Filter ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(833, NULL, 'IT-0829', '(PI 3255)', 'EICHER CANTER FUEL FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(834, NULL, 'IT-0830', '(PI 5364)', 'Eicher Canter Oil Filter (By Pass) ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(835, NULL, 'IT-0831', '(PI 4587)', 'Eicher Jumbo Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(836, NULL, 'IT-0832', '(Pi 1263)', 'Eicher Oil Filter ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(837, NULL, 'IT-0833', '(PI-2251)', 'ETIOS  AIR FILTER  (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(838, NULL, 'IT-0834', '(PI5407)', 'ETIOS DSL OIL FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(839, NULL, 'IT-0835', '(PI 2331)', 'ETIOS PTL AIR FILTER(P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(840, NULL, 'IT-0836', '(PI 4485)', 'Fiesta DSL Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(841, NULL, 'IT-0837', '(PIL-382400199)', 'FUEL FITER TATA 407 ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(842, NULL, 'IT-0838', '(PI2272)', 'HYUNDAI EON AIR FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(843, NULL, 'IT-0839', '(PI 2879)', 'Hyundai I.10 Air Filter ', '56', '82', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(844, NULL, 'IT-0840', '(PI-2290)', 'I.10 GRAND  PTL AIRFILTER  PURLATOR ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(845, NULL, 'IT-0841', '(PI 5393)', 'I.20/verna Oil Filter ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(846, NULL, 'IT-0842', '(PI-4117)', 'IKON/ DOST  OIL FILTER  (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(847, NULL, 'IT-0843', '(PI 2842)', 'Indica DSL Air Filter ', '56', '82', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(848, NULL, 'IT-0844', '(PI 1880)', 'Indica Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(849, NULL, 'IT-0845', '(Pi 5293)', 'Indigo Oil Filter/super Ace ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(850, NULL, 'IT-0846', '(PI 2222)', 'INNOVA CABIN AIR FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(851, NULL, 'IT-0847', '(PI2369)', 'INNOVA CRYSTA A/F (P) ', '56', '82', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(852, NULL, 'IT-0848', '(PI 2245)', 'IRIZ/ZIP AIR FILTER (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(853, NULL, 'IT-0849', '(PI2427)', 'JEETO AIR FILTER ', '56', '82', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(854, NULL, 'IT-0850', '(PI 5299)', 'Logan Dsl Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(855, NULL, 'IT-0851', '(PI 4603)', 'Maruthi K Series Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(856, NULL, 'IT-0852', '(PI 5315)', 'Maruti Oil Filter Old Model ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(857, NULL, 'IT-0853', ' (PI 2897)', 'Maruti Swift DSL Air Filter', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(858, NULL, 'IT-0854', '(PI9194)', 'MAXIMO FUEL FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(859, NULL, 'IT-0855', '(PI 5340)', 'Maximo Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(860, NULL, 'IT-0856', '(PI 1799)', 'MAZDA BYPASS FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(861, NULL, 'IT-0857', '(PI 5169)', 'MAZDA N/M OIL FILTER (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(862, NULL, 'IT-0858', '(Pi 4174)', 'Mpfi  Filter (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(863, NULL, 'IT-0859', '(PI6264)', 'NANO OIL FILTER  (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(864, NULL, 'IT-0860', '(PI 4418)', 'Nissan/ford Oil Filter ', '56', '82', '7', NULL, '842123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(865, NULL, 'IT-0861', '(PI5412)', 'OIL FILTER  HONDA AMAZE (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(866, NULL, 'IT-0862', '(PI 7206)', 'OMINI/GYPSY AIR FILTER (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(867, NULL, 'IT-0863', '(PI 2920)', 'Polo Dsl Air Filter (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(868, NULL, 'IT-0864', '(PI-5394)', 'POLO FABIA DSL  OIL FILTER (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(869, NULL, 'IT-0865', '(PI 1335)', 'QUALIS EURO 1 OIL FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(870, NULL, 'IT-0866', '(Pi 4121)', 'Qualiz Euro 2 Oil Filter ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(871, NULL, 'IT-0867', '(PI 7189)', 'Santro/lancer Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(872, NULL, 'IT-0868', '(PI-2254)', 'SANTRO XING AIR FILTER(P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(873, NULL, 'IT-0869', '(PI -2550)', 'SCORPIO AIR FILTER PURLATOR ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(874, NULL, 'IT-0870', '(PI-3122)', 'SWARAJ MAZDA FUEL FILTER  PUROLATOR ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(875, NULL, 'IT-0871', '(PI 4354)', 'Swift DSL Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(876, NULL, 'IT-0872', '(PI 6232)', 'Swift Ptl Air Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(877, NULL, 'IT-0873', '(PI5230)', 'TATA 697 CMVR 2K OILFILTER PUROLATOR ', '56', '82', '7', NULL, '8412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(878, NULL, 'IT-0874', '(PI 2855)', 'TATA AIR FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(879, NULL, 'IT-0875', '(PI 2722)', 'TATA SUMO AIR FILTER ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(880, NULL, 'IT-0876', '(PI 5306)', 'TATA SUMO OIL FILTER ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(881, NULL, 'IT-0877', '(PI 9037)', 'Tavera Fuel Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(882, NULL, 'IT-0878', '(Pi 5233)', 'Tavera Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(883, NULL, 'IT-0879', '(PI 1981)', 'Traveller/Balwan Oil Filter ', '56', '82', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(884, NULL, 'IT-0880', '(PI-6115)', 'WAGNOR /ALTO  AIR FILTER (P) ', '56', '82', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(885, NULL, 'IT-0881', '(PI 7290)', 'Zen/800CC/1000CC Air Filter ', '56', '82', '7', NULL, '84213100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(886, NULL, 'IT-0882', '(RBL/DP/005 R 812 M)', 'ACCENT BRAKE PAD  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(887, NULL, 'IT-0883', '(RBL/BS/016)', 'ALTO BREAK SHOE (KBX) ', 'No Data', 'No Data', '7', NULL, '8708300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(888, NULL, 'IT-0884', '(RBL/BS/015)', 'ALTO BREAK SHOE  RANE ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(889, NULL, 'IT-0885', '(82-2/RBL/DP/029 R812M)', 'Alto /TATA SUPER VENTURE Breakpad  Rane ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(890, NULL, 'IT-0886', '(RBL/DP/016 R812)', 'BAKE PAD  LANCER FRONT RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(891, NULL, 'IT-0887', '(RBL/PDP/530)', 'BALENO NEW BREAK PAD RANE ', 'No Data', 'No Data', '7', NULL, '87.083.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(892, NULL, 'IT-0888', '(RBL/BS/043/RD0011-M2L)', 'BBRAKE SHOE WIITH LINER XYLO ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(893, NULL, 'IT-0889', '(82/RBL/DP/042 R812M)', 'BEAT BREAK PAD RANE ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(894, NULL, 'IT-0890', '(RBL/DP/041 R 812 M)', 'BRAKE PAD AMAZE , BRIO   RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(895, NULL, 'IT-0891', '(RBL/DP/070 - R812M)', 'BRAKE PAD  BALENO /SWIFT  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(896, NULL, 'IT-0892', '(RBL/DP/054 R-812 M)', 'BRAKE PAD ENJOY RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(897, NULL, 'IT-0893', '(RBL/DP/025 R 5084)', 'BRAKE PAD  ETIOS  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(898, NULL, 'IT-0894', '(RBL/DP/037 R 812 M)', 'BRAKE PAD HONDA CITY TY 5  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(899, NULL, 'IT-0895', '(RBL/PDP/043 R812M)', 'BRAKE PAD I 20 N/M ', 'No Data', 'No Data', '7', NULL, '8707', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(900, NULL, 'IT-0896', '(RBL/DP/002 R 812M)', 'BRAKE PAD I.20 PETROL ', 'No Data', 'No Data', '7', NULL, '87083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(901, NULL, 'IT-0897', '(RBL/DP/513-R803H)', 'BRAKE PAD  KWID  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(902, NULL, 'IT-0898', '(RBL/DP/024 R 5084)', 'BRAKE PAD  LOGAN ', 'No Data', 'No Data', '7', NULL, '87083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(903, NULL, 'IT-0899', '(RBL/PDP/520 R 808)', 'BRAKE PAD MAHINDRA QUANTO RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(904, NULL, 'IT-0900', '(RBL/ DP/036R 812 M)', 'BRAKE PAD POLO RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(905, NULL, 'IT-0901', '(RBL/DP/061 R812M)', 'BRAKE PAD SUPER CARRY ', 'No Data', 'No Data', '7', NULL, '8708300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(906, NULL, 'IT-0902', '(RBL/DP/057 R812 M)', 'BRAKE PAD XCENT/GRAND I 10  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(907, NULL, 'IT-0903', '(RBL/PDP/515 R 816)', 'BRAKE PAD XUV 500 FRONT  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(908, NULL, 'IT-0904', '(RBL/BS/034 R 6001)', 'BRAKE SHOE ESTEEM /FORCE MINDOR /TATA ACE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(909, NULL, 'IT-0905', '(Rbl/bs/021)', 'Brake Shoe  Swift  Rane ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(910, NULL, 'IT-0906', '(RBL/DP /010R812M)', 'BREAK PAD DOST ', 'No Data', 'No Data', '7', NULL, '68138100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(911, NULL, 'IT-0907', '(RBL/DP/047)', 'BREAK PAD XYLO-REAR RANE [REGULAR] ', 'No Data', 'No Data', '7', NULL, '87.083.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(912, NULL, 'IT-0908', '(CC271500 C K)', 'CLUTCH SET FIGO/FIESTA  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(913, NULL, 'IT-0909', '(RBL/DP/068R812M)', 'CRETA BRAKEPAD RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(914, NULL, 'IT-0910', '(RBL/BS/074-RD0011-32L)', 'DOST BRAKE SHOE RANE ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(915, NULL, 'IT-0911', '(RBL/PDP/547-R808TB)', 'DUSTER BRAKE PAD  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(916, NULL, 'IT-0912', '(82-2/RBL/DP/035 R812M)', 'Ecco Break Pad Rane ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(917, NULL, 'IT-0913', '(RBL/DP/019 R812M)', 'EECO /ASTAR/ SUZUKI /VERSA BREAK PAD ', 'No Data', 'No Data', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(918, NULL, 'IT-0914', '(RBL/DP/033 R 812 M)', 'ERTIGA FRONT BRAKEPAD  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(919, NULL, 'IT-0915', '(Rbl/dp/008 R812m)', 'Ford Fiesta Brake Pad Rane ', 'No Data', 'No Data', '7', NULL, '87083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(920, NULL, 'IT-0916', '(RBL/DP/039 R817FDB/059/HYN-EON/1)', 'HYUNDAI EON  DISC PADS ', 'No Data', 'No Data', '7', NULL, '87.083.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(921, NULL, 'IT-0917', '(82-2/RBL/DP/043 R812M)', 'Hyundai I.20 Brake Pad Rane ', 'No Data', 'No Data', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:08', '2024-10-30 03:34:08', NULL, ''),
(922, NULL, 'IT-0918', '(RBL/DP/001 R812M)', 'I 10  BREAKPAD ', 'No Data', 'No Data', '7', NULL, '87.083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(923, NULL, 'IT-0919', '(RBL/ PDP/539)', 'IGNIS BRAKE PAD  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(924, NULL, 'IT-0920', '(RBL/DP/046 R812M)', 'Jeep Special/Sumo Brake Pad ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(925, NULL, 'IT-0921', '(RBL/DP/076-R812M)', 'JEETO  BRAKE PAD RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(926, NULL, 'IT-0922', '(RBL/BS/001 /R6001/1)', 'MARUTHI 800 CC BI TYPE  BRAKE SHOE RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(927, NULL, 'IT-0923', '(RBL/BS/002/R6001/1)', 'MARUTHI  800 CC BOSCH TYPE  BRAKE SHOE  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(928, NULL, 'IT-0924', '(RBL/BS/002)', 'MARUTHI CAR 800 BREAK SHOE (TVS) ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(929, NULL, 'IT-0925', '(82-2/RBL/DP/038-R817)', 'MARUTI 800/OMINI BRAKE PAD (RANE) ', 'No Data', 'No Data', '7', NULL, '87.083.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(930, NULL, 'IT-0926', '(RBL/DP/049R812M)', 'Maximo  Break Pad ', 'No Data', 'No Data', '7', NULL, '68138800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(931, NULL, 'IT-0927', '(RBL/BS/035R 6001/1)', 'MAXIMO/ FORCE/ ESTEEM BRAKE SHOE RANE ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(932, NULL, 'IT-0928', '(RBL/BS/001)', 'MRUTHI CAR 800 BREAK SHOE (Tvs) ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(933, NULL, 'IT-0929', '(82-3/RBL/BS/036  R6001/1)', 'Omini Type 3/ EECO  Brake Shoe ', 'No Data', 'No Data', '7', NULL, '68138100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(934, NULL, 'IT-0930', '(RBL/BS /009)', 'REAR BRAKE SHOE  INNOVA RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(935, NULL, 'IT-0931', '(RBL/BS/011/R6001/1)', 'SANTRO BRAKE SHOE RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(936, NULL, 'IT-0932', '(82-RBL/DP/004 R812M)', 'SANTRO BREAK PAD RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(937, NULL, 'IT-0933', '(RBL/DP /045  R812)', 'SCORPIO  FRONT BRAKE PAD ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(938, NULL, 'IT-0934', '(RBL/DP/055-R812M)', 'SUPRO BRAKE PAD RANE ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(939, NULL, 'IT-0935', '(RBL/DP/031 R812M)', 'SWIFT FORNT BREAKE PAD ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(940, NULL, 'IT-0936', '(RBL/PDP/503RD693)', 'SWIFT /RITZ BRAKE PAD  RANE ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(941, NULL, 'IT-0937', '(RBL/DP/027R812M)', 'TATA ACE BREAK PAD ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(942, NULL, 'IT-0938', '(RBL/DP/034 R812M)', 'TATA INDIGO TDI BREAK PAD ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(943, NULL, 'IT-0939', '(82-2/RBL/DP/052 R812M)', 'Tavera Brake Pad ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(944, NULL, 'IT-0940', '(RBL/DP/050 R812M)', 'TOYOTA INNOVA BREAK PAD ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(945, NULL, 'IT-0941', '(RBL/DP/051 R812M)', 'TOYOTA QUALIS BREAK PAD ', 'No Data', 'No Data', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(946, NULL, 'IT-0942', '(RBL/DP/060 R 812M)', 'VERNA FLUDIC BRAKE PAD RANE ', 'No Data', 'No Data', '7', NULL, '8703', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(947, NULL, 'IT-0943', '(RBL/DP/047 R 812)', 'XYLO BREAKPAD RANE ', 'No Data', 'No Data', '7', NULL, '87.083.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(948, NULL, 'IT-0944', NULL, 'BRAKE LINER JEEP (RBL/540/B)', 'No Data', 'No Data', '7', NULL, '68132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(949, NULL, 'IT-0945', NULL, 'EECO BRAKE PAD   RANE (82-2/RBL/DP/019-R815)', 'No Data', 'No Data', '7', NULL, '6813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(950, NULL, 'IT-0946', NULL, 'WINDSHIELD CLENER (09-0/KK-P5-128)', 'No Data', 'No Data', '7', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(951, NULL, 'IT-0947', '(BR201100)', 'DISC ROTORS  800/ ZEN FRONT RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(952, NULL, 'IT-0948', '(BR104102)', 'DISC ROTOR  UTILITY MAX , BOLERO N/M  FRONT RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(953, NULL, 'IT-0949', '(BR201102)', 'FRONT DISC ROTOR ALTO N/M / WAGONR RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(954, NULL, 'IT-0950', '(BR201101)', 'FRONT DISC ROTOR  ALTO O/M  RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(955, NULL, 'IT-0951', '(BR311501)', 'FRONT DISC ROTOR  BEAT RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(956, NULL, 'IT-0952', '(BR314601)', 'FRONT DISC ROTOR  ENJOY  RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(957, NULL, 'IT-0953', '(BR011005)', 'FRONT DISC ROTOR  INDIGO MANZA /VISTA   RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(958, NULL, 'IT-0954', '(BR304500)', 'FRONT DISC  ROTOR QUALIS RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(959, NULL, 'IT-0955', '(BR201104)', 'FRONT DISC ROTOR  SWIFT PTL/ DSL/ DIZRE /RITZ RANE ', '54', '80', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(960, NULL, 'IT-0956', '(UNAL SP)', '3  WAY UNION AL ', '53', '79', '7', NULL, '85011019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(961, NULL, 'IT-0957', '(RMME7A)', '4 W -12V EH 7 IN 1 MELODY MAKER ', '53', '79', '7', NULL, '85369090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(962, NULL, 'IT-0958', '(RACCTH)', 'AAC  RELAY 12 V 80W ROOTS ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(963, NULL, 'IT-0959', '(R2FV DS)', 'AIR HORN 2 PIPE (R1 HORN ) ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(964, NULL, 'IT-0960', '(FCVH SP)', 'AIR HORN LEVER SWITCH ', '53', '79', '7', NULL, '8481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(965, NULL, 'IT-0961', '(RBF10A)', 'Blade  Fuse - 10A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(966, NULL, 'IT-0962', '(RBF15A)', 'Blade Fuse - 15A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '200', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(967, NULL, 'IT-0963', '(RBF20A)', 'Blade Fuse - 20A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(968, NULL, 'IT-0964', '(RBF25A)', 'Blade Fuse - 25A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(969, NULL, 'IT-0965', '(RBF30A)', 'Blade Fuse - 30A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(970, NULL, 'IT-0966', '(RBF35A)', 'Blade Fuse - 35A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '175', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(971, NULL, 'IT-0967', '(RBF40A)', 'Blade Fuse - 40A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(972, NULL, 'IT-0968', '(RBF05A)', 'Blade Fuse -5A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(973, NULL, 'IT-0969', '(RCMC3C)', 'Car Mobile Charger 3 Pin 12V ', '53', '79', '7', NULL, '8504', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(974, NULL, 'IT-0970', '(RBHCH4)', 'Ceramic Bulb Holder H4 (954900/121-00-0) ', '53', '79', '7', NULL, '8544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(975, NULL, 'IT-0971', '(CH12DS)', 'CITEE HORN 12 V UNIT ', '53', '79', '7', NULL, '85123010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(976, NULL, 'IT-0972', '(CH24DS)', 'Citee Horn 24v Unit ', '53', '79', '7', NULL, '40103590', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(977, NULL, 'IT-0973', '(CHFV DS)', 'CITTE HORN  FCV (CHLS DS ) ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(978, NULL, 'IT-0974', '(RMME7B)', 'EH 7 in 1 Melody Maker 4w-24V ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(979, NULL, 'IT-0975', '(RMM57A)', 'EH 7 in 1 Melody Maker 5w -12V ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(980, NULL, 'IT-0976', '(EMES SP)', 'Electro Mechanical Switch Liver Small ', '53', '79', '7', NULL, '8481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(981, NULL, 'IT-0977', '(EMEH SP)', 'Electro Mechanilcal Switch Lever Big ', '53', '79', '7', NULL, '8481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(982, NULL, 'IT-0978', '(ELMJ SP)', 'EXTRA LONG HOSE MJ ', '53', '79', '7', NULL, '85011019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(983, NULL, 'IT-0979', '(REBFNA)', 'Four Wheeler Electronic Beep Flasher 12V-3pin ', '53', '79', '7', NULL, '85122010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(984, NULL, 'IT-0980', '(REF-4NA)', 'FOUR WHEELER ELECTRONIC FLASHEER - 12V ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(985, NULL, 'IT-0981', '(RFHBFC)', 'Fuse Holder-Ceramic (175-00-000) ', '53', '79', '7', NULL, '8544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(986, NULL, 'IT-0982', '(HLW80A)', 'H4-WIRING HARNES WITH RELAY 80 AMPS 12 V ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(987, NULL, 'IT-0983', '(RDHLRA)', 'HEAD LAMP RELAY-12V (HLRE 12V) ', '53', '79', '7', NULL, '85363000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(988, NULL, 'IT-0984', '(RDHLRB)', 'Head Lamp Relay - 24V(HLRE24) ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(989, NULL, 'IT-0985', '(HTBT DS)', 'HEXA TONE HORN 24 V  ROOTS ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(990, NULL, 'IT-0986', '(RHRP3B)', 'HORN RELAY 24V-3 TERMINAL(953930) ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(991, NULL, 'IT-0987', '(RHRP3A)', 'HORN RELAY 3 PIN 12V (953901) ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(992, NULL, 'IT-0988', '(RHR3WA)', 'HORN RELAY 3 WIRE 12 V ', '53', '79', '7', NULL, '85364100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(993, NULL, 'IT-0989', '(RHR3WB)', 'Horn Relay 3 Wire-24V Plastic ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(994, NULL, 'IT-0990', '(RHRP4A)', 'Horn Relay 4pin 12V(953905) ', '53', '79', '7', NULL, '85364100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(995, NULL, 'IT-0991', '(RHR 4WA)', 'HORN RELAY PLASTIC 4 WIRE 12V ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(996, NULL, 'IT-0992', '(MSZSP12)', 'Megasonic Spare Coil Assy 12V ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(997, NULL, 'IT-0993', '(MSZDIAH)', 'Megasonic Spare Diaphragm HT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(998, NULL, 'IT-0994', '(MSZDIAL)', 'Megasonic Spare Diaphragm LT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(999, NULL, 'IT-0995', '(MSZGRLC)', 'Megasonic Spare Grill C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1000, NULL, 'IT-0996', '(MSZHKIT)', 'Megasonic Spare Hardware Repair Kit ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1001, NULL, 'IT-0997', '(MSZMBKT)', 'Megasonic Spare Mounting Bracket ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1002, NULL, 'IT-0998', '(MSU012H)', 'Megasonic Universal 12 HT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1003, NULL, 'IT-0999', '(MSU012L)', 'Megasonic Universal 12v LT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1004, NULL, 'IT-1000', '(MSU024H)', 'Megasonic Universal 24V HT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1005, NULL, 'IT-1001', '(MSU024L)', 'Megasonic Universal 24V LT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1006, NULL, 'IT-1002', '(RMCR 4A)', 'Micro Relay 12V 4 Pin (953959) ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1007, NULL, 'IT-1003', '(RMCR5A)', 'Micro Relay 12V 5 Pin ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '37', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1008, NULL, 'IT-1004', '(RMCR4B)', 'Micro   Relay 24 V - 4 Pin ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1009, NULL, 'IT-1005', '(RMF 15A)', 'MINI FUE - 15A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '75', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1010, NULL, 'IT-1006', '(RMF05A)', 'Mini Fuse - 05A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '75', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1011, NULL, 'IT-1007', '(RMF10A)', 'Mini Fuse 10AMP ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1012, NULL, 'IT-1008', '(RMF 20A)', 'MINI FUSE 20A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '75', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1013, NULL, 'IT-1009', '(RMF25A)', 'Mini Fuse - 25A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1014, NULL, 'IT-1010', '(RMF30A)', 'Mini Fuse 30A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '75', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1015, NULL, 'IT-1011', '(RMF75A)', 'Mini Fuse 7.5A ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1016, NULL, 'IT-1012', '(RMRP4A)', 'Mini Relay 4pin 12V ', '53', '79', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1017, NULL, 'IT-1013', '(RMRP5A)', 'MINI RELAY  5 PIN ', '53', '79', '7', NULL, '853641', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1018, NULL, 'IT-1014', '(RDCMPL)', 'Multipin Charging Cable 1 M ', '53', '79', '7', NULL, '8544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1019, NULL, 'IT-1015', '(RPSWLG)', 'POWER SOCKET WITH LIGHTER ', '53', '79', '7', NULL, '85366990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1020, NULL, 'IT-1016', '(SNU012H)', 'S-70 Horn Assembly 12V -HT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1021, NULL, 'IT-1017', '(SMU212L)', 'SMARTONE  12 V LT HERO HONDA ', '53', '79', '7', NULL, '85123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1022, NULL, 'IT-1018', '(S 212 SP)', 'SOLENOID VALVE 2- 12V/24 V SP ', '53', '79', '7', NULL, '84818090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1023, NULL, 'IT-1019', '(S224 SP)', 'Solenoid Valve-2-24v-SP(E224 Sp) ', '53', '79', '7', NULL, '84818090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1024, NULL, 'IT-1020', '(E312 SP)', 'SOLENOID VALVE -3-12V OUTER ', '53', '79', '7', NULL, '8481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1025, NULL, 'IT-1021', '(S324 SP)', 'SOLENOID VALVE -3-24 V -SP ( E324  SP) ', '53', '79', '7', NULL, '84818', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1026, NULL, 'IT-1022', '(TR9A DS)', 'TRITONE HORN-M2-19 IN 1-12V ', '53', '79', '7', NULL, '85011019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1027, NULL, 'IT-1023', '(TR9B DS)', 'Tritone Horn-M2-19 in 1 24v ', '53', '79', '7', NULL, '85011019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1028, NULL, 'IT-1024', '(UMCS3C)', 'Universal Mobile Charger with Switch 3pin ', '53', '79', '7', NULL, '8504', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1029, NULL, 'IT-1025', '(VMZDIAH)', 'Vibromini Spare Diaphragm HT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1030, NULL, 'IT-1026', '(VMZDIAL)', 'Vibromini Spare Diaphragm LT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1031, NULL, 'IT-1027', '(VMZGRLC)', 'Vibromini Spare Grill ', '53', '79', '7', NULL, '85129000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1032, NULL, 'IT-1028', '(VMZMBKT)', 'Vibromini Spare Mounting Bracket ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1033, NULL, 'IT-1029', '(VMZPSET)', 'Vibromini Spare Point Assembly ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1034, NULL, 'IT-1030', '(VNU012S)', 'Vibromini Universal 12v Set ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1035, NULL, 'IT-1031', NULL, 'Vibrosonic Mounting Bracket', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1036, NULL, 'IT-1032', '(VSZSP24)', 'VIBROSONIC SPARE COIL ASSY  12 HT ', '53', '79', '7', NULL, '85129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1037, NULL, 'IT-1033', '(VSZSP12)', 'Vibrosonic Spare Coil Assy 12V ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1038, NULL, 'IT-1034', '(VSZCOND)', 'Vibrosonic Spare Condensor ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1039, NULL, 'IT-1035', '(VSZDIAH)', 'Vibrosonic Spare Diaphragm HT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1040, NULL, 'IT-1036', '(VSZDIAL)', 'Vibrosonic Spare Diaphragm LT ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1041, NULL, 'IT-1037', '(VSZGRLC)', 'Vibrosonic Spare Grill C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1042, NULL, 'IT-1038', '(VSZHKIT)', 'Vibrosonic Spare Hardware Repair Kit ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1043, NULL, 'IT-1039', '(VSZMBKT)', 'Vibrosonic Spare Mounting Bracket ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1044, NULL, 'IT-1040', '(VSZPSET)', 'Vibrosonic Spare Point Set Assy ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1045, NULL, 'IT-1041', '(VSU012H)', 'Vibrosonic Universal 12V HT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1046, NULL, 'IT-1042', '(VSU012L)', 'Vibrosonic Universal 12V LT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1047, NULL, 'IT-1043', '(VSU024H)', 'Vibrosonic Universal 24V HT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1048, NULL, 'IT-1044', '(VSU024L)', 'Vibrosonic Universal 24V LT C/F ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1049, NULL, 'IT-1045', '(VSU006H)', 'Vibrosonic Universal 6V HT C/F ', '53', '79', '7', NULL, '85123010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1050, NULL, 'IT-1046', '(VSU006L)', 'Vibrosonic Universal 6V LT C/F ', '53', '79', '7', NULL, '85123010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1051, NULL, 'IT-1047', '(W7U212L)', 'WINDTON 75-12V-LT ', '53', '79', '7', NULL, '85123010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '35', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1052, NULL, 'IT-1048', '(W7U0125)', 'WINDTONE 75 UNIVERSAL 12V HORN SET ', '53', '79', '7', NULL, '85123010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1053, NULL, 'IT-1049', '(W9U112S)', 'Windtone 90 Sealed 12v Set ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1054, NULL, 'IT-1050', '(WNZPSET)', 'Windtone New Spare Point Assembly ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1055, NULL, 'IT-1051', NULL, 'WINDTONE SUPER DIAPHRAMGM LT', '53', '79', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1056, NULL, 'IT-1052', '(WNZDIAH)', 'WINDTONE SUPER DIAPHRAM HT ', '53', '79', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1057, NULL, 'IT-1053', '(WNU012S)', 'Windtone Super Universal 12V Set Black ', '53', '79', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '17', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1058, NULL, 'IT-1054', '(51111651110)', 'Alto/WagonR/Ecco Versa Brake Pad(R) ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1059, NULL, 'IT-1055', '(51612081110)', 'Beat Aveo Uva Sail Brake Pad (R) ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1060, NULL, 'IT-1056', '(51289283110)', 'BRAKE PAD KWID NEW RENAULT/TRIBBER ', '52', '78', '7', NULL, '51289283110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1061, NULL, 'IT-1057', '(51872281110)', 'INNOVA/XYLO BRAKE PAD (R) ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1062, NULL, 'IT-1058', '(51275081110)', 'Jeep Compas Brake Pad ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1063, NULL, 'IT-1059', '(51285281110)', 'KWID RENAULT OE TYPE BRAKE PAD ROU ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1064, NULL, 'IT-1060', '(51462981110)', 'Polo Disel, Rapid Vento Jetta Fabia Brake Pad(R) ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1065, NULL, 'IT-1061', '(51111658110)', 'SANTRO ZING BRAKE PAD ROU ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1066, NULL, 'IT-1062', '(51642281110)', 'SPARK BRAKE PAD(R) ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1067, NULL, 'IT-1063', '(51111445110)', 'Sumo/bolero/safari Brake Pad (ROU) ', '52', '78', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1068, NULL, 'IT-1064', NULL, 'SHEVARON MP3 GERASE 200GM', '51', '77', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '154', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1069, NULL, 'IT-1065', NULL, 'SHEVARON  MP3 GREASE 500 GM', '51', '77', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '102', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1070, NULL, 'IT-1066', NULL, 'SHEVRON  MP3 GREASE  1 KG', '51', '77', '7', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '29', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1071, NULL, 'IT-1067', NULL, 'SILICON SIKAFLEX WHITE BODY  SEALANT', 'No Data', 'No Data', '7', NULL, '321410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1072, NULL, 'IT-1068', NULL, 'MURGAN LIGHT TYPE-2 12V BLUE (LED-464-A1)', '49', '75', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1073, NULL, 'IT-1069', NULL, 'MURGAN LIGHT TYPE-2 12V GREEN (LED-464)', '49', '75', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1074, NULL, 'IT-1070', NULL, 'MURGAN LIGHT TYPE-2 12V MULTI', '49', '75', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1075, NULL, 'IT-1071', '(SI3078)', 'ACC PADDLE COVER TAVERA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1076, NULL, 'IT-1072', '(SI2662)', 'BONET OPENER T-1 FIESTA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1077, NULL, 'IT-1073', '(SI2663)', 'BONET OPENER T-2 FIESTA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1078, NULL, 'IT-1074', '(SI 5105)', 'BONET ROD KIT CRYSTA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1079, NULL, 'IT-1075', '(Si 1775)', 'Bonnet Rod Clip Set Qualis ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1080, NULL, 'IT-1076', '(Si 2274)', 'Bumber Clip 2274 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1081, NULL, 'IT-1077', '(Si 2397)', 'Bumer Clip 2397 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '400', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1082, NULL, 'IT-1078', '(SI2784)', 'BUMPER CLIP FR INNOVA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '240', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1083, NULL, 'IT-1079', '(SI2755)', 'BUMPER CLIP INNOVA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1084, NULL, 'IT-1080', '(SI 3717)', 'BUMPER CLIP SPARK ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '400', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1085, NULL, 'IT-1081', '(Si 913)', 'Bumper  Clip  Swift ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1086, NULL, 'IT-1082', '(SI 4118)', 'BUMPER CLIP XYLO ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '600', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1087, NULL, 'IT-1083', '(SI2442)', 'CARPET BUTTON HONDA CITY ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1088, NULL, 'IT-1084', '(Si 1737)', 'Clip Door Trim  Qualis ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '200', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1089, NULL, 'IT-1085', '(Si 1437)', 'Clutch Hub Lock  Spark ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1090, NULL, 'IT-1086', '(Si-1549)', 'Clutch Sahft Bush Big Indica ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '70', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1091, NULL, 'IT-1087', '(Si 1550)', 'Clutch Shaft Bush Small Indica ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '80', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1092, NULL, 'IT-1088', ' (SI 7706)', 'COOLANT CAP DOST', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1093, NULL, 'IT-1089', '(SI3934)', 'COOLANT CAP  LOGAN ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1094, NULL, 'IT-1090', '(SI 4114)', 'COOLANT CAP XYLO ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1095, NULL, 'IT-1091', '(Si-433)', 'Coolent Cap  M/ Alto ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '108', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1096, NULL, 'IT-1092', '(SI2901)', 'DOOR CLIP I 10 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '200', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1097, NULL, 'IT-1093', '(SI3101)', 'DOOR CLIP MAXXIMO ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1000', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1098, NULL, 'IT-1094', '(Si 1857)', 'Door Knob Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '400', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1099, NULL, 'IT-1095', '(SI3151)', 'DOOR PAD CLIP BOLERO ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1100, NULL, 'IT-1096', '(SI 4451)', 'DOOR PAD CLIP CRETA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1101, NULL, 'IT-1097', '(SI2651)', 'DOOR PAD CLIP FIESTA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1102, NULL, 'IT-1098', '(Si 2271)', 'Door Pad Clip  H/city T 7 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1103, NULL, 'IT-1099', '(Si 1526)', 'Door Pad Clip  Indica ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '200', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1104, NULL, 'IT-1100', '(Si 1773)', 'Door Pad Clip Innova ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1105, NULL, 'IT-1101', '(SI3901)', 'DOOR PAD CLIP LOGAN ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1106, NULL, 'IT-1102', '(Si 1873)', 'Door Pad Clip Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1107, NULL, 'IT-1103', '(Si 1896)', 'Door Pad Clip Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '300', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1108, NULL, 'IT-1104', '(Si 1201)', 'Door Pad Clip Vista ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1109, NULL, 'IT-1105', '(Si 351)', 'Door Rubber Clip Alto ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1110, NULL, 'IT-1106', '(Si 352)', 'Door Rubber Clip M/ Car ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1111, NULL, 'IT-1107', '(Si 1859)', 'Door Rubber Clip Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1112, NULL, 'IT-1108', '(SI 3808)', 'FENDER BUTTON ETIOS ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '300', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1113, NULL, 'IT-1109', '(Si 1854)', 'Fender Clip Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1114, NULL, 'IT-1110', '(SI 4701)', 'FENDER KIT KWID ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1115, NULL, 'IT-1111', '(SI2408)', 'FENDER LINNING CLIP HONDA CITY ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1116, NULL, 'IT-1112', '(SI 3807)', 'FENDER LINNING KIT ETIOS ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1117, NULL, 'IT-1113', '(SI2652)', 'FENDER LINNING KIT FIESTA ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1118, NULL, 'IT-1114', '(Si 1515)', 'Fender Linning Kit Indica ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1119, NULL, 'IT-1115', '(Si 1772)', 'Fender Linning Kit Innova ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '390', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1120, NULL, 'IT-1116', '(Si 1515L)', 'Fender Linning Kit V 2 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1121, NULL, 'IT-1117', '(Si 1214)', 'Fender Linning Kit  Vista ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '60', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1122, NULL, 'IT-1118', '(Si 1728)', 'Fr Door Knob Qualis ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '380', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1123, NULL, 'IT-1119', '(SI 7702)', 'GLASS FIXING CLIP DOST ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1124, NULL, 'IT-1120', '(Si 360)', 'Grill Clip Alto ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1125, NULL, 'IT-1121', '(Si 359)', 'Grill Clip Zen ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '200', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1126, NULL, 'IT-1122', '(Si 2087a)', 'Gromet Foot Board ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1127, NULL, 'IT-1123', '(Si-1792)', 'Hood  Insulation Clip Innova ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '300', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1128, NULL, 'IT-1124', '(SI 3904)', 'HOOD INSULATION CLIP LOGAN ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1129, NULL, 'IT-1125', '(SI2702)', 'IBROW SCEW QUALIS ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1130, NULL, 'IT-1126', '(SI3929)', 'OIL CAP LOGAN ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1131, NULL, 'IT-1127', '(SI2675)', 'OUTER BONET OPENER FIGO ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '141', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1132, NULL, 'IT-1128', '(Si 355)', 'Push Pull Clip  M/ Car ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1133, NULL, 'IT-1129', '(Si 924)', 'Rack Bush Swift ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '455', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1134, NULL, 'IT-1130', '(Si 983)', 'Rack Bush Swift T-2 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '460', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1135, NULL, 'IT-1131', '(Si-1863)', 'R C  Rod Connector Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1136, NULL, 'IT-1132', '(Si 2017)', 'Rear Bumber Clip Big Scorpio ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1137, NULL, 'IT-1133', '(Si 2002a)', 'Roof Button Bage Scorpio ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1138, NULL, 'IT-1134', '(Si 2002)', 'Roof Button Scorpio ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1139, NULL, 'IT-1135', '(SI-2904)', 'ROOF LININING CLIP I.10 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1140, NULL, 'IT-1136', '(Si 493)', 'Roof  Mould Clip Zen T-2 ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '40', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1141, NULL, 'IT-1137', '(Si 1865)', 'Roof Moulding Clip Santro ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1142, NULL, 'IT-1138', '(SI  Bak 12)', 'SI Brake Adujster Enjoy ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '400', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1143, NULL, 'IT-1139', '(SI2405)', 'TRIM BUTTON HONDA CITY ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '900', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1144, NULL, 'IT-1140', '(Si 2036)', 'Wiper Bottle Cap Scorpio ', 'No Data', 'No Data', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '900', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1145, NULL, 'IT-1141', NULL, 'HOSE CLIP 1', 'No Data', 'No Data', '7', NULL, '7318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '700', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1146, NULL, 'IT-1142', NULL, 'HOSE CLIP 1-1/4', 'No Data', 'No Data', '7', NULL, '7318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1147, NULL, 'IT-1143', NULL, 'HOSE CLIP 1/2', 'No Data', 'No Data', '7', NULL, '7318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '400', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1148, NULL, 'IT-1144', NULL, 'HOSE  CLIP 2', 'No Data', 'No Data', '7', NULL, '7318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '200', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1149, NULL, 'IT-1145', NULL, 'HOSE CLIP 3/4', 'No Data', 'No Data', '7', NULL, '7318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1150, NULL, 'IT-1146', '(3920B)', 'OUTER HANDLE LH LOGAN ', 'No Data', 'No Data', '7', NULL, '3926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '400', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1151, NULL, 'IT-1147', '(SI 3920 A)', 'OUTER HANDLE RH LOGAN ', 'No Data', 'No Data', '7', NULL, '3926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '60', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1152, NULL, 'IT-1148', '(S 3566 R2)', 'MARUTI K SERIES OIL FILTER (S) ', '47', '73', '7', NULL, '84212300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1153, NULL, 'IT-1149', NULL, 'SPARCO MUD FLAP ASSO COLOR', '46', '72', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '46', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1154, NULL, 'IT-1150', '(212IA510100885)', '3M MAKE REFLCTOR TAPE 983 WHITE 50.8MM*50M ', '45', '71', '7', NULL, '39199010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1155, NULL, 'IT-1151', '(212IA510100919)', '3M REFLECTOR TAPE 983 RED 50.8MM*50M ', '45', '71', '7', NULL, '39199010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '80', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1156, NULL, 'IT-1152', '(212IA510100927)', '3M REFLECTOR TAPE 983 YELLOW 50.8MM*50M ', '45', '71', '7', NULL, '39199010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '44.5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1157, NULL, 'IT-1153', NULL, 'Insulation Tape (Black)', '45', '71', '7', NULL, '85392120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1158, NULL, 'IT-1154', 'Tx-623540', 'Alto  Texspin Brg Fw   ', '44', '70', '7', NULL, '8301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1159, NULL, 'IT-1155', '(028)', 'Battery Terminal Bolt Type +Ve ', '43', '69', '7', NULL, '8538', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '45', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1160, NULL, 'IT-1156', NULL, 'Battery Terminal Bolt Type -Ve N', '43', '69', '7', NULL, '8538', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '48', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1161, NULL, 'IT-1157', '(030A/028A)', 'Battery Terminal MRT Angle +Ve ', '43', '69', '7', NULL, '85389000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '57', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(1162, NULL, 'IT-1158', '(030A/028A(-Ve))', 'Battery Terminal MRT Angle -Ve H/D ', '43', '69', '7', NULL, '85389000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '19', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1163, NULL, 'IT-1159', '(016C)', 'B - Terminal Angal Type EX H/D -Ve ', '43', '69', '7', NULL, '85389000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '52', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1164, NULL, 'IT-1160', '(016C +Ve)', 'B - Terminal Angle Type EX H/D +Ve ', '43', '69', '7', NULL, '85389000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1165, NULL, 'IT-1161', '(GDB90005)', 'BRAKE PAD BOLERO TRW ', '42', '68', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-11-04 23:15:38', NULL, ''),
(1166, NULL, 'IT-1162', '(GDB90011)', 'BRAKE PAD  EON OLD  TRW ', '42', '68', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1167, NULL, 'IT-1163', '(GDB90007)', 'BRAKE PAD  I.10  OLD TRW ', '42', '68', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1168, NULL, 'IT-1164', '(GDB90024)', 'BRAKE PAD INNOVA TRW ', '42', '68', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1169, NULL, 'IT-1165', '(GDB90025)', 'BRAKE PAD SET CRYSTA  TRW ', '42', '68', '7', NULL, '87083000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1170, NULL, 'IT-1166', NULL, '5/16 Lock Nut', '41', '50', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1171, NULL, 'IT-1167', '(LFAO1052)', 'ALTO K SERIES OIL FILTER TVS ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1172, NULL, 'IT-1168', '(LFAA5061)', 'ASTAR /RITZ PU TYPE  OIL FILTER TVS ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1173, NULL, 'IT-1169', NULL, 'BRAKE FLUID 100 ML TVS', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '27', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1174, NULL, 'IT-1170', '(LFAO1001)', 'DI OIL FITER TVS ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1175, NULL, 'IT-1171', '(5007)', 'DI TRACTOR  AIR FILTER  TVS ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1176, NULL, 'IT-1172', '(2996610F)', 'Dot 3 100ml Tvs ', '41', '50', '7', NULL, '3819', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1177, NULL, 'IT-1173', '(29967710D)', 'DOT 3 250 ML TVS ', '41', '50', '7', NULL, '3819', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '55', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1178, NULL, 'IT-1174', '(29967710C)', 'DOT 3 500 ML TVS ', '41', '50', '7', NULL, '3819', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1179, NULL, 'IT-1175', '(LFAO1006)', 'Indica Oil Filter Tvs ', '41', '50', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1180, NULL, 'IT-1176', NULL, 'M6 BOLT /NUT 1\"', '41', '50', '7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1181, NULL, 'IT-1177', 'LF AO -1008', 'MARUTHI MPFI ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1182, NULL, 'IT-1178', NULL, 'NUT M6X1 D/C', '41', '50', '7', NULL, '7318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1183, NULL, 'IT-1179', '(LFAO-1030)', 'OIL FILTER SWIFT DSL  TVS ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1184, NULL, 'IT-1180', '(90CRUISEECOTQ1)', 'POWER STEERING FLUID 1 LTR ', '41', '50', '7', NULL, '27101980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1185, NULL, 'IT-1181', '(LFAO -5006)', 'SCORPIO AIR FILTER  TVS ', '41', '50', '7', NULL, '8421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1186, NULL, 'IT-1182', '(Kwpom1)', 'Cdi Activa Het 3g N/m ', '41', '50', '7', NULL, '85118000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1187, NULL, 'IT-1183', '(404511)', 'ALTO STD LX  CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1188, NULL, 'IT-1184', '(404509)', 'Alto / Wagnor Clutch  Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1189, NULL, 'IT-1185', '(843641)', 'Baleno Clutch Set Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1190, NULL, 'IT-1186', '(843627)', 'BEAT PTL CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1191, NULL, 'IT-1187', '(404506)', 'Car 800  Clutch  Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1192, NULL, 'IT-1188', '(843651)', 'Celerio  Ptl Clutch  Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1193, NULL, 'IT-1189', '(843672)', 'CLUTCH SET  GRAND I.10 DSL/XCENT DSL  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1194, NULL, 'IT-1190', '(404608)', 'CLUTCH SET HONDA CITY T-IV AMAZE (P) ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1195, NULL, 'IT-1191', '(877033)', 'Duster /terrno  6 Speed  Clutch Set Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1196, NULL, 'IT-1192', '(404516)', 'Eeco, Versa, Supercarry  Petrol Valeo Clutch Set ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1197, NULL, 'IT-1193', '(843629)', 'ETIOS 1.4 L DSL CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1198, NULL, 'IT-1194', '(404525)', 'FORD FIGO CLUTCH SET 2P PV VALEO ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1199, NULL, 'IT-1195', '(843650)', 'HONDA AMAZE/MOBILIO/JAZZDSL  CLUTCH VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1200, NULL, 'IT-1196', '(404558)', 'HONDA TYPE 3 CLUTCH  SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1201, NULL, 'IT-1197', '(404620)', 'HY EON CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1202, NULL, 'IT-1198', '(VSC-843979)', 'HYUNDAI GRAND I.10 1.2  CLUTCH SET 2 P ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1203, NULL, 'IT-1199', '(VSC-404536)', 'HYUNDAI I.10  KAPPACLUTCH SET  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1204, NULL, 'IT-1200', '(VSC-843664)', 'HYUNDAI I.20 CRDI VERNA FLUDIC CLUTCH VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1205, NULL, 'IT-1201', '(843663)', 'HYUNDAI VERNA ,CRETA DSL  CLUTCH SET ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1206, NULL, 'IT-1202', '(404559)', 'HYUNDAI VERNA DSL CLUTCH SET 2 ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1207, NULL, 'IT-1203', '(843665)', 'Ignis/swift/ Wagonr Ptl  Clutch Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1208, NULL, 'IT-1204', '(404518)', 'INDICA DSL CLUTCH  VALEO ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1209, NULL, 'IT-1205', '(VSC-843580)', 'INNOVA CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1210, NULL, 'IT-1206', '(843639)', 'JEETO CLUTCH SET  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1211, NULL, 'IT-1207', '(404502)', 'LOGAN DSL  CLUTCH SET  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1212, NULL, 'IT-1208', '(843638)', 'MAHINDRA SUPRO VAN/TR CLUTCH SET ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1213, NULL, 'IT-1209', '(843626)', 'MARUTHI ALTO 800 CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1214, NULL, 'IT-1210', '(404599)', 'MARUTHI A-STAR CLUTCH  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1215, NULL, 'IT-1211', '(VSC -404510)', 'Maruti Baleno /esteem Clutch Set 2p ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1216, NULL, 'IT-1212', '(404534)', 'MAXIMO  CLUTCH  SET   VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1217, NULL, 'IT-1213', '(843576)', 'NISSAN MICRA PTL CLUTCH SET ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1218, NULL, 'IT-1214', '(843635)', 'NISSAN SUNNY 1.5 L 215 DIA CLUTCH VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1219, NULL, 'IT-1215', '(404508)', 'Omni Clutch Set  Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1220, NULL, 'IT-1216', '(404604)', 'OPTRA MAGNUUM /CRUZE DSL  CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1221, NULL, 'IT-1217', '(404514)', 'SANTROCLUTCH SET  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1222, NULL, 'IT-1218', '(VSC-843628)', 'SPARK PTL CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1223, NULL, 'IT-1219', '(404513)', 'SWIFT DSL CLUTCH SET  VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1224, NULL, 'IT-1220', '(404531)', 'SWIFT PTL CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1225, NULL, 'IT-1221', '(404530)', 'Tata Ace Clutch Set Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1226, NULL, 'IT-1222', '(404602)', 'TATA IRIS  CLUTCH SET 2P ', '40', '49', '7', NULL, '87089300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1227, NULL, 'IT-1223', '(404532)', 'TATA NEW INDICA  VISTA  CLUTCH SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1228, NULL, 'IT-1224', '(843584)', 'TAVERA  2L D CLUTCH VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1229, NULL, 'IT-1225', '(404517)', 'Wagonr Clutch Set  Valeo ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1230, NULL, 'IT-1226', '(404507)', 'ZEN   CLUTCH  SET VALEO ', '40', '49', '7', NULL, '8708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1231, NULL, 'IT-1227', '(412512)', 'Valeo WB 12\" Vf12 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '23', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1232, NULL, 'IT-1228', '(412513)', 'Valeo WB 13\" Vf 13 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1233, NULL, 'IT-1229', '(412514)', 'Valeo WB 14\" VF 14 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1234, NULL, 'IT-1230', '(575810)', 'Valeo WB 14\" Vfp14 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1235, NULL, 'IT-1231', '(412515)', 'VALEO WB 15\' VF15 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1236, NULL, 'IT-1232', '(575811)', 'Valeo WB 16\" Flat VFP 16 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1237, NULL, 'IT-1233', '(412516)', 'Valeo WB 16\" VF 16 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1238, NULL, 'IT-1234', '(412517)', 'Valeo WB 17\" VF 17 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1239, NULL, 'IT-1235', '(575812)', 'VALEO WB 17\" VFP 17 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1240, NULL, 'IT-1236', '(412518)', 'Valeo WB 18\" VF 18 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1241, NULL, 'IT-1237', '(575813)', 'Valeo WB 18\" Vfp 18 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1242, NULL, 'IT-1238', '(412519)', 'Valeo WB 19\" VF 19 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '45', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1243, NULL, 'IT-1239', '(575814)', 'Valeo WB 19\" Vfp19 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '16', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1244, NULL, 'IT-1240', '(412520)', 'Valeo WB 20\" VF 20 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1245, NULL, 'IT-1241', '(575815)', 'Valeo WB 20\" Vfp20 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1246, NULL, 'IT-1242', '(589195)', 'Valeo WB 20/16\" ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1247, NULL, 'IT-1243', '(412521)', 'Valeo WB 21\" Vf 21\" ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '66', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1248, NULL, 'IT-1244', '(575816)', 'Valeo W B 21\" Vfp21 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '38', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1249, NULL, 'IT-1245', '(412522)', 'Valeo WB 22\" VF 22 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '35', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1250, NULL, 'IT-1246', '(575817)', 'Valeo WB 22\" VFP 22 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1251, NULL, 'IT-1247', '(575818)', 'Valeo WB 24\" Flat VFP ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1252, NULL, 'IT-1248', '(412524)', 'Valeo WB 24\" VF 24 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '41', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1253, NULL, 'IT-1249', '(412526)', 'Valeo WB 26\" VF 26 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1254, NULL, 'IT-1250', '(575819)', 'Valeo WB 26\" Vfp 26 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '27', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1255, NULL, 'IT-1251', '(589189)', 'Valeo WB Set 20/17 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1256, NULL, 'IT-1252', '(589190)', 'Valeo WB Set 21/14 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1257, NULL, 'IT-1253', '(589194)', 'Valeo WB Set 26/16 ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1258, NULL, 'IT-1254', '(589192)', 'VALEO WIPER BLADE 16/16\" ', '39', '48', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1259, NULL, 'IT-1255', NULL, 'RADITOR COOLENT VERICOOL', '38', '47', '7', NULL, '4016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1260, NULL, 'IT-1256', '4mm)', '4mm Wire Vonee (Vonee ', '37', '46', '7', NULL, '8544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1261, NULL, 'IT-1257', '5mm)', '5mm Wire Vonee (Vonee ', '37', '46', '7', NULL, '8544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1262, NULL, 'IT-1258', '(050102)', 'AC/DC Buzzer ', '37', '46', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '20', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1263, NULL, 'IT-1259', '(050103)', 'Buzzer Bird Sound  -V ', '37', '46', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1264, NULL, 'IT-1260', '(100101)', 'DAMROO LIGHT ASSY ', '37', '46', '7', NULL, '851220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '67', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1265, NULL, 'IT-1261', '(120111)', 'ELECTRONIC FLASHER W/ BUZZER 12V VONEE ', '37', '46', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1266, NULL, 'IT-1262', '(190101)', 'Insulation Tape ', '37', '46', '7', NULL, '8546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1267, NULL, 'IT-1263', '(CP 101)', 'PUSH PULL SWITCH SHORT ', '37', '46', '7', NULL, '8536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1268, NULL, 'IT-1264', NULL, 'REVERS HORN DIGITAL NEW', '37', '46', '7', NULL, '8544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1269, NULL, 'IT-1265', NULL, 'Wire 6 mm Deluxe  Vonee', '37', '46', '7', NULL, '010301r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1270, NULL, 'IT-1266', '(Me-101)', 'Wire Clip 6.4F ', '37', '46', '7', NULL, '85369090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1271, NULL, 'IT-1267', '(358-162-141)', '14\'\' UNIVERSAL WIPER BLADE U TYPE HELLA ', '36', '45', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1272, NULL, 'IT-1268', '(358-061-211)', '21\'\' CLEANTECH  WIPER BLADE FLEXIBLE  HELLA ', '36', '45', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1273, NULL, 'IT-1269', '(358-061-221)', '22\'\' CLEANTECH WIPER BLADE FEXIBLE HELLA ', '36', '45', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1274, NULL, 'IT-1270', '(358-061-261)', '26\'\' CLEANTECH WIPERBLADE FLEXIBLE HELLA ', '36', '45', '7', NULL, '85124000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1275, NULL, 'IT-1271', '(Autowipe14\")', 'Auto Wipe W B 14\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1276, NULL, 'IT-1272', '(Autowipe16\")', 'Auto Wipe W B 16\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1277, NULL, 'IT-1273', '(Autowipe18\")', 'Auto Wipe W B 18\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1278, NULL, 'IT-1274', '(Dragon12\")', 'Dragon W B 12\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1279, NULL, 'IT-1275', '(Dragonclradv22\")', 'Dragon W B Clr Adv22\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1280, NULL, 'IT-1276', '(Dragonclradv24\')', 'Dragon W B Clr Adv 24\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1281, NULL, 'IT-1277', '(Softwiper19\")', 'Soft Wiper W B 19\" ', '36', '45', '7', NULL, '85124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1282, NULL, 'IT-1278', '(BSP-39)', 'BLACK SPREY PAINT X-10 ', '35', '44', '7', NULL, '34053000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1283, NULL, 'IT-1279', '(BSP-4)', 'MATT-BLACK SPRAY PAINT X-10 ', '35', '44', '7', NULL, '34053000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1284, NULL, 'IT-1280', '(BSP-36)', 'SILVER SPRAY PAINT X10 400ML ', '35', '44', '7', NULL, '34053000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1285, NULL, 'IT-1281', NULL, 'SPRAY PAINT BLACK MATT (X-10) 400ml', '35', '44', '7', NULL, '34053000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1286, NULL, 'IT-1282', NULL, 'Spray Paint Glosy Black (X-10) 400ml', '35', '44', '7', NULL, '34053000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '-3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1287, NULL, 'IT-1283', NULL, 'HEAD LAMB RELAY 60AMP H.D', '34', '43', '7', NULL, '8512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1288, NULL, 'IT-1284', '(CV-150)', 'TIE CLIP CV-150 ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1289, NULL, 'IT-1285', '(CV-250)', 'TIE CLIP CV-250 ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1600', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1290, NULL, 'IT-1286', '(CV-300)', 'TIE CLIP CV-300 (4.8 MM) ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2000', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1291, NULL, 'IT-1287', '(CV 350 [3.6])', 'TIE CLIP CV-350 [3.6] ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2100', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1292, NULL, 'IT-1288', '(CV-350)', 'TIE CLIP CV-350[3.6] BLACK ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1293, NULL, 'IT-1289', '(CV-400)', 'TIE CLIP CV 400 [4.8] ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1800', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1294, NULL, 'IT-1290', '(CV 400 [4.8])', 'TIE CLIP CV-400 [4.8] BLACK ', '34', '43', '7', NULL, '392390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2500', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1295, NULL, 'IT-1291', '(ZJH-99-026)', 'HYDRAULIC JACK 8 TON  D/L ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1296, NULL, 'IT-1292', '(ZJH-99-035)', 'HYRAULIC JACK 22 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1297, NULL, 'IT-1293', '(ZJT-99-003)', 'ZAAN EZYLIFT TROLLEY JACK 3 TON ', '33', '42', '7', NULL, '84254200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1298, NULL, 'IT-1294', '(ZJH-99-030)', 'ZAAN HYDRAULIC JACK 10 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1299, NULL, 'IT-1295', '(ZJH-99-031)', 'ZAAN HYDRAULIC JACK 15 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1300, NULL, 'IT-1296', '(ZJH-99-021)', 'ZAAN HYDRAULIC JACK 2 TON D/L ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1301, NULL, 'IT-1297', '(ZJH-99-020)', 'ZAAN HYDRAULIC JACK 2 TON S/L ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1302, NULL, 'IT-1298', '(ZJH-99-025)', 'ZAAN HYDRAULIC JACK 3 TON D/L ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1303, NULL, 'IT-1299', '(ZJH-99-034)', 'ZAAN HYDRAULIC JACK 50 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1304, NULL, 'IT-1300', '(ZJH-99-023)', 'ZAAN HYDRAULIC JACK 5 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1305, NULL, 'IT-1301', '(ZJH-99-024)', 'ZAAN HYDRAULIC JACK 8 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1306, NULL, 'IT-1302', '(ZJH-99-022)', 'ZAAN HYDRUALIC JACK 3 TON ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1307, NULL, 'IT-1303', '(ZJM-99-001)', 'ZAAN SCISSOR JACK 1 TON WITH HANDLE ', '33', '42', '7', NULL, '8425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '15', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1308, NULL, 'IT-1304', '(ZGE-99-001)', 'ZAAN TRIPOD JACK STAND 3 TON 1.5F ', '33', '42', '7', NULL, '84254200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1309, NULL, 'IT-1305', '(400013641)', 'CNG Plus 20w50 20X0.5Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1310, NULL, 'IT-1306', '(420000021)', 'COOLZ SUMMER CONCENTRATE COOLANT 6 x 3 LTR ', '32', '41', '8', NULL, '3820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1311, NULL, 'IT-1307', '(400015238)', 'Lubritek Grease Red -4X5kg ', '32', '41', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1312, NULL, 'IT-1308', '(400012097)', 'Lubritek Max LL-6X2kg ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1313, NULL, 'IT-1309', '(420000017)', 'Lubritek Maxx LL -12X1kg ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '43', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1314, NULL, 'IT-1310', '(400014459)', 'Rforce 4100 15w40-1x18Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1315, NULL, 'IT-1311', NULL, 'RFORCE MG 20W40- 1x50 LTR', '32', '41', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1316, NULL, 'IT-1312', '(400011911)', 'Rforce MGX 20w40-1x9+1Ltr ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1317, NULL, 'IT-1313', '(400014484)', 'Rforce MGX 20w40-2x5+1 ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1318, NULL, 'IT-1314', '(400015133)', 'Rforce Turbo Plus 15w40 20X0.5 Ltr ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1319, NULL, 'IT-1315', '(400015465)', 'RIDER PRO SL SAE 10W30 -20 X 0.9 LTR ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1320, NULL, 'IT-1316', '(400011954)', 'Roxx Front Fork Oil 20X0.350Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1321, NULL, 'IT-1317', NULL, 'Roxx PL 4T 20w40-1x50Lt', '28', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, 'Percentage', NULL, '2000', '12', 0, 'Inclusive', '2000', '10', '2200', '20', '28', '20', 'active', 'none_app', NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-11-25 12:47:31', NULL, ''),
(1322, NULL, 'IT-1318', '(400011966)', 'Roxx PR 4T 15W50-20x1Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '50', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1323, NULL, 'IT-1319', '(400014461)', 'Roxx PR 4t 15w50 2.5Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '12', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1324, NULL, 'IT-1320', '(400015460)', 'ROXX PREMIUM 4T SN 20W50 -20*1.2LT ', '32', '41', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1325, NULL, 'IT-1321', '(400015424)', 'Roxx Premium 4t SN SAE  20w50  20 x 1ltr ', '32', '41', '8', NULL, '271019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1326, NULL, 'IT-1322', '(400014782)', 'Roxx Scooter SN/MB 10w30-20x0.8Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1327, NULL, 'IT-1323', '(400012033)', 'Zenco Ep 90 SAE 90-1x20Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, '');
INSERT INTO `items` (`id`, `slId`, `item_code`, `part_no`, `item_name`, `category_id`, `brand_id`, `unit_id`, `sku`, `hsn_code`, `alert_quantity`, `seller_point`, `barcode`, `Expiry_date`, `dis`, `discount_type`, `discount`, `purchase_price`, `tax_id`, `slno`, `tax_type`, `price`, `profit_margin`, `sales_price`, `mrp`, `ware_house_id`, `opening_stock`, `status`, `show_app`, `app_price`, `tax_amount`, `created_by`, `store_id`, `image`, `created_at`, `updated_at`, `alt_unit`, `second_store_id`) VALUES
(1328, NULL, 'IT-1324', '(400012040)', 'Zenco HD 85w140 20x1Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1329, NULL, 'IT-1325', '(400012041)', 'Zenco HD 85w140-4x5Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1330, NULL, 'IT-1326', '(400013352)', 'Zest MGX Advance 5W30 4X3Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1331, NULL, 'IT-1327', '(400014464)', 'Zest Mgx Super 5w40-20X1 Lt ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '48', 'inactive', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-11-25 12:46:45', NULL, ''),
(1332, NULL, 'IT-1328', '(400013637)', 'Zoomol 4T 20w40 20X0.900ml ', '32', '41', '8', NULL, '2710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, NULL, NULL, NULL, NULL, NULL, '47', 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1333, NULL, 'IT-1329', 'Zoomol 4T 20w40 20X0.900ml ', 'Zoomol', '32', 'No Data', 'No Data', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No Data', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '1', '5', NULL, '2024-10-30 03:34:09', '2024-10-30 03:34:09', NULL, ''),
(1335, NULL, 'IT-1-0000', NULL, ';sakdfdsjkf', '24', '32', '8', '-0987657890-', ';lghfio87', 900, '899', ';LKOIYWD987689', '2024-11-16', '/;KIYOTUIYDYGHSJKFDMX', 'Fixed', '8999', '100', NULL, 0, 'Exclusive', '118', '900', '1000', '90', NULL, '10', 'active', 'none_app', NULL, NULL, '1', '3', NULL, '2024-11-05 03:31:44', '2024-11-05 03:31:44', NULL, ''),
(1336, NULL, 'IT-1-0000', NULL, ';sakdfdsjkf', '24', '32', '8', '-0987657890-', ';lghfio87', 900, '899', ';LKOIYWD987689', '2024-11-16', '/;KIYOTUIYDYGHSJKFDMX', 'Fixed', '8999', '100', NULL, 0, 'Exclusive', '118', '900', '1000', '90', '3', '10', 'active', 'none_app', NULL, NULL, '1', '3', NULL, '2024-11-05 03:32:33', '2024-11-05 03:32:33', NULL, ''),
(1337, NULL, 'IT-1-0000', NULL, ';sakdfdsjkf', '24', '32', '8', '-0987657890-', ';lghfio87', 900, '899', ';LKOIYWD987689', '2024-11-16', '/;KIYOTUIYDYGHSJKFDMX', 'Fixed', '8999', '100', NULL, 0, 'Exclusive', '118', '900', '1000', '90', '3', '10', 'active', 'none_app', NULL, NULL, '1', '3', NULL, '2024-11-05 03:33:14', '2024-11-05 03:33:14', NULL, ''),
(1338, NULL, 'IT-1-00009877', NULL, 'items demo', '20', '28', '7', 'phgj', 'kjnknkn7', 90, '9090909', '90709797', '2024-11-14', 'sdkm kmds', 'Fixed', 'sdbjhvdhd', '100', '12', 0, 'Exclusive', '118', '90', '190', '90', '4', '10', 'active', 'none_app', NULL, NULL, '1', '4', NULL, '2024-11-05 03:58:02', '2024-11-05 03:58:02', NULL, ''),
(1339, NULL, 'IT-1-0000', NULL, 'Items store', '24', '33', '8', '456', '456', 4, '456', 'AZ9063829', '2024-11-18', 'asdfasfadf', 'Percentage', '20', '200', '12', 0, 'Inclusive', '200', '20', '240', '200', '28', '0', 'active', 'none_app', NULL, NULL, '3', '5', 'item/RVFO3gsuNY5si0iZOCDcLa4uqK2pAXcnFjs9j8EK.jpg', '2024-11-06 22:56:58', '2024-11-25 12:46:12', NULL, ''),
(1341, NULL, 'IT-1-0000', NULL, 'Itemmmm', '23', '26', '8', '45655', '456', 4, '456', 'AZ9063829', '2024-11-20', 'dghh', 'Fixed', '4545', '300', NULL, 0, 'Inclusive', '234.375', NULL, '300', '200', '3', '0455', 'active', 'none_app', NULL, NULL, '3', '3', 'item/d5SkHe1AT2xki59w9MRjzzRFZMlzvlpLxXcbqAy3.png', '2024-11-07 00:07:34', '2024-11-07 00:07:34', NULL, ''),
(1342, NULL, 'IT-1-00045', NULL, 'fsdf', '24', '27', '8', 'sdfsdf', 'sdfsdf', 4, '456', 'AZ9063829', '2024-11-11', 'asfddaf', 'Fixed', '51621', '300', NULL, 0, 'Inclusive', '254.23728813559325', '20', '360', '2023', '1', '0455', 'active', 'none_app', NULL, NULL, '3', '3', NULL, '2024-11-07 00:59:40', '2024-11-07 00:59:40', NULL, ''),
(1343, NULL, 'IT-1-0000', NULL, 'Item anas k a', '18', '27', '7', '456', 'sdfsdf', 4, '456AZ9063829', 'AZ9063829', '2024-11-18', 'dfgdfg', 'Percentage', '545', '300', '12', 0, NULL, '354', '20', '360', '200', '1', '0', 'inactive', 'none_app', NULL, NULL, '3', '3', NULL, '2024-11-07 01:00:57', '2024-11-07 01:09:30', NULL, ''),
(1344, NULL, 'IT-1-000020', NULL, 'sfssdf', '24', '35', '7', 'sdfsdf', 'ssdfsdf', 45, '2000', 'sfsd200', '2024-11-15', 'sdfsdfsdf', 'Fixed', '2000', '200', NULL, 0, 'Exclusive', '256', '2000', '4200', '200', '12', '20', 'active', 'none_app', NULL, NULL, '1', '34', 'item/P2dyDSmlLBBa9wwL8hOvlliG5rcVihngmQrKNehS.jpg', '2024-11-10 04:31:12', '2024-11-10 04:31:12', NULL, '10'),
(1345, NULL, 'IT-1-000020', NULL, 'sfssdf', '24', '35', '7', 'sdfsdf', 'ssdfsdf', 45, '2000', 'sfsd200', '2024-11-15', 'sdfsdfsdf', 'Fixed', '2000', '200', NULL, 0, 'Exclusive', '256', '2000', '4200', '200', '12', '20', 'active', 'none_app', NULL, NULL, '1', '34', 'item/HpcL3uhlByuifgPNoIqpfR1VyEj5UqZVh4XJM20g.jpg', '2024-11-10 05:00:41', '2024-11-10 05:00:41', NULL, '10'),
(1346, NULL, 'IT-1-00010', NULL, 'hdfgjdf', '24', '36', '8', '45421', '545sdfsdf', 10, '2000', 'gdidh4522', '2024-11-14', 'dvfbdbfdsf', 'Fixed', 'hsdfsdhfv', '2000', NULL, 0, 'Exclusive', '2560', '200', '6000', '2000', '11', '20', 'active', 'none_app', NULL, NULL, '1', '34', 'item/DbwN7dwjkGHkOhGNymVGC3kNtwXhueQUdSVqRwhh.jpg', '2024-11-10 05:06:38', '2024-11-10 05:06:38', NULL, '10'),
(1349, NULL, 'IT-1-0000900', NULL, 'JHGHJG', '23', '33', '8', '45222', '5565', 50, '50', 'SDFSDF', '2024-11-23', 'FSDGDFG', 'Fixed', '2000', '2000', NULL, 0, 'Exclusive', '2360', '200', '6000', '20', '9', '20', 'active', 'none_app', NULL, NULL, '1', '4', NULL, '2024-11-24 03:54:44', '2024-11-24 03:54:44', NULL, ''),
(1352, NULL, 'IT-1-123456', NULL, 'rtjjktfbj', '24', '33', '8', '454', '5454', 45, '4545', '454', '2024-05-24', 'dfsdfsdf', 'Percentage', '646', '5545', '12', 0, 'Inclusive', '4699.152542372882', '454', '30719.3', '200', '28', '450', 'active', 'none_app', NULL, NULL, '8', '5', NULL, '2024-11-25 22:52:06', '2024-11-25 22:52:06', NULL, ''),
(1353, NULL, NULL, NULL, 'GJDFGH', '25', '34', '7', '554', '5454', 54, '6564', '654', '2024-11-08', 'GDFGDFGH', 'Percentage', '5454', '20000', '12', 0, 'Inclusive', '16949.15254237288', '40', '28000', '400', '28', '40', 'active', 'none_app', NULL, NULL, '8', '5', NULL, '2024-11-25 23:23:20', '2024-11-25 23:23:20', NULL, '0'),
(1354, NULL, 'IT-5-1354', NULL, 'gfdjfkg', '20', '28', '7', '55655', '655', 4545, '5454', '4545', '2024-11-15', 'fbghdfhgb', 'Percentage', '5454', '545', '12', 0, 'Inclusive', '461.86440677966107', '20', '654', '454', '28', '4554', 'active', 'none_app', NULL, NULL, '8', '5', NULL, '2024-11-25 23:27:19', '2024-11-25 23:27:19', NULL, '0'),
(1355, NULL, 'IT-1-7885', NULL, 'gfgfg', '27', '35', '8', '87878', '454464', 5, '88984', '87894564', '2024-12-03', 'sgdfgfdg', 'Fixed', '2', '88', NULL, 0, 'Inclusive', '74.57627118644068', '10', '96.8', '10', '26', '10', 'active', 'none_app', NULL, NULL, '1', '5', NULL, '2024-12-02 22:00:23', '2024-12-02 22:00:23', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--
-- Error reading structure for table cargroup.jobs: #1932 - Table 'cargroup.jobs' doesn't exist in engine
-- Error reading data for table cargroup.jobs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`jobs`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(5) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `status`) VALUES
(1, 'English', 1),
(2, 'Russian', 0),
(3, 'Spanish', 0),
(4, 'Arabic', 0),
(5, 'Bangla', 0),
(6, 'French', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--
-- Error reading structure for table cargroup.ledger: #1932 - Table 'cargroup.ledger' doesn't exist in engine
-- Error reading data for table cargroup.ledger: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`ledger`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `login_ip` text NOT NULL,
  `last_login_date` text NOT NULL,
  `last_login_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `login_ip`, `last_login_date`, `last_login_time`) VALUES
(1, '1', '127.0.0.1', '19/04/2023', '09:35:28'),
(2, '37', '127.0.0.1', '19/04/2023', '12:37:18'),
(3, '37', '127.0.0.1', '19/04/2023', '13:03:35'),
(4, '1', '127.0.0.1', '20/04/2023', '19:35:57'),
(5, '1', '127.0.0.1', '21/04/2023', '09:14:36'),
(6, '1', '127.0.0.1', '22/04/2023', '10:22:54'),
(7, '1', '127.0.0.1', '23/04/2023', '08:49:03'),
(8, '2', '127.0.0.1', '27/04/2023', '18:27:27'),
(9, '1', '127.0.0.1', '13/05/2023', '21:57:18'),
(10, '2', '127.0.0.1', '13/05/2023', '23:20:53'),
(11, '2', '127.0.0.1', '14/05/2023', '11:35:25'),
(12, '2', '127.0.0.1', '14/05/2023', '11:40:50'),
(13, '1', '127.0.0.1', '14/05/2023', '12:27:10'),
(14, '3', '127.0.0.1', '15/05/2023', '21:50:50'),
(15, '1', '127.0.0.1', '16/05/2023', '11:32:23'),
(16, '3', '127.0.0.1', '16/05/2023', '12:47:19'),
(17, '1', '127.0.0.1', '16/05/2023', '12:49:08'),
(18, '1', '127.0.0.1', '16/05/2023', '17:35:24'),
(19, '3', '127.0.0.1', '16/05/2023', '23:46:00'),
(20, '1', '127.0.0.1', '17/05/2023', '13:31:25'),
(21, '3', '127.0.0.1', '24/05/2023', '11:27:46'),
(22, '1', '127.0.0.1', '24/05/2023', '11:28:50'),
(23, '1', '127.0.0.1', '25/05/2023', '10:27:04'),
(24, '1', '127.0.0.1', '25/05/2023', '18:17:43'),
(25, '3', '127.0.0.1', '25/05/2023', '20:30:43'),
(26, '3', '127.0.0.1', '25/05/2023', '21:20:58'),
(27, '1', '127.0.0.1', '25/05/2023', '22:36:50'),
(28, '3', '127.0.0.1', '25/05/2023', '22:52:08'),
(29, '1', '127.0.0.1', '26/05/2023', '17:42:35'),
(30, '1', '127.0.0.1', '30/05/2023', '11:56:31'),
(31, '3', '127.0.0.1', '31/05/2023', '10:52:41'),
(32, '1', '127.0.0.1', '31/05/2023', '12:44:41'),
(33, '1', '127.0.0.1', '31/05/2023', '16:10:29'),
(34, '1', '127.0.0.1', '02/06/2023', '11:40:42'),
(35, '3', '127.0.0.1', '02/06/2023', '12:08:02'),
(36, '1', '127.0.0.1', '18/06/2023', '12:25:52'),
(37, '2', '127.0.0.1', '18/06/2023', '13:15:03'),
(38, '2', '127.0.0.1', '18/06/2023', '13:16:43'),
(39, '2', '127.0.0.1', '18/06/2023', '13:40:58'),
(40, '2', '127.0.0.1', '18/06/2023', '13:45:30'),
(41, '1', '127.0.0.1', '18/06/2023', '13:46:10'),
(42, '2', '127.0.0.1', '18/06/2023', '13:47:33'),
(43, '2', '127.0.0.1', '18/06/2023', '13:47:58'),
(44, '1', '127.0.0.1', '18/06/2023', '13:48:16'),
(45, '2', '127.0.0.1', '18/06/2023', '13:50:27'),
(46, '2', '127.0.0.1', '18/06/2023', '13:52:14'),
(47, '2', '127.0.0.1', '18/06/2023', '13:52:39'),
(48, '2', '127.0.0.1', '18/06/2023', '13:53:04'),
(49, '2', '127.0.0.1', '18/06/2023', '13:54:01'),
(50, '2', '127.0.0.1', '18/06/2023', '13:54:38'),
(51, '2', '127.0.0.1', '18/06/2023', '13:55:36'),
(52, '1', '127.0.0.1', '18/06/2023', '13:56:25'),
(53, '2', '127.0.0.1', '18/06/2023', '13:56:35'),
(54, '2', '127.0.0.1', '18/06/2023', '13:56:54'),
(55, '1', '127.0.0.1', '18/06/2023', '13:57:23'),
(56, '2', '127.0.0.1', '18/06/2023', '13:57:32'),
(57, '1', '127.0.0.1', '18/06/2023', '13:57:44'),
(58, '2', '127.0.0.1', '18/06/2023', '13:57:57'),
(59, '1', '127.0.0.1', '18/06/2023', '13:58:15'),
(60, '2', '127.0.0.1', '18/06/2023', '13:58:25'),
(61, '2', '127.0.0.1', '18/06/2023', '13:59:28'),
(62, '2', '127.0.0.1', '18/06/2023', '14:00:47'),
(63, '1', '127.0.0.1', '18/06/2023', '14:01:40'),
(64, '2', '127.0.0.1', '18/06/2023', '14:01:54'),
(65, '2', '127.0.0.1', '18/06/2023', '14:02:41'),
(66, '2', '127.0.0.1', '18/06/2023', '14:03:22'),
(67, '2', '127.0.0.1', '18/06/2023', '14:05:02'),
(68, '1', '127.0.0.1', '18/06/2023', '15:25:49'),
(69, '2', '127.0.0.1', '18/06/2023', '15:48:31'),
(70, '1', '127.0.0.1', '18/06/2023', '15:59:15'),
(71, '2', '127.0.0.1', '18/06/2023', '15:59:38'),
(72, '1', '127.0.0.1', '18/06/2023', '16:02:57'),
(73, '2', '127.0.0.1', '18/06/2023', '16:04:29'),
(74, '1', '127.0.0.1', '18/06/2023', '16:07:16'),
(75, '2', '127.0.0.1', '18/06/2023', '16:09:13'),
(76, '1', '127.0.0.1', '18/06/2023', '18:04:59'),
(77, '1', '127.0.0.1', '20/06/2023', '13:49:57'),
(78, '1', '127.0.0.1', '21/06/2023', '11:26:19'),
(79, '3', '127.0.0.1', '21/06/2023', '17:00:01'),
(80, '1', '::1', '21/06/2023', '21:09:20'),
(81, '1', '127.0.0.1', '30/06/2023', '11:59:22'),
(82, '1', '127.0.0.1', '30/06/2023', '16:11:15'),
(83, '1', '127.0.0.1', '04/07/2023', '13:37:55'),
(84, '1', '127.0.0.1', '04/07/2023', '15:01:00'),
(85, '3', '127.0.0.1', '04/07/2023', '15:52:55'),
(86, '3', '127.0.0.1', '05/07/2023', '10:54:48'),
(87, '1', '127.0.0.1', '15/07/2023', '20:12:34'),
(88, '1', '127.0.0.1', '20/07/2023', '10:41:11'),
(89, '1', '127.0.0.1', '22/07/2023', '17:57:19'),
(90, '1', '127.0.0.1', '24/07/2023', '15:39:52'),
(91, '1', '127.0.0.1', '25/07/2023', '14:51:25'),
(92, '1', '127.0.0.1', '21/08/2023', '10:19:40'),
(93, '1', '127.0.0.1', '27/08/2023', '10:33:26'),
(94, '3', '127.0.0.1', '27/08/2023', '13:34:45'),
(95, '1', '127.0.0.1', '28/08/2023', '12:50:07'),
(96, '2', '127.0.0.1', '30/08/2023', '09:41:58'),
(97, '1', '127.0.0.1', '30/08/2023', '09:56:08'),
(98, '2', '127.0.0.1', '30/08/2023', '17:19:06'),
(99, '2', '127.0.0.1', '30/08/2023', '17:25:11'),
(100, '1', '127.0.0.1', '31/08/2023', '11:02:18'),
(101, '2', '127.0.0.1', '31/08/2023', '11:11:01'),
(102, '1', '127.0.0.1', '31/08/2023', '15:22:02'),
(103, '1', '127.0.0.1', '31/08/2023', '16:55:28'),
(104, '1', '127.0.0.1', '31/08/2023', '16:55:45'),
(105, '1', '127.0.0.1', '31/08/2023', '16:56:45'),
(106, '1', '127.0.0.1', '05/09/2023', '12:32:57'),
(107, '1', '127.0.0.1', '19/09/2023', '12:34:12'),
(108, '1', '127.0.0.1', '19/09/2023', '16:38:02'),
(109, '1', '127.0.0.1', '19/09/2023', '17:06:23'),
(110, '1', '127.0.0.1', '20/09/2023', '21:52:32'),
(111, '1', '127.0.0.1', '21/09/2023', '08:39:08'),
(112, '1', '127.0.0.1', '21/09/2023', '10:41:15'),
(113, '1', '127.0.0.1', '26/09/2023', '21:06:29'),
(114, '1', '127.0.0.1', '11/10/2023', '16:58:33'),
(115, '1', '127.0.0.1', '24/10/2023', '11:47:14'),
(116, '1', '127.0.0.1', '27/10/2023', '19:58:45'),
(117, '1', '127.0.0.1', '28/10/2023', '20:56:04'),
(118, '1', '127.0.0.1', '01/11/2023', '10:07:21'),
(119, '1', '::1', '03/11/2023', '19:26:19'),
(120, '1', '127.0.0.1', '09/11/2023', '10:40:20'),
(121, '1', '127.0.0.1', '10/11/2023', '09:30:10'),
(122, '1', '127.0.0.1', '10/11/2023', '20:17:20'),
(123, '1', '127.0.0.1', '16/11/2023', '13:05:06'),
(124, '1', '127.0.0.1', '16/11/2023', '13:10:30'),
(125, '1', '127.0.0.1', '16/11/2023', '16:16:25'),
(126, '1', '127.0.0.1', '16/11/2023', '16:18:16'),
(127, '1', '127.0.0.1', '16/11/2023', '17:32:11'),
(128, '1', '127.0.0.1', '16/11/2023', '17:42:26'),
(129, '2', '127.0.0.1', '16/11/2023', '17:58:23'),
(130, '2', '127.0.0.1', '16/11/2023', '18:00:27'),
(131, '1', '127.0.0.1', '16/11/2023', '18:03:03'),
(132, '1', '127.0.0.1', '16/11/2023', '18:03:23'),
(133, '1', '127.0.0.1', '16/11/2023', '18:04:29'),
(134, '2', '127.0.0.1', '16/11/2023', '18:04:42'),
(135, '2', '127.0.0.1', '16/11/2023', '18:06:52'),
(136, '2', '127.0.0.1', '16/11/2023', '18:07:41'),
(137, '2', '127.0.0.1', '18/11/2023', '19:36:13'),
(138, '2', '127.0.0.1', '19/11/2023', '12:52:09'),
(139, '2', '127.0.0.1', '20/11/2023', '10:48:27'),
(140, '1', '127.0.0.1', '20/11/2023', '12:53:52'),
(141, '3', '127.0.0.1', '20/11/2023', '12:55:59'),
(142, '2', '127.0.0.1', '20/11/2023', '12:56:37'),
(143, '2', '127.0.0.1', '20/11/2023', '17:50:05'),
(144, '2', '127.0.0.1', '20/11/2023', '21:25:47'),
(145, '2', '127.0.0.1', '22/11/2023', '10:16:38'),
(146, '2', '127.0.0.1', '22/11/2023', '19:33:01'),
(147, '2', '127.0.0.1', '23/11/2023', '09:56:29'),
(148, '1', '127.0.0.1', '25/11/2023', '13:31:25'),
(149, '2', '127.0.0.1', '25/11/2023', '13:31:35'),
(150, '2', '127.0.0.1', '25/11/2023', '21:59:58'),
(151, '3', '127.0.0.1', '25/11/2023', '22:08:14'),
(152, '2', '127.0.0.1', '02/12/2023', '11:18:14'),
(153, '2', '127.0.0.1', '03/12/2023', '13:33:02'),
(154, '2', '127.0.0.1', '04/12/2023', '11:00:40'),
(155, '2', '127.0.0.1', '04/12/2023', '17:56:31'),
(156, '2', '127.0.0.1', '05/12/2023', '11:23:27'),
(157, '2', '127.0.0.1', '07/12/2023', '10:29:47'),
(158, '1', '127.0.0.1', '07/12/2023', '23:27:06'),
(159, '2', '127.0.0.1', '07/12/2023', '23:27:44'),
(160, '2', '127.0.0.1', '08/12/2023', '00:07:39'),
(161, '2', '127.0.0.1', '08/12/2023', '00:40:21'),
(162, '2', '127.0.0.1', '08/12/2023', '12:16:35'),
(163, '2', '127.0.0.1', '10/12/2023', '17:31:58'),
(164, '2', '127.0.0.1', '10/12/2023', '21:53:08'),
(165, '2', '127.0.0.1', '11/12/2023', '10:48:35'),
(166, '2', '127.0.0.1', '11/12/2023', '15:43:32'),
(167, '2', '127.0.0.1', '17/12/2023', '10:15:21'),
(168, '2', '127.0.0.1', '19/12/2023', '10:58:04'),
(169, '2', '127.0.0.1', '19/12/2023', '11:17:00'),
(170, '2', '127.0.0.1', '20/12/2023', '12:08:03'),
(171, '2', '127.0.0.1', '21/12/2023', '12:46:13'),
(172, '1', '127.0.0.1', '23/12/2023', '16:24:00'),
(173, '2', '127.0.0.1', '23/12/2023', '16:24:37'),
(174, '1', '127.0.0.1', '25/12/2023', '12:32:54'),
(175, '2', '127.0.0.1', '04/01/2024', '19:20:51'),
(176, '2', '127.0.0.1', '11/01/2024', '13:24:56'),
(177, '2', '127.0.0.1', '12/01/2024', '17:03:35'),
(178, '2', '127.0.0.1', '17/01/2024', '14:27:44'),
(179, '2', '127.0.0.1', '18/01/2024', '11:34:43'),
(180, '2', '127.0.0.1', '23/01/2024', '16:38:26'),
(181, '2', '127.0.0.1', '13/02/2024', '09:33:42'),
(182, '2', '127.0.0.1', '14/02/2024', '09:29:35'),
(183, '2', '127.0.0.1', '15/02/2024', '12:30:13'),
(184, '8', '127.0.0.1', '15/02/2024', '18:41:36'),
(185, '8', '127.0.0.1', '15/02/2024', '18:44:20'),
(186, '8', '127.0.0.1', '15/02/2024', '18:45:48'),
(187, '8', '127.0.0.1', '15/02/2024', '18:47:27'),
(188, '8', '127.0.0.1', '15/02/2024', '18:49:44'),
(189, '8', '127.0.0.1', '15/02/2024', '19:33:30'),
(190, '8', '127.0.0.1', '15/02/2024', '22:44:25'),
(191, '8', '127.0.0.1', '16/02/2024', '10:14:07'),
(192, '2', '127.0.0.1', '16/02/2024', '10:52:25'),
(193, '8', '127.0.0.1', '16/02/2024', '11:35:17'),
(194, '2', '127.0.0.1', '16/02/2024', '11:49:35'),
(195, '8', '127.0.0.1', '16/02/2024', '12:03:13'),
(196, '8', '127.0.0.1', '16/02/2024', '21:39:27'),
(197, '2', '127.0.0.1', '17/02/2024', '16:44:32'),
(198, '8', '127.0.0.1', '17/02/2024', '19:50:21'),
(199, '8', '127.0.0.1', '17/02/2024', '21:45:48'),
(200, '1', '127.0.0.1', '19/02/2024', '19:31:33'),
(201, '2', '127.0.0.1', '19/02/2024', '19:31:50'),
(202, '2', '127.0.0.1', '20/02/2024', '09:49:22'),
(203, '2', '127.0.0.1', '21/02/2024', '10:21:41'),
(204, '2', '127.0.0.1', '26/02/2024', '11:56:36'),
(205, '2', '127.0.0.1', '04/03/2024', '16:04:53'),
(206, '2', '127.0.0.1', '07/03/2024', '23:23:21'),
(207, '14', '127.0.0.1', '08/03/2024', '00:09:46'),
(208, '2', '127.0.0.1', '08/03/2024', '02:13:12'),
(209, '13', '127.0.0.1', '08/03/2024', '02:20:27'),
(210, '2', '127.0.0.1', '13/03/2024', '12:00:31'),
(211, '2', '127.0.0.1', '13/03/2024', '20:15:29'),
(212, '2', '127.0.0.1', '13/03/2024', '21:27:19'),
(213, '2', '127.0.0.1', '13/03/2024', '22:21:23'),
(214, '2', '127.0.0.1', '15/03/2024', '10:41:12'),
(215, '2', '127.0.0.1', '17/03/2024', '10:28:57'),
(216, '1', '127.0.0.1', '18/03/2024', '10:47:30'),
(217, '2', '127.0.0.1', '18/03/2024', '10:48:53'),
(218, '2', '127.0.0.1', '18/03/2024', '13:43:21'),
(219, '2', '127.0.0.1', '19/03/2024', '11:51:35'),
(220, '2', '127.0.0.1', '20/03/2024', '10:05:44'),
(221, '2', '127.0.0.1', '20/03/2024', '13:19:15'),
(222, '2', '127.0.0.1', '21/03/2024', '11:50:55'),
(223, '2', '127.0.0.1', '21/03/2024', '16:49:59'),
(224, '17', '127.0.0.1', '21/03/2024', '22:44:37'),
(225, '2', '127.0.0.1', '22/03/2024', '09:45:23'),
(226, '17', '127.0.0.1', '22/03/2024', '09:51:33'),
(227, '18', '127.0.0.1', '22/03/2024', '09:58:06'),
(228, '17', '127.0.0.1', '22/03/2024', '10:14:11'),
(229, '18', '127.0.0.1', '22/03/2024', '10:15:58'),
(230, '2', '127.0.0.1', '24/03/2024', '00:29:33'),
(231, '13', '127.0.0.1', '24/03/2024', '13:13:00'),
(232, '2', '127.0.0.1', '24/03/2024', '13:23:59'),
(233, '13', '127.0.0.1', '24/03/2024', '21:51:13'),
(234, '2', '127.0.0.1', '24/03/2024', '21:54:25'),
(235, '2', '127.0.0.1', '24/03/2024', '21:54:41'),
(236, '13', '127.0.0.1', '24/03/2024', '22:01:01'),
(237, '2', '127.0.0.1', '24/03/2024', '22:19:50'),
(238, '13', '127.0.0.1', '24/03/2024', '22:29:47'),
(239, '13', '127.0.0.1', '24/03/2024', '22:30:00'),
(240, '2', '127.0.0.1', '24/03/2024', '22:49:02'),
(241, '2', '127.0.0.1', '29/03/2024', '10:39:47'),
(242, '2', '127.0.0.1', '11/04/2024', '23:59:51'),
(243, '2', '127.0.0.1', '17/04/2024', '15:11:36'),
(244, '1', '127.0.0.1', '21/04/2024', '10:21:06'),
(245, '2', '127.0.0.1', '21/04/2024', '10:48:22'),
(246, '13', '127.0.0.1', '21/04/2024', '13:13:39'),
(247, '2', '127.0.0.1', '23/04/2024', '09:42:16'),
(248, '17', '127.0.0.1', '23/04/2024', '10:08:17'),
(249, '2', '127.0.0.1', '23/04/2024', '10:12:18'),
(250, '2', '127.0.0.1', '24/04/2024', '11:21:29'),
(251, '2', '127.0.0.1', '24/04/2024', '12:57:16'),
(252, '1', '127.0.0.1', '24/04/2024', '14:01:40'),
(253, '2', '127.0.0.1', '24/04/2024', '14:02:00'),
(254, '2', '127.0.0.1', '29/04/2024', '12:41:59'),
(255, '2', '127.0.0.1', '29/04/2024', '12:42:12'),
(256, '2', '127.0.0.1', '29/04/2024', '12:56:33'),
(257, '2', '127.0.0.1', '01/05/2024', '10:59:22'),
(258, '2', '127.0.0.1', '03/05/2024', '13:39:23'),
(259, '2', '127.0.0.1', '14/05/2024', '11:11:24'),
(260, '2', '127.0.0.1', '14/05/2024', '11:11:41'),
(261, '2', '127.0.0.1', '25/05/2024', '14:17:59'),
(262, '2', '127.0.0.1', '27/05/2024', '19:35:37'),
(263, '2', '127.0.0.1', '27/05/2024', '22:11:55'),
(264, '2', '127.0.0.1', '28/06/2024', '15:52:10'),
(265, '16', '127.0.0.1', '28/06/2024', '18:21:11'),
(266, '2', '127.0.0.1', '21/07/2024', '22:39:51'),
(267, '2', '127.0.0.1', '25/07/2024', '23:34:14'),
(268, '2', '127.0.0.1', '25/07/2024', '23:54:12'),
(269, '2', '127.0.0.1', '22/09/2024', '21:11:27'),
(270, '2', '127.0.0.1', '30/09/2024', '13:29:50'),
(271, '2', '127.0.0.1', '14/10/2024', '11:31:40'),
(272, '1', '127.0.0.1', '14/10/2024', '11:31:57'),
(273, '2', '127.0.0.1', '14/10/2024', '11:32:29'),
(274, '1', '127.0.0.1', '19/10/2024', '20:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_10_10_060350_login', 1),
(4, '2024_10_10_062701_warehouse', 2),
(5, '2024_10_10_090213_add_status_to_warehouse_table', 3),
(6, '2024_10_10_093547_add_details_to_warehouse_table', 4),
(7, '2024_10_11_061156_brand', 5),
(8, '2024_10_11_065752_update_brand_table', 6),
(9, '2024_10_11_072228_update_brand_table', 7),
(10, '2024_10_11_080539_add_status_to_brand_table', 8),
(11, '2024_10_11_143124_category', 9),
(12, '2024_10_12_043420_update_to_category_table', 10),
(13, '2024_10_12_044111_update_to_category_table', 11),
(14, '2024_10_12_044208_update_to_category_table', 12),
(15, '2024_10_12_100928_update_to_category_table', 13),
(16, '2024_10_12_101051_update_to_brand_table', 14),
(17, '2024_10_12_102832_update_to_category_table', 15),
(18, '2024_10_13_045145_tax', 16),
(19, '2024_10_13_045810_update_to_tax_table', 17),
(20, '2024_10_13_050607_update_to_tax_table', 18),
(21, '2024_10_13_052905_update_to_tax_table', 19),
(22, '2024_10_13_054340_taxes', 20),
(23, '2024_10_13_063947_units', 21),
(24, '2024_10_13_065708_update_to_unit_table', 22),
(25, '2024_10_13_115753_items', 23),
(26, '2024_10_13_134024_update_to_items_table', 24),
(27, '2024_10_13_134135_update_to_items_table', 25),
(28, '2024_10_13_150315_update_to_items_table', 26),
(29, '2024_10_14_042017_update_to_items_table', 27),
(30, '2024_10_14_054930_update_to_items_table', 28),
(31, '2024_10_14_083236_update_to_items_table', 29),
(32, '2024_10_14_090918_account', 30),
(33, '2024_10_14_092758_update_to_account_table', 31),
(34, '2024_10_14_093622_update_to_account_table', 32),
(35, '2024_10_14_094655_update_to_account_table', 33),
(36, '2024_10_15_043625_customer', 34),
(37, '2024_10_15_055810_update_to_customer_table', 35),
(38, '2024_10_15_060401_update_to_customer_table', 36),
(39, '2024_10_15_061205_update_to_customer_table', 37),
(40, '2024_10_15_062815_update_to_customer_table', 38),
(41, '2024_10_15_064246_update_to_customer_table', 39),
(42, '2024_10_15_083530_supplier', 40),
(43, '2024_10_15_085147_update_to_supplier_table', 41),
(44, '2024_10_15_085709_update_to_supplier_table', 42),
(45, '2024_10_15_102051_advance', 43),
(46, '2024_10_15_102744_update_to_advance_table', 44),
(47, '2024_10_15_103849_update_to_advance_table', 45),
(48, '2024_10_16_070249_update_to_items_table', 46),
(49, '2024_10_16_105837_adjust', 47),
(50, '2024_10_16_110503_update_to_adjust_table', 48),
(51, '2024_10_17_050423_update_to_adjust_table', 49),
(52, '2024_10_17_070100_update_to_adjust_table', 50),
(53, '2024_10_17_070426_update_to_adjust_table', 51),
(54, '2024_10_17_094329_user', 52),
(55, '2024_10_17_095011_update_to_userlist_table', 53),
(56, '2024_10_17_104057_update_to_userlist_table', 54),
(57, '2024_10_17_115728_expensecategory', 55),
(58, '2024_10_17_120200_update_to_expensecategory_table', 56),
(59, '2024_10_17_123107_expenses', 57),
(60, '2024_10_20_172134_purchase', 58),
(61, '2024_10_21_053422_update_in_to_uesrs', 59),
(62, '2024_10_21_054230_update_in_to_uesrs', 60),
(63, '2024_10_21_054926_update_in_to_uesrs', 61),
(64, '2024_10_21_060042_update_in_to_uesrs', 62),
(65, '2024_10_21_060338_update_in_to_uesrs', 63),
(66, '2024_10_21_060606_update_in_to_uesrs', 64),
(67, '2024_10_21_064224_store', 65),
(68, '2024_10_21_072725_update_in_to_store', 66),
(69, '2024_10_21_080309_update_in_to_store', 67),
(70, '2024_10_21_082921_update_in_to_store', 68),
(71, '2024_10_21_085156_update_in_to_store', 69),
(72, '2024_10_21_102312_update_in_to_items', 70),
(73, '2024_10_22_073142_update_in_to_purchaseitems', 71),
(74, '2024_10_22_074012_update_in_to_purchaseitems', 72),
(75, '2024_10_22_082924_update_in_to_purchaseitems', 73),
(76, '2024_10_22_083216_update_in_to_purchaseitems', 74),
(77, '2024_10_22_083417_update_in_to_purchaseitems', 75),
(78, '2024_10_22_083620_update_in_to_purchaseitems', 76),
(79, '2024_10_22_102403_update_in_to_purchaseitems', 77),
(80, '2024_10_22_112322_update_in_to_purchaseitems', 77),
(81, '2024_10_22_142422_update_in_to_items', 78),
(82, '2024_10_22_144341_update_in_to_items', 79),
(83, '2024_10_22_175500_update_in_to_purchase', 80),
(84, '2024_10_22_191510_update_in_to_purchaseitems', 81),
(85, '2024_10_23_125131_update_in_to_sales', 82),
(86, '2024_10_23_125249_update_in_to_salesitems', 83),
(87, '2024_10_23_153811_update_in_to_purchaseitems', 83),
(88, '2024_10_24_044028_update_in_to_sales_items', 83),
(89, '2024_10_24_061908_update_in_to_sales', 84),
(90, '2024_10_24_063029_update_in_to_salesitems', 85),
(91, '2024_10_24_134915_update_in_to_country_settings', 86),
(92, '2024_10_24_140052_update_in_to_country_settings', 87),
(93, '2024_10_24_144949_update_in_to_country_settings', 88),
(94, '2024_10_24_184611_update_in_to_country_supplier', 89),
(95, '2024_10_24_192631_update_in_to_country_account', 90),
(96, '2024_10_25_062835_update_in_to_items', 91),
(97, '2024_10_26_100537_template', 92),
(98, '2024_10_27_062506_update_in_to_salesitems', 93),
(99, '2024_10_27_072107_update_in_to_purchaseitems', 94),
(100, '2024_10_27_132521_update_in_to_site_config', 95),
(101, '2024_10_27_145745_update_in_to_site_users', 96),
(102, '2024_10_27_150435_update_in_to_site_users', 97),
(103, '2024_10_27_172927_update_in_to_warehouse', 98),
(104, '2024_10_27_180610_update_in_to_account', 99),
(105, '2024_10_27_180901_update_in_to_account', 100),
(106, '2024_10_27_180952_update_in_to_account', 101),
(107, '2024_10_27_182137_update_in_to_account', 102),
(108, '2024_10_27_182319_update_in_to_warehouse', 103),
(109, '2024_10_27_182506_update_in_to_warehouse', 104),
(110, '2024_10_27_183100_rename_column_in_account', 105),
(111, '2024_10_27_183519_rename_column_in_account', 106),
(112, '2024_10_27_193849_rename_column_in_sales', 106),
(113, '2024_10_27_203726_rename_column_in_purchase', 107),
(114, '2024_10_27_210004_warehouse_items', 108),
(115, '2024_10_28_045721_rename_column_in_purchase', 109),
(116, '2019_12_14_000001_create_personal_access_tokens_table', 110),
(117, '2024_10_29_071437_update_in_to_customer', 110),
(118, '2024_10_29_074224_update_in_to_customer', 111),
(119, '2024_10_29_081529_update_in_to_supplier', 112),
(120, '2024_10_29_135615_update_in_to_customer', 113),
(121, '2024_10_30_085542_update_in_to_items', 114),
(122, '2024_10_30_184754_salespayment', 115),
(123, '2024_10_31_053942_update_in_to_store', 116),
(124, '2024_10_31_064450_update_in_to_sales', 117),
(125, '2024_10_31_081358_update_in_to_salesitems', 118),
(126, '2024_10_31_173803_update_in_to_sales_items', 119),
(127, '2024_11_01_045819_ledger', 120),
(128, '2024_11_01_200043_update_in_sale', 121),
(129, '2024_11_02_063924_update_in_saleitems', 122),
(130, '2024_11_03_041846_update_in_items', 123),
(131, '2024_11_03_043112_update_in_saleitems', 124),
(132, '2024_11_04_184048_update_in_saleitems', 125),
(133, '2024_11_05_065826_update_in_users', 126),
(134, '2024_11_05_125155_purcchase_payment', 127),
(135, '2024_11_05_134126_update_in_purchase_payment', 128),
(136, '2024_11_06_134341_create_sessions_table', 129),
(137, '2024_11_06_162343_update_in_advance', 130),
(138, '2024_11_07_081322_update_in_expenses', 131),
(139, '2024_11_07_082524_update_in_expenses', 132),
(140, '2024_11_07_092733_update_in_expense_category', 133),
(141, '2024_11_07_092906_update_in_expense_category', 134),
(142, '2024_11_10_040701_update_in_offsale_items', 135),
(143, '2024_11_10_065438_update_in_second_store', 136),
(144, '2024_11_10_070553_update_in_second_store', 137),
(145, '2024_11_10_070629_update_in_store', 138),
(146, '2024_11_10_073447_update_in_second_store', 139),
(147, '2024_11_10_080918_update_in_second_warehouse', 140),
(148, '2024_11_10_093131_update_in_items', 141),
(149, '2024_11_10_110925_update_in_purchase', 142),
(150, '2024_11_10_163707_update_in_second_warehouse_items', 143),
(151, '2024_11_11_142233_update_in_purchase', 144),
(152, '2024_11_12_061600_update_in_to_purchaseitems', 145),
(153, '2024_11_14_042918_update_in_sales', 146),
(154, '2024_11_14_100528_update_in_topurchase', 147),
(155, '2024_11_14_113955_update_in_purchase', 148),
(156, '2024_11_16_080107_update_in_sale', 149),
(157, '2024_11_16_080757_update_in_saleitems', 149),
(158, '2024_11_16_103032_update_in_ledger', 149),
(159, '2024_11_16_125500_update_in_customer', 150),
(160, '2024_11_17_063547_update_in_sales_items', 151),
(161, '2024_11_17_063806_update_in_sales_items', 152),
(162, '2024_11_17_145759_update__in_purchasereturn', 153),
(163, '2024_11_17_150143_update__in_purchase_return_items', 154),
(164, '2024_11_17_163803_update__in_sales_return', 155),
(165, '2024_11_17_163910_update__in_sales_return_items', 156),
(166, '2024_11_17_171450_update__in_sales_return', 157),
(167, '2024_11_17_171600_update__in_sales_return', 158),
(168, '2024_11_17_172124_update__in_sales_return', 159),
(169, '2024_11_18_082859_update_in_sales_return_items', 160),
(170, '2024_11_18_103747_update_in_sales_return', 161),
(171, '2024_11_19_061153_update_in_sales_items_extimate', 162),
(172, '2024_11_19_061224_update_in_sale_extimate', 162),
(173, '2024_11_19_090513_update_in_purchase_order', 163),
(174, '2024_11_19_090802_update_in_purchaseitems_order', 164),
(175, '2024_11_19_130436_update_in_purchase_order_sales_items', 165),
(176, '2024_11_19_130552_update_in_purchase_order_sale', 166),
(177, '2024_11_19_155704_userrole', 167),
(178, '2024_11_23_115742_reciept', 168),
(179, '2024_11_23_222242_closing', 169),
(180, '2024_11_23_222850_update_in_closing', 170),
(181, '2024_11_24_183031_update_in_purchasereturn_payments', 171),
(182, '2024_12_07_094511_subscription', 172),
(183, '2024_12_07_094846_update_in_subscription', 173),
(184, '2024_12_07_095741_update_in_subscription', 174),
(185, '2024_12_07_095955_sub_method', 175),
(186, '2024_12_14_054459_secondryunitlist', 176),
(187, '2024_12_16_094133_serial', 177);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `target_userid` int(250) NOT NULL DEFAULT 0,
  `created_by` int(250) NOT NULL DEFAULT 0,
  `title` varchar(250) DEFAULT NULL,
  `msg` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `link` text NOT NULL,
  `data` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 for show ',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `target_userid`, `created_by`, `title`, `msg`, `image`, `link`, `data`, `status`, `created_on`, `updated_on`) VALUES
(1, 13, 2, 'Your order is in status: Order Accepted', 'For your order with orderid: OD-24032024-6600535ee9723now status is : Order Accepted', NULL, '', 'order status update', 1, '2024-03-24 22:00:31', '2024-03-24 22:00:31'),
(2, 16, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(3, 13, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(4, 12, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(5, 11, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(6, 10, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(7, 9, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(8, 8, 2, 'test', 'rhysrh', '', '#', 'Push notification', 1, '2024-04-21 13:04:02', '2024-04-21 13:04:02'),
(9, 16, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(10, 13, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(11, 12, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(12, 11, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(13, 10, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(14, 9, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(15, 8, 2, 'testt', 'shsfh', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:08', '2024-04-21 13:05:08'),
(16, 16, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28'),
(17, 13, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28'),
(18, 12, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28'),
(19, 11, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28'),
(20, 10, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28'),
(21, 9, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28'),
(22, 8, 2, 'rrr', 'eerwt', '', 'javascript:void(0)', 'Push notification', 1, '2024-04-21 13:05:28', '2024-04-21 13:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `offsales_items`
--

CREATE TABLE `offsales_items` (
  `store_id` int(11) DEFAULT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `customer_id` int(150) NOT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `item_name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,4) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,4) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,4) DEFAULT NULL,
  `discount_amt` double(20,4) DEFAULT NULL,
  `unit_total_cost` double(20,4) DEFAULT NULL,
  `total_cost` double(20,4) DEFAULT NULL,
  `status` int(50) DEFAULT 0,
  `seller_points` double(20,2) DEFAULT 0.00,
  `purchase_price` double(20,3) DEFAULT 0.000,
  `unit_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `rate_inclusive_tax` varchar(255) NOT NULL,
  `show_part` varchar(255) NOT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `alt_unit` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onsignal_playerid`
--

CREATE TABLE `onsignal_playerid` (
  `id` int(11) NOT NULL,
  `store_id` int(150) NOT NULL,
  `user_id` int(250) NOT NULL,
  `playerId` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--
-- Error reading structure for table cargroup.purchase: #1932 - Table 'cargroup.purchase' doesn't exist in engine
-- Error reading data for table cargroup.purchase: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`purchase`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitems`
--
-- Error reading structure for table cargroup.purchaseitems: #1932 - Table 'cargroup.purchaseitems' doesn't exist in engine
-- Error reading data for table cargroup.purchaseitems: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`purchaseitems`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitems_order`
--

CREATE TABLE `purchaseitems_order` (
  `store_id` int(11) DEFAULT NULL,
  `purchase_id` int(5) DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `purchase_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,4) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,4) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,4) DEFAULT NULL,
  `discount_amt` double(20,4) DEFAULT NULL,
  `unit_total_cost` double(20,4) DEFAULT NULL,
  `total_cost` double(20,4) DEFAULT NULL,
  `profit_margin_per` double(20,4) DEFAULT NULL,
  `unit_sales_price` double(20,4) DEFAULT NULL,
  `if_bach` int(5) DEFAULT NULL,
  `bach_no` text DEFAULT NULL,
  `if_expirydate` int(5) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturn`
--

CREATE TABLE `purchasereturn` (
  `store_id` int(11) DEFAULT NULL,
  `count_id` int(10) DEFAULT NULL COMMENT 'Use to create Purchase Code',
  `prefix` varchar(255) DEFAULT NULL,
  `purchase_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT '	Returned',
  `supplier_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,4) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,4) DEFAULT NULL,
  `discount_to_all_input` double(20,4) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,4) DEFAULT NULL,
  `subtotal` double(20,4) DEFAULT NULL COMMENT 'Purchased qty',
  `round_off` double(20,4) DEFAULT NULL COMMENT 'Pending Qty',
  `grand_total` double(20,4) DEFAULT NULL,
  `purchase_note` text DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'Purchase return raised',
  `created_by` int(150) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bill_number` varchar(255) NOT NULL,
  `off_store_id` varchar(255) NOT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `purchase_qty` varchar(255) NOT NULL,
  `purchase_return_status` int(11) NOT NULL DEFAULT 0,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturn_payments`
--

CREATE TABLE `purchasereturn_payments` (
  `count_id` varchar(255) DEFAULT NULL,
  `payment_code` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_note` varchar(255) DEFAULT NULL,
  `change_return` varchar(255) DEFAULT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `cheque_period` varchar(255) DEFAULT NULL,
  `cheque_status` varchar(255) DEFAULT NULL,
  `advanced_adjustment` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `store_id` int(11) DEFAULT NULL,
  `count_id` int(10) DEFAULT NULL COMMENT 'Use to create Purchase Code',
  `prefix` varchar(255) DEFAULT NULL,
  `purchase_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT '	Received',
  `supplier_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,4) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,4) DEFAULT NULL,
  `discount_to_all_input` double(20,4) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,4) DEFAULT NULL,
  `subtotal` double(20,4) DEFAULT NULL COMMENT 'Purchased qty',
  `round_off` double(20,4) DEFAULT NULL COMMENT 'Pending Qty',
  `grand_total` double(20,4) DEFAULT NULL,
  `purchase_note` text DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'Purchase return raised',
  `created_by` int(150) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bill_number` varchar(255) NOT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `purchase_qty` varchar(255) NOT NULL,
  `purchase_return_status` int(11) NOT NULL DEFAULT 0,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_sale`
--

CREATE TABLE `purchase_order_sale` (
  `store_id` int(11) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `init_code` varchar(100) DEFAULT NULL,
  `count_id` decimal(20,0) DEFAULT NULL COMMENT 'Use to create Sales Code',
  `sales_type` int(11) NOT NULL COMMENT '0-b2b 1 b2c',
  `return_bill_init` int(100) NOT NULL DEFAULT 0,
  `prefix` varchar(255) DEFAULT NULL,
  `sales_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,4) DEFAULT NULL,
  `sales_note` text DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,4) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `return_bit` int(1) DEFAULT NULL COMMENT 'sales return raised',
  `customer_previous_due` double(20,2) DEFAULT NULL,
  `customer_total_due` double(20,2) DEFAULT NULL,
  `quotation_id` int(5) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  `coupon_amt` double(20,2) DEFAULT 0.00,
  `invoice_terms` text DEFAULT NULL,
  `app_order` int(5) DEFAULT NULL,
  `order_id` int(150) DEFAULT NULL,
  `tax_report` int(5) DEFAULT NULL,
  `created_by` int(150) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `total_qty` varchar(255) NOT NULL,
  `return_Sale_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_sales_items`
--

CREATE TABLE `purchase_order_sales_items` (
  `store_id` int(11) DEFAULT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `customer_id` int(150) NOT NULL,
  `sales_status` varchar(50) DEFAULT 'Recieved',
  `item_id` int(5) DEFAULT NULL,
  `item_name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,4) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,4) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,4) DEFAULT NULL,
  `discount_amt` double(20,4) DEFAULT NULL,
  `unit_total_cost` double(20,4) DEFAULT NULL,
  `total_cost` double(20,4) DEFAULT NULL,
  `status` int(5) DEFAULT 0,
  `seller_points` double(20,2) DEFAULT 0.00,
  `purchase_price` double(20,3) DEFAULT 0.000,
  `unit_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `rate_inclusive_tax` varchar(255) NOT NULL,
  `show_part` varchar(255) NOT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `alt_unit` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) NOT NULL,
  `return_qty` int(11) NOT NULL DEFAULT 0,
  `return_cost` int(11) DEFAULT 0,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

CREATE TABLE `purchase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count_id` varchar(255) DEFAULT NULL,
  `payment_code` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_note` varchar(255) DEFAULT NULL,
  `change_return` varchar(255) DEFAULT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `cheque_period` varchar(255) DEFAULT NULL,
  `cheque_status` varchar(255) DEFAULT NULL,
  `advanced_adjustment` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_payments`
--

INSERT INTO `purchase_payments` (`id`, `count_id`, `payment_code`, `store_id`, `payment_date`, `payment_type`, `payment_note`, `change_return`, `account_id`, `supplier_id`, `payment`, `short_code`, `cheque_period`, `cheque_status`, `advanced_adjustment`, `cheque_number`, `status`, `created_by`, `created_at`, `updated_at`, `purchase_id`) VALUES
(1, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:14:51', '2024-12-03 00:14:51', '1'),
(2, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:18:16', '2024-12-03 00:18:16', '1'),
(3, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:19:15', '2024-12-03 00:19:15', '1'),
(4, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:19:40', '2024-12-03 00:19:40', '1'),
(5, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:19:57', '2024-12-03 00:19:57', '1'),
(6, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:23:10', '2024-12-03 00:23:10', '1'),
(7, NULL, '/0002', '5', '2024-12-03', 'cash', 'jhdsfhsdb', NULL, '11', '7', '24000', NULL, NULL, NULL, NULL, NULL, 'Received', '8', '2024-12-03 00:33:31', '2024-12-03 00:33:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_items`
--

CREATE TABLE `purchase_return_items` (
  `store_id` int(11) DEFAULT NULL,
  `purchase_id` int(5) DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT 'Returned',
  `item_id` int(5) DEFAULT NULL,
  `purchase_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,4) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,4) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,4) DEFAULT NULL,
  `discount_amt` double(20,4) DEFAULT NULL,
  `unit_total_cost` double(20,4) DEFAULT NULL,
  `total_cost` double(20,4) DEFAULT NULL,
  `profit_margin_per` double(20,4) DEFAULT NULL,
  `unit_sales_price` double(20,4) DEFAULT NULL,
  `if_bach` int(5) DEFAULT NULL,
  `bach_no` text DEFAULT NULL,
  `if_expirydate` int(5) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `reciept_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `against_bill` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--
-- Error reading structure for table cargroup.sales: #1932 - Table 'cargroup.sales' doesn't exist in engine
-- Error reading data for table cargroup.sales: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`sales`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--
-- Error reading structure for table cargroup.sales_items: #1932 - Table 'cargroup.sales_items' doesn't exist in engine
-- Error reading data for table cargroup.sales_items: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`sales_items`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `sales_items_extimate`
--

CREATE TABLE `sales_items_extimate` (
  `store_id` int(11) DEFAULT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `customer_id` int(150) NOT NULL,
  `sales_status` varchar(50) DEFAULT 'Recieved',
  `item_id` int(5) DEFAULT NULL,
  `item_name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,4) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,4) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,4) DEFAULT NULL,
  `discount_amt` double(20,4) DEFAULT NULL,
  `unit_total_cost` double(20,4) DEFAULT NULL,
  `total_cost` double(20,4) DEFAULT NULL,
  `status` int(5) DEFAULT 0,
  `seller_points` double(20,2) DEFAULT 0.00,
  `purchase_price` double(20,3) DEFAULT 0.000,
  `unit_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `rate_inclusive_tax` varchar(255) NOT NULL,
  `show_part` varchar(255) NOT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `alt_unit` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) NOT NULL,
  `return_qty` int(11) NOT NULL DEFAULT 0,
  `return_cost` int(11) DEFAULT 0,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_payments`
--
-- Error reading structure for table cargroup.sales_payments: #1932 - Table 'cargroup.sales_payments' doesn't exist in engine
-- Error reading data for table cargroup.sales_payments: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `cargroup`.`sales_payments`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `store_id` int(11) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `init_code` varchar(100) DEFAULT NULL,
  `count_id` decimal(20,0) DEFAULT NULL COMMENT 'Use to create Sales Code',
  `return_bill_init` int(100) NOT NULL DEFAULT 0,
  `prefix` varchar(255) DEFAULT NULL,
  `sales_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT 'Recieved',
  `customer_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,4) DEFAULT NULL,
  `sales_note` text DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,4) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `return_bit` int(1) DEFAULT NULL COMMENT 'sales return raised',
  `customer_previous_due` double(20,2) DEFAULT NULL,
  `customer_total_due` double(20,2) DEFAULT NULL,
  `quotation_id` int(5) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  `coupon_amt` double(20,2) DEFAULT 0.00,
  `invoice_terms` text DEFAULT NULL,
  `app_order` int(5) DEFAULT NULL,
  `order_id` int(150) DEFAULT NULL,
  `tax_report` int(5) DEFAULT NULL,
  `created_by` int(150) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `total_qty` varchar(255) NOT NULL,
  `return_sale_code` varchar(255) DEFAULT NULL,
  `sale_prefix` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_type` varchar(255) NOT NULL,
  `sale_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`store_id`, `warehouse_id`, `init_code`, `count_id`, `return_bill_init`, `prefix`, `sales_code`, `reference_no`, `sales_date`, `due_date`, `sales_status`, `customer_id`, `other_charges_input`, `other_charges_tax_id`, `other_charges_amt`, `discount_to_all_input`, `discount_to_all_type`, `tot_discount_to_all_amt`, `subtotal`, `round_off`, `grand_total`, `sales_note`, `payment_status`, `paid_amount`, `company_id`, `pos`, `return_bit`, `customer_previous_due`, `customer_total_due`, `quotation_id`, `coupon_id`, `coupon_amt`, `invoice_terms`, `app_order`, `order_id`, `tax_report`, `created_by`, `created_on`, `status`, `created_at`, `updated_at`, `mrp`, `total_qty`, `return_sale_code`, `sale_prefix`, `id`, `sales_type`, `sale_id`) VALUES
(5, NULL, NULL, '1', 0, 'SRB2024-25', '0009', NULL, '2024-12-16', NULL, 'Recieved', 6, NULL, NULL, 0.00, NULL, NULL, 0.00, 847.46, NULL, -694.9150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 1, 28, '2024-12-16 00:00:00', NULL, '2024-12-15 22:46:46', '2024-12-15 22:46:46', NULL, '2', NULL, 'QA2024-25/0002', 1, '0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_items`
--

CREATE TABLE `sales_return_items` (
  `store_id` int(11) DEFAULT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `customer_id` int(150) NOT NULL,
  `sales_status` varchar(50) DEFAULT 'Recieved',
  `item_id` int(5) DEFAULT NULL,
  `item_name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,4) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,4) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,4) DEFAULT NULL,
  `discount_amt` double(20,4) DEFAULT NULL,
  `unit_total_cost` double(20,4) DEFAULT NULL,
  `total_cost` double(20,4) DEFAULT NULL,
  `status` int(5) DEFAULT 0,
  `seller_points` double(20,2) DEFAULT 0.00,
  `purchase_price` double(20,3) DEFAULT 0.000,
  `unit_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `rate_inclusive_tax` varchar(255) NOT NULL,
  `show_part` varchar(255) NOT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `alt_unit` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) NOT NULL,
  `return_qty` int(11) NOT NULL DEFAULT 0,
  `return_cost` int(11) DEFAULT 0,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_return_items`
--

INSERT INTO `sales_return_items` (`store_id`, `sales_id`, `customer_id`, `sales_status`, `item_id`, `item_name`, `description`, `sales_qty`, `price_per_unit`, `tax_type`, `tax_id`, `tax_amt`, `discount_type`, `discount_input`, `discount_amt`, `unit_total_cost`, `total_cost`, `status`, `seller_points`, `purchase_price`, `unit_id`, `created_at`, `updated_at`, `hsn_code`, `mrp`, `rate_inclusive_tax`, `show_part`, `part_no`, `alt_unit`, `grand_total`, `return_qty`, `return_cost`, `id`) VALUES
(5, 1, 6, 'Recieved', 18, 'Oil Treatments', NULL, 1.00, 847.4576, NULL, 12, 152.5424, NULL, NULL, 200.0000, NULL, 800.0000, 0, 0.00, 0.000, '7', '2024-12-15 22:46:46', '2024-12-15 22:46:46', '27101990', '200', '1000', '1', '(Ot -511)', NULL, '-694.915', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_payments`
--

CREATE TABLE `sales_return_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count_id` varchar(255) NOT NULL,
  `payment_code` varchar(255) NOT NULL,
  `store_id` varchar(255) NOT NULL,
  `sales_id` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `payment_note` varchar(255) NOT NULL,
  `change_return` varchar(255) DEFAULT NULL,
  `account_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `advance_adjusted` varchar(255) DEFAULT NULL,
  `cheque_period` varchar(255) DEFAULT NULL,
  `cheque_status` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_extimate`
--

CREATE TABLE `sale_extimate` (
  `store_id` int(11) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `init_code` varchar(100) DEFAULT NULL,
  `count_id` decimal(20,0) DEFAULT NULL COMMENT 'Use to create Sales Code',
  `sales_type` int(11) NOT NULL COMMENT '0-b2b 1 b2c',
  `return_bill_init` int(100) NOT NULL DEFAULT 0,
  `prefix` varchar(255) DEFAULT NULL,
  `sales_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,4) DEFAULT NULL,
  `sales_note` text DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,4) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `return_bit` int(1) DEFAULT NULL COMMENT 'sales return raised',
  `customer_previous_due` double(20,2) DEFAULT NULL,
  `customer_total_due` double(20,2) DEFAULT NULL,
  `quotation_id` int(5) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  `coupon_amt` double(20,2) DEFAULT 0.00,
  `invoice_terms` text DEFAULT NULL,
  `app_order` int(5) DEFAULT NULL,
  `order_id` int(150) DEFAULT NULL,
  `tax_report` int(5) DEFAULT NULL,
  `created_by` int(150) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `total_qty` varchar(255) NOT NULL,
  `return_Sale_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secondryunit`
--

CREATE TABLE `secondryunit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `secondry_name` varchar(255) NOT NULL,
  `discription` varchar(200) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `second_store`
--

CREATE TABLE `second_store` (
  `store_code` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `store_name` varchar(150) DEFAULT NULL,
  `store_website` text DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `google_pay_no` varchar(150) DEFAULT NULL,
  `upi_id` varchar(100) DEFAULT NULL,
  `upi_code` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `vat_no` varchar(50) DEFAULT NULL,
  `pan_no` varchar(50) DEFAULT NULL,
  `bank_details` text DEFAULT NULL,
  `cid` varchar(50) DEFAULT NULL,
  `category_init` varchar(50) DEFAULT NULL,
  `item_init` varchar(50) DEFAULT NULL,
  `supplier_init` varchar(50) DEFAULT NULL,
  `inital_code` varchar(50) DEFAULT NULL,
  `purchase_init` varchar(50) DEFAULT NULL,
  `purchase_return_init` varchar(50) DEFAULT NULL,
  `customer_init` varchar(50) DEFAULT NULL,
  `sales_init` varchar(50) DEFAULT NULL,
  `sales_b2c_init` varchar(250) DEFAULT NULL,
  `sales_return_init` varchar(50) DEFAULT NULL,
  `expense_init` varchar(50) DEFAULT NULL,
  `accounts_init` varchar(50) DEFAULT NULL,
  `journal_init` varchar(50) DEFAULT NULL,
  `cust_advance_init` varchar(50) DEFAULT NULL,
  `invoice_view` varchar(10) DEFAULT NULL,
  `sms_status` varchar(10) DEFAULT NULL,
  `language_id` varchar(10) DEFAULT NULL,
  `currency_id` varchar(10) DEFAULT NULL,
  `currency_placement` varchar(10) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `date_format` varchar(20) DEFAULT NULL,
  `time_format` varchar(20) DEFAULT NULL,
  `default_sales_discount` varchar(20) DEFAULT NULL,
  `currencysymbol_id` varchar(10) DEFAULT NULL,
  `regno_key` varchar(100) DEFAULT NULL,
  `fav_icon` text DEFAULT NULL,
  `purchase_code` varchar(50) DEFAULT NULL,
  `change_return` varchar(20) DEFAULT NULL,
  `sales_invoice_format_id` varchar(50) DEFAULT NULL,
  `pos_invoice_format_id` varchar(50) DEFAULT NULL,
  `sales_invoice_footer_text` text DEFAULT NULL,
  `round_off` varchar(20) DEFAULT NULL,
  `quotation_init` varchar(50) DEFAULT NULL,
  `decimals` varchar(10) DEFAULT NULL,
  `money_transfer_init` varchar(50) DEFAULT NULL,
  `sales_payment_init` varchar(50) DEFAULT NULL,
  `sales_return_payment_init` varchar(50) DEFAULT NULL,
  `purchase_payment_init` varchar(50) DEFAULT NULL,
  `purchase_return_payment_init` varchar(50) DEFAULT NULL,
  `expense_payment_init` varchar(50) DEFAULT NULL,
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` varchar(100) DEFAULT NULL,
  `smtp_status` varchar(10) DEFAULT NULL,
  `sms_url` varchar(255) DEFAULT NULL,
  `mrp_column` varchar(50) DEFAULT NULL,
  `invoice_terms` text DEFAULT NULL,
  `previous_balance_bit` varchar(10) DEFAULT NULL,
  `qty_decimals` varchar(10) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `show_signature` varchar(10) DEFAULT NULL,
  `t_and_c_status` varchar(10) DEFAULT NULL,
  `t_and_c_status_pos` varchar(10) DEFAULT NULL,
  `number_to_words` text DEFAULT NULL,
  `default_account_id` varchar(50) DEFAULT NULL,
  `if_customerapp` varchar(10) DEFAULT NULL,
  `if_deliveryapp` varchar(10) DEFAULT NULL,
  `if_onesignal` varchar(10) DEFAULT NULL,
  `onesignal_id` varchar(100) DEFAULT NULL,
  `onesignal_key` varchar(100) DEFAULT NULL,
  `if_otp` varchar(10) DEFAULT NULL,
  `if_msg91` varchar(10) DEFAULT NULL,
  `msg91_apikey` varchar(100) DEFAULT NULL,
  `sms_senderid` varchar(50) DEFAULT NULL,
  `sms_dltid` varchar(50) DEFAULT NULL,
  `sms_msg` text DEFAULT NULL,
  `if_model_no` varchar(50) DEFAULT NULL,
  `if_serialno` varchar(50) DEFAULT NULL,
  `if_cod` varchar(10) DEFAULT NULL,
  `if_pickupatstore` varchar(10) DEFAULT NULL,
  `if_fixeddelivery` varchar(10) DEFAULT NULL,
  `delivery_charge` varchar(20) DEFAULT NULL,
  `if_handlingcharge` varchar(10) DEFAULT NULL,
  `handling_charge` varchar(20) DEFAULT NULL,
  `current_subscription_id` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` varchar(50) DEFAULT NULL,
  `updated_on` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_app` varchar(255) DEFAULT 'non_app',
  `app_price` varchar(255) DEFAULT NULL,
  `store_status` varchar(255) NOT NULL DEFAULT 'active',
  `sale` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `second_store`
--

INSERT INTO `second_store` (`store_code`, `user_id`, `slug`, `store_name`, `store_website`, `mobile`, `phone`, `email`, `website`, `logo`, `google_pay_no`, `upi_id`, `upi_code`, `country`, `state`, `city`, `address`, `postcode`, `gst_no`, `vat_no`, `pan_no`, `bank_details`, `cid`, `category_init`, `item_init`, `supplier_init`, `inital_code`, `purchase_init`, `purchase_return_init`, `customer_init`, `sales_init`, `sales_b2c_init`, `sales_return_init`, `expense_init`, `accounts_init`, `journal_init`, `cust_advance_init`, `invoice_view`, `sms_status`, `language_id`, `currency_id`, `currency_placement`, `timezone`, `date_format`, `time_format`, `default_sales_discount`, `currencysymbol_id`, `regno_key`, `fav_icon`, `purchase_code`, `change_return`, `sales_invoice_format_id`, `pos_invoice_format_id`, `sales_invoice_footer_text`, `round_off`, `quotation_init`, `decimals`, `money_transfer_init`, `sales_payment_init`, `sales_return_payment_init`, `purchase_payment_init`, `purchase_return_payment_init`, `expense_payment_init`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `smtp_status`, `sms_url`, `mrp_column`, `invoice_terms`, `previous_balance_bit`, `qty_decimals`, `signature`, `show_signature`, `t_and_c_status`, `t_and_c_status_pos`, `number_to_words`, `default_account_id`, `if_customerapp`, `if_deliveryapp`, `if_onesignal`, `onesignal_id`, `onesignal_key`, `if_otp`, `if_msg91`, `msg91_apikey`, `sms_senderid`, `sms_dltid`, `sms_msg`, `if_model_no`, `if_serialno`, `if_cod`, `if_pickupatstore`, `if_fixeddelivery`, `delivery_charge`, `if_handlingcharge`, `handling_charge`, `current_subscription_id`, `created_by`, `created_on`, `updated_on`, `created_at`, `updated_at`, `show_app`, `app_price`, `store_status`, `sale`, `store_id`, `id`) VALUES
('ST-0001', NULL, NULL, 'asdaf', 'sdfgsdfg', '86545sdf', NULL, 'dfgdfhfrg', 'dfhdhegh', NULL, NULL, NULL, NULL, 'efhdfhgh', 'efhgdh', 'ethdghed', 'erlgjdgjl', 'ighlfgjh', '87984654fg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 02:51:43', '2024-11-10 02:51:43', 'non_app', NULL, 'active', NULL, '5', 1),
('ST-0006', NULL, NULL, 'fghfgh', 'fghfgh', 'fghfgh', NULL, 'fghfgh', 'fhfgh', NULL, NULL, NULL, NULL, 'fghfgh', 'fghfgh', 'fghfgh', 'fghfghf', 'fghfgh', 'fghfghfgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 02:52:42', '2024-11-10 02:52:42', 'non_app', NULL, 'active', NULL, '26', 2),
('ST-0001', NULL, NULL, 'dfgdf', 'gdfgdfg', 'dfgdfg', NULL, 'fgdfg', 'fdg', NULL, NULL, NULL, NULL, 'dfgdfg', 'dfgdf', 'gdfgdf', 'gdfgdfgdfgdfg', 'dfgdf', 'gdfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:29:19', '2024-11-10 03:29:19', 'non_app', NULL, 'active', NULL, '27', 3),
('ST-0001', NULL, NULL, 'fdfgdfg', 'dfgdfg', '874545', NULL, 'dfgdfg', 'dfgdfg', NULL, NULL, NULL, NULL, 'dfgdfg', 'dfgdf', 'dfgdfg', 'ddfgdfg', '8645421', '44545dfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:30:08', '2024-11-10 03:30:08', 'non_app', NULL, 'active', NULL, '28', 4),
('ST-0001', NULL, NULL, 'sdgfg', 'dfgdfg', 'dfgdfg', NULL, 'fgdf', 'gdfgdfg', NULL, NULL, NULL, NULL, 'dfgdfgdf', 'gdfgdf', 'gdgdfg', 'dfgdfg', '54654564', '4g564fdg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:30:55', '2024-11-10 03:30:55', 'non_app', NULL, 'active', NULL, '29', 5),
('ST-0001', NULL, NULL, 'tdfsgd', 'fdfgdf', 'gdfgdfg', NULL, 'dfgdfg', 'dfgdf', NULL, NULL, NULL, NULL, 'gdfg', 'fdgdfg', 'dfgdfg', 'dfgdfgdfgdfg', 'dfgdfg', 'dfgdfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:32:08', '2024-11-10 03:32:08', 'non_app', NULL, 'active', NULL, '30', 6),
('ST-0001', NULL, NULL, 'fdgdf', 'gghfgh', '8764654545', NULL, 'dfghdfjgkjdfgb', 'ejgdfkldfgjh', NULL, NULL, NULL, NULL, 'gdfgkjk', 'kldsfjgjdf', 'jkjfgkdfgk', 'jkjkldfgkldjfgn', '8765454', '4d5f4g5dfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:33:39', '2024-11-10 03:33:39', 'non_app', NULL, 'active', NULL, '31', 7),
('ST-0001', NULL, NULL, 'dgdfg', 'fgfdg', 'fgfg', NULL, 'fg', 'fgfg', NULL, NULL, NULL, NULL, 'fggf', 'fgfg', 'gfgfg', 'fgfg', 'fgfgfg', 'fgfgfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:35:05', '2024-11-10 03:35:05', 'non_app', NULL, 'active', NULL, '32', 8),
('ST-0003', NULL, NULL, 'dsfsdf', 'dfdfgfg', '78746545', NULL, 'fdfgmndfngn', 'djkfgn,mfg,', NULL, NULL, NULL, NULL, 'fng,mvnbn', 'fkljdsfgdfkj', 'kjfgkjdfk', 'khfdklgdfjkgk\r\nfghfhjk', '865454', 'fghfg754544545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:36:51', '2024-11-10 03:36:51', 'non_app', NULL, 'active', NULL, '33', 9),
('ST-0004', NULL, NULL, 'fdgdfg', 'fgfg', '878554545', NULL, 'dfgfdhfgh', 'dfgdfgdg', NULL, NULL, NULL, NULL, 'dfghf', 'fghfgh', 'fghfghfg', 'jgifdhdfho', 'jdfjgkdfkjj', 'owlgjdfjkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:38:33', '2024-11-10 03:38:33', 'non_app', NULL, 'active', NULL, '34', 10),
('ST-0005', NULL, NULL, 'etfgdfg', 'dfgdfg', '878787', NULL, 'dfgdfhg@gm,ail.com', 'dfhghdfj', NULL, NULL, NULL, NULL, 'shdhfjsdj', 'sdkjfhj', 'hdsfjhsdj', 'dsfjsgdj', '8978765', '455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-02 22:19:07', '2024-12-02 22:19:07', 'non_app', NULL, 'active', NULL, '35', 11),
('ST-0006', NULL, NULL, 'sdfsdf', 'sdfsdf', '878454', NULL, 'sdbfjksbdj@gmail.com', 'dfasf', NULL, NULL, NULL, NULL, 'dfgvdfg', 'sdgsfdg', 'sdfgsdf', 'fdsgdsfg', '85', '585', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-02 22:20:42', '2024-12-02 22:20:42', 'non_app', NULL, 'active', NULL, '36', 12);

-- --------------------------------------------------------

--
-- Table structure for table `second_warehouse_items`
--

CREATE TABLE `second_warehouse_items` (
  `store_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `second_warehouse_items`
--

INSERT INTO `second_warehouse_items` (`store_id`, `warehouse_id`, `item_id`, `available_qty`, `created_at`, `updated_at`, `id`, `name`) VALUES
(5, 5, 21, 94, '2024-11-11 08:53:14', '2024-11-24 14:48:12', 1, ''),
(5, 5, 783, 66, '2024-11-11 22:18:19', '2024-11-11 22:18:19', 2, ''),
(5, 5, 29, 153, '2024-11-11 22:31:52', '2024-11-17 09:01:22', 3, ''),
(5, 5, 30, -102, '2024-11-11 23:36:08', '2024-11-19 06:10:28', 4, ''),
(5, 5, 28, -512, '2024-11-11 23:37:49', '2024-11-19 06:21:29', 5, ''),
(5, 5, 22, -526, '2024-11-12 00:02:02', '2024-11-19 06:15:27', 6, ''),
(5, 5, 10, 98, '2024-11-12 00:19:58', '2024-11-23 00:20:35', 7, ''),
(5, 5, 32, -404, '2024-11-12 01:04:01', '2024-11-14 02:24:07', 8, ''),
(5, 5, 31, -408, '2024-11-12 01:07:08', '2024-11-13 01:00:08', 9, ''),
(5, 5, 77, 10, '2024-11-12 01:17:08', '2024-11-12 01:40:07', 10, ''),
(5, 5, 7, -38, '2024-11-12 01:17:08', '2024-11-12 02:01:08', 11, ''),
(5, 5, 33, 4, '2024-11-12 01:30:05', '2024-11-13 05:39:34', 12, ''),
(5, 5, 1340, 4, '2024-11-13 12:34:48', '2024-11-19 06:23:56', 13, ''),
(5, 5, 19, 41, '2024-11-13 23:08:37', '2024-11-15 08:47:15', 14, ''),
(5, 5, 750, 39, '2024-11-14 05:13:22', '2024-11-22 09:54:04', 15, ''),
(5, 5, 442, 7, '2024-11-14 05:21:57', '2024-11-14 05:21:57', 16, ''),
(5, 5, 763, 6, '2024-11-14 05:21:57', '2024-11-14 05:24:26', 17, ''),
(5, 5, 168, 170, '2024-11-16 01:40:22', '2024-11-16 01:56:53', 18, ''),
(5, 5, 9, 7, '2024-11-16 07:51:32', '2024-11-16 07:51:32', 19, ''),
(5, 5, 11, 74, '2024-11-18 01:14:25', '2024-11-18 01:14:25', 20, ''),
(5, 5, 8, 20, '2024-11-18 01:14:25', '2024-11-18 01:14:25', 21, ''),
(5, 5, 275, 25, '2024-11-18 03:54:07', '2024-11-22 14:11:21', 22, ''),
(5, 5, 171, 80, '2024-11-19 02:38:37', '2024-11-19 02:38:37', 23, ''),
(5, 5, 35, 2, '2024-11-19 05:55:25', '2024-11-19 05:55:25', 24, ''),
(5, 5, 190, 25, '2024-11-23 02:22:33', '2024-11-23 02:22:33', 25, ''),
(5, 5, 17, 21, '2024-11-24 04:20:55', '2024-11-25 03:52:49', 26, ''),
(5, 5, 20, 12, '2024-11-24 04:21:44', '2024-11-24 04:21:44', 27, ''),
(5, 5, 16, 9, '2024-11-24 10:01:17', '2024-11-25 03:43:43', 28, ''),
(5, 28, 22, -223, '2024-11-26 00:57:43', '2024-11-26 00:57:43', 29, ''),
(5, 28, 20, 24, '2024-11-26 02:49:55', '2024-11-26 02:49:55', 30, ''),
(5, 28, 19, 6, '2024-11-26 02:54:23', '2024-11-26 02:54:23', 31, ''),
(5, 28, 21, 14, '2024-11-26 03:23:03', '2024-11-26 03:23:03', 32, ''),
(5, 28, 17, 20, '2024-11-26 03:32:01', '2024-11-26 03:32:01', 33, ''),
(5, 28, 23, -219, '2024-11-26 04:00:48', '2024-11-28 02:01:18', 34, ''),
(5, 28, 29, 48, '2024-11-26 04:00:48', '2024-12-20 02:27:17', 35, ''),
(5, 28, 190, 16, '2024-11-26 10:30:14', '2024-12-20 02:27:36', 36, ''),
(5, 28, 25, 1, '2024-11-27 02:06:25', '2024-11-27 02:06:25', 40, ''),
(5, 28, 47, 55, '2024-11-27 06:48:10', '2024-11-27 06:48:10', 41, ''),
(5, 28, 16, -4, '2024-11-28 23:29:39', '2024-11-28 23:29:39', 42, ''),
(5, 28, 18, 33, '2024-11-29 13:59:47', '2024-11-29 13:59:47', 43, '');

-- --------------------------------------------------------

--
-- Table structure for table `serialno`
--

CREATE TABLE `serialno` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` int(200) DEFAULT NULL,
  `item_id` varchar(255) NOT NULL,
  `slno` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serialno`
--

INSERT INTO `serialno` (`id`, `token`, `item_id`, `slno`, `created_at`, `updated_at`) VALUES
(1, 1, '17', '100', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '17', '400', '2024-12-18 04:59:55', '2024-12-18 04:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `id` int(10) NOT NULL,
  `siteurl` text NOT NULL,
  `slno` int(200) DEFAULT NULL,
  `version` varchar(250) NOT NULL,
  `site_title` text NOT NULL,
  `site_description` varchar(250) NOT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_details` text DEFAULT NULL,
  `logo` varchar(250) NOT NULL,
  `min_logo` varchar(250) NOT NULL,
  `fav_icon` varchar(250) NOT NULL,
  `web_logo` varchar(250) NOT NULL,
  `app_logo` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `site_email` text NOT NULL,
  `whatsapp_no` text NOT NULL,
  `dash_notification` text DEFAULT NULL,
  `footer_copyright` text DEFAULT NULL,
  `sendgrid_API` text DEFAULT NULL,
  `if_googlemap` int(11) NOT NULL,
  `googlemap_API` text NOT NULL,
  `if_firebase` int(11) NOT NULL,
  `firebase_config` text NOT NULL,
  `firebase_API` text NOT NULL,
  `cod_status` int(10) NOT NULL COMMENT '1 to enable',
  `bank_transfer_status` int(11) NOT NULL,
  `razorpay_status` int(10) NOT NULL COMMENT '1 to enable',
  `razo_key_id` text NOT NULL,
  `razo_key_secret` text NOT NULL,
  `ccavenue_status` int(11) NOT NULL,
  `ccavenue_testmode` int(11) NOT NULL,
  `ccavenue_merchant_id` text NOT NULL,
  `ccavenue_access_code` text NOT NULL,
  `ccavenue_working_key` text NOT NULL,
  `if_onesignal` int(11) NOT NULL,
  `onesignal_id` text NOT NULL,
  `onesignal_key` text NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_port` varchar(250) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `if_msg91` int(11) NOT NULL,
  `msg91_apikey` varchar(250) NOT NULL,
  `if_textlocal` int(11) NOT NULL,
  `textlocal_apikey` varchar(250) NOT NULL,
  `if_greensms` int(11) NOT NULL,
  `greensms_apikey` varchar(250) NOT NULL,
  `sms_senderid` varchar(250) NOT NULL,
  `sms_dltid` varchar(250) NOT NULL,
  `sms_msg` text NOT NULL,
  `if_fixeddelivery` int(11) NOT NULL,
  `delivery_charge` decimal(20,2) NOT NULL,
  `if_handlingcharge` int(11) NOT NULL,
  `handling_charge` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`id`, `siteurl`, `slno`, `version`, `site_title`, `site_description`, `meta_keyword`, `meta_details`, `logo`, `min_logo`, `fav_icon`, `web_logo`, `app_logo`, `address`, `site_email`, `whatsapp_no`, `dash_notification`, `footer_copyright`, `sendgrid_API`, `if_googlemap`, `googlemap_API`, `if_firebase`, `firebase_config`, `firebase_API`, `cod_status`, `bank_transfer_status`, `razorpay_status`, `razo_key_id`, `razo_key_secret`, `ccavenue_status`, `ccavenue_testmode`, `ccavenue_merchant_id`, `ccavenue_access_code`, `ccavenue_working_key`, `if_onesignal`, `onesignal_id`, `onesignal_key`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `if_msg91`, `msg91_apikey`, `if_textlocal`, `textlocal_apikey`, `if_greensms`, `greensms_apikey`, `sms_senderid`, `sms_dltid`, `sms_msg`, `if_fixeddelivery`, `delivery_charge`, `if_handlingcharge`, `handling_charge`, `created_at`, `updated_at`) VALUES
(11, 'fghfghftg', 1, 'dfgfgf', 'dfxgdfg', 'gfgfgh', 'fghfgh', 'fghfgh', 'logo/WgYmgONrFm9ESQvkholed3YYoMJCT49CRRPVgpJg.gif', 'min_logo/vmNDZrcvls0uAvKC2xUPxesaVMmqiwGc0W1E5Etf.png', 'fav_icon/Nzj8XRvhHdMbBSM1hsHHiQYtsd9fZgBgr22bSQi9.png', 'web_logo/aKXiJj99aCL1gPKtU6E8zckx141tlqPOoHuQKhzq.jpg', 'app_logo/H7lL13YjhETXx72jy3FBWBbBgFGQUnn3UTFQhtfG.png', 'hfghfgh', 'hfghfgh', 'fghfg', NULL, NULL, NULL, 1, 'sdfgsdfgds', 1, '8874454', '465465', 1, 1, 1, 'dfgdfg', 'dfgdfgd', 1, 1, 'dfgdfg', 'dfgdfg', 'dfgdfg', 1, 'fghfghfg', 'hfghfg', 'dfgdfg', 'dfgdfg', 'cargroup@admin.com', 'Admin@143', 1, 'dfgdfg', 1, 'dfgdfg', 1, 'dfgdfgd', 'dfgdfg', 'dfgdfg', 'dfgdfgd', 1, '6565.00', 1, '849545', '2024-10-27 08:42:35', '2024-12-17 07:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_code` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `store_name` varchar(150) DEFAULT NULL,
  `store_website` text DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `google_pay_no` varchar(150) DEFAULT NULL,
  `upi_id` varchar(100) DEFAULT NULL,
  `upi_code` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `vat_no` varchar(50) DEFAULT NULL,
  `pan_no` varchar(50) DEFAULT NULL,
  `bank_details` text DEFAULT NULL,
  `cid` varchar(50) DEFAULT NULL,
  `category_init` varchar(50) DEFAULT NULL,
  `item_init` varchar(50) DEFAULT NULL,
  `supplier_init` varchar(50) DEFAULT NULL,
  `inital_code` varchar(50) DEFAULT NULL,
  `purchase_init` varchar(50) DEFAULT NULL,
  `purchase_return_init` varchar(50) DEFAULT NULL,
  `customer_init` varchar(50) DEFAULT NULL,
  `sales_init` varchar(50) DEFAULT NULL,
  `sales_b2c_init` varchar(250) DEFAULT NULL,
  `sales_return_init` varchar(50) DEFAULT NULL,
  `expense_init` varchar(50) DEFAULT NULL,
  `accounts_init` varchar(50) DEFAULT NULL,
  `journal_init` varchar(50) DEFAULT NULL,
  `cust_advance_init` varchar(50) DEFAULT NULL,
  `invoice_view` varchar(10) DEFAULT NULL,
  `sms_status` varchar(10) DEFAULT NULL,
  `language_id` varchar(10) DEFAULT NULL,
  `currency_id` varchar(10) DEFAULT NULL,
  `currency_placement` varchar(10) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `date_format` varchar(20) DEFAULT NULL,
  `time_format` varchar(20) DEFAULT NULL,
  `default_sales_discount` varchar(20) DEFAULT NULL,
  `currencysymbol_id` varchar(10) DEFAULT NULL,
  `regno_key` varchar(100) DEFAULT NULL,
  `fav_icon` text DEFAULT NULL,
  `purchase_code` varchar(50) DEFAULT NULL,
  `change_return` varchar(20) DEFAULT NULL,
  `sales_invoice_format_id` varchar(50) DEFAULT NULL,
  `pos_invoice_format_id` varchar(50) DEFAULT NULL,
  `sales_invoice_footer_text` text DEFAULT NULL,
  `round_off` varchar(20) DEFAULT NULL,
  `quotation_init` varchar(50) DEFAULT NULL,
  `decimals` varchar(10) DEFAULT NULL,
  `money_transfer_init` varchar(50) DEFAULT NULL,
  `sales_payment_init` varchar(50) DEFAULT NULL,
  `sales_return_payment_init` varchar(50) DEFAULT NULL,
  `purchase_payment_init` varchar(50) DEFAULT NULL,
  `purchase_return_payment_init` varchar(50) DEFAULT NULL,
  `expense_payment_init` varchar(50) DEFAULT NULL,
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` varchar(100) DEFAULT NULL,
  `smtp_status` varchar(10) DEFAULT NULL,
  `sms_url` varchar(255) DEFAULT NULL,
  `mrp_column` varchar(50) DEFAULT NULL,
  `invoice_terms` text DEFAULT NULL,
  `previous_balance_bit` varchar(10) DEFAULT NULL,
  `qty_decimals` varchar(10) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `show_signature` varchar(10) DEFAULT NULL,
  `t_and_c_status` varchar(10) DEFAULT NULL,
  `t_and_c_status_pos` varchar(10) DEFAULT NULL,
  `number_to_words` text DEFAULT NULL,
  `default_account_id` varchar(50) DEFAULT NULL,
  `if_customerapp` varchar(10) DEFAULT NULL,
  `if_deliveryapp` varchar(10) DEFAULT NULL,
  `if_onesignal` varchar(10) DEFAULT NULL,
  `onesignal_id` varchar(100) DEFAULT NULL,
  `onesignal_key` varchar(100) DEFAULT NULL,
  `if_otp` varchar(10) DEFAULT NULL,
  `if_msg91` varchar(10) DEFAULT NULL,
  `msg91_apikey` varchar(100) DEFAULT NULL,
  `sms_senderid` varchar(50) DEFAULT NULL,
  `sms_dltid` varchar(50) DEFAULT NULL,
  `sms_msg` text DEFAULT NULL,
  `if_model_no` varchar(50) DEFAULT NULL,
  `if_serialno` varchar(50) DEFAULT NULL,
  `if_cod` varchar(10) DEFAULT NULL,
  `if_pickupatstore` varchar(10) DEFAULT NULL,
  `if_fixeddelivery` varchar(10) DEFAULT NULL,
  `delivery_charge` varchar(20) DEFAULT NULL,
  `if_handlingcharge` varchar(10) DEFAULT NULL,
  `handling_charge` varchar(20) DEFAULT NULL,
  `current_subscription_id` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` varchar(50) DEFAULT NULL,
  `updated_on` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_app` varchar(255) DEFAULT 'non_app',
  `app_price` varchar(255) DEFAULT NULL,
  `store_status` varchar(255) NOT NULL DEFAULT 'active',
  `sale` varchar(255) DEFAULT NULL,
  `second_store_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `store_code`, `user_id`, `slug`, `store_name`, `store_website`, `mobile`, `phone`, `email`, `website`, `logo`, `google_pay_no`, `upi_id`, `upi_code`, `country`, `state`, `city`, `address`, `postcode`, `gst_no`, `vat_no`, `pan_no`, `bank_details`, `cid`, `category_init`, `item_init`, `supplier_init`, `inital_code`, `purchase_init`, `purchase_return_init`, `customer_init`, `sales_init`, `sales_b2c_init`, `sales_return_init`, `expense_init`, `accounts_init`, `journal_init`, `cust_advance_init`, `invoice_view`, `sms_status`, `language_id`, `currency_id`, `currency_placement`, `timezone`, `date_format`, `time_format`, `default_sales_discount`, `currencysymbol_id`, `regno_key`, `fav_icon`, `purchase_code`, `change_return`, `sales_invoice_format_id`, `pos_invoice_format_id`, `sales_invoice_footer_text`, `round_off`, `quotation_init`, `decimals`, `money_transfer_init`, `sales_payment_init`, `sales_return_payment_init`, `purchase_payment_init`, `purchase_return_payment_init`, `expense_payment_init`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `smtp_status`, `sms_url`, `mrp_column`, `invoice_terms`, `previous_balance_bit`, `qty_decimals`, `signature`, `show_signature`, `t_and_c_status`, `t_and_c_status_pos`, `number_to_words`, `default_account_id`, `if_customerapp`, `if_deliveryapp`, `if_onesignal`, `onesignal_id`, `onesignal_key`, `if_otp`, `if_msg91`, `msg91_apikey`, `sms_senderid`, `sms_dltid`, `sms_msg`, `if_model_no`, `if_serialno`, `if_cod`, `if_pickupatstore`, `if_fixeddelivery`, `delivery_charge`, `if_handlingcharge`, `handling_charge`, `current_subscription_id`, `created_by`, `created_on`, `updated_on`, `created_at`, `updated_at`, `show_app`, `app_price`, `store_status`, `sale`, `second_store_id`) VALUES
(2, 'ST-0002', '1', NULL, 'CAR AUTOMOBILES TVM', 'website', '9388291669,9847543857', NULL, 'cargroup@gmail.com', 'nil', NULL, NULL, NULL, NULL, 'india', 'kerala', 'tvm', 'CAR AUTOMOBILES TVM\r\nTC NO. 81/29968-4\r\nW & C HOSPITAL ROAD\r\nTHYCADU\r\nTRIVANDRUM -695014\r\nMOB. 9388291669\r\n           9847543857', '695014', '32AABFC5015E1Z9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 10:08:07', '2024-10-28 10:08:07', 'non_app', NULL, 'active', NULL, 0),
(3, 'ST-0003', '1', NULL, 'QUILON AUTO SPARES (RETAIL)', 'website', '9388664666', '656556', 'cargroup@gmail.com', 'website', 'storelogo/2jS8eUIJI7jBikC67zbfRp31Gr0VjGiHRlQ0G5H7.png', '516515', NULL, NULL, 'india', 'kerala', 'kollam', 'QUILON AUTO SPARES RETAIL\r\nK C 15/1546-134A,\r\nR & R BUILDING\r\nQ S ROAD, KOLLAM-691001\r\nMOB. 9388664666', '691001', '32AAAFQP1Z1', '454165', '65165652', 'vghghg', NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '53', NULL, '458', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'signature/dXp9hwEyfknx17BnUPPzGXa7JVLDF2o7WZ8KWk8C.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 10:09:47', '2024-11-07 04:46:02', 'non_app', NULL, 'active', NULL, 0),
(4, 'ST-0004', '1', NULL, 'MAHINDRA AUTO MART', 'website', '8714641802, 8714641815', NULL, 'Mahindraautomart.tvm@gmail.com', 'nil', NULL, NULL, NULL, NULL, 'india', 'kerala', 'tivandrum', 'MAHINDRA AUTO MART \r\nAuthorised Retailer For Mahindra & Mahindra Genuine spares \r\n\r\nTC 24/1036 (2) SN Plaza  W&C Hospital Road \r\nThycaud  Trivandrum -695014;\r\nMahindraautomart.tvm@gmail.com\r\n\r\n8714641802, 8714641815', '695014', '32ABKFM386IA1ZM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 10:11:27', '2024-10-28 10:11:27', 'non_app', NULL, 'active', NULL, 0),
(5, 'ST-0005', '1', NULL, 'QUILON AUTO SPARES  (WHOLE SALE)', 'website', '9061608128', NULL, 'cargroup@gmail.com', 'website', 'storelogo/YgYckvEWrdUu2drXDIBiPs56LgPc6BBDXW1lS0Qv.jpg', '87567655654', NULL, 'paytmqr1bk80jt47r@paytm', 'india', 'kerala', 'kollam', 'QUILON AUTO SPARES WHOLE SALE\r\nR R BUILDING\r\nQ S ROAD, KOLLAM -691001', '691001', '32AAAFQ2952P1Z1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, 'QA2024-25', 'QB2024-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'signature/qV7GbOjY5Lzw06A3r929wJVix3Nonk8ms5TTtyaL.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 10:12:57', '2024-11-25 08:26:33', 'non_app', NULL, 'active', NULL, 0),
(32, 'ST-0001', NULL, NULL, 'STORE', 'fgfdg', 'fgfg', NULL, 'sdhfhsdfg@gmail.com', 'fgfdg', NULL, NULL, NULL, NULL, 'fggf', 'fgfg', 'gfgfg', 'fgfg', 'fgfgfg', 'fgfgfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:35:05', '2024-11-24 03:53:13', 'non_app', NULL, 'active', NULL, 8),
(33, 'ST-0003', NULL, NULL, 'dsfsdf', 'dfdfgfg', '78746545', NULL, 'fdfgmndfngn', 'djkfgn,mfg,', NULL, NULL, NULL, NULL, 'fng,mvnbn', 'fkljdsfgdfkj', 'kjfgkjdfk', 'khfdklgdfjkgk\r\nfghfhjk', '865454', 'fghfg754544545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:36:51', '2024-11-10 03:36:51', 'non_app', NULL, 'active', NULL, 9),
(34, 'ST-0004', NULL, NULL, 'fdgdfg', 'fgfg', '878554545', NULL, 'dfgfdhfgh', 'dfgdfgdg', NULL, NULL, NULL, NULL, 'dfghf', 'fghfgh', 'fghfghfg', 'jgifdhdfho', 'jdfjgkdfkjj', 'owlgjdfjkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-10 03:38:33', '2024-11-10 03:38:33', 'non_app', NULL, 'active', NULL, 10),
(35, 'ST-0005', NULL, NULL, 'etfgdfg', 'dfgdfg', '878787', NULL, 'dfgdfhg@gm,ail.com', 'dfhghdfj', NULL, NULL, NULL, NULL, 'shdhfjsdj', 'sdkjfhj', 'hdsfjhsdj', 'dsfjsgdj', '8978765', '455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-02 22:19:07', '2024-12-02 22:19:07', 'non_app', NULL, 'active', NULL, NULL),
(36, 'ST-0006', NULL, NULL, 'sdfsdf', 'sdfsdf', '878454', NULL, 'sdbfjksbdj@gmail.com', 'dfasf', NULL, NULL, NULL, NULL, 'dfgvdfg', 'sdgsfdg', 'sdfgsdf', 'fdsgdsfg', '85', '585', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-02 22:20:42', '2024-12-02 22:20:42', 'non_app', NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub-method`
--

CREATE TABLE `sub-method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) NOT NULL,
  `dis` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub-method`
--

INSERT INTO `sub-method` (`id`, `method`, `dis`, `created_at`, `updated_at`) VALUES
(1, 'silver', 'silver', '2024-12-07 05:34:49', '2024-12-07 05:34:49'),
(2, 'Gold', 'Gold', '2024-12-07 05:37:29', '2024-12-07 05:37:29'),
(3, 'Diamond', 'Diamond', '2024-12-07 05:37:45', '2024-12-07 05:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `store_count` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `executive_app` int(200) DEFAULT 0,
  `dealers_app` int(200) DEFAULT 0,
  `customer_app` int(200) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `duration`, `type`, `store_count`, `rate`, `note`, `executive_app`, `dealers_app`, `customer_app`, `created_at`, `updated_at`, `sub_token`) VALUES
(1, 5, '1', 5, 1000, 'sdds', 1, NULL, NULL, '2024-12-16 00:41:48', '2024-12-16 00:41:48', '1_1'),
(2, 10, '1', 8, 1500, 'fgg', 1, 1, NULL, '2024-12-16 00:42:39', '2024-12-16 00:42:39', '1_2'),
(3, 20, '3', 10, 2000, 'ghgh', 1, 1, 1, '2024-12-16 00:43:08', '2024-12-16 00:43:08', '3_3');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gst` varchar(255) NOT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `sale_executive_id` int(140) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `phone` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `mobile`, `email`, `gst`, `tax`, `balance`, `address`, `city`, `state`, `postcode`, `country`, `created_at`, `updated_at`, `supplier_id`, `sale_executive_id`, `status`, `phone`, `store_id`) VALUES
(3, 'ANABOND LIMITEd', '7854512', 'kjgfshg@gmail.com', '18AACCA4158Q1Z7', '654654564', '1', 'fdgdfgh', 'dfkjgjdfg', 'Tamil Nadu', '555', NULL, '2024-10-29 02:57:59', '2024-12-01 01:12:22', 'SP-5-0003', 0, 'active', '545454', '5'),
(5, 'ANAND AUTO AGENCIES', NULL, NULL, '33ACWPA7671H1ZB', NULL, '1208', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0005', 0, 'active', NULL, '5'),
(6, 'Anupama Traders', NULL, NULL, '32ERJPS5636E1ZM', NULL, '1936', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0006', 0, 'active', NULL, '5'),
(7, 'A ONE AUTO DISTRIBUTORS', '8794545', 'kdfhgjsd@hsdfhjds', '32AAQFA7506H1ZI', '65465231', '9866', 'wmgfbsdm', 'sgkjsg', 'Kerala', '8514841', NULL, '2024-10-29 02:57:59', '2024-11-06 09:53:55', 'SP-5-0007', 0, 'active', '875454', '5'),
(8, 'A ONE AUTO TRADERS', NULL, NULL, '32GZEPS0283L1Z1', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0008', 0, 'active', NULL, '5'),
(9, 'AQUA  ENGINEERING  SERVICES', NULL, NULL, '32AADFA5364N1ZE', NULL, '481685', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0009', 0, 'active', NULL, '5'),
(10, 'A. S. LINKS &WARES PRIVATE LIMITED', NULL, NULL, '32AAQCA8721K1ZE', NULL, '14300', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0010', 0, 'active', NULL, '5'),
(11, 'Auto Tech India', NULL, NULL, '27AAKPG5428Q1Z4', NULL, NULL, NULL, NULL, 'Maharashtra', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0011', 0, 'active', NULL, '5'),
(12, 'AV MAX LUB PVT LTD', NULL, NULL, '29AAVCA1765A1ZJ', NULL, '73927', NULL, NULL, 'Karnataka', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0012', 0, 'active', NULL, '5'),
(13, 'BANGALORE AUTO PARTS', NULL, NULL, '32AAMFB5563H1ZG', NULL, '798', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0013', 0, 'active', NULL, '5'),
(14, 'BB  ASSOCIATES', NULL, NULL, '32AANFB5053D1ZU', NULL, '1450', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0014', 0, 'active', NULL, '5'),
(15, 'BEST AUTOMOBILES MARKETING DIVISION', NULL, NULL, '32AAMPJ2445G1ZY', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0015', 0, 'active', NULL, '5'),
(16, 'Best Auto Salutions', NULL, NULL, '32AAVFB1947Q1ZS', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0016', 0, 'active', NULL, '5'),
(17, 'BEST AUTO TCR', NULL, NULL, '32AAZFB2432L1Z8', NULL, '308332', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0017', 0, 'active', NULL, '5'),
(18, 'CAR AUTOMOBILES KLM PURCHASE A/C', NULL, NULL, '32AABFC5015E1Z9', NULL, '704671', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0018', 0, 'active', NULL, '5'),
(19, 'CAR AUTOMOBILES RETAILTVM PURCHASE  A/C', NULL, NULL, '32AABFC5015E1Z9', NULL, '19320', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0019', 0, 'active', NULL, '5'),
(20, 'Car Auto Mobiles Tvm Purchase Zoomol', NULL, NULL, '32AABFC5015E1Z9', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0020', 0, 'active', NULL, '5'),
(21, 'CAR GROUP', NULL, NULL, '', NULL, '1607219', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0021', 0, 'active', NULL, '5'),
(22, 'CAR MAGIC', NULL, NULL, '32AOCPJ4358L1ZW', NULL, '800', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0022', 0, 'active', NULL, '5'),
(23, 'CEL MARKETING PVT LTD', NULL, NULL, '32AAACC9652M1ZG', NULL, '48659', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0023', 0, 'active', NULL, '5'),
(24, 'CHITTILAPPALLY TRADERS', NULL, NULL, '32AAHFC1457G1ZT', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0024', 0, 'active', NULL, '5'),
(25, 'CINAZC SALES &SERVICES PRIVATE LTD', NULL, NULL, '32AACCC5591P1ZA', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0025', 0, 'active', NULL, '5'),
(26, 'COCHIN EXPORTS PVT LTD', NULL, NULL, '32AABCC3213F1ZH', NULL, '32669', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0026', 0, 'active', NULL, '5'),
(27, 'CYBER AUTOMOBILES PVT LTD', NULL, NULL, '32AABCC8047P1ZE', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0027', 0, 'active', NULL, '5'),
(28, 'Delta Corporation', NULL, NULL, '29AMSPJ3295Q1ZV', NULL, '4200', NULL, NULL, 'Karnataka', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0028', 0, 'active', NULL, '5'),
(29, 'DIGNO VENTURES PVT LTD', NULL, NULL, '32AAHCD6462F1ZT', NULL, '956024', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0029', 0, 'active', NULL, '5'),
(30, 'DRIVE FORCE INDIA', NULL, NULL, '33AAQFD3860P1ZV', NULL, '24647', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0030', 0, 'active', NULL, '5'),
(31, 'EDISON ENGINEERING', NULL, NULL, '32BYHPM9585Q1ZE', NULL, '2', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0031', 0, 'active', NULL, '5'),
(32, 'Elofic Industries Limited', NULL, NULL, '33AAACE0425C1ZK', NULL, '12813', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0032', 0, 'active', NULL, '5'),
(33, 'Filter World Trading', NULL, NULL, '32ANVPG9163A1Z0', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0033', 0, 'active', NULL, '5'),
(34, 'GEORGE OAKES LTD', NULL, NULL, '32AAACG1659G1ZY', NULL, '283603', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0034', 0, 'active', NULL, '5'),
(35, 'GEORGE OAKES  LTD  EKM', NULL, NULL, '32AAACG1659G1ZY', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0035', 0, 'active', NULL, '5'),
(36, 'G P PETROLEUM LIMITED', NULL, NULL, '33AABCS5295B1ZL', NULL, '60232', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0036', 0, 'active', NULL, '5'),
(37, 'GP PETROLEUM  LIMITED  EKM', NULL, NULL, '32AABCS5295B1ZN', NULL, '2750082', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0037', 0, 'active', NULL, '5'),
(38, 'GP PETROLEUMS LTD -BANGLORE', NULL, NULL, '29AABCS5295B1ZA', NULL, '196303', NULL, NULL, 'Karnataka', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0038', 0, 'active', NULL, '5'),
(39, 'GP PETROLEUMS LTD MAHARASHTRA', NULL, NULL, '27AABCS5295B1ZE', NULL, '227475', NULL, NULL, 'Maharashtra', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0039', 0, 'active', NULL, '5'),
(40, 'Habitat Stationery', NULL, NULL, '32BUMPN1153Q1Z8', NULL, '1170', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0040', 0, 'active', NULL, '5'),
(41, 'Heera Trading Company', NULL, NULL, '32AAIFH6629N1Z0', NULL, '270', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0041', 0, 'active', NULL, '5'),
(42, 'HI TECH ENTERPRISES', NULL, NULL, '32DAYPS2825G1ZA', NULL, '1350', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0042', 0, 'active', NULL, '5'),
(43, 'Hi Tech Traders Kollam', NULL, NULL, '', NULL, '74220', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0043', 0, 'active', NULL, '5'),
(44, 'Ideal Auto Silencers & Spares', NULL, NULL, '32AJJPN2539H1Z9', NULL, '85227', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0044', 0, 'active', NULL, '5'),
(45, 'IMPERIAL ACCESSORIES&SPARES(I) PVT LTD', NULL, NULL, '32AACCI7790L1Z7', NULL, '545337', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0045', 0, 'active', NULL, '5'),
(46, 'India Motor Parts & Accessories Limited', NULL, NULL, '32AAACI0931P1ZO', NULL, '136710', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0046', 0, 'active', NULL, '5'),
(47, 'IT SOUQ LLP', NULL, NULL, '32AAJFI3047C1ZV', NULL, '119415', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0047', 0, 'active', NULL, '5'),
(48, 'JAI AND SONS PRIVATE LIMITED', NULL, NULL, '32AADCJ5680R1Z0', NULL, '333861', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0048', 0, 'active', NULL, '5'),
(49, 'JEESON GEORGE', NULL, NULL, '', NULL, '25000', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0049', 0, 'active', NULL, '5'),
(50, 'J K Times', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0050', 0, 'active', NULL, '5'),
(51, 'KUNNUMPURAM AGENCIES', NULL, NULL, '32ABZPC2190H1ZM', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0051', 0, 'active', NULL, '5'),
(52, 'LOGIC AUTO TRADERS', NULL, NULL, '32AADFL8652J1Z6', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0052', 0, 'active', NULL, '5'),
(53, 'MAGNA LUBES', NULL, NULL, '32ABGFM1948N1ZZ', NULL, '0.4', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0053', 0, 'active', NULL, '5'),
(54, 'M R ENTERPRISES', NULL, NULL, '32BMOPM2138J1ZY', NULL, '1601', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0054', 0, 'active', NULL, '5'),
(55, 'M R Traders, Kavanad Purchase', NULL, NULL, '32DOYPS3622M1Z7', NULL, '2573', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0055', 0, 'active', NULL, '5'),
(56, 'M-SPARES TRADING LLP', NULL, NULL, '32ABQFM1868F1Z3', NULL, '10563', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0056', 0, 'active', NULL, '5'),
(57, 'Muthodam  Mill Stores', NULL, NULL, '32AAEFM1686N1Z0', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0057', 0, 'active', NULL, '5'),
(58, 'Narayanan Manikantan Traders Pvt Ltd', NULL, NULL, '32AADCN5055A1Z2', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0058', 0, 'active', NULL, '5'),
(59, 'NARAYANAN MANIKATAN TRADERS PVT LTD (TVM', NULL, NULL, '32AADCN5055A1Z2', NULL, '1237', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0059', 0, 'active', NULL, '5'),
(60, 'NATIONAL SALES CORPORATION', NULL, NULL, '32AAGFN2440M1ZD', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0060', 0, 'active', NULL, '5'),
(61, 'NAVIN AUTO SPARES  AGENCIES', NULL, NULL, '32AMLPJ8125C1ZD', NULL, '1566', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0061', 0, 'active', NULL, '5'),
(62, 'NOBLE AUTO AGENCIES', NULL, NULL, '32ACHPA5065A1ZE', NULL, '21517', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0062', 0, 'active', NULL, '5'),
(63, 'PARCIT AUTOMOBILES PVT LTD', NULL, NULL, '29AAKCP5431H1Z6', NULL, NULL, NULL, NULL, 'Karnataka', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0063', 0, 'active', NULL, '5'),
(64, 'PHILIPS AUTO AGENCIES (INDIA) PVT LTD', NULL, NULL, '32AAHCP0888M1Z0', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0064', 0, 'active', NULL, '5'),
(65, 'Poomkudi Agencies Pvt Ltd', NULL, NULL, '32AABCP4410D1Z7', NULL, '521967', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0065', 0, 'active', NULL, '5'),
(66, 'POOMKUDY AGENCIES PVT LTD', NULL, NULL, '33AABCP4410D1Z5', NULL, '7089', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0066', 0, 'active', NULL, '5'),
(67, 'POOMKUDY AUTO SERVICE (P) LTD', NULL, NULL, '32AACCP2195C1ZU', NULL, '4781', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0067', 0, 'active', NULL, '5'),
(68, 'PSN Automobiles Pvt Ltd', NULL, NULL, '32AABCP6075A1ZW', NULL, '1271965', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0068', 0, 'active', NULL, '5'),
(69, 'QUEEN FILTER INDIA PVT LTD', NULL, NULL, '32AAACQ8124C1ZY', NULL, '4269', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0069', 0, 'active', NULL, '5'),
(70, 'Rajdhani Bearings', NULL, NULL, '07AIPPK4872R1Z8', NULL, '662', NULL, NULL, 'Delhi', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0070', 0, 'active', NULL, '5'),
(71, 'RAJ PETRO SPECIALITIES PVT LTD', NULL, NULL, '32AACCS4923P1Z4', NULL, '251233.87', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0071', 0, 'active', NULL, '5'),
(72, 'RAJPETRO SPECIALITIES PVT. LTD. (C)', NULL, NULL, '33AACCS4923P2Z1', NULL, '316770', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0072', 0, 'active', NULL, '5'),
(73, 'RAJ PETRO SPECIALITIES  PVT LTD .D&N HAVELI', NULL, NULL, '26AACCS4923P1ZX', NULL, '136875', NULL, NULL, 'Dadra & Nagar Haveli and Daman & Diu', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0073', 0, 'active', NULL, '5'),
(74, 'Sai Lubes & Spares', NULL, NULL, '32ADGFS6666R1Z8', NULL, '882', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0074', 0, 'active', NULL, '5'),
(75, 'SEVEN STAR ASSOCIATES', NULL, NULL, '32ABYFS1566J1ZL', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0075', 0, 'active', NULL, '5'),
(76, 'SHREE RAGHAVENDRA ENTERPRISES', NULL, NULL, '29DBCPM8172D1ZH', NULL, NULL, NULL, NULL, 'Karnataka', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0076', 0, 'active', NULL, '5'),
(77, 'Shree Shivani Enterprices', NULL, NULL, '', NULL, '21300', NULL, NULL, ' Not Applicable', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0077', 0, 'active', NULL, '5'),
(78, 'SIVERI VEHICLES & SERVICES LLP', NULL, NULL, '32ADZFS9155N1ZZ', NULL, '9620', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0078', 0, 'active', NULL, '5'),
(79, 'Solar Marketing & Services', NULL, NULL, '32APRPP9257J1Z5', NULL, '11421', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0079', 0, 'active', NULL, '5'),
(80, 'SPEED -A-WAY PVT LTD', NULL, NULL, '32AAHCS0229F1ZT', NULL, '29526', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0080', 0, 'active', NULL, '5'),
(81, 'SRI KRISHNA TRADERS -{2022-23)', NULL, NULL, '32ABJPN8724A1ZX', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0081', 0, 'active', NULL, '5'),
(82, 'STANES  MOTORS (SOUTH INDIA )LTD', NULL, NULL, '32AACCS7195P2ZP', NULL, '7819', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0082', 0, 'active', NULL, '5'),
(83, 'THIRUPATHI MOTORS', NULL, NULL, '27AIWPS4277P1ZW', NULL, '10183', NULL, NULL, 'Maharashtra', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0083', 0, 'active', NULL, '5'),
(84, 'Topform -Enterprises', NULL, NULL, '32AAGFT9752J1ZS', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0084', 0, 'active', NULL, '5'),
(85, 'Travancore Glass House', NULL, NULL, '32AAOFT1755D1ZA', NULL, '48601', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0085', 0, 'active', NULL, '5'),
(86, 'Turbo Intertrade Company India Pvt Ltd', NULL, NULL, '32AABCT6438M1Z4', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0086', 0, 'active', NULL, '5'),
(87, 'TVS MOBILITY PVT LTD', NULL, NULL, '32AAGCT6376B1ZH', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0087', 0, 'active', NULL, '5'),
(88, 'UAW AUTO PARTS PVT. LTD', NULL, NULL, '03AAACU8687Q1ZI', NULL, NULL, NULL, NULL, 'Punjab', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0088', 0, 'active', NULL, '5'),
(89, 'UNIVERSAL NON MEDICAL DISTRIBUTION AGENCY', NULL, NULL, '32AKKPR4379P1ZB', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0089', 0, 'active', NULL, '5'),
(90, 'VALAPPILA AGENCIES', NULL, NULL, '32AEXPJ9994D1ZT', NULL, '5998', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0090', 0, 'active', NULL, '5'),
(91, 'VISAL TRIBOTECH PVT LTD', NULL, NULL, '29AACCV0719L1Z2', NULL, '60065.15', NULL, NULL, 'Karnataka', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0091', 0, 'active', NULL, '5'),
(92, 'V STYLE PRODUCTS', NULL, NULL, '32AJVPR8082K1ZC', NULL, '32.45', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0092', 0, 'active', NULL, '5'),
(93, 'CAR AUTOMOBILES KOLLAM  OFFICIAL', NULL, NULL, '32AABFC5015E1Z9', NULL, '395169', NULL, NULL, 'Kerala', NULL, NULL, '2024-10-29 02:57:59', '2024-10-29 02:57:59', 'SP-5-0093', 0, 'active', NULL, '5'),
(94, 'sfgsdgdfg', '87854754', 'gfdgh@gmail.com', '8798445', '87984654', '7852', 'sdlfhjksdfk', 'sjdbgb', 'sgkjgf', '8945614', '2', '2024-11-06 09:28:40', '2024-11-06 09:28:40', 'SP-1-0001', 0, 'active', '8746541654', '5'),
(95, 'ghfgh', '564564', 'fghjgfh@g.com', '4546', '6554', '654', 'fgjghj', 'ghjghj', 'ghjfh', '452456', '2', '2024-11-06 09:29:37', '2024-11-06 09:29:37', 'SP-1-0001', 0, 'active', '846545', '5'),
(96, 'gdfh', '879854154', 'dfhfdg@hg.com', '87574', '4545', '45456', 'ghafdg', 'fyugfhu', 'dfgdfgd', '75458', '3', '2024-11-06 09:30:28', '2024-11-06 09:30:28', 'SP-1-0001', 0, 'active', '98456151', '5'),
(97, 'uyhetyhj', '654541321', 'sgfmgfdn@gmail.com', '654651423', '94865456', '6545', 'sdjgfhsdkjf', 'dkjfjk', 'kjdshfg', '654564', '3', '2024-11-06 09:31:36', '2024-11-06 09:31:36', 'SP-1-0001', 0, 'active', '8456125', '5'),
(98, 'AASTHA AUTOMOBILES', NULL, NULL, '07AEUPG6587N1ZG', NULL, '1652', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(99, 'ABDHUL RAHMAN', NULL, NULL, '32BHLPR8951G1ZX', NULL, '6654', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(100, 'ABLE AUTO AGENCIES', NULL, NULL, '32AAIFA6518R1Z3', NULL, '319540.56', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(101, 'ABLE AUTO AGENCY CASH BILL', NULL, NULL, '32AAIFA6518R1Z3', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(102, 'ABLE AUTOMOBILES ( P ) LTD', NULL, NULL, '32AABCA9784H1ZJ', NULL, '26688', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(103, 'AKHIL STAFF TVM', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(104, 'ALDRINTHAMPAN TRANSPORTS', NULL, NULL, '32AOPPT1707C1Z5', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(105, 'A.M AUTOMOBILES', NULL, NULL, '07ALXPK4031D1Z4', NULL, '118026', NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(106, 'AMS AUTO PARTS', NULL, NULL, '32GJGPS6352J3ZR', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(107, 'AMVEE ALLIED AGENCIES', NULL, NULL, '07AAIPM0404A1ZH', NULL, '21407', NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(108, 'ANITHYA SPARE PARTS', NULL, NULL, '32AVVPV8834H1ZR', NULL, '3268', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(109, 'ARIHANT AUTOMOBILES', NULL, NULL, '33AASFA6472E1ZD', NULL, NULL, NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(110, 'ASPIRE AUTO DISTRIBUTERS', NULL, NULL, '32ABSFA5516E1ZM', NULL, '128823', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(111, 'ASWATHY AUTOMOBILES', NULL, NULL, '32DTOPS3366F1ZD', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(112, 'AUTO HOUSE', NULL, NULL, '32AATFA0010F1Z6', NULL, '206589', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(113, 'AUTOONE AGENCIES', NULL, NULL, '32ABOFA7385B1ZH', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(114, 'AUTO TECH INDIA', NULL, NULL, '27AAKPG5428Q1Z4', NULL, '184278', NULL, NULL, 'Maharashtra', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(115, 'BAAS AUTO TRADERS', NULL, NULL, '33AAKFB5700E1ZZ', NULL, NULL, NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(116, 'BAIJU', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(117, 'Bake House', NULL, NULL, '32AAFFB2173C1Z5', NULL, '1280', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(118, 'BANGALORE AUTO PARTS', NULL, NULL, '32AAMFB5563H1ZG', NULL, '1131889', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(119, 'BB ASSOCIATES', NULL, NULL, '32AANFB5053D1ZU', NULL, '45635', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(120, 'BEST AUTO AGENCY', NULL, NULL, '32AIPPJ7989L1ZC', NULL, '1019', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(121, 'BEST AUTOMOBILES MARKETING DIVISION', NULL, NULL, '32AAMPJ2445G1ZY', NULL, '369042', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(122, 'BEST AUTO TCR', NULL, NULL, '32AAZFB2432L1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(123, 'B J AUTOMOBILES', NULL, NULL, '32APBPJ2597R1ZE', NULL, '161193.01', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(124, 'Boss Automobiles', NULL, NULL, '32AMOPM9734H1ZO', NULL, '40040', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(125, 'CALICUT ENGINE SPARES', NULL, NULL, '32AAMFC9920H1ZE', NULL, '85033', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(126, 'CAR AUTOMOBILES', NULL, NULL, '32AABFC5015E1Z9', NULL, '95765', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(127, 'CARLTON TRADING CO', NULL, NULL, '32BOSPA4350J1Z0', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(128, 'CEL MARKETING PVT LTD COCHIN', NULL, NULL, '32AAACC9652M1ZG', NULL, '283039', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(129, 'CEL MARKETING PVT LTD TVM', NULL, NULL, '32AAACC9652M1ZG', NULL, '728113.35', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(130, 'Celtech Mechatronix Inc', NULL, NULL, '32ASSPS8850N1ZQ', NULL, '1030', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(131, 'CHEEMA TVS INDUSTRIAL VENTURES PVT. LTD', NULL, NULL, '32AAJCP8045N1ZZ', NULL, '2299', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(132, 'CHENNALLOOR  FASHION HOMES', NULL, NULL, '32AIWPM3837D1Z4', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(133, 'COCHIN EXPORTS PVT LTD', NULL, NULL, '32AABCC3213F1ZH', NULL, '776628', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(134, 'COOLWAY', NULL, NULL, '32BGDPD8051Q1Z9', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(135, 'DEEDI MOTORS PVT LTD', NULL, NULL, '32AACCD6640C1Z8', NULL, '269298', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(136, 'DHANAM AUTO STORES', NULL, NULL, '33AAEFD2694M1Z7', NULL, '747263.2', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(137, 'DINESH KUMAR', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(138, 'DORTODOR SOLUTIONS PRIVATE LIMITED', NULL, NULL, '32AAHCD9749F1ZH', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(139, 'DRIVE FORCE INDIA', NULL, NULL, '33AAQFD3860P1ZV', NULL, '1310', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(140, 'EKK INFRASTRUCTURE LIMITED', NULL, NULL, '32AADCE9286E1ZM', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(141, 'ELECTRO MECH', NULL, NULL, '32DKTPP3375P1Z7', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(142, 'ELITE AUTOMOBILES', NULL, NULL, '32AAAFE6128K1ZN', NULL, '12001.38', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(143, 'ESSAR STEELS', NULL, NULL, '32AMEPJ4542J1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(144, 'EXPO AGENCIES', NULL, NULL, '32AAEFE8676Q1ZQ', NULL, '10752', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(145, 'EXPO MOTOR CYCLE SPARES', NULL, NULL, '32DNSPS3902R1Z6', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(146, 'FOCUZ AUTO AGENCIES', NULL, NULL, '32AAACB9529J1ZN', NULL, '84808', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(147, 'FOCUZ AUTO PARTS', NULL, NULL, '32AAHFF0219R1ZD', NULL, '232709', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(148, 'FOCUZ PARTS MART LIMITED  (KOLLAM )', NULL, NULL, '32AACCF6985E1ZM', NULL, '9729', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(149, 'FRIENDS AUTOMOBILES', NULL, NULL, '32AAAFF2389R1Z1', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(150, 'GANESH REFRIGERATION INDUSTRIES', NULL, NULL, '32AJSPS8128G1ZS', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(151, 'GENUINE  SPARES CALICUT', NULL, NULL, '32DEBPS5080E1ZO', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(152, 'GEORGE OAKES LTD EKM', NULL, NULL, '32AAACG1659G1ZY', NULL, '246265', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(153, 'GEORGE  OAKES LTD  THIRUVANTHAPURAM', NULL, NULL, '32AAACG1659G1ZY', NULL, '647222.6', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(154, 'GG TRADING ENTERPRISE', NULL, NULL, '32AAHCG5930B1Z3', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(155, 'GOLDEN MOTORS', NULL, NULL, '32AAWFG3909L1ZY', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(156, 'GPARTS TRADING', NULL, NULL, '32AAUFG9835B1Z8', NULL, '78639', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(157, 'GREENS AUTO AGENCY', NULL, NULL, '32ALAPB5223F1ZZ', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(158, 'H D F C ERGO', NULL, NULL, '32AABCL5045N1ZH', NULL, '5490', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(159, 'HEX AUTO GROUP', NULL, NULL, '32AAGFH1424D1Z4', NULL, '31989', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(160, 'HINDUSTAN  AUTO DISTRIBUTERS KTYM', NULL, NULL, '32AAMFH7199D1Z6', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(161, 'HI TECH', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(162, 'HI -TECH AUTO BODY PARTS', NULL, NULL, '32AADFH7654Q1ZW', NULL, '164764', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(163, 'HOCO AUTOMOTIVE PRIVATE LTD', NULL, NULL, '32AAGCH4516B1Z7', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(164, 'IMPERIAL ACCESSORIES & SPARES (I) PVT LTD', NULL, NULL, '32AACCI7790L1Z7', NULL, '2595794.52', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(165, 'INDEX AUTO AGENCIES', NULL, NULL, '32AADFI4342Q1Z8', NULL, '21164', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(166, 'INDIA MOTOR PARTS & ACCESSORIES  LTD', NULL, NULL, '32AAACI0931P1ZO', NULL, '620197', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(167, 'JAI AND SONS PRIVATE LIMITED', NULL, NULL, '32AADCJ5680R1Z0', NULL, '191409.9', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(168, 'Jaya Agencies', NULL, NULL, '32AIUPS1214N1ZW', NULL, '2800', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(169, 'J.S  AGENCIES', NULL, NULL, '32AAIFJ1205C1Z7', NULL, '39511', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(170, 'JULLUNDER MOTOR AGENCY(DELHI)LTD', NULL, NULL, '32AAACJ2490G1ZW', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(171, 'KAKKASSERY AUTO AGENCIES', NULL, NULL, '32AAFFK3255N1Z8', NULL, '6300', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(172, 'KAKKASSERY AUTO MARKETING  DIVISION', NULL, NULL, '32AALFK3447Q1ZU', NULL, '1237660.86', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(173, 'Kaleekkasseril Motors Pvt Ltd', NULL, NULL, '32AAHCK1001D1ZH', NULL, '44332', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(174, 'KEERTI INDANE SERVICES', NULL, NULL, '32AGLPR3021M1ZC', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(175, 'KERALA WEATHER COVERS', NULL, NULL, '32AIFPK4391P1ZV', NULL, '30600', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(176, 'KL 02 AF 1962', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(177, 'KM AUTOMOTIVE', NULL, NULL, '32HBPPM6114N1Z6', NULL, '7712', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(178, 'KRISHIV AUTOMOTIVE', NULL, NULL, '07AAIFK8781A1Z8', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(179, 'KRISHNA AUTO AGENCIES', NULL, NULL, '07AAOPG7592D1ZG', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(180, 'KVR PRESTIGE CARS PRIVATE LTD', NULL, NULL, '32AAFCK1126M2ZP', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(181, 'LOGIC AUTO TRADERS CALICUT', NULL, NULL, '32AADFL8652J1Z6', NULL, '11752', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(182, 'LOGIC AUTO TRADERS Cochin', NULL, NULL, '32AADFL8652J1Z6', NULL, '140755', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(183, 'MADHAV AUTO AGENCIES,PALAKKAD', NULL, NULL, '32HKXPS7842Q1ZQ', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(184, 'MADRAS AUTO SERVICE  -DIVISION', NULL, NULL, '32AABCT0159K1ZI', NULL, '146220', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(185, 'MADRAS AUTO SERVICE NEW', NULL, NULL, '32AAGCT5084N1ZX', NULL, '1970', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(186, 'MAGMA-HDI GENERAL INSURANCE CO LTD', NULL, NULL, '32AAGCM1685C1ZS', NULL, '6275', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(187, 'MAHINDRA AUTO AGENCIES', NULL, NULL, '32ABKFM0943K1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(188, 'MAHINDRA AUTO DISTRIBUTORS', NULL, NULL, '32AAVFM1532G1ZD', NULL, '115063', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(189, 'MAJESTIC AUTO TRADERS', NULL, NULL, '32BWQPS5041A1ZP', NULL, '5860', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(190, 'MAN AUTO AGENCY', NULL, NULL, '32ABSFM9301K1ZY', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(191, 'MANIKANTAN AUTOMOBILES', NULL, NULL, '32ABWPC3977F1ZG', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(192, 'MAX VISION', NULL, NULL, '27AASFM3861D1Z1', NULL, '477409.88', NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(193, 'MGF MOTORS LTD', NULL, NULL, '32AABCM4247R1Z6', NULL, '2292963.03', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(194, 'MILLENNIUM AUTO DISTRIBUTORS', NULL, NULL, '32AAHFM6266B1ZK', NULL, '100719', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(195, 'MITHRAM AUTOMOTIVES LLP', NULL, NULL, '32ABMFM7199K1ZK', NULL, '2444886.38', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(196, 'M & M AUTO DISTRIBUTORS', NULL, NULL, '32ABEFM0686K1Z6', NULL, '6355', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(197, 'MS AUTO AGENCIES', NULL, NULL, '32BOBPM2562P1ZR', NULL, '121054.8', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(198, 'M S Industries', NULL, NULL, '32ACPPR8300P1Z2', NULL, '6702', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(199, 'M-SPARES TRADING LLP', NULL, NULL, '32ABQFM1868F1Z3', NULL, '94745', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(200, 'MUHAMMED PUNALUR', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(201, 'MUHAMMED SHAFI', NULL, NULL, '32FZPPS4983D1ZT', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(202, 'MY TVS PARTS MART PVT LTD', NULL, NULL, '32AACCF6985E1ZM', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(203, 'NARAYANAN MANIKANTAN & COMPANY', NULL, NULL, '32ABHPV8636P1ZT', NULL, '16891', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(204, 'NARAYANAN MANIKANTAN TRADERS PVT ( KOLLAM )', NULL, NULL, '32AADCN5055A1Z2', NULL, '88938', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(205, 'NARAYANAN MANIKANTAN TRADERS PVT LTD', NULL, NULL, '32AADCN5055A1Z2', NULL, '58124', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(206, 'NATIONAL INDUSTRIAL CORPORATION', NULL, NULL, '07AADFN5274A1ZK', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(207, 'NATIONAL INSURANCE COMPANY LTD', NULL, NULL, '32AAACN9967E1ZC', NULL, '133613', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(208, 'NATIONAL LUBE', NULL, NULL, '32AAJFN3466G1ZB', NULL, '5978', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(209, 'NATIONAL SALES CORPORATION', NULL, NULL, '32AAGFN2440M1ZD', NULL, '66546', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(210, 'NAVIN AUTO SPARES  AGENCIES', NULL, NULL, '32AMLPJ8125C1ZD', NULL, '172766', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(211, 'NEW BENZ AUTOMOBILES', NULL, NULL, '32AAFFN4389J1Z0', NULL, '3549', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(212, 'NEW INDIA INSURANCE CO LTD', NULL, NULL, '32AAACN4165C4ZX', NULL, '212184.6', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(213, 'NEW TECH SERVICE CENTERE', NULL, NULL, '32AAMFN4133F1ZK', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(214, 'NOBLE AUTO AGENCIES', NULL, NULL, '32ACHPA5065A1ZE', NULL, '661317', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(215, 'NOBLE MOTORS INDIA PVT LTD', NULL, NULL, '32AACCN9542R1ZW', NULL, '407087', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(216, 'OSKAR TRADING & LOGISTICS', NULL, NULL, '32BNCPA6073R1ZU', NULL, '13210', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(217, 'PADMASHREE INTERNATIONAL', NULL, NULL, '07AAQFP3781R1Z6', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(218, 'PARTZ EUROPA -EUROPEAN CAR PARTS', NULL, NULL, '32ABBFP5142Q1Z1', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:53', '2024-11-07 11:38:53', 'SP-3-0094', 0, 'active', NULL, '3'),
(219, 'PERFECT GROUP', NULL, NULL, '32BMOPP6751N1ZC', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(220, 'PETRA ASSOCIATES', NULL, NULL, '32AATFP0303L1ZA', NULL, '1346822.2', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(221, 'PHILIPS AUTO AGENCIES , (INDIA ) PVT', NULL, NULL, '32AAHCP0888M1Z0', NULL, '482847.54', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(222, 'PHOENIX AUTO DEALERS', NULL, NULL, '32AWAPV9003C1ZX', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(223, 'PNP AGENCIES', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(224, 'POOMKUDY AGENCIES PVT LTD', NULL, NULL, '32AABCP4410D1Z7', NULL, '801065.22', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(225, 'POOMKUDY AUTO SERVICE (P) LTD', NULL, NULL, '32AACCP2195C1ZU', NULL, '497008', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(226, 'POPULAR AUTO DEALERS PASSENGER WAYANADU', NULL, NULL, '32AADCP6984G1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(227, 'POPULAR AUTO DEALERS PVT LTD (COMM) KTYM', NULL, NULL, '32AADCP6984G1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(228, 'POPULAR AUTO DEALERS PVT LTD     KOCHIN', NULL, NULL, '32AADCP6984G1Z8', NULL, '430656', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(229, 'POPULAR AUTO DLRS PASSENGER CAR KKD', NULL, NULL, '32AADCP6984G1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(230, 'POPULAR AUTO DLRS PVT.LTD PASSANGER CAR EKM', NULL, NULL, '32AADCP6984G1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(231, 'POPULAR AUTO DLRS PVT LTD PASSANGR CAR TCR', NULL, NULL, '32AADCP6984G1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(232, 'POPULAR AUTO DRLS PVT LTD PASSANGR CAR TVM', NULL, NULL, '32AADCP6984G1Z8', NULL, '2145536.1', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(233, 'POPULAR MEGA MOTORS (INDIA ) PVT LTD', NULL, NULL, '32AABCP6105H1ZV', NULL, '235537', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(234, 'Pothen Motors Pvt Ltd', NULL, NULL, '32AAFCP5697Q1ZL', NULL, '6204', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(235, 'Prasanthi Cashew Pvt Ltd', NULL, NULL, '33AAFCP0575P1Z2', NULL, '8890', NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(236, 'PSM PARTS SUPERMART  PVT LTD (HY)', NULL, NULL, '32AANCP1793K1Z0', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(237, 'P T MATHEW', NULL, NULL, '32BMJPM7019M1ZR', NULL, '20360', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(238, 'PURCHASE 63.36%', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(239, 'Quilon Beach Hotel', NULL, NULL, '32AAACQ1266F2ZU', NULL, '2420', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(240, 'RAJDHANI BEARINGS', NULL, NULL, '07AIPPK4872R1Z8', NULL, '55725', NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(241, 'REGENCY PUTHOOR', NULL, NULL, '', NULL, '6330', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(242, 'REVIVE CONSTRUCTION', NULL, NULL, '32AAECR4690Q1ZT', NULL, '1980', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(243, 'SAAP ENTERPRSES', NULL, NULL, '07ADAPN7108D1ZX', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(244, 'SAHARA AUTO SPARES', NULL, NULL, '32ALVPS5496E1ZG', NULL, '23930', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(245, 'SALE 63.38%', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(246, 'SBI GENERAL INSURANCE COMPANY LTD', NULL, NULL, '32AAMCS8857L1ZL', NULL, '13700', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(247, 'SDE', NULL, NULL, '32AABCB5576G5ZQ', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(248, 'SEBIN', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(249, 'Secure Value India Ltd', NULL, NULL, '32AARCS3659P1ZI', NULL, '1950', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(250, 'SEEMATTI AUTO MOTIVE', NULL, NULL, '32ATAPM8948G1ZK', NULL, '4663', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(251, 'SENIOR AUTOMOBLIES', NULL, NULL, '32AAKFS2556F1ZA', NULL, '6393', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(252, 'SERIN AUTO PARTS', NULL, NULL, '32AFPPV6573F1ZY', NULL, '962078', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(253, 'SEVEN STAR ASSOCIATES', NULL, NULL, '32ABYFS1566J1ZL', NULL, '201323', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(254, 'SEVEN STAR AUTO AGENCY', NULL, NULL, '32ABSFS0476P1ZG', NULL, '742352', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(255, 'SEVEN STAR AUTO AGENCY 2020-21', NULL, NULL, '29ABEFS1286K1ZP', NULL, NULL, NULL, NULL, 'Karnataka', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(256, 'SHAFEEK MUHAMMAD', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(257, 'SHAILESHCO INDUSTRIES', NULL, NULL, '33AAMFS7874E1ZT', NULL, NULL, NULL, NULL, 'Tamil Nadu', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(258, 'SHIVALAYA CONSTRUCTION PVT LTD', NULL, NULL, '32AACCS2475A2ZV', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(259, 'SHIVAN PADAPPANAL', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(260, 'SHIVSAKTHI ENTERPRISES', NULL, NULL, '32ASFPS7915M1Z9', NULL, '349049', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3');
INSERT INTO `supplier` (`id`, `name`, `mobile`, `email`, `gst`, `tax`, `balance`, `address`, `city`, `state`, `postcode`, `country`, `created_at`, `updated_at`, `supplier_id`, `sale_executive_id`, `status`, `phone`, `store_id`) VALUES
(261, 'SHRI GANPATI MOTORS', NULL, NULL, '07ACTPG3617N1Z4', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(262, 'SIVERI VEHICLES & SERVICES LLP', NULL, NULL, '32ADZFS9155N1ZZ', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(263, 'Skiltech Car Care', NULL, NULL, '32ADDPN2821N1ZM', NULL, '1232', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(264, 'SKY LIGHT', NULL, NULL, '32AUZPV5548B1Z4', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(265, 'SPEED -A-WAY PRIVATE LIMITED', NULL, NULL, '32AAHCS0229F1ZT', NULL, '691777', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(266, 'SREE ASSOCIATES', NULL, NULL, '32APIPB9385G1ZU', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(267, 'S S DETAILING STUDIO', NULL, NULL, '32FWIPS6449N2ZN', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(268, 'STANDARD AUTO DISTRIBUTORS', NULL, NULL, '32ADTFS1746H1ZT', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(269, 'STANDARD AUTOMOBILES', NULL, NULL, '32ADBFS1597E1Z8', NULL, '2056', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(270, 'STANDARD AUTOMOBILES AGENCY DIVISION', NULL, NULL, '32ADBFS1597E1Z8', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(271, 'STANES  MOTORS  (SOUTH INDIA ) LIMITED', NULL, NULL, '32AACCS7195P2ZP', NULL, '13171', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(272, 'ST ANTONY\'S AUTO AGENCY', NULL, NULL, '32ABKFS3606D1ZJ', NULL, '15142', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(273, 'STAR  AUTO AGENCIES', NULL, NULL, '32ACAFS9050L1Z0', NULL, '286789', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(274, 'STATE RADIATOR AGENCIES', NULL, NULL, '32ATSPP9664N1ZL', NULL, '173863.44', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(275, 'St Marys Cashew', NULL, NULL, '32AAEPO3332K1ZW', NULL, '1180', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(276, 'SUNCO', NULL, NULL, '32ABKPV4241P1Z5', NULL, '9885', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(277, 'SUNIL', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(278, 'SUNRISE  AGENCIES', NULL, NULL, '32ABPFS5171C1Z8', NULL, '43276', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(279, 'TATA AUTO AGENCIES', NULL, NULL, '32AADFT4616J1ZA', NULL, '8396', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(280, 'TAURUS TURBO', NULL, NULL, '32AAHFT2064L1Z4', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(281, 'THE KERALA AUTOMOBILES', NULL, NULL, '32AABFT7503Q1ZY', NULL, '7542', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(282, 'THE NEW INDIA ASSURANCE COMPANY LTD', NULL, NULL, '32AAACN4165C4ZX', NULL, '122895.01', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(283, 'THENGUVILAYIL AUTOMOBILES', NULL, NULL, '32DFYPS5004C1ZF', NULL, '41828', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(284, 'THREE ROSES AUTO PARTS', NULL, NULL, '32ARNPJ1010B1ZP', NULL, '3200', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(285, 'THRIVENI AUTOMOBILES', NULL, NULL, '32BEYPB3738K1Z6', NULL, '2027', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(286, 'TIRUPATHI MOTORS', NULL, NULL, '27AIWPS4277P1ZW', NULL, '10959', NULL, NULL, 'Maharashtra', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(287, 'TRAVANCORE GLASS HOUSE', NULL, NULL, '32AAOFT1755D1ZA', NULL, '5470', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(288, 'TRIVENI AUTOMOBILES', NULL, NULL, '32BEYPB3738K1Z6', NULL, '58517', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(289, 'Trndes Autos', NULL, NULL, '32EIIPS0030L1ZC', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(290, 'TVS AUTOMOBILE SOLUTIONS PVT LTD', NULL, NULL, '32AAGCM0329K1ZO', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(291, 'TVS MOBILITY PRIVATE LIMITED', NULL, NULL, '32AAGCT6376B1ZH', NULL, '29256', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(292, 'T.V/SUNDRAM IYENGAR AND SONS PRIVATE LTD', NULL, NULL, '32AABCT0159K1ZI', NULL, '291595', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(293, 'VALAPPILA AGENCIES', NULL, NULL, '32AEXPJ9994D1ZT', NULL, '583766', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(294, 'Venad Auto Body Parts', NULL, NULL, '32AAPFV7606J1ZS', NULL, '12920', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(295, 'VISHAKH GAS AGENCY', NULL, NULL, '32ADEPP7332D1ZW', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(296, 'VISHAL AUTOMOBILES', NULL, NULL, '07ABCPG8142N1ZH', NULL, NULL, NULL, NULL, 'Delhi', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(297, 'VISION ENTERPRISES', NULL, NULL, '32AATFV9402C1Z5', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(298, 'VISWAS AGENCIES', NULL, NULL, '32AAVFV2383G1ZT', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(299, 'VLC KOLLAM', NULL, NULL, '32AAGFV8028B4ZD', NULL, NULL, NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(300, 'WOODEX', NULL, NULL, '32AFQPN0457B1ZQ', NULL, '640', NULL, NULL, 'Kerala', NULL, NULL, '2024-11-07 11:38:54', '2024-11-07 11:38:54', 'SP-3-0094', 0, 'active', NULL, '3'),
(301, 'sgffsg', '787848', 'sdfsd@gmail.com', '8654551', '96465565', '785', 'jdfgjildfgkj', 'dgikdfgk', '/.df,h./df,g.', '4655454', NULL, '2024-11-10 10:21:44', '2024-11-10 10:21:44', 'SP-1-0001', 0, 'active', '756215', '5'),
(302, 'sdfsdf', '8988984', 'sdfsd@gmail.com', '65654', '65464', '785748', 'hdfoihdsfg ihsdioguuisdg', 'jdfhkjdhf', 'sdgsg', '9875645', NULL, '2024-11-10 10:22:31', '2024-11-10 10:22:31', 'SP-1-0001', 0, 'active', '78986654', '5'),
(303, 'sdfsfsd', '623233', 'sdfsdfgsfg@gmail.com', '89545545', '955665', '8555', 'ksbfjhsdfjbsdhf', 'gjfdhgh', 'fgdfgdfg', '8798545', NULL, '2024-11-20 02:50:17', '2024-11-20 02:50:17', 'SP-1-0001', 18, 'active', '895666', '5'),
(304, 'dsfgsdgd', '8746565', 'fgdjfgjh@gmaijfgjk', '65465', '65465465', '65465', 'sdjfkjsf', 'dgj', 'fhkdfg', '7844', NULL, '2024-11-20 02:53:21', '2024-11-20 02:53:21', 'SP-5-0094', 17, 'active', '8466554', '5'),
(305, 'jkgkfdgjk', '9846546545', 'jfgkmfgjkn@gmail.com', '544545', '545645', '45454', 'ejhfodfgh', 'jkdfkl', 'sdjkfjkfg', '876575', NULL, '2024-11-20 02:54:28', '2024-11-20 02:54:28', 'SP-3-0095', 18, 'active', '64654545', '3'),
(306, 'gdfgdfg', NULL, 'sdhfhsdfg@gmail.com', '87897', '654545', '2000', 'fng,mfgb', 'df,ghjlfdgh', 'dfghkjdfh', '68654', NULL, '2024-11-20 03:37:15', '2024-11-20 03:37:15', 'SP-5-0095', 0, 'active', '6465545', '5'),
(307, 'gfdhgh', '784545', 'kjdflsdfk@gmail.com', '544545', '4545', '444', 'fgdfgjjdfjhfds', 'dfjdfgjdfgjb', 'dfgjkdfgjkl', '8765454', '3', '2024-11-30 03:53:41', '2024-11-30 03:53:41', 'SP-5-0096', NULL, 'active', '7544544', '5');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `per` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `taxname`, `status`, `per`, `created_at`, `updated_at`) VALUES
(12, 'GST 18%', 'active', '18', '2024-10-28 12:57:19', '2024-10-28 14:08:19'),
(13, 'GST 28%', 'active', '28', '2024-10-28 12:57:43', '2024-10-28 14:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_html` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `template_name`, `template_html`, `created_at`, `updated_at`) VALUES
(1, 'template 1', '\n\n	<div class=\"invoice-box\">\n		<table cellpadding=\"0\" cellspacing=\"0\">\n			<tr style=\"border: 0px !important;\">\n				<td style=\"text-align: left; width:20%; border: 0px !important;\">\n					<img src=\"https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png\"\n						>\n\n				</td>\n				<td style=\"width:80%; float: left; text-align: left; border: 0px !important;\">\n					<h2>My Company</h2>\n					Address:<br>\n					Phone:<br>\n				</td>\n			</tr>\n\n			<tr class=\"information\">\n				<td colspan=\"3\">\n					<table>\n						<tr>\n							<td colspan=\"2\">\n								<b> Bill To:</b>\n							</td>\n							<td style=\"text-align: left;\"> <b> Invoice Details </b>\n\n							</td>\n						</tr>\n						<tr>\n							<td colspan=\"2\">\n\n								Kokar, Ranchi <br>\n								+0651-908-090-009<br>\n								info@w3learnpoint.com<br>\n								www.w3learnpoint.com\n							</td>\n							<td style=\"text-align: left;\">\n								No: <b>2</b><br>\n								Date: <b>02/10/2024</b><br>\n\n							</td>\n						</tr>\n					</table>\n				</td>\n			</tr>\n\n			<td colspan=\"3\">\n				<table cellspacing=\"0px\" cellpadding=\"2px\">\n					<tr class=\"heading\">\n						<td style=\"width:25%;\">\n							ITEM\n						</td>\n						<td style=\"width:10%; text-align:center;\">\n							HSN/ SAC\n						</td>\n						<td style=\"width:10%; text-align:right;\">\n							Quantity\n						</td>\n						<td style=\"width:15%; text-align:right;\">\n							Price/Unit (INR)\n						</td>\n						<td style=\"width:15%; text-align:right;\">\n							GST (INR)\n						</td>\n						<td style=\"width:15%; text-align:right;\">\n							Amount (INR)\n						</td>\n					</tr>\n					<tr class=\"item\">\n						<td style=\"width:25%;\">\n							Johnson\'s Baby\n						</td>\n						<td style=\"width:10%; text-align:center;\">\n							8579888\n						</td>\n						<td style=\"width:10%; text-align:right;\">\n							1\n						</td>\n						<td style=\"width:15%; text-align:right;\">\n							100\n						</td>\n						<td style=\"width:15%; text-align:right;\">\n							18\n						</td>\n						<td style=\"width:15%; text-align:right;\">\n							118\n						</td>\n					</tr>\n				\n\n\n\n					<tr class=\"item\">\n						<td style=\"width:80%;\" colspan=\"4\"> Tax Summery\n\n							<div class=\"gsttable\">\n								<table style=\"border:0px !important;\">\n									<tr>\n										<td rowspan=\"2\">HSN/SAC</td>\n										<td rowspan=\"2\">Taxable amount</td>\n										<td colspan=\"2\" style=\"text-align: center;\">CGST</td>\n										<td colspan=\"2\" style=\"text-align: center;\">SGST</td>\n										<td rowspan=\"2\">Total Tax</td>\n									</tr>\n									<tr>\n\n										<td>Rate (%)</td>\n										<td>Amt (INR)</td>\n										<td>Rate (%)</td>\n										<td>Amt (INR)</td>\n\n									</tr>\n									<tr>\n										<td>854565</td>\n										<td>100</td>\n										<td>9</td>\n										<td>10</td>\n										<td>9</td>\n										<td>10</td>\n										<td style=\"text-align:right;\">20</td>\n									</tr>\n								</table>\n							</div>\n\n\n						</td>\n						<td style=\"width:20%; text-align:right; \" colspan=\"2\">\n							<div class=\"subtotalarea\">\n								<table style=\"border:0px !important;\">\n									<tr>\n										<td>Subtaotal</td>\n										<td>400</td>\n									</tr>\n									<tr>\n										<td><b>Total</b></td>\n										<td><b>400</b></td>\n									</tr>\n									<tr>\n										<td colspan=\"2\"><b>Invoice Amount in Words:</b></td>\n\n									</tr>\n									<tr>\n										<td colspan=\"2\">Four hunder only</td>\n									</tr>\n									<tr>\n										<td>Received :</td>\n										<td>400</td>\n									</tr>\n									<tr>\n										<td>Balance :</td>\n										<td>400</td>\n									</tr>\n								</table>\n							</div>\n						</td>\n\n					</tr>\n			</td>\n\n		</table>\n\n		<tr>\n			<td colspan=\"3\">\n				<table cellspacing=\"0px\" cellpadding=\"2px\">\n					<tr>\n						<td width=\"50%\">\n							<b> Terms & Conditions: </b> <br>\n							We declare that this invoice shows the actual price of the goods\n							described above and that all particulars are true and correct. The\n							goods sold are intended for end user consumption and not for resale.\n						</td>\n						<td>\n\n							<b> Authorized Signature </b>\n							<br>\n							<br>\n							<br>\n							<br>\n							<br>\n						</td>\n					</tr>\n					<tr>\n						<td width=\"100%\" colspan=\"2\">\n							* This is a computer generated invoice and does not\n							require a physical signature\n						</td>\n\n					</tr>\n				</table>\n			</td>\n		</tr>\n		</table>\n	</div>\n\n', '2024-10-26 04:55:39', '2024-10-26 04:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `timezone`
--

CREATE TABLE `timezone` (
  `id` int(5) NOT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timezone`
--

INSERT INTO `timezone` (`id`, `timezone`, `status`) VALUES
(1, 'Africa/Abidjan ', 1),
(2, 'Africa/Accra\r', 1),
(3, 'Africa/Addis_Ababa\r', 1),
(4, 'Africa/Algiers\r', 1),
(5, 'Africa/Asmara\r', 1),
(6, 'Africa/Asmera\r', 1),
(7, 'Africa/Bamako\r', 1),
(8, 'Africa/Bangui\r', 1),
(9, 'Africa/Banjul\r', 1),
(10, 'Africa/Bissau\r', 1),
(11, 'Africa/Blantyre\r', 1),
(12, 'Africa/Brazzaville\r', 1),
(13, 'Africa/Bujumbura\r', 1),
(14, 'Africa/Cairo\r', 1),
(15, 'Africa/Casablanca\r', 1),
(16, 'Africa/Ceuta\r', 1),
(17, 'Africa/Conakry\r', 1),
(18, 'Africa/Dakar\r', 1),
(19, 'Africa/Dar_es_Salaam\r', 1),
(20, 'Africa/Djibouti\r', 1),
(21, 'Africa/Douala\r', 1),
(22, 'Africa/El_Aaiun\r', 1),
(23, 'Africa/Freetown\r', 1),
(24, 'Africa/Gaborone\r', 1),
(25, 'Africa/Harare\r', 1),
(26, 'Africa/Johannesburg\r', 1),
(27, 'Africa/Juba\r', 1),
(28, 'Africa/Kampala\r', 1),
(29, 'Africa/Khartoum\r', 1),
(30, 'Africa/Kigali\r', 1),
(31, 'Africa/Kinshasa\r', 1),
(32, 'Africa/Lagos\r', 1),
(33, 'Africa/Libreville\r', 1),
(34, 'Africa/Lome\r', 1),
(35, 'Africa/Luanda\r', 1),
(36, 'Africa/Lubumbashi\r', 1),
(37, 'Africa/Lusaka\r', 1),
(38, 'Africa/Malabo\r', 1),
(39, 'Africa/Maputo\r', 1),
(40, 'Africa/Maseru\r', 1),
(41, 'Africa/Mbabane\r', 1),
(42, 'Africa/Mogadishu\r', 1),
(43, 'Africa/Monrovia\r', 1),
(44, 'Africa/Nairobi\r', 1),
(45, 'Africa/Ndjamena\r', 1),
(46, 'Africa/Niamey\r', 1),
(47, 'Africa/Nouakchott\r', 1),
(48, 'Africa/Ouagadougou\r', 1),
(49, 'Africa/Porto-Novo\r', 1),
(50, 'Africa/Sao_Tome\r', 1),
(51, 'Africa/Timbuktu\r', 1),
(52, 'Africa/Tripoli\r', 1),
(53, 'Africa/Tunis\r', 1),
(54, 'Africa/Windhoek\r', 1),
(55, 'AKST9AKDT\r', 1),
(56, 'America/Adak\r', 1),
(57, 'America/Anchorage\r', 1),
(58, 'America/Anguilla\r', 1),
(59, 'America/Antigua\r', 1),
(60, 'America/Araguaina\r', 1),
(61, 'America/Argentina/Buenos_Aires\r', 1),
(62, 'America/Argentina/Catamarca\r', 1),
(63, 'America/Argentina/ComodRivadavia\r', 1),
(64, 'America/Argentina/Cordoba\r', 1),
(65, 'America/Argentina/Jujuy\r', 1),
(66, 'America/Argentina/La_Rioja\r', 1),
(67, 'America/Argentina/Mendoza\r', 1),
(68, 'America/Argentina/Rio_Gallegos\r', 1),
(69, 'America/Argentina/Salta\r', 1),
(70, 'America/Argentina/San_Juan\r', 1),
(71, 'America/Argentina/San_Luis\r', 1),
(72, 'America/Argentina/Tucuman\r', 1),
(73, 'America/Argentina/Ushuaia\r', 1),
(74, 'America/Aruba\r', 1),
(75, 'America/Asuncion\r', 1),
(76, 'America/Atikokan\r', 1),
(77, 'America/Atka\r', 1),
(78, 'America/Bahia\r', 1),
(79, 'America/Bahia_Banderas\r', 1),
(80, 'America/Barbados\r', 1),
(81, 'America/Belem\r', 1),
(82, 'America/Belize\r', 1),
(83, 'America/Blanc-Sablon\r', 1),
(84, 'America/Boa_Vista\r', 1),
(85, 'America/Bogota\r', 1),
(86, 'America/Boise\r', 1),
(87, 'America/Buenos_Aires\r', 1),
(88, 'America/Cambridge_Bay\r', 1),
(89, 'America/Campo_Grande\r', 1),
(90, 'America/Cancun\r', 1),
(91, 'America/Caracas\r', 1),
(92, 'America/Catamarca\r', 1),
(93, 'America/Cayenne\r', 1),
(94, 'America/Cayman\r', 1),
(95, 'America/Chicago\r', 1),
(96, 'America/Chihuahua\r', 1),
(97, 'America/Coral_Harbour\r', 1),
(98, 'America/Cordoba\r', 1),
(99, 'America/Costa_Rica\r', 1),
(100, 'America/Creston\r', 1),
(101, 'America/Cuiaba\r', 1),
(102, 'America/Curacao\r', 1),
(103, 'America/Danmarkshavn\r', 1),
(104, 'America/Dawson\r', 1),
(105, 'America/Dawson_Creek\r', 1),
(106, 'America/Denver\r', 1),
(107, 'America/Detroit\r', 1),
(108, 'America/Dominica\r', 1),
(109, 'America/Edmonton\r', 1),
(110, 'America/Eirunepe\r', 1),
(111, 'America/El_Salvador\r', 1),
(112, 'America/Ensenada\r', 1),
(113, 'America/Fort_Wayne\r', 1),
(114, 'America/Fortaleza\r', 1),
(115, 'America/Glace_Bay\r', 1),
(116, 'America/Godthab\r', 1),
(117, 'America/Goose_Bay\r', 1),
(118, 'America/Grand_Turk\r', 1),
(119, 'America/Grenada\r', 1),
(120, 'America/Guadeloupe\r', 1),
(121, 'America/Guatemala\r', 1),
(122, 'America/Guayaquil\r', 1),
(123, 'America/Guyana\r', 1),
(124, 'America/Halifax\r', 1),
(125, 'America/Havana\r', 1),
(126, 'America/Hermosillo\r', 1),
(127, 'America/Indiana/Indianapolis\r', 1),
(128, 'America/Indiana/Knox\r', 1),
(129, 'America/Indiana/Marengo\r', 1),
(130, 'America/Indiana/Petersburg\r', 1),
(131, 'America/Indiana/Tell_City\r', 1),
(132, 'America/Indiana/Vevay\r', 1),
(133, 'America/Indiana/Vincennes\r', 1),
(134, 'America/Indiana/Winamac\r', 1),
(135, 'America/Indianapolis\r', 1),
(136, 'America/Inuvik\r', 1),
(137, 'America/Iqaluit\r', 1),
(138, 'America/Jamaica\r', 1),
(139, 'America/Jujuy\r', 1),
(140, 'America/Juneau\r', 1),
(141, 'America/Kentucky/Louisville\r', 1),
(142, 'America/Kentucky/Monticello\r', 1),
(143, 'America/Knox_IN\r', 1),
(144, 'America/Kralendijk\r', 1),
(145, 'America/La_Paz\r', 1),
(146, 'America/Lima\r', 1),
(147, 'America/Los_Angeles\r', 1),
(148, 'America/Louisville\r', 1),
(149, 'America/Lower_Princes\r', 1),
(150, 'America/Maceio\r', 1),
(151, 'America/Managua\r', 1),
(152, 'America/Manaus\r', 1),
(153, 'America/Marigot\r', 1),
(154, 'America/Martinique\r', 1),
(155, 'America/Matamoros\r', 1),
(156, 'America/Mazatlan\r', 1),
(157, 'America/Mendoza\r', 1),
(158, 'America/Menominee\r', 1),
(159, 'America/Merida\r', 1),
(160, 'America/Metlakatla\r', 1),
(161, 'America/Mexico_City\r', 1),
(162, 'America/Miquelon\r', 1),
(163, 'America/Moncton\r', 1),
(164, 'America/Monterrey\r', 1),
(165, 'America/Montevideo\r', 1),
(166, 'America/Montreal\r', 1),
(167, 'America/Montserrat\r', 1),
(168, 'America/Nassau\r', 1),
(169, 'America/New_York\r', 1),
(170, 'America/Nipigon\r', 1),
(171, 'America/Nome\r', 1),
(172, 'America/Noronha\r', 1),
(173, 'America/North_Dakota/Beulah\r', 1),
(174, 'America/North_Dakota/Center\r', 1),
(175, 'America/North_Dakota/New_Salem\r', 1),
(176, 'America/Ojinaga\r', 1),
(177, 'America/Panama\r', 1),
(178, 'America/Pangnirtung\r', 1),
(179, 'America/Paramaribo\r', 1),
(180, 'America/Phoenix\r', 1),
(181, 'America/Port_of_Spain\r', 1),
(182, 'America/Port-au-Prince\r', 1),
(183, 'America/Porto_Acre\r', 1),
(184, 'America/Porto_Velho\r', 1),
(185, 'America/Puerto_Rico\r', 1),
(186, 'America/Rainy_River\r', 1),
(187, 'America/Rankin_Inlet\r', 1),
(188, 'America/Recife\r', 1),
(189, 'America/Regina\r', 1),
(190, 'America/Resolute\r', 1),
(191, 'America/Rio_Branco\r', 1),
(192, 'America/Rosario\r', 1),
(193, 'America/Santa_Isabel\r', 1),
(194, 'America/Santarem\r', 1),
(195, 'America/Santiago\r', 1),
(196, 'America/Santo_Domingo\r', 1),
(197, 'America/Sao_Paulo\r', 1),
(198, 'America/Scoresbysund\r', 1),
(199, 'America/Shiprock\r', 1),
(200, 'America/Sitka\r', 1),
(201, 'America/St_Barthelemy\r', 1),
(202, 'America/St_Johns\r', 1),
(203, 'America/St_Kitts\r', 1),
(204, 'America/St_Lucia\r', 1),
(205, 'America/St_Thomas\r', 1),
(206, 'America/St_Vincent\r', 1),
(207, 'America/Swift_Current\r', 1),
(208, 'America/Tegucigalpa\r', 1),
(209, 'America/Thule\r', 1),
(210, 'America/Thunder_Bay\r', 1),
(211, 'America/Tijuana\r', 1),
(212, 'America/Toronto\r', 1),
(213, 'America/Tortola\r', 1),
(214, 'America/Vancouver\r', 1),
(215, 'America/Virgin\r', 1),
(216, 'America/Whitehorse\r', 1),
(217, 'America/Winnipeg\r', 1),
(218, 'America/Yakutat\r', 1),
(219, 'America/Yellowknife\r', 1),
(220, 'Antarctica/Casey\r', 1),
(221, 'Antarctica/Davis\r', 1),
(222, 'Antarctica/DumontDUrville\r', 1),
(223, 'Antarctica/Macquarie\r', 1),
(224, 'Antarctica/Mawson\r', 1),
(225, 'Antarctica/McMurdo\r', 1),
(226, 'Antarctica/Palmer\r', 1),
(227, 'Antarctica/Rothera\r', 1),
(228, 'Antarctica/South_Pole\r', 1),
(229, 'Antarctica/Syowa\r', 1),
(230, 'Antarctica/Vostok\r', 1),
(231, 'Arctic/Longyearbyen\r', 1),
(232, 'Asia/Aden\r', 1),
(233, 'Asia/Almaty\r', 1),
(234, 'Asia/Amman\r', 1),
(235, 'Asia/Anadyr\r', 1),
(236, 'Asia/Aqtau\r', 1),
(237, 'Asia/Aqtobe\r', 1),
(238, 'Asia/Ashgabat\r', 1),
(239, 'Asia/Ashkhabad\r', 1),
(240, 'Asia/Baghdad\r', 1),
(241, 'Asia/Bahrain\r', 1),
(242, 'Asia/Baku\r', 1),
(243, 'Asia/Bangkok\r', 1),
(244, 'Asia/Beirut\r', 1),
(245, 'Asia/Bishkek\r', 1),
(246, 'Asia/Brunei\r', 1),
(247, 'Asia/Calcutta\r', 1),
(248, 'Asia/Choibalsan\r', 1),
(249, 'Asia/Chongqing\r', 1),
(250, 'Asia/Chungking\r', 1),
(251, 'Asia/Colombo\r', 1),
(252, 'Asia/Dacca\r', 1),
(253, 'Asia/Damascus\r', 1),
(254, 'Asia/Dhaka\r', 1),
(255, 'Asia/Dili\r', 1),
(256, 'Asia/Dubai\r', 1),
(257, 'Asia/Dushanbe\r', 1),
(258, 'Asia/Gaza\r', 1),
(259, 'Asia/Harbin\r', 1),
(260, 'Asia/Hebron\r', 1),
(261, 'Asia/Ho_Chi_Minh\r', 1),
(262, 'Asia/Hong_Kong\r', 1),
(263, 'Asia/Hovd\r', 1),
(264, 'Asia/Irkutsk\r', 1),
(265, 'Asia/Istanbul\r', 1),
(266, 'Asia/Jakarta\r', 1),
(267, 'Asia/Jayapura\r', 1),
(268, 'Asia/Jerusalem\r', 1),
(269, 'Asia/Kabul\r', 1),
(270, 'Asia/Kamchatka\r', 1),
(271, 'Asia/Karachi\r', 1),
(272, 'Asia/Kashgar\r', 1),
(273, 'Asia/Kathmandu\r', 1),
(274, 'Asia/Katmandu\r', 1),
(275, 'Asia/Kolkata\r', 1),
(276, 'Asia/Krasnoyarsk\r', 1),
(277, 'Asia/Kuala_Lumpur\r', 1),
(278, 'Asia/Kuching\r', 1),
(279, 'Asia/Kuwait\r', 1),
(280, 'Asia/Macao\r', 1),
(281, 'Asia/Macau\r', 1),
(282, 'Asia/Magadan\r', 1),
(283, 'Asia/Makassar\r', 1),
(284, 'Asia/Manila\r', 1),
(285, 'Asia/Muscat\r', 1),
(286, 'Asia/Nicosia\r', 1),
(287, 'Asia/Novokuznetsk\r', 1),
(288, 'Asia/Novosibirsk\r', 1),
(289, 'Asia/Omsk\r', 1),
(290, 'Asia/Oral\r', 1),
(291, 'Asia/Phnom_Penh\r', 1),
(292, 'Asia/Pontianak\r', 1),
(293, 'Asia/Pyongyang\r', 1),
(294, 'Asia/Qatar\r', 1),
(295, 'Asia/Qyzylorda\r', 1),
(296, 'Asia/Rangoon\r', 1),
(297, 'Asia/Riyadh\r', 1),
(298, 'Asia/Saigon\r', 1),
(299, 'Asia/Sakhalin\r', 1),
(300, 'Asia/Samarkand\r', 1),
(301, 'Asia/Seoul\r', 1),
(302, 'Asia/Shanghai\r', 1),
(303, 'Asia/Singapore\r', 1),
(304, 'Asia/Taipei\r', 1),
(305, 'Asia/Tashkent\r', 1),
(306, 'Asia/Tbilisi\r', 1),
(307, 'Asia/Tehran\r', 1),
(308, 'Asia/Tel_Aviv\r', 1),
(309, 'Asia/Thimbu\r', 1),
(310, 'Asia/Thimphu\r', 1),
(311, 'Asia/Tokyo\r', 1),
(312, 'Asia/Ujung_Pandang\r', 1),
(313, 'Asia/Ulaanbaatar\r', 1),
(314, 'Asia/Ulan_Bator\r', 1),
(315, 'Asia/Urumqi\r', 1),
(316, 'Asia/Vientiane\r', 1),
(317, 'Asia/Vladivostok\r', 1),
(318, 'Asia/Yakutsk\r', 1),
(319, 'Asia/Yekaterinburg\r', 1),
(320, 'Asia/Yerevan\r', 1),
(321, 'Atlantic/Azores\r', 1),
(322, 'Atlantic/Bermuda\r', 1),
(323, 'Atlantic/Canary\r', 1),
(324, 'Atlantic/Cape_Verde\r', 1),
(325, 'Atlantic/Faeroe\r', 1),
(326, 'Atlantic/Faroe\r', 1),
(327, 'Atlantic/Jan_Mayen\r', 1),
(328, 'Atlantic/Madeira\r', 1),
(329, 'Atlantic/Reykjavik\r', 1),
(330, 'Atlantic/South_Georgia\r', 1),
(331, 'Atlantic/St_Helena\r', 1),
(332, 'Atlantic/Stanley\r', 1),
(333, 'Australia/ACT\r', 1),
(334, 'Australia/Adelaide\r', 1),
(335, 'Australia/Brisbane\r', 1),
(336, 'Australia/Broken_Hill\r', 1),
(337, 'Australia/Canberra\r', 1),
(338, 'Australia/Currie\r', 1),
(339, 'Australia/Darwin\r', 1),
(340, 'Australia/Eucla\r', 1),
(341, 'Australia/Hobart\r', 1),
(342, 'Australia/LHI\r', 1),
(343, 'Australia/Lindeman\r', 1),
(344, 'Australia/Lord_Howe\r', 1),
(345, 'Australia/Melbourne\r', 1),
(346, 'Australia/North\r', 1),
(347, 'Australia/NSW\r', 1),
(348, 'Australia/Perth\r', 1),
(349, 'Australia/Queensland\r', 1),
(350, 'Australia/South\r', 1),
(351, 'Australia/Sydney\r', 1),
(352, 'Australia/Tasmania\r', 1),
(353, 'Australia/Victoria\r', 1),
(354, 'Australia/West\r', 1),
(355, 'Australia/Yancowinna\r', 1),
(356, 'Brazil/Acre\r', 1),
(357, 'Brazil/DeNoronha\r', 1),
(358, 'Brazil/East\r', 1),
(359, 'Brazil/West\r', 1),
(360, 'Canada/Atlantic\r', 1),
(361, 'Canada/Central\r', 1),
(362, 'Canada/Eastern\r', 1),
(363, 'Canada/East-Saskatchewan\r', 1),
(364, 'Canada/Mountain\r', 1),
(365, 'Canada/Newfoundland\r', 1),
(366, 'Canada/Pacific\r', 1),
(367, 'Canada/Saskatchewan\r', 1),
(368, 'Canada/Yukon\r', 1),
(369, 'CET\r', 1),
(370, 'Chile/Continental\r', 1),
(371, 'Chile/EasterIsland\r', 1),
(372, 'CST6CDT\r', 1),
(373, 'Cuba\r', 1),
(374, 'EET\r', 1),
(375, 'Egypt\r', 1),
(376, 'Eire\r', 1),
(377, 'EST\r', 1),
(378, 'EST5EDT\r', 1),
(379, 'Etc./GMT\r', 1),
(380, 'Etc./GMT+0\r', 1),
(381, 'Etc./UCT\r', 1),
(382, 'Etc./Universal\r', 1),
(383, 'Etc./UTC\r', 1),
(384, 'Etc./Zulu\r', 1),
(385, 'Europe/Amsterdam\r', 1),
(386, 'Europe/Andorra\r', 1),
(387, 'Europe/Athens\r', 1),
(388, 'Europe/Belfast\r', 1),
(389, 'Europe/Belgrade\r', 1),
(390, 'Europe/Berlin\r', 1),
(391, 'Europe/Bratislava\r', 1),
(392, 'Europe/Brussels\r', 1),
(393, 'Europe/Bucharest\r', 1),
(394, 'Europe/Budapest\r', 1),
(395, 'Europe/Chisinau\r', 1),
(396, 'Europe/Copenhagen\r', 1),
(397, 'Europe/Dublin\r', 1),
(398, 'Europe/Gibraltar\r', 1),
(399, 'Europe/Guernsey\r', 1),
(400, 'Europe/Helsinki\r', 1),
(401, 'Europe/Isle_of_Man\r', 1),
(402, 'Europe/Istanbul\r', 1),
(403, 'Europe/Jersey\r', 1),
(404, 'Europe/Kaliningrad\r', 1),
(405, 'Europe/Kiev\r', 1),
(406, 'Europe/Lisbon\r', 1),
(407, 'Europe/Ljubljana\r', 1),
(408, 'Europe/London\r', 1),
(409, 'Europe/Luxembourg\r', 1),
(410, 'Europe/Madrid\r', 1),
(411, 'Europe/Malta\r', 1),
(412, 'Europe/Mariehamn\r', 1),
(413, 'Europe/Minsk\r', 1),
(414, 'Europe/Monaco\r', 1),
(415, 'Europe/Moscow\r', 1),
(416, 'Europe/Nicosia\r', 1),
(417, 'Europe/Oslo\r', 1),
(418, 'Europe/Paris\r', 1),
(419, 'Europe/Podgorica\r', 1),
(420, 'Europe/Prague\r', 1),
(421, 'Europe/Riga\r', 1),
(422, 'Europe/Rome\r', 1),
(423, 'Europe/Samara\r', 1),
(424, 'Europe/San_Marino\r', 1),
(425, 'Europe/Sarajevo\r', 1),
(426, 'Europe/Simferopol\r', 1),
(427, 'Europe/Skopje\r', 1),
(428, 'Europe/Sofia\r', 1),
(429, 'Europe/Stockholm\r', 1),
(430, 'Europe/Tallinn\r', 1),
(431, 'Europe/Tirane\r', 1),
(432, 'Europe/Tiraspol\r', 1),
(433, 'Europe/Uzhgorod\r', 1),
(434, 'Europe/Vaduz\r', 1),
(435, 'Europe/Vatican\r', 1),
(436, 'Europe/Vienna\r', 1),
(437, 'Europe/Vilnius\r', 1),
(438, 'Europe/Volgograd\r', 1),
(439, 'Europe/Warsaw\r', 1),
(440, 'Europe/Zagreb\r', 1),
(441, 'Europe/Zaporozhye\r', 1),
(442, 'Europe/Zurich\r', 1),
(443, 'GB\r', 1),
(444, 'GB-Eire\r', 1),
(445, 'GMT\r', 1),
(446, 'GMT+0\r', 1),
(447, 'GMT0\r', 1),
(448, 'GMT-0\r', 1),
(449, 'Greenwich\r', 1),
(450, 'Hong Kong\r', 1),
(451, 'HST\r', 1),
(452, 'Iceland\r', 1),
(453, 'Indian/Antananarivo\r', 1),
(454, 'Indian/Chagos\r', 1),
(455, 'Indian/Christmas\r', 1),
(456, 'Indian/Cocos\r', 1),
(457, 'Indian/Comoro\r', 1),
(458, 'Indian/Kerguelen\r', 1),
(459, 'Indian/Mahe\r', 1),
(460, 'Indian/Maldives\r', 1),
(461, 'Indian/Mauritius\r', 1),
(462, 'Indian/Mayotte\r', 1),
(463, 'Indian/Reunion\r', 1),
(464, 'Iran\r', 1),
(465, 'Israel\r', 1),
(466, 'Jamaica\r', 1),
(467, 'Japan\r', 1),
(468, 'JST-9\r', 1),
(469, 'Kwajalein\r', 1),
(470, 'Libya\r', 1),
(471, 'MET\r', 1),
(472, 'Mexico/BajaNorte\r', 1),
(473, 'Mexico/BajaSur\r', 1),
(474, 'Mexico/General\r', 1),
(475, 'MST\r', 1),
(476, 'MST7MDT\r', 1),
(477, 'Navajo\r', 1),
(478, 'NZ\r', 1),
(479, 'NZ-CHAT\r', 1),
(480, 'Pacific/Apia\r', 1),
(481, 'Pacific/Auckland\r', 1),
(482, 'Pacific/Chatham\r', 1),
(483, 'Pacific/Chuuk\r', 1),
(484, 'Pacific/Easter\r', 1),
(485, 'Pacific/Efate\r', 1),
(486, 'Pacific/Enderbury\r', 1),
(487, 'Pacific/Fakaofo\r', 1),
(488, 'Pacific/Fiji\r', 1),
(489, 'Pacific/Funafuti\r', 1),
(490, 'Pacific/Galapagos\r', 1),
(491, 'Pacific/Gambier\r', 1),
(492, 'Pacific/Guadalcanal\r', 1),
(493, 'Pacific/Guam\r', 1),
(494, 'Pacific/Honolulu\r', 1),
(495, 'Pacific/Johnston\r', 1),
(496, 'Pacific/Kiritimati\r', 1),
(497, 'Pacific/Kosrae\r', 1),
(498, 'Pacific/Kwajalein\r', 1),
(499, 'Pacific/Majuro\r', 1),
(500, 'Pacific/Marquesas\r', 1),
(501, 'Pacific/Midway\r', 1),
(502, 'Pacific/Nauru\r', 1),
(503, 'Pacific/Niue\r', 1),
(504, 'Pacific/Norfolk\r', 1),
(505, 'Pacific/Noumea\r', 1),
(506, 'Pacific/Pago_Pago\r', 1),
(507, 'Pacific/Palau\r', 1),
(508, 'Pacific/Pitcairn\r', 1),
(509, 'Pacific/Pohnpei\r', 1),
(510, 'Pacific/Ponape\r', 1),
(511, 'Pacific/Port_Moresby\r', 1),
(512, 'Pacific/Rarotonga\r', 1),
(513, 'Pacific/Saipan\r', 1),
(514, 'Pacific/Samoa\r', 1),
(515, 'Pacific/Tahiti\r', 1),
(516, 'Pacific/Tarawa\r', 1),
(517, 'Pacific/Tongatapu\r', 1),
(518, 'Pacific/Truk\r', 1),
(519, 'Pacific/Wake\r', 1),
(520, 'Pacific/Wallis\r', 1),
(521, 'Pacific/Yap\r', 1),
(522, 'Poland\r', 1),
(523, 'Portugal\r', 1),
(524, 'PRC\r', 1),
(525, 'PST8PDT\r', 1),
(526, 'ROC\r', 1),
(527, 'ROK\r', 1),
(528, 'Singapore\r', 1),
(529, 'Turkey\r', 1),
(530, 'UCT\r', 1),
(531, 'Universal\r', 1),
(532, 'US/Alaska\r', 1),
(533, 'US/Aleutian\r', 1),
(534, 'US/Arizona\r', 1),
(535, 'US/Central\r', 1),
(536, 'US/Eastern\r', 1),
(537, 'US/East-Indiana\r', 1),
(538, 'US/Hawaii\r', 1),
(539, 'US/Indiana-Starke\r', 1),
(540, 'US/Michigan\r', 1),
(541, 'US/Mountain\r', 1),
(542, 'US/Pacific\r', 1),
(543, 'US/Pacific-New\r', 1),
(544, 'US/Samoa\r', 1),
(545, 'UTC\r', 1),
(546, 'WET\r', 1),
(547, 'W-SU\r', 1),
(548, 'Zulu\r', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `discription`, `created_at`, `updated_at`, `status`) VALUES
(7, 'Nos', 'Nos', '2024-10-28 13:35:22', '2024-10-28 13:35:22', 'active'),
(8, 'Ltr', 'litter', '2024-10-28 13:35:41', '2024-10-28 13:35:41', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `default_warehouse` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `name`, `mobile`, `email`, `role`, `password`, `default_warehouse`, `created_at`, `updated_at`, `image`, `status`, `username`) VALUES
(8, 'anas ka', '08547554648', 'anashomey@gmail.com', 'cashier', '$2y$12$nR5L0Cwe6GiAkTINrtzPGuSQknCdw/WSvL9y6qSdlHCkbAV0TsQhm', 'kariyakkad', '2024-10-20 05:57:43', '2024-10-20 06:02:17', 'userprofile/o0gqOv2TISKmVKJRlatKUEYmm64YAALd5A99dYhn.png', 'inactive', 'anas ka764@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `plan` int(200) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` int(200) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `mobile_code` varchar(255) NOT NULL,
  `status` varchar(120) NOT NULL DEFAULT 'active',
  `user_type` varchar(255) NOT NULL DEFAULT '1',
  `created_by` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `plan`, `password`, `created_at`, `updated_at`, `name`, `role_id`, `mobile`, `email`, `image`, `role`, `store_id`, `mobile_code`, `status`, `user_type`, `created_by`) VALUES
(1, 'cargroup@admin.com', 1, '$2y$12$BusPsDZ88ivuceLnSAhjkOVIxyen1DNCUBmobfEE7Ji/L5p43GdTe', NULL, '2024-11-24 14:58:05', 'Abhi', 0, '8547554648', 'anaska@gmail.com', '', 'superadmin', NULL, '', 'active', '1', NULL),
(27, 'anas@admin.com', 1, '$2y$12$BusPsDZ88ivuceLnSAhjkOVIxyen1DNCUBmobfEE7Ji/L5p43GdTe', '2024-12-11 01:56:59', '2024-12-11 01:56:59', 'anas', NULL, '844564852', 'anasfamilyman@gmail.com', NULL, 'admin', NULL, '91', 'active', '2', 1),
(28, 'anaska@admin.com', 3, '$2y$10$O38kSIHlAbMhydMlmpuRHOIx326XOFUCWgbXtYjXa1NjnVFjQFB66', '2024-12-11 01:58:57', '2024-12-13 00:18:14', 'Anas k a', NULL, '9539790240', 'anashomey@gmail.com', NULL, 'admin', NULL, '971', 'active', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', '2024-11-19 11:15:36', '2024-11-19 11:15:36'),
(2, 'Admin', 'Admin', '2024-11-19 11:37:05', '2024-11-19 11:37:05'),
(3, 'Accountant', 'Accountant', '2024-11-19 11:37:22', '2024-11-19 11:37:22'),
(4, 'Store Manager', 'Store Manager', '2024-11-19 11:37:45', '2024-11-19 11:37:45'),
(5, 'Sale Executive', 'Sale Executive', '2024-11-19 11:39:10', '2024-11-19 11:39:10'),
(6, 'Customer', 'Customer', '2024-11-19 11:39:26', '2024-11-19 11:39:26'),
(7, 'Supplier', 'Supplier', '2024-11-19 11:39:39', '2024-11-19 11:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `details` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'system',
  `store_id` varchar(255) NOT NULL,
  `delete_bit` varchar(255) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`, `mobile`, `email`, `created_at`, `updated_at`, `status`, `details`, `type`, `store_id`, `delete_bit`, `created_by`) VALUES
(25, 'Main warehouse', 'address', '000000000', 'fdfgmndfngn', '2024-11-10 03:36:51', '2024-11-10 03:36:51', 'active', NULL, 'system', '33', '0', '1'),
(26, 'Main warehouse', 'address', '000000000', 'dfgfdhfgh', '2024-11-10 03:38:33', '2024-11-25 06:29:46', 'active', NULL, 'system', '34', '0', '1'),
(28, 'sdfsdf', 'dsgegbdfgbdf', '984654545', 'dsfmndsb@gmail.com', '2024-11-25 06:24:45', '2024-11-25 06:24:45', 'active', NULL, 'system', '5', '1', '1'),
(29, 'Main warehouse', 'address', '000000000', 'dfgdfhg@gm,ail.com', '2024-12-02 22:19:07', '2024-12-02 22:19:07', 'active', NULL, 'system', '35', '0', '1'),
(30, 'Main warehouse', 'address', '000000000', 'sdbfjksbdj@gmail.com', '2024-12-02 22:20:42', '2024-12-02 22:20:42', 'active', NULL, 'system', '36', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_items`
--

CREATE TABLE `warehouse_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouse_items`
--

INSERT INTO `warehouse_items` (`id`, `store_id`, `warehouse_id`, `item_id`, `available_qty`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 21, 94, '2024-11-11 08:53:14', '2024-11-24 14:48:12'),
(2, 5, 5, 783, 66, '2024-11-11 22:18:19', '2024-11-11 22:18:19'),
(3, 5, 5, 29, 153, '2024-11-11 22:31:52', '2024-11-17 09:01:22'),
(4, 5, 5, 30, -102, '2024-11-11 23:36:08', '2024-11-19 06:10:28'),
(5, 5, 5, 28, -512, '2024-11-11 23:37:49', '2024-11-19 06:21:29'),
(6, 5, 5, 22, -526, '2024-11-12 00:02:02', '2024-11-19 06:15:27'),
(7, 5, 5, 10, 98, '2024-11-12 00:19:58', '2024-11-23 00:20:35'),
(8, 5, 5, 32, -404, '2024-11-12 01:04:01', '2024-11-14 02:24:07'),
(9, 5, 5, 31, -408, '2024-11-12 01:07:08', '2024-11-13 01:00:08'),
(10, 5, 5, 77, 10, '2024-11-12 01:17:08', '2024-11-12 01:40:07'),
(11, 5, 5, 7, -38, '2024-11-12 01:17:08', '2024-11-12 02:01:08'),
(12, 5, 5, 33, 4, '2024-11-12 01:30:05', '2024-11-13 05:39:34'),
(13, 5, 5, 35, 4, '2024-11-12 04:02:24', '2024-11-19 06:23:56'),
(14, 5, 5, 1340, 456, '2024-11-13 12:34:48', '2024-11-13 12:34:48'),
(15, 5, 5, 19, 39, '2024-11-13 23:08:37', '2024-11-22 09:54:04'),
(16, 5, 5, 750, 2, '2024-11-14 05:13:22', '2024-11-14 05:13:57'),
(17, 5, 5, 442, 6, '2024-11-14 05:21:57', '2024-11-14 05:24:26'),
(18, 5, 5, 763, 2, '2024-11-14 05:21:57', '2024-11-14 05:30:17'),
(19, 5, 5, 168, 170, '2024-11-16 01:40:22', '2024-11-16 01:56:53'),
(20, 5, 5, 9, 7, '2024-11-16 07:51:32', '2024-11-16 07:51:32'),
(21, 5, 5, 11, 74, '2024-11-18 01:14:25', '2024-11-18 01:14:25'),
(22, 5, 5, 8, 25, '2024-11-18 01:14:25', '2024-11-22 14:11:21'),
(23, 5, 5, 275, 190, '2024-11-18 03:54:07', '2024-11-18 04:32:31'),
(24, 5, 5, 171, 80, '2024-11-19 02:38:37', '2024-11-19 02:38:37'),
(25, 5, 5, 35, 2, '2024-11-19 05:55:25', '2024-11-19 05:55:25'),
(26, 5, 5, 190, 21, '2024-11-23 02:22:33', '2024-11-25 03:52:49'),
(27, 4, 9, 1349, 20, '2024-11-24 03:54:44', '2024-11-24 03:54:44'),
(28, 5, 5, 17, 10, '2024-11-24 04:20:55', '2024-11-30 10:38:31'),
(29, 5, 5, 20, 22, '2024-11-24 04:21:44', '2024-11-25 03:45:46'),
(30, 5, 5, 16, 21, '2024-11-24 10:01:17', '2024-11-24 13:10:41'),
(31, 5, 25, 1350, 200, '2024-11-25 13:03:48', '2024-11-25 13:03:48'),
(32, 5, 28, 1353, 40, '2024-11-25 23:23:20', '2024-11-25 23:23:20'),
(33, 5, 28, 1354, 4554, '2024-11-25 23:27:19', '2024-11-25 23:27:19'),
(34, 5, 28, 22, -219, '2024-11-26 00:57:43', '2024-11-28 02:01:18'),
(35, 5, 28, 20, 48, '2024-11-26 02:49:55', '2024-12-20 02:27:17'),
(36, 5, 28, 19, 16, '2024-11-26 02:54:23', '2024-12-20 02:27:36'),
(37, 5, 28, 21, 25, '2024-11-26 03:23:03', '2024-11-27 03:25:41'),
(38, 5, 28, 17, 16, '2024-11-26 03:32:01', '2024-12-20 06:32:55'),
(39, 5, 28, 23, 7, '2024-11-26 04:00:48', '2024-11-26 10:52:29'),
(40, 5, 28, 29, -1188, '2024-11-26 04:00:48', '2024-11-27 00:25:06'),
(41, 5, 28, 190, 22, '2024-11-26 10:30:14', '2024-11-26 10:30:14'),
(45, 5, 28, 25, 1, '2024-11-27 02:06:25', '2024-11-27 02:06:25'),
(46, 5, 28, 47, 56, '2024-11-27 06:48:10', '2024-11-27 06:48:10'),
(47, 5, 28, 16, 4, '2024-11-28 23:29:39', '2024-11-30 06:17:37'),
(48, 5, 28, 18, 9, '2024-11-29 13:59:47', '2024-12-15 22:46:46'),
(49, 5, 26, 1355, 10, '2024-12-02 22:00:23', '2024-12-02 22:00:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjust`
--
ALTER TABLE `adjust`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance`
--
ALTER TABLE `advance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing`
--
ALTER TABLE `closing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_settings`
--
ALTER TABLE `country_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensecategory`
--
ALTER TABLE `expensecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offsales_items`
--
ALTER TABLE `offsales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchaseitems_order`
--
ALTER TABLE `purchaseitems_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasereturn`
--
ALTER TABLE `purchasereturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasereturn_payments`
--
ALTER TABLE `purchasereturn_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_sale`
--
ALTER TABLE `purchase_order_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_sales_items`
--
ALTER TABLE `purchase_order_sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_items_extimate`
--
ALTER TABLE `sales_items_extimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return_items`
--
ALTER TABLE `sales_return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_extimate`
--
ALTER TABLE `sale_extimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondryunit`
--
ALTER TABLE `secondryunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_store`
--
ALTER TABLE `second_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_warehouse_items`
--
ALTER TABLE `second_warehouse_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serialno`
--
ALTER TABLE `serialno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub-method`
--
ALTER TABLE `sub-method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezone`
--
ALTER TABLE `timezone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_items`
--
ALTER TABLE `warehouse_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `adjust`
--
ALTER TABLE `adjust`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `advance`
--
ALTER TABLE `advance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `closing`
--
ALTER TABLE `closing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country_settings`
--
ALTER TABLE `country_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1159;

--
-- AUTO_INCREMENT for table `expensecategory`
--
ALTER TABLE `expensecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1356;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `offsales_items`
--
ALTER TABLE `offsales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseitems_order`
--
ALTER TABLE `purchaseitems_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereturn`
--
ALTER TABLE `purchasereturn`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereturn_payments`
--
ALTER TABLE `purchasereturn_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_sale`
--
ALTER TABLE `purchase_order_sale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_sales_items`
--
ALTER TABLE `purchase_order_sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_items_extimate`
--
ALTER TABLE `sales_items_extimate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_return_items`
--
ALTER TABLE `sales_return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale_extimate`
--
ALTER TABLE `sale_extimate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secondryunit`
--
ALTER TABLE `secondryunit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `second_store`
--
ALTER TABLE `second_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `second_warehouse_items`
--
ALTER TABLE `second_warehouse_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `serialno`
--
ALTER TABLE `serialno`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_config`
--
ALTER TABLE `site_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sub-method`
--
ALTER TABLE `sub-method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timezone`
--
ALTER TABLE `timezone`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `warehouse_items`
--
ALTER TABLE `warehouse_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
