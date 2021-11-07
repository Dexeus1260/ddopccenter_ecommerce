
<?php 
require_once 'php_files/header.php';

$cat_id = $_POST['cat_id'];
$sql = "select * from brand where brand_cat = '$cat_id'";
$result = mysqli_query($con,$sql);

?>
  <option selected disabled value="" > Select Brand</option>  
<?php 
while($row = mysqli_fetch_array($result)){
    ?>
     <option value="<?php echo $row['brand_id'];?>"><?php echo $row['brand_title'];?></option>

    <?php
}
?>
