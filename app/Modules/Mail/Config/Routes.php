<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    //mailsms section
    $routes->get('mailsms_list', '\Modules\Mail\Controllers\Mailsmscontroller::index', ['as' => 'mailsms_list']);
    $routes->add('mailsms_add', '\Modules\Mail\Controllers\Mailsmscontroller::mailsmsAdd', ['as' => 'mailsms_add']);
    $routes->add('mailsms_edit/(:any)', '\Modules\Mail\Controllers\Mailsmscontroller::mailsmsEdit/$1', ['as' => 'mailsms_edit']);
    $routes->get('mailsms_delete/(:any)', '\Modules\Mail\Controllers\Mailsmscontroller::mailsmsDelete/$1', ['as' => 'mailsms_delete']);
 
});