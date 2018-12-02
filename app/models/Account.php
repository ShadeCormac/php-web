<?php
    class Account {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function checkPassword($username, $password){
            $this->db->query('SELECT * FROM account WHERE UserName = :username');
            $this->db->bind(':username', $username);
            $user =  $this->db->getSingle();
            if(password_verify($password, $user->Pass)){
                return true;
            }else return false;
        }

        public function UpdateShippingDetail($username, $detail){
            $this->db->query('
                            UPDATE account
                            SET Address = :address, Phone = :phone
                            WHERE UserName = :username
                            ');
            $this->db->bind(':address', $detail['Address']);
            $this->db->bind(':phone', $detail['Phone']);
            $this->db->bind(':username', $username);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getUserDetail($username){
            $this->db->query('SELECT * FROM account WHERE UserName = :username');
            $this->db->bind(':username', $username);
            $user =  $this->db->getSingle();
            return $user;
            
        }

        public function findAccountByUsername($username){
            $this->db->query('SELECT * FROM account WHERE username = :username');
            $this->db->bind(':username', $username);
            //SELECT statement -> use getSingleI()/resultSet()
            $this->db->getSingle();
            if($this->db->rowCount() > 0){
                return true;
            }
            return false;
        }
        public function register($username, $password){
            $this->db->query('INSERT INTO account(username, pass)
                            VALUES(:username, :pass);
                            ');
            $this->db->bind(':username', $username);
            $this->db->bind(':pass', $password);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
?>