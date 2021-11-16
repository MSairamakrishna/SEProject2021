-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE IF NOT EXISTS `farmer` ;
USE `farmer`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `v_login` varchar(20) NOT NULL,
  `v_password` varchar(20) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vid`, `v_login`, `v_password`) VALUES
(1, 'sai', '123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyerid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comments` varchar(35) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`buyerid`) REFERENCES buyer(`buyerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `buyerid`,`name`, `comments`, `usertype`) VALUES
(1, 'man12','manoj', 'The website is nice', 'buyer'),
(2, 'sai12','sai ram', 'slider is nice in homepage', 'buyer'),
(3, 'NA','viswas', 'nice weebsite','guest');
-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `query_topic` varchar(20) NOT NULL,
  `details` varchar(20) NOT NULL,
  `buyerid` varchar(20) NOT NULL,
  PRIMARY KEY (`iid`),
  FOREIGN KEY  (`buyerid`) REFERENCES buyer(`buyerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`iid`, `query_topic`, `details`, `buyerid`) VALUES
(1, 'sowing', 'How to sow seeds', 'sai14'),
(2, 'harvesting', 'Harvesting issues', 'man12'),
(3, 'water irrigation', 'Best irrigation method', 'varun12'),
(4, 'pesticide', 'What pesticides best for carrot farmin', 'shravan14');


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `tittle`, `description`) VALUES
(19, 'Sardar Sarovar Proje', 'Sardar Sarovar Project in Narmada completed.\r\nShree Narendra Modi will Cut the band at 10:00 AM 26th January,2016.'),
(20, 'Guidance by APCM', 'APCM(Agriculture Product Marketting Committe) is decided to give guidance to Farmers at 22nd September,2012 at Vizag'),
(21, 'Agri Equipment Demon', 'The useful Guidance to use the latest equipment and also giving demo of it at 15th August,2015 at Dhone'),
(17, 'Krushi mela 2016', 'Krushi Mela 2016 will be held in Nuzvid at 14th January,2016.'),
(22, 'Soil Health Card', 'Soil Health Card will be given by the collector of Bhavnagar at 17th April,2016 at Renigunta. '),
(23, 'mela', 'bhbhjv');

-- --------------------------------------------------------
--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`aid`, `location`, `description`) VALUES
(19, 'Texas', 'The prevention of extension from one unit to another of infections of contagious disease or pests affecting animals or plants.'),
(20, 'North Carolina', 'Manure and fertilizers including trading schemes.'),
(21, 'California', 'Control of fruit products.'),
(17, 'Texas', 'Milk Schemes.'),
(22, 'North Carolina', 'Support prices of agriculture products excluding food grains.'),
(23, 'California', 'Forest Co-operative Societies'),
(24, 'Okhlahoma', 'Forest labourer’s Co-operative Societies');

-- --------------------------------------------------------
--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `buyerid` varchar(20) NOT NULL UNIQUE,
  `password` varchar(15) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `phone` bigint NOT NULL,
  `survey_no` VARCHAR(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `locality` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `profession` varchar(15) NOT NULL,
  `income` VARCHAR(20) NOT NULL,
  `farming_in_practice` varchar(10) NOT NULL,
  `land_owned` varchar(10) NOT NULL,
  `challenges_faced` varchar(20) NOT NULL,
  `security_question` varchar(50) NOT NULL,
  `security_answer` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `name`, `buyerid`, `password`, `age`, `sex`, `phone`,`survey_no`, `address`, `locality`, `state`, `profession`, `income`, `farming_in_practice`, `land_owned`, `challenges_faced`,`security_question`,`security_answer`) VALUES
(1, 'Manoj', 'man12', '123', 21, 'M', 8765487654,'101/24', 'Stella street', 'Denton', 'Texas', 'farmer', '10000-25000', 'paddy', '5', 'NA','What is your pet name ','puppy'),
(2, 'Sai ram', 'sai14', '123', 21, 'M', 9123491234, '125/5a','Hickory street', 'Denton', 'Texas', 'engineer', '10000-25000', 'watermelon', '20', 'Irrigation issue','what is your school name','sai vignan');

-- --------------------------------------------------------
--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `quantity` int NOT NULL,
  `quality` text NOT NULL,
  `category` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `image`,`quantity`, `quality`, `category`, `price`) VALUES
(1, 'Premium Quality Apples', 'APPL', 'images/apple.jpeg',10, 'high','fruit', 15.00),
(2, 'Beans', 'BEANS', 'images/beans.jpeg',20, 'moderate','vegetable', 5.00),
(3, 'Organic Tomatoes', 'TOMA', 'images/tomato.jpeg',20, 'high','vegetable', 10.00),
(4, 'Oragnic Brocolli', 'BROC', 'images/brocolli.jpeg',10, 'moderate','vegetable', 20.00),
(5, 'Pumpkin Seeds', 'PUMPKIN', 'images/pumpkin_seed.jpeg',4, 'high','seed', 50.00),
(6, 'Sunflower Seeds', 'SUN', 'images/sunflower_seeds.jpeg',5, 'moderate','seed', 50.00),
(7, 'Neemoil Pesticides', 'NEEN', 'images/neemoil_pesticides.jpeg',6, 'high','pesticide', 100.00),
(8, 'Liquid Chitosan Pesticides', 'LIQUID', 'images/Liquid_chitosan_pest.jpeg',1, 'moderate','pesticide', 150.00);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- -------------------------------------------------

CREATE TABLE IF NOT EXISTS `organicfarming` (
  `cropid` int(11) NOT NULL AUTO_INCREMENT,
  `cropname` varchar(20) NOT NULL,
  `bestpractices` varchar(1000) NOT NULL,
  `articles` varchar(1000) NOT NULL,
  PRIMARY KEY (`cropid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `Organic Farming`
--

INSERT INTO `organicfarming`(`cropid`, `cropname`, `bestpractices`, `articles`) VALUES 
(1,'paddy','Prepare fields uniformly and as level as possible.Select the right seeding date and rate.Ensure uniform crop nutrition across the field and apply nutrition in time.Keep a uniform water level on the field, and drain the field at the right time prior to harvest.','http://www.knowledgebank.irri.org/step-by-step-production/postharvest/milling/milling-and-quality/item/improving-paddy-quality'),
(2,'wheat','Implement crop rotation.Bury crop residues with tillage, if possible.Choose varieties with resistance to disease and insect pests.Plant on time (not too early, not too late) in a well-prepared seedbed.Use correct seeding rates, drill calibration, and drill operation','https://content.ces.ncsu.edu/north-carolina-organic-commodities-production-guide/chapter-4-crop-production-management-organic-wheat-and-small-grains'),
(3,'tomatoes','Soil preparation for growing tomatoes organically. Production of agricultural products that contain no chemical residues, the development of environmentally friendly production methods and application of production methods that restore and maintain soil fertility. For organic farming of Tomatoes, Open Pollinated Varieties is preferred.','https://www.agrifarming.in/growing-tomatoes-organically-cultivation-practices'),
(4,'onions','Choose a variety suited to day length in your areas. Direct seed or plant sets. Plant into well-prepared soil in full sun. Keep well watered, fertilize regularly. Harvest by pulling bulbs and drying them for 2 weeks. Common pests and diseases are thrips, wireworms, botrytis rot and downy mildew.','https://www.planetnatural.com/growing-onions/');