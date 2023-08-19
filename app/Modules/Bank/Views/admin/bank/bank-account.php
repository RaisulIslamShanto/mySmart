<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>



<!-- For New Bank Account modal -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new bank account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="form-group">
                        <label for="holderName">Account holders Name:</label>
                        <input type="text" class="form-control" id="holderName" name="holderName" placeholder="Account holders Name..">
                        <span style="color:red;" id="holderErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="bankname">Bank Name:</label>
                            <select class="select" id="BankName" name="BankName">
                                <option value="">--Select a Bank Account--</option>
                                <?php foreach ($banklist as $value1): ?>
                                 <option value="<?php echo $value1['id']; ?>"><?php echo $value1['bank_name']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        <span style="color:red;" id="banknameErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="accountNumber">Account Number:</label>
                        <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Account Number..">
                        <span style="color:red;" id="accErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="InitialBalance">Initial Balance:</label>
                        <input type="text" class="form-control" id="InitialBalance" name="InitialBalance" placeholder="Balance..">
                        <span style="color:red;" id="BalanceErr"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal End -->


<!-- Edit Modal Start -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Bank Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="myeditForm" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="holderName">Account holders Name:</label>
                        <input type="text" class="form-control" id="holderNameInput" name="holderName">
                        <span style="color:red;" id="holderrErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="bankname">Bank Name:</label>
                            <select class="select" id="BankNameInput" name="BankName">
                                <?php foreach ($banklist as $value1): ?>
                                 <option value="<?php echo $value1['id']; ?>"><?php echo $value1['bank_name']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        <span style="color:red;" id="banknameeErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="accountNumber">Account Number:</label>
                        <input type="text" class="form-control" id="accountNumberInput" name="accountNumber">
                        <span style="color:red;" id="acccErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="InitialBalance">Initial Balance:</label>
                        <input type="text" class="form-control" id="InitialBalanceInput" name="InitialBalance">
                        <span style="color:red;" id="BalanceeErr"></span>
                    </div>
                      <input type="hidden" name="id" id="idInput" value="">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save" id="abc">Save Changes</button>
                  </div>
                </div>
              </div>
            </div>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
       
        
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body ">
                    <h4>You need to create a bank before add a bank account, if you haven't added a bank yet, <a href="<?php echo base_url() ?>/admin/bank_list"><u><b>Click Here</b></u></a>  to create a bank first.</h4>

                    <div class="sidebar-header">
                        <button type="button" class="btn btn-primary" id="openModalBtn">Add new bank account</button>
                        </div>
                        <div class="table-responsive ser_staffpayment_append">   
                        <table id="accountlist" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>USER NAME</th>
                                <th>ACCOUNT HOLDER NAME</th>
                                <th>BANK NAME</th>
                                <th>ACCOUNT NUMBER</th>
                                <th>AVAILABLE BALANCE</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $value): ?>
                              
                                <tr>
                                    <td><?=$username?></td>
                                    <td><?= $value['account_holders_name']?></td>
                                    <td><?= $value['bank']->bank_name?></td>
                                    <td><?= $value['account_number']?></td>
                                    <td><?//= $settingdata['default_currency']; ?>BDT <?= $value['initial_balance']?></td>
                                    <td>
                                    
                                    <a href="#" class="btn btn-warning btn-sm editButton" data-id="<?php echo $value['id']; ?>">
                                    <i class="fa fa-pencil"></i> Edit
                                    </a>
                                        <!-- <button class="btn btn-primary btn-sm">Edit</button> -->
                                        
                                    <a href="#" class="btn btn-danger btn-sm Deletebtn" data-id="<?php echo $value['id']; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                    </a>
                                        <!-- <button class="btn btn-danger btn-sm">Delete</button> -->
                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
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
    <!-- container-fluid -->
</div>


<!-- End Page-content -->

<!-- end main content-->

<script>
$(document).ready(function() {
    $('#accountlist').DataTable({
        searchHighlight: true, 
        columnDefs: [
            { type: 'highlight', targets: '_all' } 
        ]
    });
});
</script>



<script>
        $(document).ready(function() {

            $("#openModalBtn").click(function() {
                $("#myModal").modal("show");
            });
        $("#submitBtn").click(function() {
                    
                    var holderErr = $('#holderErr');
                    var banknameErr = $('#banknameErr');
                    var accErr = $('#accErr');
                    var BalanceErr = $('#BalanceErr');

                    // var formData = $("#myForm").serialize();
                    // console.log(formData);
                        $.ajax({
                        url: " <?php echo base_url('/admin/bank_account_add') ?> ",
                        type: 'POST',
                        data: $("#myForm").serialize(),
                        dataType: "json",
                        success: function(response) {
                            holderErr.text(response.holderName ? response.holderName.message : '');
                            banknameErr.text(response.BankName ? response.BankName.message : '');
                            accErr.text(response.accountNumber ? response.accountNumber.message : '');
                            BalanceErr.text(response.InitialBalance ? response.InitialBalance.message : '');

                            if (response.success) {
                            alert(response.success.message);
                            $('#myForm')[0].reset();
                            window.location.reload();
                            }
                        }
                        });
        
            });
        });
        </script>




<!-- For Edit Bank Account -->



<script>
              $(document).ready(function() {
              $('.editButton').click(function() {
                  var editaccid = $(this).data('id');
                //   console.log(editaccid);
                //   alert(editaccid);
                //   $('.save').data('id', editid);

                  $.ajax({
                      url: "<?php echo base_url('/admin/account_list_edit/') ?>" + editaccid,
                      type: "GET",
                      dataType: "json",
                      success: function(response) {
                          $('#holderNameInput').val(response.account_holders_name);
                          $('#accountNumberInput').val(response.account_number);
                          $('#InitialBalanceInput').val(response.initial_balance);
                          $('#BankNameInput').val(response.bank_name_id);
                          $('#idInput').val(response.id);
                          $('#abc').attr("data-id", editaccid);
                          $('#editModal').modal('show');
                      }
                  });
              });

              $('.save').click(function() {
                var edituserid = $(this).attr('data-id');
                  console.log(edituserid);
                    var holderrErr = $('#holderrErr');
                    var banknameeErr = $('#banknameeErr');
                    var acccErr = $('#acccErr');
                    var BalanceeErr = $('#BalanceeErr');

                  $.ajax({
                      url: "<?php echo base_url('/admin/account_list_update/') ?>" + edituserid,
                      type: "POST",
                      data:$("#myeditForm").serialize(),
                      dataType: "json",
                      success: function(response) {
                            holderrErr.text(response.holderName ? response.holderName.message : '');
                            banknameeErr.text(response.BankName ? response.BankName.message : '');
                            acccErr.text(response.accountNumber ? response.accountNumber.message : '');
                            BalanceeErr.text(response.InitialBalance ? response.InitialBalance.message : '');
                          if (response.success) {
                              alert(response.message);
                              $('#editModal').modal('hide');
                              window.location.reload();
                          }
                      }
                  });
              });
          });
        </script>


<!-- For Delete Bank Account -->

<script>
$(document).ready(function() {
    $('.Deletebtn').click(function(e) {
        e.preventDefault();
        var baId = $(this).data('id');
        console.log (baId);
        $.ajax({
            url: "<?php echo base_url('/admin/bank_account_delete/') ?>" + baId,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    window.location.reload();
                } else {
                    alert(response.message);
                }
            },
           
        });
    });
});
</script>



<?= $this->endSection() ?>