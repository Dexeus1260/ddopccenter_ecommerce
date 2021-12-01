<?php 

if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      ?>

<!-- edit brand -->
<div class="modal fade" id="edit_profile<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <div class="card-body">
                            <h1 class="h3 mb-4 text-gray-800" id="myModalLabel">Update profile</h1>
                            <?php
                                global $con;
                            
                                $query = "select * from users where id = '".$row['id']."'";
                                $res2 = mysqli_query($con,$query);
                            
                            ?>
                                <div class="block block-rounded">
                                    <form method="POST" action="edit_profile.php?userId=<?php echo $row['id'];?>">
                                            <div class="block-content block-content-full">
                                                    <?php       
                                                        display_message();?>
                                                    <div class="items-push">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="form-group">
                                                            <?php while($row=mysqli_fetch_assoc($res2 )){?>
                                                            <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="default-form-box">
                                                                            <label>Full Name <span>*</span></label>
                                                                            <input type="text"  name="name"value="<?php echo $row['fullname'] ?> ">
                                                                           
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="default-form-box">
                                                                            <label>Address <span>*</span></label>
                                                                            <input type="text" name="address" value="<?php echo $row['address'] ?> ">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                
                                                                    <div class="col-lg-6">
                                                                        <div class="default-form-box">
                                                                            <label>Mobile<span>*</span></label>
                                                                            <input type="text" name="mobile" value="<?php echo $row['mobile'] ?> ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="default-form-box">
                                                                            <label> Email Address <span>*</span></label>
                                                                            <input type="email" name="email"  value="<?php echo $row['email'] ?> ">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="col-lg-12">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button>
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

