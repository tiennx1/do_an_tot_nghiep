-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2024 lúc 08:14 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Hieu', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'Kha', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(3, 'Sang', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `name`, `price`, `quantity`, `image`) VALUES
(1, 3, 2, 'Trà Sữa Hokkaido ', 23000, 1, 'trasuahokkaido.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(100) NOT NULL,
  `title` varchar(7000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(7000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `image`) VALUES
(1, '&#34;Lời Chúc Đầu Tuần&#34;', 'Chúc bạn một tuần mới tràn đầy năng lượng và hứng khởi! Hãy để mỗi ly cà phê từ Tinky Coffee mang đến cho bạn sự sáng tạo và niềm vui trong công việc. Cùng nhau khởi đầu tuần mới thật tuyệt vời nhé.', '2024-05-25', '4-cac-quan-cafe-dep-o-hanoi-de-chup-hinh.jpg'),
(2, '&#34;Giải Tỏa Mùa Hè&#34;', 'Mùa hè tại Tinky Coffee là một trải nghiệm tuyệt vời không thể bỏ qua. Quán cà phê ấm cúng nằm giữa lòng thành phố, nhưng vẫn mang đến cảm giác thoải mái và thoáng đãng nhờ không gian xanh mát và thiết kế mở. Khi bước vào Tinky Coffee, bạn sẽ ngay lập tức bị thu hút bởi hương thơm quyến rũ của cà phê rang xay tại chỗ. Mùa hè, quán trở nên sôi động hơn với những thức uống đặc biệt như cà phê đá, trà trái cây tươi mát và các loại sinh tố bổ dưỡng, tất cả đều được chế biến từ nguyên liệu tươi ngon.', '2024-05-25', 'nen.jpg'),
(3, '&#34;Mùa Hè Oi Bức&#34;', 'Mùa hè đến, mang theo cái nắng oi bức và những cơn nóng gay gắt. Để giúp bạn giải tỏa cái nóng và tận hưởng những khoảnh khắc thư giãn, Tinky Coffee hân hạnh giới thiệu bộ sưu tập thức uống mát mẻ, sảng khoái, đặc biệt dành riêng cho mùa hè này.', '2024-05-25', 'Thức Uống Mới.jpg'),
(4, '&#34;Câu Chuyện Tình Yêu...&#34;', 'Ngày xửa ngày xưa, tại một quán cà phê nhỏ nằm trên con phố yên bình mang tên Tinky Coffee, có một câu chuyện tình yêu đẹp đẽ bắt đầu. Tinky Coffee không chỉ nổi tiếng với những ly cà phê thơm ngon, mà còn là nơi mà những con người tìm thấy nhau trong những khoảnh khắc đặc biệt.', '2024-05-25', '0308_MUYfixed-QU0_2397.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'Đã đặt hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `popularity` int(10) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `popularity`, `category`, `price`, `image`) VALUES
(1, 'Trà Sữa Truyền Thống', NULL, 'Trà sữa', 22000, 'trasuatruyenthong.jpg'),
(2, 'Trà Sữa Hokkaido ', NULL, 'Trà sữa', 23000, 'trasuahokkaido.jpg'),
(3, 'Trà Sữa Bạc Hà', NULL, 'Trà sữa', 24000, 'trasuabacha.jpg'),
(4, 'Trà Sữa Xoài', NULL, 'Trà sữa', 22000, 'trasuaxoai.jpg'),
(5, 'Trà Sữa Dâu', NULL, 'Trà sữa', 22000, 'trasuadau.jpg'),
(6, 'Trà Sữa Đào', NULL, 'Trà sữa', 25000, 'trasuadao.jpg'),
(7, 'Trà Sữa Khoai Môn', NULL, 'Trà sữa', 22000, 'trasuakhoaimon.jpg'),
(8, 'Capuchino', NULL, 'Cà phê', 22000, 'capuchino.jpg'),
(9, 'Cà Phê Sữa', NULL, 'Cà phê', 22000, 'caphesua.jpg'),
(10, 'Trà Sữa Hokkaido Socola', NULL, 'Trà sữa', 25000, 'trasuahokkaidosocola.jpg'),
(11, 'Trà Chanh Cam lộ', 4, 'Trà', 35000, 'trachanhcamlo.jpg'),
(12, 'Ca Phê Mây', 1, 'Cà phê', 35000, 'caphemay.jpg'),
(13, 'Trà Sữa Matcha', 3, 'Trà sữa', 35000, 'trasuamatcha.jpg'),
(14, 'Soda Trà Sen Lựu Đỏ', 2, 'Soda', 35000, 'trasenluudo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(1, 'Sang', 'sang@gmail.com', '0123456789', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bà Rịa - Vũng Tàu'),
(2, 'Kha', 'kha@gmail.com', '0123456777', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bà Rịa - Vũng Tàu'),
(3, 'Hiếu', 'hieu@gmail.com', '0123456788', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bà Rịa - Vũng Tàu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_pid_1` (`product_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_pid_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `review_table`
--
ALTER TABLE `review_table`
  ADD CONSTRAINT `review_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
