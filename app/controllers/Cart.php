<?php 
    class Cart extends Controller{
        public function index(){
            //view items by loading products from SESSION
            if(empty($_SESSION['isLoggedIn'])){
                redirect('accounts/login');
            }
            $data= [];
            if(!empty($_SESSION['cart_items'])){
                $data['cart_items'] = $_SESSION['cart_items'];
            }
            $this->view('cart/index', $data);
        }
        public function checkout(){
            if(empty($_SESSION['isLoggedIn'])){
                
                redirect('accounts/login');
            }
        }
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //need to check stock quantity before adding
               $product = [
                    'product_id' => $_POST['product-id'],
                    'product_name' => $_POST['product-name'],
                    'product_image' => $_POST['product-image'],
                    'product_price' => $_POST['product-price'],
               ];
               addToCart($product, $_POST['quantity']);
            }
            //$data = [];
            redirect('pages/index');
        }

        public function update(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['product_id']) && isset($_POST['quantity'])){
                    foreach($_SESSION['cart_items'] as $key => $value){
                        if($key == $_POST['product_id']){
                            $_SESSION['cart_items'][$key]['quantity'] = (int)$_SESSION['cart_items'][$key]['quantity'] + (int)$_POST['quantity'];
                            break;
                        }
                    }
                    //$this->view('cart/index');
                }

            } 
            redirect('cart/index');  
        }

        public function remove(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['product_id'])){
                    foreach($_SESSION['cart_items'] as $key => $value){
                        if($key == $_POST['product_id']){
                            unset($_SESSION['cart_items'][$key]);
                        }
                    }
                    //$this->view('cart/index');
                }
            }
            redirect('cart/index');
        }
    }
?>