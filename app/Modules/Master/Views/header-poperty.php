 

        <!---------Top Bar--------------->
      
        <header id="page-topbar">
            <div class="navbar-header">
            <?php  $notify_data= notification();?>
               
                <?php $user=user_details();?>
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box  ">
                    <?php
                      $session = session();
                      $property_id=$session->get('rs_property_id');?>
                        <a href="<?=base_url('admin/account_mode');?>" class="logo logo-dark">
                            <span class="logo-sm text-center">
                                <img src="<?php echo base_url() ?>/admin/assets/images/logo-sm-light.png" alt="logo-sm-dark" height="32">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url() ?>/admin/assets/images/logo-light.png" alt="logo-dark" height="34">
                            </span>
                        </a>

                        <a href="<?=base_url('admin/account_mode');?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?php echo base_url() ?>/admin/assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url() ?>/admin/assets/images/logo-dark.png" alt="logo-light" height="24">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                    <!-- App Search-->
                    <div class="app-search d-none d-lg-block">
                        <a href="<?=base_url('admin/account_mode');?>" class="btn btn-light text-primary"> My Poperty </a>
                    </div>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="" src="<?php echo base_url() ?>/admin/assets/images/flags/us.jpg" alt="Header Language" height="16">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?php echo base_url() ?>/admin/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?php echo base_url() ?>/admin/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?php echo base_url() ?>/admin/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?php echo base_url() ?>/admin/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div>



                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-notification-3-line"></i>
                            <?php
                            if(!empty($notify_data)){ ?>
                            <span class="noti-dot"></span>
                            <?php }?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 " aria-labelledby="page-header-notifications-dropdown" >
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <?php $data= notification();?>
                                        <a href="<?=base_url('admin/notification_view');?>" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                              <?php 
                              $limit=2;
                              $m=1;
                                 foreach($notify_data as $notify){ 
                                     if($m<=$limit){
                                     ?>

                                <div id="add_more"><a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="ri-notification-3-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1"><?=$notify['issue_name'];?> Issue</h5>
                                            <h6 class="mb-1"><?=$notify['comtitle'];?> Issue</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1"><?=$notify['comdescription'];?></p>
                                                <!-- <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </a></div>
                                <?php } $m++; }?>
                                
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <input id="increment" type="hidden" name="" value="0">
                                    <a id="noti_view_more" typr="button" class="btn btn-sm btn-link font-size-14 text-center" href="#">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?php echo base_url() ?>/admin/assets/user/thumbnail/<?php if($user['image']!=''){ echo $user['image'];}else{
                                echo "empty_image.jpg";
                            }?>" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"><?=$user['name'];?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="<?=base_url('admin/profile');?>"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="<?=base_url('admin/account_mode');?>"><i class="ri-wallet-2-line align-middle me-1"></i> My Poperty</a>
                            <a class="dropdown-item d-block" href="<?=base_url('admin/roleadd');?>"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item d-block" href="<?=base_url('admin/mypackage');?>"><i class="ri-exchange-dollar-fill align-middle me-1"></i> My Package</a>
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?php echo base_url() ?>/admin/logout">
                                <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>



                </div>
            </div>
   
        </header>


        <!---------Top Bar End--------------->