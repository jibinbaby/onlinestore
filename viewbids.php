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
		function encrypt($string, $key) {
		$result = '';
		for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
		}
		return base64_encode($result);
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
	<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-color:lightgoldenrodyellow;">

<!-- PRELOADER -->
<div id="preloader"><img src="images/preloader.gif" alt="" /></div>
<!-- //PRELOADER -->
<div class="preloader_hide" style="background-color:lightgoldenrodyellow;">

	<!-- PAGE -->
	<div id="page" style="background-color:lightgoldenrodyellow;">
	
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
		
		
		<!-- BREADCRUMBS -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- TYPOGRAPHY BLOCK -->
		<section class="typography_block padbot40">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<div class="title center">
                                    <center>
                                        <a href="biddeditems.php" alt=""> <button class="gl_edit_button" style="vertical-align:middle"   style="width:auto;"><span>Bidded Items</span></button></a>
										<a href="successfullbids.php" alt=""> <button class="gl_edit_button" style="vertical-align:middle"   style="width:auto;"><span>Successfull Bids</span></button></a>
                                    </center>
				</div>
				
			</div><!-- //CONTAINER -->
		</section><!-- //TYPOGRAPHY BLOCK -->
		
		
		
		<!-- NEW ARRIVALS -->
		<section class="new_arrivals padbot100">
			
			<!-- CONTAINER -->
			<div class="container">
				<h2>My Items</h2>
		
				<!-- JCAROUSEL -->
				<div class="jcarousel-wrapper">
					
					<!-- NAVIGATION -->
					<div class="jCarousel_pagination">
						<a href="javascript:void(0);" class="jcarousel-control-prev" ><i class="fa fa-angle-left"></i></a>
						<a href="javascript:void(0);" class="jcarousel-control-next" ><i class="fa fa-angle-right"></i></a>
					</div><!-- //NAVIGATION -->
					
					<div id="jcarousel_id" class="jcarousel">
						<ul>
                                                    <?php
                                                        $uname=$_SESSION['uname'];
                                                        $sql1=mysqli_query($con,"select * from sh_item where status=1 and uname=$uname order by sitem_name;");
                                                            while($records1=mysqli_fetch_array($sql1)){
																$encsid=encrypt($records1['sitem_id'],'dgafg12');
                                                    ?>
							<li>
								<!-- TOVAR -->
                                                                <div class="tovar_item_new" style="border: 2px solid cyan; height: 250px;">
									<div class="tovar_img">
                                                                            <img src="<?php echo $records1['simg']; ?>" width="200px" height="200px" />
                                                                        </div>
									<div class="tovar_description clearfix">
										<a class="tovar_title" href="<?php echo "viewbiddetails.php?sitem_id=$encsid" ?>" >Item Name: <?php echo $records1['sitem_name']; ?></a>
										<span class="tovar_price">Price: <?php echo $records1['sprice']; ?></span>
									</div>
								</div><!-- //TOVAR -->
							</li>
                                                    <?php
                                                        }
                                                    ?>  
							
						</ul>
					</div>
				</div><!-- //JCAROUSEL -->
			</div><!-- //CONTAINER -->
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