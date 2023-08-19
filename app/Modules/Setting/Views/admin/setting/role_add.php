<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('setting/role.role_s'); ?> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('setting/role.role_s'); ?>  </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  
                <div class="row">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-body ">
                            <?php 
                        if (isset($success)) {
                            echo "<h4 style='color:red;text-align:center;'class='text-danger'>" . $success . "</h4>";
                        }
                        ?>
                            
                            <form action="<?= base_url('admin/roleadd')?>" method="POST"enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <label>* <?php echo lang('setting/role.role_n'); ?> :</label>
                                        <input type="text" class="form-control" name="role_name" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('role_name')) {
             echo $validation->getError('role_name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('setting/role.e_role_name'); ?>
                                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('setting/role.u_access'); ?> :</label><br>

                                    <br><label><?php echo lang('setting/role.homeandlogout'); ?> :</label><br>

                                    <!-- <input type="checkbox" id="account_mode" name="account_mode" value="account_mode">
                                    <label for="account_mode">Account Mode</label> -->

                                    <!-- <input type="checkbox" id="poperty_list" name="poperty_list" value="poperty_list">
                                    <label for="poperty_list">Property List</label> -->

                                    <input type="checkbox" id="poperty_add" name="poperty_add" value="poperty_add">
                                    <label for="poperty_add"><?php echo lang('setting/role.p_add'); ?></label>

                                    <input type="checkbox" id="poperty_images" name="poperty_images" value="poperty_images">
                                    <label for="poperty_images"><?php echo lang('setting/role.p_image'); ?></label>

                                    <input type="checkbox" id="mypackage" name="mypackage" value="mypackage">
                                    <label for="mypackage">My Package</label>

                                    <input type="checkbox" id="edit_package" name="edit_package" value="edit_package">
                                    <label for="edit_package">Edit Package</label>

                                    <input type="checkbox" id="make_payment" name="make_payment" value="make_payment">
                                    <label for="make_payment">Make Payment</label>

                                    <input type="checkbox" id="change_payment_confirm" name="change_payment_confirm" value="change_payment_confirm">
                                    <label for="change_payment_confirm">Change Payment Confirm</label>

                                    <!-- <input type="checkbox" id="index" name="index" value="index">
                                    <label for="index">Home</label> -->

                                    <!-- <input type="checkbox" id="logout" name="logout" value="logout">
                                    <label for="logout">Logut</label> -->

                                    <input type="checkbox" id="visitordetails" name="visitordetails" value="visitordetails">
                                    <label for="visitordetails"><?php echo lang('setting/role.v_details'); ?></label>

                                    <input type="checkbox" id="complaindetails" name="complaindetails" value="complaindetails">
                                    <label for="complaindetails"><?php echo lang('setting/role.c_details'); ?></label>

                                    

                                    <br><label><?php echo lang('setting/role.floor'); ?> :</label><br>
                                    <input type="checkbox" id="floor_l" name="floor_l" value="floor_list">
                                    <label for="floor_l"><?php echo lang('setting/role.f_list'); ?></label>

                                    <input type="checkbox" id="floor_a" name="floor_a" value="floor_add">
                                    <label for="floor_a"><?php echo lang('setting/role.f_add'); ?></label>

                                    <input type="checkbox" id="floor_e" name="floor_e" value="floor_edit">
                                    <label for="floor_e"><?php echo lang('setting/role.f_edit'); ?></label>

                                    <input type="checkbox" id="floor_d" name="floor_d" value="floor_delete">
                                    <label for="floor_d"><?php echo lang('setting/role.f_delete'); ?></label>



                                    <br><label><?php echo lang('setting/role.unit'); ?> :</label><br>
                                    <input type="checkbox" id="unit_l" name="unit_l" value="unit_list">
                                    <label for="unit_l"> <?php echo lang('setting/role.u_list'); ?></label>

                                    <input type="checkbox" id="unit_a" name="unit_a" value="unit_add">
                                    <label for="unit_a"> <?php echo lang('setting/role.u_add'); ?></label>

                                    <input type="checkbox" id="unit_e" name="unit_e" value="unit_edit">
                                    <label for="unit_e"><?php echo lang('setting/role.u_edit'); ?></label>

                                    <input type="checkbox" id="unit_d" name="unit_d" value="unit_delete">
                                    <label for="unit_d"><?php echo lang('setting/role.u_delete'); ?></label>



                                    <br><label><?php echo lang('setting/role.owner'); ?> :</label><br>
                                    <input type="checkbox" id="owner_l" name="owner_l" value="ownerlist">
                                    <label for="owner_l"><?php echo lang('setting/role.owner_l'); ?> </label>

                                    <input type="checkbox" id="owner_a" name="owner_a" value="owneradd">
                                    <label for="owner_a"><?php echo lang('setting/role.owner_a'); ?> </label>

                                    <input type="checkbox" id="owner_e" name="owner_e" value="ownerupdate">
                                    <label for="owner_e"><?php echo lang('setting/role.owner_e'); ?> </label>

                                    <input type="checkbox" id="owner_d" name="owner_d" value="ownerdelete">
                                    <label for="owner_d"><?php echo lang('setting/role.owner_d'); ?> </label>

                                    <input type="checkbox" id="indivusualowner" name="indivusualowner" value="indivusualowner">
                                    <label for="indivusualowner"><?php echo lang('setting/role.owner_v'); ?> </label>



                                    <br><label><?php echo lang('setting/role.tenant'); ?> :</label><br>
                                    <input type="checkbox" id="tenant_l" name="tenant_l" value="tenant_list">
                                    <label for="tenant_l"><?php echo lang('setting/role.t_list'); ?>  </label>

                                    <input type="checkbox" id="tenant_a" name="tenant_a" value="tenant_add">
                                    <label for="tenant_a"><?php echo lang('setting/role.t_add'); ?> </label>

                                    <input type="checkbox" id="tenant_e" name="tenant_e" value="tenant_edit">
                                    <label for="tenant_e"><?php echo lang('setting/role.t_edit'); ?>  </label>

                                    <input type="checkbox" id="tenant_d" name="tenant_d" value="tenant_delete">
                                    <label for="tenant_d"> <?php echo lang('setting/role.t_delete'); ?> </label>

                                    <input type="checkbox" id="tenant_view" name="tenant_view" value="tenant_view">
                                    <label for="tenant_view"><?php echo lang('setting/role.t_view'); ?> </label>

                                    <input type="checkbox" id="tenant_depand" name="tenant_depand" value="tenant_depand">
                                    <label for="tenant_depand"><?php echo lang('setting/role.t_i_g'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.employee'); ?> :</label><br>
                                    <input type="checkbox" id="employee_l" name="employee_l" value="employeelist">
                                    <label for="employee_l"><?php echo lang('setting/role.e_list'); ?> </label>

                                    <input type="checkbox" id="employee_a" name="employee_a" value="addemployee">
                                    <label for="employee_a"> <?php echo lang('setting/role.e_add'); ?> </label>

                                    <input type="checkbox" id="employee_e" name="employee_e" value="employeeupdate">
                                    <label for="employee_e"> <?php echo lang('setting/role.e_edit'); ?> </label>

                                    <input type="checkbox" id="employee_d" name="employee_d" value="employeedelete">
                                    <label for="employee_d"> <?php echo lang('setting/role.e_delete'); ?> </label>

                                    <input type="checkbox" id="indivisualemployee" name="indivisualemployee" value="indivisualemployee">
                                    <label for="indivisualemployee"><?php echo lang('setting/role.e_view'); ?> </label>



                                    <br><label><?php echo lang('setting/role.emp_salary'); ?> :</label><br>
                                    <input type="checkbox" id="emp_salary_addandlist" name="emp_salary_addandlist" value="employeesalary">
                                    <label for="emp_salary_addandlist"> <?php echo lang('setting/role.s_list'); ?> </label>

                                    <input type="checkbox" id="getindivisualemployee" name="getindivisualemployee" value="getindivisualemployee">
                                    <label for="getindivisualemployee"><?php echo lang('setting/role.get_emp'); ?> </label>

                                    <input type="checkbox" id="emp_salaery_e" name="emp_salaery_e" value="employeesalaryupdate">
                                    <label for="emp_salaery_e"> <?php echo lang('setting/role.s_edit'); ?> </label>

                                    <input type="checkbox" id="emp_salaery_d" name="emp_salaery_d" value="employeesalarydelete">
                                    <label for="emp_salaery_d"><?php echo lang('setting/role.s_delete'); ?> </label>

                                    <input type="checkbox" id="indivisualemployeesalary" name="indivisualemployeesalary" value="indivisualemployeesalary">
                                    <label for="indivisualemployeesalary"><?php echo lang('setting/role.s_view'); ?> </label>


                                    <br><label><?php echo lang('setting/role.e_leave'); ?>  :</label><br>
                                    <input type="checkbox" id="employeeleave" name="employeeleave" value="employeeleave">
                                    <label for="employeeleave"><?php echo lang('setting/role.e_leave'); ?> </label>



                                    <br><label><?php echo lang('setting/role.r_colect'); ?>  :</label><br>
                                    <input type="checkbox" id="rent_l" name="rent_l" value="rentlist">
                                    <label for="rent_l"> <?php echo lang('setting/role.rent_l'); ?> </label>

                                    <input type="checkbox" id="rent_a" name="rent_a" value="addrent">
                                    <label for="rent_a"> <?php echo lang('setting/role.rent_a'); ?> </label>

                                    <input type="checkbox" id="gettenent" name="gettenent" value="gettenent">
                                    <label for="gettenent"><?php echo lang('setting/role.get_tenant'); ?> </label>

                                    <input type="checkbox" id="rent_e" name="rent_e" value="rentupdate">
                                    <label for="rent_e"> <?php echo lang('setting/role.rent_e'); ?>  </label>

                                    <input type="checkbox" id="rent_d" name="rent_d" value="rentdelete">
                                    <label for="rent_d"> <?php echo lang('setting/role.rent_d'); ?> </label>

                                    <input type="checkbox" id="indivusualrent" name="indivusualrent" value="indivusualrent">
                                    <label for="indivusualrent"><?php echo lang('setting/role.rent_v'); ?> </label>

                                    <input type="checkbox" id="rentinvoice" name="rentinvoice" value="rentinvoice">
                                    <label for="rentinvoice"><?php echo lang('setting/role.rent_i'); ?> </label>

                                    <input type="checkbox" id="printrentinvoice" name="printrentinvoice" value="printrentinvoice">
                                    <label for="printrentinvoice"><?php echo lang('setting/role.p_rent_i'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.owner_u'); ?>  :</label><br>
                                    <input type="checkbox" id="utility_l" name="utility_l" value="ownerutilitylist">
                                    <label for="utility_l"><?php echo lang('setting/role.utility_l'); ?>  </label>

                                    <input type="checkbox" id="utility_a" name="utility_a" value="ownerutilityadd">
                                    <label for="utility_a"><?php echo lang('setting/role.utility_a'); ?>  </label>

                                    <input type="checkbox" id="getunits" name="getunits" value="getunits">
                                    <label for="getunits"> <?php echo lang('setting/role.g_units'); ?> </label>

                                    <input type="checkbox" id="getowner" name="getowner" value="getowner">
                                    <label for="getowner"><?php echo lang('setting/role.g_owner'); ?>  </label>

                                    <input type="checkbox" id="utility_e" name="utility_e" value="ownerutilityupdate">
                                    <label for="utility_e"> <?php echo lang('setting/role.utility_e'); ?> </label>

                                    <input type="checkbox" id="utility_d" name="utility_d" value="ownerutilitydelete">
                                    <label for="utility_d"> <?php echo lang('setting/role.utility_d'); ?> </label>

                                    <input type="checkbox" id="indivusualutility" name="indivusualutility" value="indivusualutility">
                                    <label for="indivusualutility"<?php echo lang('setting/role.o_u_v'); ?>>  </label>



                                    <br><label> <?php echo lang('setting/role.maintenance_cost'); ?> :</label><br>
                                    <input type="checkbox" id="cost_l" name="cost_l" value="maintenance_list">
                                    <label for="cost_l"> <?php echo lang('setting/role.cost_l'); ?> </label>

                                    <input type="checkbox" id="cost_a" name="cost_a" value="maintenance_add">
                                    <label for="cost_a"> <?php echo lang('setting/role.cost_a'); ?> </label>

                                    <input type="checkbox" id="cost_e" name="cost_e" value="maintenance_edit">
                                    <label for="cost_e"> <?php echo lang('setting/role.cost_e'); ?> </label>

                                    <input type="checkbox" id="cost_d" name="cost_d" value="maintenance_delete">
                                    <label for="cost_d"> <?php echo lang('setting/role.cost_d'); ?> </label>

                                    <input type="checkbox" id="maintenance_view" name="maintenance_view" value="maintenance_view">
                                    <label for="maintenance_view"><?php echo lang('setting/role.cost_v'); ?> </label>



                                    <br><label><?php echo lang('setting/role.management_committee'); ?>  :</label><br>
                                    <input type="checkbox" id="committee_l" name="committee_l" value="committee_list">
                                    <label for="committee_l"><?php echo lang('setting/role.committee_l'); ?>  List</label>

                                    <input type="checkbox" id="committee_a" name="committee_a" value="committee_add">
                                    <label for="committee_a"> <?php echo lang('setting/role.committee_a'); ?> </label>

                                    <input type="checkbox" id="committee_e" name="committee_e" value="committee_edit">
                                    <label for="committee_e"><?php echo lang('setting/role.committee_e'); ?>  </label>

                                    <input type="checkbox" id="committee_d" name="committee_d" value="committee_delete">
                                    <label for="committee_d"><?php echo lang('setting/role.committee_d'); ?>  </label>

                                    <input type="checkbox" id="committee_view" name="committee_view" value="committee_view">
                                    <label for="committee_view"><?php echo lang('setting/role.committee_v'); ?> </label>



                                    <br><label><?php echo lang('setting/role.apartment_fund'); ?>  :</label><br>
                                    <input type="checkbox" id="fund_l" name="fund_l" value="fundlist">
                                    <label for="fund_l"> <?php echo lang('setting/role.fund_l'); ?> </label>

                                    <input type="checkbox" id="fund_a" name="fund_a" value="addfund">
                                    <label for="fund_a"><?php echo lang('setting/role.fund_a'); ?>  </label>

                                    <input type="checkbox" id="fund_e" name="fund_e" value="fundupdate">
                                    <label for="fund_e"> <?php echo lang('setting/role.fund_e'); ?> </label>

                                    <input type="checkbox" id="fund_d" name="fund_d" value="funddelete">
                                    <label for="fund_d"> <?php echo lang('setting/role.fund_d'); ?> </label>

                                    <input type="checkbox" id="indivisualfund" name="indivisualfund" value="indivisualfund">
                                    <label for="indivisualfund"> <?php echo lang('setting/role.fund_v'); ?> </label>

                                    <input type="checkbox" id="invoice" name="invoice" value="invoice">
                                    <label for="invoice"><?php echo lang('setting/role.bill_i'); ?> </label>

                                    <input type="checkbox" id="printfundinvoice" name="printfundinvoice" value="printfundinvoice">
                                    <label for="printfundinvoice"> <?php echo lang('setting/role.ptint_i'); ?> </label>


                                    
                                    <br><label><?php echo lang('setting/role.bill_deposit'); ?>  :</label><br>
                                    <input type="checkbox" id="bill_l" name="bill_l" value="billdipositlist">
                                    <label for="bill_l"><?php echo lang('setting/role.bill_l'); ?>  </label>

                                    <input type="checkbox" id="bill_a" name="bill_a" value="addbill">
                                    <label for="bill_a"> <?php echo lang('setting/role.bill_a'); ?> </label>

                                    <input type="checkbox" id="bill_e" name="bill_e" value="billupdate">
                                    <label for="bill_e"><?php echo lang('setting/role.bill_e'); ?>  </label>

                                    <input type="checkbox" id="bill_d" name="bill_d" value="billdelete">
                                    <label for="bill_d"><?php echo lang('setting/role.bill_d'); ?>  </label>

                                    <input type="checkbox" id="indivisualbill" name="indivisualbill" value="indivisualbill">
                                    <label for="indivisualbill"><?php echo lang('setting/role.bill_v'); ?> </label>



                                    <br><label><?php echo lang('setting/role.complain'); ?> :</label><br>
                                    <input type="checkbox" id="complain_l" name="complain_l" value="complain_list">
                                    <label for="complain_l"> <?php echo lang('setting/role.complain_l'); ?> </label>

                                    <input type="checkbox" id="complain_a" name="complain_a" value="complain_add">
                                    <label for="complain_a"><?php echo lang('setting/role.complain_a'); ?>  </label>

                                    <input type="checkbox" id="complain_e" name="complain_e" value="complain_edit">
                                    <label for="complain_e"> <?php echo lang('setting/role.complain_e'); ?> </label>

                                    <input type="checkbox" id="complain_d" name="complain_d" value="complain_delete">
                                    <label for="complain_d"> <?php echo lang('setting/role.complain_d'); ?> </label>

                                    <input type="checkbox" id="complain_view" name="complain_view" value="complain_view">
                                    <label for="complain_view"><?php echo lang('setting/role.complain_v'); ?> </label>

                                    <input type="checkbox" id="solution_add" name="solution_add" value="solution_add">
                                    <label for="solution_add"><?php echo lang('setting/role.solution_a'); ?> </label>
                                    
                                    <input type="checkbox" id="complain_solution" name="complain_solution" value="complain_solution">
                                    <label for="complain_solution">complain_solution</label>

                                    <input type="checkbox" id="assign_employee" name="assign_employee" value="assign_employee">
                                    <label for="assign_employee"><?php echo lang('setting/role.assign_emp'); ?> </label>

                                    <input type="checkbox" id="get_employee" name="get_employee" value="get_employee">
                                    <label for="get_employee"><?php echo lang('setting/role.assign_c'); ?> </label>



                                    <br><label><?php echo lang('setting/role.visitor'); ?> :</label><br>
                                    <input type="checkbox" id="visitor_l" name="visitor_l" value="visitor_list">
                                    <label for="visitor_l"> <?php echo lang('setting/role.visitor_l'); ?> </label>

                                    <input type="checkbox" id="visitor_a" name="visitor_a" value="visitor_add">
                                    <label for="visitor_a"> <?php echo lang('setting/role.visitor_a'); ?> </label>

                                    <input type="checkbox" id="visitor_e" name="visitor_e" value="visitor_edit">
                                    <label for="visitor_e"><?php echo lang('setting/role.visitor_e'); ?>  </label>

                                    <input type="checkbox" id="visitor_d" name="visitor_d" value="visitor_delete">
                                    <label for="visitor_d"><?php echo lang('setting/role.visitor_d'); ?>  </label>

                                    <input type="checkbox" id="visitor_info" name="visitor_info" value="getUnits">
                                    <label for="visitor_info"><?php echo lang('setting/role.get_units'); ?>  </label>





                                    <br><label><?php echo lang('setting/role.meeting'); ?> :</label><br>
                                    <input type="checkbox" id="meeting_l" name="meeting_l" value="meeting_list">
                                    <label for="meeting_l"><?php echo lang('setting/role.meeting_l'); ?>  </label>

                                    <input type="checkbox" id="meeting_a" name="meeting_a" value="meeting_add">
                                    <label for="meeting_a"><?php echo lang('setting/role.meeting_a'); ?>  </label>

                                    <input type="checkbox" id="meeting_e" name="meeting_e" value="meeting_edit">
                                    <label for="meeting_e"><?php echo lang('setting/role.meeting_e'); ?>  </label>

                                    <input type="checkbox" id="meeting_d" name="meeting_d" value="meeting_delete">
                                    <label for="meeting_d"> <?php echo lang('setting/role.meeting_d'); ?> </label>

                                    <input type="checkbox" id="meeting_view" name="meeting_view" value="meeting_view">
                                    <label for="meeting_view"><?php echo lang('setting/role.meeting_v'); ?> </label>



                                    <br><label><?php echo lang('setting/role.notice_board'); ?> :</label><br>
                                    <input type="checkbox" id="notice_addlist" name="notice_addlist" value="addnotice">
                                    <label for="notice_addlist"> <?php echo lang('setting/role.n_a_a_l'); ?></label>

                                    <input type="checkbox" id="notice_e" name="notice_e" value="noticeupdate">
                                    <label for="notice_e"> <?php echo lang('setting/role.notice_e'); ?> </label>

                                    <input type="checkbox" id="notice_d" name="notice_d" value="noticedelete">
                                    <label for="notice_d"><?php echo lang('setting/role.notice_d'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.e_a_s_a'); ?>:</label><br>
                                    <input type="checkbox" id="mailsms_list" name="mailsms_list" value="mailsms_list">
                                    <label for="mailsms_list"> <?php echo lang('setting/role.e_s_l'); ?></label>

                                    <input type="checkbox" id="mailsms_add" name="mailsms_add" value="mailsms_add">
                                    <label for="mailsms_add"> <?php echo lang('setting/role.e_s_a'); ?></label>

                                    <input type="checkbox" id="mailsms_edit" name="mailsms_edit" value="mailsms_edit">
                                    <label for="mailsms_edit"><?php echo lang('setting/role.e_s_e'); ?> </label>

                                    <input type="checkbox" id="mailsms_delete" name="mailsms_delete" value="mailsms_delete">
                                    <label for="mailsms_delete"><?php echo lang('setting/role.e_s_d'); ?> </label>


                                    
                                    <br><label><?php echo lang('setting/role.Reports'); ?> :</label><br>

                                    <br><label><?php echo lang('setting/role.rent_r'); ?>  :</label><br>
                                    <input type="checkbox" id="rent_r" name="rent_r" value="rentreport">
                                    <label for="rent_r"> <?php echo lang('setting/role.rent_r'); ?> </label>

                                    <input type="checkbox" id="rentinfo" name="rentinfo" value="rentinfo">
                                    <label for="printrentreport"><?php echo lang('setting/role.i_rent_r'); ?>  </label>

                                    <input type="checkbox" id="printrentreport" name="printrentreport" value="printrentreport">
                                    <label for="printrentreport"><?php echo lang('setting/role.print_r_r'); ?>  </label>

                                    <input type="checkbox" id="rentinfo_pdf" name="rentinfo_pdf" value="rentinfo_pdf">
                                    <label for="rentinfo_pdf"><?php echo lang('setting/role.pdf_r_r'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.tnant_r'); ?> :</label><br>
                                    <input type="checkbox" id="tenant_r" name="tenant_r" value="rented_report">
                                    <label for="tenant_r"><?php echo lang('setting/role.tnant_r'); ?>  </label>

                                    <input type="checkbox" id="rentedprint_report" name="rentedprint_report" value="rentedprint_report">
                                    <label for="rentedprint_report"><?php echo lang('setting/role.print_t_r'); ?>  </label>

                                    <input type="checkbox" id="rented_pdf" name="rented_pdf" value="rented_pdf">
                                    <label for="rented_pdf"> <?php echo lang('setting/role.pdf_t_r'); ?> </label>



                                    <br><label><?php echo lang('setting/role.visitor_r'); ?>:</label><br>
                                    <input type="checkbox" id="visitor_r" name="visitor_r" value="visitor_report">
                                    <label for="visitor_r"><?php echo lang('setting/role.visitor_r'); ?>  </label>

                                    <input type="checkbox" id="visitorprint_report" name="visitorprint_report" value="visitorprint_report">
                                    <label for="visitorprint_report"><?php echo lang('setting/role.print_v_r'); ?>  </label>

                                    <input type="checkbox" id="visitor_pdf" name="visitor_pdf" value="visitor_pdf">
                                    <label for="visitor_pdf"><?php echo lang('setting/role.pdf_v_r'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.complain_r'); ?> :</label><br>
                                    <input type="checkbox" id="complain_r" name="complain_r" value="complain_report">
                                    <label for="complain_r"><?php echo lang('setting/role.complain_r'); ?>  </label>

                                    <input type="checkbox" id="complainprint_report" name="complainprint_report" value="complainprint_report">
                                    <label for="complainprint_report"><?php echo lang('setting/role.print_c_r'); ?>  </label>

                                    <input type="checkbox" id="complain_pdf" name="complain_pdf" value="complain_pdf">
                                    <label for="complain_pdf"><?php echo lang('setting/role.pdf_c_r'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.unit_r'); ?> :</label><br>
                                    <input type="checkbox" id="unit_r" name="unit_r" value="unit_report">
                                    <label for="unit_r"><?php echo lang('setting/role.unit_r'); ?>   </label>

                                    <input type="checkbox" id="unitprint_report" name="unitprint_report" value="unitprint_report">
                                    <label for="unitprint_report"><?php echo lang('setting/role.print_u_r'); ?>  </label>

                                    <input type="checkbox" id="unit_pdf" name="unit_pdf" value="unit_pdf">
                                    <label for="unit_pdf"><?php echo lang('setting/role.pdf_u_r'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.fund_r'); ?> :</label><br>
                                    <input type="checkbox" id="fund_r" name="fund_r" value="fundstatus">
                                    <label for="fund_r"> <?php echo lang('setting/role.fund_r'); ?> </label>

                                    <input type="checkbox" id="rentinfo" name="rentinfo" value="rentinfo">
                                    <label for="rentinfo"><?php echo lang('setting/role.fund_s'); ?>  </label>

                                    <input type="checkbox" id="printfundstatus" name="printfundstatus" value="printfundstatus">
                                    <label for="printfundstatus"><?php echo lang('setting/role.print_f_s'); ?>  </label>

                                    <input type="checkbox" id="fundstatus_pdf" name="fundstatus_pdf" value="fundstatus_pdf">
                                    <label for="fundstatus_pdf"><?php echo lang('setting/role.pdf_f_s'); ?>  </label>



                                    



                                    <br><label><?php echo lang('setting/role.bill_report'); ?>  :</label><br>
                                    <input type="checkbox" id="bill_r" name="bill_r" value="billreport">
                                    <label for="bill_r"><?php echo lang('setting/role.bill_report'); ?>  </label>

                                    <input type="checkbox" id="billinfo" name="billinfo" value="billinfo">
                                    <label for="billinfo"><?php echo lang('setting/role.info_b_r'); ?>  </label>

                                    <input type="checkbox" id="printbillreport" name="printbillreport" value="printbillreport">
                                    <label for="printbillreport"><?php echo lang('setting/role.print_b_r'); ?>  </label>

                                    <input type="checkbox" id="billinfo_pdf" name="billinfo_pdf" value="billinfo_pdf">
                                    <label for="billinfo_pdf"><?php echo lang('setting/role.pdf_b_r'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.emp_s_r'); ?>   :</label><br>
                                    <input type="checkbox" id="salary_r" name="salary_r" value="salaryreport">
                                    <label for="salary_r"> <?php echo lang('setting/role.salary_r'); ?> </label>

                                    <input type="checkbox" id="salaryinfo" name="salaryinfo" value="salaryinfo">
                                    <label for="salaryinfo"><?php echo lang('setting/role.print_s_r'); ?>  </label>

                                    <input type="checkbox" id="salaryinfo_pdf" name="salaryinfo_pdf" value="salaryinfo_pdf">
                                    <label for="salaryinfo_pdf"><?php echo lang('setting/role.pdf_s_r'); ?>  </label>




                                    <br><label><?php echo lang('setting/role.setting'); ?> :</label><br>

                                    <br><label><?php echo lang('setting/role.user'); ?> :</label><br>
                                    <input type="checkbox" id="user_addlist" name="user_addlist" value="adduser">
                                    <label for="user_addlist"> <?php echo lang('setting/role.u_a_a_l'); ?>   </label>

                                    <input type="checkbox" id="user_e" name="user_e" value="userupdate">
                                    <label for="user_e"> <?php echo lang('setting/role.user_e'); ?> </label>

                                    <input type="checkbox" id="user_d" name="user_d" value="userdelete">
                                    <label for="user_d"><?php echo lang('setting/role.user_d'); ?>  </label>

                                    <input type="checkbox" id="indivusualuser" name="indivusualuser" value="indivusualuser">
                                    <label for="indivusualuser"><?php echo lang('setting/role.user_v'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.b_t_s'); ?>   :</label><br>
                                    <input type="checkbox" id="billtype_addlist" name="billtype_addlist" value="billsetup_add">
                                    <label for="billtype_addlist"> <?php echo lang('setting/role.b_t_a_a_l'); ?>    </label>

                                    <input type="checkbox" id="billtype_e" name="billtype_e" value="billsetup_edit">
                                    <label for="billtype_e"><?php echo lang('setting/role.bill_t_e'); ?> Bill  </label>

                                    <input type="checkbox" id="billtype_d" name="billtype_d" value="billsetup_delete">
                                    <label for="billtype_d"> <?php echo lang('setting/role.bill_t_d'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.utility_b_s'); ?> :</label><br>
                                    <input type="checkbox" id="utilitybill_addlist" name="utilitybill_addlist" value="utility_setup">
                                    <label for="utilitybill_addlist"><?php echo lang('setting/role.utility_b_u'); ?> </label>



                                    <br><label><?php echo lang('setting/role.m_member_t'); ?>  :</label><br>
                                    <input type="checkbox" id="membersetup_add" name="membersetup_add" value="membersetup_add">
                                    <label for="membersetup_add"><?php echo lang('setting/role.m_s_a_a_l'); ?> </label>

                                    <input type="checkbox" id="membersetup_edit" name="membersetup_edit" value="membersetup_edit">
                                    <label for="membersetup_edit"><?php echo lang('setting/role.member_s_e'); ?>   </label>

                                    <input type="checkbox" id="membersetup_delete" name="membersetup_delete" value="membersetup_delete">
                                    <label for="membersetup_delete"> <?php echo lang('setting/role.member_s_d'); ?>  </label>



                                    <br><label> <?php echo lang('setting/role.year_s'); ?> :</label><br>
                                    <input type="checkbox" id="yearsetup" name="yearsetup" value="yearsetup">
                                    <label for="yearsetup"><?php echo lang('setting/role.y_s_a_a_l'); ?>   </label>

                                    <input type="checkbox" id="yearupdate" name="yearupdate" value="yearupdate">
                                    <label for="yearupdate"><?php echo lang('setting/role.year_s_e'); ?>   </label>

                                    <input type="checkbox" id="yeardelete" name="yeardelete" value="yeardelete">
                                    <label for="yeardelete"><?php echo lang('setting/role.year_s_d'); ?>   </label>



                                    <br><label><?php echo lang('setting/role.month_s'); ?>  :</label><br>
                                    <input type="checkbox" id="monthsetup_add" name="monthsetup_add" value="monthsetup_add">
                                    <label for="monthsetup_add"><?php echo lang('setting/role.m_s_a_a_l'); ?>   </label>

                                    <input type="checkbox" id="monthsetup_edit" name="monthsetup_edit" value="monthsetup_edit">
                                    <label for="monthsetup_edit"><?php echo lang('setting/role.month_s_e'); ?>   </label>

                                    <input type="checkbox" id="monthsetup_delete" name="monthsetup_delete" value="monthsetup_delete">
                                    <label for="monthsetup_delete"> <?php echo lang('setting/role.month_s_d'); ?></label>



                                    <br><label><?php echo lang('setting/role.currency_s'); ?>:</label><br>
                                    <input type="checkbox" id="currencysetup" name="currencysetup" value="currencysetup">
                                    <label for="currencysetup"><?php echo lang('setting/role.c_s_a_a_l'); ?> </label>

                                    <input type="checkbox" id="currencyupdate" name="currencyupdate" value="currencyupdate">
                                    <label for="currencyupdate"> <?php echo lang('setting/role.currency_s_e'); ?></label>

                                    <input type="checkbox" id="currencydelete" name="currencydelete" value="currencydelete">
                                    <label for="currencydelete"><?php echo lang('setting/role.currency_s_d'); ?> </label>



                                    <br><label><?php echo lang('setting/role.system_s'); ?>:</label><br>

                                    <input type="checkbox" id="systemsetup" name="systemsetup" value="systemsetup">
                                    <label for="systemsetup"><?php echo lang('setting/role.s_s_a_a_l'); ?> </label>

                                    <input type="checkbox" id="currencysetting" name="currencysetting" value="currencysetting">
                                    <label for="currencysetting"> <?php echo lang('setting/role.currency_setting'); ?> </label>

                                    <input type="checkbox" id="languagesetting" name="languagesetting" value="languagesetting">
                                    <label for="languagesetting"><?php echo lang('setting/role.language_setting'); ?> </label>

                                    <input type="checkbox" id="emailsetting" name="emailsetting" value="emailsetting">
                                    <label for="emailsetting"><?php echo lang('setting/role.email_setting'); ?> </label>

                                    <input type="checkbox" id="smssetting" name="smssetting" value="smssetting">
                                    <label for="smssetting"><?php echo lang('setting/role.sms_setting'); ?> </label>

                                    <input type="checkbox" id="datesetting" name="datesetting" value="datesetting">
                                    <label for="datesetting"><?php echo lang('setting/role.date_setting'); ?> </label>



                                    <br><label><?php echo lang('setting/role.role_s'); ?>  :</label><br>
                                    <input type="checkbox" id="roleadd" name="roleadd" value="roleadd">
                                    <label for="roleadd"><?php echo lang('setting/role.role_s_a'); ?>   </label>


                                    <input type="checkbox" id="rolelist" name="rolelist" value="rolelist">
                                    <label for="rolelist"> <?php echo lang('setting/role.role_l'); ?> </label>

                                    <input type="checkbox" id="roleupdate" name="roleupdate" value="roleupdate">
                                    <label for="roleupdate"><?php echo lang('setting/role.role_s_e'); ?>   </label>

                                    <input type="checkbox" id="roledelete" name="roledelete" value="roledelete">
                                    <label for="roledelete"> <?php echo lang('setting/role.role_s_d'); ?>  </label>

                                    <input type="checkbox" id="view_access" name="view_access" value="view_access">
                                    <label for="view_access"><?php echo lang('setting/role.role_v'); ?>  </label>



                                    <br><label><?php echo lang('setting/role.notification_s'); ?>  :</label><br>
                                    <input type="checkbox" id="notification_list" name="notification_list" value="notification_list">
                                    <label for="notification_list"><?php echo lang('setting/role.notification_list'); ?> </label>

                                    <input type="checkbox" id="notification_edit" name="notification_edit" value="notification_edit">
                                    <label for="notification_edit"><?php echo lang('setting/role.notification_model'); ?> </label>

                                    <input type="checkbox" id="notification_update" name="notification_update" value="notification_update">
                                    <label for="notification_update"><?php echo lang('setting/role.notification_update'); ?> </label>

                                    
                                    <br><label>Header :</label><br>
                                    <input type="checkbox" id="get_notification" name="get_notification" value="get_notification">
                                    <label for="get_notification">Get notification</label>

                                    <input type="checkbox" id="notification_view" name="notification_view" value="notification_view">
                                    <label for="notification_view">View notification</label>

                                    <input type="checkbox" id="update_notification" name="update_notification" value="update_notification">
                                    <label for="update_notification">Notification Update</label>

                                    <input type="checkbox" id="profile" name="profile" value="profile">
                                    <label for="profile">Profile</label>

                                    </div>
                                    
                                   
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="reset" class="btn btn-warning btn-rounded" value="Reset" name="">
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/role.created'); ?></button>
                                </div>
                            </form>
                             
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> 
                <!-- end col -->
            </div>
            <!-- end row -->
            
            
            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Admin Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">
                        <h3>John Peterson</h3>
                    </div>
                    <hr>
                    <h4>Details Infromation</h4>
                    <div class="row">
                        <div class="col-md-12"> 
                            Name : Tony<br>
                            Email : tony@yahoo.com<br>
                            Contact : +8801679110711<br>
                            Branch : Home<br>
                            Password : 123456<br>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<?php echo $this->endSection('content') ?>