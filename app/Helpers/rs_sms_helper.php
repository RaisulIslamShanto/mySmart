<?php

if (!function_exists("rs_send_sms")) {
    function rs_send_sms($phone, $textBody, $property_id)
    {
        $setting = new \App\Models\Settingmodel();

        $getSetting = $setting->where('property_id',$property_id)->where('sname', 'sms')->first();
        $settingValue = json_decode($getSetting['svalue']);

        $config = [
            'username' => $settingValue->clickAtell_username,
            'password' => $settingValue->clickAtell_password,
            'api_key' => $settingValue->clickAtell_api_key,
        ];

        return $config;

    }
}
