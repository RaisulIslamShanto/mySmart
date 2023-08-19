<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | My Smart Property</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/admin/assets/images/favicon.ico">

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

</head>
<?php 
 
 if (isset($theme) && ($theme == 1)) { ?>
    <body> 
<?php } else{?>
   <body  data-topbar="dark">  
<?php } ?>
