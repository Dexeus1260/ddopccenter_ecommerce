<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
     
     

?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Sub Categories</h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <?php $value = manage_sub(); ?>
                        <div class="card-body">
                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSubModal">Add Sub-category</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           
                                            <th>Sub-category Name</th>
                                            <th>Category Name</th>
                                            <th style="width: 20%;"  >Operations</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                            <?php while($row=mysqli_fetch_assoc($value)){
                                            ?>
                                            <td><?php echo $row['sub_cat_title'];?></td>
                                            <td ><?php echo $row['cat_name'];?></td>
                                            <!-- <td>Asus</td> -->
                                         
                                            <td >

                                                <!-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#upCatModal">Edit</a> -->
                                                <a href="#edit_sub<?php echo $row['sub_cat_id'];?>" class="btn btn-primary" data-toggle="modal">Edit</a>                      
                                                <a class="btn btn-danger"  href="#delete_sub<?php echo $row['sub_cat_id']; ?>" data-toggle="modal">Delete</a>
                                                <?php include('sub_modal.php'); ?>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                           
                    <div class="modal fade" id="addSubModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-body">
                                        <h1 class="h3 mb-4 text-gray-800" id="exampleModalLabel">Add Sub-category</h1>
                                            <form  method="POST">
                                                    <div class="block block-rounded">
                                                        <div class="block-content block-content-full">
                                                            <?php     
                                                                $parent = manage_cat();   
                                                                add_sub();
                                                                display_message();?>
                                                            <div class="items-push">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="sub_cat" placeholder="Sub-category name" >

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Parent Category</label>
                                                                        <select type="text" class="form-control" name="parent_cat">
                                                                            <option disabled> Select Category</option>
                                                                            <?php 
                                                                            while($row=mysqli_fetch_assoc($parent)){
                                                                            ?>
                                                                            <option value="<?php echo $row['id']?>"><?php echo $row['cat_name']?></option> 
                                                                             <?php } ?>   
                                                                              

                                                                        </select>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="col-lg-12">
                                                                    <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary mb-3" name="add_sub_btn">Submit</button>
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
