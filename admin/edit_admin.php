<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      

        $id=$_GET['id'];
        global $con;
        $n_fName = safe_value($con,$_POST['f_name']);
        $n_uNname = safe_value($con,$_POST['u_name']);
        $n_email = safe_value($con,$_POST['email']);
       

      
            $up = "update admin set fullname = '$n_fName', username = '$n_uNname', email = '$n_email'  where admin_id = '$id'";
            $res = mysqli_query($con,$up);

            if($res){
                // echo '<script>alert("Category updated!");</script>';
                header("location: admin_user.php");
            }
            
        
        ?>

<?php require_once 'php_files/footer.php' ?>
