
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('incomepage', '\Modules\IncomeModule\Controllers\IncomeController::incomepage', ['as' => 'incomepage']);
    $routes->get('incomeCategory', '\Modules\IncomeModule\Controllers\IncomeController::incomeCategory', ['as' => 'incomeCategory;']);
    $routes->get('bankaccount', '\Modules\IncomeModule\Controllers\IncomeController::bankaccount', ['as' => 'bankaccount;']);
    $routes->get('addnewincomepage', '\Modules\IncomeModule\Controllers\IncomeController::addnewincomepage', ['as' => 'addnewincomepage']);
    $routes->post('submitincome', '\Modules\IncomeModule\Controllers\IncomeController::submitincome', ['as' => 'submitincome']);

    $routes->get('deleteincome/(:num)', '\Modules\IncomeModule\Controllers\IncomeController::deleteincome/$1', ['as' => 'deleteincome/(:num)']);
    $routes->get('editincome/(:num)', '\Modules\IncomeModule\Controllers\IncomeController::editincome/$1', ['as' => 'editincome/(:num)']);
    $routes->post('editincome/updateincome/(:num)', '\Modules\IncomeModule\Controllers\IncomeController::updateincome/$1', ['as' => 'updateincome/(:num)']);
    
});
  

  