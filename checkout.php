<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 
    
    $_SESSION['checkout'] = "checkout";

    $user = $_SESSION['USER']; 

      if(!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items']))
      {
          header('location:index.php');
          exit();
      }

     $cartItemCount = count($_SESSION['cart_items']);
    
    
    if(isset($_POST['submit']))
    {
        global $con;
        $name = safe_value($con,$_POST['name']);
        $address = safe_value($con,$_POST['address']);
        $mobile = safe_value($con,$_POST['mobile']);
        $email = safe_value($con,$_POST['email']);
        $id = safe_value($con,$_POST['id']);

        if(isset($_SESSION['cart_items']) || !empty($_SESSION['cart_items']))
        {
            $sql = "update users set fullname = '$name', address = '$address', mobile = '$mobile', email = '$email'  ";
            
            $confirm = "confirm";
            $date =  date('Y-m-d H:i:s');
            $delivery = "shipping";
          
            foreach($_SESSION['cart_items'] as $item)
            {
                
                    $product_id =  $item['product_id'];
                    $qty =  $item['qty'];
                    $total_price =  $item['total_price'];
                
          
           
            $order = "insert into order_products (user_id, product_id, product_qty, total_amount, order_date, confirm, delivery) values ('$id','$product_id','$qty','$total_price','$date','$confirm','$delivery')";
            $res = mysqli_query($con,$order);
             }
            if($res){
            unset($_SESSION['cart_items']);
            $_SESSION['confirm_order'] = true;
            header('location: thank-you.php');
            exit();
           }else{
            set_message(display_error("mali")); display_message();
           }
        }
       

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
                            <h2 class="title"><span class="text-mark">Checkout</span></h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="index.php">Shop</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Breadcrumb Section :::... -->

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section section-fluid-270 section-top-gap-100">
        <div class="container-fluid">
            <?php 
            global $con;
            $sql = "select * from users where username = '$user'|| email = '$user'";
            $cos = mysqli_query($con,$sql);?>
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form method="POST">
                            <?php while($row=mysqli_fetch_assoc($cos)){?>
                            <h3>Shipping Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Full Name <span>*</span></label>
                                        <input type="text"  name="name"value="<?php echo $row['fullname'] ?> ">
                                        <input type="hidden"  name="id" value="<?php echo $row['id'] ?> ">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Address <span>*</span></label>
                                        <input type="text" name="address" value="<?php echo $row['address'] ?> ">
                                    </div>
                                </div>
                                
                            
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Mobile<span>*</span></label>
                                        <input type="text" name="mobile" value="<?php echo $row['mobile'] ?> ">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Email Address <span>*</span></label>
                                        <input type="email" name="email"  value="<?php echo $row['email'] ?> ">
                                    </div>
                                </div>
                                
                            </div>
                            <?php } ?>
                       
                    </div>
                    <div class="col-lg-6 col-md-6">
                       
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $total = 0;
                                    
                                        foreach($_SESSION['cart_items'] as $cartItem)
                                        {
                                           
                                         
                                        ?>
            
                                    <tbody>
                                        <tr>
                                            <td> <?php echo $cartItem['product_name'] ?> <strong> × <?php echo $cartItem['qty'] ?></strong></td>
                                            <td> ₱<?php

                                           $item_price = $cartItem['qty'] * $cartItem['product_price'];
                                            
                                            echo  $item_price ?></td>

                                            
                                        </tr>
                                        
                                    </tbody>
                                    <?php 
                                   $total+=$item_price ;
                                
                                } ?>
                                    <tfoot>
                                       
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>FREE SHIPPING</strong></td>
                                        </tr>
                                       
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>₱<?php echo number_format($total,2);?></strong></td>
                                        </tr>
                                    </tfoot>
                                   
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                        <input type="radio" id="currencyCod" name="payment" checked>
                                        <span>Cash on Delivery</span>
                                    </label>

                                    <div id="methodCod" class="collapse" data-bs-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="order_button">
                                    <button class="btn btn-sm btn-radius btn-default" type="submit" name="submit">Order now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->

    <?php  require_once 'php_files/footer.php' ?>