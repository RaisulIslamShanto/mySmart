<?php
    echo $this->include('\Modules\Master\Views\header');
    echo $this->include('\Modules\Master\Views\sidebar');
?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Home Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card quick_card">
                    <div class="card-body">
                        <h4 class="card-title text-white mb-4"> Quick Link</h4>
                        <div class="quick_link_list">
                            <a href="javascript:;"  data-bs-toggle="modal" data-bs-target="#addnewrent">
                                <span class="curcle_image">
                                <img src="<?php echo base_url() ?>/admin/assets/images/rent.png" class="img-fluid">
                                </span>
                                add new <br> Rent
                            </a>
                            <a href="<?php echo base_url() ?>/admin/tenant_add">
                            <span class="curcle_image">
                                <img src="<?php echo base_url() ?>/admin/assets/images/tenant.png" class="img-fluid">
                                </span>
                                add new <br> tenant
                            </a>
                            <a href="<?php echo base_url('admin/addbill'); ?>">
                                <span class="curcle_image">
                                <img src="<?php echo base_url() ?>/admin/assets/images/utilities.png" class="img-fluid">
                                </span>
                                add new <br> Bill
                            </a>
                            <a href="<?php echo base_url() ?>/admin/meeting_add">
                                <span class="curcle_image">
                                <img src="<?php echo base_url() ?>/admin/assets/images/workshop.png" class="img-fluid">
                                </span>
                                add new <br> Meeting
                            </a>
                            <a href="<?php echo base_url('admin/addnotice'); ?>">
                                <span class="curcle_image">
                                <img src="<?php echo base_url() ?>/admin/assets/images/notice.png" class="img-fluid">
                                </span>
                                add new <br> Notice
                            </a>
                            <a href="<?php echo base_url() ?>/admin/maintenance_add">
                                <span class="curcle_image">
                                <img src="<?php echo base_url() ?>/admin/assets/images/maintenance.png" class="img-fluid">
                                </span>
                                Maintenance <br> Cost
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-building-4-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Floor</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/floor_list')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-community-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Unit</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/unit_list')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-user-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Owner</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/ownerlist')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class=" ri-team-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Tenant</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/tenant_list')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-shield-user-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Employee</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/employeelist')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Committee</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/committee_list')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class=" ri-money-dollar-box-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Rent</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/rentlist')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class=" ri-scissors-cut-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Maintenance</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/maintenance_list')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="  ri-exchange-funds-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Fund</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/fundlist')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class=" ri-exchange-dollar-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Owner Utility</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/ownerutilitylist')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-secure-payment-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Employee Salary</p>
                                <h5 class="mb-3">0></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/employeesalary')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                        <i class="ri-question-answer-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Complain</p>
                                <h5 class="mb-3">0</h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> More Info <a href="<?php echo base_url('admin/complain_list')?>"><i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 style="display:flex;" class="card-title">Monthly Deposit Bill Graph For
                                <p class="year">&nbsp;Year&nbsp; </p>
                                <p class="half_year">&nbsp;6 month of year&nbsp;</p>
                                <p class="month">&nbsp;this month of year&nbsp;</p>
                                <?php echo date("Y"); ?></h5>
                            </div>
                            <div class="flex-shrink-0">
                                <div>
                                    <!-- <button type="button" class="btn btn-soft-secondary btn-sm">
                                        ALL
                                    </button> -->
                                    <button id="this_month_chart" type="button" class="btn btn-soft-primary btn-sm">
                                        1M
                                    </button>
                                    <button id="this_half_year_chart" type="button" class="btn btn-soft-secondary btn-sm">
                                        6M
                                    </button>
                                    <button id="this_year_chart" type="button" class="btn btn-soft-secondary btn-sm active">
                                        1Y
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div id="mixed-chart" class="apex-charts year_chart" ></div>
                            <div id="mixed-chart-half-year" class="apex-charts half_year_chart"></div>
                            <div id="mixed-chart-month" class="apex-charts month_chart"></div>

                        </div>
                    </div>
                    <!-- end card-body -->

                    <div class="card-body border-top">
                        <div class="text-muted text-center">
                            <div class="row">
                                <div class="col-4 border-end">
                                    <div>
                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-primary me-1"></i> Expenses</p>

                                        <h5 class="font-size-16 mb-0 year_maintenance">$ 0 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i> 0 %</span></h5>


                                    </div>
                                </div>
                                <div class="col-4 border-end">
                                    <div>
                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-light me-1"></i> Maintenance</p>

                                        <h5 class="font-size-16 mb-0 year_maintenance">$ 0 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>0 %</span></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-danger me-1"></i> Profit</p>
                                        <h5 class="font-size-16 mb-0 year_rents">$ 0 <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i>0%</span></h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->


            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"> Last 5 Complains</h4>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>

                                        <th scope="col">Title</th>
                                        <th scope="col">Issue Date</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php if(!empty($complains)){ foreach($complains as $complain){?>
                                    <tr>
                                        <td>
                                            <p class="mb-1 font-size-12"><?=$complain['comtitle'];?></p>
                                            <h5 class="font-size-15 mb-0"><?=$complain['comdate'];?></h5>
                                        </td>
                                        <td><?=$complain['comdate'];?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/complain_list'); ?>" class="view_complain btn btn-outline-success btn-sm"><i class="ri-eye-line"></i> </a>
                                        </td>
                                    </tr>

                                    <?php }
                                    }else{ ?>
                                        <h5 style="text-align: center;">There is no data Yet</h5>
                                <?php }?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Last 5 Visitor</h4>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>

                                        <th scope="col">Date</th>
                                        <th scope="col">Visitor name</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($complains)){ foreach($visitors as $visitor){?>
                                    <tr>

                                        <td>
                                            <h5 class="font-size-15 mb-0"><?=$visitor['visientrydate'];?> </h5>
                                        </td>
                                        <td><?=$visitor['visiname'];?></td>


                                        <td>
                                            <a href="<?php echo base_url('admin/visitor_list'); ?>"  class="view_visitor btn btn-outline-success btn-sm"><i class="ri-eye-line"></i> </a>
                                        </td>
                                    </tr>
                                    <?php }?>

                                </tbody>
                                <?php }else{ ?>
                                        <h5 style="text-align: center;">There is no data Yet</h5>
                                <?php }?>
                            </table>
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
</div>

