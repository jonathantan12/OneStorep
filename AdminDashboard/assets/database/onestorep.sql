SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- USER table
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
    `account_id` INT(64) NOT NULL AUTO_INCREMENT,
    `email` varchar(64) NOT NULL,
    `password` varchar(64) NOT NULL,
    `company_name` varchar(64) NOT NULL,
    PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account_id`, `email`, `password`, `company_name`) VALUES
(1, 'jonathan@hotmail.com', '0000', 'Nike'),
(2, 'ryan@hotmail.com', '0000', 'New Era'),
(3, 'dylan@hotmail.com', '0000', 'Adidas');

COMMIT;

--
-- INVENTORY table
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
    `sku` varchar(64) NOT NULL,
    `account_id` INT(64) NOT NULL,
    `product_name` varchar(64) NOT NULL,
    `product_brand` varchar(64) NOT NULL,
    `product_type` varchar(64) NOT NULL,
    `product_colour` varchar(64) NOT NULL,
    `product_size` varchar(64) NOT NULL,
    `product_weight` varchar(64) NOT NULL,
    `product_dimension` varchar(64) NOT NULL,
    `stored_date` datetime NOT NULL,
    `sent_date` datetime,
    `delivered_date` datetime,
    `status` varchar(64) NOT NULL,
    PRIMARY KEY (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`sku`, `account_id`, `product_name`, `product_brand`, `product_type`, `product_colour`, `product_size`, `product_weight`, `product_dimension`, `stored_date`, `sent_date`, `delivered_date`, `status`) VALUES
('12345678912', 2, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '2021-03-03 00:00:00', 'delivered'),
('12345678913', 2, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '2021-03-03 00:00:00', 'delivered'),
('12345678911', 2, 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '', 'sent'),
('12345678922', 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '', 'sent'),
('12345678923', 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'stored'),
('12345678924', 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'stored'),
('12345678928', 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'stored'),
('12345678925', 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'stored'),
('12345678926', 2, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'stored'),
('12345678927', 3, 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'stored');

COMMIT;