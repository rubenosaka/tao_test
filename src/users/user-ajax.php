<?php

//Get Data Functions
include_once('../requests/index.php');

//Get Custom User Functions
include_once('index.php');

$id = null;

if (isset($_REQUEST["type"])){
    $type = $_REQUEST["type"]; 
}

if (isset($_REQUEST["id"])){
    $id = $_REQUEST["id"]; 
}

usersByType($type, $id);

function usersByType($type = 'api', $id = null){
    
    switch ($type) {
        case 'json':
            
            $users = dataFromJson('./../../Assets/json/users.json');
            $usersHtml = userList($users, -1);
            return $usersHtml;
            break;

        case 'csv':           
           
            $users = dataFromCsv('./../../Assets/csv/users.csv');
            $usersHtml = userList($users, -1);
            return $usersHtml;
            break;

        case 'user':           
           
            $users = dataFromApi('https://hr.oat.taocloud.org/v1/user/'.$id);
            $usersHtml = userProfile($users, -1);
            return $usersHtml;
            break;    
        
        default:   
            
            $users = dataFromApi();
            $usersHtml = userList($users, -1);
            return $usersHtml;
            break;
    }
    

}
