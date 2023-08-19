<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

<?php
  $edit= menu_access('userupdate');
  $delete= menu_access('userdelete');
?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('setting/User_setup.adminsetup_start'); ?> </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('setting/User_setup.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('setting/User_setup.usersetup_start'); ?></li>
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
                        <h4 class="card-title mb-4"> <?php echo lang('setting/User_setup.usersetup_add'); ?></h4>
                        <?php
                        if (isset($delete_success)) {
                            echo "<h4 style='color:red;text-align:center;'class='text-danger'>" . $delete_success . "</h4>";
                        }
                        if (isset($update_success)) {
                            echo "<h4 style='color:red;text-align:center;'class='text-danger'>" . $update_success . "</h4>";
                        }
                        if (isset($insert_success)) {
                            echo "<h4 style='color:red;text-align:center;'class='text-danger'>" . $insert_success . "</h4>";
                        }
                        if (isset($email_check)) {
                            echo "<h4 style='color:red;text-align:center;'class='text-danger'>" . $email_check . "</h4>";
                        }
                        
                        if (isset($faild_message)) {
                            echo '<div class="alert alert-danger text-center">' . $faild_message . '</div>';
                        }


                        ?>

                        <form action="<?php echo base_url('admin/adduser'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_email'); ?></label>
                                    <input type="email" class="form-control" name="email" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('email')) {
                                            echo $validation->getError('email');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Email is required.
                                    </div>
                                    <?php
                                    if (isset($email_check)) {
                                        echo "<p style='color:red;text-align:left;'class='text-danger'>" . $email_check . "</p>";
                                    }
                                    ?>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_name'); ?></label>
                                    <input type="text" class="form-control" name="name" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('name')) {
                                            echo $validation->getError('name');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_phone'); ?></label>
                                    <input type="text" class="form-control" name="contact_no" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('contact_no')) {
                                            echo $validation->getError('contact_no');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Contact No is required.
                                    </div>

                                </div>
                                <div class="col-md-6 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_pass'); ?></label>
                                    <input type="password" class="form-control" name="password" required>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('password')) {
                                            echo $validation->getError('password');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Password is required.
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_branch'); ?></label>
                                    <select name="branch" id="ddlBranch" class="form-control" required>
                                        <option value="">--Select Branch--</option>
                                        <option value="8">Home</option>
                                        <option value="7">Silver Tower</option>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('branch')) {
                                            echo $validation->getError('branch');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Branch is required.
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_type'); ?></label>
                                    <select name="user_type" id="ddlBranch" class="form-control" required>
                                        <option value="">--Select Type--</option>

                                        <?php
                                        foreach ($roles as $role) { ?>
                                            <option value="<?= $role['id']; ?>"><?= $role['role_name']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('user_type')) {
                                            echo $validation->getError('user_type');
                                        }
                                    } ?></p>
                                    <div class="invalid-feedback">
                                        Type is required.
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label><?php echo lang('setting/User_setup.user_image'); ?></label>
                                    <div class="poperty_image_upload">
                                        <input class="form-control--uploader" name="image" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                        <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('setting/User_setup.user_image'); ?> </span> </label>
                                        <img id="soutput" src="<?= base_url(); ?>/admin/assets/images/preview.jpg" class="img-fluid">
                                    </div>
                                </div>


                            </div>
                            <div class="d-flex mt-4">
                                <input type="reset" class="btn btn-warning btn-rounded" value="<?php echo lang('setting/User_setup.reset'); ?>" name="">
                                <button class="btn btn-primary ms-auto btn-rounded"><?php echo lang('setting/User_setup.created'); ?></button>
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

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('setting/User_setup.userlist_list'); ?></h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('setting/User_setup.userlist_photo'); ?></th>
                                    <th scope="col"><?php echo lang('setting/User_setup.userlist_name'); ?></th>
                                    <th scope="col"><?php echo lang('setting/User_setup.userlist_email'); ?></th>
                                    <th scope="col"><?php echo lang('setting/User_setup.userlist_phone'); ?></th>
                                    <th scope="col"><?php echo lang('setting/User_setup.userlist_branch'); ?></th>
                                    <th scope="col"><?php echo lang('setting/User_setup.userlist_action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $user) {
                                ?>
                                    <tr>

                                        <td><img class="rounded-circle avatar-xs" alt="200x200" src="
                                        <?php if(isset($user['image'])){ base_url(); ?>/admin/assets/user/thumbnail/<?php echo $user['image']; }else{ base_url();?>/admin/assets/user/thumbnail/empty_image.jpg <?php }?>" data-holder-rendered="true"></td>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['contactno']; ?></td>
                                        <td><?= $user['branch']; ?></td>
                                        <td>
                                            <button type="button" data-index="<?= $user['id'] ?>" class="view_user btn btn-outline-warning btn-sm"><?php echo lang('setting/User_setup.userlist_view'); ?></button>
                                            <?php if($edit){?>
                                            <a type="button" href="<?= site_url('admin/userupdate/' . $user['id']) ?>" class="btn btn-outline-success btn-sm"><?php echo lang('setting/User_setup.userlist_edit'); ?></a>
                                            <?php } if($delete){?>
                                            <a type="button" href="<?= site_url('admin/userdelete/' . $user['id']) ?>" class="btn btn-outline-danger btn-sm"><?php echo lang('setting/User_setup.userlist_delete'); ?></a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

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
<!--  Modal content for the above example -->
<div id="modal_show" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Admin Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="user_data">
                <!-- <div class="text-center">
                    <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">
                    <h3>John Peterson</h3>
                </div>
                <hr>
                <h4>Details Infromation</h4>
                <div class="row">
                    <div class="col-md-12">
                        Name : Tony<br>
                        Email : tony@yahoo.com<br>
                        Contact : +8801679110711<br>
                        Branch : Home<br>
                        Password : 123456<br>
                    </div>
                </div> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- end main content-->

<script>
    $(document).ready(function() {

        $(document).on("click", ".view_user", function() {

            var user_id = $(this).attr('data-index');

            $.ajax({
                url: "<?php echo base_url('admin/indivusualuser'); ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: 'JSON',
                success: function(data) {
                    var indivisual_user = data.user;
                    var user = indivisual_user[0];
                    var html = '';
                   
                    console.log(user['email']);

                    html = ' <div class="text-center"><img class="rounded-circle avatar-xl" alt="200x200" src="<?= base_url(); ?>/admin/assets/user/thumbnail/' + user['image'] + '" data-holder-rendered="true"><h3>' + user['name'] + '</h3></div><hr><h4><?= lang('setting/User_setup.userlist_detailsinfo'); ?></h4><div class="row"><div class="col-md-12"<?= lang('setting/User_setup.userlist_name'); ?>' + user['name'] + '<br><?= lang('setting/User_setup.userlist_email'); ?>' + user['email'] + '<br><?= lang('setting/User_setup.userlist_contact'); ?>' + user['contactno'] + '<br><?= lang('setting/User_setup.userlist_branch'); ?>' + user['branch'] + '<br><?= lang('setting/User_setup.userlist_pass'); ?>' + user['password'] + '<br><?= lang('setting/User_setup.userlist_type'); ?>' + user['role_name'] + '</div></div>';

                    $('#user_data').html(html);
                    $("#modal_show").modal("show");  


                }

            });

        });
    });
</script>
<?php echo $this->endSection('content') ?>