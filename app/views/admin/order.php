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
                      Order Table
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                          
                          <thead>
                            <tr >
                              <th scope="col">OrderID</th>
                              <th scope ='col'>User name</th>
                              <th scope="col">Address</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Sum price</th>
                              <th scope="col">Order date</th>
                              <th scope="col">Order status</th>
                              <th scope="col">Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(!empty($data)): ?>
                            <?php foreach($data as $order):?>
                            <tr class="<?=$order->OrderStatus?>">
                              <td><?=$order->OrderId;?></td>
                              <td><?=$order->UserName;?></td>
                              <td><?=$order->Address;?></td>
                              <td><?=$order->Phone;?></td>
                              <td><?=$order->SumPrice;?></td>
                              <td><?=$order->CreatedAt;?></td>
                              <td><?=$order->OrderStatus;?></td>
                              <td>
                                <a href="<?=__URL__?>/admin/orderEdit/<?=$order->OrderId?>" >
                                <button type="button" class="btn-edit btn btn-primary btn-sm">Edit</button></a>
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
<?php require __ROOT__.'/views/admin/footer.php'; ?>