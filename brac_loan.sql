-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 11:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brac_loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrower`
--

CREATE TABLE `tbl_borrower` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nid` bigint(30) NOT NULL,
  `rejected` int(11) NOT NULL DEFAULT '0',
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `working_status` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_borrower`
--

INSERT INTO `tbl_borrower` (`id`, `name`, `nid`, `rejected`, `gender`, `mobile`, `email`, `dob`, `address`, `working_status`, `image`) VALUES
(7, 'tipu', 199661456, 0, 'Male', '01834564564', 'raihan@mail.com', '1997-11-27', 'Uttara, Dhaka', 'Student', 'admin/uploads/a72f84b339.jpg'),
(8, 'samdani', 19996456456, 0, 'Male', '0163456455', 'kamalkarim@mail.com', '1995-06-14', 'Mirpur, Dhaka', 'Owner', 'admin/uploads/4afa45893c.jpg'),
(9, 'Md Raihan Uddin', 151030582, 0, 'Male', '01834564564', 'kamalkarim@mail.com', '2018-08-22', 'Uttara, Dhaka', 'Unemployed', 'admin/uploads/810b73db93.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liability`
--

CREATE TABLE `tbl_liability` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_details` text NOT NULL,
  `price` bigint(50) NOT NULL,
  `pay_remaining_loan` bigint(50) NOT NULL,
  `return_money` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_application`
--

CREATE TABLE `tbl_loan_application` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `expected_loan` bigint(50) NOT NULL,
  `loan_percentage` int(11) NOT NULL,
  `installments` int(11) NOT NULL,
  `total_loan` bigint(50) NOT NULL,
  `emi_loan` int(11) NOT NULL,
  `amount_paid` bigint(50) DEFAULT '0',
  `amount_remain` bigint(50) DEFAULT NULL,
  `current_inst` int(11) DEFAULT '0',
  `remain_inst` int(11) DEFAULT NULL,
  `next_date` date DEFAULT NULL,
  `files` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loan_application`
--

INSERT INTO `tbl_loan_application` (`id`, `b_id`, `status`, `name`, `expected_loan`, `loan_percentage`, `installments`, `total_loan`, `emi_loan`, `amount_paid`, `amount_remain`, `current_inst`, `remain_inst`, `next_date`, `files`) VALUES
(9, 8, 3, 'TIPU SULTAM', 40000, 12, 8, 44800, 5600, 11200, 33600, 2, 6, '2018-02-13', 'admin/uploads/documents/ff4bff1a9b.docx'),
(10, 7, 3, 'Samdani', 8000, 5, 5, 8400, 1680, 3360, 5040, 2, 3, '2018-06-14', 'admin/uploads/documents/f2c5766143.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `current_inst` int(11) NOT NULL,
  `remain_inst` int(11) NOT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `b_id`, `loan_id`, `pay_amount`, `pay_date`, `current_inst`, `remain_inst`, `fine`) VALUES
(1, 8, 9, 5600, '2018-04-15', 1, 7, 0),
(2, 7, 10, 1680, '2018-04-15', 1, 4, 0),
(3, 7, 10, 1680, '2018-05-10', 2, 3, 0),
(4, 8, 9, 5600, '2018-08-30', 2, 6, 112);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `pass`, `designation`, `role`) VALUES
(2, 'Md Niamul Haque', 'head@gmail.com', '202cb962ac59075b964b07152d234b70', 'Head Officer', 3),
(3, 'Md Abul Kalam', 'branch@gmail.com', '202cb962ac59075b964b07152d234b70', 'Branch Officer', 2),
(4, 'Md Faizul Haque', 'varifier@gmail.com', '202cb962ac59075b964b07152d234b70', 'Varifier', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_borrower`
--
ALTER TABLE `tbl_borrower`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `tbl_liability`
--
ALTER TABLE `tbl_liability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loan_application`
--
ALTER TABLE `tbl_loan_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_borrower`
--
ALTER TABLE `tbl_borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_loan_application`
--
ALTER TABLE `tbl_loan_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
