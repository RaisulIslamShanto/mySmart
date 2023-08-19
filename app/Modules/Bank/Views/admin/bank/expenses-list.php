<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>




<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
       
        
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body ">
                    <div class="sidebar-header">
                    <div class="col-md-12">
                    <a href="<?php echo base_url() ?>/admin/expenses_add" class="btn btn-info"><i class="fa fa-plus"></i> Add new</a>
                    
                </div>
                        <!-- <button type="button" class="btn btn-primary" id="openModalBtn">Add New</button> -->
                        </div>
                        <div class="table-responsive ser_staffpayment_append">   
                        <table id="expenseslist" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Bank Account Number</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Attached</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($myexpData as $value): ?>
                                <tr>

                                    <td><?=$username?></td>
                                    <td><?= $value['exp']->account_number?></td>
                                    <td><?= $value['expense_category']?></td>
                                    <td>BDT <?= $value['amount']?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('expensesAttachment/' . $value['add_attachment']); ?>" download class="btn btn-success btn-sm">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td><?= $value['description']?></td>
                                    <td><?= $value['date']?></td>
                                    <td>
                                    <a href="<?= base_url() ?>/admin/expenses_list_edit/<?= $value['id']; ?>" class="btn btn-warning btn-sm editButton" data-id="<?php echo $value['id']; ?>">
                                    <i class="fa fa-pencil"></i> Edit
                                    </a>
                                        <!-- <button class="btn btn-primary btn-sm">Edit</button> -->
                                        
                                    <a href="<?= base_url() ?>/admin/expenses_delete/<?= $value['id']; ?>" class="btn btn-danger btn-sm Deletebtn">
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
    $('#expenseslist').DataTable({
        searchHighlight: true, 
        columnDefs: [
            { type: 'highlight', targets: '_all' } 
        ]
    });
});
</script>

<?= $this->endSection() ?>