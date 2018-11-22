<?php 
    class Accounts extends Controller {
        public function __construct(){
            $this->accountModel = $this->model('Account');
        }

        public function index(){
            if(!isLoggedIn()){
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
                    'confirm_password_error' => '',
                    'captcha_error' => ''
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

                $responseData;
                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                    //your site secret key
                    $secret = '6LcbPnsUAAAAAPJ-8EXotw7ezCLBhlF9Kka_t3Aw';
                    //get verify response data
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                    $responseData = json_decode($verifyResponse);
                }
                    
                if(!isset($responseData) || !$responseData->success){
                    $data['captcha_error'] = 'You did not finish the captcha!';
                }
                    

                if(empty($data['username_error']) && empty($data['password_error']) && empty($data['confirm_password_error']) && empty($data['captcha_error'])){
                    //success
                    if($this->accountModel->register($data['username'], password_hash($data['password'], PASSWORD_DEFAULT)) ){
                        //added
                        flash('register_success', 'Registered, now you can log in.');
                        redirect('accounts/login');
                    }else{
                        //something went wrong
                        redirect('accounts/register');
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
                    'confirm_password_error' => '',
                    'captcha_error' => ''
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
                }else if(!empty($data['username'])){
                    //hit database check for username is in db
                    if(!$this->accountModel->findAccountByUserName($data['username'])){
                        $data['username_error'] = "Username does not exist.";
                        
                    }
                }
                
                if(empty($data['password'])){
                    $data['password_error'] = 'Password must be filled.';
                }else {
                    //hit database for password
                    if(!$this->accountModel->checkPassword($data['username'], $data['password'])){
                        $data['password_error'] = "Password does not match.";
                    }
                }

                if(empty($data['username_error']) && empty($data['password_error'])){
                   
                   //getuserid
                   $user = $this->accountModel->getUserDetail($data['username']);
                   createUserSession($user);
                   //redirect to load controller if needed
                   redirect('pages/index');
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

        public function detail(){
            if(isLoggedIn()) {              
                    $row = $this->accountModel->getUserDetail($_SESSION['username']);
                    $data = [
                        'detail' => $row
                    ];
                    //redirect('accounts');
                    $this->view('accounts/detail', $data); 
            }     
        }
        public function logout(){
            session_destroy();
            redirect('pages/index');
        }
    }
?>