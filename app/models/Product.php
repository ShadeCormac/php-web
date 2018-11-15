<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getItem(){
            $this->db->query('SELECT * FROM product');
            $data = $this->db->resultSet();
            return $data;
        }
    }
?>