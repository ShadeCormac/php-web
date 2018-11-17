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
            $data['products_count'] = $this->productModel->count();
            $data['current_page'] = $pageNum;
            $this->view('products/view', $data);
        }
    }
?>