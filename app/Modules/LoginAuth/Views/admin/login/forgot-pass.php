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

                            <!-- end row -->
                            <h4 class="font-size-18 text-muted mt-2 text-center"><?php echo lang('Login.reset'); ?></h4>
                            <p class="mb-5 text-center"><?php echo lang('Login.reset_with'); ?></p>

                            <form class="form-horizontal" action="<?php echo base_url() ?>/forgot_pass" method="post"
                                class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (isset($error)) {
                                            echo $error;
                                        }

                                        if (isset($success)) {
                                            echo $success;
                                        }
                                        
                                        ?>
                                        <div class="mt-4">
                                                <label class="form-label" for="useremail"><?php echo lang('Login.email'); ?></label>
                                                <input type="email" name="user_email" class="form-control" id="useremail" placeholder="Enter email" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    echo $validation->getError('user_email');
                                                } ?>
                                            </small>
                                        </div>
                                        <div class="d-grid mt-4">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo lang('Login.send_email'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-5 text-center">
                                <p class="">Remember Your Password ?<a href="<?=base_url();?>/login" class="fw-medium text-primary"> Login </a> </p>
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
    <!-- end row -->
 

<!-- JAVASCRIPT -->
<script src="<?php echo base_url(); ?>/admin/assets/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>/admin/assets/libs/node-waves/waves.min.js"></script>
<script src="<?php echo base_url() ?>/admin/assets/js/pages/form-validation.init.js"></script>

<script src="<?php echo base_url(); ?>/admin/assets/js/app.js"></script>

</body>

</html>