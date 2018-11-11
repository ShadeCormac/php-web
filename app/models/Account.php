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
    }
?>