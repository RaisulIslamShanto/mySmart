<?php echo $this->extend('\Modules\Master\Views\master')?>

<?php echo $this->section('content')?>


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/owner.o_l'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/owner.o_l'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?=base_url('admin/owneradd');?>" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i><?php echo lang('admin/owner.a_o'); ?></a>
                    </div>
                    <?php 
                    if(session()->getFlashdata('success')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('success')."</div>";
                     }
                    ?>
                    <div class="card">
                        <div class="card-body ">
                    
                            
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr> 
                                        <th scope="col"><?php echo lang('admin/owner.image'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner.owner_n'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner.email'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/owner.contact'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner.pre_a'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner.o_u'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/owner.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        foreach($owners_list as  $owner){
                                       
                                        ?>
                                        <tr> 
                                        <td> 
                                           <img class="rounded-circle avatar-xs" alt="200x200"
                                           src="<?php
                                        if($owner['image']=='empty_image.jpg'){
                                            echo base_url();?>/admin/assets/images/<?= $owner['image'];
                                          }else{
                                              echo base_url();?>/admin/assets/owner_image/thumbnail/<?= $owner['image'];
                                          }?>" data-holder-rendered="true">
                                        </td> 
                                        <td><?= $owner['name'];?></td>
                                        <td><?= $owner['email'];?></td>
                                        <td><?= $owner['contact_no'];?></td>
                                        <td><?= $owner['present_address'];?></td>
                                        <td>
                                            <ol>
                                            <?= view_cell('\Modules\Owner\Controllers\Ownercontroller::get_units', ['owner_id' => $owner['owner_id']]) ?>

                                               
                                            </ol>
                                        </td>
                                        <td>

                                        <button type="button" data-index="<?=$owner['owner_id']?>" class="view_owner btn btn-outline-warning btn-sm">View</button>
                                            <a href="<?=site_url('admin/ownerupdate/'.$owner['owner_id'])?>" type="button" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a type="button"href="<?=site_url('admin/ownerdelete/'.$owner['owner_id'])?>" class="btn btn-outline-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr> 
                                   
                                        <?php } ?>
                                    
                                  
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
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Owner Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="show_datas">
                    <!-- <div class="text-center">
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
                        <div align="left">1 . &nbsp;&nbsp;Flat 1A&nbsp;&nbsp;(First Floor)</div>
                        <div align="left">2 . &nbsp;&nbsp;Flat 2A&nbsp;&nbsp;(Second Floor)</div>                          
                       </div> -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- end main content-->

<script>
      $(document).ready(function(){

      $(document).on("click",".view_owner",function () {
        $("#owner_info").modal("show");
        var owner_id = $(this).attr('data-index');

        $.ajax({
      url:"<?php echo base_url('admin/indivusualowner'); ?>",
      method:"POST",
      data:{owner_id:owner_id},
      dataType:'JSON',
      success:function(data)
      {
          var indivisual_info=data.indivisual_info;
          var indivisual_units=data.indivisual_units;
          var i;
          var html= '';
          var htmll= '';
        
          console.log(indivisual_info['owner_id']);

          for(i=0; i<indivisual_units.length; i++){
            console.log(indivisual_units[i].unit_name);
            htmll +='<div align="left">'+indivisual_units[i].unit_name+'</div>';
            
          }
          if(indivisual_info["image"]!='empty_image.jpg'){
             var image = '<?= base_url();?>/admin/assets/owner_image/thumbnail/'+indivisual_info["image"]+'';
          }else{
            var image ='<?= base_url();?>/admin/assets/images/empty_image.jpg';
          }
          
          html='<div class="text-center"><img class="rounded-circle avatar-xl" alt="200x200" src="'+image+'" data-holder-rendered="true"><h3>'+indivisual_info["name"]+'</h3></div><hr><h4><?php echo lang('admin/owner.o_d'); ?></h4><div class="row"><div class="col-md-6"> <b><?php echo lang('admin/owner.owner_n'); ?> :</b> '+indivisual_info["name"]+'<br><b><?php echo lang('admin/owner.email'); ?>  :</b> '+indivisual_info["email"]+'<br><b><?php echo lang('admin/owner.password'); ?> :</b> '+indivisual_info["password"]+'<br><b><?php echo lang('admin/owner.contact'); ?> :</b> '+indivisual_info["contact_no"]+'<br><b><?php echo lang('admin/owner.pre_a'); ?> :</b> '+indivisual_info["present_address"]+'<br><b><?php echo lang('admin/owner.per_a'); ?> :</b> '+indivisual_info["parmanent_address"]+'<br><b><?php echo lang('admin/owner.nid'); ?> :</b> '+indivisual_info["nid"]+'<br></div><div class="col-md-6"><b><?php echo lang('admin/owner.o_u'); ?> :</b>'+htmll+'</div></div>';

         $('#show_datas').html(html);
         $("#modal_show").modal("show");


      }

});

});
});
</script>
<?php echo $this->endSection('content')?>