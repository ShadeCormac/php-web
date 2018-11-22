<?php
    class Products extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
        }
        public function detail($id){
            $data['product'] = $this->productModel->getProduct($id);
            $this->view('products/detail', $data);
        }
        public function viewproducts($productType, $pageNum = 1){
            $data = [];
            $data['type'] = $productType;   
            //$data['products'] = $this->productModel->getProducts($productType);
            $data['products'] = $this->productModel->getProductsByPage($productType, $pageNum);
            $data['products_count'] = $this->productModel->countAll();
            $data['current_page'] = $pageNum;

            $this->view('products/view', $data);
        }
        public function search(){
            //print_r($_GET);
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $pageNum;
                if(isset($_GET['search-method']) && isset($_GET['search'])){
                    $pageNum = !empty($_GET['page'])? (int)$_GET['page'] : 1;
                }
                //echo $pageNum;
                //sanitize get array
                $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
                //remove whitespace
                $_GET['search-method'] = trim($_GET['search-method']);
                $_GET['search'] = trim($_GET['search']);
    
                $data['products'] = $this->productModel->getProducts($_GET['search-method'], $_GET['search'], $pageNum);
                $data['products_count'] = $this->productModel->count($_GET['search-method'], $_GET['search']);
                $data['current_page'] = $pageNum;
                $data['is_search'] = true;
                $this->view('products/view', $data);
            }
            else{
                redirect('pages/index');
            }
            
        }

        // public function search($pageNum = 1){
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         $data = [];
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //         saveSearchRecords($_POST);            
        //         $result = $this->productModel->getProducts($_POST['search-method'], $_POST['search'], $pageNum);
        //         $data['products'] = $result;
        //         $data['products_count'] = $this->productModel->count($_POST['search-method'], $_POST['search']);
                
        //     }else{
        //         $data = [];
        //         $_POST = $_SESSION['search_result'];
        //         $result = $this->productModel->getProducts($_POST['search-method'], $_POST['search'], $pageNum);
        //         $data['products'] = $result;
        //         $data['products_count'] = $this->productModel->count($_POST['search-method'], $_POST['search']);
        //         //$data['current_page'] = $pageNum;
                
        //         //$this->view('products/view', $data);
        //     }
        //     $data['current_page'] = $pageNum;
        //     $this->view('products/view', $data);
        // }

        
    }
?>