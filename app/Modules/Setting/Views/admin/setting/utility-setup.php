<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<?php
if(isset($getUtilitySetup['svalue'])){
    $svalue = json_decode($getUtilitySetup['svalue']);
}
    
?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('setting/utility_billsetup.utilityset_head'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/utility_billsetup.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/utility_billsetup.utilityset_head'); ?> </li>
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
                        <h4 class="card-title mb-4"><?php echo lang('setting/utility_billsetup.utilityset_add'); ?></h4>
                        <?php
                            $session = session();
                            if($session->getFlashdata('success')){
                                echo '<div class="alert alert-success text-center">'.$session->getFlashdata('success').'</div>';
                            }
                        ?>
                        <form action="<?php echo base_url() ?>/admin/utility_setup" method="post" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/utility_billsetup.utilityset_gas'); ?></label>
                                    <div class="input-group">
                                        <input type="hidden" name="sname" value="<?php if(!empty($getUtilitySetup['sname'])){echo $getUtilitySetup['sname'];} ?>">

                                        <input type="text" name="gas_bill" value="<?php if(!empty($svalue->gas_bill)){echo $svalue->gas_bill;} ?>"
                                        id="txtGasBill" class="form-control" required>
                                        <div class="input-group-text"><?php symbol();?></div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('gas_bill');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/utility_billsetup.utilityset_security'); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="security_bill" value="<?php if(!empty($svalue->gas_bill)){echo $svalue->security_bill;} ?>"
                                        id="txtSecurityBill" class="form-control" required>
                                        <div class="input-group-text"><?php symbol();?></div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('security_bill');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/utility_billsetup.update'); ?></button>
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