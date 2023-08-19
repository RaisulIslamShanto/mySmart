<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/rent.r_list'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/rent.r_list'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?=base_url('admin/addrent');?>" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('admin/rent.add_r'); ?></a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('admin/rent.r_list'); ?></h4> 
                            <?php 
                    if(!empty($success)){
                        echo '<div class="alert alert-success text-center">'.$success."</div>";
                     }
                    ?>
                    <?php 
                    if(session()->getFlashdata('success')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('success')."</div>";
                     }
                    ?>
                            
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr> 
                                        <th scope="col">#<?php echo lang('admin/rent.invoice'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.r_name'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.type'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/rent.floor_no'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.unit_no'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.month'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.year'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.status'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/rent.total_rent'); ?></th>
                                        <th scope="col"><?php echo lang('admin/rent.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //print_r($rents);die();
                                    foreach($rents as $rent){
                                    ?>
                                    <tr>  
                                        <td><?=$rent->id;?></td>
                                        <td><?=$rent->tenent_name;?></td>
                                        <td>Rented</td>
                                        <td><?=$rent->floor_name;?></td>
                                        <td><?=$rent->unit_name;?></td>
                                        <td><?php
                                        if($rent->month==1){
                                            echo "January";
                                        }elseif($rent->month==2){
                                            echo "February";
                                        }elseif($rent->month==3){
                                            echo "March";
                                        }elseif($rent->month==4){
                                            echo "April";
                                        }elseif($rent->month==5){
                                            echo "May";
                                        }elseif($rent->month==6){
                                            echo "June";
                                        }elseif($rent->month==7){
                                            echo "July";
                                        }elseif($rent->month==8){
                                            echo "August";
                                        }elseif($rent->month==9){
                                            echo "September";
                                        }elseif($rent->month==10){
                                            echo "October";
                                        }elseif($rent->month==11){
                                            echo "November";
                                        }elseif($rent->month==12){
                                            echo "December";
                                        }
                                        ?></td>
                                        <td><?=$rent->year;?></td>
                                        <td><span class="badge bg-primary"><?php if($rent->year==0){echo"Due";}else{echo"Paid";}?></span></td>
                                        <td><?=$rent->total_rent;?></td>
                                        <td>
                                            <a href="<?=site_url('admin/rentinvoice/'.$rent->id)?>" target="_blank" class="btn btn-outline-info btn-sm"><?php echo lang('admin/rent.invoice'); ?></a>
                                            <button type="button" data-index="<?=$rent->id?>"  class="view_rent btn btn-outline-warning btn-sm">View</button>
                                            <a type="button" href="<?=site_url('admin/rentupdate/'.$rent->id)?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a type="button" href="<?=site_url('admin/rentdelete/'.$rent->id)?>" class="btn btn-outline-danger btn-sm" >Delete</a>
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
    <div id="rent_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('admin/rent.owner_d'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="rent_modal_body" class="modal-body">
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

      $(document).on("click",".view_rent",function () {
        
        var rent_id = $(this).attr('data-index');
        

        $.ajax({
      url:"<?php echo base_url('admin/indivusualrent'); ?>",
      method:"POST",
      data:{rent_id:rent_id},
      dataType:'JSON',
      success:function(data)
      {
          var rent=data.indivisual_rent;
          
          console.log(rent['id']);

          html='<div class="text-center"><img class="rounded-circle avatar-xl" alt="200x200" src="<?= base_url();?>./uploads/'+rent["tenent_image"]+'" data-holder-rendered="true"><h3>'+rent['renter_name']+'</h3></div><hr><h4><?php echo lang('admin/rent.d_info'); ?></h4><div class="row"><div class="col-md-6"> <b><?php echo lang('admin/rent.r_name'); ?> :</b>'+rent["renter_name"]+'<br><b><?php echo lang('admin/rent.floor_no'); ?>  :</b> '+rent["floor_name"]+'<br><b><?php echo lang('admin/rent.unit_no'); ?> :</b> '+rent["unit_name"]+'<br><b><?php echo lang('admin/rent.month'); ?> :</b>'+rent["month"]+'<br><b><?php echo lang('admin/rent.year'); ?> :</b> '+rent["year"]+'<br><b><?php echo lang('admin/rent.rent'); ?> :</b> '+rent["rent"]+'<br><b><?php echo lang('admin/rent.e_b'); ?> :</b> '+rent["electric_bill"]+'<br><b><?php echo lang('admin/rent.w_b'); ?> :</b> '+rent["water_bill"]+'<br></div><div class="col-md-6"><b><?php echo lang('admin/rent.g_b'); ?> :</b>'+rent["gas_bill"]+'<br><b><?php echo lang('admin/rent.s_b'); ?> :</b>'+rent["security_bill"]+'<br><b><?php echo lang('admin/rent.U_bill'); ?> :</b>'+rent["utility_bill"]+'<br><b><?php echo lang('admin/rent.o_bill'); ?> :</b>'+rent["other_bill"]+'<br><b><?php echo lang('admin/rent.total_rent'); ?> :</b>'+rent["total_rent"]+'<br><b><?php echo lang('admin/rent.issue_date'); ?> :</b>'+rent["issue_date"]+'<br><b><?php echo lang('admin/rent.paid_date'); ?> :</b>'+rent["bill_paid_date"]+'<br><b><?php echo lang('admin/rent.b_s'); ?> :</b>'+rent["bill_status"]+'<br></div></div>';

            $('#rent_modal_body').html(html);
            $("#rent_modal").modal("show");
         


      }

});

});
});
</script>

<?php echo $this->endSection('content') ?>