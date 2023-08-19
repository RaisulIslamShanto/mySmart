<?php

namespace Modules\Report\Controllers;

use App\Controllers\BaseController;
use Modules\Floor\Models\Floormodel;
use Modules\Employee\Models\Employeesalarymodel;
use Modules\Rent\Models\Rentmodel;
use Modules\Maintenance\Models\Maintenancemodel;
use Modules\Bill_diposit\Models\BilldipositModel;
use Modules\Apartment_fund\Models\Fundmodel;
use Modules\Employee\Models\Employeemodel;
use Modules\Complain\Models\Complainmodel;
use Modules\Setting\Models\Yearmodel;
use Modules\Setting\Models\Monthsetupmodel;

use TCPDF;

class Reportcontroller extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'session']);
        // $this->user = new User();
        $this->session = session();
    }
    public function rent_report()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $floor_model = new Floormodel();
        $floors = $floor_model->where('property_id',$property_id)->findall();
        $data['floors'] = $floors;
        return view('Modules\Report\Views\admin\report\rent\rent_report', $data);
        
    }
    public function rent_info()
    {
        $property_id=$this->session->get('rs_property_id');

        helper('property');

        if (!empty($this->request->getVar('floor'))) {
            $floor = $this->request->getVar('floor');
            $result_floor = explode("|", $floor);
            $floor_id = $result_floor[1];
            $floor_name = $result_floor[0];
        } else {
            $floor_id = null;
            $floor_name = null;
        }
        if (!empty($this->request->getVar('unit'))) {
            $unit = $this->request->getVar('unit');
            $result_unit = explode("|", $unit);
            $unit_id = $result_unit[1];
            $unit_name = $result_unit[0];
        } else {
            $unit_id = null;
            $unit_name = null;
        }
        if (!empty($this->request->getVar('year'))) {
            $year = $this->request->getVar('year');
        } else {
            $year = null;
        }
        if (!empty($this->request->getVar('month'))) {
            $month = $this->request->getVar('month');
        } else {
            $month = null;
        }
        if (!empty($this->request->getVar('status'))) {
            $status = $this->request->getVar('status');
        } else {
            $status = null;
        }
        if (empty($unit_name) && empty($floor_name) && empty($year) && empty($status)) {
            return redirect()->to(base_url('admin/rentreport'))->with('faild', 'Please choose at least one field');
        } else {

            //echo $unit_name.'f'.$floor_name.'y'.$year.'m'.$month.'s'.$status;die();

            $rent_model = new Rentmodel();

            if (($unit_name != '' && $floor_name != '') && ($status == '' && $month == '' && $year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $status != '') && ($month == '' && $year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.bill_status',$status);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('bill_status', $status)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $status != '' && $month != '') && ($year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.bill_status',$status);
                $builder->where('rent.month',$month);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('bill_status', $status)->Where('month', $month)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $status != '' && $month != '' && $year != '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.bill_status',$status);
                $builder->where('rent.month',$month);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('bill_status', $status)->Where('month', $month)->Where('year', $year)->findall();
            } elseif (($floor_name != '' && $status != '') && ($unit_name == '' && $month == '' && $year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('rent.bill_status',$status);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('bill_status', $status)->findall();
            } elseif (($floor_name != '' && $month != '') && ($unit_name == '' && $status == '' && $year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('rent.month',$month);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('month', $month)->findall();
            } elseif (($floor_name != '' && $year != '') && ($unit_name == '' && $status == '' && $month == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('year', $year)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $month != '') && ($status == '' && $year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.month',$month);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('month', $month)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $year != '') && ($status == '' && $month == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('year', $year)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $status != '') && ($year == '' && $month == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.bill_status',$status);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('bill_status', $status)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $status != '' && $month == '') && ($year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.bill_status',$status);
                $builder->where('rent.month',$month);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('bill_status', $status)->Where('month', $month)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $status != '' && $year == '') && ($month == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.bill_status',$status);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('bill_status', $status)->Where('year', $year)->findall();
            } elseif (($unit_name != '' && $floor_name != '' && $month != '' && $year == '') && ($status == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('floors.id',$floor_id);
                $builder->where('units.id',$unit_id);
                $builder->where('rent.month',$month);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('floor_name', $floor_name)->Where('unit_no', $unit_name)->Where('month', $month)->Where('year', $year)->findall();
            } elseif (($month != '' && $year != '') && ($unit_name == '' && $floor_name == '' && $status == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('rent.month',$month);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('month', $month)->Where('year', $year)->findall();
            } elseif (($month != '' && $status != '') && ($unit_name == '' && $floor_name == '' && $year == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('rent.bill_status',$status);
                $builder->where('rent.month',$month);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('month', $month)->Where('bill_status', $status)->findall();
            } elseif (($year != '' && $status != '') && ($unit_name == '' && $floor_name == '' && $month == '')) {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->where('rent.property_id',$property_id);
                $builder->where('rent.bill_status',$status);
                $builder->where('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->Where('year', $year)->Where('bill_status', $status)->findall();
            } else {
                $builder = $this->db->table('rent');
                $builder->select('rent.*,units.unitno as unit_name,floors.floorno as floor_name');
                $builder->join('floors', 'rent.floor_id = floors.id','left');
                $builder->join('units', 'rent.unit_id = units.id','left');
                $builder->orWhere('rent.property_id',$property_id);
                $builder->orWhere('floors.id',$floor_id);
                $builder->orWhere('units.id',$unit_id);
                $builder->orWhere('rent.bill_status',$status);
                $builder->orWhere('rent.month',$month);
                $builder->orWhere('rent.year',$year);
                $query = $builder->get();
                $rents = $query->getResult();
                //$rents = $rent_model->orWhere('floor_name', $floor_name)->orWhere('unit_no', $unit_name)->orWhere('year', $year)->orWhere('month', $month)->orWhere('bill_status', $status)->findall();
            }
            $this->session->set('rent_details', $rents);
            $data['all_rents'] = $rents;
            return view('Modules\Report\Views\admin\report\rent\rent_info_report', $data);
        }
    }
    public function print_rent_report()
    {
        //$property_id=$this->session->get('rs_property_id');

        $all_data = $this->session->get('rent_details');

        // $print_salary_details= $session->has('salary_details');
        $data['all_rents'] = $all_data;
        return view('Modules\Report\Views\admin\report\rent\print_rent_report', $data);
    }

    public function fund_status()
    {
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $fund_model = new Fundmodel();
        $maintenence_model = new Maintenancemodel();

        $maintenences = $maintenence_model->where('property_id',$property_id)->findall();
        $builder = $this->db->table('funds');
        $builder->select('funds.*,owners.image as owner_image');
        $builder->join('owners', 'funds.owner_id = owners.owner_id');
        $builder->where('funds.property_id',$property_id);
        $query = $builder->get();
        $funds = $query->getResult();
        // print_r($funds);die();


        $builder = $this->db->table('maintenances');
        $builder->where('property_id',$property_id);
        $builder->selectSum('mainamount');
        $query = $builder->get();
        $total_maintenences = $query->getResult();

        $builder = $this->db->table('funds');
        $builder->where('property_id',$property_id);
        $builder->selectSum('total_amount');
        $query = $builder->get();
        $total_fund = $query->getResult();

        $this->session->set('total_fund', $total_fund);
        $this->session->set('total_maintenences', $total_maintenences);
        $this->session->set('funds', $funds);
        $this->session->set('maintenences', $maintenences);

        $data['funds_total'] = $total_fund;
        $data['maintenences_total'] = $total_maintenences;
        $data['funds'] = $funds;
        $data['maintenences'] = $maintenences;
        return view('Modules\Report\Views\admin\report\fund\fund_status', $data);
    }

    public function print_fund_status()
    {
        $property_id=$this->session->get('rs_property_id');

        $total_fund = $this->session->get('total_fund');
        $total_maintenences = $this->session->get('total_maintenences');
        $funds = $this->session->get('funds');
        $maintenences = $this->session->get('maintenences');

        $data['funds_total'] = $total_fund;
        $data['maintenences_total'] = $total_maintenences;
        $data['funds'] = $funds;
        $data['maintenences'] = $maintenences;
        // $print_salary_details= $session->has('salary_details');
        return view('Modules\Report\Views\admin\report\fund\print_fund_status', $data);
    }

    public function bill_report()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        return view('Modules\Report\Views\admin\report\bill_deposit\bill_report', $data);
    }

    public function bill_info()
    {
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $billdiposit_model = new BilldipositModel();

        $date = $this->request->getVar('date');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');

        //echo $date.'//'.$month.'//'.$Year;die();
        if (empty($date) && empty($month) && empty($year)) {

            return redirect()->to(base_url('admin/billreport'))->with('faild', 'Please choose at least one field');
        } else {
            if (($date != '' && $month != '') && $year == '') {
                $bills = $billdiposit_model->where('property_id',$property_id)->Where('bill_date', $date)->Where('month', $month)->findall();
            } elseif (($date != '' && $year != '') && $month == '') {
                $bills = $billdiposit_model->where('property_id',$property_id)->Where('bill_date', $date)->Where('year', $year)->findall();
            } elseif (($month != '' && $year != '') && $date == '') {
                $bills = $billdiposit_model->where('property_id',$property_id)->Where('month', $month)->Where('year', $year)->findall();
            } else {
                $bills = $billdiposit_model->where('property_id',$property_id)->Where('bill_date', $date)->orWhere('year', $year)->orWhere('month', $month)->findall();
            }

            $this->session->set('bills', $bills);

            $data['bills'] = $bills;
            return view('Modules\Report\Views\admin\report\bill_deposit\bill_info', $data);
        }
    }

    public function print_bill_report()
    {
        $property_id=$this->session->get('rs_property_id');

        $bills = $this->session->get('bills');

        $data['bills'] = $bills;
        // $print_salary_details= $session->has('salary_details');
        return view('Modules\Report\Views\admin\report\bill_deposit\print_bill_report', $data);
    }


    public function salary_report()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $employee_model = new Employeemodel();
        $employees = $employee_model->where('property_id',$property_id)->findall();
        $data['employees'] = $employees;
        return view('Modules\Report\Views\admin\report\salary\salary_report', $data);
    }
    public function salary_info()
    {
        helper('property');
        $property_id=$this->session->get('rs_property_id');

        $employee_salary_model = new Employeesalarymodel();

        $employee_id = $this->request->getVar('employee_id');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');

        if (empty($employee_id) && empty($month) && empty($year)) {

            return redirect()->to(base_url('admin/salaryreport'))->with('faild', 'Please choose at least one field');
        } else {
            if (($employee_id != '' && $month != '') && $year == '') {
                $employees = $employee_salary_model->where('property_id',$property_id)->Where('id', $employee_id)->Where('month', $month)->orWhere('month', $month)->findall();
            } elseif (($employee_id != '' && $year != '') && $month == '') {
                $employees = $employee_salary_model->where('property_id',$property_id)->Where('id', $employee_id)->Where('year', $year)->findall();
            } elseif (($month != '' && $year != '') && $employee_id == '') {
                $employees = $employee_salary_model->where('property_id',$property_id)->Where('month', $month)->Where('year', $year)->findall();
            } else {
               // echo $employee_id;die();
                $employees = $employee_salary_model->where('property_id',$property_id)->Where('employee_id', $employee_id)->orWhere('year', $year)->orWhere('month', $month)->findall();
            }

            // $last_query_salary_report= $this->db->getLastQuery();
            $this->session->set('salary_details', $employees);
            //echo $last_query_salary_report;die();

            $data['employees'] = $employees;
            return view('Modules\Report\Views\admin\report\salary\employee_salary_info', $data);
        }
    }
    public function print_salary_report()
    {
        $property_id=$this->session->get('rs_property_id');

        $all_data = $this->session->get('salary_details');

        // $print_salary_details= $session->has('salary_details');
        $data['employees'] = $all_data;
        return view('Modules\Report\Views\admin\report\salary\print_salary_report', $data);
    }

    //////// ----shukriti end----
    public function rentedReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $data= array();
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('tenantReportValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $tenantStatus = $this->request->getVar('te_status');

                $builder = $this->db->table('tenants');
                $builder->select('tenants.*, floors.floorno');
                $builder->join('floors', 'tenants.floorno = floors.id');
                $builder->where('testatus', $tenantStatus);
                $builder->where('tenants.property_id',$property_id);
                $query = $builder->get();
                $results = $query->getResultArray();

                //print_r();die{}

                if (empty($results)) {
                    $results = null;
                } else {
                    $data['getTenants'] = $results;
                }
                //print_r($data['getTenants']);die();
                $this->session->set('getTenants', $results);

                return view('Modules\Report\Views\admin\report\tenant\rented-info', $data);
            }
        }

        return view('Modules\Report\Views\admin\report\tenant\rented-report',$data);
    }
    public function rentedPrintReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $data['getTenants'] = $this->session->get('getTenants');
        return view('Modules\Report\Views\admin\report\tenant\rentedprint-info', $data);
    }

    public function visitorReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        

        if ($this->request->getMethod() == 'post') {

            $date = $this->request->getVar('visi_date');
            $month = $this->request->getVar('visi_month');
            $year = $this->request->getVar('visi_year');

            if ($date == '' && $month == '' && $year == '') {
                $data['error'] = '<div class="alert alert-warning text-center">Please Select One Or More Field!</div>';
            } else {
                if ($date != '') {
                    $date = $this->request->getVar('visi_date');

                    $builder = $this->db->table('visitors');
                    $builder->select('visitors.*,floors.floorno, units.unitno');
                    $builder->join('floors', 'visitors.floorid = floors.id');
                    $builder->join('units', 'visitors.unitid = units.unitno');
                    $builder->where('visientrydate', $date);
                    $builder->where('visitors.property_id',$property_id);
                    $builder->orderBy('visientrydate', 'ASC');
                    $query = $builder->get();

                    // echo $this->db->getLastQuery();

                    foreach ($query->getResultArray() as $row) {
                        $data['getVisitors'][] = $row;
                    }
                    if(isset($data['getVisitors'])){
                        $this->session->set('getVisitors', $data['getVisitors']);
                        $this->session->set('date', $date);
                    }

                    return view('Modules\Report\Views\admin\report\visitor\visitor-info', $data);
                } else {
                    if ($month == '' || $year == '') {
                        $data['error'] = '<div class="alert alert-danger text-center">Please Select Month And Year Field!</div>';
                    } else {
                        $month = $this->request->getVar('visi_month');
                        $year = $this->request->getVar('visi_year');

                        $firstValue = $year . '-' . $month . '-' . '01';
                        $lastValue = $year . '-' . $month . '-' . '31';

                        $builder = $this->db->table('visitors');
                        $builder->select('visitors.*,floors.floorno, units.unitno');
                        $builder->join('floors', 'visitors.floorid = floors.id');
                        $builder->join('units', 'visitors.unitid = units.unitno');
                        $builder->where('visientrydate >=', $firstValue);
                        $builder->where('visientrydate <=', $lastValue);
                        $builder->where('visitors.property_id',$property_id);
                        $builder->orderBy('visientrydate', 'ASC');
                        $query = $builder->get();

                        // echo $this->db->getLastQuery();

                        foreach ($query->getResultArray() as $row) {
                            $data['getVisitors'][] = $row;
                        }
                        if(isset($data['getVisitors'])){
                            $this->session->set('getVisitors', $data['getVisitors']);
                            $this->session->set('month', $month);
                            $this->session->set('year', $year);
                        }

                        return view('Modules\Report\Views\admin\report\visitor\visitor-info', $data);
                    }
                }
            }
        }
        
        return view('Modules\Report\Views\admin\report\visitor\visitor-report', $data);
    }

    public function visitorPrintReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $date = $this->session->get('date');
        $month = $this->session->get('month');
        $year = $this->session->get('year');
        $getVisitors = $this->session->get('getVisitors');
        
        $data = [
            'date' => $date,
            'month' => $month,
            'year' => $year,
            'getVisitors' => $getVisitors,
        ];
        return view('Modules\Report\Views\admin\report\visitor\visitorprint-info', $data);

    }

    public function complainReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $data = array();

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        if ($this->request->getMethod() == 'post') {

            $date = $this->request->getVar('com_date');
            $month = $this->request->getVar('com_month');
            $year = $this->request->getVar('com_year');

            if ($date == '' && $month == '' && $year == '') {
                $data['error'] = '<div class="alert alert-warning text-center">Please Select One Or More Field!</div>';
            } else {
                if ($date != '') {

                    $date = $this->request->getVar('com_date');

                    $data['getComplains'] = $complain->where('property_id',$property_id)->where('comdate', $date)->findAll();
                    $this->session->set('getComplains', $data['getComplains']);

                    return view('Modules\Report\Views\admin\report\complain\complain-info', $data);
                } else {
                    if ($month == '' || $year == '') {
                        $data['error'] = '<div class="alert alert-danger text-center">Please Select Month And Year Field!</div>';
                    } else {
                        $month = $this->request->getVar('com_month');
                        $year = $this->request->getVar('com_year');

                        $firstValue = $year . '-' . $month . '-' . '01';
                        $lastValue = $year . '-' . $month . '-' . '31';

                        $data['getComplains'] = $complain->where('property_id',$property_id)->where('comdate >=', $firstValue)
                            ->where('comdate <=', $lastValue)
                            ->orderBy('comdate', 'ASC')
                            ->findAll();

                        $this->session->set('getComplains', $data['getComplains']);

                        return view('Modules\Report\Views\admin\report\complain\complain-info', $data);
                    }
                }
            }
        }

        return view('Modules\Report\Views\admin\report\complain\complain-report', $data);
    }

    public function complainPrintReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $data['getComplains'] = $this->session->get('getComplains');

        //print_r($data['getComplains']);die();

        return view('Modules\Report\Views\admin\report\complain\complainprint-info', $data);
    }

    public function unitReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $data = array();

        if ($this->request->getMethod() == 'post') {
           
                if (!$this->validate('unitReportValidate')) {
                    $data['validation'] = $this->validator;
                } else {
                    $unitStatus = $this->request->getVar('unit_status');
                    

                    $builder = $this->db->table('tenants');
                    $builder->select('tenants.testatus, tenants.unitno, floors.floorno');
                    $builder->join('floors', 'tenants.floorno = floors.id');
                    $builder->where('testatus', $unitStatus);
                    $builder->where('tenants.property_id',$property_id);
                    $query = $builder->get();
        
                    // echo $this->db->getLastQuery();
        
                    foreach ($query->getResultArray() as $row) {
                        $data['getUnits'][] = $row;
                    }
                    if(empty($data['getUnits'])){
                        $data['getUnits']=null;
                    }
                    $this->session->set('getUnits', $data['getUnits']);
                    return view('Modules\Report\Views\admin\report\unit\unit-info', $data);
                    
                }
           
        }

        return view('Modules\Report\Views\admin\report\unit\unit-report', $data);
    }

    public function unitPrintReport()
    {
        $property_id=$this->session->get('rs_property_id');

        $data['getUnits'] = $this->session->get('getUnits');
        if(empty($data['getUnits'])){
            $data['getUnits']=null;
        }

        return view('Modules\Report\Views\admin\report\unit\unitprint-info', $data);
    }



    
