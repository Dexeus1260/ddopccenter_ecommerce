<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }

      global $con;
      $sql = "select 
      order_products.user_id,order_products.order_id,order_products.product_id,order_products.product_qty,order_products.total_amount,order_products.order_date,order_products.delivery,	
      products.product_name,
      products.p_id,
      users.username,
      users.email,
      users.id
      
      from order_products 
      left join products 
      on products.p_id = order_products.product_id
      left join users 
      on users.id = order_products.user_id

    ";
      $res = mysqli_query($con,$sql);
?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Product details</th>
                                            <th>Qty</th>
                                            <th>Customer details</th>
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th>Delivery Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <?php 
                                    $totalSale = 0;
                                    while($row=mysqli_fetch_assoc($res)){?>
                                    <tbody>

                                       <tr>
                                            <td><?php echo $row['order_id'] ?></td>
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo $row['product_qty'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td>₱<?php echo number_format($row['total_amount']) ?></td>
                                            <td><?php echo date('M d, Y', strtotime($row['order_date']));?></td>
                                            <td><?php echo $row['delivery'] ?></td>
                                           
                                        </tr>
                                          <?php 
                                            $totalSale += $row['total_amount'];
                                          ?>
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

    <?php 
    $_SESSION['sales'] = $totalSale;
    ?>


<?php require_once 'php_files/footer.php' ?>
