<?php
    session_start();
    include './analyticstracking.php';  
    include './conn.php';
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    $id=$_REQUEST['uname'];
    $sql="update user set status=0 where uname='$id'";
//    echo $sql;
    $results=mysqli_query($con,$sql);
    if($results>0)
        {
?>
            <script>
                    window.location="deletedusers.php";
                    alert("Deleted");
            </script>

<?php
        }
        else{
            echo "can not delete";
            header("location:userprofile.php");
        }
?>

