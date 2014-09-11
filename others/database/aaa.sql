DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
    `login` VARCHAR(30) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`login`)
);

INSERT INTO `account` VALUES (
    'admin',
    'admin'
);
