<?php
if(!defined('TABLE_XS_CAR'))       define('TABLE_XS_CAR', '`xs_car`');
if(!defined('TABLE_XS_DRIVER'))    define('TABLE_XS_DRIVER', '`xs_driver`');
if(!defined('TABLE_XS_RECORD'))    define('TABLE_XS_RECORD', '`xs_record`');
if(!defined('TABLE_XS_CUSTOMER'))  define('TABLE_XS_CUSTOMER', '`xs_customer`');
// upgrade v1.1
if(!defined('TABLE_XS_VIOLATION'))   define('TABLE_XS_VIOLATION', '`xs_violation`');
if(!defined('TABLE_XS_MAINTENANCE')) define('TABLE_XS_MAINTENANCE', '`xs_maintenance`');
//upgrade v1.2
if(!defined('TABLE_XS_INSURANCE')) define('TABLE_XS_INSURANCE', '`xs_insurance`');

if(RUN_MODE != 'front')
{
    $config->menus->record = 'record,customer,car,driver,violation,maintenance,insurance';

    foreach($config->menus as $group => $modules)
    {
        $menus = explode(',', $modules);
        foreach($menus as $menu)
        {
            if($menu) $config->menuGroups->$menu = $group;
        }
    }

}
/** guest **/
$config->rights->guest['record']['admin']  = 'admin';
$config->rights->guest['inside']['browse'] = 'browse';

/** member **/
$config->rights->member['inside']['browse'] = 'browse';

$config->rights->member['car']['admin']  = 'admin';
$config->rights->member['car']['browse'] = 'browse';

$config->rights->member['violation']['browse'] = 'browse';

$config->rights->member['maintenance']['edit']   = 'edit';
$config->rights->member['maintenance']['view']   = 'view';
$config->rights->member['maintenance']['create'] = 'create';
$config->rights->member['maintenance']['browse'] = 'browse';

$config->rights->member['insurance']['edit']   = 'edit';
$config->rights->member['insurance']['create'] = 'create';
$config->rights->member['insurance']['browse'] = 'browse';

$config->rights->member['record']['edit']     = 'edit';
$config->rights->member['record']['view']     = 'view';
$config->rights->member['record']['admin']    = 'admin';
$config->rights->member['record']['browse']   = 'browse';
$config->rights->member['record']['create']   = 'create';
$config->rights->member['record']['confirm']  = 'confirm';
$config->rights->member['record']['finish']   = 'finish';
$config->rights->member['record']['assignTo'] = 'assignTo';
