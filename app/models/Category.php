<?php
    class Category {
        private $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAll(){
            $this->db->query('SELECT DISTINCT CategoryName from Category');
            return $this->db->resultSet();
        }
    }
?>