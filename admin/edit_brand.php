<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      

        $id=$_GET['id'];
        global $con;
        $new_brand = safe_value($con,$_POST['brand_up']);
       

      
            $up = "update brand set brand_title = '$new_brand' where brand_id = '$id'";
            $res = mysqli_query($con,$up);

            if($res){
                // echo '<script>alert("Category updated!");</script>';
                header("location: brands.php");
            }
            
        
        ?>

<?php require_once 'php_files/footer.php' ?>
