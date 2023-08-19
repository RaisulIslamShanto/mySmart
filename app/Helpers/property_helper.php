<?php


if (!function_exists("currency")) {
    function currency($value,$ret=0)
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

        if($position == 'left'){
            $view= number_format($value, $decimal,$seperator,',');
            $set_currency=$currency.' '.$view;
            //echo $set_currency;
          
        }else{
            $view= number_format($value, $decimal,$seperator,',');
            $set_currency=$view.' '.$currency;
            //echo $set_currency;
        }
        if($ret){
            return $set_currency;
        }else{
            echo $set_currency;
        }
        }

    }
}