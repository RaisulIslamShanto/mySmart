
<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('manage_user', '\Modules\Manage_user\Controllers\Manage_profileController::index', ['as' => 'manage_user']);
    // $routes->post('insertuser', '\Modules\Manage_user\Controllers\Manage_profileController::insertuser', ['as' => 'insertuser']);
    $routes->post('saveuser', '\Modules\Manage_user\Controllers\Manage_profileController::saveuser', ['as' => 'saveuser']);
    $routes->get('deleteuser/(:num)', '\Modules\Manage_user\Controllers\Manage_profileController::deleteuser/$1', ['as' => 'deleteuser/(:num)']);
    $routes->get('edituser', '\Modules\Manage_user\Controllers\Manage_profileController::edituser', ['as' => 'edituser']);
    $routes->post('updateuser/(:num)', '\Modules\Manage_user\Controllers\Manage_profileController::updateuser/$1', ['as' => 'updateuser/(:num)']);
});


  