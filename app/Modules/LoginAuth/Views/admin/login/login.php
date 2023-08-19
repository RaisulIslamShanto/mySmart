<?php
    echo $this->include('Modules\Master\Views\header_login');
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
                            <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                            <p class="mb-5 text-center">Sign in to continue to <b>My Smart Property</b>.</p>

                            <?php

                            if(isset($error)){
                                //echo $error;
                                echo '<div class="alert alert-danger text-center">' . $error . '</div>';
                            }
                            ?>
                            <?php
                            if(session()->getFlashdata('success')){
                                echo "<h4 style='color:green;text-align:center;'>".session()->getFlashdata('success')."</h4>";
                            }
                            ?>

                            <form class="form-horizontal" action="<?php echo base_url() ?>login" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter username"
                                            value="<?php if (isset($email)) {
                                                echo $email;
                                            } ?>">
                                            <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                echo $validation->getError('email');
                                            } ?>
                                            </small>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="<?php if (isset($rememberkey)) {
                                                echo $rememberkey;
                                            } ?>">
                                            <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                echo $validation->getError('password');
                                            } ?>
                                            </small>
                                        </div>

                                        <div style="display: flex;" class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customControlInline" name="remember">
                                                    <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-md-end mt-3 mt-md-0">
                                                    <a href="<?=base_url('/forgot_pass');?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your Password?</a>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-grid mt-4">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-5 text-center">
                                <p class="">Don't have an account ? <a href="<?=base_url('/register');?>" class="fw-medium text-primary"> Register here</a> </p>
                                <p class="">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> Property Management. Crafted with <i class="mdi mdi-heart text-danger"></i> by <b>RS Software</b></p>
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
            <!-- end row -->
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