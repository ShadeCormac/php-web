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


  }
?>