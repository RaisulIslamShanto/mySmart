<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>



<!-- For New Bank Account modal -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="form-group">
                        <label for="BankName">Bank Name:</label>
                        <input type="text" class="form-control" id="BankName" name="BankName" placeholder="Bank Name..">
                        <span style="color:red;" id="bankErr"></span>
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

<!-- For Edit Modal -->

<!-- <div class="modal" id="myeditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myFormm">
                    <div class="form-group">
                        <label for="BankName">Bank Name:</label>
                        <input type="text" class="form-control" id="BankName" name="BankName" placeholder="Bank Name..">
                        <span style="color:red;" id="bankErr"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="myeditForm" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="BankName">Bank Name:</label>
                        <input type="text" class="form-control" id="BankNameEdit" name="BankName" value="">
                        <span style="color:red;" id="bankkErr"></span>
                    </div>
                      <input type="hidden" name="id" id="idInput" value="">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save" id="abc" >Save Changes</button>
                  </div>
                </div>
              </div>
            </div>
          

<!--Edit Modal End -->


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
       
        
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body ">
                    <div class="sidebar-header">
                        <button type="button" class="btn btn-primary" id="openModalBtn">Add new bank</button>
                        </div>
                        <div class="table-responsive ser_staffpayment_append">   
                        <table id="banklist" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Bank NAME</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($banklist as $value): ?>
                                <tr>
                                    <td><?= $value['bank_name']?></td>
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
    $('#banklist').DataTable({
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
                        
                        var bankErr = $('#bankErr');
                        var formData = $("#myForm").serialize();
                        // console.log(formData);
                            $.ajax({
                            url: "<?php echo base_url('/admin/bank_list_add'); ?>",
                            type: 'POST',
                            data: formData,
                            dataType: "json",
                            success: function(response) {
                                bankErr.text(response.BankName ? response.BankName.message : '');

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







         <script>
              $(document).ready(function() {
              $('.editButton').click(function() {
                // alert('abc');
                // return false;
                  var editbankid = $(this).data('id');
                  console.log(editbankid);
                //   $('.save').data('id', editbankid);

                  $.ajax({
                      url: "<?php echo base_url('/admin/bank_list_edit/') ?>" + editbankid,
                      type: "GET",
                      dataType: "json",
                      success: function(response) {
                          $('#BankNameEdit').val(response.bank_name);
                          $('#idInput').val(response.id);
                          $('#abc').attr("data-id", editbankid);
                          $('#editModal').modal('show');
                      }
                  });
              });

              $('.save').click(function() {
                // alert('abc');
                var updatebankid = $(this).attr('data-id');
                  console.log(updatebankid);
                //   var name = $('#BankNameEdit').val();
                  var bankkErr = $('#bankkErr');

                  $.ajax({
                      url: "<?php echo base_url('/admin/bank_list_update/') ?>" + updatebankid,
                      type: "POST",
                      data:$("#myeditForm").serialize(),
                      dataType: "json",
                      success: function(response) {
                        bankkErr.text(response.BankName ? response.BankName.message : '');
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





<script>
    $(document).ready(function() {
        $('.Deletebtn').click(function(e) {
            e.preventDefault();
            var BlId = $(this).data('id');
            console.log (BlId);
            $.ajax({
                url: "<?php echo base_url('/admin/bank_list_delete/') ?>" + BlId,
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