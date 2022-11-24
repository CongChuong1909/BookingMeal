-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 24, 2022 lúc 06:04 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thltweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `ca_name` varchar(200) NOT NULL,
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ca_id`, `ca_name`) VALUES
(1, 'meal'),
(2, 'drink');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cook`
--

DROP TABLE IF EXISTS `cook`;
CREATE TABLE IF NOT EXISTS `cook` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) NOT NULL,
  `c_image` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(200) NOT NULL,
  `m_image` varchar(100) NOT NULL,
  `m_price` varchar(100) NOT NULL,
  `m_processingTime` varchar(100) NOT NULL,
  `m_des` varchar(250) NOT NULL,
  `ca_id` int(10) NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `ca_id` (`ca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `meal`
--

INSERT INTO `meal` (`m_id`, `m_name`, `m_image`, `m_price`, `m_processingTime`, `m_des`, `ca_id`) VALUES
(114, '   thit bo', 'pexels-photo-604969.jpeg', '12', '12', 'abc', 1),
(117, 'beefsteak', 'menu6.jpeg', '3000000', '20', '60%', 1),
(120, 'banh da cua2', 'pexels-photo-604969.jpeg', '12', '12', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `o_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `o_table` int(10) NOT NULL,
  `o_amount` int(10) NOT NULL,
  PRIMARY KEY (`o_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordermeal`
--

DROP TABLE IF EXISTS `ordermeal`;
CREATE TABLE IF NOT EXISTS `ordermeal` (
  `m_id` int(10) NOT NULL,
  `o_id` int(10) NOT NULL,
  `quality` int(10) NOT NULL,
  PRIMARY KEY (`m_id`,`o_id`),
  KEY `o_id` (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_fullName` varchar(200) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_userName` varchar(100) NOT NULL,
  `u_password` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`u_id`, `u_fullName`, `u_email`, `u_userName`, `u_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '123'),
(2, 'chuong2', 'chuong2@gmail.com', 'chuong2', '123'),
(3, 'chuong3', 'chuong3@gmail.com', 'chuong3', '123'),
(13, 'abc', 'abc@gmail.com', 'abc', '123'),
(14, 'a', 'aaa@gmail.com', 'a', 'a'),
(15, 'chuong', 'chuong@gmail.com', 'chuong', '123'),
(16, 'LuongCongChuong', 'congchuong199@gmail.com', 'CongChuong', '123');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`ca_id`) REFERENCES `category` (`ca_id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Các ràng buộc cho bảng `ordermeal`
--
ALTER TABLE `ordermeal`
  ADD CONSTRAINT `ordermeal_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `meal` (`m_id`),
  ADD CONSTRAINT `ordermeal_ibfk_2` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
