<?php

namespace Modules\Bill_diposit\Controllers;

use App\Controllers\BaseController;
use Modules\Bill_diposit\Models\Billdipositmodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Setting\Models\Monthsetupmodel;
use Modules\Setting\Models\Billsetupmodel;
use Modules\User\Models\User;

class Billdepositcontroller extends BaseController{

    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    /**
     * This method addBill saves bill details of a property to database.
     * Method - get & post
     * Validates - billdeposit
     */
    public function addBill()
    {
        $session = session();
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $nilltype_model = new Billsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $user_id= $session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$user_id)->first();

        $billSetUp = new Billsetupmodel();
        $data['bill_types'] = $billSetUp->where('company_id',$this_user['company_id'])->findAll();

        $bill_deposit_model = new Billdipositmodel();
        if($this->request->getMethod()=='post'){
            if ($this->validate('billdeposit')) {
                $data = [
                    'bill_type' => $this->request->getVar('bill_type'),
                    'bill_date' => $this->request->getVar('bill_date'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'total_amount' => $this->request->getVar('total_amount'),
                    'bank_name' => $this->request->getVar('bank_name'),
                    'details' => $this->request->getVar('details'),
                    'property_id' => $property_id,
                  ];
                  $insert = $bill_deposit_model->save($data);

                  if($insert){
                    return redirect()->to(base_url('admin/billdipositlist'))->with('success','Data Saved');
                  }

            }else{
                $data['validation'] = $this->validator;
                return view('Modules\Bill_diposit\Views\admin\bill_deposit\add_bill',$data);

            }
        }else{
            return view('Modules\Bill_diposit\Views\admin\bill_deposit\add_bill',$data);
        }
    }
    /**
     *  End addBill
     */


     /**
     * This method billDepositList shows bill details of a property which are add by addBill.
     * Method - get
     */
    public function billDepositList(){
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $builder = $this->db->table('bill_diposit');
        $builder->select('bill_diposit.*,billsetups.billtype as billtype_name');
        $builder->join('billsetups', 'bill_diposit.bill_type = billsetups.id','left');
        $builder->where('bill_diposit.property_id',$property_id);
        $query = $builder->get();
        $bill_lists = $query->getResult();
        $data['bill_lists']=$bill_lists;
        return view('Modules\Bill_diposit\Views\admin\bill_deposit\bill_list',$data);
    }
    /**
     *  End billDepositList
     */

     /**
     * This method billUpdate edits all data funding details of a property which is add by addfund.
     * Method - get & post
     * Validates - billdeposit
     * It has a perameter row id known as "$id" used for which row will edit.
     */
    public function billUpdate($id=null){
        $session = session();

        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $nilltype_model = new Billsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $user_id= $session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$user_id)->first();

        $billSetUp = new Billsetupmodel();
        $data['bill_types'] = $billSetUp->where('company_id',$this_user['company_id'])->findAll();


        $bill_deposit_model = new Billdipositmodel();
        $bill= $bill_deposit_model->where('property_id',$property_id)->find($id);
        $data['bill']=$bill;

        if($this->request->getMethod()=='post'){
            if ($this->validate('billdeposit')) {
                $data = [
                    'bill_type' => $this->request->getVar('bill_type'),
                    'bill_date' => $this->request->getVar('bill_date'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'total_amount' => $this->request->getVar('total_amount'),
                    'bank_name' => $this->request->getVar('bank_name'),
                    'details' => $this->request->getVar('details'),
                  ];

                  $updated = $bill_deposit_model->update($id,$data);

                  if($updated){
                    return redirect()->to(base_url('admin/billdipositlist'))->with('success','Data Updated');
                  }

            }else{
                return view('Modules\Bill_diposit\Views\admin\bill_deposit\bill_update',$data);
            }
        }else{
            if(!empty($data['bill'])){
                return view('Modules\Bill_diposit\Views\admin\bill_deposit\bill_update',$data);
            }else{
                return view('\Modules\Home\Views\admin\home\property_error_page');
            }
        }
    }
    /**
     *  End billUpdate
     */


     /**
     * This method fundDelete deletes all data funding details of a property which is add by addfund.
     * Method - get
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    public function billDelete($id=null){
        $property_id=$this->session->get('rs_property_id');

        $bill_deposit_model = new Billdipositmodel();
        $bill= $bill_deposit_model->find($id);
        $data['bill']=$bill;

        $deleted= $bill_deposit_model->where('id', $id)->delete();
        if(isset($deleted)){
            return redirect()->to(base_url('admin/billdipositlist'))->with('success','Data Deleted');
        }else{
            return view('Modules\Bill_diposit\Views\admin\bill_deposit\bill_update',$data);
        }

    }
    /**
     *  End billUpdate
     */


     /**
     *  This method indivisualFund get all data related each single row.
     *  It's called by ajax.
     *  Method - post
     */
    public function indivisualBill(){
        $property_id=$this->session->get('rs_property_id');

        helper('property');
        $bill_deposit_model = new Billdipositmodel();
        $bill_id= $this->request->getVar('bill_id');

        $bill_data = $bill_deposit_model->where('property_id',$property_id)->where('id', $bill_id)->first();
        $data['bill_data']=$bill_data;
        $data['bill_data']['total_amount']=currency($data['bill_data']['total_amount'],1);
        $data['bill_data']['bill_date']=date_formats($data['bill_data']['bill_date']);

        echo json_encode($data);
    }
    /**
     *  End indivisualBill
     */
}
