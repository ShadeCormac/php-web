<?php require __ROOT__.'/views/include/header.php'; ?>
<?php print_r($data)?>
<div class="content">
            <div class="container">
                <div class="site-title"><div class="site-inside"><span>Login / Register</span></div></div>         
                <div class="row">
                    <div class="col-md-6">
                        <div class="forms-separation">
                            <div class="login-form-box">
                                <form class="login-form">
                                    <h3>login now</h3>
                                    <p>Username or e-mail</p>
                                    <input type="text" name="login-username" class="login-line">
                                    <p>Password</p>
                                    <input type="password" name="login-password" class="login-line">
                                    <input type="submit" value="Login" class="button-6">
                                    <a href="#" class="lost-password">Lost password</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="register-form">
                            <h3>Register</h3>
                            <p>Username</p>
                            <input type="text" name="username" class="input-line">
                            <p>E-mail</p>
                            <input type="text" name="email" class="input-line">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Password</p>
                                    <input type="password" name="password" class="input-line">
                                </div>
                                <div class="col-md-6">
                                    <p>Repeat Password</p>
                                    <input type="password" name="password" class="input-line">
                                </div>
                            </div>
                            <input type="submit" value="Register" class="button-6">
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>