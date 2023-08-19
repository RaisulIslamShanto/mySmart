<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'addrent', '\Modules\Rent\Controllers\Rentcontroller::add_rent', ['as' => 'add_rent']);
    $routes->match(['get', 'post'],'gettenent', '\Modules\Rent\Controllers\Rentcontroller::get_tenent', ['as' => 'get_tenent']);
    $routes->match(['get', 'post'],'rentlist/(:num)', '\Modules\Rent\Controllers\Rentcontroller::rent_list/$1', ['as' => 'rent_list']);
    $routes->match(['get', 'post'],'rentlist', '\Modules\Rent\Controllers\Rentcontroller::rent_list', ['as' => 'rent_list_new']);
    $routes->match(['get', 'post'],'rentupdate/(:num)', '\Modules\Rent\Controllers\Rentcontroller::rent_update/$1', ['as' => 'rent_update']);
    $routes->match(['get', 'post'],'rentdelete/(:num)', '\Modules\Rent\Controllers\Rentcontroller::rent_delete/$1', ['as' => 'rent_delete']);
    $routes->match(['get', 'post'],'rentinvoice/(:num)', '\Modules\Rent\Controllers\Rentcontroller::rent_invoice/$1', ['as' => 'rent_invoice']);
    $routes->match(['get', 'post'],'indivusualrent', '\Modules\Rent\Controllers\Rentcontroller::indivusual_rent', ['as' => 'indivusual_rent']);
    $routes->match(['get', 'post'],'printrentinvoice', '\Modules\Rent\Controllers\Rentcontroller::print_rent_invoice', ['as' => 'print_rent_invoice']);

});