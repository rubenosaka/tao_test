<?php

/*
    Description: Print user card with some custom configs
*/

function userCard($htag = 'h4', $userData, $profile = false){    

    /*
        Here we check if the field picture exists

        If it exists, then we check if 
    */
    if(array_key_exists('picture', $userData) && array_key_exists('gender', $userData)){ 
    
        if (file_exists($userData->picture)){
            $picture = $userData->picture;
        }else{
            if($userData->gender == 'female'){
                $picture = 'Assets/images/default-women.png';
            }else if($userData->gender == 'male'){
                $picture = 'Assets/images/default-men.png';
            }else{
                $picture = 'Assets/images/default.png'; 
            }        
        }     
    }else{
        $picture = 'Assets/images/default.png';
    }
   
    $getUser = "getOutput('user' ,'".$userData->id."', 'src/users/user-ajax.php', event);";
    $class = 'tao-card';
    //Here we check if is a list or a user profile
    if($profile){
        $class .= ' tao-card--profile'; 
    }
    echo '<div class="'.$class.'">
        <img class="tao-card__avatar" src="'.$picture.'" alt="Card image cap">
        <div class="row">          
            <div class="col-12">
                <div class="tao-card__body">
                    <'.$htag.' class="tao-card__body__title">'.$userData->firstname.' '.$userData->lastname.'</'.$htag.'>';
                    if(array_key_exists('email', $userData)){ 
                        echo '<p class="tao-card__body__text"><a href="mailto:'.$userData->email.'" target="_blank">'.$userData->email.'</a></p>';
                     }   
                    if(!$profile){
                        echo '<a href="#" class="btn tao-btn" onclick="'.$getUser.'">View Profile</a>';
                    }else{
                        echo '<p class="tao-card__body__text mt-5"><strong>Login:</strong> '.$userData->login.'</p>';
                        echo '<p class="tao-card__body__text"><strong>Password:</strong> '.$userData->password.'</p>';
                        echo '<p class="tao-card__body__text"><strong>Address:</strong> '.$userData->address.'</p>';
                    }              
                    
                echo '</div>
            </div>
        </div>  
    </div>';    

}
