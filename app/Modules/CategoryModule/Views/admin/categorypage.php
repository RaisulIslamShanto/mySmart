
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
                    <h4 class="mb-sm-0">Category Page</h4>
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
                                       
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Type</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($cattable as $value):?>
                                        <tr>
                                            
                                            <td><?= $value['categoryName']?></td>
                                            <td><?= $value['categoryType']?></td>
                                            
                                              
                                                <td><a class="btn btn-danger btn-sm delete"   value="<?= $value['categoryId']?>" href="<?php echo base_url('admin/deletecat/'.$value['categoryId'])?>">delete</a>

                                                <a class="btn btn-danger btn-sm edit"   value="<?= $value['categoryId']?>" href="">edit</a></td>
                                                
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>

                        <!--insert modal -->
                        <div class="modal fade" id="catmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myform" action="" method="Post">
                                            <!-- <input type="text" id="catid" value=""> -->
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="categoryName" name="categoryName" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Category Type</label>
                                                <select name="categoryType" id="categoryType" class="form-control" >
                                                    <option value="Income">Income</option>
                                                    <option value="Expense">Expense</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" id="categoryType" name="categoryType" value=""> -->
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

                        <!-- update modal -->
                        <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myform" action="" method="Post">
                                            <input type="hidden" id="catid" value="">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="categoryN" name="categoryName" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Category Type</label>
                                                    <select name="categoryType" id="categoryType" class="form-control" >
                                                        <option value="Income">Income</option>
                                                        <option value="Expense">Expense</option>
                                                    </select>
                                                <!-- <input type="text" class="form-control" id="categoryType" name="categoryType" value=""> -->
                                            </div>
                                            <button type="submit" id="update" class="btn btn-primary">Update</button>
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
        $('#catmodal').modal('show');
       

        $('#save').click(function (e){
            e.preventDefault();

            var categoryName = $("#categoryName").val();
            var categoryType = $("#categoryType").val();

            console.log(categoryType);

            $.ajax({
                type: 'POST',
                url: 'savecategory',
                data: {
                categoryName: categoryName,
                categoryType: categoryType
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    // window.location.reload();
                },
                
            });

        });
            
    });

    $('.edit').click(function(event)
    {
        event.preventDefault();

        var id = $(this).attr('value');

        // alert(id);
        // console.log(id);

        $.ajax({

                url: "editcat",

                type: 'Post',

                data: {id : id},

                dataType: 'json',

                success: function(response){
                    // alert(response[1]);
                    console.log(response);
                    // $("#id").val(response.id);
                    
                    $("#catid").val(response[0].categoryId);
                    $("#categoryN").val(response[0].categoryName);
                    $("#categoryType").val(response[0].categoryType);
                    
                    $('#updatemodal').modal('show');
                },
            });
    });


    $('body').delegate("#update", "click" ,function(e){
            e.preventDefault();

            var catId = $("#catid").val();
            var categoryName = $("#categoryName").val();
            var categoryType = $("#categoryType").val();
            
            $.ajax({
                type: 'POST',
                url: 'updatecat/'+catId,
                data:  {
                categoryName: categoryName,
                categoryType: categoryType
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

