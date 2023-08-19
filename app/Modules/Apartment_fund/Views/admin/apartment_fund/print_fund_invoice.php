<?= $this->extend('\Modules\Master\Views\layout') ?>
<?= $this->section('content') ?>

<div class="page-content">
    <div class="contaisner-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a onclick="window.print()" href="javascript: void(0);">Golden ggTower</a></li>
                            <li class="breadcrumb-item active"><?php echo lang('admin/apartment_fund.f_status'); ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div id="printableArea">

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center p-3">
                        <img style="height:100px;width:100px;border-radius:50%;" src="assets/images/pr1.jpg">
                        <h4>Home</h4>
                        <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>

                    </div>
                   
                    <div class="card table-responsive" id="PrintRentInvoice">
                    <h1 class="text-center mb-4 text-primary"> <u><?php echo lang('admin/apartment_fund.f_invoice'); ?></u> </h1>
    <div class="card table-responsive" id="PrintRentInvoice">
        <div class="card-body">
            <table cellpadding="0" cellspacing="0" class="table">
            <tbody>
            <tr class="top">
                <td colspan="2">
                    <table class="table">
                      <tbody>
                      <tr>
                            <td class="title" style="text-transform:uppercase;font-weight:bold;overflow:hidden;font-size:32px;">Home</td>
                            <td class="text-center text-md-end"><?php echo lang('admin/apartment_fund.invoice'); ?> # 43<br>  <?php echo lang('admin/apartment_fund.issue_date'); ?>: <?=$fund['issue_date'];?><br>  <?php echo lang('admin/apartment_fund.bill_month'); ?>: <?=$fund['issue_date'];?> </td>
                          </tr>
                      </tbody>
                    </table>
                </td>
            </tr>
            <tr class="information">
              <td colspan="2">
                <table class="table">
                      <tbody>
                        <tr>
                        <td>K-Block,Mirpur-10,Dhaka-1216<br>
                          Phone: 1212121212<br>
                          Email: opu@gmail.com </td>
                        <td class="text-center text-md-end"><?=$owner['name'];?><br>
                          <?=$owner['contact_no'];?><br>
                          <?=$owner['email'];?></td>
                      </tr>
                    </tbody>
                </table>
                </td>
            </tr>
            <tr class="heading">
              <td><?php echo lang('admin/apartment_fund.p_method'); ?> </td>
              <td><?php echo lang('admin/apartment_fund.cash'); ?> # </td>
            </tr>
            <tr class="details">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="heading">
              <td><?php echo lang('admin/apartment_fund.bill_d'); ?> </td>
              <td><?php echo lang('admin/apartment_fund.amount'); ?> </td>
            </tr>
            <tr class="item">
              <td><?php echo lang('admin/apartment_fund.m_f_c_p'); ?> </td>
              <td>$<?=$fund['total_amount'];?></td>
            </tr>
            
            <tr class="total">
              <td>Total:</td>
              <td><h5> $<?=$fund['total_amount'];?></h5></td>
            </tr>
          </tbody>
        </table>
         <div class="px-5"> 
                <img style="width:100px;" src="assets/images/paid.png"> 
            </div>
            <div class="text-md-end">
                <div>-------------------------</div>
                <div class="signature-text"><?php echo lang('admin/apartment_fund.signature'); ?></div>
          </div>
        </div>
    
    
    
    
    </div>
    
    
    
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