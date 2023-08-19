<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
     <div class="container-fluid">
      <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Stripe Setup</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Stripe Setup</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php 
                        if(isset($updated)){
                            echo '<div class="alert alert-success text-center">'.$updated."</div>";
                        }
                    ?>
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('admin/owner.o_e_f'); ?></h4>

                        <form action="<?= base_url('admin/stripe_setup') ?>" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                <label class="days_view" >* Select Stripe Mode :</label>
                                    <select  id="type_select" name="stripe_mode" class="form-control">
                                        <option value="">--Select One--</option>
                                        <option value="1" <?php if($stripe['stripe_mode']==1){echo "Selected";}?>>Test Mode</option>
                                        <option value="2" <?php if($stripe['stripe_mode']==2){echo "Selected";}?>>Line Mode</option>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('stripe_mode')) {
                                            echo $validation->getError('stripe_mode');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                      Stripe Mode is required !!
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label>* Stripe Api Key:</label>
                                    <input type="text" class="form-control" id="name" name="stripe_api_key" value="<?=$stripe['stripe_api_key']?>" required>

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('stripe_api_key')) {
                                            echo $validation->getError('stripe_api_key');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    Stripe Api Key is required !!
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* Stripe Test Api Key:</label>
                                    <input type="text" class="form-control" id="name" name="stripe_test_api_key" value="<?=$stripe['stripe_test_api_key']?> required>

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('stripe_test_api_key')) {
                                            echo $validation->getError('stripe_test_api_key');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                     Stripe Test Api Key is required !!
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* Stripe Serect key</label>
                                    <input type="text" class="form-control" id="name" name="stripe_serect_key" value="<?=$stripe['stripe_serect_key']?>" required>

                                    <div class="valid-feedback">Looks good!</div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('stripe_serect_key')) {
                                            echo $validation->getError('stripe_serect_key');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    Stripe Serect Key is required !!
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* Stripe Test Serect key</label>
                                    <input type="text" class="form-control" id="name" name="stripe_test_serect_key" value="<?=$stripe['stripe_test_serect_key']?>" required>

                                    <div class="valid-feedback">Looks good!</div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('stripe_test_serect_key')) {
                                            echo $validation->getError('stripe_test_serect_key');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    Stripe Test Serect Key is required !!
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                <label class="days_view">* Status :</label>
                                    <select  id="type_select" name="status" class="form-control">
                                        <option value="">--Select One--</option>
                                        <option value="1"  <?php if($stripe['status']==1){echo "Selected";}?>>Enable</option>
                                        <option value="2"  <?php if($stripe['status']==2){echo "Selected";}?>>Disable</option>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('status')) {
                                            echo $validation->getError('status');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                      Status Is required !!
                                    </div>
                                </div>



                                

                                
                            </div>
                            <div class="d-flex mt-4">
                                <a href="<?php echo base_url() ?>/admin/ownerlist" class="btn btn-outline-danger btn-rounded "><?php echo lang('admin/owner.cancel'); ?></a>
                                <button class="btn btn-primary ms-auto btn-rounded">Updated</button>
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