<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }

      $value = manage_cat();
     
?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
            
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCatModal">Add Category</a>
                            <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <!-- <th>Brand</th> -->
                                            <th>Brand</th>
                                            <th style="width: 20%;" >Operations</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php while($row=mysqli_fetch_assoc($value)){
                                            ?>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['cat_name'];?></td>
                                            <!-- <td>Asus</td> -->
                                            <td><?php echo $row['brand_title'] ?> </span>
                                            </td>
                                            <td>
                                                <!-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#upCatModal">Edit</a> -->
                                                <a href="#edit_cat<?php echo $row['id'];?>" class="btn btn-primary" data-toggle="modal">Edit</a>                      
                                                <a class="btn btn-danger"  href="#delete_cat<?php echo $row['id']; ?>" data-toggle="modal">Delete</a>
                                                <?php include('modal.php'); ?>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                                                
                    <div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-body">
                                        <h1 class="h3 mb-4 text-gray-800" id="exampleModalLabel">Add Categories</h1>
                                            <form class="js-validation" method="POST">
                                                    <div class="block block-rounded">
                                                        <div class="block-content block-content-full">
                                                            <?php       
                                                                add_category();
                                                                display_message();?>
                                                            <div class="items-push">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Category</span></label>
                                                                        <input type="text" class="form-control" name="category" placeholder="Category name" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label >Brand</span></label>
                                                                        <select name="brand" class="form-control" required>
                                                                        <option selected disabled value="">Select Brand</option>
                                                                        <?php 
                                                                         global $con;
                                                                         $sql = "select * from brand";
                                                                         $brand = mysqli_query($con,$sql);
                                                                        while($row=mysqli_fetch_assoc($brand)){ ?>
                                                                         <option value="<?php echo $row['brand_id']?>"><?php echo $row['brand_title'] ?></option>
                                                                         <?php }
                                                                         ?>
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                            </div>
                                                                <div class="col-lg-12">
                                                                    <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary mb-3" name="add_cat_btn">Submit</button>
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


