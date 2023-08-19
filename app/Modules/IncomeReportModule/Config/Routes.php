
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('incomereportpage', '\Modules\IncomeReportModule\Controllers\IncomeReportController::incomereportpage', ['as' => 'incomereportpage']);
   
    $routes->post('filterincome', '\Modules\IncomeReportModule\Controllers\IncomeReportController::filterincome', ['as' => 'filterincome']);

    $routes->get('deleteincome/(:num)', '\Modules\IncomeReportModule\Controllers\IncomeReportController::deleteincome/$1', ['as' => 'deleteincome/(:num)']);
    $routes->post('editincome', '\Modules\IncomeReportModule\Controllers\IncomeReportController::editincome', ['as' => 'editincome']);
    $routes->post('updateincome/(:num)', '\Modules\IncomeReportModule\Controllers\IncomeReportController::updateincome/$1', ['as' => 'updateincome/(:num)']);
     
});


