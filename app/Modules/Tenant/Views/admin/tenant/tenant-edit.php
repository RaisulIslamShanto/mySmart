<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Tenant.tenant_update'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Tenant.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Tenant.tenant_update'); ?></li>
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
                 

                        <form action="<?php echo base_url() ?>/admin/tenant_edit/<?= $getTenant['id']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_name'); ?></label>
                                    <input type="text" class="form-control" name="te_name" value="<?= $getTenant['tename']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('te_name');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_email'); ?></label>
                                    <input type="email" class="form-control" name="te_email" value="<?= $getTenant['teemail']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('te_email');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_password'); ?></label>
                                    <input type="password" class="form-control" name="te_password" value="<?= $getTenant['tepass']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('te_password');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_contrctno'); ?></label>
                                    <input type="number" class="form-control" name="te_contrctno" value="<?= $getTenant['tecontrctno']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('te_contrctno');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('Tenant.te_ads'); ?></label>
                                    <textarea name="te_ads" class="form-control" required><?= $getTenant['teads']; ?></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('te_ads');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_nid'); ?></label>
                                    <input type="number" class="form-control" name="te_nid" value="<?= $getTenant['tenid']; ?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('te_nid');
                                    } ?>
                                    </small>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.floor_no'); ?></label>
                                    <select name="floor_no" id="floorId" class="form-control">
                                        <option value="">--Select Floor--</option>
                                        <?php foreach ($getFloors as $floors) : ?>
                                            <option value="<?= $floors['id']; ?>" <?php echo ($floors['id'] == $getTenant['floorno'] ? "Selected" : " "); ?>><?= $floors['floorno']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.unit_no'); ?></label>
                                    <select name="unit_no" id="unitId" class="form-control">
                                    <option value="">--Select Unit--</option>
                                        <?php
                                        $i = 1;
                                          
                                        foreach ($units as $unit) {
                                        ?>
                                            <div class="mb-2">
                                            
                                            <?php
                                            if (isset($exits_units)) {
                                                if (!in_array($unit['id'], $exits_units)) {?>
                                                    <option value="<?= $unit['id']; ?>"><?= $unit['unitno']; ?></option>
                                                <?php  
                                            } ?>
                                           
                                            </div>

                                        <?php $i++;
                                        } }?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_advancerent'); ?></label>
                                    <div class="input-group">
                                        <input type="number" name="te_advancerent" class="form-control" value="<?= $getTenant['teadvancerent']; ?>">
                                        <div class="input-group-text"><?php symbol();?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('Tenant.te_rentpermonth'); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="te_rentpermonth" class="form-control" value="<?= $getTenant['terentpermonth']; ?>">
                                        <div class="input-group-text"><?php symbol();?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label> <?php echo lang('Tenant.te_issuedate'); ?></label>
                                    <input type="date" name="te_issuedate" class="form-control" value="<?= $getTenant['teissuedate']; ?>">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label> <?php echo lang('Tenant.te_rentmonth'); ?></label>
                                    <select name="te_rentmonth" class="form-control">
                                        <option value="">--Select Month--</option>
                                        <?php
                                        foreach ($months as $month) { ?>
                                            <option value="<?= $month['monthname']; ?>" <?php
                                                                                        if ($getTenant['terentmonth'] == $month['monthname']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?= $month['monthname']; ?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label> <?php echo lang('Tenant.te_rentyear'); ?></label>
                                    <select name="te_rentyear" class="form-control">
                                        <option value="">--Select Year--</option>
                                        <?php
                                        foreach ($years as $year) { ?>
                                            <option value="<?= $year['year']; ?>" <?php
                                                                                if ($getTenant['terentyear'] == $year['year']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>><?= $year['year']; ?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label> <?php echo lang('Tenant.te_status'); ?></label>
                                    <select name="te_status" class="form-control">
                                        <option value="1" <?php echo ($getTenant['testatus'] == 1 ? "Selected" : " "); ?>>Active</option>
                                        <option value="0" <?php echo ($getTenant['testatus'] == 0 ? "Selected" : " "); ?>>In-Active</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('Tenant.te_ownerphoto'); ?></label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="poperty_image_upload">
                                                    <input class="form-control--uploader" name="te_ownerphoto" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                                    <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span><?php echo lang('Tenant.te_uploadphoto'); ?> </span> </label>

                                                    <?php if ($getTenant['teownerphoto'] != '') { ?>

                                                        <img id="soutput" src="<?php echo base_url(); ?>/uploads/<?= $getTenant['teownerphoto']; ?>" alt="Tenant Ownerphoto" class="img-fluid">

                                                    <?php } else { ?>

                                                        <img id="soutput" height="200px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg" alt="tenant-photo">

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/tenant_list"><?php echo lang('Tenant.cancel'); ?></a>
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Tenant.tenant_up'); ?></button>
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

<script>
    $(function() {
        $('#floorId').on("change", function() {
            var floorId = $(this).val();
            console.log(floorId);

            $.ajax({
                url: "<?php echo base_url() ?>/admin/tenant_depand",
                type: "get",
                data: {
                    floorId: floorId
                },
                dataType: "JSON",
                success: function(data) {

                    $('#unitId').html('');
                    $('#unitId').append('<option value="">--Select Unit--</option>');
                    for (i = 0; i < data.length; i++) {
                        $('#unitId').append('<option value="' + data[i].unitno + '">' + data[i].unitno + '</option>');
                    }

                }
            });
        });
    });
</script>


<!-- end main content-->
<?= $this->endSection() ?>