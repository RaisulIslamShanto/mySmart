<?php

namespace Modules\Bank\Controllers;

use App\Controllers\BaseController;
use Modules\Bank\Models\BankListModel;
use Modules\Bank\Models\BudgetsModel;
use Modules\Bank\Models\BankAccountModel;
use Modules\CategoryModule\Models\Categorymodel;

class BudgetsController extends BaseController{

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
    public function Budgets($pro_id=''){
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);

            if(valid_user($pro_id)==false){
                return redirect()->back();
            }


        }

        $property_id=$this->session->get('rs_property_id');


        $budgetsModel = new BudgetsModel();
        $budgetslist = $budgetsModel->where('property_id',$property_id)->findAll();
        // echo '<pre>';print_r($budgetslist);die;

        $bankaccount = new BankAccountModel();
        $accountlist = $bankaccount->where('property_id',$property_id)->findAll();

        $banklistmodel = new BankListModel();
        $banklist = $banklistmodel->where('property_id',$property_id)->findAll();

        $Categorymodel = new Categorymodel;
        $Categorytable = $Categorymodel->findAll();

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

        return view('Modules\Bank\Views\admin\bank\budgets_list', [
            "accountlist" => $accountlist,
            "banklist" => $banklist,
            "data" => $myData,
            "budgetslist" => $budgetslist,
            "Categorytable" => $Categorytable,
        ]);
    }




    public function BudgetsAdd(){

        $property_id = $this->session->get('rs_property_id');

        $validation = \Config\Services::validation();

        $rules = [
            'budgetName' => 'required', 
            'Amount' => 'required',
            'Category' => 'required',
            'Startdate' => 'required',
            'Enddate' => 'required',
           
        ];


        $validation->setRules($rules, [
            'budgetName' => [
                'required' => 'Please enter budget Name.',
            ],
            'Amount' => [
                'required' => 'Please enter Amount.',
            ],
            'Category' => [
                'required' => 'Please enter Category.',
            ],
            'Startdate' => [
                'required' => 'Please enter Start date.',
            ],
            'Enddate' => [
                'required' => 'Please enter End date.',
            ],


        ]);

        if (!$this->validate($rules)) {
            $response = [
                'budgetName' => [
                    'status' => 'error',
                    'message' => $validation->getError('budgetName') ?: '',
                ],
                'Amount' => [
                    'status' => 'error',
                    'message' => $validation->getError('Amount') ?: '',
                ],
                'Category' => [
                    'status' => 'error',
                    'message' => $validation->getError('Category') ?: '',
                ],
                'Startdate' => [
                    'status' => 'error',
                    'message' => $validation->getError('Startdate') ?: '',
                ],
                'Enddate' => [
                    'status' => 'error',
                    'message' => $validation->getError('Enddate') ?: '',
                ],
            ];
            return json_encode($response);
        }

        $budgetsModel = new BudgetsModel();
        $data = array();
        $budgetsData = [
                        'budget_name' => $this->request->getVar('budgetName'),
                        'budget_amount' => $this->request->getVar('Amount'),
                        'expense_categories' => $this->request->getVar('Category'),
                        'start_date' => $this->request->getVar('Startdate'),
                        'end_date' => $this->request->getVar('Enddate'),
                        'property_id' => $property_id
                    ];


                $budgetsModel->insert($budgetsData);
            
            $res = $budgetsModel->findAll();

            $response = [
                'success' => [
                    'status' => 'ok',
                    'message' => 'Data inserted successfully.',
                ],
            ];
            return json_encode($response);

            $data['getbudgets'] = $budgetsModel->where('property_id', $property_id)->findAll();
            return view('Modules\Bank\Views\admin\bank\budgets-list', $data);

    }



    public function BudgetsListEdit($id)
    {
        
        $property_id=$this->session->get('rs_property_id');
        $budgetsModel = new BudgetsModel();
        $data = $budgetsModel->find($id);
    // echo'<pre>';print_r($data);die();

      $data['geteditbud']= $budgetsModel->where('property_id',$property_id)->findall();
      return $this->response->setJSON($data);
    // return view('Admin_Template/user');

    }


    public function BudgetsListUpdate($id)
                {
                    $property_id = $this->session->get('rs_property_id');
                    $validation = \Config\Services::validation();

                    $rules = [
                        'budgetName' => 'required', 
                        'Amount' => 'required',
                        'Category' => 'required',
                        'Startdate' => 'required',
                        'Enddate' => 'required',
                       
                    ];
            
            
                    $validation->setRules($rules, [
                        'budgetName' => [
                            'required' => 'Please enter budget Name.',
                        ],
                        'Amount' => [
                            'required' => 'Please enter Amount.',
                        ],
                        'Category' => [
                            'required' => 'Please enter Category.',
                        ],
                        'Startdate' => [
                            'required' => 'Please enter Start date.',
                        ],
                        'Enddate' => [
                            'required' => 'Please enter End date.',
                        ],
            
            
                    ]);
            
                    if (!$this->validate($rules)) {
                        $response = [
                            'budgetName' => [
                                'status' => 'error',
                                'message' => $validation->getError('budgetName') ?: '',
                            ],
                            'Amount' => [
                                'status' => 'error',
                                'message' => $validation->getError('Amount') ?: '',
                            ],
                            'Category' => [
                                'status' => 'error',
                                'message' => $validation->getError('Category') ?: '',
                            ],
                            'Startdate' => [
                                'status' => 'error',
                                'message' => $validation->getError('Startdate') ?: '',
                            ],
                            'Enddate' => [
                                'status' => 'error',
                                'message' => $validation->getError('Enddate') ?: '',
                            ],
                        ];
                        return json_encode($response);
                    }
                    $budgetsModel = new BudgetsModel();
                    $data = $budgetsModel->find($id);
                    // echo'<pre>';
                    // print_r($user);
                    // die();
                  
                    if ($this->request->getMethod() === 'post') {
                        $budgetName = $this->request->getPost('budgetName');
                        $Amount = $this->request->getPost('Amount');
                        $Category = $this->request->getPost('Category');
                        $Startdate = $this->request->getPost('Startdate');
                        $Enddate = $this->request->getPost('Enddate');
        
                        $data = [
                            'budget_name' => $budgetName,
                            'update_amount' => $Amount,
                            'expense_categories' => $Category,
                            'start_date' => $Startdate,
                            'end_date' => $Enddate,
                            'property_id'         => $property_id
                          
                        ];
                        $budgetsModel->update($id, $data);

                        $response = [
                            'success' => true,
                            'message' => 'Data updated successfully.'
                        ];
                        return $this->response->setJSON($response);
                    }
                    $data['getbudgetlist']= $budgetsModel->where('property_id',$property_id)->findall();
                    return view('Modules\Bank\Views\admin\bank\budgets-list', $data);
                }




    public function BudgetsDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');
        $budgetsModel = new BudgetsModel();
        $data = $budgetsModel->find($id);
        

        if ($data) {
            $budgetsModel->delete($id);

            $response = [
                'success' => true,
                'message' => 'Bank Account deleted successfully.'
            ];
        } 
     return $this->response->setJSON($response);

     $data['getbudgets']= $budgetsModel->where('property_id',$property_id)->findall();
     return view('Modules\Bank\Views\admin\bank\budgets_list',$data);
    }

}
