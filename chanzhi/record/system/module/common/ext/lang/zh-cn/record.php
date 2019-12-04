<?php
$lang->groups->record = array('title' => '协盛', 'link' => 'record|browse|', 'icon' => 'home');

$lang->menu->record   = '行驶记录|record|browse|';
$lang->menu->customer = '客户管理|customer|browse|';
$lang->menu->car      = '车辆管理|car|browse|';
$lang->menu->driver   = '驾驶员管理|driver|browse|';

/* Menu of car module. */
if(!isset($lang->car)) $lang->car = new stdclass();
$lang->car->menu = new stdclass();
$lang->car->menu->info        = '车辆信息|car|browse|';
$lang->car->menu->violation   = '违章|violation|browse|';
$lang->car->menu->review      = '待审车辆|car|review|';
$lang->car->menu->maintenance = '保养维修|maintenance|browse|';
$lang->car->menu->refuel      = '加油卡|car|refuel|';

/* Menu of violation module. */
if(!isset($lang->violation)) $lang->violation = new stdclass();
$lang->violation->menu = new stdclass();
$lang->violation->menu->info        = '车辆信息|car|browse|';
$lang->violation->menu->violation   = '违章|violation|browse|';
$lang->violation->menu->review      = '待审车辆|car|review|';
$lang->violation->menu->maintenance = '保养维修|maintenance|browse|';
$lang->violation->menu->refuel      = '加油卡|car|refuel|';

/* Menu of maintenance module. */
$lang->maintenance = new stdclass();
$lang->maintenance->menu = new stdclass();
$lang->maintenance->menu->info        = '车辆信息|car|browse|';
$lang->maintenance->menu->violation   = '违章|violation|browse|';
$lang->maintenance->menu->review      = '待审车辆|car|review|';
$lang->maintenance->menu->maintenance = '保养维修|maintenance|browse|';
$lang->maintenance->menu->refuel      = '加油卡|car|refuel|';
