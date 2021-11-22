<?php 
require_once 'php_files/header.php';

$brand_id = $_POST['brand_id'];
$sql = "select * from sub_cat where cat_parent = '$brand_id' order by sub_cat_title asc";
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