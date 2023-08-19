<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('report/Visitors.visihead_name'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('report/Visitors.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('report/Visitors.visihead_name'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center p-3">
                    <img src="assets/images/pr1.jpg" class="rounded-circle rounded avatar-xl mb-3">
                    <h4><?php echo lang('report/Visitors.golden_tower'); ?></h4>
                    <p><?php echo lang('report/Visitors.visihead_details'); ?></p>

                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-10">
                                    <div class="text-end mb-4">
                                        <a href="<?= base_url(); ?>/admin/visitor_pdf">
                                            <button type="button" class="btn btn-success">Export To PDF</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="text-end mb-4">
                                        <a class="btn btn-success" href="<?php echo base_url() ?>/admin/visitorprint_report/">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('report/Visitors.visihead_name'); ?></h4>
                        <div class="table-responsive mb-0 ">
                            <table class="table  table-bordered table-striped dt-responsive">
                                <thead>
                                    <tr>
                                        <th><?php echo lang('report/Visitors.visi_date'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_name'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_mobile'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_ads'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_floor'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_unit'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_intime'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_outtime'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_month'); ?></th>
                                        <th><?php echo lang('report/Visitors.visi_year'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($getVisitors)){
                                     foreach ($getVisitors as $visitors) : ?>
                                        <tr>
                                            <td><?= date_formats($visitors['visientrydate']); ?></td>
                                            <td><?= $visitors['visiname']; ?></td>
                                            <td><?= $visitors['visimobile']; ?></td>
                                            <td><?= $visitors['visiads']; ?></td>
                                            <td><?= $visitors['floorno']; ?></td>
                                            <td><span class="badge bg-warning"><?= $visitors['unitno']; ?></span></td>
                                            <td><span class="badge bg-primary"><?= $visitors['visiintime']; ?></span></td>
                                            <td><span class="badge bg-danger"><?= $visitors['visiouttime']; ?></span></td>
                                            <td><?= date('F', strtotime($visitors['visientrydate'])); ?></td>
                                            <td><?= date('Y', strtotime($visitors['visientrydate'])); ?></td>
                                        </tr>
                                    <?php endforeach; }?>
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

<!-- end main content-->
<?= $this->endSection() ?>