<?php
if(!defined('TABLE_XS_INCOME'))  define('TABLE_XS_INCOME', '`xs_income`');
if(!defined('TABLE_XS_OUTLAY'))  define('TABLE_XS_OUTLAY', '`xs_outlay`');
if(!defined('TABLE_XS_INVOICE')) define('TABLE_XS_INVOICE', '`xs_invoice`');

if(RUN_MODE != 'front')
{
    $config->menus->record .= ',finance,income,outlay,invoice';

    foreach($config->menus as $group => $modules)
    {
        $menus = explode(',', $modules);
        foreach($menus as $menu)
        {
            if($menu) $config->menuGroups->$menu = $group;
        }
    }
}


$config->rights->guest['finance']['browse'] = 'browse';

$config->rights->guest['invoice']['view']   = 'view';
$config->rights->guest['invoice']['browse'] = 'browse';
$config->rights->guest['invoice']['create'] = 'create';
$config->rights->guest['invoice']['edit']   = 'edit';


$config->rights->member['finance']['browse'] = 'browse';
$config->rights->member['invoice']['browse'] = 'browse';
$config->rights->member['income']['browse'] = 'browse';
$config->rights->member['outlay']['browse'] = 'browse';
