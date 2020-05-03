<?php
$config->insurance = new stdClass();
$config->insurance->require = new stdClass();
$config->insurance->require->edit   = 'company,type,total,carNumber,startDate,endDate';
$config->insurance->require->create = 'company,type,total,carNumber,startDate,endDate';
