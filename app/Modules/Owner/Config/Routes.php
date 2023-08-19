<?php

    $routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {

    $routes->match(['get', 'post'],'owneradd', '\Modules\Owner\Controllers\Ownercontroller::owner_add', ['as' => 'owner_add']);
    $routes->get('ownerlist', '\Modules\Owner\Controllers\Ownercontroller::owner_list', ['as' => 'owner_list']);
    $routes->match(['get', 'post'],'ownerupdate/(:num)', '\Modules\Owner\Controllers\Ownercontroller::owner_update/$1', ['as' => 'owner_update']);
    $routes->match(['get', 'post'],'ownerdelete/(:num)', '\Modules\Owner\Controllers\Ownercontroller::owner_delete/$1', ['as' => 'owner_delete']);
    // $routes->match(['get', 'post'],'\Modules\Owner\Controllers\indivusualowner', 'Ownercontroller::owner_indivisual', ['as' => 'owner_indivisual']);

    $routes->match(['get', 'post'],'ownerutilityadd', '\Modules\Owner\Controllers\Ownercontroller::owner_utility_add', ['as' => 'owner_utility_add']);
    $routes->match(['get', 'post'],'getunits', '\Modules\Owner\Controllers\Ownercontroller::get_units_by_floor', ['as' => 'get_units_by_floor']);
    $routes->match(['get', 'post'],'getowner', '\Modules\Owner\Controllers\Ownercontroller::get_owner_by_unit', ['as' => 'get_owner_by_unit']);
    $routes->match(['get', 'post'],'ownerutilitylist', '\Modules\Owner\Controllers\Ownercontroller::owner_utility_list', ['as' => 'owner_utility_list']);
    $routes->match(['get', 'post'],'ownerutilityupdate/(:num)', '\Modules\Owner\Controllers\Ownercontroller::owner_utility_update/$1', ['as' => 'owner_utility_update']);
    $routes->match(['get', 'post'],'ownerutilitydelete/(:num)', '\Modules\Owner\Controllers\Ownercontroller::owner_utility_delete/$1', ['as' => 'owner_utility_delete']);
    $routes->match(['get', 'post'],'indivusualutility', '\Modules\Owner\Controllers\Ownercontroller::indivusual_utility', ['as' => 'indivusual_utility']);




});