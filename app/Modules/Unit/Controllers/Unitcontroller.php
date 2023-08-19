<?php

namespace Modules\Unit\Controllers;

use App\Controllers\BaseController;
use Modules\Floor\Models\Floormodel;
use Modules\Unit\Models\Unitmodel;

class Unitcontroller extends BaseController
{
    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $property_id=$this->session->get('rs_property_id');

        $builder = $this->db->table('floors');
        $builder->select('*');
        $builder->join('units', 'units.floorid = floors.id');
        $builder->where('units.property_id', $property_id);
        $query = $builder->get();
        $results= $query->getResult();

        if(empty($results)){
            $data['getUnits']=null;

            return view('Modules\Unit\Views\admin\unit\unit-list',$data);
        }else{
            $data['getUnits']=$results;

            return view('Modules\Unit\Views\admin\unit\unit-list',$data);
        }




        // echo $this->db->getLastQuery();

    }
    public function unitAdd()
    {
        $property_id=$this->session->get('rs_property_id');
        $floor = new Floormodel();
        $unit = new Unitmodel();
        $data['getFloors'] = $floor->where('property_id',$property_id)->findAll();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('unitValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $unitAdd = [
                    'floorid' => $this->request->getVar('floor_id'),
                    'unitno' => $this->request->getVar('unit_no'),
                    'property_id' => $property_id
                ];
                $unit->insert($unitAdd);
                return redirect()->to(base_url('/admin/unit_list'));
            }
        }

        return view('Modules\Unit\Views\admin\unit\unit-add', $data);
    }
    public function unitEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $floor = new Floormodel();
        $unit = new Unitmodel();

        $data['getFloors'] = $floor->where('property_id',$property_id)->findAll();

        $builder = $this->db->table('floors');
        $builder->select('*');
        $builder->join('units', 'units.floorid = floors.id');
        $builder->Where('units.id', $id);
        $builder->Where('units.property_id', $property_id);
        $query = $builder->get();

        //echo $id.'//'.$this->db->getLastQuery();die();

        foreach ($query->getResult() as $row) {

            $data['getUnit'] = $row;
        }
        //print_r($data['getUnit']);die();
        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('unitValidate')) {

                $data['validation'] = $this->validator;
            } else {

                $unitEdit = [
                    'floorid' => $this->request->getVar('floor_id'),
                    'unitno' => $this->request->getVar('unit_no')
                ];
                $unit->update($id, $unitEdit);
                return redirect()->to(base_url('/admin/unit_list'));
            }
        }
        //print_r($data['getUnit']);die();
        if(isset($data['getUnit'])){
            return view('Modules\Unit\Views\admin\unit\unit-edit', $data);
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }
    }
    public function unitDelete($id)
    {
        $unit = new Unitmodel();
        $unit->delete($id);

        return redirect()->to(base_url('/admin/unit_list'));
    }
}
