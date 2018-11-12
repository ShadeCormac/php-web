<?php 
    class Accounts extends Controller {
        public function __construct(){
            $this->accountModel = $this->model('Account');
        }

        public function register(){
            //check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Validate the form's data
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