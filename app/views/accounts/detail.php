<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="mainbody container">
    <div class="text-center"><?php flash('account-detail-message')?></div>
    
    <div class="row">

        <?php require __ROOT__.'/views/accounts/sidebar.php' ;?>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="panel-title pull-left" style="font-size:30px;">My profile</h1>
                </div>
            </div>
            
           
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Address</h3>
                    <br><br>
                    <h3><?=$data['detail']->Address?></h3>
                </div>
            </div>
            
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Contact number</h3>
                    <br><br>
                    <h3><?=$data['detail']->Phone?></h3>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Change current password</h3>
                    <br><br>
                    <form class="form-horizontal" name='changePassword' action="<?=__URL__?>/accounts/changePassword" method='POST'>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="keywords" name='password' placeholder="">
                            </div>

                            <div class="col-md-2">
                            <input class='btn btn-submit' type="submit" name='changePassword' value="Change">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php require __ROOT__.'/views/include/footer.php'; ?>