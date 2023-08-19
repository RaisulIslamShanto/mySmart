<?php

namespace Modules\Owner\Controllers;

use App\Controllers\BaseController;
use Modules\Owner\Models\Ownermodel;
use Modules\Unit\Models\Unitmodel;
use Modules\Owner\Models\Ownertounitmodel;
use Modules\Owner\Models\Ownerutility;
use Modules\Floor\Models\Floormodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Setting\Models\Monthsetupmodel;

class Ownercontroller extends BaseController{

   public $session,$db;

   public function __construct(){
      // parent::__construct();
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session();
   }

   public function owner_add(){
      $property_id=$this->session->get('rs_property_id');

      $model = new Ownermodel();
      $owner_to_unit_model = new Ownertounitmodel();
      $owner_to_exits_data = $owner_to_unit_model->where('property_id',$property_id)->findColumn('unit_id');
      $data['exits_units']  = $owner_to_exits_data;
      $units_get = new Unitmodel();
      $results = $units_get->where('property_id',$property_id)->findall();
      $data['units']  = $results;
      $validation =  \Config\Services::validation();

      if($this->request->getMethod()=='post'){
      if ($this->validate('owner')) {

         $avatar = $this->request->getFile('image');
         if($avatar!=''){
         $name=$avatar->getRandomName();

         $move = $avatar->move(WRITEPATH . '../public/admin/assets/owner_image/',$name);

         $image = \Config\Services::image()
         ->withFile(WRITEPATH . '../public/admin/assets/owner_image/'.$name)
         ->resize(200, 200, true, 'height')
         ->save(WRITEPATH .'../public/admin/assets/owner_image/thumbnail/'. $name);
         }else{
            $name='empty_image.jpg';
         }

         //$img_type= $avatar->getClientMimeType();

         $selected_units= $this->request->getVar('ChkOwnerUnit');
         $owner_unit_id= $this->request->getVar('owner_unit_id');

       $data = [
         'name' => $this->request->getVar('name'),
         'email' => $this->request->getVar('email'),
         'password' => $this->request->getVar('password'),
         'contact_no' => $this->request->getVar('contact_no'),
         'present_address' => $this->request->getVar('present_address'),
         'parmanent_address' => $this->request->getVar('parmanent_address'),
         'nid' => $this->request->getVar('nid'),
         'image' => $name,
         'property_id' => $property_id
       ];

       $data_save= $model->save($data);
       $insert_id= $model->insertID();

      foreach($selected_units as $value){

		 $str_arr = explode (",", $value);

		foreach ($str_arr as $key => $values) {
        if($key == 0){
         $unit_name=$values;
        }
        if($key == 1){
         $owner_unit_id=$values;
        }
		}
      //echo $unit_name.'//'.$owner_unit_id;die();

         $data2=[
         'unit_id' => $owner_unit_id,
         'unit_name' => $unit_name,
         'owner_id' => $insert_id,
         'property_id' => $property_id
         ];
          $save_units=$owner_to_unit_model->save($data2);
      }
      if($data_save && $save_units){
         return redirect()->to(base_url('admin/ownerlist'))->with('success','Data Saved');
      }

      }else{
        $data['validation'] = $this->validator;

         return view('Modules\Owner\Views\admin\owner\owner_add',$data);
      }
      }else{
         return view('Modules\Owner\Views\admin\owner\owner_add',$data);
      }
    }

