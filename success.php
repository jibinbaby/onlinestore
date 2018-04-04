<!DOCTYPE html>
<html lang="en">
<head
<?php
include './conn.php';
    include './analyticstracking.php';  
    session_start();
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
?>

>
        <meta charset="utf-8">
	<title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- CSS -->
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            window.history.forward(1);
            function noBack(){
            window.history.forward();
            }
        </script> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style2.css">
        
        <style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: #f4f7f8;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: #1abc9c;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #109177;
}
</style>
</head>	
<body style="background: lightyellow;" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
    <?php
        if($_SESSION['utype']==='S'){
            include './menu.php';
    ?>
    <hr/>
    <?php
            $uname=$_SESSION['uname'];
            $sql1= mysqli_query($con, "SELECT `pur_id`,`item_id`, `pay_id`, `qty`, `place_id` FROM `purchase` WHERE status=2 and uname=$uname;");
            $records1= mysqli_fetch_array($sql1);
            $place_id=$records1['place_id'];
            $sql2= mysqli_query($con,"SELECT `p_name` FROM `placs` WHERE status=1 and place_id=$place_id; ");
            $records2= mysqli_fetch_array($sql2);
        
    ?>
        <center>
            <div class="form-style-5" style="border:2px solid cyan;">
                    <h2 align="center" style="color: green;">Your Order is Successfull</h2>
                    <form action="#" method="POST" name="gl_success_form" method="POST" enctype="multipart/form-data" >
                    <table border="0" style="width:400px;" cellpadding="5">
                        <tr>
                            <td>
                                Place Of Delivery:
                            </td>
                            <td>
                                <?php echo ucfirst("{$records2['p_name']}"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Purchase ID:
                            </td>
                            <td>
                                <?php echo $records1['pur_id']; ?>
                            </td>
                        </tr>
                        
                        
                    </table>

                    <div class="gl_category_clearfix">
                        <input type="submit" class="gl_categoty_addbtn" name="gl_success_ok" id="gl_success_ok"  value="OK" />
                    </div>
                    </form>
                </div>
        </center> 
<?php
    
    if(isset($_POST["gl_success_ok"])){
         $sql1="UPDATE `purchase` SET `status`=3 WHERE status=2 and uname=$uname ;";
        // var_dump($sql1);
         $exc1=mysqli_query($con,$sql1);
         $sql3="UPDATE `payment` SET `status`=3 WHERE status=2 and uname=$uname ;";
         $exc3=mysqli_query($con,$sql3);   
         echo "<script>"
        . "window.location='userhome1.php';"
        . "</script>";

    }
    }
        else{
            ?>
            <script>
                window.location.href="login.php";
            </script>
        <?php
        }


?>

</body>
</html>
