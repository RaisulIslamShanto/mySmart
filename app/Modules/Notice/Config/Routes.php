<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'addnotice', '\Modules\Notice\Controllers\Noticecontroller::owner_notice', ['as' => 'owner_notice']);
    $routes->match(['get', 'post'],'noticeupdate/(:num)', '\Modules\Notice\Controllers\Noticecontroller::notice_update/$1', ['as' => 'notice_update']);
    $routes->match(['get', 'post'],'noticedelete/(:num)', '\Modules\Notice\Controllers\Noticecontroller::notice_delete/$1', ['as' => 'notice_delete']);

});