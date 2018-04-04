<!DOCTYPE html>
<html lang="en">
<?php
    include './conn.php'; 
    session_start();
    
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
    
    if(isset($_SESSION['item_id'])){
	$id1=$_SESSION['item_id'];
        $enc3=encrypt($id1,'dgafg12');
        ?>
    <script>
        
        window.location.href="itemdetails.php?enc=<?php echo $enc3;  ?>";
    </script>
    <?php
	
    }
    include './analyticstracking.php'; 
    
    if(!isset($_SESSION['uname'])){
        ?>
    <script>
        window.location.href="login.php";
    </script>
    <?php
    }
    $login_id=$_SESSION['uname'];
    $sql1= mysqli_query($con, "SELECT * FROM `user` WHERE `uname`=$login_id and status=1");
    $row1 = mysqli_fetch_array($sql1);
    $name=$row1['name'];
?>
<head>
	
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
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="../../../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
</head>
<style>
    div.img {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
	background-color:lightgoldenrodyellow;
	height:290px;
	border-radius:13px 13px 13px 13px;
    }
    div.img:hover span:after {
      position: relative;
      opacity: 0;
      top: 0;
      left:980px;
      transition: 0.5s;
    }



    div.img:hover span{
        border: 1px solid #777;
            padding-right: 0px;
    }

    div.img:hover span:after{
      opacity: 1;
      right: 0;
    }

    div.img img {
        height:200px;
            width:190px;
    }

    div.desc {
        padding: 15px;
        text-align: center;
            font-family:Benguiat Bk BT;
    }
    .button1 {	width:100px;
            background-color:#33FF99;
            border-radius:13px;
            cursor: pointer;
    }

</style>
<body style="background-color: lightgoldenrodyellow;">

