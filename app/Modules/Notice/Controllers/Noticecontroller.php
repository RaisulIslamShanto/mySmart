<?php

namespace Modules\Notice\Controllers;

use App\Controllers\BaseController;
use Modules\Notice\Models\Noticemodel;

class Noticecontroller extends BaseController{

  public $session,$db;

    public function __construct(){
        // parent::__construct();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function owner_notice(){
      $property_id=$this->session->get('rs_property_id');

        $validation =  \Config\Services::validation();
        $notice_model = new Noticemodel();

        $data['notices'] = $notice_model->where('property_id',$property_id)->findall();

        if($this->request->getMethod()=='post'){

            if ($this->validate('notice')) {
                $data = [
                    'title' => $this->request->getVar('title'),
                    'date' => $this->request->getVar('date'),
                    'status' => $this->request->getVar('status'),
                    'notice_type' => $this->request->getVar('notice_type'),
                    'text_area' => $this->request->getVar('text_area'),
                    'property_id' => $property_id,

                    ];
                    $notice_model = new Noticemodel();
                    $insert= $notice_model->save($data);
                    if(isset($insert)){
                        $data['notices'] = $notice_model->where('property_id',$property_id)->findall();
                        $data['success']='Data Saved';
                        return view('Modules\Notice\Views\admin\notice\notice',$data);
                    }

        }else{
           $data['validation'] = $this->validator;
           return view('Modules\Notice\Views\admin\notice\notice',$data);
         }

      }else{
        return view('Modules\Notice\Views\admin\notice\notice',$data);
      }


    }
    public function notice_update($id=null){
      $property_id=$this->session->get('rs_property_id');

       $notice_model = new Noticemodel();
       $data['notice'] = $notice_model->where('property_id',$property_id)->find($id);

       if($this->request->getMethod()=='post'){

        if ($this->validate('notice')) {
          $data = [
            'title' => $this->request->getVar('title'),
            'date' => $this->request->getVar('date'),
            'status' => $this->request->getVar('status'),
            'notice_type' => $this->request->getVar('notice_type'),
            'text_area' => $this->request->getVar('text_area'),
            ];
            $notice_model = new Noticemodel();
            $update= $notice_model->update($id,$data);
            if(isset($update)){
                $data['notices'] = $notice_model->where('property_id',$property_id)->findall();
                $data['success']='Data Updated';
                return view('Modules\Notice\Views\admin\notice\notice',$data);
            }else{
              $data['notices'] = $notice_model->where('property_id',$property_id)->findall();
                $data['success']='Updated Faild';
                return view('Modules\Notice\Views\admin\notice\notice',$data);
            }
        }else{
          $data['validation'] = $this->validator;
          return view('Modules\Notice\Views\admin\notice\notice_update',$data);
        }

     }else{
        if(!empty($data['notice'])){
          return view('Modules\Notice\Views\admin\notice\notice_update',$data);
      }else{
        return view('\Modules\Home\Views\admin\home\property_error_page');
      }

     }



    }
    public function notice_delete($id=null){
      $property_id=$this->session->get('rs_property_id');

      $notice_model = new Noticemodel();

      $deleted= $notice_model->where('id', $id)->delete();
      if(isset($deleted)){
        $data['notices'] = $notice_model->where('property_id',$property_id)->findall();
        $data['success']='Data Deleted';
        return view('Modules\Notice\Views\admin\notice\notice',$data);
      }else{
        $data['notices'] = $notice_model->where('property_id',$property_id)->findall();
        $data['success']='Deleted faild';
        return view('Modules\Notice\Views\admin\notice\notice',$data);
      }
  }
}
