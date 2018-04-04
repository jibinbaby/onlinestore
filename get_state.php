<?php

include_once 'conn.php';
if (isset($_POST['additem'])) {
    $additem = $_POST['additem'];
    $q = mysqli_query($con, "SELECT sub_cname FROM subcategory where category_id='" . $additem . "' and status=1");
    //var_dump($q);
    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['sub_cname'] . ",";
    }
    echo rtrim($str, ',');
}
?>