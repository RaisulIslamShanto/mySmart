<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>



<!-- For New Bank Account modal -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Debts</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="amount..">
                        <span style="color:red;" id="amountErr"></span>
                    </div>

                    <div class="form-group">
                        <label for="Type">Select Type:</label>
                            <select class="select" id="Type" name="Type">
                                <option value="">--Select Type--</option>
                                <option value="Lend">Lend</option>
                                <option value="Borrow">Borrow</option>
                            </select> 
                        <span style="color:red;" id="TypeErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="BankAccount">Select Bank Account:</label>
                            <select class="select" id="BankAccount" name="BankAccount">
                                <option value="">--Select a Bank Account--</option>
                                <?php foreach ($data as $value1): ?>
                                 <option value="<?php echo $value1['id']; ?>"><?php echo $value1['bank']->bank_name.'-'. $value1['account_number'].'-Balance-'.$value1['initial_balance']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        <span style="color:red;" id="BankErr"></span>
                    </div>

                    <div class="form-group">
                        <label for="Person">Person:</label>
                        <input type="text" class="form-control" id="Person" name="Person" placeholder="Person..">
                        <span style="color:red;" id="PersonErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="Transfer Date..">
                        <span style="color:red;" id="dateErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="InitialBalance">Note:</label>
                        <input type="text" class="form-control" id="note" name="note" placeholder="note..">
                        <span style="color:red;" id="noteErr"></span>
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



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
       
        
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body ">
                    <div class="sidebar-header">
                        <button type="button" class="btn btn-primary" id="openModalBtn">Add New</button>
                        </div>
                        <br></br>
                        <div class="table-responsive ser_staffpayment_append">   
                        <table id="debtslist" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>AMOUNT</th>
                                <th>TYPE</th>
                                <th>ACCOUNT</th>
                                <th>PERSON</th>
                                <th>DATE</th>
                                <th>NOTE</th>
                                <th>ACTIONS</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($debtsData as $value): ?>
                                <tr>
                                    <td>BDT <?= $value['amount']?></td>
                                    <td><?= $value['select_type']?></td>
                                    <td><?= $value['bank']->bank_name?></td>
                                    <td><?= $value['person']?></td>
                                    <td><?= $value['date']?></td>
                                    <td><?= $value['note']?></td>
                                    <td>
                                    <!-- <a href="#" class="btn btn-warning btn-sm editButton" data-id="<?php echo $value['id']; ?>">
                                    <i class="fa fa-pencil"></i> Manage
                                    </a> -->
                                    <a href="<?php echo base_url('/admin/debts_loans_edit/'. $value['id']); ?>" class="btn btn-warning btn-sm editbtn">
                                    <i class="fa fa-pencil"></i> Manage
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm Deletebtn" data-id="<?php echo $value['id']; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                    </a>
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
    $('#debtslist').DataTable({
        searchHighlight: true, 
        columnDefs: [
            { type: 'highlight', targets: '_all' } 
        ]
    });
});
</script>

   <script>
    $(function(){
        $("#date").datepicker();
    });
  </script>


<script>
        $(document).ready(function() {

            $("#openModalBtn").click(function() {
                $("#myModal").modal("show");
            });
        $("#submitBtn").click(function() {
                    
                    var amountErr = $('#amountErr');
                    var BankErr = $('#BankErr');
                    var TypeErr = $('#TypeErr');
                    var PersonErr = $('#PersonErr');
                    var dateErr = $('#dateErr');
                    var noteErr = $('#noteErr');

                    // var formData = $("#myForm").serialize();
                    // console.log(formData);
                        $.ajax({
                        url: " <?php echo base_url('/admin/debts_loans_add') ?> ",
                        type: 'POST',
                        data: $("#myForm").serialize(),
                        dataType: "json",
                        success: function(response) {
                            amountErr.text(response.amount ? response.amount.message : '');
                            BankErr.text(response.BankAccount ? response.BankAccount.message : '');
                            TypeErr.text(response.Type ? response.Type.message : '');
                            PersonErr.text(response.Person ? response.Person.message : '');
                            dateErr.text(response.date ? response.date.message : '');
                            noteErr.text(response.note ? response.note.message : '');
                            if (response.success) {
                            alert(response.success.message);
                            $('#myForm')[0].reset();
                            window.location.reload();
                            }
                            else if (response.error) {
                                alert(response.error.message);
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
        var debtsId = $(this).data('id');
        console.log (debtsId);
        $.ajax({
            url: "<?php echo base_url('/admin/debts_loans_delete/') ?>" + debtsId,
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