<?php require __ROOT__.'/views/admin/header.php'; ?>

    <div id="wrapper">
      <?php require __ROOT__.'/views/admin/sidebar.php'; ?>

    <div class="container">
    <form class="well form-horizontal" action="<?=__URL__?>/admin/accountEdit/<?=$data->AccountId?>" method="post" id="add_form">
      <fieldset>
        <!-- Form Name -->
        <legend>Account edit</legend>

        <div class="form-group">
          <label class="col-md-2 control-label">User name</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <p class="form-control" name="UserName" placeholder="User name"><?=$data->UserName;?></p>
            </div>
          </div>
        </div> 
        
        <div class="form-group">
          <label class="col-md-2 control-label">Address</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <p class="form-control" name="Address" placeholder="Address"><?=$data->Address;?></p>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Phone</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <p class="form-control" name="Phone" placeholder="Phone"><?=$data->Phone;?></p>
            </div>
          </div>
        </div>
        <div class="form-group"> 
          <label class="col-md-2 control-label">Type</label>
              <div class="col-md-8 selectContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="Type" class="form-control selectpicker" >
                <option>1</option>
                <option>2</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning">Update <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>

      </fieldset>
    </form>
  </div>
  </div><!-- /.container -->

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php require __ROOT__.'/views/admin/footer.php'; ?>