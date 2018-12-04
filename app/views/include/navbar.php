      <div class="header">
            <div class="container">
                
                <div class="header-middle-info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="<?=__URL__ ;?>">
                                <img style="height:auto" src="<?=__URL__ ?>/images/elements/logo.png" alt="site logo" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 mx-auto">
                        <ul class="header-middle-account">
                            
                            <?php if(!empty($_SESSION['isLoggedIn'])):?>
                            
                            <li><a href="<?=__URL__?>/accounts/detail"><i class="icon-330" title="My account"></i> My account</a></li>
                            <li><a href="<?=__URL__?>/accounts/logout" ><i class="icon-352" title="Logout"></i>Log out</a></li>
                            <?php if($_SESSION['usertype'] == 1):?>
                                <li><a href="<?=__URL__?>/admin"><i class="icon-329" title="Dashboard"></i> Dashboard</a></li>
                            <?php endif;?>>
                            <?php else:?>
                            <li><a href="<?=__URL__?>/accounts/register"><i class="icon-351" title="Register"></i>Register</a></li> 
                            <li><a href="<?=__URL__?>/accounts/login"><i class="icon-352" title="Login"></i> Login</a></li>
                            <?php endif;?>
                               
                            <li><a href="<?=__URL__?>/cart/"><i class="icon-259" title="Cart"></i> Cart</a></li>
                        </ul>   
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="menu">
                    <div class="search-cart">
                        <form class="search form-inline" action='<?=__URL__?>/products/search' method='GET'>
                            
                            <select name='search-method' class='form-control text-center' style="width:auto; margin-top:3px;; height:36px">
                              <option  value="ProductName" selected >Product name</option>
                              <option value="Producer" >Manufacturer name</option>
                              <option value="CategoryName">Type</option>
                            </select>
                            <input type="text" class="search-line" placeholder="Search" name="search" />
                            <input type="submit" value="" class="search-button" />
                        </form>
                        <div class="cart-all">    
                            <a href="<?=__URL__ ;?>/cart"><i class="icon-19" title="Cart"></i></a>

                            <div class="inside-cart">
                                <p><?=countCartItems();?> products in the shopping bag</p>
                                <?php if(!empty($_SESSION['cart_items'])):?>
                                    <ul>
                                            <?php foreach($_SESSION['cart_items'] as $product):?>
                                                <li>
                                                    <div class="inside-cart-image"><img src="<?=__URL__ ?><?=$product['product_image']?>" alt="product name" /></div>
                                                    <button onclick=removeItem(<?=$product['product_id']?>)>x</button>
                                                    <a href="<?=__URL__?>/products/detail/<?=$product['product_id']?>"><?=$product['product_name']?></a>
                                                    <p>Unit price <?=number_format($product['product_price'])?> VND</p>
                                                    <p>Q-ty: <?=$product['quantity']?></p>
                                                </li>
                                            <?php endforeach;?>  
                                    </ul>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="repsonsive-menu"><i class="icon-406" title="406"></i> Menu</div>
                    <ul>
                      <li><a href="<?=__URL__?>/pages" >Home</a></li>

                        <li class="menu-item-has-children ">
                        <div class="small hidden-xs"><a href="#">Categories</a></div>                  
                            <ul>  
                                <li><a href="<?=__URL__?>/products/views/laptop/">Laptop</a></li>
                                <li><a href="<?=__URL__?>/products/views/mobile/">Mobile Device</a></li>
                                <li><a href="<?=__URL__?>/products/views/headphone/">Headphone</a></li>
                                <li><a href="<?=__URL__?>/products/views/keyboard/">Keyboard</a></li>  
                            </ul>
                        </li>
                        
                        <li><a href="<?=__URL__?>/pages/about">About us</a></li>
                        <li><a href="<?=__URL__?>/pages/contact">Contact</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
