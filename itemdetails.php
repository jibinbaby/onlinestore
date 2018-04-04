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
	<style>
            .checked {
                color: orange;
            }
        </style>
</head>
<body>
   

<!-- PRELOADER -->
<div id="preloader"><img src="images/preloader.gif" alt="" /></div>
<!-- //PRELOADER -->
<div class="preloader_hide">

	<!-- PAGE -->
	<div id="page" style="background-color:lightgoldenrodyellow;">
	
                <!-- HEADER -->
                <header>
                        <!-- MENU BLOCK -->
                        <div class="menu_block">

                        <!-- CONTAINER -->
                        <div class="container clearfix">
                        <?php
                            include './menu.php';
                        ?>		
                        </div><!-- //CONTAINER -->
                        </div>
                </header><!-- //HEADER -->
		 <?php
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
                    if(isset($_GET['enc'])){
                        if(isset($_SESSION['utype'])){
                            if($_SESSION['utype']==='S'){
                                $id=$_REQUEST['enc'];
                                $encc=decrypt($id,'dgafg12');
                                $cnt=0;
                                $sqlll=mysqli_query($con,"SELECT * FROM `feedback` WHERE item_id='$encc' and status=1 and uname=".$_SESSION['uname']." ");
                                $rowcount11=mysqli_num_rows($sqlll);
                                //echo $rowcount11;    

                                $sql1=mysqli_query($con,"SELECT * FROM `items` WHERE item_id='$encc' and status=1 order by item_name;");
                                    $records1=mysqli_fetch_array($sql1);
                                    $sub_id=$records1['subcategory_id'];
                                $sql52=mysqli_query($con,"SELECT * FROM `subcategory` WHERE subcategory_id='$sub_id' and status=1");
                                    $records52=mysqli_fetch_array($sql52);
                ?>
		
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
						<h3><b>other <?php echo ucfirst("{$records52['sub_cname']}"); ?></b></h3>
						<?php
                                                    $sql2=mysqli_query($con,"SELECT * FROM `items` WHERE subcategory_id=$sub_id and status=1 order by item_name LIMIT 3;");
                                                        while($records2=mysqli_fetch_array($sql2))
                                                        {
                                                            $abc5=$records2['item_id'];
                                                            $enc5 = encrypt($abc5,'dgafg12');
                                                ?>
						<ul class="tovar_items_small clearfix">
							<li class="clearfix">
                                                            <img class="tovar_item_small_img" src="<?php echo "{$records2['img']}"; ?>" alt="" />
                                                            <a href="itemdetails.php?enc=<?php echo $enc5; ?>" class="tovar_item_small_title"><?php echo ucfirst("{$records2['item_name']}"); ?></a>
								<span class="tovar_item_small_price"> <?php echo ucfirst("{$records2['price']}"); ?></span>
							</li>
							
						</ul>
                                                <?php
                                                        }
                                                ?>
					</div><!-- //SIDEBAR TOVAR DETAILS -->
					
					<!-- TOVAR DETAILS WRAPPER -->
					<div class="col-lg-9 col-md-9 tovar_details_wrapper clearfix">
						<div class="tovar_details_header clearfix margbot35">
							<h3 class="pull-left"><b><?php echo ucfirst("{$records52['sub_cname']}"); ?></b></h3>
							
							
						</div>
						
						<!-- CLEARFIX -->
						<div class="clearfix padbot40">
							<div class="tovar_view_fotos clearfix">
								<div id="slider2" class="flexslider">
									<ul class="slides">
										<li><a href="javascript:void(0);" ><img src="<?php echo "{$records1['img']}"; ?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo "{$records1['img']}"; ?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo "{$records1['img']}"; ?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo "{$records1['img']}"; ?>" alt="" /></a></li>
									</ul>
								</div>
								<div id="carousel2" class="flexslider">
									<ul class="slides">
										<li><a href="javascript:void(0);" ><img src="<?php echo "{$records1['img']}"; ?>" alt="" /></a></li>
										<li><a href="javascript:void(0);" ><img src="<?php echo "{$records1['img']}"; ?>" alt="" /></a></li>
									</ul>
								</div>
							</div>
							<form action="#" method="POST" name="gl_add_to_cart" onsubmit="return addTocart()" enctype="multipart/form-data" >
							<div class="tovar_view_description">
								<div class="tovar_view_title"><?php echo ucfirst("{$records1['item_name']}"); ?></div>
								
								<div class="clearfix tovar_brend_price">
                                                                    <div class="pull-left tovar_brend">
                                                                        <?php
                                                                            if($records1['stock']<1){
                                                                                echo "<p color='red'>Out of Stock></p>";
                                                                            } else {
                                                                                echo "<p style='color:green; font-weight:bold; font-size:20px;'>In Stock</p>";
                                                                            }
                                                                            $sql3=mysqli_query($con,"select * from wallet where uname={$_SESSION['uname']} and status=1 ;");
                                                                            $records3= mysqli_fetch_array($sql3);
                                                                            $balance=$records3['balance'];
                                                                            //echo $balance;
                                                                        ?>
                                                                    </div>
									<div class="pull-right tovar_view_price"><?php echo "{$records1['price']}"; ?> Rs</div>
								</div>
								<div class="tovar_color_select">
									<?php
                                                                            $score=0;
                                                                            $sqlc=mysqli_query($con,"SELECT * FROM `feedback` WHERE item_id='$encc' and status=1 ");
                                                                            $rowcount=mysqli_num_rows($sqlc);
                                                                            //echo $rowcount;

                                                                            if($rowcount==0){
                                                                                echo "<center>No feedbacks</center>";
                                                                            }

                                                                            else{
                                                                            $sqlf=mysqli_query($con,"SELECT * FROM `feedback` WHERE item_id='$encc' and status=1 ");
                                                                            while($recordsf=mysqli_fetch_array($sqlf)){
                                                                                $score= $score + $recordsf['score'];
                                                                            }
                                                                            $rating1=$score/$rowcount;
                                                                            //echo $rating;
                                                                            $rating= round($rating1);
                                                                            //echo $rating;
                                                                        ?>
                                                                <center>
                                                                     <?php
                                                                            for ($a=1;$a<=$rating;$a++){
                                                                    ?>

                                                                        <span class="fa fa-star checked"></span> 

                                                                       <?php
                                                                            }
                                                                        ?>
                                                                            (<?php echo $rowcount;?> Votes)
                                                                        <?php
                                                                            }
                                                                            ?>
                                                                </center>  
								</div>
								<div class="tovar_size_select">
                                                                    <table>
                                                                         <tr>
                                                                            <td>REQUIRED QUANTITY:</td>
                                                                            <td><input type="number" name="gl_req_quantity" id="gl_req_quantity" placeholder="Number of Items" min="1" max="<?php echo "{$records1['stock']}"; ?>" Required value="0"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>PRICE:</td>
                                                                            <td><input type="text" name="gl_price" id="gl_price" value=" <?php echo "{$records1['price']}"; ?>" readonly></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>TOTAL COST:</td>
                                                                            <td><input type="text" name="gl_total" id="gl_total" Required readonly value="0" ></td></td>
                                                                        </tr>
                                                                        <input type="hidden" name="balance_hide" id="balance_hide" value="<?php echo "{$records3['balance']}"; ?>"/>
                                                                        <input type="hidden" name="item_id" id="item_id" value="<?php echo "{$records1['item_id']}"; ?>"/>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                        <center>
                                                                            <?php


                                                                           
                                                                            $abc=$records1['item_id'];
                                                                            $enc = encrypt($abc,'dgafg12');
                                                                            $dec=decrypt($enc,'dgafg12');
                                                                            ?>
                                                                            </button>

                                                                        </center>   
                                                                            </td>
                                                                        </tr>

                                                                    </table>
								</div>
								<div class="tovar_view_btn">
									<button type="submit" class="gl_edit_button" id="gl_add_to_cart" name="gl_add_to_cart" style="vertical-align:middle"  onclick="" style="width:auto;"><span>Add to Cart</span></button>
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
                                                        </form>
						</div><!-- //CLEARFIX -->
						
						<!-- TOVAR INFORMATION -->
						<div class="tovar_information">
							<ul class="tabs clearfix">
								<li class="current">Details</li>
								<li>Information</li>
                                                                <?php
                                                                    $encrypt1=decrypt($enc,'dgafg12');
                                                                    $sqlfeedcount=mysqli_query($con,"select count(*) as count from feedback where status=1 and item_id=$encrypt1");
                                                                    $recordfeedcount=mysqli_fetch_array($sqlfeedcount);
                                                                
                                                                ?>
								<li>Reviews (<?php echo "{$recordfeedcount['count']}"; ?>)</li>
							</ul>
							<div class="box visible">
								    
                                                                    <?php echo "{$records1['description']}"; ?>
                                                                
							</div>
							<div class="box">
								Item Name:<?php echo "{$records1['item_name']}"; ?> <br>
								Price:<?php echo "{$records1['price']}"; ?><br>
								Stock Left:<?php echo "{$records1['stock']}"; ?><br>
								Date:<?php echo "{$records1['date']}"; ?><br>
								<?php echo "{$records1['description']}"; ?><br><br>

								Quality Details:<br>
								High Quality Product<br>
								Durable
							</div>
							<div class="box">
								<ul class="comments">
                                                                    <?php
                                                                        
                                                                        $sqlfeed=mysqli_query($con,"select * from feedback where status=1 and item_id=$encrypt1 order by date;");
                                                                            while($recordsfeed=mysqli_fetch_array($sqlfeed)){
                                                                                $uname=$recordsfeed['uname'];
                                                                                $sqluser=mysqli_query($con,"select * from user where uname=$uname and status=1;");
                                                                                    while($recordsuser=mysqli_fetch_array($sqluser)){
            
            ?>
									<li>
										<div class="clearfix">
                                                                                        
											<p class="pull-left"><strong><a href="javascript:void(0);" ><?php echo ucfirst("{$recordsuser['name']}"); ?></a></strong></p>
											<span class="date">2013-10-09 09:23</span>
											<div class="pull-right rating-box clearfix">
												<?php

                                                                                                    $sqlcc=mysqli_query($con,"SELECT * FROM `feedback` WHERE item_id='$encrypt1' and status=1 and uname=$uname ");
                                                                                                    $recordscc=mysqli_fetch_array($sqlcc);
                                                                                                    $rating5=$recordscc['score'];
                                                                                                        for ($a=1;$a<=$rating5;$a++){
                                                                                                ?>

                                                                                                    <span class="fa fa-star checked"></span> 

                                                                                                <?php
                                                                                                    }
                                                                                                ?>

                                                                                                    </center>
											</div>
										</div>
										<p><?php echo ucfirst("{$recordsfeed['feedback']}"); ?></p>
									</li>
                                                                         <?php
                                                                                    }
                                                                            }
                                                                        ?>
								</ul>
								
								<h3>WRITE A REVIEW</h3>
                                                                    <button type="" class="gl_edit_button" id="gl_fdback_cart" name="gl_fdback_cart" style="vertical-align:middle" <?php if ($rowcount11 == '1'){  ?> disabled <?php   } ?> onclick="window.location.href='feedback.php?enc=<?php echo "$enc"; ?>'" style="width:auto;"><span>Feedback</span></button>
							</div>
						</div><!-- //TOVAR INFORMATION -->
					</div><!-- //TOVAR DETAILS WRAPPER -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //TOVAR DETAILS -->
		
		
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
					
					<div class="jcarousel">
						<ul>
                                                    <?php
                                                        $sql2=mysqli_query($con,"SELECT * FROM `items` WHERE subcategory_id=$sub_id and status=1 order by date desc;");
                                                            while($records2=mysqli_fetch_array($sql2))
                                                                {
                                                    ?>
							<li>
								<!-- TOVAR -->
								<div class="tovar_item_new">
									<div class="tovar_img">
										<img src="<?php echo "{$records2['img']}"; ?>" alt="" />
                                                                                <div class="">
                                                                                     <?php
                                                                                        $abc1=$records2['item_id'];
                                                                                        $enc1 = encrypt($abc1,'dgafg12');
                                                                                    ?>
											<a class="open-project tovar_view" href="<?php echo "itemdetails.php?enc=$enc1" ?> " >quick view</a>
										</div>
                                                                        </div>
									<div class="tovar_description clearfix">
										<a class="tovar_title" href="<?php echo "itemdetails.php?enc=$enc1" ?>" ><?php echo ucfirst("{$records2['item_name']}"); ?></a>
										<span class="tovar_price"><?php echo ucfirst("{$records2['price']}"); ?> Rs</span>
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
		
		
		
	
		<!-- FOOTER -->
                
		<!-- //FOOTER -->
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
<?php
            }
                        }
                    }

?>
 <script src="js/jqueryori.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#gl_req_quantity").on("change",function() {
        $index=$('#gl_req_quantity').val();
        $price=$('#gl_price').val();
        $total=$index*$price;
        $("#gl_total").val($total);
      })
    })
    </script>
    <script>
