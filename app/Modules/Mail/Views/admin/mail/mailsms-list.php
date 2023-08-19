<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<?php

// echo "<pre>";
// print_r($getMailSms);
// die();

?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('setting/Mailsms.mailsms_head'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/Mailsms.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/Mailsms.mailsms_head'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- end page title -->
        <div class="alert alert-warning  alert-dismissable">
            <p>
                <i class="icon fa fa-bullhorn"></i> <?php echo lang('setting/Mailsms.mailsms_headtext'); ?>
            </p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-end">
                    <a href="<?php echo base_url(); ?>/admin/mailsms_add" class="btn btn-primary btn-rounded waves-effect waves-light" id="mailSmsAdd"><i class=" ri-menu-add-line me-1"></i><?php echo lang('setting/Mailsms.mailsms_send'); ?> </a>
                </div>

                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"> <?php echo lang('setting/Mailsms.mailsms_head'); ?> </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('setting/Mailsms.mailsms_date'); ?></th>
                                    <th scope="col"><?php echo lang('setting/Mailsms.mailsms_sub'); ?></th>
                                    <th scope="col"><?php echo lang('setting/Mailsms.mailsms_mess'); ?></th>
                                    <th scope="col"><?php echo lang('setting/Mailsms.mailsms_notifi'); ?></th>
                                    <th scope="col"><?php echo lang('setting/Mailsms.mailsms_senderlist'); ?></th>
                                    <th scope="col"><?php echo lang('setting/Mailsms.mailsms_action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($getMailSms as $mailsms) : ?>

                                    <?php
                                    $exp = explode(',', $mailsms['mailmesstype']);
                                    ?>
                                    <tr>
                                        <td><?= date_formats($mailsms['maildate']); ?></td>
                                        <td >  <?= $mailsms['mailsub']; ?></td>
                                        <td class="text-wrap"><?= $mailsms['mailmess']; ?></td>

                                        <?php if (count($exp) == 2) { ?>
                                            <td><span class="badge bg-primary"><?php echo lang('setting/Mailsms.mailsms_all'); ?></span></td>
                                        <?php } else { ?>
                                            <td><span class="badge bg-primary"><?= $mailsms['mailmesstype']; ?></span></td>
                                        <?php } ?>

                                        <td>
                                            <?php

                                            $allTenant = $mailsms['mailtenant'];
                                            $allEmployee = $mailsms['mailemployee'];
                                            $allOwner = $mailsms['mailowner'];

                                            if ($allTenant == '0' &&  $allEmployee == '0' && $allOwner == '0'){ ?>
                                                <span class="badge bg-primary">All</span>
                                            <?php } elseif($allTenant == '0' && ($allEmployee == '' && $allOwner == '')){ ?>
                                                <span class="badge bg-primary">All Tenant</span>
                                            <?php }elseif($allEmployee == '0' && ($allTenant == '' && $allOwner == '')){ ?>
                                                <span class="badge bg-primary">All Employee</span>
                                            <?php }elseif($allOwner == '0' && ($allTenant == '' && $allEmployee == '')){ ?>
                                                <span class="badge bg-primary">All Owner</span>
                                            <?php } else { 
                                                if (array_key_exists('tenants', $mailsms)) {
                                                    foreach ($mailsms['tenants'] as $tenant) { ?>
                                                        <span class="badge bg-warning"><?= $tenant; ?></span>
                                                    <?php }
                                                }
                                                if (array_key_exists('owners', $mailsms)) { 
                                                    foreach ($mailsms['owners'] as $owner) { ?>
                                                        <span class="badge bg-warning"><?= $owner; ?></span>
                                                    <?php }
                                                }
                                                if (array_key_exists('employees', $mailsms)) {
                                                    foreach ($mailsms['employees'] as $employee) { ?>
                                                        <span class="badge bg-warning"><?= $employee; ?></span>
                                                    <?php }
                                                }
                                             } ?> 
                                        </td>

                                        <td>
                                            <a href="<?php echo base_url(); ?>/admin/mailsms_edit/<?= $mailsms['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('setting/Mailsms.mailsms_edit'); ?></button>
                                            </a>
                                            <a href="<?php echo base_url(); ?>/admin/mailsms_delete/<?= $mailsms['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('setting/Mailsms.mailsms_delete'); ?></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

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

<!-- end main content-->
<?= $this->endSection() ?>