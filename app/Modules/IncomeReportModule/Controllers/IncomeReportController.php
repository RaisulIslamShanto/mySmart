<?php

namespace Modules\IncomeReportModule\Controllers;

// use Modules\Demo\Models\Demomodel;
// use Modules\Demo\Models\Blogmodel;
use App\Controllers\BaseController;
use Modules\IncomeReportModule\Models\IncomeReportModel;
use Modules\IncomeModule\Models\IncomeModel;

class IncomeReportController extends BaseController{
 
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

    public function incomereportpage(){

        // $IncomeModel = new IncomeModel;

        // $incometable = $IncomeModel->findAll();

        $db = \Config\Database::connect();

        $query = $db->table('incometable')
            ->select('incometable.*,categoryName')
            ->join('categorytable', 'incometable.incomeCategory = categorytable.categoryId', 'left')
            ->get();
        $data = $query->getResultArray();

        // echo"<pre>";
        // print_r($data);
        // die();

        return view('Modules\IncomeReportModule\Views\admin\incomereportpage',["data" => $data]);

    }

    public function filterincome(){

        // echo 12;
        // die();

        $startdate = $this->request->getPost('startdate');
        $enddate = $this->request->getPost('enddate');


        $db = \Config\Database::connect();

       if($startdate && $enddate){

            // echo 12;
            // die();
            
            $query = $db->table('incometable')
            ->select('incometable.*,categoryName')
            ->join('categorytable', 'incometable.incomeCategory = categorytable.categoryId','left')
            // ->where("date  '$startdate'between'$enddate'")
            // ->where("date <= '$enddate'&&date >= '$startdate")
            
            ->where('date >=', $startdate)
            ->where('date <=', $enddate)
        
            ->get();
            $data = $query->getResultArray();
            return $this->response->setJSON($data);

       }elseif($startdate){
            
            $query = $db->table('incometable')
            ->select('incometable.*,categoryName')
            ->join('categorytable', 'incometable.incomeCategory = categorytable.categoryId', 'left')
            ->where("date >= '$startdate'")
            ->get();
            $data = $query->getResultArray();
            return $this->response->setJSON($data);

        }elseif($enddate){
            $query = $db->table('incometable')
            ->select('incometable.*,categoryName')
            ->join('categorytable', 'incometable.incomeCategory = categorytable.categoryId', 'left')
            ->where("date <= '$enddate'")
            ->get();
            $data = $query->getResultArray();
            return $this->response->setJSON($data);

        }

       

        // $matchingIncome = $IncomeModel
        //     ->where('date', $startdate)
        //     ->findAll();
            
            // echo "<pre>";
            // print_r($data);
            // die();

        

        


        // return view('Modules\IncomeModule\Views\admin\addexpensepage');

    }

    public function submitincome(){

        // echo 12;
        // die();

        $rules = [
            'incomeCategory' => 'required|',
            'bankAccount' => 'required|',
            'amount' => 'required|'
        ];
        if($this->validate($rules)){
            // if ($this->request->getFile('attachment')->isValid()){

            //     $attachment = $this->request->getFile('attachment');
            //     $attachmentName = $attachment->getRandomName();
            //     $attachment->move('Modules/IncomeModule/incomeuploads/', $attachmentName);}
            // else{
            //     $attachmentName = "no image";
            // }
    
            $data = [
       
                'incomeCategory'=>$this->request->getPost('incomeCategory'),
                'bankAccount'=>$this->request->getPost('account'),
                'amount'=>$this->request->getPost('amount'),
                'reference'=>$this->request->getPost('reference'),
                'description'=>$this->request->getPost('description'),
                'note'=>$this->request->getPost('note'),
                // 'attachment'=>$attachmentName,
                'date'=>$this->request->getPost('date'),
    
               ];
    
                $IncomeModel = new IncomeModel();
                $IncomeModel->insert($data);
            
        }else{
            // echo 12;
            // die();
            $data['validation'] = $this->validator;
            return view('Modules\IncomeModule\Views\admin\addnewincomepage', $data);
        }        


        // if ($this->request->getFile('attachment')->isValid()){

        //     $attachment = $this->request->getFile('attachment');
        //     $attachmentName = $attachment->getRandomName();
        //     $attachment->move('Modules/IncomeModule/incomeuploads/', $attachmentName);}
        // else{
        //     $attachmentName = "no image";
        // }

        // $data = [
   
        //     'incomeCategory'=>$this->request->getPost('incomeCategory'),
        //     'bankAccount'=>$this->request->getPost('account'),
        //     'amount'=>$this->request->getPost('amount'),
        //     'reference'=>$this->request->getPost('reference'),
        //     'description'=>$this->request->getPost('description'),
        //     'note'=>$this->request->getPost('note'),
        //     'attachment'=>$attachmentName,
        //     'date'=>$this->request->getPost('date'),

        //    ];
           
        //     // print_r($data);
        //     // die();

        //     $IncomeModel = new IncomeModel();
        //     $IncomeModel->insert($data);


        // return $this->response->setJSON(['status' => 'success', 'message' => 'File inserted successfully.']);

    //     return view('Modules\CategoryModule\Views\admin\categorypage');

    }
    public function deleteincome($id)
    {

        $IncomeModel = new IncomeModel;
        $bankdeleted = $IncomeModel->delete($id);
        
        
        
        
        return redirect()->to('admin/bankpage')->with('status', 'success');

        // return view('Modules\BankModule\Views\admin\bankpage',['banktable'=>$banktable]);
        
    }
    public function editincome()
    {
        
        $IncomeModel = new IncomeModel();
        
        $id  = $this->request->getPost('id');

        $data = $IncomeModel->where('bankid', $id)->findAll();
    
        return json_encode($data);

        // return view('Modules\BankModule\Views\admin\bankpage', ['bankdata'=>$data]); 
       
    }

    public function updateincome($id)
    {
       
     $IncomeModel = new IncomeModel;
     $bankrow = $IncomeModel->find($id);

     $data = [
   
        'bank'=>$this->request->getPost('bank'),

       ];
        
        $IncomeModel->update($id,$data);

        // return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);

        $IncomeModel = new IncomeModel();
        $incometable = $IncomeModel->findAll();

        return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);
        
        // return view('variantcategory/variantcategory',['banktable'=>$banktable]);

    }
    
}
