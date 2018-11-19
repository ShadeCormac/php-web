<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function count($type, $searchString){
            $data = $this->db->query('SELECT * 
                                    FROM product as p join category as c on p.CategoryId = c.CategoryId
                                    where ' . $type . ' like :searchString
                                    ');
            $this->db->bind(':searchString', '%' . $searchString. '%');
            $this->db->resultSet();
            return $this->db->rowCount();
        }

        public function countAll(){
            $this->db->query('SELECT * from product');
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getProduct($id){
            $this->db->query('SELECT * FROM product as p
                            JOIN category as c on p.CategoryId = c.CategoryId
                            WHERE p.ProductId = :id         
            ');
            $this->db->bind(':id', $id);
            $product = $this->db->getSingle();
            return $product;
        }

        public function getProducts($category =''){
            $this->db->query('SELECT * FROM product as p
                            JOIN category as c on p.CategoryId = c.CategoryId
                            WHERE c.CategoryName like :category
                            ');
            $this->db->bind(':category', '%'. $category . '%');
           
            $data = $this->db->resultSet();
            return $data;
        }

        public function getProductsByPage($category, $pageNum){
            $productsPerPage = 1;
            $this->db->query('SELECT * FROM product as p
            JOIN category as c on p.CategoryId = c.CategoryId
            WHERE c.CategoryName like :category
            LIMIT :rowNum , :productsPerPage
            ');
            $this->db->bind(':category', $category);
    
            $rowNum = (($pageNum * $productsPerPage) - 1);
            $this->db->bind(':rowNum', $rowNum);

            $this->db->bind(':productsPerPage', $productsPerPage);

            $data = $this->db->reSultSet();
            return $data;
        }

        public function getProductsByBrand($category, $brand){
            $data = $this->getProducts($category);
            $data = array_filter($data, function($item){
                if(isset($item->Producer)){
                    if($item->Producer == $brand){
                        return true;
                    }
                }
                return false;
            });
        }

        public function getProducts1($type, $searchString, $page){
            $data = $this->db->query('SELECT * 
                                    FROM product as p join category as c on p.CategoryId = c.CategoryId
                                    where ' . $type . ' like :searchString
                                    LIMIT :rowNum, :productsPerPage
                                    ');
            $productsPerPage = 1;
            //$this->db->bind(':typeSearch', $type);
            $this->db->bind(':searchString', '%'.$searchString.'%');
            $rowNum = (($page * $productsPerPage) - 1);
            $this->db->bind(':rowNum', $rowNum);
                        
            $this->db->bind(':productsPerPage', $productsPerPage);
            $data['products'] = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $data;
            }
                
        }
    }
?>