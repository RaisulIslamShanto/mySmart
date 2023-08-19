<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('report/Tenant.te_name'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('report/Tenant.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('report/Tenant.te_name'); ?></li>
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
                        <h4><?php echo lang('report/Tenant.golden_tower'); ?></h4>
                        <p><?php echo lang('report/Tenant.te_details'); ?></p>
                       
                    </div>
                    <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-10">
                                    <div class="text-end mb-4">
                                        <a href="<?= base_url(); ?>/admin/rented_pdf">
                                            <button type="button" class="btn btn-success">Export To PDF</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="text-end mb-4">
                                        <a class="btn btn-success" href="<?php echo base_url() ?>/admin/rentedprint_report">
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
                            <h4 class="card-title mb-4"><?php echo lang('report/Tenant.te_name'); ?></h4>  
                            <div class="table-responsive mb-0 "> 
                               <table class="table table-striped">
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

                                        <?php
                                        if(isset($getTenants)){

                                      
                                        foreach($getTenants as $tenants) : ?>
                                        <tr>
                                        <td>
                                            <?php if($tenants['teownerphoto']!=''){ ?>
                                           
                                                <img class="rounded-circle avatar-xs" alt="tenant-photo" src="<?php echo base_url(); ?>/uploads/<?= $tenants['teownerphoto']; ?>" data-holder-rendered="true">
                                           
                                            <?php }else{ ?>
                                           
                                                <img class="rounded-circle avatar-xs" height="50px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg" alt="tenant-photo">
                                               
                                            <?php }?>
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
                                            <td><?= $tenants['teadvancerent']; ?>
                                            <?php currency($tenants['teadvancerent']); ?></td>
                                            <td><?php currency($tenants['terentpermonth']); ?></td>
                                            <td><?= date_formats($tenants['teissuedate']); ?></td>
                                            <?php if ($tenants['testatus'] == 1) { ?>
                                            <td> <span class="badge rounded-pill bg-primary"><?php echo lang('report/Tenant.re_active'); ?></span></td>
                                        <?php } else { ?>
                                            <td> <span class="badge rounded-pill bg-warning"><?php echo lang('report/Tenant.re_inactive'); ?></span></td>
                                        <?php } ?>
                                        </tr>
                                        <?php endforeach; } ?>
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