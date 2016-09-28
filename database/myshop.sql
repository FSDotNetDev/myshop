-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2014 at 05:08 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshop`
--
CREATE DATABASE IF NOT EXISTS `myshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myshop`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `name`, `address`, `phone`, `email`) VALUES
(1, 'tyze', 'tyze', 'tyze', 'tyze', 1234567890, 'tyze@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `news_name` varchar(128) NOT NULL,
  `news_full_image` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `content`, `news_name`, `news_full_image`) VALUES
(33, 'หลังจากที่ซัมซุงได้กินส่วนแบ่งตลาดถึง 60 เปอร์เซ็นต์ สำหรับการวางจำหน่ายโน๊ตบุ๊ค Chromebook รุ่นแรกเมื่อปีที่ผ่านมา', 'Samsung เปิดตัว โน๊ตบุ๊ค ซีรี่ย์ Chromebook 2 รุ่นหน้าจอ 11.6 นิ้ว และรุ่นหน้าจอ 13.3 นิ้ว', 'a3_1394011091samsung-chromebook-2-050357-3.jpg'),
(34, 'หล่งข่าวอ้างว่า ทาง Asus ได้ทำการจัดจำหน่ายโน๊ตบุ๊คขนาดเล็กรุ่นใหม่ล่าสุด โดยมีชื่อรุ่นว่า Asus X200CA-SCL0301Q โดย Asus X200CA-SCL0301Q จะมีหน้าจอขนาด 11.6 นิ้ว', 'Asus เปิดตัว โน๊ตบุ๊ค รุ่นเล็ก พร้อมสเปคเครื่องสำหรับการใช้งานทั่วไป ในราคาไม่ถึงหมื่น', 'a3_1393914455asus-040357-3.jpg'),
(35, 'สำหรับโน๊ตบุ๊ค Chromebook ที่ทาง Acer เปิดรับพรีออเดอร์คือ Acer C720-2420 โดย Acer C720-2420 มาพร้อมกับหน้าจอแสดงผลขนาด 11.6 นิ้ว ความละเอียด 1366x768 พิกเซล', 'Acer เปิดรับพรีออเดอร์ โน๊ตบุ๊ค Chromebook รุ่นใหม่ล่าสุด แล้วจ้า', 'a3_1390207295acer-200157-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_no` varchar(64) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_no`, `product_id`, `quantity`, `product_price`) VALUES
('21359816881', 212, 1, 10),
('21359816881', 211, 2, 5000),
('21359816834', 211, 1, 5000),
('21359816834', 210, 1, 4500),
('21359820575', 210, 1, 4500),
('21359820575', 212, 1, 10),
('21359861767', 210, 10, 4500),
('21359861767', 212, 50, 10),
('61359862265', 210, 1500, 4500),
('21359864945', 211, 1, 5000),
('21359864945', 210, 1, 4500),
('21359866053', 211, 1, 5000),
('21359866301', 210, 1, 4500),
('21360407371', 210, 111, 4500),
('21360407371', 211, 111, 5000),
('71392792990', 1, 1, 7900),
('71392792990', 2, 1, 7500),
('11393648230', 5, 1, 6590),
('11393649033', 2, 1, 7500),
('11393649067', 1, 1, 7900),
('11393774965', 5, 1, 6590),
('11393837308', 1, 1, 0),
('11393837308', 4, 0, 0),
('11393837308', 3, 0, 0),
('11393837308', 2, 1, 0),
('11393837308', 5, 4, 0),
('191393838634', 230, 2, 7900),
('11393914117', 243, 1, 22900),
('11393922232', 246, 1, 1000000),
('11393922328', 247, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(64) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment`, `detail`) VALUES
(2, 'ATM', 'จ่ายผ่านธนาคาร'),
(1, 'Cash', 'เงินสด');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `product_parent_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` float NOT NULL,
  `product_thumb_image` varchar(255) NOT NULL,
  `product_full_image` varchar(255) NOT NULL,
  `product_weight` decimal(10,0) NOT NULL,
  `product_available` int(11) NOT NULL,
  `product_on_hand` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=262 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `vendor_id`, `product_parent_id`, `product_name`, `product_desc`, `product_price`, `product_thumb_image`, `product_full_image`, `product_weight`, `product_available`, `product_on_hand`) VALUES
