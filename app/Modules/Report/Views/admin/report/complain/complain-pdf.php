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
                        <h2 style="text-align:center;"><?php echo lang('report/Complain.comhead_name'); ?></h2>
                        <div>
                            <table style="font-size: 10px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>            
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Complain.com_date'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Complain.com_month'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Complain.com_year'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Complain.com_title'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Complain.com_des'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getComplains as $complains) : ?>
                                        <tr>
                                            <td style="border: 1px solid #ddd;"><?= date_formats($complains['comdate']); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= date('F', strtotime($complains['comdate'])); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= date('Y', strtotime($complains['comdate'])); ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $complains['comtitle']; ?></td>
                                            <td style="border: 1px solid #ddd;"><?= $complains['comdescription']; ?></td>
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
</body>

</html>