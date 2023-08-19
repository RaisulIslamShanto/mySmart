<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Visitor details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Visitor details</li>
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
                    <a href="<?php echo base_url() ?>/admin/visitor_list" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Visitor.vis_list'); ?> </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="card-title mb-4 center" style="text-align: center;"> Visitor details</h2>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th scope="col">Visitor name :</th>
                                        <th scope="col"><?= $visitor['visiname']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Mobile :</th>
                                        <th scope="col"><?= $visitor['visimobile']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Floor :</th>
                                        <th scope="col"><?= $floor['floorno']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Unit :</th>
                                        <th scope="col"><?= $visitor['unitid']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">In time :</th>
                                        <th scope="col"><?= $visitor['visiintime']; ?>e</th>
                                    </tr>

                                    <tr>
                                        <th scope="col">Out rime :</th>
                                        <th scope="col"><?= $visitor['visiouttime']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Date :</th>
                                        <th scope="col"><?= $visitor['visientrydate']; ?></th>
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