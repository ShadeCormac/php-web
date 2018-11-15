<?php
    class Products extends Controller{
        public function __construct(){
            
        }
        public function detail(){
            $this->view('products/detail');
        }
    }
?>