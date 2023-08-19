<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    //tenant
    $routes->add('rented_report', '\Modules\Report\Controllers\Reportcontroller::rentedReport', ['as' => 'rented_report']);
    $routes->get('rentedprint_report', '\Modules\Report\Controllers\Reportcontroller::rentedPrintReport', ['as' => 'rentedprint_report']);
    $routes->get('rented_pdf', '\Modules\Report\Controllers\Reportcontroller::rentedPdf', ['as' => 'rented_pdf']);

    //visitor
    $routes->add('visitor_report', '\Modules\Report\Controllers\Reportcontroller::visitorReport', ['as' => 'visitor_report']);
    $routes->get('visitorprint_report', '\Modules\Report\Controllers\Reportcontroller::visitorPrintReport', ['as' => 'visitorprint_report']);
    $routes->get('visitor_pdf', '\Modules\Report\Controllers\Reportcontroller::visitorPdf', ['as' => 'visitor_pdf']);

    //complain
    $routes->add('complain_report', '\Modules\Report\Controllers\Reportcontroller::complainReport', ['as' => 'complain_report']);
    $routes->get('complainprint_report', '\Modules\Report\Controllers\Reportcontroller::complainPrintReport', ['as' => 'complainprint_report']);
    $routes->get('complain_pdf', '\Modules\Report\Controllers\Reportcontroller::complainPdf', ['as' => 'complain_pdf']);

    //unit
    $routes->add('unit_report', '\Modules\Report\Controllers\Reportcontroller::unitReport', ['as' => 'unit_report']);
    $routes->get('unitprint_report', '\Modules\Report\Controllers\Reportcontroller::unitPrintReport', ['as' => 'unitprint_report']);
    $routes->get('unit_pdf', '\Modules\Report\Controllers\Reportcontroller::unitPdf', ['as' => 'unit_pdf']);

    //rental info
    $routes->match(['get', 'post'],'rentreport', '\Modules\Report\Controllers\Reportcontroller::rent_report', ['as' => 'rent_report']);
    $routes->match(['get', 'post'],'rentinfo', '\Modules\Report\Controllers\Reportcontroller::rent_info', ['as' => 'rent_info']);
    $routes->get('rentinfo_pdf', '\Modules\Report\Controllers\Reportcontroller::rentInfoPdf', ['as' => 'rentinfo_pdf']);

    //fund status
    $routes->match(['get', 'post'],'fundstatus', '\Modules\Report\Controllers\Reportcontroller::fund_status', ['as' => 'fund_status']);
    $routes->match(['get', 'post'],'rentinfo', '\Modules\Report\Controllers\Reportcontroller::rent_info', ['as' => 'rent_info']);
    $routes->get('fundstatus_pdf', '\Modules\Report\Controllers\Reportcontroller::fundStatusPdf', ['as' => 'fundstatus_pdf']);
   
    //bill report
    $routes->match(['get', 'post'],'billreport', '\Modules\Report\Controllers\Reportcontroller::bill_report', ['as' => 'bill_report']);
    $routes->match(['get', 'post'],'billinfo', '\Modules\Report\Controllers\Reportcontroller::bill_info', ['as' => 'bill_info']);
    $routes->get('billinfo_pdf', '\Modules\Report\Controllers\Reportcontroller::billInfoPdf', ['as' => 'billinfo_pdf']);

    //salary report
    $routes->match(['get', 'post'],'salaryreport', '\Modules\Report\Controllers\Reportcontroller::salary_report', ['as' => 'salary_report']);
    $routes->match(['get', 'post'],'salaryinfo', '\Modules\Report\Controllers\Reportcontroller::salary_info', ['as' => 'salary_info']);
    $routes->get('salaryinfo_pdf', '\Modules\Report\Controllers\Reportcontroller::salaryInfoPdf', ['as' => 'salaryinfo_pdf']);
   
    //report print
    $routes->match(['get', 'post'],'printsalaryreport','\Modules\Report\Controllers\Reportcontroller::print_salary_report', ['as' => 'print_salary_report']);
    $routes->match(['get', 'post'],'printrentreport','\Modules\Report\Controllers\Reportcontroller::print_rent_report', ['as' => 'print_rent_report']);
    $routes->match(['get', 'post'],'printfundstatus','\Modules\Report\Controllers\Reportcontroller::print_fund_status', ['as' => 'print_fund_status']);
    $routes->match(['get', 'post'],'printbillreport','\Modules\Report\Controllers\Reportcontroller::print_bill_report', ['as' => 'print_bill_report']);

});