<?php require __ROOT__.'/views/admin/header.php'; ?>
<!-- <?php require __ROOT__.'/views/admin/form.php'; ?> -->
  <div id="wrapper">
  <?php require __ROOT__.'/views/admin/sidebar.php'; ?>
  <!-- well form-horizontal -->
  <div class="container">
  
    <form class="well form-horizontal" action=" <?=__URL__?>/admin/create" method="post" id="add_form" enctype="multipart/form-data">
      <fieldset>
        <!-- Form Name -->
        <legend>Add data</legend>
        <div class="form-group">
          <label class="col-md-2 control-label">Product name</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input input="text" class="form-control" name="ProductName" placeholder="Product name">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Description</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <textarea class="form-control" name="Description" placeholder="Description"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">
            Image source 
            
          </label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input class="form-control" type="file" name="ImageSource" placeholder="Image source">
            </div>
            <p><strong>Attention:</strong> Only .jpg, .jpeg, .gif and maximum size is 5MB.</p>
          </div>
        </div>

        <div class="form-group"> 
          <label class="col-md-2 control-label">Category</label>
              <div class="col-md-8 selectContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="Category" class="form-control selectpicker" >
                <?php foreach($data as $category):?>
                  <option value="<?=$category->CategoryId;?>"><?=$category->CategoryName;?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Producer</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input class="form-control" name="Producer" placeholder="Producer">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Origin</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input class="form-control" name="Origin" placeholder="Origin">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Price</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input type="number" class="form-control" name="Price" placeholder="Price">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Quantity</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input type="number" class="form-control" name="Quantity" placeholder="Quantity">
            </div>
          </div>
        </div> 

        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i>
          Thanks for contacting us, we will get back to you shortly.</div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-2 control-label"></label>
          <div class="col-md-2">
            <button type="submit" class="btn btn-warning">Submit <span class="glyphicon glyphicon-send"></span></button>
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