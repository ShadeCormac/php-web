<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="mainbody container">
    <div class="text-center"><?php flash('account-update-info-message')?></div>
    <div class="row">

         <?php require __ROOT__.'/views/accounts/sidebar.php' ;?>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="panel-title pull-left" style="font-size:30px;">Change information</h1>
                </div>
            </div>
            
           <form action="<?=__URL__?>/accounts/update" method='POST' name='update-info'>
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Address</h3>
                    <br><br>
                    <input class="form-control" type="text" name='address' value=<?=$data['detail']->Address?>>
                </div>
            </div>
            
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Contact number</h3>
                    <br><br>
                    <input class="form-control" type="text" name='contact-number' value=<?=$data['detail']->Phone?>>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                <input type="submit" value='Save changes' class='button-6 btn-block'>
                </div>
            </div>

            <!-- <input type="submit" value='Save changes' class='btn btn-submit pull-right'> -->
            
            </form>
            <!-- <div class="panel panel-default ">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Change current password</h3>
                    <br><br>
                    <form class="form-horizontal" name='changePassword' action="<?=__URL__?>/accounts/changepassword" method='POST'>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="keywords" name='newPassword' placeholder="">
                            </div>

                            <div class="col-md-2">
                            <input class='btn btn-submit' type="submit" name='changePassword' value="Change">
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
            
        </div>
    </div>
</div>

<?php require __ROOT__.'/views/include/footer.php'; ?>