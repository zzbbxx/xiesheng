DROP TABLE IF EXISTS `xs_insurance`;
CREATE TABLE `xs_insurance` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `carNumber` char(12) NOT NULL default '',
    `company` char(120) NOT NULL default '',
    `type` char(30) NOT NULL,
    `total` decimal(8,2) NOT NULL default 0.00,
    `content` text NOT NULL,
    `addedDate` datetime NOT NULL,
    `startDate` date NOT NULL,
    `endDate` date NOT NULL,
    `addedBy` char(30) NOT NULL default '',
    `remark` text NOT NULL,
    `lang` char(30) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