(261, 51, 35, 'ACER Aspire E1-470GP-33214G50Makk', 'ACER Aspire E1-470GP-33214G50Makk', 20000, '', '1394122095ACER-Aspire-E1-5444.jpg', '100', 100, 100),
(259, 49, 38, 'LENOVO ThinkPad Edge E431-627734T', 'LENOVO ThinkPad Edge E431-627734T', 20000, '', '1394121806Lenovo Think E430.jpg', '100', 100, 100),
(260, 50, 37, 'ASUS F450CA-WX215D', 'ASUS F450CA-WX215D', 20000, '', '1394121883ASUS-F450CA-5675.jpg', '100', 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `product_parent`
--

CREATE TABLE IF NOT EXISTS `product_parent` (
  `product_parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`product_parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `product_parent`
--

INSERT INTO `product_parent` (`product_parent_id`, `name`) VALUES
(38, 'Office'),
(37, 'Multimedia'),
(36, 'Game'),
(35, 'Graphic');

-- --------------------------------------------------------

--
-- Table structure for table `p_order`
--

CREATE TABLE IF NOT EXISTS `p_order` (
  `order_no` varchar(32) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `shipment` text NOT NULL,
  `payment` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_order`
--

INSERT INTO `p_order` (`order_no`, `orderdate`, `user_id`, `shipment`, `payment`, `address`, `status`) VALUES
('21359816881', '2013-02-03 04:15:36', 2, 'ä»ÃÉ³Õä·Â', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', '', 'ÃéÒ¹¤éÒä´éÃÑº¤ÓÊÑè§«×éÍáÅéÇ'),
('21359816834', '2013-02-03 04:33:59', 2, 'ä»ÃÉ³Õä·Â', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', '', 'ÃéÒ¹¤éÒä´éÃÑº¤ÓÊÑè§«×éÍáÅéÇ'),
('21359820575', '2013-02-02 15:56:15', 2, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', ''),
('21359861767', '2013-02-03 03:22:47', 2, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', ''),
('61359862265', '2013-02-03 03:31:05', 6, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', '\r\n\r\n\r\n\r\n\r\n\r\nb', ''),
('21359864945', '2013-02-03 04:15:45', 2, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', 'ได้รับคำสั่งซื้อแล้ว'),
('21359866053', '2013-02-03 04:34:13', 2, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', 'ได้รับคำสั่งซื้อแล้ว'),
('21359866301', '2013-02-03 04:38:38', 2, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', '¡ÓÅÑ§¨Ñ´Êè§'),
('21360407371', '2013-02-09 10:56:20', 2, 'ä»ÃÉ³Õä·Â', 'âÍ¹à§Ô¹à¢éÒ¸¹Ò¤ÒÃ', 'add1\r\nadd2\r\nam\r\npro\r\n12110\r\n123456\r\n123456\r\nsdafdsaf@a', 'ÃéÒ¹¤éÒä´éÃÑº¤ÓÊÑè§«×éÍáÅéÇ'),
('71392792990', '2014-02-19 06:56:30', 7, 'Delivery', 'pen', '\r\n\r\n\r\n\r\n\r\n\r\nfrend_7_hihi@hotmail.com', 'รอรับคำสั่งซื้อ'),
('11393648230', '2014-03-01 04:30:30', 1, 'Shop', 'ATM', 'ลำลูกกา\r\nปทุมธานี\r\n12150\r\n0863398347\r\nstep3xso@gmail.com', 'รอรับคำสั่งซื้อ'),
('11393649033', '2014-03-01 04:43:53', 1, 'Delivery', 'ATM', 'ลำลูกกา\r\nปทุมธานี\r\n12150\r\n0863398347\r\nstep3xso@gmail.com', 'รอรับคำสั่งซื้อ'),
('11393649067', '2014-03-01 04:44:27', 1, 'Delivery', 'ATM', 'ลำลูกกา\r\nปทุมธานี\r\n12150\r\n0863398347\r\nstep3xso@gmail.com', 'รอรับคำสั่งซื้อ'),
('11393649411', '2014-03-01 04:50:11', 1, '', 'ATM', '', 'รอรับคำสั่งซื้อ'),
('11393774965', '2014-03-02 15:42:45', 1, 'Shop', 'ATM', 'ลำลูกกา\r\nปทุมธานี\r\n12150\r\n0863398347\r\nstep3xso@gmail.com', 'รอรับคำสั่งซื้อ'),
('11393837308', '2014-03-03 09:01:48', 1, 'Delivery', 'ATM', 'ลำลูกกา\r\nปทุมธานี\r\n12150\r\n0863398347\r\nstep3xso@gmail.com', 'รอรับคำสั่งซื้อ'),
('191393838634', '2014-03-03 09:23:54', 19, 'Delivery', 'ATM', 'a\r\n\r\n\r\n1\r\na@a.com', 'รอรับคำสั่งซื้อ'),
('11393914117', '2014-03-04 06:21:57', 1, 'Delivery', 'ATM', '90/349\r\nปทุม\r\n12150\r\n0851955802\r\ndeerjs@hotmail.com', 'รอรับคำสั่งซื้อ'),
('11393922232', '2014-03-04 08:37:12', 1, 'Delivery', 'ATM', 'xx/xx\r\npathum\r\n12150\r\n0000000000\r\natnotzill@hotmail.com', 'รอรับคำสั่งซื้อ'),
('11393922328', '2014-03-04 08:38:48', 1, 'Delivery', 'ATM', 'xx/xx\r\npathum\r\n12150\r\n0000000000\r\natnotzill@hotmail.com', 'รอรับคำสั่งซื้อ');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment` varchar(64) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`shipment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`shipment_id`, `shipment`, `detail`) VALUES
(1, 'Delivery', 'จัดส่งถึงบ้าน'),
(2, 'Shop', 'ซื้อที่ร้าน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(64) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_id_3` (`user_id`),
  UNIQUE KEY `email_2` (`email`),
  KEY `user_id_2` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `address`, `province`, `postcode`, `mobile`, `email`) VALUES
(1, 'tyze', 'tyze', 'xxtyze', 'tyze', 'tyze', 'tyze', '12345', '1234567890', 'tyze@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL,
  `contact_name` varchar(64) NOT NULL,
  `contact_title` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `contact_name`, `contact_title`, `address`, `phone`, `email`) VALUES
(49, 'Dell', 'Dell', 'Dell', 'Dell', '1234567890', 'Dell@gmail.com'),
(48, 'Lenovo', 'Lenovo', 'Lenovo', 'Lenovo', '1234567890', 'Lenovo@gmail.com'),
(50, 'Asus', 'Asus', 'Asus', 'Asus', '1234567890', 'Asus@gmail.com'),
(51, 'Acer', 'Acer', 'Acer', 'Acer', '1234567890', 'Acer@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
