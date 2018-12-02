<?php require __ROOT__.'/views/include/header.php'; ?>
 <div class="content">
            <div class="container">
                <div class="site-title"><div class="site-inside"><span>Checkout</span></div></div> 
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="order-title">Your order</div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="checkout-info">
                                    <li class="checkout-info-1">Product</li>
                                    <li class="checkout-info-2">Total</li>
                                </ul>

                                <div class="checkout-info-box">
                                    <!-- REPEAT PRODUCT -->
                                    <?php foreach($data['cart_items'] as $key => $product) :?>
                                        <ul class="checkout-product">
                                            <li class="checkout-product-1"><?=$product['product_name']?> x<?=$product['quantity']?></li>
                                            <li class="checkout-product-2"><?=number_format($product['product_price'] * $product['quantity'])?> VND</li>
                                        </ul>
                                    <?php endforeach;?>
                                    <ul class="checkout-product o-last">
                                        <li class="checkout-product-1">Shipping</li>
                                        <li class="checkout-product-2">Free shipping</li>
                                    </ul>
                                    <ul class="checkout-product last">
                                        <li class="checkout-product-1">Order total</li>
                                        <li class="checkout-product-2"><?=number_format($data['total'])?> VND</li>
                                    </ul>
                                    <!-- CART DETAILS -->
                                </div>

                            </div>
                            <div class="clear"></div>
                            
                                <div class="col-md-12">
                                    <div class="login-form-box">
                                        <form class="login-form" method='post'>
                                            <?php if(empty($data['account']->Address) || empty($data['account']->Phone)): ?>
                                                <h3>Shipping details</h3>
                                                <p>Address</p>
                                                <input type="text" name="address" class="login-line">
                                                <p>Contact number</p>
                                                <input type="text" name="contact-number" class="login-line">
                                            <?php else: ?>
                                                <h3>Shipping details</h3>
                                                <p>Address</p>
                                                <h1><?=$data['account']->Address?></h1>
                                                <p>Contact number</p>
                                                <h1><?=$data['account']->Phone?></h1>
                                            <?php endif;?>
                                            <input type="submit" name='submit' value="place order" class="button-6 col-xs-offset-5">
                                        </form>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php require __ROOT__.'/views/include/footer.php'; ?>