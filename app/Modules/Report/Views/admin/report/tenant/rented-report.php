<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('report/Tenant.te_name'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('report/Tenant.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('report/Tenant.te_name'); ?></li>
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
                        <h4 class="card-title mb-4"> <?php echo lang('report/Tenant.rehead_report'); ?></h4>
                        <form action="<?php echo base_url() ?>/admin/rented_report" method="post"class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('report/Tenant.re_select'); ?></label>
                                    <select name="te_status" id="teStatus" class="form-control" required>
                                        <option value="">--Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('te_status');
                                } ?>
                                </small>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"> <?php echo lang('report/Tenant.re_submit'); ?></button>
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