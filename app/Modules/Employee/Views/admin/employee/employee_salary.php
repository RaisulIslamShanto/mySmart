<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>

<?php 
  $edit= menu_access('employeesalaryupdate');
  $delete= menu_access('employeesalarydelete');
  ?>
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
            <?php 
                    if(session()->getFlashdata('success')){
                        echo "<h4 style='color:red;text-align:center;'>".session()->getFlashdata('success')."</h4>";
                     }
                    ?>
           
            <div class="row">
                <div class="col-lg-12">
                    <form class="needs-validation" action="<?= base_url('admin/employeesalary')?>" method="POST"enctype="multipart/form-data" novalidate> 
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title mb-4"><?php echo lang('admin/employee_salary.e_s_e_f'); ?></h4>
                              <div class="row">
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.e_name'); ?> :</label>
                                      <select  name="employee_name" id="employee_name" class="form-control" required> 
                                        <option value="">--Select Name--</option> 
                                        <?php
                                        foreach($employees as $employee){ ?>
                                          <option value="<?=$employee['id'].','.$employee['name']?>"><?=$employee['name']?></option>
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
                                      <input type="hidden" id="designation2"  name="designation2" class="form-control" required>
                                      <input type="text" id="designation" value="Security Gard" disabled="" name="" class="form-control">
                                      <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('designation2')) {
             echo $validation->getError('designation2'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.designation'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      
                                      <label>* <?php echo lang('admin/employee_salary.salary_m'); ?>  :</label>
                                      <select name="month" id="ddlEmpMonth" class="form-control" required> 
                                        <option value="">--Salary Month--</option>
                                        <?php
                                        
                                        foreach($months as $month){?>
                                            <option value="<?=$month['monthname'];?>"><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?>
                                        
                                      </select>
                                      <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('month')) {
             echo $validation->getError('month'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.salary_m'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.salary_y'); ?>  :</label>
                                      <select name="year" id="ddlYear" class="form-control" required> 
                                        <option value="">--Salary Year--</option>
                                        
                                        <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"><?=$year['year'];?></option>
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
                                      <label>* <?php echo lang('admin/employee_salary.s_p_m'); ?>  :</label>
                                      <div class="input-group">
                                          <input id="salary_per_month" type="text" name="salary_per_month" value="8800.00" id="txtEmpAmount" class="form-control" required>
                                          <div class="input-group-text"><?php symbol();?></div>
                                        </div>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('salary_per_month')) {
             echo $validation->getError('salary_per_month'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_s_p_m'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>* <?php echo lang('admin/employee_salary.issue_date'); ?>  :</label>
                                       <input type="date" name="issue_date" class="form-control" required>
                                       <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('issue_date')) {
             echo $validation->getError('issue_date'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee_salary.e_issue_date'); ?>
                                                        </div>
                                  </div>
                                  <div class="col-md-12 mt-4">
                                   <div class="d-flex">
                                    <input class="btn btn-outline-danger btn-rounded " value="Reset" type="reset"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"> <?php echo lang('admin/employee_salary.s_info'); ?> </button>
                                </div>
                                  </div>
                              </div>
                               
                           </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('admin/employee_salary.e_s_d'); ?> </h4> 
                            
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr> 
                                        <th scope="col"><?php echo lang('admin/employee_salary.e_name'); ?> </th>  
                                        <th scope="col"><?php echo lang('admin/employee_salary.designation'); ?>  </th> 
                                        <th scope="col"><?php echo lang('admin/employee_salary.salary_m'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/employee_salary.salary_y'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/employee_salary.s_p_m'); ?>  </th>  
                                        <th scope="col"><?php echo lang('admin/employee_salary.issue_date'); ?>  </th>  
                                        <th scope="col"><?php echo lang('admin/employee_salary.action'); ?> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($employee_salary as $e_salary){

                                    ?>
                                    <tr> 
                                        <td><?=$e_salary['name'];?></td>
                                        <td><?=$e_salary['designation'];?></td>
                                        <td><?=$e_salary['month'];?></td>
                                        <td><?=$e_salary['year'];?></td>
                                        <td><?php currency($e_salary['salary_per_month']); ?> </td>
                                        <td><?=$e_salary['issue_date'];?></td>
                                        <td>
                                        <button type="button" data-index="<?=$e_salary['id']?>" class="view_employee_salary btn btn-outline-warning btn-sm">View</button> 
                                        <?php if($edit){?>
                                            <a type="button" href="<?=site_url('admin/employeesalaryupdate/'.$e_salary['id'])?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <?php } if($delete){?>
                                            <a type="button" href="<?=site_url('admin/employeesalarydelete/'.$e_salary['id'])?>" class="btn btn-outline-danger btn-sm" >Delete</a>
                                            <?php }?>
                                        </td>
                                    </tr> 
                                
                                  <?php }?>
                                </tbody>
                            </table>
                             
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
    <div id="modal_show" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('admin/employee_salary.e_s_d'); ?> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="add_employee_salary">  
                    <h4>Details Infromation</h4>
                    <div class="row">
                        <div class="col-xs-12"> <b>Name :</b> John Sina<br>
                            <b>Email :</b> johnsina@gmail.com<br>
                            <b>Phone :</b> +8801679110711<br>
                            <b>Designation :</b> Security Gard<br>
                            <b>Salary Month :</b> August<br>
                            <b>Salary Year :</b> 2019<br>
                            <b>Salary Per Month  : </b> $8000.00<br>
                            <b>Issue Date :</b> 05/09/2019<br>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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

$(document).ready(function(){

$(document).on("click",".view_employee_salary",function () {

  var employee_salary_id = $(this).attr('data-index');

  $.ajax({
url:"<?php echo base_url('admin/indivisualemployeesalary'); ?>",
method:"POST",
data:{employee_salary_id:employee_salary_id},
dataType:'JSON',
success:function(data)
{
  
  
    var emp_salary=data.employee_salary;
    var emp=data.employee;
    console.log(emp_salary);
    console.log(emp);

   var html='<h4><?php echo lang('admin/employee_salary.d_info'); ?> </h4><div class="row"><div class="col-xs-12"> <b><?php echo lang('admin/employee_salary.e_name'); ?> :</b>'+emp_salary["name"]+'<br><b><?php echo lang('admin/employee_salary.e_email'); ?> :</b>'+emp["email"]+'<br><b><?php echo lang('admin/employee_salary.phone'); ?> :</b> '+emp["contact_no"]+'<br><b><?php echo lang('admin/employee_salary.designation'); ?> :</b> '+emp["designation"]+'<br><b><?php echo lang('admin/employee_salary.salary_m'); ?>:</b> '+emp_salary["month"]+'<br><b><?php echo lang('admin/employee_salary.salary_y'); ?> :</b> '+emp_salary["year"]+'<br><b><?php echo lang('admin/employee_salary.s_p_m'); ?> : </b> '+emp["salary_per_month"]+'<br><b><?php echo lang('admin/employee_salary.issue_date'); ?> :</b> '+emp_salary["issue_date"]+'<br></div> </div>';
    
   $('#add_employee_salary').html(html);

   $("#modal_show").modal("show");

}

});

});
});
</script>
<?php echo $this->endSection('content')?>