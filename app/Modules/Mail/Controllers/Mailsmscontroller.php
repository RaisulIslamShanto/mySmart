<?php

namespace Modules\Mail\Controllers;

use App\Controllers\BaseController;
use Modules\Mail\Models\Mailsmsmodel;
use Modules\Employee\Models\Employeemodel;
use Modules\Tenant\Models\Tenantmodel;
use Modules\Owner\Models\Ownermodel;

class Mailsmscontroller extends BaseController
{
    /**
     * This method makePayment get & shows all mail and sms formats.
     * Method - get
     */
    public function index()
    {
        $mailSms = new Mailsmsmodel();
        $tenant = new Tenantmodel();
        $employee = new Employeemodel();
        $owner = new Ownermodel();

        $alldata = $mailSms->findAll();

        foreach ($alldata as $key => $mailData) {

            $mailTenant = $mailData['mailtenant'];

            if ($mailTenant != '') {
                if ($mailTenant > 0) {

                    $teValue = explode(',', $mailTenant);
                    $getTeValueName = $tenant->whereIn('id', $teValue)->findAll();

                    $tenants = [];
                    foreach ($getTeValueName as $teValueName) {
                        $tenants[] = $teValueName['tename'];
                    }
                    $alldata[$key]['tenants'] = $tenants;
                }
            }

            $mailEmployee = $mailData['mailemployee'];

            if ($mailEmployee != '') {
                if ($mailEmployee > 0) {
                    $emValue = explode(',', $mailEmployee);
                    $getEmValueName = $employee->whereIn('id', $emValue)->findAll();

                    $employees = [];
                    foreach ($getEmValueName as $emValueName) {
                        $employees[] = $emValueName['name'];
                    }
                    $alldata[$key]['employees'] = $employees;
                }
            }

            $mailOwner = $mailData['mailowner'];

            if ($mailOwner != '') {
                if ($mailOwner > 0) {
                    $owValue = explode(',', $mailOwner);
                    $getowValueName = $owner->whereIn('owner_id', $owValue)->findAll();

                    $owners = [];
                    foreach ($getowValueName as $owValueName) {
                        $owners[] = $owValueName['name'];
                    }
                    $alldata[$key]['owners'] = $owners;
                }
            }
        }


        $data['getMailSms'] = $alldata;
        return view('Modules\Mail\Views\admin\mail\mailsms-list', $data);
    }
    /**
     * End index
     */

