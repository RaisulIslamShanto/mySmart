<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 100;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }
    </style>

</head>

<body>
    <div class="invoice-box">
        <div>
            <div>
                <div>
                    <img style="height:100px;width:100px;border-radius:50%;" src="<?php echo base_url();?>/admin/assets/images/pr1.jpg">
                    <h4>Home</h4>
                    <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>
                </div>

                <div>
                    <div>
                        <h4 style="text-align: center;"><?php echo lang('report/bill_deposit.b_report'); ?></h4>
                        <div>
                            <table style="font-size: 10px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>            
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.date'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.b_type'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.month'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.year'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.total_amount'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.d_b'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/bill_deposit.details'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($bills as $bill) { ?>
                                        <tr>
                                            <td style="border: 1px solid #ddd;"><?= date_formats($bill['bill_date']); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $bill['bill_type']; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $bill['month']; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $bill['year']; ?></td>
                                            <td style="border: 1px solid #ddd;"><?php currency($bill['total_amount']); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $bill['bank_name']; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $bill['details']; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
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
</body>

</html>