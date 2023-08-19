<?php

namespace Modules\Maintenance\Controllers;

use App\Controllers\BaseController;
use Modules\Maintenance\Models\Maintenancemodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Setting\Models\Monthsetupmodel;

class Maintenancecontroller extends BaseController{


    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index($pro_id='')
    {
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);
            if(valid_user($pro_id)==false){
                return redirect()->back();
            }


        }

        $property_id=$this->session->get('rs_property_id');

        $maintenance = new Maintenancemodel();
        $getMaintenances = $maintenance->where('property_id',$property_id)->findAll();

        return view('Modules\Maintenance\Views\admin\maintenance\maintenance-list', [
            'getMaintenances' => $getMaintenances
        ]);
    }
    public function maintenanceAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $maintenance = new Maintenancemodel();


        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('maintenanceValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $maintenanceCreate = [
                    'maindate' => $this->request->getVar('main_date'),
                    'mainmonth' => $this->request->getVar('main_month'),
                    'mainyear' => $this->request->getVar('main_year'),
                    'maintitle' => $this->request->getVar('main_title'),
                    'mainamount' => $this->request->getVar('main_amount'),
                    'maindetails' => $this->request->getVar('main_details'),
                    'property_id' => $property_id,
                ];
                $maintenance->insert($maintenanceCreate);
               // return redirect()->to(base_url('/admin/maintenance_list'));

                $data['getMaintenances']= $maintenance->where('property_id',$property_id)->findall();
                return view('Modules\Maintenance\Views\admin\maintenance\maintenance-list',$data);
            }
        }
        return view('Modules\Maintenance\Views\admin\maintenance\maintenance-add', $data);
    }
    public function maintenanceView()
    {
        $property_id=$this->session->get('rs_property_id');

        $maintenance = new Maintenancemodel();
        $id = $this->request->getVar('maintenanceId');

        $result = $maintenance->where('property_id',$property_id)->where('id',$id)->first();
        $result['mainamount']=currency($result['mainamount'],1);
        $result['maindate']=date_formats($result['maindate']);
        //print_r($result);
        echo json_encode($result);
    }
    public function maintenanceEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $maintenance = new Maintenancemodel();
        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $data['getMaintenance'] = $maintenance->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('maintenanceValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $maintenanceUpdate = [
                    'maindate' => $this->request->getVar('main_date'),
                    'mainmonth' => $this->request->getVar('main_month'),
                    'mainyear' => $this->request->getVar('main_year'),
                    'maintitle' => $this->request->getVar('main_title'),
                    'mainamount' => $this->request->getVar('main_amount'),
                    'maindetails' => $this->request->getVar('main_details'),
                ];
                $maintenance->update($id, $maintenanceUpdate);
                $data['getMaintenances']= $maintenance->where('property_id',$property_id)->findall();
                return view('Modules\Maintenance\Views\admin\maintenance\maintenance-list',$data);
            }
        }
        if(!empty($data['getMaintenance'])){
            return view('Modules\Maintenance\Views\admin\maintenance\maintenance-edit', $data);
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }

    }
    public function maintenanceDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $maintenance = new Maintenancemodel();
        $maintenance->delete($id);
        $data['getMaintenances']= $maintenance->where('property_id',$property_id)->findall();
        return view('Modules\Maintenance\Views\admin\maintenance\maintenance-list',$data);
    }
}
