<?php 
    //Base controller
    //Loads the models and views
    class Controller {
        //Load model
        public function model($model){
            //require the associtated model
            require_once '../app/models/' . $model .'.php';

            return new $model();
        }

        //Load View
        public function view($view, $data = []){
            if(file_exists('../app/views/' . $view . '.php')){
                require_once('../app/views/' . $view . '.php');
            }
            else {
                die('View died because there cant find' . $view);
            }
        }
    }
?>