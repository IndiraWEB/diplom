<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-11-18 09:27:58 --> 404 Page Not Found: Faviconico/action_index
ERROR - 2015-11-18 09:27:58 --> 404 Page Not Found: Faviconico/action_index
ERROR - 2015-11-18 09:28:15 --> Query error: No database selected - Invalid query: CREATE TABLE IF NOT EXISTS `users` (
	`user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(255) NOT NULL,
	`user_password` VARCHAR(64) NOT NULL,
	CONSTRAINT `pk_users` PRIMARY KEY(`user_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2015-11-18 09:28:15 --> Query error: No database selected - Invalid query: CREATE TABLE IF NOT EXISTS `components` (
	`component_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`component_name` VARCHAR(100) NOT NULL,
	`component_version` VARCHAR(5) NOT NULL,
	CONSTRAINT `pk_components` PRIMARY KEY(`component_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2015-11-18 09:28:15 --> Query error: No database selected - Invalid query: INSERT INTO `users` (`user_name`, `user_password`) VALUES ('admin', '$2y$10$RRHKVXKXk4TT7C7Jak..wOYOJzorGtrq19Z5AE4q7ij1NbecvbfgG')
ERROR - 2015-11-18 09:28:15 --> Query error: No database selected - Invalid query: CREATE TABLE IF NOT EXISTS `users` (
	`user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(255) NOT NULL,
	`user_password` VARCHAR(64) NOT NULL,
	CONSTRAINT `pk_users` PRIMARY KEY(`user_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2015-11-18 09:28:15 --> Query error: No database selected - Invalid query: CREATE TABLE IF NOT EXISTS `components` (
	`component_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`component_name` VARCHAR(100) NOT NULL,
	`component_version` VARCHAR(5) NOT NULL,
	CONSTRAINT `pk_components` PRIMARY KEY(`component_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2015-11-18 09:28:15 --> Query error: No database selected - Invalid query: INSERT INTO `users` (`user_name`, `user_password`) VALUES ('admin', '$2y$10$vVOVtdn.pg7kJLMr4lZ7jehCgRTmN1l8QXKTZ5DIYU8H9OLR3B0ZK')
ERROR - 2015-11-18 09:28:25 --> 404 Page Not Found: Assets/action_img
ERROR - 2015-11-18 09:28:37 --> Query error: No database selected - Invalid query: SELECT *
FROM `users`
WHERE `user_name` = 'admin'
ERROR - 2015-11-18 09:30:08 --> 404 Page Not Found: Assets/action_img
ERROR - 2015-11-18 09:33:37 --> Severity: Warning --> mysqli::real_connect() [<a href='mysqli.real-connect'>mysqli.real-connect</a>]: (42000/1049): Unknown database 'users' S:\home\kazatu.portal.dev\www\system\database\drivers\mysqli\mysqli_driver.php 135
ERROR - 2015-11-18 09:33:37 --> Unable to connect to the database
ERROR - 2015-11-18 09:34:07 --> 404 Page Not Found: Assets/action_img
