<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>




<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
       
        <!-- end page title -->
        <div>
            <form method="POST" action="<?php echo base_url() ?>/admin/expenses_report_filter"> 
                <label for="from">Start Date</label>
                <input type="text" id="from" name="from" required>
                <label for="to">End Date</label>
                <input type="text" id="to" name="to" required>
                <input type="hidden" id="start_date_hidden" name="start_date_hidden">
                <input type="hidden" id="end_date_hidden" name="end_date_hidden">
                <input type="submit" name="submit" id="filterBtn" value="Filter">
            </form>
        </div>
        <br> </br>
        <!-- <div class="form-group">
            <label for="Startdate">Start Date:</label>
            <input type="text" class="form-control" id="Startdate" name="Startdate" placeholder="Start Date..">
        </div>
        <div class="form-group">
            <label for="Enddate">End Date:</label>
            <input type="text" class="form-control" id="Enddate" name="Enddate" placeholder="End Date..">
        </div>

        <button type="button" class="btn btn-primary" id="openModalBtn">Filter</button> -->

                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="card">
                            <div class="card-body ">
                            <div class="sidebar-header">
                            <div class="col-md-12">
                        </div>
                        </div>
                        <div class="table-responsive ser_staffpayment_append">   
                        <table id="expenseslist" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($expenseslist as $value): ?>
                                <tr>
                                    <td><?= $value['expense_category']?></td>
                                    <td>BDT <?= $value['amount']?></td>
                                    <td><?= $value['date']?></td>
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
          $(function() {
              var dateFormat = "mm/dd/yy",
                  from = $("#from").datepicker({
                      defaultDate: "+1w",
                      changeMonth: true,
                      numberOfMonths: 1,
                  }),
                  to = $("#to").datepicker({
                      defaultDate: "+1w",
                      changeMonth: true,
                      numberOfMonths: 1,
                  });

              function getDate(element) {
                  var date;
                  try {
                      date = $.datepicker.parseDate(dateFormat, element.value);
                  } catch (error) {
                      date = null;
                  }
                  return date;
              }

              function filterTableRows() {
                  var startDate = getDate(from[0]);
                  var endDate = getDate(to[0]);

                  $("#expenseslist tr").each(function() {
                      var rowDate = new Date($(this).find("td:nth-child(3)").text());
                      if ((isNaN(startDate) && isNaN(endDate)) || (isNaN(startDate) && rowDate <= endDate) || (startDate <= rowDate && isNaN(endDate)) || (startDate <= rowDate && rowDate <= endDate)) {
                          $(this).show();
                      } else {
                          $(this).hide();
                      }
                  });
              }

              $("#filterBtn").click(function(event) {
                  event.preventDefault();
                  filterTableRows();
              });

              $("#expensesTableBody tr").show();
          });
        </script>


       <!-- <script>
            $(function(){
                $("#Startdate").datepicker();
            });
        </script>

        <script>
            $(function(){
                $("#Enddate").datepicker();
            });
        </script> -->


<?= $this->endSection() ?>