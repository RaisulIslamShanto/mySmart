<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    $routes->get('floor_list/(:any)', '\Modules\Floor\Controllers\Floorcontroller::index/$1', ['as' => 'floor_list']);
    $routes->get('floor_list', '\Modules\Floor\Controllers\Floorcontroller::index', ['as' => 'floor_list_new']);
    $routes->add('floor_add', '\Modules\Floor\Controllers\Floorcontroller::floorAdd', ['as' => 'floor_add']);
    $routes->add('floor_edit/(:any)', '\Modules\Floor\Controllers\Floorcontroller::floorEdit/$1', ['as' => 'floor_edit']);
    $routes->get('floor_delete/(:any)', '\Modules\Floor\Controllers\Floorcontroller::floorDelete/$1', ['as' => 'floor_delete']);
});