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
                                                     <li class="active">Transactions</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                
        <?php
            if($_SESSION['utype']==='A' || $_SESSION['utype']==='T'){  
        ?>
       
        <div class="container" style="width:900px;">
        <div class="inner text-center">
            <form action="#" name="myform" method="POST" class="form-inline">
                <div class="span12" style="border-radius: 5px; border-style: solid; border-width: 1px; margin-left: 20px;" >
                    <center>
                    <table>
                        <tr>
                            <td>
                                <label>Select By Date</label>
                                <input type="date" name="mydate1" id="mydate1" class="input-medium" required="" />&nbsp;
                            </td>
                            <td>
                                <label>Select By Date</label>
                                <input type="date" name="mydate2" id="mydate2" class="input-medium" />&nbsp;
                            </td>
                            <td>
                                <input type="submit" class="btn-primary" name="myday" value="Search" id='myday' />
                            </td>
                            
                    </tr>
                    </table>
                    </center>
                </div>
            </form>
            <table border="2" width="300" cellspacing="2" cellpadding="1" class="table table-striped" style=" border-radius: 5px; border-style: solid; border-width: 1px; ">
            <?php
                if(isset($_POST['submit']))
                {
                }
                if(isset($_POST['myday']))
                    {
                    
                        $mydate1=$_POST["mydate1"];
                        $mydate2=$_POST["mydate2"];
                        if($mydate1==$mydate2){
                            $aa="select `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`,DATE(date) as date, `status` from purchase where date like '$mydate1%' ";
                        }
                        else{
                            $aa="select  `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`, DATE(date) as date, `status` from purchase where date between '$mydate1' and '$mydate2' ";
                        }
                        $result=mysqli_query($con,$aa);
                        $row_num=mysqli_num_rows($result);
                       // echo $row_num;
                        if($row_num != 0){
                        
            ?>
            <head>
                <tr>
                    <th>Transaction ID</th>
                    <th>User Name</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Date Of Transaction</th>
                </tr>
            </head>
                <tbody>
                        <?php
                            while($row=mysqli_fetch_array($result))
                            {
                                $pay_id=$row['pay_id'];
                                $unm=$row['uname'];
                                $it=$row['item_id'];
                                $pay="select * from payment where pay_id=$pay_id";
                                $result1=mysqli_query($con,$pay);
                                while($row1=mysqli_fetch_array($result1)){
                                    $un=mysqli_query($con,"select * from user where uname=$unm");
                                        while($row2=mysqli_fetch_array($un)){
                                            $itm=mysqli_query($con,"select * from items where item_id=$it");
                                                while($row3=mysqli_fetch_array($itm)){

                     ?>
                <tr>
                    <td><?php echo $row['pur_id'];?></td>
                    <td><a href="viewusertrans.php?id=<?php echo $row['uname'];?>"><?php echo $row2['name'];?></a></td>
                    <td><?php echo ucfirst($row3['item_name']);?></td>
                    <td><?php echo $row3['price'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row1['amount'];?></td>
                    <td><?php echo $row['date'];?></td>
                </tr>
    

            <?php
                                                }
                                }
                                }
                }
             
            ?>
                    
    <tr>
        
        <td colspan="7">
            <center>
                <button class="btn-primary" name="print" id="print" onclick="window.print()">Print</button> 
            </center>   
        </td>
            
    </tr>
                    
    </table>

               



     <?php
      }else{
          echo "No Items";
      }
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
 </div>
    </div>
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