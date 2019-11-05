DROP TABLE IF EXISTS `xs_income`;
CREATE TABLE `xs_income` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `type` enum('enterprise','individual') NOT NULL DEFAULT 'enterprise',
    `name` char(50) NOT NULL,
    `money` decimal(8,2) NOT NULL default 0.00,
    `invoiceID` mediumint(8) NOT NULL default '0',
    `createDate` datetime NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` char(30) NOT NULL default '',
    `remark` text NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xs_outlay`;
CREATE TABLE `xs_outlay` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `type` char(50) NOT NULL,
    `money` decimal(8,2) NOT NULL default 0.00,
    `driverID` mediumint(8) NOT NULL default '0',
    `createDate` datetime NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` char(30) NOT NULL default '',
    `remark` text NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xs_invoice`;
CREATE TABLE `xs_invoice` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `customerID` mediumint(8) NOT NULL default '0',
    `type` char(50) NOT NULL,
    `number` char(30) NOT NULL,
    `money` decimal(8,2) NOT NULL default 0.00,
    `createDate` datetime NOT NULL,
    `addedDate` datetime NOT NULL,
    `addedBy` char(30) NOT NULL default '',
    `remark` text NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
