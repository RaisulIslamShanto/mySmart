<?php

namespace Modules\Home\Controllers;

use App\Controllers\BaseController;
use Modules\User\Models\User;
use Modules\Setting\Models\Popertymodel;
use App\Models\Ownermodel;
use Modules\Floor\Models\Floormodel;
use App\Models\Unitmodel;
use App\Models\Tenantmodel;
use App\Models\Rentmodel;
use App\Models\Ownerutility;
use App\Models\Maintenancemodel;
use App\Models\Committeemodel;
use Modules\Employee\Models\Employeemodel;
use App\Models\Fundmodel;
use App\Models\Employeesalarymodel;
use Modules\Complain\Models\Complainmodel;
use Modules\Visitor\Models\Visitormodel;
use Modules\Setting\Models\Rolemodel;
use Modules\Super_admin\Models\Pakagemodel;
use Modules\LoginAuth\Models\Paymentmodel;


class Dashboardcontroller extends BaseController
{
    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    /**
     * This method index used for dashboard all data to show like all sections info , graphs etc.
     * Also define path for separates users like admin ,landlord, Property manager etc.
     * Method - get
     */
    public function index($property_id = null)
    {

        // $session = session();

        if(is_numeric($property_id)){

            $user_id= $this->session->get('userId');
            $property_model = new Popertymodel();
            $user_model = new User();

            $property_user= $property_model->where('id',$property_id)->first();
            //$user= $user_model->where('id',$property_user['owner'])->first();

            $this_user= $user_model->where('id',$user_id)->first();

            if($property_user['company_id']==$this_user['company_id']){
                $this->session->set('rs_property_id',$property_id);
            }else{
                if($this_user['type'] == 2){

                    $user= $user_model->where('id',$user_id)->first();
                    $properties= $property_model->where('company_id',$user['company_id'])->findall();
                    $data['properties']= $properties;
                    $data['type']= $this_user['type'];
                    return view('admin/user/poperty-list',$data);

                }elseif($this_user['type'] == 1){
                    $user= $user_model->where('id',$user_id)->first();
                    $properties= $property_model->where('company_id',$user['company_id'])->first();
                    $this->session->set('rs_property_id',$properties['id']);

                }

            }

        }

        $floor_model= new Floormodel();

        $visitor_model= new Visitormodel();
        $complain_model= new Complainmodel();

        $property_id=$this->session->get('rs_property_id');


        $builder = $this->db->table('floors');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_floors = $query->getResultArray();
        foreach($total_floors as $total_floor){
            $data['total_floors']=$total_floor['id'];
        }

        $builder = $this->db->table('units');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_units = $query->getResultArray();
        foreach($total_units as $total_unit){
            $data['total_units']=$total_unit['id'];
        }

        $builder = $this->db->table('owners');
        $builder->selectCount('owner_id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_owners = $query->getResultArray();
        foreach($total_owners as $total_owner){
            $data['total_owners']=$total_owner['owner_id'];
        }


        $builder = $this->db->table('tenants');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_tenants = $query->getResultArray();
        foreach($total_tenants as $total_tenant){
            $data['total_tenants']=$total_tenant['id'];
        }


        $builder = $this->db->table('employees');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_employees = $query->getResultArray();
        foreach($total_employees as $total_employee){
            $data['total_employees']=$total_employee['id'];
        }


        $builder = $this->db->table('committees');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_committees = $query->getResultArray();
        foreach($total_committees as $total_committee){
            $data['total_committees']=$total_committee['id'];
        }

        $builder = $this->db->table('rent');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_rents = $query->getResultArray();
        foreach($total_rents as $total_rent){
            $data['total_rents']=$total_rent['id'];
        }

        $builder = $this->db->table('maintenances');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_maintenances = $query->getResultArray();
        foreach($total_maintenances as $total_maintenance){
            $data['total_maintenances']=$total_maintenance['id'];
        }

        $builder = $this->db->table('funds');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_funds = $query->getResultArray();
        foreach($total_funds as $total_fund){
            $data['total_funds']=$total_fund['id'];
        }

        $builder = $this->db->table('owners_utility');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_o_utilitys = $query->getResultArray();
        foreach($total_o_utilitys as $total_o_utility){
            $data['total_o_utilitys']=$total_o_utility['id'];
        }

        $builder = $this->db->table('employee_salary');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_e_salaries = $query->getResultArray();
        foreach($total_e_salaries as $total_e_salary){
            $data['total_e_salaries']=$total_e_salary['id'];
        }

        $builder = $this->db->table('complains');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_complains = $query->getResultArray();
        foreach($total_complains as $total_complain){
            $data['total_complains']=$total_complain['id'];
        }

        $builder = $this->db->table('maintenances');
        //$builder->select('sum(mainamount) as total_cost');
        $year=date("Y");
        $builder->select("*");
        $builder->where('mainyear',$year);
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $maintenance_costs = $query->getResultArray();
        //echo "<pre>";print_r($maintenance_costs);die();
        $cost_by_year=array();
        $year_maintenance_costs=0;
        $half_year_maintenance_costs=0;
        $cost_by_year[1]=0;
        $cost_by_year[2]=0;
        $cost_by_year[3]=0;
        $cost_by_year[4]=0;
        $cost_by_year[5]=0;
        $cost_by_year[6]=0;
        $cost_by_year[7]=0;
        $cost_by_year[8]=0;
        $cost_by_year[9]=0;
        $cost_by_year[10]=0;
        $cost_by_year[11]=0;
        $cost_by_year[12]=0;

        foreach($maintenance_costs as  $maintenance_cost){
            if($maintenance_cost['mainmonth']<=6){
                $half_year_maintenance_costs=$half_year_maintenance_costs+$maintenance_cost['mainamount'];
            }
            $year_maintenance_costs=$year_maintenance_costs+$maintenance_cost['mainamount'];
            if($maintenance_cost['mainmonth']==1){
                $cost_by_year[1] = $cost_by_year[1] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==2){
                $cost_by_year[2] = $cost_by_year[2] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==3){
                $cost_by_year[3] = $cost_by_year[3] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==4){
                $cost_by_year[4] = $cost_by_year[4] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==5){
                $cost_by_year[5] = $cost_by_year[5] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==6){
                $cost_by_year[6] = $cost_by_year[6] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==7){
                $cost_by_year[7] = $cost_by_year[7] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==8){
                $cost_by_year[8] = $cost_by_year[8] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==9){
                $cost_by_year[9] = $cost_by_year[9] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==10){
                $cost_by_year[10] = $cost_by_year[10] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==11){
                $cost_by_year[11] = $cost_by_year[11] + $maintenance_cost['mainamount'];
            }
            if($maintenance_cost['mainmonth']==12){
                $cost_by_year[12] = $cost_by_year[12] + $maintenance_cost['mainamount'];
            }
        }

        $data['maintenance_costs']=$cost_by_year;
        $data['year_maintenance_costs']=$year_maintenance_costs;
        $data['half_year_maintenance_costs']=$half_year_maintenance_costs;

        $builder = $this->db->table('rent');
        $year=date("Y");
        $builder->select("*");
        $builder->where('year',$year);
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $all_rents = $query->getResultArray();

        $rent_by_year=array();
        $year_rents=0;
        $half_year_rents=0;
        $rent_by_year[1]=0;
        $rent_by_year[2]=0;
        $rent_by_year[3]=0;
        $rent_by_year[4]=0;
        $rent_by_year[5]=0;
        $rent_by_year[6]=0;
        $rent_by_year[7]=0;
        $rent_by_year[8]=0;
        $rent_by_year[9]=0;
        $rent_by_year[10]=0;
        $rent_by_year[11]=0;
        $rent_by_year[12]=0;

        foreach($all_rents as  $rent){
            if($rent['month']<=6){
                $half_year_rents= $half_year_rents+$rent['total_rent'];
            }
           $year_rents=$year_rents+$rent['total_rent'];
            if($rent['month']==1){
                $rent_by_year[1] = $rent_by_year[1] + $rent['total_rent'];
            }
            if($rent['month']==2){
                $rent_by_year[2] = $rent_by_year[2] + $rent['total_rent'];
            }
            if($rent['month']==3){
                $rent_by_year[3] = $rent_by_year[3] + $rent['total_rent'];
            }
            if($rent['month']==4){
                $rent_by_year[4] = $rent_by_year[4] + $rent['total_rent'];
            }
            if($rent['month']==5){
                $rent_by_year[5] = $rent_by_year[5] + $rent['total_rent'];
            }
            if($rent['month']==6){
                $rent_by_year[6] = $rent_by_year[6] + $rent['total_rent'];
            }
            if($rent['month']==7){
                $rent_by_year[7] = $rent_by_year[7] + $rent['total_rent'];
            }
            if($rent['month']==8){
                $rent_by_year[8] = $rent_by_year[8] + $rent['total_rent'];
            }
            if($rent['month']==9){
                $rent_by_year[9] = $rent_by_year[9] + $rent['total_rent'];
            }
            if($rent['month']==10){
                $cost_by_year[10] = $rent_by_year[10] + $rent['total_rent'];
            }
            if($rent['month']==11){
                $rent_by_year[11] = $rent_by_year[11] + $rent['total_rent'];
            }
            if($rent['month']==12){
                $rent_by_year[12] = $rent_by_year[12] + $rent['total_rent'];
            }
        }
        $data['all_rents']=$rent_by_year;
        $data['year_rents']=$year_rents;
        $data['half_year_rents']=$half_year_rents;


        $builder = $this->db->table('maintenances');
        $this_month=date("m");
        $this_year=date("Y");

        $builder->select("*");
        $builder->where('MONTH(created_at)',$this_month);
        $builder->where('YEAR(created_at)',$this_year);
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $maintenance_costs_month = $query->getResultArray();

        $maintenance_costs_weeks['week1']=0;
        $maintenance_costs_weeks['week2']=0;
        $maintenance_costs_weeks['week3']=0;
        $maintenance_costs_weeks['week4']=0;
        $maintenance_costs_weeks['week5']=0;
        $maintenance_costs_this_month = 0;

        foreach($maintenance_costs_month as $maintenance_costs_week){

        $maintenance_costs_this_month =$maintenance_costs_this_month+$maintenance_costs_week['mainamount'];

        $date=date_create($maintenance_costs_week['created_at']);
        $day = date_format($date,"d");

        if($day<=6){
          $maintenance_costs_weeks['week1']=$maintenance_costs_weeks['week1']+$maintenance_costs_week['mainamount'];
        }else if($day>6 && $day<=13){
          $maintenance_costs_weeks['week2']=$maintenance_costs_weeks['week2']+$maintenance_costs_week['mainamount'];
          }else if($day>14 && $day<=20){
          $maintenance_costs_weeks['week3']=$maintenance_costs_weeks['week3']+$maintenance_costs_week['mainamount'];
          }else if($day>21 && $day<=27){
          $maintenance_costs_weeks['week4']=$maintenance_costs_weeks['week4']+$maintenance_costs_week['mainamount'];
          }else{
          $maintenance_costs_weeks['week5']=$maintenance_costs_weeks['week5']+$maintenance_costs_week['mainamount'];
          }
        }
         //echo "<pre>";print_r($maintenance_costs_weeks);die();
         $data['maintenance_costs_weeks']=$maintenance_costs_weeks;
         $data['maintenance_costs_this_month']=$maintenance_costs_this_month;




        $builder = $this->db->table('rent');
        $this_month=date("m");
        $this_year=date("Y");
        $builder->select("*");
        $builder->where('MONTH(bill_paid_date)',$this_month);
        $builder->where('YEAR(bill_paid_date)',$this_year);
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $all_rents_month = $query->getResultArray();

        $all_rent_weeks['week1']=0;
        $all_rent_weeks['week2']=0;
        $all_rent_weeks['week3']=0;
        $all_rent_weeks['week4']=0;
        $all_rent_weeks['week5']=0;
        $rent_all_this_month=0;

        foreach($all_rents_month as $all_rents_week){

        $rent_all_this_month = $rent_all_this_month + $all_rents_week['total_rent'];

        $date=date_create($all_rents_week['bill_paid_date']);
        $day = date_format($date,"d");

        if($day<=6){
          $all_rent_weeks['week1']=$all_rent_weeks['week1']+$all_rents_week['total_rent'];
          }else if($day>6 && $day<=13){
          $all_rent_weeks['week2']=$all_rent_weeks['week2']+$all_rents_week['total_rent'];
          }else if($day>14 && $day<=20){
          $all_rent_weeks['week3']=$all_rent_weeks['week3']+$all_rents_week['total_rent'];
          }else if($day>21 && $day<=27){
          $all_rent_weeks['week4']=$all_rent_weeks['week4']+$all_rents_week['total_rent'];
          }else if($day>27 && $day<=31){
          $all_rent_weeks['week5']=$all_rent_weeks['week5']+$all_rents_week['total_rent'];
          }
        }

        //echo "<pre>";print_r($all_rent_weeks);die();
        $data['all_rent_weeks']=$all_rent_weeks;
        $data['rent_all_this_month']=$rent_all_this_month;



        $data['complains'] = $complain_model->where('property_id', $property_id)->orderBy('id', 'desc')->findAll(5);
        $data['visitors'] = $visitor_model->where('property_id', $property_id)->orderBy('id', 'desc')->findAll(5);

        return view('Modules\Home\Views\admin\home\home',$data);

    }
    /**
     * End index
     */


     /**
     * This method visitorDetails get and view Indivisual visitor details.
     * Method - get
     * It has one perameter "$id" is visitor id
     */
    public function visitorDetails($id)
    {
        $data['uri'] = $this->request->uri->getSegments();

        $property_id=$this->session->get('rs_property_id');

        $visitor_model = new Visitormodel();
        $floor_model = new Floormodel();

        $visitor = $visitor_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['floor']= $floor_model->where('property_id',$property_id)->where('id', $visitor['floorid'])->first();
        $data['visitor']= $visitor;


        return view('admin/home/visitor_show', $data);
    }
    /**
     * End visitorDetails
     */


     /**
     * This method complainDetails get and view Indivisual complain details.
     * Method - get
     * It has one perameter "$id" is complain id.
     */
    public function complainDetails($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $complain_model = new Complainmodel();
        $employee_model = new Employeemodel();

        $complain = $complain_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['employee']= $employee_model->where('property_id',$property_id)->where('id', $complain['comass'])->first();
        $data['complain']= $complain;


        return view('admin/home/complain_show', $data);

    }
    /**
     * End complainDetails
     */


    /**
     * This method getNotification get and view 5 notification in notification bar per view more click.
     * It is a ajax call
     * Method - get
     */
    public function getNotification()
    {
        $data= notification();
        echo json_encode($data);

    }
    /**
     * End getNotification
     */


    /**
     * This method notificationView get and view all notification data in a new page for each indivisual user.
     * It takes user id by session get notification for user.
     * Method - get
     */
    public function notificationView()
    {
        $page=1;
        if($this->request->getVar('page')>0){
            $page=$this->request->getVar('page');
            //echo $page;die();
        }
        $pager = \Config\Services::pager();
        $session = session();
        $notify= new \Modules\Master\Models\notifymodel();
        $user_model = new \Modules\User\Models\User();
        $role_model = new \Modules\Setting\Models\Rolemodel();

        $property_id=$session->get('rs_property_id');
        $user_id=$session->get('userId');

        $super_admin_role = $role_model->where('role_name','admin')->first();
        $employee_role = $role_model->where('role_name','employee')->first();
        $tenent_role = $role_model->where('role_name','Tenant')->first();
        $this_user = $user_model->where('id',$user_id)->first();




        if($this_user['user_type']==$super_admin_role['id']){
                    $builder = $this->db->table('admin_notification');
                    $builder->join('complains', 'complains.id = admin_notification.issue_id','left');
                    $builder->where('admin_notification.issue_name','Complain');
                    $builder->like('admin_notification.who_will_get','%1%');
                    $builder->limit(10,($page-1)*10);


                    $query2 = $builder->get();
                    $notification = $query2->getResultArray();
                    $total = count($notification);

        }else if($this_user['user_type']==$employee_role['id']){
                    $builder = $this->db->table('admin_notification');
                    $builder->join('complains', 'complains.id = admin_notification.issue_id','left');
                    $builder->where('admin_notification.issue_name','Complain');
                    $builder->like('admin_notification.who_will_get','%2%');
                    $builder->limit(10,($page-1)*10);


                    $query2 = $builder->get();
                    $notification = $query2->getResultArray();
                    $total = count($notification);

        }else if($this_user['user_type']==$tenent_role['id']){

                    $builder = $this->db->table('admin_notification');
                    $builder->join('complains', 'complains.id = admin_notification.issue_id','left');
                    $builder->where('admin_notification.issue_name','Complain');
                    $builder->like('admin_notification.who_will_get','%3%');
                    $builder->limit(10,($page-1)*10);

                    $query2 = $builder->get();
                    $notification = $query2->getResultArray();
                    //echo $this->db->getLastQuery();die();
                    $total = count($notification);

        }


        $data['links']=$pager->makeLinks($page, 10, 80);

        $data['notifications']= $notification;
        $data['total_data']= $total;
        // $data['notifications']= notification();
        return view('Modules\Home\admin\home\notification_view', $data);

    }
    /**
     * End notificationView
     */


     /**
     * This method updateNotification update notification which are already seen.
     * Method - get
     */
    public function updateNotification()
    {
        $notify_model= new \Modules\Master\Models\notifymodel();

        $notify_id = $this->request->getVar('notify_id');

        $session = session();
        $user_type=$session->get('user_type');
        if($user_type==14){
            $data['admin_status']=0;
        }elseif($user_type==9){
            $data['emp_status']=0;
        }elseif($user_type==14){
            $data['tenant_status']=0;
        }

        $builder = $this->db->table('admin_notification');
        $builder->where('notify_id',$notify_id);
        $builder->update($data);

        echo "success";

    }
    /**
     * End updateNotification
     */

     /**
     * This method profile get and view user information with details.
     * Method - get
     */
    public function profile()
    {
        $session = session();
        $user_model = new User();
        $user_id= $session->get('userId');
        $this_user= $user_model->where('id',$user_id)->first();
        $role_model = new Rolemodel();
        $roles = $role_model->where('company_id',$this_user['company_id'])->orwhere('asName','tenant')->orwhere('asName','employee')->findall();
        $data['roles'] = $roles;



        $user = $user_model->where('company_id',$this_user['company_id'])->find($user_id);
        $data['user']=$user;
        return view('Modules\Home\admin\home\profile', $data);

    }
    /**
     * End profile
     */

     /**
     * This method myPackage get package information that which package already I have.
     * Method - get
     */
    public function myPackage()
    {
        $session = session();
        $user_model = new User();
        $package_model = new Pakagemodel();
        $user_id= $session->get('userId');
        $this_user= $user_model->where('id',$user_id)->first();

        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('pakage', 'users.package_id = pakage.id','left');
        $builder->where('users.id',$user_id);
        $query = $builder->get();
        $package = $query->getResult();

        $data['package']=$package;
        return view('Modules\Home\admin\home\my_package', $data);

    }
    /**
     * End profile
     */


     /**
     * This method editPackage get and view all package for user to choose one.
     * It is call when any user wants to change package.
     * Method - get
     */
    public function editPackage()
    {
        $user_model = new User();
        $user_id = $this->session->get('userId');
        $getUser = $user_model->where('id',$user_id)->first();

        $package_model = new Pakagemodel();
        $data['user_id'] = $getUser['id'];
        $data['packages'] = $package_model->where('status',1)->findall();
        $data["user"]=  $getUser;

        if ($this->request->getMethod() == 'post') {
            $package_id=$this->request->getVar('package_id');
            $owner_id=$this->request->getVar('owner_id');

            return redirect()->to(base_url('/admin/make_payment/'.$package_id.'/'.$owner_id));
        }

        return view('Modules\Home\admin\home\change_package',$data);
    }
    /**
     * End profile
     */


     /**
     * This method makePayment shows payment type for user to choose a type for payment.
     * Method - get
     * It has two perameter one is "$package_id" which package user already selected.
     * Another perameter is "$owner_id" this is user id.
     */
    public function makePayment($package_id,$owner_id)
    {

        $package_model = new Pakagemodel();

        $data['package'] = $package_model->where('id',$package_id)->first();

        $data['owner_id']=$owner_id;

        return view('Modules\Home\admin\home\payment_select',$data);

    }
    /**
     * End profile
     */


     /**
     * This method changePaymentConfirm changes the package and update to it in a database.
     * It gets payment id from stripe using API.
     * Method - get
     * It has four perameter first is perameter is "$owner_id" this is user id.
     * Second perameter is "$amount" that how much amount user already payment.
     * Third perameter is "$duration" for limits of time of that package.
     * Forth perameter is "$package_id" which package user already selected to update.
     * And last one is "$session_id" send by stripe for payment.
     */
    public function curl_del($path){
        $ch = curl_init();

        curl_setopt_array($ch, array(
          CURLOPT_URL => $path,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "DELETE",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".STRIPE_SECRET_KEY,
            "Content-Type: application/json"
          ),
        ));

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $result;
    }

