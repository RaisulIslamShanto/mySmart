<?= $this->extend('\Modules\Master\Views\master') ?>
 <?= $this->section('content') ?>
 
<div class="page-content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
        <div class="simplebar-content" style="padding: 0px;">
                <?php 
                foreach($notifications as $notify){ ?>

                <div id="add_more">
                  <a type="button" data-index="<?=$notify['notify_id'];?>" class="text-reset notification-item viewed_notification" style="width:100%;<?php
                   
                   $session = session();
                     $user_type=$session->get('user_type');
                   if($user_type==14){
                    if($notify['admin_status']==1){echo "background: #d2f1e6;";}
                   }elseif($user_type==9){
                    if($notify['tenant_status']==1){echo "background: #d2f1e6;";}
                   }elseif($user_type==10){
                    if($notify['emp_status']==1){echo "background: #d2f1e6;";}
                   }
                  ?>">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-xs">
                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="ri-notification-3-line"></i>
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                        
                            <h5 class="mb-1"><?=$notify['issue_name'];?></h5>
                            <h6 class="mb-1">Issue : <?=$notify['comtitle'];?> </h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1"><?=$notify['comdescription'];?></p>
                                <!-- <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p> -->
                            </div>
                        </div>
                    </div>
                  </a>
                  <hr>
                </div>
                <?php }?>
         </div>
            <div class="dt-responsive nowrap">
              
               
                <?=$links ?>
            </div>
        </div>
      </div>
    </div>
</div>
<script>

    $(document).on("click",".viewed_notification",function () {
   
   var notify_id = $(this).attr("data-index");
   
     
   $.ajax({
       url: "<?php echo base_url('admin/updateNotification'); ?>",
       method: "POST",
       data: {notify_id:notify_id},
       dataType: 'json',
       success: function(data) {
        window.location.href="<?=base_url('admin/complainList');?>";
       }
    });
});
</script>

 <?= $this->endSection() ?>