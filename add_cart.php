<?php 
require_once 'admin/functions/config.php';

// add cart
    if(empty($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'],$_GET['id']);

    
    
    echo '<script>
    
       if(confirm("Product added to cart! Click ok to go to cart."))
       { location.href="cart.php"}
       else
       { location.href="index.php" }
       </script> 
       ';
    




?>