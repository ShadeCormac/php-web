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
                      Account Table
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                          
                          <thead>
                            <tr>
                              <th scope="col">User name</th>
                              <th scope ='col'>Type</th>
                              <th scope="col">Address</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(!empty($data)): ?>
                            <?php foreach($data as $account):?>
                            <tr>
                              <td><?=$account->UserName;?></td>
                              <td><?=$account->Type;?></td>
                              <td><?=$account->Address;?></td>
                              <td><?=$account->Phone;?></td>
                              <td>
                                <a href="<?=__URL__?>/admin/accountEdit/<?=$account->AccountId?>" >
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