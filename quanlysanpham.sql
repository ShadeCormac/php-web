-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 19, 2018 lúc 05:00 AM
-- Phiên bản máy phục vụ: 10.3.9-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlysanpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `AccountId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL DEFAULT 2 COMMENT '1=> admin, 2=>normal',
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AccountId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`AccountId`, `UserName`, `Pass`, `Type`, `Address`, `Phone`) VALUES
(3, 'admin', '$2y$10$/51DaMwmQkAwjbBTgPyBsOhed1kFRgQBPqFyeT2vDJp5tLVSAhohq', 2, NULL, NULL),
(4, 'admin1', '$2y$10$67IYSjeVvOdYsrOylS4fYu8hIpkvri09XbnrgXqJgDN5k4NdA6nYi', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Laptop'),
(2, 'Điện thoại'),
(3, 'Bàn phím'),
(4, 'Tai nghe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `OrderStatus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SumPrice` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageSource` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Producer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Origin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `ViewCount` int(11) NOT NULL,
  `SellCount` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `Description`, `ImageSource`, `CategoryId`, `Producer`, `Origin`, `Price`, `ViewCount`, `SellCount`, `Quantity`) VALUES
(1, 'Dell Inspiron 7570', 'CPU: Intel Core i7 Kabylake Refresh, 8550U, 1.80 GHz\r\nRAM: 8 GB, DDR4 (2 khe), 2400 MHz\r\nỔ cứng: HDD: 1 TB + SSD: 128GB, Hỗ trợ khe cắm SSD M.2 SATA3\r\nMàn hình: 15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình: Card đồ họa rời, NVIDIA Geforce MX130, 4GB\r\n', '/images/products/laptop/LT001.jpg', 1, 'Dell', 'Nước ngoài', 26990000, 1239, 251, 222),
(2, 'Dell Inspiron 7373', 'CPU: Intel Core i5 Kabylake Refresh, 8250U, 1.80 GHz\r\nRAM: 8 GB, DDR4 (2 khe), 2400 MHz\r\nỔ cứng:  SSD: 256GB, Hỗ trợ khe cắm SSD M.2 SATA3\r\nMàn hình: 15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình: Card đồ họa rời, NVIDIA Geforce MX130, 4GB\r\n', '/images/products/laptop/LT002.jpg', 1, 'Dell', 'Nước ngoài', 26990000, 123, 54, 11),
(3, 'Dell Inspiron 3576', 'CPU : Core i5 8250U\r\nRam : 4GB\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\r\n', '/images/products/laptop/LT003.jpg', 1, 'Dell', 'Nước ngoài', 26990000, 69, 6, 9),
(4, 'Dell Vostro 3568', 'CPU : Core i5 7200U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT004.jpg\r\n', 1, 'Dell', 'Nước ngoài', 13990000, 1232, 252, 999),
(5, 'Dell Inspiron 3567', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT005.jpg\r\n', 1, 'Dell', 'Nước ngoài', 11790000, 5321, 1256, 999),
(6, 'Asus VivoBook S15', 'CPU : Core i5 8250U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB,Hỗ trợ khe SSD M.2\r\nCard màn hình : Intel 620\"	LT006	Laptop	Asus	Nước ngoài	15990000	73473	485	999\r\n', '/images/products/laptop/LT006.jpg', 1, 'Asus', 'Nước ngoài', 15990000, 73473, 485, 999),
(7, 'Asus VivoBook A411UA', 'CPU : Core i3 8130u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 14 inch Full HD\"\r\n', '/images/products/laptop/LT007.jpg', 1, 'Asus', 'Nước ngoài', 11690000, 34734, 236, 999),
(8, 'Asus VivoBook S15', '\"CPU : Core i3 8130u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel UHD 620\"\r\n', '/images/products/laptop/LT008.jpg', 1, 'Asus', 'Nước ngoài', 12990000, 234124, 6161, 999),
(9, 'Asus ROG Strix Scar', '\"CPU : Core i7 8570H 2.2 GHz\r\nRam : 16GB DDR4\r\nỔ cứng : HDD 1TB + SSD 128GB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : NVIDIA GeForce GTX1060, 6GB\"\r\n', '/images/products/laptop/LT009.jpg', 1, 'Asus', 'Nước ngoài', 45490000, 1251251, 3461, 999),
(10, 'Asus VivoBook S15 i5', '\"CPU : Core i5 8250u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : NVIDIA 940MX\"\r\n', '/images/products/laptop/LT010.jpg', 1, 'Asus', 'Nước ngoài', 16990000, 73451, 21, 999),
(11, 'HP Pavilion 14', '\"CPU : Core i3 8130U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 14 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT011.jpg', 1, 'HP', 'Nước ngoài', 12990000, 754548, 214, 999),
(12, 'HP 15', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 500GB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT012.jpg', 1, 'HP', 'Nước ngoài', 10990000, 1561, 6, 999),
(13, 'HP Envy 13', '\"CPU : Core i3 8250U\r\nRam : 8GB DDR3\r\nỔ cứng : SSD 128GB\r\nMàn hình : 13.3 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT013.jpg', 1, 'HP', 'Nước ngoài', 20990000, 21567, 427, 999),
(14, 'HP Pavilion x360', '\"CPU : Core i3 8130U\r\nRam : 4GB DDR4\r\nỔ cứng : HHD 1TB\r\nMàn hình : 14 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT014.jpg', 1, 'HP', 'Nước ngoài', 13490000, 62362, 246, 999),
(15, 'HP 15', '\"CPU : Core i5 8250u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel HD 620\"\r\n', '/images/products/laptop/LT015.jpg', 1, 'HP', 'Nước ngoài', 14490000, 10291, 657, 999),
(16, 'Lenovo Ideapad 330', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT016.jpg', 1, 'Lenovo', 'Nước ngoài', 9290000, 12746, 127, 999),
(17, 'Lenovo Ideapad 320', '\"CPU : Core i3 6006U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch HD\r\nCard màn hình : Intel 520\"\r\n', '/images/products/laptop/LT017.jpg', 1, 'Lenovo', 'Nước ngoài', 13490000, 819238, 819, 999),
(18, 'Lenovo Ideapad YOGA 530', '\"CPU : Core i3 7130U\r\nRam : 4GB DDR4\r\nỔ cứng : SSD 256GB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT018.jpg', 1, 'Lenovo', 'Nước ngoài', 13490000, 45784, 52, 999),
(19, 'Lenovo Yoga 520', '\"CPU : Core i3 7130U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 500GB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT019.jpg', 1, 'Lenovo', 'Nước ngoài', 11690000, 126895, 612, 999),
(20, 'Lenovo IdeaPad 320', '\"CPU : Core i7 8550U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FULL HD\r\nCard màn hình : NVIDIA MX150\"\r\n', '/images/products/laptop/LT020.jpg', 1, 'Lenovo', 'Nước ngoài', 16990000, 123436, 673, 999),
(21, 'Lenovo IdeaPad 130', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT021.jpg', 1, 'Lenovo', 'Nước ngoài', 8990000, 234235, 5778, 999),
(22, 'Acer R5 471T 7387', '\"CPU : Core i7 6500U\r\nRam : 8GB DDR3\r\nỔ cứng : SSD 128GB\r\nMàn hình : 14 inch FULL HD\r\nCard màn hình : Intel HD 520\"\r\n', '/images/products/laptop/LT022.jpg', 1, 'Acer', 'Nước ngoài', 14490000, 161624, 2352, 999),
(23, 'Acer Aspire E5', '\"CPU : Core i3 8130U\r\nRam : 4GB DDR3L\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT023.jpg', 1, 'Acer', 'Nước ngoài', 10790000, 12612, 169, 999),
(24, 'Acer Nitro 5', '\"CPU : Core i7 8570H\r\nRam : 8GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình : GTX 1050ti\"\r\n', '/images/products/laptop/LT024.jpg', 1, 'Acer', 'Nước ngoài', 25490000, 21689, 1256, 999),
(25, 'Acer Swift SF315', '\"CPU : Core i5 8250U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình : Intel UHD 620\"\r\n', '/images/products/laptop/LT025.jpg', 1, 'Acer', 'Nước ngoài', 15490000, 98129, 626, 999);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
