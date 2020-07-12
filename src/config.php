<?php

    /*

        Project Name: Tao Platform Level Test
        Author: Rubén González Aranda
        Date: 07/12/2020
        Version: 1.0

    */

    // Init Config

        $title = 'Tao Platform';       
        $version = '1.0';      
        $author = 'Rubén González Aranda';   
        $poject_id = 'tao';
        $partials = 'src/partials/';
  
    //Includes and Requires

        //Composer Packages

            /*

                SASS Compiler only Must be active in DEV Enviroment
                

                NOTE: This part of the code is commented to avoid errors in the case that composer is not used to install the packages.

                NOTE: This code is here beacuse it's the only package installed

          
            
            require_once 'vendor/autoload.php';

            //Packages Config
            use ScssPhp\ScssPhp\Compiler;      
                        
            $scss = new Compiler();
            $scss->setFormatter('ScssPhp\ScssPhp\Formatter\Compressed');
            $scss->addImportPath('Assets/css/');
            $test = file_get_contents('Assets/css/styles.scss');
            $content = $scss->compile($test);

            file_put_contents('Assets/css/styles.css', $content);

            */

        //Data Requests Functions
        include_once('requests/index.php');

        //Users Custom Funcions
        include_once('users/index.php');