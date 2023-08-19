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
    <!-- Plugins css -->
    <link href="<?php echo base_url() ?>/admin/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
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


    <div class="container pt-5">
        <form id="popertyAdd" action="<?php echo base_url() ?>/admin/poperty_add/<?= $type ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

            <h3>Create New Properties</h3>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?php echo lang('Property.pro_img'); ?></h4>
                            <div class="poperty_image_upload">
                                <input class="form-control--uploader" type="file" name="image" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span><?php echo lang('Property.upload_img'); ?></span> </label>
                                <img id="soutput" src="<?php echo base_url() ?>/admin/assets/images/preview.jpg" class="img-fluid" />
                            </div>
                        </div>

                                        <lebel style="color:red;text-align:center;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('image');
                                        } ?>
                                        </lebel>
                                        <div class="invalid-feedback">Image is required</div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?php echo lang('Property.pro_img'); ?></h4>
                            <div class="poperty_galleryimage_upload">
                                <input type="file" multiple id="gallery-photo-add">
                                <label for="gallery-photo-add"><img src="<?php echo base_url() ?>/admin/assets/images/uploadfile.png" class="img-fluid"></label>
                                <div class="gallery">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?php echo lang('Property.pro_general'); ?></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label> <?php echo lang('Property.pro_name'); ?> </label>
                                        <input type="text" class="form-control" id="po_name" name="po_name" required>
                                        <div class="invalid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('po_name');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label> <?php echo lang('Property.pro_built'); ?> </label>
                                        <input type="text" class="form-control" id="po_built" name="po_built">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label> <?php echo lang('Property.pro_mls'); ?> </label>
                                        <input type="text" class="form-control" id="po_mls" name="po_mls">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label> <?php echo lang('Property.pro_streetads'); ?> </label>
                                        <input type="text" class="form-control" id="po_streetads" name="po_streetads" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('po_streetads');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label><?php echo lang('Property.pro_city'); ?></label>
                                        <input type="text" class="form-control" id="po_city" name="po_city" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('po_city');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label><?php echo lang('Property.pro_stateregion'); ?></label>
                                        <input type="text" class="form-control" id="po_stateregion" name="po_stateregion" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('po_stateregion');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label><?php echo lang('Property.pro_zip'); ?></label>
                                        <input type="text" class="form-control" id="po_zip" name="po_zip" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('po_zip');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label><?php echo lang('Property.pro_country'); ?></label>
                                        <select class="form-control" id="po_country" name="po_country" required>
                                            <option value="AZ">Azerbaidjan</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="KH">Cambodia</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('po_country');
                                        } ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> </h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6><?php echo lang('Property.pro_single_unit'); ?></h6>
                                            <p><?php echo lang('Property.pro_single_text'); ?></p>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="choose_popert_type" id="single_poperty" value="1" checked>
                                                <label class="form-check-label" for="single_poperty">
                                                    <?php echo lang('Property.pro_single_unit'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6><?php echo lang('Property.pro_multi_unit'); ?></h6>
                                            <p><?php echo lang('Property.pro_multi_text'); ?></p>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="choose_popert_type" id="multiple_poperty" value="2">
                                                <label class="form-check-label" for="multiple_poperty">
                                                    <?php echo lang('Property.pro_multi_unit'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_beds'); ?> </label>
                                        <select class="form-control" name="po_beds">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_baths'); ?> </label>
                                        <select class="form-control" name="po_baths">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_size'); ?> </label>
                                        <input type="text" class="form-control" name="po_size">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_rent'); ?> </label>
                                        <input type="text" class="form-control" name="po_marketrent" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_dep'); ?> </label>
                                        <input type="text" class="form-control" name="po_deposit" placeholder="0.00">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> <?php echo lang('Property.pro_basic'); ?></h4>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_parking'); ?> </label>
                                        <select class="form-control" name="po_parking">
                                            <option value=""></option>
                                            <option value="1">Available</option>
                                            <option value="2">Covered</option>
                                            <option value="3">Dedicated Spot</option>
                                            <option value="4">Driveway</option>
                                            <option value="5">Garage</option>
                                            <option value="6">On-street</option>
                                            <option value="7">Private Lot</option>
                                            <option value="8">Other</option>
                                            <option value="9">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_laundry'); ?> </label>
                                        <select class="form-control" name="po_laundry">
                                            <option value=""></option>
                                            <option value="1">In-unit</option>
                                            <option value="2">On-site</option>
                                            <option value="3">Hook-ups</option>
                                            <option value="4">Other</option>
                                            <option value="5">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label> <?php echo lang('Property.pro_air'); ?> </label>
                                        <select class="form-control" name="po_airconditioning">
                                            <option value=""></option>
                                            <option value="1">Central air</option>
                                            <option value="2">Window unit</option>
                                            <option value="3">Evaporative cooler</option>
                                            <option value="4">Other</option>
                                            <option value="5">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> <?php echo lang('Property.pro_features'); ?></h4>
                            <ul class="poperty_feature_list">
                                <li>
                                    <label for="po_alarm" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_alarm'); ?></label>
                                    <input type="checkbox" id="po_alarm" name="po_alarm">
                                </li>
                                <li>
                                    <label for="po_furnished" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_furnished'); ?></label>
                                    <input type="checkbox" id="po_furnished" name="po_furnished">
                                </li>
                                <li>
                                    <label for="po_microwave" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_microwave'); ?></label>
                                    <input type="checkbox" id="po_microwave" name="po_microwave">
                                </li>
                                <li>
                                    <label for="po_Refrigerator" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_refrigerator'); ?></label>
                                    <input type="checkbox" id="po_Refrigerator" name="po_refrigerator">
                                </li>
                                <li>
                                    <label for="po_Renovated" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_country'); ?></label>
                                    <input type="checkbox" id="po_Renovated" name="po_renovated">
                                </li>
                                <li>
                                    <label for="po_Hardwoodfloors" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_hardwoodfloors'); ?></label>
                                    <input type="checkbox" id="po_Hardwoodfloors" name="po_hardwoodfloors">
                                </li>
                                <li>
                                    <label for="po_Ovenrange" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_ovenrange'); ?></label>
                                    <input type="checkbox" id="po_Ovenrange" name="po_ovenrange">
                                </li>
                                <li>
                                    <label for="po_Fireplace" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.pro_fireplace'); ?></label>
                                    <input type="checkbox" id="po_Fireplace" name="po_fireplace">
                                </li>
                                <li>
                                    <label for="po_Dishwasher" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_dishwasher'); ?> </label>
                                    <input type="checkbox" id="po_Dishwasher" name="po_dishwasher">
                                </li>
                                <li>
                                    <label for="po_Walk-inclosets" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_walk'); ?> </label>
                                    <input type="checkbox" id="po_Walk-inclosets" name="po_walk">
                                </li>
                                <li>
                                    <label for="po_Balconydeckpatio" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_balconydeckpatio'); ?> </label>
                                    <input type="checkbox" id="po_Balconydeckpatio" name="po_balconydeckpatio">
                                </li>
                                <li>
                                    <label for="po_Internet" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_internet'); ?> </label>
                                    <input type="checkbox" id="po_Internet" name="po_internet">
                                </li>
                                <li>
                                    <label for="po_Fencedyard" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_fencedyard'); ?> </label>
                                    <input type="checkbox" id="po_Fencedyard" name="po_fencedyard">
                                </li>
                                <li>
                                    <label for="po_CentralHeating" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_centralheating'); ?> </label>
                                    <input type="checkbox" id="po_CentralHeating" name="po_centralheating">
                                </li>
                                <li>
                                    <label for="po_Tile" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_tile'); ?> </label>
                                    <input type="checkbox" id="po_Tile" name="po_tile">
                                </li>
                                <li>
                                    <label for="po_Carpet" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_carpet'); ?> </label>
                                    <input type="checkbox" id="po_Carpet " name="po_carpet">
                                </li>
                                <li>
                                    <label for="po_StainlessSteelAppliance" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.pro_stainlesssteelappliance'); ?> </label>
                                    <input type="checkbox" id="po_StainlessSteelAppliance" name="po_stainlesssteelappliance">
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> <?php echo lang('Property.po_amenities'); ?></h4>
                            <ul class="poperty_feature_list">
                                <li>
                                    <label for="po_Clubhouse" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_clubhouse'); ?></label>
                                    <input type="checkbox" id="po_Clubhouse" name="po_clubhouse">
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Elevator" name="po_elevator">
                                    <label for="po_Elevator" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_elevator'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Pool" name="po_pool">
                                    <label for="po_Pool" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_pool'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Tenniscourt" name="po_tenniscourt">
                                    <label for="po_Tenniscourt" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_tenniscourt'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Doorattendant" name="po_doorattendant">
                                    <label for="po_Doorattendant" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_doorattendant'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Fitnesscenter" name="po_fitnesscenter">
                                    <label for="po_Fitnesscenter" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_fitnesscenter'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Storage" name="po_storage">
                                    <label for="po_Storage" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_storage'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Wheelchairaccess" name="po_wheelchairaccess">
                                    <label for="po_Wheelchairaccess" class="btn btn-outline-secondary btn-rounded"><?php echo lang('Property.po_wheelchairaccess'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Rooftoppatio" name="po_rooftoppatio">
                                    <label for="po_Rooftoppatio" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_rooftoppatio'); ?> </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Playground" name="po_playground">
                                    <label for="po_Playground" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_playground'); ?> </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Hottub" name="po_hottub">
                                    <label for="po_Hottub" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_hottub'); ?></label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_Bbqarea" name="po_bbqarea">
                                    <label for="po_Bbqarea" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_bbqarea'); ?> </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_InanHOA" name="po_inanhoa">
                                    <label for="po_InanHOA" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_inanhoa'); ?> </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_DogPark" name="po_dogpark">
                                    <label for="po_DogPark" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_dogpark'); ?> </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="po_JoggingTrails" name="po_joggingtrails">
                                    <label for="po_JoggingTrails" class="btn btn-outline-secondary btn-rounded"> <?php echo lang('Property.po_joggingtrails'); ?> </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> <?php echo lang('Property.pro_attachments'); ?></h4>
                            <div class="dropzone">
                                <div id="image_upload">
                                    <div class="fallback">

                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                        </div>
                                        <h4><?php echo lang('Property.pro_drop'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <a href="<?php echo base_url() ?>/admin/account_mode" class="btn btn-outline-danger btn-rounded"><?php echo lang('Property.pro_btn_cancel'); ?></a>
                                <button type="submit" id="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Property.pro_btn_create'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>
    <!-- dropzone js -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/dropzone/min/dropzone.min.js"></script>

    <!-- validation init -->
    <script src="<?php echo base_url() ?>/admin/assets/js/pages/form-validation.init.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/custom.js"></script>

    <script>
        var myDropzone = new Dropzone("#image_upload", {
            url: "<?php echo base_url() ?>/admin/poperty_images",
            parallelUploads: 3,
            uploadMultiple: true,
            acceptedFiles: '.png,.jpg,.jpeg',
            autoProcessQueue: true
        });

        myDropzone.on("success", (file, response) => {
            $('#popertyAdd').append('<input type="hidden" name="additionalimages[]" value="'+response+'">');
        });

    </script>

</body>

</html>