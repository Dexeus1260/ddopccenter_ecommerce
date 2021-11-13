<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
     
     $value = manage_brands();
  
?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Brands</h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBrandModal">Add Brands</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            
                                            <th style="width: 20%;" >Operations</th>
                                           
                                        </tr>
                                    </thead>
                             
                                    <tbody>
                                        <tr>    
                                         <?php while($row = mysqli_fetch_assoc($value)){ ?>
                                            <td><?php echo $row['brand_title'] ?></td>
                                            
                                            <td>
                                                <a href="#edit_brand<?php echo $row['brand_id'];?>" class="btn btn-primary" data-toggle="modal">Edit</a>                      
                                                <a class="btn btn-danger"  href="#delete_brand<?php echo $row['brand_id']; ?>" data-toggle="modal">Delete</a>
                                                <?php include('brand_modal.php');?>
                                            </td>
                                        </tr>    
                                        
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                              
                   
                    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-body"> 
                                        <h1 class="h3 mb-4 text-gray-800" id="exampleModalLabel">Add Brand</h1>
                                            <form class="js-validation" method="POST">
                                                    <div class="block block-rounded">
                                                        <div class="block-content block-content-full">
                                                            <?php       
                                                                add_brand();
                                                                display_message();?>
                                                            <div class="items-push">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label for="val-username">Brand Name</span></label>
                                                                        <input type="text" class="form-control" name="brand" required >
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                                <div class="col-lg-12">
                                                                    <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary mb-3" name="add_brand_btn">Submit</button>
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
