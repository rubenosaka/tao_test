<?php

    /*

        $users = Decoded Users data from custom source
        $limit = Total printed users, Use -1 for all
        $cols = Bootstrap colums for each card

    */
    function userProfile($user,  $cols = 'col-lg-12'){   
      
        if($user){            
        
        echo '<div class="row user-profile">';          
                
            $userData = (object) $user;
            $userData->id = $user->userid;
            echo '<div id="user-'.$user->userid.'" data-id="user-'.$user->userid.'" class="'.$cols.'">';
                userCard('h4', $userData, true);
            echo '</div>';        
            
        }        

    }