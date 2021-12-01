<?php
    require_once 'php_files/header.php'; 

    if(!isset($_SESSION['USER'])){
        header("location: user_login.php");
        }else{
        $user = $_SESSION['USER'];
        }


        if(isset($_GET['userId']))
        {
            global $con;
            $user = $_GET['userId'];
            $name = safe_value($con,$_POST['name']);
            $address = safe_value($con,$_POST['address']);
            $mobile = safe_value($con,$_POST['mobile']);
            $email = safe_value($con,$_POST['email']);
            $id = safe_value($con,$_POST['id']);
    
                $sql = "update users set fullname = '$name', address = '$address', mobile = '$mobile', email = '$email' where id = '$user'  ";
                $res= mysqli_query($con,$sql);

                if($res){
                    // echo '<script>alert("Profile successfully updated");</script>';
                    header("location: profile.php");
                }
        }
    










?>