/*===============================================================
                        Report Pdf Section Controller
 ================================================================= */
 public function rentInfoPdf()
 {
     $rents = $this->session->get('rent_details');
     $data['all_rents'] = $rents;

     $html = view('Modules\Report\Views\admin\report\rent\pdf_rent_report', $data);

     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     $pdf->writeHTML($html);
     $this->response->setContentType('application/pdf');
     $pdf->Output('rentinfo.pdf', 'I');
 }

 public function rentedPdf()
 {
     $tenants = $this->session->get('getTenants');
     $data['getTenants'] = $tenants;

     $html = view('Modules\Report\Views\admin\report\tenant\rented_pdf', $data);

     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     // $pdf->writeHTML($html);
     $pdf->writeHTML($html, true, false, false, false, '');
     $this->response->setContentType('application/pdf');
     $pdf->Ln();
     $pdf->Output('tenant.pdf', 'I');
 }

 public function visitorPdf()
 {
     $data['getVisitors'] = $this->session->get('getVisitors');
            
     $html = view('Modules\Report\Views\admin\report\visitor\visitor-pdf', $data);
      
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     // $pdf->writeHTML($html);
     $pdf->writeHTML($html, true, false, false, false, '');
     $this->response->setContentType('application/pdf');
     $pdf->Ln();
     $pdf->Output('visitor.pdf', 'I');
 }

 public function complainPdf()
 {
     $data['getComplains'] = $this->session->get('getComplains');
     $html = view('Modules\Report\Views\admin\report\complain\complain-pdf', $data);
      
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     $pdf->writeHTML($html, true,false, false, false, '');
     $this->response->setContentType('application/pdf');
     $pdf->Output('complain.pdf', 'I');
 }

 public function unitPdf()
 {
     $data['getUnits'] = $this->session->get('getUnits');
     $html = view('Modules\Report\Views\admin\report\unit\unit-pdf', $data);
      
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     $pdf->writeHTML($html, true,false, false, false, '');
     $this->response->setContentType('application/pdf');
     $pdf->Output('unit.pdf', 'I');
 }

 public function fundStatusPdf()
 {
     $total_fund = $this->session->get('total_fund');
     $total_maintenences = $this->session->get('total_maintenences');
     $funds = $this->session->get('funds');
     $maintenences = $this->session->get('maintenences');

     $data['funds_total'] = $total_fund;
     $data['maintenences_total'] = $total_maintenences;
     $data['funds'] = $funds;
     $data['maintenences'] = $maintenences;

     $html = view('Modules\Report\Views\admin\report\fund\fund_pdf', $data);
      
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     $pdf->writeHTML($html, true,false, false, false, '');
     $this->response->setContentType('application/pdf');
     $pdf->Output('fundstatus.pdf', 'I');
 }

 public function billInfoPdf()
 {
     $bills = $this->session->get('bills');
     $data['bills'] = $bills;

     $html = view('Modules\Report\Views\admin\report\bill_deposit\bill_pdf', $data);
      
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     $pdf->writeHTML($html);
     $this->response->setContentType('application/pdf');
     $pdf->Output('billinfo.pdf', 'I');
 }

 public function salaryInfoPdf()
 {
     $all_data = $this->session->get('salary_details');
     $data['employees'] = $all_data;

     $html = view('Modules\Report\Views\admin\report\salary\salary_pdf', $data);
      
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->AddPage();
     $pdf->writeHTML($html);
     $this->response->setContentType('application/pdf');
     $pdf->Output('salaryreport.pdf', 'I');
 }

}
