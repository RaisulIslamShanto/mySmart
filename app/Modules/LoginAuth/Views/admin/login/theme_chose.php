<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Theme Select | My Smart Property</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/admin/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/admin/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="bg-light">
    <div class="select_theme">
        <div class="container-fluid ">
            <form action="<?php echo base_url() ?>theme" method="post" id="select_theme">
                <div class="row justify-content-center align-items-center height100vh">
                    <div class="col-md-10">
                        <div class="text-center">
                            <img src="<?php echo base_url() ?>/admin/assets/images/logo.png" class="img-fluid">
                        </div>
                        <h3 class="text-center text-primary my-4">Please Choose <span class="text-dark">Theme First</span></h3>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="themeselect" id="themelight">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/light.jpg" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  value="2"  name="themeselect" id="themedark">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/dark.jpg" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $('input[type=radio][name=themeselect]').change(function() {
            $("#select_theme").submit();
        });

    </script>

</body>

</html>