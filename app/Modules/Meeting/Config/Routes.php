<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('meeting_list', '\Modules\Meeting\Controllers\Meetingcontroller::index', ['as' => 'meeting_list']);
    $routes->add('meeting_add', '\Modules\Meeting\Controllers\Meetingcontroller::meetingAdd', ['as' => 'meeting_add']);
    $routes->get('meeting_view', '\Modules\Meeting\Controllers\Meetingcontroller::meetingView', ['as' => 'meeting_view']);
    $routes->add('meeting_edit/(:any)', '\Modules\Meeting\Controllers\Meetingcontroller::meetingEdit/$1', ['as' => 'meeting_edit']);
    $routes->get('meeting_delete/(:any)', '\Modules\Meeting\Controllers\Meetingcontroller::meetingDelete/$1', ['as' => 'meeting_delete']);

});