<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    $routes->match(['get', 'post'],'addemployee', '\Modules\Employee\Controllers\Employeecontroller::addEmployee', ['as' => 'add_employee']);
    $routes->match(['get', 'post'],'employeelist', '\Modules\Employee\Controllers\Employeecontroller::employeeList', ['as' => 'employee_list']);
    $routes->match(['get', 'post'],'employeeupdate/(:num)', '\Modules\Employee\Controllers\Employeecontroller::employeeUpdate/$1', ['as' => 'employee_update']);
    $routes->match(['get', 'post'],'employeedelete/(:num)', '\Modules\Employee\Controllers\Employeecontroller::employeeDelete/$1', ['as' => 'employee_delete']);
    $routes->match(['get', 'post'],'indivisualemployee', '\Modules\Employee\Controllers\Employeecontroller::indivisualEmployee', ['as' => 'indivisual_employee']);
    
    
    $routes->match(['get', 'post'],'employeesalary', '\Modules\Employee\Controllers\Employeecontroller::employeeSalary', ['as' => 'employee_salary']);
    $routes->match(['get', 'post'],'getindivisualemployee', '\Modules\Employee\Controllers\Employeecontroller::getIndivisualemployee', ['as' => 'get_indivisualemployee']);
    $routes->match(['get', 'post'],'employeesalaryupdate/(:num)', '\Modules\Employee\Controllers\Employeecontroller::employeeSalaryUpdate/$1', ['as' => 'employee_salary_update']);
    $routes->match(['get', 'post'],'employeesalarydelete/(:num)', '\Modules\Employee\Controllers\Employeecontroller::employeeSalaryDelete/$1', ['as' => 'employee_salary_delete']);
    $routes->match(['get', 'post'],'indivisualemployeesalary', '\Modules\Employee\Controllers\Employeecontroller::indivisualEmployeeSalary', ['as' => 'indivisual_employee_salary']);
    $routes->match(['get', 'post'],'employeeleave', '\Modules\Employee\Controllers\Employeecontroller::employeeLeave', ['as' => 'employee_leave']);

});