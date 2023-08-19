<?= $this->extend('\Modules\Master\Views\layout') ?>
<?= $this->section('content') ?>
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card table-responsive">
          <h1 class="text-center mb-4 text-primary"> <u><?php echo lang('admin/rent.r_invoice'); ?></u> </h1>
          <div class="card-body">
            <?php
            foreach ($all_data as $rent) {
            ?>
              <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                  <tr class="top">
                    <td colspan="2">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td class="title" style="text-transform:uppercase;font-weight:bold;overflow:hidden;font-size:32px;">Home</td>
                            <td class="text-center text-md-end"><?php echo lang('admin/rent.invoice'); ?> # <?= $rent->id; ?><br> <?php echo lang('admin/rent.issue_date'); ?>: <?= $rent->issue_date; ?><br> <?php echo lang('admin/rent.paid_date'); ?>: <?= $rent->bill_paid_date; ?><br> <?php echo lang('admin/rent.bill_month'); ?>: <?= $rent->month; ?>, <?= $rent->year; ?> </td>
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
                            <td class="text-center text-md-end">Jim Cary<br>
                              Floor: <?= $rent->floor_name; ?>, Unit: <?= $rent->unit_name; ?><br>
                              <?= $rent->tecontrctno; ?><br>
                              <?= $rent->teemail; ?> </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr class="heading">
                    <td><?php echo lang('admin/rent.p_method'); ?> </td>
                    <td><?php echo lang('admin/rent.cash'); ?> # </td>
                  </tr>
                  <tr class="details">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr class="heading">
                    <td><?php echo lang('admin/rent.bill_details'); ?></td>
                    <td><?php echo lang('admin/rent.amount'); ?> </td>
                  </tr>
                  <tr class="item">
                    <td><?php echo lang('admin/rent.home_r'); ?> </td>
                    <td><?= currency($rent->rent); ?> </td>
                  </tr>
                  <tr class="item">
                    <td><?php echo lang('admin/rent.w_b'); ?> </td>
                    <td><?= currency($rent->water_bill); ?> </td>
                  </tr>
                  <tr class="item">
                    <td><?php echo lang('admin/rent.e_b'); ?> </td>
                    <td><?= currency($rent->electric_bill); ?> </td>
                  </tr>
                  <tr class="item">
                    <td><?php echo lang('admin/rent.g_b'); ?> </td>
                    <td><?= currency($rent->gas_bill); ?> </td>
                  </tr>
                  <tr class="item">
                    <td><?php echo lang('admin/rent.s_b'); ?> </td>
                    <td><?= currency($rent->security_bill); ?></td>
                  </tr>
                  <tr class="item">
                    <td><?php echo lang('admin/rent.U_bill'); ?></td>
                    <td><?= currency($rent->utility_bill); ?> </td>
                  </tr>
                  <tr class="item last">
                    <td><?php echo lang('admin/rent.o_bill'); ?> </td>
                    <td><?= currency($rent->other_bill); ?></td>
                  </tr>
                  <tr class="total">
                    <td></td>
                    <td>
                      <h5> <?= currency($rent->total_rent); ?></h5>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="px-5">
                <img style="width:100px;" src="<?php echo base_url() ?>/admin/assets/images/paid.png">
              </div>
              <div class="text-md-end">
                <div>-------------------------</div>
                <div class="signature-text"><?php echo lang('admin/rent.signature'); ?></div>
              </div>
          </div>
        <?php } ?>



        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

  </div>
  <!-- container-fluid -->
</div>

<script>
  $(function(){
      window.print();
  });
</script>

<?php echo $this->endSection('content') ?>