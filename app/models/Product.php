<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function getQuantity($productId){
            $this->db->query('SELECT * FROM product
                                WHERE ProductId = :productId
                            ');
            $this->db->bind(":productId", $productId);
            $product = $this->db->getSingle();
            return $product->Quantity;
        }

        public function increaseView($productId){
            $this->db->query('UPDATE product
                            SET ViewCount = ViewCount + 1
                            WHERE ProductId = :productId
                            ');
            $this->db->bind(':productId', $productId);
            $this->db->execute();
        }

        public function updateQuantity($productId, $quantity){
            $this->db->query('UPDATE product
                            SET Quantity = Quantity - :quantity, SellCount = SellCount + :quantity
                            WHERE ProductId = :productId
                            ');
            $this->db->bind(':quantity', $quantity);
            $this->db->bind(':productId', $productId);
            $this->db->execute();
            return $this->db->rowCount();
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
        public function UpdateImage($productId, $path){
            $this->db->query('UPDATE product
                            SET ImageSource = :path
                            WHERE ProductId = :productId
                            ');
            $this->db->bind(":path", $path);
            $this->db->bind(':productId', $productId);
            $this->db->execute();
        }

        public function deleteProduct($productId) {
            $sql = 'DELETE FROM product where ProductId = :id';
            $this->db->query($sql);
            $this->db->bind(':id', $productId);
            $this->db->execute();
        }

        public function getLatestProduct(){
            $this->db->query('Select MAX(ProductId) as Id FROM product');
            return $this->db->getSingle()->Id;
        }

        public function insertProduct($param){
            $sql = 'INSERT INTO product ( ProductName, Description, ImageSource, CategoryId, Producer, Origin, Price, ViewCount, SellCount, Quantity)
                    values(:ProductName, :Description,0, :CategoryId, :Producer, :Origin, :Price, 0, 0, :Quantity)';
            $this->db->query($sql);
            $this->db->bind(':ProductName', $param["ProductName"]);
            $this->db->bind(':Description', $param["Description"]);
            //$this->db->bind(':ImageSource', $param["ImageSource"]);
            $this->db->bind(':CategoryId', $param["Category"]);
            $this->db->bind(':Producer', $param["Producer"]);
            $this->db->bind(':Origin', $param["Origin"]);
            $this->db->bind(':Price', $param["Price"]);
            //$this->db->bind(':ViewCount', $param["ViewCount"]);
            //$this->db->bind(':SellCount', $param["SellCount"]);
            $this->db->bind(':Quantity', $param["Quantity"]);
            $this->db->execute();
        }

        public function updateProduct($productId, $product){
            $sql = 'UPDATE product
                    SET ProductName = :ProductName, Description = :Description,
                    CategoryId = :CategoryId, Producer = :Producer, Origin = :Origin, Price = :Price,
                    Quantity = :Quantity
                    where ProductId = :id';
             $this->db->query($sql);
             $this->db->bind(':id', $productId);
             $this->db->bind(':ProductName', $product["ProductName"]);
             $this->db->bind(':Description', $product["Description"]);
            // $this->db->bind(':ImageSource', $product["ImageSource"]);
             $this->db->bind(':CategoryId', $product["Category"]);
             $this->db->bind(':Producer', $product["Producer"]);
             $this->db->bind(':Origin', $product["Origin"]);
             $this->db->bind(':Price', $product["Price"]);
             $this->db->bind(':Quantity', $product["Quantity"]);
             $this->db->execute();
        }
        public function getAllCategory(){
            $sql = 'SELECT *
                    FROM category';
            $this->db->query($sql);
            $data = $this->db->resultSet();
            return $data;
        }
        public function getAllProducts($searchString){
            $sql = 'SELECT * FROM product as p join category as c on p.CategoryId = c.CategoryId';
            if ($searchString != '') {
                $sql = $sql . ' where p.ProductName like :searchString';
                $this->db->query($sql);
                $this->db->bind(':searchString', '%'.$searchString.'%');
            } else {
                $this->db->query($sql);
            }
            
            $data = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $data;
            }  
        }
    }
?>