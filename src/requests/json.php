<?php
    /*
        Description: Get users from json
        $json_path = Path where Json is located
    */ 
    

    function dataFromJson($json_path = '/Assets/json/users.json'){

        // Get All user data from Json file        
        
        $json_str = file_get_contents($json_path);

        $data_json = json_decode($json_str);

        return $data_json;

    }