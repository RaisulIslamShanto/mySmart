<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'addbill', '\Modules\Bill_diposit\Controllers\Billdepositcontroller::addBill', ['as' => 'addBill']);
    $routes->match(['get', 'post'],'billdipositlist', '\Modules\Bill_diposit\Controllers\Billdepositcontroller::billDepositList', ['as' => 'billDepositList']);
    $routes->match(['get', 'post'],'billupdate/(:num)', '\Modules\Bill_diposit\Controllers\Billdepositcontroller::billUpdate/$1', ['as' => 'billUpdate']);
    $routes->match(['get', 'post'],'billdelete/(:num)', '\Modules\Bill_diposit\Controllers\Billdepositcontroller::billDelete/$1', ['as' => 'billDelete']);
    $routes->match(['get', 'post'],'indivisualbill', '\Modules\Bill_diposit\Controllers\Billdepositcontroller::indivisualBill', ['as' => 'indivisualBill']);

});