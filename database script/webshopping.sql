-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 01:48 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountId` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL DEFAULT '2' COMMENT '1=> admin, 2=>normal',
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountId`, `UserName`, `Pass`, `Type`, `Address`, `Phone`) VALUES
(1, 'admin', '$2y$10$na4ImmdiYLkf5oJBerNaaO05Hxbr2l8YoCAEy0m/JT6Z6Wu3WLfB.', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Laptop'),
(2, 'Mobile'),
(3, 'Keyboard'),
(4, 'Headphone');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `OrderStatus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SumPrice` int(11) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
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
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `Description`, `ImageSource`, `CategoryId`, `Producer`, `Origin`, `Price`, `ViewCount`, `SellCount`, `Quantity`, `CreatedAt`) VALUES
(1, 'Dell Inspiron 7570', 'CPU: Intel Core i7 Kabylake Refresh, 8550U, 1.80 GHz\r\nRAM: 8 GB, DDR4 (2 khe), 2400 MHz\r\nỔ cứng: HDD: 1 TB + SSD: 128GB, Hỗ trợ khe cắm SSD M.2 SATA3\r\nMàn hình: 15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình: Card đồ họa rời, NVIDIA Geforce MX130, 4GB\r\n', '/images/products/laptop/LT001.jpg', 1, 'Dell', 'Nước ngoài', 26990000, 1239, 251, 222, '2018-11-20 22:51:20'),
(2, 'Dell Inspiron 7373', 'CPU: Intel Core i5 Kabylake Refresh, 8250U, 1.80 GHz\r\nRAM: 8 GB, DDR4 (2 khe), 2400 MHz\r\nỔ cứng:  SSD: 256GB, Hỗ trợ khe cắm SSD M.2 SATA3\r\nMàn hình: 15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình: Card đồ họa rời, NVIDIA Geforce MX130, 4GB\r\n', '/images/products/laptop/LT002.jpg', 1, 'Dell', 'Nước ngoài', 26990000, 123, 54, 11, '2018-11-20 22:51:20'),
(3, 'Dell Inspiron 3576', 'CPU : Core i5 8250U\r\nRam : 4GB\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\r\n', '/images/products/laptop/LT003.jpg', 1, 'Dell', 'Nước ngoài', 26990000, 69, 6, 9, '2018-11-20 22:51:20'),
(4, 'Dell Vostro 3568', 'CPU : Core i5 7200U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT004.jpg\r\n', 1, 'Dell', 'Nước ngoài', 13990000, 1232, 252, 999, '2018-11-20 22:51:20'),
(5, 'Dell Inspiron 3567', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT005.jpg\r\n', 1, 'Dell', 'Nước ngoài', 11790000, 5321, 1256, 999, '2018-11-20 22:51:20'),
(6, 'Asus VivoBook S15', 'CPU : Core i5 8250U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB,Hỗ trợ khe SSD M.2\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT006.jpg', 1, 'Asus', 'Nước ngoài', 15990000, 73473, 485, 999, '2018-11-20 22:51:20'),
(7, 'Asus VivoBook A411UA', 'CPU : Core i3 8130u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 14 inch Full HD\"\r\n', '/images/products/laptop/LT007.jpg', 1, 'Asus', 'Nước ngoài', 11690000, 34734, 236, 999, '2018-11-20 22:51:20'),
(8, 'Asus VivoBook S15', '\"CPU : Core i3 8130u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel UHD 620\"\r\n', '/images/products/laptop/LT008.jpg', 1, 'Asus', 'Nước ngoài', 12990000, 234124, 6161, 999, '2018-11-20 22:51:20'),
(9, 'Asus ROG Strix Scar', '\"CPU : Core i7 8570H 2.2 GHz\r\nRam : 16GB DDR4\r\nỔ cứng : HDD 1TB + SSD 128GB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : NVIDIA GeForce GTX1060, 6GB\"\r\n', '/images/products/laptop/LT009.jpg', 1, 'Asus', 'Nước ngoài', 45490000, 1251251, 3461, 999, '2018-11-20 22:51:20'),
(10, 'Asus VivoBook S15 i5', '\"CPU : Core i5 8250u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : NVIDIA 940MX\"\r\n', '/images/products/laptop/LT010.jpg', 1, 'Asus', 'Nước ngoài', 16990000, 73451, 21, 999, '2018-11-20 22:51:20'),
(11, 'HP Pavilion 14', '\"CPU : Core i3 8130U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 14 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT011.jpg', 1, 'HP', 'Nước ngoài', 12990000, 754548, 214, 999, '2018-11-20 22:51:20'),
(12, 'HP 15', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 500GB\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT012.jpg', 1, 'HP', 'Nước ngoài', 10990000, 1561, 6, 999, '2018-11-20 22:51:20'),
(13, 'HP Envy 13', '\"CPU : Core i3 8250U\r\nRam : 8GB DDR3\r\nỔ cứng : SSD 128GB\r\nMàn hình : 13.3 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT013.jpg', 1, 'HP', 'Nước ngoài', 20990000, 21567, 427, 999, '2018-11-20 22:51:20'),
(14, 'HP Pavilion x360', '\"CPU : Core i3 8130U\r\nRam : 4GB DDR4\r\nỔ cứng : HHD 1TB\r\nMàn hình : 14 inch Full HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT014.jpg', 1, 'HP', 'Nước ngoài', 13490000, 62362, 246, 999, '2018-11-20 22:51:20'),
(15, 'HP 15', '\"CPU : Core i5 8250u 2.2 GHz\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB SATA3\r\nMàn hình : 15.6 inch Full HD\r\nCard màn hình : Intel HD 620\"\r\n', '/images/products/laptop/LT015.jpg', 1, 'HP', 'Nước ngoài', 14490000, 10291, 657, 999, '2018-11-20 22:51:20'),
(16, 'Lenovo Ideapad 330', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT016.jpg', 1, 'Lenovo', 'Nước ngoài', 9290000, 12746, 127, 999, '2018-11-20 22:51:20'),
(17, 'Lenovo Ideapad 320', '\"CPU : Core i3 6006U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch HD\r\nCard màn hình : Intel 520\"\r\n', '/images/products/laptop/LT017.jpg', 1, 'Lenovo', 'Nước ngoài', 13490000, 819238, 819, 999, '2018-11-20 22:51:20'),
(18, 'Lenovo Ideapad YOGA 530', '\"CPU : Core i3 7130U\r\nRam : 4GB DDR4\r\nỔ cứng : SSD 256GB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT018.jpg', 1, 'Lenovo', 'Nước ngoài', 13490000, 45784, 52, 999, '2018-11-20 22:51:20'),
(19, 'Lenovo Yoga 520', '\"CPU : Core i3 7130U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 500GB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT019.jpg', 1, 'Lenovo', 'Nước ngoài', 11690000, 126895, 612, 999, '2018-11-20 22:51:20'),
(20, 'Lenovo IdeaPad 320', '\"CPU : Core i7 8550U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FULL HD\r\nCard màn hình : NVIDIA MX150\"\r\n', '/images/products/laptop/LT020.jpg', 1, 'Lenovo', 'Nước ngoài', 16990000, 123436, 673, 999, '2018-11-20 22:51:20'),
(21, 'Lenovo IdeaPad 130', '\"CPU : Core i3 7020U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT021.jpg', 1, 'Lenovo', 'Nước ngoài', 8990000, 234235, 5778, 999, '2018-11-20 22:51:20'),
(22, 'Acer R5 471T 7387', '\"CPU : Core i7 6500U\r\nRam : 8GB DDR3\r\nỔ cứng : SSD 128GB\r\nMàn hình : 14 inch FULL HD\r\nCard màn hình : Intel HD 520\"\r\n', '/images/products/laptop/LT022.jpg', 1, 'Acer', 'Nước ngoài', 14490000, 161624, 2352, 999, '2018-11-20 22:51:20'),
(23, 'Acer Aspire E5', '\"CPU : Core i3 8130U\r\nRam : 4GB DDR3L\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình : Intel 620\"\r\n', '/images/products/laptop/LT023.jpg', 1, 'Acer', 'Nước ngoài', 10790000, 12612, 169, 999, '2018-11-20 22:51:20'),
(24, 'Acer Nitro 5', '\"CPU : Core i7 8570H\r\nRam : 8GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình : GTX 1050ti\"\r\n', '/images/products/laptop/LT024.jpg', 1, 'Acer', 'Nước ngoài', 25490000, 21689, 1256, 999, '2018-11-20 22:51:20'),
(25, 'Acer Swift SF315', '\"CPU : Core i5 8250U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình : Intel UHD 620\"\r\n', '/images/products/laptop/LT025.jpg', 1, 'Acer', 'Nước ngoài', 15490000, 98129, 626, 999, '2018-11-20 22:51:20'),
(26, 'Acer Spin 3', 'CPU : Core i3 7130U\r\nRam : 4GB DDR4\r\nỔ cứng : HDD 500GB\r\nMàn hình : 14 inch HD\r\nCard màn hình : Intel UHD 620\r\n', '/images/products/laptop/LT026.jpg', 1, 'Acer', 'Nước ngoài', 12990000, 3456354, 1246, 999, '2018-11-29 07:43:21'),
(27, 'Acer Aspire A715', '\"CPU : Core i5 8300H\r\nRam : 8GB DDR4\r\nỔ cứng : HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1050\"\r\n', '/images/products/laptop/LT027.jpg', 1, 'Acer', 'Nước ngoài', 19990000, 23452345, 267, 999, '2018-11-29 07:45:14'),
(28, 'MSI GF63 8RD', '\"CPU : Core i7 8570H\r\nRam : 8GB DDR4\r\nỔ cứng : HDD 1TB + SSD 128GB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1050ti\"\r\n', '/images/products/laptop/LT028.jpg', 1, 'MSI', 'Nước ngoài', 27490000, 746576, 235, 999, '2018-11-29 07:47:49'),
(29, 'Apple Macbook Air', '\"CPU : Core i5\r\nRam : 8GB DDR3L\r\nỔ cứng : SSD 128GB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :Intel HD 6000\"\r\n', '/images/products/laptop/LT029.jpg', 1, 'Apple', 'Nước ngoài', 21990000, 56856, 2571, 999, '2018-11-29 07:47:49'),
(30, 'Apple Macbook Pro Touch', '\"CPU : Core i5\r\nRam : 8GB DDR3L\r\nỔ cứng : SSD 256GB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :Intel IPG 655\"\r\n', '/images/products/laptop/LT030.jpg', 1, 'Apple', 'Nước ngoài', 44490000, 2345, 3457, 999, '2018-11-29 07:49:32'),
(31, 'Apple Macbook Pro Touch i7', '\"CPU : Core i7\r\nRam : 16GB DDR4\r\nỔ cứng : SSD 256GB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :AMD 555X\"\r\n', '/images/products/laptop/LT031.jpg', 1, 'Apple', 'Nước ngoài', 57490000, 2436, 2341, 999, '2018-11-29 07:51:06'),
(32, 'Dell G7 157588', '\"CPU : Core i7 8570H\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 256GB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1060\"\r\n', '/images/products/laptop/LT032.png', 1, 'Dell', 'Nước ngoài', 28990000, 46573, 347, 999, '2018-11-29 07:52:12'),
(33, 'Alienware 15 2018', '\"CPU : Core i7 8570H\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 256GB + 1TB HDD\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1060\"\r\n', '/images/products/laptop/LT033.png', 1, 'Alienware', 'Nước ngoài', 41900000, 8676789, 829, 999, '2018-11-29 07:53:45'),
(34, 'Alienware 17 R5 2018', '\"CPU : Core i7 8570H\r\nRam : 8GB DDR4\r\nỔ cứng :  1TB HDD\r\nMàn hình : 17.3 inch FHD\r\nCard màn hình :GTX 1060\"\r\n', '/images/products/laptop/LT034.png', 1, 'Alienware', 'Nước ngoài', 41900000, 1231257, 813, 999, '2018-11-29 07:54:57'),
(35, 'Alienware 17 R4 2017', '\"CPU : Core i7 7700HQ\r\nRam : 16GB DDR4\r\nỔ cứng :  1TB HDD\r\nMàn hình : 17.3 inch FHD\r\nCard màn hình :GTX 1060\"\r\n', '/images/products/laptop/LT035.jpg', 1, 'Alienware', 'Nước ngoài', 37990000, 45790, 423, 999, '2018-11-29 07:56:36'),
(36, 'Alienware 15 R3 2017', '\"CPU : Core i7 7700HQ\r\nRam : 16GB DDR4\r\nỔ cứng :  1TB HDD\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1060\"\r\n', '/images/products/laptop/LT036.jpg', 1, 'Alienware', 'Nước ngoài', 36490000, 3459, 145, 999, '2018-11-29 07:57:35'),
(37, 'Alienware 15 2017', '\"CPU : Core i7 7700HQ\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 256GB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1060\"\r\n', '/images/products/laptop/LT037.png', 1, 'Alienware', 'Nước ngoài', 32900000, 2360678, 447, 999, '2018-11-29 08:00:07'),
(38, 'MSI PS42 8M', '\"CPU : Core i5 8250U\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 256GB\r\nMàn hình : 14 inch FHD\r\nCard màn hình :GTX 960\"\r\n', '/images/products/laptop/LT038.jpg', 1, 'MSI', 'Nước ngoài', 21990000, 15212390, 2282, 999, '2018-11-29 08:01:16'),
(39, 'MSI GL63 8RC', '\"CPU : Core i5 8300H\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 128GB + HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1050\"\r\n', '/images/products/laptop/LT039.jpg', 1, 'MSI', 'Nước ngoài', 23490000, 34563, 917, 999, '2018-11-29 08:02:01'),
(40, 'MSI GP63 Leopard', '\"CPU : Core i5 8300H\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 256GB + HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1060ti\"\r\n', '/images/products/laptop/LT040.png', 1, 'MSI', 'Nước ngoài', 33990000, 5456, 54, 0, '2018-11-29 08:04:34'),
(41, 'Điện thoại iPhone 6', 'Hệ điều hành : iOS 11\nCPU : Apple A8\nRam : 1GB', '/images/products/mobile/DT001.png', 2, 'Apple', 'Nước ngoài', 6490000, 12656, 243, 999, '2018-11-29 19:40:50'),
(42, 'Điện thoại iPhone 8', 'Hệ điều hành : iOS 11\nCPU : Apple A11\nRam : 2GB', '/images/products/mobile/DT002.png', 2, 'Apple', 'Nước ngoài', 22789000, 12516, 643, 999, '2018-11-29 19:40:50'),
(43, 'Điện thoại iPhone 7', 'Hệ điều hành : iOS 11\nCPU : Apple A10\nRam : 3GB\nDung lượng : 256GB', '/images/products/mobile/DT003.png', 2, 'Apple', 'Nước ngoài', 23990000, 812738, 92, 999, '2018-11-29 19:40:50'),
(44, 'Điện thoại iPhone 8 Plus', 'Hệ điều hành : iOS 11\nCPU : Apple A11\nRam : 3GB\nDung lượng : 256GB', '/images/products/mobile/DT004.png', 2, 'Apple', 'Nước ngoài', 25790000, 1299, 82, 999, '2018-11-29 19:40:50'),
(45, 'Điện thoại iPhone Xr ', 'Hệ điều hành : iOS 11\nCPU : Apple A12\nRam : 3GB\nDung lượng : 256GB', '/images/products/mobile/DT005.png', 2, 'Apple', 'Nước ngoài', 26990000, 28319, 828, 999, '2018-11-29 19:40:50'),
(46, 'Điện thoại iPhone X Silver', 'Hệ điều hành : iOS 11\nCPU : Apple A12\nRam : 3GB\nDung lượng : 256GB', '/images/products/mobile/DT006.png', 2, 'Apple', 'Nước ngoài', 31990000, 2913198, 2777, 999, '2018-11-29 19:40:50'),
(47, 'Điện thoại iPhone Xs Max', 'Hệ điều hành : iOS 11\nCPU : Apple A12\nRam : 4GB\nDung lượng : 512GB', '/images/products/mobile/DT007.png', 2, 'Apple', 'Nước ngoài', 43990000, 9231812, 7728, 999, '2018-11-29 19:40:50'),
(48, 'Điện thoại Samsung Galaxy J4', 'Hệ điều hành : Android 8.0\nCPU : Exynos 7570\nRam : 2GB', '/images/products/mobile/DT008.png', 2, 'SamSung', 'Nước ngoài', 34990000, 8289, 81, 999, '2018-11-29 19:40:50'),
(49, 'Điện thoại Samsung Galaxy J2 Prime', 'Hệ điều hành : Android 6.0\nCPU : MT6737\nRam : 1.5GB', '/images/products/mobile/DT009.png', 2, 'SamSung', 'Nước ngoài', 2290000, 987, 12, 999, '2018-11-29 19:40:50'),
(50, 'Điện thoại Samsung Galaxy J2 Pro', 'Hệ điều hành : Android 7.1\nCPU : Snapdragon 425\nRam : 2GB', '/images/products/mobile/DT010.png', 2, 'SamSung', 'Nước ngoài', 2990000, 672, 187, 999, '2018-11-29 19:40:50'),
(51, 'Điện thoại Samsung E1200', 'Pin : 800mAh\nCông nghệ màn hình : TFT', '/images/products/mobile/DT011.png', 2, 'SamSung', 'Nước ngoài', 350000, 8888, 1, 999, '2018-11-29 19:40:50'),
(52, 'Điện thoại Samsung Galaxy A7', 'Hệ điều hành : Android 8.0\nCPU : Exynos 7885\nRam : 6GB\nDung lượng : 128GB', '/images/products/mobile/DT012.png', 2, 'SamSung', 'Nước ngoài', 8900000, 7189, 720, 999, '2018-11-29 19:40:50'),
(53, 'Điện thoại Samsung Galaxy A8+', 'Hệ điều hành : Android 7.1\nCPU : Exynos 7885\nRam : 6GB\nDung lượng : 64GB', '/images/products/mobile/DT013.png', 2, 'SamSung', 'Nước ngoài', 11990000, 9821, 781, 999, '2018-11-29 19:40:50'),
(54, 'Điện thoại Samsung Galaxy Note 8', 'Hệ điều hành : Android 7.1\nCPU : Exynos 8895\nRam : 6GB\nDung lượng : 64GB', '/images/products/mobile/DT014.png', 2, 'SamSung', 'Nước ngoài', 19990000, 98128, 771, 999, '2018-11-29 19:40:50'),
(55, 'Điện thoại Samsung Galaxy S9+', 'Hệ điều hành : Android 8.0\nCPU : Exynos 9810\nRam : 6GB\nDung lượng : 128GB', '/images/products/mobile/DT015.png', 2, 'SamSung', 'Nước ngoài', 24990000, 771828, 891, 999, '2018-11-29 19:40:51'),
(56, 'Điện thoại Samsung Galaxy Note 9', 'Hệ điều hành : Android 8.1\nCPU : Exynos 9810\nRam : 8GB\nDung lượng : 512GB', '/images/products/mobile/DT016.png', 2, 'SamSung', 'Nước ngoài', 28490000, 12516, 2345, 999, '2018-11-29 19:40:51'),
(57, 'Điện thoại Nokia 150', 'Pin : 1020mAh\nCông nghệ màn hình : TFT', '/images/products/mobile/DT017.png', 2, 'Nokia', 'Nước ngoài', 650000, 91888, 21, 999, '2018-11-29 19:40:51'),
(58, 'Điện thoại Nokia 3310', 'Pin : 1200mAh\nCông nghệ màn hình : TFT', '/images/products/mobile/DT018.png', 2, 'Nokia', 'Nước ngoài', 1060000, 8127, 81, 999, '2018-11-29 19:40:51'),
(59, 'Điện thoại Nokia 2.1', 'Hệ điều hành : Android Go Edition\nCPU : Snapdragon 425\nRam : 1GB\nDung lượng : 8GB', '/images/products/mobile/DT019.png', 2, 'Nokia', 'Nước ngoài', 2590000, 916, 18, 999, '2018-11-29 19:40:51'),
(60, 'Điện thoại Nokia 3.1', 'Hệ điều hành : Android 8.0\nCPU : MediaTek MT6570N\nRam : 3GB\nDung lượng : 32GB', '/images/products/mobile/DT020.png', 2, 'Nokia', 'Nước ngoài', 3290000, 961, 81, 999, '2018-11-29 19:40:51'),
(61, 'Điện thoại Nokia 5', 'Hệ điều hành : Android 7.0\nCPU : Snapdragon 430\nRam : 2GB\nDung lượng : 16GB', '/images/products/mobile/DT021.png', 2, 'Nokia', 'Nước ngoài', 3090000, 9818, 519, 999, '2018-11-29 19:40:51'),
(62, 'Điện thoại Nokia 6', 'Hệ điều hành : Android 7.0\nCPU : Snapdragon 430\nRam : 3GB\nDung lượng : 32GB', '/images/products/mobile/DT022.png', 2, 'Nokia', 'Nước ngoài', 3590000, 81290, 2751, 999, '2018-11-29 19:40:51'),
(63, 'Điện thoại Nokia 6.1 Plus', 'Hệ điều hành : Android 8.0\nCPU : Snapdragon 660\nRam : 4GB\nDung lượng : 64GB', '/images/products/mobile/DT023.png', 2, 'Nokia', 'Nước ngoài', 6590000, 5919, 1289, 999, '2018-11-29 19:40:51'),
(64, 'Điện thoại Nokia 7 plus', 'Hệ điều hành : Android One\nCPU : Snapdragon 636\nRam : 4GB\nDung lượng : 64GB', '/images/products/mobile/DT024.png', 2, 'Nokia', 'Nước ngoài', 8290000, 12477, 881, 999, '2018-11-29 19:40:51'),
(65, 'Điện thoại OPPO A71k', 'Hệ điều hành : ColorOS 3.2\nCPU : Snapdragon 450\nRam : 2GB\nDung lượng : 16GB', '/images/products/mobile/DT025.png', 2, 'OPPO', 'Nước ngoài', 2990000, 1771, 871, 999, '2018-11-29 19:40:51'),
(66, 'Điện thoại OPPO A83', 'Hệ điều hành : Android 7.1\nCPU : MediaTek Helio P23\nRam : 2GB\nDung lượng : 16GB', '/images/products/mobile/DT026.png', 2, 'OPPO', 'Nước ngoài', 3090000, 7710, 168, 999, '2018-11-29 19:40:51'),
(67, 'Điện thoại OPPO A3s', 'Hệ điều hành : Android 8.1\nCPU : Snapdragon 425\nRam : 2GB\nDung lượng : 16GB', '/images/products/mobile/DT027.png', 2, 'OPPO', 'Nước ngoài', 3690000, 9995, 712, 999, '2018-11-29 19:40:51'),
(68, 'Điện thoại OPPO A83 2018', 'Hệ điều hành : Android 7.1\nCPU : MediaTek Helio P23\nRam : 3GB\nDung lượng : 32GB', '/images/products/mobile/DT028.png', 2, 'OPPO', 'Nước ngoài', 3490000, 5712, 511, 999, '2018-11-29 19:40:51'),
(69, 'Điện thoại OPPO A3s', 'Hệ điều hành : Android 8.1\nCPU : Snapdragon 450\nRam : 3GB\nDung lượng : 32GB', '/images/products/mobile/DT029.png', 2, 'OPPO', 'Nước ngoài', 4690000, 7111, 699, 999, '2018-11-29 19:40:51'),
(70, 'Điện thoại OPPO F7', 'Hệ điều hành : ColorOS 5.0\nCPU : MediaTek P60\nRam : 6GB\nDung lượng : 128GB', '/images/products/mobile/DT030.png', 2, 'OPPO', 'Nước ngoài', 6990000, 17721, 1928, 999, '2018-11-29 19:40:51'),
(71, 'Điện thoại OPPO F9', 'Hệ điều hành : ColorOS 5.2\nCPU : MediaTek P60\nRam : 6GB\nDung lượng : 64GB', '/images/products/mobile/DT031.png', 2, 'OPPO', 'Nước ngoài', 8490000, 8127, 810, 999, '2018-11-29 19:40:51'),
(72, 'Điện thoại OPPO Find X', 'Hệ điều hành : Android 8.1\nCPU : Snapdragon 845\nRam : 8GB\nDung lượng : 256GB', '/images/products/mobile/DT032.png', 2, 'OPPO', 'Nước ngoài', 20990000, 123456, 7182, 999, '2018-11-29 19:40:51'),
(73, 'Điện thoại Xiaomi Redmi Note 5', 'Hệ điều hành : Android 8.1\nCPU : Snapdragon 636\nRam : 4GB\nDung lượng : 64GB', '/images/products/mobile/DT033.png', 2, 'XiaoMi', 'Nước ngoài', 5690000, 18287, 8122, 999, '2018-11-29 19:40:51'),
(74, 'Điện thoại Xiaomi Redmi Note 6 Pro', 'Hệ điều hành : Android 8.1\nCPU : Snapdragon 636\nRam : 3GB\nDung lượng : 32GB', '/images/products/mobile/DT034.png', 2, 'XiaoMi', 'Nước ngoài', 4900000, 87123, 1827, 999, '2018-11-29 19:40:51'),
(75, 'Điện thoại Xiaomi Mi 8 Lite', 'Hệ điều hành : Android 8.1\nCPU : Snapdragon 660\nRam : 4GB\nDung lượng : 64GB', '/images/products/mobile/DT035.png', 2, 'XiaoMi', 'Nước ngoài', 6690000, 123489, 6619, 999, '2018-11-29 19:40:51'),
(76, 'Điện thoại Huawei Y6 Prime', 'Hệ điều hành : Android 8.0\nCPU : Snapdragon 425\nRam : 2GB\nDung lượng : 16GB', '/images/products/mobile/DT036.png', 2, 'Huawei', 'Nước ngoài', 2990000, 89128, 188, 999, '2018-11-29 19:40:51'),
(77, 'Điện thoại Huawei Y7 Pro', 'Hệ điều hành : Android 8.0\nCPU : Snapdragon 430\nRam : 3GB\nDung lượng : 32GB', '/images/products/mobile/DT037.png', 2, 'Huawei', 'Nước ngoài', 3490000, 1727, 817, 999, '2018-11-29 19:40:51'),
(78, 'Điện thoại Huawei Nova 3i', 'Hệ điều hành : Android 8.1\nCPU : HiSilicon Kirin 710\nRam : 4GB\nDung lượng : 128GB', '/images/products/mobile/DT038.png', 2, 'Huawei', 'Nước ngoài', 6490000, 172819, 8888, 999, '2018-11-29 19:40:51'),
(79, 'Điện thoại Huawei Nova 3', 'Hệ điều hành : Android 8.1\nCPU : HiSilicon Kirin 970\nRam : 6GB\nDung lượng : 128GB', '/images/products/mobile/DT039.png', 2, 'Huawei', 'Nước ngoài', 9990000, 216777, 18132, 999, '2018-11-29 19:40:51'),
(80, 'Điện thoại Huawei Mate 20 Pro', 'Hệ điều hành : Android 9.0\nCPU : HiSilicon Kirin 980\nRam : 6GB\nDung lượng : 128GB', '/images/products/mobile/DT040.png', 2, 'Huawei', 'Nước ngoài', 21990000, 871289, 51029, 999, '2018-11-29 19:40:51'),
(81, 'Bàn phím Logitech Gaming G610 Đen switch Xanh', 'Loại switch : Cherry MX Blue Mechanical          \nKích thước: 153 x 443.5 x 34.3 mm\nLed : Trắng\nKhối lượng: 1259 gr ', '/images/products/keyboard/KB001.jpg', 3, 'Newmen', 'Trung Quốc', 1999000, 5712, 251, 999, '2018-11-29 19:41:39'),
(82, 'Bàn phím + Chuột Wireless Rapoo 8000 (Đen)', 'Bàn phím + chuột không dây.\nChữ in Laser bền bỉ không phai, chống tràn nước.\nTuổi thọ pin dài.\n\nBàn phím + chuột không dây.\nChữ in Laser bền bỉ không phai, chống tràn nước.\nTuổi thọ pin dài.\n\n', '/images/products/keyboard/KB002.jpg', 3, 'Rapoo', 'Trung Quốc', 328000, 7111, 512, 999, '2018-11-29 19:41:39'),
(83, 'Bàn phím bán cơ Newmen GM100s Mặt nhôm Full-size L', 'Cấu trúc bán cơ độc quyền của Newmen \nKeycaps ABS, Double, Xuyên LED \nLED 7 màu, tự động đổi, cố định màu hoặc tắt LED nếu muốn\nKhung mặt kim loại chống cháy\nCable dù 1.8m, chống soắn, chống nhiễu', '/images/products/keyboard/KB003.jpg', 3, 'Newmen', 'Trung Quốc', 399000, 17721, 235, 999, '2018-11-29 19:41:39'),
(84, 'Bàn phím Asus ROG Claymore', 'Các phím được chiếu đèn nền riêng với công nghệ LED Aura Sync RGB\nCác phím có thể được lập trình toàn diện với chế độ ghi macro bất cứ lúc nào\nCông nghệ chống sót phím 100% với khả năng ghi nhận N phím cùng lúc (NKRO)\nPhím nóng cho tốc độ quạt, ánh sáng và điều khiển ép xung khi được kết hợp với bo mạch chủ ASUS ROG\nCấu trúc nhôm bền vững với chi tiết tinh xảo lấy cảm hứng từ văn hóa Maya', '/images/products/keyboard/KB004.jpg', 3, 'Asus', 'Trung Quốc', 4490000, 8127, 252, 999, '2018-11-29 19:41:39'),
(85, 'Bàn phím Logitech Gaming G610 Đen switch Xanh', 'Loại switch : Cherry MX Blue Mechanical          \nKích thước: 153 x 443.5 x 34.3 mm\nLed : Trắng\nKhối lượng: 1259 gr ', '/images/products/keyboard/KB005.jpg', 3, 'LOGITECH', 'Trung Quốc', 1999000, 123456, 1256, 999, '2018-11-29 19:41:39'),
(86, 'Bàn phím bán cơ Newmen GM100S USB Full-size LED xu', 'Bàn phím cao su thiết kế chống nước.\nDây cáp bọc dù chống đứt.\nKý tự được in laser bền bỉ.\nHệ thống đèn nền 7 màu tuỳ chỉnh.\nTích hợp các chức năng multimedia và khoá phím windows phục vụ chơi game.', '/images/products/keyboard/KB006.jpg', 3, 'Newmen', 'Trung Quốc', 399000, 18287, 485, 999, '2018-11-29 19:41:39'),
(87, 'Bàn phím Logitech Pro Gaming', 'Thiết lập led RGB và các macro dễ dàng thông qua phần mềm Logitech GamingSoftware \nThiết kế tenkeyless nhỏ gọn cùng khung phím cứng cáp, chắc chắn.\nCáp USB có thể tháo rời tiện lợi, chống gãy gập khi di chuyển.\nCác chức năng multimedia tích hợp vào các phím F9-F12 & PSC, Scroll Lock, PsBr.', '/images/products/keyboard/KB007.jpg', 3, 'LOGITECH', 'Trung Quốc', 2080000, 87123, 236, 999, '2018-11-29 19:41:39'),
(88, 'Bàn phím giả cơ Fuhlen G450S đen', 'Bàn phím có thiết kế hiện đại, cá tính,\nĐộ nhạy cao và đặc biệt là có khả năng chống tràn nước.\nBàn phím Fuhlen G450s sẽ giúp  thao tác của bạn được nhanh chóng và chính xác hơn\nMàu sắc : Đen\nLoại switch : Rubber Dome', '/images/products/keyboard/KB008.jpg', 3, 'Fuhlen', 'Trung Quốc', 449000, 123489, 6161, 999, '2018-11-29 19:41:39'),
(89, 'Bàn phím Trust Us GXT285 ADVANCED', 'Chế độ gaming : vô hiệu hoá phím windows.\nBộ nhớ trong có thể ghi nhớ 3 profile.\nChức năng Anti-Ghosting: nhận tối đa 12 phím cùng lúc.\nLed tuỳ chỉnh.\nTích hợp hàng phím đa phương tiện.\nĐộ dài dây USB : 1,8m', '/images/products/keyboard/KB009.jpg', 3, 'ADVANCED', 'Trung Quốc', 799000, 89128, 3461, 999, '2018-11-29 19:41:39'),
(90, 'Bàn phím Trust Us GXT860 THURA SEMI-MECH', 'Switch giả cơ : cho cảm giác bấm giống phím cơ tăng sự thoải mái khi bấm.\n\nDải led hiển thị 9 màu sắc có thể điều chỉnh độ sáng.\n\nChế độ gaming : vô hiệu hoá phím windows.\n\nAnti-ghosting trợ giúp nhận lên tới 16 phím cùng lúc.\n\nCác phím đa chức năng tích hợp vào hàng phím F.\n\nKê tay có thể tháo rời gọn gàng.\n\nPlate kim loại nguyên khối cứng cáp và chắc chắn', '/images/products/keyboard/KB010.jpg', 3, 'Trust', 'Trung Quốc', 999000, 1727, 323, 999, '2018-11-29 19:41:39'),
(91, 'Bàn phím Newmen KB813', 'Bàn phím không có đèn LED\nDây cáp bọc dù chống cắt, 5 lõi, chịu lực mạnh, chống nhiễu từ.\nKeycap kết cấu dạng phủ cát bề mặt, chịu mài mòn và chống trơn trượt.\nTổ hợp phím: 19 phím không xung đột (anti-ghosting) phục vụ mọi nhu cầu chơi game.\nThích hợp làm gamenet cao cấp với độ bền cao và hình thức nổi bật.', '/images/products/keyboard/KB011.jpg', 3, 'Newmen', 'Trung Quốc', 289000, 172819, 235, 999, '2018-11-29 19:41:39'),
(92, 'Bàn phím Newmen KB808 Gaming đen', 'Đèn nền trên cả bàn phím với 3 cơ chế đổi màu và tăng giảm độ sáng.\nKeycap nhám chống trơn trượt.\nDây nguồn 1,8m chống nhiễu.\nCơ chế khoá phím Windows phục vụ Gaming.\nCác chức năng đa phương tiện được tích hợp trên nhiều phím.\nBền bỉ, chống nước trên bề mặt, hình thức bắt mắt, phù hợp cho sử sụng tại gamenet.', '/images/products/keyboard/KB012.jpg', 3, 'Newmen', 'Trung Quốc', 320000, 216777, 745, 999, '2018-11-29 19:41:39'),
(93, 'Bàn phím cơ Newmen GM368 Mix Led', 'Thiết kế khung phím không viền cho led sáng hơn.\nTuổi thọ phím lên tới 50 triệu lần bấm.\nKeycap được cấu tạo 2 lớp (double-shot) chống mòn ký tự.\nChức năng đa phương tiện được được tích hợp vào hàng phím F và 4 phím mũi tên.\nAnti-ghosting chống xung đột khi bấm nhiều phím cùng lúc.', '/images/products/keyboard/KB013.jpg', 3, 'Newmen', 'Trung Quốc', 1150000, 871289, 475, 999, '2018-11-29 19:41:39'),
(94, 'Bàn phím + Chuột Wireless Rapoo 8000 ', 'Bàn phím + chuột không dây.\nChữ in Laser bền bỉ không phai, chống tràn nước.\nTuổi thọ pin dài.', '/images/products/keyboard/KB014.png', 3, 'Rapoo', 'Trung Quốc', 328000, 12656, 345, 999, '2018-11-29 19:41:39'),
(95, 'Bàn phím bán cơ Newmen GM100s Mặt nhôm Full-size L', 'Cấu trúc bán cơ độc quyền của Newmen \nKeycaps ABS, Double, Xuyên LED \nLED 7 màu, tự động đổi, cố định màu hoặc tắt LED nếu muốn\nKhung mặt kim loại chống cháy\nCable dù 1.8m, chống soắn, chống nhiễu', '/images/products/keyboard/KB015.jpg', 3, 'Newmen', 'Trung Quốc', 399000, 12516, 185, 999, '2018-11-29 19:41:39'),
(96, 'Bàn phím Asus ROG Claymore (Xanh dương)', 'Các phím được chiếu đèn nền riêng với công nghệ LED Aura Sync RGB\nCác phím có thể được lập trình toàn diện với chế độ ghi macro bất cứ lúc nào\nCông nghệ chống sót phím 100% với khả năng ghi nhận N phím cùng lúc (NKRO)\nPhím nóng cho tốc độ quạt, ánh sáng và điều khiển ép xung khi được kết hợp với bo mạch chủ ASUS ROG\nCấu trúc nhôm bền vững với chi tiết tinh xảo lấy cảm hứng từ văn hóa Maya', '/images/products/keyboard/KB016.jpg', 3, 'Asus', 'Trung Quốc', 4490000, 812738, 54, 999, '2018-11-29 19:41:39'),
(97, 'Bàn phím SteelSeries Apex 100 Blue LED', 'Bàn phím cao su với cảm ứng điện dung tuổi thọ lên tới 20 triệu lượt bấm.\nToàn bộ đèn nền màu xanh dương trên từng phím.\n24 phím anti-ghosting.\nTích hợp các phím đa phương tiện trên hàng F, kích hoạt cùng phím FN (logo Steelseries).\nTích hợp chức năng khoá phím Window phục vụ chơi game.', '/images/products/keyboard/KB017.jpg', 3, 'SteelSeries', 'Trung Quốc', 872000, 1299, 55, 999, '2018-11-29 19:41:39'),
(98, 'Bàn phím Cougar Puri Red Switch', 'Bàn phím Cougar Puri Red Switch, \nPolling rate 1000Hz/ 1ms, \nBàn phím Chery MX Switch, \nDùng cho các dòng game FPS/MMO/MOBA/RTS, \nChất liệu sắt, nhựa, nặng 1.4kg, ', '/images/products/keyboard/KB018.jpg', 3, 'Cougar', 'Trung Quốc', 1890000, 28319, 92, 999, '2018-11-29 19:41:39'),
(99, 'Bàn phím giả cơ A4 Tech B3370R', 'Thương hiệu: A4Tech\nChuẩn kết nối: USB\nNổi bật: RGB led, bộ sản phẩm kèm kê tay có thể tháo rời', '/images/products/keyboard/KB019.jpg', 3, 'A4 Tech', 'Trung Quốc', 890000, 2913198, 3345, 999, '2018-11-29 19:41:39'),
(100, 'Bàn phím cơ Gaming DAREU DK1280 RGB Blue D Switch', 'Thương hiệu: DareU\nChuẩn kết nối: USB\nPhím cơ với \"D\" Switch độc quyền\nTích hợp RGB led, hỗ trợ NKRO', '/images/products/keyboard/KB020.jpg', 3, 'DAREU', 'Trung Quốc', 1080000, 9231812, 673, 999, '2018-11-29 19:41:39'),
(101, 'Bàn phím cơ A4 Tech Bloody B820R', 'Thương hiệu: A4Tech\nChuẩn kết nối: USB\nNổi bật: RGB led có thể tùy chỉnh, hotkey multimedia.', '/images/products/keyboard/KB021.jpg', 3, 'A4 Tech', 'Trung Quốc', 1780000, 8289, 5778, 999, '2018-11-29 19:41:39'),
(102, 'Bàn phím Asus ROG Strix Flare', 'Các switch phím cơ Cherry MX RGB được sản xuất tại Đức mang lại cảm giác cơ học hài hòa \ncông nghệ chiếu sáng Aura Sync RGB\nCác bàn phím đa phương tiện chuyên dụng và núm xoay điều chỉnh âm lượng, một cổng USB để kết nối dễ dàng và tấm đệm cổ tay mềm có thể tháo rời.', '/images/products/keyboard/KB022.jpg', 3, 'Asus', 'Trung Quốc', 3990000, 987, 2352, 999, '2018-11-29 19:41:39'),
(103, 'Bàn phím cơ E-Blue EKM752', 'Số lượng phím: 104 phím. LED 7 mầu \nFull Antighosting và 12 phím chức năng đa phương tiện\nSwitch: JWC xanh, Độ bền: 50 triệu lần\nKết nối: USB 2.0, Kích thước: 465 x 216 x 43mm', '/images/products/keyboard/KB023.jpg', 3, 'E-Blue', 'Trung Quốc', 1290000, 672, 3632, 999, '2018-11-29 19:41:40'),
(104, 'Bàn phím cơ Sumtax Bingo RGB', 'Led màu, đa sắc\nOutemu Blue Switch\nGiao tiếp USB\nDây bọc chống tính điện, 1.6m', '/images/products/keyboard/KB024.jpg', 3, 'Sumtax ', 'Trung Quốc', 760000, 8888, 888, 999, '2018-11-29 19:41:40'),
(105, 'Bàn phím Corsair K70 MK.2 RGB MX', 'Thương hiệu: Corsair\nLoại phím: Phím cơ \nChuẩn giao tiếp: USB 2.0\nNổi bật: RGB led, Switch Cherry MX Red', '/images/products/keyboard/KB025.jpg', 3, 'Corsair', 'Trung Quốc', 4050000, 7189, 9995, 981, '2018-11-29 19:41:40'),
(106, 'Bàn phím cơ I-Rocks IRK60M Đen Switch Cherry', 'Thương hiệu: I-Rocks\nLoại bàn phím: Phím cơ\nChuẩn giao tiếp: USB 2.0\nNổi bật: Cherry switch, led RGB', '/images/products/keyboard/KB026.jpg', 3, 'I-Rocks', 'Trung Quốc', 2050000, 9821, 5712, 151, '2018-11-29 19:41:40'),
(107, 'Bàn phím Newmen KB813', 'Thiết kế phù hợp cho Game thủ, công nghệ sơn bóng, chống bụi, chống xước, chống tàn thuốc\nTính năng đặc biệt: Led nền 7 màu cố định theo khu vực\nChuẩn giao tiếp: USB', '/images/products/keyboard/KB027.jpg', 3, 'Newmen', 'Trung Quốc', 289000, 98128, 7111, 462, '2018-11-29 19:41:40'),
(108, 'Bàn phím cơ Gaming DAREU DK1280 RGB Red D Switch (', 'Thương hiệu: DareU\nChuẩn kết nối: USB\nPhím cơ với \"D\" Switch độc quyền\nTích hợp RGB led, hỗ trợ NKRO', '/images/products/keyboard/KB028.jpg', 3, 'DAREU', 'Trung Quốc', 1080000, 771828, 17721, 589, '2018-11-29 19:41:40'),
(109, 'Bàn phím + Chuột Newmen KM810', 'Phím với Keycaps sử dụng công nghệ Rubber Coat chống trơn trượt , đem lại cảm giác gõ chân thực\nChuột với 800/1200/1600 DPI tùy chỉnh\nChống nước, chống bụi, siêu bền\nOmron switch, độ bền phím: 20 triệu lần', '/images/products/keyboard/KB029.jpg', 3, 'Newmen', 'Trung Quốc', 460000, 12516, 8127, 987, '2018-11-29 19:41:40'),
(110, 'Bàn phím giả cơ SteelSeries Apex 150', 'Bàn phím cao su với cảm ứng điện dung tuổi thọ lên tới 20 triệu lượt bấm.\nToàn bộ đèn nền RGB 16,8 triệu màu.\n24 phím anti-ghosting.\nTích hợp các phím đa phương tiện trên hàng F, kích hoạt cùng phím FN (logo Steelseries).\nTích hợp chức năng khoá phím Window phục vụ chơi game.\nThiết kế chống nước trên bề mặt.', '/images/products/keyboard/KB030.jpg', 3, 'SteelSeries', 'Trung Quốc', 1532000, 91888, 123456, 472, '2018-11-29 19:41:40'),
(111, 'Bàn phím Newmen KB808 Gaming', 'Chuyển đổi giữa 3 màu sắc đèn LED \nKeycaps Rubber Coat chống trơn trượt \nKhung thép không rỉ, chống nước, thích hơp Game-NET. \nĐộ bền swtich: 20 triệu lần \nChuẩn giao tiếp PS/2', '/images/products/keyboard/KB031.jpg', 3, 'Newmen ', 'Trung Quốc', 320000, 12477, 18287, 681, '2018-11-29 19:41:40'),
(112, 'Bàn phím cơ Kingston Hyper X Alloy Elite Gaming - ', 'Dải đèn độc đáo và hiệu ứng ánh sáng động\nKhung bằng thép chắc chắn \nPhím cơ học CHERRY® MX\nCác phím media chuyên dụng và núm âm lượng lớn\nCác phím truy cập nhanh để điều chỉnh độ sáng, hiệu ứng chiếu sáng và chế độ chơi game \nKết nối thuận tiện qua cổng chuyển đổi USB 2.0 \nCó chức năng 100% Anti-ghosting và N-Key Rollover\nPhần tựa cổ tay có thể tháo rời, dùng thoải mái nhờ lớp phủ mềm mại \nCó thể tùy chọn thêm mũ phím màu titan và dụng cụ tháo mũ phím của HyperX', '/images/products/keyboard/KB032.jpg', 3, 'Kingston', 'Trung Quốc', 2900000, 1771, 87123, 529, '2018-11-29 19:41:40'),
(113, 'Bàn phím cơ A4 Tech Bloody B820R ', 'Thương hiệu: A4Tech\nChuẩn kết nối: USB\nNổi bật: RGB led có thể tùy chỉnh, hotkey multimedia.', '/images/products/keyboard/KB033.jpg', 3, 'A4 Tech', 'Trung Quốc', 1780000, 7710, 123489, 521, '2018-11-29 19:41:40'),
(114, 'Bàn phím Asus ROG Strix Flare', 'Các switch phím cơ Cherry MX RGB được sản xuất tại Đức mang lại cảm giác cơ học hài hòa \ncông nghệ chiếu sáng Aura Sync RGB\nCác bàn phím đa phương tiện chuyên dụng và núm xoay điều chỉnh âm lượng, một cổng USB để kết nối dễ dàng và tấm đệm cổ tay mềm có thể tháo rời', '/images/products/keyboard/KB034.jpg', 3, 'Asus', 'Trung Quốc', 3990000, 9995, 89128, 544, '2018-11-29 19:41:40'),
(115, 'Bàn phím cơ E-Blue EKM752', 'Số lượng phím: 104 phím. LED 7 mầu \nFull Antighosting và 12 phím chức năng đa phương tiện\nSwitch: JWC xanh, Độ bền: 50 triệu lần\nKết nối: USB 2.0, Kích thước: 465 x 216 x 43mm', '/images/products/keyboard/KB035.jpg', 3, 'E-Blue', 'Trung Quốc', 1290000, 5712, 1727, 455, '2018-11-29 19:41:40'),
(116, 'Bàn phím cơ Sumtax Bingo RGB', 'Led màu, đa sắc\nOutemu Blue Switch\nGiao tiếp USB\nDây bọc chống tính điện, 1.6m', '/images/products/keyboard/KB036.jpg', 3, 'Sumtax', 'Trung Quốc', 760000, 172819, 172819, 775, '2018-11-29 19:41:40'),
(117, 'Bàn phím cơ Gaming DAREU DK1280 RGB Blue D Switch ', 'Thương hiệu: DareU\nChuẩn kết nối: USB\nPhím cơ với \"D\" Switch độc quyền\nTích hợp RGB led, hỗ trợ NKRO', '/images/products/keyboard/KB037.jpg', 3, 'DAREU', 'Trung Quốc', 1080000, 216777, 216777, 888, '2018-11-29 19:41:40'),
(118, 'Bàn phím giả cơ A4 Tech B3370R (Đen)', 'Thương hiệu: A4Tech\nChuẩn kết nối: USB\nNổi bật: RGB led, bộ sản phẩm kèm kê tay có thể tháo rời', '/images/products/keyboard/KB038.jpg', 3, 'A4 Tech', 'Trung Quốc', 890000, 871289, 871289, 551, '2018-11-29 19:41:40'),
(119, 'Bàn phím Cougar Puri Red Switch', 'Bàn phím Cougar Puri Red Switch, \nPolling rate 1000Hz/ 1ms, \nBàn phím Chery MX Switch, \nDùng cho các dòng game FPS/MMO/MOBA/RTS, \nChất liệu sắt, nhựa, nặng 1.4kg, \nDây dài 1.8m.', '/images/products/keyboard/KB039.jpg', 3, 'Cougar', 'Trung Quốc', 1890000, 89128, 3457, 158, '2018-11-29 19:41:40'),
(120, 'Bàn phím giả cơ Newmen GM100S Full Size, LED nền R', 'Thương hiệu: Newmen\nThiết kế: Ergonomic, Plate kim loại chống đọng nước tối đa\nTính năng đặc biệt: phím bán cơ, cấu trúc độc quyền của Newmen chống bụi, chống nước\nKết nối: USB', '/images/products/keyboard/KB040.jpg', 3, 'Newmen ', 'Trung Quốc', 495000, 1727, 2341, 852, '2018-11-29 19:41:40'),
(121, 'TAI NGHE SONY MDR-XB50AP/YQE', 'Bộ màng loa: Loại vòm 12mm\nĐộ nhạy: 110 dB/mW\nTần số phản hồi: 4-24000Hz\nĐộ dài cáp: 1.2m\nBảo hành: 06 tháng ', '/images/products/headphone/HP001.jpg', 4, 'Sony', 'Thái Lan', 490000, 12656, 442, 999, '2018-11-29 19:42:53'),
(122, 'TAI NGHE SONY MDR-AS200/BQE', 'Tai nghe Sony\nMàng loa 13.5mm sống động\nChiều dài tai nghe : 1.2 m', '/images/products/headphone/HP002.jpg', 4, 'Sony', 'Trung Quốc', 384000, 12516, 345, 999, '2018-11-29 19:42:53'),
(123, 'TAI NGHE SONY WI-C400/RZ E', 'Tai nghe Bluetooth choàng cổ\nMàng loa rộng 9mm\nDải âm tần: 8 – 22.000 Hz\nBluetooth NFC kết nối một chạm', '/images/products/headphone/HP003.jpg', 4, 'Sony', 'Trung Quốc', 1490000, 812738, 786, 999, '2018-11-29 19:42:53'),
(124, 'TAI NGHE SONY MDRXB950B1RCE', 'Tai nghe bluetooth choàng đầu\nMàng loa độ nhạy cao 40 mm\nThời gian sử dụng : 18 giờ\nKết nối Bluetooth và NFC\nĐộ nhạy: 102dB/mW\nBảo hành: 12 tháng', '/images/products/headphone/HP004.jpg', 4, 'Sony', 'Trung Quốc', 3990000, 1299, 123, 999, '2018-11-29 19:42:53'),
(125, 'TAI NGHE SONY MDR-AS400EX/BQE', 'Tai nghe Sony\nJack cắm 3.5mm\nMàng loa 9mm', '/images/products/headphone/HP005.jpg', 4, 'Sony', 'Trung Quốc', 693000, 28319, 678, 999, '2018-11-29 19:42:53'),
(126, 'TAI NGHE SONY - MDREX150AP', 'Tai nghe thời trang Sony\nMàng loa rộng 9 mm\nĐệm tai nghe bằng slilicone\nMàu: Xanh', '/images/products/headphone/HP006.jpg', 4, 'Sony', 'Trung Quốc', 390000, 2913198, 555, 999, '2018-11-29 19:42:53'),
(127, 'TAI NGHE SONY MDRZX310AP MÀU XANH DƯƠNG', 'Tai nghe choàng đầu có micro\nDải âm tần: 10 - 24kHz\nĐộ nhạy: 98 dB/mW\nMàng loa Dynamic: 30mm\nChiều dài cáp: 1.2 m\nBảo hành: 06 tháng', '/images/products/headphone/HP007.jpg', 4, 'Sony', 'Trung Quốc', 890000, 9231812, 981, 999, '2018-11-29 19:42:53'),
(128, 'TAI NGHE SONY MDREX155AP MÀU XANH DƯƠNG', 'Tai nghe Sony MDR\nMàng loa Dynamic rộng 9mm\nDải âm tần: 5-24.000 Hz\nĐộ nhạy 103dB/Mw', '/images/products/headphone/HP008.jpg', 4, 'Sony', 'Trung Quốc', 490000, 8289, 151, 999, '2018-11-29 19:42:53'),
(129, 'TAI NGHE SONY MDR-E9LP', 'Tai nghe thời trang Sony\nMàn loa rộng 13.5 mm\nChiều dài cáp 1.2 m', '/images/products/headphone/HP009.jpg', 4, 'Sony', 'Trung Quốc', 199000, 987, 462, 999, '2018-11-29 19:42:53'),
(130, 'TAI NGHE SONY MDR-E9LP', 'Tai nghe thời trang Sony\nMàn loa rộng 13.5 mm\nChiều dài cáp 1.2 m', '/images/products/headphone/HP010.jpg', 4, 'Sony', 'Trung Quốc', 199000, 672, 589, 999, '2018-11-29 19:42:53'),
(131, 'TAI NGHE SONY MDR-1ADAC', 'Tai nghe choàng đầu Sony\nMàng loa 40mm\nTích hợp USB DAC\nThời lượng Pin lên đến 7.5 giờ.\nMàng ngăn Liquid Crystal Polymer phủ nhôm', '/images/products/headphone/HP011.jpg', 4, 'Sony', 'Trung Quốc', 5593000, 8888, 987, 999, '2018-11-29 19:42:53'),
(132, 'TAI NGHE KHÔNG DÂY CUHYA0080', 'Âm thanh giả lập 7.1\nCông nghệ chống ồn\nDung lượng pin: 570mAh\nKhoảng cách tối đa: 10m\nHỗ trợ PlayStation 4, PC và Mac\nBảo hành: 12 tháng', '/images/products/headphone/HP012.jpg', 4, 'Sony', 'Trung Quốc', 2490000, 7189, 472, 999, '2018-11-29 19:42:53'),
(133, 'TAI NGHE SONY MDRZX110AP MÀU TRẮNG', 'Tai nghe choàng đầu có micro\nDải âm tần: 12 - 22kHz\nĐộ nhạy: 98 dB/mW\nMàng loa Dynamic: 30mm\nChiều dài cáp: 1.2 m\nBảo hành: 06 tháng', '/images/products/headphone/HP013.jpg', 4, 'Sony', 'Trung Quốc', 590000, 9821, 681, 999, '2018-11-29 19:42:53'),
(134, 'TAI NGHE SONY MDREX155AP MÀU HỒNG', 'Tai nghe Sony MDR\nMàng loa Dynamic rộng 9mm\nDải âm tần: 5-24.000 Hz\nĐộ nhạy 103dB/mW\nBảo hành: 12 tháng', '/images/products/headphone/HP014.jpg', 4, 'Sony', 'Trung Quốc', 490000, 98128, 529, 999, '2018-11-29 19:42:53'),
(135, 'TAI NGHE SONY MDR-AS400EX/WQE', 'Tai nghe Sony\nJack cắm 3.5mm\nMàng loa 9mm', '/images/products/headphone/HP015.jpg', 4, 'Sony', 'Trung Quốc', 693000, 771828, 521, 999, '2018-11-29 19:42:53'),
(136, 'TAI NGHE SONY - MDREX150AP', 'ai nghe thời trang Sony\nMàng loa rộng 9 mm\nĐệm tai nghe bằng slilicone\nMàu: Trắng', '/images/products/headphone/HP016.jpg', 4, 'Sony', 'Trung Quốc', 390000, 12516, 544, 999, '2018-11-29 19:42:53'),
(137, 'TAI NGHE SONY - MDR-100AAP', 'Tai nghe thời trang Sony\nMàng loa rộng 40 mm\nMàng chắn với vòm phủ titan\nMàu: Đen', '/images/products/headphone/HP017.jpg', 4, 'Sony', 'Trung Quốc', 2990000, 91888, 455, 999, '2018-11-29 19:42:53'),
(138, 'TAI NGHE SONY MDREX150AP', 'Tai nghe thời trang Sony\nMàng loa rộng 9 mm\nĐệm tai nghe bằng slilicone\nMàu: Đen', '/images/products/headphone/HP018.jpg', 4, 'Sony', 'Trung Quốc', 390000, 8127, 775, 999, '2018-11-29 19:42:53'),
(139, 'TAI NGHE SONY MDR-AS400EX/DQE', 'Tai nghe Sony\nJack cắm 3.5mm\nMàng loa 9mm', '/images/products/headphone/HP019.jpg', 4, 'Sony', 'Trung Quốc', 693000, 916, 888, 999, '2018-11-29 19:42:53'),
(140, 'TAI NGHE SONY MDRXB550AP MÀU ĐỎ', 'Tai nghe choàng đầu có micro\nMàng loa Dynamic: 30mm\nĐộ nhạy: 102dB/mW\nDải âm tần 5-22kHz\nChiều dài dây: Khoảng 1.2 m\nBảo hành: 12 tháng', '/images/products/headphone/HP020.jpg', 4, 'Sony', 'Trung Quốc', 1190000, 961, 551, 999, '2018-11-29 19:42:53'),
(141, 'TAI NGHE SONY - MDREX150AP', 'Tai nghe thời trang Sony\nMàng loa rộng 9 mm\nĐệm tai nghe bằng slilicone\nMàu: Xanh', '/images/products/headphone/HP021.jpg', 4, 'Sony', 'Trung Quốc', 390000, 9818, 442, 999, '2018-11-29 19:42:54'),
(142, 'TAI NGHE SONY MDRXB55AP MÀU ĐỎ', 'Tai nghe nhét tai có micro\nMàng loa: 12mm \nDải âm tần: 4 - 24kHz\nĐộ nhạy 110dB/mW\nChiều dài dây: Xấp xỉ 1.2 m\nBảo hành: 12 tháng', '/images/products/headphone/HP022.jpg', 4, 'Sony', 'Trung Quốc', 799000, 81290, 345, 999, '2018-11-29 19:42:54'),
(143, 'TAI NGHE SONY MDREX155AP MÀU TRẮNG', 'Tai nghe Sony MDR\nMàng loa Dynamic rộng 9mm\nDải âm tần: 5-24.000 Hz\nĐộ nhạy 103dB/Mw', '/images/products/headphone/HP023.jpg', 4, 'Sony', 'Trung Quốc', 490000, 5919, 786, 999, '2018-11-29 19:42:54'),
(144, 'TAI NGHE SONY MDRZX110AP MÀU ĐEN', 'Tai nghe choàng đầu có micro\nDải âm tần: 12 - 22kHz\nĐộ nhạy: 98 dB/mW\nMàng loa Dynamic: 30mm\nChiều dài cáp: 1.2 m\nBảo hành: 06 tháng', '/images/products/headphone/HP024.jpg', 4, 'Sony', 'Trung Quốc', 0, 12477, 123, 999, '2018-11-29 19:42:54'),
(145, 'TAI NGHE SONY MDRXB550AP MÀU ĐEN', 'Tai nghe choàng đầu có micro\nMàng loa Dynamic: 30mm\nĐộ nhạy: 102dB/mW\nDải âm tần 5-22kHz\nChiều dài dây: Khoảng 1.2 m\nBảo hành: 12 tháng', '/images/products/headphone/HP025.jpg', 4, 'Sony', 'Trung Quốc', 1190000, 1771, 678, 999, '2018-11-29 19:42:54'),
(146, 'TAI NGHE SONY MDR-ZX310AP', 'Tai nghe choàng đầu Sony\nMàng loa 30mm\nChiều dài cáp 1.2 m\nThiết kế gập gọn nhẹ, dễ dàng mang theo', '/images/products/headphone/HP026.jpg', 4, 'Sony', 'Trung Quốc', 890000, 7710, 555, 999, '2018-11-29 19:42:54'),
(147, 'TAI NGHE SONY MDR-ZX310AP', 'Tai nghe choàng đầu Sony\nMàng loa 30mm\nChiều dài cáp 1.2 m\nThiết kế gập gọn nhẹ, dễ dàng mang theo', '/images/products/headphone/HP027.jpg', 4, 'Sony', 'Trung Quốc', 890000, 9995, 981, 999, '2018-11-29 19:42:54'),
(148, 'TAI NGHE SONY MDR ZX110AP', 'Tai nghe Sony\nMàng loa 30mm\nChiều dài cáp 1.2 m', '/images/products/headphone/HP028.jpg', 4, 'Sony', 'Trung Quốc', 590000, 5712, 151, 999, '2018-11-29 19:42:54'),
(149, 'TAI NGHE SONY MDRXB55AP MÀU ĐỎ', 'Tai nghe Sony MDR\nMàng loa 12mm Extra Bass\nDải âm tần: 4 - 24.000 Hz\nĐộ nhạy 110dB/Mw', '/images/products/headphone/HP029.jpg', 4, 'Sony', 'Trung Quốc', 890000, 7111, 462, 999, '2018-11-29 19:42:54'),
(150, 'TAI NGHE SONY MDR-ZX310AP', 'Tai nghe choàng đầu Sony\nMàng loa 30mm\nChiều dài cáp 1.2 m\nThiết kế gập gọn nhẹ, dễ dàng mang theo', '/images/products/headphone/HP030.jpg', 4, 'Sony', 'Trung Quốc', 890000, 17721, 589, 999, '2018-11-29 19:42:54'),
(151, 'TAI NGHE SONY MDR-E9LP', 'Tai nghe thời trang Sony\nMàn loa rộng 13.5 mm\nChiều dài cáp 1.2 m', '/images/products/headphone/HP031.jpg', 4, 'Sony', 'Trung Quốc', 199000, 8127, 987, 999, '2018-11-29 19:42:54'),
(152, 'TAI NGHE SONY MDR-E9LP', 'Tai nghe thời trang Sony\nMàn loa rộng 13.5 mm\nChiều dài cáp 1.2 m', '/images/products/headphone/HP032.jpg', 4, 'Sony', 'Trung Quốc', 199000, 123456, 472, 999, '2018-11-29 19:42:54'),
(153, 'TAI NGHE BLUETOOTH PLANTRONICS E500', 'Tai nghe Bluetooth Plantronics V4.0\nKhoảng cách kết nối: 10m\nThời gian chờ: 14 ngày\nChức năng DeepSleep giúp tiết kiệm điện', '/images/products/headphone/HP033.jpg', 4, 'Plantronics', 'US', 1042000, 18287, 681, 999, '2018-11-29 19:42:54'),
(154, 'TAI NGHE BLUETOOTH PLANTRONICS ML15', 'Chuẩn Bluetooth 3.0\nPhạm vi kết nối 10m\nKết nối cùng lúc 2 thiết bị\nĐàm thoại liên tục 6 giờ\nTích hợp Mic thoại', '/images/products/headphone/HP034.jpg', 4, 'Plantronics', 'US', 449000, 87123, 529, 999, '2018-11-29 19:42:54'),
(155, 'TAI NGHE BLUETOOTH PLANTRONICS E500', 'Tai nghe Bluetooth Plantronics V4.0\nKhoảng cách kết nối: 10m\nThời gian chờ: 14 ngày\nChức năng DeepSleep giúp tiết kiệm điện', '/images/products/headphone/HP035.jpg', 4, 'Plantronics', 'US', 1042000, 123489, 521, 999, '2018-11-29 19:42:54'),
(156, 'TAI NGHE BLUETOOTH PLANTRONICS VOYAGER EDGE', 'Tai nghe Bluetooth 4.0\nKết nối NFC\n6h nghe nói\nKhẩu lệnh bằng giọng nói', '/images/products/headphone/HP036.jpg', 4, 'Plantronics', 'US', 1959000, 89128, 544, 999, '2018-11-29 19:42:54'),
(157, 'TAI NGHE BLUETOOTH PLANTRONICS M70', 'Tai nghe Bluetooth Plantronics\nKhoảng cách kết nối: 10m\nThời gian chờ: 16 ngày\nThời gian đàm thoại: 11 giờ', '/images/products/headphone/HP037.jpg', 4, 'Plantronics', 'US', 553000, 1727, 455, 999, '2018-11-29 19:42:54'),
(158, 'TAI NGHE BLUETOOTH PLANTRONICS VOYAGER EDGE', 'Tai nghe Bluetooth 4.0\nKết nối NFC\n6h nghe nói\nKhẩu lệnh bằng giọng nói', '/images/products/headphone/HP038.jpg', 4, 'Plantronics', 'US', 1959000, 172819, 775, 999, '2018-11-29 19:42:54'),
(159, 'TAI NGHE BLUETOOTH PLANTRONICS M70', 'Tai nghe Bluetooth Plantronics\nKhoảng cách kết nối: 10m\nThời gian chờ: 16 ngày\nThời gian đàm thoại: 11 giờ', '/images/products/headphone/HP039.jpg', 4, 'Plantronics', 'US', 553000, 216777, 888, 999, '2018-11-29 19:42:54'),
(160, 'TAI NGHE BLUETOOTH PLANTRONICS M90', 'Công nghệ giảm tiếng ồn\nNói Answer/Ignore nhận cuộc gọi\nThưởng thức âm nhạc và media', '/images/products/headphone/HP040.jpg', 4, 'Plantronics', 'US', 763000, 871289, 551, 999, '2018-11-29 19:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
