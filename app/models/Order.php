<?php
    class Order{
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function createNewOrder($customerId, $sumPrice, $status = 'pending'){
            $orderId;
            $this->db->query('INSERT INTO order_product(CustomerId, OrderStatus, SumPrice)
                            VALUES(:customerId, :orderStatus, :sumPrice)
                            ');
            $this->db->bind(':customerId', $customerId);
            $this->db->bind(':orderStatus', $status);
            $this->db->bind(':sumPrice', $sumPrice);
            $this->db->execute();
            $orderId = $this->getLastOrderId();
            return $orderId;
        }

        private function getLastOrderId(){
            $this->db->query('SELECT MAX(OrderId) as Id FROM order_product');
            $orderId = $this->db->getSingle();
            return $orderId->Id;
        }

        public function createOrderDetail($orderId, $detail){
            $this->db->query('
                            INSERT INTO order_detail
                            VALUES(:orderId, :productId, :quantity)
            ');
            $this->db->bind(':orderId', $orderId);
            $this->db->bind(':productId', $detail['productId']);
            $this->db->bind(':quantity', $detail['quantity']);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function viewOrderHistory($customerId){
            $this->db->query('SELECT o.OrderId, o.SumPrice, o.CustomerId, o.CreatedAt, d.Quantity, d.ProductId, p.ProductName, p.Price
                             FROM order_product as o join order_detail as d on o.OrderId = d.OrderId join product as p on d.ProductId = p.ProductId
                            Where CustomerId = :customerId
                            ORDER BY o.CreatedAt DESC
                            ');
            $this->db->bind(':customerId', $customerId);
            return $this->db->resultSet();
        }

        public function getAllOrder(){
            $sql = 'SELECT *
            FROM order_product as op join account as ac on op.CustomerId = ac.AccountId
            order by op.CreatedAt desc';
            $this->db->query($sql);
            $data = $this->db->resultSet();
            return $data;
        }

        public function getOrder($id){
            $sql = 'SELECT a.UserName, op.OrderId ,op.CustomerId, op.SumPrice, op.OrderStatus, od.ProductId, od.Quantity, p.ProductName, p.Price
                    FROM order_detail as od join order_product as op on od.OrderId = op.OrderId
                    join product as p on p.ProductId = od.ProductId
                    join account as a on  op.CustomerId = a.AccountId
                    where op.OrderId = :id ';
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $order = $this->db->resultSet();
            return $order;
        }
        public function updateOrder($orderId, $status){
            $sql = 'UPDATE order_product
                    SET OrderStatus = :OrderStatus
                    where OrderId = :id';
             $this->db->query($sql);
             $this->db->bind(':id',$orderId);
             $this->db->bind(':OrderStatus',$status);
             $this->db->execute();
        }
    }
?>