//        function addTocart(){
//            var balanc= document.gl_add_to_cart.balance_hide.value;
//            alert(balanc);
//        }
        document.getElementById("gl_req_quantity").onchange = function() {walletCheck()};
        function walletCheck(){
            var amt= document.getElementById("gl_total").value;
            var balance=parseInt(document.getElementById("balance_hide").value);
            if(amt>balance){
                alert("Insufficient Balance"+amt+">"+balance);
            }
            
        }
    </script>
<?php
        if(isset($_POST["gl_add_to_cart"])){
            $gl_req_quantity=htmlspecialchars($_POST['gl_req_quantity']);
            $item_id=htmlspecialchars($_POST['item_id']); 
            $uname=$_SESSION['uname'];
            $gl_total=htmlspecialchars($_POST['gl_total']);
            $sql5=mysqli_query($con,"select * from cart where item_id=$item_id and status=1 and uname={$_SESSION['uname']};");
            $records5= mysqli_fetch_array($sql5);
            $tqty=$gl_req_quantity + $records5['qty'];
            $tprice=$gl_total + $records5['total_price'];
            //echo $tqty;
            //echo $tprice;
            $count= mysqli_num_rows($sql5);
            //echo $count;
            if ($count < 1){
            $sql4="INSERT INTO `cart`(`uname`, `item_id`,`qty`, `total_price`, `status`) 
                VALUES($uname,$item_id,$gl_req_quantity,$gl_total,1);";
                if (mysqli_query($con,$sql4) > 0){
?>
            <script>
                    window.location="cart.php";
                    alert("Added to Cart");
            </script>

<?php
                }
                else{
                    echo "<script> alert ('Try Again!'); </script>";
                }
            }
            else{
            $sql6="UPDATE `cart` SET `qty`=$tqty,`total_price`=$tprice WHERE item_id=$item_id and status=1 and uname={$_SESSION['uname']};";
            $result3=mysqli_query($con,$sql6);
                
?>
            <script>
                    window.location="cart.php";
                    alert("Cart Updated");
            </script>

<?php
            
            }
            
        }
    
    ?>
</html>