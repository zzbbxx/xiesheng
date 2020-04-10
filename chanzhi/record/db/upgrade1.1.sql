DROP TABLE IF EXISTS `xs_violation`;
CREATE TABLE `xs_violation` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `carID` mediumint(8) unsigned NOT NULL default '0',
    `driverID` mediumint(8) unsigned NOT NULL default '0',
    `money` decimal(8,2) NOT NULL default 0.00,
    `number` char(30) NOT NULL,
    `status` varchar(20) NOT NULL DEFAULT 'processed',
    `addedDate` datetime NOT NULL,
    `addedBy` char(30) NOT NULL default '',
    `remark` text NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xs_maintenance`;
CREATE TABLE `xs_maintenance` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `carID` mediumint(8) unsigned NOT NULL default '0',
    `driverID` mediumint(8) unsigned NOT NULL default '0',
    `type` char(30) NOT NULL,
    `mileage` mediumint(8) unsigned NOT NULL default '0',
    `nextMileage` mediumint(8) unsigned NOT NULL default '0',
    `money` decimal(8,2) NOT NULL default 0.00,
    `content` text NOT NULL,
    `location` text NOT NULL,
    `addedDate` datetime NOT NULL,
    `createdDate` date NOT NULL,
    `addedBy` char(30) NOT NULL default '',
    `remark` text NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
