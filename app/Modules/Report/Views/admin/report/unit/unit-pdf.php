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
                <div style="text-align: center;">
                    <img style="height:100px;width:100px;border-radius:50%;" src="<?php echo base_url();?>/admin/assets/images/pr1.jpg">
                    <h4>Home</h4>
                    <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>
                </div>

                <div>
                    <div>
                        <h4 class="card-title mb-4"><?php echo lang('report/Unit_status.unit_headname'); ?></h4>
                        <div>
                            <table style="font-size: 10px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>            
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Unit_status.unit_floor'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Unit_status.unit_unit'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Unit_status.unit_status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($getUnits)) {
                                        foreach ($getUnits as $units) : ?>
                                            <tr>
                                                <td style="border: 1px solid #ddd;"><?= $units['floorno']; ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $units['unitno']; ?></td>

                                                <?php if ($units['testatus'] == 1) { ?>
                                                    <td style="border: 1px solid #ddd;"> <span class="badge rounded-pill bg-warning"><?php echo lang('report/Unit_status.unit_booked'); ?></span></td>
                                                <?php } else { ?>
                                                    <td style="border: 1px solid #ddd;"> <span class="badge rounded-pill bg-primary"><?php echo lang('report/Unit_status.unit_avai'); ?></span></td>
                                                <?php } ?>

                                            </tr>
                                    <?php endforeach;
                                    } ?>
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