<div class="fixed_background">
    <div  class="modal fade show d-block" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="py-4 text-center">
                    <h3 class="text-primary"><?php echo lang('admin/super_admin.Choose a'); ?>
                    <span class="text-dark"><?php echo lang('admin/super_admin.Package'); ?></span></h3>
                    <p><?php echo lang('admin/super_admin.Please select a package control our other option'); ?></p>
                </div>


                <div class="row px-4">
                    <?php $p=1; foreach($packages as $pakage){ ?>
                        <div class="col-md-4">
                            <div class="card package_price_item">
                                <div class="card-body">
                                    <div class="price-value">
                                        <span class="amount">$<?=$pakage['cost'];?>.00</span>
                                        <span class="duration">/
                                            <?php
                                            if($pakage['duration'] != 'other'){
                                                if($pakage['duration']>=12){
                                                    $duration= $pakage['duration']/12;
                                                    echo $duration." Years";
                                                }else{
                                                    echo $pakage['duration']." Months";
                                                }

                                            }else{
                                                if($pakage['d_m_y']==1){
                                                    $d_m_y = "Days";

                                                }else if($pakage['d_m_y']==2){
                                                    $d_m_y = "Months";

                                                }else if($pakage['d_m_y']==3){
                                                    $d_m_y = "Years";

                                                }

                                                echo $pakage['how_many']." ".$d_m_y;
                                            }
                                            ?></span>
                                    </div>
                                    <div class="pricingTable-header">
                                        <h3 class="title"><?=$pakage['pakage_title'];?></h3>

                                    </div>
                                    <ul class="pricing-content">
                                        <li><i class="ri-check-line"></i><?php echo lang('admin/super_admin.Property Limit :'); ?>
                                        <?=$pakage['property_limit']?></li>
                                        <li> <i class="ri-check-line"></i><?php echo lang('admin/super_admin.Employee Limit :'); ?>
                                        <?=$pakage['employee_limit']?></li>
                                    </ul>
                                    <div class="pricingTable-signup">
                                        <form action="<?=base_url('admin/payment/'.$pakage['id']);?>" method="post">
                                            <input type="hidden" name="owner_id" value="<?=$user_id?>">
                                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                                <?php echo lang('admin/super_admin.Use'); ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $p++; }?>

                </div>


            </div>
        </div>
    </div>
</div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>

</body>

</html>