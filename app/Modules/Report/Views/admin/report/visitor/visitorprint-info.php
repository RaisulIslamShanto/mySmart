<?= $this->extend('\Modules\Master\Views\layout') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center p-3">
                    <img src="assets/images/pr1.jpg" class="rounded-circle rounded avatar-xl mb-3 headerimg">
                    <h4><?php echo lang('report/Visitors.golden_tower'); ?></h4>
                    <p><?php echo lang('report/Visitors.visihead_details'); ?></p>

                </div>

                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4">Visitor Report</h4>
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
                                    <?php foreach ($getVisitors as $visitors) : ?>
                                        <tr>
                                            <td><?= date_formats($visitors['visientrydate']); ?></td>
                                            <td><?= $visitors['visiname']; ?></td>
                                            <td><?= $visitors['visimobile']; ?></td>
                                            <td><?= $visitors['visiads']; ?></td>
                                            <td><?= $visitors['floorno']; ?></td>
                                            <td><?= $visitors['unitno']; ?></span></td>
                                            <td><?= $visitors['visiintime']; ?></span></td>
                                            <td><?= $visitors['visiouttime']; ?></span></td>
                                            <td><?= date('F', strtotime($visitors['visientrydate'])); ?></td>
                                            <td><?= date('Y', strtotime($visitors['visientrydate'])); ?></td>
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
    $(function(){
        window.print();
    });
</script>
<!-- end main content-->
<?= $this->endSection() ?>