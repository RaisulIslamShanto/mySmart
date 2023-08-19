<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/employee.u_n_e'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('admin/owner.Home'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/employee.u_n_e'); ?></li>
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
                            <h4 class="card-title mb-4"> <?php echo lang('admin/employee.new_e_form'); ?></h4> 
                            
                            <form class="needs-validation" action="<?= base_url('admin/employeeupdate/'.$employees['id'])?>" method="POST"enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.name'); ?>  :</label>
                                        <input type="text" class="form-control" name="name" value="<?=$employees['name'];?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('name')) {
             echo $validation->getError('name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_name'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.email'); ?> :</label>
                                        <input type="email" class="form-control" name="email" value="<?=$employees['email'];?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('email')) {
             echo $validation->getError('email'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_email'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.pass'); ?>  :</label>
                                        <input type="password" class="form-control" name="password"value="<?=$employees['password'];?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('password')) {
             echo $validation->getError('password'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_pass'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.contact_no'); ?>:</label>
                                        <input type="number" class="form-control" name="contact_no"value="<?=$employees['contact_no'];?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('contact_no')) {
             echo $validation->getError('contact_no'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_contact_no'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.pre_address'); ?> :</label>
                                        <textarea class="form-control" name="present_address" required><?=$employees['present_address'];?></textarea>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('present_address')) {
             echo $validation->getError('present_address'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_pre_address'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.per_address'); ?>:</label>
                                        <textarea class="form-control" name="parmanent_address" required><?=$employees['parmanent_address'];?></textarea>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('parmanent_address')) {
             echo $validation->getError('parmanent_address'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_per_address'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>*  <?php echo lang('admin/employee.nid'); ?> :</label>
                                        <input type="number" class="form-control" name="nid" value="<?=$employees['nid']?>" required> 
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('nid')) {
             echo $validation->getError('nid'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_nid'); ?>
                                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/employee.designation'); ?> :</label>
                                        <select name="designation" id="ddlMemberType" class="form-control" required> 
                                            <option value="">--Select--</option>
                                            <option value="Moderator"<?php if($employees['designation']=='Moderator'){echo "selected";}?>>Moderator</option>
                                            <option value="Secretary General"<?php if($employees['designation']=='Secretary General'){echo "selected";}?>>Secretary General</option>
                                            <option value="Member"<?php if($employees['designation']=='Member'){echo "selected";}?>>Member</option>
                                            <option value="Pion"<?php if($employees['designation']=='Pion'){echo "selected";}?>>Pion</option>
                                            <option value="Security Gard"<?php if($employees['designation']=='Security Gard'){echo "selected";}?>>Security Gard</option>
                                            <option value="Caretaker"<?php if($employees['designation']=='Caretaker'){echo "selected";}?>>Caretaker</option>
                                            <option value="Maker"<?php if($employees['designation']=='Maker'){echo "selected";}?>>Maker</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('designation')) {
             echo $validation->getError('designation'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_designation'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.join_date'); ?>:</label>
                                        <input type="date" class="form-control" name="join_date" value="<?=$employees['join_date'];?>" required> 
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('join_date')) {
             echo $validation->getError('join_date'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_join_date'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.e_date'); ?> :</label>
                                        <input type="date" class="form-control" value="<?=$employees['end_date'];?>" name="end_date" required> 
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('end_date')) {
             echo $validation->getError('end_date'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_date'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.s_p_m'); ?>  :</label>
                                        <input type="text" class="form-control" name="salary_per_month" value="<?=$employees['salary_per_month'];?>" required> 
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('salary_per_month')) {
             echo $validation->getError('salary_per_month'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_s_p_m'); ?>
                                                        </div>
                                    </div>
                                     <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/employee.status'); ?>  :</label>
                                         <select name="status" id="chkEmpStaus" class="form-control" required>
                                          <option  value="Active"<?php if($employees['status']=='Active'){echo "selected";}?>>Active</option>
                                          <option value="Leave"<?php if($employees['status']=='Leave'){echo "selected";}?>>Leave</option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('status')) {
             echo $validation->getError('status'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/employee.e_status'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <label><?php echo lang('admin/employee.owner_img'); ?> :</label>
                                        <div class="card"> 
                                             
                                            <div class="poperty_image_upload">
                                                <input  class="form-control--uploader" name="image" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                                <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('admin/employee.up_photo'); ?></span> </label>
                                                <img id="soutput" src="<?= base_url();?>/admin/assets/employee/<?=$employees['image'];?>" class="img-fluid" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-4">
                                <a href="<?php echo base_url()?>/admin/employeelist" class="btn btn-outline-danger btn-rounded"><?php echo lang('admin/employee.cancel'); ?></a>
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/employee.created'); ?></button>
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
            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
 
<!-- end main content-->

<?php echo $this->endSection('content')?>