<?php    
    /*

        Comoponent Name = Data Request
        Description = Get data from different resources

        NOTE: I have made a different component for the "requests" to be reusable by other components. 
        
        UPDATE: I have changed the function to a class to make the code more scalable
    
    */

    //Data Requests
    class DataRequests{
        
        public function dataFromJson($path = '/Assets/json/users.json'){
            
            include_once('json.php'); //Get data from json            
            return $data;
        }

        public function dataFromCsv($path = 'Assets/csv/users.csv'){

            include('csv.php'); //Get data from csv
            return $data;

        }
        
        public function dataFromApi($url = "https://hr.oat.taocloud.org/v1/users?limit=100"){

            include_once('api.php'); //Get data from api
            return $data;

        }

    }   


    /*

        Function to normalize key names to lowercase

        USED: In src/requests/api.php

    */
    function array_change_key_case_recursive($arr)
    {
        return array_map(function($item){
            if(is_array($item))
                $item = array_change_key_case_recursive($item);
            return $item;
        },array_change_key_case($arr));
    }