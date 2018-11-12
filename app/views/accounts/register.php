<?php require __ROOT__.'/views/include/header.php'; ?>
<?php //print_r($data)?>
<div class="content">
            <div class="container">
                <div class="site-title"><div class="site-inside"><span>Register</span></div></div>         
                    <div class="row">  
                        <div class="col-md-6 mx-auto">
                            <form class="register-form" action="<?=__URL__;?>/accounts/register" method="POST">
                                <h3>Register</h3> 
                                <div class="form-group">
                                <p>Username</p>
                                <input type="text" name="username" class="input-line form-control <?php echo(!empty($data['username_error'])? 'is-invalid': ''); ?>"
                                value="<?= $data['username']; ?>">
                                <span class="invalid-feedback"><?=$data['username_error']?></span>  
                                </div>
                                <div class="form-group">
                                    <p>Password</p>
                                    <input type="password" name="password" class="input-line form-control <?php echo(!empty($data['password_error'])? 'is-invalid': ''); ?>">
                                    <span class="invalid-feedback"><?=$data['password_error']?></span>  
                                    </div>
                                    <div class="form-group">
                                    <p>Confirm Password</p>
                                    <input type="password" name="confirm-password" class="input-line form-control <?php echo(!empty($data['confirm_password_error'])? 'is-invalid': ''); ?>">
                                    <span class="invalid-feedback"><?=$data['confirm_password_error']?></span>   
                                </div>         
                                <div class="row">   
                                    <div class="col">
                                        <input type="submit" value="Register" class="button-6 btn-block">
                                    </div>
                                    <div class="col">
                                        <a href="<?=__URL__;?>/accounts/login" class="button-6 btn-block text-center">Already have an account? Log in</a>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
            </div>
        </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>