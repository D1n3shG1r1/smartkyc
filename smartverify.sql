-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2025 at 05:25 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartverify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `address_1`, `address_2`, `city`, `state`, `country`, `zipcode`, `phone`, `company`, `website`, `email`, `password`, `createDateTime`, `updateDateTime`) VALUES
(1736615183114993, 'Dinesh', 'Kumar', 'Address1', 'Address2', 'city', 'province', 'country', '12345', '1234567890', 'My Test Company', 'https://xyz.com', 'dinesh@example.com', '4a793931e2659a91410232c423feed2f', '2025-01-11 17:01:06', '2025-02-13 15:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `adminpackage`
--

DROP TABLE IF EXISTS `adminpackage`;
CREATE TABLE IF NOT EXISTS `adminpackage` (
  `adminId` bigint NOT NULL,
  `package` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'package name',
  `active` tinyint(1) NOT NULL,
  `starton` date DEFAULT NULL,
  `expireon` date DEFAULT NULL,
  `expired` tinyint(1) NOT NULL,
  `documentsVerifyLimit` int NOT NULL DEFAULT '0',
  `documentsVerified` int NOT NULL DEFAULT '0',
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminpackage`
--

INSERT INTO `adminpackage` (`adminId`, `package`, `active`, `starton`, `expireon`, `expired`, `documentsVerifyLimit`, `documentsVerified`, `createDateTime`, `updateDateTime`) VALUES
(1736615183114993, 'package-basic', 1, '2025-02-22', '2025-03-22', 0, 5, 0, '2025-02-12 16:08:33', '2025-02-22 06:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `applicationdocuments`
--

DROP TABLE IF EXISTS `applicationdocuments`;
CREATE TABLE IF NOT EXISTS `applicationdocuments` (
  `id` bigint NOT NULL,
  `adminId` bigint NOT NULL,
  `portalId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationId` bigint NOT NULL,
  `fileName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicationdocuments`
--

INSERT INTO `applicationdocuments` (`id`, `adminId`, `portalId`, `applicationId`, `fileName`) VALUES
(1738407691491744, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 173840769134398, ''),
(1738502233757201, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738502233605948, ''),
(1738587847977139, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738587847368632, ''),
(1738677043291602, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738677043241884, ''),
(1738677481727972, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738677481138786, '1738677481727972.jpeg'),
(1739895371357323, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 173989537127251, '1739895371357323.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint NOT NULL,
  `adminId` bigint NOT NULL,
  `portalId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerId` bigint NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verificationOutcome` tinyint NOT NULL DEFAULT '1' COMMENT '1-Verification in Progress,\r\n2-Document Failed Verification,\r\n3-Document is Expired,\r\n4-Document Under Review,\r\n5-Further Action Required,\r\n6-Verification Incomplete (Pending Information),\r\n7-Document is Fraudulent,\r\n8-Unable to Verify (Issuing Authority Unreachable),\r\n9-Document Requires Manual Review,\r\n10-Document Verified with Discrepancies,\r\n11-Verified as Authentic\r\n',
  `discrepancies` tinyint NOT NULL DEFAULT '0' COMMENT '1-"No Discrepancies Found",\r\n2-"Invalid Document Number",\r\n3-"Document Expired",\r\n4-"Mismatch in Applicant Name",\r\n5-"Issuing Authority Not Found",\r\n6-"Date Discrepancy (e.g., issue date does not match records)",\r\n7-"Incomplete Information Provided",\r\n8-"Document Not Registered with Issuing Authority",\r\n9-"Document Tampered or Altered",\r\n10-"Unrecognized Document Format",\r\n11-"Inconsistent Data with Authority Records",\r\n12-"Duplicate Document Found",\r\n13-"Verification Process Incomplete (Further Information Required)",\r\n14-"Fraudulent Document Detected",\r\n15-"Other"',
  `specifyDiscrepancy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verificationStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'verified, not verified, pending',
  `verificationMethod` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'automated system check, manual review, contact with issuing authority',
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `adminId`, `portalId`, `customerId`, `title`, `description`, `documentType`, `documentNo`, `comment`, `verificationOutcome`, `discrepancies`, `specifyDiscrepancy`, `verificationStatus`, `verificationMethod`, `createDateTime`, `updateDateTime`) VALUES
(173840769134398, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'Driving License', 'Learner driving license', 'driving_license', 'INDDLCH00123', 'Learner Driving License Application', 1, 0, '', 'pending', '', '2025-02-01 11:01:31', '2025-02-01 11:01:31'),
(1738502233605948, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'passport', 'Indian Passport', 'passport', 'pp123456789', '', 1, 0, '', 'pending', '', '2025-02-02 13:17:13', '2025-02-02 13:17:13'),
(1738587847368632, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'xyz', 'description', 'driving_license', '12355ddsdsd', 'test comment', 1, 0, '', 'pending', '', '2025-02-03 13:04:07', '2025-02-03 13:04:07'),
(1738677043241884, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'Test Document', 'Test Document description', 'passport', 'pp123456', 'Test pp', 1, 0, '', 'pending', '', '2025-02-04 13:50:43', '2025-02-04 13:50:43'),
(1738677481138786, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'test1313', 'test1313', 'passport', '12546bnmnb', '12546bnmnb', 11, 1, '', 'verified', 'contact with issuing authority', '2025-02-04 13:58:01', '2025-02-06 09:45:43'),
(173989537127251, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'xyz', 'dsdfasdsfs', 'passport', 'wertyu', 'sfdsfsd', 1, 0, '', 'pending', NULL, '2025-02-18 16:16:11', '2025-02-18 16:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `customerportal`
--

DROP TABLE IF EXISTS `customerportal`;
CREATE TABLE IF NOT EXISTS `customerportal` (
  `adminId` bigint NOT NULL,
  `portalEnable` tinyint NOT NULL,
  `portalId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customerportal`
--

INSERT INTO `customerportal` (`adminId`, `portalEnable`, `portalId`) VALUES
(1736615183114993, 1, '1f7eb1d132dd059422ead7d5660301a21db9d2eb');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int NOT NULL,
  `otpSentDateTime` datetime NOT NULL,
  `portalID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminId` bigint NOT NULL,
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `otp`, `otpSentDateTime`, `portalID`, `adminId`, `createDateTime`, `updateDateTime`, `fname`, `lname`, `phone`, `address_1`, `address_2`, `city`, `state`, `country`, `zipcode`, `company`, `website`) VALUES
(1738224734542251, 'customer@examle.com', 507086, '2025-02-17 17:13:00', '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1736615183114993, '2025-01-30 08:12:14', '2025-02-17 17:13:00', 'John', 'Deo', '', '', '', '', '', '', '', '', ''),
(1738224845466766, 'customer@example.com', 921911, '2025-02-18 14:02:21', '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1736615183114993, '2025-01-30 08:14:05', '2025-02-18 14:02:21', 'John', 'Deo', '1234567890', '1005', 'sector11', 'Chandigarh', 'Chandigarh', 'India', '12345', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint NOT NULL,
  `adminId` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packagepayments`
--

DROP TABLE IF EXISTS `packagepayments`;
CREATE TABLE IF NOT EXISTS `packagepayments` (
  `id` bigint NOT NULL,
  `gatewayTransId` bigint DEFAULT NULL,
  `transactionId` bigint DEFAULT NULL,
  `adminId` bigint DEFAULT NULL,
  `package` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint DEFAULT NULL COMMENT 'amount in kobo, 100 kobo = 1 Naira (NGN)',
  `currency` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `gatewayResponse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `createDateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packagepayments`
--

INSERT INTO `packagepayments` (`id`, `gatewayTransId`, `transactionId`, `adminId`, `package`, `amount`, `currency`, `status`, `payment`, `paid_at`, `gatewayResponse`, `createDateTime`, `updateDateTime`) VALUES
(1739376484319659, 4681202083, 1739376484319659, 1736615183114993, 'package-basic', 3750000, 'NGN', 'success', 'y', '2025-02-12 16:08:30', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":4681202083,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1739376484319659\",\"receipt_number\":null,\"amount\":3750000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-02-12T16:08:30.000Z\",\"created_at\":\"2025-02-12T16:08:06.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.28.28\",\"metadata\":{\"adminId\":\"1736615183114993\",\"transactionId\":\"1739376484319659\",\"package\":\"package-basic\",\"cancel_action\":\"http:\\/\\/local.smartkyc.com\\/admin\\/payment\\/cancel\"},\"log\":{\"start_time\":1739376492,\"time_spent\":19,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":17},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":19}]},\"fees\":66250,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_1u8y298enp\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_fBgNPWYyR50p9HTu80N2\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":238170758,\"first_name\":null,\"last_name\":null,\"email\":\"dinesh@example.com\",\"customer_code\":\"CUS_l4qfkv4wt7uvogh\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-02-12T16:08:30.000Z\",\"createdAt\":\"2025-02-12T16:08:06.000Z\",\"requested_amount\":3750000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-02-12T16:08:06.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-02-12 16:08:33', '2025-02-12 16:08:33'),
(1739458481323048, 4684236060, 1739458481323048, 1736615183114993, 'package-basic', 3750000, 'NGN', 'success', 'y', '2025-02-13 14:54:56', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":4684236060,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1739458481323048\",\"receipt_number\":null,\"amount\":3750000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-02-13T14:54:56.000Z\",\"created_at\":\"2025-02-13T14:54:42.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.28.28\",\"metadata\":{\"adminId\":\"1736615183114993\",\"transactionId\":\"1739458481323048\",\"package\":\"package-basic\",\"cancel_action\":\"http:\\/\\/local.smartkyc.com\\/admin\\/payment\\/cancel\"},\"log\":{\"start_time\":1739458489,\"time_spent\":7,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":6},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":7}]},\"fees\":66250,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_p79rokbgwt\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_fBgNPWYyR50p9HTu80N2\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":238170758,\"first_name\":null,\"last_name\":null,\"email\":\"dinesh@example.com\",\"customer_code\":\"CUS_l4qfkv4wt7uvogh\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-02-13T14:54:56.000Z\",\"createdAt\":\"2025-02-13T14:54:42.000Z\",\"requested_amount\":3750000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-02-13T14:54:42.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-02-13 14:54:59', '2025-02-13 14:54:59'),
(1740207366627804, 4712618542, 1740207366627804, 1736615183114993, 'package-basic', 3750000, 'NGN', 'success', 'y', '2025-02-22 06:56:41', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":4712618542,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1740207366627804\",\"receipt_number\":null,\"amount\":3750000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-02-22T06:56:41.000Z\",\"created_at\":\"2025-02-22T06:56:10.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.26.67\",\"metadata\":{\"adminId\":\"1736615183114993\",\"transactionId\":\"1740207366627804\",\"package\":\"package-basic\",\"cancel_action\":\"http:\\/\\/local.smartkyc.com\\/admin\\/payment\\/cancel\"},\"log\":{\"start_time\":1740207373,\"time_spent\":25,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":24},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":25}]},\"fees\":66250,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_1e3ejm163t\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_fBgNPWYyR50p9HTu80N2\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":238170758,\"first_name\":null,\"last_name\":null,\"email\":\"dinesh@example.com\",\"customer_code\":\"CUS_l4qfkv4wt7uvogh\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-02-22T06:56:41.000Z\",\"createdAt\":\"2025-02-22T06:56:10.000Z\",\"requested_amount\":3750000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-02-22T06:56:10.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-02-22 06:56:41', '2025-02-22 06:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int NOT NULL,
  `fname` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int NOT NULL,
  `otpExpired` int NOT NULL,
  `otpSentDateTime` datetime NOT NULL,
  `paystack` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `fname`, `lname`, `email`, `otp`, `otpExpired`, `otpSentDateTime`, `paystack`, `smtp`, `createDateTime`, `updateDateTime`) VALUES
(1, 'john', 'deo', 'admin@example.com', 0, 0, '2025-02-22 11:28:41', '{\"secretkey\":\"xxxxxxxxx1234567890\",\"publickey\":\"xxxxxxxxx1234567890\"}', '{\"host\":\"\", \"port\":\"\", \"username\":\"\", \"password\":\"\", \"encryption\":\"\", \"from_email\":\"\", \"from_name\":\"\" \"replyTo_email\":\"\", \"replyTo_name\":\"\"}', '2025-02-22 11:28:41', '2025-02-22 11:28:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
