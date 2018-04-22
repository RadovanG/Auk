-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 06:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bizkodaukcije`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` int(32) NOT NULL,
  `adminName` varchar(32) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `AdminType` int(5) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela sa adminina';

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `articleID` int(16) NOT NULL AUTO_INCREMENT,
  `articleName` varchar(250) NOT NULL,
  `articleUserDes` varchar(1500) NOT NULL,
  `subCatID` int(11) NOT NULL,
  `articleState` varchar(10) NOT NULL,
  `articleTimePosted` timestamp NOT NULL,
  `articleTimeExpires` datetime NOT NULL,
  `articleCostBuyNow` decimal(10,2) NOT NULL,
  `firstBidPrice` decimal(10,2) NOT NULL,
  `articleDonation` tinyint(1) NOT NULL,
  `articlePhoto` varchar(200) NOT NULL,
  PRIMARY KEY (`articleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Articles ' AUTO_INCREMENT=1000005 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleID`, `articleName`, `articleUserDes`, `subCatID`, `articleState`, `articleTimePosted`, `articleTimeExpires`, `articleCostBuyNow`, `firstBidPrice`, `articleDonation`, `articlePhoto`) VALUES
(1000000, 'articleName', 'articleUserDes', 1, 'articleSta', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '400.00', '500.00', 9, ''),
(1000001, 'hukth', 'bh', 1, 'hgghj', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '15000.00', '500.00', 1, ''),
(1000002, 'fddhjk', 'hjkhkhk', 1, 'hjkhjk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5000.00', '500.00', 1, 'images/user/21-04-2018-1524338442.gif'),
(1000003, 'kfdshkdfghj', 'ghghgh', 1, 'kgghk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5000.00', '500.00', 1, 'images/user/21-04-2018-1524338548.png'),
(1000004, 'dsfndsfjkg', 'hghjgj', 1, 'gghj', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5000.00', '500.00', 1, 'images/user/21-04-2018-1524338887.gif');

-- --------------------------------------------------------

--
-- Table structure for table `articlesbyusers`
--

CREATE TABLE IF NOT EXISTS `articlesbyusers` (
  `artbyuID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `articleID` int(11) NOT NULL,
  PRIMARY KEY (`artbyuID`),
  KEY `userID` (`userID`),
  KEY `articleID` (`articleID`),
  KEY `articleID_2` (`articleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='List of Articles by Users.' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `articlesbyusers`
--

INSERT INTO `articlesbyusers` (`artbyuID`, `userID`, `articleID`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `bidID` int(11) NOT NULL AUTO_INCREMENT,
  `articleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bidTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bidValue` decimal(10,2) NOT NULL,
  PRIMARY KEY (`bidID`),
  KEY `articleID` (`articleID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Bids ' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bidID`, `articleID`, `userID`, `bidTime`, `bidValue`) VALUES
(2, 1000000, 2, '0000-00-00 00:00:00', '1500.00'),
(3, 1000000, 2, '2018-04-22 03:34:48', '4500.00'),
(4, 1000000, 2, '2018-04-22 03:45:32', '5000.00'),
(5, 1000000, 2, '2018-04-22 04:05:58', '7800.00'),
(6, 1000000, 2, '2018-04-22 04:07:03', '9000.00'),
(7, 1000000, 2, '2018-04-22 04:07:15', '9100.00'),
(8, 1000001, 2, '2018-04-22 04:11:27', '7500.00'),
(9, 1000002, 2, '2018-04-22 04:11:34', '6524.00'),
(10, 1000003, 2, '2018-04-22 04:11:45', '1524.00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of Categories';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Bela Tehnika'),
(2, 'Knjige');

-- --------------------------------------------------------

--
-- Table structure for table `charity`
--

CREATE TABLE IF NOT EXISTS `charity` (
  `charityID` int(11) NOT NULL,
  `charityName` varchar(80) NOT NULL,
  `charityDescription` varchar(1000) NOT NULL,
  `charityAddress` varchar(100) NOT NULL,
  `charityCity` varchar(50) NOT NULL,
  `charityEmail` varchar(50) NOT NULL,
  `charityPhone` varchar(35) NOT NULL,
  `charityWebsite` varchar(120) NOT NULL,
  `charityWallet` decimal(10,2) NOT NULL,
  PRIMARY KEY (`charityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategoryID` int(11) NOT NULL,
  `subcategoryName` varchar(40) NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`subcategoryID`),
  KEY `categoryID` (`categoryID`),
  KEY `categoryID_2` (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of subcategories by categories.';

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryID`, `subcategoryName`, `categoryID`) VALUES
(1, 'Veš mašine', 1),
(2, 'Šporeti', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateLastLogin` timestamp NOT NULL,
  `userPhoto` varchar(100) NOT NULL,
  `userWallet` decimal(10,2) NOT NULL,
  `userBirthday` date NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='User details table.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `username`, `password`, `address`, `city`, `phone`, `email`, `dateRegistered`, `dateLastLogin`, `userPhoto`, `userWallet`, `userBirthday`) VALUES
(1, 'proba', 'proba', 'pr', '9f47b814230f7481deb45506283214aa58e923f9', 'proab', 'proba', 'proba', 'proba', '2018-04-21 10:53:36', '2018-04-21 10:53:36', 'images/user/21-04-2018-1524319595.png', '15000.00', '0000-00-00'),
(2, 'proba2', 'proba', 'proba', '9f47b814230f7481deb45506283214aa58e923f9', 'proba', 'proba', 'a', 'a', '2018-04-21 10:53:36', '2018-04-21 10:53:36', 'images/user/21-04-2018-1524345869.gif', '0.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `userwallet`
--

CREATE TABLE IF NOT EXISTS `userwallet` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallethistorycharity`
--

CREATE TABLE IF NOT EXISTS `wallethistorycharity` (
  `charityTransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `charityID` int(11) NOT NULL,
  `charityTime` timestamp NOT NULL,
  `charityAmountChange` decimal(10,0) NOT NULL,
  PRIMARY KEY (`charityTransactionID`),
  KEY `charityID` (`charityID`),
  KEY `charityID_2` (`charityID`),
  KEY `charityID_3` (`charityID`),
  KEY `charityID_4` (`charityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Transactions for charities' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallethistoryuser`
--

CREATE TABLE IF NOT EXISTS `wallethistoryuser` (
  `userTransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `change` decimal(10,2) NOT NULL,
  PRIMARY KEY (`userTransactionID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articlesbyusers`
--
ALTER TABLE `articlesbyusers`
  ADD CONSTRAINT `userIDarticlesconst` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `wallethistorycharity`
--
ALTER TABLE `wallethistorycharity`
  ADD CONSTRAINT `wallethistorycharity_ibfk_1` FOREIGN KEY (`charityID`) REFERENCES `charity` (`charityID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `wallethistoryuser`
--
ALTER TABLE `wallethistoryuser`
  ADD CONSTRAINT `wallethistoryuser_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
