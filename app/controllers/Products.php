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
        public function search($pageNum = 1){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [];
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                saveSearchRecords($_POST);            
                $result = $this->productModel->getProducts1($_POST['search-method'], $_POST['search'], $pageNum);
                $data['products'] = $result['products'];
                $data['products_count'] = $this->productModel->count($_POST['search-method'], $_POST['search']);
                $data['current_page'] = $pageNum;
                $this->view('products/view', $data);
            }else{
                $data = [];
                $_POST = $_SESSION['search_result'];
                $result = $this->productModel->getProducts1($_POST['search-method'], $_POST['search'], $pageNum);
                $data['products'] = $result['products'];
                $data['products_count'] = $this->productModel->count($_POST['search-method'], $_POST['search']);
                $data['current_page'] = $pageNum;
                
                $this->view('products/view', $data);
            }
        }

        
    }
?>