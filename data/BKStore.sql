-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 01:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `home_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_review`
--

CREATE TABLE `customer_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ordered_product_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author` varchar(225) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author`, `created_date`, `title`, `content`, `image`) VALUES
(1, 'Trần Mạnh Dũng', '2023-04-05', 'Chính sách của chúng tôi', '<h2>Chúng tôi yêu các bạn</h2>\r\n<p>Sự thật là như vậy!</p>', NULL),
(2, 'LoLo', '2023-04-06', 'Cố gắng lên!', 'Đụ má đụ má đụ má', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8WT40yAajqGo8FE2yb0NToXrz6uo9y_hfFA&usqp=CAU'),
(3, 'bla', '2023-04-07', 'Don\'t be sad ', 'Awful', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmkAa10fDH4LoBWwberetHPcP4viZiUVF0MQ&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `shop_order_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `variation_option_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(9) NOT NULL,
  `description` text DEFAULT NULL,
  `product_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `variation_option_id`, `product_name`, `price`, `quantity`, `description`, `product_image`) VALUES
(1, 6, 601, 'Con Chim Xanh Biếc Bay Về', 112000, 99, 'Không giống như những tác phẩm trước đây lấy bối cảnh vùng quê miền Trung đầy ắp những hoài niệm tuổi thơ dung dị, trong trẻo với các nhân vật ở độ tuổi dậy thì, trong quyển sách mới lần này nhà văn Nguyễn Nhật Ánh lấy bối cảnh chính là Sài Gòn – Thành phố Hồ Chí Minh nơi tác giả sinh sống (như là một sự đền đáp ân tình với mảnh đất miền Nam). Các nhân vật chính trong truyện cũng “lớn” hơn, với những câu chuyện mưu sinh lập nghiệp lắm gian nan thử thách của các sinh viên trẻ đầy hoài bão. Tất nhiên không thể thiếu những câu chuyện tình cảm động, kịch tính và bất ngờ khiến bạn đọc ngẩn ngơ, cười ra nước mắt. Và như trong mọi tác phẩm Nguyễn Nhật Ánh, sự tử tế và tinh thần hướng thượng vẫn là điểm nhấn quan trọng trong quyển sách mới này.', '\\bookstore\\web\\assets\\img\\vh01.jpg'),
(2, 6, 601, 'Cà Phê Cùng Tony (Tái Bản 2017)', 63000, 99, 'Chúng tôi tin rằng những người trẻ tuổi luôn mang trong mình khát khao vươn lên và tấm lòng hướng thiện, và có nhiều cách để động viên họ biến điều đó thành hành động. Nếu như tập sách nhỏ này có thể khơi gợi trong lòng bạn đọc trẻ một cảm hứng tốt đẹp, như tách cà phê thơm vào đầu ngày nắng mới, thì đó là niềm vui lớn của tác giả Tony Buổi Sáng.', '\\bookstore\\web\\assets\\img\\vh02.jpg'),
(3, 6, 601, '5 Centimet Trên Giây', 50000, 99, 'Bằng giọng văn tinh tế, truyền cảm, Năm centimet trên giây mang đến những khắc họa mới về tâm hồn và khả năng tồn tại của cảm xúc, bắt đầu từ tình yêu trong sáng, ngọt ngào của một cô bé và cậu bé. Ba giai đoạn, ba mảnh ghép, ba ngôi kể chuyện khác nhau nhưng đều xoay quanh nhân vật nam chính, người luôn bị ám ảnh bởi kí ức và những điều đã qua…', '\\bookstore\\web\\assets\\img\\vh03.jpg'),
(4, 6, 601, 'Mắt Biếc', 91000, 99, 'Mắt biếc là một tác phẩm được nhiều người bình chọn là hay nhất của nhà văn Nguyễn Nhật Ánh. Tác phẩm này cũng đã được dịch giả Kato Sakae dịch sang tiếng Nhật để giới thiệu với độc giả Nhật Bản.', '\\bookstore\\web\\assets\\img\\vh04.jpg'),
(5, 6, 601, 'Chiến Binh Cầu Vồng', 109000, 99, 'Chiến binh Cầu vồng có cả tình yêu trong sáng tuổi học trò lẫn những trò đùa tinh quái, cả nước mắt lẫn tiếng cười – một bức tranh chân thực về hố sâu ngăn cách giàu nghèo, một tác phẩm văn học cảm động truyền tải sâu sắc nhất ý nghĩa đích thực của việc làm thầy, việc làm trò và việc học.\n', '\\bookstore\\web\\assets\\img\\vh05.jpg'),
(6, 6, 601, 'Hai Số Phận ', 175000, 99, '(“Hai số phận” (Kane & Abel) là câu chuyện về hai người đàn ông đi tìm vinh quang. William Kane là con một triệu phú nổi tiếng trên đất Mỹ, lớn lên trong nhung lụa của thế giới thượng lưu. Wladek Koskiewicz là đứa trẻ không rõ xuất thân, được gia đình người bẫy thú nhặt về nuôi. Một người được ấn định để trở thành chủ ngân hàng khi lớn lên, người kia nhập cư vào Mỹ cùng đoàn người nghèo khổ. \nTrải qua hơn sáu mươi năm với biết bao biến động, hai con người giàu hoài bão miệt mài xây dựng vận mệnh của mình . “Hai số phận” nói về nỗi khát khao cháy bỏng, những nghĩa cử, những mối thâm thù, từng bước đường phiêu lưu, hiện thực thế giới và những góc khuất... mê hoặc người đọc bằng ngôn từ cô đọng, hai mạch truyện song song được xây dựng tinh tế từ những chi tiết nhỏ nhất.) ', '\\bookstore\\web\\assets\\img\\vh06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(1, 'Học Ngoại Ngữ'),
(2, 'Kinh Tế'),
(3, 'Nuôi Dạy Con'),
(4, 'Tâm Lý - Kỹ Năng Sống'),
(5, 'Thiếu Nhi'),
(6, 'Văn Học');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discout_rate` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_item`
--

CREATE TABLE `promotion_item` (
  `item_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_item`
--

CREATE TABLE `shopping_cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `shipping_address` int(11) DEFAULT NULL,
  `shipping_method` int(11) DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_user`
--

CREATE TABLE `site_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(9) NOT NULL,
  `image` text DEFAULT 'https://cdn-icons-png.flaticon.com/512/21/21294.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_user`
--

INSERT INTO `site_user` (`id`, `name`, `email`, `phone_number`, `password`, `role`, `image`) VALUES
(1, 'Trần Mạnh Dũng', 'dung.trandeptrai@hcmut.edu', '', '123', 0, 'https://scontent.fsgn14-1.fna.fbcdn.net/v/t39.30808-6/274864653_3825922390966336_7872099780439800705_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=Y6Tylbkk9AMAX8QQK0L&_nc_ht=scontent.fsgn14-1.fna&oh=00_AfCb5mrsCozP3CfA2qc85W5JrjIC14lTk5JZo9FDVlRkmw&oe=64477B7A'),
(2, 'Trần Mạnh Dũng', 'dung.trandeptrai@hcmut.e', NULL, '123', 0, NULL),
(3, 'Trần Mạnh Dũng', 'dung.tran@hcmut.edu.vn', NULL, '123456', 0, NULL),
(4, 'Trần Mạnh Dũng', 'dung.trandeptrai@hcmut.edu.vn', NULL, '123', 0, 'https://scontent.fsgn14-1.fna.fbcdn.net/v/t39.30808-6/274864653_3825922390966336_7872099780439800705_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=SVTDNltbzU8AX9Gd2td&_nc_ht=scontent.fsgn14-1.fna&oh=00_AfC99H9sVeW4whoLh5TuJoa1QgX8S2zqtw7jSPqt2eENvQ&oe=64477B7A'),
(5, 'Báo Đạo', 'badao@gg.com', NULL, '123', 1, 'https://cdn-icons-png.flaticon.com/512/21/21294.png'),
(6, 'nguyen', 'dung@adfa.ajjaja', NULL, '111', 0, 'https://cdn-icons-png.flaticon.com/512/21/21294.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_method`
--

CREATE TABLE `user_payment_method` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variation_option`
--

CREATE TABLE `variation_option` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variation_option`
--

INSERT INTO `variation_option` (`id`, `value`) VALUES
(601, 'Bìa cứng'),
(602, 'PDF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_review`
--
ALTER TABLE `customer_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ordered_product_id` (`ordered_product_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `shop_order_id` (`shop_order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `variation_option_id` (`variation_option_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_item`
--
ALTER TABLE `promotion_item`
  ADD KEY `promotion_id` (`promotion_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_method_id` (`payment_method_id`),
  ADD KEY `shipping_address` (`shipping_address`),
  ADD KEY `shipping_method` (`shipping_method`),
  ADD KEY `order_status` (`order_status`);

--
-- Indexes for table `site_user`
--
ALTER TABLE `site_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indexes for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_user`
--
ALTER TABLE `site_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_review`
--
ALTER TABLE `customer_review`
  ADD CONSTRAINT `customer_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`),
  ADD CONSTRAINT `customer_review_ibfk_2` FOREIGN KEY (`ordered_product_id`) REFERENCES `order_line` (`id`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`shop_order_id`) REFERENCES `shop_order` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`id`);

--
-- Constraints for table `promotion_item`
--
ALTER TABLE `promotion_item`
  ADD CONSTRAINT `promotion_item_ibfk_1` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `promotion_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`);

--
-- Constraints for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD CONSTRAINT `shopping_cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`id`),
  ADD CONSTRAINT `shopping_cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `shop_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`),
  ADD CONSTRAINT `shop_order_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `user_payment_method` (`id`),
  ADD CONSTRAINT `shop_order_ibfk_3` FOREIGN KEY (`shipping_address`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `shop_order_ibfk_4` FOREIGN KEY (`shipping_method`) REFERENCES `shipping_method` (`id`),
  ADD CONSTRAINT `shop_order_ibfk_5` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`),
  ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD CONSTRAINT `user_payment_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
