<!DOCTYPE html>
<html lang="en">
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
			function decrypt($string, $key) {
				$result = '';
				$string = base64_decode($string);
				for($i=0; $i<strlen($string); $i++) {
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key))-1, 1);
				$char = chr(ord($char)-ord($keychar));
				$result.=$char;
				}
				return $result;
			}
         
    ?>
	<meta charset="utf-8">
	<title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="shortcut icon" href="images/favicon.ico">
    
	<!-- CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/flexslider.css" rel="stylesheet" type="text/css" />
	<link href="css/fancySelect.css" rel="stylesheet" media="screen, projection" />
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="../../../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            border: 2px solid cyan;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 500px;
          margin: auto;
          text-align: center;
          font-family: arial;
        }

        .title {
          color: grey;
          font-size: 18px;
        }

        button {
          border: none;
          outline: 0;
          display: inline-block;
          padding: 8px;
          color: white;
          background-color: #000;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
        }

        a {
          text-decoration: none;
          font-size: 22px;
          color: black;
        }

        button:hover, a:hover {
          opacity: 0.7;
        }
    </style>
</head>
<body style="background: white;">

<!-- PRELOADER -->
<div id="preloader"><img src="images/preloader.gif" alt="" /></div>
<!-- //PRELOADER -->
<div class="preloader_hide">

	<!-- PAGE -->
	<div id="page">
	
		<!-- HEADER -->
		<header>
                    <div class="menu_block">
                        <!-- CONTAINER -->
                        <div class="container clearfix">
                            <?php
                                include './menu.php';
                            ?>		
                        </div><!-- //CONTAINER -->
                    </div>
                </header>
                <!-- //HEADER -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- NEW ARRIVALS -->
		<section class="new_arrivals padbot100">
		<div class="table-users">
                    <?php
                    require_once 'conn.php';
                    if(isset($_GET['uname'])){
								
                                    $id=decrypt($_REQUEST['uname'],'dgafg12');
                                $sql1=mysqli_query($con,"select * from user where uname=$id and status=1 ;");
                                $records=mysqli_fetch_array($sql1);
                ?>
                <div class="row">
                    <h2 style="text-align:center">User Profile </h2>

                        <div class="card">
                          <img src="<?php echo $records['pic']; ?>" alt="<?php echo $records['name']; ?>" style="width:250px;height:250px;">
                          <h1><?php echo $records['name']; ?></h1>
                          <p class="title">Dept. of <?php echo $records['department']; ?></p>
                          <p>Phone: <?php echo $records['phone']; ?></p>
                          <p>Email: <?php echo $records['email']; ?></p>
                            <div style="margin: 24px 0;">
                              <a href="#"><i class="fa fa-dribbble"></i></a> 
                              <a href="#"><i class="fa fa-twitter"></i></a>  
                              <a href="#"><i class="fa fa-linkedin"></i></a>  
                              <a href="#"><i class="fa fa-facebook"></i></a> 
                           </div>
                        </div>

					
                </div>
                <?php       
                    
                           }
                ?>
                </div>
		</section><!-- //NEW ARRIVALS -->
		

	</div><!-- //PAGE -->
</div>

<!-- TOVAR MODAL CONTENT -->
<div id="modal-body" class="clearfix">
	<div id="tovar_content"></div>
	<div class="close_block"></div>
</div><!-- TOVAR MODAL CONTENT -->

	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.sticky.js" type="text/javascript"></script>
	<script src="js/parallax.js" type="text/javascript"></script>
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="js/jqueryui.custom.min.html" type="text/javascript"></script>
	<script src="js/fancySelect.js"></script>
	<script src="js/animate.js" type="text/javascript"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	
</body>

<!-- Mirrored from demo.evatheme.com/html/glammy/shortcodes.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2017 08:05:37 GMT -->
</html>