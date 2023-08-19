<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {

    $routes->get('bank_list', '\Modules\Bank\Controllers\BankController::Bank', ['as' => 'bank_list']);
    $routes->post('bank_list_add', '\Modules\Bank\Controllers\BankController::AddBank', ['as' => 'list_of_bank']);
    $routes->get('bank_list_edit/(:any)', '\Modules\Bank\Controllers\BankController::BankListEdit/$1', ['as' => 'bank_list_edit']);
    $routes->post('bank_list_update/(:any)', '\Modules\Bank\Controllers\BankController::BankListUpdate/$1', ['as' => 'bank_list_Update']);
    $routes->post('bank_list_delete/(:any)', '\Modules\Bank\Controllers\BankController::BankDelete/$1', ['as' => 'bank_delete']);


    $routes->get('account_list', '\Modules\Bank\Controllers\BankController::index', ['as' => 'account_list']);
    $routes->post('bank_account_add', '\Modules\Bank\Controllers\BankController::AddBankAccount', ['as' => 'account_data']);
    $routes->get('account_list_edit/(:any)', '\Modules\Bank\Controllers\BankController::AccountListEdit/$1', ['as' => 'account_list_edit']);
    $routes->post('account_list_update/(:any)', '\Modules\Bank\Controllers\BankController::AccountListUpdate/$1', ['as' => 'bank_account_list_Update']);
    $routes->post('bank_account_delete/(:any)', '\Modules\Bank\Controllers\BankController::AccountDelete/$1', ['as' => 'bank_account_delete']);

 
    $routes->get('balance_transfer_list', '\Modules\Bank\Controllers\BalanceTransferController::BalanceTransfer', ['as' => 'balance_list']);
    $routes->post('balance_transfer_add', '\Modules\Bank\Controllers\BalanceTransferController::BalanceTransferAdd', ['as' => 'balance_transfer_data']);
    // $routes->get('account_list_edit/(:any)', '\Modules\Bank\Controllers\BankController::AccountListEdit/$1', ['as' => 'account_list_edit']);
    // $routes->post('bank_account_delete/(:any)', '\Modules\Bank\Controllers\BankController::AccountDelete/$1', ['as' => 'bank_account_delete']);

    $routes->get('debts_loans_list', '\Modules\Bank\Controllers\BalanceTransferController::DebtsLoans', ['as' => 'debts_list']);
    $routes->post('debts_loans_add', '\Modules\Bank\Controllers\BalanceTransferController::AddDebtsLoans', ['as' => 'debts_loans_data']);
    $routes->post('debts_loans_delete/(:any)', '\Modules\Bank\Controllers\BalanceTransferController::DebtsDelete/$1', ['as' => 'debts_delete']);
    $routes->get('debts_loans_edit/(:any)', '\Modules\Bank\Controllers\BalanceTransferController::DebtsEdit/$1', ['as' => 'debts_edit']);

    

    $routes->post('add_lend', '\Modules\Bank\Controllers\BalanceTransferController::AddLend', ['as' => 'add_lend']);

    

    $routes->get('expenses_list', '\Modules\Bank\Controllers\ExpensesController::Expenses', ['as' => 'expenses_list']);
    $routes->add('expenses_add', '\Modules\Bank\Controllers\ExpensesController::AddExpenses', ['as' => 'expenses_data']);
    $routes->add('expenses_list_edit/(:any)', '\Modules\Bank\Controllers\ExpensesController::ExpensesListEdit/$1', ['as' => 'expenses_list_edit']);
    $routes->post('expenses_delete/(:any)', '\Modules\Bank\Controllers\ExpensesController::ExpensesDelete/$1', ['as' => 'expenses_delete']);

    $routes->get('expenses_report', '\Modules\Bank\Controllers\ExpensesController::ExpensesReport', ['as' => 'expenses_report']);
    $routes->post('expenses_report_filter', '\Modules\Bank\Controllers\ExpensesController::ExpensesReportFilter', ['as' => 'expenses_report_filter']);

    $routes->get('budgets_list', '\Modules\Bank\Controllers\BudgetsController::Budgets', ['as' => 'budgets_list']);
    $routes->post('budgets_list_add', '\Modules\Bank\Controllers\BudgetsController::BudgetsAdd', ['as' => 'list_of_budgets']);
    $routes->get('budgets_list_edit/(:any)', '\Modules\Bank\Controllers\BudgetsController::BudgetsListEdit/$1', ['as' => 'budgets_list_edit']);
    $routes->post('budgets_list_update/(:any)', '\Modules\Bank\Controllers\BudgetsController::BudgetsListUpdate/$1', ['as' => 'budgets_list_Update']);
    $routes->post('budgets_list_delete/(:any)', '\Modules\Bank\Controllers\BudgetsController::BudgetsDelete/$1', ['as' => 'budgets_delete']);

    $routes->get('expense_report', '\Modules\Bank\Controllers\BudgetsController::ExpenseReport', ['as' => 'expense_report']);


    $routes->get('calender', '\Modules\Bank\Controllers\CalenderController::Calender', ['as' => 'Calender']);
    $routes->get('calender_data', '\Modules\Bank\Controllers\CalenderController::CalenderData', ['as' => 'calender_data']);

    $routes->get('application_setting', '\Modules\Bank\Controllers\CalenderController::ApplicationSetting', ['as' => 'application_setting']);
    $routes->post('setting_update/(:any)', '\Modules\Bank\Controllers\CalenderController::SettingUpdate/$1', ['as' => 'setting_update']);


    // $routes->get('category_list', '\Modules\Demo\Controllers\Democontroller::index', ['as' => 'category_list']);
    // $routes->add('blog_add', '\Modules\Demo\Controllers\Democontroller::blogAdd', ['as' => 'blog_add']);
    // $routes->add('category_edit/(:any)', '\Modules\Demo\Controllers\Democontroller::categoryEdit/$1', ['as' => 'demo_edit']);
    // $routes->get('demo_delete/(:any)', '\Modules\Demo\Controllers\Democontroller::demoDelete/$1', ['as' => 'demo_delete']);
});