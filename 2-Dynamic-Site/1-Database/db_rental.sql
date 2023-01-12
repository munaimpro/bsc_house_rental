-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 11:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad`
--

CREATE TABLE `tbl_ad` (
  `adId` int(11) NOT NULL,
  `adTitle` varchar(255) NOT NULL,
  `adImg` varchar(255) NOT NULL,
  `catId` varchar(255) NOT NULL,
  `adDate` date DEFAULT NULL,
  `builtYear` varchar(255) NOT NULL,
  `adDetails` text NOT NULL,
  `adArea` varchar(255) NOT NULL,
  `adAddress` text NOT NULL,
  `adSize` varchar(255) NOT NULL,
  `totalFloor` varchar(255) NOT NULL,
  `totalUnit` varchar(255) NOT NULL,
  `totalRoom` varchar(255) NOT NULL,
  `totalBed` varchar(255) NOT NULL,
  `totalBath` varchar(255) NOT NULL,
  `attachBath` varchar(255) NOT NULL,
  `commonBath` varchar(255) NOT NULL,
  `totalBelcony` varchar(255) NOT NULL,
  `floorNo` varchar(255) NOT NULL,
  `floorType` varchar(255) NOT NULL,
  `prefferedRenter` text NOT NULL,
  `liftElevetor` varchar(255) NOT NULL,
  `adGenerator` varchar(255) NOT NULL,
  `adWifi` varchar(255) NOT NULL,
  `carParking` varchar(255) NOT NULL,
  `openSpace` varchar(255) NOT NULL,
  `playGround` varchar(255) NOT NULL,
  `ccTV` varchar(255) NOT NULL,
  `sGuard` varchar(255) NOT NULL,
  `rentType` varchar(255) NOT NULL,
  `adRent` varchar(255) NOT NULL,
  `gasBill` varchar(255) NOT NULL,
  `electricBill` varchar(255) NOT NULL,
  `eBillType` varchar(255) NOT NULL,
  `sCharge` varchar(255) NOT NULL,
  `adNegotiable` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `adStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ad`
--

INSERT INTO `tbl_ad` (`adId`, `adTitle`, `adImg`, `catId`, `adDate`, `builtYear`, `adDetails`, `adArea`, `adAddress`, `adSize`, `totalFloor`, `totalUnit`, `totalRoom`, `totalBed`, `totalBath`, `attachBath`, `commonBath`, `totalBelcony`, `floorNo`, `floorType`, `prefferedRenter`, `liftElevetor`, `adGenerator`, `adWifi`, `carParking`, `openSpace`, `playGround`, `ccTV`, `sGuard`, `rentType`, `adRent`, `gasBill`, `electricBill`, `eBillType`, `sCharge`, `adNegotiable`, `userId`, `adStatus`) VALUES
(1, 'This is our test property', 'uploads/ad_image/7f9b994973.jpg', '1', '2022-05-23', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Khulshi', 'Khulshi, Chattogram', '1240', '4', '8', '4', '2', '3', '2', '1', '3', '2', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'mo', '11000', '800', '400', 'inc', '1500', 'negotiable', '2', 0),
(2, 'This is our test property', 'uploads/ad_image/bad4a61dbc.jpg', '1', '2022-06-05', '2000', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Khulshi', 'Khulshi, Chattogram', '1450', '5', '10', '5', '3', '5', '3', '2', '4', '4', 'Marble', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'mo', '1500', '800', '400', 'inc', '2000', 'negotiable', '2', 1),
(4, 'This is our test property', 'uploads/ad_image/776a39c306.jpg', '5', '2022-06-01', '2000', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Khulshi', 'Khulshi, Chattogram', '1250', '3', '6', '4', '2', '3', '2', '1', '', '2', 'Mosice', 'All', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'Yes', 'mo', '5000', '500', '400', 'inc', '1000', 'negotiable', '2', 1),
(5, 'This is our test property', 'uploads/ad_image/e5af7ffb80.jpg', '5', '2022-06-02', '2000', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Agrabad', 'Agrabad, Chattogram', '1100', '3', '6', '3', '2', '3', '2', '1', '', '3', 'Tiles', 'All', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'mo', '5000', '500', '300', 'exc', '1000', 'negotiable', '2', 1),
(6, 'This is our test property', 'uploads/ad_image/55d33191dd.jpg', '5', '2022-04-12', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Lal Khan Bazar', 'Lal Khan Bazar, Chattogram', '1200', '3', '6', '3', '2', '2', '2', '', '', '2', 'Normal', 'All', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'mo', '5000', '500', '300', 'exc', '1000', 'negotiable', '3', 0),
(7, 'This is our test property', 'uploads/ad_image/c82068da5a.jpg', '5', '2022-03-03', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Lal Khan Bazar', 'Lal Khan, Chattogram', '1450', '4', '8', '4', '2', '3', '2', '1', '1', '3', 'Mosice', 'All', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'mo', '7000', '600', '300', 'inc', '1000', 'negotiable', '3', 2),
(8, 'This is our test property', 'uploads/ad_image/17fbd7f82e.jpg', '1', '2022-06-06', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Lal Khan Bazar', 'Lal Khan, Chattogram', '1450', '5', '10', '5', '3', '5', '3', '2', '4', '3', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'mo', '11000', '800', '400', 'inc', '1500', 'negotiable', '3', 1),
(9, 'This is our test property', 'uploads/ad_image/14cf27c9c2.jpg', '1', '2022-06-07', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Nayabazar', 'Nayabazar, Chattogram', '1500', '5', '10', '5', '3', '4', '3', '2', '3', '4', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'mo', '15000', '800', '300', 'inc', '1200', 'negotiable', '4', 1),
(10, 'This is our test property', 'uploads/ad_image/214b40c128.jpg', '1', '2022-06-05', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Nayabazar', 'Nayabazar, Chattogram', '1350', '4', '8', '4', '2', '3', '2', '1', '3', '3', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'mo', '11000', '500', '300', 'inc', '1000', 'negotiable', '4', 1),
(11, 'This is our test property', 'uploads/ad_image/84d5123929.jpg', '5', '2022-06-21', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Nayabazar', 'Nayabazar, Chattogram', '1230', '3', '6', '2', '1', '2', '1', '1', '2', '2', 'Normal', 'All', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'mo', '5000', '500', '300', 'inc', '1000', 'negotiable', '4', 1),
(12, 'This is our test property', 'uploads/ad_image/81046c187c.jpg', '5', '2022-01-03', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', '2 No Gate', '2 No Gate, Chattogram', '1400', '3', '6', '4', '2', '3', '2', '1', '2', '2', 'Tiles', 'All', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'Yes', 'mo', '6000', '500', '300', 'inc', '1000', 'negotiable', '4', 1),
(13, 'This is our test property', 'uploads/ad_image/71b46ef61f.jpg', '1', '2022-02-09', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Agrabad', 'Agrabad, Chattogram', '1450', '4', '8', '4', '2', '3', '2', '1', '2', '3', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'mo', '11000', '800', '500', 'inc', '1200', 'negotiable', '5', 0),
(14, 'This is our test property', 'uploads/ad_image/b16ab2fd40.jpg', '1', '2022-03-02', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Agrabad', 'Agrabad, Chattogram', '1450', '5', '10', '4', '3', '3', '2', '1', '3', '2', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'mo', '14000', '600', '500', 'inc', '1200', 'negotiable', '5', 0),
(15, 'This is our test property', 'uploads/ad_image/c5d9e0d4a3.jpg', '5', '2022-06-06', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Agrabad', 'Agrabad, Chattogram', '1400', '4', '8', '4', '2', '3', '2', '1', '3', '3', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'Yes', 'mo', '7000', '500', '300', 'inc', '1000', 'negotiable', '5', 0),
(16, 'This is our test property', 'uploads/ad_image/dc7ea563eb.jpg', '5', '2022-05-09', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Khulshi', 'Khulshi, Chattogram', '1230', '3', '6', '3', '2', '3', '2', '1', '2', '2', 'Tiles', 'All', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'Yes', 'mo', '7000', '800', '500', 'inc', '1000', 'negotiable', '4', 0),
(17, 'This is our test property', 'uploads/ad_image/d11a819ece.jpg', '5', '2021-12-27', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Nayabazar', 'Nayabazar, Chattogram', '1290', '3', '6', '3', '2', '2', '2', '', '2', '3', 'Normal', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'mo', '5000', '500', '500', 'inc', '1000', 'negotiable', '3', 0),
(18, 'This is our test property', 'uploads/ad_image/a850df3d6b.jpg', '1', '2022-05-10', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Lal Khan Bazar', 'Lal Khan Bazar, Cahttogram', '1250', '4', '8', '4', '3', '3', '2', '1', '2', '2', 'Marble', 'All', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'mo', '12000', '500', '300', 'exc', '1000', 'negotiable', '3', 1),
(19, 'This is our test property', 'uploads/ad_image/9f80e42d02.jpg', '1', '2022-01-06', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'AK Khan', 'AK Khan, Chattogram', '1400', '5', '10', '5', '3', '4', '3', '1', '3', '3', 'Mosice', 'All', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'mo', '11000', '500', '400', 'inc', '1000', 'negotiable', '2', 1),
(20, 'This is our test property', 'uploads/ad_image/e112b0c464.jpg', '1', '2021-12-30', '2015', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Goni Bakery', 'Goni Bakery, Chattogram', '1400', '4', '8', '4', '3', '4', '3', '1', '3', '4', 'Tiles', 'All', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'mo', '16000', '500', '500', 'inc', '1000', 'negotiable', '3', 1),
(21, 'This is our test property', 'uploads/ad_image/a492943b73.jpg', '1', '2022-01-03', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Chatga Abashik', 'Chatga Abashik, Chattogram', '1260', '4', '8', '4', '2', '4', '2', '2', '3', '3', 'Tiles', 'All', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'mo', '10000', '500', '400', 'inc', '1000', 'negotiable', '4', 0),
(22, 'This is our test property', 'uploads/ad_image/83872054b2.jpg', '1', '2022-05-09', '2015', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', '2 No Gate', '2 No Gate, Chattogram', '1400', '5', '10', '4', '3', '2', '3', '1', '3', '3', 'Tiles', 'All', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 'mo', '8000', '800', '500', 'inc', '1500', 'negotiable', '5', 1),
(23, 'This is our test property', 'uploads/ad_image/7f53283b77.jpg', '1', '2020-11-24', '2010', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>', 'Agrabad', 'Agrabad, Chattogram', '1400', '4', '8', '4', '3', '3', '2', '1', '3', '2', 'Marble', 'All', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'Yes', 'mo', '12000', '700', '500', 'exc', '1000', 'negotiable', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adimg`
--

