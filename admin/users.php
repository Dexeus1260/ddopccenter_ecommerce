<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }

      $customer = customer();
?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Costumers</h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Mobile Number</th>
                                            <th>Address</th>
                                          
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while($row=mysqli_fetch_assoc($customer)){ ?>
                                        <tr>
                                            <td><?php echo $row['fullname'] ?> </td>
                                            <td><?php echo $row['username'] ?> </td>
                                            <td><?php echo $row['mobile'] ?> </td>
                                            <td><?php echo $row['address'] ?> </td>
                                        
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

 


<?php require_once 'php_files/footer.php' ?>
