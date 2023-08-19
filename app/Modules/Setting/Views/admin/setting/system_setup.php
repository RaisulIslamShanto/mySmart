<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('setting/System_setup.sysset_head'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/System_setup.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('setting/System_setup.sysset_head'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  
                <div class="row">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('setting/System_setup.sysset_currhead'); ?></h4> 
                            <?php
                            if(isset($update_success)){
                                echo "<h4 style='color:red;text-align:center;'class='text-danger'>".$update_success."</h4>";
                            }
                            ?>
                            
                            <?php
                            if(isset($currency['svalue'])){
                                $currency_data=$currency['svalue'];
                                $currency_all= json_decode($currency_data);
                            }
                            if(isset($language['svalue'])){
                            $language_data=$language['svalue'];
                            $language_all= json_decode($language_data);
                            }
                            if(isset($email['svalue'])){
                            $email_data=$email['svalue'];
                            $email_all= json_decode($email_data);
                            }
                            if(isset($sms['svalue'])){
                            $sms_data=$sms['svalue'];
                            $sms_all= json_decode($sms_data);
                            }
                            if(isset($date['svalue'])){
                                $date_data=$date['svalue'];
                                $date_all= json_decode($date_data);
                                }

                            //print_r($currency_all);die();
                            //echo $currency_all->image;
                            ?>
                            <form action="<?php echo base_url('admin/currencysetting'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_curr'); ?></label>
                                        <input type="hidden" name="currency_id" value="<?php if(!empty($currency['id'])){echo $currency['id'];}?>">
                                        <select name="currency" id="ddlCurrency" class="form-control" required>
                                            <option value="">--Select--</option>
                                            <?php 
                                            if(isset($currency_all)){

                                            foreach($currencies as $currency){?>
                                               <option value="<?=$currency['symbol'];?>"
                                               <?php
                                               if($currency['symbol']==$currency_all->currency){
                                                   echo "selected";
                                               }
                                               ?>><?=$currency['name'];?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('currency')) {
                                                echo $validation->getError('currency');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Currency is required.'); ?>
                                    </div>
                                    </div> 
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_sepa'); ?></label>
                                        <select name="currency_separator" id="ddlCurrencySeparator" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option value="." 
                                          <?php
                                               if('.'==$currency_all->currency_separator){
                                                   echo "selected";
                                               }
                                               ?>>Dot (.)</option>
                                          <option value=","<?php
                                               if(','==$currency_all->currency_separator){
                                                   echo "selected";
                                               }
                                               ?>>Comma (,)</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('currency_separator')) {
                                                echo $validation->getError('currency_separator');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Currency separator is required.'); ?>
                                    </div>
                                    </div> 
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_posi'); ?></label>
                                        <select name="currency_position" id="ddlCurrencyPosition" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option value="left"<?php
                                               if('left'==$currency_all->currency_position){
                                                   echo "selected";
                                               }
                                               ?>>Left</option>
                                          <option value="right"<?php
                                               if('right'==$currency_all->currency_position){
                                                   echo "selected";
                                               }
                                               ?>>Right</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('currency_position')) {
                                                echo $validation->getError('currency_position');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Currency position is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_deci'); ?></label>
                                        <select name="currency_decimal" id="ddlCurrencyDecimal" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option value="1"<?php
                                               if('1'==$currency_all->currency_decimal){
                                                   echo "selected";
                                               }
                                               ?>>1 (0.0)</option>
                                          <option  value="2"<?php
                                               if('2'==$currency_all->currency_decimal){
                                                   echo "selected";
                                               }
                                               ?>>2 (0.00)</option>
                                          <option value="3"
                                          <?php
                                               if('3'==$currency_all->currency_decimal){
                                                   echo "selected";
                                               }
                                               ?>>3 (0.000)</option>
                                          <option value="4"
                                          <?php
                                               if('4'==$currency_all->currency_decimal){
                                                   echo "selected";
                                               }
                                               ?>>4 (0.0000)</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('currency_decimal')) {
                                                echo $validation->getError('currency_decimal');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Currency decimal is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_adimg'); ?></label>
                                        <div class="poperty_image_upload">
                                            <input class="form-control--uploader" type="file" name="image"
                                            value="<?=$currency_all->image;?>" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                            <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('setting/System_setup.sysset_photo'); ?> </span> </label>
                                            <img id="soutput" src="<?= base_url();?>/admin/assets/super_admin/thumbnail/<?=$currency_all->image;?>" class="img-fluid">
                                        </div>
                                    </div>
                                     
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded">
                                        <?php echo lang('setting/System_setup.update'); ?></button>
                                </div>
                                <?php } ?>
                            </form>
                             
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> <?php echo lang('setting/System_setup.sysset_lanhead'); ?></h4> 
                            <form action="<?php echo base_url('admin/languagesetting'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_lan'); ?></label>
                                        <input type="hidden" name="language_id" value="<?php if(!empty($language['id'])){echo $language['id'];}?>">
                                        <?php
                                        if(isset($language_all)){
                                        ?>
                                        
                                        <select name="language" id="ddlLanguage" class="form-control" required>
                                          <option value="">---Select language---</option>
                                          <option value="Arabic.zip"<?php
                                          if('Arabic.zip'==$language_all->language){
                                            echo "selected";
                                        }?>>Arabic.zip</option>
                                          <option  value="English"
                                          <?php
                                          if('English'==$language_all->language){
                                            echo "selected";
                                        }?>>English</option>
                                          <option value="Spain"
                                          <?php
                                          if('Spain'==$language_all->language){
                                            echo "selected";
                                        }?>>Spain</option>
                                          <option value="Turkish"
                                          <?php
                                          if('Turkish'==$language_all->language){
                                            echo "selected";
                                        }?>>Turkish</option>                
                                      </select>
                                      <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('language')) {
                                                echo $validation->getError('language');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Language is required.'); ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/System_setup.update'); ?></button>
                                </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?php echo lang('setting/System_setup.sysset_emailhead'); ?></h4> 
                            <form action="<?php echo base_url('admin/emailsetting'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_mailpro'); ?></label>
                                        <input type="hidden" name="email_id" value="<?php if(!empty($email['id'])){echo $email['id'];}?>">
                                        <?php
                                        if(isset($email_all)){
                                        ?>
                                        <select name="mail_option" id="ddlMailOption" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option  value="mail"
                                          <?php
                                          if('mail'==$email_all->mail_option){
                                            echo "selected";
                                        }?>>Mail</option>
                                          <option value="smtp"
                                          <?php
                                          if('smtp'==$email_all->mail_option){
                                            echo "selected";
                                        }?>>SMTP</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('mail_option')) {
                                                echo $validation->getError('mail_option');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Mail option is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_host'); ?></label>
                                        <input type="text" class="form-control" value="<?=$email_all->smtp_hostname;?>" name="smtp_hostname" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('smtp_hostname')) {
                                                echo $validation->getError('smtp_hostname');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Smtp hostname is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_user'); ?></label>
                                        <input type="text" value="<?=$email_all->smtp_username;?>" class="form-control" name="smtp_username" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('smtp_username')) {
                                                echo $validation->getError('smtp_username');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Smtp username is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_pass'); ?></label>
                                        <input type="password" value="<?=$email_all->smtp_password;?>" class="form-control" name="smtp_password" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('smtp_password')) {
                                                echo $validation->getError('smtp_password');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Smtp password is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_port'); ?></label>
                                        <input type="text" class="form-control" value="<?=$email_all->smtp_post;?>" name="smtp_post" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('smtp_post')) {
                                                echo $validation->getError('smtp_post');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Smtp post is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_secure'); ?></label>
                                        <select name="smtp_secure" id="smtp_secure" class="form-control" required>
                                          <option value="">--Select--</option>
                                          <option  value="tls"
                                          <?php
                                          if('tls'==$email_all->smtp_secure){
                                            echo "selected";
                                        }?>>TLS</option>
                                          <option value="ssl"
                                          <?php
                                          if('ssl'==$email_all->smtp_secure){
                                            echo "selected";
                                        }?>>SSL</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('smtp_secure')) {
                                                echo $validation->getError('smtp_secure');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Smtp secure is required.'); ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/System_setup.update'); ?></button>
                                </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> Date Form</h4> 
                            <form action="<?php echo base_url('admin/datesetting'); ?>" method="POST"    enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label>Select Date Format</label>
                                        <input type="hidden" name="date_id" value="<?php if(!empty($date['id'])){echo $date['id'];}?>">
                                        <?php
                                        
                                        ?>
                                        
                                        <select name="date_format" id="ddlLanguage" class="form-control" required>
                                          <option value="">---Select Date format---</option>
                                          <?php 
                                          foreach($date_formats as $date){
                                          ?>
                                          <option value="<?=$date['date_format'];?>"<?php
                                          if(isset($date_all)){
                                          if($date['date_format']==$date_all->date_format){
                                            echo "selected";
                                        }}?>><?=$date['name'] ?></option>

                                        <?php }?>              
                                      </select>
                                      <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('date_format')) {
                                                echo $validation->getError('date_format');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.Date format is required.'); ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded">
                                        <?php echo lang('setting/System_setup.update'); ?></button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><?php echo lang('setting/System_setup.sysset_currhead'); ?></h4> 
                            <form action="<?php echo base_url('admin/smssetting'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_mailpro'); ?></label>
                                        <input type="hidden" name="sms_id" value="<?php if(!empty($sms['id'])){echo $sms['id'];}?>">
                                        <?php
                                        if(isset($sms)){
                                        ?>
                                        <input type="text" name="clickAtell_username" value="<?=$sms_all->clickAtell_username;?>" class="form-control" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('clickAtell_username')) {
                                                echo $validation->getError('clickAtell_username');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.ClickAtell username is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_host'); ?></label>
                                        <input type="password" name="clickAtell_password" value="<?=$sms_all->clickAtell_password;?>" class="form-control" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('clickAtell_password')) {
                                                echo $validation->getError('clickAtell_password');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.ClickAtell password is required.'); ?>
                                    </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('setting/System_setup.sysset_user'); ?></label>
                                        <input type="text" name="clickAtell_api_key" value="<?=$sms_all->clickAtell_api_key;?>" class="form-control" required>
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('clickAtell_api_key')) {
                                                echo $validation->getError('clickAtell_api_key');
                                            }
                                        } ?></p>
                                        <div class="invalid-feedback">
                                            <?php echo lang('setting/System_setup.ClickAtell api key is required.'); ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-4"> 
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/System_setup.update'); ?></button>
                                </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>

                </div> 
                <!-- end col -->
            </div>
            <!-- end row -->
            
            
            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
 

<!-- end main content-->
<?php echo $this->endSection('content') ?>