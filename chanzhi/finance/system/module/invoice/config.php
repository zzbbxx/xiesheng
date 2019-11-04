<?php
$config->invoice = new stdClass();
$config->invoice->require = new stdClass();
$config->invoice->require->edit   = 'number,money';
$config->invoice->require->create = 'number,money';
