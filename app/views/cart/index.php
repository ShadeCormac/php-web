<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="content">
            <div class="container">
                <div class="text-center">
                    <?php flash('cart-update-message'); flash('cart-message'); ?>

                </div>

                <h2>Shopping cart</h2>

                <div class="shopping-cart">
                    <div class="shopping-cart-products">
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">Product image</li>
                            <li class="shopping-2">Product name</li>
                            <li class="shopping-3">Quantity</li>
                            <li class="shopping-4">Unit price</li>
                            <li class="shopping-5">Total</li>
                        </ul>

                        
                        <?php if(!empty($data['cart_items'])):?>
                            <?php foreach($data['cart_items'] as $product): ?>
                                <ul class="shopping-product-detail">
                                    <li class="shopping-1">
                                        <img src="<?=__URL__ . $product['product_image']?>" alt="product image" />
                                    </li>
                                    <li class="shopping-2">
                                        <a href="<?=__URL__?>/products/detail/<?=$product['product_id']?>"><?=$product['product_name']?></a>
                                        
                                    </li>
                                    
                                    <li class="shopping-3">
                                        <input onclick=decreaseQuantity(<?=$product['product_id']?>) type="button" value="-" class="minus">
                                        <input type="number" readonly disable step="1" min="1" name="quantity" value="<?=$product['quantity']?>" title="Qty" class="input-text qty text">
                                        <input onclick=addQuantity(<?=$product['product_id']?>) type="button" value="+" class="plus">
                                    </li>
                                    <li class="shopping-4">
                                        <?=number_format($product['product_price'])?> VND
                                    </li>
                                    <li class="shopping-5">
                                        <?=number_format($product['product_price'] * $product['quantity'])?> VND
                                    </li>
                                    <li><button onclick=removeItem(<?=$product['product_id']?>) class="button-4 col-xs-offset-3">X</button></li>
                                </ul>
                            <?php endforeach;?>
                        <?php endif;?>  
                        

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?=__URL__ ;?>" class="button-7">Continue shopping</a>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="checkout-total">
                                <p>Total : <?=number_format(getTotalPrice())?> VND</p>
                                <a href='<?=__URL__?>/cart/checkout' class="button-6">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:160px;"> </div>
                </div>             
            </div>
        </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>