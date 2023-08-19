<?= $this->extend('\Modules\Master\Views\layout') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="contaisner-fluid">


        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="text-center p-3">

                    <img src="<?= base_url(); ?>/admin/assets/images/pr1.jpg" class="rounded-circle rounded avatar-xl mb-3 headerimg">
                    <h4><?php echo lang('report/Tenant.golden_tower'); ?></h4>
                    <p><?php echo lang('report/Tenant.te_details'); ?></p>
                </div>


                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('report/Tenant.te_name'); ?></h4>
                        <div class="table-responsive mb-0 ">
                            <table class="table sakotable table-bordered table-striped dt-responsive">
                                <thead>
                                    <tr>
                                          <th><?php echo lang('report/Tenant.re_image'); ?></th>

                                          <th><?php echo lang('report/Tenant.personal_details'); ?></th>

                                          <th><?php echo lang('report/Tenant.floor_no'); ?></th>
                                          <th><?php echo lang('report/Tenant.unit_no'); ?></th>
                                          <th><?php echo lang('report/Tenant.re_payment'); ?></th>
                                          <th><?php echo lang('report/Tenant.re_rentpermon'); ?></th>
                                          <th><?php echo lang('report/Tenant.re_date'); ?></th>
                                          <th><?php echo lang('report/Tenant.re_status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getTenants as $tenants) : ?>
                                        <tr>
                                            <td>
                                                <?php if ($tenants['teownerphoto'] != '') { ?>

                                                    <img class="tableimg" src="<?php echo base_url(); ?>/uploads/<?= $tenants['teownerphoto']; ?>">

                                                <?php } else { ?>

                                                    <img class="tableimg" height="50px" src="<?php echo base_url(); ?>/admin/assets/images/empty_image.jpg">

                                                <?php } ?>
                                            </td>

                                            <td>
                                                <table>
                                                    <tr>
                                                        <th><?php echo lang('report/Tenant.re_name'); ?></th>
                                                        <td>:</td>
                                                        <td><?= $tenants['tename']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo lang('report/Tenant.re_email'); ?></th>
                                                        <td>:</td>
                                                        <td><?= $tenants['teemail']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo lang('report/Tenant.re_contact'); ?></th>
                                                        <td>:</td>
                                                        <td><?= $tenants['tecontrctno']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo lang('report/Tenant.re_ads'); ?></th>
                                                        <td>:</td>
                                                        <td><?= $tenants['teads']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo lang('report/Tenant.re_nid'); ?></th>
                                                        <td>:</td>
                                                        <td><?= $tenants['tenid']; ?></td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td><?= $tenants['floorno']; ?></td>
                                            <td><?= $tenants['unitno']; ?></td>
                                            <td><?= $tenants['teadvancerent']; ?></td>
                                            <td><?= $tenants['terentpermonth']; ?></td>
                                            <td><?= date_formats($tenants['teissuedate']); ?></td>
                                            
                                            <td>
                                                <?php if ($tenants['testatus'] == 1) { 
                                                    echo "Active";
                                                } else { 
                                                    echo "In-Active";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

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

<script>
    $(function() {
        window.print();
    });
</script>
<!-- end main content-->
<?= $this->endSection() ?>