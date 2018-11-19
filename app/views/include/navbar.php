      <div class="header">
            <div class="container">
                
                <div class="header-middle-info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="<?=__URL__ ;?>">
                                <img src="<?=__URL__ ?>/images/elements/logo.png" alt="site logo" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 mx-auto">
                        <ul class="header-middle-account">
                            
                            <?= !empty($_SESSION['isLoggedIn'])?
                            '<li><a href="'. __URL__ . '/accounts/detail"><i class="icon-330" title="My account"></i> My account</a></li>
                            <li><a href="'. __URL__ . '/accounts/logout" ><i class="icon-352" title="Logout"></i>Log out</a></li>
                            ' 
                            :'<li><a href="'. __URL__ . '/accounts/login"><i class="icon-352" title="Login"></i> Login</a></li>
                            <li><a href="'. __URL__ . '/accounts/register"><i class="icon-351" title="Register"></i>Register</a></li> 
                            ' ;?>   
                               
                            <li><a href="<?=__URL__?>/cart/checkout"><i class="icon-259" title="Checkout"></i> Checkout</a></li>
                        </ul>   
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="menu">
                    <div class="search-cart">
                        <form class="search form-inline" action='<?=__URL__?>/products/search/' method='POST'>
                            
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
                                <p><?='SELECTEDPRODUCTS_COUNT';?> products in the shopping bag</p>
                                <ul>
                                    <li>
                                        <div class="inside-cart-image"><img src="<?=__URL__ ?>/images/photos/image-9.jpg" alt="product name" /></div>
                                        <button>x</button>
                                        <a href="product.html">Stripe boucle</a>
                                        <p>Unit price 50$</p>
                                        <p>Q-ty: 1</p>
                                    </li>
                                    <li>
                                        <div class="inside-cart-image"><img src="<?=__URL__ ?>/images/photos/image-8.jpg" alt="product name" /></div>
                                        <button>x</button>
                                        <a href="product.html">Stripe boucle</a>
                                        <p>Unit price 75$</p>
                                        <p>Q-ty: 2</p>
                                    </li>
                                </ul>
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
                                <li><a href="<?=__URL__?>/products/viewproducts/laptop/">Laptop</a></li>
                                <li><a href="<?=__URL__?>/products/viewproducts/mobile/">Mobile Device</a></li>
                                <li><a href="<?=__URL__?>/products/viewproducts/headphone/">Headphone</a></li>
                                <li><a href="<?=__URL__?>/products/viewproducts/keyboard/">Keyboard</a></li>  
                            </ul>
                        </li>
                        
                        <li><a href="<?=__URL__?>/pages/about">About us</a></li>
                        <li><a href="<?=__URL__?>/pages/contact">Contact</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
