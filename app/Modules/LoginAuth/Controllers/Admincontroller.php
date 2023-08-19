<?php

namespace Modules\LoginAuth\Controllers;

use Modules\User\Models\User;
use App\Controllers\BaseController;
use Modules\Setting\Models\Rolemodel;
use Modules\LoginAuth\Models\Paymentmodel;
use Modules\Super_admin\Models\Pakagemodel;
use Modules\Setting\Models\Notificationmodel;

class Admincontroller extends BaseController{
    public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    /**
     * This method index is check user authentication who are try to login.
     * It also set user data to session and cookie.
     * After all it send package page to select a package if that user haven't any package.
     * Method - get & post.
     */
    public function index(){

        if ($this->request->getMethod() == 'post') {
            $data['theme'] = $this->request->getVar('themeselect');
            $this->session->set('themevalue', $data['theme']);
            return view('\Modules\LoginAuth\admin\login\login', $data);
        }

        return view('\Modules\LoginAuth\admin\login\theme_chose');
    }


    public function login(){

        $user = new User();

        $data = [
            'request' => $this->request,
        ];

        // echo '<pre>'; print_r($data); die();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('login')) {
                $data['validation'] = $this->validator;

                // echo '<pre>'; print_r($data); die();
            } else {
                $email    = $this->request->getVar('email');
                $password = SHA1($this->request->getVar('password'));

                $getUser = $user->where(['email' => $email, 'password' => $password])->first();

                // echo '<pre>'; print_r($getUser); die();

                if (get_cookie('login') && !$getUser) {
                    $rememberkey = $this->request->getVar('password');
                    $getUser = $user->where(['email' => $email, 'rememberkey' => $rememberkey])->first();
                }


                if ($getUser) {
                    $session_data = [
                        'userId'     => $getUser['id'],
                        'name'       => $getUser['name'],
                        'type'       => $getUser['type'],
                        'user_type'  => $getUser['user_type'],
                        'isLoggedIn' => true,
                        'by_login'   => "yes",
                    ];

                    // echo '<pre>'; print_r($session_data); die();

                    $this->session->set($session_data);

                    $this->setCookie($getUser, $user);

                    if($getUser['user_type']==1){

                        return redirect()->to(base_url('/admin/super_admin_home'));

                    }

                    $builder = $this->db->table('users');

                    $builder->select('*');
                    $builder->join('pakage', 'users.package_id = pakage.id', 'left');
                    $builder->where('users.id', $getUser['id']);

                    $query   = $builder->get();
                    $package = $query->getResult();

                    // echo '<pre>'; print_r($package); die();


                    if($getUser['package_id']==0){

                        return redirect()->to(base_url('/admin/select_package'));

                    }else{

                        if($getUser['user_type']==10){
                            return redirect()->to(base_url('admin/home/'.$getUser['property_id']));
                        }else{
                            return redirect()->to(base_url('/admin/account_mode'));
                        }
                    }

                } else {
                    $data['error'] = "Username and Password didn't match!";
                }
            }
        }

        $getCookie = get_cookie('login');
        
        if ($getCookie != '') {
            $showGetCookie = base64_decode($getCookie);
            $cookieArray =  explode('|', $showGetCookie);

            $chookieCheck = $user->where(['email' => $cookieArray[0], 'rememberkey' => $cookieArray[1]])->first();

            if ($chookieCheck) {
                $data['email'] = $chookieCheck['email'];
                $data['rememberkey'] = $chookieCheck['rememberkey'];
            }
        }

        return view('\Modules\LoginAuth\admin\login\login', $data);
    }
    /**
     * End index
     */


    /**
     * This method superAdminHome make sure that if anu user super admin then it return to super admin page.
     * Method - get
     */
    public function superAdminHome()
    {
        return redirect()->to(base_url('admin/property_user'));
    }
    /**
     * End index
     */

     /**
     * This method setCookie used to set logged user data to Cookie.
     * It is a function that call from another function.
     * It has two perameter one is "$getUser" contain user data.
     * Another is "$user" a model only.
     */
    protected function setCookie($getUser, $user)
    {
        $remCheck = $this->request->getVar('remember');
        if ($remCheck) {

            $test['rememberkey'] = random_string('alnum', 40);
            $id = $getUser['id'];

            $user->update($id, $test);

            $cookie = [
                'name'          => 'login',
                'value'         => base64_encode($getUser['email'] . '|' . $test['rememberkey']),
                'expire'        => time() + 86500 * 30,
                'domain'        => '',
                'path'          => '/',
                'prefix'        => '',
                'secure'        => false,
                'httpOnly'      => false,
                'sameSite'      => '',
            ];
            set_cookie($cookie);
        }
    }
    /**
     * End setCookie
     */


     /**
     * This method adminLogout is for logout.
     * It also destroy user data from session.
     * Method - get.
     */
    public function adminLogout()
    {

        $remove_session=[
            'userId','name','isLoggedIn','type','rs_property_id','by_login'
        ];
        $this->session->remove($remove_session);
        $this->session->destroy();

        return redirect()->to(base_url('/'));
    }
    /**
     * End adminLogout
     */

    /**
     * This method forgotPass is any user forgot his/her password then they can change their password by this.
     * It confirm their password by email.
     * Method - get & post.
     * validates - forgotValidate
     */
    public function forgotPass()
    {
        $data = array();
        $user = new User();
        $notification = new Notificationmodel();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('forgotValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $email = $this->request->getVar('user_email');
                $getUser = $user->where('email', $email)->first();

                // echo "<pre>";
                // print_r($getUser);
                // die();

                if ($getUser) {
                    $id = $getUser['id'];
                    $token = random_string('alnum', 8);
                    $passToken = [
                        'passresttoken' => $token,
                    ];
                    $user->update($id, $passToken);

                    $getNotification = $notification->where('id', 2)->first();

                    $property_id=$this->session->get('rs_property_id');

                    $change = ["{app_name}"];
                    $changeTo = ["My Smart Property"];
                    $emailSubject = str_replace($change, $changeTo, $getNotification['mailsub']);

                    $link = base_url() . '/reset_pass/' . $token;
                    $source = ["{receiver_name}", "{app_name}", "{link}"];
                    $dist = [$getUser['name'], "My Smart Property", $link];
                    $emailBody = str_replace($source, $dist, $getNotification['mailbody']);

                    $email = $getUser['email'];

                    $check = rs_send_email($email, $emailSubject, $emailBody, $property_id);

                    $data['success'] = '<div class="alert alert-success text-center">We are sending password reset link to your email please check!</div>';


                } else {
                    $data['error'] = '<div class="alert alert-warning text-center">Email Does Not Match!</div>';
                }
            }
        }
        return view('\Modules\LoginAuth\admin\login\forgot-pass', $data);
    }
    /**
     * End adminLogout
     */


     /**
     * This method resetPass is get new password from user to update.
     * Method - get & post.
     * validates - resetValidate
     * It has a perameter "$userToken" for identify valid user.
     */
    public function resetPass($userToken)
    {
        $user = new User();
        $getToken = $user->where('passresttoken', $userToken)->first();

        $data['token'] = $userToken;

        if ($getToken) {
            if ($this->request->getMethod() == 'post') {
                if (!$this->validate('resetValidate')) {
                    $data['validation'] = $this->validator;
                } else {
                    $pass = $this->request->getVar('user_pass');
                    $rePass = $this->request->getVar('re_pass');

                    if (strlen($pass == $rePass)) {
                        $passUpdate = [
                            'password' => SHA1($this->request->getVar('user_pass')),
                            'passresttoken' => '',
                        ];

                        $user->where('passresttoken', $userToken)
                        ->set($passUpdate)
                        ->update();

                        $data['success'] = '<div class="alert alert-success text-center">Password update successfully!</div>';
                    } else {
                        $data['error'] = '<div class="alert alert-warning text-center">Password and confirm password does not match!</div>';
                    }
                }
            }
            return view('\Modules\LoginAuth\admin\login\reset-pass', $data);
        } else {
            $data['invalidToken'] = '<div class="alert alert-warning text-center">Invalid Token!</div>';
            return view('\Modules\LoginAuth\admin\login\invalid-token', $data);
        }
    }
     /**
     * End resetPass
     */

     /**
     * This method register is get new user data to add a property.
     * After that it send  user to choose a package.
     * Method - get & post.
     * validates - register
     */
    public function register(){
        $user_model       = new User();
        $pakage_model     = new Pakagemodel();
        $data['packages'] = $pakage_model->where('status',1)->findall();

        if ($this->request->getMethod() == 'post') {

            $useremail = $this->request->getVar('useremail');


            $check_email = $user_model->where('email', $useremail)->find();
			// print_r($check_email);die();
            if(empty($check_email)){

                if ($this->validate('register')) {

                    $password   = $this->request->getVar('userpassword');
                    $c_password = $this->request->getVar('confirm_pass');
                    // if($password==$c_password){

                    $username           = $this->request->getVar('username');
                    $useremail          = $this->request->getVar('useremail');
                    $userpassword       = SHA1($this->request->getVar('userpassword'));
                    $term_and_condition = $this->request->getVar('term_and_condition');

                    $role_model = new Rolemodel();
                    $super_admin= $role_model->where('asName','admin')->first();

                    $data = [
                        'email'              => $this->request->getVar('useremail'),
                        'password'           => SHA1($this->request->getVar('userpassword')),
                        'name'               => $this->request->getVar('username'),
                        'term_and_condition' => $this->request->getVar('term_and_condition'),
                        'user_type'          => $super_admin['id'],
                        'isLoggedIn'         => true,

                    ];


                    $insert  = $user_model->insert($data);

                    $user_id = $user_model->getInsertID();

                    $getUser = $user_model->where('id',$user_id)->first();
                    if ($getUser) {
                        $session_data = [
                            'userId'     => $getUser['id'],
                            'name'       => $getUser['name'],
                            'type'       => $getUser['type'],
                            'user_type'  => $getUser['user_type'],
                            'isLoggedIn' => true,
                            'by_login'   => "yes",
                        ];
                        $this->session->set($session_data);

                        $this->setCookie($getUser, $user_model);
                    }


                    $data = [
                        'company_id' => $user_id,
                    ];

                    $update = $user_model->update($user_id,$data);
                    $users  = $user_model->where('id',$user_id)->first();


                    $notification= new Notificationmodel();

                    $getNotification = $notification->where('id', 6)->first();

                    $property_id=$this->session->get('rs_property_id');


                    $source    = ["{receiver_name}", "{app_name}"];
                    $dist      = [$users['name'], "My Smart Property"];
                    $emailBody = str_replace($source, $dist, $getNotification['mailbody']);

                    $email = $users['email'];

                    $check = rs_send_email($email, $getNotification['mailsub'], $emailBody);

                    return redirect()->to(base_url('/admin/select_package'));

                }else{
                    $data['validation'] = $this->validator;
                    return view('\Modules\LoginAuth\admin\login\register',$data);
                }
            }else{
                return redirect()->back()->with('faild', 'Sorry! Email Already exists');
            }
        }


        return view('\Modules\LoginAuth\admin\login\register',$data);
    }




    /**
     * End register
     */


    /**
     * This method payment shows payment type for user to choose a type for payment.
     * Method - get & post.
     * It has two perameter one is "$package_id" which package user already selected.
     */
    public function payment($package_id){
        $package_model = new Pakagemodel();

        $data['package'] = $package_model->where('id',$package_id)->first();

        $data['owner_id'] = $this->request->getVar('owner_id');
        //  echo "<pre>";print_r($data);die();
        return view('\Modules\LoginAuth\admin\login\payment_system',$data);
    }
    /**
     * End payment
     */

     /**
     * This method paymentMethodCheck changes the package and update to it in a database.
     * It gets payment id from stripe using API.
     * Method - get
     * It has four perameter first is perameter is "$owner_id" this is user id.
     * Second perameter is "$amount" that how much amount user already payment.
     * Third perameter is "$duration" for limits of time of that package.
     * Forth perameter is "$package_id" which package user already selected to update.
     * And last one is "$session_id" send by stripe for payment.
     */
    public function paymentMethodCheck($owner_id , $amount , $duration, $package_id , $session_id)
    {
        $payment_model= new Paymentmodel();
        $user_model = new User();
        $page_data['sessionId'] = $session_id;
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
          	$getUser = $user_model->where('id',$owner_id)->first();

			$session_data = [
				'userId' => $getUser['id'],
				'name' => $getUser['name'],
				'type' => $getUser['type'],
				'user_type' => $getUser['user_type'],
				'isLoggedIn' => true,
			];

			$this->session->set($session_data);
			$this->setCookie($getUser, $user_model);

			// if($getUser['user_type']==10){
			//     return redirect()->to(base_url('admin/home/'.$getUser['property_id']));
			// }else{
			//     return redirect()->to(base_url('/admin/account_mode'));
			// }
			return redirect()->to(base_url('/admin/success_payment'))->with('success', 'Payment Successfuly !!');

        }

    }
    /**
     * End paymentMethodCheck
     */


     /**
     * This method successPayment shows payment details which package user already buy.
     * Method - get.
     */
    public function successPayment()
    {
        $user_model = new User();
        $package_model = new Pakagemodel();
        $user_id = $this->session->get('userId');
        $getUser = $user_model->where('id',$user_id)->first();



        $data['package'] = $package_model->where('id',$getUser['package_id'])->first();


        return view('\Modules\LoginAuth\admin\login\success_payment',$data);
    }
    /**
     * End paymentMethodCheck
     */


     /**
     * This method termAndCondition shows term and condition page in on registration time.
     * Method - get.
     */
    public function termAndCondition()
    {
        return view('\Modules\LoginAuth\admin\login\term_and_condition');
    }
    /**
     * End termAndCondition
     */

     /**
     * This method termAndCondition shows all packages to user choose.
     * Method - get.
     */
    public function selectPackage()
    {
         // echo "hello";die();
        $user_model = new User();
        $user_id = $this->session->get('userId');
        $getUser = $user_model->where('id',$user_id)->first();

        $package_model = new Pakagemodel();
        $data['user_id'] = $getUser['id'];
        $data['packages'] = $package_model->where('status',1)->findall();
        $data["user"]=  $getUser;
        // print_r($getUser);die();
        return view('\Modules\LoginAuth\admin\login\select_package',$data);
    }

	/*============================
                Paypal
    ==============================*/
	public function cancel_subscription($path){
		////////////////////////////// GET TEMP ACCESS TOKEN/////////////////////////////////

		$ch = curl_init();
        $clientId = "ATkPii6sKXjdBuMtV_ZHeMVpgB9nHyj2Z1G3L4qZJHP5PntgTrawJOfRxWjt0KKvSr7uiQFZ-D2DHUxy";
        $secret = "EETN85e5-2C5xe9nK7ydhncZLJqKIrtIPR1xnQk3l_pDo4dBZ1xxpw-tfpl26iM6wlGj7jj9QoE8dAeG";
        $myIDKEY = "";

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $result = curl_exec($ch);

        if(empty($result))die("Error: No response.");
        else{
            $json = json_decode($result);
			print_r($json->access_token);
            $myIDKEY = $json->access_token;
        }

		//echo "<pre>"; print_r($myIDKEY); die();
        curl_close($ch);


		$access_token = $myIDKEY;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $path);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		));

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error: ' . curl_error($ch);
		} else {
			echo 'Subscription canceled: ' . $response;
		}

		curl_close($ch);







        /*$ch = curl_init();
        $headers = [
                    'Authorization: Bearer '.$myIDKEY,
                    'Content-Type: application/json'
                ];
        $postData = [
            'reason' => 'clicked cancel subscription button'
        ];

        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_exec ($ch);

        curl_close($ch);*/
	}


    public function no_debit_paypal_notify()
    {
		/*$duration = 6;
		$data = date('Y-m-d', time() + 30 * $duration * 24 * 3600);
		echo "<pre>"; print_r($data); die();*/

		$payment_model = new Paymentmodel();
        $user_model = new User();

        $file = 'paypal/paypal_'.time().rand(9,9999).'.txt';
        $x = serialize($_POST);

        file_put_contents($file,$x);
        $y = unserialize($x);
		$custom = explode(',',$y['custom']);

		$package_id = $custom[0];
        $owner_id = $custom[1];
		$duration = $custom[2];

		$paymentsinfo = $payment_model->where(['owner_id'=>$owner_id,'payment_by'=>'paypal'])->findAll();
        if($paymentsinfo){
            foreach($paymentsinfo as $paymentinfo){
				//$path = "https://api.paypal.com/v1/billing/subscriptions/".$paymentinfo['subscription_id']."/cancel";
                $path = "https://api.sandbox.paypal.com/v1/billing/subscriptions/".$paymentinfo['subscription_id']."/cancel";
                $this->cancel_subscription($path);
            }
        }

		//echo "<pre>"; print_r($package_id); die();

        $data['amount'] = $y['mc_gross'];
		$data['owner_id'] = $owner_id;
		$data['transaction_id'] = $y['txn_id'];
		$data['payment_date'] = date('Y-m-d', strtotime($y['payment_date']));
        $data['payment_status'] = $y['payment_status'];
        $data['payment_by']    = "paypal";
        $data['customer_id']     = $y['payer_id'];
        $data['payment_expire_date'] = date('Y-m-d', time() + 30 * $duration * 24 * 3600);
        $data['details']   = json_encode($x);
		$data['package_id'] = $package_id;
		$data['subscription_id'] = $y['subscr_id'];

        $insert = $payment_model->save($data);
        if ($insert) {
            $package_model = new Pakagemodel();
            $package = $package_model->where('id', $package_id)->first();
            if ($package['property_limit'] == 1) {
                $datas['type'] = 1;
            } else {
                $datas['type'] = 2;
            }
            $datas['package_id'] = $package_id;
            $user_model->update($owner_id, $datas);
            $user_model->where('id', $owner_id)->first();
        }

        return redirect()->to(base_url('/admin/success_payment'))->with('success', 'Payment Successfuly !!');
    }


}