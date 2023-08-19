<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>
<?php 
  $edit= menu_access('complain_edit');
  $delete= menu_access('complain_delete');
  ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?php echo lang('Complain.com_list'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Complain.golden_tower'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('Complain.com_list'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-end">
                    <a href="<?php echo base_url() ?>/admin/complain_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Complain.com_add'); ?> </a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title mb-4"><?php echo lang('Complain.com_list'); ?></h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('Complain.com_title'); ?></th>
                                    <th scope="col"><?php echo lang('Complain.com_date'); ?></th>
                                    <th scope="col"><?php echo lang('Complain.com_status'); ?></th>
                                    <th scope="col"><?php echo lang('Complain.com_assigned'); ?></th>
                                    <th scope="col"><?php echo lang('Complain.com_action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($getComplains)){

                                 
                                 foreach ($getComplains as $complains) : ?>
                                    <tr>
                                        <td><?= $complains['comtitle']; ?></td>
                                        <td><?= date_formats($complains['comdate']); ?></td>

                                        <?php if ($complains['comstatus'] == 'Pending') { ?>
                                            <td>
                                                <span class="badge bg-warning"><?= $complains['comstatus']; ?></span>
                                            </td>
                                        <?php } ?>
                                        <?php if ($complains['comstatus'] == 'In progress') { ?>
                                            <td>
                                                <span class="badge bg-info"><?= $complains['comstatus']; ?></span>
                                            </td>
                                        <?php } ?>
                                        <?php if ($complains['comstatus'] == 'On hold') { ?>
                                            <td>
                                                <span class="badge bg-danger"><?= $complains['comstatus']; ?></span>
                                            </td>
                                        <?php } ?>
                                        <?php if ($complains['comstatus'] == 'Completed') { ?>
                                            <td>
                                                <span class="badge bg-success"><?= $complains['comstatus']; ?></span>
                                            </td>
                                        <?php } ?>
                                        <?php if ($complains['comstatus'] == '') { ?>
                                            <td>
                                                <span>  </span>
                                            </td>
                                        <?php } ?>

                                        <td><?=$complains['name']?></td>

                                        <td>
                                            <button type="button" class="btn btn-outline-dark btn-sm" id="assignModal" employee-id="<?= $complains['id']; ?>"><?php echo lang('Complain.com_assigned'); ?></button>
                                            <button type="button" class="btn btn-outline-warning btn-sm" id="complainView" view-id="<?= $complains['id']; ?>"><?php echo lang('Complain.com_view'); ?></button>
                                            <?php if($edit){?>
                                            <a href="<?php echo base_url() ?>/admin/complain_edit/<?= $complains['id']; ?>">
                                                <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('Complain.com_edit'); ?></button>
                                            </a>
                                            <?php } if($delete){?>
                                            <a href="<?php echo base_url() ?>/admin/complain_delete/<?= $complains['id']; ?>">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><?php echo lang('Complain.com_delete'); ?></button>
                                            </a>
                                            <?php }?>

                                            <button type="button" class="btn btn-outline-info btn-sm solutionModal" complain-id="<?= $complains['id']; ?>"><?php echo lang('Complain.com_addsolution'); ?></button>
                                        </td>
                                    </tr>

                                <?php endforeach; }?>

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
<div id="complainModalView" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo lang('Complain.comhead_details'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="showDataView">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div id="assignedComplainModal" class="modal fade bs-example-modals" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabels" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabels"><?php echo lang('Complain.comheadass_details'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="assignComplain">
                <form action="" id="formData1">
                    <input type="hidden" id="employeeId" value="">
                    <div>
                        <label><?php echo lang('Complain.com_employee'); ?></label>
                        <select name="com_employee" id="comEmployee" class="form-control">

                        </select>
                    </div>
                    <br>
                    <button id="btn" class="btn btn-primary"><?php echo lang('Complain.com_assjob'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div id="addSolutionModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabels"><?php echo lang('Complain.com_sludetails'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formData">
                    <input type="hidden" id="complainId" value="">
                    <div class="mb-4">
                        <label><?php echo lang('Complain.com_sluStatus'); ?></label>
                        <select style="width:100%;" class="form-control" id="comStatus" name="com_status">
                            <option value="">---Select Status---</option>
                            <option value="Pending">Pending</option>
                            <option value="In progress">In progress</option>
                            <option value="On hold">On hold</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div>
                        <label><?php echo lang('Complain.com_slu'); ?></label>
                        <textarea class="form-control" id="comSolution" name="com_solution"></textarea>
                    </div>
                    <br>
                    <button id="submit" class="btn btn-primary"><?php echo lang('Complain.com_addslu'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {

        //Add Solution
        $(document).on("click", ".solutionModal", function() {
            $("#formData")[0].reset();
            $('#addSolutionModal').modal('show');

            var complainId = $(this).attr('complain-id');
            $('#complainId').val(complainId);

        });

        $(document).on("click", "#submit", function() {

            var comStatus = $('#comStatus').val();
            var comSolution = $('#comSolution').val();
            var comId = $('#complainId').val();

            $.ajax({
                url: "<?php echo base_url(); ?>/admin/complain_solution",
                type: "post",
                data: {
                    complainId: comId,
                    comStatus: comStatus,
                    comSolution: comSolution,
                },
                dataType: "JSON",
                success: function(data) {

                }
            });
        });

        //Assign Employee
        $(document).on("click", "#assignModal", function() {
            $("#formData1")[0].reset();
            $('#assignedComplainModal').modal('show');

            var employeeId = $(this).attr('employee-id');
            $('#employeeId').val(employeeId);

            $.ajax({
                url: "<?php echo base_url(); ?>/admin/get_employee",
                dataType: "JSON",
                success: function(data) {

                    var html = '';
                    html += $('#comEmployee').html("<option>--Select Employee--</option>");

                    for (i = 0; i < data.length; i++) {
                        $('#comEmployee').append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
                    };

                }
            });

        });

        $(document).on("click", "#btn", function() {

            var comId = $('#employeeId').val();
            var comEmployee = $('#comEmployee').val();
            console.log(comEmployee);

            $.ajax({
                url: "<?php echo base_url(); ?>/admin/assign_employee",
                type: "post",
                data: {
                    complainId: comId,
                    comEmployee: comEmployee,
                },
                dataType: "JSON",
                success: function(data) {

                }
            });
        });

        //Complain View
        $(document).on("click", "#complainView", function() {
            $('#complainModalView').modal('show');

            var viewId = $(this).attr('view-id');
            console.log(viewId);

            $.ajax({
                url: "<?php echo base_url(); ?>/admin/complain_view",
                data: {
                    viewId: viewId,
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);

                    var html = '';

                    html += '<h4><?= lang('Complain.comheadmain_details_info'); ?></h4><div class="row"><div class="col-md-6"> <b><?= lang('Complain.comview_date'); ?></b> ' + data.getComplains['comdate'] + '<br><b><?= lang('Complain.comview_title'); ?></b> ' + data.getComplains['comtitle'] + '<br><b><?= lang('Complain.comview_month'); ?></b> ' + data.getComplains['month'] + '<br><b><?= lang('Complain.comview_year'); ?></b> 2019<br><b><?= lang('Complain.comview_status'); ?></b> ' + data.getComplains['comstatus'] + '<br></div><div class="col-md-6"><b><?= lang('Complain.comview_des'); ?></b> ' + data.getComplains['comdescription'] + '<br></div></div><div class="row"><div class="col-xs-12"><h3><?= lang('Complain.comview_person'); ?></h3><div><?= lang('Complain.comview_complain'); ?>' + data.getComplains['name'] + ' <br><?= lang('Complain.comview_email'); ?>' + data.getComplains['email'] + ' <br><?= lang('Complain.comview_phone'); ?>' + data.getComplains['contactno'] + ' <br></div></div></div><div class="row" align="center"><div class="col-xs-12"><h3><?= lang('Complain.com_assjob'); ?></h3><div> ' + data.getComplains['name'] + ' </div></div></div><div class="row" align="center"><div class="col-xs-12"><h3 style="text-decoration:underline;"><?= lang('Complain.com_slu'); ?></h3><div></div></div></div>';

                    $('#showDataView').html(html);
                }
            });

        });

    });
</script>
<!-- end main content-->
<?= $this->endSection() ?>