    public function owner_list()
    {
      $property_id=$this->session->get('rs_property_id');

      $owner = new Ownermodel();

      $data = [
         'owners_list' => $owner->where('property_id',$property_id)->paginate(30),
         'pager' => $owner->pager
     ];
     //echo "hello1";die();
       return view('Modules\Owner\Views\admin\owner\owner_list',$data);
    }
    public function get_units(array $params = []){
      $property_id=$this->session->get('rs_property_id');

       $owner_units=new Ownertounitmodel();

       $results = $owner_units->where('owner_id',$params['owner_id'])->where('property_id',$property_id)->findall();
      //print_r($results);
      $x = '';
      foreach($results as $result){

        $x.="<li>".$result['unit_name']."</li>";
      }
       return $x;


    }
    public function owner_update($id=null){
      $property_id=$this->session->get('rs_property_id');

      $owner_model = new Ownermodel();
      $owner_units=new Ownertounitmodel();
      $total_units=new Unitmodel();
      $validation =  \Config\Services::validation();

      $owner_to_unit_model = new Ownertounitmodel();
      $owner_to_exits_data = $owner_to_unit_model->where('property_id',$property_id)->findColumn('unit_id');
      $data['exits_units']  = $owner_to_exits_data;

      $find_data_owner = $owner_model->find($id);
      $find_data_units = $owner_units->where('owner_id',$id)->where('property_id',$property_id)->findall();
      $get_total_units = $total_units->where('property_id',$property_id)->findall();

       // if($find_data_owner && $find_data_units){
            $data['owner_info']=$find_data_owner;
            $data['owner_units']=$find_data_units;
            $data['total_units']=$get_total_units;


            if($this->request->getMethod()=='post'){
               if ($this->validate('owner')) {

               $owner_id = $this->request->getVar('owner_id');
               $avatar = $this->request->getFile('images');

               if($avatar!=''){

               $pre_image = $this->request->getVar('pre_image');
               if($find_data_owner['image']!='empty_image.jpg'){
               unlink(WRITEPATH .'../public/admin/assets/owner_image/thumbnail/' . $pre_image);
               unlink(WRITEPATH .'../public/admin/assets/owner_image/' . $pre_image);
               }

                  $name=$avatar->getRandomName();

                  $move = $avatar->move(WRITEPATH . '../public/admin/assets/owner_image/',$name);

                  $image = \Config\Services::image()
                  ->withFile(WRITEPATH . '../public/admin/assets/owner_image/'.$name)
                  ->resize(200, 200, true, 'height')
                  ->save(WRITEPATH .'../public/admin/assets/owner_image/thumbnail/'. $name);

               }elseif($find_data_owner['image']!='empty_image.jpg'){
                  $name= $find_data_owner['image'];
               }else{
                  $name = 'empty_image.jpg';
               }


                  //$img_type= $avatar->getClientMimeType();

                  $selected_units= $this->request->getVar('ChkOwnerUnit');

               $data = [
                  'name' => $this->request->getVar('name'),
                  'email' => $this->request->getVar('email'),
                  'password' => $this->request->getVar('password'),
                  'contact_no' => $this->request->getVar('contact_no'),
                  'present_address' => $this->request->getVar('present_address'),
                  'parmanent_address' => $this->request->getVar('parmanent_address'),
                  'nid' => $this->request->getVar('nid'),
                  'image' => $name
                ];

               $updated= $owner_model->update($owner_id, $data);
               //$insert_id= $owner_model->insertID();
               //print_r($selected_units);die();
               $delete_units=$owner_units->where('owner_id', $owner_id)->delete();
               foreach($selected_units as $value){
                  $str_arr = explode (",", $value);

               foreach ($str_arr as $key => $values) {
               if($key == 0){
                  $unit_name=$values;
               }
               if($key == 1){
                  $owner_unit_id=$values;
               }
               }

               $data2=[
               'unit_id' => $owner_unit_id,
               'unit_name' => $unit_name,
               'owner_id' => $owner_id,
               'property_id' => $property_id
               ];
                //print_r($data2);die();
                   $save_units=$owner_units->save($data2);
               }
               if($updated && $save_units && $save_units){
                  return redirect()->to(base_url('admin/ownerlist'))->with('success','Data Updated');

               }

               }else{
                 $data['validation'] = $this->validator;
                 return view('Modules\Owner\Views\admin\owner\info_edit',$data);
               }

              }else{
                 if(isset($data['owner_info']) && isset($data['owner_units']) && isset($data['total_units'])){
                  return view('Modules\Owner\Views\admin\owner\info_edit',$data);
                 }else{
                  return view('\Modules\Home\Views\admin\home\property_error_page');
                 }

            }


}
    public function owner_delete($id=null)
    {
      $owner_model = new Ownermodel();
      $owner_units=new Ownertounitmodel();
      $find_data_owner = $owner_model->find($id);
      $image=$find_data_owner['image'];
      //echo $image;die();

      if($image !='empty_image.jpg'){
         unlink(WRITEPATH .'../public/admin/assets/owner_image/thumbnail/' . $image);
         unlink(WRITEPATH .'../public/admin/assets/owner_image/' . $image);
         }

      $delete_owner=$owner_model->where('owner_id', $id)->delete();
      $delete_units=$owner_units->where('owner_id', $id)->delete();
      if($delete_owner && $delete_units){
         return redirect()->to(base_url('admin/ownerlist'))->with('success','Data deleted');
      }else{
         return redirect()->to(base_url('admin/ownerlist'))->with('success','delete faild');
      }

    }
    public function owner_indivisual()
    {
      $property_id=$this->session->get('rs_property_id');
      $owner_model = new Ownermodel();
      $owner_units=new Ownertounitmodel();

      $owner_id=$this->request->getVar('owner_id');

      $indivisual_info = $owner_model->find($owner_id);
      $indivisual_units=$owner_units->where('owner_id', $owner_id)->where('property_id',$property_id)->findall();
      $data=[
         'indivisual_info' => $indivisual_info,
         'indivisual_units' => $indivisual_units,
      ];
      echo json_encode($data);

    }

