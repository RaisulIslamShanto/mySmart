<?php

namespace Modules\Bank\Controllers;

use App\Controllers\BaseController;
use Modules\Bank\Models\BankListModel;
// use Modules\Demo\Models\Blogmodel;
use Modules\Bank\Models\BankAccountModel;
use Modules\Bank\Models\SettingModel;

class BankController extends BaseController{

    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    /**
     * This method index shows Floor list of a property.
     * Method - get
     */
    public function index($pro_id=''){
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);

            if(valid_user($pro_id)==false){
                return redirect()->back();
            }


        }

        $property_id=$this->session->get('rs_property_id');

        $bankaccount = new BankAccountModel();
        $accountlist = $bankaccount->where('property_id',$property_id)->findAll();


        $banklistmodel = new BankListModel();
        $banklist = $banklistmodel->where('property_id',$property_id)->findAll();

        $settingmodel = new SettingModel();
        $settingdata = $settingmodel->where('property_id',$property_id)->findAll();
// echo '<pre>';print_r($settingdata);die;


        $db = \Config\Database::connect();
        $myData = [];

        foreach ($accountlist as $allvalue) {
            $allvalue['bank'] = $db->table('bank_list')
                ->where('id', $allvalue['bank_name_id'])
                ->get()
                ->getRow();
        
            // $allvalue['to_bank'] = $db->table('bank_account')
            //     ->where('id', $allvalue['to_account_id'])
            //     ->get()
            //     ->getRow();

                $myData[]=$allvalue;
                
        }

