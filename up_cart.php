<?php 
require_once 'admin/functions/config.php';

// add cart
    if(empty($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }

    global $con;
    $q_new = intval($_POST['quantity_new']);
    $q_old = intval($_POST['quantity_old']);
    $prod  = $_POST['id'];

        
          if($q_new==$q_old){
            echo '<script> location.href="cart.php"  </script> ';
          }elseif($q_new>$q_old){
            for($i=$q_old;$i<=$q_new-1;++$i){
                
                array_push($_SESSION['cart'],$prod);

            }
            echo '<script> location.href="cart.php"  </script> ';
          }else{
           
            for($i=$q_old;$i>=$q_new+1;--$i){
                $key=array_search($prod,$_SESSION['cart']);
                unset($_SESSION['cart'][$key]);
             }
             echo '<script> location.href="cart.php"  </script> ';
            }
      

    

    
    
  




?>