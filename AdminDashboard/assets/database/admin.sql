SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `onestorep` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `onestorep`;

--
-- USER table
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
    `account_id` INT(64) NOT NULL AUTO_INCREMENT,
    `email` varchar(64) NOT NULL,
    `password` varchar(64) NOT NULL,
    `user_name` varchar(64) NOT NULL,
    PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `admin` (`account_id`, `email`, `password`, `user_name`) VALUES
(1, 'vivian@hotmail.com', '0000', 'Vivian'),
(2, 'cherwee@hotmail.com', '0000', 'Cher Wee'),
(3, 'benson@hotmail.com', '0000', 'Benson');

COMMIT;