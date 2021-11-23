<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['USER']))
      {
        echo '<script>alert("You are not logged in!") </script>';
          header("location: index.php");
      }
    //   session_destroy();
     
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
<?php if(!empty($_SESSION['cart_items'])){
    if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0){?>
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
                                            <!-- <th class="product_total">Operation</th> -->
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                   
                                    <tbody>
                                   
                                  <?php 
                                        $totalCounter = 0;
                                        $itemCounter = 0;
                                        foreach($_SESSION['cart_items'] as $key => $item){

                                      
                                        
                                        $total = $item['product_price'] * $item['qty'];
                                        $totalCounter+= $total;
                                        $itemCounter+=$item['qty'];
                                        ?>
                                   
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove" ><a href="cart2.php?action=remove&item=<?php echo $key?>" id="emptyCart" ><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><img src="admin/products/<?php echo $item['product_img'] ?>" alt=""></td>
                                            <td class="product_name"><a><?php echo $item['product_name'];?></a></td>
                                            <td class="product-price">₱<?php echo  number_format($item['product_price']);?></td>
                                            <td class="product_quantity">
                                                <label>Quantity</label>
                                                <input min="1" max="100" class="cart-qty-single" data-item-id="<?php echo $key?>" value="<?php echo $item['qty'];?>" type="number">
                                            </td>
                                            <td class="product_total">₱ <?php echo  number_format($total) ?></td>
                                                <!-- <td>
                                                    <button type="submit" name="submit" class="btn btn-sm btn-radius btn-default">update qty</button>
                                                </td>   
                                                -->
                                                
                                            </tr> 
                                            
                                            
                                            
                                            <?php }?>
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
                                    <p class="cart_amount">₱<?php echo number_format($totalCounter);?></p>
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
    <?php } ?>
    <?php 
     }else{?>       
                            <div class="cart-section section-fluid-270 section-top-gap-100">
                                    <!-- Start Cart Table -->
                                    <div class="cart-table-wrapper">
                                        <div class="container-fluid">
                                  <?php
                                   set_message(display_error("Your cart is empty"));display_message();?>
                                         </div>
                                    </div>
                                </div>
                                <?php } ?>

    <?php  require_once 'php_files/footer.php' ?>

    