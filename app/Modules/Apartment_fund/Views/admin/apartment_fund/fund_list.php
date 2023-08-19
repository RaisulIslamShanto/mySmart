<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>
<?php 
  $edit= menu_access('fundupdate');
  $delete= menu_access('funddelete');
  ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/apartment_fund.f_list'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/apartment_fund.f_list'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?= base_url('admin/addfund')?>" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i><?php echo lang('admin/apartment_fund.add_f'); ?> </a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('admin/apartment_fund.f_list'); ?></h4>
                            <?php 
                    if(session()->getFlashdata('success')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('success')."</div>";
                     }
                    ?>
                            
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col"><?php echo lang('admin/apartment_fund.image'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/apartment_fund.owner_n'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/apartment_fund.month'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/apartment_fund.year'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/apartment_fund.date'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/apartment_fund.amount'); ?></th>   
                                        <th scope="col"><?php echo lang('admin/apartment_fund.action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                      foreach($funds as $fund){

                                    ?>
                                    <tr>   
                                        <td>
                                            <img class="rounded-circle avatar-xs" alt="200x200" src="
                                            <?php
                                            if($fund->owner_image=='empty_image.jpg'){
                                              echo base_url();?>/admin/assets/images/<?= $fund->owner_image;
                                            }else{
                                                echo base_url();?>/admin/assets/owner_image/thumbnail/<?= $fund->owner_image;
                                            }
                                            ?>" data-holder-rendered="true">
                                        </td>
                                        <td><?=$fund->owner_name;?></td>
                                        <td><?=$fund->month;?></td> 
                                        <td><?=$fund->year;?></td> 
                                        <td><?=date_formats($fund->issue_date);?></td>
                                        <td><?php currency($fund->total_amount); ?></td>
                                         
                                        <td> 
                                            <a href="<?=site_url('admin/invoice/'.$fund->id)?>" target="_blank" class="btn btn-outline-info btn-sm"><?php echo lang('admin/apartment_fund.invoice'); ?></a>
                                            <button type="button" data-index="<?=$fund->id?>" class="view_fund btn btn-outline-warning btn-sm">View</button> 
                                            <?php if($edit){?>
                                            <a type="button" href="<?=site_url('admin/fundupdate/'.$fund->id)?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <?php }?>
                                            <?php if($delete){?>
                                            <a type="button" href="<?=site_url('admin/funddelete/'.$fund->id)?>" class="btn btn-outline-danger btn-sm" >Delete</a>
                                            <?php }?>
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
                    <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('admin/apartment_fund.owner_d'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="fund_body">
                     <div class="text-center">
                        <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">
                        <h3>John Peterson</h3>
                    </div>
                    <hr/>
                    <h4>Details Infromation</h4>
                     <div class="row">
                      <div class="col-xs-6"> <b>Owner Name :</b> John Peterson<br>
                        <b>Month :</b> August<br>
                        <b>Amount : </b> $200.00<br>
                        <b>Date :</b> 27/08/2019<br>
                      </div>
                      <div class="col-xs-6"> <b>Purpose :</b> Monthly Fund<br>
                      </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- end main content-->
<script>
      $(document).ready(function(){

      $(document).on("click",".view_fund",function () {
    
        var fund_id = $(this).attr('data-index');

        $.ajax({
      url:"<?php echo base_url('admin/indivisualfund'); ?>",
      method:"POST",
      data:{fund_id:fund_id},
      dataType:'JSON',
      success:function(data)
      {
        
        
          var funds=data.fund;
          console.log(funds);
          console.log(funds["id"]);

          if(funds["owner_image"]!='empty_image.jpg'){
             var image = '<?= base_url();?>/admin/assets/owner_image/thumbnail/'+funds["owner_image"]+'';
          }else{
            var image ='<?= base_url();?>/admin/assets/images/empty_image.jpg';
          }

         var html='<div class="text-center"><img class="rounded-circle avatar-xl" alt="200x200" src="'+image+'" data-holder-rendered="true"><h3>'+funds["owner_name"]+'</h3></div><hr/><h4><?php echo lang('admin/apartment_fund.d_info'); ?></h4><div class="row"><div class="col-xs-6"> <b><?php echo lang('admin/apartment_fund.owner_n'); ?> :</b>'+funds["owner_name"]+'<br><b><?php echo lang('admin/apartment_fund.month'); ?> :</b> '+funds["month"]+'<br><b><?php echo lang('admin/apartment_fund.amount'); ?> : </b>'+funds["total_amount"]+'<br><b><?php echo lang('admin/apartment_fund.date'); ?> :</b>'+funds["issue_date"]+'<br></div><div class="col-xs-6"> <b><?php echo lang('admin/apartment_fund.purpose'); ?> :</b> '+funds["purpose"]+'<br></div></div>';
          
         $('#fund_body').html(html);

         $("#modal_show").modal("show");

      }

});

});
});
</script>

<?php echo $this->endSection('content')?>