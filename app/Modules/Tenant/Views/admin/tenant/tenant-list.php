<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Tenant.tenant_list'); ?> </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Tenant.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Tenant.tenant_list'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-end">
                    <a href="<?php echo base_url(); ?>/admin/tenant_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Tenant.te_add'); ?> </a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('Tenant.te_image'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_name'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_con'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_unit'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_adspay'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_paypermon'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_status'); ?></th>
                                    <th scope="col"><?php echo lang('Tenant.tenant_action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getTenants as $tenants) : ?>
                                    <tr>
                                    <td>
                                            <?php if($tenants['teownerphoto']!=''){ ?>
                                           
                                                <img class="rounded-circle avatar-xs" alt="tenant-photo" src="<?php echo base_url(); ?>/uploads/<?= $tenants['teownerphoto']; ?>" data-holder-rendered="true">
                                           
                                            <?php }else{ ?>
                                           
                                                <img class="rounded-circle avatar-xs" height="50px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg" alt="tenant-photo">
                                               
                                            <?php }?>
                                        </td>
                                        <td><?= $tenants['tename']; ?> </td>
                                        <td><?= $tenants['tecontrctno']; ?></td>
                                        <td><span class="badge rounded-pill bg-primary"><?= $tenants['unitno']; ?></span></td>
                                        <td><?= $tenants['teadvancerent']; ?></td>
                                        <td><?php currency($tenants['terentpermonth']); ?></td>
                                        <?php if ($tenants['testatus'] == 1) { ?>
                                            <td> <span class="badge rounded-pill bg-primary">Active</span></td>
                                        <?php } else { ?>
                                            <td> <span class="badge rounded-pill bg-warning">In-Active</span></td>
                                        <?php } ?>
                                        <td>
                                            <button type="button" id="tenantView" class="btn btn-outline-warning btn-sm" tenant-id="<?= $tenants['id']; ?>"><?php echo lang('Tenant.tenant_view'); ?></button>

                                            <a href="<?php echo base_url(); ?>/admin/tenant_edit/<?= $tenants['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('Tenant.tenant_edit'); ?></button>
                                            </a>
                                            <a href="<?php echo base_url(); ?>/admin/tenant_delete/<?= $tenants['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('Tenant.tenant_delete'); ?></button>
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
<!--  Modal content for the above example -->
<div id="viewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('Tenant.tenant_details'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalView">
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $(document).on("click", "#tenantView",function() {
            var tenantId = $(this).attr('tenant-id');
            $('#viewModal').modal('show');
            $.ajax({
                url: "<?php echo base_url(); ?>/admin/tenant_view",
                type: "POST",
                data: {
                    tenantId: tenantId,
                },
                dataType: "JSON",
                success: function(data) {
                    var html = '';

                    if(data.teownerphoto != ''){
                        var image = '<img class="rounded-circle avatar-xl" src="<?= base_url();?>/uploads/'+data.teownerphoto+'"data-holder-rendered="true">';
                    }else{
                        var image = '<img class="rounded-circle" height="100px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg" alt="tenant-photo">';
                    }

                    html += '<div class="text-center">'+image+'<br><h3>'+data.tename+'</h3></div><hr><h4><?= lang('Tenant.tenant_details_info'); ?></h4><div class="row"><div class="col-md-6"> <b><?= lang('Tenant.view_name'); ?></b>'+data.tename+'<br><b><?= lang('Tenant.view_email'); ?></b>'+data.teemail+'<br><b><?= lang('Tenant.view_password'); ?></b>'+data.tepass+'<br><b><?= lang('Tenant.view_contrctno'); ?></b>'+data.tecontrctno+'<br><b><?= lang('Tenant.view_ads'); ?></b>'+data.teads+'<br><b><?= lang('Tenant.view_nid'); ?></b>'+data.tenid+'<br></div><div class="col-md-6"> <b><?= lang('Tenant.view_floorno'); ?></b>'+data.floorno+'<br><b><?= lang('Tenant.view_unitno'); ?></b>'+data.unitno+'<br><b><?= lang('Tenant.view_advancerent'); ?></b>'+data.teadvancerent+'<br><b><?= lang('Tenant.view_rentpermonth'); ?></b>'+data.terentpermonth+'<br><b><?= lang('Tenant.view_issuedate'); ?></b>'+data.teissuedate+'<br><b><?= lang('Tenant.view_status'); ?></b>'+data.testatus+'</div></div>';
                    
                    $('#modalView').html(html);
                    $('#viewModal').modal('show');
                }
            });
        });
    });
</script>



<!-- end main content-->
<?= $this->endSection() ?>