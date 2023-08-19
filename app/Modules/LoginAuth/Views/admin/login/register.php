
<?php
    echo $this->include('\Modules\Master\Views\header_login');
    $theme = session()->get('themevalue');
?>
        <div class="loginpage">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="row justify-content-center align-items-center <?php if (isset($theme) && ($theme == 1)) { ?> bg-white <?php } else{?> bg-lightnew <?php } ?> py-5 h-100 ">
                            <div class="col-md-8">
                                <div class="text-center mb-4">
                                    <a href="<?php echo base_url() ?>" class="">
                                        <img src="<?php echo base_url() ?>/admin/assets/images/logo.png" alt="" height="44" class="auth-logo logo-dark mx-auto">
                                        <img src="<?php echo base_url() ?>/admin/assets/images/logo-dark.png" alt="" height="34" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>

                                <h4 class="font-size-18 text-muted text-center mt-2">Free Register</h4>

                                <p class="text-muted text-center mb-4">Get your free <b>My Smart Property</b> account now.</p>
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

                                <form class="form-horizontal" action="<?php echo base_url('/register') ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">

                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('username')) { echo $validation->getError('username'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        User name is required.
                                                        </div>

                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="useremail">Email</label>
                                                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter email">

                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('useremail')) { echo $validation->getError('useremail'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        User Email is required.
                                                        </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" id="userpassword"
                                                name="userpassword" placeholder="Enter password">
                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('userpassword')) {  echo $validation->getError('userpassword'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Password is required.
                                                        </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirm_pass"
                                                name="confirm_pass" placeholder="Enter Confirm password">
                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('confirm_pass')) { echo $validation->getError('confirm_pass'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Confirm Password is required.
                                                        </div>
                                            </div>





                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="term-conditionCheck" value="1" name="term_and_condition">
                                                <label class="form-check-label fw-normal" for="term-conditionCheck">I accept <a href="<?=base_url('term');?>" class="text-primary">Terms and Conditions</a></label>
                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('term_and_condition')) { echo $validation->getError('term_and_condition'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Terms and Conditions is required.
                                                        </div>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-5 text-center">
                                    <p class=" ">Already have account ?<a href="<?=base_url();?>/login" class="fw-medium text-primary"> Login </a> </p>
                                    <p class=" ">© <script>document.write(new Date().getFullYear())</script> Property Management. Crafted with <i class="mdi mdi-heart text-danger"></i> by <b>RS Software</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login_bg">
                            <img class="img-fluid" src="<?php echo base_url() ?>/admin/assets/images/building_home.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>

        <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>

    </body>
</html>
