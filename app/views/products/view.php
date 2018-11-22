<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="content">
            <div class="container">
                <div class="all-products-details">
                    <div class="row">
                        <div class="col-md-7"><h2>Categories</h2><span class="products-avalabile"><?=$data['products_count']?> product(s) found</span></div>
                        <div class="col-md-5">
                            <div class="sort-dropdown float-right">
                                <span>Default sorting <i class="icon-515" title="515"></i></span>
                                <ul>
                                    <li><a href="#">Cost low to high</a></li>
                                    <li><a href="#">Cost hight to low</a></li>
                                    <li><a href="#">Sales low to high</a></li>
                                    <li><a href="#">Sales high to low</a></li>
                                    <li><a href="#">Top low to high</a></li>
                                    <li><a href="#">Top high to low</a></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12 col-xs-6">
                                <div class="products-dropdown open-dropdown">
                                    <span><i class="icon-515" title="515"></i>Accessories</span>
                                    <ul>
                                        <li><a href="#">Laptop</a></li>
                                        <li><a href="#">Headphone</a></li>
                                        <li><a href="#">Mobile device</a></li>
                                        <li><a href="#">Keyboard</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            
                            <div class="col-md-12 col-xs-6">
                                <div class="products-dropdown open-dropdown">
                                    <span>Brands</span>
                                    <ul>
                                        <li><a href="#">Samsung</a></li>
                                        <li><a href="#">Apple</a></li>
                                        <li><a href="#">Xiaomi</a></li>
                                        
                                    </ul>
                                    <!-- <div class="products-dropdown-close">Clear <i class="icon-456" title="close"></i></div> -->
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10">
                        <div class="row">
                            <?php if(!empty($data['products'])): ?>
                                <?php foreach($data['products'] as $product):?>
                                    <div class="col-md-4 col-xs-12 my-5">
                                        <div class="product">
                                            <div class="product-cover">
                                                <div class="product-cover-hover"><span><a href="<?=__URL__;?>/products/detail/<?=$product->ProductId;?>">View</a></span></div>
                                                <img src="<?=__URL__ . $product->ImageSource?>" alt="product name" style="height:310px; width:260px"/>
                                            </div>    
                                            <div class="product-details">    
                                                <h1 class='text-center' style='font-color:white'><a href="<?=__URL__;?>/products/detail/<?=$product->ProductId;?>"><?=$product->ProductName?></a></h1>
                                                
                                                <div class="product-price">
                                                    <i class="icon-257" title="add to cart"></i>
                                                    <?=number_format($product->Price);?> VND
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>      
                            <?php endif;?>
                        </div>

                        <ul class="page-numbers">
                            <?php 
                                //echo $data['products_count'];
                                //echo $data['current_page'];
                                //1 is static coding for number of products
                                $totalPages = ceil($data['products_count'] / 9);
                                $totalPages = intval($totalPages);
                                if(empty($data['is_search']) ){
                                    for($index = 1; $index <= $totalPages; $index++){
                                        if($index == $data['current_page'])
                                            echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                        else echo "<li><a href=$index class='page-numbers'>$index</a></li>";  
                                    }
                                }else{
                                    $actual_link = $_SERVER['REQUEST_URI'];
                                    echo $actual_link;
                                    // echo __URL__;
                                    $pos = strpos($actual_link, '&page=');
                                    //var_dump($pos) ;
                                    //echo strlen($actual_link);
                                    $actual_link = $pos !== false? substr_replace($actual_link, "", $pos) : $actual_link;
                                    //echo $actual_link;
                                    for($index = 1; $index <= $totalPages; $index++){
                                        if($index == $data['current_page'])
                                            echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                        else echo "<li><a href=$actual_link&page=$index class='page-numbers'>$index</a></li>";  
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php require __ROOT__.'/views/include/footer.php'; ?>