CREATE TABLE `tbl_adimg` (
  `imgId` int(11) NOT NULL,
  `adId` varchar(255) NOT NULL,
  `adImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bookingId` int(11) NOT NULL,
  `adId` varchar(255) NOT NULL,
  `bookingDate` datetime NOT NULL DEFAULT current_timestamp(),
  `renterId` varchar(255) NOT NULL,
  `renterName` varchar(255) NOT NULL,
  `renterMail` varchar(255) NOT NULL,
  `renterPhone` varchar(255) NOT NULL,
  `renterAddress` text NOT NULL,
  `ownerId` varchar(255) NOT NULL,
  `rentType` varchar(255) NOT NULL,
  `adRent` varchar(255) NOT NULL,
  `gasBill` varchar(255) NOT NULL,
  `electricBill` varchar(255) NOT NULL,
  `sCharge` varchar(255) NOT NULL,
  `bookingStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookingId`, `adId`, `bookingDate`, `renterId`, `renterName`, `renterMail`, `renterPhone`, `renterAddress`, `ownerId`, `rentType`, `adRent`, `gasBill`, `electricBill`, `sCharge`, `bookingStatus`) VALUES
(1, '7', '2022-06-30 23:03:29', '6', 'Raihanul Ikram', 'raihan@gmail.com', '01834-3212345443', 'Address', '3', 'mo', '6500', '600', '300', '1000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`, `catImg`) VALUES
(1, 'Flat/Apartment', 'uploads/category_image/bdfb4e8fbe.jpg'),
(5, 'Mess/Hostel', 'uploads/category_image/9ce779b96f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `id` int(11) NOT NULL,
  `copyrightText` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `copyrightText`) VALUES
(1, 'Copyright 2022. All Rights Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `msgId` int(11) NOT NULL,
  `msgName` varchar(255) NOT NULL,
  `msgEmail` varchar(255) NOT NULL,
  `msgPhone` varchar(255) NOT NULL,
  `msgText` text NOT NULL,
  `msgDate` datetime NOT NULL DEFAULT current_timestamp(),
  `msgStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`msgId`, `msgName`, `msgEmail`, `msgPhone`, `msgText`, `msgDate`, `msgStatus`) VALUES
(1, 'Munaim Khan', 'khanmail2599@gmail.com', '01834-3212345443', 'Message', '2022-06-30 23:05:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notfId` int(11) NOT NULL,
  `notfName` varchar(255) NOT NULL,
  `notfEmail` varchar(255) NOT NULL,
  `notfPhone` varchar(255) NOT NULL,
  `notfAddress` text NOT NULL,
  `notfMsg` text NOT NULL,
  `notfDate` datetime NOT NULL DEFAULT current_timestamp(),
  `renterId` varchar(255) NOT NULL,
  `ownerId` varchar(255) NOT NULL,
  `adId` varchar(255) NOT NULL,
  `notfStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sitedetails`
--

CREATE TABLE `tbl_sitedetails` (
  `id` int(11) NOT NULL,
  `siteTitle` varchar(255) NOT NULL,
  `siteSlogan` varchar(255) NOT NULL,
  `siteLogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sitedetails`
--

INSERT INTO `tbl_sitedetails` (`id`, `siteTitle`, `siteSlogan`, `siteLogo`) VALUES
(1, 'House Rental', 'Better place for better living', 'uploads/site_logo/logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userImg` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `cellNo` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `userAddress` text NOT NULL,
  `userPass` varchar(32) NOT NULL,
  `confPass` varchar(32) NOT NULL,
  `userLevel` int(11) NOT NULL,
  `userStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `firstName`, `lastName`, `userName`, `userImg`, `userEmail`, `cellNo`, `phoneNo`, `userAddress`, `userPass`, `confPass`, `userLevel`, `userStatus`) VALUES
(1, 'Munaim', 'Khan', 'munaim', '', 'khanmail2599@gmail.com', '01234-335354', '', 'Munir Nagar, Bandar, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 3, 0),
(2, 'Asif', 'Chowdhury', 'asif', '', 'asif@gmail.com', '01234-335354', '', 'Khulshi, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 0),
(3, 'Fayaz', 'Ahmed', 'fayaz', '', 'fayaz@gmail.com', '01234-335354', '', 'Lal Khan Bazar, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 0),
(4, 'Sayem', 'Ahmed', 'sayem', '', 'sayem@gmail.com', '01234-335354', '', 'Nayabazar, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 0),
(5, 'Abir', 'Ahmed', 'abir', '', 'abir@gmail.com', '01234-335354', '', 'Agrabad, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 0),
(6, 'Raihanul', 'Ikram', 'raihan', '', 'raihan@gmail.com', '01234-335354', '', 'Agrabad, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1, 0),
(7, 'Tamim', 'Shahriar', 'tamim', '', 'tamim@yahoo.com', '01234-335354', '', 'Khulshi, Chattogram', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wlistId` int(11) NOT NULL,
  `adId` varchar(255) NOT NULL,
  `catId` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `adStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ad`
--
ALTER TABLE `tbl_ad`
  ADD PRIMARY KEY (`adId`);

--
-- Indexes for table `tbl_adimg`
--
ALTER TABLE `tbl_adimg`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notfId`);

--
-- Indexes for table `tbl_sitedetails`
--
ALTER TABLE `tbl_sitedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wlistId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ad`
--
ALTER TABLE `tbl_ad`
  MODIFY `adId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_adimg`
--
ALTER TABLE `tbl_adimg`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sitedetails`
--
ALTER TABLE `tbl_sitedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
