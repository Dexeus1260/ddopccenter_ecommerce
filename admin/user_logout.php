<?php
session_start();
unset($_SESSION['USER']);
header("location: ../index.php");
exit();

?>