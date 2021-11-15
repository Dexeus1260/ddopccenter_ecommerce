<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 
      
   
     
      if($_GET['search']==''){

          header("location: index.php");
      }else{
          global $con;
          $search = safe_value($con,$_GET['search']);
          $sql = "select * from products where product_name like '$search%'";
          $res = mysqli_query($con,$sql);
            
   
      }

      
      
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
                            <h2 class="title"> Search results</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="index.php">Shop</a></li>
                            <li>Search</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Breadcrumb Section :::... -->
   
    <!-- ...:::: Start Shop List Section:::... -->
    <div class="shop-list-section section-fluid-270 section-top-gap-100">
        <div class="box-wrapper">
            <div class="shop-list-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                           
                           
                            <div class="product-shop-list-items">
                                <div class="row mb-n25">
                                <?php 
                                
                                        if(empty(mysqli_fetch_assoc($res))){
                                           echo set_message(display_error("Product not found! Try again"));
                                           display_message();
                                        }else{
                                            
                                       
                                        
                                        
                                        while($row=mysqli_fetch_assoc($res)) { ?>
                                    <div class="col-xl-4 col-md-6 col-12 mb-25">
                                        <!-- Start Product Single Item - Style 1 -->
                                      
                                        <div class="product-single-item-style-1">
                                            <a href="product-details-default.html" class="image img-responsive">
                                                <img class="img-fluid" src="admin/products/<?php echo $row['image']?>" width="435" height="350" alt="">
                                                <!-- <ul class="tooltip-tag-items">
                                                    <li class="color-green">15%</li>
                                                </ul> -->
                                            </a>
                                            <div class="content justify-content-center text-center">
                                                <div class="top">
                                                   
                                                    <h4 class="title"><a href="product-details-default.html"><?php echo $row['product_name'] ?></a></h4>
                                                    <span class="price"><? echo number_format($row['price']) ?></span>
                                                </div>
                                                <div class="bottom justify-content-center text-center">
                                                   
                                                    <div class="product-event-items">
                                                        <a href="cart.html" class="btn cart-btn">Add to cart</a>
                                                      
                                                    </div>
                                                </div>

                                            </div>
                                         
                                        </div>
                                       
                                        <!-- End Product Single Item - Style 1 -->
                                    </div>
                                    <?php  }} ?>
                                   
                                    </div>
                                  
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop List Section:::... -->

    <?php  require_once 'php_files/footer.php'; ?>