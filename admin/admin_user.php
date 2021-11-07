<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }

      global $con;
      $sql = "select * from admin";
      $res = mysqli_query($con,$sql);
?>
   


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Admin</h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      
                        <div class="card-body">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">Add user</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th style="width: 10%;">Operation</th>
                                           
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php while($row=mysqli_fetch_assoc($res)){ ?>
                                       <tr>
                                            <td><?php echo $row['fullname']; ?> </td>
                                            <td><?php echo $row['username']; ?> </td>
                                            <td><?php echo $row['email']; ?> </td>
                                            <td>
                                                <a href="#delete_admin<?php echo $row['admin_id'];?>" class="btn btn-primary" data-toggle="modal">Edit</a>                      
                                                <?php include('admin_modal.php');?>
                                            </td>
                                       </tr>
                                        
                                      
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-body">
                                        <h1 class="h3 mb-4 text-gray-800" id="exampleModalLabel">Add user</h1>
                                            <form class="js-validation" method="POST">
                                                    <div class="block block-rounded">
                                                        <div class="block-content block-content-full">
                                                            <?php       
                                                                add_user();
                                                                display_message();?>
                                                            <div class="items-push">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="u_name" placeholder="Full name" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="u_username" placeholder="Username" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control" name="u_email" placeholder="Email" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="password" class="form-control" name="u_password" placeholder="Create password" required >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="col-lg-12">
                                                                    <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary mb-3" name="add_user_btn">Submit</button>
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
