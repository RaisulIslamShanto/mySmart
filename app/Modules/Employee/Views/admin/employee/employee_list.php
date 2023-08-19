<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>
<?php 
  $edit= menu_access('employeeupdate');
  $delete= menu_access('employeedelete');
  ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/employee.e_list'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('admin/owner.Home'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/employee.e_list'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?= base_url('admin/addemployee');?>" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i><?php echo lang('admin/employee.add_e'); ?>  </a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('admin/employee.e_list'); ?></h4> 
                            <?php 
                    if(session()->getFlashdata('success')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('success')."</div>";
                     }
                    ?>
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr> 
                                        <th scope="col"><?php echo lang('admin/employee.image'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/employee.name'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/employee.email'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/employee.contact_no'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/employee.designation'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/employee.join_date'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/employee.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($employees as $employee){
                                    ?>
                                    <tr> 
                                        <td> 
                                           <img class="rounded-circle avatar-xs" alt="200x200" src="<?php
                                        if($employee['image']=='empty_image.jpg'){
                                            echo base_url();?>/admin/assets/images/<?= $employee['image'];
                                          }else{
                                              echo base_url();?>/admin/assets/employee/thumbnail/<?= $employee['image'];
                                          }?>" data-holder-rendered="true">
                                        </td> 
                                        <td><?= $employee['name'];?></td> 
                                        <td><?= $employee['email'];?></td>
                                        <td><?= $employee['contact_no'];?></td>
                                        <td><?= $employee['designation'];?></td>
                                        <td><?= date_formats($employee['join_date']); ?></td> 
                                        <td>
                                        <button type="button" data-index="<?=$employee['id']?>" class="view_employee btn btn-outline-warning btn-sm">View</button> 
                                        <?php if($edit){?>
                                            <a type="button" href="<?=site_url('admin/employeeupdate/'.$employee['id'])?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <?php } if($delete){?>

                                            <a type="button" href="<?=site_url('admin/employeedelete/'.$employee['id'])?>" class="btn btn-outline-danger btn-sm" >Delete</a>
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
                    <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('admin/employee.rented_d'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="add_employee">
                    <div class="text-center">
                        <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">
                        <h3>John Peterson</h3>
                    </div>
                    <hr>
                    <h4>Details Infromation</h4>
                    <div class="row">
                        <div class="col-md-6"> <b>Tenant Name :</b> Jim Cary<br>
                            <b>Email  :</b> jimcary@yahoo.com<br>
                            <b>Password :</b> 123456<br>
                            <b>Contact :</b> +8801679110711<br>
                            <b>Address :</b> 63 Creek St. Eastpointe, MI 48021<br>
                            <b>NID(National ID) :</b> 232323-565656-212121<br>
                        </div>
                        <div class="col-md-6"> <b>Floor No :</b> First Floor<br>
                            <b>Rented Unit No :</b> Flat 1A<br>
                            <b>Advance Payment : </b> $10000.00<br>
                            <b>Payment Per Month : </b> $10000.00<br>
                            <b>Issue Date :</b> 27/08/2019<br>
                            <b>Status :</b>
                            Active                          
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- end main content-->
<script>
      $(document).ready(function(){

      $(document).on("click",".view_employee",function () {
    
        var employee_id = $(this).attr('data-index');

        $.ajax({
      url:"<?php echo base_url('admin/indivisualemployee'); ?>",
      method:"POST",
      data:{employee_id:employee_id},
      dataType:'JSON',
      success:function(data)
      {
        
        
          var employees=data.employee;
          console.log(employees);
          console.log(employees["id"]);

          if(employees["image"]!='empty_image.jpg'){
             var image = '<?= base_url();?>/admin/assets/employee/thumbnail/'+employees["image"]+'';
          }else{
            var image ='<?= base_url();?>/admin/assets/images/empty_image.jpg';
          }

         var html='<div class="text-center"><img class="rounded-circle avatar-xl" alt="200x200" src="'+image+'" data-holder-rendered="true"><h3>'+employees["name"]+'</h3></div><hr><h4><?php echo lang('admin/employee.details_info'); ?></h4><div class="row"><div class="col-md-6"> <b> <?php echo lang('admin/employee.name'); ?> :</b> '+employees["name"]+'<br><b><?php echo lang('admin/employee.email'); ?>  :</b> '+employees["email"]+'<br><b><?php echo lang('admin/employee.pass'); ?> :</b> '+employees["password"]+'<br><b><?php echo lang('admin/employee.contact_no'); ?> :</b> '+employees["contact_no"]+'<br><b><?php echo lang('admin/employee.pre_address'); ?> :</b> '+employees["present_address"]+'<br><b><?php echo lang('admin/employee.nid'); ?>:</b> '+employees["nid"]+'<br></div><div class="col-md-6"> <b><?php echo lang('admin/employee.designation'); ?> :</b> '+employees["designation"]+'<br><b><?php echo lang('admin/employee.join_date'); ?> :</b> '+employees["join_date"]+'<br><b><?php echo lang('admin/employee.e_date'); ?> : </b> '+employees["end_date"]+'<br><b><?php echo lang('admin/employee.s_p_m'); ?> : </b> '+employees["salary_per_month"]+'<br><b><?php echo lang('admin/employee.status'); ?> :</b>'+employees["status"]+'</div> </div>';
          
         $('#add_employee').html(html);

         $("#modal_show").modal("show");

      }

});

});
});
</script>
<?php echo $this->endSection('content')?>