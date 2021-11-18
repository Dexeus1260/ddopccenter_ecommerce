<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
?>
   

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card border-left-primary shadow py-2" style="height: 200px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                               <a href="products.php" class="nav-link"> Total Products</a></div>
                                                <?php 
                                                global $con; 
                                                $sql = "select * from products";
                                                $res = mysqli_query($con,$sql);
                                                if($res){
                                                   $count = mysqli_num_rows($res);

                                              
                                                ?>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $count ?></div>
                                            <?php   } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-barcode fa-9x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card border-left-success shadow py-2" style="height: 200px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                            <a href="orders.php" class="nav-link"> Total Sales</a></div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">₱<?php echo number_format($_SESSION['sales']); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-9x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card border-left-info shadow h-200 py-2" style="height: 200px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1"> <a href="users.php" class="nav-link"> Total Customers</a>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                    global $con;
                                                    $sql = "select * from users";
                                                    $res = mysqli_query($con,$sql);

                                                    if($res){

                                                        $count = mysqli_num_rows($res);
                                                    
                                                    
                                                    ?>
                                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count; }?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-9x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card border-left-warning shadow h-200 py-2" style="height: 200px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dexter Joshua G. Cavan 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

<?php require_once 'php_files/footer.php' ?>