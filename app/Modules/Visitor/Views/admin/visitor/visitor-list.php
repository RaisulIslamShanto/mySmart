<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php echo lang('Visitor.vis_list'); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('Visitor.golden_tower'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo lang('Visitor.vis_list'); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 text-end">
                        <a href="<?php echo base_url() ?>/admin/visitor_add" class="btn btn-primary btn-rounded waves-effect waves-light"><i class=" ri-menu-add-line me-1"></i> <?php echo lang('Visitor.vis_add'); ?>   </a>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4"><?php echo lang('Visitor.vis_list'); ?></h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo lang('Visitor.vis_date'); ?></th> 
                                        <th scope="col"><?php echo lang('Visitor.vis_name'); ?></th>  
                                        <th scope="col"><?php echo lang('Visitor.vis_mobile'); ?></th> 
                                        <th scope="col"><?php echo lang('Visitor.vis_ads'); ?></th>  
                                        <th scope="col"><?php echo lang('Visitor.vis_floorno'); ?></th>  
                                        <th scope="col"><?php echo lang('Visitor.vis_unitno'); ?></th>  
                                        <th scope="col"><?php echo lang('Visitor.vis_intime'); ?></th>  
                                        <th scope="col"><?php echo lang('Visitor.vis_outtime'); ?></th>  
                                        <th scope="col"><?php echo lang('Visitor.vis_action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($getVisitor)){                                    
                                    foreach($getVisitor as $visitor) : ?>
                                        <tr>
                                            <td><?= date_formats($visitor['visientrydate']); ?></td>
                                            <td><?= $visitor['visiname']; ?></td>  
                                            <td><?= $visitor['visimobile']; ?></td>
                                            <td><?= $visitor['visiads']; ?></td>
                                            <td><?= $visitor['floorno']; ?></td>
                                            <td><span class="badge bg-warning"><?= $visitor['unitno']; ?></span></td>
                                            <td><span class="badge bg-primary"><?= $visitor['visiintime']; ?></span></td>
                                            <td><span class="badge bg-danger"><?= $visitor['visiouttime']; ?></span></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>/admin/visitor_edit/<?= $visitor['id']; ?>">
                                                    <button type="button" class="btn btn-outline-success btn-sm"><?php echo lang('Visitor.vis_edit'); ?></button>
                                                </a>
                                                <a href="<?php echo base_url() ?>/admin/visitor_delete/<?= $visitor['id']; ?>">
                                                    <button type="button" class="btn btn-outline-danger btn-sm" ><?php echo lang('Visitor.vis_delete'); ?></button> 
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; } ?>           
                                     
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
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Owner Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <h4>Details Infromation</h4>
                    <div class="row">
                      <div class="col-md-6"> <b>Date :</b> 27/08/2019<br>
                        <b>Tittle :</b> Water Problem<br>
                        <b>Month :</b> August<br>
                        <b>Year :</b> 2019<br>
                        <b>Status :</b> Pending<br>
                        </div>
                        <div class="col-md-6">
                        <b>Description :</b> We need to solve water issue soon.<br>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Complain Person Details</h3>
                            <div>
                                Complain By : <br>
                                Name : <br>
                                Email : <br>
                                Phone : <br> 
                            </div>
                        </div>
                    </div>
                    <div class="row" align="center">
                        <div class="col-xs-12">
                            <h3>Assigned Complain</h3>
                            <div> John Sina (Security Gard ) </div>
                        </div> 
                    </div>
                    <div class="row" align="center">
                        <div class="col-xs-12">
                            <h3 style="text-decoration:underline;">Solution</h3>
                            <div></div>
                        </div> 
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

 
<!-- end main content-->
<?= $this->endSection() ?>
