<?php echo $this->extend('\Modules\Master\Views\layout')?>
<?php echo $this->section('content')?>

<div class="page-content">
  <div class="container">

    <div class="col-md-12">

      <h1 class="text-center mb-4 text-primary"> <u><?php echo lang('admin/apartment_fund.f_invoice'); ?></u> </h1>
      <div class="card table-responsive">
        <div class="card-body">
          <table cellpadding="0" cellspacing="0" class="table">
            <tbody>
              <tr class="top">
                <td colspan="2">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="title" style="text-transform:uppercase;font-weight:bold;overflow:hidden;font-size:32px;">Home</td>
                        <td class="text-center text-md-end"><?php echo lang('admin/apartment_fund.invoice'); ?> # 43<br> <?php echo lang('admin/apartment_fund.issue_date'); ?>: <?= $fund['issue_date']; ?><br> <?php echo lang('admin/apartment_fund.bill_month'); ?>: <?= $fund['issue_date']; ?> </td>
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
                        <td class="text-center text-md-end"><?= $owner['name']; ?><br>
                          <?= $owner['contact_no']; ?><br>
                          <?= $owner['email']; ?></td>
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
                <td>$<?= $fund['total_amount']; ?></td>
              </tr>

              <tr class="total">
                <td>Total:</td>
                <td>
                  <h5> $<?= $fund['total_amount']; ?></h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="px-5">
            <img style="width:100px;" src="<?php echo base_url() ?>/admin/assets/images/paid.png">
          </div>
          <div class="text-md-end">
            <div>-------------------------</div>
            <div class="signature-text"><?php echo lang('admin/apartment_fund.signature'); ?></div>
          </div>
        </div>

      </div>
    </div>
    <!-- end row -->

  </div>
  <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- end main content-->
<script>
  $(function(){
      window.print();
  });
</script>
 
<!-- end main content-->
<?php echo $this->endSection('content')?>