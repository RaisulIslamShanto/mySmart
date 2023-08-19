
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

                <?php

                    $f_list= menu_access('floor_list');
                    $f_add= menu_access('floor_add');

                    $unit_list= menu_access('unit_list');
                    $unit_add= menu_access('unit_add');

                    $ownerlist= menu_access('ownerlist');
                    $owneradd= menu_access('owneradd');

                    $tenant_list= menu_access('tenant_list');
                    $tenant_add= menu_access('tenant_add');

                    $addemployee= menu_access('addemployee');
                    $employeelist= menu_access('employeelist');
                    $employeesalary= menu_access('employeesalary');
                    $employeeleave= menu_access('employeeleave');

                    $rentlist= menu_access('rentlist');
                    $addrent= menu_access('addrent');

                    $ownerutilitylist= menu_access('ownerutilitylist');
                    $ownerutilityadd= menu_access('ownerutilityadd');

                    $maintenance_list= menu_access('maintenance_list');
                    $maintenance_add= menu_access('maintenance_add');

                    $committee_list= menu_access('committee_list');
                    $committee_add= menu_access('committee_add');

                    $fundlist= menu_access('fundlist');
                    $addfund= menu_access('addfund');

                    $billdipositlist= menu_access('billdipositlist');
                    $addbill= menu_access('addbill');



                    $complain_list= menu_access('complain_list');
                    $complain_add= menu_access('complain_add');

                    $visitor_list= menu_access('visitor_list');
                    $visitor_add= menu_access('visitor_add');

                    $meeting_list= menu_access('meeting_list');
                    $meeting_add= menu_access('meeting_add');

                    $addnotice= menu_access('addnotice');
                    $mailsms_list= menu_access('mailsms_list');

                    $rentreport= menu_access('rentreport');
                    $rented_report= menu_access('rented_report');
                    $visitor_report= menu_access('visitor_report');
                    $complain_report= menu_access('complain_report');
                    $unit_report= menu_access('unit_report');
                    $fundstatus= menu_access('fundstatus');
                    $billreport= menu_access('billreport');
                    $salaryreport= menu_access('salaryreport');


                    $roleadd= menu_access('roleadd');
                    $rolelist= menu_access('rolelist');
                    $adduser= menu_access('adduser');
                    $billsetup_add= menu_access('billsetup_add');
                    $utility_setup= menu_access('utility_setup');
                    $membersetup_add= menu_access('membersetup_add');
                    $monthsetup_add= menu_access('monthsetup_add');
                    $yearsetup= menu_access('yearsetup');
                    $currencysetup= menu_access('currencysetup');
                    $systemsetup= menu_access('systemsetup');
                    $notification_list= menu_access('notification_list');



                ?>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <?php
                        $session = session();
                        $property_id=$session->get('rs_property_id');?>
                        <a href="<?= base_url('admin/home/'.$property_id) ?>" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-building-4-line"></i>
                            <span>Bank Information</span>
                        </a>
                        <ul class="sub-menu1" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>/admin/bank_list">Bank</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/account_list">Bank accounts</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/balance_transfer_list">Balance Transfer</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/debts_loans_list">Debit Loans</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/expenses_list">Expenses</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/budgets_list">Budgts</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/expenses_report">Expenses Report</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/calender">Calender</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/application_setting">Application Settings</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-building-4-line"></i>
                            <span>Manage Banks</span>
                        </a>
                        <ul class="sub-menu1" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>/admin/dashboard">Dashboard</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/manage_user">Manage User</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/categorypage">Categories</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/bankpage">Bank</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/incomepage">Income</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/expensereportpage">Expense Report</a></li>
                            <li><a href="<?php echo base_url() ?>/admin/incomereportpage">Income Report</a></li>
                            
                        </ul>
                    </li>

                    <!-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-building-4-line"></i>
                            <span>Blog</span>
                        </a>
                        <ul class="sub-menu1" aria-expanded="false">
                            <li><a href="<?// echo base_url() ?>/admin/demo_add">Add Category</a></li>
                            <li><a href="<?// echo base_url() ?>/admin/blog_add">Add Blog</a></li>
                            <li><a href="<?// echo base_url() ?>/admin/category_list">Category List</a></li>
                            <li><a href="<?// echo base_url(''); ?>/admin/demo_list">Blog List</a></li>
                        </ul>
                    </li> -->



                    <?php if($f_list || $f_add){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-building-4-line"></i>
                            <span>Floor Information</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php
                            if($f_list){
                            ?>
                            <li><a href="<?php echo base_url('admin/floor_list')?>">Floor List</a></li>
                            <?php } if($f_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/floor_add">Add Floor</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php }?>


                    <?php if($unit_list || $unit_add){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-community-line"></i>
                            <span>Unit Information</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                        <?php if($unit_list){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/unit_list">Unit List</a></li>
                        <?php }?>
                        <?php if($unit_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/unit_add">Add Unit</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php }?>

                    <?php if($ownerlist || $owneradd){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-line"></i>
                            <span>Owner Information</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if($ownerlist){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/ownerlist">Owner List</a></li>
                            <?php }?>
                            <?php if($owneradd){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/owneradd">Add Owner</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if($tenant_list || $tenant_add){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class=" ri-team-line"></i>
                            <span>Tenant Information</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if($tenant_list){ ?>
                            <li><a href="<?php echo base_url('admin/tenant_list') ?>">Tenant List</a></li>
                            <?php } if($tenant_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/tenant_add">Add Tenant</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($employeelist || $addemployee || $employeesalary || $employeeleave){ ?>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-shield-user-line"></i>
                            <span>Employee Information</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                        <?php if($employeelist){ ?>
                            <li><a href="<?php echo base_url('admin/employeelist'); ?>">Employee List</a></li>
                            <?php } if($addemployee){ ?>
                            <li><a href="<?php echo base_url('admin/addemployee'); ?>">Add Employee</a></li>
                            <?php } if($employeesalary){ ?>
                            <li><a href="<?php echo base_url('admin/employeesalary'); ?>">Employee Salary</a></li>
                            <?php } if($employeeleave){ ?>
                            <li><a href="<?php echo base_url('admin/employeeleave'); ?>">Employee Leave Request</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } if($rentlist || $addrent ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class=" ri-money-dollar-box-line"></i>
                            <span>Rent Collection</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($rentlist){ ?>
                            <li><a href="<?= base_url('admin/rentlist'); ?>">Rent List</a></li>
                            <?php } if($addrent){ ?>
                            <li><a href="<?= base_url('admin/addrent'); ?>">Add Rent</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($ownerutilitylist || $ownerutilityadd ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-settings-line"></i>
                            <span>Owner Utility</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($ownerutilitylist){ ?>
                            <li><a href="<?php echo base_url('admin/ownerutilitylist') ?>">Owner Utility List</a></li>
                            <?php } if($ownerutilityadd){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/ownerutilityadd">Add Owner Utility</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($maintenance_list || $maintenance_add ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class=" ri-scissors-cut-line"></i>
                            <span>Maintenance Cost</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($maintenance_list){ ?>
                            <li><a href="<?php echo base_url('admin/maintenance_list') ?>">Maintenance Cost List</a></li>
                            <?php } if($maintenance_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/maintenance_add">Add Maintenance Cost</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($committee_list || $committee_add ){ ?>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-4-line"></i>
                            <span>Management Committee</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php  if($committee_list){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/committee_list">Member List</a></li>
                            <?php } if($committee_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/committee_add">Add Member</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($fundlist || $addfund ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="  ri-exchange-funds-line"></i>
                            <span>Apartment Fund</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($fundlist){ ?>
                            <li><a href="<?php echo base_url('admin/fundlist'); ?>">Fund List</a></li>
                            <?php } if($addfund){ ?>
                            <li><a href="<?php echo base_url('admin/addfund'); ?>">Add Fund</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($billdipositlist || $addbill ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class=" ri-secure-payment-line"></i>
                            <span>Bill Deposit</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($billdipositlist){ ?>
                            <li><a href="<?php echo base_url('admin/billdipositlist'); ?>">Bill List</a></li>
                            <?php } if($addbill){ ?>
                            <li><a href="<?php echo base_url('admin/addbill'); ?>">Add Bill</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($complain_list || $complain_add ){ ?>
                    <li>

                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-question-answer-line"></i>
                            <span>Complain</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($complain_list){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/complain_list">Complain List</a></li>
                            <?php } if($complain_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/complain_add">Add Complain</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($visitor_list || $visitor_add ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-roadster-line"></i>
                            <span>Visitor</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($visitor_list){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/visitor_list">Visitor List</a></li>
                            <?php } if($visitor_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/visitor_add">Add Visitor</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($meeting_list || $meeting_add ){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-account-pin-box-line"></i>
                            <span>Meeting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($meeting_list){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/meeting_list">Meeting List</a></li>
                            <?php } if($meeting_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/meeting_add">Add Meeting</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <?php } if($addnotice){ ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="  ri-user-voice-line"></i>
                            <span>Notice Board</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <!-- <li><a href="notice.php">Tenant Notice Board</a></li>
                        <li><a href="employee_notice.php">Employee Notice Board</a></li> -->
                            <li><a href="<?php echo base_url('admin/addnotice'); ?>">Notice Board</a></li>
                        </ul>
                    </li>
                    <?php } if($mailsms_list){ ?>
                    <li>
                        <a href="<?php echo base_url() ?>/admin/mailsms_list" class="waves-effect">
                        <i class="ri-mail-line"></i>
                        <span>Email / SMS Alert</span>
                    </a>
                    </li>
                    <?php } ?>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-bar-chart-grouped-line"></i>
                            <span>Report</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if($rentreport){ ?>
                            <li><a href="<?php echo base_url('admin/rentreport'); ?>">Rental Report</a></li>
                            <?php } if($rented_report){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/rented_report">Tenant Report</a></li>
                            <?php } if($visitor_report){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/visitor_report">Visitors Report</a></li>
                            <?php } if($complain_report){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/complain_report">Complain Report</a></li>
                            <?php } if($unit_report){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/unit_report">Unit Status Report</a></li>
                            <?php } if($fundstatus){ ?>
                            <li><a href="<?php echo base_url('admin/fundstatus'); ?>">Fund Status</a></li>
                            <?php } if($billreport){ ?>
                            <li><a href="<?php echo base_url('admin/billreport'); ?>">Bill Report</a></li>
                            <?php } if($salaryreport){ ?>
                            <li><a href="<?php echo base_url('admin/salaryreport'); ?>">Salary Report</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-settings-2-line"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php  if($roleadd){ ?>
                        <li><a href="<?php echo base_url('admin/roleadd'); ?>">Roles Setup</a></li>
                        <?php } if($rolelist){ ?>
                        <li><a href="<?php echo base_url('admin/rolelist'); ?>">Roles List</a></li>
                        <?php } if($adduser){ ?>
                            <li><a href="<?php echo base_url('admin/adduser'); ?>">User Setup</a></li>
                            <?php } if($billsetup_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/billsetup_add">Bill Type Setup</a></li>
                            <?php } if($utility_setup){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/utility_setup">Utility Bill Setup</a></li>
                            <?php } if($membersetup_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/membersetup_add">Management Member Type</a></li>
                            <?php } if($monthsetup_add){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/monthsetup_add">Month Setup</a></li>
                            <?php } if($yearsetup){ ?>
                            <li><a href="<?php echo base_url('admin/yearsetup'); ?>">Year Setup</a></li>
                            <?php } if($currencysetup){ ?>
                            <li><a href="<?php echo base_url('admin/currencysetup'); ?>">Currency Setup</a></li>
                            <?php } if($systemsetup){ ?>
                            <li><a href="<?php echo base_url('admin/systemsetup'); ?>">System Setup</a></li>
                            <?php } if($notification_list){ ?>
                            <li><a href="<?php echo base_url() ?>/admin/notification_list">Notification Setup</a></li>
                            <?php } ?>
                        </ul>
                    </li>



                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">