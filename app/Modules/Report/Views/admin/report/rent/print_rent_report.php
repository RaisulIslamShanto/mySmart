<?= $this->extend('\Modules\Master\Views\layout') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="contaisner-fluid">

        <!-- end page title -->
        <div id="printableArea">

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center p-3">
                        <img style="height:100px;width:100px;border-radius:50%;" src="assets/images/pr1.jpg">
                        <h4>Home</h4>
                        <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>

                    </div>

                    

                    <div class="card">
                        <div class="card-body ">
                            <h2 style="text-align:center;" class="card-title mb-4"><?php echo lang('report/rented.r_c_r'); ?></h2>  
                            <div class="table-responsive mb-0 ">

                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr> 
                                            <th scope="col"><?php echo lang('report/rented.date'); ?></th>  
                                            <th scope="col"><?php echo lang('report/rented.name'); ?> </th> 
                                            <th scope="col"><?php echo lang('report/rented.type'); ?></th> 
                                            <th scope="col"><?php echo lang('report/rented.floor'); ?></th> 
                                            <th scope="col"><?php echo lang('report/rented.unit'); ?></th>  
                                            <th scope="col"><?php echo lang('report/rented.month'); ?></th>
                                            <th scope="col"><?php echo lang('report/rented.year'); ?></th>
                                            <th scope="col"><?php echo lang('report/rented.amount'); ?></th>
                                            
                                            <th scope="col"><?php echo lang('report/rented.bill'); ?></th>
                                            
                                            <th scope="col"><?php echo lang('report/rented.total'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                     <?php   //print_r($all_rents);
                                     foreach($all_rents as $rent){

                                     ?>
                                        <tr> 
                                            <td scope="col"><?= date_formats($rent->issue_date);?></td>  
                                            <td scope="col"><?=$rent->renter_name;?> </td> 
                                            <td scope="col"><?php if($rent->bill_status==1){echo "Paid";}else{echo "Due";}?> </td>
                                            <td scope="col"><?=$rent->floor_name;?> </td> 
                                            <td scope="col"><?=$rent->unit_name;?> </td> 
                                            <td scope="col"><?=$rent->month;?> </td> 
                                            <td scope="col"><?=$rent->year;?> </td>
                                            <td scope="col"><?php currency($rent->rent);?></td>

                                            <td scope="col">
                                                <table>
                                                    <tr>
                                                        <th scope="col"><?php echo lang('report/rented.g_b'); ?></th>
                                                        <td scope="col"><?php currency($rent->gas_bill);?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><?php echo lang('report/rented.e_b'); ?></th>
                                                        <td scope="col"><?php currency($rent->electric_bill);?></td>
                                                    </tr>    
                                                    <tr>
                                                        <th scope="col"><?php echo lang('report/rented.w_b'); ?></th>
                                                        <td scope="col"><?php currency($rent->water_bill);?></td>
                                                    </tr>    
                                                    <tr>
                                                        <th scope="col"><?php echo lang('report/rented.s_b'); ?></th>
                                                        <td scope="col"><?php currency($rent->security_bill);?></td>
                                                    </tr>    
                                                    <tr>
                                                        <th scope="col"><?php echo lang('report/rented.u_b'); ?></th>
                                                        <td scope="col"><?php currency($rent->utility_bill);?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><?php echo lang('report/rented.o_b'); ?></th>
                                                        <td scope="col"><?php currency($rent->other_bill);?></td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td scope="col"><?php currency($rent->total_rent);?></td>
                                        </tr>
                                   <?php }
                                     ?>
                                    </tbody>
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
    <!-- container-fluid -->
</div>
<script>
    $(document).ready(function(){
        window.print();
    });
</script>

<!-- end main content-->
<?= $this->endSection() ?>