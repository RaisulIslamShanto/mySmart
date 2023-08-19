<?php

namespace Modules\Bank\Controllers;

use App\Controllers\BaseController;
use Modules\Bank\Models\BalanceTransferModel;
use Modules\Bank\Models\DebtsLoansModel;
use Modules\Bank\Models\BankAccountModel;
use Modules\Bank\Models\ExpensesModel;
use Modules\CategoryModule\Models\Categorymodel;

class ExpensesController extends BaseController{
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
    public function Expenses($pro_id=''){
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);

            if(valid_user($pro_id)==false){
                return redirect()->back();
            }


        }
        $property_id=$this->session->get('rs_property_id');

        $bankaccount = new BankAccountModel();
        $accountlist = $bankaccount->where('property_id',$property_id)->findAll();

        $balance = new BalanceTransferModel();
        $getBalance = $balance->where('property_id', $property_id)->findAll();

        $expensesmodel = new ExpensesModel();
        $expenseslist = $expensesmodel->where('property_id',$property_id)->findAll();

        // echo '<pre>';
        // print_r($expenseslist);
        // die();
  
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


        $myexpData = [];

        foreach ($expenseslist as $allvalue) {
            $allvalue['exp'] = $db->table('bank_account')
                ->where('id', $allvalue['bank_account'])
                ->get()
                ->getRow();
        
            // $allvalue['to_bank'] = $db->table('bank_account')
            //     ->where('id', $allvalue['to_account_id'])
            //     ->get()
            //     ->getRow();

                $myexpData[]=$allvalue;
                
        }

        // echo '<pre>';print_r($myexpData);die;
        // $db = \Config\Database::connect();
        // $balanceData = [];

        // foreach ($getBalance as $allvalue) {



        //     $allvalue['bank'] = $db->table('bank_account')
        //         ->where('id', $allvalue['from_account'])
        //         ->get()
        //         ->getRow();
        
        //     $allvalue['to_bank'] = $db->table('bank_account')
        //         ->where('id', $allvalue['to_account_id'])
        //         ->get()
        //         ->getRow();

        //         $balanceData[]=$allvalue;
                
        // }


        return view('Modules\Bank\Views\admin\bank\expenses-list', [
            "username" => $this->session->get('name'),
            // "getBalance" => $getBalance,
            // "accountlist" => $accountlist,
            'data' => $myData,
            // "balanceData" => $balanceData,
            "expenseslist" => $expenseslist,
            "myexpData" => $myexpData,

        ]);
    }

    public function AddExpenses()
    {
        $property_id = $this->session->get('rs_property_id');
    
        $Categorymodel = new Categorymodel;
        $Categorytable = $Categorymodel->findAll();
    
        $expensesmodel = new ExpensesModel();
        $expenseslist = $expensesmodel->where('property_id', $property_id)->findAll();
    
        $bankaccount = new BankAccountModel();
        $accountlist = $bankaccount->where('property_id', $property_id)->findAll();
    
        $balance = new BalanceTransferModel();
        $getBalance = $balance->where('property_id', $property_id)->findAll();
    
        $db = \Config\Database::connect();
        $myData = [];
    
        foreach ($accountlist as $allvalue) {
            $allvalue['bank'] = $db->table('bank_list')
                ->where('id', $allvalue['bank_name_id'])
                ->get()
                ->getRow();
            $myData[] = $allvalue;
        }
        // echo '<pre>';
        // print_r($myData);
        // die();

        $myexpData = [];

        foreach ($expenseslist as $allvalue) {
            $allvalue['exp'] = $db->table('bank_account')
                ->where('id', $allvalue['bank_account'])
                ->get()
                ->getRow();
        
            // $allvalue['to_bank'] = $db->table('bank_account')
            //     ->where('id', $allvalue['to_account_id'])
            //     ->get()
            //     ->getRow();

                $myexpData[]=$allvalue;
                
        }
    
        if ($this->request->getMethod() == 'post') {
            $attchFile = $this->request->getFile('Attachment');
            $newName = '';
    
            if ($attchFile->isValid() && !$attchFile->hasMoved()) {
                $newName = $attchFile->getRandomName();
                $attchFile->move(ROOTPATH . 'public/expensesAttachment', $newName);
            }
    
            $expensesData = [
                'expense_category' => $this->request->getVar('Category'),
                'bank_account' => $this->request->getVar('ToAccount'),
                'amount' => $this->request->getVar('Amount'),
                'reference' => $this->request->getVar('Reference'),
                'description' => $this->request->getVar('Description'),
                'note' => $this->request->getVar('note'),
                'add_attachment' => $newName,
                'date' => $this->request->getVar('date'),
                'property_id' => $property_id,
            ];
    
            $bankAccountId = $this->request->getVar('ToAccount');
            $amount = $this->request->getVar('Amount');
    
            $bankAccount = $bankaccount->find($bankAccountId);
    
            if (!$bankAccount) {
                $response = [
                    'error' => [
                        'status' => 'error',
                        'message' => 'Invalid bank account.',
                    ],
                ];
                return json_encode($response);
            }
    
            if ($bankAccount['initial_balance'] >= $amount) {
    
                $res = $expensesmodel->insert($expensesData);
    
                if ($res) {
                    $newBalance = $bankAccount['initial_balance'] - $amount;
                    $bankaccount->update($bankAccountId, ['initial_balance' => $newBalance]);
    
                    $expdata['getexp'] = $expensesmodel->where('property_id', $property_id)->findAll();
                    return view('Modules\Bank\Views\admin\bank\expenses-list', [
                        "username" => $this->session->get('name'),
                        // "getBalance" => $getBalance,
                        // "accountlist" => $accountlist,
                        'data' => $myData,
                        "expenseslist" => $expenseslist,
                        "myexpData" => $myexpData,
                        // "Categorytable" => $Categorytable,
                    ]);
                }
            } else {

                $response = [
                    'error' => [
                        'status' => 'error',
                        'message' => 'Insufficient balance in the bank account.',
                    ],
                ];
                return json_encode($response);
            }
        }
    
        $data['getexpenses'] = $expensesmodel->where('property_id', $property_id)->findAll();
        return view('Modules\Bank\Views\admin\bank\add-expenses', [
            "username" => $this->session->get('name'),
            "getBalance" => $getBalance,
            "accountlist" => $accountlist,
            'data' => $myData,
            "expenseslist" => $expenseslist,
            "Categorytable" => $Categorytable,
        ]);
    }


    // public function ExpensesListEdit($id)
    // {

    //     $property_id = $this->session->get('rs_property_id');

    //     $expensesmodel = new ExpensesModel();
    //     $expenseslist = $expensesmodel->where('property_id',$property_id)->findAll();
    
    //     $bankaccount = new BankAccountModel();
    //     $accountlist = $bankaccount->where('property_id',$property_id)->findAll();

    //     $db = \Config\Database::connect();
    //     $myData = [];

    //     foreach ($accountlist as $allvalue) {
    //         $allvalue['bank'] = $db->table('bank_list')
    //             ->where('id', $allvalue['bank_name_id'])
    //             ->get()
    //             ->getRow();
    //             $myData[]=$allvalue;
                
    //     }

    //     $data['editexpenses'] = $expensesmodel->where('property_id', $property_id)->findAll();
    //     return view('Modules\Bank\Views\admin\bank\expenses-edit', [
    //         "accountlist" => $accountlist,
    //         'data' => $myData,
    //         "expenseslist" => $expenseslist,



    //     ]);
    // }


    public function ExpensesListEdit($id){

        $property_id=$this->session->get('rs_property_id');
        $expensesmodel = new ExpensesModel();
        $data['expenseslist'] = $expensesmodel->where(['id' => $id,'property_id'=>$property_id])->first();


        $bankaccount = new BankAccountModel();
        $accountlist = $bankaccount->where('property_id',$property_id)->findAll();
        
        $db = \Config\Database::connect();
        $myData = [];

        foreach ($accountlist as $allvalue) {
            $allvalue['bank'] = $db->table('bank_list')
                ->where('id', $allvalue['bank_name_id'])
                ->get()
                ->getRow();
                $myData[]=$allvalue;
                
        }
        // echo '<pre>';print_r($myData);die;

        if($this->request->getMethod() == 'post'){
            $attchFile = $this->request->getFile('Attachment');
            $newName = '';

            if ($attchFile->isValid() && ! $attchFile->hasMoved()) {
                $newName = $attchFile->getRandomName();
                $attchFile->move(ROOTPATH . 'public/expensesAttachment', $newName);
            }

            $expensesData = [
                'expense_category'    => $this->request->getVar('Category'),
                'bank_account'      => $this->request->getVar('ToAccount'),
                'amount'  => $this->request->getVar('Amount'),
                'reference'  => $this->request->getVar('Reference'),
                'description' => $this->request->getVar('Description'),
                'note'  => $this->request->getVar('note'),
                'add_attachment'    => $newName,
                'date' => $this->request->getVar('date'),
                'property_id'  => $property_id
            ];

                $expensesmodel->update($id, $expensesData);
                // echo '<pre>';print_r($expensesmodel);die;
                
                $data['editexpenses'] = $expensesmodel->where('property_id', $property_id)->findAll();
                $data['username'] =$this->session->get('name');
                
                return view('Modules\Bank\Views\admin\bank\expenses-list',$data);
            
        }
        if(isset($data['expenseslist'])){
          
            return view('Modules\Bank\Views\admin\bank\expenses-edit', $data,);   
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }
    }

    
    // public function update_categories($id)
    // {
        
    //     $updatcatgModel = new add_categoryModel();


    //     $query = 'SELECT * FROM categorys
    //     LEFT JOIN posts ON categorys.id = posts.category
    //     WHERE categorys.id = ' . $id;

    //    $res = db_connect()->query($query)->getResult();
    //    $data1 = $res;

    //     if ($this->request->getMethod() === 'put') {
    //         $categoryId = $this->request->getPost('categoryId');
    //         $name = $this->request->getPost('name');
    //         $URL = $this->request->getPost('uri');
    //         $description = $this->request->getPost('description');
    //         $order = $this->request->getPost('order');
    //         $parents = $this->request->getPost('parent_id');
    //         $others = $this->request->getPost('site');
    //         $photos = $this->request->getfile('photos')->getName();

    //         $data = [
    //             'name' => $name,
    //             'URL' => $URL,
    //             'description' => $description,
    //             'order' => $order,
    //             'parents' => $parents,
    //             'others' => $others,
    //             'photos' => $photos,
    //         ];


    //         $updatcatgModel->update($categoryId, $data);

    //         $response = [
    //             'success' => true,
    //             'message' => 'Data updated successfully.'
    //         ];

    //         return $this->response->setJSON($response);

    //     }
    //     $data2 = $updatcatgModel->where('parents', 0)->findAll();
    //     $data = $updatcatgModel->find([$id]); 
    //     // var_dump($data);
    
    //      return view('Admin_Template/edit_categories', ['data' => $data,'data2' => $data2,'data1'=>$data1,]);

    // }

    public function ExpensesDelete($id){
        $property_id=$this->session->get('rs_property_id');
        $expensesmodel = new ExpensesModel();

        $expensesmodel->delete($id);

        $data['getexp']= $expensesmodel->where('property_id',$property_id)->findall();

        echo"<pre>";
        print_r($data);
        die();
        
        return view('Modules\Bank\Views\admin\bank\expenses-list',$data);
    }






    public function ExpensesReport($pro_id=''){
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);

            if(valid_user($pro_id)==false){
                return redirect()->back();
            }

        }
        $property_id=$this->session->get('rs_property_id');

        $bankaccount = new BankAccountModel();
        $accountlist = $bankaccount->where('property_id',$property_id)->findAll();

        $balance = new BalanceTransferModel();
        $getBalance = $balance->where('property_id', $property_id)->findAll();

        $expensesmodel = new ExpensesModel();
        $expenseslist = $expensesmodel->where('property_id',$property_id)->findAll();
  
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


        $db = \Config\Database::connect();
        $balanceData = [];

        foreach ($getBalance as $allvalue) {



            $allvalue['bank'] = $db->table('bank_account')
                ->where('id', $allvalue['from_account'])
                ->get()
                ->getRow();
        
            $allvalue['to_bank'] = $db->table('bank_account')
                ->where('id', $allvalue['to_account_id'])
                ->get()
                ->getRow();

                $balanceData[]=$allvalue;
                
        }


        return view('Modules\Bank\Views\admin\bank\expenses-report', [
            "username" => $this->session->get('name'),
            // "getBalance" => $getBalance,
            // "accountlist" => $accountlist,
            'data' => $myData,
            // "balanceData" => $balanceData,
            "expenseslist" => $expenseslist,

        ]);
    } 


    public function ExpensesReportFilter()
{
    $property_id = $this->session->get('rs_property_id');
    $expensesmodel = new ExpensesModel();
    $expenseslist = $expensesmodel->where('property_id', $property_id)->findAll();

    if ($this->request->getMethod() === 'post') {
        $start_date = $this->request->getPost('from');
        $end_date = $this->request->getPost('to');

        $db = \Config\Database::connect(); 

        


        $query = $db->table('expenses')
            ->where('property_id', $property_id)
            ->where("date >= '$start_date'")
            ->where("date <= '$end_date'")
            ->get();

        $filterdata['expensesList'] = $query->getResultArray();
        // echo '<pre>';
        // print_r($filterdata['expensesList']);
        // die;

        return view('Modules\Bank\Views\admin\bank\expenses-report', [
            "filterdata" => $filterdata,
            "username" => $this->session->get('name'),
            "expenseslist" => $expenseslist,
        ]);
    }
}

    // public function AddExpenses()
    // {
    //     $property_id = $this->session->get('rs_property_id');
       
    //     return view('Modules\Bank\Views\admin\bank\add_expenses',['data'=>$data]);
    // }

    // public function AddDebtsLoans(){
    //     $property_id = $this->session->get('rs_property_id');

    //     $validation = \Config\Services::validation();

    //     $rules = [
    //         'amount' => 'required', 
    //         'BankAccount' => 'required',
    //         'Type' => 'required',
    //         'Person' => 'required',
    //         'date' => 'required',
    //         'note' => 'required',
           
    //     ];


    //     $validation->setRules($rules, [
    //         'amount' => [
    //             'required' => 'Please enter amount.',
    //         ],
    //         'BankAccount' => [
    //             'required' => 'Please enter Bank Account.',
    //         ],
    //         'Type' => [
    //             'required' => 'Please enter amount.',
    //         ],
    //         'Person' => [
    //             'required' => 'Please enter date.',
    //         ],
    //         'date' => [
    //             'required' => 'Please enter date.',
    //         ],
    //         'note' => [
    //             'required' => 'Please enter note.',
    //         ],
           
           

    //     ]);

    //     if (!$this->validate($rules)) {
    //         $response = [
    //             'amount' => [
    //                 'status' => 'error',
    //                 'message' => $validation->getError('amount') ?: '',
    //             ],
    //             'BankAccount' => [
    //                 'status' => 'error',
    //                 'message' => $validation->getError('BankAccount') ?: '',
    //             ],
    //             'Type' => [
    //                 'status' => 'error',
    //                 'message' => $validation->getError('Type') ?: '',
    //             ],
    //             'Person' => [
    //                 'status' => 'error',
    //                 'message' => $validation->getError('Person') ?: '',
    //             ],
    //             'date' => [
    //                 'status' => 'error',
    //                 'message' => $validation->getError('date') ?: '',
    //             ],
    //             'note' => [
    //                 'status' => 'error',
    //                 'message' => $validation->getError('note') ?: '',
    //             ],
    //         ];
    //         return json_encode($response);
    //     }

    //     $debts = new DebtsLoansModel();
    //     $data = array();
    //     $debtsData = [
    //                     'amount' => $this->request->getVar('amount'),
    //                     'bank_account' => $this->request->getVar('BankAccount'),
    //                     'select_type' => $this->request->getVar('Type'),
    //                     'person' => $this->request->getVar('Person'),
    //                     'date' => $this->request->getVar('date'),
    //                     'note' => $this->request->getVar('note'),
    //                     'property_id' => $property_id
    //                 ];


    //             $debts->insert($debtsData);
            
    //         $res = $debts->findAll();

    //         $response = [
    //             'success' => [
    //                 'status' => 'ok',
    //                 'message' => 'Data inserted successfully.',
    //             ],
    //         ];
    //         return json_encode($response);

    //         $data['getBankAccount'] = $debts->where('property_id', $property_id)->findAll();
    //         return view('Modules\Bank\Views\admin\bank\debts-loans', $data);

    // }



    // public function DebtsDelete($id)
    // {
    //     $property_id=$this->session->get('rs_property_id');
    //     $debts = new DebtsLoansModel();
    //     $data = $debts->find($id);
    //     // echo '<pre>';
    //     // print_r($data);
    //     // die;

    //     $db = \Config\Database::connect();
    //     $myData = [];

    //     foreach ($getDebts as $allvalue) {
    //         $allvalue['bank'] = $db->table('bank_account')
    //             ->where('id', $allvalue['bank_account'])
    //             ->get()
    //             ->getRow();
        
    //         // $allvalue['to_bank'] = $db->table('bank_account')
    //         //     ->where('id', $allvalue['to_account_id'])
    //         //     ->get()
    //         //     ->getRow();

    //             $myData[]=$allvalue;
                
    //     }
        

    //     if ($data) {
    //         $debts->delete($id);

    //         $response = [
    //             'success' => true,
    //             'message' => 'Bank deleted successfully.'
    //         ];
    //     } 
    //  return $this->response->setJSON($response);

    //  $data['getdebtslist']= $debts->where('property_id',$property_id)->findall();
    //  return view('Modules\Bank\Views\admin\bank\debts-loans',$data);
    // }


    
}
