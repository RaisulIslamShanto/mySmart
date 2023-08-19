<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                    <img style="height:100px;width:100px;border-radius:50%;"
                    src="<?php echo base_url();?>/admin/assets/images/pr1.jpg">
                    <h4>Home</h4>
                    <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>
                </div>

                <div>
                    <div>
                        <h2 style="text-align:center;">Rent Pdf Generate</h2>
                        <div>
                            <table style="font-size: 10px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.date'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.name'); ?> </th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.year'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.month'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.floor'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.unit'); ?></th>

                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.bill'); ?></th>

                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.type'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/rented.total'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   //print_r($all_rents);
                                    foreach ($all_rents as $rent) {

                                    ?>
                                        <tr>
                                            <td style="border: 1px solid #ddd;"><?= date_formats($rent->issue_date); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $rent->renter_name; ?> </td>
                                            <td style="border: 1px solid #ddd;"><?= $rent->year; ?> </td>
                                            <td style="border: 1px solid #ddd;"><?= $rent->month; ?> </td>
                                            
                                            <td style="border: 1px solid #ddd;"><?= $rent->floor_name; ?> </td>
                                            <td style="border: 1px solid #ddd;"><?= $rent->unit_name; ?> </td>

                                            <td style="border: 1px solid #ddd;">
                                                <table style="font-size: 3px; text-align:center;">
                                                    <hr>
                                                    <tr>
                                                        <td><?php echo lang('report/rented.g_b'); ?></td>
                                                        <td>:</td>
                                                        <td><?php currency($rent->gas_bill); ?></td>
                                                    </tr>
                                                    <hr>
                                                    <tr>
                                                        <td><?php echo lang('report/rented.e_b'); ?></td>
                                                        <td>:</td>
                                                        <td><?php currency($rent->electric_bill); ?></td>
                                                    </tr>
                                                    <hr>
                                                    <tr>
                                                        <td><?php echo lang('report/rented.w_b'); ?></td>
                                                        <td>:</td>
                                                        <td><?php currency($rent->water_bill); ?></td>
                                                    </tr>
                                                    <hr>
                                                    <tr>
                                                        <td><?php echo lang('report/rented.s_b'); ?></td>
                                                        <td>:</td>
                                                        <td><?php currency($rent->security_bill); ?></td>
                                                    </tr>
                                                    <hr>
                                                    <tr>
                                                        <td><?php echo lang('report/rented.u_b'); ?></td>
                                                        <td>:</td>
                                                        <td><?php currency($rent->utility_bill); ?></td>
                                                    </tr>
                                                    <hr>
                                                    <tr>
                                                        <td><?php echo lang('report/rented.o_b'); ?></td>
                                                        <td>:</td>
                                                        <td><?php currency($rent->other_bill); ?></td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td style="border: 1px solid #ddd;"><?php if ($rent->bill_status == 1) {
                                                    echo "Paid";
                                            } else {
                                                    echo "Due";
                                            } ?>
                                            </td>
                                            <td style="border: 1px solid #ddd;"><?php currency($rent->rent); ?></td>
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