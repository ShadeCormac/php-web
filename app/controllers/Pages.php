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
        public function about(){
            $data=[];
            $this->view('pages/about', $data);
        }
        public function contact(){
            $data=[];
            $this->view('pages/contact', $data);
        }
    }
?>