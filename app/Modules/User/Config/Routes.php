<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'adduser', '\Modules\User\Controllers\Usercontroller::add_user', ['as' => 'add_user']);
    $routes->match(['get', 'post'],'userupdate/(:num)', '\Modules\User\Controllers\Usercontroller::user_update/$1', ['as' => 'user_update']);
    $routes->match(['get', 'post'],'userdelete/(:num)', '\Modules\User\Controllers\Usercontroller::user_delete/$1', ['as' => 'user_delete']);
    $routes->match(['get', 'post'],'indivusualuser', '\Modules\User\Controllers\Usercontroller::indivusual_user', ['as' => 'indivusual_user']);

}); 