
<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= lang('admin/super_admin.Home Dashboard'); ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?= lang('admin/super_admin.Home'); ?></a></li>
                            <li class="breadcrumb-item active"><?= lang('admin/super_admin.Dashboard'); ?></li>
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

                        <h4 class="card-title text-white mb-4"><?= lang('admin/super_admin.Quick Link'); ?></h4>

                        <div class="quick_link_list">

                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addnewrent">
                                <span class="curcle_image">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/rent.png" class="img-fluid">
                                </span>
                                <?= lang('admin/super_admin.add new'); ?> <br> <?= lang('admin/super_admin.Rent'); ?>
                            </a>

                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addTenant">
                                <span class="curcle_image">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/tenant.png" class="img-fluid">
                                </span>
                                <?= lang('admin/super_admin.add new'); ?> <br> <?= lang('admin/super_admin.tenant'); ?>
                            </a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addBill">
                                <span class="curcle_image">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/utilities.png" class="img-fluid">
                                </span>
                                <?= lang('admin/super_admin.add new'); ?> <br> <?= lang('admin/super_admin.Bill'); ?>
                            </a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addMeeting">
                                <span class="curcle_image">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/workshop.png" class="img-fluid">
                                </span>
                                <?= lang('admin/super_admin.add new'); ?> <br> <?= lang('admin/super_admin.Meeting'); ?>
                            </a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addNotice">
                                <span class="curcle_image">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/notice.png" class="img-fluid">
                                </span>
                                <?= lang('admin/super_admin.add new'); ?> <br> <?= lang('admin/super_admin.Notice'); ?>
                            </a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addMaintenance">
                                <span class="curcle_image">
                                    <img src="<?php echo base_url() ?>/admin/assets/images/maintenance.png" class="img-fluid">
                                </span>
                                <?= lang('admin/super_admin.Maintenance'); ?> <br> <?= lang('admin/super_admin.Cost'); ?>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Floor'); ?></p>
                                <h5 class="mb-3"><?= $total_floors; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/floor_list') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Unit'); ?></p>
                                <h5 class="mb-3"><?= $total_units; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/unit_list') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Owner'); ?></p>
                                <h5 class="mb-3"><?= $total_owners; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/ownerlist') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Tenant'); ?></p>
                                <h5 class="mb-3"><?= $total_tenants; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2"> <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/tenant_list') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Employee'); ?></p>
                                <h5 class="mb-3"><?= $total_employees; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/employeelist') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Committee'); ?></p>
                                <h5 class="mb-3"><?= $total_committees; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                    <?= lang('admin/super_admin.More Info'); ?>
                                    <a href="<?php echo base_url('admin/committee_list') ?>">
                                    <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Rent'); ?></p>
                                <h5 class="mb-3"><?= $total_rents; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/rentlist') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Maintenance'); ?></p>
                                <h5 class="mb-3"><?= $total_maintenances; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/super_admin.Maintenance List') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Fund'); ?></p>
                                <h5 class="mb-3"><?= $total_funds; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                    <a href="<?php echo base_url('admin/fundlist') ?>">
                                    <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Owner Utility'); ?></p>
                                <h5 class="mb-3"><?= $total_o_utilitys; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                <a href="<?php echo base_url('admin/ownerutilitylist') ?>">
                                <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1">
                                <?= lang('admin/super_admin.Employee Salary'); ?></p>
                                <h5 class="mb-3"><?= $total_e_salaries; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                    <a href="<?php echo base_url('admin/employeesalary') ?>">
                                    <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <p class="mb-1"><?= lang('admin/super_admin.Total Complain'); ?></p>
                                <h5 class="mb-3"><?= $total_complains; ?></h5>
                                <p class="text-truncate mb-0"><span class="text-primary me-2">
                                <?= lang('admin/super_admin.More Info'); ?>
                                    <a href="<?php echo base_url('admin/complain_list') ?>">
                                    <i class="ri-arrow-right-up-line align-bottom ms-1"></i></a></span> </p>
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
                                <h5 style="display:flex;" class="card-title">
                                <?= lang('admin/super_admin.Monthly Deposit Bill Graph For'); ?>
                                    <p class="year">&nbsp;<?= lang('admin/super_admin.Year'); ?>&nbsp; </p>
                                    <p class="half_year">&nbsp;<?= lang('admin/super_admin.6 month of year'); ?>&nbsp;</p>
                                    <p class="month">&nbsp;<?= lang('admin/super_admin.this month of year'); ?>&nbsp;</p>
                                    <?php echo date("Y"); ?>
                                </h5>
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
                            <div id="mixed-chart" class="apex-charts year_chart"></div>
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
                                        <p class="mb-2">
                                        <i class="mdi mdi-circle font-size-12 text-primary me-1"></i>
                                        <?= lang('admin/super_admin.Expenses'); ?>
                                    </p>

                                        <h5 class="font-size-16 mb-0 year_maintenance">$ <?= $year_maintenance_costs ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_maintenance = $year_maintenance_costs / 100;
                                                                                                                                                                                                            echo $percentage_maintenance; ?> %</span></h5>

                                        <h5 class="font-size-16 mb-0 half_year_maintenance">$ <?= $half_year_maintenance_costs ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_maintenance_half_year = $half_year_maintenance_costs / 100;
                                                                                                                                                                                                                        echo $percentage_maintenance_half_year; ?> %</span></h5>

                                        <h5 class="font-size-16 mb-0 month_maintenance">$ <?= $maintenance_costs_this_month ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_maintenance_this_month = $maintenance_costs_this_month / 100;                                                                                                                     echo $percentage_maintenance_this_month; ?> %</span></h5>
                                    </div>
                                </div>
                                <div class="col-4 border-end">
                                    <div>
                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-light me-1"></i>
                                        <?= lang('admin/super_admin.Maintenance'); ?></p>

                                        <h5 class="font-size-16 mb-0 year_maintenance">$ <?= $year_maintenance_costs ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_maintenance = $year_maintenance_costs / 100;
                                                                                                                                                                                                            echo $percentage_maintenance; ?> %</span></h5>

                                        <h5 class="font-size-16 mb-0 half_year_maintenance">$ <?= $half_year_maintenance_costs ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_maintenance_half_year = $half_year_maintenance_costs / 100;
                                                                                                                                                                                                                        echo $percentage_maintenance_half_year; ?> %</span></h5>

                                        <h5 class="font-size-16 mb-0 month_maintenance">$ <?= $maintenance_costs_this_month ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_maintenance_this_month = $maintenance_costs_this_month / 100;
                                                                                                                                                                                                                    echo $percentage_maintenance_this_month; ?> %</span></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="mb-2"><i class="mdi mdi-circle font-size-12 text-danger me-1"></i>
                                        <?= lang('admin/super_admin.Profit'); ?></p>
                                        <h5 class="font-size-16 mb-0 year_rents">$ <?= $year_rents ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_rents = $year_rents / 100;
                                                                                                                                                                                            echo $percentage_rents; ?> %</span></h5>

                                        <h5 class="font-size-16 mb-0 half_year_rents">$ <?= $half_year_rents ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_rents_half_year = $half_year_rents / 100;
                                                                                                                                                                                                    echo $percentage_rents_half_year; ?> %</span></h5>

                                        <h5 class="font-size-16 mb-0 month_rents">$ <?= $rent_all_this_month ?> <span class="text-success font-size-12"><i class="mdi mdi-menu-up font-size-14 me-1"></i><?php $percentage_rents_this_month = $rent_all_this_month / 100;
                                                                                                                                                                                                    echo $percentage_rents_this_month; ?> %</span></h5>

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
                        <h4 class="card-title mb-4"> <?= lang('admin/super_admin.Last 5 Complains'); ?></h4>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col"><?= lang('admin/super_admin.Title'); ?></th>
                                        <th scope="col"><?= lang('admin/super_admin.Issue Date'); ?></th>
                                        <th scope="col"><?= lang('admin/super_admin.Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($complains)) {
                                        foreach ($complains as $complain) { ?>
                                            <tr>
                                                <td>
                                                    <p class="mb-1 font-size-12"><?= $complain['comtitle']; ?></p>
                                                    <h5 class="font-size-15 mb-0"><?= $complain['comdate']; ?></h5>
                                                </td>
                                                <td><?= $complain['comdate']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/complain_list'); ?>" class="view_complain btn btn-outline-success btn-sm"><i class="ri-eye-line"></i> </a>
                                                </td>
                                            </tr>

                                        <?php }
                                    } else { ?>
                                        <h5 style="text-align: center;">There is no data Yet</h5>
                                    <?php } ?>

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
                        <h4 class="card-title mb-4"><?= lang('admin/super_admin.Last 5 Visitor'); ?></h4>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col"><?= lang('admin/super_admin.Date'); ?></th>
                                        <th scope="col"><?= lang('admin/super_admin.Visitor name'); ?></th>
                                        <th scope="col"><?= lang('admin/super_admin.Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($complains)) {
                                        foreach ($visitors as $visitor) { ?>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-15 mb-0"><?= $visitor['visientrydate']; ?> </h5>
                                                </td>
                                                <td><?= $visitor['visiname']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/visitor_list'); ?>" class="view_visitor btn btn-outline-success btn-sm"><i class="ri-eye-line"></i> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                </tbody>
                            <?php } else { ?>
                                <h5 style="text-align: center;">There is no data Yet</h5>
                            <?php } ?>
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

<!-- add new rent  -->
<div class="modal fade" id="addnewrent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form class="modal-content" method="POST" action="<?php echo base_url(); ?>/rent">

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= lang('admin/super_admin.Add New Rent'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/owner_utility.floor_no'); ?></label>
                        <select name="floor_name" id="ddlFloorNo" class="form-control mb-2">
                            <option value="">--Select Floor--</option>
                            <option value="1">2nd</option>
                            <option value="2">3rd</option>
                            <option value="3">4th</option>
                        </select>
                        <button type="button" class="btn badge bg-primary rounded-pill show_addFloor">
                        <?php echo lang('Floor.floor_add'); ?></button>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('Unit.unit_no'); ?></label>
                        <select name="unit_no" id="ddlUnitNo" class="form-control mb-2">
                            <option value="">--Select Unit--</option>
                            <option value="">2a </option>
                            <option value="">2b</option>
                            <option value="">2c</option>
                            <option value="">2d</option>
                        </select>
                        <button type="button" class="btn badge bg-primary rounded-pill show_addUnit">
                            <?php echo lang('Unit.unit_add'); ?>
                        </button>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label> <?php echo lang('admin/rent.s_r_m'); ?></label>
                        <select name="month" id="ddlMonth" class="form-control mb-2">
                            <option value="">--Select Rent Month--</option>
                            <option value="1">January</option>
                            <option value="2">Feburay</option>
                        </select>
                        <button type="button" class="btn badge bg-primary rounded-pill show_addMonth">
                            <?php echo lang('admin/rent.add_month'); ?>
                        </button>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.s_r_y'); ?> </label>
                        <select name="year" id="ddlYear" class="form-control mb-2">
                            <option value="">--Select Rent Year--</option>
                            <option value="1">2022</option>
                            <option value="1">2023</option>
                        </select>
                        <button type="button" class="btn badge bg-primary rounded-pill show_addYear">
                            <?php echo lang('admin/rent.add_year'); ?>
                        </button>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.r_name'); ?></label>
                        <input type="hidden" id="tenent_id" name="tenent_id" value="">
                        <input type="hidden" id="tenent_image" name="tenent_image" value="">
                        <input type="hidden" id="renter_name" name="renter_name" value="">
                        <input type="text" id="renter_name2" value="" class="form-control" name="" disabled="">

                        <p class="text-danger">
                            <?php
                                if (isset($validation)) {
                                    if ($validation->hasError('renter_name')) {
                                        echo $validation->getError('renter_name');
                                    }
                                }
                            ?>
                        </p>

                        <div class="invalid-feedback">
                            <?php echo lang('admin/rent.e_r_n'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.rent'); ?> :</label>
                        <input type="hidden" id="all_rent" name="rent" value="">
                        <input type="text" class="form-control" id="all_rent2" value="" disabled="">
                        <p class="text-danger">
                            <?php
                                if (isset($validation)) {
                                    if ($validation->hasError('rent')) {
                                        echo $validation->getError('rent');
                                    }
                                }
                            ?>
                        </p>
                        <div class="invalid-feedback">
                            <?php echo lang('admin/rent.e_rent'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.w_b'); ?> :</label>
                        <div class="input-group">
                            <input type="text" name="water_bill" value="0.00" id="txtWaterBill" class="form-control">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.e_b'); ?> :</label>
                        <div class="input-group">
                            <input type="text" name="electric_bill" value="0.00" id="txtElectricBill" class="form-control">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.g_b'); ?> :</label>
                        <div class="input-group">
                            <input type="text" name="gas_bill" value="800" id="txtGasBill" class="form-control">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.s_b'); ?> :</label>
                        <div class="input-group">
                            <input type="text" name="security_bill" value="900" id="txtSecurityBill" class="form-control">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.U_bill'); ?> :</label>
                        <div class="input-group">
                            <input type="text" name="utility_bill" value="0.00" id="txtUtilityBill" class="form-control">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.o_bill'); ?> :</label>
                        <div class="input-group">
                            <input type="text" name="other_bill" value="0.00" id="txtOtherBill" class="form-control">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.total_rent'); ?> :</label>
                        <div class="input-group">
                            <input type="hidden" name="total_rent" id="txtTotalRent1" value="">
                            <input type="text" name="txtTotalRent" value="1700.00" id="txtTotalRent" class="form-control" disabled="">
                            <div class="input-group-text"><?php symbol(); ?></div>
                        </div>

                        <p class="text-danger">
                            <?php
                                if (isset($validation)) {
                                    if ($validation->hasError('total_rent')) {
                                        echo $validation->getError('total_rent');
                                    }
                                }
                            ?>
                        </p>
                        <div class="invalid-feedback">
                            <?php echo lang('admin/rent.e_t_r'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label>* <?php echo lang('admin/rent.issue_date'); ?> :</label>
                        <input type="date" class="form-control" name="issue_date">
                        <p class="text-danger">
                            <?php
                                if (isset($validation)) {
                                    if ($validation->hasError('issue_date')) {
                                        echo $validation->getError('issue_date');
                                    }
                                }
                            ?>
                        </p>
                        <div class="invalid-feedback">
                            <?php echo lang('admin/rent.e_i_date'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.b_p_d'); ?> :</label>
                        <input type="date" class="form-control" name="bill_paid_date">
                        <p class="text-danger">
                            <?php
                                if (isset($validation)) {
                                    if ($validation->hasError('bill_paid_date')) {
                                        echo $validation->getError('bill_paid_date');
                                    }
                                }
                            ?>
                        </p>
                        <div class="invalid-feedback">
                            <?php echo lang('admin/rent.e_b_p_d'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <label><?php echo lang('admin/rent.b_s'); ?> :</label>
                        <select name="bill_status" id="ddlBillStatus" class="form-control">
                            <option value="2">Due</option>
                            <option value="1">Paid</option>
                        </select>
                        <p class="text-danger">
                            <?php
                                if (isset($validation)) {
                                    if ($validation->hasError('bill_status')) {
                                        echo $validation->getError('bill_status');
                                    }
                                }
                            ?>
                        </p>
                        <div class="invalid-feedback">
                            <?php echo lang('admin/rent.e_b_s'); ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('admin/rent.cancel'); ?></button>
                <button type="submit" class="btn btn-primary submitRent"><?php echo lang('admin/rent.created'); ?></button>
            </div>
        </form>
    </div>
</div>
<!-- end new rent  -->


<!-- add new Floor  -->

<div class="modal fade" id="addFloor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Floor.floor_add'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label><?php echo lang('Floor.floor_no'); ?></label>
                <input type="text" class="form-control" name="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Floor.cancel'); ?></button>
                <button type="button" class="btn btn-primary submitFloor"><?php echo lang('Floor.created'); ?></button>
            </div>
        </form>
    </div>
</div>

<!-- end new Floor  -->

<!-- add new Floor  -->

<div class="modal fade" id="addUnit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Unit.unit_add'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-4">
                    <label><?php echo lang('Unit.floor_no'); ?></label>
                    <select name="floor_id" class="form-control mb-2" required="">
                        <option value="">--Select Floor--</option>
                        <option value="12">2a</option>
                    </select>
                    <button type="button" class="btn badge bg-primary rounded-pill show_addFloor">+ <?php echo lang('Floor.floo_add'); ?></button>
                </div>

                <div class="mb-4">
                    <label><?php echo lang('Unit.unit_no'); ?></label>
                    <input type="text" class="form-control" name="unit_no" required="">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                <button type="button" class="btn btn-primary submitUnit"><?php echo lang('Unit.created'); ?></button>
            </div>

        </form>
    </div>
</div>
<!-- end new Floor  -->

 <!-- add new show_addMonth  -->

 <div class="modal fade" id="addMonths" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('admin/rent.add_month'); ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <div class="mb-4">
                     <label><?php echo lang('admin/owner_utility.m_n'); ?></label>
                     <input type="text" class="form-control" name="month_name" required="">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submitmonth"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- end new month  -->
 <!-- add new show_addMonth  -->

 <div class="modal fade" id="addYear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('admin/rent.add_year'); ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <div class="mb-4">
                     <label><?php echo lang('setting/Year_setup.yearlist_name'); ?></label>
                     <input type="text" class="form-control" name="year" required="">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submityear"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- end new month  -->

 <!-- New Tenant -->
 <div class="modal fade" id="addTenant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Tenant.tenant_add'); ?>  </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.te_name'); ?></label>
                         <input type="text" class="form-control" name="te_name" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger">
                             <?php if (isset($validation)) {
                                    echo $validation->getError('te_name');
                                } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.te_email'); ?></label>
                         <input type="email" class="form-control" name="te_email" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_email');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.te_password'); ?></label>
                         <input type="password" class="form-control" name="te_password" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger">
                             <?php if (isset($validation)) {
                                    echo $validation->getError('te_password');
                                } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.te_contrctno'); ?></label>
                         <input type="number" class="form-control" name="te_contrctno" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_contrctno');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label><?php echo lang('Tenant.te_ads'); ?></label>
                         <textarea name="te_ads" class="form-control" required></textarea>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_ads');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.floo_add'); ?></label>
                         <input type="number" class="form-control" name="te_nid" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_nid');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.floor_no'); ?></label>
                         <select name="floor_no" id="floorId" class="form-control mb-3" required>
                             <option value=""> --Select Floor-- </option>

                         </select>
                         <button type="button" class="btn badge bg-primary rounded-pill show_addFloor">
                            <?php echo lang('Floor.floo_add'); ?></button>

                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('floor_no');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.unit_no'); ?></label>
                         <select name="unit_no" id="unitId" class="form-control mb-3" required>
                             <option value=""> --Select Unit-- </option>
                         </select>
                         <button type="button" class="btn badge bg-primary rounded-pill show_addUnit">
                            <?php echo lang('Unit.unit_add'); ?> </button>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger">
                             <?php if (isset($validation)) {
                                    echo $validation->getError('unit_no');
                                } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.te_advancerent'); ?></label>
                         <div class="input-group">
                             <input type="number" name="te_advancerent" value="" class="form-control" required>
                             <div class="input-group-text"><?php symbol(); ?></div>
                             <div class="valid-feedback">Looks good!</div>
                             <small class="text-danger"><?php if (isset($validation)) {
                                                            echo $validation->getError('te_advancerent');
                                                        } ?>
                             </small>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Tenant.te_rentpermonth'); ?></label>
                         <div class="input-group">
                             <input type="text" name="te_rentpermonth" value="" class="form-control" required>
                             <div class="input-group-text"><?php symbol(); ?></div>
                             <div class="valid-feedback">Looks good!</div>
                             <small class="text-danger"><?php if (isset($validation)) {
                                                            echo $validation->getError('te_rentpermonth');
                                                        } ?>
                             </small>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label> <?php echo lang('Tenant.te_issuedate'); ?></label>
                         <input type="date" name="te_issuedate" value="" class="form-control" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_issuedate');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label> <?php echo lang('Tenant.te_rentmonth'); ?></label>
                         <select name="te_rentmonth" class="form-control mb-3" required>
                             <option value="">--Select Month--</option>

                         </select>
                         <button type="button" class="btn badge bg-primary rounded-pill show_addUnit">
                            + <?php echo lang('admin/rent.add_month'); ?> </button>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_rentmonth');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label> <?php echo lang('Tenant.te_rentyear'); ?></label>
                         <select name="te_rentyear" class="form-control  mb-3" required>
                             <option value="">--Select Year--</option>

                         </select>
                         <button type="button" class="btn badge bg-primary rounded-pill show_addUnit">
                            + <?php echo lang('admin/rent.add_year'); ?>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_rentyear');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label> <?php echo lang('Tenant.te_status'); ?></label>
                         <select name="te_status" class="form-control" required>
                             <option selected="" value="1">Active</option>
                             <option value="0">In-Active</option>
                         </select>
                         <div class="valid-feedback">Looks good!</div>
                         <small class="text-danger"><?php if (isset($validation)) {
                                                        echo $validation->getError('te_status');
                                                    } ?>
                         </small>
                     </div>
                     <div class="col-md-3 mt-4">
                         <label><?php echo lang('Tenant.te_ownerphoto'); ?></label>
                         <div class="card">
                             <div class="poperty_image_upload">
                                 <input class="form-control--uploader" name="te_ownerphoto" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">
                                 <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('Tenant.te_uploadphoto'); ?> </span> </label>
                                 <img id="soutput" src="<?php echo base_url() ?>/admin/assets/images/preview.jpg" class="img-fluid" />
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submitTenant"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- End New Tenant -->

 <!-- New addBill -->
 <div class="modal fade" id="addBill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('admin/bill_deposit.a_n_bill'); ?> </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.b_type'); ?> :</label>
                         <select name="bill_type" id="bill_type" class="form-control" required>
                             <option value="">--Select Type--</option>
                         </select>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('bill_type')) {
                                                                            echo $validation->getError('bill_type');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_bill_type'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.b_d_d'); ?> :</label>
                         <input type="date" class="form-control" name="bill_date" required>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('bill_date')) {
                                                                            echo $validation->getError('bill_date');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_b_d_d'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.b_month'); ?> :</label>
                         <select name="month" id="ddlBillMonth" class="form-control" required>
                             <option value="">--Select Month--</option>

                         </select>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('month')) {
                                                                            echo $validation->getError('month');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_month'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.b_year'); ?> :</label>
                         <select name="year" id="ddlBillYear" class="form-control" required>
                             <option value="">--Select Year--</option>

                         </select>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('year')) {
                                                                            echo $validation->getError('year');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_year'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.total_amount'); ?> :</label>
                         <div class="input-group">
                             <input type="number" name="total_amount" value="" id="txtTotalAmount" class="form-control" required>
                             <div class="input-group-text"><?php symbol(); ?></div>

                         </div>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('total_amount')) {
                                                                            echo $validation->getError('total_amount');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_total_amount'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.d_b_n'); ?> :</label>
                         <input type="text" class="form-control" name="bank_name" required>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('bank_name')) {
                                                                            echo $validation->getError('bank_name');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_d_b_n'); ?>
                         </div>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label>* <?php echo lang('admin/bill_deposit.details'); ?> :</label>
                         <textarea class="form-control" name="details" required></textarea>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('details')) {
                                                                            echo $validation->getError('details');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/bill_deposit.e_d'); ?>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submitTenant"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- End addBill -->

 <!-- New addMeeting -->
 <div class="modal fade" id="addMeeting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Meeting.me_add'); ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-12 mt-4">
                         <label><?php echo lang('Meeting.mee_issuedate'); ?></label>
                         <input type="date" class="form-control" name="mee_issuedate" value="" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('mee_issuedate');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label><?php echo lang('Meeting.mee_title'); ?></label>
                         <input type="text" class="form-control" name="mee_title" value="" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('mee_title');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label><?php echo lang('Meeting.mee_description'); ?></label>
                         <textarea id="elm1" class="form-control" name="mee_description" required></textarea>
                     </div>
                     <div class="valid-feedback">Looks good!</div>
                     <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        echo $validation->getError('mee_description');
                                                                    } ?>
                     </small>

                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submitTenant"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- End addMeeting -->
 <!-- New addNotice -->
 <div class="modal fade" id="addNotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('admin/notice.add_new_notice'); ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-12 mt-4">
                         <label>* <?php echo lang('admin/notice.n_title'); ?> :</label>
                         <input type="text" class="form-control" name="title" required>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('title')) {
                                                                            echo $validation->getError('title');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/notice.e_title'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/notice.n_date'); ?> :</label>
                         <input type="text" class="form-control" name="date" required>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('date')) {
                                                                            echo $validation->getError('date');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/notice.e_date'); ?>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/notice.n_status'); ?> :</label>
                         <select name="status" id="ddlNoticeStatus" class="form-control" required>
                             <option value="1">Publish Now</option>
                             <option value="0">Disable</option>
                         </select>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('status')) {
                                                                            echo $validation->getError('status');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/notice.e_status'); ?>
                         </div>

                     </div>
                     <div class="col-md-6 mt-4">
                         <label>* <?php echo lang('admin/notice.type'); ?> :</label>
                         <select name="notice_type" id="ddlNoticeStatus" class="form-control" required>
                             <option value="">--Select one--</option>
                             <option value="1">Tenent</option>
                             <option value="2">Employee</option>
                             <option value="3">Owner</option>
                         </select>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('notice_type')) {
                                                                            echo $validation->getError('notice_type');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/notice.e_type'); ?>
                         </div>

                     </div>
                     <div class="col-md-12 mt-4">
                         <label>* <?php echo lang('admin/notice.n_desc'); ?> :</label>
                         <textarea class="form-control" id="elm1" name="text_area" required></textarea>
                         <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                        if ($validation->hasError('text_area')) {
                                                                            echo $validation->getError('text_area');
                                                                        }
                                                                    } ?></p>
                         <div class="invalid-feedback">
                             <?php echo lang('admin/notice.e_textarea'); ?>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submitTenant"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- End addNotice -->
 <!-- New addMaintenance -->
 <div class="modal fade" id="addMaintenance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <form class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Maintenance.add_new_maintenance_cost'); ?> </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-12 mt-4">
                         <label><?php echo lang('Maintenance.main_date'); ?></label>
                         <input type="date" class="form-control" name="main_date" value="" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('main_date');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Maintenance.main_month'); ?></label>
                         <select name="main_month" class="form-control" required>
                             <option value="">--Select Month--</option>

                         </select>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('main_month');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Maintenance.main_year'); ?></label>
                         <select name="main_year" class="form-control" required>
                             <option value="">--Select Year--</option>

                         </select>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('main_year');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Maintenance.main_title'); ?></label>
                         <input type="text" name="main_title" class="form-control" value="" required>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('main_title');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-6 mt-4">
                         <label><?php echo lang('Maintenance.main_amount'); ?></label>
                         <div class="input-group">
                             <input type="text" name="main_amount" class="form-control" value="" required>
                             <div class="input-group-text"><?php symbol(); ?></div>
                         </div>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('main_amount');
                                                                        } ?>
                         </small>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label><?php echo lang('Maintenance.main_details'); ?></label>
                         <textarea name="main_details" class="form-control" required></textarea>
                         <div class="valid-feedback">Looks good!</div>
                         <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                                            echo $validation->getError('main_details');
                                                                        } ?>
                         </small>
                     </div>

                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Unit.cancel'); ?></button>
                 <button type="button" class="btn btn-primary submitTenant"><?php echo lang('Unit.created'); ?></button>
             </div>
         </form>
     </div>
 </div>
 <!-- End addMaintenance -->


 <script>
     // add floor
     $("body").on("click", ".show_addFloor", function() {
         $('#addnewrent').modal('hide');
         $('#addFloor').modal('show');
     });
     // add floor
     $("body").on("click", ".submitFloor", function() {
         $('#addFloor').modal('hide');
         $('#addnewrent').modal('show');
     });
     // add unit

     $("body").on("click", ".show_addUnit", function() {
         $('#addnewrent').modal('hide');
         $('#addUnit').modal('show');
         $('#addUnit').find('.show_addFloor').addClass('show_addFloorUnit');
         $('#addUnit').find('.show_addFloor').removeClass('show_addFloor');
     });
     $("body").on("click", ".submitUnit", function() {
         $('#addUnit').modal('hide');
         $('#addnewrent').modal('show');
         $('#addUnit').find('.show_addFloorUnit').addClass('show_addFloor');
         $('#addUnit').find('.show_addFloorUnit').removeClass('show_addFloorUnit');

     });

     $("body").on("click", ".show_addFloorUnit", function() {
         $('#addUnit').modal('hide');
         $('#addFloor').modal('show');
         $('#addFloor').find('.submitFloor').addClass('submitFloorUnit');
         $('#addFloor').find('.submitFloor').removeClass('submitFloor');
     });
     $("body").on("click", ".submitFloorUnit", function() {
         $('#addFloor').modal('hide');
         $('#addUnit').modal('show');
         $('#addFloor').find('.submitFloorUnit').addClass('submitFloor');
         $('#addFloor').find('.submitFloorUnit').removeClass('submitFloorUnit');
     });

     // addMonths
     $("body").on("click", ".show_addMonth", function() {
         $('#addnewrent').modal('hide');
         $('#addMonths').modal('show');
     });
     $("body").on("click", ".submitmonth", function() {
         $('#addMonths').modal('hide');
         $('#addnewrent').modal('show');
     });
     // addYear
     $("body").on("click", ".show_addYear", function() {
         $('#addnewrent').modal('hide');
         $('#addYear').modal('show');
     });
     $("body").on("click", ".submityear", function() {
         $('#addYear').modal('hide');
         $('#addnewrent').modal('show');
     });


     $(".year").show();
     $(".half_year").hide();
     $(".month").hide();

     $(".year_rents").show();
     $(".half_year_rents").hide();
     $(".month_rents").hide();

     $(".year_maintenance").show();
     $(".half_year_maintenance").hide();
     $(".month_maintenance").hide();

     $("#mixed-chart").css("display", "block");
     $("#mixed-chart-half-year").css("display", "none");
     $("#mixed-chart-month").css("display", "none");

     $("#this_year_chart").click(function() {
         $(".year").show();
         $(".half_year").hide();
         $(".month").hide();

         $(".year_rents").show();
         $(".half_year_rents").hide();
         $(".month_rents").hide();

         $(".year_maintenance").show();
         $(".half_year_maintenance").hide();
         $(".month_maintenance").hide();

         $("#mixed-chart").css("display", "block");
         $("#mixed-chart-half-year").css("display", "none");
         $("#mixed-chart-month").css("display", "none");

         $('div').each(function() {
             if ($(this).attr('id') == 'mixed-chart') {
                 var options = {
                         series: [{
                                 name: "Expenses",
                                 type: "column",
                                 data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>, <?= $maintenance_costs[7] ?>, <?= $maintenance_costs[8] ?>, <?= $maintenance_costs[9] ?>, <?= $maintenance_costs[10] ?>, <?= $maintenance_costs[11] ?>, <?= $maintenance_costs[12] ?>]
                             },
                             {
                                 name: "Maintenance",
                                 type: "area",
                                 data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>, <?= $maintenance_costs[7] ?>, <?= $maintenance_costs[8] ?>, <?= $maintenance_costs[9] ?>, <?= $maintenance_costs[10] ?>, <?= $maintenance_costs[11] ?>, <?= $maintenance_costs[12] ?>]
                             },

                             {
                                 name: "Profit",
                                 type: "line",
                                 data: [<?= $all_rents[1] ?>, <?= $all_rents[2] ?>, <?= $all_rents[3] ?>, <?= $all_rents[4] ?>, <?= $all_rents[5] ?>, <?= $all_rents[6] ?>, <?= $all_rents[7] ?>, <?= $all_rents[8] ?>, <?= $all_rents[9] ?>, <?= $all_rents[10] ?>, <?= $all_rents[11] ?>, <?= $all_rents[12] ?>]
                             },
                         ],
                         chart: {
                             height: 350,
                             type: "line",
                             stacked: !1,
                             toolbar: {
                                 show: !1
                             }
                         },
                         stroke: {
                             width: [0, 1, 1],
                             dashArray: [0, 0, 5],
                             curve: "smooth"
                         },
                         plotOptions: {
                             bar: {
                                 columnWidth: "18%"
                             }
                         },
                         legend: {
                             show: !1
                         },
                         fill: {
                             opacity: [0.85, 0.25, 1],
                             gradient: {
                                 inverseColors: !1,
                                 shade: "light",
                                 type: "vertical",
                                 opacityFrom: 0.85,
                                 opacityTo: 0.55,
                                 stops: [0, 100, 100, 100]
                             }
                         },
                         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                         markers: {
                             size: 0
                         },
                         colors: ["#0bb197", "#eff2f7", "#ff3d60"],
                     },
                     chart = new ApexCharts(document.querySelector("#mixed-chart"), options);

                 chart.render();
             }

         });
     });

     $("#this_half_year_chart").click(function() {
         $(".year").hide();
         $(".half_year").show();
         $(".month").hide();

         $(".half_year_rents").show();
         $(".year_rents").hide();
         $(".month_rents").hide();

         $(".year_maintenance").hide();
         $(".half_year_maintenance").show();
         $(".month_maintenance").hide();

         $("#mixed-chart").css("display", "none");
         $("#mixed-chart-half-year").css("display", "block");
         $("#mixed-chart-month").css("display", "none");

         $('div').each(function() {
             if ($(this).attr('id') == 'mixed-chart-half-year') {
                 var options = {
                         series: [{
                                 name: "Expenses",
                                 type: "column",
                                 data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>]
                             },

                             {
                                 name: "Maintenance",
                                 type: "area",
                                 data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>]
                             },

                             {
                                 name: "Profit",
                                 type: "line",
                                 data: [<?= $all_rents[1] ?>, <?= $all_rents[2] ?>, <?= $all_rents[3] ?>, <?= $all_rents[4] ?>, <?= $all_rents[5] ?>, <?= $all_rents[6] ?>]
                             },
                         ],
                         chart: {
                             height: 350,
                             type: "line",
                             stacked: !1,
                             toolbar: {
                                 show: !1
                             }
                         },
                         stroke: {
                             width: [0, 1, 1],
                             dashArray: [0, 0, 5],
                             curve: "smooth"
                         },
                         plotOptions: {
                             bar: {
                                 columnWidth: "18%"
                             }
                         },
                         legend: {
                             show: !1
                         },
                         fill: {
                             opacity: [0.85, 0.25, 1],
                             gradient: {
                                 inverseColors: !1,
                                 shade: "light",
                                 type: "vertical",
                                 opacityFrom: 0.85,
                                 opacityTo: 0.55,
                                 stops: [0, 100, 100, 100]
                             }
                         },
                         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                         markers: {
                             size: 0
                         },
                         colors: ["#0bb197", "#eff2f7", "#ff3d60"],
                     },
                     chart = new ApexCharts(document.querySelector("#mixed-chart-half-year"), options);

                 chart.render();
             }
         });

     });

     $("#this_month_chart").click(function() {
         $(".year").hide();
         $(".half_year").hide();
         $(".month").show();

         $(".month_rents").show();
         $(".year_rents").hide();
         $(".half_year_rents").hide();

         $(".year_maintenance").hide();
         $(".half_year_maintenance").hide();
         $(".month_maintenance").show();

         $("#mixed-chart").css("display", "none");
         $("#mixed-chart-half-year").css("display", "none");
         $("#mixed-chart-month").css("display", "block");


         $('div').each(function() {
             if ($(this).attr('id') == 'mixed-chart-month') {
                 var options = {
                         series: [{
                                 name: "Expenses",
                                 type: "column",
                                 data: [<?= $maintenance_costs_weeks['week1'] ?>, <?= $maintenance_costs_weeks['week2'] ?>, <?= $maintenance_costs_weeks['week3'] ?>, <?= $maintenance_costs_weeks['week4'] ?>, <?= $maintenance_costs_weeks['week5'] ?>]
                             },

                             {
                                 name: "Maintenance",
                                 type: "area",
                                 data: [<?= $maintenance_costs_weeks['week1'] ?>, <?= $maintenance_costs_weeks['week2'] ?>, <?= $maintenance_costs_weeks['week3'] ?>, <?= $maintenance_costs_weeks['week4'] ?>, <?= $maintenance_costs_weeks['week5'] ?>]
                             },

                             {
                                 name: "Profit",
                                 type: "line",
                                 data: [<?= $all_rent_weeks['week1'] ?>, <?= $all_rent_weeks['week2'] ?>, <?= $all_rent_weeks['week3'] ?>, <?= $all_rent_weeks['week4'] ?>, <?= $all_rent_weeks['week5'] ?>]
                             },
                         ],
                         chart: {
                             height: 350,
                             type: "line",
                             stacked: !1,
                             toolbar: {
                                 show: !1
                             }
                         },
                         stroke: {
                             width: [0, 1, 1],
                             dashArray: [0, 0, 5],
                             curve: "smooth"
                         },
                         plotOptions: {
                             bar: {
                                 columnWidth: "18%"
                             }
                         },
                         legend: {
                             show: !1
                         },
                         fill: {
                             opacity: [0.85, 0.25, 1],
                             gradient: {
                                 inverseColors: !1,
                                 shade: "light",
                                 type: "vertical",
                                 opacityFrom: 0.85,
                                 opacityTo: 0.55,
                                 stops: [0, 100, 100, 100]
                             }
                         },
                         labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
                         markers: {
                             size: 0
                         },
                         colors: ["#0bb197", "#eff2f7", "#ff3d60"],
                     },
                     chart = new ApexCharts(document.querySelector("#mixed-chart-month"), options);

                 chart.render();
             }
         });
     });

     $('div').each(function() {
         if ($(this).attr('id') == 'mixed-chart') {
             var options = {
                     series: [{
                             name: "Expenses",
                             type: "column",
                             data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>, <?= $maintenance_costs[7] ?>, <?= $maintenance_costs[8] ?>, <?= $maintenance_costs[9] ?>, <?= $maintenance_costs[10] ?>, <?= $maintenance_costs[11] ?>, <?= $maintenance_costs[12] ?>]
                         },
                         {
                             name: "Maintenance",
                             type: "area",
                             data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>, <?= $maintenance_costs[7] ?>, <?= $maintenance_costs[8] ?>, <?= $maintenance_costs[9] ?>, <?= $maintenance_costs[10] ?>, <?= $maintenance_costs[11] ?>, <?= $maintenance_costs[12] ?>]
                         },

                         {
                             name: "Profit",
                             type: "line",
                             data: [<?= $all_rents[1] ?>, <?= $all_rents[2] ?>, <?= $all_rents[3] ?>, <?= $all_rents[4] ?>, <?= $all_rents[5] ?>, <?= $all_rents[6] ?>, <?= $all_rents[7] ?>, <?= $all_rents[8] ?>, <?= $all_rents[9] ?>, <?= $all_rents[10] ?>, <?= $all_rents[11] ?>, <?= $all_rents[12] ?>]
                         },
                     ],
                     chart: {
                         height: 350,
                         type: "line",
                         stacked: !1,
                         toolbar: {
                             show: !1
                         }
                     },
                     stroke: {
                         width: [0, 1, 1],
                         dashArray: [0, 0, 5],
                         curve: "smooth"
                     },
                     plotOptions: {
                         bar: {
                             columnWidth: "18%"
                         }
                     },
                     legend: {
                         show: !1
                     },
                     fill: {
                         opacity: [0.85, 0.25, 1],
                         gradient: {
                             inverseColors: !1,
                             shade: "light",
                             type: "vertical",
                             opacityFrom: 0.85,
                             opacityTo: 0.55,
                             stops: [0, 100, 100, 100]
                         }
                     },
                     labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                     markers: {
                         size: 0
                     },
                     colors: ["#0bb197", "#eff2f7", "#ff3d60"],
                 },
                 chart = new ApexCharts(document.querySelector("#mixed-chart"), options);

             chart.render();
         }


         if ($(this).attr('id') == 'mixed-chart-half-year') {
             var options = {
                     series: [{
                             name: "Expenses",
                             type: "column",
                             data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>]
                         },

                         {
                             name: "Maintenance",
                             type: "area",
                             data: [<?= $maintenance_costs[1] ?>, <?= $maintenance_costs[2] ?>, <?= $maintenance_costs[3] ?>, <?= $maintenance_costs[4] ?>, <?= $maintenance_costs[5] ?>, <?= $maintenance_costs[6] ?>]
                         },

                         {
                             name: "Profit",
                             type: "line",
                             data: [<?= $all_rents[1] ?>, <?= $all_rents[2] ?>, <?= $all_rents[3] ?>, <?= $all_rents[4] ?>, <?= $all_rents[5] ?>, <?= $all_rents[6] ?>]
                         },
                     ],
                     chart: {
                         height: 350,
                         type: "line",
                         stacked: !1,
                         toolbar: {
                             show: !1
                         }
                     },
                     stroke: {
                         width: [0, 1, 1],
                         dashArray: [0, 0, 5],
                         curve: "smooth"
                     },
                     plotOptions: {
                         bar: {
                             columnWidth: "18%"
                         }
                     },
                     legend: {
                         show: !1
                     },
                     fill: {
                         opacity: [0.85, 0.25, 1],
                         gradient: {
                             inverseColors: !1,
                             shade: "light",
                             type: "vertical",
                             opacityFrom: 0.85,
                             opacityTo: 0.55,
                             stops: [0, 100, 100, 100]
                         }
                     },
                     labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                     markers: {
                         size: 0
                     },
                     colors: ["#0bb197", "#eff2f7", "#ff3d60"],
                 },
                 chart = new ApexCharts(document.querySelector("#mixed-chart-half-year"), options);

             chart.render();
         }

         if ($(this).attr('id') == 'mixed-chart-month') {
             var options = {
                     series: [{
                             name: "Expenses",
                             type: "column",
                             data: [<?= $maintenance_costs_weeks['week1'] ?>, <?= $maintenance_costs_weeks['week2'] ?>, <?= $maintenance_costs_weeks['week3'] ?>, <?= $maintenance_costs_weeks['week4'] ?>, <?= $maintenance_costs_weeks['week5'] ?>]
                         },

                         {
                             name: "Maintenance",
                             type: "area",
                             data: [<?= $maintenance_costs_weeks['week1'] ?>, <?= $maintenance_costs_weeks['week2'] ?>, <?= $maintenance_costs_weeks['week3'] ?>, <?= $maintenance_costs_weeks['week4'] ?>, <?= $maintenance_costs_weeks['week5'] ?>]
                         },

                         {
                             name: "Profit",
                             type: "line",
                             data: [<?= $all_rent_weeks['week1'] ?>, <?= $all_rent_weeks['week2'] ?>, <?= $all_rent_weeks['week3'] ?>, <?= $all_rent_weeks['week4'] ?>, <?= $all_rent_weeks['week5'] ?>]
                         },
                     ],
                     chart: {
                         height: 350,
                         type: "line",
                         stacked: !1,
                         toolbar: {
                             show: !1
                         }
                     },
                     stroke: {
                         width: [0, 1, 1],
                         dashArray: [0, 0, 5],
                         curve: "smooth"
                     },
                     plotOptions: {
                         bar: {
                             columnWidth: "18%"
                         }
                     },
                     legend: {
                         show: !1
                     },
                     fill: {
                         opacity: [0.85, 0.25, 1],
                         gradient: {
                             inverseColors: !1,
                             shade: "light",
                             type: "vertical",
                             opacityFrom: 0.85,
                             opacityTo: 0.55,
                             stops: [0, 100, 100, 100]
                         }
                     },
                     labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
                     markers: {
                         size: 0
                     },
                     colors: ["#0bb197", "#eff2f7", "#ff3d60"],
                 },
                 chart = new ApexCharts(document.querySelector("#mixed-chart-month"), options);

             chart.render();
         }
     });
 </script>

 <?= $this->endSection() ?>