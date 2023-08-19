<?php

namespace Modules\Mail\Controllers;

use App\Controllers\BaseController;
use Modules\Mail\Models\Mailsmsmodel;
use Modules\Tenant\Models\Tenantmodel;
use Modules\Employee\Models\Employeemodel;
use Modules\Owner\Models\Ownermodel;
use Modules\Mail\Models\Mailsmsdatamodel;

class Mailsmsdatacontroller extends BaseController
{
    /**
     * This method getMailData save all mail & sms formats to database.
     * Method - get & post.
     * validates - mailSmsValidate.
     */
    public function getMailData()
    {
        $mailSmsData = new Mailsmsdatamodel();

        $maildata = new Mailsmsmodel();
        $tenant = new Tenantmodel();
        $employee = new Employeemodel();
        $owner = new Ownermodel();

        $todayDate = date('Y-m-d');
        $alldata = $maildata->where(['schedule' => $todayDate, 'mailstatus' => 0])->findAll();


        /*=============================================================
                    Get Tenant/ Owner / Employee 
        ===============================================================*/

        foreach ($alldata as $key => $mailData) {

            $mailTenant = $mailData['mailtenant'];

            if ($mailTenant != '') {
                if ($mailTenant == 0) {
                    $getTeValueName = $tenant->findAll();
                } else {
                    $teValue = explode(',', $mailTenant);
                    $getTeValueName = $tenant->whereIn('id', $teValue)->findAll();
                }

                $tenants = [];
                foreach ($getTeValueName as $teValueName) {

                    $tenants[] = $teValueName['tename'];
                    $tenants[] = $teValueName['teemail'];
                    $tenants[] = $teValueName['tecontrctno'];

                    $storeMailData['dmailname'] = $teValueName['tename'];
                    $storeMailData['dmailemail'] = $teValueName['teemail'];
                    $storeMailData['dmailphone'] = $teValueName['tecontrctno'];
                    $storeMailData['dmailsubject'] = $mailData['mailsub'];
                    $storeMailData['dmailmessage'] = $mailData['mailmess'];
                    $storeMailData['dmailstatus'] = 0;

                    $mailType = explode(',', $mailData['mailmesstype']);

                    if (in_array('sms', $mailType)) {
                        $storeMailData['dmailtype'] = 'sms';
                    }
                    if (in_array('email', $mailType)) {
                        $storeMailData['dmailtype'] = 'email';
                    }
                    if (count($mailType) == 2) {
                        $storeMailData['dmailtype'] = 'all';
                    }

                    $storeMailData['property_id'] = $mailData['property_id'];

                    $mailSmsData->insert($storeMailData);

                    //Mailsms Database Update
                    $id = $mailData['id'];
                    $mailSmsFieldUpdate = [
                        'mailstatus' => 1
                    ];
                    $maildata->update($id, $mailSmsFieldUpdate);
                }
                $alldata[$key]['tenants'] = $tenants;
            }

            $mailEmployee = $mailData['mailemployee'];

            if ($mailEmployee != '') {

                if ($mailEmployee == 0) {
                    $getEmValueName = $employee->findAll();
                } else {
                    $emValue = explode(',', $mailEmployee);
                    $getEmValueName = $employee->whereIn('id', $emValue)->findAll();
                }

                $employees = [];
                foreach ($getEmValueName as $emValueName) {

                    $employees[] = $emValueName['name'];
                    $employees[] = $emValueName['email'];
                    $employees[] = $emValueName['contact_no'];

                    $storeMailData['dmailname'] = $emValueName['name'];
                    $storeMailData['dmailemail'] = $emValueName['email'];
                    $storeMailData['dmailphone'] = $emValueName['contact_no'];
                    $storeMailData['dmailsubject'] = $mailData['mailsub'];
                    $storeMailData['dmailmessage'] = $mailData['mailmess'];
                    $storeMailData['dmailstatus'] = 0;

                    $mailType = explode(',', $mailData['mailmesstype']);

                    if (in_array('sms', $mailType)) {
                        $storeMailData['dmailtype'] = 'sms';
                    }
                    if (in_array('email', $mailType)) {
                        $storeMailData['dmailtype'] = 'email';
                    }
                    if (count($mailType) == 2) {
                        $storeMailData['dmailtype'] = 'all';
                    }

                    $storeMailData['property_id'] = $mailData['property_id'];

                    $mailSmsData->insert($storeMailData);

                    //Mailsms Database Update
                    $id = $mailData['id'];
                    $mailSmsFieldUpdate = [
                        'mailstatus' => 1
                    ];
                    $maildata->update($id, $mailSmsFieldUpdate);
                }
                $alldata[$key]['employees'] = $employees;
            }

            $mailOwner = $mailData['mailowner'];

            if ($mailOwner != '') {

                if ($mailOwner == 0) {
                    $getowValueName = $owner->findAll();
                } else {
                    $owValue = explode(',', $mailOwner);
                    $getowValueName = $owner->whereIn('owner_id', $owValue)->findAll();
                }

                $owners = [];
                foreach ($getowValueName as $owValueName) {
                    $owners[] = $owValueName['name'];
                    $owners[] = $owValueName['email'];
                    $owners[] = $owValueName['contact_no'];

                    $storeMailData['dmailname'] = $owValueName['name'];
                    $storeMailData['dmailemail'] = $owValueName['email'];
                    $storeMailData['dmailphone'] = $owValueName['contact_no'];
                    $storeMailData['dmailsubject'] = $mailData['mailsub'];
                    $storeMailData['dmailmessage'] = $mailData['mailmess'];
                    $storeMailData['dmailstatus'] = 0;

                    $mailType = explode(',', $mailData['mailmesstype']);

                    if (in_array('sms', $mailType)) {
                        $storeMailData['dmailtype'] = 'sms';
                    }
                    if (in_array('email', $mailType)) {
                        $storeMailData['dmailtype'] = 'email';
                    }
                    if (count($mailType) == 2) {
                        $storeMailData['dmailtype'] = 'all';
                    }
                    $storeMailData['property_id'] = $mailData['property_id'];

                    $mailSmsData->insert($storeMailData);

                    //Mailsms Database Update
                    $id = $mailData['id'];
                    $mailSmsFieldUpdate = [
                        'mailstatus' => 1
                    ];
                    $maildata->update($id, $mailSmsFieldUpdate);
                }
                $alldata[$key]['owners'] = $owners;
            }
        }

        /*=============================================================
                    End Section Get Tenant/ Owner / Employee 
        ===============================================================*/

        echo "success";
    }

