<?php
    function addToCart($product, $quantity){
        //need to handle update quantity later
        $data=[
            'product_id' => $product['product_id'],
            'product_name' => $product['product_name'],
            'product_image' => $product['product_image'],
            'product_price' => $product['product_price'],
            'quantity' => $quantity
        ];
        //set the data, using ProductId as key
        $_SESSION['cart_items'][$product['product_id']] = $data;
    }

    function removeFromCart($product){
        unset($_SESSION['cart_items'][$product->ProductId]);
    }

    function countCartItems(){
        return (!empty($_SESSION['cart_items']))?count($_SESSION['cart_items']): 0;
    }

    function getTotalPrice(){
        if(!empty($_SESSION['cart_items'])){
            $total = 0;
            foreach($_SESSION['cart_items'] as $product){
                $total += $product['product_price'] * $product['quantity'];
            }
            return $total;
        }
        else return 0;
    }

    
?>