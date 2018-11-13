<?php 
    class Accounts extends Controller {
        public function __construct(){
            $this->accountModel = $this->model('Account');
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
                        flash('register_success', 'Register suceeded, now you can log in.');
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
                   echo 'succ'; 
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
            $row = $this->accountModel->getDetail($id);

            $data = [
                'detail' => $row
            ];
            redirect('Pages');
            $this->view('accounts/detail', $data);
            
        }
    }
?>