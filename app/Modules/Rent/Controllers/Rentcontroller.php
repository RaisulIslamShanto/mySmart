<?php

namespace Modules\Rent\Controllers;

use App\Controllers\BaseController;
use Modules\Floor\Models\Floormodel;
use Modules\Tenant\Models\Tenantmodel;
use Modules\Setting\Models\Monthsetupmodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Rent\Models\Rentmodel;

class Rentcontroller extends BaseController{

  public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

  public function add_rent()
  {
    $property_id = $this->session->get('rs_property_id');

    $month_model = new Monthsetupmodel();
    $months = $month_model->where('property_id', $property_id)->findall();
    $year_model = new Yearmodel();
    $years = $year_model->where('property_id', $property_id)->findall();
    $data['months'] = $months;
    $data['years'] = $years;


    $floor_model = new Floormodel();
    $floors = $floor_model->where('property_id', $property_id)->findall();
    $data['floors'] = $floors;
    if ($this->request->getMethod() == 'post') {
      if ($this->validate('rent')) {

        $btnSavePrint = $this->request->getVar('btn_save_print');
        if ($btnSavePrint == '') {

          if (!empty($this->request->getVar('water_bill'))) {
            $water_bill = $this->request->getVar('water_bill');
          } else {
            $water_bill = null;
          }
          if ($this->request->getVar('electric_bill') != '') {
            $electric_bill = $this->request->getVar('electric_bill');
          } else {
            $electric_bill = null;
          }
          if (!empty($this->request->getVar('gas_bill'))) {
            $gas_bill = $this->request->getVar('gas_bill');
          } else {
            $gas_bill = null;
          }
          if (!empty($this->request->getVar('security_bill'))) {
            $security_bill = $this->request->getVar('security_bill');
          } else {
            $security_bill = null;
          }
          if (!empty($this->request->getVar('utility_bill'))) {
            $utility_bill = $this->request->getVar('utility_bill');
          } else {
            $utility_bill = null;
          }
          if (!empty($this->request->getVar('other_bill'))) {
            $other_bill = $this->request->getVar('other_bill');
          } else {
            $other_bill = null;
          }
          $floor = $this->request->getVar('floor_name');
          $result_floor = explode("|", $floor);
          $floor_id = $result_floor[1];
          // echo $floorno."kk";

          $unit = $this->request->getVar('unit_no');
          $result_unit = explode("|", $unit);
          $unit_id = $result_unit[1];
          $data = [
            'floor_id' => $floor_id,
            'unit_id' => $unit_id,
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'renter_name' => $this->request->getVar('renter_name'),
            'tenent_id' => $this->request->getVar('tenent_id'),
            'tenent_image' => $this->request->getVar('tenent_image'),
            'rent' => $this->request->getVar('rent'),
            'water_bill' => $water_bill,
            'gas_bill' => $electric_bill,
            'electric_bill' => $gas_bill,
            'security_bill' => $security_bill,
            'utility_bill' => $utility_bill,
            'other_bill' => $other_bill,
            'total_rent' => $this->request->getVar('total_rent'),
            'issue_date' => $this->request->getVar('issue_date'),
            'bill_paid_date' => $this->request->getVar('bill_paid_date'),
            'bill_status' => $this->request->getVar('bill_status'),
            'property_id' => $property_id,
          ];
          $rent_model = new RentModel();
          $insert = $rent_model->save($data);
          if ($insert) {

            $builder = $this->db->table('rent');
            $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name,tenants.tename as tenent_name');
            $builder->join('floors', 'rent.floor_id = floors.id', 'left');
            $builder->join('units', 'rent.unit_id = units.id', 'left');
            $builder->join('tenants', 'rent.tenent_id = tenants.id', 'left');
            $builder->where('rent.property_id', $property_id);
            $query = $builder->get();
            $rents = $query->getResult();

            $data['rents'] = $rents;
            $data['success'] = "Data Saved";
            return view('Modules\Rent\Views\admin\rent\rent_list', $data);
          }
        } else {

          /*==============================================================
                              Print Section Start
          ================================================================*/

          if (!empty($this->request->getVar('water_bill'))) {
            $water_bill = $this->request->getVar('water_bill');
          } else {
            $water_bill = null;
          }
          if ($this->request->getVar('electric_bill') != '') {
            $electric_bill = $this->request->getVar('electric_bill');
          } else {
            $electric_bill = null;
          }
          if (!empty($this->request->getVar('gas_bill'))) {
            $gas_bill = $this->request->getVar('gas_bill');
          } else {
            $gas_bill = null;
          }
          if (!empty($this->request->getVar('security_bill'))) {
            $security_bill = $this->request->getVar('security_bill');
          } else {
            $security_bill = null;
          }
          if (!empty($this->request->getVar('utility_bill'))) {
            $utility_bill = $this->request->getVar('utility_bill');
          } else {
            $utility_bill = null;
          }
          if (!empty($this->request->getVar('other_bill'))) {
            $other_bill = $this->request->getVar('other_bill');
          } else {
            $other_bill = null;
          }
          $floor = $this->request->getVar('floor_name');
          $result_floor = explode("|", $floor);
          $floor_id = $result_floor[1];
          // echo $floorno."kk";

          $unit = $this->request->getVar('unit_no');
          $result_unit = explode("|", $unit);
          $unit_id = $result_unit[1];
          $data = [
            'floor_id' => $floor_id,
            'unit_id' => $unit_id,
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'renter_name' => $this->request->getVar('renter_name'),
            'tenent_id' => $this->request->getVar('tenent_id'),
            'tenent_image' => $this->request->getVar('tenent_image'),
            'rent' => $this->request->getVar('rent'),
            'water_bill' => $water_bill,
            'gas_bill' => $electric_bill,
            'electric_bill' => $gas_bill,
            'security_bill' => $security_bill,
            'utility_bill' => $utility_bill,
            'other_bill' => $other_bill,
            'total_rent' => $this->request->getVar('total_rent'),
            'issue_date' => $this->request->getVar('issue_date'),
            'bill_paid_date' => $this->request->getVar('bill_paid_date'),
            'bill_status' => $this->request->getVar('bill_status'),
            'property_id' => $property_id,
          ];
          $rent_model = new RentModel();
          $insert = $rent_model->save($data);

          $lastId = $this->db->insertId();

          return redirect()->to(base_url('/admin/rentinvoice/' . $lastId));

          /*==============================================================
                              Print Section End
          ================================================================*/
        }
      } else {
        $data['validation'] = $this->validator;
        return view('Modules\Rent\Views\admin\rent\add_rent', $data);
      }
    } else {
      return view('Modules\Rent\Views\admin\rent\add_rent', $data);
    }
  }

