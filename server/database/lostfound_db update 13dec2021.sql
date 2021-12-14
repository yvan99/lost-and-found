-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 08:46 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(255) NOT NULL,
  `agent_firstname` varchar(255) NOT NULL,
  `agent_lastname` varchar(255) NOT NULL,
  `agent_email` varchar(255) NOT NULL,
  `agent_password` varchar(255) NOT NULL,
  `agent_status` int(1) NOT NULL,
  `agent_code` varchar(10) NOT NULL,
  `agent_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cli_id` int(255) NOT NULL,
  `cli_fname` varchar(255) NOT NULL,
  `cli_lname` varchar(255) NOT NULL,
  `cli_email` varchar(255) NOT NULL,
  `cli_password` varchar(255) NOT NULL,
  `cli_phone` varchar(10) NOT NULL,
  `cli_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cli_id`, `cli_fname`, `cli_lname`, `cli_email`, `cli_password`, `cli_phone`, `cli_status`) VALUES
(1, 'Wyoming', 'Curtis', 'datumy@mailinator.com', '$2y$10$io4rj9k8wJA7XszpaJ/xDO9.HSVMhp9oh/7We3LM6RBLD0j/BLk3i', '+1 (335) 8', 1),
(2, 'ishimwe', 'yvan', 'gcampk@gmail.com', '$2y$10$4Ks16rbsvVAevaAAPsrx.en5sQtay8lewrtUOfuRzS.mBIERIRqyK', '0780859910', 1),
(3, 'ishimwe', 'faida', 'nickymally@gmail.com', '$2y$10$pR9p24bKn5y/OfeS.fmT/Ou8hijiFiLsjqCygIIJomEjPy5HrxiVK', '0780859910', 1),
(4, 'ndayishimiye', 'francis', 'ndayishimiye@gmail.com', '$2y$10$bbjoi8TEOY43G5j0lkM95.ii1o9cRVY2pyH9scbEPzBMBh1HBqEDa', '0780859910', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_delivery`
--

CREATE TABLE `document_delivery` (
  `docd_id` int(255) NOT NULL,
  `docd_owner` int(255) NOT NULL,
  `docd_agent` int(255) NOT NULL,
  `docd_status` int(1) NOT NULL,
  `docd_date` date NOT NULL
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
(3, 2, 'gdgd', 'gddg', 0, 0, '0000-00-00', '62AZGH1ISO 9001 AND ISO_IEC 27001 AND ISO_IEC 20000-1+UKAS-CMYK.png', 3),
(4, 1, 'ehuieqhuiq', 'nikita', 0, 0, '0000-00-00', '9FIRVN4Capture.PNG', 4),
(5, 1, '233455', 'karanzi', 0, 0, '0000-00-00', 'XHNBAY1Capture.PNG', 3),
(6, 3, 'dhdhdhd', 'jesuu', 0, 0, '0000-00-00', '691LZX3Capture.PNG', 3),
(7, 3, 'hvhvhvh', 'robbert', 0, 0, '0000-00-00', '4WDRP9OCapture.PNG', 4),
(8, 1, 'tete', 'tuut', 0, 0, '0000-00-00', 'CBJ2KO5ISO 9001 AND ISO_IEC 27001 AND ISO_IEC 20000-1+UKAS-CMYK.png', 3),
(9, 2, '119684674647672472', 'NDESIRE MARIE CHANTAL', 0, 0, '0000-00-00', 'VYXNECIf.jpg', 3),
(10, 1, '120002446782', 'ishimwe faida', 0, 0, '0000-00-00', 'a36HV59visa.jfif', 4),
(11, 2, 'n123321', 'hirwa ursule', 0, 0, '0000-00-00', '2Ra49IPatm.jfif', 3),
(12, 1, 'chhc4664', 'ndayishimiye  francis', 4, 0, '0000-00-00', 'RKLDMCApassport.jfif', 3),
(13, 4, 'Sunt commodo in labo', 'Cecilia Benjamin', 0, 0, '13/12/2021', 'ZXH47L9Capture.PNG', 3);

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
(8, 1, 'Necessitatibus et se', 'Nathaniel Klein', 0, 0, '01-Aug-1984', 'Dolores possimus om');

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
(6, 'INSURANNCE CARD'),
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
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indexes for table `document_delivery`
--
ALTER TABLE `document_delivery`
  ADD PRIMARY KEY (`docd_id`),
  ADD KEY `docd_owner` (`docd_owner`),
  ADD KEY `docd_agent` (`docd_agent`);

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
  MODIFY `adm_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `bra_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cli_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `document_delivery`
--
ALTER TABLE `document_delivery`
  MODIFY `docd_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_found`
--
ALTER TABLE `document_found`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `document_lost`
--
ALTER TABLE `document_lost`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `doctype_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
