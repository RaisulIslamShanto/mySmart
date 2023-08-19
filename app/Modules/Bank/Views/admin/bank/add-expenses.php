<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>


<div class="page-content">
    
    <div class="container-fluid">

        <!-- start page title -->
       
        <h1>Add New expense</h1>
        <!-- end page title -->
       

        <div class="row">
            <div class="col-lg-12">
                
            <div class="modal-body">
            <form action="<?php echo base_url() ?>/admin/expenses_add" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                  
                    <div class="form-group">
                        <label for="Category">Expense Category:</label>
                        <select class="select" id="Category" name="Category">
                                <option value="">--Select a Bank Account--</option>
                                <option value="abc">abc</option>
                                <option value="def">def</option>
                            </select> 
                        <span style="color:red;" id="catErr"></span>
                    </div>
                    <div class="form-group">
                    <label for="password">Select Bank Account:</label>
                            <select class="select" id="ToAccount" name="ToAccount">
                                <option value="">--Select a Bank Account--</option>
                                <?php foreach ($data as $value1): ?>
                                 <option value="<?php echo $value1['id']; ?>"><?php echo $value1['bank']->bank_name.'-'. $value1['account_number'].'-Balance-'.$value1['initial_balance']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        <span style="color:red;" id="accErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Amount">Amount:</label>
                        <input type="number" class="form-control" id="Amount" name="Amount">
                        <span style="color:red;" id="amountErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Reference">Reference:</label>
                        <input type="text" class="form-control" id="Reference" name="Reference">
                        <span style="color:red;" id="ReferenceErr"></span>
                    <div class="form-group">
                        <label for="note">Description:</label>
                        <textarea type="text" class="form-control" id="Description" name="Description"></textarea>
                        <span style="color:red;" id="desErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <textarea type="text" class="form-control" id="note" name="note"></textarea>
                        <span style="color:red;" id="noteErr"></span>
                    </div>
                    <div class="form-group">
                          <label for="Attachment">Add Attachment:</label>
                          <input type="file" name="Attachment" class="form-control" id="Attachment">
                          <span style="color:red;" id="AttachmentErr"></span>
                     </div>
                     <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="text" class="form-control" id="date" name="date">
                        <span style="color:red;" id="dateErr"></span>
                     </div>
                     <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                     </div>
                </form>
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
        $("#date").datepicker();
    });
  </script>


<?= $this->endSection() ?>