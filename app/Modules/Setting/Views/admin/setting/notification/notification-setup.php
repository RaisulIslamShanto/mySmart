<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('setting/Notification_setup.nset_head'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/Notification_setup.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/Notification_setup.nset_head'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <b><?php echo lang('setting/Notification_setup.nset_name'); ?></b>
                            </div>
                            <div class="col-md-3">
                                <b><?php echo lang('setting/Notification_setup.nset_channel'); ?></b>
                            </div>
                            <div class="col-md-3">
                                <b><?php echo lang('setting/Notification_setup.nset_templa'); ?></b>
                            </div>
                            <div class="col-md-2">
                                <b><?php echo lang('setting/Notification_setup.nset_action'); ?></b>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_user'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-warning"><?php echo lang('setting/Notification_setup.nset_mail'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="1" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_reset'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-warning"><?php echo lang('setting/Notification_setup.nset_mail'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="2" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_cre'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-warning"><?php echo lang('setting/Notification_setup.nset_mail'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="3" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_attach'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-warning"><?php echo lang('setting/Notification_setup.nset_mail'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="4" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_payment'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-warning"><?php echo lang('setting/Notification_setup.nset_mail'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="5" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_join'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-primary"><?php echo lang('setting/Notification_setup.nset_sysview'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="6" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">
                                <span><i class="fas fa-cog fa-lg"></i></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_rolecre'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-primary"><?php echo lang('setting/Notification_setup.nset_sysview'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="7" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">
                                <span><i class="fas fa-cog fa-lg"></i></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_roleup'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-primary"><?php echo lang('setting/Notification_setup.nset_sysview'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="8" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">
                                <span><i class="fas fa-cog fa-lg"></i></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo lang('setting/Notification_setup.nset_reset'); ?>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-primary"><?php echo lang('setting/Notification_setup.nset_sysview'); ?></span>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-id="9" class="btn btn-primary btn-sm edit_modal"><?php echo lang('setting/Notification_setup.update'); ?></a>
                            </div>
                            <div class="col-md-2">
                                <span><i class="fas fa-cog fa-lg"></i></span>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <!--  Modal content for the above example -->
        <div id="notificationModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('setting/Notification_setup.nset_details'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="editPage">
                        <!------ for mail ------->
                        
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script>
            $(function() {

                $(document).on("click", ".edit_modal", function() {
                    $('#notificationModal').modal('show');
                    let id = $(this).attr('data-id');
                    console.log(id);

                    $.ajax({
                        url: "<?php echo base_url() ?>/admin/notification_edit",
                        data: {
                            id: id
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            $('#editPage').html(data);
                            $('.summernote').summernote()
                            // console.log(data);
                            // $('#notification_update')[0].reset();
                            // $('#my_editModal').modal('hide');
                        }
                    });
                });

            });
        </script>

        <!-- end main content-->
        <?= $this->endSection() ?>