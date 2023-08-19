-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 11:35 AM
-- Server version: 10.4.19-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poperty_management_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE `admin_notification` (
  `notify_id` int(11) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `who_will_get` varchar(100) NOT NULL COMMENT 'Super Admin=1,employee=2,tenent=3,owner=5',
  `user_id` int(11) NOT NULL,
  `tenant_status` int(11) NOT NULL,
  `emp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_notification`
--

INSERT INTO `admin_notification` (`notify_id`, `issue_name`, `issue_id`, `type`, `admin_status`, `property_id`, `who_will_get`, `user_id`, `tenant_status`, `emp_status`) VALUES
(9, 'Complain', 25, 'add complain', 0, 17, '1', 44, 0, 0),
(10, 'Complain', 26, 'add complain', 1, 17, '1', 44, 0, 0),
(11, 'Complain', 25, 'Assign Complain', 1, 17, '2,3', 1, 0, 0),
(12, 'Complain', 26, 'Assign Complain', 1, 17, '2,3', 1, 0, 0),
(13, 'Complain', 25, 'Add Solution', 1, 17, '3', 1, 0, 0),
(15, 'Complain', 26, 'Add Solution', 1, 17, '3', 1, 0, 0),
(16, 'Complain', 27, 'add complain', 1, 17, '1', 44, 0, 0),
(17, 'Complain', 27, 'Assign Complain', 1, 17, '2,3', 1, 0, 0),
(18, 'Complain', 27, 'Assign Complain', 1, 17, '2,3', 1, 0, 0),
(19, 'Complain', 27, 'Add Solution', 1, 17, '3', 1, 0, 0),
(20, 'Complain', 28, 'add complain', 1, 17, '1', 44, 0, 0),
(21, 'Complain', 28, 'Add Solution', 1, 17, '3', 1, 0, 0),
(22, 'Complain', 28, 'Assign Complain', 1, 17, '2,3', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `billsetups`
--

CREATE TABLE `billsetups` (
  `id` int(11) NOT NULL,
  `billtype` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billsetups`
--

INSERT INTO `billsetups` (`id`, `billtype`, `property_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'Gas Bill', 0, 1, '2021-11-18 13:41:52', '2021-11-24 05:26:15'),
(2, 'Electric Bill', 0, 1, '2021-11-18 13:43:21', '2021-11-24 05:26:18'),
(3, 'Water Bill', 0, 1, '2021-11-23 09:06:32', '2021-11-24 05:26:21'),
(11, 'test bill', 17, 1, '2021-11-23 10:11:09', '2021-11-24 05:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `bill_diposit`
--

CREATE TABLE `bill_diposit` (
  `id` int(100) NOT NULL,
  `bill_type` int(11) NOT NULL,
  `bill_date` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_diposit`
--

INSERT INTO `bill_diposit` (`id`, `bill_type`, `bill_date`, `month`, `year`, `total_amount`, `bank_name`, `details`, `property_id`) VALUES
(7, 0, '2020-11-09', 'January', 2021, 21000, 'sonali Bank', 'details is details..', 0),
(9, 2, '1976-06-04', 'April', 2017, 0, 'Isaac Mclaughlin', 'Est est quia ad iste', 17),
(10, 1, '2021-07-22', 'June', 2017, 111, 'Maris Garner', 'Optio dolorem unde ', 17),
(12, 1, '1973-07-12', 'November', 2020, 0, 'Jena Mcdowell', 'Quia error ut quod p', 17),
(13, 3, '2016-04-02', 'January', 2021, 98, 'Lev Fletcher', 'Ea sequi beatae dolo', 17);

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `mmembername` varchar(30) NOT NULL,
  `memail` varchar(40) NOT NULL,
  `mpassword` varchar(30) NOT NULL,
  `mphone` varchar(20) NOT NULL,
  `mpresentads` varchar(50) NOT NULL,
  `mpermanentads` varchar(50) NOT NULL,
  `mnid` varchar(20) NOT NULL,
  `mdesignation` varchar(20) NOT NULL,
  `mjoiningdate` varchar(20) NOT NULL,
  `mendingdate` varchar(20) NOT NULL,
  `mstaus` int(5) NOT NULL,
  `mimage` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `mmembername`, `memail`, `mpassword`, `mphone`, `mpresentads`, `mpermanentads`, `mnid`, `mdesignation`, `mjoiningdate`, `mendingdate`, `mstaus`, `mimage`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'Octavia Dale', 'nuciz@mailinator.com', 'Pa$$w0rd!', '+1 (451) 911-8969', 'Alias quo excepteur ', 'In vel eos mollit c', '44', 'Security Gard', '2016-03-22', '2020-02-03', 1, '1637043080_b5030f023d0e7daf1efe.png', 0, '2021-11-16 06:10:49', '2021-11-16 06:11:20'),
(2, 'Oscar Knight', 'gyfe@mailinator.com', 'Pa$$w0rd!', '+1 (142) 512-6719', 'Repudiandae recusand', 'Ad distinctio Et co', 'Ut sint in duis magn', 'Pion', '1974-11-29', '1976-06-26', 1, '', 0, '2021-11-16 06:12:03', '2021-11-16 06:12:03'),
(3, 'Drake Bullock2', 'kulivufofa@mailinator.com', 'Pa$$w0rd!', '+1 (602) 572-7261', 'Fuga Paria', 'Alias ut v', '12123', 'Secretary General', '1982-03-20', '1998-03-21', 1, '1638338663_7ac8050b4a9129f0ca0f.png', 17, '2021-11-18 08:49:29', '2022-02-07 09:28:46'),
(4, 'Davis Mcneil', 'hyxypux@mailinator.com', 'Pa$$w0rd!', '+1 (789) 146-2724', 'Quia id quia recusa', 'Occaecat temporibus ', 'Fugiat est omnis sun', 'Secretary General', '1996-01-22', '2019-09-22', 1, '1638338624_92d3bb77f6dae250b044.png', 17, '2021-12-01 06:03:44', '2021-12-01 06:03:44'),
(5, 'Teegan Cross', 'rewy@mailinator.com', 'Pa$$w0rd!', '+1 (151) 339-8243', 'Quas est sunt debiti', 'Quis sit excepteur ', 'Ratione ut minima vi', 'Security Gard', '2008-07-21', '1988-01-08', 1, '1685956282_4d1f8dadacc7d4ecb45c.jpg', 94, '2023-06-05 09:11:22', '2023-06-05 09:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_owner_id` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_owner_id`, `status`) VALUES
(1, 1, 1),
(11, 4, 1),
(13, 5, 1),
(17, 13, 1),
(19, 16, 1),
(20, 35, 1),
(21, 37, 1),
(22, 38, 1),
(23, 40, 1),
(24, 46, 1),
(25, 49, 1),
(26, 50, 1),
(27, 52, 1),
(28, 56, 1),
(29, 61, 1),
(30, 62, 1),
(31, 68, 1),
(32, 76, 1),
(33, 85, 1),
(34, 87, 1),
(35, 82, 1),
(36, 88, 1),
(37, 91, 1),
(38, 98, 1),
(39, 105, 1),
(40, 109, 1),
(41, 113, 1),
(42, 115, 1),
(43, 116, 1),
(44, 117, 1),
(45, 118, 1),
(46, 119, 1),
(47, 120, 1),
(48, 121, 1),
(49, 122, 1),
(50, 123, 1),
(51, 124, 1),
(52, 125, 1),
(53, 128, 1),
(54, 130, 1),
(55, 69, 1),
(56, 154, 1),
(57, 155, 1),
(58, 165, 1),
(59, 166, 1),
(60, 167, 1),
(61, 168, 1),
(62, 169, 1),
(63, 170, 1),
(64, 174, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `comtitle` varchar(50) NOT NULL,
  `comdescription` text NOT NULL,
  `comdate` varchar(20) NOT NULL,
  `comperson` int(5) NOT NULL,
  `comstatus` varchar(30) NOT NULL,
  `comsolution` text NOT NULL,
  `comass` varchar(100) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `comtitle`, `comdescription`, `comdate`, `comperson`, `comstatus`, `comsolution`, `comass`, `property_id`, `created_at`, `updated_at`) VALUES
(25, 'gas problem', 'gas problemgas problemgas problemgas problemgas problemgas problemgas problemgas problemgas problem', '2022-01-31', 44, 'In progress', 'work on it', '1', 17, '2022-01-31 11:08:36', '2022-01-31 11:12:23'),
(26, 'water problem', 'water problemwater problemwater problemwater problemwater problemwater problemwater problemwater problemwater problem', '2022-01-31', 44, 'Completed', 'Complete', '1', 17, '2022-01-31 11:09:02', '2022-01-31 11:14:38'),
(27, 'security missing', 'Security guard is missing from 2 days check it', '2022-02-03', 44, 'Completed', 'New security guard added', '1', 17, '2022-02-03 04:41:41', '2022-02-03 04:42:50'),
(28, 'Electricity problem ', 'i am facing Electricity problem from 6 hours please solve it', '2022-02-03', 44, 'In progress', 'it will complete within 2 hours', '1', 17, '2022-02-03 04:47:10', '2022-02-03 04:49:38'),
(29, 'Quis quis consectetu', 'Libero sit nulla per', '1971-12-26', 169, '', '', '', 100, '2023-06-05 11:02:00', '2023-06-05 11:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(100) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `symbol`, `name`, `property_id`) VALUES
(7, '£', 'euro', 17),
(8, '$', 'dolar', 17),
(9, '৳', 'Taka', 17);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `date_format` varchar(100) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `date_format`, `property_id`, `name`) VALUES
(1, 'Y/m/d', 17, 'yy/mm/dd'),
(2, 'm/Y/d', 17, 'mm/yy/dd'),
(3, 'd/Y/m', 17, 'mm/yy/dd'),
(5, 'd/m/Y', 17, 'dd/mm/yy');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `parmanent_address` varchar(500) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `salary_per_month` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `contact_no`, `present_address`, `parmanent_address`, `nid`, `designation`, `join_date`, `end_date`, `salary_per_month`, `status`, `image`, `property_id`) VALUES
(1, 'Denton Hodge', 'zopot@mailinator.com', 'Pa$$w0rd!', '27', 'Consequat Voluptate', 'Voluptas quo ullamco', '69', 'Secretary General', '2021-12-02', '2021-12-02', '5000', 'Active', '1638424718_274e0a092e00fb0f8592.png', 17),
(2, 'Russell Carver', 'cosetonac@mailinator.com', 'Pa$$w0rd!', '56', 'Commodo voluptates a', 'Incididunt elit ani', '11', 'Caretaker', '1991-03-09', '1982-11-29', '9', 'Leave', '1685444553_c8c923cf3891a65093d9.jpg', 94),
(3, 'Lev Hooper', 'giquxyruqa@mailinator.com', 'Pa$$w0rd!', '72', 'Est est consectetur', 'Voluptate tempora mo', '41', 'Secretary General', '2023-02-13', '1975-11-12', '3', 'Active', '1685958393_4d33d511c130db7bb447.png', 100);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` int(100) NOT NULL,
  `employee_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `salary_per_month` double(10,2) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `employee_id`, `name`, `designation`, `month`, `year`, `salary_per_month`, `issue_date`, `property_id`) VALUES
(18, 18, 'Kaka', 'Secretary General', 'October', '2021', 15000.00, '2021-11-16', 0),
(19, 19, 'kaka2', 'Moderator', 'November', '2021', 20000.00, '2021-11-16', 0),
(21, 20, 'Cecilia Robertson', 'Maker', 'February', '2019', 200.00, '2021-11-18', 17),
(22, 20, 'Cecilia Robertson', 'Maker', 'February', '2022', 3000.00, '2021-11-18', 17),
(23, 20, 'Cecilia Robertson', 'Maker', 'February', '2021', 3000.00, '2021-12-07', 17),
(24, 2, 'Russell Carver', 'Caretaker', 'januray', '2022', 9.00, '2023-05-30', 94),
(25, 2, 'Russell Carver', 'Caretaker', 'januray', '2022', 9.00, '2023-05-30', 94);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(11) NOT NULL,
  `floorno` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `floorno`, `property_id`, `created_at`, `updated_at`) VALUES
(1, '1st floor', 17, '2021-12-02 05:46:00', '2021-12-02 05:46:00'),
(3, '2nd floor', 17, '2021-12-02 05:47:24', '2021-12-02 05:47:24'),
(4, '3rd floor', 17, '2021-12-02 05:47:31', '2021-12-02 05:47:31'),
(5, '4th floor', 17, '2022-01-30 10:39:35', '2022-01-30 10:39:35'),
(6, '5th floor', 17, '2022-01-30 10:39:49', '2022-01-30 10:39:49'),
(7, '44th floor', 43, '2022-02-06 09:40:05', '2022-02-06 09:40:05'),
(8, '55th floor', 43, '2022-02-06 09:40:31', '2022-02-06 09:40:31'),
(9, '13 th floor ', 45, '2022-02-06 10:47:22', '2022-02-06 10:47:22'),
(10, '33th floor', 47, '2022-02-07 06:10:33', '2022-02-07 06:10:33'),
(11, '5th floor', 18, '2022-09-29 07:15:27', '2022-09-29 07:15:27'),
(12, '5th floor', 94, '2023-05-30 06:37:04', '2023-05-30 06:37:04'),
(13, '2a', 100, '2023-06-05 09:42:47', '2023-06-05 09:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_image` varchar(500) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `owner_id`, `owner_name`, `owner_image`, `month`, `year`, `issue_date`, `total_amount`, `purpose`, `property_id`) VALUES
(1, 2, 'Germaine Rasmussen', '1638424257_94a0b143629fc5d9346a.png', 'January', '2022', '2022-01-29', 900.00, 'df rg ', 17),
(2, 2, 'Germaine Rasmussen', '1638424257_94a0b143629fc5d9346a.png', 'February', '2022', '2022-02-28', 1000.00, 'ngbvn mb hbgj', 17),
(3, 2, 'Germaine Rasmussen', '1638424257_94a0b143629fc5d9346a.png', 'July', '2017', '2014-09-15', 500.00, 'Ut commodi non conse', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mailsms`
--

CREATE TABLE `mailsms` (
  `id` int(11) NOT NULL,
  `maildate` varchar(20) NOT NULL,
  `mailsub` varchar(50) NOT NULL,
  `mailmess` text NOT NULL,
  `mailtenant` varchar(20) DEFAULT '',
  `mailemployee` varchar(20) DEFAULT '',
  `mailowner` varchar(20) DEFAULT '',
  `schedule` varchar(20) NOT NULL,
  `mailmesstype` varchar(20) NOT NULL,
  `mailstatus` int(5) NOT NULL DEFAULT 0,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mailsms`
--

INSERT INTO `mailsms` (`id`, `maildate`, `mailsub`, `mailmess`, `mailtenant`, `mailemployee`, `mailowner`, `schedule`, `mailmesstype`, `mailstatus`, `property_id`, `created_at`, `updated_at`) VALUES
(2, '2021-11-27', 'Reset Password', 'Hi {receiver_name}\n\nYour request for reset password has been approved from {app_name}. Press the button below to reset the password.\n\nReset Password\n\nWe are highly expecting you as soon as possible. Hope you\'ll join us.\n\nThanks for being with us.\n\nThanks & Regards,\n\n{app_name}', '0', '0', '0', '2021-11-27', 'email', 1, 17, '2021-11-27 06:06:18', '2021-11-29 10:25:26'),
(3, '02/12/21', '33', 'Hi {receiver_name}\r\n\r\nYour request for reset password has been approved from {app_name}. Press the button below to reset the password.\r\n\r\nReset Password\r\n\r\nWe are highly expecting you as soon as possible. Hope you\'ll join us.\r\n\r\nThanks for being with us.\r\n\r\nThanks & Regards,\r\n\r\n{app_name}', '', '', '', '2021-11-27', 'sms,email', 1, 17, '2021-11-27 06:21:13', '2021-12-02 13:52:19'),
(5, '2021-11-29', 'kk', 'hikk', '', '18', '', '2021-11-29', 'email', 1, 17, '2021-11-29 08:46:34', '2021-11-29 08:47:16'),
(6, '2021-11-29', 'kk', 'hjjj', '', '19', '', '2021-11-29', 'sms', 1, 17, '2021-11-29 08:49:22', '2021-11-29 08:49:38'),
(7, '2021-11-29', 'kk', 'dsfsdg', '', '20', '', '2021-11-29', 'sms,email', 1, 17, '2021-11-29 08:51:49', '2021-11-29 08:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `mailsmsdatas`
--

CREATE TABLE `mailsmsdatas` (
  `id` int(11) NOT NULL,
  `dmailname` varchar(50) NOT NULL,
  `dmailemail` varchar(40) NOT NULL,
  `dmailphone` varchar(20) NOT NULL,
  `dmailsubject` varchar(50) NOT NULL,
  `dmailmessage` text NOT NULL,
  `dmailstatus` int(5) NOT NULL,
  `dmailtype` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mailsmsdatas`
--

INSERT INTO `mailsmsdatas` (`id`, `dmailname`, `dmailemail`, `dmailphone`, `dmailsubject`, `dmailmessage`, `dmailstatus`, `dmailtype`, `property_id`, `created_at`, `updated_at`) VALUES
(21, 'Kaka', 'Kaka@gmail.com', '123456', 'kk', 'hikk', 1, 'email', 17, '2021-11-29 08:47:16', '2021-11-29 08:48:23'),
(22, 'kaka 3', 'kaka2@gmail.com', '222222', 'kk', 'hjjj', 1, 'sms', 17, '2021-11-29 08:49:38', '2021-11-29 08:50:58'),
(23, 'Cecilia Robertson', 'pure@mailinator.com', 'Ut quia ut harum est', 'kk', 'dsfsdg', 1, 'all', 17, '2021-11-29 08:51:56', '2021-11-29 08:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL,
  `maindate` varchar(20) NOT NULL,
  `mainmonth` int(20) NOT NULL,
  `mainyear` varchar(20) NOT NULL,
  `maintitle` varchar(50) NOT NULL,
  `mainamount` double(10,2) NOT NULL,
  `maindetails` text NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `maindate`, `mainmonth`, `mainyear`, `maintitle`, `mainamount`, `maindetails`, `property_id`, `created_at`, `updated_at`) VALUES
(2, '2022-07-14', 3, '2022', 'Officia vel facere r', 150.00, 'Itaque ut voluptate ', 17, '2021-11-22 12:36:29', '2022-01-30 05:30:47'),
(6, '2022-02-12', 4, '2022', 'Ipsa molestias faci', 350.00, 'Cupidatat dolores re', 17, '2022-02-12 05:19:11', '2022-02-05 14:05:19'),
(7, '2022-01-29', 8, '2022', 'building color ', 200.00, 'Color price is too cost', 17, '2022-01-29 13:59:19', '2022-01-30 05:30:51'),
(8, '2022-03-08', 6, '2022', 'piling cost', 300.00, 'sdf  nhn  ', 17, '2022-01-29 14:01:02', '2022-01-30 05:28:15'),
(9, '2022-02-22', 4, '2022', 'Ipsa molestias faci', 700.00, 'Cupidatat dolores Cupidatat dolores reCupidatat dolores reCupidatat dolores re re', 17, '2022-02-22 05:19:11', '2022-02-05 14:04:56'),
(10, '2022-02-05', 4, '2022', 'Ipsa molestias faci', 500.00, 'Cupidatat dolores re', 17, '2022-02-05 05:19:11', '2022-02-05 14:04:31'),
(11, '2022-09-12', 9, '2022', 'Ipsa molestias faci', 1350.00, 'asdf jhbug', 17, '2022-09-12 05:19:11', '2022-09-05 14:05:19'),
(12, '2023-06-05', 0, '2022', 'Gass Bill', 123.00, 'wdwdvv', 94, '2023-06-05 07:58:21', '2023-06-05 07:58:21'),
(13, '2023-06-05', 0, '2022', 'Gass Bill', 123.00, 'wdwdvv', 94, '2023-06-05 07:58:47', '2023-06-05 07:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `meeissuedate` varchar(20) NOT NULL,
  `meetitle` varchar(50) NOT NULL,
  `meedescription` text NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `meeissuedate`, `meetitle`, `meedescription`, `property_id`, `created_at`, `updated_at`) VALUES
(5, '2021-11-19', 'title1', '<p>hello worlds</p>', 17, '2021-11-18 10:08:47', '2022-02-07 09:44:47'),
(6, '2023-06-06', 'qwsd', '<p>qwsdc swSWA ADASC ACDS sdsadsa sdcdsc</p>', 94, '2023-06-06 05:50:02', '2023-06-06 05:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `membersetups`
--

CREATE TABLE `membersetups` (
  `id` int(11) NOT NULL,
  `membertype` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membersetups`
--

INSERT INTO `membersetups` (`id`, `membertype`, `property_id`, `created_at`, `updated_at`) VALUES
(6, 'member2', 17, '2021-11-18 13:52:33', '2021-11-18 13:53:10'),
(7, 'mem', 1, '2021-11-18 13:52:41', '2021-11-18 13:52:55'),
(8, 'www', 17, '2021-11-20 05:22:30', '2021-11-20 05:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2021-10-30-091114', 'App\\Database\\Migrations\\Useraccounts', 'default', 'App', 1635658759, 1),
(6, '2021-10-31-052620', 'App\\Database\\Migrations\\Poperties', 'default', 'App', 1635658760, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthsetups`
--

CREATE TABLE `monthsetups` (
  `id` int(11) NOT NULL,
  `monthname` varchar(20) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthsetups`
--

INSERT INTO `monthsetups` (`id`, `monthname`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'January', 17, '2021-11-11 13:07:53', '2021-11-17 12:00:19'),
(2, 'February', 17, '2021-11-11 13:08:03', '2021-11-17 12:00:19'),
(3, 'March', 17, '2021-11-11 13:08:10', '2021-11-17 12:00:19'),
(4, 'April', 17, '2021-11-11 13:08:19', '2021-11-18 13:56:24'),
(5, 'May', 17, '2021-11-11 13:08:25', '2021-11-17 12:00:19'),
(6, 'June', 17, '2021-11-11 13:08:30', '2021-11-17 12:00:19'),
(7, 'July', 17, '2021-11-11 13:08:36', '2021-11-17 12:00:19'),
(8, 'August', 17, '2021-11-11 13:08:43', '2021-11-23 08:53:29'),
(9, 'September', 17, '2021-11-11 13:08:53', '2021-11-17 12:00:19'),
(10, 'October', 17, '2021-11-11 13:09:02', '2021-11-17 12:00:19'),
(11, 'November', 17, '2021-11-11 13:09:09', '2021-11-17 12:00:19'),
(12, 'December', 17, '2021-11-11 13:09:16', '2021-11-17 12:00:19'),
(15, 'jan', 18, '2022-09-29 07:14:57', '2022-09-29 07:14:57'),
(16, 'januray', 94, '2023-05-30 09:24:38', '2023-05-30 09:24:38'),
(17, 'January', 100, '2023-06-05 09:45:26', '2023-06-05 09:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(100) NOT NULL,
  `notice_type` int(100) NOT NULL,
  `text_area` varchar(5000) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date`, `status`, `notice_type`, `text_area`, `property_id`) VALUES
(5, 'notice 1', '22-22-2344', 0, 1, '<p>please always be quiet..</p>', 0),
(7, 'Non incididunt dolor', '31-May-2009', 1, 3, '<p>hello world</p>', 17),
(8, 'weewee  wew w ewe3', '12-Apr-2018', 1, 3, '<p>hello&nbsp;</p>', 17),
(9, 'Est aut exercitatio', '07-Nov-1989', 1, 2, '<p>fgtghyk i</p>', 17),
(10, 'Sint earum est et es', '17-Jul-1997', 0, 3, '<p>yhujty u&nbsp;</p>', 17),
(11, 'Commodo modi natus d', '10-Feb-2018', 0, 1, '<p>qwsdcv</p>', 94);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `mailsub` text DEFAULT NULL,
  `mailbody` text DEFAULT NULL,
  `mailtags` text DEFAULT NULL,
  `systags` varchar(1000) DEFAULT NULL,
  `syscontent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `mailsub`, `mailbody`, `mailtags`, `systags`, `syscontent`) VALUES
(1, 'User invitation formm {app_name}', '                                                                      <p><img src=\"http://property_final.com/uploads/avater.png\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"></p><p>Hi {receiver_name}</p>\r\n\r\n          <p>Hope this mail finds you well and healthy. We are informing you that you\'ve been invited to our application by {action_by}. It\'ll be a great opportunity to work with you.</p>\r\n          <p><button class=\"btn btn-primary btn-sm\">Accept Invitation</button></p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p><p></p>                                           ', 'action_by,app_name,app_logo,receiver_name,invitation_url', NULL, NULL),
(2, 'Password reset link provided by {app_name}', '                               \r\n          <p>Hi {receiver_name}</p>\r\n\r\n          <p>Your request for reset password has been approved from {app_name}. Press the button below to reset the password.</p>\r\n          <p><a href=\"{link}\" class=\"btn btn-primary btn-sm\">Reset Password</a></p>\r\n          <p>We are highly expecting you as soon as possible. Hope you\'ll join us.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                   ', 'app_name,app_logo,receiver_name,reset_password_url', NULL, NULL),
(3, 'You have been invited to join {app_name} by {action_by}', '                                    <p><img src=\"http://property_final2.com/uploads/empty_image.jpg\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"><br></p>                                       <p class=\"text_add\"><br></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>Your Login credentials are given,\r\n          Email : {email}\r\n          Password : {password}\r\n          To set up your account, please use these credentials and go to the following link.</p>\r\n\r\n          <p><button class=\"btn btn-primary btn-sm\">Go to your account</button></p>\r\n          <p>You can change your password from your account password settings.</p>\r\n          <p>Hope you will find useful!</p>\r\n          <p>Thanks for being with us.</p>\r\n          <p>Regards,</p>  \r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                    ', 'action_by,app_name,app_logo,receiver_name,invitation_url,email,password', NULL, NULL),
(4, 'Invoice {invoice_number} for due {date}', '                                            <p class=\"text_add\"><img src=\"#\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\">{invoice_number}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>I hope you’re well!\r\n          Please see attached invoice {invoice_number}.\r\n          Don’t hesitate to contact us if you have any questions.</p>\r\n\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                           ', 'app_name,app_logo,receiver_name,invoice_number,date', NULL, NULL),
(5, 'Payment reminder for invoice {invoice_number}', '                                      <p class=\"text_add\">{app_name}{date}{receiver_name}<img src=\"#\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\">{date}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>We hope that you’re enjoying our service\r\n          We did want to quickly mention that we haven’t received payment from you yet.</p>\r\n          <p>If you have any questions don’t hesitate to reply to this email.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                        ', 'app_name,app_logo,receiver_name,invoice_number,date', NULL, NULL),
(6, 'Registration Confirmed', '<p><img src=\"http://property_final.com/uploads/avater.png\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"></p><p>Hi {receiver_name}</p>\r\n\r\n          <p>Welcome to our {app_name}.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p><p></p> ', 'name,action_by,app_name,app_logo,receiver_name,resource_url', 'app_name', 'A new user has been joined in {app_name}{app_name}'),
(7, 'A new roles has been created in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>                   ', 'name,action_by,app_name,app_logo,receiver_name,resource_url', 'name,action_by', 'A new roles named {name} has been created by {action_by}.'),
(8, 'A roles has been updated in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>         ', 'name,action_by,app_name,app_logo,receiver_name,resource_url', 'name,action_by', 'A roles named {name} has been updated by {action_by}.'),
(9, 'A roles has been deleted in {app_name}', '          <p class=\"text_add\">{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>We are going to inform you that a roles named has been deleted from our application by {action_by}.</p>\r\n\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>         ', 'name,action_by,app_name,app_logo,receiver_name', 'name,action_by', 'A roles named {name} has been deleted by {action_by}.');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `parmanent_address` varchar(500) NOT NULL,
  `nid` int(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `name`, `email`, `password`, `contact_no`, `present_address`, `parmanent_address`, `nid`, `image`, `property_id`) VALUES
(2, 'Germaine Rasmussen', 'ruxoq@mailinator.com', 'Pa$$w0rd!', '97', 'Vero et id temporib', 'Fugiat in cillum ve', 21, '1644221931_4b192d30bf10503da48e.jpg', 17),
(3, 'Dexter Bartlett', 'goge@mailinator.com', 'Pa$$w0rd!', '75', 'Quia qui facilis lor', 'Asperiores placeat ', 20, '1638424286_6e69792834e6ad195f79.png', 17),
(4, 'Xyla Banks', 'jafi@mailinator.com', 'Pa$$w0rd!', '60', 'Facere et dignissimo', 'Non lorem vitae volu', 53, '1685429864_7248c5e6cfeb5f854dae.jpg', 94),
(5, 'Hu Gentry', 'hupypopu@mailinator.com', 'Pa$$w0rd!', '37', 'Nemo amet voluptatu', 'Do vitae cillum ex e', 73, '1685958193_2db2dc23fde75de7b665.png', 100),
(6, 'Cheryl Osborn', 'hycituva@mailinator.com', 'Pa$$w0rd!', '43', 'Reprehenderit labor', 'Tempore molestiae n', 32, '1685958644_da5b00992ccb631ba2a0.png', 100);

-- --------------------------------------------------------

--
-- Table structure for table `owners_utility`
--

CREATE TABLE `owners_utility` (
  `id` int(100) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `water_bill` varchar(100) NOT NULL,
  `electric_bill` varchar(100) NOT NULL,
  `gas_bill` varchar(100) NOT NULL,
  `security_bill` varchar(100) NOT NULL,
  `utility_bill` varchar(100) NOT NULL,
  `others_bill` varchar(100) NOT NULL,
  `total_rent` varchar(100) NOT NULL,
  `issue_date` varchar(1000) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners_utility`
--

INSERT INTO `owners_utility` (`id`, `floor_id`, `unit_id`, `owner_name`, `owner_id`, `month`, `year`, `water_bill`, `electric_bill`, `gas_bill`, `security_bill`, `utility_bill`, `others_bill`, `total_rent`, `issue_date`, `property_id`) VALUES
(1, 3, 2, 'Germaine Rasmussen', 2, 'December', 2021, '11', '0.00', '800', '900', '0.00', '0.00', '1711', '2021-12-02', 17),
(2, 1, 1, 'Germaine Rasmussen', 2, 'April', 2019, '0.00', '0.00', '800', '900', '11', '0.00', '1711', '2021-12-02', 17),
(3, 12, 4, 'Xyla Banks', 4, 'januray', 2022, '0.00', '0.00', '800', '900', '0.00', '0.00', '1700.00', '2023-05-31', 94);

-- --------------------------------------------------------

--
-- Table structure for table `owner_to_unit`
--

CREATE TABLE `owner_to_unit` (
  `id` int(100) NOT NULL,
  `unit_id` int(100) NOT NULL,
  `unit_name` varchar(500) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_to_unit`
--

INSERT INTO `owner_to_unit` (`id`, `unit_id`, `unit_name`, `owner_id`, `property_id`) VALUES
(2, 3, 'Unit 3A', 3, 17),
(3, 1, 'Unit 1A', 2, 17),
(4, 4, '2nd', 4, 94),
(5, 5, '2', 5, 100),
(6, 5, '2', 6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `pakage`
--

CREATE TABLE `pakage` (
  `id` int(11) NOT NULL,
  `pakage_title` varchar(100) NOT NULL,
  `pakage_objective` varchar(1000) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `d_m_y` int(11) DEFAULT NULL,
  `how_many` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `property_limit` int(11) NOT NULL,
  `employee_limit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `price_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakage`
--

INSERT INTO `pakage` (`id`, `pakage_title`, `pakage_objective`, `duration`, `d_m_y`, `how_many`, `cost`, `property_limit`, `employee_limit`, `status`, `price_key`) VALUES
(16, 'premium', '<p><span style=\"background-color: #e03e2d; color: #ffffff;\"><strong>This is premium package.</strong></span></p>', '6', 0, 0, 499, 2, 5, 1, 'price_1MieIXFELs177fkvYXa5Pmmj'),
(17, 'premium3', '<p>e3rew</p>', '2', NULL, 0, 333, 33, 33, 0, 'price_1KTm8rAz8PdWFeeXyzc'),
(18, 'Silver', '<p>Hi i am Silver</p>', '3', NULL, 0, 299, 1, 20, 1, 'price_1MieJtFELs177fkvgQ07u36b'),
(19, 'Bronge', '<p>Bronge is always great</p>', '2', NULL, 0, 199, 15, 12, 1, 'price_1MieKSFELs177fkvmlsLCOG3'),
(20, 'Gold', '<p>Hello lets see gold</p>', 'other', 1, 30, 99, 10, 10, 1, 'price_1MieLBFELs177fkvEDArOX8q'),
(22, 'Daimond', '<p>1. new one.</p>\r\n<p>2. new two.</p>\r\n<p>2. new Three.</p>', '1', NULL, 0, 149, 12, 12, 1, 'price_1MieMiFELs177fkvFbCuzFct'),
(23, 'Molly Myers', '<p>1. new one&nbsp; w.</p>\r\n<p>2. new two w.</p>\r\n<p>2. new Three w.</p>', '2', NULL, 0, 222, 22, 22, 1, 'price_1MieNRFELs177fkvjWiPpMUZ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `payment_by` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `payment_expire_date` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL,
  `subscription_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_status`, `owner_id`, `payment_by`, `amount`, `transaction_id`, `payment_date`, `details`, `customer_id`, `payment_expire_date`, `package_id`, `subscription_id`) VALUES
(2, 'completed', 155, 'stripe', 299, 'cs_test_a1PzOfMFSglwPLubCl4adeQRplb6owrp3ds42iljZS5z5gLOjyfnrCxixw', '2023-03-07', '{\"id\":\"cs_test_a1PzOfMFSglwPLubCl4adeQRplb6owrp3ds42iljZS5z5gLOjyfnrCxixw\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":29900,\"amount_total\":29900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1678173135,\"currency\":\"usd\",\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_NTsSEAbcHQgXv3\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"afiqur.rahman@rssoft.win\",\"name\":\"123\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1678259535,\"invoice\":\"in_1MiuhDFELs177fkveUxGjjup\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1MiuhDFELs177fkv4j1Jl1ii\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/155\\/299\\/3\\/18\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_NTsSEAbcHQgXv3', '2023-06-07', 18, 'sub_1MiuhDFELs177fkv4j1Jl1ii'),
(3, 'completed', 155, 'stripe', 499, 'cs_test_a1NmOhPNpGJKhlBWcrOzzdX4oJfTMxFFkZ84QnnTj9FCMoRlvNA2S5DNqS', '2023-03-07', '{\"id\":\"cs_test_a1NmOhPNpGJKhlBWcrOzzdX4oJfTMxFFkZ84QnnTj9FCMoRlvNA2S5DNqS\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":49900,\"amount_total\":49900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1678173223,\"currency\":\"usd\",\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_NTsUVrAQY0GzzZ\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"afiqur.rahman@rssoft.win\",\"name\":\"123\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1678259623,\"invoice\":\"in_1MiujBFELs177fkvS0HhMcUO\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1MiujBFELs177fkvYpXwBZ1h\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/change_payment_confirm\\/155\\/499\\/6\\/16\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_NTsUVrAQY0GzzZ', '2023-09-07', 16, 'sub_1MiujBFELs177fkvYpXwBZ1h'),
(4, 'Completed', 155, 'paypal', 299, '4D5891137Y0098345', '2023-03-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"23:44:27 Mar 06, 2023 PST\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-GBR8PBADCUL6\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AWzpUeJEYYWXNHZUM-QNmWRmqtICAlcyaSurwVXEMFqSTYzWVhH4lw0q\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"4D5891137Y0098345\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"f388175f310c4\\\";}\"', 'SMKCGTV3H2UYE', '2023-06-05', 18, 'I-GBR8PBADCUL6'),
(5, 'Completed', 155, 'paypal', 299, '27M09350LJ613150H', '2023-03-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"23:47:40 Mar 06, 2023 PST\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-ABETESJXS7WF\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AXJvXu.YrhmiB9pQbwV.75ldA3k3AX-QL8SSbnKPGAUzlkJupQ-Yqk6u\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"27M09350LJ613150H\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"f6578390204e9\\\";}\"', 'SMKCGTV3H2UYE', '2023-06-05', 18, 'I-ABETESJXS7WF'),
(6, 'Completed', 155, 'paypal', 199, '4W382991NV4650041', '2023-03-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"199.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"23:54:18 Mar 06, 2023 PST\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:4:\\\"7.44\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-533VSXLLFCRX\\\";s:6:\\\"custom\\\";s:8:\\\"19,155,2\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AHUQcCfEx4qtQAyCmw6xGze3r2YaA.FQzP.6e4kLtORsEWjSjt3znryF\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"4W382991NV4650041\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:4:\\\"7.44\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"199.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"f4381008f31d5\\\";}\"', 'SMKCGTV3H2UYE', '2023-05-06', 19, 'I-533VSXLLFCRX'),
(7, 'Completed', 155, 'paypal', 499, '7PB00355FF056294C', '2023-03-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"01:25:32 Mar 07, 2023 PST\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-1KTBWARV07Y3\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"Avql8hVIwclRNOWSl.d6YTPUuKnGA9Q63TIHsrTG7opHxyLwvNJZSFJi\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"7PB00355FF056294C\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"f563980b3ee28\\\";}\"', 'SMKCGTV3H2UYE', '2023-09-03', 16, 'I-1KTBWARV07Y3'),
(8, 'Completed', 155, 'paypal', 299, '3DW37611YP962313G', '2023-05-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:54:54 May 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-MYEYS5K60A2L\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AZPhKeVDJ2aAeGkDq2FZ3ppXz9.QATdzDIzOpow9RgcERTIQtrk9Qoba\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"3DW37611YP962313G\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"c22a726f20ff4\\\";}\"', 'SMKCGTV3H2UYE', '2023-08-04', 18, 'I-MYEYS5K60A2L'),
(9, 'Completed', 155, 'paypal', 299, '7P287345VA448121J', '2023-05-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:06:37 May 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-GBR8PBADCUL6\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"Ad3nqgmGFUKHWiwJcWWbYssnsQIZAOteCIPlHJxN2fX7zDmx8E28RqtT\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"7P287345VA448121J\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"3e0a4c23111d1\\\";}\"', 'SMKCGTV3H2UYE', '2023-08-04', 18, 'I-GBR8PBADCUL6'),
(10, 'Completed', 155, 'paypal', 499, '91G79642AH425952J', '2023-05-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"05:06:34 May 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-RFVH2LMVP0PG\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"A3CwDWG3Kafg27qFvQA2nctztOngA45Z3hVllzMRrWM2dXLjBgXqL9zT\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"91G79642AH425952J\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"2cc7e59998bd0\\\";}\"', 'SMKCGTV3H2UYE', '2023-11-02', 16, 'I-RFVH2LMVP0PG'),
(11, 'Completed', 155, 'paypal', 199, '9WT33537JK490820N', '2023-05-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"199.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"05:22:39 May 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:4:\\\"7.44\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-533VSXLLFCRX\\\";s:6:\\\"custom\\\";s:8:\\\"19,155,2\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AN3aT2Q0z4U2tpYBbFJdIrej6JGbAjXPeuwyPr9S1UE0j.ue5oEyG0u9\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"9WT33537JK490820N\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:4:\\\"7.44\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"199.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"abe37796fcac9\\\";}\"', 'SMKCGTV3H2UYE', '2023-07-05', 19, 'I-533VSXLLFCRX'),
(12, 'Completed', 155, 'paypal', 499, '5989590605600913C', '2023-05-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:22:48 May 07, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-1KTBWARV07Y3\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"A9Nn.fxtMXsdN.fswm3EwL8T5ws-AkR7ma3mSdd08tmPSYtejOhIl6-6\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"5989590605600913C\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"4b16f1e22ead8\\\";}\"', 'SMKCGTV3H2UYE', '2023-11-03', 16, 'I-1KTBWARV07Y3'),
(13, 'completed', 165, 'stripe', 499, 'cs_test_a1V7x4RNH7snDbmQ2bOqxTlQ9LKFHV6Ye8B41AJFDmxlhIoJW82hktKdu9', '2023-05-27', '{\"id\":\"cs_test_a1V7x4RNH7snDbmQ2bOqxTlQ9LKFHV6Ye8B41AJFDmxlhIoJW82hktKdu9\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":49900,\"amount_total\":49900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685190025,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_NyIiAnlWESkDll\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"afiqur.rahman@rssoft.win\",\"name\":\"shukriti das\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1685276425,\"invoice\":\"in_1NCM70FELs177fkvbTgLWPIb\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NCM70FELs177fkvd36zHyeQ\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/165\\/499\\/6\\/16\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_NyIiAnlWESkDll', '2023-11-27', 16, 'sub_1NCM70FELs177fkvd36zHyeQ'),
(14, 'completed', 166, 'stripe', 299, 'cs_test_a1gTkMHzHXKE7AFNm5HqPMHMbeHuIdKUrRMEuLv7WferXAxOy6RsmIWM65', '2023-05-27', '{\"id\":\"cs_test_a1gTkMHzHXKE7AFNm5HqPMHMbeHuIdKUrRMEuLv7WferXAxOy6RsmIWM65\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":29900,\"amount_total\":29900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685248329,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_NyYOP4VqONS03D\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"afiqur.rahman@rssoft.win\",\"name\":\"shukriti das\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1685334729,\"invoice\":\"in_1NCbHIFELs177fkvFW1pETZN\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NCbHIFELs177fkvIq7bUsPS\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/166\\/299\\/3\\/18\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_NyYOP4VqONS03D', '2023-08-27', 18, 'sub_1NCbHIFELs177fkvIq7bUsPS'),
(15, 'completed', 167, 'stripe', 499, 'cs_test_a1iI73hZANacNxjIpTEROwViqkM3ZbtHsOQJqnU8GI18EG7X0XZYEgoFjf', '2023-05-28', '{\"id\":\"cs_test_a1iI73hZANacNxjIpTEROwViqkM3ZbtHsOQJqnU8GI18EG7X0XZYEgoFjf\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":49900,\"amount_total\":49900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685251766,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_NyZJX0b9gKAAU8\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"afiqur.rahman@rssoft.win\",\"name\":\"shukriti das\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1685338166,\"invoice\":\"in_1NCcAhFELs177fkvtosfQuBm\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NCcAhFELs177fkvdZ6fL7rn\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/167\\/499\\/6\\/16\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_NyZJX0b9gKAAU8', '2023-11-28', 16, 'sub_1NCcAhFELs177fkvdZ6fL7rn'),
(16, 'completed', 168, 'stripe', 99, 'cs_test_a1tF2KhGSgTlMnWJuAOK9DE11owE4cNjXAySxzDFQVVtHNwSAkqg2bteVa', '2023-05-29', '{\"id\":\"cs_test_a1tF2KhGSgTlMnWJuAOK9DE11owE4cNjXAySxzDFQVVtHNwSAkqg2bteVa\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":9900,\"amount_total\":9900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685339194,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_NywoRt2Kd8RLLk\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"afiqur.rahman@rssoft.win\",\"name\":\"shukriti das\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1685425594,\"invoice\":\"in_1NCyuqFELs177fkvc0Zj3PNI\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NCyuqFELs177fkvWP5le9n8\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/168\\/99\\/301\\/20\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_NywoRt2Kd8RLLk', '2048-06-29', 20, 'sub_1NCyuqFELs177fkvWP5le9n8'),
(17, 'completed', 169, 'stripe', 199, 'cs_test_a1FVM2MoMlZ1L1K9RWtv3zi7Z01SWOvTq2YxPqUXQiByNYfuYMMzG8smqY', '2023-06-05', '{\"id\":\"cs_test_a1FVM2MoMlZ1L1K9RWtv3zi7Z01SWOvTq2YxPqUXQiByNYfuYMMzG8smqY\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":19900,\"amount_total\":19900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685958071,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_O1dBmU797itbho\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"CR\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"qapakim@mailinator.com\",\"name\":\"Eagan Anderson\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1686044471,\"invoice\":\"in_1NFZvBFELs177fkvXxv7BQP9\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NFZvBFELs177fkv6LJvRtDV\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/169\\/199\\/2\\/19\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_O1dBmU797itbho', '2023-08-05', 19, 'sub_1NFZvBFELs177fkv6LJvRtDV'),
(18, 'Completed', 155, 'paypal', 199, '7NW69544NM032530K', '2023-06-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"199.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:19:04 Jun 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:4:\\\"7.44\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-6BWEUU35B5JT\\\";s:6:\\\"custom\\\";s:8:\\\"19,155,2\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AJGJI6tt5tG5EMBDeammzsGWQTCyACDuq-5fZdl9sDj8DlFZofARQ0KK\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"7NW69544NM032530K\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:4:\\\"7.44\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"199.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"ee3957032773f\\\";}\"', '8RD5RPT64DPF2', '2023-08-04', 19, 'I-6BWEUU35B5JT'),
(19, 'Completed', 155, 'paypal', 499, '04L33971BM518105X', '2023-06-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:08:45 Jun 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-X4DFBT6USFL3\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"A-G1n6tR-Rnt4PnJkixt0PPdcWEDAp6rMINFy74ae5cmhTZp031CYaaQ\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"04L33971BM518105X\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"1f801954b11b2\\\";}\"', '8RD5RPT64DPF2', '2023-12-02', 16, 'I-X4DFBT6USFL3'),
(20, 'Completed', 155, 'paypal', 499, '2K696374TK3299151', '2023-06-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:38:16 Jun 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-TRGYFF5AH7M1\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"ASvCi.D-Is.GtaHsUnfRUUpOBHImAIuZRmvDbB9Jl9R0TnYAwLHNCOb0\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"2K696374TK3299151\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"0f21d25817f6a\\\";}\"', '8RD5RPT64DPF2', '2023-12-02', 16, 'I-TRGYFF5AH7M1'),
(21, 'Completed', 155, 'paypal', 499, '9HF09116NP020712L', '2023-06-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:43:11 Jun 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-MRPJ7J0BTKPH\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"A8PiOurJ1pfGWJsUernojno.idsRAxFXO6iyDgdO4IGqmLTCLoOi2xGP\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"9HF09116NP020712L\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"3576a7b32fdcc\\\";}\"', '8RD5RPT64DPF2', '2023-12-02', 16, 'I-MRPJ7J0BTKPH'),
(22, 'Completed', 155, 'paypal', 499, '9HF09116NP020712L', '2023-06-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:43:11 Jun 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-MRPJ7J0BTKPH\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"A8PiOurJ1pfGWJsUernojno.idsRAxFXO6iyDgdO4IGqmLTCLoOi2xGP\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"9HF09116NP020712L\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"3576a7b32fdcc\\\";}\"', '8RD5RPT64DPF2', '2023-12-02', 16, 'I-MRPJ7J0BTKPH'),
(23, 'Completed', 155, 'paypal', 499, '9FC09667P5393590F', '2023-06-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:25:59 Jun 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-RFVH2LMVP0PG\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AOUlu6rhMJdFEJ2oxFLkfW3a9mh-AOzDEWpBJI9M0runEbHCoOXOsUDf\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"9FC09667P5393590F\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"7866c1c85ebc2\\\";}\"', 'SMKCGTV3H2UYE', '2023-12-03', 16, 'I-RFVH2LMVP0PG'),
(24, 'Completed', 155, 'paypal', 199, '98152696V3800154N', '2023-06-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"199.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:36:53 Jun 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:4:\\\"7.44\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-533VSXLLFCRX\\\";s:6:\\\"custom\\\";s:8:\\\"19,155,2\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AAcpDruqYjbaEWFqYdHq6jc29GGjACt.YT5.1XaNMbk.enVKunaCESIW\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"98152696V3800154N\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:4:\\\"7.44\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"199.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"12f847de2b8de\\\";}\"', 'SMKCGTV3H2UYE', '2023-08-05', 19, 'I-533VSXLLFCRX'),
(25, 'Completed', 155, 'paypal', 299, '8XW06677SA324024S', '2023-06-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:17:13 Jun 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-GBR8PBADCUL6\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"A3ZLRJqta8Q0-s.S2TpwCnkS3DsoAP2V3mL8D0ISulFPXC-QRQPxVXDf\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"8XW06677SA324024S\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"4aa4b9adedae4\\\";}\"', 'SMKCGTV3H2UYE', '2023-09-04', 18, 'I-GBR8PBADCUL6');
INSERT INTO `payment` (`id`, `payment_status`, `owner_id`, `payment_by`, `amount`, `transaction_id`, `payment_date`, `details`, `customer_id`, `payment_expire_date`, `package_id`, `subscription_id`) VALUES
(26, 'Completed', 155, 'paypal', 299, '75D4654716008702P', '2023-06-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:50:47 Jun 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-MYEYS5K60A2L\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AqrsizPCQYLp2UlWBeRRC-k6nDvzAEgCBRBTmwNMqaMH1yzPYRlaX2KK\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"75D4654716008702P\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"61002121374a0\\\";}\"', 'SMKCGTV3H2UYE', '2023-09-04', 18, 'I-MYEYS5K60A2L'),
(27, 'completed', 170, 'stripe', 299, 'cs_test_a1druupF8lYjKn3d9khh6esjA05okp77BgxmS0SOW3ztYsSTDckhv9KNYp', '2023-06-06', '{\"id\":\"cs_test_a1druupF8lYjKn3d9khh6esjA05okp77BgxmS0SOW3ztYsSTDckhv9KNYp\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":29900,\"amount_total\":29900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1686112049,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_O2IZiKY8SYzoQ2\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BV\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"qojuz@mailinator.com\",\"name\":\"Kenyon Pollard\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1686198449,\"invoice\":\"in_1NGDyWFELs177fkvG4MOUKGN\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NGDyWFELs177fkvLI1bwDh7\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/170\\/299\\/3\\/18\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_O2IZiKY8SYzoQ2', '2023-09-06', 18, 'sub_1NGDyWFELs177fkvLI1bwDh7'),
(28, 'completed', 155, 'stripe', 499, 'cs_test_a1wohCFhSssQLdvxWnj2XYA2ip7t4GXV58clCxkONpIggpv9IVm3ib8fWF', '2023-06-06', '{\"id\":\"cs_test_a1wohCFhSssQLdvxWnj2XYA2ip7t4GXV58clCxkONpIggpv9IVm3ib8fWF\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":49900,\"amount_total\":49900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1686112283,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_O2IdV56AZ0c0P0\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"super@admin.com\",\"name\":\"Kenyon Pollard\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1686198683,\"invoice\":\"in_1NGE2QFELs177fkvKtnzCiom\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NGE2QFELs177fkvHvIHeMnB\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/change_payment_confirm\\/155\\/499\\/6\\/16\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_O2IdV56AZ0c0P0', '2023-12-06', 16, 'sub_1NGE2QFELs177fkvHvIHeMnB'),
(29, 'completed', 171, 'stripe', 299, 'cs_test_a1yQW9RbLZ9hqzaf62WFoNGT7rc4cDmxHJHhdeEVlVejayn2e40W1Iy6yv', '2023-06-07', '{\"id\":\"cs_test_a1yQW9RbLZ9hqzaf62WFoNGT7rc4cDmxHJHhdeEVlVejayn2e40W1Iy6yv\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":29900,\"amount_total\":29900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1686116275,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_O2JhHPE6QJGhV1\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"super@admin.com\",\"name\":\"Kenyon Pollard\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1686202675,\"invoice\":\"in_1NGF4MFELs177fkv1TQI4kB4\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NGF4MFELs177fkvnv8P1GLh\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/171\\/299\\/3\\/18\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_O2JhHPE6QJGhV1', '2023-09-07', 18, 'sub_1NGF4MFELs177fkvnv8P1GLh'),
(30, 'Completed', 155, 'paypal', 499, '7U204794FY7120033', '2023-06-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:02:05 Jun 07, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-1KTBWARV07Y3\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AWkEyPyf.bOsVtCvFOzt5g8lcnOOAygGf1CFnQdPq7zWvbX.GCRdFe7e\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"7U204794FY7120033\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"d030e005c6664\\\";}\"', 'SMKCGTV3H2UYE', '2023-12-04', 16, 'I-1KTBWARV07Y3'),
(31, 'completed', 172, 'stripe', 299, 'cs_test_a1T0IJKQWHTXFJRUqkqDd8lY6g8vmUv6u27Mqm1u8JBq4TR5FuSe0HkiN6', '2023-06-07', '{\"id\":\"cs_test_a1T0IJKQWHTXFJRUqkqDd8lY6g8vmUv6u27Mqm1u8JBq4TR5FuSe0HkiN6\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":29900,\"amount_total\":29900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1686136075,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_O2P1xEPURGEhSb\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"super@admin.com\",\"name\":\"Kenyon Pollard\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1686222475,\"invoice\":\"in_1NGKDuFELs177fkveJzspwwF\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NGKDuFELs177fkvM1dd0SA5\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/payment_method_check\\/172\\/299\\/3\\/18\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_O2P1xEPURGEhSb', '2023-09-07', 18, 'sub_1NGKDuFELs177fkvM1dd0SA5'),
(32, 'completed', 155, 'stripe', 199, 'cs_test_a19XgpEGKQr81yq420yjgPIm8t3XFQSYG9CCmJhdamBQT0cXB2kIHjIw7q', '2023-06-07', '{\"id\":\"cs_test_a19XgpEGKQr81yq420yjgPIm8t3XFQSYG9CCmJhdamBQT0cXB2kIHjIw7q\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":19900,\"amount_total\":19900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"https:\\/\\/wd.rssoft.win\\/property\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1686142108,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_O2QeFQWcMqcssp\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"super@admin.com\",\"name\":\"Kenyon Pollard\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1686228508,\"invoice\":\"in_1NGLn2FELs177fkvLjwRFy5T\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NGLn2FELs177fkvL7QvukZw\",\"success_url\":\"https:\\/\\/wd.rssoft.win\\/property\\/admin\\/change_payment_confirm\\/155\\/199\\/2\\/19\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_O2QeFQWcMqcssp', '2023-08-07', 19, 'sub_1NGLn2FELs177fkvL7QvukZw'),
(33, 'Completed', 155, 'paypal', 499, '6HN723033U250515X', '2023-07-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:44:43 Jul 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-MRPJ7J0BTKPH\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"ABlLYlJXrwUWDhF71SK.kcrBWPRzAk1Io9img4CFLns82kh0dAzkAFR0\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"6HN723033U250515X\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"7f7c089febf4c\\\";}\"', '8RD5RPT64DPF2', '2024-01-01', 16, 'I-MRPJ7J0BTKPH'),
(34, 'Completed', 155, 'paypal', 199, '9RP92226J89561401', '2023-07-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"199.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:58:48 Jul 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:4:\\\"7.44\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-6BWEUU35B5JT\\\";s:6:\\\"custom\\\";s:8:\\\"19,155,2\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AR3Bnd85qDAG2ivRgEH-F3bq0tH3AuC6Gb8r-8N3mvFhnKt2VTp5hWmk\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"9RP92226J89561401\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:4:\\\"7.44\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"199.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"b595b4d61f677\\\";}\"', '8RD5RPT64DPF2', '2023-09-03', 19, 'I-6BWEUU35B5JT'),
(35, 'Completed', 155, 'paypal', 499, '6863826126614293C', '2023-07-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:05:23 Jul 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-X4DFBT6USFL3\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AnvP3ftd4SGN4MB7i5LbesLhEleWARBphkN5r0OWf0BzWpR3Dw1.wJf.\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"6863826126614293C\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"692e56ede1870\\\";}\"', '8RD5RPT64DPF2', '2024-01-01', 16, 'I-X4DFBT6USFL3'),
(36, 'Completed', 155, 'paypal', 499, '1Y707542G8253274J', '2023-07-05', '\"a:37:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"8RD5RPT64DPF2\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"05:29:54 Jul 05, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:8:\\\"John Doe\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-TRGYFF5AH7M1\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AGnnD3ywBuxDkkHJcuRUqLqGUh3nAdQM2iGl4Lj0-vjwOxmweaJjLcNg\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-eat8t21579399@personal.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"1Y707542G8253274J\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"81e5afec85a10\\\";}\"', '8RD5RPT64DPF2', '2024-01-01', 16, 'I-TRGYFF5AH7M1'),
(37, 'Completed', 155, 'paypal', 199, '62L57127JD966084A', '2023-07-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"199.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:16:04 Jul 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:4:\\\"7.44\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-533VSXLLFCRX\\\";s:6:\\\"custom\\\";s:8:\\\"19,155,2\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AbBqK0mqA3NiypwGT50MLA3IeoYcA-1NsmXoXdgw6PIvtBn9zFkr0m89\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"62L57127JD966084A\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:4:\\\"7.44\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"199.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"aff400b27952d\\\";}\"', 'SMKCGTV3H2UYE', '2023-09-04', 19, 'I-533VSXLLFCRX'),
(38, 'Completed', 155, 'paypal', 499, '9HP42995RK6439412', '2023-07-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:42:13 Jul 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-RFVH2LMVP0PG\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AR-Q8C3e9qovwJ6BGJp4m--xbfSsAPaFKYP.ndziNu.UI7AorNkXlQmB\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"9HP42995RK6439412\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"dbc961a8dd1ce\\\";}\"', 'SMKCGTV3H2UYE', '2024-01-02', 16, 'I-RFVH2LMVP0PG'),
(39, 'Completed', 155, 'paypal', 299, '75462002NY097812P', '2023-07-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"03:47:41 Jul 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-GBR8PBADCUL6\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"APrbIaM1yNjJ-IE0q9Nw6S2GJ3zdAIDXhdJZvLxTS9vN5BfqclBcXPVr\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"75462002NY097812P\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"40d460d9c8f8c\\\";}\"', 'SMKCGTV3H2UYE', '2023-10-04', 18, 'I-GBR8PBADCUL6'),
(40, 'Completed', 155, 'paypal', 299, '77P64335GA1260506', '2023-07-06', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"299.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"05:06:59 Jul 06, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"10.93\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-MYEYS5K60A2L\\\";s:6:\\\"custom\\\";s:8:\\\"18,155,3\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"AG6vNVxaPq5ejcUVj-1yie8a2CxeADE7DT4DOtPckvWYXvg8BnQ6ozt-\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"77P64335GA1260506\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"10.93\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"299.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"184f04fdb3a35\\\";}\"', 'SMKCGTV3H2UYE', '2023-10-04', 18, 'I-MYEYS5K60A2L'),
(41, 'Completed', 155, 'paypal', 499, '43A068795G178951P', '2023-07-07', '\"a:38:{s:8:\\\"mc_gross\\\";s:6:\\\"499.00\\\";s:22:\\\"protection_eligibility\\\";s:8:\\\"Eligible\\\";s:14:\\\"address_status\\\";s:9:\\\"confirmed\\\";s:8:\\\"payer_id\\\";s:13:\\\"SMKCGTV3H2UYE\\\";s:14:\\\"address_street\\\";s:9:\\\"1 Main St\\\";s:12:\\\"payment_date\\\";s:25:\\\"04:47:10 Jul 07, 2023 PDT\\\";s:14:\\\"payment_status\\\";s:9:\\\"Completed\\\";s:7:\\\"charset\\\";s:12:\\\"windows-1252\\\";s:11:\\\"address_zip\\\";s:5:\\\"95131\\\";s:10:\\\"first_name\\\";s:4:\\\"John\\\";s:6:\\\"mc_fee\\\";s:5:\\\"17.91\\\";s:20:\\\"address_country_code\\\";s:2:\\\"US\\\";s:12:\\\"address_name\\\";s:10:\\\"Test Store\\\";s:14:\\\"notify_version\\\";s:3:\\\"3.9\\\";s:9:\\\"subscr_id\\\";s:14:\\\"I-1KTBWARV07Y3\\\";s:6:\\\"custom\\\";s:8:\\\"16,155,6\\\";s:12:\\\"payer_status\\\";s:8:\\\"verified\\\";s:8:\\\"business\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:15:\\\"address_country\\\";s:13:\\\"United States\\\";s:12:\\\"address_city\\\";s:8:\\\"San Jose\\\";s:11:\\\"verify_sign\\\";s:56:\\\"Awx.ekKgcghzXpzQa8KuXPa-4ySuAwdfsLHzwdxdzNMWgGvs0go--Iip\\\";s:11:\\\"payer_email\\\";s:37:\\\"sb-43sjdp7587271@business.example.com\\\";s:6:\\\"txn_id\\\";s:17:\\\"43A068795G178951P\\\";s:12:\\\"payment_type\\\";s:7:\\\"instant\\\";s:19:\\\"payer_business_name\\\";s:10:\\\"Test Store\\\";s:9:\\\"last_name\\\";s:3:\\\"Doe\\\";s:13:\\\"address_state\\\";s:2:\\\"CA\\\";s:14:\\\"receiver_email\\\";s:24:\\\"ashadozzaman@sahajjo.com\\\";s:11:\\\"payment_fee\\\";s:5:\\\"17.91\\\";s:11:\\\"receiver_id\\\";s:13:\\\"XZUM9N8JNQD2C\\\";s:8:\\\"txn_type\\\";s:14:\\\"subscr_payment\\\";s:9:\\\"item_name\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:11:\\\"mc_currency\\\";s:3:\\\"USD\\\";s:17:\\\"residence_country\\\";s:2:\\\"US\\\";s:8:\\\"test_ipn\\\";s:1:\\\"1\\\";s:19:\\\"transaction_subject\\\";s:21:\\\"Alice\'s Weekly Digest\\\";s:13:\\\"payment_gross\\\";s:6:\\\"499.00\\\";s:12:\\\"ipn_track_id\\\";s:13:\\\"264caeb375d38\\\";}\"', 'SMKCGTV3H2UYE', '2024-01-03', 16, 'I-1KTBWARV07Y3'),
(42, 'completed', 174, 'stripe', 499, 'cs_test_a1kpAKNArIqtu8B49CGpKH6PW2fkPNBdc0P5b9GTeEt5cbj3hH05vPpCWS', '2023-07-16', '{\"id\":\"cs_test_a1kpAKNArIqtu8B49CGpKH6PW2fkPNBdc0P5b9GTeEt5cbj3hH05vPpCWS\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":49900,\"amount_total\":49900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/poperty.test:8080\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1689484364,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_OGv6Eh4jSjgc6a\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"DM\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"hywori@mailinator.com\",\"name\":\"Idola Livingston\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1689570764,\"invoice\":\"in_1NUNGjFELs177fkvcKgKzzXO\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NUNGjFELs177fkvllCkfzXh\",\"success_url\":\"http:\\/\\/poperty.test:8080\\/admin\\/payment_method_check\\/174\\/499\\/6\\/16\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_OGv6Eh4jSjgc6a', '2024-01-16', 16, 'sub_1NUNGjFELs177fkvllCkfzXh'),
(43, 'completed', 178, 'stripe', 499, 'cs_test_a1Xp7sMVA6vC6SPJOJbmKcxvDhGsrmy6ZpyA4wtgDcZ9kdeojMiEE2Ti1I', '2023-07-16', '{\"id\":\"cs_test_a1Xp7sMVA6vC6SPJOJbmKcxvDhGsrmy6ZpyA4wtgDcZ9kdeojMiEE2Ti1I\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":49900,\"amount_total\":49900,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/poperty.test:8080\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1689505319,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":\"cus_OH0kGH9X38uh4g\",\"customer_creation\":null,\"customer_details\":{\"address\":{\"city\":null,\"country\":\"GG\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"kepehifyx@mailinator.com\",\"name\":\"Idola Livingston\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"expires_at\":1689591719,\"invoice\":\"in_1NUSipFELs177fkvYzawr63V\",\"invoice_creation\":null,\"livemode\":false,\"locale\":null,\"metadata\":{},\"mode\":\"subscription\",\"payment_intent\":null,\"payment_link\":null,\"payment_method_collection\":null,\"payment_method_options\":null,\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":\"sub_1NUSipFELs177fkvhNVzJwhk\",\"success_url\":\"http:\\/\\/poperty.test:8080\\/admin\\/payment_method_check\\/178\\/499\\/6\\/16\\/{CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":null}', 'cus_OH0kGH9X38uh4g', '2024-01-16', 16, 'sub_1NUSipFELs177fkvhNVzJwhk');

-- --------------------------------------------------------

--
-- Table structure for table `popertieimages`
--

CREATE TABLE `popertieimages` (
  `id` int(11) NOT NULL,
  `popertyid` int(5) NOT NULL,
  `multiimage` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poperties`
--

CREATE TABLE `poperties` (
  `id` int(11) NOT NULL,
  `propertyname` varchar(50) NOT NULL,
  `streetads` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `owner` int(5) NOT NULL,
  `image` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poperties`
--

INSERT INTO `poperties` (`id`, `propertyname`, `streetads`, `city`, `state`, `zip`, `country`, `owner`, `image`, `company_id`, `created_at`, `updated_at`) VALUES
(92, 'Rs Poperty', 'Plot 1/B, Road 1, Sector 1, Uttara, Uttara, Dhaka,', 'dhaka', 'dhaka', '1230', 'BD', 154, '1677504632_aa4ca54c861406a4df89.jpg', 56, '2023-02-27 13:30:32', '2023-02-27 13:30:32'),
(93, 'Rs Poperty wsdc', 'Plot 1/B, Road 1, Sector 1, Uttara, Uttara, Dhaka,', 'dhaka', 'dhaka', '1230', 'BD', 154, '1677504716_b85cf05909c909a67fc8.jpg', 56, '2023-02-27 13:31:56', '2023-02-27 13:31:56'),
(94, 'Wallace Alvarez', 'Et elit aut eiusmod', 'Consequatur magna fu', 'Molestiae blanditiis', '79702', 'AZ', 155, 'empty_image.jpg', 57, '2023-03-04 14:03:58', '2023-03-04 14:03:58'),
(95, 'Sydnee Munoz', 'Fuga Eius excepteur', 'Ipsum omnis consequu', 'Perspiciatis dolori', '77702', 'BH', 155, 'empty_image.jpg', 57, '2023-03-07 07:04:42', '2023-03-07 07:04:42'),
(96, 'Jonah Meyers', 'Irure beatae quis il', 'Voluptatem cupidatat', 'Nostrud deserunt ame', '44568', 'AZ', 165, '1685190172_58288eb7a62bde60452a.jpg', 58, '2023-05-27 12:22:52', '2023-05-27 12:22:52'),
(97, 'Prescott Guy', 'Numquam consequatur ', 'Nihil sit cupidatat ', 'Sed sunt quis neces', '76489', 'KH', 166, '1685248403_6d8ac0884932792fe88c.jpg', 59, '2023-05-28 04:33:23', '2023-05-28 04:33:23'),
(98, 'Alden Madden', 'Enim totam quod veni', 'Est et blanditiis di', 'Modi qui vel dolor a', '77052', 'BH', 167, 'empty_image.jpg', 60, '2023-05-28 05:30:16', '2023-05-28 05:30:16'),
(99, 'Audra Hickman', 'Voluptatibus dolore ', 'Iure nostrum harum m', 'Proident quibusdam ', '31884', 'BD', 168, '1685339262_1e0014371bad14021137.png', 61, '2023-05-29 05:47:42', '2023-05-29 05:47:42'),
(100, 'Abigail Holt', 'Ut aute dolore vitae', 'Autem consequatur C', 'Inventore eaque ipsu', '84538', 'KH', 169, '1685958155_f86af987392a39859f80.jpg', 62, '2023-06-05 09:42:35', '2023-06-05 09:42:35'),
(101, 'Prescott Hunt', 'Impedit fugiat labo', 'Quis exercitationem ', 'Doloremque aliquam e', '89548', 'KH', 170, 'empty_image.jpg', 63, '2023-06-07 04:29:52', '2023-06-07 04:29:52'),
(102, 'Samuel Juarez', 'Adipisci molestias c', 'Ut soluta magni assu', 'Repellendus Irure d', '54512', 'BH', 174, '1689484461_2525d8d4cfaa0b9319f3.jpg', 64, '2023-07-16 05:14:21', '2023-07-16 05:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(100) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `month` int(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `renter_name` varchar(100) NOT NULL,
  `tenent_id` int(100) NOT NULL,
  `tenent_image` varchar(500) NOT NULL,
  `rent` varchar(100) NOT NULL,
  `water_bill` varchar(100) NOT NULL,
  `gas_bill` varchar(100) NOT NULL,
  `electric_bill` varchar(100) NOT NULL,
  `security_bill` varchar(100) NOT NULL,
  `utility_bill` varchar(100) NOT NULL,
  `other_bill` varchar(100) NOT NULL,
  `total_rent` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `bill_paid_date` varchar(100) NOT NULL,
  `bill_status` int(100) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `floor_id`, `unit_id`, `month`, `year`, `renter_name`, `tenent_id`, `tenent_image`, `rent`, `water_bill`, `gas_bill`, `electric_bill`, `security_bill`, `utility_bill`, `other_bill`, `total_rent`, `issue_date`, `bill_paid_date`, `bill_status`, `property_id`) VALUES
(18, 1, 1, 3, '2022', 'Tate Fischer', 1, '1638424588_1f1930ce2cc76fbfc355.png', '7000', '100', '300', '200', '200', '400', '300', '1500', '2022-01-30', '2022-02-28', 0, 17),
(19, 1, 1, 5, '2022', 'Tate Fischer', 1, '1638424588_1f1930ce2cc76fbfc355.png', '7000', '0.00', '0.00', '800', '100', '0.00', '0.00', '900', '2022-05-03', '2022-02-03', 0, 17),
(23, 1, 1, 8, '2022', 'Tate Fischer', 1, '1638424588_1f1930ce2cc76fbfc355.png', '7000', '250', '800', '600', '900', '300', '200', '3050', '2022-08-10', '2022-02-20', 0, 17),
(24, 1, 1, 9, '2022', 'Tate Fischer', 1, '1638424588_1f1930ce2cc76fbfc355.png', '7000', '500', '800', '600', '900', '300', '200', '3300', '2022-09-23', '2022-02-15', 0, 17),
(25, 12, 4, 0, '2022', 'Eugenia Hogan', 2, '1685438850_d2ebcb88975a8d1b0b6c.jpg', '5', '20.00', '20.00', '800', '900', '10.00', '10.00', '1760', '2023-06-05', '2023-06-06', 1, 94),
(26, 12, 4, 0, '2022', 'Eugenia Hogan', 2, '1685438850_d2ebcb88975a8d1b0b6c.jpg', '5', '20.00', '20.00', '800', '900', '10.00', '10.00', '1760', '2023-06-05', '2023-06-06', 1, 94),
(27, 13, 5, 0, '2023', 'Amaya Joyner', 4, '1685958362_8952827de9bbaaa63215.png', '4', '10.00', '10.00', '800', '900', '10.00', '10.00', '1740', '2023-06-05', '2023-06-05', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(100) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `user_access` text NOT NULL,
  `status` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `asName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `user_access`, `status`, `company_id`, `property_id`, `asName`) VALUES
(9, 'employee', '{\"poperty_add\":null,\"poperty_images\":null,\"visitordetails\":null,\"complaindetails\":null,\"floor_l\":null,\"floor_a\":null,\"floor_e\":null,\"floor_d\":null,\"unit_l\":\"unit_list\",\"unit_a\":\"unit_add\",\"unit_e\":\"unit_edit\",\"unit_d\":\"unit_delete\",\"owner_l\":\"ownerlist\",\"owner_a\":\"owneradd\",\"owner_e\":\"ownerupdate\",\"owner_d\":\"ownerdelete\",\"indivusualowner\":null,\"tenant_l\":\"tenant_list\",\"tenant_a\":\"tenant_add\",\"tenant_e\":\"tenant_edit\",\"tenant_d\":\"tenant_delete\",\"tenant_view\":null,\"tenant_depand\":null,\"employee_l\":\"employeelist\",\"employee_a\":\"employeeadd\",\"employee_e\":\"employeeupdate\",\"employee_d\":\"employeedelete\",\"indivisualemployee\":null,\"emp_salary_addandlist\":\"employeesalary\",\"getindivisualemployee\":\"getindivisualemployee\",\"emp_salaery_e\":\"employeesalaryupdate\",\"emp_salaery_d\":\"employeesalarydelete\",\"indivisualemployeesalary\":null,\"employeeleave\":null,\"rent_l\":\"rentlist\",\"rent_a\":\"addrent\",\"gettenent\":null,\"rent_e\":\"rentupdate\",\"rent_d\":\"rentdelete\",\"indivusualrent\":null,\"rentinvoice\":null,\"printrentinvoice\":null,\"utility_l\":\"ownerutilitylist\",\"utility_a\":\"ownerutilityadd\",\"getunits\":null,\"getowner\":null,\"utility_e\":\"ownerutilityupdate\",\"utility_d\":\"ownerutilitydelete\",\"indivusualutility\":null,\"cost_l\":\"maintenance_list\",\"cost_a\":\"maintenance_add\",\"cost_e\":\"maintenance_edit\",\"cost_d\":\"maintenance_delete\",\"maintenance_view\":null,\"committee_l\":\"committee_list\",\"committee_a\":\"committee_add\",\"committee_e\":\"committee_edit\",\"committee_d\":\"committee_delete\",\"committee_view\":null,\"fund_l\":\"fundlist\",\"fund_a\":\"addfund\",\"fund_e\":\"fundupdate\",\"fund_d\":\"funddelete\",\"indivisualfund\":null,\"invoice\":null,\"printfundinvoice\":null,\"bill_l\":\"billdipositlist\",\"bill_a\":\"addbill\",\"bill_e\":\"billupdate\",\"bill_d\":\"billdelete\",\"indivisualbill\":null,\"complain_l\":\"complain_list\",\"complain_a\":\"complain_add\",\"complain_e\":\"complain_edit\",\"complain_d\":\"complain_delete\",\"complain_view\":null,\"complain_solution\":null,\"solution_add\":null,\"assign_employee\":null,\"get_employee\":null,\"visitor_l\":\"visitor_list\",\"visitor_a\":\"visitor_add\",\"visitor_e\":\"visitor_edit\",\"visitor_d\":\"visitor_delete\",\"visitor_info\":null,\"meeting_l\":\"meeting_list\",\"meeting_a\":\"meeting_add\",\"meeting_e\":\"meeting_edit\",\"meeting_d\":\"meeting_delete\",\"meeting_view\":null,\"notice_addlist\":\"addnotice\",\"notice_e\":\"noticeupdate\",\"notice_d\":\"noticedelete\",\"mailsms_list\":null,\"mailsms_add\":null,\"mailsms_edit\":null,\"mailsms_delete\":null,\"rent_r\":\"rentreport\",\"rentinfo\":null,\"printrentreport\":null,\"rentinfo_pdf\":null,\"tenant_r\":\"rented_report\",\"rentedprint_report\":null,\"rented_pdf\":null,\"visitor_r\":\"visitor_report\",\"visitorprint_report\":null,\"visitor_pdf\":null,\"complain_r\":\"complain_report\",\"complainprint_report\":null,\"complain_pdf\":null,\"unit_r\":\"unit_report\",\"unitprint_report\":null,\"unit_pdf\":null,\"fund_r\":\"fundstatus\",\"printfundstatus\":null,\"fundstatus_pdf\":null,\"bill_r\":\"billreport\",\"billinfo\":null,\"printbillreport\":null,\"billinfo_pdf\":null,\"salary_r\":\"salaryreport\",\"salaryinfo\":null,\"salaryinfo_pdf\":null,\"user_addlist\":\"adduser\",\"user_e\":\"userupdate\",\"user_d\":\"userdelete\",\"indivusualuser\":null,\"billtype_addlist\":\"billsetup_add\",\"billtype_e\":\"billsetup_edit\",\"billtype_d\":\"billsetup_delete\",\"utilitybill_addlist\":\"utility_setup\",\"membersetup_add\":\"membersetup_add\",\"membersetup_edit\":\"membersetup_edit\",\"membersetup_delete\":\"membersetup_delete\",\"yearsetup\":\"yearsetup\",\"yearupdate\":\"yearupdate\",\"yeardelete\":\"membersetup_delete\",\"monthsetup_add\":\"monthsetup_add\",\"monthsetup_edit\":\"monthsetup_edit\",\"monthsetup_delete\":\"monthsetup_delete\",\"currencysetup\":\"currencysetup\",\"currencyupdate\":\"currencyupdate\",\"currencydelete\":\"currencydelete\",\"systemsetup\":\"systemsetup\",\"currencysetting\":null,\"languagesetting\":null,\"emailsetting\":null,\"smssetting\":null,\"datesetting\":null,\"roleadd\":\"roleadd\",\"roleupdate\":\"roleupdate\",\"roledelete\":\"roledelete\",\"rolelist\":\"rolelist\",\"view_access\":null,\"notification_list\":null,\"notification_edit\":null,\"notification_update\":null,\"get_notification\":\"get_notification\",\"notification_view\":\"notification_view\",\"update_notification\":\"update_notification\",\"profile\":\"profile\"}', 0, 25, 44, 'employee'),
(10, 'Tenant', '{\"poperty_add\":null,\"poperty_images\":null,\"visitordetails\":null,\"complaindetails\":null,\"floor_l\":\"floor_list\",\"floor_a\":\"floor_add\",\"floor_e\":\"floor_edit\",\"floor_d\":\"floor_delete\",\"unit_l\":null,\"unit_a\":null,\"unit_e\":null,\"unit_d\":null,\"owner_l\":null,\"owner_a\":null,\"owner_e\":null,\"owner_d\":null,\"indivusualowner\":null,\"tenant_l\":null,\"tenant_a\":null,\"tenant_e\":null,\"tenant_d\":null,\"tenant_view\":\"tenant_view\",\"tenant_depand\":null,\"employee_l\":null,\"employee_a\":null,\"employee_e\":null,\"employee_d\":null,\"indivisualemployee\":null,\"emp_salary_addandlist\":null,\"getindivisualemployee\":null,\"emp_salaery_e\":null,\"emp_salaery_d\":null,\"indivisualemployeesalary\":null,\"employeeleave\":null,\"rent_l\":\"rentlist\",\"rent_a\":\"addrent\",\"gettenent\":null,\"rent_e\":null,\"rent_d\":null,\"indivusualrent\":\"indivusualrent\",\"rentinvoice\":null,\"printrentinvoice\":null,\"utility_l\":null,\"utility_a\":null,\"getunits\":null,\"getowner\":null,\"utility_e\":null,\"utility_d\":null,\"indivusualutility\":null,\"cost_l\":null,\"cost_a\":null,\"cost_e\":null,\"cost_d\":null,\"maintenance_view\":null,\"committee_l\":null,\"committee_a\":null,\"committee_e\":null,\"committee_d\":null,\"committee_view\":null,\"fund_l\":null,\"fund_a\":null,\"fund_e\":null,\"fund_d\":null,\"indivisualfund\":null,\"invoice\":null,\"printfundinvoice\":null,\"bill_l\":null,\"bill_a\":null,\"bill_e\":null,\"bill_d\":null,\"indivisualbill\":null,\"complain_l\":\"complain_list\",\"complain_a\":\"complain_add\",\"complain_e\":\"complain_edit\",\"complain_d\":\"complain_delete\",\"complain_view\":\"complain_view\",\"complain_solution\":null,\"solution_add\":null,\"assign_employee\":null,\"get_employee\":null,\"visitor_l\":null,\"visitor_a\":null,\"visitor_e\":null,\"visitor_d\":null,\"visitor_info\":null,\"meeting_l\":null,\"meeting_a\":null,\"meeting_e\":null,\"meeting_d\":null,\"meeting_view\":null,\"notice_addlist\":null,\"notice_e\":null,\"notice_d\":null,\"mailsms_list\":null,\"mailsms_add\":null,\"mailsms_edit\":null,\"mailsms_delete\":null,\"rent_r\":\"rentreport\",\"rentinfo\":null,\"printrentreport\":null,\"rentinfo_pdf\":null,\"tenant_r\":null,\"rentedprint_report\":null,\"rented_pdf\":null,\"visitor_r\":null,\"visitorprint_report\":null,\"visitor_pdf\":null,\"complain_r\":null,\"complainprint_report\":null,\"complain_pdf\":null,\"unit_r\":null,\"unitprint_report\":null,\"unit_pdf\":null,\"fund_r\":null,\"printfundstatus\":null,\"fundstatus_pdf\":null,\"bill_r\":null,\"billinfo\":null,\"printbillreport\":null,\"billinfo_pdf\":null,\"salary_r\":null,\"salaryinfo\":null,\"salaryinfo_pdf\":null,\"user_addlist\":\"adduser\",\"user_e\":\"userupdate\",\"user_d\":\"userdelete\",\"indivusualuser\":null,\"billtype_addlist\":null,\"billtype_e\":null,\"billtype_d\":null,\"utilitybill_addlist\":null,\"membersetup_add\":null,\"membersetup_edit\":null,\"membersetup_delete\":null,\"yearsetup\":null,\"yearupdate\":null,\"yeardelete\":null,\"monthsetup_add\":null,\"monthsetup_edit\":null,\"monthsetup_delete\":null,\"currencysetup\":null,\"currencyupdate\":null,\"currencydelete\":null,\"systemsetup\":null,\"currencysetting\":null,\"languagesetting\":null,\"emailsetting\":null,\"smssetting\":null,\"datesetting\":null,\"roleadd\":\"roleadd\",\"roleupdate\":\"roleupdate\",\"roledelete\":\"roledelete\",\"rolelist\":\"rolelist\",\"view_access\":\"view_access\",\"notification_list\":null,\"notification_edit\":null,\"notification_update\":null,\"get_notification\":\"get_notification\",\"notification_view\":\"notification_view\",\"update_notification\":\"update_notification\",\"profile\":\"profile\"}', 0, 25, 44, 'tenant'),
(14, 'Admin', '{\"poperty_add\":\"poperty_add\",\"poperty_images\":\"poperty_images\",\"mypackage\":\"mypackage\",\"edit_package\":\"edit_package\",\"make_payment\":\"make_payment\",\"change_payment_confirm\":\"change_payment_confirm\",\"visitordetails\":\"visitordetails\",\"complaindetails\":\"complaindetails\",\"floor_l\":\"floor_list\",\"floor_a\":\"floor_add\",\"floor_e\":\"floor_edit\",\"floor_d\":\"floor_delete\",\"unit_l\":\"unit_list\",\"unit_a\":\"unit_add\",\"unit_e\":\"unit_edit\",\"unit_d\":\"unit_delete\",\"owner_l\":\"ownerlist\",\"owner_a\":\"owneradd\",\"owner_e\":\"ownerupdate\",\"owner_d\":\"ownerdelete\",\"indivusualowner\":\"indivusualowner\",\"tenant_l\":\"tenant_list\",\"tenant_a\":\"tenant_add\",\"tenant_e\":\"tenant_edit\",\"tenant_d\":\"tenant_delete\",\"tenant_view\":\"tenant_view\",\"tenant_depand\":\"tenant_depand\",\"employee_l\":\"employeelist\",\"employee_a\":\"employeeadd\",\"employee_e\":\"employeeupdate\",\"employee_d\":\"employeedelete\",\"indivisualemployee\":\"indivisualemployee\",\"emp_salary_addandlist\":\"employeesalary\",\"getindivisualemployee\":\"getindivisualemployee\",\"emp_salaery_e\":\"employeesalaryupdate\",\"emp_salaery_d\":\"employeesalarydelete\",\"indivisualemployeesalary\":\"indivisualemployeesalary\",\"employeeleave\":\"employeeleave\",\"rent_l\":\"rentlist\",\"rent_a\":\"addrent\",\"gettenent\":\"gettenent\",\"rent_e\":\"rentupdate\",\"rent_d\":\"rentdelete\",\"indivusualrent\":\"indivusualrent\",\"rentinvoice\":\"rentinvoice\",\"printrentinvoice\":null,\"utility_l\":\"ownerutilitylist\",\"utility_a\":\"ownerutilityadd\",\"getunits\":\"getunits\",\"getowner\":\"getowner\",\"utility_e\":\"ownerutilityupdate\",\"utility_d\":\"ownerutilitydelete\",\"indivusualutility\":\"indivusualutility\",\"cost_l\":\"maintenance_list\",\"cost_a\":\"maintenance_add\",\"cost_e\":\"maintenance_edit\",\"cost_d\":\"maintenance_delete\",\"maintenance_view\":\"maintenance_view\",\"committee_l\":\"committee_list\",\"committee_a\":\"committee_add\",\"committee_e\":\"committee_edit\",\"committee_d\":\"committee_delete\",\"committee_view\":\"committee_view\",\"fund_l\":\"fundlist\",\"fund_a\":\"addfund\",\"fund_e\":\"fundupdate\",\"fund_d\":\"funddelete\",\"indivisualfund\":\"indivisualfund\",\"invoice\":\"invoice\",\"printfundinvoice\":\"printfundinvoice\",\"bill_l\":\"billdipositlist\",\"bill_a\":\"addbill\",\"bill_e\":\"billupdate\",\"bill_d\":\"billdelete\",\"indivisualbill\":\"indivisualbill\",\"complain_l\":\"complain_list\",\"complain_a\":\"complain_add\",\"complain_e\":\"complain_edit\",\"complain_d\":\"complain_delete\",\"complain_view\":\"complain_view\",\"complain_solution\":\"complain_solution\",\"solution_add\":\"solution_add\",\"assign_employee\":\"assign_employee\",\"get_employee\":\"get_employee\",\"visitor_l\":\"visitor_list\",\"visitor_a\":\"visitor_add\",\"visitor_e\":\"visitor_edit\",\"visitor_d\":\"visitor_delete\",\"visitor_info\":\"getUnits\",\"meeting_l\":\"meeting_list\",\"meeting_a\":\"meeting_add\",\"meeting_e\":\"meeting_edit\",\"meeting_d\":\"meeting_delete\",\"meeting_view\":\"meeting_view\",\"notice_addlist\":\"addnotice\",\"notice_e\":\"noticeupdate\",\"notice_d\":\"noticedelete\",\"mailsms_list\":\"mailsms_list\",\"mailsms_add\":\"mailsms_add\",\"mailsms_edit\":\"mailsms_edit\",\"mailsms_delete\":\"mailsms_delete\",\"rent_r\":\"rentreport\",\"rentinfo\":\"rentinfo\",\"printrentreport\":\"printrentreport\",\"rentinfo_pdf\":\"rentinfo_pdf\",\"tenant_r\":\"rented_report\",\"rentedprint_report\":\"rentedprint_report\",\"rented_pdf\":\"rented_pdf\",\"visitor_r\":\"visitor_report\",\"visitorprint_report\":\"visitorprint_report\",\"visitor_pdf\":\"visitor_pdf\",\"complain_r\":\"complain_report\",\"complainprint_report\":\"complainprint_report\",\"complain_pdf\":\"complain_pdf\",\"unit_r\":\"unit_report\",\"unitprint_report\":\"unitprint_report\",\"unit_pdf\":\"unit_pdf\",\"fund_r\":\"fundstatus\",\"printfundstatus\":\"printfundstatus\",\"fundstatus_pdf\":\"fundstatus_pdf\",\"bill_r\":\"billreport\",\"billinfo\":\"billinfo\",\"printbillreport\":\"printbillreport\",\"billinfo_pdf\":\"billinfo_pdf\",\"salary_r\":\"salaryreport\",\"salaryinfo\":\"salaryinfo\",\"salaryinfo_pdf\":\"salaryinfo_pdf\",\"user_addlist\":\"adduser\",\"user_e\":\"userupdate\",\"user_d\":\"userdelete\",\"indivusualuser\":\"indivusualuser\",\"billtype_addlist\":\"billsetup_add\",\"billtype_e\":\"billsetup_edit\",\"billtype_d\":\"billsetup_delete\",\"utilitybill_addlist\":\"utility_setup\",\"membersetup_add\":\"membersetup_add\",\"membersetup_edit\":\"membersetup_edit\",\"membersetup_delete\":\"membersetup_delete\",\"yearsetup\":\"yearsetup\",\"yearupdate\":\"yearupdate\",\"yeardelete\":\"membersetup_delete\",\"monthsetup_add\":\"monthsetup_add\",\"monthsetup_edit\":\"monthsetup_edit\",\"monthsetup_delete\":\"monthsetup_delete\",\"currencysetup\":\"currencysetup\",\"currencyupdate\":\"currencyupdate\",\"currencydelete\":\"currencydelete\",\"systemsetup\":\"systemsetup\",\"currencysetting\":\"currencysetting\",\"languagesetting\":\"languagesetting\",\"emailsetting\":\"emailsetting\",\"smssetting\":\"smssetting\",\"datesetting\":\"datesetting\",\"roleadd\":\"roleadd\",\"roleupdate\":\"roleupdate\",\"roledelete\":\"roledelete\",\"rolelist\":\"rolelist\",\"view_access\":\"view_access\",\"notification_list\":\"notification_list\",\"notification_edit\":\"notification_edit\",\"notification_update\":\"notification_update\",\"get_notification\":\"get_notification\",\"notification_view\":\"notification_view\",\"update_notification\":\"update_notification\",\"profile\":\"profile\"}', 1, 1, 14, 'admin'),
(19, 'free user', '{\"poperty_list\":null,\"poperty_add\":\"poperty_add\",\"poperty_images\":null,\"visitordetails\":null,\"complaindetails\":null,\"floor_l\":\"floor_list\",\"floor_a\":null,\"floor_e\":null,\"floor_d\":null,\"unit_l\":\"unit_list\",\"unit_a\":null,\"unit_e\":null,\"unit_d\":null,\"owner_l\":\"ownerlist\",\"owner_a\":null,\"owner_e\":null,\"owner_d\":null,\"indivusualowner\":null,\"tenant_l\":\"tenant_list\",\"tenant_a\":null,\"tenant_e\":null,\"tenant_d\":null,\"tenant_view\":null,\"tenant_depand\":null,\"employee_l\":null,\"employee_a\":null,\"employee_e\":null,\"employee_d\":null,\"indivisualemployee\":null,\"emp_salary_addandlist\":null,\"getindivisualemployee\":null,\"emp_salaery_e\":null,\"emp_salaery_d\":null,\"indivisualemployeesalary\":null,\"employeeleave\":null,\"rent_l\":null,\"rent_a\":null,\"gettenent\":null,\"rent_e\":null,\"rent_d\":null,\"indivusualrent\":null,\"rentinvoice\":null,\"printrentinvoice\":null,\"utility_l\":null,\"utility_a\":null,\"getunits\":null,\"getowner\":null,\"utility_e\":null,\"utility_d\":null,\"indivusualutility\":null,\"cost_l\":null,\"cost_a\":null,\"cost_e\":null,\"cost_d\":null,\"maintenance_view\":null,\"committee_l\":null,\"committee_a\":null,\"committee_e\":null,\"committee_d\":null,\"committee_view\":null,\"fund_l\":null,\"fund_a\":null,\"fund_e\":null,\"fund_d\":null,\"indivisualfund\":null,\"invoice\":null,\"printfundinvoice\":null,\"bill_l\":null,\"bill_a\":null,\"bill_e\":null,\"bill_d\":null,\"indivisualbill\":null,\"complain_l\":null,\"complain_a\":null,\"complain_e\":null,\"complain_d\":null,\"complain_view\":null,\"complain_solution\":null,\"solution_add\":null,\"assign_employee\":null,\"get_employee\":null,\"visitor_l\":null,\"visitor_a\":null,\"visitor_e\":null,\"visitor_d\":null,\"visitor_info\":null,\"meeting_l\":null,\"meeting_a\":null,\"meeting_e\":null,\"meeting_d\":null,\"meeting_view\":null,\"notice_addlist\":null,\"notice_e\":null,\"notice_d\":null,\"mailsms_list\":null,\"mailsms_add\":null,\"mailsms_edit\":null,\"mailsms_delete\":null,\"rent_r\":null,\"rentinfo\":null,\"printrentreport\":null,\"rentinfo_pdf\":null,\"tenant_r\":null,\"rentedprint_report\":null,\"rented_pdf\":null,\"visitor_r\":null,\"visitorprint_report\":null,\"visitor_pdf\":null,\"complain_r\":null,\"complainprint_report\":null,\"complain_pdf\":null,\"unit_r\":null,\"unitprint_report\":null,\"unit_pdf\":null,\"fund_r\":null,\"printfundstatus\":null,\"fundstatus_pdf\":null,\"bill_r\":null,\"billinfo\":null,\"printbillreport\":null,\"billinfo_pdf\":null,\"salary_r\":null,\"salaryinfo\":null,\"salaryinfo_pdf\":null,\"user_addlist\":null,\"user_e\":null,\"user_d\":null,\"indivusualuser\":null,\"billtype_addlist\":null,\"billtype_e\":null,\"billtype_d\":null,\"utilitybill_addlist\":null,\"membersetup_add\":null,\"membersetup_edit\":null,\"membersetup_delete\":null,\"yearsetup\":null,\"yearupdate\":null,\"yeardelete\":null,\"monthsetup_add\":null,\"monthsetup_edit\":null,\"monthsetup_delete\":null,\"currencysetup\":\"currencysetup\",\"currencyupdate\":\"currencyupdate\",\"currencydelete\":\"currencydelete\",\"systemsetup\":\"systemsetup\",\"currencysetting\":\"currencysetting\",\"languagesetting\":\"languagesetting\",\"emailsetting\":\"emailsetting\",\"smssetting\":\"smssetting\",\"datesetting\":\"datesetting\",\"roleadd\":\"roleadd\",\"roleupdate\":\"roleupdate\",\"roledelete\":\"roledelete\",\"rolelist\":\"rolelist\",\"view_access\":\"view_access\",\"notification_list\":\"notification_list\",\"notification_edit\":\"notification_edit\",\"notification_update\":\"notification_update\",\"get_notification\":\"get_notification\",\"notification_view\":\"notification_view\",\"update_notification\":\"update_notification\",\"profile\":\"profile\"}', 1, 27, 47, ''),
(20, 'super_admin', '{\"poperty_list\":null,\"poperty_add\":\"poperty_add\",\"poperty_images\":\"poperty_images\",\"visitordetails\":\"visitordetails\",\"complaindetails\":\"complaindetails\",\"floor_l\":null,\"floor_a\":null,\"floor_e\":null,\"floor_d\":null,\"unit_l\":null,\"unit_a\":null,\"unit_e\":null,\"unit_d\":null,\"owner_l\":null,\"owner_a\":null,\"owner_e\":null,\"owner_d\":null,\"indivusualowner\":null,\"tenant_l\":null,\"tenant_a\":null,\"tenant_e\":null,\"tenant_d\":null,\"tenant_view\":null,\"tenant_depand\":null,\"employee_l\":null,\"employee_a\":null,\"employee_e\":null,\"employee_d\":null,\"indivisualemployee\":null,\"emp_salary_addandlist\":null,\"getindivisualemployee\":null,\"emp_salaery_e\":null,\"emp_salaery_d\":null,\"indivisualemployeesalary\":null,\"employeeleave\":null,\"rent_l\":null,\"rent_a\":null,\"gettenent\":null,\"rent_e\":null,\"rent_d\":null,\"indivusualrent\":null,\"rentinvoice\":null,\"printrentinvoice\":null,\"utility_l\":null,\"utility_a\":null,\"getunits\":null,\"getowner\":null,\"utility_e\":null,\"utility_d\":null,\"indivusualutility\":null,\"cost_l\":null,\"cost_a\":null,\"cost_e\":null,\"cost_d\":null,\"maintenance_view\":null,\"committee_l\":null,\"committee_a\":null,\"committee_e\":null,\"committee_d\":null,\"committee_view\":null,\"fund_l\":null,\"fund_a\":null,\"fund_e\":null,\"fund_d\":null,\"indivisualfund\":null,\"invoice\":null,\"printfundinvoice\":null,\"bill_l\":null,\"bill_a\":null,\"bill_e\":null,\"bill_d\":null,\"indivisualbill\":null,\"complain_l\":null,\"complain_a\":null,\"complain_e\":null,\"complain_d\":null,\"complain_view\":null,\"complain_solution\":null,\"solution_add\":null,\"assign_employee\":null,\"get_employee\":null,\"visitor_l\":null,\"visitor_a\":null,\"visitor_e\":null,\"visitor_d\":null,\"visitor_info\":null,\"meeting_l\":null,\"meeting_a\":null,\"meeting_e\":null,\"meeting_d\":null,\"meeting_view\":null,\"notice_addlist\":null,\"notice_e\":null,\"notice_d\":null,\"mailsms_list\":null,\"mailsms_add\":null,\"mailsms_edit\":null,\"mailsms_delete\":null,\"rent_r\":null,\"rentinfo\":null,\"printrentreport\":null,\"rentinfo_pdf\":null,\"tenant_r\":null,\"rentedprint_report\":null,\"rented_pdf\":null,\"visitor_r\":null,\"visitorprint_report\":null,\"visitor_pdf\":null,\"complain_r\":null,\"complainprint_report\":null,\"complain_pdf\":null,\"unit_r\":null,\"unitprint_report\":null,\"unit_pdf\":null,\"fund_r\":null,\"printfundstatus\":null,\"fundstatus_pdf\":null,\"bill_r\":null,\"billinfo\":null,\"printbillreport\":null,\"billinfo_pdf\":null,\"salary_r\":null,\"salaryinfo\":null,\"salaryinfo_pdf\":null,\"user_addlist\":\"adduser\",\"user_e\":\"userupdate\",\"user_d\":\"userdelete\",\"indivusualuser\":\"indivusualuser\",\"billtype_addlist\":null,\"billtype_e\":null,\"billtype_d\":null,\"utilitybill_addlist\":null,\"membersetup_add\":null,\"membersetup_edit\":null,\"membersetup_delete\":null,\"yearsetup\":null,\"yearupdate\":null,\"yeardelete\":null,\"monthsetup_add\":null,\"monthsetup_edit\":null,\"monthsetup_delete\":null,\"currencysetup\":null,\"currencyupdate\":null,\"currencydelete\":null,\"systemsetup\":\"systemsetup\",\"currencysetting\":\"currencysetting\",\"languagesetting\":\"languagesetting\",\"emailsetting\":\"emailsetting\",\"smssetting\":\"smssetting\",\"datesetting\":\"datesetting\",\"roleadd\":\"roleadd\",\"roleupdate\":\"roleupdate\",\"roledelete\":\"roledelete\",\"rolelist\":\"rolelist\",\"view_access\":\"view_access\",\"notification_list\":null,\"notification_edit\":null,\"notification_update\":null,\"get_notification\":null,\"notification_view\":null,\"update_notification\":null,\"profile\":null}', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(3) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `sgroup` varchar(100) NOT NULL,
  `svalue` text NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sname`, `sgroup`, `svalue`, `property_id`) VALUES
(1, 'utilitybill', 'utilitybillsetup', '{\"gas_bill\":\"1111\",\"security_bill\":\"1\",\"property_id\":\"17\"}', 17),
(2, 'language', 'system', '{\"language\":\"Spain\"}', 17),
(4, 'email', 'system', '{\"mail_option\":\"smtp\",\"smtp_hostname\":\"mail.therssoftware.com\",\"smtp_username\":\"newest@therssoftware.com\",\"smtp_password\":\"PLJZQwjHq2b%\",\"smtp_post\":\"465\",\"smtp_secure\":\"ssl\"}', 17),
(5, 'sms', 'system', '{\"clickAtell_username\":\"dfdf\",\"clickAtell_password\":\"Pa$$w0rd!2\",\"clickAtell_api_key\":\"Aliqua Dicta deseru2\"}', 17),
(8, 'currency', 'system', '{\"currency\":\"$\",\"currency_separator\":\".\",\"currency_position\":\"right\",\"currency_decimal\":\"2\",\"image\":\"empty_image.jpg\"}', 17),
(12, 'date_format', 'system', '{\"date_format\":\"d\\/m\\/Y\"}', 17);

-- --------------------------------------------------------

--
-- Table structure for table `stripe`
--

CREATE TABLE `stripe` (
  `id` int(11) NOT NULL,
  `stripe_mode` int(11) NOT NULL,
  `stripe_api_key` varchar(200) NOT NULL,
  `stripe_test_api_key` varchar(200) NOT NULL,
  `stripe_serect_key` varchar(200) NOT NULL,
  `stripe_test_serect_key` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stripe`
--

INSERT INTO `stripe` (`id`, `stripe_mode`, `stripe_api_key`, `stripe_test_api_key`, `stripe_serect_key`, `stripe_test_serect_key`, `status`) VALUES
(1, 2, 'Mannix Snider', 'Katell Page required>                                    <p style=', 'Davis Anthony', 'Ross Patel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `tename` varchar(50) NOT NULL,
  `teemail` varchar(40) NOT NULL,
  `tepass` varchar(30) NOT NULL,
  `tecontrctno` varchar(20) NOT NULL,
  `teads` varchar(50) NOT NULL,
  `tenid` varchar(20) NOT NULL,
  `floorno` varchar(50) NOT NULL,
  `unitno` varchar(50) NOT NULL,
  `teadvancerent` double(10,2) NOT NULL,
  `terentpermonth` varchar(20) NOT NULL,
  `teissuedate` varchar(20) NOT NULL,
  `terentmonth` varchar(20) NOT NULL,
  `terentyear` varchar(20) NOT NULL,
  `testatus` int(5) NOT NULL,
  `teownerphoto` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `tename`, `teemail`, `tepass`, `tecontrctno`, `teads`, `tenid`, `floorno`, `unitno`, `teadvancerent`, `terentpermonth`, `teissuedate`, `terentmonth`, `terentyear`, `testatus`, `teownerphoto`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'Tate Fischer', 'volalym@mailinator.com', 'Pa$$w0rd!', '98', 'Reiciendis natus cul', '43', '1', 'Unit 1A', 3900.00, '7000', '2021-12-02', 'December', '2021', 1, '1638424588_1f1930ce2cc76fbfc355.png', 17, '2021-12-02 05:56:28', '2021-12-02 05:56:28'),
(2, 'Eugenia Hogan', 'zosesemis@mailinator.com', 'Pa$$w0rd!', '87', 'Ut non ea eligendi i', '63', '12', '2nd', 81.00, '5', '2022-10-27', 'januray', '2022', 1, '1685438850_d2ebcb88975a8d1b0b6c.jpg', 94, '2023-05-30 09:27:30', '2023-05-30 09:27:30'),
(3, 'Eugenia Hogan', 'zosesemis@mailinator.com', 'Pa$$w0rd!', '87', 'Ut non ea eligendi i', '63', '12', '2nd', 81.00, '5', '2022-10-27', 'januray', '2022', 1, '1685439072_0e8b4550c7b3e52f4746.jpg', 94, '2023-05-30 09:31:12', '2023-05-30 09:31:12'),
(4, 'Amaya Joyner', 'dehil@mailinator.com', 'Pa$$w0rd!', '27', 'Laboriosam ut offic', '93', '13', '2', 36.00, '4', '2003-12-01', 'January', '2023', 1, '1685958362_8952827de9bbaaa63215.png', 100, '2023-06-05 09:46:02', '2023-06-05 09:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `floorid` int(5) NOT NULL,
  `unitno` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `floorid`, `unitno`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Unit 1A', 17, '2021-12-02 05:48:14', '2021-12-02 05:48:14'),
(2, 3, 'Unit 2A', 17, '2021-12-02 05:48:27', '2021-12-02 05:48:27'),
(3, 4, 'Unit 3A', 17, '2021-12-02 05:48:40', '2021-12-02 05:48:40'),
(4, 12, '2nd', 94, '2023-05-30 06:46:32', '2023-05-30 06:46:32'),
(5, 13, '2', 100, '2023-06-05 09:42:56', '2023-06-05 09:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `passresttoken` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `user_type` int(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `rememberkey` varchar(50) NOT NULL,
  `term_and_condition` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `property_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `passresttoken`, `branch`, `type`, `user_type`, `image`, `company_id`, `rememberkey`, `term_and_condition`, `created_at`, `updated_at`, `property_id`, `package_id`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '11111', '7c222fb2927d828af22f592134e8932480637c0d', 'LPgeGxua', '8', 0, 1, '1637813985_844d5439f83743f87b13.png', 0, '', 0, '2021-11-13 04:27:16', '2023-03-04 05:57:24', 0, 0, 1),
(155, 'test', 'test@gmail.com', '', '7c222fb2927d828af22f592134e8932480637c0d', '', '', 2, 14, '', 57, '', 1, '2023-02-27 13:38:24', '2023-07-07 11:50:44', 0, 16, 0),
(156, 'fudunyd', 'baqox@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 156, '', 1, '2023-02-28 13:30:26', '2023-02-28 13:30:26', 0, 0, 0),
(157, 'javag', 'poluw@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 157, '', 1, '2023-02-28 13:35:49', '2023-02-28 13:35:49', 0, 0, 0),
(158, 'cufeky', 'lymyl@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 158, '', 1, '2023-02-28 13:43:13', '2023-02-28 13:43:13', 0, 0, 0),
(159, 'kyxofi', 'wabe@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 159, '', 1, '2023-02-28 13:44:37', '2023-02-28 13:44:37', 0, 0, 0),
(160, 'zycykoc', 'dagicuha@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 160, '', 1, '2023-02-28 13:48:55', '2023-02-28 13:48:55', 0, 0, 0),
(161, 'bahaneleb', 'lagaq@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 161, '', 1, '2023-02-28 13:51:38', '2023-02-28 13:51:38', 0, 0, 0),
(162, 'tempadmin', 'rspoperty@gmail.com', '', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '', '', 0, 14, '', 162, '', 1, '2023-02-28 13:52:46', '2023-02-28 13:52:46', 0, 0, 0),
(163, 'zeronasaz', 'secahef@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 163, '', 1, '2023-02-28 14:00:10', '2023-02-28 14:00:10', 0, 0, 0),
(164, 'jamyb', 'saluzi@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 164, '', 1, '2023-02-28 14:10:30', '2023-02-28 14:10:30', 0, 0, 0),
(165, 'test', 'testamii@gmail.com', '', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', '', '', 2, 14, '', 58, '', 1, '2023-05-27 12:20:06', '2023-05-27 12:22:52', 0, 16, 0),
(166, 'zovan', 'jacywa@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 1, 14, '', 59, '', 1, '2023-05-28 04:31:47', '2023-05-28 04:33:23', 0, 18, 0),
(167, 'pozaqomoda', 'kyjevajo@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 2, 14, '', 60, '', 1, '2023-05-28 05:29:06', '2023-05-28 05:30:16', 0, 16, 0),
(168, 'zikeba', 'wuwit@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 2, 14, '', 61, '', 1, '2023-05-29 05:46:15', '2023-05-29 05:47:42', 0, 20, 0),
(169, 'qufobe', 'feveqy@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 2, 14, '', 62, '', 1, '2023-06-05 09:40:57', '2023-06-05 09:42:35', 0, 19, 0),
(170, 'zovyw', 'rype@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 1, 14, '', 63, '', 1, '2023-06-07 04:24:33', '2023-06-07 04:29:52', 0, 18, 0),
(171, 'hedizafe', 'maru@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 1, 14, '', 171, '', 1, '2023-06-07 04:46:40', '2023-06-07 05:38:11', 0, 18, 0),
(172, 'dalyvy', 'lequvejo@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 1, 14, '', 172, '', 1, '2023-06-07 11:06:00', '2023-06-07 11:08:24', 0, 18, 0),
(173, 'serojeqy', 'larasy@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 173, '', 1, '2023-07-16 04:59:28', '2023-07-16 04:59:29', 0, 0, 0),
(174, 'mifac', 'lyvebyt@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 2, 14, '', 64, '', 1, '2023-07-16 05:12:32', '2023-07-16 05:14:21', 0, 16, 0),
(175, 'qifitapaf', 'texyjoc@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 175, '', 1, '2023-07-16 05:18:19', '2023-07-16 05:18:20', 0, 0, 0),
(176, 'jihagyqove', 'zosyxyp@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 0, 14, '', 176, '', 1, '2023-07-16 05:24:26', '2023-07-16 05:24:26', 0, 0, 0),
(177, 'tempadmin', 'testq@gmail.com', '', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '', '', 0, 14, '', 177, '', 1, '2023-07-16 06:14:40', '2023-07-16 06:14:40', 0, 0, 0),
(178, 'tisel', 'mubogexico@mailinator.com', '', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '', 2, 14, '', 178, '', 1, '2023-07-16 11:01:51', '2023-07-16 11:02:46', 0, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `type_id` int(100) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_id`, `type_name`) VALUES
(2, 'Admin'),
(3, 'Owner'),
(4, 'Employee'),
(5, 'Tenent');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `visientrydate` varchar(30) NOT NULL,
  `visiname` varchar(50) NOT NULL,
  `visimobile` varchar(20) NOT NULL,
  `visiads` text NOT NULL,
  `floorid` int(5) NOT NULL,
  `unitid` varchar(500) NOT NULL,
  `visiintime` varchar(20) NOT NULL,
  `visiouttime` varchar(20) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `visientrydate`, `visiname`, `visimobile`, `visiads`, `floorid`, `unitid`, `visiintime`, `visiouttime`, `property_id`, `created_at`, `updated_at`) VALUES
(16, '2021-11-14', 'Freya Cantrell', 'Ut irure officiis qu', '                                                                                        Aliquid pariatur Te                                                                                ', 8, 'Unit 4B', 'Aut eveniet nulla e', 'Molestiae et ea dolo', 0, '2021-11-16 08:24:14', '2021-11-16 08:41:03'),
(17, '2021-11-16', 'rafi', 'Sed deserunt laboris', '                                                                                                                                    Tempora libero tenet                                                                                                                        ', 5, 'Unit 1B', 'Consectetur praesen', 'Consectetur reprehe', 0, '2021-11-16 08:33:29', '2021-11-16 08:40:43'),
(18, '2021-10-16', 'Henry Duffy', 'Quaerat do est ut ve', '                                                                                        Dolor incidunt temp                                                                                ', 6, 'Unit 2B', 'Nulla aliquip exerci', 'Recusandae Fugit s', 17, '2021-11-16 08:41:24', '2021-11-18 12:01:15'),
(19, '2021-11-18', 'ffffffffff', 'Non doloribus ut atq', '                                            Nam fugiat magna aut                                        ', 9, 'Unit 6C', 'Enim iste quidem bla', 'Cillum deserunt dolo', 17, '2021-11-18 10:03:49', '2021-11-18 11:49:03'),
(23, '1994-11-19', 'Kelly Williams', 'Cillum lorem invento', 'Praesentium labore u', 10, 'Unit 2A', 'Sit aperiam adipisci', 'Libero dolor esse q', 17, '2021-11-23 04:38:59', '2021-11-23 04:38:59'),
(24, '1971-11-23', 'Wyatt Tucker', 'Laboris in laborum ', 'Est ipsum id persp', 12, '21', 'Ea iusto deleniti te', 'Laboris minima sit v', 17, '2021-12-01 06:46:50', '2021-12-01 06:46:50'),
(25, '2001-03-08', 'Chandler Collier', 'Sint sit sit et vol', 'Harum aut quia non a', 12, '19', 'Est et illum velit ', 'Eos voluptates reic', 17, '2021-12-01 06:47:22', '2021-12-01 06:47:22'),
(26, '2001-03-08', 'Chandler Collier', 'Sint sit sit et vol', 'Harum aut quia non a', 12, '19', 'Est et illum velit ', 'Eos voluptates reic', 17, '2021-12-01 06:47:22', '2021-12-01 06:47:22'),
(27, '1994-11-19', 'Kelly Williams', 'Cillum lorem invento', 'Praesentium labore u', 10, 'Unit 2A', 'Sit aperiam adipisci', 'Libero dolor esse q', 17, '2021-11-23 04:38:59', '2021-11-23 04:38:59'),
(28, '1971-11-23', 'Wyatt Tucker', 'Laboris in laborum ', 'Est ipsum id persp', 12, '21', 'Ea iusto deleniti te', 'Laboris minima sit v', 17, '2021-12-01 06:46:50', '2021-12-01 06:46:50'),
(29, '2001-03-08', 'Chandler Collier', 'Sint sit sit et vol', 'Harum aut quia non a', 12, '19', 'Est et illum velit ', 'Eos voluptates reic', 17, '2021-12-01 06:47:22', '2021-12-01 06:47:22'),
(30, '2001-03-08', 'Chandler Collier', 'Sint sit sit et vol', 'Harum aut quia non a', 12, '19', 'Est et illum velit ', 'Eos voluptates reic', 17, '2021-12-01 06:47:22', '2021-12-01 06:47:22'),
(31, '1976-07-01', 'Stephen Stokes', 'Accusantium deserunt', 'Reprehenderit maior', 3, 'Unit 2A', 'Quis at harum ipsum ', 'Quis laudantium et ', 17, '2022-01-30 11:28:00', '2022-01-30 11:28:00'),
(32, '1995-06-14', 'Lana Trevino', 'Velit doloribus ut ', 'Aliquam dignissimos ', 12, '2nd', 'Quasi veritatis et i', 'Magna aute reprehend', 94, '2023-06-06 05:38:17', '2023-06-06 05:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `property_id`) VALUES
(1, 2021, 17),
(2, 2022, 17),
(3, 2019, 17),
(4, 2020, 17),
(6, 2017, 17),
(7, 2022, 18),
(8, 2022, 94),
(9, 2023, 100),
(10, 2024, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `billsetups`
--
ALTER TABLE `billsetups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_diposit`
--
ALTER TABLE `bill_diposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailsms`
--
ALTER TABLE `mailsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailsmsdatas`
--
ALTER TABLE `mailsmsdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membersetups`
--
ALTER TABLE `membersetups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthsetups`
--
ALTER TABLE `monthsetups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `owners_utility`
--
ALTER TABLE `owners_utility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_to_unit`
--
ALTER TABLE `owner_to_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakage`
--
ALTER TABLE `pakage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popertieimages`
--
ALTER TABLE `popertieimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poperties`
--
ALTER TABLE `poperties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe`
--
ALTER TABLE `stripe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notification`
--
ALTER TABLE `admin_notification`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `billsetups`
--
ALTER TABLE `billsetups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bill_diposit`
--
ALTER TABLE `bill_diposit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mailsms`
--
ALTER TABLE `mailsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mailsmsdatas`
--
ALTER TABLE `mailsmsdatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membersetups`
--
ALTER TABLE `membersetups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `monthsetups`
--
ALTER TABLE `monthsetups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owners_utility`
--
ALTER TABLE `owners_utility`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owner_to_unit`
--
ALTER TABLE `owner_to_unit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pakage`
--
ALTER TABLE `pakage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `popertieimages`
--
ALTER TABLE `popertieimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poperties`
--
ALTER TABLE `poperties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stripe`
--
ALTER TABLE `stripe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