    public function owner_utility_add()
    {
      $property_id=$this->session->get('rs_property_id');

      $floor_model=new Floormodel();
      $floors = $floor_model->where('property_id',$property_id)->findall();

      $year_model = new Yearmodel();
      $month_model = new Monthsetupmodel();
      $data['years'] = $year_model->where('property_id',$property_id)->findall();
      $data['months'] = $month_model->where('property_id',$property_id)->findall();

      $data['floors']= $floors;

      if($this->request->getMethod()=='post'){
         if ($this->validate('ownerutility')) {

            $owner_utility = new Ownerutility();
            $utility_id=$this->request->getVar('water_bill');

            if(!empty($this->request->getVar('water_bill'))){
               $water_bill= $this->request->getVar('water_bill');
            }else{
               $water_bill = null;
            }
            if($this->request->getVar('electric_bill')!=''){
               $electric_bill= $this->request->getVar('electric_bill');
            }else{
               $electric_bill = null;
            }
            if(!empty($this->request->getVar('gas_bill'))){
               $gas_bill= $this->request->getVar('gas_bill');
            }else{
               $gas_bill = null;
            }
            if(!empty($this->request->getVar('security_bill'))){
               $security_bill= $this->request->getVar('security_bill');
            }else{
               $security_bill = null;
            }
            if(!empty($this->request->getVar('utility_bill'))){
               $utility_bill= $this->request->getVar('utility_bill');
            }else{
               $utility_bill = null;
            }
            if(!empty($this->request->getVar('other_bill'))){
               $other_bill= $this->request->getVar('other_bill');
            }else{
               $other_bill = null;
            }
            $floor=$this->request->getVar('floor_no');
            $result_floor = explode ("|", $floor);
            $floor_id=$result_floor[1];
            // echo $floorno."kk";

            $unit=$this->request->getVar('unit_no');
            $result_unit = explode ("|", $unit);
            $unit_id=$result_unit[1];
            // echo $unitno;die();


            $data = [
               'floor_id' => $floor_id,
               'unit_id' => $unit_id,
               'owner_name' => $this->request->getVar('owner_name'),
               'owner_id' => $this->request->getVar('owner_id'),
               'month' => $this->request->getVar('month'),
               'year' => $this->request->getVar('year'),
               'water_bill' => $water_bill,
               'electric_bill' => $electric_bill,
               'gas_bill' => $gas_bill,
               'security_bill' => $security_bill,
               'utility_bill' => $utility_bill,
               'others_bill' => $other_bill,
               'total_rent' => $this->request->getVar('total_rents'),
               'issue_date' => $this->request->getVar('issue_date'),
               'property_id' => $property_id,
             ];
             $insert = $owner_utility->save($data);
             if(isset($insert)){
               return redirect()->to(base_url('admin/ownerutilitylist'))->with('success','Data Saved');
             }
         }else{
            $data['validation'] = $this->validator;
            return view('Modules\Owner\Views\admin\owner\owner_utility_add',$data);
         }
      }else{
         return view('Modules\Owner\Views\admin\owner\owner_utility_add',$data);
      }

    }
    public function get_units_by_floor()
    {
      $property_id=$this->session->get('rs_property_id');

      $units_model = new Unitmodel();
      $floor_id= $this->request->getVar('floor_id');
      $units=$units_model->where('floorid', $floor_id)->where('property_id',$property_id)->findall();
      echo json_encode($units);
    }
    public function get_owner_by_unit()
    {
      $property_id=$this->session->get('rs_property_id');

      $owner_model = new Ownermodel();
      $owner_to_unit_model = new Ownertounitmodel();
      $unit_id= $this->request->getVar('unit_id');
      $owner_id_get=$owner_to_unit_model->where('unit_id', $unit_id)->first();
      // //print_r($owner_id_get);
      // echo $owner_id_get['owner_id'];die();
      $owner_id=$owner_id_get['owner_id'];
      $owner= $owner_model->where('owner_id', $owner_id)->where('property_id',$property_id)->first();
      echo json_encode($owner);
    }

