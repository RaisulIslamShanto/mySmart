
<?php echo $this->extend('\Modules\Master\Views\master') ?>
<?php echo $this->section('content') ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Income Report</h4>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                        
                                <form id="reportfilter" action="<?= base_url('admin/insertuser') ?>" method="POST"  >
                                    <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" >       
                                        </div>   
                                        <div class="col-md-6 mt-4">
                                            <label>End Date</label>
                                            <input type="date" class="form-control" id="enddate" name="enddate" >       
                                        </div> 
                                        <div class="col-md-2 mt-4">
                                            <button type="submit" id="filter" class="btn btn-danger">Filter</button> 
                                        </div> 
                                    </div>
                                </form>

                                <table class="table table-striped" id="tablemain">
                                    <thead class="thead-dark">
                                        <tr>
                                       
                                        <th scope="col">Income Category</th>
                                        <th scope="col">Income Amount</th>
                                        <th scope="col">Income Date</th>

                                        </tr>
                                    </thead>
                                    <tbody id="filterdata">
                                        <?php foreach($data as $value):?>
                                            <tr>
                                                
                                                <td><?= $value['categoryName']?></td>
                                                <td><?= $value['amount']?></td>
                                                <td><?= $value['date']?></td>
                                                
                                            </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>

                        
                        
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
<script>
    
$(document).ready(function(){
   
    $('#reportfilter').on("submit",function(e)
    {
        // alert('hi');
        e.preventDefault();

            var startdate = $("#startdate").val();
            var enddate = $("#enddate").val();
            
            $.ajax({
                type: 'POST',
                url: 'filterincome',
                data: {
                    startdate: startdate,
                    enddate: enddate,
                },

                dataType: 'json',

                success: function (data) {

                    console.log(data);

                    var tabledata = '';

                    for (var i = 0; i < data.length; i++) {

                         tabledata += `
                                        
                                            <tr>
                                                
                                                <td>${data[i].categoryName}</td>
                                                <td>${data[i].amount}</td>
                                                <td>${data[i].date}</td>
                                                
                                            </tr>
                                       
                                    `;

                    }

                    $('#filterdata').html(tabledata);
                    
            //     success: function (data) {
                
            //     console.log(data);
            //     var selectOptions = '<option value="0">Select an income category</option>';

            //     // for (var i = 0; i < data.length; i++) {
            //     //     selectOptions += '<option value="' + data[i].id + '">' + data[i].catname + '</option>';
            //     // }
                
            //     for (var i = 0; i < data.length; i++) {
            //         selectOptions += `<option value="${data[i].categoryId}">${data[i].categoryName}</option>`
            //     }


            //     $('#incomeCategory').html(selectOptions);
            // },
                             
                    // alert(response.message);
                    // window.location.reload();
                },
                
            });

    });




    $('#addnewbtn').click(function ()
    {
        // alert('hi');
        $('#bankmodal').modal('show');
       
        $('#save').click(function (e){
            e.preventDefault();

            var bank = $("#bank").val();
            
            $.ajax({
                type: 'POST',
                url: 'savebank',
                data: {
                    bank: bank,
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    window.location.reload();
                },
                
            });

        });
            
    });

    $('.edit').click(function (event)
    {
        event.preventDefault();

        var id = $(this).attr('value');

        // alert(id);
        // console.log(id);

        $.ajax({

                url: "editbank",

                type: 'Post',

                data: {id : id},

                dataType: 'json',

                success: function(response){

                    console.log(response);
                    // $("#id").val(response.id);
                   
                    $("#bankid").val(response[0].bankid);
                    $("#bank").val(response[0].bank);
                    
                    $('#bankmodal').modal('show');
                },
            });
    });


    $('body').delegate("#save", "click" ,function (e){
            e.preventDefault();

            var bankid = $("#bankid").val();
            var bank = $("#bank").val();
            

            $.ajax({
                type: 'POST',
                url: 'updatebank/'+bankid,
                data: {
                    bank: bank,  
                },

                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    window.location.reload();
                },
                
        });
        
    });


    
            
  






});

</script>

<?php echo $this->endSection('content') ?>

