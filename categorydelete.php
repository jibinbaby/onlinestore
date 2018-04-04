<?php
    session_start();
    include './analyticstracking.php';  
    include './conn.php';
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    $id=$_REQUEST['uname'];
    $sql="update category set status=0 where category_id='$id'";
//    echo $sql;
    $results=mysqli_query($con,$sql);
    if($results>0)
        {
?>
            <script>
                    window.location="deletecategory.php";
                    alert("Deleted");
            </script>

<?php
        }
        else{
            echo "can not delete";
            header("location:deletecategory.php");
        }
?>

