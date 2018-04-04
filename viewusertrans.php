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

<body>
    
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

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="userhome.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Oders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a  href="orderdetails.php">Orders</a>
                            </li>
                            <li>
                                <a  href="deliveredorderdetails.php">Delivered Orders</a>
                            </li>
                            <li>
                                <a  href="payment_view.php">Payments</a>
                            </li>
                            <li>
                                <a class="active-menu" href="viewtransactions.php">Transactions</a>
                            </li>
                        </ul>
                    </li>	
							
                    <li>
                        <a href=""><i class="fa fa-qrcode"></i> View<span class="fa arrow"></span></a>
                    
                         <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="adminviewitems.php">Items</a>
                            </li>
                            <li>
                                <a href="adminviewcomp.php">Complaints</a>
                            </li>
                            <li>
                                <a href="shortitem.php">Shortage Items</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a  href="userdetails.php">Add User</a>
                            </li>
                            <li>
                                <a href="deletedusers.php">Deleted Users</a>
                            </li>
                            <li>
                                <a href="viewallusers.php">View Users</a>
                            </li>
                            <li>
                                <a href="viewallstaff.php">View Staff</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Add<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addstaff.php">Staff</a>
                            </li>
                            <li>
                                <a  href="addcategory.php">Category</a>
                            </li>
                            <li>
                                <a href="addsubcategory.php">Subcategory</a>
                            </li>
                            <li>
                                <a href="additem.php">Items</a>
                            </li>
                            <li>
                                <a href="addplace.php">Place</a>
                            </li>
                        </ul>
                    </li>	
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Delete <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="deleteitem.php">Items</a>
                            </li>
                            <li>
                                <a href="deletecategory.php">Category</a>
                            </li>
                            <li>
                                <a href="deletesub.php">Subcategory</a>
                            </li>
                        </ul>
                    </li>


                   
                    <li>
                        <a href="chatlist.php"><i class="fa fa-fw fa-file"></i> Chat Staff</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Welcome Admin</small>
                        </h1>
						<ol class="breadcrumb">
                                                    <li><a href="userhome.php">Home</a></li>
                                                    <li><a href="viewtransactions.php">Transactions</a></li>
                                                     <li class="active">User Transactions</li>
					  
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
                        if(isset($_POST['submit']))
                        {
                        }
                        if(isset($_POST['myday']))
                            {
                                $my_id=$_REQUEST['id'];
                                $mydate1=$_POST["mydate1"];
                                $mydate2=$_POST["mydate2"];
                                if($mydate1==$mydate2){
                                    $aa="select `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`,DATE(date) as date, `status` from purchase where date like '$mydate1%' and uname=$my_id ";
                            }
                            else{
                                $aa="select  `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`, DATE(date) as date, `status` from purchase where date between '$mydate1' and '$mydate2' and uname=$my_id ";
                                
                            }
                            //echo $aa;
                            $result=mysqli_query($con,$aa);
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
                    <td><?php echo $row2['name'];?></td>
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
             }else{
                 
                $my_id=$_REQUEST['id'];
                    $aa5="select `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`,DATE(date) as date, `status` from purchase where uname=$my_id ";
                        $result5=mysqli_query($con,$aa5);
                            while($row5=mysqli_fetch_array($result5))
                            {
                                $pay_id5=$row5['pay_id'];
                                $unm5=$row5['uname'];
                                $it5=$row5['item_id'];
                                $pay5="select * from payment where pay_id=$pay_id5";
                                $result15=mysqli_query($con,$pay5);
                                while($row15=mysqli_fetch_array($result15)){
                                    $un5=mysqli_query($con,"select * from user where uname=$unm5");
                                        while($row25=mysqli_fetch_array($un5)){
                                            $itm5=mysqli_query($con,"select * from items where item_id=$it5");
                                                while($row35=mysqli_fetch_array($itm5)){

                     ?>
                <tr>
                    <td><?php echo $row5['pur_id'];?></td>
                    <td><?php echo $row25['name'];?></td>
                    <td><?php echo ucfirst($row35['item_name']);?></td>
                    <td><?php echo $row35['price'];?></td>
                    <td><?php echo $row5['qty'];?></td>
                    <td><?php echo $row15['amount'];?></td>
                    <td><?php echo $row5['date'];?></td>
                </tr>
    

            <?php
                                                }
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
</html><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
