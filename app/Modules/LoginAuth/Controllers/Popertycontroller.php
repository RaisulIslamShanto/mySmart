<?php

namespace Modules\LoginAuth\Controllers;

use App\Controllers\BaseController;
use Modules\Setting\Models\Popertymodel;
use Modules\Setting\Models\Popertieimagemodel;
use Modules\User\Models\User;
use Modules\Setting\Models\Companymodel;
use Modules\Setting\Models\Rolemodel;
use Modules\Super_admin\Models\Pakagemodel;

class Popertycontroller extends BaseController
{
    public $session;

    public function __construct(){
        $this->session = \Config\Services::session();
    }

    /**
     * This method index is check user type and send their indivisual page.
     * Method - get.
     */
    public function index()
    {
        $user = new User();
        $userId = $this->session->get('userId');
        $type = $user->where(['id' => $userId])->first();

        $poperty_model= new Popertymodel();
        $user_info= $user->where('id',$userId)->first();
        $properties= $poperty_model->where('company_id',$user_info['company_id'])->findall();
        $data['properties']= $properties;
        $data['type']= $type['type'];


        if ($type['type'] == 1) {

            $properties= $poperty_model->where('owner',$userId)->first();
            if(empty($properties)){
                return view('\Modules\User\Views\admin\user\poperty-list',$data);
            }else{
                return redirect()->to(base_url('/admin/home/'.$properties['id']));
            }



        } elseif ($type['type'] == 2) {

            return view('\Modules\User\Views\admin\user\poperty-list',$data);
        } else {

            return view('\Modules\User\Views\admin\user\account-mode');
        }
    }
    /**
     * End index
     */


     /**
     * This method popertyList is get & view all properties for this company.
     * Method - get.
     * It has a perameter "$type" is user type It's make sure user destination page.
     */
    public function popertyList($type='')
    {
        $session = session();
        //echo "hello".$type;die();
        $poperty_model= new Popertymodel();
        $userId = $this->session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$userId)->first();
        $properties= $poperty_model->where('company_id',$this_user['company_id'])->findall();
        $data['properties']= $properties;
        $data['type']= $type;

        return view('\Modules\User\Views\admin\user\poperty-list',$data);
    }
    /**
     * End popertyList
     */


     /**
     * This method popertyAdd add new property for this company.
     * Method - get.
     * validates - popertyValidate
     * It has a perameter "$type" is user type It's make sure user destination page.
     */
    public function popertyAdd($type=null){

        $user_model    = new User();
        $poperty       = new Popertymodel();
        $package_model = new Pakagemodel();


        $user_id = $this->session->get('userId');
        $getUser = $user_model->where('id',$user_id)->first();

        // echo '<pre>';print_r($getUser);die();
        $package = $package_model->where('id',$getUser['package_id'])->first();

        // echo '<pre>';print_r($package);die;

        $properties       = $poperty->where('company_id',$getUser['company_id'])->findall();
        $total_properties = count($properties);
        // echo $total_properties.'//'.$package['property_limit'];die();

        $this->session->set('type', $type);

        $role_model    = new Rolemodel();
        $popertyImage  = new Popertieimagemodel();
        $user          = new User();
        $company_model = new Companymodel();
        $userId        = $this->session->get('userId');

        if($total_properties<$package['property_limit']){


        if ($this->request->getMethod() == 'post') {

            if (!$this->validate('popertyValidate')) {
                $data['validation'] = $this->validator;
            } else {


                $img = $this->request->getFile('image');
                if($img!=''){
                    $newName = $img->getRandomName();
                    $img->move(ROOTPATH . 'public/uploads', $newName);
                }
                else{
                    $newName='empty_image.jpg';
                }

                $super_admin= $role_model->where('asName','admin')->first();

                $get_user= $user->where('id',$userId)->first();
               // echo 'kk'.$get_user['user_type'];die();
                if($get_user['user_type']==$super_admin['id']){

                    $company = $company_model->where('company_owner_id',$userId)->first();
                if(empty($company['id'])){
                    $company=[
                        'company_owner_id' => $userId,
                        'status' => 1,
                    ];
                $company_model->insert($company);
                $company_id = $company_model->getInsertID();

                $datas=[
                    'company_id' => $company_id,
                ];

                $update = $user->update($userId,$datas);


                }

                }


                $find_company= $user->where('id',$userId)->first();



                $ptyCreate = [
                    'propertyname' => $this->request->getVar('po_name'),
                    'streetads'    => $this->request->getVar('po_streetads'),
                    'city'         => $this->request->getVar('po_city'),
                    'state'        => $this->request->getVar('po_stateregion'),
                    'zip'          => $this->request->getVar('po_zip'),
                    'country'      => $this->request->getVar('po_country'),
                    'owner'        => $userId,
                    'image'        => $newName,
                    'company_id'   => $find_company['company_id'],

                ];

                $poperty->insert($ptyCreate);
                $poperty_id = $poperty->getInsertID();

                $getMultiImages = $this->request->getVar('additionalimages');
                if(!empty($getMultiImages)){
                    foreach ($getMultiImages as $multiImage) {
                        $images = [
                            'popertyid' => $poperty_id,
                            'multiimage' => $multiImage
                        ];
                        $popertyImage->insert($images);
                    }
                }

                $user = $user->where('id',$userId)->first();

                if($user['type']==2){
                    return redirect()->to(base_url('admin/poperty_list/'.$type));
                }elseif($user['type']==1){
                    return redirect()->to(base_url('/admin/home/'.$poperty_id));
                }

            }
        }
    }else{
    return redirect()->to(base_url('admin/poperty_list/'.$type))->with('faild_message', 'Your property Limit is exits !!');
    }

        $data['type'] = $type;
        return view('\Modules\User\Views\admin\user\poperty-add', $data);
    }
    /**
     * End popertyList
     */


    /**
     * This method multipleImageUpload is used for Upload image.
     * Method - post.
     * It call by deopzone.
     */
    public function multipleImageUpload()
    {
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile as $img) {

                $myImage = $img[0];

                if ($myImage->isValid() && !$myImage->hasMoved()) {
                    $newName = $myImage->getRandomName();
                    $myImage->move(ROOTPATH . 'public/uploads', $newName);

                    echo $newName;
                }
            }
        }
    }
    /**
     * End multipleImageUpload
     */

}
