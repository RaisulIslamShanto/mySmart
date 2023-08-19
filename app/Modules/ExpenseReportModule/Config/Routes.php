
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('expensereportpage', '\Modules\ExpenseReportModule\Controllers\ExpenseReportController::expensereportpage', ['as' => 'expensereportpage']);
    $routes->get('addexpensepage', '\Modules\ExpenseModule\Controllers\ExpenseController::addexpensepage', ['as' => 'addexpensepage']);
    $routes->post('submitincome', '\Modules\ExpenseModule\Controllers\ExpenseController::submitincome', ['as' => 'submitincome']);

    $routes->get('deleteincome/(:num)', '\Modules\ExpenseModule\Controllers\ExpenseController::deleteincome/$1', ['as' => 'deleteincome/(:num)']);
    $routes->post('editincome', '\Modules\ExpenseModule\Controllers\ExpenseController::editincome', ['as' => 'editincome']);
    $routes->post('updateincome/(:num)', '\Modules\ExpenseModule\Controllers\ExpenseController::updateincome/$1', ['as' => 'updateincome/(:num)']);
     
});


