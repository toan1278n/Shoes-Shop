-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2023 lúc 12:15 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authorized`
--

CREATE TABLE `authorized` (
  `id_author` int(11) NOT NULL,
  `name_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authorized`
--

INSERT INTO `authorized` (`id_author`, `name_author`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'warehouse keeper');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name_brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name_brand`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_productDT` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL COMMENT '0: Nam, 1: Nữ, 2: Trẻ con',
  `id_cha` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `id_cha`, `level`) VALUES
(1, 'Men', NULL, 0),
(2, 'Women', NULL, 0),
(3, 'Kids', NULL, 0),
(23, 'Newest ', 1, 1),
(24, 'Jordan', 1, 1),
(25, 'Running', 1, 1),
(26, 'Football', 1, 1),
(28, 'Newest', 2, 1),
(29, 'Jorndan', 2, 1),
(30, 'Running', 2, 1),
(31, 'Football', 2, 1),
(33, 'Newest', 3, 1),
(34, 'Jorndan', 3, 1),
(35, 'Running', 3, 1),
(36, 'Football', 3, 1),
(37, 'All Shoes', NULL, 2),
(38, 'Basketball', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `name_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `name_color`) VALUES
(1, 'Black'),
(2, 'White');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'coderNDP', 'ndp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(59, 'NDD', 'nd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(60, 'NDPP', 'ndpp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(61, 'aaa', 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `name_image` varchar(255) NOT NULL,
  `id_product` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: hiện, 1: ẩn, 2: thumnail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id_image`, `name_image`, `id_product`, `status`) VALUES
(1, 'nike_1.jpg', 1, 0),
(2, 'nike_2.jpg', 2, 0),
(3, 'nike_3.jpg', 3, 0),
(4, 'nike_4.jpg', 4, 0),
(5, 'nike_5.jpg', 5, 0),
(6, 'nike_6.jpg', 6, 0),
(7, 'adidas_1.jpg', 7, 0),
(8, 'adidas_2.jpg', 8, 0),
(9, 'adidas_3.jpg', 9, 0),
(10, 'adidas_4.jpg', 10, 0),
(11, 'adidas_5.jpg', 11, 0),
(12, 'adidas_6.jpg', 12, 0),
(13, 'puma_1.jpg', 13, 0),
(14, 'puma_2.jpg', 14, 0),
(15, 'puma_3.jpg', 15, 0),
(16, 'puma_4.jpg', 16, 0),
(17, 'puma_5.jpg', 36, 0),
(18, 'puma_6.jpg', 38, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `card_number` varchar(40) NOT NULL,
  `status_payment` tinyint(4) NOT NULL COMMENT '0: đã thanh toán , 1: chưa thanh toán',
  `updated_time` datetime DEFAULT current_timestamp(),
  `shipping_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0: chưa duyệt, 1: đang đóng gói , 2: đang vận chuyển, 3: hoàn thành, 4: đã hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `id_customer`, `name`, `phone`, `email`, `address`, `id_payment`, `card_number`, `status_payment`, `updated_time`, `shipping_time`, `status`) VALUES
