<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/owner_utility.o_u_l'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/owner_utility.o_u_l'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?= base_url('admin/ownerutilityadd')?>" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i><?php echo lang('admin/owner_utility.a_o_u'); ?></a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                 
                            <?php 
                    if(session()->getFlashdata('success')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('success')."</div>";
                     }
                    ?>
                            
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.image'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.owner_name'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.floor_no'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/owner_utility.unit_no'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.m_n'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.y_n'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.rent'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner_utility.total_rent'); ?></th>
                                        <th scope="col"><?php echo lang('admin/owner_utility.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if(isset($utility_lists)){
                                    foreach($utility_lists as $utility_list){

                                    
                                    ?>
                                    <tr>  
                                        <td><img class="rounded-circle avatar-xs" alt="200x200" src="<?php
                                        if($utility_list->owner_image=='empty_image.jpg'){
                                            echo base_url();?>/admin/assets/images/<?= $utility_list->owner_image;
                                          }else{
                                              echo base_url();?>/admin/assets/owner_image/thumbnail/<?= $utility_list->owner_image;
                                          }?>
                                          " data-holder-rendered="true"></td>
                                        <td><?=$utility_list->owner_name;?></td> 
                                        <td><?=$utility_list->floor_name;?></td>
                                        <td><?=$utility_list->unit_name;?></td>
                                        <td><?=$utility_list->month;?></td>
                                        <td><?=$utility_list->year;?></td>
                                        <td><?php currency($utility_list->total_rent);?></td>
                                        <td> 
                                            <button  type="button" data-index="<?=$utility_list->id?>" class="view_utility btn btn-outline-warning btn-sm">View</button>
                                            <a type="button" href="<?=site_url('admin/ownerutilityupdate/'.$utility_list->id)?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a type="button" href="<?=site_url('admin/ownerutilitydelete/'.$utility_list->id)?>" class="btn btn-outline-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr> 
                                    <?php }} ?>
                                    
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
    <div id="owner_utility" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('admin/owner_utility.o_d'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="utility_modal_body">
                    <div class="text-center">
                        <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">
                        <h3>John Peterson</h3>
                    </div>
                    <hr>
                    <h4>Details Infromation</h4>
                    <div class="row">
                      <div class="col-md-6"> <b>Owner Name :</b> John Peterson<br>
                        <b>Email  :</b> john@gmail.com<br>
                        <b>Password :</b> 123456<br>
                        <b>Contact :</b> +8801679110711<br>
                        <b>Present Address :</b> 7790 4th St. Woodhaven, NY 11421<br>
                        <b>Permanent Address :</b> 8349 Marlborough Dr. Marlborough, MA 01752<br>
                        <b>NID(National ID) :</b> 90909-4343434-1212121<br>
                      </div>
                      <div class="col-md-6"> 
                        <b>Owner Unit :</b>
                        <div align="left">1 . &nbsp;&nbsp;Flat 1A&nbsp;&nbsp;(First Floor)</div><div align="left">2 . &nbsp;&nbsp;Flat 2A&nbsp;&nbsp;(Second Floor)</div>                          
                       </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- end main content-->
<script>
      $(document).ready(function(){

      $(document).on("click",".view_utility",function () {
        
        var utility_id = $(this).attr('data-index');
        var utility_id = $(this).attr('data-index');
        

        $.ajax({
      url:"<?php echo base_url('admin/indivusualutility'); ?>",
      method:"POST",
      data:{utility_id:utility_id},
      dataType:'JSON',
      success:function(data)
      {
          var utility=data.indivisual_utility;
          
        
          console.log(utility['id']);
          
          if(utility["owner_image"]!='empty_image.jpg'){
             var image = '<?= base_url();?>/admin/assets/owner_image/thumbnail/'+utility["owner_image"]+'';
          }else{
            var image ='<?= base_url();?>/admin/assets/images/empty_image.jpg';
          }

          
          
          html='<div class="text-center"><img class="rounded-circle avatar-xl" alt="200x200" src="'+image+'" data-holder-rendered="true"><h3>'+utility["owner_name"]+'</h3></div><hr><h4><?php echo lang('admin/owner_utility.d_i'); ?></h4><div class="row"><div class="col-md-6"> <b><?php echo lang('admin/owner_utility.m_n'); ?> :</b> '+utility["month"]+'<br><b><?php echo lang('admin/owner_utility.y_n'); ?>  :</b> '+utility["year"]+'<br><b><?php echo lang('admin/owner_utility.w_b'); ?> :</b> '+utility["water_bill"]+'<br><b><?php echo lang('admin/owner_utility.e_b'); ?> :</b> '+utility["electric_bill"]+'<br><b><?php echo lang('admin/owner_utility.g_b'); ?> :</b> '+utility["gas_bill"]+'<br><b><?php echo lang('admin/owner_utility.s_b'); ?> :</b> '+utility["security_bill"]+'<br><b><?php echo lang('admin/owner_utility.U_bill'); ?> :</b> '+utility["utility_bill"]+'<br><b><?php echo lang('admin/owner_utility.o_bill'); ?> :</b> '+utility["others_bill"]+'<br><b><?php echo lang('admin/owner_utility.issue_date'); ?> :</b> '+utility["issue_date"]+'</div><div class="col-md-6"><b><?php echo lang('admin/owner_utility.total_rent'); ?> : '+utility["total_rent"]+'</b></div></div>';

         $('#utility_modal_body').html(html);
          
         $("#owner_utility").modal("show");


      }

});

});
});
</script>
<?php echo $this->endSection('content')?>