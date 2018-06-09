<?php
header("Content-Type:application/json");


$url='https://api.myjson.com/bins/pq0f6';
$result = file_get_contents($url);
$resultData = json_decode($result);


$re="";
if(!empty($_GET['name']))
{
    $name=$_GET['name'];
    
    
    
    foreach($resultData->{'hotels'} as $key => $value) {
        if($value -> {'city'}==$name)
        {
            
            $re = $name;
            break;
        }
    }
    
    

    
    if(empty($re))
    {
        response(200,"Product Not Found",NULL);
    }
    else
    {
        response(200,"Product Found",$re);
    }
    
}
else
{
    response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
    header("HTTP/1.1 ".$status);
    
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;
    
    $json_response = json_encode($response);
    echo $json_response;
}