(1, 1, 'NDP', '0233242324', 'a@gmail.com', 'Ha Noi', 99, '', 0, '2023-07-17 14:44:14', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `quantity`, `price`) VALUES
(2, 1, 1, 1, 180);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: ẩn , 1: hiện'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `name`, `status`) VALUES
(1, 'Visa', 0),
(2, 'Mastercard', 0),
(3, 'American Express', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price` float NOT NULL,
  `sale_price` float NOT NULL DEFAULT 0,
  `Des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name`, `img`, `id_brand`, `id_category`, `price`, `sale_price`, `Des`) VALUES
(1, 'Nike Invicible 3', 'nike_1.jpg', 1, 23, 180, 0, 'Men\'s road running shoes'),
(2, 'Nike Vomero 16', 'nike_2.jpg', 1, 23, 158.5, 0, 'Men\'s road running shoes'),
(3, 'Nike Impact 4', 'nike_3.jpg', 1, 23, 112, 0, 'Basketball Shoes'),
(4, 'Nike Air Force 1\'07', 'nike_4.jpg', 1, 28, 124, 0, 'Women\'s Shoes'),
(5, 'Nike City Rep TR', 'nike_5.jpg', 1, 28, 90, 0, 'Women\'s Training Shoes'),
(6, 'Nike Spark', 'nike_6.jpg', 1, 28, 174, 0, 'Women\'s Shoes'),
(7, 'Daily 3.0 Shoes', 'adidas_1.jpg', 2, 23, 65, 0, 'Men\'s sportswear'),
(8, 'Ultraboost 1.0 Shoes', 'adidas_2.jpg', 2, 23, 190, 0, 'Men\'s sportswear'),
(9, 'Stan Smith Shoes', 'adidas_3.jpg', 2, 23, 100, 0, 'Men\'s Originals '),
(10, 'Cloudfoam Pure Shoes', 'adidas_4.jpg', 2, 28, 75, 0, 'Women\'s Essentials'),
(11, 'Nizza Platform Shoes', 'adidas_5.jpg', 2, 28, 75, 0, 'Originals'),
(12, 'Ultrabounce Running Shoes', 'adidas_6.jpg', 2, 28, 80, 0, 'Women\'s Running Shoes'),
(13, 'Suede Classic XXI Men\'s Sneaker', 'puma_1.jpg', 3, 23, 75, 0, 'Men\'s Shoes'),
(14, 'PUMAxLAMELO BALL MB.01', 'puma_2.jpg', 3, 23, 120, 0, 'Men\'s Basketball Shoes'),
(15, 'SpeedcatOG+Sparco Driving Shoes', 'puma_3.jpg', 3, 23, 100, 0, 'Men\'s Shoes'),
(16, 'Cali Dream Thrifted', 'puma_4.jpg', 3, 28, 95, 0, 'Women\'s Sneaker'),
(36, 'Mayze UT Mono', 'puma_5.jpg', 3, 28, 90, 0, 'Women\'s Sneakers'),
(38, 'Defy Mid', 'puma_6.jpg', 3, 28, 100, 0, 'Woman\'s Training Shoes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `id_product`, `id_size`, `id_color`, `Quantity`) VALUES
(19, 1, 1, 1, 20),
(20, 2, 2, 2, 20),
(21, 3, 3, 2, 20),
(22, 4, 4, 2, 20),
(23, 5, 5, 2, 20),
(24, 6, 6, 2, 20),
(25, 7, 7, 1, 20),
(26, 8, 8, 1, 20),
(27, 9, 1, 2, 20),
(28, 10, 2, 2, 20),
(29, 11, 3, 2, 20),
(30, 12, 4, 2, 20),
(31, 13, 5, 1, 20),
(32, 14, 6, 2, 20),
(33, 15, 7, 1, 20),
(34, 16, 8, 2, 20),
(35, 36, 1, 1, 20),
(36, 38, 2, 1, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `name`) VALUES
(1, '38'),
(2, '39'),
(3, '40'),
(4, '41'),
(5, '42'),
(6, '43'),
(7, '44'),
(8, '45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `name_staff` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_author` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id_staff`, `name_staff`, `email`, `password`, `id_author`, `status`) VALUES
(1, 'NDP', 'nguyenphuduy2004@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authorized`
--
ALTER TABLE `authorized`
  ADD PRIMARY KEY (`id_author`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `FK_productID` (`id_productDT`),
  ADD KEY `FK_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `FK_categories` (`id_cha`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `FK_imagePD` (`id_product`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_IDcustomer` (`id_customer`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product` (`id_product`),
  ADD KEY `FK_order` (`id_order`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_Category` (`id_category`),
  ADD KEY `FK_brand` (`id_brand`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_productDT` (`id_product`),
  ADD KEY `FK_productSize` (`id_size`),
  ADD KEY `FK_productColor` (`id_color`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `FK_authorized` (`id_author`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `authorized`
--
ALTER TABLE `authorized`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_productID` FOREIGN KEY (`id_productDT`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_categories` FOREIGN KEY (`id_cha`) REFERENCES `category` (`id_category`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_imagePD` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_IDcustomer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `FK_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `FK_productColor` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `FK_productDT` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `FK_productSize` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_authorized` FOREIGN KEY (`id_author`) REFERENCES `authorized` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
