-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 03:02 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `carbrands`
--

CREATE TABLE `carbrands` (
  `id` int(11) NOT NULL,
  `Name_en` varchar(255) DEFAULT NULL,
  `Name_ar` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carbrands`
--

INSERT INTO `carbrands` (`id`, `Name_en`, `Name_ar`, `Created_at`, `Updated_at`) VALUES
(1, 'jeep', NULL, '2019-08-23 16:30:57', '2019-08-23 16:30:57'),
(2, 'Lada', NULL, '2019-08-23 16:30:57', '2019-08-23 16:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `carmodels`
--

CREATE TABLE `carmodels` (
  `id` int(11) NOT NULL,
  `CarBrand_id` int(11) DEFAULT NULL,
  `ModelName_en` varchar(255) DEFAULT NULL,
  `ModelName_ar` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carmodels`
--

INSERT INTO `carmodels` (`id`, `CarBrand_id`, `ModelName_en`, `ModelName_ar`, `Created_at`, `Updated_at`) VALUES
(1, 1, 'compass', NULL, '2019-08-23 16:33:29', '2019-08-23 16:33:29'),
(2, 2, 'Priora sedan', NULL, '2019-08-23 16:33:29', '2019-08-23 16:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `cartypes`
--

CREATE TABLE `cartypes` (
  `id` int(11) NOT NULL,
  `Description_en` text DEFAULT NULL,
  `Description_ar` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `discounttypes`
--

CREATE TABLE `discounttypes` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discounttypes`
--

INSERT INTO `discounttypes` (`id`, `Type`, `Created_at`, `Updated_at`) VALUES
(1, 'Percentage', '2019-08-23 18:57:26', '2019-08-23 18:57:26'),
(2, 'Amount', '2019-08-23 18:57:26', '2019-08-23 18:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `Description_en` varchar(255) DEFAULT NULL,
  `Description_ar` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `Description_en`, `Description_ar`, `Created_at`, `Updated_at`) VALUES
(1, 'Female', NULL, '2019-08-23 18:03:51', '2019-08-23 18:03:51'),
(2, 'Male', NULL, '2019-08-23 18:03:51', '2019-08-23 18:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `Name_en` varchar(255) DEFAULT NULL,
  `Name_ar` text DEFAULT NULL,
  `Longitude` decimal(10,0) DEFAULT NULL,
  `latitude` decimal(10,0) DEFAULT NULL,
  `CoverageArea` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `SubService_id` int(11) DEFAULT NULL,
  `Sale` float DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderreports`
--

CREATE TABLE `orderreports` (
  `id` int(11) NOT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `SubService_id` int(11) DEFAULT NULL,
  `ServiceLocation_id` int(11) DEFAULT NULL,
  `UserLocationLonitude` decimal(10,0) DEFAULT NULL,
  `UserLocationLatitude` decimal(10,0) DEFAULT NULL,
  `TotalAmount` int(11) DEFAULT NULL,
  `ServiveReqDate` date DEFAULT NULL,
  `ServiceReqTime` time DEFAULT NULL,
  `OrderStatus_id` int(255) NOT NULL,
  `PaymentType_id` int(11) DEFAULT NULL,
  `Service_id` int(11) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `Description`, `Created_at`, `Updated_at`) VALUES
(1, 'Pending', '2019-08-23 19:00:56', '2019-08-23 19:00:56'),
(2, 'InProgress', '2019-08-23 19:00:56', '2019-08-23 19:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `PaymentType_id` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `Transaction_id` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `id` int(11) NOT NULL,
  `Name_en` varchar(255) DEFAULT NULL,
  `Name_ar` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymenttypes`
--

INSERT INTO `paymenttypes` (`id`, `Name_en`, `Name_ar`, `Created_at`, `Updated_at`) VALUES
(1, 'Wallet', NULL, '2019-08-23 19:03:21', '2019-08-23 19:03:21'),
(2, 'Cash on delivery', NULL, '2019-08-23 19:03:21', '2019-08-23 19:03:21'),
(3, 'Fawry', NULL, '2019-08-23 19:03:46', '2019-08-23 19:03:46'),
(4, 'Bank account(Payfort)', NULL, '2019-08-23 19:03:46', '2019-08-23 19:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL,
  `Description_en` text DEFAULT NULL,
  `Description_ar` text DEFAULT NULL,
  `Code` int(11) DEFAULT NULL,
  `DiscountType_id` int(11) DEFAULT NULL,
  `DiscountAmount` float DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicecategories`
--

CREATE TABLE `servicecategories` (
  `id` int(11) NOT NULL,
  `ServiceName_en` varchar(255) DEFAULT NULL,
  `ServiceDescription_en` varchar(255) DEFAULT NULL,
  `ServiceName_ar` text DEFAULT NULL,
  `ServiceDescription_ar` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicecategories`
--

INSERT INTO `servicecategories` (`id`, `ServiceName_en`, `ServiceDescription_en`, `ServiceName_ar`, `ServiceDescription_ar`, `Created_at`, `Updated_at`) VALUES
(1, 'CAR WASHING & DETAILING', NULL, NULL, NULL, '2019-08-23 17:42:18', '2019-08-23 17:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `servicelocations`
--

CREATE TABLE `servicelocations` (
  `id` int(11) NOT NULL,
  `Service_id` int(11) DEFAULT NULL,
  `Location_id` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicesubcategories`
--

CREATE TABLE `servicesubcategories` (
  `id` int(11) NOT NULL,
  `Name_en` varchar(255) DEFAULT NULL,
  `Description_en` varchar(255) DEFAULT NULL,
  `Name_ar` text DEFAULT NULL,
  `Description_ar` text DEFAULT NULL,
  `Service_id` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `ServiceType_id` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicesubcategories`
--

INSERT INTO `servicesubcategories` (`id`, `Name_en`, `Description_en`, `Name_ar`, `Description_ar`, `Service_id`, `Price`, `ServiceType_id`, `Created_at`, `Updated_at`) VALUES
(1, 'Car Wash in & out', NULL, NULL, NULL, 1, 250, 1, '2019-08-23 18:14:50', '2019-08-23 18:14:50'),
(2, 'Wash car furnishing', NULL, NULL, NULL, 1, 50, 1, '2019-08-23 18:33:49', '2019-08-23 18:33:49'),
(3, 'Roof Wash', NULL, NULL, NULL, 1, 50, 1, '2019-08-23 18:35:30', '2019-08-23 18:35:30'),
(4, 'Tyres Wash', NULL, NULL, NULL, 1, NULL, NULL, '2019-08-23 18:36:21', '2019-08-23 18:36:21'),
(5, 'Motor Wash', NULL, NULL, NULL, 1, NULL, NULL, '2019-08-23 18:36:40', '2019-08-23 18:36:40'),
(6, 'Asphalt cleaning', NULL, NULL, NULL, 1, NULL, NULL, '2019-08-23 18:36:59', '2019-08-23 18:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `servicetypes`
--

CREATE TABLE `servicetypes` (
  `id` int(11) NOT NULL,
  `Description` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicetypes`
--

INSERT INTO `servicetypes` (`id`, `Description`, `Created_at`, `Updated_at`) VALUES
(1, 'Fixed', '2019-08-23 18:13:35', '2019-08-23 18:13:35'),
(2, 'Changed', '2019-08-23 18:13:35', '2019-08-23 18:13:35'),
(3, 'quotation', '2019-08-23 18:14:04', '2019-08-23 18:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `usercars`
--

CREATE TABLE `usercars` (
  `id` bigint(40) NOT NULL,
  `User_id` bigint(40) DEFAULT NULL,
  `CarBrand_id` int(11) DEFAULT NULL,
  `CarModel_id` int(11) DEFAULT NULL,
  `CarType_id` int(11) DEFAULT NULL,
  `Mileage` int(11) DEFAULT NULL,
  `ManufectureDate` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usercars`
--

INSERT INTO `usercars` (`id`, `User_id`, `CarBrand_id`, `CarModel_id`, `CarType_id`, `Mileage`, `ManufectureDate`, `Created_at`, `Updated_at`) VALUES
(1, 4, 1, 1, NULL, 2, 2013, '2019-08-23 16:29:18', '2019-08-23 16:29:18'),
(2, 5, 1, 1, NULL, 2, 2013, '2019-08-23 16:38:55', '2019-08-23 16:38:55'),
(3, 9, 1, 1, NULL, 2, 2013, '2019-08-23 17:50:37', '2019-08-23 17:50:37'),
(6, 5, 1, 1, NULL, 11, 111, '2019-08-23 20:17:38', '2019-08-23 20:17:38'),
(7, 5, 1, 1, NULL, 11, 111, '2019-08-23 20:21:04', '2019-08-23 20:21:04'),
(8, 5, 1, 1, NULL, 11, 111, '2019-08-23 20:21:57', '2019-08-23 20:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(40) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `DateOfBirth` text DEFAULT NULL,
  `Gender_id` int(11) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IsVerifed` tinyint(1) DEFAULT 0,
  `IsActive` tinyint(1) DEFAULT 0,
  `CurrentWalletBalance` decimal(10,0) DEFAULT NULL,
  `FaceBook_id` bigint(40) DEFAULT NULL,
  `Google_id` bigint(40) DEFAULT NULL,
  `UserType_id` int(11) DEFAULT NULL,
  `ApiToken` text DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  `RecoveryCode` text DEFAULT NULL,
  `FacbookId` text DEFAULT NULL,
  `GoogleId` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `Email`, `Mobile`, `DateOfBirth`, `Gender_id`, `Photo`, `Password`, `IsVerifed`, `IsActive`, `CurrentWalletBalance`, `FaceBook_id`, `Google_id`, `UserType_id`, `ApiToken`, `Token`, `RecoveryCode`, `FacbookId`, `GoogleId`, `Created_at`, `Updated_at`) VALUES
(1, 'Pharous', 'pharous@gmail.com', '5023122', '2019-08-23', 1, 'ProjectFiles/UserPhotos/DMOvm5_1566576527_52598242_1971179459657199_1537544506092552192_n.jpg', '$2y$10$8O6TFYPz9PLFrmEBN1f1fehSs.rrRzQIZZW5cHnR4.UxYDMn4KkD2', 0, 0, NULL, NULL, NULL, NULL, 'Qmo3cWVRN05SVnNKb0FFWWppejBRNG9JUkJORG1hdDR3MWREMEtaeA==', NULL, NULL, NULL, NULL, '2019-08-23 16:08:47', '2019-08-23 16:08:47'),
(3, 'Nour', 'Nour@gmail.com', '5023122', '2014', 1, 'ProjectFiles/UserPhotos/O0l14W_1566577676_4234205_0.jpg', '$2y$10$m4bFZpiOLnZMp8rZD/aJmeZLlmb.IqL00TKUR5WopB0EyxiuP1TI.', 0, 0, NULL, NULL, NULL, NULL, 'Q2x0c3ZrZ2VLRWc5TFc0MUpuV0piRU94dFRuQzRDSlZnWnNCZGZLdg==', NULL, NULL, NULL, NULL, '2019-08-23 16:27:56', '2019-08-23 16:27:56'),
(4, 'Noura', 'Noura@gmail.com', '5023122', '2014', 1, 'ProjectFiles/UserPhotos/pH9eCg_1566577758_4234205_0.jpg', '$2y$10$ebYzI75i6BtibC/z36tejO48G6d3GmYRoUvcm7vX4HCky9G3/T04W', 0, 0, NULL, NULL, NULL, NULL, 'N2N1alZwNE9Yd09qSkJidEpjS1o5bTQ0VHo1ZmJRMUl5czlPdVhTTQ==', NULL, NULL, NULL, NULL, '2019-08-23 16:29:18', '2019-08-23 16:29:18'),
(5, 'sally', 'sally@gmail.com', '5023122', '2014', 1, 'ProjectFiles/UserPhotos/46fGZR_1566578334_242.jpg', '$2y$10$XwqkcTIvyXRxrbq/1nYYUOVDRiKjiXgYNMXDn1xle1jRARne9HS1m', 0, 0, NULL, NULL, NULL, NULL, 'bUJSeERUWEF0d0VQNkMybGxBQ0tQSkUyNlRkTFdhOGtybENxdGFvRQ==', NULL, 'WXU=', NULL, NULL, '2019-08-23 16:38:55', '2019-08-23 20:16:48'),
(6, 'sally', 'sally@gmail.com', '5023122', '2014', 1, '', NULL, 0, 0, NULL, NULL, NULL, NULL, 'QmtvY3JvVjZ5OHN2UVdabU1aZ2lOTFRMOWhCSUJVSG9RNXNxMnpHSQ==', 'Token', NULL, 'Test', NULL, '2019-08-23 17:09:59', '2019-08-23 17:09:59'),
(7, 'sally', 'sally@gmail.com', '5023122', '2014', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'Y3ZhbHdSaU45NkE2NHRsR2xFRWFFOEtzcDc3Z1UzeEFqNktZUTNKSA==', 'Token', NULL, 'fb', NULL, '2019-08-23 17:12:12', '2019-08-23 17:12:12'),
(8, 'sally', 'Loly@gmail.com', '5023122', '2014', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'TVc1d2VjZnJWR01xNzRZajQ4cjhRcDByaW9FaldWYjZqUnp1Wkpibw==', 'asD', NULL, NULL, 'fbaaaaaaa', '2019-08-23 17:18:03', '2019-08-23 17:18:15'),
(9, 'hossam', 'hosam@gmail.com', '5023122', '2014', 1, 'NULL', '$2y$10$0yG0LWJKX1mTo8Tn0APymeDFnlb/lnbbotUQqVxrDLkLSUEetHUwu', 0, 0, NULL, NULL, NULL, NULL, 'MGRCdVF2Z0hySXdSRklaTFVKSkFCam41MFFyaTlKczFCZ0sxUzFjbw==', NULL, NULL, NULL, NULL, '2019-08-23 17:50:37', '2019-08-23 17:50:37'),
(10, 'hossam', 'hosaaam@gmail.com', '5023122', '2014', 1, 'NULL', '$2y$10$f/e0bAddmmz06/wmfAxHoukcNgX5yIj21j3L914btcc4dVj1tGPSq', 0, 0, NULL, NULL, NULL, NULL, 'YWtCYnBuM1pTZ1FXOTVsRVMxRmxsaHQzT3A2M2F2V05KSktTZU1VTw==', NULL, NULL, NULL, NULL, '2019-08-23 17:51:50', '2019-08-23 17:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `usersavedplaces`
--

CREATE TABLE `usersavedplaces` (
  `id` bigint(40) NOT NULL,
  `User_id` bigint(40) DEFAULT NULL,
  `Name_en` varchar(255) DEFAULT NULL,
  `Name_ar` text DEFAULT NULL,
  `Latitude` decimal(10,0) DEFAULT NULL,
  `longitude` decimal(10,0) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `Description`, `Created_at`, `Updated_at`) VALUES
(1, 'Admin', '2019-08-23 19:07:42', '2019-08-23 19:07:42'),
(2, 'Normal', '2019-08-23 19:07:42', '2019-08-23 19:07:42'),
(3, 'Provider', '2019-08-23 19:07:50', '2019-08-23 19:07:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carbrands`
--
ALTER TABLE `carbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carmodels`
--
ALTER TABLE `carmodels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartypes`
--
ALTER TABLE `cartypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounttypes`
--
ALTER TABLE `discounttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderreports`
--
ALTER TABLE `orderreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicecategories`
--
ALTER TABLE `servicecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicelocations`
--
ALTER TABLE `servicelocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicesubcategories`
--
ALTER TABLE `servicesubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicetypes`
--
ALTER TABLE `servicetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercars`
--
ALTER TABLE `usercars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersavedplaces`
--
ALTER TABLE `usersavedplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carbrands`
--
ALTER TABLE `carbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carmodels`
--
ALTER TABLE `carmodels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cartypes`
--
ALTER TABLE `cartypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounttypes`
--
ALTER TABLE `discounttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderreports`
--
ALTER TABLE `orderreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicecategories`
--
ALTER TABLE `servicecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicelocations`
--
ALTER TABLE `servicelocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicesubcategories`
--
ALTER TABLE `servicesubcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servicetypes`
--
ALTER TABLE `servicetypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usercars`
--
ALTER TABLE `usercars`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usersavedplaces`
--
ALTER TABLE `usersavedplaces`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
