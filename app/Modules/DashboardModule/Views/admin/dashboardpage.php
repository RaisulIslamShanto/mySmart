
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<!-- <div class="page-content">
    <div> <?//php echo "Hello"?> </div>
    <div> <?//php echo "Hello"?> </div> 

</div> -->
<div class="page-content"> 
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?//php echo lang('admin/owner.o_e_f'); ?></li>
                        </ol>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- end page title -->

        
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h4 class="mb-sm-0"><?=$income?></h4>
                    <h6 class="mb-sm-0">Income this Month</h6>
                    </div>
                </div>
            </div>
       
        
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h4 class="mb-sm-0"><?=$expense?></h4>
                    <h6 class="mb-sm-0">Expense this month</h6>
                    </div>
                </div>
            </div>
        
        
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h4 class="mb-sm-0"><?= $totalAmountBalance?></h4>
                    <h6 class="mb-sm-0">Total account balance</h6>
                    </div>
                </div>
            </div>
        
        
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h4 class="mb-sm-0"><?=$totallend?></h4>
                    <h6 class="mb-sm-0">Total lend amount</h6>
                    </div>
                </div>
            </div>
        
        
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h4 class="mb-sm-0"><?=$totalborrow?></h4>
                    <h6 class="mb-sm-0">Total borrow amount</h6>
                    </div>
                </div>
            </div>
        
        
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h1 class="mb-sm-0"><?=$bankaccount?></h1>
                    <h6 class="mb-sm-0">Total bank account</h6> 
                    </div>
                </div>
            </div>
       
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card text-center">
                    <div class="card-body">
                    <canvas id="oilChart" width="600" height="400"></canvas>
                    <h6 class="mb-sm-0">Income this Month</h6>
                    </div>
                </div>
            </div>
       
        
            <div class="col-md-5">
                <div class="card text-center">
                    <div class="card-body">
                    <button  style='width: 50px; height: 50px;' class="btn btn-primary"><i class="ri-exchange-dollar-line"></i></button>
                    <h4 class="mb-sm-0">Expense categories vs budget</h4>
                    <h6 class="mb-sm-0">No data available</h6>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="card mb-4">
                                <h4>Active Budget Information</h4>
                                <table class="table table-striped" id="tablemain">
                                    <thead class="thead-dark">
                                        <tr>
                                       
                                        <th scope="col">Budget Name</th>
                                        <th scope="col">Proposed Amount</th>
                                        <th scope="col">Available Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($budgetlist as $val):?>
                                        <tr>
                                            
                                            <td><?= $val['budget_name']?></td>
                                            <td><?= $val['budget_amount']?></td>
                                            <td><?= $val['budget_amount']?></td>

                                        </tr>
                                        <?php endforeach?>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="card mb-4">
                                <h4>Number of account transfer in this month</h4>
                                <table class="table table-striped" id="tablemain">
                                    <thead class="thead-dark">
                                        <tr>
                                       
                                        <th scope="col">From Account</th>
                                        <th scope="col">To Account</th>
                                        <th scope="col">Transferred Amount</th>
                                        <th scope="col">Transfer Date</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php foreach($balanceData as $value):?>
                                        <tr>
                                            <!-- $value->from_account -->
                                            <td><?= $value['from_bank']['account_number'].'-'. $value['from_bank']['banktable']->bank_name?></td>
                                            <td><?= $value['to_bank']['account_number'].'-'. $value['to_bank']['banktable']->bank_name?></td>
                                            <td><?= $value['amount']?></td>
                                            <td><?= $value['transfer_date']?></td>
                                        </tr>
                                        <?php endforeach?>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
$(document).ready(function(){

       
    $('#addnewbtn').click(function ()
    {
        // alert('hi');
        $('#catmodal').modal('show');
       

        $('#save').click(function (e){
            e.preventDefault();

            var categoryName = $("#categoryName").val();
            var categoryType = $("#categoryType").val();

            console.log(categoryType);

            $.ajax({
                type: 'POST',
                url: 'savecategory',
                data: {
                categoryName: categoryName,
                categoryType: categoryType
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    // window.location.reload();
                },
                
            });

        });
            
    });

    $('.edit').click(function(event)
    {
        event.preventDefault();

        var id = $(this).attr('value');

        // alert(id);
        // console.log(id);

        $.ajax({

                url: "editcat",

                type: 'Post',

                data: {id : id},

                dataType: 'json',

                success: function(response){
                    // alert(response[1]);
                    console.log(response);
                    // $("#id").val(response.id);
                    
                    $("#catid").val(response[0].categoryId);
                    $("#categoryN").val(response[0].categoryName);
                    $("#categoryType").val(response[0].categoryType);
                    
                    $('#updatemodal').modal('show');
                },
            });
    });


    $('body').delegate("#update", "click" ,function(e){
            e.preventDefault();

            var catId = $("#catid").val();
            var categoryName = $("#categoryName").val();
            var categoryType = $("#categoryType").val();
            
            $.ajax({
                type: 'POST',
                url: 'updatecat/'+catId,
                data:  {
                categoryName: categoryName,
                categoryType: categoryType
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    window.location.reload();
                },
                
        });
        
    });

});

const ctx = document.getElementById('oilChart');

new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: '# of Votes',

      <?php foreach($chartvalue as $value):?>

      data:[<?= $value['amount']?>],
    //   data: [12, 19, 3, 5, 2, 3],

      <?php endforeach?>
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Pie Chart'
      }
    }
  }
});
</script>

<?php echo $this->endSection('content') ?>

