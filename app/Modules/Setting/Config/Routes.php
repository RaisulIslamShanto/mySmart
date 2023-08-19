<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    //Bill Type Setup
    $routes->add('billsetup_add', '\Modules\Setting\Controllers\Settingcontroller::billSetupAdd', ['as' => 'billsetup_add']);
    $routes->add('billsetup_edit/(:any)', '\Modules\Setting\Controllers\Settingcontroller::billSetupEdit/$1', ['as' => 'billsetup_edit']);
    $routes->get('billsetup_delete/(:any)', '\Modules\Setting\Controllers\Settingcontroller::billSetupDelete/$1', ['as' => 'billsetup_delete']);

    //Utility Type Setup
    $routes->add('utility_setup', '\Modules\Setting\Controllers\Settingcontroller::utilitySetup', ['as' => 'utility_setup']);

    //Member Type Setup
    $routes->add('membersetup_add', '\Modules\Setting\Controllers\Settingcontroller::memberSetupAdd', ['as' => 'membersetup_add']);
    $routes->add('membersetup_edit/(:any)', '\Modules\Setting\Controllers\Settingcontroller::memberSetupEdit/$1', ['as' => 'membersetup_edit']);
    $routes->get('membersetup_delete/(:any)', '\Modules\Setting\Controllers\Settingcontroller::memberSetupDelete/$1', ['as' => 'membersetup_delete']);

    //Month Setup
    $routes->add('monthsetup_add', '\Modules\Setting\Controllers\Settingcontroller::monthSetupAdd', ['as' => 'monthsetup_add']);
    $routes->add('monthsetup_edit/(:any)', '\Modules\Setting\Controllers\Settingcontroller::monthSetupEdit/$1', ['as' => 'monthsetup_edit']);
    $routes->get('monthsetup_delete/(:any)', '\Modules\Setting\Controllers\Settingcontroller::monthSetupDelete/$1', ['as' => 'monthsetup_delete']);

    //Notification Setup
    $routes->get('notification_list', '\Modules\Setting\Controllers\Settingcontroller::notificationSetup', ['as' => 'notification_list']);
    $routes->get('notification_edit', '\Modules\Setting\Controllers\Settingcontroller::notificationSetupEdit', ['as' => 'notification_edit']);
    $routes->post('notification_update', '\Modules\Setting\Controllers\Settingcontroller::notificationSetupUpdate',['as' => 'notification_update']);


    
    $routes->match(['get', 'post'],'yearsetup', '\Modules\Setting\Controllers\Settingcontroller::year_setup', ['as' => 'year_setup']);
    $routes->match(['get', 'post'],'yearupdate/(:num)', '\Modules\Setting\Controllers\Settingcontroller::year_update/$1', ['as' => 'year_update']);
    $routes->match(['get', 'post'],'yeardelete/(:num)', '\Modules\Setting\Controllers\Settingcontroller::year_delete/$1', ['as' => 'year_delete']);

    $routes->match(['get', 'post'],'currencysetup', '\Modules\Setting\Controllers\Settingcontroller::currency_setup', ['as' => 'currency_setup']);
    $routes->match(['get', 'post'],'currencyupdate/(:num)', '\Modules\Setting\Controllers\Settingcontroller::currency_update/$1', ['as' => 'currency_update']);
    $routes->match(['get', 'post'],'currencydelete/(:num)', '\Modules\Setting\Controllers\Settingcontroller::currency_delete/$1', ['as' => 'currency_delete']);

    $routes->match(['get', 'post'],'systemsetup','\Modules\Setting\Controllers\Settingcontroller::system_setup', ['as' => 'system_setup']);
    $routes->match(['get', 'post'],'currencysetting','\Modules\Setting\Controllers\Settingcontroller::currency_setting', ['as' => 'currency_setting']);
    $routes->match(['get', 'post'],'languagesetting','\Modules\Setting\Controllers\Settingcontroller::language_setting', ['as' => 'language_setting']);
    $routes->match(['get', 'post'],'emailsetting','\Modules\Setting\Controllers\Settingcontroller::email_setting', ['as' => 'email_setting']);
    $routes->match(['get', 'post'],'smssetting','\Modules\Setting\Controllers\Settingcontroller::sms_setting', ['as' => 'sms_setting']);

    $routes->match(['get', 'post'],'datesetting','\Modules\Setting\Controllers\Settingcontroller::date_setting', ['as' => 'date_setting']);

    $routes->match(['get', 'post'],'roleadd','\Modules\Setting\Controllers\Settingcontroller::role_add', ['as' => 'role_add']);
    $routes->match(['get', 'post'],'roleupdate/(:num)','\Modules\Setting\Controllers\Settingcontroller::role_update/$1', ['as' => 'role_update']);
    $routes->match(['get', 'post'],'roledelete/(:num)','\Modules\Setting\Controllers\Settingcontroller::role_delete/$1', ['as' => 'role_delete']);
    $routes->match(['get', 'post'],'rolelist','\Modules\Setting\Controllers\Settingcontroller::role_list', ['as' => 'role_list']);
    $routes->match(['get', 'post'],'view_access','\Modules\Setting\Controllers\Settingcontroller::view_access', ['as' => 'view_access']);
    
    // Home 
    $routes->match(['get', 'post'],'visitordetails/(:num)','Dashboardcontroller::visitor_details/$1', ['as' => 'visitor_details']);
    $routes->match(['get', 'post'],'complaindetails/(:num)','Dashboardcontroller::complain_details/$1', ['as' => 'complain_details']);

    

});