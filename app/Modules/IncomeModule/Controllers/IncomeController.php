<?php

namespace Modules\IncomeModule\Controllers;
// namespace Modules\CategoryModule\Controllers; 

// use Modules\Demo\Models\Demomodel;
// use Modules\Demo\Models\Blogmodel;
use App\Controllers\BaseController; 
use Modules\IncomeModule\Models\IncomeModel;
use Modules\CategoryModule\Models\CategoryModel;
use Modules\Bank\Models\BankAccountModel;

class IncomeController extends BaseController{

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

    public function incomepage(){

        $IncomeModel = new IncomeModel;

        $incometable = $IncomeModel->findAll();
        
        // echo"<pre>";
        // print_r($incometable);
        // die();
        $session = session();

        $property_id=$this->session->get('rs_property_id');

        // print_r($property_id);
        // die();

        $db = \Config\Database::connect();

        

        $query = $db->table('incometable')
            ->select('incometable.*,categoryName,bank_account.*')
            ->join('categorytable', 'incometable.incomeCategory = categorytable.categoryId', 'left')
            ->join('bank_account', 'incometable.bankAccount = bank_account.id', 'left')
            ->get();
        $data = $query->getResultArray();

        // echo"<pre>";
        // print_r($data);
        // die();
        
        
        return view('Modules\IncomeModule\Views\admin\incomepage',["data"=>$data,"username" => $this->session->get('name'),]);

    }

    public function incomeCategory(){

        $CategoryModel = new CategoryModel();

        // $incometable = $CategoryModel->findAll();
        // SELECT * FROM categorytable WHERE categoryType LIKE '%Income%'; 
        $incomeCategories = $CategoryModel
            ->like('categoryType', 'income')
            ->findAll();
        

            return json_encode($incomeCategories);
        // echo"<pre>";
        // print_r($incomeCategories);
        // die();
        
        // return view('Modules\IncomeModule\Views\admin\incomepage',["data"=>$incomeCategories]);

    }

    public function bankaccount(){

        $BankAccountModel = new BankAccountModel();

        $bankaccountno = $BankAccountModel->findAll();

        // echo "<pre>";
        // print_r($bankaccountno);
        // die();

        // SELECT * FROM categorytable WHERE categoryType LIKE '%Income%'; 
        // $bankaccountno = $BankAccountModel
        //     ->like('categoryType', 'income')
        //     ->findAll();
    
        return json_encode($bankaccountno);

        // echo"<pre>";
        // print_r($incomeCategories);
        // die();
        
        // return view('Modules\IncomeModule\Views\admin\incomepage',["data"=>$incomeCategories]);

    }



    public function addnewincomepage(){
        
        $CategoryModel = new CategoryModel();

        // $incometable = $CategoryModel->findAll();
        // SELECT * FROM categorytable WHERE categoryType LIKE '%Income%'; 
        $incomeCategories = $CategoryModel
            ->like('categoryType', 'income')
            ->findAll();
        
        $BankAccountModel = new BankAccountModel();

        $bankaccountno = $BankAccountModel->findAll();

        // echo "<pre>";
        // print_r($bankaccountno);
        // die();
        
        return view('Modules\IncomeModule\Views\admin\addnewincomepage',[
            'incomeCategories' => $incomeCategories,
            'bankaccountno'=>$bankaccountno
        ]);

    }

