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
          <style>
            * {
              box-sizing: border-box;
            }

            #myInput {
              background-image: url('css/sicon.png');
              background-position: 10px 10px;
              background-repeat: no-repeat;
              width: 100%;
              font-size: 16px;
              padding: 12px 20px 12px 40px;
              border: 1px solid #ddd;
              margin-bottom: 12px;
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
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Welcome Admin</small>
                        </h1>
						<ol class="breadcrumb">
                                                    <li><a href="userhome.php">Home</a></li>
                                                     <li class="active">Delete Subcategory</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <?php
                        if($_SESSION['utype']==='A'){
                        $result =mysqli_query($con,"SELECT `subcategory_id`, `category_id`, `sub_cname`, `img`, `status` FROM `subcategory`where status=1 order by sub_cname;");
                    ?>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                    
                    <div class="table-users">
                        <div class="header">Delete Subcategory</div>

                        <table cellspacing="0" id="myTable">
                           
                           <tr>
                              <th>Picture</th>
                              <th>Subcategory name</th>
                              <th></th>
                          
                           </tr>
                            <?php
                                while (($t=mysqli_fetch_array($result))){
                            ?>
                           <tr>
                              <td><img src="<?php echo $t['img'];?>" alt="" /></td>
                              <td><b><?php echo ucfirst($t['sub_cname']);?></b> </td>
                              <td><a onclick="return confirm('Do you want to delete this Subcategory..!');" href="subdelete.php?uname=<?php echo $t['subcategory_id']; ?> " style="color:red;">Delete</a></td>
                           </tr>
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
                        
                        </table>
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
    <script>
        function myFunction() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
    </script>
</body>
</html>