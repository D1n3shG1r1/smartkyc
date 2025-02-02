-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2025 at 04:28 PM
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
(1736615183114993, 'Dinesh', 'Kumar', 'Address1', 'Address2', 'city', 'province', 'country', '12345', '1234567890', 'company', 'https://xyz.com', 'dinesh@example.com', '4a793931e2659a91410232c423feed2f', '2025-01-11 17:01:06', '2025-01-23 16:25:51');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicationdocuments`
--

INSERT INTO `applicationdocuments` (`id`, `adminId`, `portalId`, `applicationId`) VALUES
(1738407691491744, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 173840769134398),
(1738502233757201, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738502233605948);

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
  `status` tinyint(1) NOT NULL COMMENT '1-Verified as Authentic,\r\n2-Document Failed Verification,\r\n3-Document is Expired,\r\n4-Document Under Review,\r\n5-Further Action Required,\r\n6-Verification Incomplete (Pending Information),\r\n7-Document is Fraudulent,\r\n8-Unable to Verify (Issuing Authority Unreachable),\r\n9-Document Requires Manual Review,\r\n10-Document Verified with Discrepancies,\r\n11-Verification in Progress\r\n',
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `adminId`, `portalId`, `customerId`, `title`, `description`, `documentType`, `documentNo`, `comment`, `status`, `createDateTime`, `updateDateTime`) VALUES
(173840769134398, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'Driving License', 'Learner driving license', 'driving_license', 'INDDLCH00123', 'Learner Driving License Application', 11, '2025-02-01 11:01:31', '2025-02-01 11:01:31'),
(1738502233605948, 1736615183114993, '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1738224845466766, 'passport', 'Indian Passport', 'passport', 'pp123456789', '', 11, '2025-02-02 13:17:13', '2025-02-02 13:17:13');

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
(1738224734542251, 'customer@examle.com', 851699, '2025-01-30 08:12:14', '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1736615183114993, '2025-01-30 08:12:14', '2025-01-30 08:12:14', 'John', 'Deo', '', '', '', '', '', '', '', '', ''),
(1738224845466766, 'customer@example.com', 262096, '2025-02-02 13:06:59', '1f7eb1d132dd059422ead7d5660301a21db9d2eb', 1736615183114993, '2025-01-30 08:14:05', '2025-02-02 13:06:59', 'John', 'Deo', '1234567890', '1005', 'sector11', 'Chandigarh', 'Chandigarh', 'India', '12345', '', '');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
