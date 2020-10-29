CREATE TABLE `user` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_type` varchar(20),
  `first_name` varchar(50),
  `last_name` varchar(50),
  `email` varchar(50),
  `phone` varchar(20),
  `password` varchar(50),
  `address` text
);

CREATE TABLE `item` (
  `item_id` int PRIMARY KEY AUTO_INCREMENT,
  `item_name` varchar(255),
  `item_price` int,
  `color` varchar(30),
  `size` varchar(10),
  `item_status` varchar(30)
);

CREATE TABLE `cart` (
  `cart_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `item_id` int,
  `quantity` int
);

CREATE TABLE `order` (
  `order_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `order_name` varchar(50),
  `order_address` text,
  `order_phone` varchar(20),
  `total_price` int,
  `order_status` varchar(255)
);

CREATE TABLE `order_item` (
  `order_item_id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `item_id` int,
  `quantity` int
);

CREATE TABLE `store` (
  `store_id` int PRIMARY KEY AUTO_INCREMENT,
  `longitude` varchar(255),
  `latitude` varchar(255),
  `store_address` varchar(255)
);

CREATE TABLE `blog` (
  `blog_id` int PRIMARY KEY AUTO_INCREMENT,
  `title` text,
  `content` text,
  `thumbnail` text
);

ALTER TABLE `order` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

ALTER TABLE `cart` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `cart` ADD FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
