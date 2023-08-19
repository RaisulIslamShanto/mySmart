<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>

<?php
  $edit= menu_access('noticeupdate');
  $delete= menu_access('noticedelete');
  ?>

<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/notice.o_n_b'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/notice.o_n_b'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  
                <div class="row">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"> <?php echo lang('admin/notice.n_e_f'); ?></h4> 
                            <?php 
                    if(isset($success)){
                        echo '<div class="alert alert-success text-center">'.$success.'</div>';
                     }
                    ?>
                   
                            
                            <form class="needs-validation" action="<?= base_url('admin/addnotice')?>" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label>* <?php echo lang('admin/notice.n_title'); ?> :</label>
                                        <input type="text" class="form-control" name="title" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('title')) {
             echo $validation->getError('title'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/notice.e_title'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/notice.n_date'); ?> :</label>
                                        <input type="text" class="form-control" name="date"  required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('date')) {
             echo $validation->getError('date'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/notice.e_date'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/notice.n_status'); ?> :</label>
                                        <select name="status" id="ddlNoticeStatus" class="form-control" required>
                                            <option value="1">Publish Now</option>
                                            <option value="0">Disable</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('status')) {
             echo $validation->getError('status'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/notice.e_status'); ?>
                                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/notice.type'); ?> :</label>
                                        <select name="notice_type" id="ddlNoticeStatus" class="form-control" required>
                                            <option value="">--Select one--</option>
                                            <option value="1">Tenent</option>
                                            <option value="2">Employee</option>
                                            <option value="3">Owner</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('notice_type')) {
             echo $validation->getError('notice_type'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/notice.e_type'); ?>
                                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label>* <?php echo lang('admin/notice.n_desc'); ?> :</label>
                                        <textarea id="elm1" name="text_area" required></textarea>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('text_area')) {
             echo $validation->getError('text_area'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/notice.e_textarea'); ?>
                                                        </div>
                                    </div>

                                 
                                   
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="reset" class="btn btn-warning btn-rounded" value="<?php echo lang('admin/notice.reset'); ?>" name="">
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/notice.created'); ?></button>
                                </div>
                            </form>
                             
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> 
                <!-- end col -->
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('admin/notice.n_list'); ?></h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col"><?php echo lang('admin/notice.n_title'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/notice.n_status'); ?></th>   
                                        <th scope="col"><?php echo lang('admin/notice.action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($notices as $notice){

                                    ?>
                                    <tr>   
                                        
                                        <td><?=$notice['title'];?></td>
                                        <td><span class="badge bg-primary"><?php
                                        if($notice['status']==1){
                                            echo "Publish";
                                        }else{
                                            echo "Disable";
                                        }
                                        ?></span></td>   
                                        <td>  
                                             <?php if($edit){?>
                                            <a type="button" href="<?=site_url('admin/noticeupdate/'.$notice['id'])?>" class="btn btn-outline-success btn-sm">Edit</a>
                                            <?php } if($delete){?>
                                            <a type="button" href="<?=site_url('admin/noticedelete/'.$notice['id'])?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                            <?php }?>
                                        </td>
                                    </tr>  
                                   <?php }?>
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

<?php echo $this->endSection('content')?>