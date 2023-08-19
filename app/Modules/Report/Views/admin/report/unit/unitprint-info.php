<?= $this->extend('\Modules\Master\Views\layout') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="text-center p-3">
                    <img src="assets/images/pr1.jpg" class="rounded-circle rounded avatar-xl mb-3 headerimg">
                    <h4><?php echo lang('report/Unit_status.golden_tower'); ?></h4>
                    <p><?php echo lang('report/Unit_status.unit_headdetails'); ?></p>

                </div>
                <div class="text-end mb-4">
                    <a class="btn btn-success" href="javascript:void(0);">
                        <i class="fa fa-print"></i>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('report/Unit_status.unit_headname'); ?></h4>
                        <div class="table-responsive mb-0 ">
                        <table class="table  table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th><?php echo lang('report/Unit_status.unit_floor'); ?></th>
                                        <th><?php echo lang('report/Unit_status.unit_unit'); ?></th>
                                        <th><?php echo lang('report/Unit_status.unit_status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($getUnits )){
                                         foreach ($getUnits as $units) : ?>
                                        <tr>
                                            <td><?= $units['floorno']; ?></td>
                                            <td><?= $units['unitno']; ?></td>
 
                                            <?php if ($units['testatus'] == 1) { ?>
                                                <td> <span class="badge rounded-pill bg-warning"><?php echo lang('report/Unit_status.unit_booked'); ?></span></td>
                                            <?php } else { ?>
                                                <td> <span class="badge rounded-pill bg-primary"><?php echo lang('report/Unit_status.unit_avai'); ?></span></td>
                                            <?php } ?>

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

<script>
    $(function(){
        window.print();
    });
</script>

<!-- end main content-->
<?= $this->endSection() ?>