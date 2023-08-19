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
                    <img style="height:100px;width:100px;border-radius:50%;" src="<?php echo base_url();?>/admin/assets/images/pr1.jpg">
                    <h4>Home</h4>
                    <p>K-Block,Mirpur-10,Dhaka-1216 <br>opu@gmail.com <br>1212121212</p>
                </div>

                <div>
                    <div>
                        <h2 style="text-align:center;"><?php echo lang('report/Visitors.visihead_name'); ?></h2>
                        <div>
                            <table style="font-size: 8px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>            
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_date'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_name'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_mobile'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_ads'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_floor'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_unit'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_intime'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_outtime'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_month'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Visitors.visi_year'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($getVisitors)) {
                                        foreach ($getVisitors as $visitors) : ?>
                                            <tr>
                                                <td style="border: 1px solid #ddd;"><?= date_formats($visitors['visientrydate']); ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $visitors['visiname']; ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $visitors['visimobile']; ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $visitors['visiads']; ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $visitors['floorno']; ?></td>
                                                <td style="border: 1px solid #ddd;"><span class="badge bg-warning"><?= $visitors['unitno']; ?></span></td>
                                                <td style="border: 1px solid #ddd;"><span class="badge bg-primary"><?= $visitors['visiintime']; ?></span></td>
                                                <td style="border: 1px solid #ddd;"><span class="badge bg-danger"><?= $visitors['visiouttime']; ?></span></td>
                                                <td style="border: 1px solid #ddd;"><?= date('F', strtotime($visitors['visientrydate'])); ?></td>
                                                <td style="border: 1px solid #ddd;"><?= date('Y', strtotime($visitors['visientrydate'])); ?></td>
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