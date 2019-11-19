ALTER TABLE `xs_invoice` ADD `companyID` MEDIUMINT(8) NOT NULL default '0' AFTER `money`;
ALTER TABLE `xs_income` ADD `companyID` MEDIUMINT(8) NOT NULL default '0' AFTER `money`;
ALTER TABLE `xs_outlay` ADD `companyID` MEDIUMINT(8) NOT NULL default '0' AFTER `money`;
