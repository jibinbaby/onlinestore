<?php
    session_start();
    include './analyticstracking.php';  
    include './conn.php';
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    $id=$_REQUEST['uname'];
    $sql="update subcategory set status=0 where subcategory_id='$id'";
//    echo $sql;
    $results=mysqli_query($con,$sql);
    if($results>0)
        {
?>
            <script>
                    window.location="deletesub.php";
                    alert("Deleted");
            </script>

<?php
        }
        else{
            echo "can not delete";
            header("location:deletesub.php");
        }
?>

