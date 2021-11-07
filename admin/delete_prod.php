<?php 
 require_once 'php_files/header.php';

 if(!isset($_SESSION['ADMIN']))
 {
     header("location: index.php");
 }
 
 if(isset($_GET['id'])){
    global $con;
    $id = $_GET['id'];
    $sql = "delete from products where p_id = '$id'";
    $res = mysqli_query($con,$sql);

    header("location: products.php");


 }

?>