<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('setting/User_setup.adminsetup_start'); ?> </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/User_setup.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/User_setup.usersetup_start'); ?></li>
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
                <h4 class="card-title mb-4"> <?php echo lang('setting/User_setup.usersetup_update'); ?></h4>
                       

                        <form action="<?= base_url('admin/property_user_edit/'.$user['id']) ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_email'); ?></label>
                                    <input type="email" class="form-control" name="email" value="<?=$user['email']?>" required>
                                    <p style="color:red;" class="text-danger"></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_email'); ?>
                                    </div>
                                   
                            </div>

                            <div class="col-md-6 mt-4">
                                <label><?php echo lang('setting/User_setup.user_name'); ?></label>
                                <input type="text" class="form-control" name="name" value="<?=$user['name']?>" required>
                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    if ($validation->hasError('name')) {
                                        echo $validation->getError('name');
                                    }
                                } ?></p>
                                <div class="invalid-feedback">
                                <?php echo lang('admin/super_admin.e_name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label><?php echo lang('setting/User_setup.user_phone'); ?></label>
                                <input type="text" class="form-control" name="contact_no" value="<?=$user['contactno']?>" required>
                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    if ($validation->hasError('contact_no')) {
                                        echo $validation->getError('contact_no');
                                    }
                                } ?></p>
                                <div class="invalid-feedback">
                                <?php echo lang('admin/super_admin.contact'); ?>
                                </div>

                            </div>
                            <div class="col-md-6 mt-4">
                                <label><?php echo lang('setting/User_setup.user_pass'); ?></label>
                                <input type="password" class="form-control" name="password" value="<?=$user['password']?>" required>
                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    if ($validation->hasError('password')) {
                                        echo $validation->getError('password');
                                    }
                                } ?></p>
                                <div class="invalid-feedback">
                                <?php echo lang('admin/super_admin.e_password'); ?>
                                </div>
                            </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_branch'); ?></label>
                                    <select name="branch" id="ddlBranch" class="form-control" required>
                                        <option value="">--Select Branch--</option>
                                        <option value="8" <?php if ($user['branch'] == '8') {
                                                                echo "selected";
                                                            } ?>>Home</option>
                                        <option value="7">Silver Tower</option>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('branch')) {
                                            echo $validation->getError('branch');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_branch'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_type'); ?></label>
                                     
                                    <select name="types" id="ddlBranch" class="form-control" disabled>
                                        <option value="">--Select Type--</option>

                                        <option value="1" <?php if($user['type']==1){echo "selected";}?>>Landloard</option>
                                        <option value="2" <?php if($user['type']==2){echo "selected";}?>>Property Manager</option>
                                      
                                    </select>
                                   
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.account_status'); ?></label>

                                    <select name="status" id="ddlBranch" class="form-control">
                                        <option value="">--Select Type--</option>

                                        <option value="1" <?php if($user['type']==1){echo "Selected";}?>>Active</option>
                                        <option value="2" <?php if($user['type']==2){echo "Selected";}?>>In-Active</option>

                                    </select>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_image'); ?></label>
                                    <div class="poperty_image_upload">
                                        <input type="hidden" name="pre_image" value="<?= $user['image']; ?>">
                                        <input class="form-control--uploader" name="image" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">

                                        <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('setting/User_setup.user_image'); ?> </span> </label>
                                        <img id="soutput" src="<?= base_url(); ?>/admin/assets/user/thumbnail/<?= $user['image']; ?>" class="img-fluid">
                                    </div>
                                </div>


                            </div>
                            <div class="d-flex mt-4">
                                <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/User_setup.update'); ?></button>
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


        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- end main content-->
<?php echo $this->endSection('content') ?>