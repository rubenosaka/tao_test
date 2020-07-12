<?php

//Get Data Functions
include_once('../requests/index.php');

//Get Custom User Functions
include_once('index.php');

$id = null;
    /*
        Types:
        Json: Makes a Json Request and print user-list
        CSV: Makes a CSV Request and print user-list
        API: Makes a API Request and print user-list
        User: Print clicked user profile - Needs ID Param

        Limit:
        -1 shows all the requested users

    */
    if (isset($_REQUEST["type"])){
        $type = $_REQUEST["type"]; 
    }

    if (isset($_REQUEST["id"])){
        $id = $_REQUEST["id"]; 
    }

    if (isset($_REQUEST["limit"])){
        $limit = $_REQUEST["limit"]; 
    }

usersByType($type, $id, $limit);

function usersByType($type = 'api', $id = null, $limit = -1){
    
    switch ($type) {
        case 'json':
            
            $users = dataFromJson('./../../Assets/json/users.json');
            $usersHtml = userList($users, $limit);
            return $usersHtml;
            break;

        case 'csv':           
           
            $users = dataFromCsv('./../../Assets/csv/users.csv');
            $usersHtml = userList($users, $limit);
            return $usersHtml;
            break;

        case 'user':           
           
            $users = dataFromApi('https://hr.oat.taocloud.org/v1/user/'.$id);
            $usersHtml = userProfile($users);
            return $usersHtml;
            break;    
        
        default:   
            
            $users = dataFromApi();
            $usersHtml = userList($users, $limit);
            return $usersHtml;
            break;
    }
    

}
