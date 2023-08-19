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
                                    <img src="<?php echo base_url() ?>/admin/assets/images/logo-dark.png" alt="" height="44" class="auth-logo logo-dark mx-auto">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/logo-light.png" alt="" height="34" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>

                            <!-- end row -->
                            <h4 class="font-size-18 text-muted mt-2 text-center"><?php echo lang('Login.f_password'); ?></h4>
                            <p class="mb-5 text-center"><?php echo lang('Login.reset_with'); ?></p>

                            <form class="form-horizontal" action="<?php echo base_url() ?>/reset_pass/<?= $token; ?>" method="post" class="needs-validation" novalidate> 
                                <?php if (empty($success) && empty($error)) { ?>
                                    <div class="mt-4">
                                        <label class="form-label" for="useremail"><?php echo lang('Login.f_password'); ?></label>
                                        <input type="password" name="user_pass" class="form-control" placeholder="Enter Your Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('user_pass');
                                        } ?>
                                    </small>
                                </div>
                                <div class="mt-4">
                                    <label class="form-label" for="useremail"><?php echo lang('Login.f_con_pass'); ?></label>
                                    <input type="password" name="re_pass" class="form-control" placeholder="Enter Your Confirm Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        echo $validation->getError('re_pass');
                                    } ?>
                                    </small>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo lang('Login.f_btn'); ?></button>
                                </div>
                                <?php } ?>

                                <?php
                                if (isset($success)) {
                                    echo $success;
                                }
                                ?>

                                <?php if (isset($success)) { ?>
                                    <p class="text-white-50"><?php echo lang('Login.f_success'); ?>
                                        <a href="<?php echo base_url() ?>/" class="fw-medium text-primary">
                                            <button type="button" class="btn btn-success w-100"><?php echo lang('Login.f_login'); ?></button>
                                        </a>
                                    </p>
                                <?php } ?>


                                <?php
                                if (isset($error)) {
                                    echo $error;
                                }
                                ?>

                                <?php if (isset($error)) { ?>
                                    <div class="mt-4">
                                        <label class="form-label" for="useremail"><?php echo lang('Login.f_password'); ?></label>
                                        <input type="password" name="user_pass" class="form-control" placeholder="Enter Your Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('user_pass');
                                        } ?>
                                    </small>
                                </div>
                                <div class="mt-4">
                                        <label class="form-label" for="useremail"><?php echo lang('Login.f_con_pass'); ?></label>
                                        <input type="password" name="re_pass" class="form-control" placeholder="Enter Your Confirm Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('re_pass');
                                        } ?>
                                    </small>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo lang('Login.reset'); ?></button>
                                </div>
                                <?php } ?> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- end Account pages -->

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