<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?> 


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('setting/Month_setup.month_head'); ?> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/Month_setup.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('setting/Month_setup.month_head'); ?> </li>
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
                            <h4 class="card-title mb-4"><?php echo lang('setting/Month_setup.month_form'); ?></h4>
                            
                            <form action="<?php echo base_url() ?>/admin/monthsetup_edit/<?= $getSetupEdit['id']; ?>" method="post"
                            class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label><h4 class="card-title mb-4"><?php echo lang('setting/Month_setup.month_name'); ?></h4></label>
                                        <input type="text" class="form-control" name="month_name"
                                        value="<?= $getSetupEdit['monthname']; ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('month_name');
                                        } ?>
                                        </small>
                                    </div>  
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/monthsetup_add"><?php echo lang('setting/Month_setup.cancel'); ?></a>
                                    <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/Month_setup.update'); ?></button>
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
                            <h4 class="card-title mb-4"><?php echo lang('setting/Month_setup.monthlist_list'); ?></h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col"><?php echo lang('setting/Month_setup.monthlist_name'); ?></th>  
                                        <th scope="col"><?php echo lang('setting/Month_setup.monthlist_action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getMonthSetups as $monthSetups) : ?>
                                    <tr>    
                                        <td><?= $monthSetups['monthname']; ?></td> 
                                        <td>
                                            <a href="<?php echo base_url() ?>/admin/monthsetup_edit/<?= $monthSetups['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('setting/Month_setup.monthlist_edit'); ?></button>
                                            </a>
                                            <a href="<?php echo base_url() ?>/admin/monthsetup_delete/<?= $monthSetups['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('setting/Month_setup.monthlist_delete'); ?></button>
                                            </a>
                                        </td>
                                    </tr>
                                   <?php endforeach; ?>
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
<?= $this->endSection() ?>
