<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-s<?php echo lang('setting/role.role_s'); ?>m-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('setting/role.Role_update'); ?> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('setting/role.Role_update'); ?>   </li>
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
                           
                            
                            <form action="<?= base_url('admin/roleupdate/'.$role['id'])?>" method="POST"enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    
                                    <div class="col-md-12 mt-4">
                                        <label>* <?php echo lang('setting/role.role_n'); ?>:</label>
                                        <input type="text" class="form-control" name="role_name" value="<?=$role['role_name'];?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('role_name')) {
                                          echo $validation->getError('role_name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('setting/role.role_n'); ?>
                                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('setting/role.u_access'); ?> :</label><br>
                                        <?php 
                                        $user_access= json_decode($role['user_access']);
                                        //print_r($user_access); echo "hello";
                                        ?>

                            <br><label><?php echo lang('setting/role.homeandlogout'); ?> :</label><br>

                            <!-- <input type="checkbox" id="account_mode" name="account_mode" value="account_mode"
                            <?php 
                            // if(!empty($user_access->account_mode)){
                            //     echo "Checked";
                            // }
                            ?>
                            >
                            <label for="account_mode">Account Mode</label> -->

                            <!-- <input type="checkbox" id="poperty_list" name="poperty_list" value="poperty_list"
                            <?php 
                            // if(!empty($user_access->poperty_list)){
                            //     echo "Checked";
                            // }
                            ?>
                            >
                            <label for="poperty_list">Property List</label> -->

                            <input type="checkbox" id="poperty_add" name="poperty_add" value="poperty_add"
                            <?php 
                            if(!empty($user_access->poperty_add)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="poperty_add"><?php echo lang('setting/role.p_add'); ?></label>

                            <input type="checkbox" id="poperty_images" name="poperty_images" value="poperty_images"
                            <?php 
                            if(!empty($user_access->poperty_images)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="poperty_images"><?php echo lang('setting/role.p_image'); ?></label>

                            <input type="checkbox" id="mypackage" name="mypackage" value="mypackage"
                            <?php 
                            if(!empty($user_access->mypackage)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="mypackage">My Package</label>


                            <input type="checkbox" id="edit_package" name="edit_package" value="edit_package"
                            <?php 
                            if(!empty($user_access->edit_package)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="edit_package">Edit Package</label>


                            <input type="checkbox" id="make_payment" name="make_payment" value="make_payment"
                            <?php 
                            if(!empty($user_access->make_payment)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="make_payment">Make Payment</label>

                            <input type="checkbox" id="change_payment_confirm" name="change_payment_confirm" value="change_payment_confirm"
                            <?php 
                            if(!empty($user_access->change_payment_confirm)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="change_payment_confirm">Change Payment Confirm</label>
                            

                            <!-- <input type="checkbox" id="index" name="index" value="index"
                            <?php 
                            // if(!empty($user_access->index)){
                            //     echo "Checked";
                            // }
                            ?>
                            >
                            <label for="index">Home</label> -->

                            <!-- <input type="checkbox" id="logout" name="logout" value="logout"
                            <?php 
                            // if(!empty($user_access->logout)){
                            //     echo "Checked";
                            // }
                            ?>
                            >
                            <label for="logout">Logut</label> -->

                            <input type="checkbox" id="visitordetails" name="visitordetails" value="visitordetails"
                            <?php 
                            if(!empty($user_access->visitordetails)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitordetails"><?php echo lang('setting/role.v_details'); ?></label>

                            <input type="checkbox" id="complaindetails" name="complaindetails" value="complaindetails"
                            
                            <?php 
                            if(!empty($user_access->complaindetails)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complaindetails"><?php echo lang('setting/role.c_details'); ?></label>


                                       
                            <br><label><?php echo lang('setting/role.floor'); ?> :</label><br>
                            <input type="checkbox" id="floor_l" name="floor_l" value="floor_list"
                            <?php 
                            if(!empty($user_access->floor_l)){
                                echo "Checked";
                            }
                            ?>
                            >


                            <label for="floor_l"><?php echo lang('setting/role.f_list'); ?></label>

                            <input type="checkbox" id="floor_a" name="floor_a" value="floor_add"
                            <?php 
                            if(!empty($user_access->floor_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="floor_a"><?php echo lang('setting/role.f_add'); ?></label>

                            <input type="checkbox" id="floor_e" name="floor_e" value="floor_edit"
                            <?php 
                            if(!empty($user_access->floor_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="floor_e"><?php echo lang('setting/role.f_edit'); ?> </label>

                            <input type="checkbox" id="floor_d" name="floor_d" value="floor_delete"
                            <?php 
                            if(!empty($user_access->floor_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="floor_d"><?php echo lang('setting/role.f_delete'); ?></label>



                            <br><label>Unit :</label><br>
                            <input type="checkbox" id="unit_l" name="unit_l" value="unit_list"
                            <?php 
                            if(!empty($user_access->unit_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unit_l"><?php echo lang('setting/role.u_list'); ?></label>

                            <input type="checkbox" id="unit_a" name="unit_a" value="unit_add"
                            <?php 
                            if(!empty($user_access->unit_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unit_a"> <?php echo lang('setting/role.u_add'); ?></label>

                            <input type="checkbox" id="unit_e" name="unit_e" value="unit_edit"
                            <?php 
                            if(!empty($user_access->unit_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unit_e"><?php echo lang('setting/role.u_edit'); ?></label>

                            <input type="checkbox" id="unit_d" name="unit_d" value="unit_delete"
                            <?php 
                            if(!empty($user_access->unit_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unit_d"><?php echo lang('setting/role.u_delete'); ?></label>




                            <br><label><?php echo lang('setting/role.owner'); ?> :</label><br>
                            <input type="checkbox" id="owner_l" name="owner_l" value="ownerlist"
                            <?php 
                            if(!empty($user_access->owner_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="owner_l"><?php echo lang('setting/role.owner_l'); ?></label>

                            <input type="checkbox" id="owner_a" name="owner_a" value="owneradd"
                            <?php 
                            if(!empty($user_access->owner_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="owner_a"><?php echo lang('setting/role.owner_a'); ?></label>

                            <input type="checkbox" id="owner_e" name="owner_e" value="ownerupdate"
                            <?php 
                            if(!empty($user_access->owner_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="owner_e"><?php echo lang('setting/role.owner_e'); ?></label>

                            <input type="checkbox" id="owner_d" name="owner_d" value="ownerdelete"
                            <?php 
                            if(!empty($user_access->owner_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="owner_d"><?php echo lang('setting/role.owner_d'); ?></label>

                            <input type="checkbox" id="indivusualowner" name="indivusualowner" value="indivusualowner"
                            <?php 
                            if(!empty($user_access->indivusualowner)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="indivusualowner"><?php echo lang('setting/role.owner_v'); ?></label>




                            <br><label><?php echo lang('setting/role.tenant'); ?> :</label><br>
                            <input type="checkbox" id="tenant_l" name="tenant_l" value="tenant_list"
                            <?php 
                            if(!empty($user_access->tenant_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="tenant_l"><?php echo lang('setting/role.t_list'); ?></label>

                            <input type="checkbox" id="tenant_a" name="tenant_a" value="tenant_add"
                            <?php 
                            if(!empty($user_access->tenant_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="tenant_a"> <?php echo lang('setting/role.t_add'); ?></label>

                            <input type="checkbox" id="tenant_e" name="tenant_e" value="tenant_edit"
                            <?php 
                            if(!empty($user_access->tenant_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="tenant_e"><?php echo lang('setting/role.t_edit'); ?> </label>

                            <input type="checkbox" id="tenant_d" name="tenant_d" value="tenant_delete"
                            <?php 
                            if(!empty($user_access->tenant_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="tenant_d"> <?php echo lang('setting/role.t_delete'); ?> </label>

                            <input type="checkbox" id="tenant_view" name="tenant_view" value="tenant_view"
                            <?php 
                            if(!empty($user_access->tenant_view)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="tenant_view"><?php echo lang('setting/role.t_view'); ?></label>

                            <input type="checkbox" id="tenant_depand" name="tenant_depand" value="tenant_depand"
                            <?php 
                            if(!empty($user_access->tenant_depand)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="tenant_depand"><?php echo lang('setting/role.t_i_g'); ?></label>



                            <br><label><?php echo lang('setting/role.employee'); ?> :</label><br>
                            <input type="checkbox" id="employee_l" name="employee_l" value="employeelist"
                            <?php 
                            if(!empty($user_access->employee_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="employee_l"><?php echo lang('setting/role.e_list'); ?></label>

                            <input type="checkbox" id="employee_a" name="employee_a" value="employeeadd"
                            <?php 
                            if(!empty($user_access->employee_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="employee_a"> <?php echo lang('setting/role.e_add'); ?></label>

                            <input type="checkbox" id="employee_e" name="employee_e" value="employeeupdate"
                            <?php 
                            if(!empty($user_access->employee_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="employee_e"> <?php echo lang('setting/role.e_edit'); ?></label>

                            <input type="checkbox" id="employee_d" name="employee_d" value="employeedelete"
                            <?php 
                            if(!empty($user_access->employee_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="employee_d"> <?php echo lang('setting/role.e_delete'); ?></label>

                            <input type="checkbox" id="indivisualemployee" name="indivisualemployee" value="indivisualemployee"
                            <?php 
                            if(!empty($user_access->indivisualemployee)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="indivisualemployee"><?php echo lang('setting/role.e_view'); ?></label>




                            <br><label><?php echo lang('setting/role.emp_salary'); ?>  :</label><br>
                            <input type="checkbox" id="emp_salary_addandlist" name="emp_salary_addandlist" value="employeesalary"
                            <?php 
                            if(!empty($user_access->emp_salary_addandlist)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="emp_salary_addandlist"><?php echo lang('setting/role.s_list'); ?></label>

                            <input type="checkbox" id="getindivisualemployee" name="getindivisualemployee" value="getindivisualemployee"
                            <?php 
                            if(!empty($user_access->emp_salaery_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="getindivisualemployee"><?php echo lang('setting/role.get_emp'); ?></label>

                            <input type="checkbox" id="emp_salaery_e" name="emp_salaery_e" value="employeesalaryupdate"
                            <?php 
                            if(!empty($user_access->emp_salaery_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="emp_salaery_e"> <?php echo lang('setting/role.s_edit'); ?></label>
                            
                            <input type="checkbox" id="emp_salaery_d" name="emp_salaery_d" value="employeesalarydelete"
                            <?php 
                            if(!empty($user_access->emp_salaery_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="emp_salaery_d"><?php echo lang('setting/role.s_delete'); ?></label>

                            <input type="checkbox" id="indivisualemployeesalary" name="indivisualemployeesalary" value="indivisualemployeesalary"
                            <?php 
                            if(!empty($user_access->indivisualemployeesalary)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="indivisualemployeesalary"><?php echo lang('setting/role.s_view'); ?></label>



                            <br><label><?php echo lang('setting/role.e_leave'); ?> :</label><br>
                                    <input type="checkbox" id="employeeleave" name="employeeleave" value="employeeleave"
                                    <?php 
                            if(!empty($user_access->employeeleave)){
                                echo "Checked";
                            } ?>
                                    >
                            <label for="employeeleave"><?php echo lang('setting/role.e_leave'); ?></label>




                            <br><label><?php echo lang('setting/role.r_colect'); ?> :</label><br>
                            <input type="checkbox" id="rent_l" name="rent_l" value="rentlist"
                            <?php 
                            if(!empty($user_access->rent_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rent_l"> <?php echo lang('setting/role.rent_l'); ?></label>

                            <input type="checkbox" id="rent_a" name="rent_a" value="addrent"
                            <?php 
                            if(!empty($user_access->rent_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rent_a"><?php echo lang('setting/role.rent_a'); ?></label>

                            <input type="checkbox" id="gettenent" name="gettenent" value="gettenent"
                            <?php 
                            if(!empty($user_access->gettenent)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="gettenent"><?php echo lang('setting/role.get_tenant'); ?></label>

                            <input type="checkbox" id="rent_e" name="rent_e" value="rentupdate"
                            <?php 
                            if(!empty($user_access->rent_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rent_e"> <?php echo lang('setting/role.rent_e'); ?></label>

                            <input type="checkbox" id="rent_d" name="rent_d" value="rentdelete"
                            <?php 
                            if(!empty($user_access->rent_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rent_d"> <?php echo lang('setting/role.rent_d'); ?></label>

                            <input type="checkbox" id="indivusualrent" name="indivusualrent" value="indivusualrent"
                            <?php 
                            if(!empty($user_access->indivusualrent)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="indivusualrent"><?php echo lang('setting/role.rent_v'); ?></label>

                            <input type="checkbox" id="rentinvoice" name="rentinvoice" value="rentinvoice"
                            <?php 
                            if(!empty($user_access->rentinvoice)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="rentinvoice"><?php echo lang('setting/role.rent_i'); ?></label>

                            <input type="checkbox" id="printrentinvoice" name="printrentinvoice" value="printrentinvoice"
                            <?php 
                            if(!empty($user_access->printrentinvoice)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="printrentinvoice"><?php echo lang('setting/role.p_rent_i'); ?></label>


                            

                            <br><label><?php echo lang('setting/role.owner_u'); ?>:</label><br>
                            <input type="checkbox" id="utility_l" name="utility_l" value="ownerutilitylist"
                            <?php 
                            if(!empty($user_access->utility_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="utility_l"> <?php echo lang('setting/role.utility_l'); ?></label>

                            <input type="checkbox" id="utility_a" name="utility_a" value="ownerutilityadd"
                            <?php 
                            if(!empty($user_access->utility_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="utility_a"> <?php echo lang('setting/role.utility_a'); ?></label>
                            
                            <input type="checkbox" id="getunits" name="getunits" value="getunits"
                            <?php 
                            if(!empty($user_access->getunits)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="getunits"> <?php echo lang('setting/role.g_units'); ?></label>

                            <input type="checkbox" id="getowner" name="getowner" value="getowner"
                            <?php 
                            if(!empty($user_access->getowner)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="getowner"> <?php echo lang('setting/role.g_owner'); ?></label>

                            <input type="checkbox" id="utility_e" name="utility_e" value="ownerutilityupdate"
                            <?php 
                            if(!empty($user_access->utility_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="utility_e"> <?php echo lang('setting/role.utility_e'); ?></label>

                            <input type="checkbox" id="utility_d" name="utility_d" value="ownerutilitydelete"
                            <?php 
                            if(!empty($user_access->utility_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="utility_d"> <?php echo lang('setting/role.utility_d'); ?></label>

                            <input type="checkbox" id="indivusualutility" name="indivusualutility" value="indivusualutility"
                            <?php 
                            if(!empty($user_access->indivusualutility)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="indivusualutility"><?php echo lang('setting/role.o_u_v'); ?></label>

                            <br><label><?php echo lang('setting/role.maintenance_cost'); ?> :</label><br>
                            <input type="checkbox" id="cost_l" name="cost_l" value="maintenance_list"
                            <?php 
                            if(!empty($user_access->cost_l)){
                                echo "Checked";
                            }
                            ?>
                            >

                            <label for="cost_l"> <?php echo lang('setting/role.cost_l'); ?></label>

                            <input type="checkbox" id="cost_a" name="cost_a" value="maintenance_add"
                            <?php 
                            if(!empty($user_access->cost_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="cost_a"> <?php echo lang('setting/role.cost_a'); ?></label>

                            <input type="checkbox" id="cost_e" name="cost_e" value="maintenance_edit"
                            <?php 
                            if(!empty($user_access->cost_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="cost_e"> <?php echo lang('setting/role.cost_e'); ?></label>

                            <input type="checkbox" id="cost_d" name="cost_d" value="maintenance_delete"
                            <?php 
                            if(!empty($user_access->cost_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="cost_d"> <?php echo lang('setting/role.cost_d'); ?></label>

                            <input type="checkbox" id="maintenance_view" name="maintenance_view" value="maintenance_view"
                            <?php 
                            if(!empty($user_access->maintenance_view)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="maintenance_view"><?php echo lang('setting/role.cost_v'); ?></label>




                            <br><label><?php echo lang('setting/role.management_committee'); ?> :</label><br>
                            <input type="checkbox" id="committee_l" name="committee_l" value="committee_list"
                            <?php 
                            if(!empty($user_access->committee_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="committee_l"> <?php echo lang('setting/role.committee_l'); ?></label>

                            <input type="checkbox" id="committee_a" name="committee_a" value="committee_add"
                            <?php 
                            if(!empty($user_access->committee_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="committee_a"> <?php echo lang('setting/role.committee_a'); ?> </label>

                            <input type="checkbox" id="committee_e" name="committee_e" value="committee_edit"
                            <?php 
                            if(!empty($user_access->committee_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="committee_e"> <?php echo lang('setting/role.committee_e'); ?></label>

                            <input type="checkbox" id="committee_d" name="committee_d" value="committee_delete"
                            <?php 
                            if(!empty($user_access->committee_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="committee_d"> <?php echo lang('setting/role.committee_d'); ?></label>

                            <input type="checkbox" id="committee_view" name="committee_view" value="committee_view"
                            <?php 
                            if(!empty($user_access->committee_view)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="committee_view"><?php echo lang('setting/role.committee_v'); ?></label>




                            <br><label><?php echo lang('setting/role.apartment_fund'); ?> :</label><br>
                            <input type="checkbox" id="fund_l" name="fund_l" value="fundlist"
                            <?php 
                            if(!empty($user_access->fund_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="fund_l"> <?php echo lang('setting/role.fund_l'); ?></label>

                            <input type="checkbox" id="fund_a" name="fund_a" value="addfund"
                            <?php 
                            if(!empty($user_access->fund_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="fund_a"> <?php echo lang('setting/role.fund_a'); ?></label>

                            <input type="checkbox" id="fund_e" name="fund_e" value="fundupdate"
                            <?php 
                            if(!empty($user_access->fund_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="fund_e"> <?php echo lang('setting/role.fund_e'); ?></label>

                            <input type="checkbox" id="fund_d" name="fund_d" value="funddelete"
                            <?php 
                            if(!empty($user_access->fund_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="fund_d"> <?php echo lang('setting/role.fund_d'); ?></label>

                            <input type="checkbox" id="indivisualfund" name="indivisualfund" value="indivisualfund"
                            <?php 
                            if(!empty($user_access->indivisualfund)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="indivisualfund">  <?php echo lang('setting/role.fund_v'); ?></label>

                         
                            
                            <input type="checkbox" id="invoice" name="invoice" value="invoice"
                            <?php 
                            if(!empty($user_access->invoice)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="invoice"><?php echo lang('setting/role.bill_i'); ?></label>

                            <input type="checkbox" id="printfundinvoice" name="printfundinvoice" value="printfundinvoice"
                            <?php 
                            if(!empty($user_access->printfundinvoice)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="printfundinvoice"> <?php echo lang('setting/role.ptint_i'); ?></label>



                            

                            <br><label><?php echo lang('setting/role.bill_deposit'); ?> :</label><br>
                            <input type="checkbox" id="bill_l" name="bill_l" value="billdipositlist"
                            <?php 
                            if(!empty($user_access->bill_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="bill_l"><?php echo lang('setting/role.bill_l'); ?></label>

                            <input type="checkbox" id="bill_a" name="bill_a" value="addbill"
                            <?php 
                            if(!empty($user_access->bill_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="bill_a"> <?php echo lang('setting/role.bill_a'); ?></label>

                            <input type="checkbox" id="bill_e" name="bill_e" value="billupdate"
                            <?php 
                            if(!empty($user_access->bill_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="bill_e"><?php echo lang('setting/role.bill_e'); ?></label>

                            <input type="checkbox" id="bill_d" name="bill_d" value="billdelete"
                            <?php 
                            if(!empty($user_access->bill_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="billdelete"> <?php echo lang('setting/role.bill_d'); ?></label>

                            <input type="checkbox" id="indivisualbill" name="indivisualbill" value="indivisualbill"
                            <?php 
                            if(!empty($user_access->indivisualbill)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="indivisualbill"><?php echo lang('setting/role.bill_v'); ?></label>





                            <br><label><?php echo lang('setting/role.complain'); ?> :</label><br>
                            <input type="checkbox" id="complain_l" name="complain_l" value="complain_list"
                            <?php 
                            if(!empty($user_access->complain_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complain_l"> <?php echo lang('setting/role.complain_l'); ?></label>

                            <input type="checkbox" id="complain_a" name="complain_a" value="complain_add"
                            <?php 
                            if(!empty($user_access->complain_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complain_a"> <?php echo lang('setting/role.complain_a'); ?></label>

                            <input type="checkbox" id="complain_e" name="complain_e" value="complain_edit"
                            <?php 
                            if(!empty($user_access->complain_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complain_e"> <?php echo lang('setting/role.complain_e'); ?></label>

                            <input type="checkbox" id="complain_d" name="complain_d" value="complain_delete"
                            <?php 
                            if(!empty($user_access->complain_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complain_d"> <?php echo lang('setting/role.complain_d'); ?></label>

                            <input type="checkbox" id="complain_view" name="complain_view" value="complain_view"
                            <?php 
                            if(!empty($user_access->complain_view)){
                                echo "Checked";
                            } ?>

                            >
                            <label for="complain_view"><?php echo lang('setting/role.complain_v'); ?></label>

                            <input type="checkbox" id="solution_add" name="solution_add" value="solution_add"
                            <?php 
                            if(!empty($user_access->solution_add)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="solution_add"><?php echo lang('setting/role.solution_a'); ?></label>


                            <input type="checkbox" id="complain_solution" name="complain_solution" value="complain_solution"
                            <?php 
                            if(!empty($user_access->complain_solution)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="complain_solution">complain solution</label>

                            

                            <input type="checkbox" id="assign_employee" name="assign_employee" value="assign_employee"
                            <?php 
                            if(!empty($user_access->assign_employee)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="assign_employee"><?php echo lang('setting/role.assign_emp'); ?></label>

                            <input type="checkbox" id="get_employee" name="get_employee" value="get_employee"
                            <?php 
                            if(!empty($user_access->get_employee)){
                                echo "Checked";
                            } ?>
                            >
                            <label for="get_employee"><?php echo lang('setting/role.assign_c'); ?></label>





                            <br><label><?php echo lang('setting/role.visitor'); ?> :</label><br>
                            <input type="checkbox" id="visitor_l" name="visitor_l" value="visitor_list"
                            <?php 
                            if(!empty($user_access->visitor_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_l"> <?php echo lang('setting/role.visitor_l'); ?></label>

                            <input type="checkbox" id="visitor_a" name="visitor_a" value="visitor_add"
                            <?php 
                            if(!empty($user_access->visitor_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_a"><?php echo lang('setting/role.visitor_a'); ?></label>

                            <input type="checkbox" id="visitor_e" name="visitor_e" value="visitor_edit"
                            <?php 
                            if(!empty($user_access->visitor_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_e"> <?php echo lang('setting/role.visitor_e'); ?></label>

                            <input type="checkbox" id="visitor_d" name="visitor_d" value="visitor_delete"
                            <?php 
                            if(!empty($user_access->visitor_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_d"><?php echo lang('setting/role.visitor_d'); ?></label>

                            <input type="checkbox" id="visitor_info" name="visitor_info" value="getUnits"
                            <?php 
                            if(!empty($user_access->visitor_info)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_info"><?php echo lang('setting/role.get_units'); ?></label>


                            

                            <br><label><?php echo lang('setting/role.meeting'); ?> :</label><br>
                            <input type="checkbox" id="meeting_l" name="meeting_l" value="meeting_list"
                            <?php 
                            if(!empty($user_access->meeting_l)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="meeting_l"> <?php echo lang('setting/role.meeting_l'); ?></label>

                            <input type="checkbox" id="meeting_a" name="meeting_a" value="meeting_add"
                            <?php 
                            if(!empty($user_access->meeting_a)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="meeting_a"><?php echo lang('setting/role.meeting_a'); ?></label>

                            <input type="checkbox" id="meeting_e" name="meeting_e" value="meeting_edit"
                            <?php 
                            if(!empty($user_access->meeting_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="meeting_e"><?php echo lang('setting/role.meeting_e'); ?> </label>

                            <input type="checkbox" id="meeting_d" name="meeting_d" value="meeting_delete"
                            <?php 
                            if(!empty($user_access->meeting_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="meeting_d"> <?php echo lang('setting/role.meeting_d'); ?></label>

                            <input type="checkbox" id="meeting_view" name="meeting_view" value="meeting_view"
                            <?php
                            if(!empty($user_access->meeting_view)){
                                echo "Checked";
                            }?>
                            >
                            <label for="meeting_view"><?php echo lang('setting/role.meeting_v'); ?></label>





                            <br><label><?php echo lang('setting/role.notice_board'); ?> :</label><br>
                            <input type="checkbox" id="notice_addlist" name="notice_addlist" value="addnotice"
                            <?php 
                            if(!empty($user_access->notice_addlist)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notice_addlist"><?php echo lang('setting/role.n_a_a_l'); ?></label>

                            <input type="checkbox" id="notice_e" name="notice_e" value="noticeupdate"
                            <?php 
                            if(!empty($user_access->notice_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notice_e"> <?php echo lang('setting/role.notice_e'); ?></label>

                            <input type="checkbox" id="notice_d" name="notice_d"value="noticedelete"
                            <?php 
                            if(!empty($user_access->notice_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notice_d"> <?php echo lang('setting/role.notice_d'); ?></label>





                            <br><label><?php echo lang('setting/role.e_a_s_a'); ?> :</label><br>
                            <input type="checkbox" id="mailsms_list" name="mailsms_list" value="mailsms_list"
                            <?php 
                            if(!empty($user_access->mailsms_list)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="mailsms_list"><?php echo lang('setting/role.e_s_l'); ?></label>

                            <input type="checkbox" id="mailsms_add" name="mailsms_add" value="mailsms_add"
                            <?php 
                            if(!empty($user_access->mailsms_add)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="mailsms_add"><?php echo lang('setting/role.e_s_a'); ?></label>

                            <input type="checkbox" id="mailsms_edit" name="mailsms_edit" value="mailsms_edit"
                            <?php 
                            if(!empty($user_access->mailsms_edit)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="mailsms_edit"><?php echo lang('setting/role.e_s_e'); ?></label>

                            <input type="checkbox" id="mailsms_delete" name="mailsms_delete" value="mailsms_delete"
                            <?php 
                            if(!empty($user_access->mailsms_delete)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="mailsms_delete"> <?php echo lang('setting/role.e_s_d'); ?></label>




                            <br><label><?php echo lang('setting/role.Reports'); ?> :</label><br>

                            <br><label><?php echo lang('setting/role.rent_r'); ?> :</label><br>
                            <input type="checkbox" id="rent_r" name="rent_r" value="rentreport"
                            <?php 
                            if(!empty($user_access->rent_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rent_r"> <?php echo lang('setting/role.rent_r'); ?></label>

                            <input type="checkbox" id="rentinfo" name="rentinfo" value="rentinfo"
                            <?php 
                            if(!empty($user_access->rentinfo)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="printrentreport"><?php echo lang('setting/role.i_rent_r'); ?></label>

                            <input type="checkbox" id="printrentreport" name="printrentreport" value="printrentreport"
                            <?php 
                            if(!empty($user_access->printrentreport)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="printrentreport"><?php echo lang('setting/role.print_r_r'); ?></label>

                            <input type="checkbox" id="rentinfo_pdf" name="rentinfo_pdf" value="rentinfo_pdf"
                            <?php 
                            if(!empty($user_access->rentinfo_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rentinfo_pdf"><?php echo lang('setting/role.pdf_r_r'); ?></label>






                            <br><label><?php echo lang('setting/role.tnant_r'); ?> :</label><br>
                            <input type="checkbox" id="tenant_r" name="tenant_r" value="rented_report"
                            <?php 
                            if(!empty($user_access->tenant_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="tenant_r"> <?php echo lang('setting/role.tnant_r'); ?></label>

                            <input type="checkbox" id="rentedprint_report" name="rentedprint_report" value="rentedprint_report"
                            <?php 
                            if(!empty($user_access->rentedprint_report)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rentedprint_report"><?php echo lang('setting/role.print_t_r'); ?></label>

                            <input type="checkbox" id="rented_pdf" name="rented_pdf" value="rented_pdf"
                            <?php 
                            if(!empty($user_access->rented_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rented_pdf"> <?php echo lang('setting/role.pdf_t_r'); ?></label>






                            <br><label><?php echo lang('setting/role.visitor_r'); ?> :</label><br>
                            <input type="checkbox" id="visitor_r" name="visitor_r" value="visitor_report"
                            <?php 
                            if(!empty($user_access->visitor_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_r"><?php echo lang('setting/role.visitor_r'); ?></label>

                            <input type="checkbox" id="visitorprint_report" name="visitorprint_report" value="visitorprint_report"
                            <?php 
                            if(!empty($user_access->visitorprint_report)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitorprint_report"><?php echo lang('setting/role.print_v_r'); ?></label>

                            <input type="checkbox" id="visitor_pdf" name="visitor_pdf" value="visitor_pdf"
                            <?php 
                            if(!empty($user_access->visitor_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="visitor_pdf"><?php echo lang('setting/role.pdf_v_r'); ?></label>




                            <br><label><?php echo lang('setting/role.complain_r'); ?> :</label><br>
                            <input type="checkbox" id="complain_r" name="complain_r" value="complain_report"
                            <?php 
                            if(!empty($user_access->complain_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complain_r"> <?php echo lang('setting/role.complain_r'); ?></label>

                            <input type="checkbox" id="complainprint_report" name="complainprint_report" value="complainprint_report"
                            <?php 
                            if(!empty($user_access->complainprint_report)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complainprint_report"><?php echo lang('setting/role.print_c_r'); ?></label>

                            <input type="checkbox" id="complain_pdf" name="complain_pdf" value="complain_pdf"
                            <?php 
                            if(!empty($user_access->complain_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="complain_pdf"><?php echo lang('setting/role.pdf_c_r'); ?></label>





                            <br><label><?php echo lang('setting/role.unit_r'); ?> :</label><br>
                            <input type="checkbox" id="unit_r" name="unit_r" value="unit_report"
                            <?php 
                            if(!empty($user_access->unit_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unit_r"><?php echo lang('setting/role.unit_r'); ?></label>

                            <input type="checkbox" id="unitprint_report" name="unitprint_report" value="unitprint_report"
                            <?php 
                            if(!empty($user_access->unitprint_report)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unitprint_report"><?php echo lang('setting/role.print_u_r'); ?></label>

                            <input type="checkbox" id="unit_pdf" name="unit_pdf" value="unit_pdf"
                            <?php 
                            if(!empty($user_access->unit_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="unit_pdf"><?php echo lang('setting/role.pdf_u_r'); ?></label>







                            <br><label><?php echo lang('setting/role.fund_r'); ?> :</label><br>
                            <input type="checkbox" id="fund_r" name="fund_r" value="fundstatus"
                            <?php 
                            if(!empty($user_access->fund_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="fund_r"> <?php echo lang('setting/role.fund_r'); ?></label>

                            <input type="checkbox" id="rentinfo" name="rentinfo" value="rentinfo"
                            <?php 
                            if(!empty($user_access->rentinfo)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rentinfo"><?php echo lang('setting/role.fund_s'); ?></label>

                            <input type="checkbox" id="printfundstatus" name="printfundstatus" value="printfundstatus"
                            <?php 
                            if(!empty($user_access->printfundstatus)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="printfundstatus"><?php echo lang('setting/role.print_f_s'); ?></label>

                            <input type="checkbox" id="fundstatus_pdf" name="fundstatus_pdf" value="fundstatus_pdf"
                            <?php 
                            if(!empty($user_access->fundstatus_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="fundstatus_pdf"><?php echo lang('setting/role.pdf_f_s'); ?></label>






                            <br><label><?php echo lang('setting/role.bill_report'); ?> :</label><br>
                            <input type="checkbox" id="bill_r" name="bill_r" value="billreport"
                            <?php 
                            if(!empty($user_access->bill_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="bill_r"> <?php echo lang('setting/role.bill_report'); ?></label>

                            <input type="checkbox" id="billinfo" name="billinfo" value="billinfo"
                            <?php 
                            if(!empty($user_access->billinfo)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="billinfo"><?php echo lang('setting/role.info_b_r'); ?></label>

                            <input type="checkbox" id="printbillreport" name="printbillreport" value="printbillreport"
                            <?php 
                            if(!empty($user_access->printbillreport)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="printbillreport"><?php echo lang('setting/role.print_b_r'); ?></label>

                            <input type="checkbox" id="billinfo_pdf" name="billinfo_pdf" value="billinfo_pdf"
                            <?php 
                            if(!empty($user_access->billinfo_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="billinfo_pdf"><?php echo lang('setting/role.pdf_b_r'); ?></label>




                            

                            <br><label><?php echo lang('setting/role.emp_s_r'); ?>  :</label><br> 
                            <input type="checkbox" id="salary_r" name="salary_r" value="salaryreport"
                            <?php 
                            if(!empty($user_access->salary_r)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="salary_r"> <?php echo lang('setting/role.salary_r'); ?></label>
                            

                            <input type="checkbox" id="salaryinfo" name="salaryinfo" value="salaryinfo"
                            <?php 
                            if(!empty($user_access->salaryinfo)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="salaryinfo"><?php echo lang('setting/role.print_s_r'); ?></label>

                            <input type="checkbox" id="salaryinfo_pdf" name="salaryinfo_pdf" value="salaryinfo_pdf"
                            <?php 
                            if(!empty($user_access->salaryinfo_pdf)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="salaryinfo_pdf"><?php echo lang('setting/role.pdf_s_r'); ?></label>






                            <br><label><?php echo lang('setting/role.setting'); ?> :</label><br>

                            <br><label><?php echo lang('setting/role.user'); ?> :</label><br>
                            <input type="checkbox" id="user_addlist" name="user_addlist" value="adduser"
                            <?php 
                            if(!empty($user_access->user_addlist)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="user_addlist"> <?php echo lang('setting/role.u_a_a_l'); ?> </label>

                            <input type="checkbox" id="user_e" name="user_e" value="userupdate"
                            <?php 
                            if(!empty($user_access->user_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="user_e"> <?php echo lang('setting/role.user_e'); ?></label>

                            <input type="checkbox" id="user_d" name="user_d" value="userdelete"
                            <?php 
                            if(!empty($user_access->user_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="user_d"><?php echo lang('setting/role.user_d'); ?></label>

                            <input type="checkbox" id="indivusualuser" name="indivusualuser" value="indivusualuser"
                            <?php 
                            if(!empty($user_access->indivusualuser)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="indivusualuser"> <?php echo lang('setting/role.user_v'); ?></label>





                            <br><label><?php echo lang('setting/role.b_t_s'); ?> :</label><br>
                            <input type="checkbox" id="billtype_addlist" name="billtype_addlist" value="billsetup_add"
                            <?php 
                            if(!empty($user_access->billtype_addlist)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="billtype_addlist"><?php echo lang('setting/role.b_t_a_a_l'); ?></label>

                            <input type="checkbox" id="billtype_e" name="billtype_e" value="billsetup_edit"
                            <?php 
                            if(!empty($user_access->billtype_e)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="billtype_e"> <?php echo lang('setting/role.bill_t_e'); ?></label>

                            <input type="checkbox" id="billtype_d" name="billtype_d" value="billsetup_delete"
                            <?php 
                            if(!empty($user_access->billtype_d)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="billtype_d"> <?php echo lang('setting/role.bill_t_d'); ?> </label>





                            <br><label><?php echo lang('setting/role.utility_b_s'); ?> :</label><br>
                            <input type="checkbox" id="utilitybill_addlist" name="utilitybill_addlist" value="utility_setup"
                            <?php 
                            if(!empty($user_access->utilitybill_addlist)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="utilitybill_addlist"><?php echo lang('setting/role.utility_b_u'); ?></label>





                            <br><label><?php echo lang('setting/role.m_member_t'); ?> :</label><br>
                            <input type="checkbox" id="membersetup_add" name="membersetup_add" value="membersetup_add"
                            <?php 
                            if(!empty($user_access->membersetup_add)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="membersetup_add"> <?php echo lang('setting/role.m_s_a_a_l'); ?></label>

                            <input type="checkbox" id="membersetup_edit" name="membersetup_edit" value="membersetup_edit"
                            <?php 
                            if(!empty($user_access->membersetup_edit)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="membersetup_edit"> <?php echo lang('setting/role.member_s_e'); ?></label>

                            <input type="checkbox" id="membersetup_delete" name="membersetup_delete" value="membersetup_delete"
                            <?php 
                            if(!empty($user_access->membersetup_delete)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="membersetup_delete"> <?php echo lang('setting/role.member_s_d'); ?></label>






                            <br><label><?php echo lang('setting/role.year_s'); ?> :</label><br>
                            <input type="checkbox" id="yearsetup" name="yearsetup" value="yearsetup"
                            <?php 
                            if(!empty($user_access->yearsetup)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="yearsetup"> <?php echo lang('setting/role.y_s_a_a_l'); ?></label>

                            <input type="checkbox" id="yearupdate" name="yearupdate" value="yearupdate"
                            <?php 
                            if(!empty($user_access->yearupdate)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="yearupdate"><?php echo lang('setting/role.year_s_e'); ?></label>

                            <input type="checkbox" id="yeardelete" name="yeardelete" value="membersetup_delete"
                            <?php 
                            if(!empty($user_access->yeardelete)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="yeardelete"><?php echo lang('setting/role.year_s_d'); ?></label>






                            <br><label><?php echo lang('setting/role.month_s'); ?> :</label><br>
                            <input type="checkbox" id="monthsetup_add" name="monthsetup_add" value="monthsetup_add"
                            <?php 
                            if(!empty($user_access->monthsetup_add)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="monthsetup_add"> <?php echo lang('setting/role.m_s_a_a_l'); ?></label>

                            <input type="checkbox" id="monthsetup_edit" name="monthsetup_edit" value="monthsetup_edit"
                            <?php 
                            if(!empty($user_access->monthsetup_edit)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="monthsetup_edit"> <?php echo lang('setting/role.month_s_e'); ?></label>

                            <input type="checkbox" id="monthsetup_delete" name="monthsetup_delete" value="monthsetup_delete"
                            <?php 
                            if(!empty($user_access->monthsetup_delete)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="monthsetup_delete"><?php echo lang('setting/role.month_s_d'); ?></label>






                            <br><label><?php echo lang('setting/role.currency_s'); ?> :</label><br>
                            <input type="checkbox" id="currencysetup" name="currencysetup" value="currencysetup"
                            <?php 
                            if(!empty($user_access->currencysetup)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="currencysetup"> <?php echo lang('setting/role.currency_s_e'); ?></label>

                            <input type="checkbox" id="currencyupdate" name="currencyupdate" value="currencyupdate"
                            <?php 
                            if(!empty($user_access->currencyupdate)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="currencyupdate"> <?php echo lang('setting/role.currency_s_d'); ?></label>

                            <input type="checkbox" id="currencydelete" name="currencydelete" value="currencydelete"
                            <?php 
                            if(!empty($user_access->currencydelete)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="currencydelete"> <?php echo lang('setting/role.currency_s_d'); ?></label>






                            <br><label><?php echo lang('setting/role.system_s'); ?> :</label><br>

                            <input type="checkbox" id="systemsetup" name="systemsetup" value="systemsetup"
                            <?php 
                            if(!empty($user_access->systemsetup)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="systemsetup"> <?php echo lang('setting/role.s_s_a_a_l'); ?></label>

                            <input type="checkbox" id="currencysetting" name="currencysetting" value="currencysetting"
                            <?php 
                            if(!empty($user_access->currencysetting)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="currencysetting"> <?php echo lang('setting/role.currency_setting'); ?></label>

                            <input type="checkbox" id="languagesetting" name="languagesetting" value="languagesetting"
                            <?php 
                            if(!empty($user_access->languagesetting)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="languagesetting"><?php echo lang('setting/role.language_setting'); ?></label>

                            <input type="checkbox" id="emailsetting" name="emailsetting" value="emailsetting"
                            <?php 
                            if(!empty($user_access->emailsetting)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="emailsetting"><?php echo lang('setting/role.email_setting'); ?></label>

                            <input type="checkbox" id="smssetting" name="smssetting" value="smssetting"
                            <?php 
                            if(!empty($user_access->smssetting)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="smssetting"><?php echo lang('setting/role.sms_setting'); ?></label>

                            <input type="checkbox" id="datesetting" name="datesetting" value="datesetting"
                            <?php 
                            if(!empty($user_access->datesetting)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="datesetting"><?php echo lang('setting/role.date_setting'); ?></label>







                            <br><label><?php echo lang('setting/role.role_s'); ?> :</label><br>
                            <input type="checkbox" id="roleadd" name="roleadd" value="roleadd"
                            <?php 
                            if(!empty($user_access->roleadd)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="roleadd"><?php echo lang('setting/role.role_s_a'); ?></label>
                    
                
                            <input type="checkbox" id="rolelist" name="rolelist" value="rolelist"
                            <?php 
                            if(!empty($user_access->rolelist)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="rolelist"> <?php echo lang('setting/role.role_l'); ?></label>
                            

                            <input type="checkbox" id="roleupdate" name="roleupdate" value="roleupdate"
                            <?php 
                            if(!empty($user_access->roleupdate)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="roleupdate"> <?php echo lang('setting/role.role_s_e'); ?></label>

                            <input type="checkbox" id="roledelete" name="roledelete" value="roledelete"
                            <?php 
                            if(!empty($user_access->roledelete)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="roledelete"> <?php echo lang('setting/role.role_s_d'); ?> </label>

                            <input type="checkbox" id="view_access" name="view_access" value="view_access"
                            <?php 
                            if(!empty($user_access->view_access)){
                                echo "Checked";
                            }
                            ?>>
                            <label for="view_access"> <?php echo lang('setting/role.role_v'); ?></label>

                


                            

                            <br><label><?php echo lang('setting/role.notification_s'); ?> :</label><br>
                            <input type="checkbox" id="notification_list" name="notification_list" value="notification_list"
                            <?php 
                            if(!empty($user_access->notification_list)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notification_list"><?php echo lang('setting/role.notification_list'); ?></label>

                            <input type="checkbox" id="notification_edit" name="notification_edit" value="notification_edit"
                            <?php 
                            if(!empty($user_access->notification_edit)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notification_edit"><?php echo lang('setting/role.notification_model'); ?>l</label>

                            <input type="checkbox" id="notification_update" name="notification_update" value="notification_update"
                            <?php 
                            if(!empty($user_access->notification_update)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notification_update"><?php echo lang('setting/role.notification_update'); ?></label>

                            <br><label>NOtificatio Header :</label><br>

                            <input type="checkbox" id="get_notification" name="get_notification" value="get_notification"
                            <?php 
                            if(!empty($user_access->get_notification)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="get_notification">Get Notification</label>

                            <input type="checkbox" id="notification_view" name="notification_view" value="notification_view"
                            <?php 
                            if(!empty($user_access->notification_view)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="notification_view">View Notification</label>

                            <input type="checkbox" id="update_notification" name="update_notification" value="update_notification"
                            <?php 
                            if(!empty($user_access->update_notification)){
                                echo "Checked";
                            }
                            ?>
                            >
                            <label for="update_notification">Notification Update</label>

                            <input type="checkbox" id="profile" name="profile" value="profile"
                            <?php 
                            if(!empty($user_access->profile)){
                                echo "Checked";
                            }
                            ?>
                            >
                                    <label for="profile">Profile</label>
                                        
                                      

                                    </div>
                                   
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="reset" class="btn btn-warning btn-rounded" value="Reset" name="">
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/role.updated'); ?></button>
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
 


<?php echo $this->endSection('content') ?>