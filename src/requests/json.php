<?php
    /*
        Description: Get users from json
        $json_path = Path where Json is located
    */ 


    // Get All user data from Json file       
        
    $str = file_get_contents($path);

    $data = json_decode($str);


