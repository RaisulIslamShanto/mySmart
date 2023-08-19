
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('dashboard', '\Modules\DashboardModule\Controllers\DashboardController::dashboard', ['as' => 'dashboard']);
    $routes->post('savecategory', '\Modules\DashboardModule\Controllers\DashboardController::savecategory', ['as' => 'savecategory']);
   
      
   
});
 

