<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('committee_list', '\Modules\Committee\Controllers\Committeecontroller::index', ['as' => 'committee_list']);
    $routes->add('committee_add', '\Modules\Committee\Controllers\Committeecontroller::committeeAdd', ['as' => 'committee_add']);
    $routes->post('committee_view', '\Modules\Committee\Controllers\Committeecontroller::committeeView', ['as' => 'committee_view']);
    $routes->add('committee_edit/(:any)', '\Modules\Committee\Controllers\Committeecontroller::committeeEdit/$1', ['as' => 'committee_edit']);
    $routes->get('committee_delete/(:any)', '\Modules\Committee\Controllers\Committeecontroller::committeeDelete/$1', ['as' => 'committee_delete']);

});