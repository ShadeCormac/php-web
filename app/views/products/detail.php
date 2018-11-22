<?php require __ROOT__.'/views/include/header.php'; ?>

       <div class="content">
            <div class="product-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <img src="<?=__URL__ . $data['product']->ImageSource?>" alt="<?=$data['product']->ProductName?>">
                        </div>
                        <div class="col-md-6">
                            <h2><?=$data['product']->ProductName?></h2>
                            
                            
                            <div class="clear"></div>
                            <div class="quantity">
                                <input type="button" value="-" class="minus" onclick=decreaseQuantity()>
                                <input type="number" step="1" min="1" name="quantity" id='quantity-id' value="1" title="Qty" class="input-text qty text">
                                <input type="button" value="+" class="plus" onclick=addQuantity()>
                                <span><?=$data['product']->SellCount?> sold / <?=$data['product']->Quantity?> available</span>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-price">PRICE : <?=number_format($data['product']->Price)?> VND</div>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="button-2">add to shopping bag</a>
                                    
                                </div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <p><?=nl2br($data['product']->Description)?></p>
                                    
                                    <ul class="social-share">
                                        <li><span>Share</span></li>
                                        <li><a href="#"><i class="icon-160" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-138" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-106" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-169" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-163" title="161"></i></a></li>
                                    </ul>
                                </div>
                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                    <div class="site-title">
                        <ul class="wrapper-arrows">
                            <li><i class="icon-517 prev" title="left arrow"></i></li>
                            <li><i class="icon-501 next" title="right arrow"></i></li>
                        </ul>
                        <div class="site-inside"><span>We also recommend</span></div
                    ></div> 
                    <div class="row">
                        <div class="tesla-carousel-items">
                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-4.jpg" alt="product name" />
                                    </div>    
                                    <div class="product-details">  
                                        <h1><a href="#">Black Dress</a></h1>
                                        <p>Black evening dress of genuine tissue</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $135
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-3.jpg" alt="product name" />
                                    </div>  
                                    <div class="product-details">    
                                        <h1><a href="#">Black Dress</a></h1>
                                        <p>Black evening dress of genuine tissue</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $135
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-2.jpg" alt="product name" />
                                    </div>  
                                    <div class="product-details">    
                                        <h1><a href="#">Black Dress</a></h1>
                                        <p>Black evening dress of genuine tissue</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $135
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-1.jpg" alt="product name" />
                                    </div> 
                                    <div class="product-details">     
                                        <h1><a href="#">Black Dress</a></h1>
                                        <p>Black evening dress of genuine tissue</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $135
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-4.jpg" alt="product name" />
                                    </div>  
                                    <div class="product-details">    
                                        <h1><a href="#">Red Dress</a></h1>
                                        <p>Red evening dress for tonight</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $335
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-3.jpg" alt="product name" />
                                    </div>   
                                    <div class="product-details">   
                                        <h1><a href="#">Burgunday Dress</a></h1>
                                        <p>Burgunday velvet</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $85
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-2.jpg" alt="product name" />
                                    </div>  
                                    <div class="product-details">    
                                        <h1><a href="#">Jacquard Dress</a></h1>
                                        <p>Grey jacquard dress</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $115
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="product.html">View</a></span></div>
                                        <img src="<?=__URL__;?>/images/photos/recommand-1.jpg" alt="product name" />
                                    </div>   
                                    <div class="product-details">   
                                        <h1><a href="#">Jacquard Dress</a></h1>
                                        <p>Grey jacquard dress</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            $115
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>