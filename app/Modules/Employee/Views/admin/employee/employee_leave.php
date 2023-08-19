<?php echo $this->extend('\Modules\Master\Views\master')?>
<?php echo $this->section('content')?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('admin/employee_leave.e_l_r'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('admin/owner.Home'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('admin/employee_leave.e_l_r'); ?></li>
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
                            <h4 class="card-title mb-4"><?php echo lang('admin/employee_leave.l_r_l'); ?></h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr> 
                                        <th scope="col"><?php echo lang('admin/employee_leave.r_date'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/employee_leave.name'); ?> </th> 
                                        <th scope="col"><?php echo lang('admin/employee_leave.designation'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/employee_leave.d_o_l'); ?></th> 
                                        <th scope="col"><?php echo lang('admin/employee_leave.l_status'); ?></th>  
                                        <th scope="col"><?php echo lang('admin/employee_leave.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>  
                                  
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
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Employee Salary Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">  
                    <h4>Details Infromation</h4>
                    <div class="row">
                        <div class="col-xs-12"> <b>Name :</b> John Sina<br>
                            <b>Email :</b> johnsina@gmail.com<br>
                            <b>Phone :</b> +8801679110711<br>
                            <b>Designation :</b> Security Gard<br>
                            <b>Salary Month :</b> August<br>
                            <b>Salary Year :</b> 2019<br>
                            <b>Salary Per Month  : </b> $8000.00<br>
                            <b>Issue Date :</b> 05/09/2019<br>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- end main content-->
<?php echo $this->endSection('content')?>