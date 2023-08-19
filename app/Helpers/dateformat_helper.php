<?php


if (!function_exists("date_formats")) {
    function date_formats($input='')
    {
        $session=\Config\Services::session();
        $property_id=$session->get('rs_property_id');

        $db = \Config\Database::connect();
        $builder= $db->table('settings');
        $query= $builder->where('property_id',$property_id)->where('sname','date_format')->get();

        $results=$query->getResult();
        foreach($results as $result){
        $details= json_decode($result->svalue);
        $format=$details->date_format;

        //  echo $format;

        if($input!=''){  

        $date = date( $format , strtotime($input) );
        return $date;
        }
        
        }

    }
}