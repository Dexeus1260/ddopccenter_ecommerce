  <!-- .....:::::: Start Header Section - Dark Header :::::.... -->
  <header class="header-section pos-absolute dark-bg sticky-header d-none d-lg-block " style="padding-left: 20%;padding-right:20%;">
        <div class="header-wrapper pos-relative">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <!-- Start Header Logo -->
                        <a href="index.php" class="header-logo">
                            <img class="img-fluid" src="admin/img/DDO.png" alt="" height="200" width="200">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <div class="header-event">
                            <!-- Start Menu event -->
                            <div class="menu-event dropdown">
                                <button class="main-menu-event dropdown-toggle" data-bs-toggle="dropdown"><img src="assets/images/icons/icon-open-menu.svg" alt=""><span>Menu</span><img src="assets/images/icons/icon-arrow-drop-down.svg" alt=""></button>
                                <ul class="mainmenu-nav dropdown-menu">
                                   
                                    <li class="menu-items">
                                        <a href="product_page.php">Shop</a>

                                    </li>
                          
                                    <li class="menu-items"><a href="about.php">About Us</a></li>
                                    <li class="menu-items"><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                            <form action="search.php" method="GET">
                            <div class="search-event">
                                <input class="header-search" type="search" name="search" placeholder="Search">
                                <button class="header-search-btn" type="submit"><img src="assets/images/icons/icon-search.svg" alt=""></button>
                            </div>
                            </form>
                            <!-- End Menu event -->
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-action">
                            <!-- <button class="header-action-item header-action-wishlist" data-bs-toggle="offcanvas" data-bs-target="#addcartOffcanvas"><img src="assets/images/icons/icon-shopping-bag-light.svg" alt=""></button> -->
                            <a href="cart2.php" class="header-action-item header-action-wishlist " style="margin-top: 12px;" ><img src="assets/images/icons/icon-shopping-bag-light.svg" alt=""><span id="count">  
                                 <?php echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';?></span></a>
                            <?php 
                            if(isset($_SESSION['USER'])){
                                    ?>
                                      <a href="profile.php" class="header-action-item header-action-wishlist" ><img src="assets/images/icons/icons8-person-64.png" alt="" height="50" width="50"></a>
                           <?php }
                            else{
                                ?>
                                <a href="user_login.php" class="header-action-item header-action-wishlist text-white" style="margin-top: 12px;" >LOGIN</a>
                           <?php }
                           
                           
                           ?>
                            
                         
                          

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

        <!-- .....:::::: Start Mobile Header Section :::::.... -->
        <div class="mobile-header d-block d-lg-none">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="mobile-logo">
                        <a href="index.php"><img src="admin/img/DDO.png" alt="" height="200" width="300"></a>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="mobile-action-link text-end d-flex ">
                        <button data-bs-toggle="offcanvas" data-bs-target="#toggleMenu"><span class="material-icons">menu</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: Start MobileHeader Section :::::.... -->

    <!--  .....::::: Start Offcanvas Mobile Menu Section :::::.... -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="toggleMenu">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex justify-content-center ">
                             <a href="cart2.php" class="header-action-item header-action-wishlist "><img src="assets/images/icons/icon-shopping-bag-light.svg" alt=""><span id="count">  
                                 <?php echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';?></span></a>
                
                <?php 
                            if(isset($_SESSION['USER'])){
                                    ?>
                                         <a href="profile.php" class="header-action-item header-action-wishlist"><img src="assets/images/icons/icons8-person-64 dark.png" alt="" height="35" width="35"></a>
                           <?php }
                            else{
                                ?>
                                <a href="user_login.php" class="header-action-item header-action-wishlist text-dark" style="margin-top: 2px;" >LOGIN</a>
                           <?php }
                           
                           
                           ?>             
            </div>

            <div class="header-event mobile-search my-5">
                     <form action="search.php" method="GET">
                           <div class="search-event">
                                <input class="header-search" type="search" name="search" placeholder="Search">
                                <button class="header-search-btn" type="submit"><img src="assets/images/icons/icon-search.svg" alt=""></button>
                            </div>
                     </form>
            </div>

     
                           
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile Menu  -->
                <div class="mobile-menu-bottom">
                    <!-- Start Mobile Menu Nav -->
                    <div class="offcanvas-menu">
                        <ul>
                          
                            <li>
                                <a href="product_page.php"><span>Shop</span></a>
                               
                            </li>
                            <li>
                                <a href="about.php"><span>About Us</span></a>
                            </li>
                            <li ><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->
                </div> <!-- End Mobile Menu -->

               
            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div>
    </div>

        <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

  
