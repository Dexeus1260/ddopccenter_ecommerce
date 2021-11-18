
<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 


   if(!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order']))
     {
         header('location:index.php');
         exit();
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
                            <h2 class="title"><span class="text-mark">Order</span> Complete</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="index.php">Shop</a></li>
                            <li>Order Complete</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Breadcrumb Section :::... -->

    <!-- ...:::: Start Error Section :::... -->
    <div class="error-section section-fluid-270 section-top-gap-100">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="error-form text-center">
                        <img class="img-fluid" src="assets/images/success/success.png" alt="">
                       
                        <div class="row">
                            <div class="col-10 offset-1 col-md-4 offset-md-4">
                                <div class="default-search-style d-flex">
                               
                                    <div class="col-md-12">
                                        <h1>Thank you!</h1>
                                        <p>
                                            Your order has been placed.
                                            <?php unset($_SESSION['confirm_order']);?>
                                        </p>
                                    </div>
                               
                                    
                                </div>
                                <a href="index.php" class="btn btn-sm btn-default-outline mt-4">Back to home page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Error Section :::... -->




<?php  require_once 'php_files/footer.php' ?>











