<?php

namespace Modules\Super_admin\Controllers;

use App\Controllers\BaseController;
use Modules\Owner\Models\OwnerModel;
use Modules\Unit\Models\Unitmodel;
use Modules\Owner\Models\Ownertounitmodel;
use Modules\Owner\Models\Ownerutility;
use Modules\Floor\Models\Floormodel;
use Modules\Setting\Models\Rolemodel;
use Modules\Setting\Models\Monthsetupmodel;
use Modules\User\Models\User;
use Modules\Setting\Models\Popertymodel;
use Modules\Super_admin\Models\Pakagemodel;
use Modules\Super_admin\Models\Stripemodel;
use Modules\Setting\Models\Companymodel;
use Stripe\StripeClient; 
 
class Superadmincontroller extends BaseController
{

    public function property_user_add(){
        $user_model = new User();
        $pakage_model= new Pakagemodel();
        $company_model= new Companymodel();

        $data['packages']=$pakage_model->where('status',1)->findall();

        if ($this->request->getMethod() == 'post') {

            $useremail = $this->request->getVar('useremail');

            $check_email = $user_model->where('email', $useremail)->find();
			//print_r($check_email);die();
            if(empty($check_email)){

            

            if ($this->validate('useradd')) {
             
                $password = $this->request->getVar('userpassword');
                $c_password = $this->request->getVar('confirm_pass');
                // if($password==$c_password){

                $username = $this->request->getVar('username');
                $useremail = $this->request->getVar('useremail');
                $userpassword = SHA1($this->request->getVar('userpassword'));
                $term_and_condition = $this->request->getVar('term_and_condition');
                
                $role_model = new Rolemodel();
                $admin= $role_model->where('asName','admin')->first();

                //echo $this->request->getVar('user_type');die();
                

                $data = [
                    'email' => $this->request->getVar('useremail'),
                    'password' => SHA1($this->request->getVar('userpassword')),
                    'name' => $this->request->getVar('username'),
                    'term_and_condition' => 1,
					'type' =>  $this->request->getVar('user_type'),
                    'user_type' => $admin['id'],
                    'package_id' => $this->request->getVar('package_id'),
                    
                ];
                //print_r($data);die();
                $insert = $user_model->insert($data);
                $user_id = $user_model->getInsertID(); 

                $company=[
                    'company_owner_id' => $user_id,
                    'status' => 1,
                ];
                $insert_company = $company_model->insert($company);
                $company_id = $company_model->getInsertID(); 
                $datas=[
                    'company_id' => $company_id,
                ];
                $update = $user_model->update($user_id,$datas);
                if($insert){
                    return redirect()->to(base_url('admin/property_user'))->with('success','Data Saved');
                }
                
                
             
            }else{
                $data['validation'] = $this->validator;
                return view('\Modules\Super_admin\admin\super_admin\property_user_add',$data);
            }
			}else{
                return redirect()->back()->with('faild', 'Sorry! Email Already exists');
            }
        }

        

        return view('\Modules\Super_admin\admin\super_admin\property_user_add',$data);

    }
    public function property_user(){
        $role_model = new Rolemodel();
        $super_admin= $role_model->where('asName','admin')->first();

        $session = session();
        $user_id= $session->get('userId');
        
        $builder = $this->db->table('companies');
        $builder->join('users', 'users.company_id = companies.id','left');
        $builder->where('users.email !=','');
        $builder->where('users.id !=',1);
        $builder->where('users.user_type',$super_admin['id']);
        $query = $builder->get();
        //echo $this->db->getLastQuery();die();
        $data['property_users'] = $query->getResult();

        return view('\Modules\Super_admin\admin\super_admin\property_user_list', $data);

    }

