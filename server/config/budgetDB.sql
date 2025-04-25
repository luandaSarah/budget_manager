DROP DATABASE IF EXISTS budgetDB;
CREATE DATABASE budgetDB;
SET default_storage_engine=InnoDB;
USE budgetDB;

CREATE TABLE users(
	`id` INT  UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`firstName` VARCHAR(255) NOT NULL,
	`lastName` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL UNIQUE,
	`password`  VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE categories(
	`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE activities(
	`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `type` ENUM('depense', 'recette') NOT NULL,
    `userId` INT UNSIGNED NOT NULL,
    `categorieId` INT UNSIGNED NOT NULL,
    `createdAt` INT UNSIGNED NOT NULL
);

ALTER TABLE activities
ADD CONSTRAINT FK_ActivitiesCategorieId_CategoriesId
FOREIGN KEY (categorieId) REFERENCES categories(id);

ALTER TABLE activities
ADD CONSTRAINT FK_ActivitiesUserId_UsersId
FOREIGN KEY (userId) REFERENCES users(id);

