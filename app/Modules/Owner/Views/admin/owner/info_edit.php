<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('admin/owner.o_u_f'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('admin/owner.Home'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('admin/owner.o_u_f'); ?></li>
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
                         

                        <form class="needs-validation" action="<?= site_url('admin/ownerupdate/' . $owner_info['owner_id']) ?>" method="POST" enctype="multipart/form-data" novalidate>

                            <input type="hidden" class="form-control" name="owner_id" value="<?= $owner_info['owner_id']; ?>">
                            <input type="hidden" class="form-control" name="pre_image" value="<?= $owner_info['image']; ?>">

                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/owner.owner_n'); ?> :</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $owner_info['name']; ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('name')) {
                                                                                        echo $validation->getError('name');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_name'); ?>
                                    </div>


                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/owner.email'); ?>:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $owner_info['email']; ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('email')) {
                                                                                        echo $validation->getError('email');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_email'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/owner.password'); ?> :</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= $owner_info['password']; ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('password')) {
                                                                                        echo $validation->getError('password');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_pass'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/owner.c_no'); ?>:</label>
                                    <input type="number" class="form-control" id="contact_no" name="contact_no" value="<?= $owner_info['contact_no']; ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('contact_no')) {
                                                                                        echo $validation->getError('contact_no');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_contact'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/owner.pre_a'); ?>:</label>
                                    <textarea class="form-control" id="present_address" name="present_address" required><?= $owner_info['present_address']; ?></textarea>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('present_address')) {
                                                                                        echo $validation->getError('present_address');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_pre_a'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/owner.per_a'); ?> :</label>
                                    <textarea class="form-control" id="parmanent_address" name="parmanent_address" required><?= $owner_info['parmanent_address']; ?></textarea>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('parmanent_address')) {
                                                                                        echo $validation->getError('parmanent_address');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_par_a'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label>* <?php echo lang('admin/owner.nid'); ?> <?php echo lang('admin/owner.owner_n'); ?>:</label>
                                    <input type="number" class="form-control" id="nid" name="nid" value="<?= $owner_info['nid']; ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('nid')) {
                                                                                        echo $validation->getError('nid');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_nid'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('admin/owner.o_u'); ?>:</label>
                                    <div class="form-control">

                                        <?php
                                        $i = 1;
                                        foreach ($total_units as $unit) {

                                        ?>

                                            <div class="mb-2">
                                                <input class="" type="checkbox" value="<?= $unit['unitno'] . ',' . $unit['id']; ?>" name="ChkOwnerUnit[]" id="ChkOwnerUnit<?= $i; ?>" <?php

                                                                                                                                                                                foreach ($owner_units as $owner_unit) {

                                                                                                                                                                                    if ($unit['id'] == $owner_unit['unit_id']) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }
                                                                                                                                                                                }
                                                                                                                                                                                ?>>
                                                <?php
                                                if (isset($exits_units)) {
                                                    if (in_array($unit['id'], $exits_units)) {
                                                        echo "<del style='color:red;'>" . $unit['unitno'] . "</del>";
                                                    } else {
                                                        echo $unit['unitno'];
                                                    }
                                                } else {
                                                    echo $unit['unitno'];
                                                }



                                                ?>
                                            </div>

                                        <?php $i++;
                                        } ?>





                                    </div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('ChkOwnerUnit')) {
                                                                                        echo $validation->getError('ChkOwnerUnit');
                                                                                    }
                                                                                } ?></p>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label><?php echo lang('admin/owner.o_p'); ?> :</label>
                                    <div class="card">

                                        <div class="poperty_image_upload">
                                            <input class="form-control--uploader" type="file" name="images" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                            <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span><?php echo lang('admin/owner.u_p'); ?> </span> </label>
                                            <img id="soutput" src="<?php echo base_url(); ?>/admin/assets/owner_image/thumbnail/<?php if ($owner_info['image'] != ''){
                                            echo  $owner_info['image'];
                                                    } else {
                                            echo "empty_image.jpg";
                                                    } ?>" class="img-fluid" />

                                        </div>
                                    </div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('image')) {
                                            echo $validation->getError('image');
                                        }
                                    } ?></p>
                                </div>

                            </div>
                            <div class="d-flex mt-4">
                                <a href="<?php echo base_url() ?>/admin/ownerlist" class="btn btn-outline-danger btn-rounded "><?php echo lang('admin/owner.cancel'); ?></a>
                                <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/owner.updated'); ?></button>
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
<?php echo $this->endSection('content') ?>