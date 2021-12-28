CREATE DATABASE IF NOT EXISTS `onestorep` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `onestorep`;

--
-- INVENTORY table
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
    `SKU` int(64) NOT NULL,
    `account_id` int(64) NOT NULL,
    `product_name` varchar(64) NOT NULL,
    `product_brand` varchar(64) NOT NULL,
    `type_of_product` varchar(64) NOT NULL,
    `product_colour` varchar(64) NOT NULL,
    `product_size` varchar(64) NOT NULL,
    `product_weight` varchar(64) NOT NULL,
    `dimension` varchar(64) NOT NULL,
    `stored_date` datetime(64) NOT NULL,
    `sent_date` datetime(64),
    `delivered_date` datetime(64),
    `status` varchar(64) NOT NULL,
    PRIMARY KEY (`SKU`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`SKU`, `account_id`, `product_name`, `product_brand`, `type_of_product`, `product_colour`, `product_size`, `product_weight`, `dimension`, `stored_date`, `sent_date`, `delivered_date`, `status`) VALUES
(12345678912, '2', 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '2021-03-03 00:00:00', 'delivered'),
(12345678913, '2', 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '2021-03-03 00:00:00', 'delivered'),
(12345678911, '2', 'New Era LA CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '', 'sent'),
(12345678922, '2', 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '2021-03-01 00:00:00', '', 'sent'),
(12345678923, '2', 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'store'),
(12345678924, '2', 'New Era NY CAP', 'New Era', 'cap', 'black', 'free size', '0.5', '30x30x30', '2021-02-01 00:00:00', '', '', 'store');

COMMIT;