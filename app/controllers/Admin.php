<?php 
    class Admin extends Controller{
      public function __construct(){
        //kiem tra tai khoan admin
        if(isset($_SESSION['isLoggedIn'])){
          if($_SESSION['usertype'] == 1)
            {
              $this->productModel = $this->model('Product'); 
            }else {
              redirect('pages/index');
            }
          }else {
            redirect('accounts/login');
          }
            
      }

      public function index(){
        $searchString = '';
        if (isset($_GET['search'])) {
          $searchString = $_GET['search'];
        }
        $data = $this->productModel->getAllProducts($searchString);
        $this->view('admin/index', $data);
      }

      public function delete_product($productId) {
        
        $product = $this->productModel->getProduct($productId);
        if($product!= NULL){
          unlink(dirname(__ROOT__) . '/public' .$product->ImageSource);
          $this->productModel->deleteProduct($productId);
        }
        redirect('admin/index');
      }

      public function add() {
        $data=$this->productModel->getAllCategory();
        $this->view('admin/add',$data);
      }

      public function create() {
        if($_POST["Category"]==1){
          $target_dir = "images/products/laptop/";
        }
        if($_POST["Category"]==2){
          $target_dir = "images/products/mobile/";
        }
        if($_POST["Category"]==3){
          $target_dir = "images/products/keyboard/";
        }
        if($_POST["Category"]==4){
          $target_dir = "images/products/headphone/";
        }
        //$target_file = $target_dir . basename($_FILES["ImageSource"]["name"]);
        //move_uploaded_file($_FILES["ImageSource"]["tmp_name"], $target_file);

        //$_POST["ImageSource"]="/".$target_file;
        //print_r($_POST);
        //die();
        if(!empty($_POST['ProductName']) &&
        !empty($_POST['Description']) && 
        !empty($_POST['Category']) &&
        !empty($_POST['Producer']) &&
        !empty($_POST['Origin']) &&
        !empty($_POST['Quantity']) &&
        !empty($_FILES['ImageSource']['name']) &&
        !empty($_POST['Price'])){
        $this->productModel->insertProduct($_POST);
        $id = $this->productModel->GetLatestProduct();
        $temp = explode('.', $_FILES['ImageSource']['name']);
        $file_name = $id . '.' . end($temp);
        move_uploaded_file($_FILES['ImageSource']['tmp_name'], dirname(__ROOT__) . '/public/' . $target_dir . $file_name);
        $path= "/" . $target_dir . $file_name;
        $this->productModel->UpdateImage($id, $path);
        redirect('admin/index');
        } else {
          redirect('admin/add');
        }
      }
    

    public function edit($productId) {
      $data = [];
      $data["categories"]=$this->productModel->getAllCategory();
      $data["product"] =$this->productModel->getProduct($productId);
      $this->view('admin/edit', $data);
    }

    public function update(){
      
        if($_POST["Category"]==1){
        $target_dir = "images/products/laptop/";
      }
      if($_POST["Category"]==2){
        $target_dir = "images/products/mobile/";
      }
      if($_POST["Category"]==3){
        $target_dir = "images/products/keyboard/";
      }
      if($_POST["Category"]==4){
        $target_dir = "images/products/headphone/";
      }
      if(!empty($_POST['ProductName']) &&
      !empty($_POST['Description']) && 
      !empty($_FILES['ImageSource']['tmp_name']) &&
      !empty($_POST['Category']) &&
      !empty($_POST['Producer']) &&
      !empty($_POST['Origin']) &&
      !empty($_POST['Price'])&&
      !empty($_POST['Quantity']))  {
        $id = $_POST['product-id'];
        $product = $this->productModel->getProduct($id);
        unlink(dirname(__ROOT__) . '/public' .$product->ImageSource);
        $temp = explode('.', $_FILES['ImageSource']['name']);
        $file_name = $id . '.' . end($temp);
        $newfile = dirname(__ROOT__) . '/public/' . $target_dir . $file_name;
        move_uploaded_file($_FILES['ImageSource']['tmp_name'], $newfile);
        $path= "/" . $target_dir . $file_name;
        $this->productModel->UpdateImage($id, $path);
        $this->productModel->updateProduct($id, $_POST);
        redirect('admin/index');
      }
      else {
        redirect('admin/edit/' . $_POST['product-id']);
      }
    }

    public function order() {
      $this->orderModel = $this->model("Order");
      $data= $this->orderModel->getAllOrder();
      $this->view('admin/order',$data);
    }

    public function orderEdit($orderId) {
      $data = [];
      $this->orderModel = $this->model("Order");
      $data['order_detail'] = $this->orderModel->getOrder($orderId);
      $this->accountModel = $this->model('Account');
      $data['user_detail'] = $this->accountModel->getUserDetail($data['order_detail'][0]->UserName);      
      $this->view('admin/orderEdit', $data);
    }

  public function orderUpdate(){
    if(!empty($_POST['OrderStatus'])) {
      $this->orderModel = $this->model("Order");
      $id = $_POST['OrderId'];
      $order = $this->orderModel->getOrder($id);
      $this->orderModel->updateOrder($id, $_POST['OrderStatus']);
      redirect('admin/order');
    }
    else {
      redirect('admin/orderEdit/' . $_POST['OrderId']);
    }
  }

    public function account(){
      $this->accountModel = $this->model('Account');
      $data = $this->accountModel->getAllAccount();
      $this->view('admin/account', $data);
    }

    public function accountEdit($accountId){
      $this->accountModel = $this->model('Account');
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $type = $_POST['Type'];
        $this->accountModel->accountUpdate($accountId,$type);
        redirect('admin/account');
      }else {
        
        $data = $this->accountModel->getAccount($accountId);
        $this->view('/admin/accountEdit', $data);
      }
    }

  }
?>