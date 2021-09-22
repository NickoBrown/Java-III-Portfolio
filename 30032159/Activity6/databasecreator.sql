CREATE DATABASE IF NOT EXISTS `User`;
USE `User`;
CREATE TABLE IF NOT EXISTS `UserList` (   `firstname` varchar(100) NOT NULL DEFAULT '',   `lastname` varchar(100) NOT NULL DEFAULT '',   `email` varchar(100) NOT NULL DEFAULT '',   `id` INT AUTO_INCREMENT NOT NULL,    primary key (id) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;