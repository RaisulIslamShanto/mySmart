 <?= $this->extend('\Modules\Master\Views\master') ?>
 <?= $this->section('content') ?>

 <div class="page-content">
     <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
             <div class="col-12">
                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0"><?php echo lang('Unit.unit_list'); ?> </h4>

                     <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Unit.golden_tower'); ?></a></li>
                             <li class="breadcrumb-item active"><?php echo lang('Unit.unit_add'); ?></li>
                         </ol>
                     </div>

                 </div>
             </div>
         </div>
         <!-- end page title -->

         <div class="row">
             <div class="col-lg-12">
                 <div class="mb-4 text-end">
                     <a href="<?php echo base_url() ?>/admin/unit_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i><?php echo lang('Unit.unit_add'); ?></a>
                 </div>
                 <div class="card">
                     <div class="card-body ">
                         
                         <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th scope="col"><?php echo lang('Unit.floor_no'); ?></th>
                                     <th scope="col"><?php echo lang('Unit.unit_no'); ?></th>
                                     <th scope="col"><?php echo lang('Unit.unit_action'); ?></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                 if(isset($getUnits)){ foreach ($getUnits as $units) : ?>
                                     <tr>

                                         <td><?= $units->floorno; ?></td>
                                         <td><?= $units->unitno; ?></td>
                                         <td>
                                             <a href="<?= base_url() ?>/admin/unit_edit/<?= $units->id; ?>" class="btn btn-outline-success btn-sm"><?php echo lang('Unit.unit_edit'); ?></a>
                                             <a href="<?= base_url() ?>/admin/unit_delete/<?= $units->id; ?>" class="btn btn-outline-danger btn-sm"><?php echo lang('Unit.unit_delete'); ?></a>
                                         </td>
                                     </tr>
                                 <?php endforeach; }?>
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

 <!-- end main content-->
 <?= $this->endSection() ?>