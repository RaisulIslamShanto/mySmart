<?php

namespace Modules\Demo\Controllers;

use Modules\Demo\Models\Demomodel;
use Modules\Demo\Models\Blogmodel;
use App\Controllers\BaseController;
use Modules\Demo\Models\Categorymodel;

class Democontroller extends BaseController{

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

        $category = new Categorymodel();
        $getCategories = $category->where('property_id',$property_id)->findAll();

        return view('Modules\Demo\Views\admin\demo\category-list', [
            "getCategories" => $getCategories
        ]);
    }

    public function categoryAdd(){
        $property_id = $this->session->get('rs_property_id');
        $category = new Categorymodel();
        $data = array();

        if($this->request->getMethod() == 'post'){
            if(!$this->validate('demoValidate')){
                $data['validation'] = $this->validator;
            }else{
                $imgFile = $this->request->getFile('categoryImage');
                $newName = '';

                if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
                    $newName = $imgFile->getRandomName();
                    $imgFile->move(ROOTPATH . 'public/categoryImage', $newName);
                }

                $categoryData = [
                    'categoryname'        => $this->request->getVar('categoryName'),
                    'categoryuri'         => $this->request->getVar('uri'),
                    'categorydescription' => $this->request->getVar('category_description'),
                    'parentcategory'      => $this->request->getVar('parentCategory'),
                    'categoryimage'       => $newName,
                    'property_id'         => $property_id
                ];

                $res = $category->insert($categoryData);

                if($res){
                    $data['getCategories'] = $category->where('property_id',$property_id)->findAll();
                    return view('Modules\Demo\Views\admin\demo\category-list', $data);
                }
            }
        }
        $data['getCategories'] = $category->where('property_id', $property_id)->findAll();
        return view('Modules\Demo\Views\admin\demo\demo-add', $data);
    }

    //Blog add method
    public function blogAdd(){
        $property_id = $this->session->get('rs_property_id');
        $blog = new Blogmodel();
        $data = array();

        if($this->request->getMethod() == 'post'){
            if(!$this->validate('demoValidate')){
                $data['validation'] = $this->validator;
            }else{
                $imgFile = $this->request->getFile('blogImage');
                $newName = '';

                if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
                    $newName = $imgFile->getRandomName();
                    $imgFile->move(ROOTPATH . 'public/blogImage', $newName);
                }

                $blogData = [
                    'blogtitle'    => $this->request->getVar('blogTitle'),
                    'bloguri'      => $this->request->getVar('uri'),
                    'blogcontent'  => $this->request->getVar('blog_content'),
                    'blogcategory' => $this->request->getVar('category'),
                    'blogimage'    => $newName,
                    'property_id'  => $property_id
                ];

                $res = $blog->insert($blogData);

                if($res){
                    $data['getBlogs'] = $blog->where('property_id',$property_id)->findAll();
                    return view('Modules\Demo\Views\admin\demo\blog-list', $data);
                }
            }
        }

        $data['getCategories'] = $blog->where('property_id', $property_id)->findAll();
        return view('Modules\Demo\Views\admin\demo\blog-add', $data);
    }

    public function categoryEdit($id){
        $property_id=$this->session->get('rs_property_id');
        $category = new Categorymodel();
        $data['categoryInfo'] = $category->where(['id' => $id,'property_id'=>$property_id])->first();

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('demoValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $imgFile = $this->request->getFile('categoryImage');
                $newName = '';

                if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
                    $newName = $imgFile->getRandomName();
                    $imgFile->move(ROOTPATH . 'public/categoryImage', $newName);
                }

                $categoryData = [
                    'categoryname'        => $this->request->getVar('categoryName'),
                    'categoryuri'         => $this->request->getVar('uri'),
                    'categorydescription' => $this->request->getVar('category_description'),
                    'parentcategory'      => $this->request->getVar('parentCategory'),
                    'categoryimage'       => $newName,
                    'property_id'         => $property_id
                ];

                $category->update($id, $categoryData);
                $data['getDemos']= $demo->where('property_id',$property_id)->findall();
                return view('Modules\Demo\Views\admin\demo\category-list',$data);
            }
        }

        if(isset($data['categoryInfo'])){
            return view('Modules\Demo\Views\admin\demo\category-edit', $data);
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }
    }

    public function demoDelete($id){
        $property_id=$this->session->get('rs_property_id');

        $demo = new Demomodel();

        $demo->delete($id);

        $data['getDemos']= $demo->where('property_id',$property_id)->findall();
        return view('Modules\Demo\Views\admin\demo\demo-list',$data);
    }
}
