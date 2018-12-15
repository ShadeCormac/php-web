<?php require __ROOT__.'/views/include/header.php'; ?>

<div class="content">
            <div class="container">
                <div class="all-products-details">
                    <div class="row">
                        <div class="col-md-7"><h2>Categories</h2><span class="products-avalabile"><?=$data['products_count']?> product(s) found</span></div>
                        <div class="col-md-5">
                            <div class="sort-dropdown float-right">
                                <span>Sorting methods <i class="icon-515" title="515"></i></span>
                                <?php  
                                    $curUrl = $_SERVER['REQUEST_URI'];
                                    $pos = strpos($_SERVER['REQUEST_URI'], 'sort=');
                                    $curUrl = $pos !== false ? substr_replace($curUrl, "", $pos - 1) : $curUrl; 
                                    $prefix = ((strpos($_SERVER['REQUEST_URI'], '?')) !== false) ? '&' : '?';
                                ?>
                                <ul>

                                    <li><a href="<?=$curUrl . $prefix . 'sort=cost-asc'?>">Cost low to high</a></li>
                                    <li><a href="<?=$curUrl . $prefix . 'sort=cost-desc'?>">Cost hight to low</a></li>
                                    <li><a href="<?=$curUrl . $prefix . 'sort=sale-asc'?>">Sales low to high</a></li>
                                    <li><a href="<?=$curUrl . $prefix . 'sort=sale-desc'?>">Sales high to low</a></li>
                                    <li><a href="<?=$curUrl . $prefix . 'sort=view-asc'?>">Top view low to high</a></li>
                                    <li><a href="<?=$curUrl . $prefix . 'sort=view-desc'?>">Top view high to low</a></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="row row-eq-height">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 col-xs-6">
                                <div class="products-dropdown open-dropdown">
                                    <span><i class="icon-515" title="515"></i>Categories</span>
                                    <ul>
                                    <?php foreach($data['categories'] as $cat) :?>
                                        <li><a href="<?=__URL__?>/products/views/<?=strtolower($cat->CategoryName)?>"><?=$cat->CategoryName?></a></li>
                                    <?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            
                            <div class="col-md-12 col-xs-6">
                                <div class="products-dropdown">
                                    <span>Brands</span>
                                    <ul>
                                    <?php foreach($data['brands'] as $brand):?>
                                        <li><a href="<?=__URL__?>/products/brands/<?=$brand->Producer?>"><?=$brand->Producer?></a></li>
                                    <?php endforeach;?> 
                                    </ul>
                                    <!-- <div class="products-dropdown-close">Clear <i class="icon-456" title="close"></i></div> -->
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="row fix">
                            <?php if(!empty($data['products'])): ?>
                                <?php foreach($data['products'] as $product):?>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="product">
                                            <div class="product-cover">
                                                <div class="product-cover-hover"><span><a href="<?=__URL__;?>/products/detail/<?=$product->ProductId;?>">View</a></span></div>
                                                <img src="<?=__URL__ . $product->ImageSource?>" alt="product name"/>
                                            </div>    
                                            <div class="product-details">    
                                                <h1 class='text-center' style='font-color:white'><a href="<?=__URL__;?>/products/detail/<?=$product->ProductId;?>"><?=$product->ProductName?></a></h1>
                                                
                                                <div class="product-price text-center">
                                                    <?=number_format($product->Price);?> VND
                                                    <?php if($product->Quantity > 0):?>
                                                    <i onclick=addtoCart(<?=$product->ProductId?>) class="icon-257" title="add to cart"></i>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>      
                            <?php endif;?>
                        </div>

                        <?php require __ROOT__ . '/views/include/paging.php' ?>
                    </div>
                </div>
            </div>
        </div>

<?php require __ROOT__.'/views/include/footer.php'; ?>