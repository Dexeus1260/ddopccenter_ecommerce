<?php 

if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      ?>

<!-- edit brand -->
<div class="modal fade" id="edit_prod<?php echo $row['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Update product</h1>
                            <?php
                                global $con;
                            
                                $query = mysqli_query($con,"select * from products where p_id = '".$row['p_id']."'");
                                $row = mysqli_fetch_array($query);
                            
                            ?>
                                <div class="block block-rounded">
                                    <form method="POST" action="edit_prod.php?id=<?php echo $row['p_id'];?>">
                                            <div class="block-content block-content-full">
                                                    <?php       
                                                        display_message();?>
                                                    <div class="items-push">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="text" class="form-control" name="prod_up" value="<?php echo  $row['product_name']?>">
                                                             
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                
                                                                <textarea class="form-control" name="des_up" rows="5" required ><?php echo $row['description']?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="text" class="form-control" name="price_up" value="<?php echo  $row['price']?>">
                                                             
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="text" class="form-control" name="qty_up" value="<?php echo  $row['qty']?>">
                                                             
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="file" class="form-control" name="image_up">
                                                                <input type="hidden" class="form-control" name="image_old" value="<?php echo $row['image']?>">
                                                                <img src="products/<?php echo $row['image'] ?>" width="100%" height="100%" class="mt-3"style="display: block;margin-left: auto;margin-right: auto;"/> 

                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="col-lg-12">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    
                                                </div>
                                            
                                            </div> 
                                    </form>
                              
                        </div> 
                    </div>
                </div>
            </div>
        </div>
</div>


<!-- delete brand  -->
<div class="modal fade" id="delete_prod<?php echo $row['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Delete Brand</h1>
                            <?php
                                global $con;
                                $query = mysqli_query($con,"select * from products where p_id = '".$row['p_id']."'");
                                $drow = mysqli_fetch_array($query);
                            
                            ?>
                                     <div class="block block-rounded">
                                         <h5 class="mb-3">Are you sure to delete <b><?php echo $drow['product_name'];?></b> ?</h5>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                                            <a href="delete_prod.php?id=<?php echo $drow['p_id']?>"class="btn btn-primary"> Delete</a>
                                    </div> 
                            
                              
                    </div> 
                </div>
                
				
            </div>
    </div>
</div>