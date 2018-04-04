<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
        session_start();
        include './analyticstracking.php';  
        include './conn.php';  
        if(!isset($_SESSION['uname'])){
    ?>
        <script>
            window.location.href="login.php";
        </script>
    <?php
        }    
    ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Global Store </title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="css/mystyle.css">   
    <link rel="stylesheet" href="css/style2.css">
     <style>
        .container {
            width:100%;
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
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

<body style="background-color: #4c4c4c;">
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="userhome.php"><strong><i class="icon fa fa-plane"></i> Global Store</strong></a>
				
		<div id="sideNav" href="#">
		<i class="fa fa-bars icon"></i> 
		</div>
            </div>
             <?php
               include_once 'menu3.php';
           ?>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            
           <?php
               include_once 'side_panel.php';
           ?>
        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  
            <div id="page-inner">

                <!-- /. ROW  -->
                <?php
                    
                        $uname=$_SESSION['uname'];
                ?>
                <form action="#" method="POST">
                <table cellpadding="5px"  width="100%" >
                    <tr>
                        <td style="font-size:20px;" width="20%" >
                            Write Your Message:
                        <td>
                            <p>

                            </p> 
                        </td>
                    <tr>
                        <td colspan="2" width="50%">
                            <textarea maxlength="600" rows="5" name="replay" required=""></textarea>
                        </td>
                        <td width="30%">
                            <input type="submit" class="gl_item_addbtn" name="gl_item_addbtn" id="gl_item_addbtn" value="Send"/>
                        </td>
                   </tr>
                 </table>
                </form>
                <hr/>   
                <div class="row">
                    <?php
                        $qry1="SELECT `cid`, `uname`, `msg`, date, `status` FROM `chat` where uname=$uname order by date desc LIMIT 5;";
                            $sql1=mysqli_query($con,$qry1);
                                if($sql1){
                                while($records1=mysqli_fetch_array($sql1)){
                                    $sql2=mysqli_query($con,"SELECT * FROM `user` WHERE uname=$uname and status=1;");
                                    if($sql2){
                                    while($records2=mysqli_fetch_array($sql2)){
                                        $name=$records2['name'];    
                                    
                    ?>
                    <?php
                        if($records1['status']==2 || $records1['status']==4){
                    ?>
                    <div class="container">
                        <img src="<?php echo $records2['pic']; ?>" alt="Avatar" style="width:100%;"><?php echo ucfirst($name); ?>
                        <p style="float: right;"><?php echo ucfirst("{$records1['msg']}"); ?></p>
                        <hr/>
                        <span class="time-right"><?php echo "{$records1['date']}"; ?></span>
                    </div>
                    <?php
                        }elseif($records1['status']==1){
                            
                    ?>
                        
                    <div class="container darker">
                        <img src="profile/admin.jpg" alt="Avatar" class="right" style="width:100%;"><p style="float: right;"><small>Admin Team</small></p>
                            <br/>
                            <p ><?php echo ucfirst("{$records1['msg']}"); ?></p>
                      <span class="time-left"><?php echo "{$records1['date']}"; ?></span>
                    </div>
                    <?php
                        }
                    }
                    } 
                        }
                            }
                
                    ?>
                   
                </div>
               
                
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="assets/js/chart.min.js"></script>  
    <script type="text/javascript" src="assets/js/chartjs.js"></script> 
    
</body>
     <?php
            if(isset($_POST["gl_item_addbtn"])){
                
                $sql5="UPDATE `chat` SET `status`=4 WHERE uname=$uname and status=2";
                $records5=mysqli_query($con,$sql5);
                $replay= htmlspecialchars($_POST['replay']);
                $sql4="INSERT INTO `chat`(`uname`, `msg`,`status`) VALUES($uname,'$replay',2)";
                echo $sql4;
                if (mysqli_query($con,$sql4) > 0){
                    echo "<script>window.location.href='chattingadmin.php'</script>";
                }
                else{
                    echo "<script> alert ('Failed !'); </script>";
                }
            }
        
                   
        ?>
</html>