<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('visitor_list', '\Modules\Visitor\Controllers\Visitorcontroller::index', ['as' => 'visitor_list']);
    $routes->add('visitor_add', '\Modules\Visitor\Controllers\Visitorcontroller::visitorAdd', ['as' => 'visitor_add']);
    $routes->add('visitor_edit/(:any)', '\Modules\Visitor\Controllers\Visitorcontroller::visitorEdit/$1', ['as' => 'visitor_edit']);
    $routes->get('visitor_delete/(:any)', '\Modules\Visitor\Controllers\Visitorcontroller::visitorDelete/$1', ['as' => 'visitor_delete']);
    $routes->match(['get', 'post'],'getUnits', '\Modules\Visitor\Controllers\Visitorcontroller::tenantDepand', ['as' => 'getunits']);

});