    public function owner_utility_list()
    {
      $property_id=$this->session->get('rs_property_id');
      helper('property');
      $owner_utility = new Ownerutility();

      $builder = $this->db->table('owners_utility');
      $builder->select('owners_utility.*,units.unitno as unit_name,floors.floorno as floor_name,owners.image as owner_image,owners.name as owner_name');
      $builder->join('floors', 'owners_utility.floor_id = floors.id','left');
      $builder->join('units', 'owners_utility.unit_id = units.id','left');
      $builder->join('owners', 'owners_utility.owner_id = owners.owner_id','left');
      $builder->where('owners_utility.property_id',$property_id);
      $query = $builder->get();
      $utility_lists = $query->getResult();

      $data['utility_lists']=$utility_lists;

       return view('Modules\Owner\Views\admin\owner\owner_utility_list',$data);
    }

    public function owner_utility_update($id=null)
    {
      $property_id=$this->session->get('rs_property_id');
      $year_model = new Yearmodel();
      $month_model = new Monthsetupmodel();
      $data['years'] = $year_model->where('property_id',$property_id)->findall();
      $data['months'] = $month_model->where('property_id',$property_id)->findall();

      $builder = $this->db->table('owners_utility');
      $builder->select('owners_utility.*,units.unitno as unit_name,floors.floorno as floor_name,owners.image as owner_image,owners.name as owner_name');
      $builder->join('floors', 'owners_utility.floor_id = floors.id','left');
      $builder->join('units', 'owners_utility.unit_id = units.id','left');
      $builder->join('owners', 'owners_utility.owner_id = owners.owner_id','left');
      $builder->where('owners_utility.property_id',$property_id);
      $builder->where('owners_utility.id',$id);
      $query = $builder->get();

      $utility_lists = $query->getResult();
      $data['utility_datas']=$utility_lists;

      ////
      $floor_model=new Floormodel();
      $floors = $floor_model->where('property_id',$property_id)->findall();
      $data['floors']= $floors;

      if($this->request->getMethod()=='post'){

         if ($this->validate('ownerutility')) {

            $owner_utility = new Ownerutility();
            $utility_id=$this->request->getVar('utility_id');

            if(!empty($this->request->getVar('water_bill'))){
               $water_bill= $this->request->getVar('water_bill');
            }else{
               $water_bill = null;
            }
            if($this->request->getVar('electric_bill')!=''){
               $electric_bill= $this->request->getVar('electric_bill');
            }else{
               $electric_bill = null;
            }
            if(!empty($this->request->getVar('gas_bill'))){
               $gas_bill= $this->request->getVar('gas_bill');
            }else{
               $gas_bill = null;
            }
            if(!empty($this->request->getVar('security_bill'))){
               $security_bill= $this->request->getVar('security_bill');
            }else{
               $security_bill = null;
            }
            if(!empty($this->request->getVar('utility_bill'))){
               $utility_bill= $this->request->getVar('utility_bill');
            }else{
               $utility_bill = null;
            }
            if(!empty($this->request->getVar('other_bill'))){
               $other_bill= $this->request->getVar('other_bill');
            }else{
               $other_bill = null;
            }
            $floor=$this->request->getVar('floor_no');
            $result_floor = explode ("|", $floor);
            $floor_id=$result_floor[1];
            // echo $floorno."kk";

            $unit=$this->request->getVar('unit_no');
            $result_unit = explode ("|", $unit);
            $unit_id=$result_unit[1];
            // echo $unitno;die();


            $data = [
               'floor_id' => $floor_id,
               'unit_id' => $unit_id,
               'owner_name' => $this->request->getVar('owner_name'),
               'owner_id' => $this->request->getVar('owner_id'),
               'month' => $this->request->getVar('month'),
               'year' => $this->request->getVar('year'),
               'water_bill' => $water_bill,
               'electric_bill' => $electric_bill,
               'gas_bill' => $gas_bill,
               'security_bill' => $security_bill,
               'utility_bill' => $utility_bill,
               'others_bill' => $other_bill,
               'total_rent' => $this->request->getVar('total_rents'),
               'issue_date' => $this->request->getVar('issue_date'),
             ];

             $updated = $owner_utility->update($utility_id,$data);
             if(isset($updated)){
               return redirect()->to(base_url('admin/ownerutilitylist'))->with('success','Data Updated');
             }
         }else{
            $data['validation'] = $this->validator;
            return view('Modules\Owner\Views\admin\owner\owner_utility_update',$data);
         }
      }else{
         if(!empty($data['utility_datas'])){
            return view('Modules\Owner\Views\admin\owner\owner_utility_update',$data);
        }else{
         return view('\Modules\Home\Views\admin\home\property_error_page');
        }

      }

    }

