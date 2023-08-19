<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('report/Complain.comhead_name'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo lang('report/Complain.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('report/Complain.comhead_name'); ?></li>
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
                        <h4 class="card-title mb-4"> <?php echo lang('report/Complain.comhead_report'); ?></h4>

                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>


                        <form action="<?php echo base_url() ?>/admin/complain_report" method="post">
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('report/Complain.comre_list'); ?></label>
                                    <input type="date" class="form-control" name="com_date">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('report/Complain.comre_month'); ?></label>
                                    <select name="com_month" id="comMonth" class="form-control">
                                        <option value="">--Select Month--</option>
                                        <?php
                                        foreach($months as $month){?>
                                            <option value="<?=$month['id'];?>"><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?> 
                                    </select>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('report/Complain.comre_year'); ?></label>
                                    <select name="com_year" id="comYear" class="form-control">
                                        <option value="">--Select Year--</option>
                                        <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"
                                        ><?=$year['year'];?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <div class="d-flex mt-4">
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"> <?php echo lang('report/Complain.comre_submit'); ?></button>
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