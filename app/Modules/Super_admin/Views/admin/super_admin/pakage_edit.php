<?= $this->extend('\Modules\Master\Views\master_super') ?>
<?= $this->section('content') ?>
 
<div class="page-content">
     <div class="container-fluid">
      <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> <?php echo lang('admin/super_admin.edit_pakage'); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo lang('admin/super_admin.edit_pakage'); ?></li>
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
                        <h4 class="card-title mb-4"><?php echo lang('admin/super_admin.pakage_edit_form'); ?></h4>

                        <form action="<?= base_url('admin/pakage_edit/'.$pakage['id']) ?>" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label>* <?php echo lang('admin/super_admin.pak_title'); ?>:</label>
                                    <input type="text" class="form-control" id="name" name="pakage_title" value="<?=$pakage['pakage_title']?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('pakage_title')) {
                                            echo $validation->getError('pakage_title');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_pak_title'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('admin/super_admin.pak_objective'); ?></label>
                                    <textarea id="elm1" name="pakage_objective" class="form-control" required><?=$pakage['pakage_objective']?></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('pakage_objective')) {
                                            echo $validation->getError('pakage_objective');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_pakage_objective'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/super_admin.duration'); ?> :</label>
                                    <select id="duration" name="duration" class="form-control" required>
                                        <option value="">--Select One--</option>
                                        <option value="1" <?php if($pakage['duration']==1){echo "Selected";}?>> 30 days</option>
                                        <option value="2" <?php if($pakage['duration']==2){echo "Selected";}?>> 2 Month</option>
                                        <option value="3" <?php if($pakage['duration']==3){echo "Selected";}?>> 3 Month</option>
                                        <option value="6" <?php if($pakage['duration']==6){echo "Selected";}?>> 6 Month</option>
                                        <option value="12" <?php if($pakage['duration']==12){echo "Selected";}?>>1 Years</option>
                                        
                                        <option value="other" <?php if($pakage['duration']=='other'){echo "Selected";}?>>Other</option>
                                    </select>

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('duration')) {
                                            echo $validation->getError('duration');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                       <?php echo lang('admin/super_admin.e_duration'); ?>
                                    </div>
                               
                                    
                                </div>

                                


                                <div class="col-md-6 mt-4">
                                    <label>* <?php echo lang('admin/super_admin.employee_limit'); ?> :</label>
                                    <input type="number" name="employee_limit" value="<?=$pakage['employee_limit']?>" class="form-control">
                                    

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('employee_limit')) {
                                            echo $validation->getError('employee_limit');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                    <?php echo lang('admin/super_admin.e_rmployee_limit'); ?>
                                    </div>
                                </div>

                              
                                <div class="col-md-6 mt-4">
                                    <label class="days_view" > How many :</label>
                                    <input id="how_many" class="days_view form-control" type="number" name="how_many" value="<?=$pakage['how_many']?>">
                                
                                </div>

                                <div class="col-md-6 mt-4">   
                                     <label class="days_view"> Select Type :</label>
                                    <select id="type_select" name="d_m_y" class="form-control days_view">
                                        <option value="">--Select One--</option>
                                        <option value="1" <?php if($pakage['d_m_y']==1){echo "Selected";}?>>days</option>
                                        <option value="2" <?php if($pakage['d_m_y']==2){echo "Selected";}?>>Month</option>
                                       
                                    </select>

                                </div>



                            

                                <div class="col-md-6 mt-4">
                                    <label>* Cost:</label>
                                    <input type="number" class="form-control" id="cost" name="cost" value="<?=$pakage['cost']?>" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('cost')) {
                                            echo $validation->getError('cost');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/super_admin.e_cost'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label>* Property Limit :</label>
                                    <input type="number" name="property_limit" value="<?=$pakage['property_limit']?>" class="form-control">

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('property_limit')) {
                                            echo $validation->getError('property_limit');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                      <?php echo lang('admin/super_admin.e_property_limit'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label> price Key :</label>
                                    <input id="how_many" class="form-control" type="text" name="price_key" value="<?=$pakage['price_key']?>">
                                
                                </div>

                            </div>
                            <div class="d-flex mt-4">
                                <a href="<?php echo base_url() ?>/admin/ownerlist" class="btn btn-outline-danger btn-rounded "><?php echo lang('admin/owner.cancel'); ?></a>
                                <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('admin/owner.updated'); ?></button>
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
 <script>
     <?php if($pakage['duration'] != 'other'){ ?>

            $(".days_view").css("display","none");
            $("#duration_days").css("display","none"); 

        <?php } ?>
    $(document).ready(function(){
        
        $('#duration').change(function(){

            var other_select = $(this).val();
            if(other_select=='other'){
            $(".days_view").css("display","block");
            $("#duration_days").css("display","block");
            }else{

                $(".days_view").css("display","none");
                $("#duration_days").css("display","none"); 
                $("#type_select").val('0');
                $("#how_many").val('0');
            }

        });

        $('#how_many').keyup(function(){
           var how_many = $(this).val();
           var type_select = $("#type_select").val();

           if(type_select =='' || type_select==1){
               if(how_many>365){
                alert("Sorry it should be less than 366");
                $("#how_many").val("");
               }
            
           }else if(type_select==2){
            if(how_many>12){
                alert("Sorry Month should be less than 13");
                $("#how_many").val("");
               }
           }

        });

        $('#type_select').change(function(){
           var how_many = $("#how_many").val();
           var type_select = $("#type_select").val();

           if(type_select==1){
               if(how_many>365){
                alert("Sorry it should be less than 366");
                $("#how_many").val("");
               }
            
           }else if(type_select==2){
            if(how_many>12){
                alert("Sorry Month should be less than 13");
                $("#how_many").val("")
               }
           }

        });
             
    });
 </script>
<?= $this->endSection() ?>