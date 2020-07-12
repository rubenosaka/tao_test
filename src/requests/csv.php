<?php
    /*
        Description: Get data from CSV
        $csv_path = Path where CSV is located (by default users)
    */     
        
    $array = array_map('str_getcsv', file($path));
    $header = $array[0];
        
    $data = array();
    $numRow = 0;
    foreach ($array as $row)
    {
        if($numRow != 0){

            $keyName = 0;
            $data_row = new stdClass();
                foreach ($row as $key => $value)
                {
                    $headerKey = $header[$keyName];
                    
                    $data_row-> $headerKey = $value;   
                
                    $keyName++;            
                    
                }

            
                array_push($data, $data_row);

            }
            $numRow++;
        }       