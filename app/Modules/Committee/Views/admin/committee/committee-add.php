<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Management_commitee.commiteeadd_start'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Management_commitee.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Management_commitee.commiteeadd_start'); ?></li>
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
                        <h4 class="card-title mb-4"><?php echo lang('Management_commitee.m_start'); ?></h4>

                        <form action="<?php echo base_url() ?>/admin/committee_add" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_membername'); ?></label>
                                    <input type="text" class="form-control" name="m_membername" value="" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_membername');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_email'); ?></label>
                                    <input type="email" class="form-control" name="m_email" value="" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('m_email');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_password'); ?></label>
                                    <input type="password" class="form-control" name="m_password" value="" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('m_password');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_phone'); ?></label>
                                    <input type="text" class="form-control" name="m_phone" value="" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('m_phone');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_presentads'); ?></label>
                                    <textarea class="form-control" name="m_presentads" required></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('m_presentads');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_permanentads'); ?></label>
                                    <textarea class="form-control" name="m_permanentads" required></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('m_permanentads');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_nid'); ?></label>
                                    <input type="text" class="form-control" name="m_nid" value="" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('m_nid');
                                } ?>
                                </small>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_designation'); ?></label>
                                    <select name="m_designation" class="form-control" required>
                                        <option value="">--Select--</option>
                                        <option value="Moderator">Moderator</option>
                                        <option value="Secretary General">Secretary General</option>
                                        <option value="Member">Member</option>
                                        <option value="Pion">Pion</option>
                                        <option value="Security Gard">Security Gard</option>
                                        <option value="Caretaker">Caretaker</option>
                                        <option value="Maker">Maker</option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_designation');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_joiningdate'); ?></label>
                                    <input type="date" class="form-control" name="m_joiningdate" value="" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_joiningdate');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_endingdate'); ?></label>
                                    <input type="date" class="form-control" name="m_endingdate" value="">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('Management_commitee.m_staus'); ?></label>
                                    <select name="m_staus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Expired</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label><?php echo lang('Management_commitee.commitee_preview'); ?></label>
                                    <div class="card">

                                        <div class="poperty_image_upload">
                                            <input class="form-control--uploader" type="file" name="m_image" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                            <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('Management_commitee.commitee_img'); ?> </span> </label>
                                            <img id="soutput" src="<?php echo base_url() ?>/admin/assets/images/preview.jpg" class="img-fluid" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/committee_list"><?php echo lang('Management_commitee.cancel'); ?></a>
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Management_commitee.created'); ?></button>
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