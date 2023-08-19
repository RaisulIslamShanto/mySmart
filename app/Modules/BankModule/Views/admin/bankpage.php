
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>
<!-- <div class="page-content">
    <div> <?//php echo "Hello"?> </div>
    <div> <?//php echo "Hello"?> </div>

    

</div> -->
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">List Of Banks</h4>
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
                                    
                                    <button type="button" id="addnewbtn" class="btn btn-primary">Add new</button>

                                </div>
                            </div>
                                
                                <table class="table table-striped" id="datatable">
                                    <thead class="thead-dark">
                                        <tr>
                                       
                                        <th scope="col">Bank Name</th>
                                        
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($banktable as $value):?>
                                        <tr>
                                            
                                            <td><?= $value['bank']?></td>
                                            
                                                <td><a class="btn btn-danger btn-sm delete"  value="<?= $value['bankid']?>" href="<?php echo base_url('admin/deletebank/'.$value['bankid'])?>">delete</a>

                                                <a class="btn btn-danger btn-sm edit"   value="<?= $value['bankid']?>" href="">edit</a></td>
                                                
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>

                        <!-- modal -->
                        <div class="modal fade" id="bankmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Bank</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myform" action="" method="Post">
                                            <input type="hidden" id="bankid" value="">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" id="bank" name="bank" value="">
                                            </div>
                                            
                                            <button type="submit" id="save" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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

    $('.edit').click(function (event)
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

