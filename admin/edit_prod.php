<?php require_once 'php_files/header.php';
      require_once 'php_files/nav.php'; 

      if(!isset($_SESSION['ADMIN']))
      {
          header("location: index.php");
      }
      

        $id=$_GET['id'];

        global $con;
        $new_prod = safe_value($con,$_POST['prod_up']);
        $new_des = safe_value($con,$_POST['des_up']);
        $new_price = safe_value($con,$_POST['price_up']);
        $new_qty = safe_value($con,$_POST['qty_up']);
        $new_image = safe_value($con,$_POST['image_up']);
        $old_image = safe_value($con,$_POST['image_old']);
        
        if($new_image==$old_image || empty($new_image)){

            $image_up = $old_image;
        }else{
            $image_up = $new_image;
        }

      
            $up = "update products set product_name = '$new_prod', description = '$new_des', price = '$new_price', qty = '$new_qty' , image = '$image_up' where p_id = '$id'";
            $res = mysqli_query($con,$up);

            if($res){
                // echo '<script>alert("Category updated!");</script>';
                header("location: products.php");
            }
            
        
        ?>

<?php require_once 'php_files/footer.php' ?>
