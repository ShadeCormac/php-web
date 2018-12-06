<?php require __ROOT__.'/views/admin/header.php'; ?>

    <div id="wrapper">
      <?php require __ROOT__.'/views/admin/sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables-->
          <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header tdata ">
                        <i class="fas fa-table "></i>
                        Data Table
                        
                    </div>
                    <div class = "btAdd">
                    <form action="<?php echo __URL__; ?>/admin/index" method="get" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                       
                          <input name="search" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                          
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                      </form>
                      <a input class="btn btn-primary btAdd" type="button"   href="/php-web/admin/add">Add</a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                          
                          <thead>
                            <tr>
                              <th scope="col">Product name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Image source</th>
                              <th scope="col">Category Name</th>
                              <th scope="col">Producer</th>
                              <th scope="col">Origin</th>
                              <th scope="col">Price</th>
                              <th scope="col">View count</th>
                              <th scope="col">Sell count</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Edit/Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(!empty($data)): ?>
                            <?php foreach($data as $product):?>
                            <tr>
                              <td><?=$product->ProductName;?></td>
                              <td><?=$product->Description;?></td>
                              <td><img src="<?=__URL__ . $product->ImageSource?>"  style="height:150px; width:250px"/></td>
                              <td><?=$product->CategoryName;?></td>
                              <td><?=$product->Producer;?></td>
                              <td><?=$product->Origin;?></td>
                              <td><?=$product->Price;?></td>
                              <td><?=$product->ViewCount;?></td>
                              <td><?=$product->SellCount;?></td>
                              <td><?=$product->Quantity;?></td>
                              <td>
                                <a href="/php-web/admin/edit/<?=$product->ProductId?>" ><button type="button" class="btn-edit btn btn-primary btn-sm">Edit</button></a>
                                <button data-id="<?= $product->ProductId ?>" type="button" class="btn-delete btn btn-danger btn-sm">Delete</button>
                              </td>
                            </tr>                    
                            <?php endforeach;?>
                          <?php endif;?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div> -->


<?php require __ROOT__.'/views/admin/footer.php'; ?>