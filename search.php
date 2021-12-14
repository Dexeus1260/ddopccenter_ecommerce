<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 
      
   
     
      if($_GET['search']==''){

          header("location: index.php");
      }else{
          global $con;
          $search = safe_value($con,$_GET['search']);
        //   $sql = "select * from products where product_name like '$search%'";
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
                                                                where products.product_name LIKE '%$search%'";
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
                                        <a href="single_prod.php?id=<?php echo $row['p_id']?>" class="image img-responsive ">
                                                <img class="img-fluid" src="admin/products/<?php echo $row['image']?>" width="435" height="350" alt="">
                                                <!-- <ul class="tooltip-tag-items">
                                                    <li class="color-green">15%</li>
                                                </ul> -->
                                            </a>
                                            <div class="content justify-content-center text-center">
                                                <div class="top">
                                                   
                                                <h4 class="title"><a href="single_prod.php?id=<?php echo $row['p_id']?>"><?php echo $row['product_name'] ?></a></h4>
                                                    <span class="price"><? echo number_format($row['price']) ?></span>
                                                </div>
                                                 <div class="bottom justify-content-center text-center">
                                                                  <ul class="review-star">
                                                                    <?php 
                                                                    $productID = $row['p_id'];
                                                                    $totalStar = 5;
                                                                    $q = "select *,avg(rating) from reviews where product_id = '$productID' ";
                                                                    $results = mysqli_query($con,$q);
                                                                    $row2 = mysqli_fetch_assoc($results);
                                                                    $star =round($row2['avg(rating)']); 

                                                                    if(!empty($row2['rating']))
                                                                    {
                                                                        for($i = 0; $i < $star; $i++)
                                                                        {
                                                                            echo '<li class="fill"><span class="material-icons">star</span></li>';
                                                                        }
                                                                    }else{
                                                                        for($i = 0; $i < 5; $i++)
                                                                        {
                                                                            echo '<li class="fill"><span class="material-icons-outlined">star_rate</span></li>';
                                                                        }
                                                                       
                                                                        
                                                                    }
                                                                    ?>
                                                                   
                                                                    </ul>
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