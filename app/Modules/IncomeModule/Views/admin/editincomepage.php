
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Income</h4>
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

                     

                    <?php foreach($incomedata as $value):?>
                       
                        <form id="updateincomeform"   >
                            <input type="hidden" value="<?= $value['incomeId']?>" name="incomeId" id="incomeId"> 
                        <div class="form-group">
                            <label class="form-label">Income Category</label>
                            
                            <select class="form-control" name="incomeCategory" id="incomeCategory">
                                <!-- <option value="0">Select an income category</option> -->

                                <option value="<?= $value['incomeCategory']?>"><?= $value['categoryName']?></option>

                                <?php foreach($incomeCategories as $data):?>
                                    <option value="<?= $data['categoryId']?>"><?= $data['categoryName']?></option>
                                <?php endforeach?>
                                
                            </select>
                            <?php if($validation->getError('incomeCategory')) {?>
                                <div style="color:red;">
                                <?= $error = $validation->getError('incomeCategory'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Select Bank Account</label>
                            
                            <select class="form-control" name="bankAccount" id="bankAccount">
                                <!-- <option value="0">Select a bank account</option> -->
                            
                                
                                
                                <?php foreach($bankaccountno as $item):?>
                                    <option value="<?= $item['id']?>"><?= $item['account_number']?></option>
                                <?php endforeach?>
                                
                            </select>
                            <?php if($validation->getError('bankAccount')) {?>
                                <div  style="color:red;">
                                <?= $error = $validation->getError('bankAccount'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="form-label"  for="">Amount</label>
                            
                            <input class="form-control" type="number" name="amount" id="" value="<?= $value['amount']?>">
                            <?php if($validation->getError('amount')) {?>
                                <div  style="color:red;">
                                <?= $error = $validation->getError('amount'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Reference</label>
                            <input class="form-control" type="text" name="reference" id=""value="<?= $value['reference']?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Description</label>
                            <input class="form-control" type="text" name="description" id=""value="<?= $value['description']?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label"for="">Note</label>
                            <input class="form-control" type="text" name="note" id=""value="<?= $value['note']?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Add Attachment</label>
                            <input class="form-control" type="file" name="attachment" id=""value="<?= $value['attachment']?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Date</label>
                            <input class="form-control" type="date" name="date" id=""value="<?= $value['date']?>">
                        </div>

                            <button class="btn btn-primary mt-4" type="submit" id="submit" >Update Income</button>
                        </form>
                        <?php endforeach?> 


                        
                        
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
   
    $('#updateincomeform').on('submit', function (e)
    {
        e.preventDefault();
        var id = $('#incomeId').attr('value');
        console.log(id);
        alert(id);
        // alert('hi');

       
        // var formData = new FormData(this);
        var formData = new FormData(this);   
            $.ajax({

                type: 'POST',
                url: 'updateincome/'+id,
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',

                    success: function (response) {

                    alert(response.message);
                    
                    window.location.href = "<?php echo base_url() ?>/admin/incomepage";
                },
                
            });
            
    });
    // for showing income category
    // $.ajax({
    //         url: 'incomeCategory',
    //         type: 'GET', 
           
    //         dataType: 'json',
    //         success: function (data) {
                
    //             console.log(data);
    //             var selectOptions = '<option value="0">Select an income category</option>';

    //             // for (var i = 0; i < data.length; i++) {
    //             //     selectOptions += '<option value="' + data[i].id + '">' + data[i].catname + '</option>';
    //             // }
                
    //             for (var i = 0; i < data.length; i++) {
    //                 selectOptions += `<option value="${data[i].categoryId}">${data[i].categoryName}</option>`
    //             }


    //             $('#incomeCategory').html(selectOptions);
    //         },
            
    //     });

    // for showing bank account

    // alert("hi");
    // $.ajax({
    //         url: 'bankaccount',
    //         type: 'GET', 
           
    //         dataType: 'json',
    //         success: function (data) {
                
    //             console.log(data);
    //             var selectOptions = '<option value="0">Select an bank account</option>';

    //             // for (var i = 0; i < data.length; i++) {
    //             //     selectOptions += '<option value="' + data[i].id + '">' + data[i].catname + '</option>';
    //             // }
                
    //             for (var i = 0; i < data.length; i++) {
    //                 selectOptions += `<option value="${data[i].id}">${data[i].account_number}</option>`
    //             }


    //             $('#bankAccount').html(selectOptions);
    //         },
            
    //     });

    


    // $('#incomeCategory').on('click',function(){

    // // alert("hi");

    //     // var id = $(this).val();

    //     // alert("hi");
    //     // console.log(id);

    //     $.ajax({
    //         url: 'incomeCategory',
    //         type: 'GET', 
    //         // data: {languageId: id},
    //         dataType: 'json',
    //         success: function (data) {
                
    //             console.log(data);
    //             var selectOptions = '';

    //             // for (var i = 0; i < data.length; i++) {
    //             //     selectOptions += '<option value="' + data[i].id + '">' + data[i].catname + '</option>';
    //             // }
    //             for (var i = 0; i < data.length; i++) {
    //                 selectOptions += `<option value="${data[i].categoryId}">${data[i].categoryName}</option>`
    //             }


    //             $('#incomeCategory').html(selectOptions);
    //         },
            
    //     });

    // });
   
});

</script>

<?php echo $this->endSection('content') ?>

