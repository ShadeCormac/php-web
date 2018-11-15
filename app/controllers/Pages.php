<?php 
    class Pages extends Controller{
        public function __construct(){
            //echo "pages loaded";
            $this->productModel = $this->model('Product');
            $data = $this->productModel->getItem();
            
            $this->view('pages/index', $data);
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