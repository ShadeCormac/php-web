<?php
    session_start();
    //flash message
    //How to use: flash('login_success', 'You are logged in!');
    //display in view: flash('login_success')
    function flash($name ='', $message = '', $class='alert alert-success'){
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
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$class]);
            }
        }
    }
?>