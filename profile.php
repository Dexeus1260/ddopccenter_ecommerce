<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 
      
      if(!isset($_SESSION['USER'])){
        header("location: user_login.php");
         }else{
        $user = $_SESSION['USER'];
         }
         
        global $con;
        $user=$_SESSION['USER'];
        $sql="select * from users where  email = '$user' || username = '$user' ";
        $res = mysqli_query($con,$sql); 
         
      ?>



 <!-- ...::: Strat Breadcrumb Section :::... -->
 <div class="breadcrumb-section">
        <div class="box-wrapper">
            <div class="breadcrumb-wrapper breadcrumb-wrapper--style-1 pos-relative">
                <div class="breadcrumb-bg">
                    <img src="assets/images/breadcrumb/breadcrumb-img-product-details-page.webp" alt="">
                </div>
                <div class="breadcrumb-content section-fluid-270">
                    <div class="breadcrumb-wrapper">
                        <div class="content">
                            <span class="title-tag">BEST DEAL FOREVER</span>
                            <h2 class="title"><span class="text-mark">Account</span> Dashboard</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Breadcrumb Section :::... -->

    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account-dashboard section-fluid-270 section-top-gap-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                    
                           
                          
                            <li><a href="#address" data-bs-toggle="tab" class="nav-link btn btn-sm btn-default-outline active">Profile</a></li>
                            <li> <a href="#orders" data-bs-toggle="tab" class="nav-link btn btn-sm btn-default-outline ">Orders</a></li>
                           
                            <!-- <li><a href="login.html" class="nav-link btn btn-sm btn-default-outline">logout</a></li> -->
                            <li><a href="#" class="nav-link btn btn-sm btn-default-outline" data-bs-toggle="modal" data-bs-target="#UlogoutModal">Logout</a></li>
                         
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                      <?php 
                        global $con;
                        $sql = "select 
                                order_products.user_id,order_products.product_id,order_products.product_qty,order_products.total_amount,order_products.order_date,order_products.delivery,	
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
                                
                                where users.email = '$user' || users.username = '$user'
                              ";
                            $result = mysqli_query($con,$sql);
                       ?>
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Review</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row=mysqli_fetch_assoc($result)){ ?>
                                        <tr>
                                            
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo date('M d, Y', strtotime($row['order_date']));?></td>
                                            <td><span class="success"><?php echo $row['delivery']?></span></td>
                                            <td>₱<?php echo number_format($row['total_amount'])?> | <?php echo $row['product_qty']?> pcs </td>
                                            <td>
                                                <?php if($row['delivery'] == 'delivered'){
                                                    global $con;
                                                    $user = $row['user_id'];
                                                    $p_id = $row['product_id'];
                                                    $sql = "select * from reviews where user_id = '$user' and product_id = '$p_id' group by product_id";
                                                    $qres = mysqli_query($con,$sql);

                                                    if(mysqli_fetch_assoc($qres))
                                                    {
                                                        echo  '<h5>Reviewed</h5>';
                                                    }else
                                                    {
                                                      echo '<a href="review.php?p_id='.$row['product_id'].'&user='.$row['user_id'].'" class="nav-link"><h5>Add review</h5></a>';
                                                    }

                                                } ?>
                                            </td>
                                          
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       <?php while($row=mysqli_fetch_assoc($res)){ ?>
                        <div class="tab-pane active" id="address">
                            <h3>Account details </h3>
                            <h5 class="billing-address">Name: <strong><?php echo $row['fullname'] ?></strong></h5>
                            <h5 class="billing-address">Username: <strong><?php echo $row['username'] ?></strong></h5>
                            <h5 class="billing-address">Address: <strong><?php echo $row['address'] ?></strong></h5>
                            <h5 class="billing-address">Mobile: <strong><?php echo $row['mobile'] ?></strong></h5>
                            <?php } ?>
                            <a href="#" class="view">Edit</a>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
    
    
        <div class="modal fade" id="UlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <a class="btn btn-primary" href="admin/user_logout.php">Logout</a>
                    </div>
                </div>
            </div>
         </div>


    










<?php  require_once 'php_files/footer.php'; ?>