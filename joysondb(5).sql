-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2017 at 09:37 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joysondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `acc_id` int(8) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `freight` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `design` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `image` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor_table`
--

CREATE TABLE `contractor_table` (
  `contractor_id` int(8) NOT NULL,
  `contractor_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact1_name` varchar(100) NOT NULL,
  `contact1_mobile` varchar(100) NOT NULL,
  `contact2_name` varchar(100) NOT NULL,
  `contact2_mobile` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `tele` varchar(20) DEFAULT '000-0000000'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_table`
--

INSERT INTO `contractor_table` (`contractor_id`, `contractor_name`, `address`, `website`, `email`, `contact1_name`, `contact1_mobile`, `contact2_name`, `contact2_mobile`, `due`, `tin`, `pan`, `bank`, `ifsc_code`, `account_no`, `tele`) VALUES
(1, 'Sri C.K Karan Garments', 'V.Kannan,122/120C,Nadar Street,Ariyakulam,Ummankulam,Mela Ariyakulam post,Nanguneri', '', '', 'Kannan', '9787111447', '', '', '', '', '', '', '', '', NULL),
(2, 'R.J Style King Tailor', 'C.Ruban,Kallidaikurichi,Singampatti road,CSI church opposite,Tirunelveli', '', '', 'Ruban', '', '', '', '', '', '', '', '', '', NULL),
(3, 'Thalha Garments', '2/366,Thottkudi Village,Near National College of Engg,Maruthakulam,Nanguneri Taluk', '', '', 'Muthaiah', '9344299964', '', '', '', '', '', '', '', '', NULL),
(4, 'Yehu Garments', '6/11 Main Road,North Vagaikulam,Tirunelveli-627202', '', '', 'Antony', '8508437923', 'Antony', '8508437924', '', '', '', '', '', '', NULL),
(5, 'Abi Tailors', 'Chandra Devi,B 184,NGO A Colony,Perumal puram,Palayamkottai', '', '', 'Chandra Devi', '8124586430', '', '', '', '', '', '', '', '', NULL),
(6, 'J.M.J Tailors', 'Barkitmanagaram,Palayamkottai', '', '', 'Savio', '8870776694', 'Savio', '7373432336', '', '', '', '', '', '', NULL),
(7, 'R.K Tailors', 'R.Jeyalakshmi, 164 D/1,Pentecost street,Naranammal puram', '', '', 'Jeyalakshmi', '', '', '', '', '', '', '', '', '', NULL),
(8, 'Pon Rani Garments', '6/224, 5 CSI church street,Seithinganallur', '', '', 'Samuel', '', '', '', '', '', '', '', '', '', NULL),
(9, 'M.P Fashion', '', '', '', 'M.P Murugan', '', '', '', '', '', '', '', '', '', NULL),
(10, 'Pitchai kani', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(11, 'Arul Raj', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(12, 'Ivarraju', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(13, 'Murugan S Yogeswar', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(14, 'Rasik', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(15, 'Kumar', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(16, 'Devi', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(17, 'Ramalakshmi', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `costing_table`
--

CREATE TABLE `costing_table` (
  `costing_id` int(100) NOT NULL,
  `shirting` varchar(100) NOT NULL,
  `shirting_qty` varchar(100) NOT NULL,
  `suiting` varchar(100) NOT NULL,
  `suiting_qty` varchar(100) NOT NULL,
  `trims` varchar(100) NOT NULL,
  `trims_qty` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `image` longblob,
  `description` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `cutting` varchar(100) NOT NULL DEFAULT '0',
  `singer` varchar(100) NOT NULL DEFAULT '0',
  `trimming` varchar(100) NOT NULL DEFAULT '0',
  `ironing` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(8) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact1_name` varchar(100) NOT NULL,
  `contact1_mobile` varchar(100) NOT NULL,
  `contact2_name` varchar(100) NOT NULL,
  `contact2_mobile` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL,
  `tele` varchar(20) DEFAULT '000-0000000'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `customer_name`, `address`, `website`, `email`, `contact1_name`, `contact1_mobile`, `contact2_name`, `contact2_mobile`, `due`, `tele`) VALUES
(5, 'mathan', '867 b', 'mathan.com', 'ramprakash110109@gmail.com', 'mathan', '9486428053', 'viji', '9486432053', '0', NULL),
(13, 'ASDFG', 'Adsfd', '', '', 'sdf', 'sdafs', '', '', '10', ''),
(14, 'asdfjkl', 'sdfgh', 'dfghj', 'esdfghjnkm@s.com', 'dxfcgvhbjn', 'xzcvbn', 'zxcvbn', 'xzcvbn', '56', 'dfgfcvbmnhg');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_table`
--

CREATE TABLE `fabric_table` (
  `f_id` int(100) NOT NULL,
  `mill_name` varchar(100) DEFAULT NULL,
  `f_description` varchar(100) NOT NULL,
  `f_width` varchar(100) DEFAULT '0',
  `f_rate` varchar(100) NOT NULL,
  `image` longblob,
  `supplier_id` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `design_no` varchar(100) DEFAULT NULL,
  `stock` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `date_issue` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `profit` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_id`, `customer_name`, `date_issue`, `total_amt`, `profit`) VALUES
('JOY-03022', 'c5', 'mathan', '2016/14/12', '225.60', '37.6'),
('JOY-03025', 'c5', 'mathan', '2016/14/12', '1802.40', '300.4'),
('JOY-03028', 'c5', 'mathan', '2016/14/12', '10599.60', '1766.6'),
('JOY-325220', 'c5', 'mathan', '2016/26/12', '941.98', '133.33');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_inline`
--

CREATE TABLE `invoice_inline` (
  `ii_no` int(8) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_inline`
--

INSERT INTO `invoice_inline` (`ii_no`, `invoice_no`, `description`, `rate`, `qty`) VALUES
(86, 'JOY-325220', 'Boys Shirt-40', '122.70', '1'),
(85, 'JOY-325220', 'Boys Shirt-34', '68.40', '1'),
(84, 'JOY-325220', 'Boys Shirt-32', '208.88', '1'),
(81, 'JOY-03028', 'Regular Socks-6', '75.6', '41'),
(80, 'JOY-03028', 'Shoes-6', '150', '50'),
(79, 'JOY-03025', 'Regular Socks-6', '75.6', '4'),
(78, 'JOY-03025', 'Shoes-6', '150', '10'),
(77, 'JOY-03022', 'Regular Socks-6', '75.6', '1'),
(76, 'JOY-03022', 'Shoes-6', '150', '1'),
(83, 'JOY-325220', 'A line frock-35', '331.00', '1'),
(82, 'JOY-325220', 'Pinafore-34', '211.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kcosting_table`
--

CREATE TABLE `kcosting_table` (
  `cost` varchar(100) NOT NULL,
  `costing_id` int(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `cutting` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` longblob,
  `ironing` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `shirting` varchar(100) NOT NULL,
  `shirting_qty` varchar(100) NOT NULL,
  `singer` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `suiting` varchar(100) NOT NULL,
  `suiting_qty` varchar(100) NOT NULL,
  `trimming` varchar(100) NOT NULL,
  `trims` varchar(100) NOT NULL,
  `trims_qty` varchar(100) NOT NULL,
  `power_table` varchar(100) NOT NULL,
  `printing` varchar(100) NOT NULL,
  `embroidery` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_table`
--

CREATE TABLE `purchase_order_table` (
  `date` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `exp_delivery_date` varchar(100) NOT NULL,
  `delivered_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `item_rate` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_table`
--

CREATE TABLE `sales_order_table` (
  `order_id` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `exp_delivery_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_table`
--

CREATE TABLE `supplier_table` (
  `supplier_id` int(100) NOT NULL,
  `mill_name` text NOT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact1_name` varchar(100) NOT NULL,
  `contact1_mobile` varchar(100) NOT NULL,
  `contact2_name` varchar(100) NOT NULL,
  `contact2_mobile` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trim_table`
--

CREATE TABLE `trim_table` (
  `t_id` int(100) NOT NULL,
  `t_description` varchar(100) NOT NULL,
  `t_size` varchar(100) DEFAULT '0',
  `t_rate` varchar(100) NOT NULL,
  `image` longblob,
  `supplier_id` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `type`) VALUES
('101', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `contractor_table`
--
ALTER TABLE `contractor_table`
  ADD PRIMARY KEY (`contractor_id`);

--
-- Indexes for table `costing_table`
--
ALTER TABLE `costing_table`
  ADD PRIMARY KEY (`costing_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fabric_table`
--
ALTER TABLE `fabric_table`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `invoice_inline`
--
ALTER TABLE `invoice_inline`
  ADD PRIMARY KEY (`ii_no`);

--
-- Indexes for table `kcosting_table`
--
ALTER TABLE `kcosting_table`
  ADD PRIMARY KEY (`costing_id`);

--
-- Indexes for table `supplier_table`
--
ALTER TABLE `supplier_table`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `trim_table`
--
ALTER TABLE `trim_table`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `acc_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contractor_table`
--
ALTER TABLE `contractor_table`
  MODIFY `contractor_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `costing_table`
--
ALTER TABLE `costing_table`
  MODIFY `costing_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `fabric_table`
--
ALTER TABLE `fabric_table`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_inline`
--
ALTER TABLE `invoice_inline`
  MODIFY `ii_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `kcosting_table`
--
ALTER TABLE `kcosting_table`
  MODIFY `costing_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_table`
--
ALTER TABLE `supplier_table`
  MODIFY `supplier_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trim_table`
--
ALTER TABLE `trim_table`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
