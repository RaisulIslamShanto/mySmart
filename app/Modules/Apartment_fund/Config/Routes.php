<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'addfund', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::addFund', ['as' => 'addfund']);
    $routes->match(['get', 'post'],'fundlist', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::fundList', ['as' => 'fundlist']);
    $routes->match(['get', 'post'],'fundupdate/(:num)', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::fundUpdate/$1', ['as' => 'fundupdate']);
    $routes->match(['get', 'post'],'funddelete/(:num)', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::fundDelete/$1', ['as' => 'funddelete']);
    $routes->match(['get', 'post'],'indivisualfund', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::indivisualFund', ['as' => 'indivisualfund']);
    $routes->match(['get', 'post'],'invoice/(:num)', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::invoice/$1', ['as' => 'invoice']);
    $routes->match(['get', 'post'],'printfundinvoice', '\Modules\Apartment_fund\Controllers\Apartmentfundcontroller::printFundInvoice', ['as' => 'printfundinvoice']);

}); 