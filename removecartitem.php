<?php
    session_start();
    include './conn.php';
    include './analyticstracking.php';  
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    $id=$_REQUEST['cart_id'];
    $sql="update cart set status=0 where c_id='$id'";
    $results=mysqli_query($con,$sql);
    if($results>0)
        {
?>
            <script>
                    window.location="cart.php";
                    alert("Removed");
            </script>

<?php
        }
        else{
           
 ?>
            <script>
                    window.location="cart.php";
                    alert("Removed");
            </script>
<?php
        }
?>

