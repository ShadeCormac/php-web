<?php 
    class Accounts extends Controller {
        public function __construct(){
            $this->accountModel = $this->model('Account');
        }

        public function index(){
            if(!empty($_SESSION['isLoggedIn'])){
                //already logged in, redirect to details
                redirect('accounts/detail');
            }else{
                //not log in,redirect to log in page
                redirect('accounts/login');
            }
        }

        public function register(){
            //check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Validate the form's data
                //sanitize data first
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //get the data from POST
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm-password']),
                    'username_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];
                //validate username
                if(empty($data['username'])){
                    $data['username_error'] = 'Username must be filled.';
                }else {
                    //check for used username
                    if($this->accountModel->findAccountByUsername($data['username'])){
                        $data['username_error'] = 'Username is already taken.';
                    }
                    
                }
                

                //validate password
                if(empty($data['password'])){
                    $data['password_error'] = 'Password must be filled.';
                }else if(strlen($data['password']) < 6){
                    $data['password_error'] = 'Password must be at least 6 characters.';
                }

                //validate confirm password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_error'] = 'Confirm password must be filled.';
                }else if(strcmp($data['password'], $data['confirm_password']) !== 0){
                    $data['confirm_password_error'] = "Passwords do not match.";
                }

                if(empty($data['username_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])){
                    //success
                    if($this->accountModel->addAccount($data['username'], password_hash($data['password'], PASSWORD_DEFAULT)) > 0){
                        //added
                        flash('register_success', 'Registered, now you can log in.');
                        redirect('accounts/login');
                    }else{
                        //something went wrong
                        die('something went wrong..');
                    }

                }else{
                    $this->view('accounts/register', $data);
                }
            } else {    
                //init data
                $data = [
                    'username' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'username_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];
                // Load view
                $this->view('accounts/register', $data);
            }
            
        }

        public function login(){
             //check for POST
             if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 
                //sanitize data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Validate the form's data
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),    
                    'username_error' => '',
                    'password_error' => '',     
                ];

                if(empty($data['username'])){
                    $data['username_error'] = 'Username must be filled.';
                }else{
                    //hit database check for username is in db
                }

                if(empty($data['password'])){
                    $data['password_error'] = 'Password must be filled.';
                }else{
                    //hit database for password
                }

                if(empty($data['username_error']) && empty($data['password_error'])){
                   $_SESSION['isLoggedIn'] = true;
                   //getuserid
                   $_SESSION['userid'] = ''; 
                }else{
                    $this->view('accounts/login', $data);
                }
                
            } else {    
                //init data
                $data = [
                    'username' => '',
                    'password' => '',    
                    'username_error' => '',
                    'password_error' => '',     
                ];
                // Load view
                $this->view('accounts/login', $data);
            }
        }

        public function detail($id){
            if(!empty($_SESSION['isLoggedIn'])) {
                if($_SESSION['userid'] == $id){
                    $row = $this->accountModel->getUserDetail($id);
                    $data = [
                        'detail' => $row
                    ];
                    //redirect('accounts');
                    $this->view('accounts/detail', $data);
                } else {
                    //other user tries to access 
                    redirect('pages/index');
                }
                
            }     
        }
        public function logout(){
            session_destroy();
            $this->view('pages/index', []);
        }
    }
?>