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
    <link rel="stylesheet" href="css/style2.css">
 
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
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Welcome Admin</small>
                        </h1>
						<ol class="breadcrumb">
                                                    <li><a href="userhome.php">Home</a></li>
                                                     <li class="active">Order Details</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <?php
                         if($_SESSION['utype']==='A' || $_SESSION['utype']==='T'){
                            

                    ?>                  
                        <?php
                             $result =mysqli_query($con,"SELECT * FROM `purchase` WHERE status=3 order by date;");
                        ?>
                    <div class="table-users">
                        <div class="header">Order Details</div>

                        <table cellspacing="0">
                           
                            <tr>
                                <th>S.No</th>
                                <th>Purchase ID</th>
                                <th>User Name</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Delivery Place</th>
                                <th></th>
                            </tr>
                            <?php
                                $i=1;
                                while (($t=mysqli_fetch_array($result))){
                                    $uname=$t['uname'];
                                    $item_id=$t['item_id'];
                                    $place_id=$t['place_id'];

                                    $sql2 =mysqli_query($con,"SELECT * FROM `user` WHERE uname=$uname and status=1;");
                                    while(($records2= mysqli_fetch_array($sql2))){
                                        $sql3 =mysqli_query($con,"SELECT * FROM `items` WHERE item_id=$item_id and status=1;");
                                        while(($records3= mysqli_fetch_array($sql3))){
                                            $sql4 =mysqli_query($con,"SELECT * FROM `placs` WHERE place_id=$place_id and status=1;");
                                            while(($records4= mysqli_fetch_array($sql4))){
                            ?> 
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $t['pur_id']; ?></td>
                                <td><b><a href="customer.php?uname=<?php echo $t['uname']; ?> " style="text-decoration: none;"><?php echo $records2['name']; ?></a></b></td>
                                <td><a href="orderitem.php?item_id=<?php echo $t['item_id']; ?> " style="text-decoration: none;"><?php echo ucfirst("{$records3['item_name']}"); ?></a></td>
                                <td><?php echo $t['qty']; ?></td>
                                <td><?php echo ucfirst("{$records4['p_name']}"); ?></td>
                                <td><a href="itemdelivered.php?pur_id=<?php echo $t['pur_id']; ?> " style="color:green;">Accept</a></td>
                            </tr>
                        <?php
                                $i=$i+1;
                                
                                        }
                                    }
                                }
                            }
                        ?>
                           
                        </table>
                    </div>
                    <?php
                    }
                        else{
                            
                        ?>
                                <script>
                                    window.location.href="login.php";
                                </script>
                        <?php
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
</html>