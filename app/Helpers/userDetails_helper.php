<?php


if (!function_exists("user_details")) {
    function user_details()
    {
        $session=\Config\Services::session();
        $user_model = new \Modules\User\Models\User();
        
        $user_id=$session->get('userId');

        $user = $user_model->where('id',$user_id)->first();
      
        return $user;
         
    }
}