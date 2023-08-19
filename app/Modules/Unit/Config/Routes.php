<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('unit_list', '\Modules\Unit\Controllers\Unitcontroller::index', ['as' => 'unit_list']);
    $routes->add('unit_add', '\Modules\Unit\Controllers\Unitcontroller::unitAdd', ['as' => 'unit_add']);
    $routes->add('unit_edit/(:any)', '\Modules\Unit\Controllers\Unitcontroller::unitEdit/$1', ['as' => 'unit_edit']);
    $routes->get('unit_delete/(:any)', '\Modules\Unit\Controllers\Unitcontroller::unitDelete/$1', ['as' => 'unit_delete']);


});