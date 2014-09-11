USE `project`;

DROP TABLE IF EXISTS `tracking`;
DROP TABLE IF EXISTS `tagging`;

CREATE TABLE `tagging` (
    `tag` VARCHAR(25) NOT NULL,
    `date` DATETIME NOT NULL,
    `ip` varchar(15) NOT NULL,
    `pseudo` varchar(30),
    PRIMARY KEY (`tag`)
);

CREATE TABLE `tracking` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `tag` VARCHAR(25) NOT NULL,
    `date` DATETIME NOT NULL,
    `action` varchar(256) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`tag`) REFERENCES `tagging`(`tag`)
);