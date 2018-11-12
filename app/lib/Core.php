<?php
    //App's core class
    //create URL & load core controllers
    //URL format: /controller/method/params
    class Core {
        //Pages as default controller
        protected $currentController = "Pages";
        protected $currentMethod = "index";
        protected $params = [];
        public function __construct() {
            $url = $this->getUrl();
            //print_r($url);

            //Find suitable controller(parsed from $url[0]) from controllers
            $controller  = '../app/controllers/'.ucwords($url[0]).'.php';
            if(file_exists($controller)){
                $this->currentController = ucwords($url[0]);
                //unset the controller in url
                unset($url[0]);
            }
            
            //Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            //Create an instance of current controller 
            $this->currentController = new $this->currentController;

            //Check the method($url[1])
            if(isset($url[1])){
                //check for if method exists in controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    //echo '<br>'. 'current method:'.$this->currentMethod;
                    
                    //unset the method in url
                    unset($url[1]);
                }
            }


            //adding params
            $this->params = $url ? array_values($url) : [];
            //callback with array of params
            //make the controller calls associated method and params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }   
        }
    }
?>