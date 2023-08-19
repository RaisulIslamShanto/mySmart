<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<?php 
  $edit= menu_access('committee_edit');
  $delete= menu_access('committee_delete');
  ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Management_commitee.commiteelist_start'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Management_commitee.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Management_commitee.commiteelist_start'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-end">
                    <a href="<?php echo base_url() ?>/admin/committee_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Management_commitee.commitee_add'); ?></a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('Management_commitee.commitee_list'); ?></h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_img'); ?></th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_mname'); ?></th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_email'); ?> </th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_contact'); ?></th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_pads'); ?></th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_mtype'); ?></th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_status'); ?></th>
                                    <th scope="col"><?php echo lang('Management_commitee.commitee_action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($getCommittees as $committees) : ?>
                                    <tr>
                                    <td>
                                            <?php if ($committees['mimage'] != '') { ?>

                                                <img class="rounded-circle avatar-xs" src="<?php echo base_url(); ?>/uploads/<?= $committees['mimage']; ?>" data-holder-rendered="true">

                                            <?php } else { ?>

                                                <img class="rounded-circle avatar-xs" height="50px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg">

                                            <?php } ?>
                                        </td>
                                        <td><?= $committees['mmembername']; ?></td>
                                        <td><?= $committees['memail']; ?></td>
                                        <td><?= $committees['mphone']; ?></td>
                                        <td><?= $committees['mpresentads']; ?></td>
                                        <td><?= $committees['mdesignation']; ?></td>

                                        <?php if ($committees['mstaus'] == 1) { ?>
                                            <td> <span class="badge rounded-pill bg-primary">Active</span></td>
                                        <?php } else { ?>
                                            <td> <span class="badge rounded-pill bg-warning">Expired</span></td>
                                        <?php } ?>

                                        <td>
                                            <button type="button" id="committeeView" class="btn btn-outline-warning btn-sm" committee-id="<?= $committees['id']; ?>"><?php echo lang('Management_commitee.commitee_view'); ?></button>

                                            <?php
                                            if($edit){
                                            ?>
                                            <a href="<?php echo base_url() ?>/admin/committee_edit/<?= $committees['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('Management_commitee.commitee_edit'); ?></button>
                                            </a>
                                            <?php }
                                            if($delete){
                                            ?>
                                            <a href="<?php echo base_url() ?>/admin/committee_delete/<?= $committees['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('Management_commitee.commitee_delete'); ?></button>
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
                <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('Management_commitee.mhead_details'); ?></h5>
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
        $(document).on("click", "#committeeView", function() {
            var committeeId = $(this).attr('committee-id');
            $('#viewModal').modal('show');
            $.ajax({
                url: "<?php echo base_url(); ?>/admin/committee_view",
                type: "POST",
                data: {
                    committeeId: committeeId,
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    var html = '';

                    if(data.mimage != ''){
                        var image = '<img class="rounded-circle avatar-xl" src="<?= base_url();?>/uploads/'+data.mimage+'"data-holder-rendered="true">';
                    }else{
                        var image = '<img class="rounded-circle" height="100px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg">';
                    }

                    html += '<div class="text-center">'+image+'<h3>'+ data.mmembername + '</h3></div><hr /><h4><?= lang('Management_commitee.mview_membername'); ?></h4><div class="row"><div class="cosl-md-6"> <b><?= lang('Management_commitee.mview_membername'); ?></b> ' + data.mmembername + '<br><b><?= lang('Management_commitee.mview_email'); ?></b> ' + data.memail + '<br><b><?= lang('Management_commitee.mview_phone'); ?></b> ' + data.mphone + '<br><b><?= lang('Management_commitee.mview_presentads'); ?></b> ' + data.mpresentads + '<br><b><?= lang('Management_commitee.mview_permanentads'); ?></b>' + data.mpermanentads + '<br></div><div class="col-md-6"><b><?= lang('Management_commitee.mview_nid'); ?></b> ' + data.mnid + '<br><b><?= lang('Management_commitee.mview_designation'); ?></b> ' + data.mdesignation + '<br><b><?= lang('Management_commitee.mview_joiningdate'); ?></b> ' + data.mjoiningdate + '<br><b><?= lang('Management_commitee.mview_endingdate'); ?></b> ' + data.mendingdate + '<br><b><?= lang('Management_commitee.mview_staus'); ?></b> ' + (data.mstaus == 1 ? 'Active' : 'Experied') + '<br><br></div></div>';

                    $('#showData').html(html);
                    $('#viewModal').modal('show');
                }
            });
        });
    });
</script>


<?= $this->endSection() ?>