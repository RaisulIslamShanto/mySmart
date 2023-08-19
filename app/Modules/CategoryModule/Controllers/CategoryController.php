<?php

namespace Modules\CategoryModule\Controllers;

// use Modules\Demo\Models\Demomodel;
// use Modules\Demo\Models\Blogmodel;
use App\Controllers\BaseController;

use Modules\CategoryModule\Models\Categorymodel;

class CategoryController extends BaseController{

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
    public function categorypage(){

        $Categorymodel = new Categorymodel;

        
        $Categorytable = $Categorymodel->findAll();

        
        return view('Modules\CategoryModule\Views\admin\categorypage',['cattable' => $Categorytable]);

    }
    public function savecategory(){

        $data = [
   
            'categoryName'=>$this->request->getPost('categoryName'),
            'categoryType'=>$this->request->getPost('categoryType')

           ];
           
            //    echo'<pre>';
            //    print_r($data);
            //    die();

            $Categorymodel = new Categorymodel;
            $Categorymodel->insert($data);
            
           
        

        return $this->response->setJSON(['status' => 'success', 'message' => 'File inserted successfully.']);
    //     return view('Modules\CategoryModule\Views\admin\categorypage');

    }
    public function deletecat($id)
    {

        $Categorymodel = new Categorymodel;
        $catdeleted = $Categorymodel->delete($id);
        
        
        return redirect()->to('admin/categorypage')->with('status', 'success');
        // return view('Modules\CategoryModule\Views\admin\categorypage',['cattable'=>$cattable]);
        
    }
    public function editcat()
    {
        
        $id  = $this->request->getPost('id');

        $Categorymodel = new Categorymodel();
        $data = $Categorymodel->where('categoryId',$id)->findAll();

        // print_r($data);
        // die();
    
        return json_encode($data);

        // return view('variantcategory/editCategory', ['catdata'=>$data,'menuValue'=>$menuValue,'homepageValue'=>$homepageValue]); 
       
    }
    
    public function updatecat($id)
    {
       
     $Categorymodel = new Categorymodel;
     $catrow = $Categorymodel->find($id);

     $data = [
   
        'categoryName'=>$this->request->getPost('categoryName'),
        'categoryType'=>$this->request->getPost('categoryType')

       ]; 

       // print_r($data);
        // die();
        $Categorymodel->update($id,$data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Form updated successfully.']);
       
    }

    
}
