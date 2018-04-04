<!DOCTYPE html>
<html lang="en">
<head>
<?php
include './conn.php';
include './analyticstracking.php'; 
    session_start();
    if(!isset($_SESSION['uname'])){
?>
    <script>
        window.location.href="login.php";
    </script>
<?php
    }    
?>


        <meta charset="utf-8">
	<title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- CSS -->
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
<!--        <script>
            function  buyPro(){
                var gl_category_name= document.gl_add_cate_form.gl_category_name.value;
                if((gl_category_name===null)||(gl_category_name.length<3)){
                    document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
                    alert("Enter Valid Category Name");
                    document.gl_add_cate_form.gl_category_name.focus();
                    return false;
                }
            }
        </script>-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
<body style="background: lightyellow;">
    <?php
        if($_SESSION['utype']==='S'){
            include './menu.php'; 
    ?>
    <hr/>
    <?php
        if(isset($_POST["gl_buy_btn"])){
            $gl_sel_place= htmlspecialchars($_POST['gl_sel_place']);
            $uname=$_SESSION['uname'];
            
            $sql2=mysqli_query($con,"SELECT `pay_id`, `uname`, `w_id`, `item_id`, `qty`, `amount`, `date`, `status`"
                    . " FROM `payment` WHERE uname=$uname and status=1;");
            
                while($records2=mysqli_fetch_array($sql2)){
                    $pay_id=$records2['pay_id'];
                    
                        $sql1="UPDATE `purchase` SET `pay_id`=$pay_id,`place_id`=$gl_sel_place,`status`=2 WHERE status=1 and uname=$uname ;";
                       // var_dump($sql1);
                        $exc1=mysqli_query($con,$sql1);
                        $sql3="UPDATE `payment` SET `status`=2 WHERE status=1 and uname=$uname ;";
                        $exc3=mysqli_query($con,$sql3);
                       
                    }
                    ?>
                    <script>
                        window.location.href="success.php";
                    </script>
                 <?php       
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
<center>
    <div class="form-style-5" style="border:2px solid cyan;">
        <form class="gl_buy_form" action="#" name="gl_buy_form" method="POST" onsubmit="return buyPro()" enctype="multipart/form-data" >
            <div class="gl_cate_form_container" align="center">
                <h2 align="center" style="color: black;">Select Delivery Place</h2>
                <select name="gl_sel_place" id="gl_sel_place" required>
                            <?php
                                $sql1="Select * from placs Order By p_name;";
                                $rset1=mysqli_query($con,$sql1);
                                $records1=mysqli_fetch_array($sql1);
                                echo "<option value=''>Select Delivery Place</option>";
                                foreach($rset1 as $records1){
                            ?>        
                                <option value="<?php echo $records1['place_id']; ?>" > <?php echo ucfirst("{$records1['p_name']}"); ?> </option>
                            <?php        
                                }
                             ?>
                           
                        </select>                

                    <div class="gl_category_clearfix">
                        <input type="submit" class="gl_categoty_addbtn" name="gl_buy_btn" id="gl_buy_btn"  value="Proceed" />
                    </div>
            </div>
        </form>
    </div>
</center>

            <?php
                $result =mysqli_query($con,"SELECT img,p_name FROM `placs` where status=1 order by p_name;");
            ?>
               <div class="table-users">
                    <div class="header">Items</div>
                    <?php
                        if($result){
                    ?>
                        <table cellspacing="0">
                            <tr>
                                 <th>Picture</th>
                                 <th>Place</th>
                                 
                            </tr>
                            <?php
                                while (($t=mysqli_fetch_array($result))){
                            ?>
                            <tr>
                                <td><img src="<?php echo $t['img']; ?>" alt=""  /></td>
                                <td><b><?php  echo ucfirst($t['p_name']);  ?></b> </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
            <?php
                }
            ?>
                    
        </div>
</body>
</html>
