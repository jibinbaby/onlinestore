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
        
        <style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: #f4f7f8;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: #1abc9c;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #109177;
}
</style>
        <script>
        function gName(){
            var fnam=/^[a-zA-Z ]{2,25}$/;
                if(document.gl_item_add_form.gl_item_name.value.search(fnam)==-1)
                 {
                      alert("Enter correct  Item Name");
                      document.gl_item_add_form.gl_item_name.focus();
                      
                      return false;
                    }
                var gl_item_name= document.gl_item_add_form.gl_item_name.value;
                if((gl_item_name===null)||(gl_item_name.length<2)){
                    document.gl_item_add_form.gl_item_name.style.border = "1px solid red";
                    alert("Enter Full Item Name");
                    document.gl_item_add_form.gl_item_name.focus();
                    return false;
                }
                if((gl_item_name.length>25)){
                    document.gl_item_add_form.gl_item_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_item_add_form.gl_item_name.focus();
                    return false;
                }
        }
        function gPrice(){
            var gl_item_price=document.gl_item_add_form.gl_item_price.value;
                if(isNaN(gl_item_price)){
                    document.gl_item_add_form.gl_item_price.style.border = "1px solid red";
                    alert("Price Only Contain Digits");
                    document.gl_item_add_form.gl_item_price.focus();
                    return false;
                }
                if(gl_item_price > 100001){
                    document.gl_item_add_form.gl_item_price.style.border = "1px solid red";
                    alert("Price Can't Exceed One Lakh");
                    document.gl_item_add_form.gl_item_price.focus();
                    return false;
                }
        }
        function gStock(){
            var gl__item_no=document.gl_item_add_form.gl__item_no.value;
                if(isNaN(gl__item_no)){
                    document.gl_item_add_form.gl__item_no.style.border = "1px solid red";
                    alert("Number of Stocks Only Digits");
                    document.gl_item_add_form.gl__item_no.focus();
                    return false;
                }
                
        }
        function gDes(){
            var gl_item_description= document.gl_item_add_form.gl_item_description.value;
                if((gl_item_description===null)||(gl_item_description.length<10)){
                    document.gl_item_add_form.gl_item_description.style.border = "1px solid red";
                    alert("Enter Full description");
                    document.gl_item_add_form.gl_item_description.focus();
                    return false;
                }
                if((gl_item_description.length>200)){
                    document.gl_item_add_form.gl_item_description.style.border = "1px solid red";
                    alert("Description Must Not Exceed 200 Characters");
                    document.gl_item_add_form.gl_item_description.focus();
                    return false;
                }
        }
            
            
        function  addItem(){
                var fnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_item_add_form.gl_item_name.value.search(fnam)==-1)
                 {
                      alert("Enter correct  Item Name");
                      document.gl_item_add_form.gl_item_name.focus();
                      
                      return false;
                    }
                var gl_item_name= document.gl_item_add_form.gl_item_name.value;
                if((gl_item_name===null)||(gl_item_name.length<3)){
                    document.gl_item_add_form.gl_item_name.style.border = "1px solid red";
                    alert("Enter Full Item Name");
                    document.gl_item_add_form.gl_item_name.focus();
                    return false;
                }
                if((gl_item_name.length>25)){
                    document.gl_item_add_form.gl_item_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_item_add_form.gl_item_name.focus();
                    return false;
                }
                
                var gl_item_price=document.gl_item_add_form.gl_item_price.value;
                if(isNaN(gl_item_price)){
                    document.gl_item_add_form.gl_item_price.style.border = "1px solid red";
                    alert("Price Only Contain Digits");
                    document.gl_item_add_form.gl_item_price.focus();
                    return false;
                }
                if(gl_item_price > 100001){
                    document.gl_item_add_form.gl_item_price.style.border = "1px solid red";
                    alert("Price Can't Exceed One Lakh");
                    document.gl_item_add_form.gl_item_price.focus();
                    return false;
                }
                
                var gl__item_no=document.gl_item_add_form.gl__item_no.value;
                if(isNaN(gl__item_no)){
                    document.gl_item_add_form.gl__item_no.style.border = "1px solid red";
                    alert("Number of Stocks Only Digits");
                    document.gl_item_add_form.gl__item_no.focus();
                    return false;
                }
                var gl_item_description= document.gl_item_add_form.gl_item_description.value;
                if((gl_item_description===null)||(gl_item_description.length<10)){
                    document.gl_item_add_form.gl_item_description.style.border = "1px solid red";
                    alert("Enter Full description");
                    document.gl_item_add_form.gl_item_description.focus();
                    return false;
                }
                if((gl_item_description.length>200)){
                    document.gl_item_add_form.gl_item_description.style.border = "1px solid red";
                    alert("Description Must Not Exceed 200 Characters");
                    document.gl_item_add_form.gl_item_description.focus();
                    return false;
                }
                
            }
        </script>
