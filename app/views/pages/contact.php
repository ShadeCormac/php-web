<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>contact</h2>
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11910.7379386882!2d-93.59782812906528!3d41.72732676651727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1388999556984" width="600" height="450" frameborder="0" style="border:0"></iframe>
                        </div>

                        <div class="contact-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><span class="location">London 26 avenue 12/8 yellow garden street</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><span class="mail"><a href="mailto:zoom@mail.com">Zoom@mail.com</a></span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><span class="phone">(000) 355 588 456 789</span></li>
                                        <li><span class="phone">(777) 311 225 689 147</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="site-title">
                            <div class="site-inside">
                                <span>Write us a letter</span>
                            </div>
                        </div>

                        <div class="the-form">
                            <form id="contact_form">
                                <div class="row">
                                    <div class="col-md-4"><p>Name</p>
                                        <input type="text" name="contact-name" class="the-line">
                                    </div>
                                    <div class="col-md-4"><p>E-mail</p>
                                        <input type="text" name="contact-email" class="the-line">
                                    </div>
                                    <div class="col-md-4"><p>Website</p>
                                        <input type="text" name="contact-website" class="the-line">
                                    </div>
                                </div>
                                <p>Comments</p>
                                <textarea name="contact-message" class="the-area"></textarea>
                                <input type="submit" id="form-send" value="Send" class="button-4">
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-sidebar">
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <div class="widget">
                                        <div class="widget-title">Category</div>
                                        <ul class="widget-category">
                                            <li><a href="#">Dress</a></li>
                                            <li><a href="#">Coat</a></li>
                                            <li><a href="#">Winter collection</a></li>
                                            <li><a href="#">Models</a></li>
                                            <li><a href="#">Boots</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xs-6">
                                    <div class="widget">
                                        <div class="widget-title">Archives</div>
                                        <ul class="widget-archives">
                                            <li><a href="#">November 2013</a>&nbsp;(1)</li>
                                            <li><a href="#">January 2013</a>&nbsp;(1)</li>
                                            <li><a href="#">March 2013</a>&nbsp;(1)</li>
                                            <li><a href="#">October 2013</a>&nbsp;(1)</li>
                                            <li><a href="#">September 2013</a>&nbsp;(1)</li>
                                            <li><a href="#">August 2013</a>&nbsp;(1)</li>
                                            <li><a href="#">July 2013</a>&nbsp;(1)</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xs-6">
                                    <div class="widget">
                                        <div class="widget-title">Best sellers</div>
                                        <ul class="widget-best-seller">
                                            <li>
                                                <span class="item-cover"><a href="#"><img src="<?=__URL__;?>/images/photos/image-1.jpg" alt="image item"/></a></span>
                                                <span class="item-title"><a href="#">Blazer Blue</a></span>
                                                <span class="item-detail">blazer blue</span>
                                                <span class="item-price">$ 77</span>
                                            </li>
                                            <li>
                                                <span class="item-cover"><a href="#"><img src="<?=__URL__;?>/images/photos/image-2.jpg" alt="image item"/></a></span>
                                                <span class="item-title"><a href="#">Blazer Blue</a></span>
                                                <span class="item-detail">blazer blue</span>
                                                <span class="item-price">$ 77</span>
                                            </li>
                                            <li>
                                                <span class="item-cover"><a href="#"><img src="<?=__URL__;?>/images/photos/image-3.jpg" alt="image item"/></a></span>
                                                <span class="item-title"><a href="#">Blazer Blue</a></span>
                                                <span class="item-detail">blazer blue</span>
                                                <span class="item-price">$ 77</span>
                                            </li>
                                            <li>
                                                <span class="item-cover"><a href="#"><img src="<?=__URL__;?>/images/photos/image-4.jpg" alt="image item"/></a></span>
                                                <span class="item-title"><a href="#">Blazer Blue</a></span>
                                                <span class="item-detail">blazer blue</span>
                                                <span class="item-price">$ 77</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xs-6">
                                    <div class="widget">
                                        <div class="widget-title">Tags</div>
                                        <div class="tagcloud">
                                            <a href="#">Art</a>
                                            <a href="#">Collection</a>
                                            <a href="#">Fashion</a>
                                            <a href="#">Dark</a>
                                            <a href="#">White</a>
                                            <a href="#">Texture</a>
                                            <a href="#">Minimalist</a>
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