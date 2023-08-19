<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php

                        echo lang('setting/Mailsms.mailsms_head'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/Mailsms.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/Mailsms.mailsms_head'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('setting/Mailsms.Send Email / SMS'); ?></h5>
                        <p class="text-danger"><?php echo lang('setting/Mailsms.*Note: Select all users or sepecific user to send sms or email'); ?></p>

                        <h2 id="message"></h2>

                        <form action="" id="mailsmsAdd">
                            <div class="mt-4">
                                <label><?php echo lang('setting/Mailsms.Message Subject*'); ?></label>
                                <input type="text" class="form-control" placeholder="Message Title" name="mail_sub"
                                id="mailSub" value="<?= $getMailSms['mailsub']; ?>">
                                <span id="mailSubErr"></span>
                            </div>
                            <div class="mt-4">
                                <label><?php echo lang('setting/Mailsms.Message *'); ?></label>
                                <textarea class="form-control" placeholder="Message" name="mail_mess" id="mailMess"><?= $getMailSms['mailmess']; ?></textarea>
                                <span id="mailMessErr"></span>
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mt-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#menu0" role="tab">
                                        <span class="d-none d-md-inline-block" data-index="All" id="all">
                                            <?php echo lang('setting/Mailsms.All'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu1" role="tab">
                                        <span class="d-none d-md-inline-block" data-index="Tenant" id="tenant">
                                            <?php echo lang('setting/Mailsms.Specific Tenant'); ?> </span>
                                        <input type="hidden" id="tenantVal" name="tenant_val" value="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu2" role="tab">
                                        <span class="d-none d-md-inline-block" data-index="Owner" id="owner">
                                            <?php echo lang('setting/Mailsms.Specific Owner'); ?></span>
                                        <input type="hidden" id="ownerVal" name="owner_val" value="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu3" role="tab">
                                        <span class="d-none d-md-inline-block" data-index="Employee" id="employee">
                                            <?php echo lang('setting/Mailsms.Specific Employee'); ?></span>
                                        <input type="hidden" id="employeeVal" name="employee_val" value="">
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content ps-0 p-3">
                                <div class="tab-pane active" id="menu0" role="tabpanel">
                                    <div class="form-control mb-4">
                                        <?php
                                            // $mailType = explode(',', $getMailSms['mailtype']);
                                        ?>
                                        <input type="checkbox" id="alltenant" class="allUserData" name="all_tenanat" value="0"
                                            <?php if ($getMailSms['mailtenant'] == '0'){
                                                    echo 'checked'; 
                                                }
                                            ?>
                                        >
                                        <label class="mb-0" for="alltenant">All Tenant &nbsp;&nbsp;</label>
                                        <input type="checkbox" id="allowner" class="allUserData" name="all_owner" value="0"

                                            <?php if ($getMailSms['mailowner'] == '0'){
                                                    echo 'checked'; 
                                                }
                                            ?>

                                        >
                                        <label class="mb-0" for="allowner">All Owner &nbsp;&nbsp;</label>
                                        <input type="checkbox" id="allemployee" class="allUserData" name="all_employee" value="0"

                                            <?php if ($getMailSms['mailemployee'] == '0'){
                                                    echo 'checked'; 
                                                }
                                            ?>
                                        >
                                        <label class="mb-0" for="allemployee"><?php echo lang('setting/Mailsms.All Employee'); ?> &nbsp;&nbsp;</label>
                                    </div>
   
                                </div>
                                <div class="tab-pane" id="menu1" role="tabpanel">
                                    <?php

                                        // print_r($getMailSms['tenants']);
                                    ?>

                                    <select class="tenant_select" name="tenant_name[]" multiple="multiple">
                                        <?php foreach($getTenants as $tenants) : ?>
                                            <option value="<?= $tenants['id']; ?>"

                                                <?php 
                                                    if(isset($getMailSms['tenants'])){
                                                        foreach ($getMailSms['tenants'] as $value) {
                                                            if($value == $tenants['tename']){
                                                                echo "selected";
                                                            }
                                                        }
                                                    }

                                                ?>

                                            ><?= $tenants['tename']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
  
                                </div>
                                <div class="tab-pane" id="menu2" role="tabpanel">

                                    <select class="owner_select" name="owner_name[]" multiple="multiple">
                                        <?php foreach($getOwner as $owner) : ?>
                                            <option value="<?= $owner['owner_id']; ?>"

                                                <?php 
                                                    if(isset($getMailSms['owners'])){
                                                        foreach ($getMailSms['owners'] as $value) {
                                                            if($value == $owner['name']){
                                                                echo "selected";
                                                            }
                                                        }
                                                    }

                                                ?>
                                            
                                            ><?= $owner['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="tab-pane" id="menu3" role="tabpanel">

                                    <select class="employee_select" name="employee_name[]" multiple="multiple">
                                        <?php foreach($getEmployee as $employee) : ?>
                                            <option value="<?= $employee['id']; ?>"
                                            
                                                <?php 
                                                    if(isset($getMailSms['employees'])){
                                                        foreach ($getMailSms['employees'] as $value) {
                                                            if($value == $employee['name']){
                                                                echo "selected";
                                                            }
                                                        }
                                                    }

                                                ?>
                                            
                                            ><?= $employee['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="mt-4">
                                <label>Message Type : </label>
                                <?php
                                    $mailmesstype = explode(',', $getMailSms['mailmesstype']);
                                    // print_r($mailmesstype);
                                ?>
                                &nbsp;
                                <input type="checkbox" id="sms_notice" class="messagetype" name="sms" value="sms"
                                    <?php if (in_array("sms", $mailmesstype)){
                                            echo 'checked'; 
                                        }
                                    ?>
                                <label for="sms_notice"> &nbsp;SMS&nbsp;&nbsp;</label>
                                <input type="checkbox" id="mail_notice" class="messagetype" name="email" value="email"
                                    
                                    <?php if (in_array("email", $mailmesstype)){
                                            echo 'checked'; 
                                        }
                                    ?>
                                >
                                <label for="mail_notice">&nbsp;Email </label>
                            </div>

                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-danger btn-rounded" href="<?php echo base_url() ?>/admin/mailsms_list">
                                <?php echo lang('setting/Mailsms.Cancel'); ?></a>
                                <button type="button" id="update" class="btn btn-primary ms-auto btn-rounded">
                                    <?php echo lang('setting/Mailsms.Update'); ?></button>
                            </div>
                        </form>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<script>

    $(document).ready(function() {

        $('.tenant_select').select2();
        $('.owner_select').select2();
        $('.employee_select').select2();

        //Get Tenant
        $(document).on("click", "#tenant", function() {
            var tenant = $(this).attr('data-index');
            $('#tenantVal').val(tenant);
        });
        //Get Owner
        $(document).on("click", "#owner", function() {
            var owner = $(this).attr('data-index');
            $('#ownerVal').val(owner);
        });
        //Get Employee
        $(document).on("click", "#employee", function() {
            var employee = $(this).attr('data-index');
            $('#employeeVal').val(employee);
        });

        //MailSms Insert
        $(document).on("click", "#update", function() {

            //Message Type
            var messageType = [];
            $('.messagetype').each(function() {
                if ($(this).is(":checked")) {
                    messageType.push($(this).val());
                }
            })
            mailMessType = messageType.toString();

            //Serialize Data
            var allData = $('#mailsmsAdd').serialize();
            allData = allData + '&mailMessType=' + mailMessType

            $.ajax({
                url: "<?php echo base_url(); ?>/admin/mailsms_edit/<?= $getMailSms['id']; ?>",
                type: "post",
                data: allData,
                dataType: "JSON",
                success: function(data) {

                    if (data.error != '') {
                        $('#message').html(data.validation);
                    }
                    if(data.success != ''){
                        $('#message').html(data.success);
                    }

                }
            });

        });

    });
</script>



<!-- end main content-->
<?= $this->endSection() ?>