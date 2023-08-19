<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->get('tenant_list/(:any)', '\Modules\Tenant\Controllers\Tenantcontroller::index/$1', ['as' => 'tenant_list']);
    $routes->get('tenant_list', '\Modules\Tenant\Controllers\Tenantcontroller::index', ['as' => 'tenant_list_new']);
    $routes->add('tenant_add', '\Modules\Tenant\Controllers\Tenantcontroller::tenantAdd', ['as' => 'tenant_add']);
    $routes->post('tenant_view', '\Modules\Tenant\Controllers\Tenantcontroller::tenantView', ['as' => 'tenant_view']);
    $routes->add('tenant_edit/(:any)', '\Modules\Tenant\Controllers\Tenantcontroller::tenantEdit/$1', ['as' => 'tenant_edit']);
    $routes->get('tenant_delete/(:any)', '\Modules\Tenant\Controllers\Tenantcontroller::tenantDelete/$1', ['as' => 'tenant_delete']);
    $routes->get('tenant_depand', '\Modules\Tenant\Controllers\Tenantcontroller::tenantDepand/$1', ['as' => 'tenant_depand']);

});