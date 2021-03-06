<?php

//Get Data Functions
//src/requests/index.php
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
    
    //The "requests" class is accessed to be able to choose between the different functions as needed
    $requests = new DataRequests();

    switch ($type) {
        case 'json':
            
            $users = $requests->dataFromJson('./../../Assets/json/users.json');
            $usersHtml = userList($users, $limit);
            return $usersHtml;
            break;

        case 'csv':           
           
            $users = $requests->dataFromCsv('./../../Assets/csv/users.csv'); 
            $usersHtml = userList($users, $limit);
            return $usersHtml;
            break;

        case 'user':           
           
            $users = $requests->dataFromApi('https://hr.oat.taocloud.org/v1/user/'.$id);
            $usersHtml = userProfile($users);
            return $usersHtml;
            break;    
        
        default:
            //For the API Rest request, the default limit is 20. I have added this condition to skip that limit.
            if($limit<0){$limit = 100;}
            
            $users = $requests->dataFromApi('https://hr.oat.taocloud.org/v1/users?limit='.$limit);
            $usersHtml = userList($users, $limit);
            return $usersHtml;
            break;
    }    

}
