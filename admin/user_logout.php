<?php
session_start();
unset($_SESSION['USER']);
header("location: ../user_login.php");
exit();

?>