<?php
    /*
        Description: Get data from CSV
        $csv_path = Path where CSV is located (by default users)
    */     

    function dataFromCsv($csv_path = 'Assets/csv/users.csv'){

        // Get All user data from CSV file
        
        $array_csv = array_map('str_getcsv', file($csv_path));
        $header_csv = $array_csv[0];
        
        $data_csv = array();
        $numRow = 0;
        foreach ($array_csv as $row)
        {
            if($numRow != 0){

                $keyName = 0;
                $data_row = new stdClass();
                foreach ($row as $key => $value)
                {
                    $headerKey = $header_csv[$keyName];
                    
                    $data_row-> $headerKey = $value;   
                
                    $keyName++;            
                    
                }

            
                array_push($data_csv, $data_row);

            }
            $numRow++;
        }
     
        return $data_csv;

    }