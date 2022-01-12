-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 12:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostfound_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(255) NOT NULL,
  `adm_fullnames` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_fullnames`, `adm_email`, `adm_password`) VALUES
(1, 'Malaika nikita', 'admin@lost.com', '$2y$10$dmNTphWKBHjWETr5fYsWaOIBFfnaMp1M1Mtn8ncYDeFzv.R58NjyC');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(255) NOT NULL,
  `agent_fullnames` text NOT NULL,
  `agent_phone` varchar(20) NOT NULL,
  `agent_status` int(1) NOT NULL,
  `agent_code` varchar(10) NOT NULL,
  `agent_location` varchar(255) NOT NULL,
  `bra_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_fullnames`, `agent_phone`, `agent_status`, `agent_code`, `agent_location`, `bra_id`) VALUES
(3, 'Ishimwe Yvan', '0782168846', 1, 'AG264494', 'kicukiro', 3),
(4, 'Iradukunda alain prince', '0723720958', 1, 'AG862866', 'Kagarama KN47ST', 4);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `bra_id` int(255) NOT NULL,
  `bra_name` varchar(255) NOT NULL,
  `bra_code` varchar(10) NOT NULL,
  `bra_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bra_id`, `bra_name`, `bra_code`, `bra_status`) VALUES
(3, 'NYANZA BRANCH', 'NYZ_123', 0),
(4, 'RUGANGO', 'RHG_123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `claim_id` int(11) NOT NULL,
  `cli_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `claim_ref` varchar(255) NOT NULL,
  `claim_fees` int(11) NOT NULL,
  `claim_comment` text NOT NULL,
  `claim_names` varchar(255) NOT NULL,
  `claim_address` varchar(255) NOT NULL,
  `Claim_branch` int(11) NOT NULL,
  `claim_tel` varchar(10) NOT NULL,
  `claim_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`claim_id`, `cli_id`, `doc_id`, `claim_ref`, `claim_fees`, `claim_comment`, `claim_names`, `claim_address`, `Claim_branch`, `claim_tel`, `claim_status`) VALUES
(11, 17, 12, 'LSTFOUND-d331b42475ef1a10186d4a7a6924b16c', 100, 'mdnwlkna', 'joi bo', 'kkst1', 3, '2507805208', 'SUCCESS'),
(12, 17, 9, 'LSTFOUND-345e0624774301745d0ef13b19160baa', 100, 'youio', 'joi bo', 'kkst1', 3, '0890709657', 'SUCCESS'),
(13, 18, 14, 'LSTFOUND-f643890c8dbc43d9eb9d6891501650db', 100, 'Please recover my document', 'ISHIMWE YVAN', 'KICUKIRO', 3, '0782168846', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cli_id` int(255) NOT NULL,
  `cli_fname` varchar(255) NOT NULL,
  `cli_lname` varchar(255) NOT NULL,
  `cli_email` varchar(255) NOT NULL,
  `cli_password` varchar(255) NOT NULL,
  `cli_phone` varchar(10) NOT NULL,
  `cli_token` int(11) NOT NULL,
  `cli_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cli_id`, `cli_fname`, `cli_lname`, `cli_email`, `cli_password`, `cli_phone`, `cli_token`, `cli_status`) VALUES
