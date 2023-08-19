<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<?php
  $edit= menu_access('maintenance_edit');
  $delete= menu_access('maintenance_delete');
  ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Maintenance.mainlist_start'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Maintenance.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Maintenance.mainlist_start'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-end">
                    <a href="<?php echo base_url() ?>/admin/maintenance_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Maintenance.main_add'); ?></a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('Maintenance.main_list'); ?></h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('Maintenance.main_title'); ?></th>
                                    <th scope="col"><?php echo lang('Maintenance.main_date'); ?></th>
                                    <th scope="col"><?php echo lang('Maintenance.main_amount'); ?></th>
                                    <th scope="col"><?php echo lang('Maintenance.main_action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getMaintenances as $maintenances) : ?>
                                    <tr>
                                        <td><?= $maintenances['maintitle']; ?></td>
                                        <td><?=  date_formats($maintenances['maindate']); ?></td>
                                        <td><?php  currency($maintenances['mainamount']); ?></td>
                                        <td>
                                            <button type="button" id="maintenanceView" maintenance-id="<?= $maintenances['id']; ?>"  class="btn btn-outline-warning btn-sm"><?php echo lang('Maintenance.main_view'); ?></button>

                                            <?php if($edit){?>
                                            <a href="<?php echo base_url(); ?>/admin/maintenance_edit/<?= $maintenances['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('Maintenance.main_edit'); ?></button>
                                            </a>
                                            <?php }if($delete){?>
                                            <a href="<?php echo base_url(); ?>/admin/maintenance_delete/<?= $maintenances['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('Maintenance.main_delete'); ?></button>
                                            </a>
                                            <?php }?>
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
<!--  Modal content for the above example -->
<div id="viewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('Maintenance.mainhead_details'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="showData">


            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end main content-->

<script>
    $(document).ready(function() {
        $(document).on("click", "#maintenanceView", function() {
            var maintenanceId = $(this).attr('maintenance-id');
            $('#viewModal').modal('show');
            $.ajax({
                url: "<?php echo base_url(); ?>/admin/maintenance_view",
                type: "POST",
                data: {
                    maintenanceId: maintenanceId,
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);

                    var html = '';

                     html +='<h4><?= lang('Maintenance.mainview_details_info'); ?></h4><div class="row"><div class="col-md-6"><b><?= lang('Maintenance.mainview_title'); ?></b>'+data.maintitle+'<br><b><?= lang('Maintenance.mainview_date'); ?></b>'+data.maindate+'<br><b><?= lang('Maintenance.mainview_amount'); ?></b> '+data.mainamount+'<br><b><?= lang('Maintenance.mainview_month'); ?></b>'+data.mainmonth+'<br><b><?= lang('Maintenance.mainview_year'); ?></b> '+data.mainyear+'<br></div><div class="col-md-6"><b><?= lang('Maintenance.mainview_details'); ?></b> '+data.maindetails+'<br></div></div>';

                    $('#showData').html(html);
                    $('#viewModal').modal('show');
                }
            });
        });
    });
</script>




<?= $this->endSection() ?>