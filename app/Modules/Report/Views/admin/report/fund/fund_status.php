<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('report/fund.f_report'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('report/fund.f_report'); ?></li>
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
                                        <a href="<?= base_url(); ?>/admin/fundstatus_pdf">
                                            <button type="button" class="btn btn-success">Export To PDF</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="text-end mb-4">
                                        <a class="btn btn-success" href="<?= base_url('admin/printfundstatus'); ?>">
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
                            <h4 class="card-title mb-4"><?php echo lang('report/fund.f_report'); ?></h4>  
                            <div class="table-responsive mb-0 "> 
                                <table class="table  table-bordered table-striped  ">
                                  <thead>
                                    <tr>
                                      <th><?php echo lang('report/fund.image'); ?></th>
                                      <th><?php echo lang('report/fund.date'); ?></th>
                                      <th><?php echo lang('report/fund.owner_name'); ?></th>
                                      <th><?php echo lang('report/fund.month'); ?></th>
                                      <th><?php echo lang('report/fund.year'); ?></th>
                                      <th><?php echo lang('report/fund.purpose'); ?></th>
                                      <th><?php echo lang('report/fund.amount'); ?></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                
                                      foreach($funds as $fund){

                                      
                                      ?>
                                     <tr>
                                        <td> <img class="rounded-circle avatar-xs" alt="200x200" src="<?php
                                        if($fund->owner_image=='empty_image.jpg'){
                                            echo base_url();?>/admin/assets/images/<?= $fund->owner_image;
                                          }else{
                                              echo base_url();?>/admin/assets/owner_image/thumbnail/<?= $fund->owner_image;
                                          }?>" data-holder-rendered="true"> </td>
                                        <td><?= date_formats($fund->issue_date);?></td>
                                        <td><?= $fund->owner_name;?></td>
                                        <td><?= $fund->month;?></td>
                                        <td><?= $fund->year;?></td>
                                        <td><?= $fund->purpose;?></td>
                                        <td><?php currency($fund->total_amount);?></td>
                                      </tr>
                                      <?php }?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>&nbsp;</th>
                                      <th>&nbsp;</th>
                                      <th>&nbsp;</th>
                                      <th>&nbsp;</th>
                                      <th>&nbsp;</th>
                                      <th>&nbsp;</th>
                                      <th class="text-danger"><?php
                                      foreach($funds_total as $fund){
                                        echo currency($fund->total_amount);
                                          
                                      }
                                      ?></th>
                                    </tr>
                                  </tfoot>
                                </table>
                            </div>
                             
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('report/fund.m_c_s'); ?></h4>  
                            <div class="table-responsive mb-0 "> 
                                <table class="table  table-bordered table-striped  ">
                                    <thead>
                                        <tr>
                                          <th><?php echo lang('report/fund.c_t'); ?></th>
                                          <th><?php echo lang('report/fund.date'); ?></th>
                                          <th><?php echo lang('report/fund.details'); ?></th>
                                          <th><?php echo lang('report/fund.amount'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                foreach($maintenences as $maintenence){
                                ?>
                                        
                                        <tr>
                                            <td><?=$maintenence['maintitle'];?></td>
                                            <td><?= date_formats($maintenence['maindate']);?></td>
                                            <td><?=$maintenence['maindetails'];?></td>
                                            <td><?=$maintenence['mainamount'];?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                          <th class="text-danger"><?php 
                                          foreach($maintenences_total as $maintenences_totals){
                                            echo $maintenences_totals->mainamount;
                                              
                                          }
                                          ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('report/fund.r_b'); ?></h4>  
                            <div class="table-responsive mb-0 "> 
                                <table class="table  table-bordered table-striped  ">
                                    <thead>
                                        <tr>
                                          <th class="text-danger"><?php
                                          $Remain_bal=$fund->total_amount-$maintenences_totals->mainamount;
                                          echo $Remain_bal;
                                          ?></th>
                                          
                                        </tr>
                                    </thead>
                                     
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- end col -->
            </div>
            <!-- end row -->
            
        </div>
        <!-- container-fluid -->
    </div>
 
<!-- end main content-->
<?php echo $this->endSection('content') ?>