<?php
$lang->menu->finance = '财务|income|browse|';

/* Menu of income module. */
if(!isset($lang->income)) $lang->income = new stdclass();
$lang->income->menu = new stdclass();
$lang->income->menu->income = '收入|income|browse|';
$lang->income->menu->outlay = '支出|outlay|browse|';
$lang->income->menu->invoice= '发票|invoice|browse|';

/* Menu of outlay module. */
if(!isset($lang->outlay)) $lang->outlay = new stdclass();
$lang->outlay->menu = new stdclass();
$lang->outlay->menu->income = '收入|income|browse|';
$lang->outlay->menu->outlay = '支出|outlay|browse|';
$lang->outlay->menu->invoice= '发票|invoice|browse|';

/* Menu of outlay module. */
if(!isset($lang->invoice)) $lang->invoice = new stdclass();
$lang->invoice->menu = new stdclass();
$lang->invoice->menu->income = '收入|income|browse|';
$lang->invoice->menu->outlay = '支出|outlay|browse|';
$lang->invoice->menu->invoice= '发票|invoice|browse|';
