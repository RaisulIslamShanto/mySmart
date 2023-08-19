<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/bill_deposit.update_b'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/bill_deposit.update_b'); ?></li>
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
                            <h4 class="card-title mb-4">  <?php echo lang('admin/bill_deposit.b_form'); ?></h4> 
                            
                            <form class="needs-validation" action="<?= base_url('admin/billupdate/'.$bill['id'])?>" method="POST"enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.b_type'); ?> :</label>
                                        <select name="bill_type" id="bill_type" class="form-control" required>  
                                        
                                            <option value="">--Select Type--</option>
                                           <?php foreach($bill_types as  $bill_type){?>
                                            <option value="<?=$bill_type['id'];?>"<?php if($bill['bill_type']==$bill_type['id']){echo "selected";}?>><?=$bill_type['billtype'];?></option>
                                            <?php }?>

                                          </select>
                                          <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('bill_type')) {
                                             echo $validation->getError('bill_type'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_bill_type'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.b_d_d'); ?>:</label>
                                        <input type="date" class="form-control" name="bill_date" value="<?=$bill['bill_date']?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('bill_date')) {
                                           echo $validation->getError('bill_date'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_b_d_d'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.b_month'); ?> :</label>
                                        <select name="month" id="ddlBillMonth" class="form-control" required> 
                                            
                                            <option value="">--Select Month--</option>
                                            <?php
                                        foreach($months as $month){?>
                                            <option value="<?=$month['monthname'];?>"<?php if($bill['month']==$month['monthname']){echo "selected";}?>><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?>
                                          </select>
                                          <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('month')) {
                                            echo $validation->getError('month'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_month'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.b_year'); ?> :</label>
                                        <select name="year" id="ddlBillYear" class="form-control" required> 
                                            <option value="">--Select Year--</option>
                                            <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"<?php if($bill['year']==$year['year']){echo "selected";}?>
                                        ><?=$year['year'];?></option>
                                        <?php  }
                                        ?>
                                            
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('year')) {
             echo $validation->getError('year'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_year'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.total_amount'); ?> :</label>
                                        <div class="input-group">
                                          <input type="number" name="total_amount" value="<?=$bill['total_amount']?>" id="txtTotalAmount" class="form-control" required>
                                          <div class="input-group-text"><?php symbol();?></div>

                                        </div>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('total_amount')) {
             echo $validation->getError('total_amount'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_total_amount'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.d_b_n'); ?> :</label>
                                        <input type="text" class="form-control" value="<?=$bill['bank_name']?>" name="bank_name" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('bank_name')) {
             echo $validation->getError('bank_name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_d_b_n'); ?>
                                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label>* <?php echo lang('admin/bill_deposit.details'); ?> :</label>
                                        <textarea class="form-control" name="details" required><?=$bill['details']?></textarea>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('details')) {
             echo $validation->getError('details'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        <?php echo lang('admin/bill_deposit.e_details'); ?>
                                                        </div>
                                    </div>
                                       
                                </div>
                                <div class="d-flex mt-4">
                                <a href="<?php base_url() ?>/admin/billdipositlist" class="btn btn-outline-danger btn-rounded"><?php echo lang('admin/bill_deposit.cancel'); ?>
                                </a>
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/bill_deposit.updated'); ?></button>
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

<?php echo $this->endSection('content')?>