<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<?php
  $edit= menu_access('meeting_edit');
  $delete= menu_access('meeting_delete');
  ?>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Meeting List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Meeting List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?php echo base_url() ?>/admin/meeting_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> Add Meeting    </a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4">Meeting List</h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col">Meeting Issue Date</th> 
                                        <th scope="col">Meeting Title</th>   
                                        <th scope="col">Action</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getMeetings as $meetings) : ?>
                                    <tr>
                                        <td><?= date_formats($meetings['meeissuedate']) ?></td>
                                        <td><?= $meetings['meetitle'] ?></td>   
                                        <td>
                                           <button type="button" class="btn btn-outline-warning btn-sm"
                                           id="meetignView" meeting-id="<?= $meetings['id']; ?>"><?php echo lang('Meeting.me_view'); ?></button>

                                           <?php if($edit){?>
                                           <a href="<?php echo base_url()?>/admin/meeting_edit/<?= $meetings['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('Meeting.me_edit'); ?></button>
                                           </a>
                                            <?php }if($delete){?>
                                           <a href="<?php echo base_url()?>/admin/meeting_delete/<?= $meetings['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('Meeting.me_delete'); ?></button>
                                           </a>
                                           <?php }?>
                                        </td>
                                    </tr>  
                                    <?php endforeach; ?>
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
    <div id="meetingModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('Meeting.meview_list'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="meetingData">
              
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
    $(function () {
        $(document).on("click", "#meetignView", function (){
            $('#meetingModal').modal('show');
            var meetingId = $(this).attr('meeting-id');
            console.log(meetingId);

            $.ajax({
                url : "<?php echo base_url()?>/admin/meeting_view/",
                data : {
                    meetingId : meetingId
                },
                dataType : "JSON",
                success : function(data){
                    var html = '';

                    html+='<p>'+data.meedescription+'</p>';
                    $('#meetingData').html(html);
                }
            });
        });
    });
</script>

<!-- end main content-->
<?= $this->endSection() ?>
