# notes
simple mini system that i do cuz i'm bored
# query
CREATE TABLE `users` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,.
	`uniqid` INT(100) NOT NULL,
	`usertype` INT(10) NULL DEFAULT NULL,
	`username` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`password` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	primary key(`id`)
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=INNODB
;

CREATE TABLE `tblPersonalData` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`uniqid` INT(100) NOT NULL,
	`username` VARCHAR(255) NULL DEFAULT NULL,
	`fname` VARCHAR(255) NULL DEFAULT NULL,
	`mname` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`lname` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`fullname` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`gender` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	primary key(`id`)
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=INNODB
;