// echo '<pre>';
// print_r($myData);
// die();
        // $currency['getCurrency'] = $settingmodel->where('property_id', $property_id)->findAll();
        return view('Modules\Bank\Views\admin\bank\bank-account', [
            "username" => $this->session->get('name'),
            "accountlist" => $accountlist,
            "banklist" => $banklist,
            "data" => $myData,
            "settingdata" => $settingdata,
        ]);
    }



    public function Bank($pro_id=''){
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);

            if(valid_user($pro_id)==false){
                return redirect()->back();
            }
        }

        $property_id=$this->session->get('rs_property_id');
        // echo '<pre>';print_r($property_id);die;
        $banklistmodel = new BankListModel();
        $banklist = $banklistmodel->where('property_id',$property_id)->findAll();
        // echo '<pre>';print_r($banklist);die;
        $data['getBank'] = $banklistmodel->where('property_id', $property_id)->findAll();
        return view('Modules\Bank\Views\admin\bank\bank-list', [

            "banklist" => $banklist,
        ]);
    }



    public function AddBank(){
        $property_id = $this->session->get('rs_property_id');
        $validation = \Config\Services::validation();

        $rules = [
            'BankName' => 'required',            
        ];
        $validation->setRules($rules, [
            'BankName' => [
                'required' => 'Please enter Bank Name.',
            ],
        ]);

        if (!$this->validate($rules)) {
            $response = [
                'BankName' => [
                    'status' => 'error',
                    'message' => $validation->getError('BankName') ?: '',
                ],
            ];
            return json_encode($response);
        }

        $banklistmodel = new BankListModel();
        $data = array();
        $BankData = [
                        'bank_name'    => $this->request->getVar('BankName'),
                        'property_id' => $property_id
                    ];

                $banklistmodel->insert($BankData);
                $res = $banklistmodel->findAll();

            $response = [
                'success' => [
                    'status' => 'ok',
                    'message' => 'Data inserted successfully.',
                ],
            ];
            return json_encode($response);

            $data['getBank'] = $banklistmodel->where('property_id', $property_id)->findAll();
            return view('Modules\Bank\Views\admin\bank\bank-list', $data);

        // $banklistmodel = new BankListModel();
        // $data = array();

        // if($this->request->getMethod() == 'post'){
        //     if(!$this->validate('BankAccountValidate')){
        //         $data['validation'] = $this->validator;
        //     }else{
        //         $BankData = [
        //             'bank_name'    => $this->request->getVar('blogTitle'),
        //         ];

        //         $res = $banklistmodel->insert($BankData);

        //         if($res){
        //             $data['getBank'] = $banklistmodel->where('property_id',$property_id)->findAll();
        //             // return $data);
        //             return json_encode($data);
        //         }
        //     }
        // }

        // $data['getBank'] = $banklistmodel->where('property_id', $property_id)->findAll();
        // return view('Modules\Bank\Views\admin\bank\bank-list', $data);
    }




    // public function BankDelete($id){
    //     $property_id=$this->session->get('rs_property_id');

    //     $banklistmodel = new BankListModel();

    //     $banklistmodel->delete($id);

    //     $data['getBanklist']= $banklistmodel->where('property_id',$property_id)->findall();
    //     return view('Modules\Bank\Views\admin\bank\bank-list',$data);
    // }


    public function BankListEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');
        $banklistmodel = new BankListModel();
        $data = $banklistmodel->find($id);
    // echo'<pre>';print_r($data);die();

      $data['getBanklist']= $banklistmodel->where('property_id',$property_id)->findall();
      return $this->response->setJSON($data);
    // return view('Admin_Template/user');

    }




    public function BankListUpdate($id)
                {
                    $property_id = $this->session->get('rs_property_id');
                    $validation = \Config\Services::validation();
            
                    $rules = [
                        'BankName' => 'required',            
                    ];
                    $validation->setRules($rules, [
                        'BankName' => [
                            'required' => 'Please enter Bank Name.',
                        ],
                    ]);
            
                    if (!$this->validate($rules)) {
                        $response = [
                            'BankName' => [
                                'status' => 'error',
                                'message' => $validation->getError('BankName') ?: '',
                            ],
                        ];
                        return json_encode($response);
                    }
                    $banklistmodel = new BankListModel();
                    $data = $banklistmodel->find($id);
                    // echo'<pre>';
                    // print_r($user);
                    // die();

                    if ($this->request->getMethod() === 'post') {
                        $name = $this->request->getPost('BankName');
                      
                        
                        $data = [
                            'bank_name' => $name,
                            'property_id'         => $property_id
                          
                        ];
                        $banklistmodel->update($id, $data);

                        $response = [
                            'success' => true,
                            'message' => 'Data updated successfully.'
                        ];
                        return $this->response->setJSON($response);
                    }
                    $data['getBanklist']= $banklistmodel->where('property_id',$property_id)->findall();
                    return view('Modules\Bank\Views\admin\bank\bank-list', $data);
                }



    public function BankDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');
        $banklistmodel = new BankListModel();
        $data = $banklistmodel->find($id);
        

        if ($data) {
            $banklistmodel->delete($id);

            $response = [
                'success' => true,
                'message' => 'Bank deleted successfully.'
            ];
        } 
     return $this->response->setJSON($response);

     $data['getBanklist']= $banklistmodel->where('property_id',$property_id)->findall();
     return view('Modules\Bank\Views\admin\bank\bank-list',$data);
    }






    public function AddBankAccount(){
        $property_id = $this->session->get('rs_property_id');

        $validation = \Config\Services::validation();

        $rules = [
            'holderName' => 'required', 
            'BankName' => 'required',
            'accountNumber' => 'required',
            'InitialBalance' => 'required',
           
        ];


        $validation->setRules($rules, [
            'holderName' => [
                'required' => 'Please enter holder Name.',
            ],
            'BankName' => [
                'required' => 'Please enter Bank Name.',
            ],
            'accountNumber' => [
                'required' => 'Please enter account Number.',
            ],
            'InitialBalance' => [
                'required' => 'Please enter Initial Balance.',
            ],

        ]);

        if (!$this->validate($rules)) {
            $response = [
                'holderName' => [
                    'status' => 'error',
                    'message' => $validation->getError('holderName') ?: '',
                ],
                'BankName' => [
                    'status' => 'error',
                    'message' => $validation->getError('BankName') ?: '',
                ],
                'accountNumber' => [
                    'status' => 'error',
                    'message' => $validation->getError('accountNumber') ?: '',
                ],
                'InitialBalance' => [
                    'status' => 'error',
                    'message' => $validation->getError('InitialBalance') ?: '',
                ],
            ];
            return json_encode($response);
        }

        $bankaccount = new BankAccountModel();
        $data = array();
        $bankAccountData = [
                        'account_holders_name' => $this->request->getVar('holderName'),
                        'bank_name_id' => $this->request->getVar('BankName'),
                        'account_number' => $this->request->getVar('accountNumber'),
                        'initial_balance' => $this->request->getVar('InitialBalance'),
                        'property_id' => $property_id
                    ];


                $bankaccount->insert($bankAccountData);
            
            $res = $bankaccount->findAll();

            $response = [
                'success' => [
                    'status' => 'ok',
                    'message' => 'Data inserted successfully.',
                ],
            ];
            return json_encode($response);

            $data['getBankAccount'] = $bankaccount->where('property_id', $property_id)->findAll();
            return view('Modules\Bank\Views\admin\bank\bank-account', $data);

    }



    public function AccountListEdit($id)
    {
        
        $property_id=$this->session->get('rs_property_id');
        $bankaccount = new BankAccountModel();
        $data = $bankaccount->find($id);
    // echo'<pre>';print_r($data);die();

      $data['getAcclist']= $bankaccount->where('property_id',$property_id)->findall();
      return $this->response->setJSON($data);
    // return view('Admin_Template/user');

    }


    public function AccountListUpdate($id)
                {
                    $property_id = $this->session->get('rs_property_id');
                    $validation = \Config\Services::validation();

        $rules = [
            'holderName' => 'required', 
            'BankName' => 'required',
            'accountNumber' => 'required',
            'InitialBalance' => 'required',
           
        ];


        $validation->setRules($rules, [
            'holderName' => [
                'required' => 'Please enter holder Name.',
            ],
            'BankName' => [
                'required' => 'Please enter Bank Name.',
            ],
            'accountNumber' => [
                'required' => 'Please enter account Number.',
            ],
            'InitialBalance' => [
                'required' => 'Please enter Initial Balance.',
            ],

        ]);

        if (!$this->validate($rules)) {
            $response = [
                'holderName' => [
                    'status' => 'error',
                    'message' => $validation->getError('holderName') ?: '',
                ],
                'BankName' => [
                    'status' => 'error',
                    'message' => $validation->getError('BankName') ?: '',
                ],
                'accountNumber' => [
                    'status' => 'error',
                    'message' => $validation->getError('accountNumber') ?: '',
                ],
                'InitialBalance' => [
                    'status' => 'error',
                    'message' => $validation->getError('InitialBalance') ?: '',
                ],
            ];
            return json_encode($response);
        }
                    $bankaccount = new BankAccountModel();
                    $data = $bankaccount->find($id);
                    // echo'<pre>';
                    // print_r($user);
                    // die();
                  
                    if ($this->request->getMethod() === 'post') {
                        $holderName = $this->request->getPost('holderName');
                        $BankName = $this->request->getPost('BankName');
                        $accountNumber = $this->request->getPost('accountNumber');
                        $InitialBalance = $this->request->getPost('InitialBalance');
                      
                        
                        $data = [
                            'account_holders_name' => $holderName,
                            'bank_name_id' => $BankName,
                            'account_number' => $accountNumber,
                            'initial_balance' => $InitialBalance,
                            'property_id'         => $property_id
                          
                        ];
                        $bankaccount->update($id, $data);

                        $response = [
                            'success' => true,
                            'message' => 'Data updated successfully.'
                        ];
                        return $this->response->setJSON($response);
                    }
                    $data['getBanklist']= $bankaccount->where('property_id',$property_id)->findall();
                    return view('Modules\Bank\Views\admin\bank\bank-list', $data);
                }




    public function AccountDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');
        $bankaccount = new BankAccountModel();
        $data = $bankaccount->find($id);
        

        if ($data) {
            $bankaccount->delete($id);

            $response = [
                'success' => true,
                'message' => 'Bank Account deleted successfully.'
            ];
        } 
     return $this->response->setJSON($response);

     $data['getBankAc']= $bankaccount->where('property_id',$property_id)->findall();
     return view('Modules\Bank\Views\admin\bank\account-list',$data);
    }


   

    // //Blog add method
    // public function blogAdd(){
    //     $property_id = $this->session->get('rs_property_id');
    //     $blog = new Blogmodel();
    //     $data = array();

    //     if($this->request->getMethod() == 'post'){
    //         if(!$this->validate('demoValidate')){
    //             $data['validation'] = $this->validator;
    //         }else{
    //             $imgFile = $this->request->getFile('blogImage');
    //             $newName = '';

    //             if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
    //                 $newName = $imgFile->getRandomName();
    //                 $imgFile->move(ROOTPATH . 'public/blogImage', $newName);
    //             }

    //             $blogData = [
    //                 'blogtitle'    => $this->request->getVar('blogTitle'),
    //                 'bloguri'      => $this->request->getVar('uri'),
    //                 'blogcontent'  => $this->request->getVar('blog_content'),
    //                 'blogcategory' => $this->request->getVar('category'),
    //                 'blogimage'    => $newName,
    //                 'property_id'  => $property_id
    //             ];

    //             $res = $blog->insert($blogData);

    //             if($res){
    //                 $data['getBlogs'] = $blog->where('property_id',$property_id)->findAll();
    //                 return view('Modules\Demo\Views\admin\demo\blog-list', $data);
    //             }
    //         }
    //     }

    //     $data['getCategories'] = $blog->where('property_id', $property_id)->findAll();
    //     return view('Modules\Demo\Views\admin\demo\blog-add', $data);
    // }

    // public function categoryEdit($id){
    //     $property_id=$this->session->get('rs_property_id');
    //     $category = new Categorymodel();
    //     $data['categoryInfo'] = $category->where(['id' => $id,'property_id'=>$property_id])->first();

    //     if ($this->request->getMethod() == 'post') {

    //         if (!$this->validate('demoValidate')) {
    //             $data['validation'] = $this->validator;
    //         } else {

    //             $imgFile = $this->request->getFile('categoryImage');
    //             $newName = '';

    //             if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
    //                 $newName = $imgFile->getRandomName();
    //                 $imgFile->move(ROOTPATH . 'public/categoryImage', $newName);
    //             }

    //             $categoryData = [
    //                 'categoryname'        => $this->request->getVar('categoryName'),
    //                 'categoryuri'         => $this->request->getVar('uri'),
    //                 'categorydescription' => $this->request->getVar('category_description'),
    //                 'parentcategory'      => $this->request->getVar('parentCategory'),
    //                 'categoryimage'       => $newName,
    //                 'property_id'         => $property_id
    //             ];

    //             $category->update($id, $categoryData);
    //             $data['getDemos']= $demo->where('property_id',$property_id)->findall();
    //             return view('Modules\Demo\Views\admin\demo\category-list',$data);
    //         }
    //     }

    //     if(isset($data['categoryInfo'])){
    //         return view('Modules\Demo\Views\admin\demo\category-edit', $data);
    //     }else{
    //         return view('\Modules\Home\Views\admin\home\property_error_page');
    //     }
    // }

    // public function AccountDelete($id){
    //     $property_id=$this->session->get('rs_property_id');

    //     $bankaccount = new BankAccountModel();

    //     $bankaccount->delete($id);

    //     $data['getBankAc']= $bankaccount->where('property_id',$property_id)->findall();
    //     return view('Modules\Bank\Views\admin\bank\account-list',$data);
    // }

}
