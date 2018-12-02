<?php 
    class Cart extends Controller{
        public function __construct(){
            if(empty($_SESSION['isLoggedIn'])){
                redirect('accounts/login');
            }
        }

        public function index(){
            //view items by loading products from SESSION
            //print_r($_SESSION['cart_items']);
            $data= [];
            if(!empty($_SESSION['cart_items'])){
                $data['cart_items'] = $_SESSION['cart_items'];
            }
            $this->view('cart/index', $data);
        }
        public function checkout(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['submit'])){    
                    if(empty($_SESSION['cart_items'])){
                         //empty cart
                         redirect('cart/index');
                        exit();
                    }

                    if(isset($_POST['address']) && isset($_POST['contact-number'])){
                        if(!empty($_POST['address']) && !empty($_POST['contact-number'])){
                            if(preg_match("/^[0-9]{10}$/", $_POST['contact-number'])){
                                //regex passed
                                $this->accountModel = $this->model('Account');
                                $detail = [
                                    'Address' => $_POST['address'],
                                    'Phone' => $_POST['contact-number']
                                        ];                    
                                if($this->accountModel->UpdateShippingDetail($_SESSION['username'], $detail)){
                                    //update success

                                    //process order
                                    //step 1: make new order(order_product)
                                    $this->orderModel = $this->model('Order');
                                    $this->productModel = $this->model('Product');
                                    $orderId = $this->orderModel->createNewOrder($_SESSION['userid'], getTotalPrice());
                                    //step 2: for each product, fill in order_detail
                                    foreach($_SESSION['cart_items'] as $key => $product){
                                        $detail = [
                                            'productId' => $product['product_id'],
                                            'quantity' => $product['quantity']
                                        ];
                                        $this->orderModel->createOrderDetail($orderId, $detail);
                                        $this->productModel->UpdateQuantity($product['product_id'], $product['quantity']);
                                    }                           
                                    //step 3: unset cart_items session
                                    unset($_SESSION['cart_items']);
                                    //step 4: redirect to main page
                                    redirect('pages/index');
                                            
                                }else{
                                    //update fails
                                    die('something went wrong..');
                                }
                            }else {
                                //regex doesnt pass
                                redirect('cart/checkout');                             
                            }       
                        } else{
                            redirect('cart/checkout');
                            exit("form doesnt fill out");
                        }
                    }else {
                        //adready has info
                        
                        //step 1: make new order(order_product)
                        $this->orderModel = $this->model('Order');
                        $this->productModel = $this->model('Product');
                        $orderId = $this->orderModel->createNewOrder($_SESSION['userid'], getTotalPrice());
                        //step 2: for each product, fill in order_detail
                        foreach($_SESSION['cart_items'] as $key => $product){
                            $detail = [
                                'productId' => $product['product_id'],
                                'quantity' => $product['quantity']
                            ];
                            $this->orderModel->createOrderDetail($orderId, $detail);
                            $this->productModel->UpdateQuantity($product['product_id'], $product['quantity']);
                        }                           
                        //step 3: unset cart_items session
                        unset($_SESSION['cart_items']);
                        //step 4: redirect to main page
                        redirect('pages/index');
                    }         
                }     
            }else{
                //init checkout page
                //getting user info
                $this->accountModel = $this->model('Account');
                
                $accountInfo = $this->accountModel->getUserDetail($_SESSION['username']);
                
                $data['account'] = $accountInfo;
                $data['cart_items'] = $_SESSION['cart_items'];
                $data['total'] = getTotalPrice();
                print_r($data);
                $this->view('cart/checkout', $data);
            }
        }
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->productModel = $this->model('Product');
                $productDetail;
                $product;
                $quantity;
                if(count($_POST) == 2){
                    $quantity = getCurrentQuantity($_POST['product_id']);
                    $productDetail = $this->productModel->getProduct($_POST['product_id']);
                    if($quantity + $_POST['quantity'] <= $productDetail->Quantity){
                        $product = [
                            'product_id' => $productDetail->ProductId,
                            'product_name' => $productDetail->ProductName,
                            'product_image' => $productDetail->ImageSource,
                            'product_price' => $productDetail->Price
                        ];
                    }else {
                        redirect('pages/index');
                        exit();
                    }
                }
                else {
                    $productDetail = $this->productModel->getProduct($_POST['product-id']);
                    $quantity = getCurrentQuantity($_POST['product-id']);
                    $max_quantity = $productDetail->Quantity;
                    if($quantity + $_POST['quantity'] <= $max_quantity){
                    //need to check stock quantity before adding
                        $product = [
                                'product_id' => $_POST['product-id'],
                                'product_name' => $_POST['product-name'],
                                'product_image' => $_POST['product-image'],
                                'product_price' => $_POST['product-price'],
                        ];
                    }else {
                        redirect('pages/index');
                        exit();
                    }
                }
               addToCart($product, $_POST['quantity'] + $quantity);
            }
            //$data = [];
            redirect('pages/index');
        }

        public function update(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['product_id']) && isset($_POST['quantity'])){
                    $this->productModel = $this->model('Product');
                    
                    foreach($_SESSION['cart_items'] as $key => $value){
                        if($key == $_POST['product_id']){
                            $max_quantity = $this->productModel->getQuantity($key);
                            if(getCurrentQuantity($key) + (int)$_POST['quantity'] <= $max_quantity){
                                $_SESSION['cart_items'][$key]['quantity'] = (int)$_SESSION['cart_items'][$key]['quantity'] + (int)$_POST['quantity'];
                                if($_SESSION['cart_items'][$key]['quantity'] <= 0){
                                    unset($_SESSION['cart_items'][$key]);
                                }
                                break;
                            }
                                
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