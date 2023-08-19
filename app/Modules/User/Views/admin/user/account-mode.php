<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | My Smart Property - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/admin/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/admin/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="container pt-5 text-center">
        <h3>Choose your property</h3>
        <p>Click your poperty goes dashboard</p>
        <br>
        <div class="account_mode">
            <div class="row ">
                <div class="col-md-6">
                    <div class="card">
                        <input type="radio" value="1" name="single" class="opacity-0" checked="">
                        <div class="card-body">
                            <i class="ri-building-4-line"></i>
                            <h3>Landlord</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <input type="radio" value="2" name="multiple" class="opacity-0">
                        <div class="card-body">
                            <i class="ri-hotel-line"></i>
                            <h3>Poperty Manager</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </form> -->
    </div>
    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/js/custom.js"></script>
    <script>
        $('.account_mode input[type="radio"]').click(function() {

            $type = $(this).attr("value");

            if ($(this).attr("value") == "1") {
                window.location.assign("<?=base_url();?>/admin/poperty_add/"+$type);

            }
            if ($(this).attr("value") == "2") {
                window.location.assign("<?=base_url();?>/admin/poperty_list/"+$type);
            }
        });
    </script>

</body>

</html>