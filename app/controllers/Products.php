<?php
    class Products extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
        }
        public function index(){
            redirect('pages/index');
            exit();
        }
        public function detail($id){
            $data['product'] = $this->productModel->getProduct($id);
            if($data['product'] == NULL){
                redirect('pages/index');
                exit();
            }
            $this->productModel->increaseView($id);
            $data['related_brand_products'] = $this->productModel->getRelatedBrandProducts($data['product']->Producer);
            $data['related_type_products'] = $this->productModel->getRelatedTypeProducts($data['product']->CategoryName);
            $this->view('products/detail', $data);
        }

        public function brands($brandName, $pageNum = 1){
            $data = [];
            $data['brand'] = $brandName;
            $this->categoryModel = $this->model('Category');
            $sortMethod = '';
            if(isset($_GET['sort'])){
                $sortMethod = $_GET['sort'];
            }
            $data['categories'] = $this->categoryModel->getAll();
            $data['brands'] = $this->productModel->getAllBrands();
            $data['products'] = $this->productModel->getProductsByBrand($brandName, $pageNum, $sortMethod);
            $data['products_count'] = $this->productModel->count('Producer', $brandName);
            $data['current_page'] = $pageNum;
            $this->view('products/view', $data);
        }
        public function views($productType, $pageNum = 1){
            $this->categoryModel = $this->model('Category');
            $data = [];
            $data['categories'] = $this->categoryModel->getAll();
            $data['brands'] = $this->productModel->getAllBrands();
            $data['type'] = $productType;   
            //$data['products'] = $this->productModel->getProducts($productType);
            $sortMethod = '';
            if(isset($_GET['sort'])){
                $sortMethod = $_GET['sort'];
            }
            $data['products'] = $this->productModel->getProductsByPage($productType, $pageNum, $sortMethod);
            $data['products_count'] = $this->productModel->count('CategoryName', $productType);
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
                if(isset($_GET['sort'])){
                    //need to be implimented
                }
                $this->categoryModel = $this->model('Category');   
                $data['categories'] = $this->categoryModel->getAll();     
                $data['brands'] = $this->productModel->getAllBrands();
                //echo $pageNum;
                //sanitize get array
                $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
                //remove whitespace
                $_GET['search-method'] = trim($_GET['search-method']);
                $_GET['search'] = trim($_GET['search']);
                $sortMethod = '';
                if(isset($_GET['sort'])){
                    $sortMethod = $_GET['sort'];
                }
                $data['products'] = $this->productModel->getProducts($_GET['search-method'], $_GET['search'], $pageNum, $sortMethod);
                $data['products_count'] = $this->productModel->count($_GET['search-method'], $_GET['search']);
                $data['current_page'] = $pageNum;
                $data['is_search'] = true;
                $this->view('products/view', $data);
            }
            else{
                redirect('pages/index');
            }
            
        }      
    }
?>