(18, 'Bradley', 'Conley', 'ishimweyvan909@gmail.com', '$2y$10$wlRIdSHU3LB3Oyjvm2qMDeISFrvO8nSkiTrrVEXIUhL2hqLWyiPCe', '0782168846', 107685, 1),
(19, 'Avye', 'Hale', 'ishimweyvan90@gmail.com', '$2y$10$dmNTphWKBHjWETr5fYsWaOIBFfnaMp1M1Mtn8ncYDeFzv.R58NjyC', '0723720958', 532535, 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_delivery`
--

CREATE TABLE `document_delivery` (
  `docd_id` int(255) NOT NULL,
  `claim_id` int(12) NOT NULL,
  `agent_id` int(12) NOT NULL,
  `docd_date` varchar(30) NOT NULL,
  `docd_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document_found`
--

CREATE TABLE `document_found` (
  `doc_id` int(255) NOT NULL,
  `doctype_id` int(255) NOT NULL,
  `doc_serialcode` varchar(255) NOT NULL,
  `doc_fullnames` varchar(255) NOT NULL,
  `doc_founder` int(255) NOT NULL,
  `doc_status` int(1) NOT NULL,
  `doc_createdDate` text NOT NULL,
  `doc_photo` varchar(255) NOT NULL,
  `bra_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_found`
--

INSERT INTO `document_found` (`doc_id`, `doctype_id`, `doc_serialcode`, `doc_fullnames`, `doc_founder`, `doc_status`, `doc_createdDate`, `doc_photo`, `bra_id`) VALUES
(9, 2, '119684674647672472', 'NDESIRE MARIE CHANTAL', 0, 0, '0000-00-00', 'VYXNECIf.jpg', 3),
(10, 1, '120002446782', 'ishimwe faida', 0, 0, '0000-00-00', 'a36HV59visa.jfif', 4),
(11, 2, 'n123321', 'hirwa ursule', 0, 0, '0000-00-00', '2Ra49IPatm.jfif', 3),
(12, 1, 'chhc4664', 'ndayishimiye  francis', 4, 0, '0000-00-00', 'RKLDMCApassport.jfif', 3),
(13, 4, 'Sunt commodo in labo', 'Cecilia Benjamin', 0, 0, '13/12/2021', 'ZXH47L9Capture.PNG', 3),
(14, 6, 'VISA2892798', 'ISHIMWE YVAN', 19, 0, '07/01/2022', 'VYXNECIf.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `document_lost`
--

CREATE TABLE `document_lost` (
  `doc_id` int(255) NOT NULL,
  `doctype_id` int(255) NOT NULL,
  `doc_serialcode` varchar(255) NOT NULL,
  `doc_fullnames` varchar(255) NOT NULL,
  `doc_founder` int(255) NOT NULL,
  `doc_status` int(1) NOT NULL,
  `doc_createdDate` text NOT NULL,
  `doc_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_lost`
--

INSERT INTO `document_lost` (`doc_id`, `doctype_id`, `doc_serialcode`, `doc_fullnames`, `doc_founder`, `doc_status`, `doc_createdDate`, `doc_address`) VALUES
(1, 2, '1234567876', 'ishimwe yvan', 2, 0, '13/12/2021', 'gisozi'),
(8, 1, 'Necessitatibus et se', 'Nathaniel Klein', 0, 0, '01-Aug-1984', 'Dolores possimus om'),
(9, 1, '119909038290091383', 'RUKUNDO JAN', 17, 0, '12/32/32', 'kicukiro/nyari'),
(10, 6, 'VISA2892798', 'ISHIMWE YVAN', 18, 0, '12/08/2022', 'kigali');

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `doctype_id` int(255) NOT NULL,
  `doctype_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`doctype_id`, `doctype_name`) VALUES
(1, 'DRIVER LICENCE'),
(2, 'IDENTITY CARD'),
(3, 'PASSPORT'),
(4, 'VISA'),
(5, 'LAND PAPER'),
(6, 'INSURANCE CARD'),
(7, 'ATM CARD'),
(8, 'YELLOW CARD'),
(9, 'DIPLOME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bra_id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indexes for table `document_delivery`
--
ALTER TABLE `document_delivery`
  ADD PRIMARY KEY (`docd_id`),
  ADD KEY `claim_id` (`claim_id`);

--
-- Indexes for table `document_found`
--
ALTER TABLE `document_found`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doctype_id` (`doctype_id`),
  ADD KEY `doc_founder` (`doc_founder`),
  ADD KEY `bra_id` (`bra_id`);

--
-- Indexes for table `document_lost`
--
ALTER TABLE `document_lost`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doctype_id` (`doctype_id`),
  ADD KEY `doc_founder` (`doc_founder`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`doctype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `bra_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cli_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `document_delivery`
--
ALTER TABLE `document_delivery`
  MODIFY `docd_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_found`
--
ALTER TABLE `document_found`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `document_lost`
--
ALTER TABLE `document_lost`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `doctype_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