    public function submitincome(){

        // echo 12;
        // die();

        // $rules = [
        //     'incomeCategory' => 'required|',
        //     'bankAccount' => 'required|',
        //     'amount' => 'required|'
        // ];
        // if($this->validate($rules)){
        //     if ($this->request->getFile('attachment')->isValid()){

        //         $attachment = $this->request->getFile('attachment');
        //         $attachmentName = $attachment->getRandomName();
        //         $attachment->move('Modules/IncomeModule/incomeuploads/', $attachmentName);}
        //     else{
        //         $attachmentName = "no image";
        //     }
    
        //     $data = [
       
        //         'incomeCategory'=>$this->request->getPost('incomeCategory'),
        //         'bankAccount'=>$this->request->getPost('account'),
        //         'amount'=>$this->request->getPost('amount'),
        //         'reference'=>$this->request->getPost('reference'),
        //         'description'=>$this->request->getPost('description'),
        //         'note'=>$this->request->getPost('note'),
        //         'attachment'=>$attachmentName,
        //         'date'=>$this->request->getPost('date'),
    
        //        ];
    
        //         $IncomeModel = new IncomeModel();
        //         $IncomeModel->insert($data);
            
        // }else{
        //     echo 12;
        //     die();
        //     $data['validation'] = $this->validator;
        //     return view('Modules\IncomeModule\Views\admin\addnewincomepage', $data);
        // }        

        // without validation
            // echo 12;
            // die();

         if ($this->request->getFile('attachment')->isValid()){

            $property_id = $this->session->get('rs_property_id');
            $attachment = $this->request->getFile('attachment');
            $attachmentName = $attachment->getRandomName();
            $attachment->move('Modules/IncomeModule/incomeuploads/', $attachmentName);

         }
         else{
             $attachmentName = "no image";
         }

        $data = [
            
            'incomeCategory'=>$this->request->getPost('incomeCategory'),
            'bankAccount'=>$this->request->getPost('bankAccount'),
            'amount'=>$this->request->getPost('amount'),
            'reference'=>$this->request->getPost('reference'),
            'description'=>$this->request->getPost('description'),
            'note'=>$this->request->getPost('note'),
            'attachment'=>$attachmentName,
            'date'=>$this->request->getPost('date'),
            'property_id'  => $property_id
           ];
           
            // echo "<pre>";
            // print_r($data);
            // die();

            $IncomeModel = new IncomeModel();
            $IncomeModel->insert($data);


        return $this->response->setJSON(['status' => 'success', 'message' => 'File inserted successfully.']);

        // return view('Modules\CategoryModule\Views\admin\categorypage');

    }

    public function deleteincome($id)
    {

        $IncomeModel = new IncomeModel;
        $incomedeleted = $IncomeModel->delete($id);
        
        return redirect()->to('admin/incomepage')->with('status', 'success');

        // return view('Modules\BankModule\Views\admin\bankpage',['banktable'=>$banktable]);
        
    }

    public function editincome($id)
    {
        
        $IncomeModel = new IncomeModel();
        
        // $id  = $this->request->getPost('id');
        $db = \Config\Database::connect();

        $CategoryModel = new CategoryModel();

        $incomeCategories = $CategoryModel
            ->like('categoryType', 'income')
            ->findAll();

        $BankAccountModel = new BankAccountModel();

        $bankaccountno = $BankAccountModel->findAll();


        $query = $db->table('incometable')
            ->select('incometable.*,categoryName,account_number,bank_account.*,categorytable.*')
            ->join('categorytable', 'incometable.incomeCategory = categorytable.categoryId', 'left')
            ->join('bank_account', 'incometable.bankAccount = bank_account.id', 'left')
            ->where('incomeId', $id)
            ->get();
        $data = $query->getResultArray();

        // $data = $IncomeModel->where('incomeId', $id)->findAll();

        // echo "<pre>";
        // print_r($data);
        // die();

        // return json_encode($data);

        return view('Modules\IncomeModule\Views\admin\editincomepage', [
            'incomedata'=>$data,
            'incomeCategories' => $incomeCategories,
            'bankaccountno'=>$bankaccountno
        ]); 
       
    }

    public function updateincome($id)
    {
       
     $IncomeModel = new IncomeModel;

     $id = $this->request->getPost('incomeId');
     $incomerow = $IncomeModel->find($id);
     

     $property_id = $this->session->get('rs_property_id');
     
     if ($this->request->getFile('attachment')->isValid()){

        $property_id = $this->session->get('rs_property_id');
        $attachment = $this->request->getFile('attachment');
        $attachmentName = $attachment->getRandomName();
        $attachment->move('Modules/IncomeModule/incomeuploads/', $attachmentName);

     }
     else{
         $attachmentName = "no image";
     }

    $data = [
        
        'incomeCategory'=>$this->request->getPost('incomeCategory'),
        'bankAccount'=>$this->request->getPost('bankAccount'),
        'amount'=>$this->request->getPost('amount'),
        'reference'=>$this->request->getPost('reference'),
        'description'=>$this->request->getPost('description'),
        'note'=>$this->request->getPost('note'),
        'attachment'=>$attachmentName,
        'date'=>$this->request->getPost('date'),
        'property_id'  => $property_id
       ];
        
        $IncomeModel->update($id,$data);

        // return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);

        // $IncomeModel = new IncomeModel();
        // $incometable = $IncomeModel->findAll();

        return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);
        
    //    return redirect()->to('admin/incomepage')->with('status', 'success');

        // return view('variantcategory/variantcategory',['banktable'=>$banktable]);

    }
    
}
