<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 
      
      if(!isset($_SESSION['USER'])){
        header("location: user_login.php");
         }else{
        $user = $_SESSION['USER'];
         }

         if(isset($_POST['save']) && isset($_POST['add_review']))
         {
    

             $uid = $_POST['uID'];
             $pID = $_POST['pID'];
             $user = $_POST['user'];
             $rev = $_POST['prov_rev'];
             $ratedIndex = $_POST['ratedIndex'];
             $ratedIndex++;
          
             if($uid === 0)
             {
                global $con;
                $sql = "insert into reviews (user, product_id, rating, review) values ('$user','$pID','$ratedIndex','$rev')";
                $res = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($res);
                $uid = $row['user'];
            }
            else
            {
                $sql = "update reviews set rating = $ratedIndex where user = $uid";

            }

            exit(json_encode(array('user' => $uid)));


         }



         global $con;
         $sql = "select 
         order_products.user_id,order_products.order_id,order_products.product_id,order_products.product_qty,order_products.total_amount,order_products.order_date,order_products.delivery,	
         products.product_name,
         products.image,
         products.p_id,
         users.username,
         users.email,
         users.id
         
         from order_products 
         left join products 
         on products.p_id = order_products.product_id
         left join users 
         on users.id = order_products.user_id
         group by product_id
       ";
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
                            <h2 class="title"><span class="text-mark">Add</span> review</h2>
                        </div>
                        <ul class="breadcrumb-nav">
                            <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                            <li>Review</li>
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
                        <div class="col-lg-12">
                            <!-- Start Product Gallert - Tab Style -->
                            <div class="product-gallery product-gallery--style-tab">
                            <form class="user" method="POST" action="">
                                <div class="row flex-md-row flex-column-reverse">
                                
                                    <div class="col-md-4 ">
                                        <?php while($row=mysqli_fetch_assoc($res)){ ?>
                                            <div class="tab-pane fade show active" id="img-1" role="tabpanel">
                                                <div class="image text-center">
                                                    <img  src="admin/products/<?php echo $row['image']?>" width="50%" height="50%" alt="">
                                                </div>
                                                <div class="text-center p-4">
                                                    <h5> <?php echo $row['product_name']; ?></h5>
                                                </div>
                                                <input class="form-control" type="hidden" name="pID" value="<?php echo $row['p_id'] ?>">
                                                <input class="form-control" type="hidden" name="user" value="<?php echo $row['user_id'] ?>">
                                            </div>
                                        <?php } ?>        
                                    </div>
                                    <div class="col-md-8 ">
                                        <div class="product-description-content">
                                                <div class="form-group "> 
                                                    <h6 class="title">Add Rating</h6>
                                                            <ul class="text-left">
                                                                <li class="material-icons" data-index="1">star</li>
                                                                <li class="material-icons" data-index="2">star</li>
                                                                <li class="material-icons" data-index="3">star</li>
                                                                <li class="material-icons" data-index="4">star</li>
                                                                <li class="material-icons" data-index="5">star</li>
                                                            </ul>
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="title mt-4">Add Review</h6>
                                                    <textarea class="form-control" name="prod_rev" rows="3" required></textarea>
                                                   
                                                </div>
                                                <div class="form-group mt-3">
                                                    <button class="btn btn-primary" name="add_review" type="submit">Submit</button>  
                                                </div>  
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
                        <div class="col-xl-12 col-lg-10">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Product Description Section :::... -->


<?php  require_once 'php_files/footer.php'; ?>

<script>

var ratedIndex = -1, uID = 0;
$('document').ready(function(){
    resetStar();
    if(localStorage.getItem('ratedIndex') != null)
        setStar(parseInt(localStorage.getItem('ratedIndex')));

    $('.material-icons').on('click', function(){
        ratedIndex =parseInt($(this).data('index'))
        localStorage.setItem('ratedIndex', ratedIndex);
        saveToDB();
    });
    $('.material-icons').mouseover(function(){
        resetStar();    
        var curIndex = parseInt($(this).data('index'));
        setStar(curIndex);
    });
    $('.material-icons').mouseleave(function(){
        resetStar();

        if(ratedIndex != -1)
          setStar(ratedIndex);
    });
    
});

function setStar(max)
{
    for (var i=1 ; i <= max ; i++)
                $('.material-icons:eq('+i+')').css('color','orange');
}

function resetStar(){
    $('.material-icons').css('color','grey');
}

function saveToDB()
{
    $.ajax({
        url: "review.php",
        method: "POST",
        dataType: "json",
        data: {
            save: 1,
            uID: uID,
            rateIndex: ratedIndex
        }, success: function(r)
        {
            uID = r.uID;
        }
    });
}

</script>