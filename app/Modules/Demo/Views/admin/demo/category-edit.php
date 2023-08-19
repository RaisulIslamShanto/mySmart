<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Demo.demo_list'); ?> </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Demo.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Demo.demo_list'); ?></li>
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

                        <form action="<?php echo base_url() ?>/admin/demo_edit/<?= $categoryInfo['id']; ?>" method="post" class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label><?php echo lang('Demo.demo'); ?></label>
                                <input type="text" class="form-control" name="categoryName" value="<?= $categoryInfo['categoryname']; ?>" required>
                                <div class="valid-feedback">Looks good!</div>
                                <small style="color:red;" class="text-danger">
                                    <?php
                                        if (isset($validation)) {
                                            echo $validation->getError('categoryName');
                                        }
                                    ?>
                                </small>
                            </div>

                            <div class="mb-4">
                                <label><?php echo lang('Demo.uri'); ?></label>
                                <input type="text" class="form-control" name="uri" value="<?= $categoryInfo['categoryuri'] ?>" required>
                                <div class="valid-feedback">Looks good!</div>
                                <small style="color:red;" class="text-danger">
                                    <?php
                                        if (isset($validation)) {
                                            echo $validation->getError('uri');
                                        }
                                    ?>
                                </small>
                            </div>

                            <div class="col-md-12 mt-4">
                                <label><?php echo lang('Demo.category_des'); ?></label>
                                <textarea class="form-control" name="category_description" required><?= $categoryInfo['categorydescription'] ?></textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <small style="color:red;" class="text-danger">
                                    <?php
                                        if (isset($validation)) {
                                            echo $validation->getError('category_description');
                                        }
                                    ?>
                                </small>
                            </div>

                            <div class="col-md-12 mt-4">
                                <label><?php echo lang('Demo.category_par'); ?></label>
                                <select name="parentCategory" id="ddlFloorNo" class="form-control">
                                    <option value="">--Select category--</option>
                                    <option value=""><?= $categoryInfo['parentcategory'] ?></option>
                                </select>
                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('parentCategory')) {
                                            echo $validation->getError('parentCategory');
                                        }
                                    } ?></p>
                                <div class="invalid-feedback">
                                    <?php echo lang('admin/rent.e_floor_no'); ?>
                                </div>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label><?php echo lang('Demo.category_img'); ?></label>
                                <div class="card">
                                    <div class="poperty_image_upload">
                                        <input class="form-control--uploader" name="categoryImage" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                        <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('Tenant.te_uploadphoto'); ?> </span> </label>
                                        <img id="soutput" src="<?php echo base_url() ?>/asset/categoryImage/<?= $categoryInfo['categoryimage'] ?>" class="img-fluid" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/demo_list"><?php echo lang('Demo.cancel'); ?></a>
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Demo.demo_edit'); ?></button>
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