<?php

namespace Modules\Floor\Controllers;

use App\Controllers\BaseController;
use Modules\Floor\Models\Floormodel;

class Floorcontroller extends BaseController{
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

        $floor = new Floormodel();
        $getFloors = $floor->where('property_id',$property_id)->findAll();

        return view('Modules\Floor\Views\admin\floor\floor-list', [
            "getFloors" => $getFloors
        ]);
    }
    /**
     *  End index
     */


    /**
     * This method floorAdd saves floor information of a property to database.
     * Method - get & post
     * Validates - floorValidate
    */

    public function floorAdd(){
        $property_id = $this->session->get('rs_property_id');
        $floor       = new Floormodel();
        $data        = array();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('floorValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $floorAdd = [
                    'floorno' => $this->request->getVar('floor_no'),
                    'property_id'=>$property_id
                ];

                $floor->insert($floorAdd);
                $data['getFloors']= $floor->where('property_id',$property_id)->findall();

                return view('Modules\Floor\Views\admin\floor\floor-list',$data);
            }
        }
        return view('Modules\Floor\Views\admin\floor\floor-add', $data);
    }
    /**
     *  End floorAdd
     */


    /**
     * This method floorEdit edits all data floor information of a property which is add by floorAdd.
     * Method - get & post
     * Validates - floorValidate
     * It has a perameter row id known as "$id" used for which row will edit.
     */
    public function floorEdit($id){
        $property_id=$this->session->get('rs_property_id');
        $floor = new Floormodel();
        $data['floorInfo'] = $floor->where(['id' => $id,'property_id'=>$property_id])->first();

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('floorValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $florUpdate = [
                    'floorno' => $this->request->getVar('floor_no')
                ];
                $floor->update($id, $florUpdate);
                $data['getFloors']= $floor->where('property_id',$property_id)->findall();
                return view('Modules\Floor\Views\admin\floor\floor-list',$data);
            }
        }

        if(isset($data['floorInfo'])){
            return view('Modules\Floor\Views\admin\floor\floor-edit', $data);
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }

    }
    /**
     *  End floorAdd
     */


    /**
     * This method floorDelete deletes all data funding details of a property.
     * Method - get
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    public function floorDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $floor = new Floormodel();

        $floor->delete($id);

        $data['getFloors']= $floor->where('property_id',$property_id)->findall();
        return view('Modules\Floor\Views\admin\floor\floor-list',$data);
    }
    /**
     *  End floorAdd
     */
}
