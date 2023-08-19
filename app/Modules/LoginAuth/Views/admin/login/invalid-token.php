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
                                <a href="/" class="">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/logo.png" alt="" height="44" class="auth-logo logo-dark mx-auto">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/logo-dark.png" alt="" height="34" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>

                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($invalidToken)) {
                                        echo $invalidToken;
                                    }
                                    ?>
                                    <p class="text-black"><?php echo lang('Login.resend_link'); ?>
                                        <a href="<?php echo base_url() ?>/forgot_pass" class="fw-medium text-primary"> Resend Link </a>
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <p class="text-white-50">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> <?php echo lang('Login.signby'); ?> <i class="mdi mdi-heart text-danger"></i> <?php echo lang('Login.sign_with'); ?></p>
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