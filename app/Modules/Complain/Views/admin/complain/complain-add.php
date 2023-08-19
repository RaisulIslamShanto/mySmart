<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('Complain.comadd_start'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Complain.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('Complain.comadd_start'); ?></li>
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
                            <h4 class="card-title mb-4"> <?php echo lang('Complain.com_start'); ?></h4> 
                            
                            <form action="<?php echo base_url() ?>/admin/complain_add" method="post" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Complain.com_title'); ?></label>
                                        <input type="text" class="form-control" name="com_title" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('com_title');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Complain.com_description'); ?></label>
                                        <textarea class="form-control" name="com_description" required></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('com_description');
                                        } ?>
                                        </small>
                                    </div>
                             
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Complain.com_date'); ?></label>
                                        <input type="date" class="form-control" name="com_date" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('com_date');
                                        } ?>
                                        </small>
                                    </div>
                                       
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/complain_list"><?php echo lang('Complain.cancel'); ?></a>
                                    <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Complain.created'); ?></button>
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
            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
 
<!-- end main content-->
<?= $this->endSection() ?>