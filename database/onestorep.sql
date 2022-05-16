SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS onestorep;
USE onestorep;

--
-- USER table
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
    `account_id` INT(64) NOT NULL AUTO_INCREMENT,
    `email` varchar(64) NOT NULL,
    `password` varchar(255) NOT NULL,
    `company_name` varchar(64) NOT NULL,
    `contact_number` varchar(64) NOT NULL,
    `role` varchar(64) NOT NULL,
    PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account_id`, `email`, `password`, `company_name`, `contact_number`, `role`) VALUES
(1, 'jonathan@hotmail.com', '$2y$10$Rl/oB5F3akExDoS3QMjp8.tMP.eBroWvD4U8GJigjjTXzmeraBn9S', 'Nike', '12345678', 'user'),
(2, 'ryan@hotmail.com', '$2y$10$Rl/oB5F3akExDoS3QMjp8.tMP.eBroWvD4U8GJigjjTXzmeraBn9S', 'New Era', '12345678', 'user'),
(3, 'dylan@hotmail.com', '$2y$10$Rl/oB5F3akExDoS3QMjp8.tMP.eBroWvD4U8GJigjjTXzmeraBn9S', 'Adidas', '12345678', 'user');

COMMIT;

--
-- INVENTORY table
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
    `product_id` INT(64) NOT NULL AUTO_INCREMENT,
    `account_id` INT(64) NOT NULL,
    `product_name` varchar(64) NOT NULL,
    `product_brand` varchar(64) NOT NULL,
    `product_type` varchar(64) NOT NULL,
    `product_colour` varchar(64) NOT NULL,
    `product_size` varchar(64) NOT NULL,
    `product_weight` varchar(64) NOT NULL,
    `product_dimension` varchar(64) NOT NULL,
    `stored_date` varchar(64) NOT NULL,
    `arranged_date` varchar(64), 
    `sent_date` varchar(64),
    `status` varchar(64) NOT NULL,
    PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `account_id`, `product_name`, `product_brand`, `product_type`, `product_colour`, `product_size`, `product_weight`, `product_dimension`, `stored_date`, `arranged_date`, `sent_date`, `status`) VALUES
(1, 2, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', '2021-03-01', '2021-03-03', 'sent'),
(2, 2, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', '2021-03-01', '2021-03-03', 'sent'),
(3, 2, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', '2021-03-01', null, 'arranged'),
(4, 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', '2021-03-01', null, 'arranged'),
(5, 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', null, null, 'stored'),
(6, 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', null, null, 'stored'),
(7, 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', null, null, 'stored'),
(8, 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', null, null, 'stored'),
(9, 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', null, null, 'stored'),
(10, 3, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01', null, null, 'stored'),
(11, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '9.5', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(12, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '9.5', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(13, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '9.5', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(14, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '10', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(15, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '10', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(16, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '10', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(17, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '11', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(18, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '11', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(19, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '11', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(20, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '12', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(21, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '12', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(22, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '12', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(23, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '13', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(24, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '13', '1', '30x30x30', '2021-02-01', null, null, 'stored'),
(25, 2, 'Nike Shoe', 'New Era', 'cap', 'black', '13', '1', '30x30x30', '2021-02-01', null, null, 'stored');

COMMIT;


--
-- ADMIN table
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
    `account_id` INT(64) NOT NULL AUTO_INCREMENT,
    `email` varchar(64) NOT NULL,
    `password` varchar(255) NOT NULL,
    `user_name` varchar(64) NOT NULL,
    `role` varchar(64) NOT NULL,
    PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`account_id`, `email`, `password`, `user_name`, `role`) VALUES
(1, 'vivian@hotmail.com', '$2y$10$Rl/oB5F3akExDoS3QMjp8.tMP.eBroWvD4U8GJigjjTXzmeraBn9S', 'Vivian', 'admin'),
(2, 'cherwee@hotmail.com', '$2y$10$Rl/oB5F3akExDoS3QMjp8.tMP.eBroWvD4U8GJigjjTXzmeraBn9S', 'Cher Wee', 'admin'),
(3, 'benson@hotmail.com', '$2y$10$Rl/oB5F3akExDoS3QMjp8.tMP.eBroWvD4U8GJigjjTXzmeraBn9S', 'Benson', 'admin');

COMMIT;

--
-- Orders table
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` INT(64) NOT NULL AUTO_INCREMENT,
    `account_id` INT(64) NOT NULL,
    `product_id` INT(64) NOT NULL,
    `product_name` varchar(64) NOT NULL,
    `product_brand` varchar(64) NOT NULL,
    `product_type` varchar(64) NOT NULL,
    `product_colour` varchar(64) NOT NULL,
    `product_size` varchar(64) NOT NULL,
    `product_weight` varchar(64) NOT NULL,
    `product_dimension` varchar(64) NOT NULL,
    `address1` varchar(64) NOT NULL,
    `address2` varchar(64),
    `postal_code` varchar(64) NOT NULL,
    `unit_number` varchar(64) NOT NULL,
    `customer_name` varchar(64) NOT NULL,
    `customer_contact` varchar(64) NOT NULL,
    PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id` ,`account_id`, `product_id`, `product_name`, `product_brand`, `product_type`, `product_colour`, `product_size`, `product_weight`, `product_dimension`, `address1`, `address2`, `postal_code`, `unit_number`, `customer_name`, `customer_contact`) VALUES
(1, 1, 11, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '107 Towner Road', null, '321107', '#01-01', 'Jonathan', '91187877'),
(2, 1, 12, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '107 Towner Road', null, '321107', '#01-01', 'Jonathan', '91187877'),
(3, 1, 13, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '107 Towner Road', null, '321107', '#01-01', 'Jonathan', '91187877'),
(4, 1, 14, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '107 Towner Road', null, '321107', '#01-01', 'Jonathan', '91187877'),
(5, 1, 15, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '107 Towner Road', null, '321107', '#01-01', 'Jonathan', '91187877');

COMMIT;

--
-- Multiple Orders table
--

DROP TABLE IF EXISTS `multiple_orders`;
CREATE TABLE IF NOT EXISTS `multiple_orders` (
    `order_id` INT(64) NOT NULL AUTO_INCREMENT,
    `account_id` INT(64) NOT NULL,
    `product_name1` varchar(64) NOT NULL,
    `product_quantity1` varchar(64) NOT NULL,
    `product_name2` varchar(64),
    `product_quantity2` varchar(64),
    `product_name3` varchar(64),
    `product_quantity3` varchar(64),
    `product_name4` varchar(64),
    `product_quantity4` varchar(64),
    `product_name5` varchar(64),
    `product_quantity5` varchar(64),
    `product_name6` varchar(64),
    `product_quantity6` varchar(64),
    `product_name7` varchar(64),
    `product_quantity7` varchar(64),
    `product_name8` varchar(64),
    `product_quantity8` varchar(64),
    `product_name9` varchar(64),
    `product_quantity9` varchar(64),
    `product_name10` varchar(64),
    `product_quantity10` varchar(64),
    `address1` varchar(64) NOT NULL,
    `address2` varchar(64),
    `postal_code` varchar(64) NOT NULL,
    `unit_number` varchar(64) NOT NULL,
    `customer_name` varchar(64) NOT NULL,
    `customer_contact` varchar(64) NOT NULL,
    `order_status` varchar(64) NOT NULL,
    `arranged_date` varchar(64) NOT NULL,
    `sent_date` varchar(64) NOT NULL,
    PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `multiple_orders` (`order_id` ,`account_id`, `product_name1`, `product_quantity1`, `product_name2`
, `product_quantity2`, `product_name3`, `product_quantity3`, `product_name4`, `product_quantity4`, `product_name5`, `product_quantity5` , `product_name6`
, `product_quantity6`, `product_name7`, `product_quantity7`, `product_name8`, `product_quantity8`, `product_name9`, `product_quantity9`, `product_name10`, `product_quantity10`
, `address1`, `address2`, `postal_code`, `unit_number`, `customer_name`, `customer_contact`, `order_status`, `arranged_date`, `sent_date`) 
VALUES
(1, 2, 'New Era LA CAP (small)', '1', 'New Era LA CAP (free size)', '1', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", '107 Towner Road', "", '321107', '#01-01', 'Jonathan', '91187877', 'sent', '2021-03-01 01:00', '2021-03-02 01:00'),
(2, 2, 'New Era LA CAP (small)', '1', 'New Era LA CAP (free size)', '1', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", '107 Towner Road', "", '321107', '#01-01', 'Jonathan', '91187877', 'sent', '2021-03-01 01:00', '2021-03-02 01:00'),
(3, 2, 'New Era LA CAP (small)', '1', 'New Era LA CAP (free size)', '1', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", '107 Towner Road', "", '321107', '#01-01', 'Jonathan', '91187877', 'sent', '2021-03-01 01:00', '2021-03-02 01:00');
COMMIT;