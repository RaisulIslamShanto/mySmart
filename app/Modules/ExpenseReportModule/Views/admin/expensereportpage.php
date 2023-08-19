
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Expense Report</h4>
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
                        
                                <form id="userform" action="<?= base_url('admin/insertuser') ?>" method="POST"  >
                                    <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" id="name" name="name" >       
                                        </div>   
                                        <div class="col-md-6 mt-4">
                                            <label>End Date</label>
                                            <input type="date" class="form-control" id="name" name="name" >       
                                        </div> 
                                        <div class="col-md-2 mt-4">
                                            <button type="submit" id="save" class="btn btn-danger">Filter</button> 
                                        </div> 
                                    </div>
                                </form>

                                <table class="table table-striped" id="tablemain">
                                    <thead class="thead-dark">
                                        <tr>
                                       
                                        <th scope="col">Expense Category</th>
                                        <th scope="col">Expense Amount</th>
                                        <th scope="col">Expense Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?//php foreach($banktable as $value):?>
                                        <tr>
                                            
                                            <td><?//= $value['bank']?></td>
                                            <td><?//= $value['bank']?></td>
                                            <td><?//= $value['bank']?></td>
                                            <td><?//= $value['bank']?></td>
                                            <td><?//= $value['bank']?></td>
                                            <td><?//= $value['bank']?></td>
                                            <td><?//= $value['bank']?></td>
                                            
                                               
                                                
                                        </tr>
                                        <?//php endforeach?>
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

