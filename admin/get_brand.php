
<?php 
require_once 'php_files/header.php';

$brand_id = $_POST['brand_id'];
$sql = "select * from categories where brand = '$brand_id'";
$result = mysqli_query($con,$sql);

?>
  <option selected disabled value="" > Select Brand</option>  
<?php 
while($row = mysqli_fetch_array($result)){
    ?>
     <option value="<?php echo $row['id'];?>"><?php echo $row['cat_name'];?></option>

    <?php
}
?>
