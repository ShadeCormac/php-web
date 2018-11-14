<?php
    class Account {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        public function getUserDetail($id){
            $this->db->query('SELECT * FROM account WHERE account = :id');
            $this->db->bind(':id', $id);
            $data =  $this->db->getSingle();
            
            return $data;
            
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
        public function addAccount($username, $password){
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