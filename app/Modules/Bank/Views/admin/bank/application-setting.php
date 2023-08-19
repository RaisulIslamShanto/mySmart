<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>




<div class="page-content">
    <div class="container-fluid">

    
          <div class="card">
            <div class="card-header">
              <h5>Application settings</h5>
            </div>
            <div class="card-body">
            <?php foreach ($settingdata as $value2): ?>
                <form method="POST" id="applicationsetting" action=" " accept-charset="UTF-8">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input class="form-control" name="companyName" type="text" id="companyName" value="<?=$value2['company_name']; ?>" >
                        <span style="color:red;" id="nameErr"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="phone" class="form-label">Company Phone</label>
                        <input class="form-control " name="phone" type="text" id="phone" value="<?=$value2['company_phone']; ?>">
                        <span style="color:red;" id="phoneErr"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="website" class="form-label">Web Site</label>
                        <input class="form-control" name="website" type="text" id="website" value="<?=$value2['web_site']; ?>">
                        <span style="color:red;" id="siteErr"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="address" class="form-label">Company Address</label>
                        <input class="form-control" name="address" type="text" id="address" value="<?=$value2['company_address']; ?>">
                        <span style="color:red;" id="addressErr"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="currency" class="form-label">Default Currency</label>
                        <input class="form-control" name="currency" type="text" id="currency" value="<?=$value2['default_currency']; ?>">
                        <span style="color:red;" id="currencyErr"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="page" class="form-label">Number of data per page</label>
                        <input class="form-control" name="page" type="text" id="page" value="<?=$value2['Number_of_data_per_page']; ?>">
                        <span style="color:red;" id="pageErr"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="type" class="form-label">Registration Type</label>
                        <!-- <input class="form-control" name="type" type="text" id="type" value="<?//=$value2['registration_type']; ?>"> -->
                        <select class="select" id="type" name="type">
                        <!-- <option <?php //if ($value2['registration_type']) echo "selected"; ?>> </option> -->
                                <option value="free" <?php echo ($value2['registration_type']=='free' ?'selected':'' ) ?>>Free</option>
                                <option value="Monthly_Subscription" <?php echo ($value2['registration_type']=='Monthly_Subscription' ?'selected':'' ) ?>>Monthly Subscription</option>
                            </select> 
                        <span style="color:red;" id="typeErr"></span>
                      </div>
                    </div>
                 
                  </div>
                  <div class="row">
                    <div class="card-footer d-flex justify-content-end">
                      <div class="form-group">
                      <button type="submit" name="submit" id="submit" class="btn btn-primary">Save Settings</button>
                      </div>
                    </div>
                  </div>
                </form>
                <?php endforeach; ?> 
              </div>
            </div>
 

    </div>
    <!-- container-fluid -->
</div>


<!-- End Page-content -->

<!-- end main content-->



                <script>
                        $(document).ready(function() {
                        $('#applicationsetting').submit(function(e) {e.preventDefault();

                            var nameErr = $('#nameErr');
                            var phoneErr = $('#phoneErr');
                            var siteErr = $('#siteErr');
                            var addressErr = $('#addressErr');
                            var currencyErr = $('#currencyErr');
                            var pageErr = $('#pageErr');
                            var typeErr = $('#typeErr');

                    $.ajax({
                        url: "<?php echo base_url('/admin/setting_update/').$value2['id'] ?>",
                        type: "POST",
                        data: $('#applicationsetting').serialize(),
                        dataType: "json",
                        success: function(response)
                        {
      
                            nameErr.text(response.companyName ? response.companyName.message : '');
                            phoneErr.text(response.phone ? response.phone.message : '');
                            siteErr.text(response.website ? response.website.message : '');
                            addressErr.text(response.address ? response.address.message : '');
                            currencyErr.text(response.currency ? response.currency.message : '');
                            pageErr.text(response.page ? response.page.message : '');
                            typeErr.text(response.type ? response.type.message : '');

                        if (response.success) {
                        alert(response.message);
                        window.location.reload();
                        
                                }
                        }
                        });
                    });
                    });
                </script>

<?= $this->endSection() ?>