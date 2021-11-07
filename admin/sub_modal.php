<?php 

if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      ?>
<!-- edit sub -->
<div class="modal fade" id="edit_sub<?php echo $row['sub_cat_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Update Sub-category</h1>
                            <?php
                                global $con;
                            
                                $query = mysqli_query($con,"select * from sub_cat where sub_cat_id = '".$row['sub_cat_id']."'");
                                $row = mysqli_fetch_array($query);
                            
                            ?>
                                <div class="block block-rounded">
                                    <form method="POST" action="edit_sub.php?id=<?php echo $row['sub_cat_id']; ?>">
                                            <div class="block-content block-content-full">
                                                    <?php       
                                                        display_message();?>
                                                    <div class="items-push">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="text" class="form-control" name="sub_cat_up" value="<?php echo  $row['sub_cat_title']?>">
                                                                <!-- <input type="hidden" class="form-control" name="cat_id" value="<?php echo $row['id'];?>"> -->
                                                                <!-- <input type="hidden" class="form-control" name="cat_name" value="<?php echo $cat_name;?>" > -->
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="col-lg-12">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                                                    <button type="submit" class="btn btn-primary"> Save</button>
                                                    
                                                </div>
                                            
                                            </div> 
                                    </form>
                              
                        </div> 
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- delete sub -->



<!-- delete Cat -->
<div class="modal fade" id="delete_sub<?php echo $row['sub_cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Delete Category</h1>
                            <?php
                                global $con;
                                $query = mysqli_query($con,"select * from sub_cat where sub_cat_id = '".$row['sub_cat_id']."'");
                                $drow = mysqli_fetch_array($query);
                            
                            ?>
                                     <div class="block block-rounded">
                                         <h5 class="mb-3">Are you sure to delete <b><?php echo $drow['sub_cat_title'];?></b> sub-category?</h5>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                                            <a href="delete_sub.php?id=<?php echo $drow['sub_cat_id']?>"class="btn btn-primary"> Delete</a>
                                    </div> 
                            
                              
                    </div> 
                </div>
                
				
            </div>
    </div>
</div>