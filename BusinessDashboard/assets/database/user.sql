SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `onestorep` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `onestorep`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account_id`, `email`, `password`, `company_name`) VALUES
(1, 'jonathan@hotmail.com', '0000', 'Nike'),
(2, 'ryan@hotmail.com', '0000', 'New Era');

COMMIT;