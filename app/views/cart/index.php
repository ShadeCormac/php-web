<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="content">
            <div class="container">
                <h2>Shopping cart</h2>

                <div class="shopping-cart">
                    <div class="shopping-cart-products">
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">Product image</li>
                            <li class="shopping-2">Product name</li>
                            <li class="shopping-3">Description</li>
                            <li class="shopping-4">Quantity</li>
                            <li class="shopping-5">Unit price</li>
                            <li class="shopping-6">Total</li>
                        </ul>

                        <!-- REPEAT BY PRODUCT -->
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">
                                <img src="images/photos/image-14.jpg" alt="product image" />
                            </li>
                            <li class="shopping-2">
                                <a href="#">Stripe boucle</a>
                                <p>blazer blue</p>
                            </li>
                            <li class="shopping-3">
                                <p>Colour - blue</p>
                                <p>Size US (S)</p>
                            </li>
                            <li class="shopping-4">
                                <input type="button" value="-" class="minus">
                                <input type="number" step="1" min="1" name="quantity" value="3" title="Qty" class="input-text qty text">
                                <input type="button" value="+" class="plus">
                            </li>
                            <li class="shopping-5">
                                $ 50
                            </li>
                            <li class="shopping-6">
                                $ 150 <button>x</button>
                            </li>
                        </ul>
                        <!-- REPEAT BY PRODUCT -->

                        <!-- REPEAT BY PRODUCT -->
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">
                                <img src="images/photos/image-11.jpg" alt="product image" />
                            </li>
                            <li class="shopping-2">
                                <p><a href="#">Stripe boucle</a><br/>
                                    blazer blue</p>
                            </li>
                            <li class="shopping-3">
                                <p>Colour - blue<br/>
                                    Size US (S)</p>
                            </li>
                            <li class="shopping-4">
                                <input type="button" value="-" class="minus">
                                <input type="number" step="1" min="1" name="quantity" value="2" title="Qty" class="input-text qty text">
                                <input type="button" value="+" class="plus">
                            </li>
                            <li class="shopping-5">
                                $ 50
                            </li>
                            <li class="shopping-6">
                                $ 100 <button>x</button>
                            </li>
                        </ul>
                        <!-- REPEAT BY PRODUCT -->

                        <!-- REPEAT BY PRODUCT -->
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">
                                <img src="images/photos/image-12.jpg" alt="product image" />
                            </li>
                            <li class="shopping-2">
                                <a href="#">Stripe boucle</a>
                                <p>blazer blue</p>
                            </li>
                            <li class="shopping-3">
                                <p>Colour - blue</p>
                                <p>Size US (S)</p>
                            </li>
                            <li class="shopping-4">
                                <input type="button" value="-" class="minus">
                                <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text">
                                <input type="button" value="+" class="plus">
                            </li>
                            <li class="shopping-5">
                                $ 50
                            </li>
                            <li class="shopping-6">
                                $ 50 <button>x</button>
                            </li>
                        </ul>
                        <!-- REPEAT BY PRODUCT -->

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?=__URL__ ;?>/pages/index" class="button-7">Continue shopping</a>
                        </div>
                        <div class="col-md-5">
                            <div class="coupon">
                                <input class="input-line" type="text" name="coupon" />
                                <button class="button-6">Apply</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkout-total">
                                <p>Sub-total : $ 120</p>
                                <p>TAX Total : $ 20</p>
                                <p>Shipment Fee : $ 0.00</p>
                                <hr/>
                                <p>Total : $ 120</p>
                                <button class="button-6">Checkout</button>
                            </div>
                        </div>
                    </div>  
                </div>             
            </div>
        </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>