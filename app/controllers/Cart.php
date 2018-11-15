<?php 
    class Cart extends Controller{
        public function index(){
            //view items by loading products from SESSION
            $this->view('cart/index');
        }
        public function checkout(){
            if(empty($_SESSION['isLoggedIn'])){
                
                redirect('accounts/login');
            }
        }
    }
?>