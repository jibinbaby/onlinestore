<?php
    session_start();
    include './analyticstracking.php';  
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    include './conn.php';
    $id=$_REQUEST['pur_id'];
    $sql="UPDATE `purchase` SET `status`=4 WHERE pur_id='$id'";
//    echo $sql;
    $results=mysqli_query($con,$sql);
    if($results>0)
        {
?>
            <script>
                    window.location="orderdetails.php";
                    alert("Delivered");
            </script>

<?php
        }
        else{
            echo "Can't Complete";
            header("location:orderdetails.php");
        }
?>

