<?php

if (!function_exists("menu_access")) {
    function menu_access($permission='')
    {
        $session=\Config\Services::session();
        $user_model = new \Modules\User\Models\User();
        $role_model = new \Modules\Setting\Models\Rolemodel();
        
        $user_id=$session->get('userId');

        $this_user = $user_model->where('id',$user_id)->first();

        $user_role= $role_model->where('id',$this_user['user_type'])->first();
        
        if(!empty($user_role)){

            $user_acces=json_decode($user_role['user_access'],true);
            
            $url = current_url(true);
 
             $uri = new \CodeIgniter\HTTP\URI($url);
             if($permission!=''){
                $third_segment= $permission;
             }else{
                $third_segment= $uri->getSegment(3);  //die();
             }
            //print_r($user_acces);

            if(!in_array($third_segment,$user_acces)){
              
                return false;
            }else{
                return true;
            }


        }        
    }
}