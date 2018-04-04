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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .buy_visibility{
                visibility: hidden;
            }
        </style>
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
        
select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: 2px solid cyan;
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
.form-style-5 select:focus{
    background: #d2d9dd;
}
select{
    -webkit-appearance: menulist-button;
    height:35px;
}
    </style>
 
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
                                                    <li class="active"><a href="orderdetails.php">Items</a></li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">
                <?php
                    if($_SESSION['utype']==='A' || $_SESSION['utype']==='T' ){
                           
                ?>
                    <center><b>FIND AN ITEM</b>
                    <br><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    <select name="category_name" id="category_name" style="width:20%;align-content: flex-start;">
                        <option value="">Category</option>
                            <?php
                                $query = "SELECT * FROM category where status=1";
                                $results = mysqli_query($con, $query);
                                foreach ($results as $records) {
                            ?>
                            <option value="<?php echo $records["category_id"]; ?>"> <?php echo ucfirst($records["c_name"]); ?></option>

                                <?php
                                   }
                                ?>
                    </select>
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            <select name="subcategory" id="subcategory" style="width:20%;align-content: flex-start;">
                                <option value=" ">Subcategory</option>
                            </select>
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            <select name="item" id="item" style="width:20%;align-content: flex-start;">
                                 <option value=" ">Items</option>
                            </select>
                            &nbsp&nbsp&nbsp&nbsp&nbsp

                            <button class="gl_item_addbtn"  type="submit" name="submit" id='load_pic' style="width:20%;" >Go</button>


                    <div id='item_img'>
                    </div>
                <!--<a href="item_edit.php"><input type="button" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #FFFFC0; border: 3pt ridge lightgrey" value="Edit" name="buy"  id="buy"  class="buy_visibility"></a>-->
                    <script src="js/jquery.min.js"></script>
                    <script>

                    $('#category_name').on('change', function(){
                       $category_id = $(this).val();
                       //alert($category_id);
                       $.ajax({
                         type: "POST",
                         url: "getdata.php",
                         data: "category_id="+$category_id,
                         success: function(data){
                           $("#subcategory").html(data);
                           // alert(data);

                     }
                     });
                  });

                  $('#subcategory').on('change', function(){
                       $subcategory_id = $('#subcategory').val();
                       //alert($subcategory_id);
                       $.ajax({
                         type: "POST",
                         url: "getdata2.php",
                         data: "subcategory_id="+$subcategory_id,
                         success: function(data){
                           $("#item").html(data);

                     }
                     });
                  });

                  //loads pic on cat_list change
                  $('#load_pic').on('click', function(){
                       $item_id = $('#item').val();
                       if($.isNumeric($item_id))
                       {
                         $.ajax({
                           type: "POST",
                           url: "getpic.php",
                           data: "item_id="+$item_id,
                           success: function(data){
                           //  alert(data);
                             $("#item_img").html(data);

                       }
                       });
                       $('#buy').toggleClass('buy_visibility');
                       }
                       else {
                         alert('No item found');
                       }
                       // alert($spare_id);
                  });






               </script>
               </center>
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
</html>