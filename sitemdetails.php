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
        <script>
            
        function gIprice(){
            var gl_item_price=document.gl_bid.gl_total.value;
                if(isNaN(gl_item_price)){
                    document.gl_bid.gl_total.style.border = "1px solid red";
                    alert("Price Only Contain Digits");
                    document.gl_bid.gl_total.focus();
                    return false;
                }
                if(gl_item_price > 100001){
                    document.gl_bid.gl_total.style.border = "1px solid red";
                    alert("Price Can't Exceed One Lakh");
                    document.gl_bid.gl_total.focus();
                    return false;
                }
        }
        function addItem(){
            var gl_item_price=document.gl_bid.gl_total.value;
                if(isNaN(gl_item_price)){
                    document.gl_bid.gl_total.style.border = "1px solid red";
                    alert("Price Only Contain Digits");
                    document.gl_bid.gl_total.focus();
                    return false;
                }
                if(gl_item_price > 100001){
                    document.gl_bid.gl_total.style.border = "1px solid red";
                    alert("Price Can't Exceed One Lakh");
                    document.gl_bid.gl_total.focus();
                    return false;
                }
        }
        
            
        </script>
</head>
<body>

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
                </header><!-- //HEADER --><!-- //HEADER -->
		
		
		<!-- BREADCRUMBS -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- TOVAR DETAILS -->
		<section class="tovar_details padbot70">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- ROW -->
				<div class="row">
					
					<!-- SIDEBAR TOVAR DETAILS -->
					<div class="col-lg-3 col-md-3 sidebar_tovar_details">
						<h3><b>other ITEMS</b></h3>
						
						<ul class="tovar_items_small clearfix">
                                                    <?php
                                                    if(isset($_GET['item_id'])){
                                                    if(isset($_SESSION['utype'])){
                                                        if($_SESSION['utype']==='S'){
                                                        $id=$_REQUEST['item_id'];
                                                        $sql1=mysqli_query($con,"SELECT `sitem_id`, `uname`, `sitem_name`, `sprice`, `sdes`, `simg`, `status` FROM `sh_item` WHERE uname!={$_SESSION['uname']} and status=1 order by sitem_name;");
                                                            while($records1=mysqli_fetch_array($sql1)){
                                                    ?>
							<li class="clearfix">
								<img class="tovar_item_small_img" src="<?php echo $records1['simg'];?>" alt="" />
                                                                <a href="sitemdetails.php?item_id=<?php echo $records1['sitem_id'];?>" class="tovar_item_small_title"><?php echo $records1['sitem_name'];?></a>
								<span class="tovar_item_small_price"><?php echo $records1['sprice'];?></span>
							</li>
						    <?php
                                                        }
                                                    ?>
						</ul>
					</div><!-- //SIDEBAR TOVAR DETAILS -->
                                        <?php
                                            $sql2=mysqli_query($con,"SELECT `sitem_id`, `uname`, `sitem_name`, `sprice`, `sdes`, `simg`, `status` FROM `sh_item` WHERE sitem_id='$id' and status=1 order by sitem_name;");
                                            $records2=mysqli_fetch_array($sql2);
                                        ?>
					<!-- TOVAR DETAILS WRAPPER -->
					<div class="col-lg-9 col-md-9 tovar_details_wrapper clearfix">
						<div class="tovar_details_header clearfix margbot35">
							<h3 class="pull-left"><b>Item</b></h3>
						</div>
						
						<!-- CLEARFIX -->
						<div class="clearfix padbot40">
							<div class="tovar_view_fotos clearfix">
								<div id="slider2" class="flexslider">
									<ul class="slides">
										<li><a href="javascript:void(0);" ><img src="<?php echo $records2['simg'];?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo $records2['simg'];?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo $records2['simg'];?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo $records2['simg'];?>" alt="" /></a></li>
									</ul>
								</div>
								<div id="carousel2" class="flexslider">
									<ul class="slides">
										<li><a href="javascript:void(0);" ><img src="<?php echo $records2['simg'];?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo $records2['simg'];?>" alt="" /></a></li>
                                                                        </ul>
								</div>
							</div>
							
							<div class="tovar_view_description">
								<div class="tovar_view_title"><?php echo ucfirst($records2['sitem_name']);?></div>
								<div class="tovar_article">88-305-676</div>
								<div class="clearfix tovar_brend_price">
									<div class="pull-left tovar_brend">Top Quality</div>
									<div class="pull-right tovar_view_price"><?php echo $records2['sprice'];?> Rs</div>
								</div>
                                                                <hr/>
							
								<div class="tovar_view_btn">
                                                                    <form action="#" method="POST" name="gl_bid" onsubmit="return addItem()" enctype="multipart/form-data" >
                                                                        <input type="hidden" name="item_id" id="item_id" value="<?php echo "{$records2['sitem_id']}"; ?>"/>
                                                                        <input type="text" name="gl_total" id="gl_total" Required onChange="return gIprice()" placeholder="Submit a Bid">
									<div class="tovar_view_btn">
                                                                            <button type="submit" class="gl_edit_button" id="submit_bid" name="submit_bid" style="vertical-align:middle"  onclick="" style="width:auto;"><span>SUBMIT</span></button>
                                                                        </div>
                                                                        
                                                                    </form>
								</div>
								<div class="tovar_shared clearfix">
									<p>Share item with friends</p>
									<ul>
										<li><a class="facebook" href="javascript:void(0);" ><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" href="javascript:void(0);" ><i class="fa fa-twitter"></i></a></li>
										<li><a class="linkedin" href="javascript:void(0);" ><i class="fa fa-linkedin"></i></a></li>
										<li><a class="google-plus" href="javascript:void(0);" ><i class="fa fa-google-plus"></i></a></li>
										<li><a class="tumblr" href="javascript:void(0);" ><i class="fa fa-tumblr"></i></a></li>
									</ul>
								</div>
							</div>
						</div><!-- //CLEARFIX -->
						
						<!-- TOVAR INFORMATION -->
						<div class="tovar_information">
							<ul class="tabs clearfix">
								<li class="current">Details</li>
								<li>Information</li>
								
							</ul>
							<div class="box visible">
								<p> <?php echo "{$records2['sdes']}"; ?> </p>
                                                        </div>
							<div class="box">
                                                                Name: <?php echo ucfirst($records2['sitem_name']);?> <br>
								Price: <?php echo $records2['sprice'];?> Rs<br>
								Original Product <br>
								Top Quality<br>
							</div>
						</div><!-- //TOVAR INFORMATION -->
					</div><!-- //TOVAR DETAILS WRAPPER -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //TOVAR DETAILS -->
		 <?php
                 }
                 }
                 }
                    if(isset($_POST["submit_bid"])){
                        $uname=$_SESSION['uname'];
                        $item_id=htmlspecialchars($_POST['item_id']);
                        $gl_total=htmlspecialchars($_POST['gl_total']);

                        $sql5=mysqli_query($con,"SELECT `sitem_id`, `uname`, `sitem_name`, `sprice`, `sdes`, `simg`, `status` FROM `sh_item` WHERE sitem_id='$id' and status=1 order by sitem_name;");
                                        $records5=mysqli_fetch_array($sql5);
                        $actual=$records5['sprice'];
            //            echo $actual;
            //            echo $gl_total;
                        if($actual > $gl_total ){
                            echo "<script> alert('Your Bid is Too Low'); </script>";
                        }
                        else{

                            $sql4="INSERT INTO `bid`(`uname`, `amount`,`sitem_id`, `status`) VALUES"
                                . "($uname,$gl_total,$item_id,1);";

                            if (mysqli_query($con,$sql4) > 0){
                                echo "<script> alert('Your Bid has been Submitted'); </script>";
                            }
                            else{
                                echo "<script> alert ('Try Again!'); </script>";
                            }

                        }
                    }

                ?>
		
		<!-- BANNER SECTION -->
		<section class="banner_section">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- ROW -->
				<div class="row">
					
					<!-- BANNER WRAPPER -->
					<div class="banner_wrapper">
						<!-- BANNER -->
						<div class="col-lg-9 col-md-9">
							<a class="banner type4 margbot40" href="javascript:void(0);" ><img src="images/tovar/banner4.jpg" alt="" /></a>
						</div><!-- //BANNER -->
						
						<!-- BANNER -->
						<div class="col-lg-3 col-md-3">
							<a class="banner nobord margbot40" href="javascript:void(0);" ><img src="images/tovar/banner5.jpg" alt="" /></a>
						</div><!-- //BANNER -->
					</div><!-- //BANNER WRAPPER -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //BANNER SECTION -->
		
		
		<!-- NEW ARRIVALS -->
		
				
	

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
	<script src="js/fancySelect.js"></script>
	<script src="js/animate.js" type="text/javascript"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	
</body>

<!-- Mirrored from demo.evatheme.com/html/glammy/product-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2017 08:03:28 GMT -->
</html>