<?php


if (!function_exists("notification")) {
    function notification()
    {
        $db      = \Config\Database::connect();
        $notify= new \Modules\Master\Models\notifymodel();
        $user_model = new \Modules\User\Models\User();
        $role_model = new \Modules\Setting\Models\Rolemodel();

        $session=\Config\Services::session();
        $property_id=$session->get('rs_property_id');
        $user_id=$session->get('userId');

        $super_admin_role = $role_model->where('role_name','Admin')->first();
        $employee_role = $role_model->where('role_name','employee')->first();
        $tenent_role = $role_model->where('role_name','Tenant')->first();
     

        $this_user = $user_model->where('id',$user_id)->first();
        $notification= array();

        if($this_user['user_type']==$super_admin_role['id']){
            $builder = $db->table('admin_notification');
                    $builder->join('complains', 'complains.id = admin_notification.issue_id','left');
                    $builder->where('admin_notification.issue_name','Complain');
                    $builder->like('admin_notification.who_will_get','%3%');
                    $builder->limit(2);

                    
                    $query2 = $builder->get();
                    $notification = $query2->getResultArray();
                    //$total = count($notification);

        }else if($this_user['user_type']==$employee_role['id']){
            $builder = $db->table('admin_notification');
                    $builder->join('complains', 'complains.id = admin_notification.issue_id','left');
                    $builder->where('admin_notification.issue_name','Complain');
                    $builder->like('admin_notification.who_will_get','%1%');
                    $builder->limit(2);

                    
                    $query2 = $builder->get();
                    $notification = $query2->getResultArray();
                    //$total = count($notification);

        }else if($this_user['user_type']==$tenent_role['id']){
           
           
                    $builder = $db->table('admin_notification');
                    $builder->join('complains', 'complains.id = admin_notification.issue_id','left');
                    $builder->where('admin_notification.issue_name','Complain');
                    $builder->like('admin_notification.who_will_get','%3%');
                   
                   
                    $query2 = $builder->get();
                    $notification = $query2->getResultArray();
                    //echo $this->db->getLastQuery();die();
                    //$total = count($notification);
               
        }
        $data['notifications']= $notification;
        //$data['total_data']= $total;
        // if(empty($notification)){
        //     $notification= null;
        // }


        return $notification;

    }
}