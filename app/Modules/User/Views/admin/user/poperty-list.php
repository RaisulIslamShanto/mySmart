<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | My Smart Property - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="<?php echo base_url() ?>/admin/shortcut icon" href="assets/images/favicon.ico">


    <!-- Bootstrap Css -->
    <?php $theme = session()->get('themevalue'); if (isset($theme) && ($theme == 1)) { ?>
    <link href="<?php echo base_url() ?>/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <?php } else{?>

    <link href="<?php echo base_url() ?>/admin/assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <?php } ?>
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/admin/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

    <?php if (isset($theme) && ($theme == 1)) { ?>
        <body class="bg-new">
    <?php } else{?>
        <body class="bg-new"  data-topbar="dark">
    <?php } ?>




    <div class="header_poperty mb-4">
        <?php
            echo $this->include('\Modules\Master\Views\header-poperty');
        ?>
    </div>

    <div class="container pt-5  ">

        <?php
            if(session()->getFlashdata('faild_message')){
                echo '<div class="alert alert-danger text-center">'.session()->getFlashdata('faild_message')."</div>";
                }
            ?>

        <a href="<?php echo base_url() ?>/admin/poperty_add/<?=$type;?>" class="add_new_poperty"><span><i class="ri-add-line font-size-24"></i> Add Properties</span> </a>

        <div class="row align-items-center">

            <?php

                foreach($properties as $property){

            ?>

            <div class="col-md-4">
                <div class="card overflow-hidden border-radius-20">

                    <div class="property_content" style="background: url(<?php echo base_url();?>/uploads/<?=$property['image']?>) no-repeat;">

                        <div class="property_heading">
                            <h3 class="d-flex align-items-center"><i class=" ri-building-4-line"></i> <?=$property['propertyname'];?></h3>
                            <p><i class=" ri-map-pin-line"></i> <?=$property['streetads'].$property['city'];?></p>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-6  mb-3">
                                <div class="d-flex text-muted">
                                        <div class="flex-shrink-0  me-2 align-self-center">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                    <i class="ri-building-4-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Total Floor</p>
                                            <h5 class="m-0">0</h5>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-6  mb-3">
                                <div class="d-flex text-muted">
                                        <div class="flex-shrink-0  me-2 align-self-center">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                    <i class="ri-community-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Total Unit</p>
                                            <h5 class="m-0">0</h5>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-6">
                                <div class="d-flex text-muted">
                                        <div class="flex-shrink-0  me-2 align-self-center">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                    <i class="ri-team-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Total Tenant</p>
                                            <h5 class="m-0">0</h5>
                                        </div>
                                    </div>
                            </div>


                            <div class="col-6">
                                <div class="d-flex text-muted">
                                        <div class="flex-shrink-0  me-2 align-self-center">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                    <i class=" ri-money-dollar-box-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1">Total Rent</p>
                                            <h5 class="m-0">0</h5>
                                        </div>
                                    </div>
                            </div>


                        </div>
                        <hr>
                        <div class="text-end">
                            <a class="btn btn-primary rounded-pill px-4" href="<?= base_url('admin/home/'.$property['id']) ?>"><?php echo lang('Property.pro_view'); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php }?>

        </div>

    </div>



    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/js/custom.js"></script>

</body>

</html>