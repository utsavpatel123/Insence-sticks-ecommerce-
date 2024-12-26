<?php

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (isset($data)) {

    if (isset($_COOKIE['productData'])) {
        $value = json_decode($_COOKIE['productData'], true);
    
        $length = count($value);
    
    echo json_encode($length);
        
    }
    else{
        $default = 0;
        echo json_encode($default);
    }


}



?>