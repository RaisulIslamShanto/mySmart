<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
     <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
             <div class="col-12">
                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0"><?php echo lang('admin/super_admin.p_user_list'); ?></h4>

                     <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Floor.golden_tower'); ?></a></li>
                             <li class="breadcrumb-item active"><?php echo lang('admin/super_admin.p_user_list'); ?></li>
                         </ol>
                     </div>

                 </div>
             </div>
         </div>
         <!-- end page title -->

         <div class="row">
             <div class="col-lg-12">
                 <div class="mb-4 text-end">
                     <a href="<?php echo base_url() ?>/admin/property_user_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> Property User Add</a>
                 </div>
                 <?php 
                    if(session()->getFlashdata('success')){
                        echo "<h6 style='color:red;text-align:center;'>".session()->getFlashdata('success')."</h6>";
                    }
                    ?>
                 <div class="card">
                     <div class="card-body ">
                         <h4 class="card-title mb-4"> <?php echo lang('Floor.floor_list'); ?></h4>

                         <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th scope="col"><?php echo lang('admin/super_admin.sl'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.name'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.email'); ?></th>
                                    
                                     <th scope="col"><?php echo lang('admin/super_admin.type'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.status'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.action'); ?></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $q=1; foreach($property_users as $property_user){?>
                                
                                     <tr>
                                         <td><?=$q?></td>
                                         <td><?=$property_user->name?></td>
                                         <td><?=$property_user->email?></td>
                                        
                                         <td>
                                             <?php if($property_user->type==1){echo "<b style='color:#7c8a96;'>Landlord</b>";
                                            }elseif($property_user->type==2){echo "<b style='color:#0bb197;'>Property Manager</b>";}?>
                                        </td>
                                         <td>
                                             <?php if($property_user->status==1){echo "<b style='color:#0bb197;'>Active</b>";}elseif($property_user->status==0){echo "<b style='color:#df3832;'>In Active</b>";}?>
                                        </td>
                                         <td>

                                            <a href="<?=base_url('admin/property_details/'.$property_user->company_id);?>" class="btn btn-outline-success btn-sm"><?php echo lang('admin/super_admin.view'); ?></a>

                                             <a href="<?=base_url('admin/property_user_edit/'.$property_user->id);?>" class="btn btn-outline-success btn-sm"><?php echo lang('Floor.floo_edit'); ?></a>
                                             
                                             <a href="<?= base_url() ?>/admin/floor_delete/" class="btn btn-outline-danger btn-sm"><?php echo lang('Floor.floo_delete'); ?></a>
                                            
                                         </td>
                                     </tr>

                                     <?php $q++;}?>
                              
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