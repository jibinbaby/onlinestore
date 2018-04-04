<!DOCTYPE html>
<?php
    session_start();
    include './analyticstracking.php';  
    include './conn.php';
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
            
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body11 {
                margin: 0 auto;
                max-width: 800px;
                padding: 0 20px;
            }

            .container11 {
                border: 2px solid #dedede;
                background-color: #f1f1f1;
                border-radius: 5px;
                padding: 10px;
                margin: 10px 0;
            }

            .darker11 {
                border-color: #ccc;
                background-color: #ddd;
            }

            .container11::after {
                content: "";
                clear: both;
                display: table;
            }

            .container11 img {
                float: left;
                max-width: 60px;
                width: 100%;
                margin-right: 20px;
                border-radius: 50%;
            }

            .container11 img.right {
                float: right;
                margin-left: 20px;
                margin-right:0;
            }

            .time-right {
                float: right;
                color: #aaa;
            }

            .time-left {
                float: left;
                color: #999;
            }
        </style>
    </head>
    <body style="background-color:lightgoldenrodyellow;">
        <?php
            if($_SESSION['utype']==='S'){
                include './menu.php';
                $uname=$_SESSION['uname'];
                
        ?>
        <hr/>
        <br/>
         <form action="#" method="POST">
                <table cellpadding="5px"  width="100%" >
                        <input type="hidden" name="uname_hide" id="uname_hide" value="<?php echo $uname;; ?>"/>
                                    
                            <tr>
                                <td style="font-size:20px;" width="20%" >
                                    Write Your Reply:
                                <td>
                                    <p>
                                        
                                    </p> 
                                </td>
                            <tr>
                                <td colspan="2" width="50%">
                                    <textarea maxlength="600" rows="5" name="replay" required=""></textarea>
                                </td>
                                <td width="30%">
                                    <input type="submit" class="gl_item_addbtn" name="gl_item_addbtn" id="gl_item_addbtn" value="Reply"/>
                                </td>
                           </tr>
                 </table>
                    
                <hr/>
            </form>
        <?php
            
            $sql1=mysqli_query($con,"SELECT `cid`, `uname`, `complaint`,date, `status` FROM `complaints` where uname=$uname order by date desc;");
                while($records1=mysqli_fetch_array($sql1)){
                    $sql2=mysqli_query($con,"SELECT * FROM `user` WHERE uname=$uname and status=1;");
                        while($records2=mysqli_fetch_array($sql2)){
                            $name=$records2['name'];
                            if($records1['status']!=3){
        ?>
        <div class="container11">
            <img src=<?php echo "{$records2['pic']}"; ?> style="width:100%;"><?php echo ucfirst($name); ?>
            <p><?php echo ucfirst("{$records1['complaint']}"); ?></p>
            <span class="time-right"><?php echo "{$records1['date']}"; ?></span>
        </div>
        <?php
                            }
                            else{
        ?>
        <div class="container11 darker11">
            <img src="profile/admin.jpg" alt="Avatar" class="right" style="width:100%;">Global Team
          <p><?php echo ucfirst("{$records1['complaint']}"); ?></p>
          <span class="time-left"><?php echo "{$records1['date']}"; ?></span>
        </div>
        <?php
                            }
                } 
            }
        ?>
         <?php
        }else{
            echo "<script>window.location.href=login.php'</script>";
        }
                
        ?>
        <?php
            if(isset($_POST["gl_item_addbtn"])){
                $replay= htmlspecialchars($_POST['replay']);
                $uname1=htmlspecialchars($_POST['uname_hide']);
                $sql5="UPDATE `complaints` SET `status`=2 WHERE status=1 and uname=$uname1;";
                if (mysqli_query($con,$sql5) > 0){
                $sql4="INSERT INTO `complaints`(`uname` ,`complaint`, `status`) VALUES ($uname1,'$replay',1)";
                if (mysqli_query($con,$sql4) > 0){
                    echo "<script>window.location.href='reportsandcomplaints.php'</script>";
                }
                }
                else{
                        echo "<script> alert ('Failed !'); </script>";
                }
            }
        
        
        
        ?>
    </body>
</html>