</head>

<body>
    <?php
        if($_SESSION['utype']==='A' || $_SESSION['utype']==='T'){
            $id=$_REQUEST['item_id'];
            $sql2=mysqli_query($con,"SELECT `item_id`, `item_name`, `subcategory_id`,`price`, "
                    . "`stock`, `description`, `img`, `category_id`, `offer_price`, `status` FROM `items` where item_id=$id and status=1;");
            $records2= mysqli_fetch_array($sql2);
    ?>
    
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
                                <a href="orderdetails.php">Orders</a>
                            </li>
                            <li>
                                <a href="deliveredorderdetails.php">Delivered Orders</a>
                            </li>
                            <li>
                                <a href="payment_view.php">Payments</a>
                            </li>
                            <li>
                                <a href="viewtransactions.php">Transactions</a>
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
                                <a href="userdetails.php">Add User</a>
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
                                <a  href="addsubcategory.php">Subcategory</a>
                            </li>
                            <li>
                                <a class="active-menu" href="additem.php">Items</a>
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
                                                    <li><a href="shortitem.php">Shortage Items</a></li>
                                                     <li class="active">Edit Item</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <center>
                        
                            <div class="form-style-5" style="border:2px solid cyan;">
                                <form class="gl_add_item_form" name="gl_item_add_form" action="#" method="POST"  onsubmit="return addItem()" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend><span class="number">.</span> Edit Items</legend>
                                         <label>Item Name</label><br/>
                                        <input type="text" placeholder="Item Name" name="gl_item_name"  id="gl_item_name" required value="<?php echo ucfirst($records2['item_name']);?>" onChange="return gName()">
                                        <br/>
                                        <br/>
                                        <label>Price</label><br/>
                                        <input type="number" placeholder="Price" name="gl_item_price" min="1"  id="gl_item_price" required value="<?php echo $records2['price'];?>" onChange="return gPrice()">
                                        <br/>
                                        <label>Number of Items</label><br/>
                                        <input type="number" placeholder="Number of Items" name="gl__item_no" min="1"  id="gl__item_no" required value="<?php echo $records2['stock'];?>" onChange="return gStock()">
                                        <br/>
                                        <label>Description</label><br/>                                               
                                        <textarea  name="gl_item_description" id="gl_item_description" width="30" height="5" required onChange="return gDes()"><?php echo ucfirst($records2['description']);?></textarea>
                                       <br/>   
                        
                                    <div class="gl_item_clearfix">

                                        <input type="submit" class="gl_item_addbtn" name="gl_item_addbtn" id="gl_item_addbtn" value="Save"/>
                                    </div>
                                </form>
                            </div>
                    </center>
                                
                </div>
                    <?php
                        if(isset($_POST["gl_item_addbtn"])){
                            $gl_item_name= htmlspecialchars($_POST['gl_item_name']);

                            $gl_item_price=htmlspecialchars($_POST['gl_item_price']);
                            $gl__item_no=htmlspecialchars($_POST['gl__item_no']);
                            $gl_item_description=htmlspecialchars($_POST['gl_item_description']);


                            $sql1="UPDATE `items` SET `item_name`='$gl_item_name',`price`=$gl_item_price,"
                                    . "`stock`=$gl__item_no,`description`='$gl_item_description' where status=1 and item_id=$id;";

                            if (mysqli_query($con,$sql1) > 0){
                    ?>
                    <script>
                        window.location="shortitem.php";
                        alert("Updated");
                    </script>

                    <?php
                        }
                        else{
                            ?>
                            <script>
                                window.location="edititems1.php";
                                alert("OppZz Try Again !");
                            </script>

                    <?php
                                
                            }
                    }

                 }
                    else{
                       ?>
                            <script>
                                window.location="login.php";
                                
                            </script>

                    <?php
                    }
            ?>
                    
                   
					
	</div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
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