    public function property_user_edit($id){
        
        $session = session();
        $user_id= $session->get('userId');
        
        $user_model= new User();

        $user = $user_model->where('id',$id)->first();
        $data['user']= $user;


        if ($this->request->getMethod() == 'post') {
            
            if ($this->validate('superuser')) {
               
                $email = $this->request->getVar('email');

                $check_email = $user_model->where('email', $email)->first();
                
                if (empty($check_email)) {

                $avatar = $this->request->getFile('image');
               
                if($avatar!=''){
 
                $pre_image = $this->request->getVar('pre_image');
                if($user['image']!='empty_image.jpg'){
                //unlink(WRITEPATH .'../public/admin/assets/user/thumbnail/' . $pre_image);
                //unlink(WRITEPATH .'../public/admin/assets/user/' . $pre_image);
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
                    'status' => $this->request->getVar('status'),
                    'image' => $name,
                ];
                $update = $user_model->update($id,$data);
                    if (isset($update)) {
                        $user = $user_model->where('id',$id)->first();
                        $data['user']= $user;
                        return view('\Modules\Super_admin\admin\super_admin\property_user_edit', $data);
                    }
            } else {
                if(($check_email['email']==$email) && ($check_email['id']==$id)){
                    $avatar = $this->request->getFile('image');
               
                if($avatar!=''){
 
                $pre_image = $this->request->getVar('pre_image');
                if($user['image']!='empty_image.jpg'){
                //unlink(WRITEPATH .'../public/admin/assets/user/thumbnail/' . $pre_image);
                //unlink(WRITEPATH .'../public/admin/assets/user/' . $pre_image);
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
                    'status' => $this->request->getVar('status'),
                    'image' => $name,
                ];
                $update = $user_model->update($id,$data);
                    if (isset($update)) {
                        $user = $user_model->where('id',$id)->first();
                        $data['user']= $user;
                        return view('\Modules\Super_admin\admin\super_admin\property_user_edit', $data);
                    }

                }else{
                    $data['email_check'] = 'Sorry This email already exits';
                return view('\Modules\Super_admin\admin\super_admin\property_user_edit', $data);
                }
                
            }
      

            } else {
                $data['validation'] = $this->validator;
                return view('\Modules\Super_admin\admin\super_admin\property_user_edit', $data);
            }
        }else{
            return view('\Modules\Super_admin\admin\super_admin\property_user_edit', $data);
        }

    }

    public function property_details($id){
        $session = session();

        $property_model = new Popertymodel();
       
        $properties = $property_model->where('company_id',$id)->findall();
        $data['total_properties']= count($properties);
        $data['properties']= $properties;

        return view('\Modules\Super_admin\admin\super_admin\property_details', $data);

    }

    
    public function get_property_employee(array $params = []){
        $role_model = new Rolemodel();
        $super_admin= $role_model->where('asName','employee')->first();
    
        $user_model=new User();
        
        $builder = $this->db->table('users');
        $builder->join('roles', 'users.user_type = roles.id','left');
     
        $builder->where('users.property_id',$params['property_id']);
        $builder->where('users.user_type',$super_admin['id']);
        $query = $builder->get();
        
        $result = $query->getResult();
       // echo "<pre>";print_r($result);die();
        
        $total_count = count($result);

        
    
            $x ="<p>".$total_count."</p>";
        
            return $x;
        
    
        }

        public function get_property_tenant(array $params = []){
            $role_model = new Rolemodel();
            $super_admin= $role_model->where('asName','Tenant')->first();
        
            $user_model=new User();
            
            $builder = $this->db->table('users');
            $builder->join('roles', 'users.user_type = roles.id','left');
         
            $builder->where('users.property_id',$params['property_id']);
            $builder->where('users.user_type',$super_admin['id']);
            $query = $builder->get();
            
            $result = $query->getResult();
           // echo "<pre>";print_r($result);die();
            
            $total_count = count($result);
    
            
        
                $x ="<p>".$total_count."</p>";
            
                return $x;
            
        
            }

    public function pakage_add(){
        $pakage_model= new Pakagemodel();

        if($this->request->getMethod()=='post'){ 

            if ($this->validate('pakage')) {

                $cost = ($this->request->getVar('cost')*100);
                if($this->request->getVar('duration')!='other'){
                   $interval='month';
                   $interval_count= $this->request->getVar('duration');
                }else{

                    if($this->request->getVar('d_m_y')==1){
                        $interval='day';
                    }else if($this->request->getVar('d_m_y')==2){
                        $interval='month';
                    }else if($this->request->getVar('d_m_y')==3){
                        $interval='year';
                    }
                    
                    $interval_count= $this->request->getVar('how_many');
                }
                $img[] =  base_url().'/uploads/1637138553_06c6aae9e6078cc73c31.png';

               

                $des = $this->request->getVar('pakage_objective');
                $description=  strip_tags($des);
                
                $stripe = new \Stripe\StripeClient(
                    'sk_test_51KSwihAz8PdWFeeXn316uEZmF0xXN6CbVUHSpxFnqWLOzVXEl4WOEtL1kyT2ET1iKugYxsNvjgFDMw7FcwJtC1kQ00z9tS8BzQ'
                  );
                $product= $stripe->products->create([
                'name' => $this->request->getVar('pakage_title'),
                'images' => $img,
                'description' => $description, 
                ]);

                // echo "<pre>";print_r($product);die();
                  
                $price = $stripe->prices->create([
                'unit_amount' => $cost,
                'currency' => 'usd',
                'recurring' => ['interval' => $interval,
                                'interval_count' => $interval_count,
                                ],
                'product' => $product['id'],
                ]);

                // echo "<pre>";print_r($price);die();
                if(empty($this->request->getVar('d_m_y'))){
                    $dmy = null;
                }else{
                    $dmy = $this->request->getVar('d_m_y');
                }

                $data = [
                    'pakage_title' => $this->request->getVar('pakage_title'),
                    'pakage_objective' => $this->request->getVar('pakage_objective'),
                    'duration' => $this->request->getVar('duration'),
                    'd_m_y' =>  $dmy,
                    'how_many' => $this->request->getVar('how_many'),
                    'employee_limit' => $this->request->getVar('employee_limit'),
                    'cost' => $this->request->getVar('cost'),
                    'property_limit' => $this->request->getVar('property_limit'),
                    'price_key' => $price['id'],
                    'status' => 1,
                ];
                $data_save= $pakage_model->save($data);
                return redirect()->to(base_url('/admin/pakage_list'))->with('saved','Data Saved');
            }else{
                $data['validation'] = $this->validator;
               
                 return view('\Modules\Super_admin\admin\super_admin\pakage_add',$data);
              }
        }

        return view('\Modules\Super_admin\admin\super_admin\pakage_add');
    }

    public function pakage_list(){
        $pakage_model= new Pakagemodel();
        $data["pakages"]= $pakage_model->where('status',1)->findall();
       // print_r($data["pakages"]);die();
        return view('\Modules\Super_admin\admin\super_admin\pakage_list',$data);
    }
    public function pakage_edit($id){
        $pakage_model= new Pakagemodel();
        $data["pakage"]= $pakage_model->where('id',$id)->first();

        if($this->request->getMethod()=='post'){ 

            if ($this->validate('pakage')) {
                $data = [
                    'pakage_title' => $this->request->getVar('pakage_title'),
                    'pakage_objective' => $this->request->getVar('pakage_objective'),
                    'duration' => $this->request->getVar('duration'),
                    'd_m_y' => $this->request->getVar('d_m_y'),
                    'how_many' => $this->request->getVar('how_many'),
                    'cost' => $this->request->getVar('cost'),
                    'property_limit' => $this->request->getVar('property_limit'),
                    'price_key' => $this->request->getVar('price_key'),
                    'status' => 1,
                ];
                $data_update= $pakage_model->update($id,$data);
                $data["pakage"]= $pakage_model->where('id',$id)->first();
                return redirect()->to(base_url('/admin/pakage_list'))->with('updated','Data Updated');
            }else{
                $data['validation'] = $this->validator;
                $data["pakage"]= $pakage_model->where('id',$id)->first();
                return view('\Modules\Super_admin\admin\super_admin\pakage_edit',$data);
              }
        }

      
        return view('\Modules\Super_admin\admin\super_admin\pakage_edit',$data);
    }

    public function pakage_delete($id){
        $pakage_model= new Pakagemodel();
        $datas = [
            'status' => 0,
        ];
        
        $data_save= $pakage_model->update($id,$datas);

        return redirect()->to(base_url('/admin/pakage_list'))->with('deleted','Data Deleted');
    }

    public function paypal_setup(){
        
        return view('\Modules\Super_admin\admin\super_admin\paypal_setup');
        
    }
    public function stripe_setup(){
        $stripe_model = new Stripemodel();
        $data["stripe"]= $stripe_model->where('id',1)->first();
        if($this->request->getMethod()=='post'){ 

            if ($this->validate('stripe')) {
                $data = [
                    'stripe_mode' => $this->request->getVar('stripe_mode'),
                    'stripe_api_key' => $this->request->getVar('stripe_api_key'),
                    'stripe_test_api_key' => $this->request->getVar('stripe_test_api_key'),
                    'stripe_serect_key' => $this->request->getVar('stripe_serect_key'),
                    'stripe_test_serect_key' => $this->request->getVar('stripe_test_serect_key'),
                    'status' => $this->request->getVar('status'),
                ];

                $id=1;
                $update = $stripe_model->update($id,$data);

                $data["stripe"]= $stripe_model->where('id',$id)->first();
                $data["updated"]= "Data Updated";
                //return redirect()->back()->with('updated','Data Updated');
                return view('\Modules\Super_admin\admin\super_admin\stripe_setup',$data);
            }else{
                $data['validation'] = $this->validator;
                return view('\Modules\Super_admin\admin\super_admin\stripe_setup',$data);
              }
        }
        
        return view('\Modules\Super_admin\admin\super_admin\stripe_setup',$data);
        
    }

}