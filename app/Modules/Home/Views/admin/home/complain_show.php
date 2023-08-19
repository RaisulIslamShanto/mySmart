<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Complain details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Complain details</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->



        <div class="row">

            <div class="col-lg-12">
                <div class="mb-4 text-end">
                    <a href="<?php echo base_url() ?>/admin/complain_list" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Complain.com_list'); ?> </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="card-title mb-4 center" style="text-align: center;"> Complain details</h2>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th scope="col">Title :</th>
                                        <th scope="col"><?= $complain['comtitle']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Date :</th>
                                        <th scope="col"><?= $complain['comdate']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Assigned complain :</th>
                                        <th scope="col"><?= $employee['name']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Status :</th>
                                        <?php if ($complain['comstatus'] == 'Pending') { ?>
                                            <th>
                                                <span class="badge bg-warning"><?= $complain['comstatus']; ?></span>
                                            </th>
                                        <?php } ?>
                                        <?php if ($complain['comstatus'] == 'In progress') { ?>
                                            <th>
                                                <span class="badge bg-info"><?= $complain['comstatus']; ?></span>
                                            </th>
                                        <?php } ?>
                                        <?php if ($complain['comstatus'] == 'On hold') { ?>
                                            <th>
                                                <span class="badge bg-danger"><?= $complain['comstatus']; ?></span>
                                            </th>
                                        <?php } ?>
                                        <?php if ($complain['comstatus'] == 'Completed') { ?>
                                            <th>
                                                <span class="badge bg-success"><?= $complain['comstatus']; ?></span>
                                            </th>
                                        <?php } ?>
                                        <?php if ($complain['comstatus'] == '') { ?>
                                            <th>
                                                <span> </span>
                                            </th>
                                        <?php } ?>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Solution :</th>
                                        <th scope="col"><?= $complain['comsolution']; ?></th>
                                    </tr>

                                </thead>
                                <!-- <tbody style="text-align: center;">
                      
                             <tr>

                                 <td>
                                     <h5 class="font-size-15 mb-0"> </h5>
                                 </td>
                                 <td></td>


                                
                             </tr>
                   

                         </tbody> -->
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
</div>




<?= $this->endSection() ?>