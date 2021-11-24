<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php';
      
    //   if(!isset($_SESSION['USER'])){
    //     header("location: user_login.php");
    //      }else{
    //     $user = $_SESSION['USER'];
    //      }
      
      
    //   session_unset();
    


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
                            <h2 class="title"><span class="text-mark">Hurry!</span> <br> Get your product now</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="index.php">Shop</a></li>
                            <li>Products</li>
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
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-xl-3 col-lg-3">
                            <!-- Start Sidebar Area -->
                            <div class="siderbar-section">
                                <!-- Start Single Sidebar Widget -->
                                <div class="sidebar-single-widget">
                                    <h6 class="sidebar-title title-border title-border">Categories</h6>
                                    <div class="sidebar-content">
                                        <div class="filter-type-select">
                                        <ul>
                                        <?php $res = display_cat();
                                        while($row=mysqli_fetch_assoc($res)){ ?>
                                                 <li>
                                                     <label class="checkbox-default input" for="red">
                                                        <input type="checkbox" id="red" class="common_selector category" value="<?php echo $row['cat_name'];?>">
                                                        <span><?php echo $row['cat_name'];?></span>
                                                     </label>
   
                                                  </li>  
                                                <?php    } ?>      
                                                </ul>
                                        </div>
                                    </div>
                                </div> <!-- End Single Sidebar Widget -->
                                <br>

                                <!-- Start Single Sidebar Widget -->
                                <div class="sidebar-single-widget">
                                    <h6 class="sidebar-title title-border">Sub-Categories</h6>
                                    <div class="sidebar-content">
                                        <div class="filter-type-select">
                                            <ul>
                                            <?php $res = display_sub();
                                                while($row=mysqli_fetch_assoc($res)){
                                                    ?>
                                                <li>
                                                    <label class="checkbox-default" for="red">
                                                        <input type="checkbox" id="red"  class="common_selector sub" value="<?php echo $row['sub_cat_title']?>">
                                                        <span><?php echo $row['sub_cat_title'] ?></span>
                                                    </label>
                                                </li>
                                              
                                                <?php    } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- End Single Sidebar Widget -->

                              

                                <!-- Start Single Sidebar Widget -->
                                <div class="sidebar-single-widget">
                                    <h6 class="sidebar-title title-border">Brands</h6>
                                    <div class="sidebar-content">
                                        <div class="filter-type-select">
                                            <ul>
                                            <?php $res = manage_brands();
                                                while($row=mysqli_fetch_assoc($res)){
                                                    ?>
                                                <li>
                                                    <label class="checkbox-default" for="fabric">
                                                        <input type="checkbox" id="fabric"  class="common_selector brand" value="<?php echo $row['brand_title'] ?>">
                                                        <span><?php echo $row['brand_title'] ?></span>
                                                    </label>
                                                </li>
                                                <?php    } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- End Single Sidebar Widget -->
                                
                                
                            </div> <!-- End Sidebar Area -->
                        </div>
                        
                        <div class="col-xl-8 offset-xl-1 col-lg-9">
                            <div class="row filter_data"></div>  
                            <div class="product-shop-list-items">
                                <div class="row mb-n25">   
                                    
                                    
                                    </div>
                                </div>
                            </div> 
                      
                            
                            
                            
                             </div>
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
           

   

<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

    <?php  require_once 'php_files/footer.php'; ?>

<script>
$('document').ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var category = get_filter('category');
        var sub = get_filter('sub');
        var brand = get_filter('brand');
        
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, category:category, sub:sub, brand:brand },
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

   

});
</script>