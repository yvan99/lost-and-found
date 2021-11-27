-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 03:22 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `doc_createdDate` date NOT NULL,
  `doc_photo` varchar(255) NOT NULL,
  `bra_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `doc_createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `doctype_id` int(255) NOT NULL,
  `doctype_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `bra_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cli_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_delivery`
--
ALTER TABLE `document_delivery`
  MODIFY `docd_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_found`
--
ALTER TABLE `document_found`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_lost`
--
ALTER TABLE `document_lost`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `doctype_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document_delivery`
--
ALTER TABLE `document_delivery`
  ADD CONSTRAINT `document_delivery_ibfk_1` FOREIGN KEY (`docd_owner`) REFERENCES `client` (`cli_id`),
  ADD CONSTRAINT `document_delivery_ibfk_2` FOREIGN KEY (`docd_agent`) REFERENCES `agent` (`agent_id`);

--
-- Constraints for table `document_found`
--
ALTER TABLE `document_found`
  ADD CONSTRAINT `document_found_ibfk_1` FOREIGN KEY (`doctype_id`) REFERENCES `document_type` (`doctype_id`),
  ADD CONSTRAINT `document_found_ibfk_2` FOREIGN KEY (`doc_founder`) REFERENCES `client` (`cli_id`),
  ADD CONSTRAINT `document_found_ibfk_3` FOREIGN KEY (`bra_id`) REFERENCES `branch` (`bra_id`);

--
-- Constraints for table `document_lost`
--
ALTER TABLE `document_lost`
  ADD CONSTRAINT `document_lost_ibfk_1` FOREIGN KEY (`doctype_id`) REFERENCES `document_type` (`doctype_id`),
  ADD CONSTRAINT `document_lost_ibfk_2` FOREIGN KEY (`doc_founder`) REFERENCES `client` (`cli_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
