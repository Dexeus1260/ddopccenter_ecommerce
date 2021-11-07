<?php require_once 'php_files/header.php';

$cat_id = $_POST['cat_id'];
$sql = "select * from sub_cat where cat_parent = '$cat_id'";
$result = mysqli_query($con,$sql);

?>
  <option selected disabled value="" > Select Sub-category</option>  
<?php 
while($row = mysqli_fetch_array($result)){
    ?>
     <option value="<?php echo $row['sub_cat_id'];?>"><?php echo $row['sub_cat_title'];?></option>

    <?php
}

?>