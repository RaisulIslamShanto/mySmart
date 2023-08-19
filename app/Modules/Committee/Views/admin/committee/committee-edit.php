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

                        <form action="<?php echo base_url() ?>/admin/committee_edit/
                        <?= $getCommitte['id']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_membername'); ?></label>
                                    <input type="text" class="form-control" name="m_membername" value="<?= $getCommitte['mmembername']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('m_membername');
                                        } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_email'); ?></label>
                                    <input type="email" class="form-control" name="m_email" value="<?= $getCommitte['memail']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('m_email');
                                        } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_password'); ?></label>
                                    <input type="password" class="form-control" name="m_password" value="<?= $getCommitte['mpassword']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_password');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_phone'); ?></label>
                                    <input type="text" class="form-control" name="m_phone" value="<?= $getCommitte['mphone']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_phone');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_presentads'); ?></label>
                                    <textarea class="form-control" name="m_presentads" required><?=$getCommitte['mpresentads']; ?></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_presentads');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_permanentads'); ?></label>
                                    <textarea class="form-control" name="m_permanentads" required><?=$getCommitte['mpermanentads']; ?></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('m_permanentads');
                                        } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_nid'); ?></label>
                                    <input type="number" class="form-control" name="m_nid" value="<?= $getCommitte['mnid']; ?>" required>
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
                                        <option value="Moderator" <?php if($getCommitte['mdesignation']=="Moderator"){echo "Selected";}?>>Moderator</option>
                                        <option value="Secretary General" <?php if($getCommitte['mdesignation']=="Secretary General"){echo "Selected";}?>>Secretary General</option>
                                        <option value="Member" <?php if($getCommitte['mdesignation']=="Member"){echo "Selected";}?>>Member</option>
                                        <option value="Pion" <?php if($getCommitte['mdesignation']=="Pion"){echo "Selected";}?>>Pion</option>
                                        <option value="Security Gard" <?php if($getCommitte['mdesignation']=="Security Gard"){echo "Selected";}?>>Security Gard</option>
                                        <option value="Caretaker" <?php if($getCommitte['mdesignation']=="Caretaker"){echo "Selected";}?>>Caretaker</option>
                                        <option value="Maker" <?php if($getCommitte['mdesignation']=="Maker"){echo "Selected";}?>>Maker</option>
                                    </select>

                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_designation');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_joiningdate'); ?></label>
                                    <input type="date" class="form-control" name="m_joiningdate" value="<?= $getCommitte['mjoiningdate']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('m_joiningdate');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Management_commitee.m_endingdate'); ?></label>
                                    <input type="date" class="form-control" name="m_endingdate" value="<?= $getCommitte['mendingdate']; ?>">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('Management_commitee.m_staus'); ?></label>
                                    <select name="m_staus" class="form-control">
                                        <option value="1" <?php echo ($getCommitte['mstaus'] == 1 ? "Selected" : " "); ?>>Active</option>
                                        <option value="0" <?php echo ($getCommitte['mstaus'] == 0 ? "Selected" : " "); ?>>Expired</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label><?php echo lang('Management_commitee.commitee_preview'); ?></label>
                                    <div class="card">

                                        <div class="poperty_image_upload">
                                            <input class="form-control--uploader" type="file" name="m_image" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                            <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('Management_commitee.commitee_img'); ?> </span> </label>
                                            <?php if ($getCommitte['mimage'] != '') { ?>

                                                <img id="soutput" src="<?php echo base_url(); ?>/uploads/<?= $getCommitte['mimage']; ?>" class="img-fluid">

                                            <?php } else { ?>

                                                <img id="soutput" height="200px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg" alt="tenant-photo">

                                            <?php } ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/committee_list"><?php echo lang('Management_commitee.cancel'); ?></a>
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Management_commitee.update'); ?></button>
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