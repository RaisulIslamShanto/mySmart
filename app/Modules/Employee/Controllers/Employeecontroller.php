<?php

namespace Modules\Employee\Controllers;

use App\Controllers\BaseController;
use Modules\Employee\Models\Employeemodel;
use Modules\Setting\Models\Monthsetupmodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Employee\Models\Employeesalarymodel;

class Employeecontroller extends BaseController{
    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }


    /**
     * This method addEmployee saves employee information of a property to database.
     * Method - get & post
     * Validates - employee
     */
    public function addEmployee()
    {
        $property_id=$this->session->get('rs_property_id');

        $validation =  \Config\Services::validation();
        $employee_model = new Employeemodel();
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employee')) {

                $avatar = $this->request->getFile('image');
                if ($avatar != '') {
                    $name = $avatar->getRandomName();

                    $move = $avatar->move(WRITEPATH . '../public/admin/assets/employee/', $name);

                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../public/admin/assets/employee/' . $name)
                        ->resize(200, 200, true, 'height')
                        ->save(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $name);
                } else {
                    $name = 'empty_image.jpg';
                }

                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'contact_no' => $this->request->getVar('contact_no'),
                    'present_address' => $this->request->getVar('present_address'),
                    'parmanent_address' => $this->request->getVar('parmanent_address'),
                    'nid' => $this->request->getVar('nid'),
                    'designation' => $this->request->getVar('designation'),
                    'join_date' => $this->request->getVar('join_date'),
                    'end_date' => $this->request->getVar('end_date'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'status' => $this->request->getVar('status'),
                    'image' => $name,
                    'property_id' => $property_id,
                ];

                $data_save = $employee_model->save($data);


                if ($data_save) {
                    return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Saved');
                }
                } else {

                $data['validation'] = $this->validator;
                return view('Modules\Employee\Views\admin\employee\add_employee', $data);
               }
        } else {
            return view('Modules\Employee\Views\admin\employee\add_employee');
        }
    }
    /**
     *  End addEmployee
     */


     /**
     * This method employeeList shows employee information of a property to database.
     * Method - get
     */
    public function employeeList()
    {
        $property_id=$this->session->get('rs_property_id');
        $employee_model = new employeemodel();
        $data = [
            'employees' => $employee_model->where('property_id',$property_id)->paginate(30),
            'pager' => $employee_model->pager
        ];
        return view('Modules\Employee\Views\admin\employee\employee_list', $data);
    }
    /**
     *  End employeeList
     */


     /**
     * This method employeeUpdate edits all data employee details of a property which is add by addEmployee.
     * Method - get & post
     * Validates - employee
     * It has a perameter row id known as "$id" used for which row will edit.
     */
    public function employeeUpdate($id = null)
    {
        $property_id=$this->session->get('rs_property_id');

        $employee_model = new employeemodel();
        $employees = $employee_model->where('property_id',$property_id)->find($id);
        $data['employees'] = $employees;



        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employee')) {


                $avatar = $this->request->getFile('image');

                if ($avatar != '') {

                    $pre_image = $this->request->getVar('image');
                    if ($employees['image'] != 'empty_image.jpg') {
                        unlink(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $pre_image);
                        unlink(WRITEPATH . '../public/admin/assets/employee/' . $pre_image);
                    }

                    $name = $avatar->getRandomName();

                    $move = $avatar->move(WRITEPATH . '../public/admin/assets/employee/', $name);

                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../public/admin/assets/employee/' . $name)
                        ->resize(200, 200, true, 'height')
                        ->save(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $name);
                } elseif ($employees['image'] != 'empty_image.jpg') {
                    $name = $employees['image'];
                } else {
                    $name = 'empty_image.jpg';
                }


                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'contact_no' => $this->request->getVar('contact_no'),
                    'present_address' => $this->request->getVar('present_address'),
                    'parmanent_address' => $this->request->getVar('parmanent_address'),
                    'nid' => $this->request->getVar('nid'),
                    'designation' => $this->request->getVar('designation'),
                    'join_date' => $this->request->getVar('join_date'),
                    'end_date' => $this->request->getVar('end_date'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'status' => $this->request->getVar('status'),
                    'image' => $name,
                ];

                $updated = $employee_model->update($id, $data);
                if ($updated) {
                    return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Updated');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('Modules\Employee\Views\admin\employee\employee_update', $data);
            }
        } else {
            if(isset($data['employees'])){
                return view('Modules\Employee\Views\admin\employee\employee_update', $data);
            }else{
                return view('\Modules\Home\Views\admin\home\property_error_page');
            }

        }
    }
    /**
     *  End employeeList
     */


     /**
     * This method employeeDelete deletes all data from employee list of a property .
     * Method - get
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    public function employeeDelete($id = null)
    {
        $employee_model = new employeemodel();

        $find = $employee_model->where('id', $id)->first();
        if($find['image'] != 'empty_image.jpg'){
            unlink(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $find['image']);
            unlink(WRITEPATH . '../public/admin/assets/employee/' . $find['image']);
        }

        $deleted = $employee_model->where('id', $id)->delete();
        if (isset($deleted)) {
            return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Deleted');
        } else {
            return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Deleted Faild');
        }
    }
    /**
     *  End employeeList
     */


     /**
     *  This method indivisualEmployee get all data related to each single row.
     *  It's called by ajax.
     *  Method - post
     */
    public function indivisualEmployee()
    {
        $property_id=$this->session->get('rs_property_id');

        helper('property');
        $employee_model = new Employeemodel();
        $id = $this->request->getVar('employee_id');
        $data['employee'] = $employee_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['employee']['salary_per_month']=currency($data['employee']['salary_per_month'],1);
        $data['employee']['join_date']=date_formats($data['employee']['join_date']);
        $data['employee']['end_date']=date_formats($data['employee']['end_date']);

        echo json_encode($data);
    }
    /**
     *  End employeeList
     */



     /**
     * This method employeeSalary saves employee salary information of a property to database.
     * Method - get & post
     * Validates - employeesalary
     */
    public function employeeSalary()
    {

        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $employee_model = new Employeemodel();
        $employee_salary_model = new Employeesalarymodel();
        $data['employees'] = $employee_model->where('property_id',$property_id)->findall();
        $data['employee_salary'] = $employee_salary_model->where('property_id',$property_id)->findall();
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employeesalary')) {
                $value = $this->request->getVar('employee_name');
                $str_arr = explode(",", $value);
                $name = $str_arr[1];
                $employee_id = $str_arr[0];
                $data = [
                    'employee_id' => $employee_id,
                    'name' => $name,
                    'designation' => $this->request->getVar('designation2'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'issue_date' => $this->request->getVar('issue_date'),
                    'property_id' => $property_id,
                ];
                $insert = $employee_salary_model->save($data);
                if (isset($insert)) {
                    $data['years'] = $year_model->where('property_id',$property_id)->findall();
                    $data['months'] = $month_model->where('property_id',$property_id)->findall();
                    $data['employees'] = $employee_model->where('property_id',$property_id)->findall();
                    $data['employee_salary'] = $employee_salary_model->where('property_id',$property_id)->findall();
                    $data['success'] = "Data Saved";
                    return view('Modules\Employee\Views\admin\employee\employee_salary', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('Modules\Employee\Views\admin\employee\employee_salary', $data);
            }
        } else {
            return view('Modules\Employee\Views\admin\employee\employee_salary', $data);

        }
    }
    /**
     *  End employeeSalary
     */



     /**
     *  This method getIndivisualemployee get all data related to each single row.
     *  It's called by ajax.
     *  Method - post
     */
    public function getIndivisualemployee()
    {
        $property_id=$this->session->get('rs_property_id');

        $employee_model = new Employeemodel();
        $id = $this->request->getVar('employee_id');
        $data['employee'] = $employee_model->where('property_id',$property_id)->where('id', $id)->first();


        echo json_encode($data);
    }
    /**
     *  End employeeSalary
     */



     /**
     * This method employeeSalaryUpdate edits all data employee salary information of a property.
     * Method - get & post
     * Validates - employeesalary
     * It has a perameter row id known as "$id" used for which row will edit.
     */
    public function employeeSalaryUpdate($id = null)
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $employee_model = new Employeemodel();
        $data['employees'] = $employee_model->where('property_id',$property_id)->findall();
        $employee_salary_model = new Employeesalarymodel();
        $employee_salary = $employee_salary_model->where('property_id',$property_id)->find($id);
        $data['employee_salary'] = $employee_salary;
        // print_r($data['employee_salary']);die();
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employeesalary')) {
                $value = $this->request->getVar('employee_name');
                $str_arr = explode(",", $value);
                $name = $str_arr[1];
                $employee_id = $str_arr[0];
                $data = [
                    'employee_id' => $employee_id,
                    'name' => $name,
                    'designation' => $this->request->getVar('designation2'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'issue_date' => $this->request->getVar('issue_date'),
                ];

                $updated = $employee_salary_model->update($id, $data);
                if (isset($updated)) {
                    return redirect()->to(base_url('admin/employeesalary'))->with('success', 'Data Updated');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('Modules\Employee\Views\admin\employee\employee_salary_update', $data);
            }
        } else {
            if(isset($data['employees']) && isset($data['employee_salary'])){
                return view('Modules\Employee\Views\admin\employee\employee_salary_update', $data);
            }else{
                return view('\Modules\Home\Views\admin\home\property_error_page');
            }

        }
    }
    /**
     *  End employeeSalaryUpdate
     */


     /**
     * This method employeeSalaryDelete deletes all data from employee list of a property .
     * Method - get
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    public function employeeSalaryDelete($id = null)
    {
        $employee_salary_model = new Employeesalarymodel();

        $deleted = $employee_salary_model->where('id', $id)->delete();
        if (isset($deleted)) {
            return redirect()->to(base_url('admin/employeesalary'))->with('success', 'Data Deleted');
        } else {
            return redirect()->to(base_url('admin/employeesalary'))->with('success', 'Data Deleted Faild');
        }
    }
    /**
     *  End employeeSalaryDelete
     */



     /**
     *  This method indivisualEmployeeSalary get all data related to each single row.
     *  It's called by ajax.
     *  Method - post
     */
    public function indivisualEmployeeSalary()
    {
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $employee_model = new Employeemodel();
        $employee_salary_model = new Employeesalarymodel();
        $id = $this->request->getVar('employee_salary_id');
        $employee_salary = $employee_salary_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['employee_salary'] = $employee_salary;
        $data['employee'] = $employee_model->where('property_id',$property_id)->where('id', $employee_salary['employee_id'])->first();
        $data['employee']['salary_per_month']=currency($data['employee']['salary_per_month'],1);
        $data['employee_salary']['issue_date']=date_formats($data['employee_salary']['issue_date']);

        echo json_encode($data);
    }
    /**
     *  End employeeSalaryDelete
     */



    public function employeeLeave()
    {
        return view('Modules\Employee\Views\admin\employee\employee_leave');
    }



    // public function print_salary_report()
    // {
    //     return view('Modules\Employee\Views\admin\employee\employee_leave');
    // }
}
