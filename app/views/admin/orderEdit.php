<?php require __ROOT__.'/views/admin/header.php'; ?>

    <div id="wrapper">
      <?php require __ROOT__.'/views/admin/sidebar.php'; ?>

        <div class="container">
    <form class="well form-horizontal" action="<?=__URL__?>/admin/orderUpdate" method="post" id="add_form">
    <input type="hidden" name="OrderId" value="<?=$data["order_detail"][0]->OrderId?>">
      <fieldset>
        <!-- Form Name -->
        <legend>Order detail</legend>
        <div class="form-group">
          <label class="col-md-2 control-label">Order ID</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <p class="form-control" name="OrderId" placeholder="OrderId"><?=$data["order_detail"][0]->OrderId;?></p>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Customer ID</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <p class="form-control" name="CustomerId" placeholder="Customer ID"><?=$data["user_detail"]->UserName;?></p>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Sum Price</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <p class="form-control" name="SumPrice" placeholder="Sum Price"><?=$data["order_detail"][0]->SumPrice;?></p>
            </div>
          </div>
        </div>

        <div class="form-group"> 
          <label class="col-md-2 control-label">Order status</label>
          <div class="col-md-8 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="OrderStatus" class="form-control selectpicker" >
                <option>Pending</option>
                <option>Proccessing</option>
                <option>Delivered</option>
              </select>
            </div>
          </div>
        </div>
        
        <?php foreach ($data["order_detail"] as $key => $product) :?>
          <div class = "row">
            <div class="col-2 btAdd"><label class="control-label ">Order</label></div>
            <div class="col-8">
              <table class="table table-borderless table-light ">
                <thead>
                  <tr>  
                    <th scope="col" name="ProductName">Product name</th>
                    <th scope="col" name="Quantity">Price</th>
                    <th scope="col" name="Price">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?=$product->ProductName?></td>
                    <td><?=$product->Price?></td>
                    <td><?=$product->Quantity?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-2"></div>
        </div>
        <?php endforeach;?>

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