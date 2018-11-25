<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function count($type, $searchString=''){
            $data = $this->db->query('SELECT * 
                                    FROM product as p join category as c on p.CategoryId = c.CategoryId
                                    where ' . $type . ' like :searchString
                                    ');
            $this->db->bind(':searchString', '%' . $searchString. '%');
            $this->db->resultSet();
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

        public function getProductsByBrand($brand, $pageNum){
            $productsPerPage = 9;
            $this->db->query('SELECT * FROM product as p
            JOIN category as c on p.CategoryId = c.CategoryId
            WHERE p.Producer like :producer
            LIMIT :rowNum , :productsPerPage
            ');
            $this->db->bind(':producer', $brand);
    
            $rowNum = (($pageNum -1) * $productsPerPage);
            $this->db->bind(':rowNum', $rowNum);

            $this->db->bind(':productsPerPage', $productsPerPage);

            $data = $this->db->reSultSet();
            return $data;
        }

        public function getProductsByPage($category, $pageNum){
            $productsPerPage = 9;
            $this->db->query('SELECT * FROM product as p
            JOIN category as c on p.CategoryId = c.CategoryId
            WHERE c.CategoryName like :category
            LIMIT :rowNum , :productsPerPage
            ');
            $this->db->bind(':category', $category);
    
            $rowNum = (($pageNum -1) * $productsPerPage);
            $this->db->bind(':rowNum', $rowNum);

            $this->db->bind(':productsPerPage', $productsPerPage);

            $data = $this->db->reSultSet();
            return $data;
        }


        public function getProducts($type, $searchString, $page){
            $this->db->query('SELECT * 
                                    FROM product as p join category as c on p.CategoryId = c.CategoryId
                                    where ' . $type . ' like :searchString
                                    LIMIT :rowNum, :productsPerPage
                                    ');
            $productsPerPage = 9;
            //$this->db->bind(':typeSearch', $type);
            $this->db->bind(':searchString', '%'.$searchString.'%');
            $rowNum = (($page - 1) * $productsPerPage);
            $this->db->bind(':rowNum', $rowNum);
                        
            $this->db->bind(':productsPerPage', $productsPerPage);
            $data = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $data;
            }
                
        }
        
        public function getRelatedTypeProducts($categoryName){
            $this->db->query('SELECT * FROM product as p JOIN category as c
                            ON p.CategoryId = c.CategoryId
                            WHERE c.CategoryName = :categoryName
                            LIMIT 0, 5
                            ');
            $this->db->bind(':categoryName', $categoryName);
            return $this->db->resultSet();
        }

        public function getRelatedBrandProducts($brandName){
            $this->db->query('SELECT * FROM product as p 
                            WHERE p.Producer like :brandName
                            LIMIT 0, 5'
                            );
            $this->db->bind(':brandName', $brandName);
            return $this->db->resultSet();
        }

        public function Top10($columnName){
            $this->db->query('SELECT * from product 
                            ORDER BY '.$columnName.' DESC
                            LIMIT 0, 10');
            //$this->db->bind(':columnName', $columnName);
            return $this->db->resultSet();
        }
    }
?>