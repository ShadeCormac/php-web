<?php
    class Account {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        public function getDetail($id){
            $this->db->query('SELECT * FROM ACCOUNT WHERE ACCOUNTID = :id');
            $this->db->bind(':id', $id);
            $data =  $this->db->getSingle();
            
            return $data;
            
        }
        public function findAccountByUsername($username){
            $this->db->query('SELECT * FROM ACCOUNT WHERE USERNAME = :username');
            $this->db->bind(':username', $username);
            //SELECT statement -> use getSingleI()/resultSet()
            $this->db->getSingle();
            if($this->db->rowCount() > 0){
                return true;
            }
            return false;
        }
        public function addAccount($username, $password){
            $this->db->query('INSERT INTO ACCOUNT(USERNAME, PASS)
                            VALUES(:username, :pass);
                            ');
            $this->db->bind(':username', $username);
            $this->db->bind(':pass', $password);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
?>