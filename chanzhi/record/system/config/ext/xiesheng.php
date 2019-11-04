<?php
if(!defined('TABLE_XS_CAR'))      define('TABLE_XS_CAR', '`xs_car`');
if(!defined('TABLE_XS_DRIVER'))   define('TABLE_XS_DRIVER', '`xs_driver`');
if(!defined('TABLE_XS_RECORD'))   define('TABLE_XS_RECORD', '`xs_record`');
if(!defined('TABLE_XS_CUSTOMER')) define('TABLE_XS_CUSTOMER', '`xs_customer`');

if(RUN_MODE != 'front')
{
    $config->menus->record = 'record,customer,car,driver';

    foreach($config->menus as $group => $modules)
    {
        $menus = explode(',', $modules);
        foreach($menus as $menu)
        {
            if($menu) $config->menuGroups->$menu = $group;
        }
    }

}
$config->rights->guest['record']['admin']  = 'admin';
$config->rights->guest['inside']['browse'] = 'browse';

$config->rights->member['record']['edit']     = 'edit';
$config->rights->member['record']['view']     = 'view';
$config->rights->member['record']['admin']    = 'admin';
$config->rights->member['record']['browse']   = 'browse';
$config->rights->member['record']['create']   = 'create';
$config->rights->member['record']['confirm']  = 'confirm';
$config->rights->member['record']['finish']   = 'finish';
$config->rights->member['record']['assignTo'] = 'assignTo';
$config->rights->member['inside']['browse']   = 'browse';
