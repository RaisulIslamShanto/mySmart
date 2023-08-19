<?php

namespace Modules\Apartment_fund\Controllers;

use App\Controllers\BaseController;
use Modules\Owner\Models\OwnerModel;
use Modules\Apartment_fund\Models\Fundmodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Setting\Models\Monthsetupmodel;

class Apartmentfundcontroller extends BaseController{
    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }
    /**
     * This method addFund saves funding details of a property to database.
     * Method - post
     * Validates - fund
     */
    public function addFund()
    {
        $property_id = $this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id', $property_id)->findall();
        $data['months'] = $month_model->where('property_id', $property_id)->findall();

        $owner_model = new OwnerModel();
        $fund_model = new Fundmodel();

        $data['get_owners'] = $owner_model->where('property_id', $property_id)->findall();


        if ($this->request->getMethod() == 'post') {

            if ($this->validate('fund')) {

                $saveAndPrint = $this->request->getVar('btn_save_print');

                if ($saveAndPrint == '') {
                    $owner = $this->request->getVar('owner_name');
                    $str_arr = explode(",", $owner);
                    $owner_name = $str_arr[0];
                    $owner_id = $str_arr[1];
                    $owner_image = $str_arr[2];

                    $data = [
                        'owner_id' => $owner_id,
                        'owner_name' => $owner_name,
                        'owner_image' => $owner_image,
                        'month' => $this->request->getVar('month'),
                        'year' => $this->request->getVar('year'),
                        'issue_date' => $this->request->getVar('issue_date'),
                        'total_amount' => $this->request->getVar('total_amount'),
                        'purpose' => $this->request->getVar('purpose'),
                        'property_id' => $property_id,
                    ];

                    $data_save = $fund_model->save($data);

                    if ($data_save) {
                        return redirect()->to(base_url('admin/fundlist'))->with('success', 'Data Saved');
                    }
                } else {

                    /*==================================================
                                    Print section start
                    ====================================================*/


                    $owner = $this->request->getVar('owner_name');
                    $str_arr = explode(",", $owner);
                    $owner_name = $str_arr[0];
                    $owner_id = $str_arr[1];
                    $owner_image = $str_arr[2];

                    $data = [
                        'owner_id' => $owner_id,
                        'owner_name' => $owner_name,
                        'owner_image' => $owner_image,
                        'month' => $this->request->getVar('month'),
                        'year' => $this->request->getVar('year'),
                        'issue_date' => $this->request->getVar('issue_date'),
                        'total_amount' => $this->request->getVar('total_amount'),
                        'purpose' => $this->request->getVar('purpose'),
                        'property_id' => $property_id,
                    ];

                    $data_save = $fund_model->save($data);

                    $lastId = $this->db->insertId();

                    return redirect()->to(base_url('admin/invoice/' . $lastId));

                    /*==================================================
                                    Print section end
                    ====================================================*/

                }
            } else {
                $data['validation'] = $this->validator;

                return view('Modules\Apartment_fund\Views\admin\apartment_fund\add_fund', $data);
            }
        } else {

            return view('Modules\Apartment_fund\Views\admin\apartment_fund\add_fund', $data);
        }
    }
    /**
     *  End addFund
     */



     /**
     * This method fundList shows funding details of a property.
     * Method - get
     */
    public function fundList()
    {
        $property_id=$this->session->get('rs_property_id');

        helper('property');
        $fund_model= new Fundmodel();
        $builder = $this->db->table('funds');
        $builder->select('funds.*,owners.image as owner_image,owners.name as owner_name');
        $builder->join('owners', 'funds.owner_id = owners.owner_id','left');
        $builder->where('funds.property_id',$property_id);
        $query = $builder->get();
        $funds = $query->getResult();
        $data['funds'] = $funds;
        return view('Modules\Apartment_fund\Views\admin\apartment_fund\fund_list',$data);
    }
    /**
     *  End fundList
     */


     /**
     * This method fundUpdate edits all data funding details of a property which is add by addfund.
     * Method - get & post
     * Validates - fund
     * It has a perameter row id known as "$id" used for which row will edit.
     */
        public function fundUpdate($id=null)
    {
        $property_id = $this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id', $property_id)->findall();
        $data['months'] = $month_model->where('property_id', $property_id)->findall();

        $owner_model = new OwnerModel();
        $fund_model = new Fundmodel();
        $data['get_owners'] = $owner_model->where('property_id', $property_id)->findall();
        $data['get_fund'] = $fund_model->where('property_id', $property_id)->find($id);

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('fund')) {

                $saveAndPrint = $this->request->getVar('btn_save_print');

                if($saveAndPrint == ''){
                    $owner = $this->request->getVar('owner_name');
                    $str_arr = explode(",", $owner);
                    $owner_name = $str_arr[0];
                    $owner_id = $str_arr[1];
                    $owner_image = $str_arr[2];

                    $data = [
                        'owner_id' => $owner_id,
                        'owner_name' => $owner_name,
                        'owner_image' => $owner_image,
                        'month' => $this->request->getVar('month'),
                        'year' => $this->request->getVar('year'),
                        'issue_date' => $this->request->getVar('issue_date'),
                        'total_amount' => $this->request->getVar('total_amount'),
                        'purpose' => $this->request->getVar('purpose'),
                    ];

                    $updated = $fund_model->update($id, $data);

                    if ($updated) {
                        return redirect()->to(base_url('admin/fundlist'))->with('success', 'Data Updated');
                    }

                }else{

                    /*==================================================
                                Print section start
                    ====================================================*/

                    $owner = $this->request->getVar('owner_name');
                    $str_arr = explode(",", $owner);
                    $owner_name = $str_arr[0];
                    $owner_id = $str_arr[1];
                    $owner_image = $str_arr[2];

                    $data = [
                        'owner_id' => $owner_id,
                        'owner_name' => $owner_name,
                        'owner_image' => $owner_image,
                        'month' => $this->request->getVar('month'),
                        'year' => $this->request->getVar('year'),
                        'issue_date' => $this->request->getVar('issue_date'),
                        'total_amount' => $this->request->getVar('total_amount'),
                        'purpose' => $this->request->getVar('purpose'),
                    ];

                    $updated = $fund_model->update($id, $data);

                    return redirect()->to(base_url('admin/invoice/' . $id));


                    /*==================================================
                                Print section end
                    ====================================================*/

                }

            } else {
                return view('Modules\Apartment_fund\Views\admin\apartment_fund\fund_update', $data);
            }
        } else {
            if (!empty($data['get_fund'])) {
                return view('Modules\Apartment_fund\Views\admin\apartment_fund\fund_update', $data);
            } else {

                return view('\Modules\Home\Views\admin\home\property_error_page');
            }
        }
    }
    /**
     * End fundUpdate
     */


     /**
     * This method fundDelete deletes all data funding details of a property which is add by addfund.
     * Method - get
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    public function fundDelete($id=null)
    {
        $fund_model= new Fundmodel();

        $deleted = $fund_model->where('id',$id)->delete();

        if($deleted){
        return redirect()->to(base_url('admin/fundlist'))->with('success','Data Deleted');
        }

    }
    /**
     * End fundUpdate
     */

     /**
     *  This method indivisualFund get all data related to each single row.
     *  It's called by ajax.
     *  Method - post
     */
    public function indivisualFund()
    {
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $fund_model= new Fundmodel();
        $id= $this->request->getVar('fund_id');

        $builder = $this->db->table('funds');
        $builder->select('funds.*,owners.image as owner_image,owners.name as owner_name');
        $builder->join('owners', 'funds.owner_id = owners.owner_id','left');
        $builder->where('funds.property_id',$property_id);
        $query = $builder->get();
        $funds = $query->getResult();
        foreach($funds as $fund){
            $data['fund'] = $fund;
            $data['fund']->total_amount =currency($data['fund']->total_amount,1);
            $data['fund']->issue_date =date_formats($data['fund']->issue_date);
        }


        echo json_encode($data);
    }
    /**
     * End indivisualFund
     */


     /**
     *  This method invoice is used for make a fund invoice by takes input.
     *  Method - get
     * It has a perameter row id known as "$id" used for which row will Print.
     */
    public function invoice($id=null)
    {
        $property_id=$this->session->get('rs_property_id');

        $owner_model= new Ownermodel();
        $fund_model= new Fundmodel();
        $fund = $fund_model->where('property_id',$property_id)->where('id',$id)->first();
        $data['fund']=$fund;
        $owner=$owner_model->where('property_id',$property_id)->where('owner_id',$fund['owner_id'])->first();
        $data['owner']=$owner;

        $this->session->set('fund_i',$fund);
        $this->session->set('owner_i',$data['owner']);

        return view('Modules\Apartment_fund\Views\admin\apartment_fund\invoice',$data);
    }
    /**
     * End invoice
     */

     /**
     *  This method printFundInvoice is used for print invoice .
     *  Method - get
     *  It takes all data from previous function by using session
     */

    public function printFundInvoice(){

        $data['fund']=$this->session->get('fund_i');
        $data['owner']=$this->session->get('owner_i');
        //print_r($data['owner']);die();
        return view('Modules\Apartment_fund\Views\admin\apartment_fund\print_fund_invoice',$data);
    }
    /**
     * End printFundInvoice
     */

}