    public function changePaymentConfirm($owner_id , $amount , $duration, $package_id , $session_id)
    {
        $payment_model= new Paymentmodel();
        $user_model = new User();

        $page_data['sessionId'] = $session_id;

        $paymentsinfo = $payment_model->where(['owner_id'=>$owner_id,'payment_by'=>'stripe'])->findAll();
        if($paymentsinfo){
            foreach($paymentsinfo as $paymentinfo){
                $path = "https://api.stripe.com/v1/subscriptions/".$paymentinfo['subscription_id'];
                $this->curl_del($path);
            }
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.stripe.com/v1/checkout/sessions/".$session_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".STRIPE_SECRET_KEY,
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response);
        $amount = $result->amount_total / 100;

        $data['payment_status'] = "completed";
        $data['owner_id'] = $owner_id;
        $data['payment_by'] = "stripe";
        $data['amount'] = $amount;
        $data['transaction_id'] = $result->id;
        $data['payment_date'] = date("Y-m-d");
        $data['details'] = json_encode($result);
        $data['customer_id'] = $result->customer;
        $data['package_id'] = $package_id;
        $data['subscription_id'] = $result->subscription;
        $date = date('Y-m-d');
        $date = date('Y-m-d', strtotime('+'.$duration.' month', strtotime($date)));
        $data['payment_expire_date'] = $date;
        $insert = $payment_model->save($data);
        if($insert){
            $package_model = new Pakagemodel();
            $package = $package_model->where('id',$package_id)->first();
            if($package['property_limit'] == 1){
                $datas['type']=1;
            }else{
                $datas['type']=2;
            }
            $datas['package_id']=$package_id;
            $update = $user_model->update($owner_id,$datas);
            return redirect()->to(base_url('/admin/mypackage'))->with('success', 'Payment Successfuly !!');
        }
    }
    /**
     * End changePaymentConfirm
     */
}
