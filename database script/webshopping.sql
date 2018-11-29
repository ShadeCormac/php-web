-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2018 lúc 02:31 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webshopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
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
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`AccountId`, `UserName`, `Pass`, `Type`, `Address`, `Phone`) VALUES
(1, 'admin', '$2y$10$na4ImmdiYLkf5oJBerNaaO05Hxbr2l8YoCAEy0m/JT6Z6Wu3WLfB.', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Laptop'),
(2, 'Mobile'),
(3, 'Keyboard'),
(4, 'Headphone');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
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
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
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
(40, 'MSI GP63 Leopard', '\"CPU : Core i5 8300H\r\nRam : 8GB DDR4\r\nỔ cứng : SSD 256GB + HDD 1TB\r\nMàn hình : 15.6 inch FHD\r\nCard màn hình :GTX 1060ti\"\r\n', '/images/products/laptop/LT040.png', 1, 'MSI', 'Nước ngoài', 33990000, 5456, 54, 0, '2018-11-29 08:04:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`OrderId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
