<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('Meeting.meadd_start'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Meeting.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('Meeting.meadd_start'); ?></li>
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
                            <h4 class="card-title mb-4">  <?php echo lang('Meeting.meeadd_start'); ?></h4> 
                            
                            <form action="<?php echo base_url() ?>/admin/meeting_add" method="post" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Meeting.mee_issuedate'); ?></label>
                                        <input type="date" class="form-control" name="mee_issuedate" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('mee_issuedate');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Meeting.mee_title'); ?></label>
                                        <input type="text" class="form-control" name="mee_title" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('mee_title');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Meeting.mee_description'); ?></label>
                                        <textarea id="elm1" class="form-control" name="mee_description" required></textarea>
                                    </div>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('mee_description');
                                    } ?>
                                    </small>
                                   
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/meeting_list"><?php echo lang('Meeting.cancel'); ?></a>
                                    <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Meeting.created'); ?></button>
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