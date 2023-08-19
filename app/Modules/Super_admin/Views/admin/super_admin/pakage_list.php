<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
     <div class="container-fluid">
     <div class="row">
             <div class="col-lg-12">
             
                 <div class="mb-4 text-end">
                     <a href="<?php echo base_url() ?>/admin/pakage_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('admin/super_admin.addpakage'); ?></a>
                 </div>
                 <?php 
                    if(session()->getFlashdata('deleted')){
                        echo '<div class="alert alert-danger text-center">'.session()->getFlashdata('deleted')."</div>";
                     }
                     if(session()->getFlashdata('saved')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('saved')."</div>";
                     }
                     if(session()->getFlashdata('updated')){
                        echo '<div class="alert alert-success text-center">'.session()->getFlashdata('updated')."</div>";
                     }
                    ?>
                 <div class="card">
                     <div class="card-body ">
                         <h4 class="card-title mb-4"><?php echo lang('admin/super_admin.pak_details'); ?></h4>

                         
                         <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th scope="col"><?php echo lang('admin/super_admin.sl'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.pak_title'); ?></th>
                                     
                                     <th scope="col"><?php echo lang('admin/super_admin.duration'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.employee_limit'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.cost'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.property_limit'); ?></th>
                                     <th scope="col"><?php echo lang('admin/super_admin.action'); ?></th>
                                   
                                 </tr>
                             </thead>
                             <tbody>
                             <?php $q=1; foreach($pakages as $pakage){?>
                                
                                <tr>
                                    <td><?=$q?></td>
                                    <td><?=$pakage['pakage_title']?></td>
                                    
                                    <td><?php if($pakage['duration']==1){
                                        echo "30 Days";
                                    }else if($pakage['duration']=='other'){
                                        echo "Other";
                                    }else{
                                        echo $pakage['duration']." Months";
                                    }?></td>
                                    <td><?=$pakage['employee_limit']?></td>
                                    <td><?=$pakage['cost']?></td>
                                    <td><?=$pakage['property_limit']?></td>
                                    <td>
                                       <a href="<?=base_url('admin/pakage_edit/'.$pakage['id']);?>" class="btn btn-outline-success btn-sm"><?php echo lang('admin/super_admin.edit'); ?></a>
                                        
                                        <a href="<?= base_url() ?>/admin/pakage_delete/<?=$pakage['id']?>" class="btn btn-outline-danger btn-sm"><?php echo lang('Floor.floo_delete'); ?></a>
                                       
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