<?php

require_once 'admin/functions/config.php';


	

if(isset($_POST["action"]))
{
	
	$query = "
	select 
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
            ORDER BY p_id ASC
            limit 12

			";
	
	if(isset($_POST["category"]))
	{
		
		$cat_filter = implode("','", $_POST["category"]);
		$query = "
		select 
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
			
			where categories.cat_name IN('".$cat_filter."')
		";
	}
	if(isset($_POST["sub"]))
	{
		$sub_filter = implode("','", $_POST["sub"]);
		$query = "
		select 
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
			
		 where sub_cat.sub_cat_title IN('".$sub_filter."')
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query = "
		select 
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
			
		where brand.brand_title IN('".$brand_filter."')
		";
	}

	$res = mysqli_query($con,$query);
	// var_dump($res) ;
	
	if(mysqli_num_rows($res) != 0)
	{
		
		while($row=mysqli_fetch_array($res))
		{
			
			?>
		
						<div class="col-md-6 col-12 mb-25">
							<div class="product-single-item-style-1 swiper-slide">
								<a href="single_prod.php?id=<?php echo $row['p_id'] ?>" class="image img-responsive ">
									<img class="img-fluid" src="admin/products/<?php echo $row['image'] ?>" width="435" height="350" loading="lazy" alt="product-image">
									<ul class="tooltip-tag-items">
										
									</ul>
								</a>
							<div class="content justify-content-center text-center">
								<div class="top">
									<span class="catagory"><?php echo $row['cat_name'] ?></span>
									<h4 class="title"><a href="single_prod.php?id=<?php echo $row['p_id']?>"><?php echo $row['product_name']?></a></h4>
									<span class="price">₱<?php echo number_format($row['price'])?></span>
								</div>
										<div class="bottom justify-content-center text-center">
											<ul class="review-star">
											<?php 
											$productID = $row['p_id'];
											$totalStar = 5;
											$sql = "select *,avg(rating) from reviews where product_id = '$productID' ";
											$results = mysqli_query($con,$sql);
											$row = mysqli_fetch_assoc($results);
											$star =round($row['avg(rating)']); 

											if(!empty($row['rating']))
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
						</div>
	
			<?php

			
		}

			
	}
	else
	{
		echo '<h3>No Data Found</h3>';
	}
			
}

?>