<?php

namespace Modules\Visitor\Controllers;

use App\Controllers\BaseController;
use Modules\Visitor\Models\Visitormodel;
use Modules\Floor\Models\Floormodel;
use Modules\Unit\Models\Unitmodel;

class Visitorcontroller extends BaseController{

    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $property_id=$this->session->get('rs_property_id');

        $builder = $this->db->table('visitors');
        $builder->select('visitors.*,floors.floorno, units.unitno');
        $builder->join('floors', 'visitors.floorid = floors.id');
        $builder->join('units', 'visitors.unitid = units.unitno');
        $builder->where('visitors.property_id',$property_id);
        $builder->orderBy('visientrydate', 'DESC');
        $query = $builder->get();
        $results=$query->getResultArray();

        // print_r($results);

      // echo $this->db->getLastQuery();die();
        if(empty($results)){
            $data['getVisitor']=null;

            return view('Modules\Visitor\Views\admin\visitor\visitor-list', $data);
        }else{
            $data['getVisitor']=$results;

            return view('Modules\Visitor\Views\admin\visitor\visitor-list', $data);
        }



    }
    public function visitorAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $floor = new Floormodel();
        $unit = new Unitmodel();
        $visitor = new Visitormodel();

        $data['getFloors'] = $floor->where('property_id',$property_id)->findAll();
        $data['getUnits'] = $unit->where('property_id',$property_id)->findAll();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('visitorValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $visitorCreate = [
                    'visientrydate' => $this->request->getVar('visi_entrydate'),
                    'visiname' => $this->request->getVar('visi_name'),
                    'visimobile' => $this->request->getVar('visi_mobile'),
                    'visiads' => $this->request->getVar('visi_ads'),
                    'floorid' => $this->request->getVar('floor_id'),
                    'unitid' => $this->request->getVar('unit_id'),
                    'visiintime' => $this->request->getVar('visi_intime'),
                    'visiouttime' => $this->request->getVar('visi_outtime'),
                    'property_id' => $property_id,
                ];
                $visitor->insert($visitorCreate);
                return redirect()->to(base_url('/admin/visitor_list'));
            }
        }

        return view('Modules\Visitor\Views\admin\visitor\visitor-add', $data);
    }

    public function visitorEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        // echo $id.'///';die();
        $floor = new Floormodel();
        $unit = new Unitmodel();
        $visitor = new Visitormodel();

        $data['getFloors'] = $floor->where('property_id',$property_id)->findAll();
        $data['getUnits'] = $unit->where('property_id',$property_id)->findAll();

        $builder = $this->db->table('visitors');
        $builder->join('floors', 'visitors.floorid = floors.id');
        $builder->join('units', 'visitors.floorid = units.floorid');
        $builder->select('visitors.*, floors.floorno, units.unitno');
        $builder->where('visitors.property_id',$property_id);
        $query = $builder->getWhere(['visitors.id' => $id]);

        // echo $this->db->getLastQuery();

        foreach ($query->getResultArray() as $row) {
            $data['getVisitor'] = $row;
        }


        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('visitorValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $visitorUpdate = [
                    'visientrydate' => $this->request->getVar('visi_entrydate'),
                    'visiname' => $this->request->getVar('visi_name'),
                    'visimobile' => $this->request->getVar('visi_mobile'),
                    'visiads' => $this->request->getVar('visi_ads'),
                    'floorid' => $this->request->getVar('floor_id'),
                    'unitid' => $this->request->getVar('unit_id'),
                    'visiintime' => $this->request->getVar('visi_intime'),
                    'visiouttime' => $this->request->getVar('visi_outtime'),
                ];
                $visitor->update($id, $visitorUpdate);
                return redirect()->to(base_url('/admin/visitor_list'));
            }
        }
        if(!empty($data['getVisitor'])){
            return view('Modules\Visitor\Views\admin\visitor\visitor-edit', $data);
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }

    }

    public function visitorDelete($id)
    {
        $visitor = new Visitormodel();
        $visitor->delete($id);
        return redirect()->to(base_url('/admin/visitor_list'));
    }
    public function tenantDepand()
    {
        $property_id=$this->session->get('rs_property_id');

        $unit = new Unitmodel();
        $id = $this->request->getVar('floorId');

        $results = $unit->where('property_id',$property_id)->where('floorid', $id)->findAll();
        echo json_encode($results);
    }


}
