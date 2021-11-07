<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      

        $id=$_GET['id'];
        global $con;
        $new_cat = safe_value($con,$_POST['category_up']);
       

      
            $up = "update categories set cat_name = '$new_cat' where id = '$id'";
            $res = mysqli_query($con,$up);

            if($res){
                // echo '<script>alert("Category updated!");</script>';
                header("location: categories.php");
            }
            
        
        ?>

<?php require_once 'php_files/footer.php' ?>
