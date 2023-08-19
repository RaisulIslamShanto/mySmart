
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
                    <h4 class="mb-sm-0">Update User: Sapnil</h4>
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
                   
                        <form id="userform" action="<?= base_url('admin/insertuser') ?>" method="POST"  class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                       


                                </div>
                                <div class="col-md-12 mt-4">
                                    <label>User Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_email'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_pass'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    
                                    <div class="invalid-feedback">
                                        <?php echo lang('admin/owner.e_pass'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4"> 
                                <button class="btn btn-primary ms-auto btn-rounded">Save</button>
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

<?php echo $this->endSection('content') ?>

<script>
    $(document).ready(function(){

        // 1st form
    $('#userform').on('submit', function (e){
        e.preventDefault();

       alert('hi');
        var formData = $(this).serializeArray();

        $.ajax({
            type: 'POST',
            url: 'admin/insertuser', 
            data: formData,
            dataType: 'json',
            success: function (response) {
                
                alert(response.message);
            },
            
        });
    });

//    pdf form
    $('#lanpdfile').on('submit', function(e){
        e.preventDefault();

                alert('hi');

                var formData = new FormData(this);
                console.log(formData);
                
                

                $.ajax({
                    url: 'lanfile', 
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        
                        alert(response.message);
                    },
                });
            });

            //  default button

    $('.def').click(function(e){
        e.preventDefault();

        

        var id = $(this).attr('value');
        alert(id);

        var allbutton =$('.def');
        allbutton.css('color', 'white');
        var button = $(this);
        button.css('color', 'black');
       
        
        

        $.ajax({
            url: 'makedefault', 
            type: 'POST',
            data: {"id":id},
            
            
            dataType: 'json',
            success: function (response) {
                
                alert(response.message);




            },
        });
    });

    





    });
    




</script>