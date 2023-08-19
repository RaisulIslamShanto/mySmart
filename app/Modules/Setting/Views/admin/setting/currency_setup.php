<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<?php
  $edit= menu_access('currencyupdate');
  $delete= menu_access('currencydelete');
 ?>

<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('setting/Currency_setup.curset_head'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/Currency_setup.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('setting/Currency_setup.curset_head'); ?></li>
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
                            <h4 class="card-title mb-4"><?php echo lang('setting/Currency_setup.curset_form'); ?></h4> 
                            <?php
                            if(isset($insert_success)){
                                echo "<h4 style='color:red;text-align:center;'class='text-danger'>".$insert_success."</h4>";
                            }
                            if(isset($update_success)){
                                echo "<h4 style='color:red;text-align:center;'class='text-danger'>".$update_success."</h4>";
                            }
                            if(isset($delete_success)){
                                echo "<h4 style='color:red;text-align:center;'class='text-danger'>".$delete_success."</h4>";
                            }
                            ?>
                            <form action="<?php echo base_url('admin/currencysetup'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('setting/Currency_setup.curset_symbol'); ?></label>
                                        <input type="text" class="form-control" name="symbol" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('symbol')) {
                                                echo $validation->getError('symbol');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                        Symbol is required.
                                    </div>
                                    </div> 
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('setting/Currency_setup.curset_name'); ?></label>
                                        <input type="text" class="form-control" name="name" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('name')) {
                                                echo $validation->getError('name');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                        Symbol is required.
                                    </div>
                                    </div>  
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="reset" class="btn btn-warning btn-rounded" value="<?php echo lang('setting/Currency_setup.reset'); ?>" name="">
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/Currency_setup.created'); ?></button>
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
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('setting/Currency_setup.cursetlist_list'); ?></h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col"><?php echo lang('setting/Currency_setup.cursetlist_symbol'); ?></th>  
                                        <th scope="col"> <?php echo lang('setting/Currency_setup.cursetlist_name'); ?></th>  
                                         
                                        <th scope="col"><?php echo lang('setting/Currency_setup.cursetlist_action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($currencies as $currency){
                                    ?>
                                    <tr>    
                                        <td><?=$currency['symbol'];?></td> 
                                        <td><?=$currency['name'];?></td> 
                                        <td>  
                                            <?php if($edit){?>
                                            
                                            <a type="button" href="<?=site_url('admin/currencyupdate/'.$currency['id'])?>" class="btn btn-outline-success btn-sm"><?php echo lang('setting/Currency_setup.cursetlist_edit'); ?></a>
                                            <?php } if($delete){?>

                                            <a href="<?= site_url('admin/currencydelete/'.$currency['id'])?> ">
                                            <button type="button" class="btn btn-outline-danger btn-sm">
                                                <?php echo lang('setting/Currency_setup.cursetlist_delete'); ?>
                                            </button>
                                            </a>
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
 

<!-- end main content-->
<?php echo $this->endSection('content') ?>