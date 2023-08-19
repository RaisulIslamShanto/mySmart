<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Setting\Models\Popertymodel;
use Modules\User\Models\User;

class CheckUsertoProperty implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        
        $session = session();

        
 
        //$this_property_id=17;

        $property_id=$session->get('rs_property_id');
        $user_id= $session->get('userId');
        $user_type= $session->get('user_type');

            $property_model = new Popertymodel();
            $user_model = new User();

            $property_user= $property_model->where('id',$property_id)->first();
            $user= $user_model->where('id',$user_id)->first();

            //echo $property_user['owner'];echo $user_id;die();
		
            if($user_type != 1){
				if($property_user['company_id']!=$user['company_id']){
					return redirect()->to(base_url('/'));
				}
        	}
        
       // echo $property_id;echo $property_id;die();

        
            //if($this_property_id!=$property_id){
            //   return redirect()->to(base_url('/'));
            //}
            
   
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
