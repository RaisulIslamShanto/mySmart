<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Popertymodel;
use \Modules\Setting\Models\Rolemodel;
use \Modules\User\Models\User;
use Modules\Super_admin\Models\Pakagemodel;

class Package implements FilterInterface
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

        $user_model = new User();
        $package_model = new Pakagemodel();

        $user_id= $session->get('userId');
        
        

         $package = $user_model->where('id',$user_id)->first();
         
         
        
            
            // if($package['package_id']==0 && $package['user_type'] != 1){
    //     $url = current_url(true);

    //     $uri = new \CodeIgniter\HTTP\URI($url);
    //     $third_segment= $uri->getSegment(3); 

    //    $user_acc = array("select_package", "payment", "payment_method_check");

    //    if(!in_array($third_segment,$user_acc)){
    //     $package_model = new Pakagemodel();
    //     $data['user_id'] = $user_id;
    //     $data['packages'] = $package_model->where('status',1)->findall();

    //     return redirect()->to(base_url('/admin/select_package'));
    //    }
        

    // }
           

            
   
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
