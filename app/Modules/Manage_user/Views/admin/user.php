
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
                    <h4 class="mb-sm-0">List of User</h4>
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
                                       
                                        <th scope="col">User ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">DATE CREATED</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($userdata as $value):?>
                                        <tr>
                                            
                                            <td><?= $value['userId']?></td>
                                            <td><?= $value['name']?></td>
                                            <td><?= $value['email']?></td>
                                            <td><?= $value['date']?></td>
                                            
                                              
                                                <td><a class="btn btn-danger btn-sm delete"   value="<?= $value['userId']?>" href="<?php echo base_url('/admin/deleteuser/'.$value['userId'])?>">delete</a>

                                                <a class="btn btn-danger btn-sm edit"  value="<?= $value['userId']?>" href="">edit</a></td>
                                                
                                            
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>

                        <!--add user modal -->
                        <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header"> 
                                        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?php $validation = \Config\Services::validation(); ?> 
                                        <form id="myform" action="" method="Post">
                                            <input type="hidden" id="userid" value="">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">User Name</label>
                                                <input type="text" class="form-control" id="username" name="name" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('name'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">User Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('email'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" class="form-control" id="password" name="password" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('password'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                                <input type="text" class="form-control" id="confirm_password" name="confirm_password" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('confirm_password'); ?>
                                                    </div>
                                                <?php }?>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?php $validation = \Config\Services::validation(); ?> 
                                        <form id="myform" action="" method="Post">
                                            <input type="text" id="updateuserid" value="">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">User Name</label>
                                                <input type="text" class="form-control" id="updateusername" name="name" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('name'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">User Email</label>
                                                <input type="text" class="form-control" id="updateemail" name="email" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('email'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" class="form-control" id="updatepassword" name="password" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('password'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                                <input type="text" class="form-control" id="updateconfirm_password" name="confirm_password" value="">
                                                <?php if($validation->getError('incomeCategory')) {?>
                                                <div style="color:red;">
                                                    <?= $error = $validation->getError('confirm_password'); ?>
                                                    </div>
                                                <?php }?>
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
        $('#usermodal').modal('show');

        $('#save').click(function (e){
            e.preventDefault();

            // var formData = new FormData(document.getElementById("myform"));
            
            var name = $("#username").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();

            $.ajax({
                type: 'POST',
                url: 'saveuser',
                data: {
                    name: name,
                    email: email,
                    password: password,
                    confirm_password: confirm_password,
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
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

                url: "edituser",

                type: 'GET',

                data: {id : id},

                dataType: 'json',

                success: function(response){

                    console.log(response);
                    // $("#id").val(response.id);
                    // console.log(response[0].userId)
                   
                    
                    $('#updateuserid').val(response[0].userId);
                    $("#updateusername").val(response[0].name);update
                    $("#updateemail").val(response[0].email);
                    $("#updatepassword").val(response[0].password);
                    $("#updateconfirm_password").val(response[0].confirm_password);

                    $('#updatemodal').modal('show');
                },
            });
    });


    $('body').delegate("#update", "click" ,function (e){
            e.preventDefault();

            var userId = $("#updateuserid").val();
            var name = $("#updateusername").val();
            var email = $("#updateemail").val();
            var password = $("#updatepassword").val();
            var confirm_password = $("#updateconfirm_password").val();

            console.log(name);
            console.log(email);
            console.log(password);
            console.log(password);

            // return;

            $.ajax({
                type: 'POST',
                url: 'updateuser/'+userId,
                data: {
                    name: name,
                    email: email,
                    password: password,
                    confirm_password: confirm_password,
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


