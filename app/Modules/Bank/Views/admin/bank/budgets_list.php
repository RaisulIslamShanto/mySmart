<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>



<!-- For New Budgets modal -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Budget</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="form-group">
                        <label for="budgetName">Budget Name:</label>
                        <input type="text" class="form-control" id="budgetName" name="budgetName" placeholder="budget Name..">
                        <span style="color:red;" id="budErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Amount">Budget Amount:</label>
                        <input type="text" class="form-control" id="Amount" name="Amount" placeholder="Budget Amount..">
                        <span style="color:red;" id="amoErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Category">Expense Category:</label>
                        <select class="select" id="Category" name="Category">
                                <option value="">--Select Category--</option>
                                <?php foreach ($Categorytable as $value): ?>
                                <option value="<?=$value['categoryName']; ?>"></option>
                                <?php endforeach; ?>
                            </select>  
                        <span style="color:red;" id="catErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Startdate">Start Date:</label>
                        <input type="text" class="form-control" id="Startdate" name="Startdate" placeholder="Start Date..">
                        <span style="color:red;" id="StartdateErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Enddate">End Date:</label>
                        <input type="text" class="form-control" id="Enddate" name="Enddate" placeholder="End Date..">
                        <span style="color:red;" id="EnddateErr"></span>
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
                        <label for="budgetName">Budget Name:</label>
                        <input type="text" class="form-control" id="budgetNameInput" name="budgetName" placeholder="budget Name..">
                        <span style="color:red;" id="budErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Amount">Budget Amount:</label>
                        <input type="text" class="form-control" id="AmountInput" name="Amount" placeholder="Budget Amount..">
                        <span style="color:red;" id="amoErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Category">Expense Category:</label>
                        <select class="select" id="Category" name="Category">
                                <option value="">--Select Category--</option>
                                <?php foreach ($Categorytable as $value): ?>
                                <option value="<?=$value['categoryName']; ?>"></option>
                                <?php endforeach; ?>
                            </select> 
                        <span style="color:red;" id="catErr"></span>
                    </div>
                    <!-- <div class="form-group">
                        <label for="Category">Expense Category:</label>
                        <select class="select" id="Category" name="Category">
                                <option value="">--Select a Bank Account--</option>
                                <option value="abc">abc</option>
                                <option value="def">def</option>
                            </select> 
                        <span style="color:red;" id="catErr"></span>
                    </div> -->
                    <div class="form-group">
                        <label for="Startdate">Start Date:</label>
                        <input type="text" class="form-control" id="StartdateInput" name="Startdate" placeholder="Start Date..">
                        <span style="color:red;" id="StartdateErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="Enddate">End Date:</label>
                        <input type="text" class="form-control" id="EnddateInput" name="Enddate" placeholder="End Date..">
                        <span style="color:red;" id="EnddateErr"></span>
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
                    <div class="sidebar-header">
                        <button type="button" class="btn btn-primary" id="openModalBtn">Add New Budgets</button>  <br> </br>
                        </div>
                        <div class="table-responsive ser_staffpayment_append">   
                        <table id="accountlist" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>BUDGET NAME</th>
                                <th>PROPOSED AMOUNT</th>
                                <th>UPDATED BUDGET AMOUNT</th>
                                <th>BUDGET START DATE</th>
                                <th>BUDGET END DATE</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($budgetslist as $value): ?>
                              
                                <tr>
                                    <td><?= $value['budget_name']?></td>
                                    <td><?= ($value['update_amount'] != '')?$value['update_amount']:$value['budget_amount']?></td>
                                    <td><?= $value['budget_amount']?></td>
                                    <td><?= $value['start_date']?></td>
                                    <td><?= $value['end_date']?></td>
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
            $(function(){
                $("#Startdate").datepicker();
            });
        </script>

        <script>
            $(function(){
                $("#Enddate").datepicker();
            });
        </script>


<script>
        $(document).ready(function() {

            $("#openModalBtn").click(function() {
                $("#myModal").modal("show");
            });
        $("#submitBtn").click(function() {
                    
                    var budErr = $('#budErr');
                    var amoErr = $('#amoErr');
                    var catErr = $('#catErr');
                    var StartdateErr = $('#StartdateErr');
                    var EnddateErr = $('#EnddateErr');

                    // var formData = $("#myForm").serialize();
                    // console.log(formData);
                        $.ajax({
                        url: " <?php echo base_url('/admin/budgets_list_add') ?> ",
                        type: 'POST',
                        data: $("#myForm").serialize(),
                        dataType: "json",
                        success: function(response) {
                            budErr.text(response.budgetName ? response.budgetName.message : '');
                            amoErr.text(response.Amount ? response.Amount.message : '');
                            catErr.text(response.Category ? response.Category.message : '');
                            StartdateErr.text(response.Startdate ? response.Startdate.message : '');
                            EnddateErr.text(response.Enddate ? response.Enddate.message : '');

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
                  var editbudid = $(this).data('id');
                //   console.log(editaccid);
                //   alert(editaccid);
                //   $('.save').data('id', editid);

                  $.ajax({
                      url: "<?php echo base_url('/admin/budgets_list_edit/') ?>" + editbudid,
                      type: "GET",
                      dataType: "json",
                      success: function(response) {
                          $('#budgetNameInput').val(response.budget_name);
                          $('#AmountInput').val(response.update_amount);
                        //   $('#AmountInput').val(response.update_amount != '') ? response.update_amount : response.budget_amount;
                          $('#CategoryInput').val(response.expense_categories);
                          $('#StartdateInput').val(response.start_date);
                          $('#EnddateInput').val(response.end_date);
                          $('#idInput').val(response.id);
                          $('#abc').attr("data-id", editbudid);
                          $('#editModal').modal('show');
                      }
                  });
              });

              $('.save').click(function() {
                var editid = $(this).attr('data-id');
                  console.log(editid);
                //   alert(edituserid);
                    var budErr = $('#budErr');
                    var amoErr = $('#amoErr');
                    var catErr = $('#catErr');
                    var StartdateErr = $('#StartdateErr');
                    var EnddateErr = $('#EnddateErr');
                  $.ajax({
                      url: "<?php echo base_url('/admin/budgets_list_update/') ?>" + editid,
                      type: "POST",
                      data:$("#myeditForm").serialize(),
                      dataType: "json",
                      success: function(response) {
                            budErr.text(response.budgetName ? response.budgetName.message : '');
                            amoErr.text(response.Amount ? response.Amount.message : '');
                            catErr.text(response.Category ? response.Category.message : '');
                            StartdateErr.text(response.Startdate ? response.Startdate.message : '');
                            EnddateErr.text(response.Enddate ? response.Enddate.message : '');
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
            url: "<?php echo base_url('/admin/budgets_list_delete/') ?>" + baId,
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