    public function getUserData()
    {

        $mailSmsData = new Mailsmsdatamodel();
        $getUserDatas = $mailSmsData->where('dmailstatus', 0)->findAll(20);

        foreach ($getUserDatas as $userData) {

            if ($userData['dmailtype'] == 'email' || $userData['dmailtype'] == 'all') {

                $change = ["{app_name}"];
                $changeTo = ["My Smart Property"];
                $emailSubject = str_replace($change, $changeTo, $userData['dmailsubject']);

                $link = base_url() . '/reset_pass/';
                $source = ["{receiver_name}", "{app_name}", "{link}"];
                $dist = [$userData['dmailname'], "My Smart Property", $link];
                $emailBody = str_replace($source, $dist, $userData['dmailmessage']);

                $email = $userData['dmailemail'];
                $property_id = $userData['property_id'];

                sleep(2);

                // call helper mail function
                rs_send_email($email, $emailSubject, $emailBody, $property_id);

                $id = $userData['id'];
                $userDataUpdate = [
                    'dmailstatus' => 1
                ];

                $mailSmsData->update($id, $userDataUpdate);

            } else {
                
                //This Section For Sms

                $link = base_url() . '/reset_pass/';
                $source = ["{receiver_name}", "{app_name}", "{link}"];
                $dist = [$userData['dmailname'], "My Smart Property", $link];
                $textBody = str_replace($source, $dist, $userData['dmailmessage']);

                $phone = $userData['dmailphone'];
                $property_id = $userData['property_id'];

                // sleep(2);

                // call sms helper function
                $check = rs_send_sms($phone, $textBody, $property_id);

                // echo "<pre>";
                // print_r($check);
                // die();

                $id = $userData['id'];
                $userDataUpdate = [
                    'dmailstatus' => 1
                ];

                $mailSmsData->update($id, $userDataUpdate);

                echo "Sms Code Pending";
            }

        }
    }
}
