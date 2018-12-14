<!-- ======================================================================
                                        START FOOTER
        ======================================================================= -->
        <div style="margin-top:40px;"> </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <ul class="socials">
                            <li><a href="https://www.facebook.com/ShadeCormac"><img class="img-h-auto" src="<?=__URL__;?>/images/elements/socials/facebook.png" alt="facebook"/>Facebook</a></li>
                            <li><a href="https://twitter.com/ShadeCormac"><img class="img-h-auto" src="<?=__URL__;?>/images/elements/socials/twitter.png" alt="twitter"/>Twitter</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <ul>
                            <li><a href="<?=__URL__?>/accounts/register">Register now</a></li>
                            <li><a href="<?=__URL__?>/cart/">Cart</a></li>
                            <li><a href="<?=__URL__?>/cart/checkout">Checkout</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <ul>

                            <li><a href="<?=__URL__?>/accounts/history">Order history</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <ul class="menu-item">
                            <li><a href="<?=__URL__?>/pages/index">Home</a></li>
                            <?php foreach($categories as $cat): ?>
                                <li><a href="<?=__URL__?>/products/views/<?=$cat->CategoryName?>/"><?=$cat->CategoryName?></a></li>
                            <?php endforeach;?> 
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="container">
                <div class="mini-footer">
                    <div class="row">
                        <div class="col-md-6">
                            Copyright 2013 ZEON &nbsp;  &nbsp;  &nbsp; Designed by <a href="http://www.teslathemes.com">Teslathemes</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <img class="img-h-auto" src="<?=__URL__;?>/images/elements/payment.png" alt="payment systems" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================================================
                                        END FOOTER
        ======================================================================= -->

        <script src="<?php echo __URL__; ?>/js/main.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/modernizr.custom.63321.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/jquery-1.10.0.min.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/placeholder.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/jquery.swipebox.min.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/farbtastic/farbtastic.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/options.js" type="text/javascript"></script>
        <script src="<?php echo __URL__; ?>/js/plugins.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- ======================================================================
                                        END SCRIPTS
        ======================================================================= -->
    </body>

</html>