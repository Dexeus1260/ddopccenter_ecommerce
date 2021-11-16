<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['USER']))
      {
          header("location: index.php");
      }
    //   session_destroy();
      var_dump($_SESSION['cart']);
      $whereIn = implode(',',$_SESSION['cart']);
      $cart= array($whereIn);
     

      global $con;
      $sql = "select * from products where p_id in ($whereIn)";
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
                            <h2 class="title"><span class="text-mark">Product</span> Cart</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="index.php">Shop</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Breadcrumb Section :::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section section-fluid-270 section-top-gap-100">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                              <?php if(!empty($res)) {?>
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                    <?php while($row=mysqli_fetch_assoc($res)){ ?>
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><img src="admin/products/<?php echo $row['image']?>" alt=""></td>
                                            <td class="product_name"><a><?php echo $row['product_name'] ?></a></td>
                                            <td class="product-price"><?php echo number_format($row['price'])  ?></td>
                                            <td class="product_quantity"><label>Quantity</label><input min="1" max="100" value="<?php echo array_count_values($cart);?>" type="number"><?php print_r( array_count_values($cart));?></td>
                                            <?php    
                                         
                                                $total = 0;
                                                $total += $row['price'];
                                                echo $total;
                                                } ?>

                                            <td class="product_total">
                                                <?php echo $total;?></td>
                                        </tr> 
                                      
                                        <!-- <tr>
                                            <td class="product_remove"><a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><a href="product-details-default.html"><img src="assets/images/products/small/product-small-3.webp" alt=""></a></td>
                                            <td class="product_name"><a href="product-details-default.html">Handbag elit</a></td>
                                            <td class="product-price">$80.00</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                            <td class="product_total">$160.00</td>
                                        </tr>  -->
                                    </tbody>
                                </table>
                                
                            </div>

                            
                            <div class="cart_submit">
                                <button class="btn btn-sm btn-radius btn-default" type="submit">update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-sm btn-radius btn-default">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">$215.00</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $255.00</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">$215.00</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#" class="btn btn-sm btn-radius btn-default">Proceed to Checkout</a>
                                </div>
                                <?php  
                               } else{set_message(display_error("Your cart is currently empty.")); display_message();} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->

    <?php  require_once 'php_files/footer.php' ?>