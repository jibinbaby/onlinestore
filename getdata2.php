<?php
include './conn.php';
session_start();

if (!empty($_POST["subcategory_id"])) {
  $subcategory_id = $_POST["subcategory_id"];
  //$dd=  $_SESSION['spid'];

  $query = "SELECT * FROM `items` WHERE subcategory_id = $subcategory_id and status=1 ";
  $results = mysqli_query($con, $query);
  ?>
  <option >Items</option>
  <?php

        foreach($results as $sub){
    ?>

    <option value="<?php echo $sub['item_id']; ?>"><?php echo ucfirst($sub['item_name']); ?></option>

     <?php
}
}
?>
