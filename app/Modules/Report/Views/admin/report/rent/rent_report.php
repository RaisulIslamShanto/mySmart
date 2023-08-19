<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('report/rented.r_c_r'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('report/rented.r_c_r'); ?></li>
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
                            <h4 class="card-title mb-4"> <?php echo lang('report/rented.r_c_r_f'); ?> </h4>  
                            <?php 
                            if(session()->getFlashdata('faild')){
                                echo '<div class="alert alert-danger text-center">'.session()->getFlashdata('faild').'</div>';
                             }
                             ?>
                            <form action="<?= base_url('admin/rentinfo')?>">
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label> <?php echo lang('report/rented.floor_no'); ?> :</label>
                                        <select  name="floor" id="ddlFloorNo" class="form-control"> 
                                            <option value="">--Select Floor--</option>
                                            <?php
                                        foreach ($floors as $floor) { ?>
                                            <option value="<?= $floor['floorno'] . '|' . $floor['id']; ?>"><?= $floor['floorno']; ?></option>

                                        <?php }
                                        ?>
                                          </select>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('report/rented.s_unit'); ?> :</label>
                                        <select name="unit" id="ddlUnitNo" class="form-control">
                                            <option value="">--Select Unit--</option>
                                            
                                        </select>
                                    </div>
                                 
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('report/rented.s_month'); ?> :</label>
                                        <select name="month" id="ddlMonth" class="form-control"> 
                                            <option value="">--Select Rent Month--</option>
                                            <?php
                                        foreach($months as $month){?>
                                            <option value="<?=$month['monthname'];?>"><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?>
                                          </select>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('report/rented.s_year'); ?> :</label>
                                        <select name="year" id="ddlYear" class="form-control">
                                            <option value="">--Select Rent Year--</option>
                                            <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"
                                        ><?=$year['year'];?></option>
                                        <?php  }
                                        ?>
                                        </select>
                                    </div> 
                                       
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('report/rented.p_status'); ?> :</label>
                                        <select name="status" id="ddlPaymentStatus" class="form-control">
                                          <option value="">--Select--</option>
                                          <option value="1">Paid</option>
                                          <option value="2">Due</option>
                                         
                                        </select>
                                    </div>
                                
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"> <?php echo lang('report/rented.submit'); ?></button>
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
       
    });
</script>
<?php echo $this->endSection('content') ?>