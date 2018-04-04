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
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="../../../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <script>
            function buyItem(){
                var amt= document.getElementById("total_gl_cart_price").value;
                var balance=parseInt(document.getElementById("balance_hide").value);
                if(amt>balance){
                    alert("Insufficient Balance.\n\
                            Available Balance= "+balance);
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
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- PAGE HEADER -->
		<section class="page_header">
			
			<!-- CONTAINER -->
			<div class="container">
				<h3 class="pull-left"><b>Shopping bag</b></h3>
				
				<div class="pull-right">
                                    <a href="userhome1.php" >Back to shop<i class="fa fa-angle-right"></i></a>
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //PAGE HEADER -->
		
		
		<!-- SHOPPING BAG BLOCK -->
                
		<section class="shopping_bag_block">
			
			<!-- CONTAINER -->
			<div class="container">
                            <!-- ROW -->
				<div class="row">
                                    <form action="#" method="POST" name="gl_buy_item" onsubmit="return buyItem()" enctype="multipart/form-data" >
                                    
					<!-- CART TABLE -->
					<div class="col-lg-9 col-md-9 padbot40">
						
						<table class="shop_table">
							<thead>
								<tr>
									<th class="product-thumbnail"></th>
									<th class="product-name">Item</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove"></th>
								</tr>
                                                                
							</thead>
                                                        <?php
                                                                $sql1=mysqli_query($con,"SELECT * FROM `cart` WHERE uname={$_SESSION['uname']} and status=1;");
                                                                $tot_price=0;
                                                                $count= mysqli_num_rows($sql1);
                                                                //echo $count;
                                                                $sql3= mysqli_query($con, "select * from wallet where uname={$_SESSION['uname']} and status=1;");
                                                                $records3= mysqli_fetch_array($sql3);
                                                                $bal=$records3['balance'];
                                                                $wal_id=$records3['w_id'];
                                                                //echo $bal;

                                                                    while($records1=mysqli_fetch_array($sql1)){
                                                                        $item_id=$records1['item_id'];
                                                                        $cart_id=$records1['c_id'];
                                                                        $sql2=mysqli_query($con,"select * from items where item_id=$item_id and status=1;");
                                                                    while($records2=mysqli_fetch_array($sql2)){
                                                            ?>
                                                        
							<tbody>
                                                            <tr class="cart_item">
                                                                    <td class="product-thumbnail"><img src="<?php echo "{$records2['img']}"; ?>"  alt="" /></a></td>
                                                                    <td class="product-name">
                                                                            <a href=""><?php echo ucfirst("{$records2['item_name']}") ?></a>
                                                                            <ul class="variation">
                                                                                    <li class="variation-Color">Price: <span><?php echo "{$records2['price']}" ?></span></li>
                                                                                    <li class="variation-Size">Qty: <span><?php echo "{$records1['qty']}" ?></span></li>
                                                                            </ul>
                                                                    </td>

                                                                    <td class="product-price"><?php echo "{$records2['price']}" ?></td>

                                                                    <td class="product-price"><?php echo "{$records1['qty']}" ?></td>

                                                                    <td class="product-subtotal"><?php echo "{$records1['total_price']}" ?></td>

                                                                    <td class="product-remove"><a href="removecartitem.php?cart_id=<?php echo $cart_id; ?>" ><span>Delete</span> <i>X</i></a></td>
                                                            
                                                            </tr>
                                                        <input name="gl_cart_price" type="hidden" value="<?php echo "{$records2['price']}" ?>" />	
							<input type="hidden" name="itemid_hide" id="itemid_hide" value="<?php echo "{$records3['item_id']}"; ?>"/>
                                                        <input type="hidden" name="balance_hide" id="balance_hide" value="<?php echo $bal;; ?>"/>	
							<input name="gl_cart_qty"  type="hidden" value="<?php echo "{$records1['qty']}" ?>" />
                                                        <input name="gl_cart_total" type="hidden" value="<?php echo "{$records1['total_price']}" ?>" /> 
							</tbody>
                                                         <?php
                                                            $price=$records1['total_price'];

                                                            $tot_price=$tot_price+$price;

                                                    }
                                                                        }
                               // echo $tot_price;
                
                ?>
                                                        
						</table>
                                                
					</div><!-- //CART TABLE -->
					
					
					<!-- SIDEBAR -->
					<div id="sidebar" class="col-lg-3 col-md-3 padbot50">
						
						<!-- BAG TOTALS -->
						<div class="sidepanel widget_bag_totals">
							<h3>BAG TOTALS</h3>
							<table class="bag_total">
								<tr class="cart-subtotal clearfix">
									<th>Sub total</th>
									<td><?php  echo $tot_price;  ?></td>
								</tr>
								<tr class="shipping clearfix">
									<th>SHIPPING</th>
									<td>Free</td>
								</tr>
								<tr class="total clearfix">
									<th>Total</th>
									<td><?php  echo $tot_price;  ?></td>
								</tr>
							</table>
                                                        <input name="total_gl_cart_price" type="hidden" value="<?php  echo $tot_price;  ?>" />
                                                        
                                                        <a class="btn active"><input type="submit" name="gl_buy" value="Buy Now"/></a>
                                                        <a class="btn inactive" href="userhome1.php" >Continue shopping</a>
						</div><!-- //REGISTRATION FORM -->
					</div><!-- //SIDEBAR -->
                                        </form>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
                        
		</section><!-- //SHOPPING BAG BLOCK -->
		
	
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
	<script src="js/jqueryui.custom.min.html" type="text/javascript"></script>
	<script src="js/fancySelect.js"></script>
	<script src="js/animate.js" type="text/javascript"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	
</body>
    <?php
        
        if(isset($_POST["gl_buy"])){
            if($bal < $tot_price){
                echo "<script>alert('Insufficient Balance');</script>";
            }
            else{
            
            $sql6=mysqli_query($con,"SELECT * FROM `cart` WHERE uname={$_SESSION['uname']} and status=1;");
            while($records6=mysqli_fetch_array($sql6)){
            
            $sql7=mysqli_query($con,"select * from items where item_id=$item_id and status=1;");
            while($records7=mysqli_fetch_array($sql7)){
            
            $item_id=$records6['item_id'];
            echo "id=$item_id";
            $gl_cart_qty=$records6['qty'];
            echo "qty=$gl_cart_qty";
            $gl_cart_total=$records6['total_price'];
            echo "price=$gl_cart_total";
            $uname=$_SESSION['uname'];
            //while($count>0){
            $sql4="INSERT INTO `payment`(`uname`, `w_id`, `item_id`,`qty`, `amount`,`status`) VALUES"
                    . "($uname,$wal_id,$item_id,$gl_cart_qty,$gl_cart_total,1);";
            $exc=mysqli_query($con,$sql4);
            $sql8="INSERT INTO `purchase`(`uname`, `item_id`,`qty`,`status`) "
                    . "VALUES($uname,$item_id,$gl_cart_qty,1);";
            $exc1=mysqli_query($con,$sql8);
            
            $sql8="update cart set status=0 where uname=$uname and status=1 and item_id=$item_id";
            $result= mysqli_query($con, $sql8);
            
            $item_stock=$records7['stock'];
            $new_stock=$item_stock-$gl_cart_qty;
            $sql10="update `items` SET `stock`=$new_stock  WHERE status=1 and item_id=$item_id"; 
            $result10= mysqli_query($con, $sql10);
//                $count=$count-1;
//            }
        }
        }
        echo "<script>"
        . "window.location='buy.php';"
        . "</script>";
        $new_bal=$bal-$tot_price;
        $sql9="UPDATE `wallet` SET `balance`=$new_bal WHERE uname=$uname and status=1";
            $result9= mysqli_query($con, $sql9);
            
        $sql10=mysqli_query($con,"select * from `wallet` WHERE uname=11111 and status=1");
        $records10=mysqli_fetch_array($sql10);
            $admin_bal=$records10['balance'];
            $admin_new_bal=$admin_bal + $tot_price;
           
            $sql11="UPDATE `wallet` SET `balance`=$admin_new_bal WHERE uname=11111 and status=1";
            $result11= mysqli_query($con, $sql11);
            } 
            }
    
    ?></html>