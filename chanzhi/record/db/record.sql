DROP TABLE IF EXISTS `xs_record`;
CREATE TABLE `xs_record` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `customerID` mediumint(8) NOT NULL,
    `driverID` mediumint(8) NOT NULL,
    `carID` mediumint(8) NOT NULL,
    `beginDate` datetime NOT NULL,
    `finishDate` datetime NOT NULL,
    `route` text NOT NUll,
    `distance` smallint(5) unsigned NOT NULL default 0,
    `tolls` decimal(8,2) NOT NULL default 0.00,
    `parking` decimal(8,2) NOT NULL default 0.00,
    `meal` decimal(8,2) NOT NULL default 0.00,
    `hotel` decimal(8,2) NOT NULL default 0.00,
    `remark` text NOT NULL,
    `status` varchar(20) NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` datetime NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xs_customer`;
CREATE TABLE `xs_customer` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `name` char(50) NOT NULL,
    `abbreviation` char(50) NOT NULL,
    `address` text NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` datetime NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xs_car`;
CREATE TABLE `xs_car` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `plate` char(20) NOT NULL,
    `type` char(20) NOT NULL,
    `limit` smallint(5) unsigned NOT NULL default 0,
    `character` char(20) NOT NULL,
    `owner` char(50) NOT NULL,
    `VIN` char(50) NOT NULL,
    `engine` char(50) NOT NULL,
    `model` char(50) NOT NULL,
    `address` text NOT NULL,
    `registerDate` date NOT NULL,
    `issueDate` date  NOT NULL,
    `expiryDate` date NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` datetime NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xs_driver`;
CREATE TABLE `xs_driver` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `userID` mediumint(8) NOT NULL,
    `number` char(50) NOT NULL,
    `archives` char(50) NOT NULL,
    `name` char(30) NOT NULL,
    `sex` char(10) NOT NULL,
    `class` char(10) NOT NULL,
    `address` text NOT NULL,
    `birthDate` date NOT NULL,
    `firstDate` date NOT NULL,
    `expiryDate` date NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` datetime NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
