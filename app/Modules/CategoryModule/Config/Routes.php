
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('categorypage', '\Modules\CategoryModule\Controllers\CategoryController::categorypage', ['as' => 'categorypage']);
    $routes->post('savecategory', '\Modules\CategoryModule\Controllers\CategoryController::savecategory', ['as' => 'savecategory']);
    $routes->get('deletecat/(:num)', '\Modules\CategoryModule\Controllers\CategoryController::deletecat/$1', ['as' => 'deletecat/(:num)']);
    $routes->post('editcat', '\Modules\CategoryModule\Controllers\CategoryController::editcat', ['as' => 'editcat']);
    $routes->post('updatecat/(:num)', '\Modules\CategoryModule\Controllers\CategoryController::updatecat/$1', ['as' => 'updatecat/(:num)']);
   
    
   
});


