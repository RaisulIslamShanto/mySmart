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
                        <h2 style="text-align:center;">Tenant Pdf Generate</h2>
                        <div>
                            <table style="font-size: 8px; text-align: center;" cellspacing="0" cellpadding="1" border="1">
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.re_image'); ?></th>

                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.personal_details'); ?></th>
                                        <th style="border: 1px solid #ddd;"></th>

                                        
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.floor_no'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.unit_no'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.re_payment'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.re_rentpermon'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.re_date'); ?></th>
                                        <th style="border: 1px solid #ddd;"><?php echo lang('report/Tenant.re_status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (isset($getTenants)) {


                                        foreach ($getTenants as $tenants) : ?>
                                            <tr>
                                                <td style="border: 1px solid #ddd;">
                                                    <?php if ($tenants['teownerphoto'] != '') { ?>

                                                        <img class="rounded-circle avatar-xs" height="20px" alt="tenant-photo" src="<?php echo base_url(); ?>/uploads/<?= $tenants['teownerphoto']; ?>" data-holder-rendered="true">

                                                    <?php } else { ?>

                                                        <img class="rounded-circle avatar-xs" height="20px" src="<?php echo base_url(); ?>/uploads/empty_image.jpg" alt="tenant-photo">

                                                    <?php } ?>
                                                </td>
                                                <td style="border: 1px solid #ddd;" colspan="2">
                                                    <table style="font-size: 4px;">
                                                        <tr>
                                                            <th><?php echo lang('report/Tenant.re_name'); ?></th>
                                                            <td>:</td>
                                                            <td><?= $tenants['tename']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><?php echo lang('report/Tenant.re_email'); ?></th>
                                                            <td>:</td>
                                                            <td><?= $tenants['teemail']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><?php echo lang('report/Tenant.re_contact'); ?></th>
                                                            <td>:</td>
                                                            <td><?= $tenants['tecontrctno']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><?php echo lang('report/Tenant.re_ads'); ?></th>
                                                            <td>:</td>
                                                            <td><?= $tenants['teads']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><?php echo lang('report/Tenant.re_nid'); ?></th>
                                                            <td>:</td>
                                                            <td><?= $tenants['tenid']; ?></td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td style="border: 1px solid #ddd;"><?= $tenants['floorno']; ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $tenants['unitno']; ?></td>
                                                <td style="border: 1px solid #ddd;"><?= $tenants['teadvancerent']; ?>
                                                    <?php currency($tenants['teadvancerent']); ?></td>
                                                <td style="border: 1px solid #ddd;"><?php currency($tenants['terentpermonth']); ?></td>
                                                <td style="border: 1px solid #ddd;"><?= date_formats($tenants['teissuedate']); ?></td>
                                                <?php if ($tenants['testatus'] == 1) { ?>
                                                    <td style="border: 1px solid #ddd;"> <span class="badge rounded-pill bg-primary"><?php echo lang('report/Tenant.re_active'); ?></span></td>
                                                <?php } else { ?>
                                                    <td style="border: 1px solid #ddd;"> <span class="badge rounded-pill bg-warning"><?php echo lang('report/Tenant.re_inactive'); ?></span></td>
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