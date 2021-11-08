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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `a_login` varchar(20) NOT NULL,
  `a_password` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `a_login`, `a_password`) VALUES
(1, 'sai', '123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` varchar(20) NOT NULL,
  `serv_no` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `village` varchar(15) NOT NULL,
  'usertype' varchar(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `f_id`, `serv_no`, `address`, `phone`, `village`, `usertype`, `comment`) VALUES
(1, 'mj', '   NMN M M', '45646', '554564', 'NKNJK',`guest`, 'vfefowek wdidkiodoif dsodoid \r\n'),
(2, 'raj003', '7', 'opposite temple of ffrf,', '9998344078', '',`buyer`, 'Very nice Information'),
(3, '101', 'audgggs', 'hilldrive', '07698965420', 'Nuzvid',`guest`, 'nice weebsite'),
(4, '101', 'audgggs', 'hilldrive', '07698965420', 'Nuzvid',`buyer`, 'nice weebsite of the prroject\r\n\r\n'),
(5, 'gautam1722', '544454478', 'kosamba', '8460577814', '',`buyer`, 'Very good 6\r\n\r\n'),
(8, 'prem', '407', 'bhbhbhjb', '6661614611', '',`guest`, ''),
(9, 'prem', '407', 'bhbhbhjb', '6661614611', '',`buyer`, 'Super'),
(10, 'prem', '407', 'bhbhbhjb', '6661614611', 'Nuzvid',`guest`, 'nnknkn'),
(11, 'prashant', '201', 'Bobbili', '8681885569', '',`guest`, 'JBJHVBICG'),
(12, 'prashant', '201', 'Bobbili', '8681885569', '',`buyer`, 'jbhbjjjb');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) NOT NULL,
  `c_num` varchar(13) NOT NULL,
  `d_name` varchar(20) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `v_name` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `serv_no` varchar(20) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`iid`, `f_name`, `c_num`, `d_name`, `t_name`, `v_name`, `address`, `serv_no`, `comments`) VALUES
(11, 'prem', 'B', 'prem', 'lkn', 'jbkj', 'nkbk. ', '  kjbvk', 'lhl vgc cuu'),
(12, 'prem', 'nnhjnjn', 'jnjnjkn', 'jnkjnjkn', 'nkjnkj', 'nkjnjknknkj', 'jknkkn', 'nkjnknn'),
(13, 'kjnjn', 'nlnlnn', 'lnknlnl', 'nlnlnl', 'nnnln', 'lknlknlkn', 'nlknn', 'lmlmm'),
(14, 'jnjkknn', 'kjnnkjn', 'kjnkjnn', 'kjnjknnj', 'nnkjnkjn', 'jnnkjnkjnkjn', 'jkjknnkj', 'nnjkjknkn'),
(15, 'mnnmsd', 'hjbhjbkjb ', 'jbkjbkb', 'bjb', 'kjkb', 'jbjkkjkb', 'kjb', 'kjb'),
(16, 'vghh', 'hjvhjvhj', 'vjhvhjv', 'hhjvjh', 'vjhvhjvhv', 'jhvhjv', 'jvjhvj', 'hghbj');

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE IF NOT EXISTS `my_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `taluka` varchar(20) NOT NULL,
  `main_prod` varchar(20) NOT NULL,
  `sub_prod` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`id`, `rid`, `name`, `taluka`, `main_prod`, `sub_prod`, `amount`, `flag`) VALUES
(1, 1, 'premkumar', 'Nuzvid', '1', '3', 10, 1),
(4, 1, 'premkumar', 'Nuzvid', '1', '8', 10, 1),
(5, 1, 'premkumar', 'Nuzvid', '1', '7', 10, 1),
(6, 1, 'premkumar', 'Nuzvid', '1', '7', 10, 1),
(8, 1, 'premkumar', 'Nuzvid', '1', '5', 14, 1),
(9, 2, 'sai ram', 'Kodur', '1', '7', 10, 1),
(10, 2, 'sai ram', 'Kodur', '1', '4', 10, 1);

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

-----------------------------------------------------------

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
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;