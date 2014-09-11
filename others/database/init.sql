DROP DATABASE IF EXISTS `project`;
CREATE DATABASE  `project`;

USE `project`;

DROP USER 'dev'@'localhost';
GRANT ALL PRIVILEGES ON  `project`.* TO  'dev'@'localhost' IDENTIFIED BY  'project';