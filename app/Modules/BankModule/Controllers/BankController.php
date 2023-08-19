<?php

namespace Modules\BankModule\Controllers;

// use Modules\Demo\Models\Demomodel;
// use Modules\Demo\Models\Blogmodel;
use App\Controllers\BaseController;
use Modules\BankModule\Models\BankModel;

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

    public function bankpage(){

        $BankModel = new BankModel;

        $banktable = $BankModel->findAll();

        
        return view('Modules\BankModule\Views\admin\bankpage',['banktable' => $banktable]);

    }

    public function savebank(){

        $data = [
   
            'bank'=>$this->request->getPost('bank'),

           ];
           
            $BankModel = new BankModel;
            $BankModel->insert($data);
        

        return $this->response->setJSON(['status' => 'success', 'message' => 'File inserted successfully.']);
    //     return view('Modules\CategoryModule\Views\admin\categorypage');

    }
    public function deletebank($id)
    {

        $BankModel = new BankModel;
        $bankdeleted = $BankModel->delete($id);
        
        $BankModel = new BankModel;
        $banktable = $BankModel->findAll();
        
        
        return redirect()->to('admin/bankpage')->with('status', 'success');

        // return view('Modules\BankModule\Views\admin\bankpage',['banktable'=>$banktable]);
        
    }
    public function editbank()
    {
        
        $BankModel = new BankModel();
        
        $id  = $this->request->getPost('id');

        $data = $BankModel->where('bankid', $id)->findAll();
    
        return json_encode($data);

        // return view('Modules\BankModule\Views\admin\bankpage', ['bankdata'=>$data]); 
       
    }

    public function updatebank($id)
    {
       
     $BankModel = new BankModel;
     $bankrow = $BankModel->find($id);

     $data = [
   
        'bank'=>$this->request->getPost('bank'),

       ];
        
        $BankModel->update($id,$data);

        // return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);

        $BankModel = new BankModel();
        $banktable = $BankModel->findAll();

        return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);
        
        // return view('variantcategory/variantcategory',['banktable'=>$banktable]);

    }
    
}
