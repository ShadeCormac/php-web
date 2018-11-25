<?php
    session_start();
    //flash message
    //How to use: flash('login_success', 'You are logged in!');
    //display in view: flash('login_success')
    //alert-regular; alert-warning; alert-succesuful; alert-retry; alert-attention
    function flash($name ='', $message = '', $class='alert alert-succesuful'){
        if(!empty($name)){
            //set flash message
            if(!empty($message) && empty($_SESSION[$name])){
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name . '_class'])){
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;

            } //else display in view
            else if(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name. '_class'])? $_SESSION[$name. '_class'] : '';
                echo '<div class="' . $class . '" id="msg-flash"><h4>' . $_SESSION[$name] . '</h4></div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$class]);
            }
        }
    }

    function isLoggedIn(){
        return isset($_SESSION['isLoggedIn']) ? true : false;
    }


    function createUserSession($user){
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['userid'] = $user->AccountId;
        $_SESSION['usertype'] = $user->Type;
        $_SESSION['username'] = $user->UserName;
    }

    
?>