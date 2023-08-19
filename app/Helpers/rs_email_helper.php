<?php

if (!function_exists("rs_send_email")) {
    function rs_send_email($toEmail, $emailSubject, $emailBody, $property_id='')
    {
        $email = \Config\Services::email();
        $setting = new \Modules\Setting\Models\Settingmodel();

        if(empty($property_id)){
            $getSetting = $setting->where('sname', 'email')->first();
        }else{

            $getSetting = $setting->where('property_id',$property_id)->where('sname', 'email')->first();
        }
        $settingValue = json_decode($getSetting['svalue']);

        // {"mail_option":"smtp","smtp_hostname":"mail.therssoftware.com","smtp_username":"newest@therssoftware.com","smtp_password":"PLJZQwjHq2b%","smtp_post":"465","smtp_secure":"ssl"}$settingValue->mail_option,

        $config['protocol']    = 'smtp';
        $config['SMTPCrypto']    = 'ssl';
        $config['SMTPPort']    = '465';
        // $config['mailType']    = 'text';
        $config['SMTPHost']    = 'smtppro.zoho.com';
        $config['SMTPUser']    = 'contact@q-study.com';
        $config['SMTPPass']    = 'Mn876#%2dq';
        $config['charset']    = 'utf-8';
        $config['mailType']    = 'html';
        $config['newline']    = "\r\n";
        //print_r($config);die();
        $email->initialize($config);

        $email->setFrom('contact@q-study.com');
        $email->setTo('shukriti@sahajjo.com');

        $email->setSubject($emailSubject);
        $email->setMessage($emailBody);

        $email->send();
        //print_r($email->printDebugger());die();
        if (!$email->send()) {
            return $email->printDebugger();
        } else {
            return true;
        }
    }
}
