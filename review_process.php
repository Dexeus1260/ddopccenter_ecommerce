<?php
    require_once 'php_files/header.php'; 

    if(!isset($_SESSION['USER'])){
        header("location: user_login.php");
        }else{
        $user = $_SESSION['USER'];
        }

        if(isset($_POST['save']))
        {
            $pID = $_POST['pID'];
            $user = $_POST['userId'];
            $rev = $_POST['rev'];
            $ratedIndex = $_POST['ratedIndex'];

            if($user != 0)
            {
               global $con;
               $sql = "insert into reviews (user_id, product_id, rating, review) values ('$user','$pID','$ratedIndex','$rev')";
               $res = mysqli_query($con,$sql);

           }else
           {
               echo "mali1";
           }

        }else
        {
            echo "mali2";
        }

?>

