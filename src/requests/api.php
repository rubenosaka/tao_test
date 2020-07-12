<?php

    /*
        Description: Get data from API Rest Request
        $url = Url from API Get Request (by defaut users)
    */    

    function dataFromApi($url = "https://hr.oat.taocloud.org/v1/users"){

        /*

            NOTE: In order to make https curl petitions in local enviroment we have to make a few modifications in Apache and php.ini

            Also we need to download a .pem cerfication. 

            INSTRUCTIONS:
            Download the certificate bundle from https://curl.haxx.se/docs/caextract.html.

            Put it somewhere. In my case, that was D:/wamp64/cacert.pem directory.

            Enable mod_ssl in Apache and php_openssl.dll in php.ini (uncomment them by removing ; at the beginning). 

            Add these lines to your cert in both php.ini files:

                curl.cainfo="C:/wamp/cacert.pem"
                openssl.cafile="C:/wamp/cacert.pem"

            Restart Wamp services.


        */

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
    
        $data_api = json_decode($response, true);

       

        /*
            NOTE: PHP is case sensitive. So, in the response from the API Request we only get 3 fields with differents Key Names than the Json and CSV fiels (firstName => firstname)

            What we are doing is to transform the API Rest to an array and use "array_change_key_case" to make all the fields lowercase. After that, we hace to re-transform the array to an object type var

        */
        $data_api = array_change_key_case( $data_api, CASE_LOWER );

        $data_api = array_change_key_case_recursive($data_api);     
        $data_api = (object) $data_api;

        $err = curl_error($curl);

        curl_close($curl);

        return $data_api;

    }

    /*

        Function to normalize key names to lowercase

    */


    function array_change_key_case_recursive($arr)
    {
        return array_map(function($item){
            if(is_array($item))
                $item = array_change_key_case_recursive($item);
            return $item;
        },array_change_key_case($arr));
    }