 <?php
 echo $this->include('\Modules\Master\Views\header');
    echo $this->include('\Modules\Master\Views\sidebar');
 ?>
 
<div class="page-content">
     <div class="container-fluid">
        <div class="row">
                 <?php $p=1; foreach($packages as $pakage){ ?>

            
            <div class="col-md-4 col-sm-6" >
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
                            <li><i class="ri-check-line"></i> Property Limit : <?=$pakage['property_limit']?></li>
                            <li> <i class="ri-check-line"></i> Employee Limit : <?=$pakage['employee_limit']?></li> 
                        </ul>
                        <div class="pricingTable-signup text-center">
                            <form action="<?=base_url('admin/edit_package');?>" method="post"> 
                                <input type="hidden" name="owner_id" value="<?=$user_id?>">
                                <input type="hidden" name="package_id" value="<?=$pakage['id']?>">  
                                <button class="btn btn-primary rounded-pill px-4" type="submit">Use</button>
                            </form>
                            
                        </div>
                    </div>
                </div> 
            </div>
            <?php $p++; }?>
        </div>
    </div>
</div>  
 <?php
 echo $this->include('\Modules\Master\Views\footer');
   
 ?>
  