<?php require __ROOT__.'/views/include/header.php'; ?>

<div class="content">
            <!-- =====================================================================
                 START THE SLIDER -->
            <div class="the-slider slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
                <ul class="slide-wrapper">
                    <li class="slide"><img style="height:auto" src="<?=__URL__?>/images/photos/banner2.jpg" alt="banner"></li>
                </ul>
               
            </div>
            <!-- END THE SLIDER
            ====================================================================== -->
            <?php flash('add-to-cart')?>
            <!-- Newest products -->
            <div class="box">
                <div class="container">
                    <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                        <div class="site-title">
                            <ul class="wrapper-arrows">
                                <li><i class="icon-517 prev" title="left arrow"></i></li>
                                <li><i class="icon-501 next" title="right arrow"></i></li>
                            </ul>
                            <div class="site-inside"><span>New Products</span></div></div> 
                        <div class="row">
                            <div class="tesla-carousel-items">
                                <?php foreach($data['newest_products'] as $product):?>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="product">
                                            <div class="product-cover">
                                                <span class="product-action">
                                                    <span class="product-new">New</span>
                                                </span>
                                                <div class="product-cover-hover"><span><a href="<?=__URL__?>/products/detail/<?=$product->ProductId?>">View</a></span></div>
                                                <img src="<?=__URL__ . $product->ImageSource?>" alt="<?=$product->ProductName?>" style="width:260px;height:145px" />
                                            </div>
                                            <div class="product-details text-center">  
                                                <h1 class='my-5'><a href="<?=__URL__?>/products/detail/<?=$product->ProductId?>"><?=$product->ProductName?></a></h1>
                                                <div class="product-price">
                                                <?php if($product->Quantity > 0):?>
                                                <i onclick=addtoCart(<?=$product->ProductId?>) class="icon-257" title="add to cart"></i>
                                                <?php endif;?>
                                                    <?=number_format($product->Price)?> VND
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- =====================================================================
                                         START SERVICES
            ====================================================================== -->
            <div class="box">
                <div class="container">
                    <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                        <div class="site-title">
                            <ul class="wrapper-arrows">
                                <li><i class="icon-517 prev" title="left arrow"></i></li>
                                <li><i class="icon-501 next" title="right arrow"></i></li>
                            </ul>
                            <div class="site-inside">
                                <span>Services</span>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="tesla-carousel-items"> 
                                <div class="col-md-4 col-xs-6">
                                    <div class="service-1">
                                        <h4>Free shipping</h4>
                                        <i class="icon-374" title="shipping"></i>
                                        <div class="service-description">
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="service-1 service-color-1">
                                        <h4>Return within a month</h4>
                                        <i class="icon-271" title="time"></i>
                                        <div class="service-description">
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="service-1 service-color-2">
                                        <h4>Cash on delivery</h4>
                                        <i class="icon-260" title="cash"></i>
                                        <div class="service-description">
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="service-1">
                                        <h4>Free shipping</h4>
                                        <i class="icon-374" title="shipping"></i>
                                        <div class="service-description">
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="service-1 service-color-1">
                                        <h4>Return within a month</h4>
                                        <i class="icon-271" title="time"></i>
                                        <div class="service-description">
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="service-1 service-color-2">
                                        <h4>Cash on delivery</h4>
                                        <i class="icon-260" title="cash"></i>
                                        <div class="service-description">
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =====================================================================
                                             END SERVICES
            ====================================================================== -->

            <!-- higest views-->
            <div class="box">
                <div class="container">
                    <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                        <div class="site-title">
                            <ul class="wrapper-arrows">
                                <li><i class="icon-517 prev" title="left arrow"></i></li>
                                <li><i class="icon-501 next" title="right arrow"></i></li>
                            </ul>
                            <div class="site-inside"><span>Highest views</span></div></div> 
                        <div class="row">
                            <div class="tesla-carousel-items">
                                <?php foreach($data['highest_view_products'] as $product):?>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="product">
                                            <div class="product-cover">
                                                <span class="product-action">
                                                    <span class="product-new">Hot</span>
                                                </span>
                                                <div class="product-cover-hover"><span><a href="<?=__URL__?>/products/detail/<?=$product->ProductId?>">View</a></span></div>
                                                <img src="<?=__URL__ . $product->ImageSource?>" alt="<?=$product->ProductName?>" style="width:260px;height:145px" />
                                            </div>
                                            <div class="product-details text-center">  
                                                <h1 class='my-5'><a href="<?=__URL__?>/products/detail/<?=$product->ProductId?>"><?=$product->ProductName?></a></h1>
                                                <div class="product-price">
                                                <?php if($product->Quantity > 0):?>
                                                <i onclick=addtoCart(<?=$product->ProductId?>) class="icon-257" title="add to cart"></i>
                                                <?php endif;?>
                                                    <?=number_format($product->Price)?> VND
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- top sellers -->
            <div class="box">
                <div class="container">
                    <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                        <div class="site-title">
                            <ul class="wrapper-arrows">
                                <li><i class="icon-517 prev" title="left arrow"></i></li>
                                <li><i class="icon-501 next" title="right arrow"></i></li>
                            </ul>
                            <div class="site-inside"><span>Top sellers</span></div></div> 
                        <div class="row">
                            <div class="tesla-carousel-items">
                                <?php foreach($data['highest_sell_products'] as $product):?>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="product">
                                            <div class="product-cover">
                                                <span class="product-action">
                                                    <span class="product-new">Hot</span>
                                                </span>
                                                <div class="product-cover-hover"><span><a href="<?=__URL__?>/products/detail/<?=$product->ProductId?>">View</a></span></div>
                                                <img src="<?=__URL__ . $product->ImageSource?>" alt="<?=$product->ProductName?>" style="width:260px;height:145px" />
                                            </div>
                                            <div class="product-details text-center">  
                                                <h1 class='my-5'><a href="<?=__URL__?>/products/detail/<?=$product->ProductId?>"><?=$product->ProductName?></a></h1>
                                                <div class="product-price">
                                                <?php if($product->Quantity > 0):?>
                                                <i onclick=addtoCart(<?=$product->ProductId?>) class="icon-257" title="add to cart"></i>
                                                <?php endif;?>
                                                    <?=number_format($product->Price)?> VND
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php require __ROOT__.'/views/include/footer.php'; ?>