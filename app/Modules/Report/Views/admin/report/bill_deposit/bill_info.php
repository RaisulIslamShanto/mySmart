<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('report/bill_deposit.b_report'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('report/bill_deposit.b_report'); ?></li>
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
                        <h4>Home</h4>
                        <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>
                       
                    </div>
                   
                    <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-10">
                                    <div class="text-end mb-4">
                                        <a href="<?= base_url(); ?>/admin/billinfo_pdf">
                                            <button type="button" class="btn btn-success">Export To PDF</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="text-end mb-4">
                                        <a class="btn btn-success" href="<?= base_url('admin/printbillreport'); ?>">
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
                            <h4 class="card-title mb-4"><?php echo lang('report/bill_deposit.b_report'); ?></h4>  
                            <div class="table-responsive mb-0 "> 
                                <table  class="table  table-bordered table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                          <th><?php echo lang('report/bill_deposit.date'); ?></th>
                                          <th><?php echo lang('report/bill_deposit.b_type'); ?></th>
                                          <th><?php echo lang('report/bill_deposit.month'); ?></th>
                                          <th><?php echo lang('report/bill_deposit.year'); ?></th>
                                          <th><?php echo lang('report/bill_deposit.total_amount'); ?></th>
                                          <th><?php echo lang('report/bill_deposit.d_b'); ?></th>
                                          <th><?php echo lang('report/bill_deposit.details'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($bills as $bill){?>
                                        <tr>
                                          <td><?= date_formats($bill['bill_date']);?></td>
                                          <td><?=$bill['bill_type'];?></td>
                                          <td><?=$bill['month'];?></td>
                                          <td><?=$bill['year'];?></td>
                                          <td><?php currency($bill['total_amount']);?></td>
                                          <td><?=$bill['bank_name'];?></td>
                                          <td><?=$bill['details'];?></td>
                                        </tr>
                                        <?php }
                                        ?>
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
<?php echo $this->endSection('content') ?>