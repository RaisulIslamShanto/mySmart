<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('complain_list', '\Modules\Complain\Controllers\Complaincontroller::index', ['as' => 'complain_list']);
    $routes->add('complain_add', '\Modules\Complain\Controllers\Complaincontroller::complainAdd', ['as' => 'complain_add']);
    $routes->get('complain_view', '\Modules\Complain\Controllers\Complaincontroller::complainView', ['as' => 'complain_view']);
    $routes->add('complain_edit/(:any)', '\Modules\Complain\Controllers\Complaincontroller::complainEdit/$1', ['as' => 'complain_edit']);
    $routes->get('complain_delete/(:any)', '\Modules\Complain\Controllers\Complaincontroller::complainDelete/$1', ['as' => 'complain_delete']);

    $routes->post('complain_solution', '\Modules\Complain\Controllers\Complaincontroller::complainSolution', ['as' => 'complain_solution']);
    $routes->post('assign_employee', '\Modules\Complain\Controllers\Complaincontroller::assignEmployee', ['as' => 'assign_employee']);
    $routes->get('get_employee', '\Modules\Complain\Controllers\Complaincontroller::getEmployee', ['as' => 'get_employee']);

}); 