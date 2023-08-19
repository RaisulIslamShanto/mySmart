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
                        <h5 style="text-align:center;"><?php echo lang('report/fund.f_report'); ?></h5>
                        <div>
                            <table style="font-size: 10px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>            
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.image'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.date'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.owner_name'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.month'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.year'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.purpose'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($funds as $fund) {
                                    ?>
                                        <tr>
                                            <td style="border: 1px solid #ddd;"> <img height="20px" src="<?php
                                            if ($fund->owner_image == 'empty_image.jpg') {
                                                echo base_url(); ?>/admin/assets/images/<?= $fund->owner_image;
                                            } else {                                                                                                         echo base_url(); ?>/admin/assets/owner_image/thumbnail/<?= $fund->owner_image;} ?>"                                                                             data-holder-rendered="true">
                                            </td>
                                            <td style="border: 1px solid #ddd;"><?= date_formats($fund->issue_date); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $fund->owner_name; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $fund->month; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $fund->year; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $fund->purpose; ?></td>
                                            <td style="border: 1px solid #ddd;"><?php currency($fund->total_amount); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="border: 1px solid #ddd;">&nbsp;</th>
                                        <th style="border: 1px solid #ddd;">&nbsp;</th>
                                        <th style="border: 1px solid #ddd;">&nbsp;</th>
                                        <th style="border: 1px solid #ddd;">&nbsp;</th>
                                        <th style="border: 1px solid #ddd;">&nbsp;</th>
                                        <th style="border: 1px solid #ddd;">&nbsp;</th>
                                        <th style="border: 1px solid #ddd; color: red;">
                                            <?php
                                            foreach ($funds_total as $fund) {
                                                echo currency($fund->total_amount);
                                            }
                                            ?>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>

     
                <div>
                    <h5 style="text-align:center;"><?php echo lang('report/fund.m_c_s'); ?></h5>
                    <div>
                        <table style="font-size: 10px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.c_t'); ?></th>
                                    <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.date'); ?></th>
                                    <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.details'); ?></th>
                                    <th style="border: 1px solid #ddd;"><?php echo lang('report/fund.amount'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($maintenences as $maintenence) {
                                ?>

                                    <tr>
                                        <td style="border: 1px solid #ddd;"><?= $maintenence['maintitle']; ?></td>
                                        <td style="border: 1px solid #ddd;"><?= date_formats($maintenence['maindate']); ?></td>
                                        <td style="border: 1px solid #ddd;"><?= $maintenence['maindetails']; ?></td>
                                        <td style="border: 1px solid #ddd;"><?= $maintenence['mainamount']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="border: 1px solid #ddd;">&nbsp;</th>
                                    <th style="border: 1px solid #ddd;">&nbsp;</th>
                                    <th style="border: 1px solid #ddd;">&nbsp;</th>
                                    <th style="border: 1px solid #ddd; color: red;"><?php
                                    foreach ($maintenences_total as $maintenences_totals) {
                                        echo $maintenences_totals->mainamount;
                                    }
                                    ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
     

                <!-- end card -->
                <div>
                    <h2 style="text-align:center;"><?php echo lang('report/fund.r_b'); ?></h2>
                    <div>
                        <table style="font-size: 10px" border="1">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #ddd; color:red"><?php
                                    $Remain_bal = $fund->total_amount - $maintenences_totals->mainamount;
                                    echo $Remain_bal;
                                    ?>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</body>

</html>