     /**
     * This method mailsmsAdd save all mail & sms formats to database.
     * Method - get & post.
     * validates - mailSmsValidate.
     */
    public function mailsmsAdd()
    {
        $tenant = new Tenantmodel();
        $data['getTenants'] = $tenant->findAll();

        $employee = new Employeemodel();
        $data['getEmployee'] = $employee->findAll();

        $owner = new Ownermodel();
        $data['getOwner'] = $owner->findAll();

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('mailSmsValidate')) {
                $data = [
                    'error' => '<div class="alert alert-warning text-center">Error</div>',
                    'validation' => $this->validator->listErrors()
                ];
                echo json_encode($data);
                return;
            } else {
                $mailSms = new Mailsmsmodel();

                $allTennat = $this->request->getVar('all_tenanat');
                $allEmployee = $this->request->getVar('all_employee');
                $allOwner = $this->request->getVar('all_owner');

                if ($allTennat != '' || $allEmployee != '' || $allOwner != '') {
                    $flag = 1;
                } else {
                    $flag = 0;
                }

                $mailSmsCreate['maildate'] = date('Y-m-d');
                $mailSmsCreate['mailsub'] = $this->request->getVar('mail_sub');
                $mailSmsCreate['mailmess'] = $this->request->getVar('mail_mess');

                if ($flag == 1) {
                    $mailSmsCreate['mailtenant'] = $this->request->getVar('all_tenanat');
                    $mailSmsCreate['mailemployee'] = $this->request->getVar('all_employee');
                    $mailSmsCreate['mailowner'] = $this->request->getVar('all_owner');
                }

                if ($flag == 0) {


                    $tenant = $this->request->getVar('tenant_name');
                    $employee = $this->request->getVar('employee_name');
                    $owner = $this->request->getVar('owner_name');

                    if ($tenant != '') {
                        $mailSmsCreate['mailtenant'] = implode(',', $this->request->getVar('tenant_name'));
                    }
                    if ($employee != '') {
                        $mailSmsCreate['mailemployee'] = implode(',', $this->request->getVar('employee_name'));
                    }
                    if ($owner != '') {
                        $mailSmsCreate['mailowner'] = implode(',', $this->request->getVar('owner_name'));
                    }
                }

                $currentDate = $this->request->getVar('now');
                if($currentDate != ''){
                    $mailSmsCreate['schedule'] = date('Y-m-d');
                }

                $futureDate = $this->request->getVar('future_date');
                if($futureDate != ''){
                    $mailSmsCreate['schedule'] = $this->request->getVar('future_date');
                }

                $mailSmsCreate['mailmesstype'] = $this->request->getVar('mailMessType');    
                $mailSmsCreate['property_id'] = $this->session->get('rs_property_id');    


                $mailSms->insert($mailSmsCreate);
                
                $data = [
                    'success' => '<div class="alert alert-success text-center">Success</div>',
                    'error' => '' 
                ];

                echo json_encode($data);
                return;
            }
        }
        $data['select2'] = 2;
        return view('Modules\Mail\Views\admin\mail\mailsms-add', $data);
    }
    /**
     * End index
     */


     /**
     * This method mailsmsEdit edits all data mail & sms information of a property.
     * Method - get & post.
     * Validates - mailSmsValidate.
     * It has a perameter row id known as "$id" used for which row will edit.
     */
    public function mailsmsEdit($id)
    {
        $mailSms = new Mailsmsmodel();
        $tenant = new Tenantmodel();
        $employee = new Employeemodel();
        $owner = new Ownermodel();

        $alldata = $mailSms->where('id', $id)->first();

        $mailTenant = $alldata['mailtenant'];

        if ($mailTenant != '') {
            if ($mailTenant > 0) {

                $teValue = explode(',', $mailTenant);
                $getTeValueName = $tenant->whereIn('id', $teValue)->findAll();

                $tenants = [];
                foreach ($getTeValueName as $teValueName) {
                    $tenants[] = $teValueName['tename'];
                }
                $alldata['tenants'] = $tenants;
            }
        }

        $mailEmployee = $alldata['mailemployee'];

        if ($mailEmployee != '') {
            if ($mailEmployee > 0) {
                $emValue = explode(',', $mailEmployee);
                $getEmValueName = $employee->whereIn('id', $emValue)->findAll();

                $employees = [];
                foreach ($getEmValueName as $emValueName) {
                    $employees[] = $emValueName['name'];
                }
                $alldata['employees'] = $employees;
            }
        }

        $mailOwner = $alldata['mailowner'];

        if ($mailOwner != '') {
            if ($mailOwner > 0) {
                $owValue = explode(',', $mailOwner);
                $getowValueName = $owner->whereIn('owner_id', $owValue)->findAll();

                $owners = [];
                foreach ($getowValueName as $owValueName) {
                    $owners[] = $owValueName['name'];
                }
                $alldata['owners'] = $owners;
            }
        }

        $data['getMailSms'] = $alldata;


        $data['getTenants'] = $tenant->findAll();
        $data['getEmployee'] = $employee->findAll();
        $data['getOwner'] = $owner->findAll();


        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('mailSmsValidate')) {
                $data = [
                    'error' => '<div class="alert alert-warning text-center">Error</div>',
                    'validation' => $this->validator->listErrors()
                ];
                echo json_encode($data);
                return;
            } else {

                $allTennat = $this->request->getVar('all_tenanat');
                $allEmployee = $this->request->getVar('all_employee');
                $allOwner = $this->request->getVar('all_owner');

                if ($allTennat != '' || $allEmployee != '' || $allOwner != '') {
                    $flag = 1;
                } else {
                    $flag = 0;
                }

                $mailSmsUpdate['maildate'] = date('d/m/y');
                $mailSmsUpdate['mailsub'] = $this->request->getVar('mail_sub');
                $mailSmsUpdate['mailmess'] = $this->request->getVar('mail_mess');

                if ($flag == 1) {
                    $mailSmsUpdate['mailtenant'] = $this->request->getVar('all_tenanat');
                    $mailSmsUpdate['mailemployee'] = $this->request->getVar('all_employee');
                    $mailSmsUpdate['mailowner'] = $this->request->getVar('all_owner');
                }

                if ($flag == 0) {

                    $tenant = $this->request->getVar('tenant_name');
                    $employee = $this->request->getVar('employee_name');
                    $owner = $this->request->getVar('owner_name');


                    if ($tenant != '') {
                        $mailSmsUpdate['mailtenant'] = implode(',', $this->request->getVar('tenant_name'));
                    }else{
                        $mailSmsUpdate['mailtenant'] = '';
                    }
                    if ($employee != '') {
                        $mailSmsUpdate['mailemployee'] = implode(',', $this->request->getVar('employee_name'));
                    }else{
                        $mailSmsUpdate['mailemployee'] = '';
                    }
                    if ($owner != '') {
                        $mailSmsUpdate['mailowner'] = implode(',', $this->request->getVar('owner_name'));
                    }else{
                        $mailSmsUpdate['mailowner'] = '';
                    }
                }

                $mailSmsUpdate['mailmesstype'] = $this->request->getVar('mailMessType');


                $mailSms->update($id, $mailSmsUpdate);

                $data = [
                    'success' => '<div class="alert alert-success text-center">Success</div>'
                ];

                echo json_encode($data);
                return;
            }
        }
        $data['select2'] = 2;
        return view('Modules\Mail\Views\admin\mail\mailsms-edit', $data);
    }
    /**
     * End index
     */


     /**
     * This method mailsmsDelete deletes all data mailsms details of a property.
     * Method - get 
     * It has a perameter row id known as "$id" used for which row will delete.
     */
    function mailsmsDelete($id){
        $mailSms = new Mailsmsmodel();
        $mailSms->delete($id);

        return redirect()->to(base_url('/admin/mailsms_list'));
    }
    /**
     * End mailsmsDelete
     */
}