  public function get_tenent()
  {
    $property_id=$this->session->get('rs_property_id');

    $tenant_model = new Tenantmodel();
    $unitno = $this->request->getVar('unitno');

    $tenent_data = $tenant_model->where('property_id',$property_id)->where('unitno', $unitno)->first();

    echo json_encode($tenent_data);
  }
  public function rent_list($pro_id='')
  {
        if(!empty($pro_id) && is_numeric($pro_id)){
          $this->session->set('rs_property_id',$pro_id);
          if(valid_user($pro_id)==false){
              return redirect()->back();
          }


      }

      $property_id=$this->session->get('rs_property_id');

      $builder = $this->db->table('rent');
      $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name,tenants.tename as tenent_name');
      $builder->join('floors', 'rent.floor_id = floors.id','left');
      $builder->join('units', 'rent.unit_id = units.id','left');
      $builder->join('tenants', 'rent.tenent_id = tenants.id','left');
      $builder->where('rent.property_id',$property_id);
      $query = $builder->get();
      $rents = $query->getResult();


      $data['rents'] = $rents;
      return view('Modules\Rent\Views\admin\rent\rent_list', $data);
  }
  public function rent_update($id = null)
  {
    $property_id = $this->session->get('rs_property_id');

    $month_model = new Monthsetupmodel();
    $months = $month_model->where('property_id', $property_id)->findall();
    $year_model = new Yearmodel();
    $years = $year_model->where('property_id', $property_id)->findall();
    $data['months'] = $months;
    $data['years'] = $years;

    $floor_model = new Floormodel();
    $floors = $floor_model->where('property_id', $property_id)->findall();
    $data['floors'] = $floors;

    $builder = $this->db->table('rent');
    $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
    $builder->join('floors', 'rent.floor_id = floors.id', 'left');
    $builder->join('units', 'rent.unit_id = units.id', 'left');
    $builder->where('rent.property_id', $property_id);
    $builder->where('rent.id', $id);
    $query = $builder->get();
    $rents = $query->getResult();

    $data['rents'] = $rents;
    if ($this->request->getMethod() == 'post') {
      if ($this->validate('rent')) {

        $btnSavePrint = $this->request->getVar('btn_save_print');
        if ($btnSavePrint == '') {

          if (!empty($this->request->getVar('water_bill'))) {
            $water_bill = $this->request->getVar('water_bill');
          } else {
            $water_bill = null;
          }
          if ($this->request->getVar('electric_bill') != '') {
            $electric_bill = $this->request->getVar('electric_bill');
          } else {
            $electric_bill = null;
          }
          if (!empty($this->request->getVar('gas_bill'))) {
            $gas_bill = $this->request->getVar('gas_bill');
          } else {
            $gas_bill = null;
          }
          if (!empty($this->request->getVar('security_bill'))) {
            $security_bill = $this->request->getVar('security_bill');
          } else {
            $security_bill = null;
          }
          if (!empty($this->request->getVar('utility_bill'))) {
            $utility_bill = $this->request->getVar('utility_bill');
          } else {
            $utility_bill = null;
          }
          if (!empty($this->request->getVar('other_bill'))) {
            $other_bill = $this->request->getVar('other_bill');
          } else {
            $other_bill = null;
          }
          $floor = $this->request->getVar('floor_name');
          $result_floor = explode("|", $floor);
          $floor_id = $result_floor[1];
          // echo $floorno."kk";

          $unit = $this->request->getVar('unit_no');
          $result_unit = explode("|", $unit);
          $unit_id = $result_unit[1];
          $data = [
            'floor_id' => $floor_id,
            'unit_id' => $unit_id,
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'renter_name' => $this->request->getVar('renter_name'),
            'tenent_id' => $this->request->getVar('tenent_id'),
            'tenent_image' => $this->request->getVar('tenent_image'),
            'rent' => $this->request->getVar('rent'),
            'water_bill' => $water_bill,
            'gas_bill' => $electric_bill,
            'electric_bill' => $gas_bill,
            'security_bill' => $security_bill,
            'utility_bill' => $utility_bill,
            'other_bill' => $other_bill,
            'total_rent' => $this->request->getVar('total_rent'),
            'issue_date' => $this->request->getVar('issue_date'),
            'bill_paid_date' => $this->request->getVar('bill_paid_date'),
            'bill_status' => $this->request->getVar('bill_status'),
          ];
          $rent_model = new RentModel();
          $update = $rent_model->update($id, $data);

          if (isset($update)) {

            $builder = $this->db->table('rent');
            $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name,tenants.tename as tenent_name');
            $builder->join('floors', 'rent.floor_id = floors.id', 'left');
            $builder->join('units', 'rent.unit_id = units.id', 'left');
            $builder->join('tenants', 'rent.tenent_id = tenants.id', 'left');
            $builder->where('rent.property_id', $property_id);
            $query = $builder->get();
            $rents = $query->getResult();

            $data['rents'] = $rents;

            return redirect()->to(base_url('/admin/rentlist'))->with('success','Data Updated');
          }
        } else {

          /*==============================================================
                              Print Section Start
          ================================================================*/

          if (!empty($this->request->getVar('water_bill'))) {
            $water_bill = $this->request->getVar('water_bill');
          } else {
            $water_bill = null;
          }
          if ($this->request->getVar('electric_bill') != '') {
            $electric_bill = $this->request->getVar('electric_bill');
          } else {
            $electric_bill = null;
          }
          if (!empty($this->request->getVar('gas_bill'))) {
            $gas_bill = $this->request->getVar('gas_bill');
          } else {
            $gas_bill = null;
          }
          if (!empty($this->request->getVar('security_bill'))) {
            $security_bill = $this->request->getVar('security_bill');
          } else {
            $security_bill = null;
          }
          if (!empty($this->request->getVar('utility_bill'))) {
            $utility_bill = $this->request->getVar('utility_bill');
          } else {
            $utility_bill = null;
          }
          if (!empty($this->request->getVar('other_bill'))) {
            $other_bill = $this->request->getVar('other_bill');
          } else {
            $other_bill = null;
          }
          $floor = $this->request->getVar('floor_name');
          $result_floor = explode("|", $floor);
          $floor_id = $result_floor[1];
          // echo $floorno."kk";

          $unit = $this->request->getVar('unit_no');
          $result_unit = explode("|", $unit);
          $unit_id = $result_unit[1];
          $data = [
            'floor_id' => $floor_id,
            'unit_id' => $unit_id,
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'renter_name' => $this->request->getVar('renter_name'),
            'tenent_id' => $this->request->getVar('tenent_id'),
            'tenent_image' => $this->request->getVar('tenent_image'),
            'rent' => $this->request->getVar('rent'),
            'water_bill' => $water_bill,
            'gas_bill' => $electric_bill,
            'electric_bill' => $gas_bill,
            'security_bill' => $security_bill,
            'utility_bill' => $utility_bill,
            'other_bill' => $other_bill,
            'total_rent' => $this->request->getVar('total_rent'),
            'issue_date' => $this->request->getVar('issue_date'),
            'bill_paid_date' => $this->request->getVar('bill_paid_date'),
            'bill_status' => $this->request->getVar('bill_status'),
          ];
          $rent_model = new RentModel();
          $update = $rent_model->update($id, $data);

          return redirect()->to(base_url('/admin/rentinvoice/' . $id));

          /*==============================================================
                              Print Section End
          ================================================================*/
        }
      } else {
        $data['validation'] = $this->validator;
        return view('Modules\Rent\Views\admin\rent\rent_update', $data);
      }
    } else {
      // print_r($data['rents']);die();
      if (!empty($data['rents'])) {

        return view('Modules\Rent\Views\admin\rent\rent_update', $data);
      } else {
        return view('\Modules\Home\Views\admin\home\property_error_page');
      }
    }
      }
      public function indivusual_rent(){
      $property_id=$this->session->get('rs_property_id');

      $rent_model=new RentModel();

      $rent_id=$this->request->getVar('rent_id');

      $builder = $this->db->table('rent');
      $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
      $builder->join('floors', 'rent.floor_id = floors.id','left');
      $builder->join('units', 'rent.unit_id = units.id','left');

      $builder->where('rent.property_id',$property_id);
      $builder->where('rent.id',$rent_id);
      $query = $builder->get();
      $rents = $query->getResult();
      foreach($rents as $indivisual_rent){
      $data['indivisual_rent']=$indivisual_rent;
      //print_r($data['indivisual_rent']);die();
      $data['indivisual_rent']->rent= currency($data['indivisual_rent']->rent,1);
      $data['indivisual_rent']->water_bill= currency($data['indivisual_rent']->water_bill,1);
      $data['indivisual_rent']->electric_bill= currency($data['indivisual_rent']->electric_bill,1);
      $data['indivisual_rent']->gas_bill= currency($data['indivisual_rent']->gas_bill,1);
      $data['indivisual_rent']->security_bill= currency($data['indivisual_rent']->security_bill,1);
      $data['indivisual_rent']->utility_bill= currency($data['indivisual_rent']->utility_bill,1);
      $data['indivisual_rent']->other_bill= currency($data['indivisual_rent']->other_bill,1);
      $data['indivisual_rent']->total_rent= currency($data['indivisual_rent']->total_rent,1);

      $data['indivisual_rent']->bill_paid_date= date_formats($data['indivisual_rent']->bill_paid_date);
      $data['indivisual_rent']->issue_date= date_formats($data['indivisual_rent']->issue_date);

      }

      echo json_encode($data);
      }

