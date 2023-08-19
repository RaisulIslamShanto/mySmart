<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/owner_utility.u_o_u'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active"><a href="<?= base_url('admin/owneradd')?>"><?php echo lang('admin/owner_utility.o_u_f'); ?></a></li>
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
                
                            <?php
                            //print_r($utility_datas);die();
                            foreach($utility_datas as $utility_data){
                            ?>
                            <form class="needs-validation" action="<?= base_url('admin/ownerutilityupdate/'.$utility_data->id)?>" method="POST"enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/owner_utility.floor_no'); ?> :</label>
                                        <input type="hidden" name="utility_id" value="<?= $utility_data->id;?>">
                                        <select  name="floor_no" id="ddlFloorNo" class="form-control" required> 
                                            <option value="">--Select Floor--</option>
                                            <?php
                                            foreach($floors as $floor){ ?>
                                           <option value="<?=$floor['floorno'].'|'.$floor['id'];?>"
                                          <?php if($floor['id']==$utility_data->floor_id){
                                              echo "selected";
                                           }?>
                                           ><?=$floor['floorno'];?></option>

                                           <?php }
                                            ?>
                                          </select>
                                          <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('floor_no')) {
             echo $validation->getError('floor_no'); }} ?></p>
                                          <div class="invalid-feedback">
                                          <?php echo lang('admin/owner_utility.e_floor'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/owner_utility.unit_no'); ?> :</label>
                                        <select name="unit_no" id="ddlUnitNo" class="form-control" required> 
                                            <option value="<?= $utility_data->unit_name.'|'.$utility_data->unit_name;?>" selected><?= $utility_data->unit_name;?></option>
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('unit_no')) {
             echo $validation->getError('unit_no'); }} ?></p>
                                        <div class="invalid-feedback">
                                        <?php echo lang('admin/owner_utility.e_unit'); ?>
                                        </div>
                                    </div>
                                      <div class="col-md-12 mt-4">
                                        <label><?php echo lang('admin/owner_utility.owner_name'); ?> :</label>
                                        <input type="hidden" id="owner_id" name="owner_id" value="<?= $utility_data->owner_id;?>">
                                        <input type="hidden" id="owner_name1" name="owner_name" value="<?= $utility_data->owner_name;?>">
                                        <input style="font-weight:bold;color:red;" type="text" class="form-control" id="owner_name" name="owner_name" value="<?= $utility_data->owner_name;?>" disabled="" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('name')) {
             echo $validation->getError('name'); }} ?></p>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>*  <?php echo lang('admin/owner_utility.s_u_m'); ?>  :</label>
                                        <select name="month" id="ddlMonth" class="form-control" required> 
                                            <option value="">--Select Rent Month--</option>
                                            <?php
                                        foreach($months as $month){?>
                                            <option value="<?=$month['monthname'];?>"<?php if($utility_data->month==$month['monthname']){echo "selected";}?>><?=$month['monthname'];?></option>
                                       <?php  }
                                        ?>
                                          </select>
                                          <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('month')) {
             echo $validation->getError('month'); }} ?></p>
                                          <div class="invalid-feedback">
                                          <?php echo lang('admin/owner_utility.e_month'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/owner_utility.s_u_y'); ?>:</label>
                                        <select name="year" id="ddlYear" class="form-control" required>
                                            <option value="">--Select Rent Year--</option>
                                            <?php
                                        foreach($years as $year){?>
                                        <option value="<?=$year['year'];?>"<?php if($utility_data->year==$year['year']){echo "selected";}?>
                                        ><?=$year['year'];?></option>
                                        <?php  }
                                        ?>
                                            
                                        </select>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('year')) {
             echo $validation->getError('year'); }} ?></p>
                                        <div class="invalid-feedback">
                                        <?php echo lang('admin/owner_utility.e_year'); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.w_b'); ?> :</label>
                                        <div class="input-group"> 
                                            <input type="text" name="water_bill" value="<?= $utility_data->water_bill;?>" id="txtWaterBill" class="form-control"> <div class="input-group-text"><?php symbol();?></div>  
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.e_b'); ?> :</label>
                                        <div class="input-group"> 
                                            <input type="text" name="electric_bill"  value="<?= $utility_data->electric_bill;?>" id="txtElectricBill" class="form-control"> 
                                            <div class="input-group-text"><?php symbol();?></div>  
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.g_b'); ?> :</label>
                                        <div class="input-group"> 
                                            <input type="text" name="gas_bill"  value="<?= $utility_data->gas_bill;?>" id="txtGasBill" class="form-control"> 
                                            <div class="input-group-text"><?php symbol();?></div>  
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.s_b'); ?> :</label>
                                        <div class="input-group">  
                                            <input type="text" name="security_bill"   value="<?= $utility_data->security_bill;?>" id="txtSecurityBill" class="form-control"> 
                                            <div class="input-group-text"><?php symbol();?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.u_bill'); ?> :</label>
                                        <div class="input-group"> 
                                            <input type="text" name="utility_bill"  value="<?= $utility_data->utility_bill;?>" id="txtUtilityBill" class="form-control"> 
                                            <div class="input-group-text"><?php symbol();?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.o_bill'); ?> :</label>
                                        <div class="input-group"> 
                                            <input type="text" name="other_bill" value="<?= $utility_data->others_bill;?>" id="txtOtherBill" class="form-control"> 
                                            <div class="input-group-text"><?php symbol();?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('admin/owner_utility.total_rent'); ?> :</label>
                                        <div class="input-group"> 
                                            <input type="text" name="total_rent" value="<?= $utility_data->total_rent;?>" id="txtTotalRent" class="form-control" disabled="">
                                            <input type="hidden" id="txtTotalRent1" name="total_rents" value="<?= $utility_data->total_rent;?>"> 
                                            <div class="input-group-text"><?php symbol();?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label>* <?php echo lang('admin/owner_utility.issue_date'); ?> :</label>
                                         <input type="text" class="form-control" name="issue_date" value="<?= $utility_data->issue_date;?>">
                                         <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('issue_date')) {
             echo $validation->getError('issue_date'); }} ?></p>
                                         <div class="invalid-feedback">
                                         <?php echo lang('admin/owner_utility.e_issue_date'); ?>
                                                        </div>
                                    </div>
                                    
                                
                                </div>
                                <div class="d-flex mt-4">
                                <a href="<?php base_url() ?>/admin/ownerutilitylist" class="btn btn-outline-danger btn-rounded"><?php echo lang('admin/owner_utility.cancel'); ?></a>
                                  
                                    <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/owner_utility.update_info'); ?></button>
                                </div>
                                <?php }?>
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
  <script>
       $(document).ready(function(){

        $('#ddlFloorNo').change(function(){
            var value = $(this).val();
            var result = value.split('|');
            var floor_id = result[1];
             
                    $.ajax({
							url:"<?php echo base_url('admin/getunits'); ?>",
							method:"POST",
							data:{floor_id:floor_id},
							dataType:'json',
							success:function(data)
							{
								var html = '<option value="">--Select Unit--</option>';
								var i;
								for(i=0; i<data.length; i++){
							// console.log(data[i]);
							html += '<option  value="'+data[i].unitno+'|'+data[i].id+'">'+data[i].unitno+'</option>';
						
						}

						$('#ddlUnitNo').html(html);


					
                }
				});
             
        });
        $('#ddlUnitNo').change(function(){
            
            var value = $(this).val();
            var result = value.split('|');
            var unit_id = result[1];

                    $.ajax({
							url:"<?php echo base_url('admin/getowner'); ?>",
							method:"POST",
							data:{unit_id:unit_id},
							dataType:'json',
							success:function(data)
							{
                console.log(data);
								        var html = data.name;
                        var html2 = data.owner_id;
                                
                        
                        console.log(html);

                        $('#owner_id').val(html2);		
						            $('#owner_name').val(html);
                        $('#owner_name1').val(html);
                }
				});
             
        });


        $('#txtWaterBill').keyup(function(){
            
					var water_bill = $('#txtWaterBill').val();
                    if (water_bill == null || water_bill == "") {
                        water_bill= 0; 
                      }
                    var electric_bill = $('#txtElectricBill').val();
                    if (electric_bill == null || electric_bill == "") {
                        electric_bill= 0; 
                      }
                    var gas_bill = $('#txtGasBill').val();
                    if (gas_bill == null || gas_bill == "") {
                        gas_bill= 0; 
                      }
                    var security_bill = $('#txtSecurityBill').val();
                    if (security_bill == null || security_bill == "") {
                        security_bill= 0; 
                      }
                    var utility_bill = $('#txtUtilityBill').val();
                    if (utility_bill == null || utility_bill == "") {
                        utility_bill= 0; 
                      }
                    var other_bill = $('#txtOtherBill').val();
                    if (other_bill == null || other_bill == "") {
                        other_bill= 0; 
                      }
           var total_bills = parseFloat(water_bill) + parseFloat(electric_bill)+parseFloat(gas_bill)+parseFloat(security_bill)+parseFloat(utility_bill)+parseFloat(other_bill);
        
           $('#txtTotalRent').val(total_bills);
           $('#txtTotalRent1').val(total_bills);

       });
       $('#txtElectricBill').keyup(function(){
            
            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill= 0; 
              }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill= 0; 
              }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill= 0; 
              }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill= 0; 
              }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill= 0; 
              }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill= 0; 
              }
   var total_bills = parseFloat(water_bill) + parseFloat(electric_bill)+parseFloat(gas_bill)+parseFloat(security_bill)+parseFloat(utility_bill)+parseFloat(other_bill);

   $('#txtTotalRent').val(total_bills);
   $('#txtTotalRent1').val(total_bills);

});
$('#txtGasBill').keyup(function(){
            
            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill= 0; 
              }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill= 0; 
              }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill= 0; 
              }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill= 0; 
              }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill= 0; 
              }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill= 0; 
              }
   var total_bills = parseFloat(water_bill) + parseFloat(electric_bill)+parseFloat(gas_bill)+parseFloat(security_bill)+parseFloat(utility_bill)+parseFloat(other_bill);

   $('#txtTotalRent').val(total_bills);
   $('#txtTotalRent1').val(total_bills);

});
$('#txtSecurityBill').keyup(function(){
            
            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill= 0; 
              }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill= 0; 
              }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill= 0; 
              }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill= 0; 
              }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill= 0; 
              }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill= 0; 
              }
   var total_bills = parseFloat(water_bill) + parseFloat(electric_bill)+parseFloat(gas_bill)+parseFloat(security_bill)+parseFloat(utility_bill)+parseFloat(other_bill);

   $('#txtTotalRent').val(total_bills);
   $('#txtTotalRent1').val(total_bills);

});
$('#txtUtilityBill').keyup(function(){
            
            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill= 0; 
              }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill= 0; 
              }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill= 0; 
              }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill= 0; 
              }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill= 0; 
              }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill= 0; 
              }
   var total_bills = parseFloat(water_bill) + parseFloat(electric_bill)+parseFloat(gas_bill)+parseFloat(security_bill)+parseFloat(utility_bill)+parseFloat(other_bill);

   $('#txtTotalRent').val(total_bills);
   $('#txtTotalRent1').val(total_bills);

});
$('#txtOtherBill').keyup(function(){
            
            var water_bill = $('#txtWaterBill').val();
            if (water_bill == null || water_bill == "") {
                water_bill= 0; 
              }
            var electric_bill = $('#txtElectricBill').val();
            if (electric_bill == null || electric_bill == "") {
                electric_bill= 0; 
              }
            var gas_bill = $('#txtGasBill').val();
            if (gas_bill == null || gas_bill == "") {
                gas_bill= 0; 
              }
            var security_bill = $('#txtSecurityBill').val();
            if (security_bill == null || security_bill == "") {
                security_bill= 0; 
              }
            var utility_bill = $('#txtUtilityBill').val();
            if (utility_bill == null || utility_bill == "") {
                utility_bill= 0; 
              }
            var other_bill = $('#txtOtherBill').val();
            if (other_bill == null || other_bill == "") {
                other_bill= 0; 
              }
   var total_bills = parseFloat(water_bill) + parseFloat(electric_bill)+parseFloat(gas_bill)+parseFloat(security_bill)+parseFloat(utility_bill)+parseFloat(other_bill);

   $('#txtTotalRent').val(total_bills);
   $('#txtTotalRent1').val(total_bills);

});
       });
  </script>
<?php echo $this->endSection('content')?>