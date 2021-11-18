<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

    //   if(!isset($_SESSION['USER']))
    //   {
    //       header("location: index.php");
    //   }
      
      
        
        
        if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
        {
            $productID = intval($_POST['p_id']);
            $productQty = intval($_POST['product_qty']);
            
            global $con;
            $sql = "select * from products where p_id = '$productID'";
            $res = mysqli_query($con,$sql);
            
            while($row=mysqli_fetch_assoc($res)){
    
    
                $calculateTotalPrice = number_format($productQty * $row['price'],2);
    
                $cartArray = [
                    'product_id' =>$productID,
                    'qty' => $productQty,
                    'product_name' =>$row['product_name'],
                    'product_price' => $row['price'],
                    'total_price' => $calculateTotalPrice,
                    'product_img' =>$row['image']
                ];
    
            }
          
           
            
            if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
            {
                $productIDs = [];
                foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
                {
                    $productIDs[] = $cartItem['product_id'];
                    if($cartItem['product_id'] == $productID)
                    {
                        $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                        $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                        break;
                    }
                }
    
                if(!in_array($productID,$productIDs))
                {
                    $_SESSION['cart_items'][]= $cartArray;
                }
    
                $successMsg = true;
                
            }
            else
            {
                $_SESSION['cart_items'][]= $cartArray;
                $successMsg = true;
            }
            echo '<script>alert("Product added to cart!")</script>';
        }

        $pid = $_GET['id'];
        global $con;
        $sql = "select 
                    products.p_id,products.product_name, products.sub_cat,products.brand ,products.description,products.category_name,products.price,products.qty,products.image,
                    categories.cat_name, 
                    sub_cat.sub_cat_title, 
                    brand.brand_title 
                    
                    from products 
                    left join sub_cat 
                    on sub_cat.sub_cat_id = products.sub_cat
                    left join categories 
                    on categories.id = products.category_name
                    LEFT join brand
                    on brand.brand_id = products.brand
                    Where p_id = '$pid'"; 
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
                            <h2 class="title"><span class="text-mark">Product</span> Details</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                            <li>Product Details Default</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Breadcrumb Section :::... -->

    <!-- ...::: Strat Product Gallery Section :::... -->
    <div class="product-gallery-info-section section-fluid-270 section-top-gap-100">
        <div class="box-wrapper">
            <div class="product-gallery-info-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-8 col-lg-6">
                            <!-- Start Product Gallert - Tab Style -->
                            <div class="product-gallery product-gallery--style-tab">
                                <div class="row flex-md-row flex-column-reverse">
                                    <div class="col-md-2">
                                        <!-- Start Product Thumbnail -->
                                        
                                        <!-- End Product Thumbnail -->
                                    </div>
                                    <?php 
                                   
                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                    <div class="col-md-10">
                                        <!-- Start Product Large Image -->
                                        <div class="product-large-image tab-content">
                                            <div class="tab-pane fade show active" id="img-1" role="tabpanel">
                                                <div class="image">
                                                    <img class="img-fluid" src="admin/products/<?php echo $row['image']?>" alt="">
                                                </div>
                                            </div>
                                         
                                        </div>
                                        <!-- End Product Large Image -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Gallert - Tab Style -->
                        </div>
                     
                            <div class="col-xxl-4 col-lg-6">
                            <!-- Start Product Content -->
                            <div class="product-content">
                                <span class="catagory"><?php echo $row['cat_name'] ?> </span>
                                <?php 
                                $id=$row['p_id'];
                                $cat = $row['category_name']?>
                                <h2 class="title"><?php echo $row['product_name'] ?></h2>
                                <span class="author">Brand: <?php echo $row['brand_title'] ?></span>
 
                                <span class="price">₱<?php echo number_format($row['price'])?></del></span>  
                                </div>
                                <br>
                                <ul class="variable-items">
                                <form class="form-inline" method="POST" action="#">      
                                        <li class="variable-single-items">
                                           
                                                <div class="form_group default-form-box">
                                                  
                                                    <input type="number"  name="product_qty" id="productQty" value="1"  min="1" max="1000" value="1">
                                                    <input type="hidden" name="p_id" value="<?php echo $row['p_id']?>" >
                                                   
                                                </div>
                                            
                                        </li>
                                        <li class="variable-single-items">
                                            <button type="submit"  name="add_to_cart" value="add to cart" class="btn btn-sm btn-default">Add To Cart</button>
                                        </li>
                                    </ul>
                            </div>
                            <!-- End Product Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Product Gallery Section :::... -->

    <!-- ...::: Strat Product Description Section :::... -->
    <div class="product-description-section  section-fluid-270 section-top-gap-100">
        <div class="box-wrapper">
            <div class="product-description-wrapper">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="product-description-content">
                                <h6 class="title">Description</h6>
                                <p><?php echo $row['description'] ?> </p>

                               

                                
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Product Description Section :::... -->

    

    
    <?php  require_once 'php_files/footer.php' ?>