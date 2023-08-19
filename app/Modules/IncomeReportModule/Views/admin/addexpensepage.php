
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add New Income</h4>
                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?//php echo lang('admin/owner.o_e_f'); ?></li>
                        </ol>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                    <?php $validation = \Config\Services::validation(); ?>
                        <form id="incomeform" action="submitincome" method="Post" >
                        <div class="form-group">
                            <label class="form-label">Income Category</label>
                            
                            <select class="form-control" name="incomeCategory" id="">
                                <option value="0">Select an income category</option>
                            <?//php foreach($languages as $value):?>
                                <option value="<?//= $value['id']?>"><?//= $value['languageName']?></option>
                            <?//php endforeach?>
                                
                            </select>
                            <?php if($validation->getError('incomeCategory')) {?>
                                <div style="color:red;">
                                <?= $error = $validation->getError('incomeCategory'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Select Bank Account</label>
                            
                            <select class="form-control" name="bankAccount" id="">
                                <option value="0">Select a bank account</option>
                            <?//php foreach($languages as $value):?>
                                <option value="<?//= $value['id']?>"><?//= $value['languageName']?></option>
                            <?//php endforeach?>
                                
                            </select>
                            <?php if($validation->getError('bankAccount')) {?>
                                <div  style="color:red;">
                                <?= $error = $validation->getError('bankAccount'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="form-label"  for="">Amount</label>
                            <input class="form-control" type="number" name="amount" id="">
                            <?php if($validation->getError('amount')) {?>
                                <div  style="color:red;">
                                <?= $error = $validation->getError('amount'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Reference</label>
                            <input class="form-control" type="text" name="reference" id="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Description</label>
                            <input class="form-control" type="text" name="description" id="">
                        </div>
                        <div class="form-group">
                            <label class="form-label"for="">Note</label>
                            <input class="form-control" type="text" name="note" id="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Add Attachment</label>
                            <input class="form-control" type="file" name="attachment" id="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Date</label>
                            <input class="form-control" type="date" name="date" id="">
                        </div>

                            <button class="btn btn-primary mt-4" type="submit" id="submit" >Add new Income</button>
                        </form>
                                


                        
                        
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
<script>
    
$(document).ready(function(){
   
    $('incomeform').on('submit', function (e)
    {
        e.preventDefault();
        // alert('hi');

        // var formData = new FormData(this);
        var formData = new FormData(this);   
            $.ajax({

                type: 'POST',
                url: 'submitincome',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',

                    success: function (response) {

                    alert(response.message);
                    
                    // window.location.href = "/incomepage";
                },
                
            });

        
            
    });

   
});

</script>

<?php echo $this->endSection('content') ?>

