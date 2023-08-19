<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
     <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
             <div class="col-12">
                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0"><?php echo lang('admin/super_admin.p_details'); ?></h4>

                     <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Floor.golden_tower'); ?></a></li>
                             <li class="breadcrumb-item active"><?php echo lang('admin/super_admin.p_details'); ?></li>
                         </ol>
                     </div>

                 </div>
             </div>
         </div>
         <!-- end page title -->

         <div class="row">
             <div class="col-lg-12">
             
                 <div class="mb-4 text-end">
                     <a href="<?php echo base_url() ?>/admin/floor_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i><?php echo lang('admin/super_admin.add_p_user'); ?></a>
                 </div>
                 <div class="card">
                     <div class="card-body ">
                         <h4 class="card-title mb-4"><?php echo lang('admin/super_admin.p_details'); ?></h4>

                         <div class="col-md-12 text-center font-size-24">
                                <a type="button" class="mt-4 mb-4 btn btn-primary btn-large-rounded avatar-title mx-auto"><h4> <?=$total_properties?> <br> Properties</h4> </a>
                         </div>
                         <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th scope="col"><?php echo lang('admin/super_admin.sl'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.name'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.total_employee'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.total_tenant'); ?></th>
                                   
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php 
                                 //echo "<pre>";print_r($properties);die();
                                   $q=1; foreach($properties as $property){ ?>
                                
                                     <tr>
                                         <td><?=$q?></td>
                                         <td><?=$property['propertyname'];?></td>
                                         <td>
                                            <?= view_cell('\Modules\Super_admin\Controllers\Superadmincontroller::get_property_employee', ['property_id' => $property['id']]) ?>
                                         </td>
                                         
                                         <td>
                                     
                                         <?= view_cell('\Modules\Super_admin\Controllers\Superadmincontroller::get_property_tenant', ['property_id' => $property['id']]) ?>
                                        
                                         </td>
                                     </tr>

                                     <?php $q++;} ?>
                              
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