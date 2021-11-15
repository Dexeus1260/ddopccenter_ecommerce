<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['USER']))
      {
          header("location: index.php");
      }

      $prod = q_product();
      
?>

    <!--  .....::::: Start Add Cart Offcanvas Section :::::.... -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addcartOffcanvas">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Add Cart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="offcanvas-products-list">
                <li class="single-item">
                    <div class="box">
                        <a href="" class="image">
                            <img src="assets/images/products/small/product-small-1.webp" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="content">
                            <a href="" class="title">Tops</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$100.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-delete text-right">
                        <a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a>
                    </div>
                </li>
                <li class="single-item">
                    <div class="box">
                        <a href="" class="image">
                            <img src="assets/images/products/small/product-small-2.webp" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="content">
                            <a href="" class="title">Leggings</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$49.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-delete text-right">
                        <a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a>
                    </div>
                </li>
                <li class="single-item">
                    <div class="box">
                        <a href="" class="image">
                            <img src="assets/images/products/small/product-small-3.webp" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="content">
                            <a href="" class="title">Casual Shirt</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$65.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-delete text-right">
                        <a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a>
                    </div>
                </li>
            </ul>
            <div class="offcanvas-action-link">
                <a href="cart.html" class="btn">Add Cart</a>
                <a href="checkout.html" class="btn">Checkout</a>
            </div>
        </div>
    </div>
    <!-- ...:::: End Add Cart Offcanvas Section:::... -->

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
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><a href="product-details-default.html"><img src="assets/images/products/small/product-small-1.webp" alt=""></a></td>
                                            <td class="product_name"><a href="product-details-default.html">Handbag fringilla</a></td>
                                            <td class="product-price">$65.00</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                            <td class="product_total">$130.00</td>
                                        </tr> <!-- End Cart Single Item-->
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><a href="product-details-default.html"><img src="assets/images/products/small/product-small-2.webp" alt=""></a></td>
                                            <td class="product_name"><a href="product-details-default.html">Handbags justo</a></td>
                                            <td class="product-price">$90.00</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                            <td class="product_total">$180.00</td>
                                        </tr> <!-- End Cart Single Item-->
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="#"><img src="assets/images/icons/icon-trash.svg" alt=""></a></td>
                                            <td class="product_thumb"><a href="product-details-default.html"><img src="assets/images/products/small/product-small-3.webp" alt=""></a></td>
                                            <td class="product_name"><a href="product-details-default.html">Handbag elit</a></td>
                                            <td class="product-price">$80.00</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                            <td class="product_total">$160.00</td>
                                        </tr> <!-- End Cart Single Item-->
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->

   <?php  require_once 'php_files/footer.php'; ?>