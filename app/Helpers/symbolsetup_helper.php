<?php


if (!function_exists("symbol")) {
    function symbol()
    {
        $session=\Config\Services::session();
        $property_id=$session->get('rs_property_id');

        $db = \Config\Database::connect();
        $builder= $db->table('settings');
        $query= $builder->where('property_id',$property_id)->where('sname','currency')->get();

        $results=$query->getResult();
        foreach($results as $result){
        $currency_details= json_decode($result->svalue);
        $currency=$currency_details->currency;
        $decimal=$currency_details->currency_decimal;
        $position=$currency_details->currency_position;
        $seperator=$currency_details->currency_separator;

        echo  $currency;
        
        }

    }
}