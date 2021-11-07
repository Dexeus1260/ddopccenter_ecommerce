<?php 
 require_once 'php_files/header.php';

 if(!isset($_SESSION['ADMIN']))
 {
     header("location: index.php");
 }
 
 if(isset($_GET['id'])){
    global $con;
    $id = $_GET['id'];
    $sql = "delete from brand where brand_id = '$id'";
    $res = mysqli_query($con,$sql);

    header("location: brands.php");


 }

?>