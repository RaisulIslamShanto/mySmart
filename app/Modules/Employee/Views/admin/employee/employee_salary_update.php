<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/employee_salary.e_salary_setup'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('admin/owner.Home'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/employee_salary.e_salary_setup'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  
           
            <div class="row">
                <div class="col-lg-12">
                    <form class="needs-validation" action="<?= base_url('admin/employeesalaryupdate/'.$employee_salary["id"])?>" method="POST"enctype="multipart/form-data" novalidate> 
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title mb-4"><?php echo lang('admin/employee_salary.e_s_u_f'); ?></h4>
                              <div class="row">
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.e_name'); ?> :</label>
                                      <select  name="employee_name" id="employee_name" class="form-control" required> 
                                        <option value="">--Select Name--</option> 
                                        <?php
                                        foreach($employees as $employee){ ?>
                                          <option value="<?=$employee['id'].','.$employee['name']?>"
                                          <?php
                                          if($employee['id']==$employee_salary["employee_id"]){
                                              echo "selected";
                                          }
                                          ?>><?=$employee['name']?></option>
                                       <?php }
                                        ?>
                                       </select>
                                       <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('employee_name')) {
             echo $validation->getError('employee_name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_e_name'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.designation'); ?> :</label>
                                      <input type="hidden" id="designation2"  name="designation2" class="form-control" value="<?=$employee_salary["designation"]?>" required>
                                      <input type="text" id="designation" value="<?=$employee_salary["designation"]?>" disabled="" name="" class="form-control">
                                      <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('designation2')) {
             echo $validation->getError('designation2'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_designation'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.salary_m'); ?> :</label>
                                      <select name="month" id="ddlEmpMonth" class="form-control" required> 
                                        <option value="">--Salary Month--</option>
                                        <?php
                                        foreach($months as $month){?>
                                            <option value="<?=$month['monthname'];?>"<?php if($employee_salary["month"]==$month['monthname']){echo "selected";}?>><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?>
                                      </select>
                                      <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('month')) {
             echo $validation->getError('month'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_month'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.salary_y'); ?> :</label>
                                      <select name="year" id="ddlYear" class="form-control" required> 
                                        <option value="">--Salary Year--</option>
                                        
                                        <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"<?php if($employee_salary["year"]==$year['year']){echo "selected";}?>
                                        ><?=$year['year'];?></option>
                                        <?php  }
                                        ?>
                                      </select>
                                      <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('year')) {
             echo $validation->getError('year'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_year'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.s_p_m'); ?> :</label>
                                      <div class="input-group">
                                          <input id="salary_per_month" type="text" name="salary_per_month" value="<?=$employee_salary["salary_per_month"]?>" id="txtEmpAmount" class="form-control" required>
                                          <div class="input-group-text"><?php symbol();?></div>
                                        </div>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('salary_per_month')) {
             echo $validation->getError('salary_per_month'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_s_p_m'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.issue_date'); ?> :</label>
                                       <input type="date" name="issue_date" class="form-control" value="<?=$employee_salary["issue_date"]?>" required>
                                       <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('issue_date')) {
             echo $validation->getError('issue_date'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_issue_date'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-12 mt-4">
                                   <div class="d-flex">
                                    <input class="btn btn-outline-danger btn-rounded " value="Reset" type="reset"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/employee_salary.u_info'); ?></button>
                                </div>
                                  </div>
                              </div>
                               
                           </div>
                        </div>
                    </form>

                   
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
<script>
      $(document).ready(function(){

$(document).on("click","#employee_name",function () {

  var employee_id = $(this).val();

  $.ajax({
url:"<?php echo base_url('admin/getindivisualemployee'); ?>",
method:"POST",
data:{employee_id:employee_id},
dataType:'JSON',
success:function(data)
{
  
  
    var employees=data.employee;
    console.log(employees);
    console.log(employees["id"]);
    var salary=employees["salary_per_month"];

   var html=employees["designation"];
    
   $('#designation').val(html);
   $('#salary_per_month').val(salary);
   $('#designation2').val(html);


}

});

});
}); 
</script>
<?php echo $this->endSection('content')?>