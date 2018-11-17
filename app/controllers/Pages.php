<?php 
    class Pages extends Controller{
        public function __construct(){
            //echo "pages loaded";
            $this->productModel = $this->model('Product');     
        }
        //always has to have index function
        public function index(){
            $data = [];
            $data['products'] = $this->productModel->getProducts();
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