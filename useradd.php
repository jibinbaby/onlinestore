<?php
    session_start();
    include './analyticstracking.php';  
    include './conn.php';
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    $id=$_REQUEST['uname'];
    $sql="update user set status=1 where uname='$id'";
//    echo $sql;
    $results=mysqli_query($con,$sql);
    if($results>0)
        {
    ?>
            <script>
                    alert("Added");
            </script>
     <?php
    }
        else{
    ?>
            <script>
                    alert("Unsuccessfull");
            </script>
    <?php
    
        }
        header("location:userdetails.php");
?>

