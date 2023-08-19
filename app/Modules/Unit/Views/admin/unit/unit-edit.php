<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Unit.unit_update'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Unit.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Unit.unit_update'); ?></li>
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
                       

                        <form action="<?php echo base_url() ?>/admin/unit_edit/<?= $getUnit->id; ?>" method="post" class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label><?php echo lang('Unit.floor_no'); ?></label>
                                <select name="floor_id" id="floor_id" class="form-control" required>
                                    <option value="">--Select Floor--</option>
                                    <?php foreach ($getFloors as $floors) : ?>
                                        <option value="<?= $floors['id']; ?>" <?php if ($floors['floorno'] == $getUnit->floorno) {
                                            echo "selected";
                                        } ?>>
                                        <?= $floors['floorno']; ?></option>
                                    <?php endforeach; ?>
                                    
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('floor_id');
                                } ?>
                                </small>
                            </div>
                            <div class="mb-4">
                                <label><?php echo lang('Unit.unit_no'); ?></label>
                                <input type="text" class="form-control" name="unit_no" value="<?= $getUnit->unitno; ?>" required>
                                <div class="valid-feedback">Looks good!</div>
                                <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                    echo $validation->getError('unit_no');
                                } ?>
                                </small>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/unit_list"><?php echo lang('Unit.cancel'); ?></a>
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Unit.unit_created'); ?></button>
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