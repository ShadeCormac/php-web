<?php require __ROOT__.'/views/include/header.php'; ?>

       <div class="content">
            <div class="product-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <img src="<?=__URL__ . $data['product']->ImageSource?>" alt="<?=$data['product']->ProductName?>">
                        </div>
                        <form action='<?=__URL__?>/cart/add' method='POST'>
                        <div class="col-md-6">
                            <h2><?=$data['product']->ProductName?></h2>
                            
                            
                            <div class="clear"></div>
                            
                            <div class="quantity">
                                <input type="button" value="-" class="minus" onclick=decreaseQtt()>
                                <input type="number" step="1" min="1" max="<?=$data['product']->Quantity?>" name="quantity" id='quantity-id' value="1" title="Qty" class="input-text qty text">
                                <input type="button" value="+" class="plus" onclick=addQtt()>
                                <span><?=$data['product']->SellCount?> sold / <?=$data['product']->Quantity?> available</span>
                            </div>
                            <hr/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-price">PRICE : <?=number_format($data['product']->Price)?> VND</div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                            <input type="hidden" name ='product-id' value='<?=$data['product']->ProductId?>'>
                                            <input type="hidden" name ='product-name' value='<?=$data['product']->ProductName?>'>
                                            <input type="hidden" name ='product-image' value='<?=$data['product']->ImageSource?>'>
                                            <input type="hidden" name ='product-price' value='<?=$data['product']->Price?>'>
                                            <input type='submit' value="Add to shopping bag"  name='btn-add-to-cart' class="button-2">
                                    </div>
                                </div>
                            </form>
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
                        <div class="site-inside"><span>Same Brand</span></div
                    ></div> 
                    <div class="row">
                       
                            <div class="tesla-carousel-items">
                                <?php foreach($data['related_brand_products'] as $product):?>
                                <div class="col-md-3">
                                    <div class="product">
                                        <div class="product-cover">
                                            <div class="product-cover-hover"><span><a href="<?=__URL__ ?>/products/detail/<?=$product->ProductId?>">View</a></span></div>
                                            <img src="<?=__URL__ . $product->ImageSource?>" alt="product name" />
                                        </div>    
                                        <div class="product-details">  
                                            <h1><a href="<?=__URL__ ?>/products/detail/<?=$product->ProductId?>"><?=$product->ProductName?></a></h1>
                                            <div class="product-price">
                                                <i onclick=addtoCart(<?=$product->ProductId?>) class="icon-257" title="add to cart"></i>
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
            <div class="container">
                <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                    <div class="site-title">
                        <ul class="wrapper-arrows">
                            <li><i class="icon-517 prev" title="left arrow"></i></li>
                            <li><i class="icon-501 next" title="right arrow"></i></li>
                        </ul>
                        <div class="site-inside"><span>Same Category</span></div
                    ></div> 
                    <div class="row">
                       
                            <div class="tesla-carousel-items">
                                <?php foreach($data['related_type_products'] as $product):?>
                                <div class="col-md-3">
                                    <div class="product">
                                        <div class="product-cover">
                                            <div class="product-cover-hover"><span><a href="<?=__URL__ ?>/products/detail/<?=$product->ProductId?>">View</a></span></div>
                                            <img src="<?=__URL__ . $product->ImageSource?>" alt="product name" />
                                        </div>    
                                        <div class="product-details">  
                                            <h1><a href="<?=__URL__ ?>/products/detail/<?=$product->ProductId?>"><?=$product->ProductName?></a></h1>
                                            <div class="product-price">
                                                <i onclick=addtoCart(<?=$product->ProductId?>) class="icon-257" title="add to cart"></i>
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
<?php require __ROOT__.'/views/include/footer.php'; ?>