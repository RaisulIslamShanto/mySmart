<?php

namespace Modules\Complain\Controllers;

use App\Controllers\BaseController;
use Modules\Owner\Models\Committeemodel;
use Modules\Complain\Models\Complainmodel;
use Modules\Employee\Models\Employeemodel;
use Modules\Master\Models\notifymodel;

class Complaincontroller extends BaseController{

    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    /**
     * This method index shows complain details of a property.
     * Method - get
     */
    public function index()
    {
        $property_id=$this->session->get('rs_property_id');

        $builder = $this->db->table('complains');
        $builder->select('complains.*,employees.name');
        $builder->join('employees', 'complains.comass = employees.id', "left");
        $builder->where('complains.property_id',$property_id);
        $query = $builder->get();
        $results=$query->getResultArray();

        //echo $this->db->getLastQuery();die();
        if(empty($results)){
            $data['getComplains']=null;

            return view('Modules\Complain\Views\admin\complain\complain-list', $data);
        }else{
            $data['getComplains']=$results;

            return view('Modules\Complain\Views\admin\complain\complain-list', $data);
        }
    }
     /**
     *  End addFund
     */


     /**
     * This method complainAdd saves complain details of a property to database.
     * Method - post
     * Validates - committeeValidate
     */
    public function complainAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $notify= new notifymodel();
        $data = [];

        $personId = $this->session->get('userId');

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('complainValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $complainCreate = [
                    'comtitle' => $this->request->getVar('com_title'),
                    'comdescription' => $this->request->getVar('com_description'),
                    'comdate' => $this->request->getVar('com_date'),
                    'comperson' => $personId,
                    'property_id' => $property_id,
                ];

                $complain->insert($complainCreate);
                $complain_id=$complain->getInsertID();
                $userId = $this->session->get('userId');
                $notif=[
                    'issue_name' => 'Complain',
                    'issue_id' => $complain_id,
                    'type' => 'add complain',
                    'status' => 1,
                    'property_id' => $property_id,
                    'who_will_get' => "1",
                    'user_id' => $userId,
                ];
                $notify->insert($notif);
                return redirect()->to(base_url('/admin/complain_list'));
            }
        }
        return view('Modules\Complain\Views\admin\complain\complain-add', $data);
    }
    /**
     *  End complainAdd
     */


     /**
     *  This method complainSolution update a solution of complain.It make sure that which solution are done.
     *  Method - post
     */
    public function complainSolution()
    {
        $notify_model = new notifymodel();
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $id =  $this->request->getVar('complainId');

        $solutionCreate = [
            'comstatus' => $this->request->getVar('comStatus'),
            'comsolution' => $this->request->getVar('comSolution'),
        ];
        $userId = $this->session->get('userId');
        $notif=[
            'issue_name' => 'Complain',
            'issue_id' => $id,
            'type' => 'Add Solution',
            'status' => 1,
            'property_id' => $property_id,
            'who_will_get' => "3",
            'user_id' => $userId,

        ];
        $notify_model->insert($notif);

        $complain->update($id, $solutionCreate);
    }
    /**
     *  End complainSolution
     */


    /**
     *  This method getEmployee get employees for assign  complain.
     *  It's called by ajax.
     *  Method - post
     */
    public function getEmployee()
    {
        $property_id=$this->session->get('rs_property_id');

        $employee = new Employeemodel();
        $results = $employee->where('property_id',$property_id)->findAll();
        echo json_encode($results);
    }
    /**
     *  End complainAdd
     */


     /**
     *  This method assigned employee to solve the complain.
     *  It's called by ajax.
     *  Method - post
     */
    public function assignEmployee()
    {
        $notify_model = new notifymodel();

        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $id =  $this->request->getVar('complainId');

        $employeeCreate = [
            'comass' => $this->request->getVar('comEmployee')
        ];
        $userId = $this->session->get('userId');
        $notif=[
            'issue_name' => 'Complain',
            'issue_id' => $id,
            'type' => 'Assign Complain',
            'status' => 1,
            'property_id' => $property_id,
            'who_will_get' => "2,3",
            'user_id' => $userId,


        ];
        $notify_model->insert($notif);

        $complain->update($id, $employeeCreate);
    }
    /**
     *  End complainAdd
     */


     /**
     *  This method complainView views all complain with details.
     *  Method - get
     */
    public function complainView()
    {
        $property_id=$this->session->get('rs_property_id');

        $id =  $this->request->getVar('viewId');

        $builder = $this->db->table('complains');
        $builder->select('users.email,users.contactno,employees.name,complains.*');
        $builder->join('users', 'complains.comperson = users.id');
        $builder->join('employees', 'complains.comass = employees.id');
        $builder->where('complains.id', $id);
        $builder->where('property_id',$property_id);
        $query = $builder->get();


        foreach ($query->getResultArray() as $row) {
            $data['getComplains'] = $row;
        }

        $data['getComplains']['month'] = date('F', strtotime($data['getComplains']['comdate']));

        echo json_encode($data);
    }
    /**
     *  End complainAdd
     */



    /**
     * This method complainEdit edits all data complain details of a property which is add by complainAdd.
     * Method - get & post
     * Validates - complainValidate
     * It has a perameter row id known as "$id" used for which row will edit.
     */
    public function complainEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $data['getComplain'] = $complain->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('complainValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $complainUpdate = [
                    'comtitle' => $this->request->getVar('com_title'),
                    'comdescription' => $this->request->getVar('com_description'),
                    'comdate' => $this->request->getVar('com_date'),
                ];

                $complain->update($id, $complainUpdate);
                return redirect()->to(base_url('/admin/complain_list'));
            }
        }
        if(!empty($data['getComplain'])){
            return view('Modules\Complain\Views\admin\complain\complain-edit', $data);
        }else{
            return view('\Modules\Home\Views\admin\home\property_error_page');
        }

    }
    /**
     *  End complainEdit
     */


     /**
     * This method complainDelete deletes all data complain details of a property which is add by complainAdd.
     * Method - get
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    public function complainDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $complain->delete($id);
        return redirect()->to(base_url('/admin/complain_list'));
    }
    /**
     *  End complainDelete
     */

}
