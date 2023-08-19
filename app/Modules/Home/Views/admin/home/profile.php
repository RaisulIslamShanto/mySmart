<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
    <div class="container-fluid">

    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                        <h1  class="card-title mb-4 text-center">Profile of <?=$user['name']?></h1>

                            <div class="row">
                                <div class="col-md-12 mt-12 text-center">
                                  <img id="soutput" src="<?php echo base_url() ?>/admin/assets/user/thumbnail/<?php if($user['image']!=''){ echo $user['image'];}else{ echo "empty_image.jpg"; }?>" class="text-center m-auto rounded-circle">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_email'); ?></label>
                                    <input disabled type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('email')) {
                                            echo $validation->getError('email');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Email is required.
                                    </div>
                                    <?php
                                    if (isset($email_check)) {
                                        echo "<p style='color:red;text-align:left;'class='text-danger'>" . $email_check . "</p>";
                                    }
                                    ?>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_name'); ?></label>
                                    <input disabled type="text" class="form-control" name="name" value="<?= $user['name'] ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('name')) {
                                            echo $validation->getError('name');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_phone'); ?></label>
                                    <input disabled type="text" class="form-control" name="contact_no" value="<?= $user['contactno'] ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('contact_no')) {
                                            echo $validation->getError('contact_no');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Contact No is required.
                                    </div>

                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_pass'); ?></label>
                                    <input disabled type="password" class="form-control" name="password" value="<?= $user['password'] ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('password')) {
                                            echo $validation->getError('password');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Password is required.
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_branch'); ?></label>
                                    <select disabled name="branch" id="ddlBranch" class="form-control" required>
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
                                        Branch is required.
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_type'); ?></label>
                                    <select disabled name="user_type" id="ddlBranch" class="form-control"
                                    <?php 
                                    if ($user['id'] == $user['company_id']) {
                                         echo "disabled";
                                    }
                                    ?>
                                     required>
                                        <option value="">--Select Type--</option>

                                        <?php
                                        foreach ($roles as $role) { ?>
                                            <option value="<?= $role['id']; ?>" <?php if ($user['user_type'] == $role['id']) {
                                                echo "selected";
                                            } ?>><?= $role['role_name']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('user_type')) {
                                            echo $validation->getError('user_type');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Type is required.
                                    </div>
                                </div>
                                


                            </div>
                           

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
</div>

 <?= $this->endSection() ?>