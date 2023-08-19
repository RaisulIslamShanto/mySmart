<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) { 
    
    $routes->get('super_admin_home', '\Modules\LoginAuth\Controllers\Admincontroller::super_admin_home', ['as' => 'super_admin_home']);
    
    $routes->get('property_user', '\Modules\Super_admin\Controllers\Superadmincontroller::property_user', ['as' => 'property_user']);

    $routes->match(['get', 'post'],'property_user_add', '\Modules\Super_admin\Controllers\Superadmincontroller::property_user_add', ['as' => 'property_user_add']);

    $routes->match(['get', 'post'],'property_user_edit/(:num)', '\Modules\Super_admin\Controllers\Superadmincontroller::property_user_edit/$1', ['as' => 'property_user_edit']);

    $routes->match(['get', 'post'],'property_details/(:num)', '\Modules\Super_admin\Controllers\Superadmincontroller::property_details/$1', ['as' => 'property_details']);

    $routes->match(['get', 'post'],'pakage_list', '\Modules\Super_admin\Controllers\Superadmincontroller::pakage_list', ['as' => 'pakage_list']);

    $routes->match(['get', 'post'],'pakage_add', '\Modules\Super_admin\Controllers\Superadmincontroller::pakage_add', ['as' => 'pakage_add']);

    $routes->match(['get', 'post'],'pakage_edit/(:num)', '\Modules\Super_admin\Controllers\Superadmincontroller::pakage_edit/$1', ['as' => 'pakage_edit']);
    
    $routes->match(['get', 'post'],'pakage_delete/(:num)', '\Modules\Super_admin\Controllers\Superadmincontroller::pakage_delete/$1', ['as' => 'pakage_delete']);

    $routes->match(['get', 'post'],'paypal_setup', '\Modules\Super_admin\Controllers\Superadmincontroller::paypal_setup', ['as' => 'paypal_setup']);

    $routes->match(['get', 'post'],'stripe_setup', '\Modules\Super_admin\Controllers\Superadmincontroller::stripe_setup', ['as' => 'stripe_setup']);
        

});