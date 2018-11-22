<?php 
    class Pages extends Controller{
        public function __construct(){
            //echo "pages loaded";
            $this->productModel = $this->model('Product');     
        }
        //always has to have index function
        public function index(){
            $data = [];
            $data['highest_view_products'] = $this->productModel->Top10('ViewCount');
            $data['newest_products'] = $this->productModel->Top10('CreatedAt');
            $data['highest_sell_products'] = $this->productModel->Top10('SellCount'); 
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