      public function rent_delete($id=null){
        $property_id=$this->session->get('rs_property_id');

        $rent_model=new RentModel();

        $delete_rent=$rent_model->where('id', $id)->delete();
        if($delete_rent){
          $builder = $this->db->table('rent');
      $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name,tenants.tename as tenent_name');
      $builder->join('floors', 'rent.floor_id = floors.id','left');
      $builder->join('units', 'rent.unit_id = units.id','left');
      $builder->join('tenants', 'rent.tenent_id = tenants.id','left');
      $builder->where('rent.property_id',$property_id);
      $query = $builder->get();
      $rents = $query->getResult();


      $data['rents'] = $rents;
      $data['success'] = 'Data Deleted';
      return view('Modules\Rent\Views\admin\rent\rent_list', $data);
        }else{
           return redirect()->to(base_url('admin/rentlist'))->with('success','delete faild');
        }
      }
      public function rent_invoice($id=null){
        $property_id=$this->session->get('rs_property_id');

        $rent_model=new RentModel();
        $tenant_model = new Tenantmodel();

        $builder = $this->db->table('rent');
        $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name,tenants.*');
        $builder->join('floors', 'rent.floor_id = floors.id','left');
        $builder->join('units', 'rent.unit_id = units.id','left');
        $builder->join('tenants', 'rent.tenent_id = tenants.id','left');
        $builder->where('rent.property_id',$property_id);
        $builder->where('rent.id',$id);
        $query = $builder->get();
        $all_data = $query->getResult();

        $data['all_data']=$all_data;
        $this->session->set('rent_invoice', $all_data);

        if($all_data){
          return view('Modules\Rent\Views\admin\rent\rent_invoice', $data);
        }else{
           return redirect()->to(base_url('admin/rentlist'))->with('success','Invoice faild');
        }
      }

      public function print_rent_invoice(){

        $data['all_data']=$this->session->get('rent_invoice');

        return view('Modules\Rent\Views\admin\rent\print_rent_invoice', $data);

      }

}
