
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid"> 

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Income Histories</h4>
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
                        <div class="card mb-4">
                                <div class="card-body text-end">

                                    <a href="<?php echo base_url() ?>/admin/addnewincomepage" class="btn btn-primary">Add new income</a>
                                    <a href="<?php echo base_url() ?>/admin/" class="btn btn-primary">Export Income Data</a>
                                    <!-- <button type="button" id="addnewbtn" class="btn btn-primary">Add new income</button>
                                    <button type="button" id="addnewbtn" class="btn btn-primary">Export Income Data</button> -->

                                </div>
                            </div>
                                <!-- <form id="userform" action="<?//= base_url('admin/insertuser') ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <label>Search</label>
                                            <input type="text" class="form-control" id="name" name="name" >       
                                        </div>   
                                    </div>
                                </form> -->
                                <!-- id="tablemain" -->

                                <table class="table table-striped" id="datatable">
                                    <thead class="thead-dark">
                                        <tr>
                                       
                                        <th scope="col">User Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date</th>
                                        
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php foreach($data as $value):?>
                                        <tr>
                                            
                                            <td><?=$username?></td>
                                            
                                            <td><?=$value['account_number']?></td>
                                            <td><?= $value['categoryName']?></td>
                                            <td><?= $value['amount']?></td>
                                            <td>
                                            <a href="<?php echo base_url('Modules/IncomeModule/incomeuploads/' . $value['attachment']); ?>" download class="btn btn-success btn-sm">
                                            <i class="fa fa-download"></i>
                                            </a>
                                            </td>
                                            <td><?= $value['description']?></td>
                                            <td><?= $value['date']?></td>
                                            
                                                <td><a class="btn btn-danger btn-sm delete"  value="<?= $value['incomeId']?>" href="<?php echo base_url('admin/deleteincome/'.$value['incomeId'])?>">delete</a>

                                                <a class="btn btn-danger btn-sm edit"   value="<?= $value['incomeId']?>" href="<?php echo base_url('admin/editincome/'.$value['incomeId'])?>">edit</a></td>
                                                
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>

                        
                        
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
   
    $('#addnewbtn').click(function ()
    {
        // alert('hi');
        $('#bankmodal').modal('show');
       
        $('#save').click(function (e){
            e.preventDefault();

            var bank = $("#bank").val();
            
            $.ajax({
                type: 'POST',
                url: 'savebank',
                data: {
                    bank: bank,
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    window.location.reload();
                },
                
            });

        });
            
    });

    $('edit').click(function (event)
    {
        event.preventDefault();

        var id = $(this).attr('value');

        // alert(id);
        // console.log(id);

        $.ajax({

                url: "editbank",

                type: 'Post',

                data: {id : id}, 

                dataType: 'json',

                success: function(response){

                    console.log(response);
                    // $("#id").val(response.id);
                   
                    $("#bankid").val(response[0].bankid);
                    $("#bank").val(response[0].bank);
                    
                    $('#bankmodal').modal('show');
                },
            });
    });


    $('body').delegate("#save", "click" ,function (e){
            e.preventDefault();

            var bankid = $("#bankid").val();
            var bank = $("#bank").val();
            

            $.ajax({
                type: 'POST',
                url: 'updatebank/'+bankid,
                data: {
                    bank: bank,  
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    window.location.reload();
                },
                
        });
        
    });
});

</script>

<?php echo $this->endSection('content') ?>

