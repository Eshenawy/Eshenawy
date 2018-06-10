<?php

function get_price($name)
{
    $url='https://api.myjson.com/bins/pq0f6';
    $result = file_get_contents($url);
    $resultData = json_decode($result);
    

    
    
    foreach($resultData->{'hotels'} as $key => $value) {
        if ($name == $value -> {'city'}) {
            return array ($value -> {'name'},$value -> {'city'},$value -> {'price'},$value->{'availability'});
     }
    }
    
    
    
    
}