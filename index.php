<!DOCTYPE html>
<html lang="en">

<?php
    include './conn.php'; 
    session_start();
   
?>
<head>
	
	<meta charset="utf-8">
	<title>Global Store: Come shop and enjoy our service.  </title>
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
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="../../../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
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
			
			<!-- TOP INFO -->
			<div class="top_info">
				
				<!-- CONTAINER -->
				<div class="container clearfix">
					<ul class="secondary_menu">
						<li><a href="login.php" >my account</a></li>
						<li><a href="login.php" >Register</a></li>
					</ul>
					
					
					
					<div class="phone_top">have a question? <a href="tel:1 800 888 2828" >1 800 888 2828</a></div>
				</div><!-- //CONTAINER -->
			</div><!-- TOP INFO -->
			
			
			<!-- MENU BLOCK -->
			<div class="menu_block">
			
				<!-- CONTAINER -->
				<div class="container clearfix">
					
					<!-- LOGO -->
					<div class="logo">
                                                <a href="index.php" ><img src="images/logo.png" alt="" style=" height:60px;" /></a>
					</div><!-- //LOGO -->
					
					
					<!-- MENU -->
					<ul class="navmenu center">
                                            <li class="sub-menu first active"><a href="index.php" >Home</a>
							
                                            </li>
						
						<li class="last sale_menu"><a href="login.php" >Login</a></li>
					</ul><!-- //MENU -->
				</div><!-- //MENU BLOCK -->
			</div><!-- //CONTAINER -->
		</header><!-- //HEADER -->
		
		
		<!-- HOME -->
		<section id="home" class="padbot0">
				
			<!-- TOP SLIDER -->
			<div class="flexslider top_slider">
				<ul class="slides">
					<li class="slide1">
						
						<!-- CONTAINER -->
						<div class="container">
							<div class="flex_caption1">
								<p class="title1 captionDelay2 FromTop">mega sell</p>
								<p class="title2 captionDelay3 FromTop">last week of sales</p>
							</div>
							<a class="flex_caption2" href="login.php" ><div class="middle">sale<span>shop</span>now</div></a>
							
						</div><!-- //CONTAINER -->
					</li>
					
					<li class="slide2">
						
						<!-- CONTAINER -->
						<div class="container">
							<div class="flex_caption1">
								<p class="title1 captionDelay2 FromTop">mega sell</p>
								<p class="title2 captionDelay3 FromTop">last week of sales</p>
							</div>
							<a class="flex_caption2" href="login.php" ><div class="middle">sale<span>shop</span>now</div></a>
							
						</div><!-- //CONTAINER -->
					</li>
					
					<li class="slide3">
						
						<!-- CONTAINER -->
						<div class="container">
							<div class="flex_caption1">
								<p class="title1 captionDelay2 FromTop">mega sell</p>
								<p class="title2 captionDelay3 FromTop">last week of sales</p>
							</div>
							<a class="flex_caption2" href="login.php" ><div class="middle">sale<span>shop</span>now</div></a>
							
						</div><!-- //CONTAINER -->
					</li>
				</ul>
			</div><!-- //TOP SLIDER -->
		</section><!-- //HOME -->
		
		
		<!-- TOVAR SECTION -->
		<section class="tovar_section">
			
			<!-- CONTAINER -->
			<div class="container">
				<h2>Featured products</h2>
				
				
				<!-- ROW -->
				<div class="row">
					
					<!-- TOVAR WRAPPER -->
					<div class="tovar_wrapper" data-appear-top-offset='-100' data-animated='fadeInUp'>
						<?php
                                                    $sql1=mysqli_query($con,"select * from items where status=1 LIMIT 10;");
                                                    while (($row1=mysqli_fetch_array($sql1))){
                                                ?>
						<!-- TOVAR1 -->
                                                <form action="#" method="post">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-ss-12 padbot40">
							<div class="tovar_item">
								<div class="tovar_img">
									<div class="tovar_img_wrapper">
										<img class="img" src="<?php echo $row1['img'];  ?>" alt="" />
										<img class="img_h" src="<?php echo $row1['img'];  ?>" alt="" />
									</div>
									<input type="hidden" value="<?php echo $row1['item_id']; ?>" name="cid" />
								</div>
								<div class="tovar_description clearfix">
                                                                    <a class="tovar_title" href="" ><?php echo ucfirst($row1['item_name']);  ?></a><br/>
									<span class="tovar_price">$<?php echo $row1['price'];  ?></span>
								</div>
							</div>
                                                    <input type="submit" name="submit1" style="background-color:#00FFFF;align:left;" value="Buy Now"/>
						</div><!-- //TOVAR1 -->
                                                </form>
						<?php
                                                
                                                    }
                                                    if(isset($_POST['submit1']))
                                                    {                                                       
                                                        $cid=$_POST['cid'];
                                                        $_SESSION['item_id']=$cid;
				
                                                    ?>
                                                    <script>
                                                            window.location.href="login.php";
                                                    </script>
                                                <?php
                                                    }
                                                ?>
						
						<div class="respond_clear_768"></div>
						
						
					</div><!-- //TOVAR WRAPPER -->
				</div><!-- //ROW --><!-- //ROW -->
				
				
				<!-- ROW -->
				<div class="row">
					
					<!-- BANNER WRAPPER -->
					<div class="banner_wrapper" data-appear-top-offset='-100' data-animated='fadeInUp'>
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
		</section><!-- //TOVAR SECTION -->
		
		
		<!-- NEW ARRIVALS -->
		<section class="new_arrivals padbot50">
			
			<!-- CONTAINER -->
			<div class="container">
				<h2>new arrivals</h2>
				
				<!-- JCAROUSEL -->
				<div class="jcarousel-wrapper">
					
					<!-- NAVIGATION -->
					<div class="jCarousel_pagination">
						<a href="javascript:void(0);" class="jcarousel-control-prev" ><i class="fa fa-angle-left"></i></a>
						<a href="javascript:void(0);" class="jcarousel-control-next" ><i class="fa fa-angle-right"></i></a>
					</div><!-- //NAVIGATION -->
					
					<div class="jcarousel" data-appear-top-offset='-100' data-animated='fadeInUp'>
						<ul>
                                                    <?php
                                                        $sql2=mysqli_query($con,"select * from items where status=1 order by date desc;");
                                                        while (($row2=mysqli_fetch_array($sql2))){
                                                    ?>
							<li>
								<!-- TOVAR -->
								<div class="tovar_item_new">
									<div class="tovar_img">
										<img src="<?php echo $row2['img']; ?>" alt="" />
                                                                        </div>
									<div class="tovar_description clearfix">
                                                                            <a class="tovar_title" href="itempage.php?pid=<?php echo $row2['item_id']; ?>" ><?php echo ucfirst($row2['item_name']); ?></a>
										<span class="tovar_price"><?php echo $row2['price']; ?></span>
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
		
		
		
		
		
		<hr class="container">
		
		
		<!-- SERVICES SECTION -->
		<section class="services_section">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- ROW -->
				<div class="row">
					<div class="col-lg-6 col-md-6 padbot60 services_section_description" data-appear-top-offset='-100' data-animated='fadeInLeft'>
						<p>Shop From thosands of quality items. Large amount of good qaulity items are waiting for you.</p>
						<span>Gluten-free quinoa selfies carles, kogi gentrify retro marfa viral. Odd future photo booth flannel ethnic pug, occupy keffiyeh synth blue bottle tofu tonx iphone. Blue bottle 90′s vice trust fund gastropub gentrify retro marfa viral</span>
					</div>
					
					<div class="col-lg-6 col-md-6 padbot30" data-appear-top-offset='-100' data-animated='fadeInRight'>
						
						<!-- ROW -->
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-3 col-xs-6 col-ss-12 padbot30">
								<div class="service_item">
									<div class="clearfix"><i class="fa fa-tablet"></i><p>Veriety of Items</p></div>
									<span>Thundercats squid single-origin coffee YOLO selfies disrupt, master cleanse semiotics letterpress typewriter.</span>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-3 col-xs-6 col-ss-12 padbot30">
								<div class="service_item">
									<div class="clearfix"><i class="fa fa-comments-o"></i><p>Large Number of Products</p></div>
									<span>Thundercats squid single-origin coffee YOLO selfies disrupt, master cleanse semiotics letterpress typewriter.</span>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-3 col-xs-6 col-ss-12 padbot30">
								<div class="service_item">
									<div class="clearfix"><i class="fa fa-eye"></i><p>Quality is Quaranteed</p></div>
									<span>Thundercats squid single-origin coffee YOLO selfies disrupt, master cleanse semiotics letterpress typewriter.</span>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-3 col-xs-6 col-ss-12 padbot30">
								<div class="service_item">
									<div class="clearfix"><i class="fa fa-cogs"></i><p>Easy Shopping</p></div>
									<span>Thundercats squid single-origin coffee YOLO selfies disrupt, master cleanse semiotics letterpress typewriter.</span>
								</div>
							</div>
						</div><!-- //ROW -->
					</div>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //SERVICES SECTION -->
		
		
		<hr class="container">
		
		
		<!-- RECENT POSTS -->
		<!-- RECENT POSTS -->
		<section class="recent_posts padbot40">

			<!-- CONTAINER -->
			<div class="container">
				<h2>Top Reviews</h2>

				<!-- ROW -->
				<div class="row" data-appear-top-offset='-100' data-animated='fadeInUp'>
					<div class="col-lg-6 col-md-6 padbot30">
						<div class="recent_post_item clearfix">
							<div class="recent_post_date">15<span>oct</span></div>
                                                        <a class="recent_post_img" href="blog-post.html" ><img src="images/blog/princi.jpg" alt="" /></a>
							<a class="recent_post_title" href="blog-post.html" >Be Smart, Shopping Is WAY Easier Nowadays</a>
							<div class="recent_post_content">Innovations has come in Many Areas Nowdays,Finally our College Store is Completely Automated, So Its a happy moment for all of the Amalites. Its State of the Art Technoly is Very Effective Simple Than Covensional Methodes.</div>
							<ul class="post_meta">
								<li><i class="fa fa-comments"></i>Likes <span class="sep">|</span> 15</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 padbot30">
						<div class="recent_post_item clearfix">
							<div class="recent_post_date">07<span>dec</span></div>
                                                        <a class="recent_post_img" href="blog-post.html" ><img src="images/blog/mngr.jpg" alt="" /></a>
							<a class="recent_post_title" href="blog-post.html" >Innovative Ideas will Always Succeed.</a>
							<div class="recent_post_content">Old Slow Days are now Gone, here comes the new Speedy generation, the generation who don't have time to waste on queues. So its Ideal for you guyZz... So All the Best...</div>
							<ul class="post_meta">
								<li><i class="fa fa-comments"></i>Likes <span class="sep">|</span> 22</li>
							</ul>
						</div>
					</div>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //RECENT POSTS -->
		
	
				<!-- FOOTER -->
		<footer>

			<!-- CONTAINER -->
			<div class="container" data-animated='fadeInUp'>

				<!-- ROW -->
				<div class="row">

					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 col-ss-12 padbot30">
						<h4>Contacts</h4>
						<div class="foot_address"><span>Global Store</span>Amal College Of Engineering, Kanjirappally</div>
						<div class="foot_phone"><a href="tel:1 800 888 2828" >+91 894 307 4070</a></div>
						<div class="foot_mail"><a href="mailto:amaljyothistore@gmail.com" >amaljyothistore@gmail.com</a></div>
						<div class="foot_live_chat"><a href="javascript:void(0);" ><i class="fa fa-comment-o"></i> Live chat</a></div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 col-ss-12 padbot30">
						<h4>Information</h4>
						<ul class="foot_menu">
							<li><a href="about.php" >About Us</a></li>
										<li><a href="gallery.html" >Gallery<span>new</span></a></li>
							<li><a href="javascript:void(0);" >Delivery</a></li>
							<li><a href="javascript:void(0);" >Privacy policy</a></li>
							<li><a href="javascript:void(0);" >Blog</a></li>
							<li><a href="javascript:void(0);" >Faqs</a></li>
							<li><a href="contacts.html" >contact Us</a></li>
						</ul>
					</div>

					<div class="respond_clear_480"></div>

					<div class="col-lg-4 col-md-4 col-sm-6 padbot30">
						<h4>About shop</h4>
						<p>We ask for your name, telephone number, home address, email address and age for competitions, prize draws or newsletter sign ups. When a purchase is made on our site, in addition to the above, we also ask for delivery address, and payment method details.</p>
						<p>We may obtain information about your usage of our website to help us develop and improve it further through online surveys and other requests.</p>
					</div>

					<div class="respond_clear_768"></div>

					<div class="col-lg-4 col-md-4 padbot30">
						<h4>Newsletter</h4>
						<form class="newsletter_form clearfix" action="javascript:void(0);" method="get">
							<input type="text" name="newsletter" value="Enter E-mail & Get 10% off" onFocus="if (this.value == 'Enter E-mail & Get 10% off') this.value = '';" onBlur="if (this.value == '') this.value = 'Enter E-mail & Get 10% off';" />
							<input class="btn newsletter_btn" type="submit" value="SIGN UP">
						</form>

						<h4>we are in social networks</h4>
						<div class="social">
							<a href="javascript:void(0);" ><i class="fa fa-twitter"></i></a>
							<a href="javascript:void(0);" ><i class="fa fa-facebook"></i></a>
							<a href="javascript:void(0);" ><i class="fa fa-google-plus"></i></a>
							<a href="javascript:void(0);" ><i class="fa fa-pinterest-square"></i></a>
							<a href="javascript:void(0);" ><i class="fa fa-tumblr"></i></a>
							<a href="javascript:void(0);" ><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->

			<!-- COPYRIGHT -->
			<div class="copyright">

				<!-- CONTAINER -->
				<div class="container clearfix">
                                    <div class="foot_logo"><a href="index.php" ><img src="images/logo.png" alt="" style="height: 57px;width: 118px;"></a></div>

					<div class="copyright_inf">
						<span>JB Solutions© 2017</span> |
						<span>Theme by Jibin Baby</span> |
						<a class="back_top" href="javascript:void(0);" >Back to Top <i class="fa fa-angle-up"></i></a>
					</div>
				</div><!-- //CONTAINER -->
			</div><!-- //COPYRIGHT -->
		</footer><!-- //FOOTER -->
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
	<script>
		if (top != self) top.location.replace(self.location.href);
	</script>
	
</body>

<!-- Mirrored from demo.evatheme.com/html/glammy/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2017 06:07:32 GMT -->
</html>