<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('admin/rent.update_r'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo lang('admin/rent.update_r'); ?></li>
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
                        <h4 class="card-title mb-4"><?php echo lang('admin/rent.r_u_f'); ?></h4>
                        <?php
                        //print_r($rents);die();
                        foreach ($rents as $rent) { ?>

                            <form action="<?= base_url('admin/rentupdate/' . $rent->id) ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/rent.floor_no'); ?>:</label>
                                        <select name="floor_name" id="ddlFloorNo" class="form-control">

                                            <option value="">--Select Floor--</option>
                                            <?php
                                            foreach ($floors as $floor) { ?>
                                                <option value="<?= $floor['floorno'] . '|' . $floor['id']; ?>" <?php
                                                                                                                                                            if ($floor['floorno'] == $rent->floor_name) {
                                                                                                                                                                echo "selected";
                                                                                                                                                            }
                                                                                                                                                            ?>><?= $rent->floor_name; ?></option>

                                            <?php }
                                            ?>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('floor_name')) {
                                                echo $validation->getError('floor_name');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_floor_no'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/rent.unit_no'); ?> :</label>
                                        <select name="unit_no" id="ddlUnitNo" class="form-control">
                                            <option value="<?= $rent->unit_name . '|' . $rent->unit_id; ?>" selected><?= $rent->unit_name; ?></option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('unit_no')) {
                                                echo $validation->getError('unit_no');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_unit_no'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/rent.s_r_m'); ?> :</label>
                                        <select name="month" id="ddlMonth" class="form-control">
                                            <option value="">--Select Rent Month--</option>

                                            <?php

                                            foreach ($months as $month) { ?>
                                                <option value="<?= $month['id']; ?>" <?php if ($rent->month == $month['id']) {
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
                                            <?php echo lang('admin/rent.e_month'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/rent.s_r_y'); ?> :</label>
                                        <select name="year" id="ddlYear" class="form-control">
                                            <option value="">--Select Rent Year--</option>

                                            <?php
                                            foreach ($years as $year) { ?>
                                        <option value="<?= $year['year']; ?>" <?php if ($rent->year == $year['year']) {
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
                                            <?php echo lang('admin/rent.e_year'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.r_name'); ?> :</label>
                                        <input type="hidden" id="tenent_id" name="tenent_id" value="<?= $rent->tenent_id; ?>">
                                        <input type="hidden" id="tenent_image" name="tenent_image" value="<?= $rent->tenent_image; ?>">
                                        <input type="hidden" id="renter_name" name="renter_name" value="<?= $rent->renter_name; ?>">
                                        <input type="text" id="renter_name2" value="<?= $rent->renter_name; ?>" class="form-control" name="" disabled="">
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('renter_name')) {
                                            echo $validation->getError('renter_name');
                                        }
                                    } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_r_n'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.rent'); ?> :</label>
                                        <input type="hidden" id="all_rent" name="rent" value="<?= $rent->rent; ?>">
                                        <input type="text" class="form-control" id="all_rent2" value="<?= $rent->rent; ?>" disabled="">
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('rent')) {
                                            echo $validation->getError('rent');
                                        }
                                    } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_rent'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.w_b'); ?>:</label>
                                        <div class="input-group">
                                            <input type="text" name="water_bill" value="<?= $rent->water_bill; ?>" id="txtWaterBill" class="form-control">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.e_b'); ?> :</label>
                                        <div class="input-group">
                                            <input type="text" name="electric_bill" value="<?= $rent->electric_bill; ?>" id="txtElectricBill" class="form-control">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.g_b'); ?> :</label>
                                        <div class="input-group">
                                            <input type="text" name="gas_bill" value="<?= $rent->gas_bill; ?>" id="txtGasBill" class="form-control">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.s_b'); ?> :</label>
                                        <div class="input-group">
                                            <input type="text" name="security_bill" value="<?= $rent->security_bill; ?>" id="txtSecurityBill" class="form-control">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.U_bill'); ?>:</label>
                                        <div class="input-group">
                                            <input type="text" name="utility_bill" value="<?= $rent->utility_bill; ?>" id="txtUtilityBill" class="form-control">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.o_bill'); ?> :</label>
                                        <div class="input-group">
                                            <input type="text" name="other_bill" value="<?= $rent->other_bill; ?>" id="txtOtherBill" class="form-control">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.total_rent'); ?> :</label>
                                        <div class="input-group">
                                            <input type="hidden" name="total_rent" id="txtTotalRent1" value="<?= $rent->total_rent; ?>">
                                            <input type="text" name="txtTotalRent" value="<?= $rent->total_rent; ?>" id="txtTotalRent" class="form-control" disabled="">
                                            <div class="input-group-text"><?php symbol(); ?></div>
                                        </div>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('total_rent')) {
                                            echo $validation->getError('total_rent');
                                        }
                                    } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_t_r'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/rent.issue_date'); ?> :</label>
                                        <input type="date" class="form-control" name="issue_date" value="<?= $rent->issue_date; ?>">
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('issue_date')) {
                                            echo $validation->getError('issue_date');
                                        }
                                    } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_i_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.b_p_d'); ?> :</label>
                                        <input type="date" class="form-control" name="bill_paid_date" value="<?= $rent->bill_paid_date; ?>">
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                        if ($validation->hasError('bill_paid_date')) {
                                                                                            echo $validation->getError('bill_paid_date');
                                                                                        }
                                                                                    } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_b_p_d'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/rent.b_s'); ?> :</label>
                                        <select name="bill_status" id="ddlBillStatus" class="form-control">
                                            <option value="0" <?php if ($rent->bill_status == 0) {
                                                                    echo "selected";
                                                                } ?>>Due</option>
                                            <option value="1" <?php if ($rent->other_bill == 1) {
                                                                    echo "selected";
                                                                } ?>>Paid</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                                        if ($validation->hasError('bill_status')) {
                                                                                            echo $validation->getError('bill_status');
                                                                                        }
                                                                                    } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('admin/rent.e_b_s'); ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex mt-4">
                                    <a href="<?php echo base_url() ?>/admin/rentlist" class="btn btn-outline-danger btn-rounded">
                                        <?php echo lang('admin/rent.cancel'); ?></a>

                                    <button type="submit" name="btn_save_print" class="btn btn-warning btn-rounded mx-2" value="saveAndPrint">
                                        <i class="fa fa-floppy-o"></i><?php echo lang('admin/rent.s_a_p_i'); ?>
                                    </button>
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/rent.updated'); ?></button>
                                </div>
                            <?php } ?>
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
<script>
    $(document).ready(function() {

        $('#ddlFloorNo').change(function() {
            var value = $(this).val();
            var result = value.split('|');
            var floor_id = result[1];

            $.ajax({
                url: "<?php echo base_url('admin/getunits'); ?>",
                method: "POST",
                data: {
                    floor_id: floor_id
                },
                dataType: 'json',
                success: function(data) {
                    var html = '<option value="">--Select Unit--</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        // console.log(data[i]);
                        html += '<option  value="' + data[i].unitno + '|' + data[i].id + '">' + data[i].unitno + '</option>';

                    }

                    $('#ddlUnitNo').html(html);



                }
            });

        });
        $('#ddlUnitNo').change(function() {

            var value = $(this).val();
            var result = value.split('|');
            var unitno = result[0];

            $.ajax({
                url: "<?php echo base_url('admin/gettenent'); ?>",
                method: "POST",
                data: {
                    unitno: unitno
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    var html = data.tename;
                    var html2 = data.terentpermonth;
                    var html3 = data.id;
                    var html4 = data.teownerphoto;

                    console.log(html);

                    $('#renter_name').val(html);
                    $('#renter_name2').val(html);
                    $('#all_rent').val(html2);
                    $('#all_rent2').val(html2);
                    $('#tenent_id').val(html3);
                    $('#tenent_image').val(html4);
                }
            });

        });


        $('#txtWaterBill').keyup(function() {

            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill = 0;
            }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill = 0;
            }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill = 0;
            }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill = 0;
            }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill = 0;
            }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill = 0;
            }
            var total_bills = parseFloat(water_bill) + parseFloat(electric_bill) + parseFloat(gas_bill) + parseFloat(security_bill) + parseFloat(utility_bill) + parseFloat(other_bill);

            $('#txtTotalRent').val(total_bills);
            $('#txtTotalRent1').val(total_bills);

        });
        $('#txtElectricBill').keyup(function() {

            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill = 0;
            }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill = 0;
            }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill = 0;
            }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill = 0;
            }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill = 0;
            }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill = 0;
            }
            var total_bills = parseFloat(water_bill) + parseFloat(electric_bill) + parseFloat(gas_bill) + parseFloat(security_bill) + parseFloat(utility_bill) + parseFloat(other_bill);

            $('#txtTotalRent').val(total_bills);
            $('#txtTotalRent1').val(total_bills);

        });
        $('#txtGasBill').keyup(function() {

            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill = 0;
            }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill = 0;
            }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill = 0;
            }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill = 0;
            }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill = 0;
            }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill = 0;
            }
            var total_bills = parseFloat(water_bill) + parseFloat(electric_bill) + parseFloat(gas_bill) + parseFloat(security_bill) + parseFloat(utility_bill) + parseFloat(other_bill);

            $('#txtTotalRent').val(total_bills);
            $('#txtTotalRent1').val(total_bills);

        });
        $('#txtSecurityBill').keyup(function() {

            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill = 0;
            }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill = 0;
            }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill = 0;
            }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill = 0;
            }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill = 0;
            }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill = 0;
            }
            var total_bills = parseFloat(water_bill) + parseFloat(electric_bill) + parseFloat(gas_bill) + parseFloat(security_bill) + parseFloat(utility_bill) + parseFloat(other_bill);

            $('#txtTotalRent').val(total_bills);
            $('#txtTotalRent1').val(total_bills);

        });
        $('#txtUtilityBill').keyup(function() {

            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill = 0;
            }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill = 0;
            }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill = 0;
            }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill = 0;
            }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill = 0;
            }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill = 0;
            }
            var total_bills = parseFloat(water_bill) + parseFloat(electric_bill) + parseFloat(gas_bill) + parseFloat(security_bill) + parseFloat(utility_bill) + parseFloat(other_bill);

            $('#txtTotalRent').val(total_bills);
            $('#txtTotalRent1').val(total_bills);

        });
        $('#txtOtherBill').keyup(function() {

            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill = 0;
            }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill = 0;
            }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill = 0;
            }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill = 0;
            }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill = 0;
            }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill = 0;
            }
            var total_bills = parseFloat(water_bill) + parseFloat(electric_bill) + parseFloat(gas_bill) + parseFloat(security_bill) + parseFloat(utility_bill) + parseFloat(other_bill);

            $('#txtTotalRent').val(total_bills);
            $('#txtTotalRent1').val(total_bills);

        });
    });
</script>

<?php echo $this->endSection('content') ?>