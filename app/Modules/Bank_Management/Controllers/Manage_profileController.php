<?php

namespace Modules\Bank_Management\Controllers;

// use Modules\Demo\Models\Demomodel;
// use Modules\Demo\Models\Blogmodel;
use App\Controllers\BaseController;
use Modules\Bank_Management\Models\UserModel;
use Modules\CategoryModule\Models\Categorymodel;

class Manage_profileController extends BaseController{

    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    // public function index($pro_id=''){
    //     if(!empty($pro_id) && is_numeric($pro_id)){
    //         $this->session->set('rs_property_id',$pro_id);

    //         if(valid_user($pro_id)==false){
    //             return redirect()->back();
    //         }
           

    //     }

    //     $property_id=$this->session->get('rs_property_id');

    //     // var_dump($property_id);
    //     // die();

    //     return view('Modules\Bank_Management\Views\admin\manage_profile');
    // }


    public function index(){
        
        $UserModel = new UserModel;

        
        $Usertable = $UserModel->findAll();

        


        // return view('Modules\Bank_Management\Views\admin\manage_profile',['cattable' => $Categorytable]);
        return view('Modules\Bank_Management\Views\admin\user',['userdata' => $Usertable]);

    }

    public function insertuser(){

        $UserModel = new UserModel();

        $data = [

            'name'        => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'password'        => $this->request->getPost('password'),
            'confirm_password'        => $this->request->getPost('confirm_password'),
            
        ];
        $UserModel->insert($data);

        // $rules = [
        //     'name' => 'required|min_length[3]',
        //     'email' => 'required|valid_email',
        //     'password' => 'required',
        //     'confirm_password' => 'required'
        // ];

        // if($this->validate($rules)){
        //     $UserModel = new UserModel();

        //     $data = [

        //         'name'        => $this->request->getPost('name'),
        //         'email'        => $this->request->getPost('email'),
        //         'password'        => $this->request->getPost('password'),
        //         'confirm_password'        => $this->request->getPost('confirm_password'),
                
        //     ];
        //     $UserModel->insert($data);
        //     return redirect()->to('Modules\Bank_Management\Views\admin\manage_profile');
        // }else{
        //     $data['validation'] = $this->validator;
        //     echo view('Modules\Bank_Management\Views\admin\manage_profile', $data);
        // }        

    }

    public function saveuser(){

        $UserModel = new UserModel();
        
        $data = [

            'name'        => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'password'        => $this->request->getPost('password'),
            'confirm_password'        => $this->request->getPost('confirm_password'),
            
        ];
        $UserModel->insert($data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'File inserted successfully.']);

    }

    public function deleteuser($id)
    {

        $UserModel = new UserModel();
        $userdeleted = $UserModel->delete($id);
        
        $UserModel = new UserModel();
        $usertable = $UserModel->findAll();
        
        return redirect()->to('admin/manage_profile')->with('status', 'success');

        // return view('Modules\Bank_Management\Views\admin\user',['userdata'=>$usertable]);
        
    }

    public function edituser()
    {
        
        $id = $this->request->getGET('id');

        $UserModel = new UserModel();

        $data = $UserModel->where('userId',$id)->findAll();

        // echo "<pre>";
        // print_r($data);
        // die();

        return json_encode($data);
        // return view('Modules\Bank_Management\Views\admin\manage_profile', ['userdata'=>$data,'menuValue'=>$menuValue,'homepageValue'=>$homepageValue]); 
       
    }

    public function updateuser($id)
    {
    
     $UserModel = new UserModel;
     $usertable = $UserModel->find($id);

     $data = [

        'name'        => $this->request->getPost('name'),
        'email'        => $this->request->getPost('email'),
        'password'        => $this->request->getPost('password'),
        'confirm_password'        => $this->request->getPost('confirm_password'),
        
        ];
        
        $UserModel->update($id,$data);

        // return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);

        // $UserModel = new UserModel();
        // $cattable = $UserModel->findAll();
        
        // return view('variantcategory/variantcategory',['cattable'=>$cattable]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'File updated successfully.']);
       
    }
    
}
