<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property User Add</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/User_setup.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/User_setup.usersetup_start'); ?></li>
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
                <h4 class="card-title mb-4">Property User Add</h4>
                       
                <?php 
                if(session()->getFlashdata('success')){
                    echo "<h6 style='color:red;text-align:center;'>".session()->getFlashdata('success')."</h6>";
                }
                ?>
                <?php 
                if(session()->getFlashdata('faild')){
                    echo "<h6 style='color:red;text-align:center;'>".session()->getFlashdata('faild')."</h6>";
                }
                ?>
                
                <?php 
                if(session()->getFlashdata('pass_faild')){
                    echo "<h6 style='color:red;text-align:center;'>".session()->getFlashdata('pass_faild')."</h6>";
                }
                ?>
                <form class="form-horizontal" action="<?php echo base_url('/admin/property_user_add') ?>" method="post" class="needs-validation" novalidate> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>

                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('username')) {
                                  echo $validation->getError('username'); }} ?></p>
                                        <div class="invalid-feedback">
                                        User name is required.
                                        </div>

                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="useremail">Email</label>
                                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter email" required>  
                                
                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('useremail')) {
                                       echo $validation->getError('useremail'); }} ?></p>
                                        <div class="invalid-feedback">
                                        User Email is required.
                                        </div>      
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword"
                                name="userpassword" placeholder="Enter password" required>
                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('userpassword')) {
                                   echo $validation->getError('userpassword'); }} ?></p>
                                        <div class="invalid-feedback">
                                        Password is required.
                                        </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="userpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_pass"
                                name="confirm_pass" placeholder="Enter Confirm password" required>
                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('confirm_pass')) {
                                 echo $validation->getError('confirm_pass'); }} ?></p>
                                        <div class="invalid-feedback">
                                        Confirm Password is required.
                                        </div>
                            </div>

                            <div class="mt-4">
                                <label>* User Type :</label>
                                <select name="user_type" class="form-control" required>
                                     <option value="">--Select One--</option>
                                    <option value="2">Property Manager</option>
                                    <option value="1">Landlord</option>
                                </select>
                                <div class="invalid-feedback">
                                        Package is required.
                                </div>
                            </div>

                            <div class="mt-4">
                                <label>* Select Package :</label>
                                <select name="package_id" class="form-control" required>
                                    <option value="">--Select One--</option>
                                    <?php foreach($packages as $package){ ?>
                                        <option value="<?=$package['id']?>"><?=$package['pakage_title']?></option>
                                    <?php }?>
                                </select>
                                <div class="invalid-feedback">
                                        Package is required.
                                </div>
                            </div>
                            
                     
                            <input type="hidden" name="add_by" value="1">
                            <div class="d-grid mt-4">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">ADD</button>
                            </div>
                        </div>
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


        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- end main content-->
<?php echo $this->endSection('content') ?>