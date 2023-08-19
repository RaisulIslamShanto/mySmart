
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('bankpage', '\Modules\BankModule\Controllers\BankController::bankpage', ['as' => 'bankpage']);
    $routes->post('savebank', '\Modules\BankModule\Controllers\BankController::savebank', ['as' => 'savebank']);

    $routes->get('deletebank/(:num)', '\Modules\BankModule\Controllers\BankController::deletebank/$1', ['as' => 'deletebank/(:num)']);
    $routes->post('editbank', '\Modules\BankModule\Controllers\BankController::editbank', ['as' => 'editbank']);
    $routes->post('updatebank/(:num)', '\Modules\BankModule\Controllers\BankController::updatebank/$1', ['as' => 'updatebank/(:num)']);
});


