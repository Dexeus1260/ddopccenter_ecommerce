<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['USER']))
      {
          header("location: index.php");
      }
    //   session_destroy();
    

    
     if(!empty($_SESSION['cart'])){
 
       
        // var_dump($_SESSION['cart']);
        $whereIn = implode(',', $_SESSION['cart']);

       
        // var_dump($whereIn);
        
        global $con;
        $sql = "select * from products where p_id in ($whereIn)";
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
    <?php if(!empty($res)) {?>
    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section section-fluid-270 section-top-gap-100">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                
                              
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
                                            <th class="product_total">Operation</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                   
                                    <tbody>
                              
                                    <?php 
                                        $sum = 0;
                                        while($row=mysqli_fetch_assoc($res)){ ?>
                                   
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><img src="admin/products/<?php echo $row['image'];?>" alt=""></td>
                                            <td class="product_name"><a><?php echo $row['product_name']; ?></a></td>
                                            <td class="product-price">₱<?php echo number_format($row['price']) ; ?></td>
                                            <td class="product_quantity">
                                                <label>Quantity</label>
                                                <form method="POST" action="up_cart.php?id=<?php echo $row['p_id'] ?>" >
                                                <input min="1" max="100" name="quantity_new" value="<?php echo array_count_values($_SESSION['cart'])[$row["p_id"]];?>" type="number">
                                                <input type="hidden" name="id" value="<?php echo $row['p_id']; ?>">
                                                <input type="hidden" name="quantity_old" value="<?php echo  array_count_values($_SESSION['cart'])[$row["p_id"]]; ?>">
                                                <input type="hidden" name="prod_name" value="<?php echo $row['product_name']  ?>">
                                                <input type="hidden" name="prod_image" value="<?php echo  $row['image'] ?>">
                                                <input type="hidden" name="price" value="<?php echo  $row['price'] ?>">
                                              
                                            </td>
                                          
                                            
                                            <?php    
                                               
                                                $count = array_count_values($_SESSION['cart'])[$row["p_id"]];
                                                $total = 0;
                                                $total += $row['price'] * $count;
                                                $sum = $total+$sum;

                                                ?>
                                               
                                            <td class="product_total">₱
                                                <?php echo number_format( $total);?></td>
                                                <input type="hidden" name="total" value="<?php echo $total ?>">
                                                <input type="hidden" name="sum" value="<?php echo $sum ?>">
                                          
                                             
                                                <td>
                                                    <button type="submit" name="submit" class="btn btn-sm btn-radius btn-default">update qty</button>
                                                </td>   
                                                <?php } ?>
                                                
                                                <?php 
                                                
                                                
                                                
                                                
                                                
                                                
                                                ?>
                                            </tr> 
                                            
                                            
                                            
                                            
                                        </tbody> 
                                    </table>
                                    
                                </div>
                                
                                
                                <!-- <div class="cart_submit">
                                <button type="submit"  class="btn btn-sm btn-radius btn-default">update qty</button>
                                </div> -->
                            </form>
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
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount">FREE SHIPPING</p>
                                </div>
                               

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">₱<?php echo number_format( $sum);?></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="checkout.php" class="btn btn-sm btn-radius btn-default">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
                                    <?php  
                                    }
                                    else{
                                     ?>   

                            <div class="cart-section section-fluid-270 section-top-gap-100">
                                    <!-- Start Cart Table -->
                                    <div class="cart-table-wrapper">
                                        <div class="container-fluid">
                                    <?php
                                        set_message(display_error("Your cart is currently empty.")); display_message();} ?>
                                         </div>
                                    </div>
                            </div>

    <?php  require_once 'php_files/footer.php' ?>

    