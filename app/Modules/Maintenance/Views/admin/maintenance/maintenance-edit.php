<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Maintenance.main_start'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Maintenance.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Maintenance.main_start'); ?></li>
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
                        <h4 class="card-title mb-4"><?php echo lang('Maintenance.main_start'); ?> </h4>

                        <form action="<?php echo base_url() ?>/admin/maintenance_edit/<?= $getMaintenance['id']; ?>" method="post" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('Maintenance.main_date'); ?></label>
                                    <input type="date" class="form-control" name="main_date" value="<?= $getMaintenance['maindate']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('main_date');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Maintenance.main_month'); ?></label>
                                    <select name="main_month" class="form-control" required>
                                        <option value="">--Select Month--</option>
                                        <?php 
                                        foreach($months as $month){ ?>
                                            <option value="<?=$month['id'];?>"
                                            <?php if($month['id']==$getMaintenance['mainmonth']){
                                                echo "selected";
                                            } ?>
                                            ><?=$month['monthname'];?></option>
                                       <?php }
                                        ?>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('main_month');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Maintenance.main_year'); ?></label>
                                    <select name="main_year" class="form-control" required>
                                        <option value="">--Select Year--</option>
                                        <?php 
                                        foreach($years as $year){ ?>
                                            <option value="<?=$year['year'];?>"
                                           <?php if($year['year']==$getMaintenance['mainyear']){
                                                echo "selected";
                                            } ?>
                                            ><?=$year['year'];?></option>
                                       <?php }
                                        ?>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('main_year');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Maintenance.main_title'); ?></label>
                                    <input type="text" name="main_title" class="form-control" value="<?= $getMaintenance['maintitle']; ?>" required>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('main_title');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Maintenance.main_amount'); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="main_amount" class="form-control" value="<?= $getMaintenance['mainamount']; ?>" required>
                                        <div class="input-group-text"><?php symbol();?></div>
                                    </div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('main_amount');
                                } ?>
                                </small>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('Maintenance.main_details'); ?></label>
                                    <textarea name="main_details" class="form-control" required><?= $getMaintenance['maindetails']; ?></textarea>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('main_details');
                                } ?>
                                </small>
                                </div>

                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded"
                                href="<?php echo base_url() ?>/admin/maintenance_list"><?php echo lang('Maintenance.cancel'); ?></a>
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Maintenance.update'); ?> </button>
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