<?php 
require_once 'admin/functions/config.php';

// add cart
    if(empty($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }
   
    

    $q_new = intval($_POST['quantity_new']);
    $q_old = intval($_POST['quantity_old']);
    
    $_SESSION['name'] = $_POST['prod_name'];
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['image'] = $_POST['prod_image'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['quantity'] = $_POST['quantity_new'];
    $_SESSION['total'] = $_POST['total'];
    $_SESSION['sum'] = $_POST['sum'];
   


    
          if($q_new==$q_old){
            echo '<script> location.href="cart.php"  </script> ';
          }elseif($q_new>$q_old){
            for($i=$q_old;$i<=$q_new-1;++$i){
                
                array_push($_SESSION['cart'],$_GET['id']);
               

            }
            echo '<script> location.href="cart.php"  </script> ';
          }else{
           
            for($i=$q_old;$i>=$q_new+1;--$i){
                $key=array_search($_GET['id'],$_SESSION['cart']);
                unset($_SESSION['cart'][$key]);
             }
             echo '<script> location.href="cart.php"  </script> ';
            }
      
       
    

    
    
  




?>