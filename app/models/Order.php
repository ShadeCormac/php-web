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
    }
?>