<?php

namespace Modules\User\Controllers;

use Modules\Setting\Models\Rolemodel;
use Modules\User\Models\User;
use Modules\Setting\Models\Companymodel;
use Modules\Setting\Models\Popertymodel;
use Modules\Super_admin\Models\Pakagemodel;

use App\Controllers\BaseController;

class Usercontroller extends BaseController
{
    public function add_user()
    {
      
        $user_model = new User();
        $package_model = new Pakagemodel();
        $user_id = $this->session->get('userId');
        $getUser = $user_model->where('id',$user_id)->first();
        // print_r($getUser);die();
        $package = $package_model->where('id',$getUser['package_id'])->first();
        $users = $user_model->where('company_id',$getUser['company_id'])->findall();
        $total_user= count($users);

        //echo $package['employee_limit'].'//'.$total_user;die();
         
        
        $userId = $this->session->get('userId');
        $get_user = $user_model->where('id',$userId)->first();
        $role_model = new Rolemodel();
        $roles = $role_model->where('company_id',$get_user['company_id'])->orwhere('asName','tenant')->orwhere('asName','employee')->findall();
        $data['roles'] = $roles;

        $super_admin= $role_model->where('asName','admin')->first();
        

        $builder = $this->db->table('users');
        $builder->select('users.*, roles.role_name');
        $builder->join('roles', 'users.user_type = roles.id','left');
        $builder->where('users.company_id',$get_user['company_id']);
        $builder->where('users.user_type !=',$super_admin['id']);
        $query = $builder->get();
        $results = $query->getResultArray();

        $data['users']=$results;
        if($total_user<$package['employee_limit']+1){

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('user')) {
                $email = $this->request->getVar('email');

                $check_email = $user_model->where('email', $email)->findall();
                if (empty($check_email)) {

                    $avatar = $this->request->getFile('image');
                    if ($avatar != '') {
                        $name = $avatar->getRandomName();

                        $move = $avatar->move(WRITEPATH . '../public/admin/assets/user/', $name);

                        $image = \Config\Services::image()
                            ->withFile(WRITEPATH . '../public/admin/assets/user/' . $name)
                            ->resize(200, 200, true, 'height')
                            ->save(WRITEPATH . '../public/admin/assets/user/thumbnail/' . $name);
                    } else {
                        $name = 'empty_image.jpg';
                    }
                    $type = $this->session->get('type');

                    $userId = $this->session->get('userId');


                    $get_company= $user_model->where('id',$userId)->first();
                    // $company_model= new Companymodel();
                    // $company_details= $company_model->where('company_owner_id',$userId)->first();
                    // if(empty($company_details['company_owner_id'])){
                    //     $company_details['company_owner_id']=0;
                    // }
                    
                    $property_id=$this->session->get('rs_property_id');
                    //echo 'hello'.$property_id;die();
                    if($this->request->getVar('user_type')==10){
                        $data = [
                        'email' => $email,
                        'name' => $this->request->getVar('name'),
                        'contactno' => $this->request->getVar('contact_no'),
                        'password' => SHA1($this->request->getVar('password')),
                        'branch' => $this->request->getVar('branch'),
                        'user_type' => $this->request->getVar('user_type'),
                        'image' => $name,
                        'company_id' => $get_company['company_id'],
                        'type' => 2,
                        'property_id' => $property_id,
                        ];
                    }else{
                        $data = [
                        'email' => $email,
                        'name' => $this->request->getVar('name'),
                        'contactno' => $this->request->getVar('contact_no'),
                        'password' => SHA1($this->request->getVar('password')),
                        'branch' => $this->request->getVar('branch'),
                        'user_type' => $this->request->getVar('user_type'),
                        'image' => $name,
                        'company_id' => $get_company['company_id'],
                        'type' => 0,
                        'property_id' => $property_id,
                        ];
                    }
                   // print_r($data);die();

                    $insert = $user_model->save($data);
                    if (isset($insert)) {
                        $data['roles'] = $roles;
                        $data['insert_success'] = 'Data Saved';

                        $role_model = new Rolemodel();
                        $super_admin= $role_model->where('asName','admin')->first();
                    
                        $builder = $this->db->table('users');
                        $builder->select('users.*, roles.role_name');
                        $builder->join('roles', 'users.user_type = roles.id','left');
                        $builder->where('users.company_id',$get_user['company_id']);
                        $builder->where('users.user_type !=',$super_admin['id']);
                        $query = $builder->get();
                        $results = $query->getResultArray();
                        $data['users'] = $results;

                        return view('Modules\User\Views\admin\user\add_user', $data);
                    }
                } else {
                    $data['email_check'] = 'Sorry This email already exits';
                    return view('Modules\User\Views\admin\user\add_user', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('Modules\User\Views\admin\user\add_user', $data);
            }
        } else {
            

            //print_r($data['users']);die();
            return view('Modules\User\Views\admin\user\add_user', $data);
        }
    }else{
        $data['faild_message'] = "Sorry Your User Limit is exits !!";
        return view('Modules\User\Views\admin\user\add_user', $data);
    }
    }
    public function user_update($id = null)
    {
        $session = session();
        $user_model = new User();
        $user_id= $session->get('userId');
        $this_user= $user_model->where('id',$user_id)->first();
        $role_model = new Rolemodel();
        $roles = $role_model->where('company_id',$this_user['company_id'])->orwhere('asName','tenant')->orwhere('asName','employee')->findall();
        $data['roles'] = $roles;

       

        $user = $user_model->where('company_id',$this_user['company_id'])->find($id);
        $data['user']=$user;

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('user')) {

                $email = $this->request->getVar('email');

                $check_email = $user_model->where('email', $email)->first();
                
                if (empty($check_email)) {

                $avatar = $this->request->getFile('image');
               
                if($avatar!=''){
 
                $pre_image = $this->request->getVar('pre_image');
                if($user['image']!='empty_image.jpg'){
                unlink(WRITEPATH .'../public/admin/assets/user/thumbnail/' . $pre_image);
                unlink(WRITEPATH .'../public/admin/assets/user/' . $pre_image);
                }
                
                   $name=$avatar->getRandomName();
          
                   $move = $avatar->move(WRITEPATH . '../public/admin/assets/user/',$name);
                     
                   $image = \Config\Services::image()
                   ->withFile(WRITEPATH . '../public/admin/assets/user/'.$name)
                   ->resize(200, 200, true, 'height')
                   ->save(WRITEPATH .'../public/admin/assets/user/thumbnail/'. $name);
 
                }elseif($user['image']!='empty_image.jpg'){
                   $name= $user['image'];
                }else{ 
                   $name = 'empty_image.jpg';
                }
                $user= $userId = $this->session->get('userId');
                
                $data = [
                    'email' => $email,
                    'name' => $this->request->getVar('name'),
                    'contactno' => $this->request->getVar('contact_no'),
                    'password' => SHA1($this->request->getVar('password')),
                    'branch' => $this->request->getVar('branch'),
                    'user_type' => $this->request->getVar('user_type'),
                    'image' => $name,
                ];
                $update = $user_model->update($id,$data);
                    if (isset($update)) {
                        $data['users'] = $user_model->where('company_id',$this_user['company_id'])->findall();
                        $data['roles'] = $roles;
                        $data['update_success'] = 'Data Updated';
                        return view('admin/user/add_user', $data);
                    }
            } else {
                if(($check_email['email']==$email) && ($check_email['id']==$id)){
                    $avatar = $this->request->getFile('image');
               
                if($avatar!=''){
 
                $pre_image = $this->request->getVar('pre_image');
                if($user['image']!='empty_image.jpg'){
                unlink(WRITEPATH .'../public/admin/assets/user/thumbnail/' . $pre_image);
                unlink(WRITEPATH .'../public/admin/assets/user/' . $pre_image);
                }
                
                   $name=$avatar->getRandomName();
          
                   $move = $avatar->move(WRITEPATH . '../public/admin/assets/user/',$name);
                     
                   $image = \Config\Services::image()
                   ->withFile(WRITEPATH . '../public/admin/assets/user/'.$name)
                   ->resize(200, 200, true, 'height')
                   ->save(WRITEPATH .'../public/admin/assets/user/thumbnail/'. $name);
 
                }elseif($user['image']!='empty_image.jpg'){
                   $name= $user['image'];
                }else{ 
                   $name = 'empty_image.jpg';
                }
                $data = [
                    'email' => $email,
                    'name' => $this->request->getVar('name'),
                    'contactno' => $this->request->getVar('contact_no'),
                    'password' => SHA1($this->request->getVar('password')),
                    'branch' => $this->request->getVar('branch'),
                    'user_type' => $this->request->getVar('user_type'),
                    'image' => $name,
                ];
                $update = $user_model->update($id,$data);
                    if (isset($update)) {
                        $role_model = new Rolemodel();
                        $super_admin= $role_model->where('asName','admin')->first();

                        $data['users'] = $user_model->where('company_id',$this_user['company_id'])->where('user_type !=',$super_admin['id'])->findall();
                        $data['roles'] = $roles;
                        $data['update_success'] = 'Data Updated';
                        return view('Modules\User\Views\admin\user\add_user', $data);
                    }

                }else{
                    $data['email_check'] = 'Sorry This email already exits';
                return view('Modules\User\Views\admin\user\update_user', $data);
                }
                
            }
      

            } else {
                $data['validation'] = $this->validator;
                return view('Modules\User\Views\admin\user\update_user', $data);
            }
        } else {
            if(!empty($data['user'])){
                return view('Modules\User\Views\admin\user\update_user', $data);
            }else{
                return view('\Modules\Home\Views\admin\home\property_error_page');
            } 
            
        }
    }
    public function user_delete($id=null){

        $session = session();
        $user_model = new User();
        $user_id= $session->get('userId');
        $this_user= $user_model->where('id',$user_id)->first();
        $role_model = new Rolemodel();

       $roles = $role_model->where('company_id',$this_user['company_id'])->orwhere('asName','tenant')->orwhere('asName','employee')->findall();

        $delete = $user_model->where('id',$id)->delete();
        if(isset($delete)){
            
            $data['roles'] = $roles;
            $data['delete_success'] = 'Data Deleted';
            $role_model = new Rolemodel();
            $super_admin= $role_model->where('asName','admin')->first();

            $data['users'] = $user_model->where('company_id',$this_user['company_id'])->where('user_type !=',$super_admin['id'])->findall();
            return view('Modules\User\Views\admin\user\add_user', $data);
        }
    }
    public function indivusual_user(){
        $session = session();
        $user_model = new User();
        $user_id= $session->get('userId');
        $this_user= $user_model->where('id',$user_id)->first();

        $this_user_id=$this->request->getVar('user_id');

        $builder = $this->db->table('users');
        $builder->select('users.*, roles.role_name');
        $builder->join('roles', 'users.user_type = roles.id','left');
        $builder->where('users.id',$this_user_id);
        $query = $builder->get();
        $results = $query->getResultArray();
        $data['user'] = $results;

        //print_r($data['user']);die();
        
        echo json_encode($data);
    }
}
