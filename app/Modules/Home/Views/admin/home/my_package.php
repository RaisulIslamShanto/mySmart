<?= $this->extend('\Modules\Master\Views\master') ?>
 <?= $this->section('content') ?>
 
<div class="page-content">
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 mt-4" >
                <div class="card package_price_item">
                    <div class="card-body" >
                            <div class="price-value">
                                <span class="amount">$<?=$package[0]->cost;?>.00</span>
                                <span class="duration">/
                                    <?php 
                                    if($package[0]->duration != 'other'){
                                        if($package[0]->duration >=12){
                                           $duration= $package[0]->duration/12;
                                           echo $duration." Years";
                                        }else{
                                            echo $package[0]->duration." Months";
                                        }
                                       
                                    }else{
                                        if($package[0]->d_m_y==1){
                                          $d_m_y = "Days";

                                        }else if($package[0]->d_m_y==2){
                                            $d_m_y = "Months";

                                        }else if($package[0]->d_m_y==3){
                                            $d_m_y = "Years";

                                        }

                                        echo $package[0]->how_many." ".$d_m_y;
                                    }
                                    ?></span>
                            </div>
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title"><?=$package[0]->pakage_title;?></h3>
                                    
                                </div>
                                <ul class="pricing-content">
                                    <li><i class="ri-check-line"></i> Property Limit : <?=$package[0]->property_limit?></li>
                                    <li> <i class="ri-check-line"></i> Employee Limit : <?=$package[0]->employee_limit?></li>
                                    <!-- <li>50GB Bandwidth</li> -->
                                    <!-- <li class="disable">Maintenance</li>
                                    <li class="disable">15 Subdomains</li> -->
                                </ul>

                                <div class="text-center">
                                    <a class="btn btn-outline-primary mb-3 btn-sm" href="<?= base_url('admin/edit_package') ?>">Edit Package</a>
                                </div>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click",".viewed_notification",function () {
   
    });
</script>

 <?= $this->endSection() ?>