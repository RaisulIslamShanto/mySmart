<?php


if (!function_exists("valid_user")) {
    function valid_user($property_id)
    {
        $session=\Config\Services::session();
        $user_model = new \App\Models\User();
        $property_model = new \App\Models\Popertymodel();

        $user_id=$session->get('userId');
        
        $property = $property_model->where('id',$property_id)->first();

        ///echo $property['company_id'];
        $user= $user_model->where('company_id',$property['company_id'])->first();
        $this_user= $user_model->where('id',$user_id)->first();

        //echo $user_id.'//'.$user['company_id'];
        if($this_user['company_id']==$user['company_id']){
            return true;
        }else{
            return false;
        }


        
    }
}