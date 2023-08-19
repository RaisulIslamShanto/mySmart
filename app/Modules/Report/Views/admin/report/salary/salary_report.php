<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('report/employee_salary.e_s_report'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('report/employee_salary.e_s_report'); ?></li>
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
                            <h4 class="card-title mb-4"> <?php echo lang('report/employee_salary.e_s_report'); ?></h4>  
                            <?php 
                            if(session()->getFlashdata('faild')){
                                echo '<div class="alert alert-danger text-center">'.session()->getFlashdata('faild').'</div>';
                             }
                             ?>
                            <form action="<?= base_url('admin/salaryinfo')?>">
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label>* <?php echo lang('report/employee_salary.s_employee'); ?> :</label>
                                        <select name="employee_id" id="ddlEmpName" class="form-control"> 
                                            <option value="">--Select Employee--</option>
                                            <?php
                                            foreach($employees as $employee){ ?>

                                           <option value="<?=$employee['id'];?>"><?=$employee['name'];?></option>

                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('report/employee_salary.s_month'); ?> :</label>
                                        <select name="month" id="ddlMonth" class="form-control">
                                            <option value="">--Select Month--</option>
                                            <?php
                                        foreach($months as $month){?>
                                            <option value="<?=$month['monthname'];?>"><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('report/employee_salary.s_year'); ?> :</label>
                                        <select name="year" id="ddlYear" class="form-control">
                                            <option value="">--Select Year--</option>
                                            <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"
                                        ><?=$year['year'];?></option>
                                        <?php  }
                                        ?>
                                        </select>
                                    </div>
                                   
                                
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"> <?php echo lang('report/employee_salary.submit'); ?></button>
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
 
<!-- end main content-->
<?php echo $this->endSection('content') ?>