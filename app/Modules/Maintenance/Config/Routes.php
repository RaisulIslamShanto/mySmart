<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('maintenance_list/(:any)', '\Modules\Maintenance\Controllers\Maintenancecontroller::index/$1', ['as' => 'maintenance_list']);
    $routes->get('maintenance_list', '\Modules\Maintenance\Controllers\Maintenancecontroller::index', ['as' => 'maintenance_list_new']);
    $routes->add('maintenance_add', '\Modules\Maintenance\Controllers\Maintenancecontroller::maintenanceAdd', ['as' => 'maintenance_add']);
    $routes->post('maintenance_view', '\Modules\Maintenance\Controllers\Maintenancecontroller::maintenanceView', ['as' => 'maintenance_view']);
    $routes->add('maintenance_edit/(:any)', '\Modules\Maintenance\Controllers\Maintenancecontroller::maintenanceEdit/$1', ['as' => 'maintenance_edit']);
    $routes->get('maintenance_delete/(:any)', '\Modules\Maintenance\Controllers\Maintenancecontroller::maintenanceDelete/$1', ['as' => 'maintenance_delete']);

});