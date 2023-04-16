CREATE TABLE `site_user` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `email` varchar(255),
  `phone_number` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `user_address` (
  `user_id` integer,
  `address_id` integer,
  `is_default` boolean
);

CREATE TABLE `address` (
  `id` integer PRIMARY KEY,
  `province` varchar(255),
  `district` varchar(255),
  `street` varchar(255),
  `home_number` integer
);

CREATE TABLE `payment_type` (
  `id` integer PRIMARY KEY,
  `value` string
);

CREATE TABLE `user_payment_method` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `payment_type_id` integer,
  `provider` string,
  `account_number` integer,
  `expiry_date` date,
  `is_default` boolean
);

CREATE TABLE `product_category` (
  `id` integer PRIMARY KEY,
  `category_name` varchar(255)
);

CREATE TABLE `product` (
  `id` integer PRIMARY KEY,
  `category_id` integer,
  `variation_option_id` integer,
  `product_name` varchar(255),
  `price` double,
  `description` text,
  `product_image` text
);

CREATE TABLE `variation_option` (
  `id` integer PRIMARY KEY,
  `value` varchar(255)
);

CREATE TABLE `shopping_cart` (
  `id` integer PRIMARY KEY,
  `user_id` integer
);

CREATE TABLE `shopping_cart_item` (
  `id` integer PRIMARY KEY,
  `cart_id` integer,
  `product_id` integer,
  `qty` integer
);

CREATE TABLE `shop_order` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `order_date` date,
  `payment_method_id` integer,
  `shipping_address` integer,
  `shipping_method` integer,
  `order_total` double,
  `order_status` integer
);

CREATE TABLE `order_line` (
  `id` integer PRIMARY KEY,
  `product_id` integer,
  `shop_order_id` integer,
  `qty` integer,
  `price` double
);

CREATE TABLE `shipping_method` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `price` double
);

CREATE TABLE `order_status` (
  `id` integer PRIMARY KEY,
  `status` integer
);

CREATE TABLE `customer_review` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `ordered_product_id` integer,
  `rating_value` integer,
  `comment` text
);

CREATE TABLE `promotion` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `description` text,
  `discout_rate` double,
  `start_date` date,
  `end_date` date
);

CREATE TABLE `promotion_item` (
  `item_id` integer,
  `promotion_id` integer
);

ALTER TABLE `user_address` ADD FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`);

ALTER TABLE `user_address` ADD FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

ALTER TABLE `user_payment_method` ADD FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`);

ALTER TABLE `user_payment_method` ADD FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`id`);

ALTER TABLE `shopping_cart_item` ADD FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`id`);

ALTER TABLE `shopping_cart_item` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `shopping_cart` ADD FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`);

ALTER TABLE `shop_order` ADD FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`);

ALTER TABLE `shop_order` ADD FOREIGN KEY (`payment_method_id`) REFERENCES `user_payment_method` (`id`);

ALTER TABLE `shop_order` ADD FOREIGN KEY (`shipping_address`) REFERENCES `address` (`id`);

ALTER TABLE `shop_order` ADD FOREIGN KEY (`shipping_method`) REFERENCES `shipping_method` (`id`);

ALTER TABLE `shop_order` ADD FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`);

ALTER TABLE `customer_review` ADD FOREIGN KEY (`user_id`) REFERENCES `site_user` (`id`);

ALTER TABLE `customer_review` ADD FOREIGN KEY (`ordered_product_id`) REFERENCES `order_line` (`id`);

ALTER TABLE `promotion_item` ADD FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`);

ALTER TABLE `promotion_item` ADD FOREIGN KEY (`item_id`) REFERENCES `product` (`id`);
