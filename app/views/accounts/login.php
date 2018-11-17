<?php require __ROOT__.'/views/include/header.php'; ?>
<?php //print_r($data)?>
<div class="content">
    <div class="container">
        <div class="site-title"><div class="site-inside"><span>Login</span></div></div>      
            <?php flash('register_success'); ?>   
            <div class="row"> 
                <div class="col-md-6 mx-auto col-xs-offset-3">
                    <div class="login-form-box">
                            <form class="login-form" action="<?=__URL__;?>/accounts/login" method="POST">
                                <h3>Login now</h3>
                                    <p>Username</p>
                                    <div class="form-group">
                                    <input type="text" name="username" class="login-line form-control <?=(!empty($data['username_error'])? 'is-invalid': ''); ?>"
                                    value="<?= $data['username']; ?>">
                                    <span class="invalid-feedback"><?=$data['username_error']?></span>  
                                    </div>
                                    <div class="form-group">
                                    <p>Password</p>
                                    <input type="password" name="password" class="login-line form-control <?=(!empty($data['password_error'])? 'is-invalid': ''); ?>">
                                    <span class="invalid-feedback"><?=$data['password_error']?></span>  
                                    </div>
                                    <div class="row">
                                         <div class="col">
                                            <input type="submit" value="Login" class="button-6 btn-block">
                                        </div>
                                        <div class="col">
                                            <a href="<?=__URL__;?>/accounts/register" class="button-6 btn-block text-center">Or register</a>
                                        </div>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>