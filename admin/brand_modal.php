<?php 

if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      ?>

<!-- edit brand -->
<div class="modal fade" id="edit_brand<?php echo $row['brand_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Update Brand</h1>
                            <?php
                                global $con;
                            
                                $query = mysqli_query($con,"select * from brand where brand_id = '".$row['brand_id']."'");
                                $row = mysqli_fetch_array($query);
                            
                            ?>
                                <div class="block block-rounded">
                                    <form method="POST" action="edit_brand.php?id=<?php echo $row['brand_id'];?>">
                                            <div class="block-content block-content-full">
                                                    <?php       
                                                        display_message();?>
                                                    <div class="items-push">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="text" class="form-control" name="brand_up" value="<?php echo  $row['brand_title']?>">
                                                                <!-- <input type="hidden" class="form-control" name="cat_id" value="<?php echo $row['id'];?>"> -->
                                                                <!-- <input type="hidden" class="form-control" name="cat_name" value="<?php echo $cat_name;?>" > -->
                                                                
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
<div class="modal fade" id="delete_brand<?php echo $row['brand_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Delete Brand</h1>
                            <?php
                                global $con;
                                $query = mysqli_query($con,"select * from brand where brand_id = '".$row['brand_id']."'");
                                $drow = mysqli_fetch_array($query);
                            
                            ?>
                                     <div class="block block-rounded">
                                         <h5 class="mb-3">Are you sure to delete <b><?php echo $drow['brand_title'];?></b> brand?</h5>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                                            <a href="delete_brand.php?id=<?php echo $drow['brand_id']?>"class="btn btn-primary"> Delete</a>
                                    </div> 
                            
                              
                    </div> 
                </div>
                
				
            </div>
    </div>
</div>