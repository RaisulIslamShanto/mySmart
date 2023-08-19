<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('admin/apartment_fund.update_f'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo lang('admin/apartment_fund.update_f'); ?></li>
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
                        <h4 class="card-title mb-4"><?php echo lang('admin/apartment_fund.f_u_f'); ?></h4>

                        <form class="needs-validation" action="<?= base_url('admin/fundupdate/' . $get_fund['id']) ?>" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/apartment_fund.owner_n'); ?></label>
                                    <select name="owner_name" id="ddlOwnerName" class="form-control" required>
                                        <option value="">--Select Owner--</option>
                                        <?php
                                        foreach ($get_owners as $owner) { ?>

                                            <option value="<?= $owner['name'] . ',' . $owner['owner_id'] . ',' . $owner['image']; ?>" <?php
                                                                                                                                if ($owner['name'] == $get_fund['owner_name']) {
                                                                                                                                    echo "selected";
                                                                                                                                }
                                                                                                                                ?>><?= $owner['name']; ?></option>

                                        <?php }
                                        ?>


                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('owner_name')) {
                                                                                        echo $validation->getError('owner_name');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/apartment_fund.e_owner_name'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/apartment_fund.s_month'); ?> :</label>
                                    <select name="month" id="ddlMonth" class="form-control" required>

                                        <option value="">--Select Month--</option>
                                        <?php
                                        foreach ($months as $month) { ?>
                                            <option value="<?= $month['monthname']; ?>" <?php if ($get_fund['month'] == $month['monthname']) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $month['monthname']; ?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('month')) {
                                                                                        echo $validation->getError('month');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/apartment_fund.e_month'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/apartment_fund.s_year'); ?> :</label>
                                    <select name="year" id="ddlYear" class="form-control" required>
                                        <option value="">--Select Year--</option>
                                        <?php
                                        foreach ($years as $year) { ?>
                                            <option value="<?= $year['year']; ?>" <?php if ($get_fund['year'] == $year['year']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $year['year']; ?></option>
                                        <?php  }
                                        ?>

                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('year')) {
                                                                                        echo $validation->getError('year');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/apartment_fund.e_year'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/apartment_fund.issue_date'); ?> :</label>
                                    <input type="date" class="form-control" name="issue_date" value="<?= $get_fund['issue_date'] ?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('issue_date')) {
                                                                                        echo $validation->getError('issue_date');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/apartment_fund.e_i_date'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label>* <?php echo lang('admin/apartment_fund.total_amount'); ?>:</label>
                                    <div class="input-group">
                                        <input type="text" name="total_amount" value="<?= $get_fund['total_amount'] ?>" id="txtTotalAmount" class="form-control" required>
                                        <div class="input-group-text"><?php symbol(); ?></div>
                                    </div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('total_amount')) {
                                                                                        echo $validation->getError('total_amount');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/apartment_fund.e_total_amount'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* Purpose :</label>
                                    <textarea name="purpose" id="txtPurpose" class="form-control" required><?= $get_fund['purpose'] ?></textarea>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                    if ($validation->hasError('purpose')) {
                                                                                        echo $validation->getError('purpose');
                                                                                    }
                                                                                } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/apartment_fund.e_purpose'); ?>
                                    </div>
                                </div>


                            </div>
                            <div class="d-flex mt-4">
                                <a href="<?php base_url() ?>/admin/fundlist" class="btn btn-outline-danger btn-rounded"><?php echo lang('admin/apartment_fund.cancel'); ?>
                                </a>

                                <button type="submit" name="btn_save_print" class="btn btn-light btn-rounded mx-2" value="SaveAndPrint"><i class="fa fa-floppy-o"></i> <?php echo lang('admin/apartment_fund.s_a_p_i'); ?></button>
                                
                                <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/apartment_fund.updated'); ?></button>
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