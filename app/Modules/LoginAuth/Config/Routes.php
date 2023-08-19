<?php
 

    $routes->add('/theme', '\Modules\LoginAuth\Controllers\Admincontroller::index', ['as' => '/theme']);
    $routes->add('login', '\Modules\LoginAuth\Controllers\Admincontroller::login', ['as' => 'login']);

    $routes->add('forgot_pass', '\Modules\LoginAuth\Controllers\Admincontroller::forgotPass', ['as' => 'forgot_pass']);
    $routes->add('reset_pass/(:any)', '\Modules\LoginAuth\Controllers\Admincontroller::resetPass/$1', ['as' => 'reset_pass']);
    $routes->match(['get', 'post'],'register', '\Modules\LoginAuth\Controllers\Admincontroller::register', ['as' => 'register']);
    $routes->get('term_and_condition', '\Modules\LoginAuth\Controllers\Admincontroller::termAndCondition', ['as' => 'term_and_condition']);

  
    $routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('account_mode', '\Modules\LoginAuth\Controllers\Popertycontroller::index', ['as' => 'account_mode']);

    $routes->match(['get', 'post'],'poperty_list/(:any)', '\Modules\LoginAuth\Controllers\Popertycontroller::popertyList/$1', ['as' => 'poperty_list']);

    $routes->add('poperty_add/(:any)', '\Modules\LoginAuth\Controllers\Popertycontroller::popertyAdd/$1', ['as' => 'poperty_add']);

    // //multiple image upload
    $routes->post('poperty/(:any)_images', '\Modules\LoginAuth\Controllers\Popertycontroller::multipleImageUpload', ['as' => 'poperty_images']);

    $routes->get('home/(:any)', '\Modules\Home\Controllers\Dashboardcontroller::/$1', ['as' => 'home']);

    $routes->get('logout', '\Modules\LoginAuth\Controllers\Admincontroller::adminLogout', ['as' => 'adminLogout']);

    });

    // //paypal payment gateway
    $routes->add('no_debit_paypal_notify', '\Modules\LoginAuth\Controllers\Admincontroller::no_debit_paypal_notify', ['as' => 'no_debit_paypal_notify']);

    $routes->group('admin', ['filter' => 'package'], function ($routes) {

    //     //stripe payment gateway
        $routes->match(['get', 'post'],'select_package', '\Modules\LoginAuth\Controllers\Admincontroller::selectPackage', ['as' => 'select_package']);

        $routes->match(['get', 'post'],'payment/(:any)', '\Modules\LoginAuth\Controllers\Admincontroller::payment/$1', ['as' => 'payment']);

        $routes->match(['get', 'post'],'payment_method_check/(:any)/(:any)/(:any)/(:any)/(:any)', '\Modules\LoginAuth\Controllers\Admincontroller::paymentMethodCheck/$1/$2/$3/$4/$5', ['as' => 'payment_method_check']);

        $routes->match(['get', 'post'],'success_payment', '\Modules\LoginAuth\Controllers\Admincontroller::successPayment', ['as' => 'success_payment']);
    });


