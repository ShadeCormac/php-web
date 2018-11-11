<?php 
    class Pages extends Controller{
        public function __construct(){
            //echo "pages loaded";
        }
        //always has to have index function
        public function index(){
            $data = ['title' => 'welcome to homepage'];
            $this->view('pages/index', $data);
        }
    }
?>