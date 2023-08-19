<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('Visitor.visitoradd_start'); ?></h4> 
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Visitor.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('Visitor.visitoradd_start'); ?></li>
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
                            <h4 class="card-title mb-4"> <?php echo lang('Visitor.visitor_start'); ?> </h4> 
                            
                            <form action="<?php echo base_url() ?>/admin/visitor_add" method="post" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Visitor.visi_entrydate'); ?></label>
                                        <input type="date" class="form-control" name="visi_entrydate" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('visi_entrydate');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('Visitor.visi_name'); ?></label>
                                        <input type="text" class="form-control" name="visi_name" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('visi_name');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('Visitor.visi_mobile'); ?></label>
                                        <input type="text" class="form-control" name="visi_mobile" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('visi_mobile');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label><?php echo lang('Visitor.visi_ads'); ?></label>
                                        <textarea class="form-control" name="visi_ads" required></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('visi_ads');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('Visitor.floor_id'); ?></label>
                                        <select id="floorId" name="floor_id" class="form-control" required> 
                                            <option value="">--Select Floor--</option>
                                            <?php foreach($getFloors as $floors) : ?>
                                                <option value="<?= $floors['id']; ?>"><?= $floors['floorno']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('floor_id');
                                        } ?>
                                        </small>
                                    </div>
                             
                                    <div class="col-md-6 mt-4">
                                        <label><?php echo lang('Visitor.unit_id'); ?></label>
                                        <select id="unitId" name="unit_id" class="form-control" required> 
                                            <option value="">--Select Unit--</option>
                                            <?php foreach($getUnits as $units) : ?>
                                                <option value="<?= $units['id']; ?>"><?= $units['unitno']; ?></option>
                                            <?php endforeach; ?>
                                         </select>
                                         <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('unit_id');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label> <?php echo lang('Visitor.visi_intime'); ?></label>
                                         <input type="text" class="form-control" name="visi_intime" value="" required>
                                         <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('visi_intime');
                                        } ?>
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label> <?php echo lang('Visitor.visi_outtime'); ?></label>
                                         <input type="text" class="form-control" name="visi_outtime" value="" required>
                                         <div class="valid-feedback">Looks good!</div>
                                        <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            echo $validation->getError('visi_outtime');
                                        } ?>
                                        </small>
                                    </div>
                                       
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-outline-danger btn-rounded"
                                    href="<?php echo base_url() ?>/admin/visitor_list"><?php echo lang('Visitor.cancel'); ?></a>
                                    <button type="submit" class="btn btn-primary ms-auto btn-rounded"><?php echo lang('Visitor.created'); ?></button>
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
    $(function() {
        $('#floorId').on("change", function() {
            var floorId = $(this).val();
            console.log(floorId);

            $.ajax({
            url:"<?php echo base_url('admin/getUnits'); ?>",
            method:"POST",
            data:{floorId:floorId},
            dataType:'JSON',
            success:function(data)
            {
console.log(data);
                    $('#unitId').html('');
                    $('#unitId').append('<option value="">--Select Unit--</option>');
                    for(i = 0; i < data.length; i++){
                        $('#unitId').append('<option value="' + data[i].unitno + '">' + data[i].unitno + '</option>');
                    }

                }
            });
        });
    });
</script>
<?= $this->endSection() ?>