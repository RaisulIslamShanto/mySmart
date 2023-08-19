<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>

<?php 
  $edit= menu_access('billupdate');
  $delete= menu_access('billdelete');
  ?>
  
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/bill_deposit.b_list'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/bill_deposit.b_list'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?= base_url('admin/addbill')?>" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('admin/bill_deposit.add_b'); ?>  </a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('admin/bill_deposit.b_list'); ?></h4> 
                            <?php 
                    if(session()->getFlashdata('success')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('success')."</div>";
                     }
                    ?>
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col"><?php echo lang('admin/bill_deposit.b_type'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/bill_deposit.issue_date'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/bill_deposit.b_month'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/bill_deposit.b_year'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/bill_deposit.total_amount'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/bill_deposit.d_b_n'); ?></th>   
                                        <th scope="col"><?php echo lang('admin/bill_deposit.action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // print_r($bill_lists);die();
                                    foreach($bill_lists as $bill_list){ ?>

                                   
                                    <tr>   
                                        <td><?=$bill_list->billtype_name;?></td>
                                        <td><?=date_formats($bill_list->bill_date);?></td> 
                                        <td><?=$bill_list->month;?></td> 
                                        <td><?=$bill_list->year;?></td> 
                                        <td><?php currency($bill_list->total_amount);?></td> 
                                        <td><?=$bill_list->bank_name;?></td> 
                                         
                                        <td>
                                        <button type="button" data-index="<?=$bill_list->id?>" class="view_bill btn btn-outline-warning btn-sm">View</button> 
                                        <?php if($edit){?> 
                                            <a type="button" href="<?=site_url('admin/billupdate/'.$bill_list->id)?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <?php }?>
                                            <?php if($delete){?> 
                                            <a type="button" href="<?=site_url('admin/billdelete/'.$bill_list->id)?>" class="btn btn-outline-danger btn-sm" >Delete</a>
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
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Owner Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bill_modal">
                    
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- end main content-->
<script>
      $(document).ready(function(){

      $(document).on("click",".view_bill",function () {
    
        var bill_id = $(this).attr('data-index');

        $.ajax({
      url:"<?php echo base_url('admin/indivisualbill'); ?>",
      method:"POST",
      data:{bill_id:bill_id},
      dataType:'JSON',
      success:function(data)
      {
        
        
          var bill=data.bill_data;
          console.log(bill);
          console.log(bill["id"]);

         var html='<h4><?php echo lang('admin/bill_deposit.d_info'); ?></h4><div class="row"><div class="col-md-6"> <b><?php echo lang('admin/bill_deposit.b_type'); ?> :</b> '+bill["bill_type"]+'<br><b><?php echo lang('admin/bill_deposit.issue_date'); ?> :</b> '+bill["bill_date"]+'<br><b><?php echo lang('admin/bill_deposit.b_month'); ?> :</b> '+bill["month"]+'<br><b><?php echo lang('admin/bill_deposit.b_year'); ?> :</b> '+bill["year"]+'<br><b><?php echo lang('admin/bill_deposit.total_amount'); ?> : </b> '+bill["total_amount"]+'<br></div><div class="col-md-6"><b><?php echo lang('admin/bill_deposit.d_b_n'); ?> :</b> '+bill["bank_name"]+'<br><b><?php echo lang('admin/bill_deposit.details'); ?> :</b>'+bill["details"]+'<br></div></div>';
          
         $('#bill_modal').html(html);

         $("#modal_show").modal("show");

      }

});

});
});
</script>
   
<?php echo $this->endSection('content')?>
