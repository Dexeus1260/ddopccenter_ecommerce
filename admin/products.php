<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }

      $prod = admin_prod()
      
?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Products</h1>
                                
                                   
                                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addProdModal" >Add Products</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;" >Prod ID</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Stocks</th>
                                            <th>Image</th>
                                           
                                            <th>Operations</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php while($row=mysqli_fetch_assoc($prod)){?>
                                            <tr>
                                                <td><?php echo $row['p_id']; ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['cat_name'];?></td>
                                                <td><?php echo number_format($row['price']); ?></td>
                                                <td><?php echo $row['qty']; ?></td>
                                                <td><?php echo $row['qty']-$row['product_qty']; ?></td>
                                                <td><img src="products/<?php echo $row['image'];?>" height=100px width=100px></td>
                                                <td>
                                                    <a href="#edit_prod<?php echo $row['p_id'];?>" class="btn btn-primary" data-toggle="modal">Edit</a>                      
                                                    <a class="btn btn-danger"  href="#delete_prod<?php echo $row['p_id']; ?>" data-toggle="modal">Delete</a>
                                                    <?php include('prod_modal.php'); ?>
                                                </td>

                                            
                                            
                                            </tr>
                                            
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

 
                    <?php $brand = manage_brands(); ?>
                    <div class="modal fade" id="addProdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-body">
                                        <h1 class="h3 mb-4 text-gray-800" id="exampleModalLabel">Add Products</h1>
                                            <form class="add-post-form " enctype="multipart/form-data" method="POST">
                                                    <div class="block block-rounded">
                                                        <div class="block-content block-content-full">
                                                            <?php       
                                                                
                                                                display_message();?>
                                                            <div class="items-push">
                                                              <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Product Name</span></label>
                                                                        <input type="text" class="form-control" name="prod_name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">  
                                                                    <div class="form-group brand">
                                                                    <label for="val-username">Brand</span></label>
                                                                    <?php save_products(); display_message() ?> 
                                                                        <select name="brand_N" class="form-control" id="brand_select" required>
                                                                        <option selected disabled value="" > Select Brand</option>
                                                                                    <?php 
                                                                                        while($row = mysqli_fetch_assoc($brand))
                                                                                        {
                                                                                            ?>
                                                                                            <option value="<?php echo $row['brand_id'];?>"><?php echo $row['brand_title'];?></option>
                                                                                    <?php }
                                                                                    ?>
                                                                        </select>
                                                                    </div>
                                                                </div>  
                                                                <div class="col-md-12 ">  
                                                                    <div class="form-group">
                                                                    <label for="val-username">Category</span></label>
                                                                       
                                                                            <select name="cat_id" class="form-control product_category" id="cat_select" required>
                                                                            <option selected disabled > Select Category</option>  
                                                                                    
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">  
                                                                    <div class="form-group sub_category">
                                                                        <label for="val-username">Sub-category</span></label>
                                                                        <select name="sub_N" class="form-control" id="sub_cat_select"  required>
                                                                            <option selected disabled > Select Sub-category</option>  
                                                                        </select>
                                                                    </div>
                                                                </div>                   
                                                              
                                                            
                                                    
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Price</span></label>
                                                                        <input type="text" class="form-control" name="prod_price" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Quantity</span></label>
                                                                        <input type="text" class="form-control" name="prod_qty" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Description</span></label>
                                                                    <textarea class="form-control" name="prod_des" rows="5" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Image</span></label>
                                                                        <input type="file" class="form-control" name="prod_image" required>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                                <div class="col-lg-12 mt-3">
                                                                    <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary mb-3" name="add_prod_btn">Submit</button>
                                                                </div>
                                                            
                                                        </div>
                                                </div>
                                            </form>
                                     </div>
                                </div>
                            </div>
                        </div>                            
                    </div>               



<?php require_once 'php_files/footer.php' ?>
<script>

$('document').ready(function()
{
  

    $('#brand_select').on('change',function()
    {
        var brand_id = this.value;
        $.ajax({
            url: "get_brand.php", type: "POST", data: { brand_id : brand_id },
            cache: false, success: function(result){
                $("#cat_select").html(result);
            }


        });

    });

    $('#brand_select').on('change',function()
    {
        var brand_id = this.value;
        $.ajax({
            url: "get_sub_cat.php", type: "POST", data: { brand_id : brand_id},
            cache: false, success: function(result){
                $("#sub_cat_select").html(result);
            }


        })
    });
});
</script>