-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 10:23 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_fname` varchar(255) NOT NULL,
  `adm_lname` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_fname`, `adm_lname`, `adm_email`, `adm_password`, `adm_status`) VALUES
(1, 'ishimwe', 'yvan', 'rukundojanvier250@gmail.com', '$2y$10$FLCsYJCtenb5t0D7rAVdl.zWh5zkCmgWjyDra6zojdl6GSv6nRkO2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audience`
--

CREATE TABLE `audience` (
  `aud_id` int(11) NOT NULL,
  `aud_token` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audience`
--

INSERT INTO `audience` (`aud_id`, `aud_token`, `date`) VALUES
(2, '851482', '2021-11-26'),
(3, '107656', '2021-09-29'),
(4, '413762', '2021-11-26'),
(5, '890087', '2021-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(12) NOT NULL,
  `con_name` text NOT NULL,
  `con_phone` text NOT NULL,
  `con_email` text NOT NULL,
  `con_message` text NOT NULL,
  `con_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `con_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_name`, `con_phone`, `con_email`, `con_message`, `con_date`, `con_status`) VALUES
(1, 'ISHIMWE YVAN', '0782168846', 'ishimwe23892@gmail.com', 'Distinctively exploit revolutionary catalysts for chang the Seamlessly optimal rather than just in web & apps development optimal alignments for intuitive.', '2021-11-09 11:18:30', 1),
(2, 'amazina', '078268414', 'mILO@GMAIL.COM', 'RRWRWRWRWRWRWRRRWWWRRW', '2021-11-10 23:28:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_date` date NOT NULL,
  `faq_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_question`, `faq_answer`, `faq_date`, `faq_status`) VALUES
(2, 'What is a Capital Market ?', 'A financial market involving institutions that deal with short term or long securities', '2021-10-23', 1),
(3, 'Why are mad ?', 'huisfhiufhfuihifhsuishuihsfhusf', '2021-10-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_image` text NOT NULL,
  `news_date` date NOT NULL,
  `news_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_image`, `news_date`, `news_status`) VALUES
(4, 'This is CHD capital ltd title edithe', '12345 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem rerum voluptas harum provident fugiat tempora architecto mollitia quos maiores perspiciatis, obcaecati, placeat aut. Architecto eaque accusamus minima quis in earum dignissimos suscipit esse, saepe repudiandae similique, expedita sed quam dolore impedit deleniti atque, dolorum quasi repellendus quos sapiente.', 'CY2U95E1_vhf4yUYSxujY3fehE4NHnQ.jpeg', '2021-10-23', 1),
(5, 'Microsoft launches win 11', 'kiuhirhiwhuhwruirwhirhirwhwrihrihrwuiwr', '40RSP8Amicrosoft-logo.png', '2021-10-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `repo_id` int(12) NOT NULL,
  `repo_title` text NOT NULL,
  `repo_date` text NOT NULL,
  `repo_content` text NOT NULL,
  `repo_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`repo_id`, `repo_title`, `repo_date`, `repo_content`, `repo_status`) VALUES
(1, 'Today title to', '17-11-2021', 'CDH Capital pools resources from the CDH Group to ensure clients the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making.CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.', 1),
(3, 'repo2', '17-11-2021', 'CDH Capital a licensed Financial Institution carrying out investments banking activities which include Stockbrokerage, Investment Management, and Corporate Finance services. The Company specialises in the business of investments, assisting clients investing in financial instruments locally, regionally and internationally. CDH Capital is registered with the Capital Market Authority of Rwanda (CMA), the Rwanda Stock Exchange (RSE) and the Central Bank of Rwanda (BNR). CDH Capital pools resources from the CDH Group to ensure clientss the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making. CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.', 1),
(4, 'repo3', '17-11-2021', 'CDH Capital a licensed Financial Institution carrying out investments banking activities which include Stockbrokerage, Investment Management, and Corporate Finance services. The Company specialises in the business of investments, assisting clients investing in financial instruments locally, regionally and internationally. CDH Capital is registered with the Capital Market Authority of Rwanda (CMA), the Rwanda Stock Exchange (RSE) and the Central Bank of Rwanda (BNR). CDH Capital pools resources from the CDH Group to ensure clientss the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making. CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.', 1),
(5, 'repo4', '17-11-2021', 'CDH Capital a licensed Financial Institution carrying out investments banking activities which include Stockbrokerage, Investment Management, and Corporate Finance services. The Company specialises in the business of investments, assisting clients investing in financial instruments locally, regionally and internationally. CDH Capital is registered with the Capital Market Authority of Rwanda (CMA), the Rwanda Stock Exchange (RSE) and the Central Bank of Rwanda (BNR). CDH Capital pools resources from the CDH Group to ensure clientss the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making. CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.', 1),
(6, 'repo6', '17-11-2021', 'CDH Capital a licensed Financial Institution carrying out investments banking activities which include Stockbrokerage, Investment Management, and Corporate Finance services. The Company specialises in the business of investments, assisting clients investing in financial instruments locally, regionally and internationally. CDH Capital is registered with the Capital Market Authority of Rwanda (CMA), the Rwanda Stock Exchange (RSE) and the Central Bank of Rwanda (BNR). CDH Capital pools resources from the CDH Group to ensure clientss the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making. CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.', 1),
(7, 'repo2jwrjiwj', '17-11-2021', 'CDH Capital a licensed Financial Institution carrying out investments banking activities which include Stockbrokerage, Investment Management, and Corporate Finance services. The Company specialises in the business of investments, assisting clients investing in financial instruments locally, regionally and internationally. CDH Capital is registered with the Capital Market Authority of Rwanda (CMA), the Rwanda Stock Exchange (RSE) and the Central Bank of Rwanda (BNR). CDH Capital pools resources from the CDH Group to ensure clientss the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making. CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rse`
--

CREATE TABLE `rse` (
  `rse_id` int(11) NOT NULL,
  `com_id` int(12) NOT NULL,
  `rse_price` int(11) NOT NULL,
  `rse_date` date NOT NULL,
  `rse_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rse`
--

INSERT INTO `rse` (`rse_id`, `com_id`, `rse_price`, `rse_date`, `rse_status`) VALUES
(1, 4, 60, '2021-11-21', 2),
(3, 4, 85, '2021-11-01', 2),
(15, 4, 100, '2021-11-04', 2),
(17, 4, 60, '2021-11-02', 2),
(18, 4, 70, '2021-07-15', 2),
(19, 4, 80, '2021-11-05', 2),
(20, 4, 100, '2021-11-03', 2),
(21, 4, 100, '2021-11-08', 2),
(22, 4, 110, '2021-11-04', 2),
(23, 4, 80, '2021-11-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rse_companies`
--

CREATE TABLE `rse_companies` (
  `com_id` int(12) NOT NULL,
  `comp_name` text NOT NULL,
  `comp_link` text NOT NULL,
  `comp_photo` text NOT NULL,
  `comp_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rse_companies`
--

INSERT INTO `rse_companies` (`com_id`, `comp_name`, `comp_link`, `comp_photo`, `comp_status`) VALUES
(4, 'Bank of kigali', 'meet.google.com', 'BaH9R7Kmongo2.PNG', 1),
(5, 'KCB', 'kcb.url.com', 'UYMFBL5about2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ser_id` int(12) NOT NULL,
  `ser_title` text NOT NULL,
  `ser_content` text NOT NULL,
  `ser_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_title`, `ser_content`, `ser_status`) VALUES
(2, 'Innovate', 'CDH Capital pools resources from the CDH Group to ensure clients the best of services.', 1),
(4, 'advocacy', 'content', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `sli_id` int(12) NOT NULL,
  `sli_image` text NOT NULL,
  `sli_caption` text NOT NULL,
  `sli_status` int(2) NOT NULL,
  `sli_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`sli_id`, `sli_image`, `sli_caption`, `sli_status`, `sli_message`) VALUES
(15, 'C1W2HY0Visit-Rwanda_-Kigali-Convention-Centre-1280x853.jpg', 'Let&#039;s build our incredible Rwanda', 1, ''),
(16, '7DWYC0Kandela_header.jpg', 'Bond 7', 1, ''),
(18, '7L0XZAWabubakar-balogun-muftF_QWp6Y-unsplash.jpg', 'Education for all', 1, 'CDH Capital pools resources from the CDH Group to ensure clientss the best of services. The CDH Group has a pool of highly experienced and qualified professionals in their respective fields to guide clients in their investment decision making.CDH Capital ltd has one subsidiary, CDH Capital Nominee Ltd. CDH Capital Nominee Ltd is a domestically registered company. Its main objective is to hold and manage shares on behalf of clients.');

-- --------------------------------------------------------

--
-- Table structure for table `verification_token`
--

CREATE TABLE `verification_token` (
  `vt_id` int(11) NOT NULL,
  `vt_token` varchar(255) NOT NULL,
  `vt_indate` varchar(255) NOT NULL,
  `vt_user` varchar(250) NOT NULL,
  `vt_userId` int(11) NOT NULL,
  `vt_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_token`
--

INSERT INTO `verification_token` (`vt_id`, `vt_token`, `vt_indate`, `vt_user`, `vt_userId`, `vt_status`) VALUES
(25, '290343', '2021-11-14  08:08:13', 'admin', 1, 0),
(26, '416052', '2021-11-14  08:09:21', 'admin', 1, 0),
(27, '499522', '2021-11-14  08:47:02', 'admin', 1, 9),
(28, '185525', '2021-11-14  09:08:56', 'admin', 1, 0),
(29, '477672', '2021-11-18  01:01:22', 'admin', 1, 9),
(30, '895051', '2021-11-18  03:35:36', 'admin', 1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `audience`
--
ALTER TABLE `audience`
  ADD PRIMARY KEY (`aud_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`repo_id`);

--
-- Indexes for table `rse`
--
ALTER TABLE `rse`
  ADD PRIMARY KEY (`rse_id`);

--
-- Indexes for table `rse_companies`
--
ALTER TABLE `rse_companies`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`sli_id`);

--
-- Indexes for table `verification_token`
--
ALTER TABLE `verification_token`
  ADD PRIMARY KEY (`vt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audience`
--
ALTER TABLE `audience`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `repo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rse`
--
ALTER TABLE `rse`
  MODIFY `rse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rse_companies`
--
ALTER TABLE `rse_companies`
  MODIFY `com_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `sli_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `verification_token`
--
ALTER TABLE `verification_token`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
