<style>
    li.nshift {
        list-style: none;
        display: inline;
        padding: 20px 20px;
        border: 2px transparent;
        cursor: pointer;
    }

    li.nshift.active {
        border-bottom: solid blue;
    }
</style>

<div class="row">
    <div class="col-lg-12">

        <?php if ($getNotification['id'] <= 5) { ?>

            <form action="<?php echo base_url() ?>/admin/notification_update" id="emailUpdate">
                <input type="hidden" name="n_id" value="<?= $getNotification['id']; ?>">
                <div class="modal-body">
                    <ul class="new_class">
                        <li class="nshift active" attr="">
                            <i class="far fa-envelope"></i> <?php echo lang('setting/Notification_setup.nset_mail'); ?>
                        </li>
                    </ul>
                    <br>
                    <div class="form-group">
                        <label for="category_name"><?php echo lang('setting/Notification_setup.nset_mailview'); ?></label>
                        <small><?php echo lang('setting/Notification_setup.nset_smtagview'); ?></small>
                        <input type="text" class="form-control" name="mail_subject" value="<?= $getNotification['mailsub']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="category_name"><?php echo lang('setting/Notification_setup.nset_bodyview'); ?></label>
                        <textarea class="form-control summernote mail_content" name="mail_body"><?= $getNotification['mailbody']; ?></textarea>
                    </div><br>
                    <div class="form-group">
                        <?php
                        $val = $getNotification['mailtags'];
                        $str_arr = explode(",", $val);
                        ?>

                        <?php foreach ($str_arr as $value) { ?>
                            <a href="#" class="mb-5 btn btn-primary btn-sm add_item">{<?php echo $value ?>}</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('setting/Notification_setup.cancel'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('setting/Notification_setup.save'); ?></button>
                </div>
            </form>

        <?php } else { ?>
            <form action="<?php echo base_url() ?>/admin/notification_update" id="systemUpdate">
                <input type="hidden" name="n_id" value="<?= $getNotification['id']; ?>">
                <div class="modal-body">
                    <ul class="new_class">
                        <li class="nshift active" attr="">
                            <i class="far fa-envelope"></i> <?php echo lang('setting/Notification_setup.nset_sysview'); ?>
                        </li>
                    </ul>
                    <br>
                    <div class="form-group">
                        <label for="category_name"><?php echo lang('setting/Notification_setup.nset_mailview'); ?></label>
                        <small><?php echo lang('setting/Notification_setup.nset_smtagview'); ?></small>
                        <input type="text" class="form-control" name="mail_subject" value="<?= $getNotification['mailsub']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="category_name"><?php echo lang('setting/Notification_setup.nset_bodyview'); ?></label>
                        <textarea class="form-control summernote system_content" name="mail_body"><?= $getNotification['mailbody']; ?></textarea>
                    </div><br>
                    <div class="form-group">
                        <?php
                        $val = $getNotification['systags'];
                        $str_arr = explode(",", $val);
                        ?>

                        <?php foreach ($str_arr as $value) { ?>
                            <a href="#" class="mb-5 btn btn-primary btn-sm add_item">{<?php echo $value ?>}</a>
                        <?php } ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('setting/Notification_setup.cancel'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('setting/Notification_setup.save'); ?></button>
                </div>
            </form>
        <?php } ?>

        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<script>
    $(function() {
        //for adding action-----
        $('.add_item').click(function(e) {
            var a = $(this).text();
            console.log(a);

            if (a == '{app_logo}') {
                $('.summernote').summernote('pasteHTML', '<img src="<?= base_url()?>/uploads/empty_image.jpg" alt="app_logo" height="50px" style="border:1px solid black;">');
            } else {
                $('.summernote').summernote('editor.insertText', a);
            }

        });

        //update email
        $('#emailUpdate').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                data: request,
                type : 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#notificationModal').modal('hide');
                    $('#emailUpdate')[0].reset();
                }
            });
        });

        //update system
        $('#systemUpdate').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                data: request,
                type : 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#notificationModal').modal('hide');
                    $('#systemUpdate')[0].reset();
                }
            });
        });

    });
</script>