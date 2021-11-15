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
                      
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="success">Completed</span></td>
                                            <td>$25.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$17.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr>
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