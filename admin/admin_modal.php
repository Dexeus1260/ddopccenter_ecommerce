<?php 

if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      ?>

<!-- edit brand -->
<div class="modal fade" id="edit_admin<?php echo $row['admin_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Update Brand</h1>
                            <?php
                                global $con;
                            
                                $query = mysqli_query($con,"select * from admin where admin_id = '".$row['admin_id']."'");
                                $row = mysqli_fetch_array($query);
                            
                            ?>
                                <div class="block block-rounded">
                                    <form method="POST" action="edit_admin.php?id=<?php echo $row['admin_id'];?>">
                                            <div class="block-content block-content-full">
                                                    <?php       
                                                        display_message();?>
                                                    <div class="items-push">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                                
                                                                <input type="text" class="form-control" name="f_name" value="<?php echo  $row['fullname']?>">
                                                                <input type="text" class="form-control" name="u_name" value="<?php echo  $row['username']?>">
                                                                <input type="text" class="form-control" name="email" value="<?php echo  $row['email']?>">
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