    public function owner_utility_delete($id=null)
    {
      $owner_utility = new Ownerutility();


      $delete_utility=$owner_utility->where('id', $id)->delete();
      if($delete_utility){
         return redirect()->to(base_url('admin/ownerutilitylist'))->with('success','Data deleted');
      }else{
         return redirect()->to(base_url('admin/ownerutilitylist'))->with('success','delete faild');
      }

    }
    public function indivusual_utility()
    {
      $property_id=$this->session->get('rs_property_id');
      helper('property');
      $utility_model=new Ownerutility();

      $utility_id=$this->request->getVar('utility_id');

      $builder = $this->db->table('owners_utility');
      $builder->select('owners_utility.*,owners.image as owner_image,owners.name as owner_name');
      $builder->join('owners', 'owners_utility.owner_id = owners.owner_id','left');
      $builder->where('owners_utility.property_id',$property_id);
      $builder->where('owners_utility.id',$utility_id);
      $query = $builder->get();
      $indivisual_utilities = $query->getResult();
      foreach($indivisual_utilities as $indivisual_utility){
         $data['indivisual_utility']=$indivisual_utility;
         //print_r($data['indivisual_utility']);die();

      $data['indivisual_utility']->total_rent= currency($data['indivisual_utility']->total_rent,1);
      $data['indivisual_utility']->water_bill= currency($data['indivisual_utility']->water_bill,1);
      $data['indivisual_utility']->electric_bill= currency($data['indivisual_utility']->electric_bill,1);
      $data['indivisual_utility']->gas_bill= currency($data['indivisual_utility']->gas_bill,1);
      $data['indivisual_utility']->security_bill= currency($data['indivisual_utility']->security_bill,1);
      $data['indivisual_utility']->utility_bill= currency($data['indivisual_utility']->utility_bill,1);
      $data['indivisual_utility']->others_bill= currency($data['indivisual_utility']->others_bill,1);
      }
      echo json_encode($data);

    }
}
