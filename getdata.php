<?php
include './conn.php';
session_start();

if (!empty($_POST["category_id"])) {

  $category_id = $_POST["category_id"];
 // $_SESSION['category_id']=$_POST["category_id"];
  $query = "SELECT * FROM subcategory WHERE category_id = $category_id and status=1";

  $results = mysqli_query($con, $query);
  ?>
  <option >Subcategory</option>
  <?php

  foreach($results as $subc){
    ?>

  <option value="<?php echo $subc["subcategory_id"]; ?>"> <?php echo ucfirst($subc["sub_cname"]); ?></option>

     <?php
}
}
?>
