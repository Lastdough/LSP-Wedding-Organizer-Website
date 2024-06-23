-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lsp_wedding_db
-- ------------------------------------------------------
-- Server version 5.5.5-10.4.28-MariaDB

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `version` varchar(255) NOT NULL,
    `class` varchar(255) NOT NULL,
    `group` varchar(255) NOT NULL,
    `namespace` varchar(255) NOT NULL,
    `time` int(11) NOT NULL,
    `batch` int(11) unsigned NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(80) NOT NULL,
    `username` varchar(30) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role` enum('admin', 'user') NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Table structure for table `wedding_packages`
--

DROP TABLE IF EXISTS `wedding_packages`;

CREATE TABLE `wedding_packages` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `image` mediumblob DEFAULT NULL,
    `package_name` varchar(80) NOT NULL,
    `description` mediumtext NOT NULL,
    `price` int(11) NOT NULL,
    `capacity` int(11) NOT NULL,
    `status_publish` enum('publish', 'draft') NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `wedding_packages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `package_id` int(11) NOT NULL,
    `name` varchar(80) NOT NULL,
    `email` varchar(80) NOT NULL,
    `phone_number` varchar(30) NOT NULL,
    `number_of_guests` int(11) NOT NULL,
    `wedding_date` date NOT NULL,
    `status` enum(
        'requested',
        'approved',
        'rejected'
    ) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `package_id` (`package_id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `wedding_packages` (`id`),
    CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `website_name` varchar(80) NOT NULL,
    `phone_number1` varchar(15) NOT NULL,
    `phone_number2` varchar(15) DEFAULT NULL,
    `email1` varchar(80) NOT NULL,
    `email2` varchar(80) DEFAULT NULL,
    `address` text NOT NULL,
    `maps` text DEFAULT NULL,
    `logo` varchar(80) NOT NULL,
    `facebook_url` varchar(128) DEFAULT NULL,
    `instagram_url` varchar(128) DEFAULT NULL,
    `youtube_url` varchar(128) DEFAULT NULL,
    `header_business_hour` varchar(100) NOT NULL,
    `time_business_hour` text NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- Dumping routines for database 'lsp_wedding_db'

-- Dump completed on 2024-06-22 21:26:57