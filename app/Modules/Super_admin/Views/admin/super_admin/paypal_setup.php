<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
     <div class="container-fluid">
      <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('admin/super_admin.addpak'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo lang('admin/super_admin.addpak'); ?></li>
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
                        <h4 class="card-title mb-4"><?php echo lang('admin/super_admin.addpak'); ?>Paypal Setup</h4>

                        <form action="<?= base_url('admin/pakage_add') ?>" method="POST" 
                        enctype="multipart/form-data"  class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label>* <?php echo lang('admin/super_admin.pak_title'); ?>:</label>
                                    <input type="text" class="form-control" id="name" name="pakage_title" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('pakage_title')) {
                                            echo $validation->getError('pakage_title');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_pak_title'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label> <?php echo lang('admin/super_admin.pak_objective'); ?></label>
                                    <textarea id="elm1" name="pakage_objective" class="form-control" required></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('pakage_objective')) {
                                            echo $validation->getError('pakage_objective');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_pakage_objective'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label>*  <?php echo lang('admin/super_admin.duration'); ?> :</label>
                                    <select id="duration" name="duration" class="form-control" required>
                                        <option value=""><?php echo lang('admin/super_admin.--Select One--'); ?></option>
                                        <option value="1"><?php echo lang('admin/super_admin.30 days'); ?> </option>
                                        <option value="2"><?php echo lang('admin/super_admin.2 Month'); ?> </option>
                                        <option value="3"><?php echo lang('admin/super_admin.3 Month'); ?> </option>
                                        <option value="6"><?php echo lang('admin/super_admin.6 Month'); ?> </option>
                                        <option value="12"><?php echo lang('admin/super_admin.1 Years'); ?></option>
                                        <option value="24"><?php echo lang('admin/super_admin.2 Years'); ?></option>
                                        <option value="36"><?php echo lang('admin/super_admin.3 Years'); ?></option>
                                        <option value="other"><?php echo lang('admin/super_admin.Other'); ?></option>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('duration')) {
                                            echo $validation->getError('duration');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_duration'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/super_admin.employee_limit'); ?> :</label>
                                    <input type="number" name="employee_limit" class="form-control">

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('employee_limit')) {
                                            echo $validation->getError('employee_limit');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                          <?php echo lang('admin/super_admin.e_rmployee_limit'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">

                                    <label class="days_view" style="display: none;">
                                    <?php echo lang('admin/super_admin.* How many :'); ?></label>
                                    <input id="how_many" class="days_view form-control" style="display: none;" type="number" name="how_many">
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label class="days_view" style="display: none;">
                                    <?php echo lang('admin/super_admin.* Select Type :'); ?></label>
                                    <select style="display: none;" id="type_select" name="d_m_y" class="form-control">
                                        <option value=""><?php echo lang('admin/super_admin.--Select One--'); ?></option>
                                        <option value="1"><?php echo lang('admin/super_admin.days'); ?></option>
                                        <option value="2"><?php echo lang('admin/super_admin.Month'); ?></option>
                                        <option value="3"><?php echo lang('admin/super_admin.Year'); ?></option>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('admin/super_admin.* Cost:'); ?></label>
                                    <input type="number" class="form-control" id="cost" name="cost" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('cost')) {
                                            echo $validation->getError('cost');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_cost'); ?>
                                    </div>
                                </div>

                                

                                <div class="col-md-6 mt-4">
                                    <label>*<?php echo lang('admin/super_admin.property_limit'); ?> :</label>
                                   <input type="number" name="property_limit" class="form-control">

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('property_limit')) {
                                            echo $validation->getError('property_limit');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_property_limit'); ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="d-flex mt-4">
                                <a href="<?php echo base_url() ?>/admin/ownerlist" class="btn btn-outline-danger btn-rounded ">
                                <?php echo lang('admin/owner.cancel'); ?></a>
                                <button class="btn btn-primary ms-auto btn-rounded">
                                    <?php echo lang('admin/owner.created'); ?>
                                </button>
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