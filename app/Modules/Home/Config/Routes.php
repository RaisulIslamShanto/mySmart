<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'visitordetails/(:num)','\Modules\Home\Controllers\Dashboardcontroller::visitorDetails/$1', ['as' => 'visitor_details']);
    $routes->match(['get', 'post'],'complaindetails/(:num)','\Modules\Home\Controllers\Dashboardcontroller::complainDetails/$1', ['as' => 'complain_details']);
    $routes->match(['get', 'post'],'get_notification','\Modules\Home\Controllers\Dashboardcontroller::getNotification', ['as' => 'get_notification']);

    $routes->match(['get', 'post'],'notification_view','\Modules\Home\Controllers\Dashboardcontroller::notificationView', ['as' => 'notification_view']);
    $routes->match(['get', 'post'],'profile','\Modules\Home\Controllers\Dashboardcontroller::profile', ['as' => 'profile']);
    // $routes->match(['get', 'post'],'notification_details/(:num)','\Modules\Home\Controllers\Dashboardcontroller::notificationDetails/$1', ['as' => 'notification_details']);
    $routes->match(['get', 'post'],'update_notification','\Modules\Home\Controllers\Dashboardcontroller::updateNotification', ['as' => 'update_notification']);

    $routes->match(['get', 'post'],'mypackage','\Modules\Home\Controllers\Dashboardcontroller::myPackage', ['as' => 'mypackage']);

    $routes->match(['get', 'post'],'edit_package','\Modules\Home\Controllers\Dashboardcontroller::editPackage', ['as' => 'edit_package']);

    $routes->match(['get', 'post'],'make_payment/(:num)/(:num)','\Modules\Home\Controllers\Dashboardcontroller::makePayment/$1/$2', ['as' => 'make_payment']);

    $routes->match(['get', 'post'],'change_payment_confirm/(:any)/(:any)/(:any)/(:any)/(:any)', '\Modules\Home\Controllers\Dashboardcontroller::changePaymentConfirm/$1/$2/$3/$4/$5', ['as' => 'change_payment_confirm']);

});