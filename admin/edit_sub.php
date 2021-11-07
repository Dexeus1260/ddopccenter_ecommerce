<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      

        $id=$_GET['id'];
        global $con;
        $new_sub = safe_value($con,$_POST['sub_cat_up']);
       

      
            $up = "update sub_cat set sub_cat_title = '$new_sub' where sub_cat_id = '$id'";
            $res = mysqli_query($con,$up);

            if($res){
                // echo '<script>alert("Category updated!");</script>';
                header("location: sub_cat.php");
            }
            
        
        ?>

<?php require_once 'php_files/footer.php' ?>