<!-- PRELOADER -->
<div id="preloader"><img src="images/preloader.gif" alt="" /></div>
<!-- //PRELOADER -->

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
		</header><!-- //HEADER -->
		
		
		<!-- BREADCRUMBS -->
		<section class="breadcrumb women parallax margbot30">
			
			<!-- CONTAINER -->
			<div class="container">
                            <h2><?php echo $name; ?></h2>
			</div><!-- //CONTAINER -->
		</section><!-- //BREADCRUMBS -->
		
		
		<!-- SHOP BLOCK -->
		<section class="shop">
			
			<!-- CONTAINER -->
			<div class="container">
			
				<!-- ROW -->
				<div class="row">
					
					<!-- SIDEBAR -->
					<div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 padbot50">
						
						<!-- CATEGORIES -->
                                                 <?php
                                                        $result =mysqli_query($con,"SELECT `category_id`, `c_name`, `img`, `status` FROM `category` where status=1 order by c_name;");
                                                        while (($t=mysqli_fetch_array($result))){
                                                            $cat_id=$t['category_id'];
                                                   ?>
						<div class="sidepanel widget_categories">
							<h3><?php  echo ucfirst($t['c_name']);  ?></h3>
							<ul>
                                                            <?php
                                                                 $result1 =mysqli_query($con,"SELECT * FROM `subcategory` where status=1 and category_id=$cat_id order by sub_cname;");
                                                                 while (($t1=mysqli_fetch_array($result1))){
																	$encsub= encrypt($t1['subcategory_id'],'dgafg12');
                                                            ?>
                                                            <li><a href="viewitems1.php?subcategory_id=<?php  echo $encsub ;  ?>" ><?php  echo ucfirst($t1['sub_cname']);  ?></a></li>
                                                            <?php
                                                                 }
                                                            ?>
                                                                
								
							</ul>
						</div><!-- //CATEGORIES -->
						<?php
                                                    }
                                               ?>
							
						
					</div><!-- //SIDEBAR -->
					
					
					<!-- SHOP PRODUCTS -->
					<div class="col-lg-9 col-sm-9 col-sm-9 padbot20">
						
						<!-- SHOP BANNER -->
						<div class="banner_block margbot15">
							<a class="banner nobord" href="javascript:void(0);" ><img src="images/tovar/banner21.html" alt="" /></a>
						</div><!-- //SHOP BANNER -->
						
						<!-- SORTING TOVAR PANEL -->
						<div class="sorting_options clearfix">
							<?php
                                                            $result4=mysqli_query($con,"SELECT COUNT(*)as count FROM items where status=1;");
                                                                $t3=mysqli_fetch_array($result4);
                                                        
                                                        ?>
							<!-- COUNT TOVAR ITEMS -->
							<div class="count_tovar_items">
								<p>Items</p>
								<span><?php echo $t3['count']; ?> Items</span>
							</div><!-- //COUNT TOVAR ITEMS -->
							
							<!-- TOVAR FILTER -->
							<div class="product_sort">
								<p>SORT BY</p>
                                                                <form action="" method="POST">
                                                                    <select class="basic" name="sort_sel" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="p">Popularity</option>
                                                                            <option value="d">Date</option>
                                                                    </select>
                                                                    <input type="submit" name="submit" value="SORT"/>
                                                                </form>    
							</div><!-- //TOVAR FILTER -->
							
						</div><!-- //SORTING TOVAR PANEL -->
						
						
						<!-- ROW -->
						<div class="row shop_block">
                                                    <!-- TOVAR1 -->
							<div class="tovar_wrapper col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot40">
                                                        <center>
                                                        <table>
                                                        <?php 
                                                            if(isset($_POST['submit']))
                                                            {
                                                                $sbc=$_POST['sort_sel'];
                                                                if($sbc=='p'){
                                                                    $qry3="select * from items WHERE status=1 order by date";
                                                                }
                                                                elseif($sbc=='d'){
                                                                    $qry3="select * from items WHERE status=1 order by date desc";
                                                                }
                                                                    $res3=mysqli_query($con,$qry3);
                                                                $i=0;
                                                                while($ar3=mysqli_fetch_array($res3))
                                                                {
                                                                    $i++;
                                                                    if($i % 6==1)
                                                                    {
                                                                            echo "<tr>";
                                                                    }
                                                            ?>
                                                                    <td>
                                                                                    <!-- <form action="book.php" method="post"> -->
                                                                        <div class="img">
                                                                            <center>
                                                                            <span><img src="<?php echo $ar3['img']?>" alt="Category"></span>
                                                                            <h4>
                                                                                <?php echo $ar3['item_name'];?>
                                                                            </h4>
                                                                            Price: <?php echo $ar3['price'];?><br>
                                                                            <?php
                                                                                $abc=$ar3['item_id'];
                                                                                $enc = encrypt($abc,'dgafg12');
                                                                            ?>
                                                                            <a href="itemdetails.php?enc=<?php echo $enc;  ?>" >
                                                                               <button type="submit" value="More Details1" name="submit" class="button1"/>More Details</button>
                                                                            </a>
                                                                            </center> 
                                                                        </div>
                                                                       <!-- </form> -->
                                                                    </td>
                                                            <?php } 
                                                             }
                                                             else
                                                            {

                                                            $query3="select * from items where status=1";
                                                            $result3=mysqli_query($con,$query3);
                                                            $i=0;
                                                            while($array3=mysqli_fetch_array($result3))
                                                            {
                                                                    $i++;
                                                                    if($i % 6==1)
                                                                    {
                                                                            echo "<tr>";
                                                                    }
                                                            ?>
                                                                    <td>
                                                                                    <!-- <form action="petdetails.php" method="post"> -->
                                                                            <div class="img">
                                                                            <center>
                                                                            <span><img src="<?php echo $array3['img']?>" alt="Category"></span>
                                                                            <h4>
                                                                                <?php echo $array3['item_name'];?>
                                                                            </h4>
                                                                            Price: <?php echo $array3['price'];?><br>
                                                                             <?php
                                                                                $abc1=$array3['item_id'];
                                                                                $enc1 = encrypt($abc1,'dgafg12');
                                                                            ?>
                                                                            <a href="itemdetails.php?enc=<?php echo $enc1;  ?>" ><button type="submit" value="More Details1" name="submit" class="button1"/>More Details</button>
                                                                               </a>
                                                                            </center> 
                                                                        </div>
                                                                     <!--  </form> -->
                                                                            </td>
                                                             <?php } 
                                                             }
                                                             ?>
                                                        </table>
                                                        </center>
							</div><!-- //TOVAR1 -->
                                                        <?php
                                                           // }
                                                        ?>
						</div><!-- //ROW -->
						
						<hr>
                                                <div class="sorting_options clearfix">
							<?php
                                                            $result6=mysqli_query($con,"SELECT COUNT(*)as count from sh_item where status=1 and uname !=$login_id;");
                                                                $t6=mysqli_fetch_array($result6);
                                                        
                                                        ?>
							<!-- COUNT TOVAR ITEMS -->
							<div class="count_tovar_items">
								<p>Used Items</p>
								<span><?php echo $t6['count']; ?> Used Items</span>
							</div><!-- //COUNT TOVAR ITEMS -->
							
							<!-- TOVAR FILTER -->
							<div class="product_sort">
								<p>SORT BY</p>
                                                                <form action="" method="POST">
                                                                    <select class="basic" name="sort_sel" required>
                                                                            <option value="">Choose</option>
                                                                            <option value="p">Popularity</option>
                                                                            <option value="d">Date</option>
                                                                    </select>
                                                                    <input type="submit" name="submit" value="SORT"/>
                                                                </form>    
							</div><!-- //TOVAR FILTER -->
							
						</div><!-- //SORTING TOVAR PANEL -->
                                                
                                                <!-- ROW -->
						<div class="row shop_block">
                                                    <!-- TOVAR1 -->
							<div class="tovar_wrapper col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot40">
                                                        <center>
                                                        <table>
                                                        <?php 
                                                            if(isset($_POST['submit']))
                                                            {
                                                                $sbc=$_POST['sort_sel'];
                                                                if($sbc=='p'){
                                                                    $qry7="SELECT `sitem_id`, `uname`, `sitem_name`, `sprice`, `sdes`, `simg`, `status` FROM `sh_item` WHERE status=1 and uname !=$login_id order by sitem_name; order by date";
                                                                }
                                                                elseif($sbc=='d'){
                                                                    $qry7="SELECT * from sh_item WHERE status=1 order by date desc";
                                                                }
                                                                    $res7=mysqli_query($con,$qry7);
                                                                $i=0;
                                                                while($ar7=mysqli_fetch_array($res7))
                                                                {
                                                                    $i++;
                                                                    if($i % 5==1)
                                                                    {
                                                                            echo "<tr>";
                                                                    }
                                                            ?>
                                                                    <td>
                                                                                    <!-- <form action="book.php" method="post"> -->
                                                                        <div class="img">
                                                                            <center>
                                                                            <span><img src="<?php echo $ar7['simg']?>" alt="Used Item"></span>
                                                                            <h4>
                                                                                <?php echo $ar7['sitem_name'];?>
                                                                            </h4><br/>
                                                                                <a href=<?php echo "sitemdetails.php?item_id={$ar7['sitem_id']}" ?> ><button type="submit" value="More Details1" name="submit" class="button1"/>More Details</button>
                                                                               </a>
                                                                            </center> 
                                                                        </div>
                                                                       <!-- </form> -->
                                                                    </td>
                                                            <?php } 
                                                             }
                                                             else
                                                            {

                                                            $query8="SELECT * from sh_item where status=1 and uname !=$login_id";
                                                            $result8=mysqli_query($con,$query8);
                                                            $i=0;
                                                            while($array8=mysqli_fetch_array($result8))
                                                            {
                                                                    $i++;
                                                                    if($i % 6==1)
                                                                    {
                                                                            echo "<tr>";
                                                                    }
                                                            ?>
                                                                    <td>
                                                                                    <!-- <form action="petdetails.php" method="post"> -->
                                                                            <div class="img">
                                                                            <center>
                                                                            <span><img src="<?php echo $array8['simg']?>" alt="Trolltunga Norway"></span>
                                                                            <h4>
                                                                                <?php echo $array8['sitem_name'];?>
                                                                            </h4><br/>
                                                                                <a href=<?php echo "sitemdetails.php?item_id={$array8['sitem_id']}" ?> ><button type="submit" value="More Details1" name="submit" class="button1"/>More Details</button>
                                                                               </a>
                                                                            </center> 
                                                                        </div>
                                                                     <!--  </form> -->
                                                                            </td>
                                                             <?php } 
                                                             }
                                                             ?>
                                                        </table>
                                                        </center>
							</div><!-- //TOVAR1 -->
                                                        <?php
                                                           // }
                                                        ?>
						</div><!-- //ROW -->
                                                
                                                
						
					</div><!-- //SHOP PRODUCTS -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //SHOP -->
		
                </div>
		
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

<!-- Mirrored from demo.evatheme.com/html/glammy/women.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2017 08:04:41 GMT -->
</html>