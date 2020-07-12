<?php

    /*

        $users = Decoded Users data from custom source
        $limit = Total printed users, Use -1 for all
        $cols = Bootstrap colums for each card

    */
    function userList($users, $limit = -1, $cols = 'col-lg-3 col-md-4 col-sm-6 col-12'){  
        
        if($users){
            
            $i = 0;
            echo '<div class="row user-list">';            
            foreach ($users as $user) {
                
                $userData = (object) $user;
                $userData->id = $i;
                echo '<div id="user-'.$i.'" data-id="user-'.$i.'" class="'.$cols.'">';
                    userCard('h4', $userData);
                echo '</div>';
                $i++;
                if ($i == $limit && $limit != -1) break;
            }
        }

    }