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
            function catName(){
                var gl_category_name= document.gl_add_cate_form.gl_category_name.value;
                if((gl_category_name===null)||(gl_category_name.length<3)){
                    document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
                    alert("Enter Valid Category Name");
                    document.gl_add_cate_form.gl_category_name.focus();
                    return false;
                }
//                var fnam=/^[a-zA-Z ]{4,25}$/;
//                if(document.gl_add_cate_form.gl_category_name.value.search(fnam)==-1)
//                {
//                      alert("Enter correct  Name");
//                      document.gl_add_cate_form.gl_category_name.focus();
//                      document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
//                      return false;
//                
//                }
                if((gl_category_name.length>25)){
                    document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_add_cate_form.gl_category_name.focus();
                    return false;
                }
            }
            
            function  addCategory(){
                var gl_category_name= document.gl_add_cate_form.gl_category_name.value;
                if((gl_category_name===null)||(gl_category_name.length<3)){
                    document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
                    alert("Enter Valid Category Name");
                    document.gl_add_cate_form.gl_category_name.focus();
                    return false;
                }
//                var fnam=/^[a-zA-Z ]{4,25}$/;
//                if(document.gl_add_cate_form.gl_category_name.value.search(fnam)==-1)
//                {
//                      alert("Enter correct  Name");
//                      document.gl_add_cate_form.gl_category_name.focus();
//                      document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
//                      return false;
//                
//                }
                if((gl_category_name.length>25)){
                    document.gl_add_cate_form.gl_category_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_add_cate_form.gl_category_name.focus();
                    return false;
                }
            }
        </script>
</head>

<body style="background-color: #4c4c4c;">
    <?php
        if($_SESSION['utype']==='A'){
               
        if(isset($_POST["gl_categoty_addbtn"])){
            $c_name= htmlspecialchars($_POST['gl_category_name']);

            $picfile= "Category/".time()."".htmlspecialchars($_FILES['gl_category_pic']['name']);
        //                echo "$picfile";
            move_uploaded_file($_FILES['gl_category_pic']['tmp_name'], $picfile);
            
            $imageFileType = pathinfo($picfile,PATHINFO_EXTENSION);
            //echo $imageFileType;
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
                    
                }
            else{

                $sql1="insert into category (c_name,img,status)"
                    . "values(LOWER('$c_name'),'$picfile',1);";

                if (mysqli_query($con,$sql1) > 0){

                    echo "<script> alert('Added'); </script>";
                }

                else{
                    echo "<script> alert ('Category Already Exists !'); </script>";
                }
            }
        }
        }
        else{
            ?>
            <script>
                window.location.href="location:login.php";
            </script>
        <?php
        }
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
                                                     <li class="active">Add Category</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <center>
                        
                            <div class="form-style-5" style="border:2px solid cyan;">
                                <form class="gl_add_cate_form" action="addcategory.php" name="gl_add_cate_form" method="POST" onsubmit="return addCategory()" enctype="multipart/form-data" >
                                    <fieldset>
                                        <legend><span class="number">.</span> Add Category</legend>
                                        <input type="text" placeholder="Category Name" name="gl_category_name"  id="gl_category_name" required onChange="return catName()"/>
                                        <input type="file" placeholder="Category Image" name="gl_category_pic"  id="gl_category_pic" required>
                                    </fieldset>
                                    <div class="gl_category_clearfix">
                                        <input type="submit" class="gl_categoty_addbtn" name="gl_categoty_addbtn" id="gl_categoty_addbtn"  value="ADD" />
                                    </div>
                                </form>
                            </div>
                    </center>
                   
                        <?php
                            $result =mysqli_query($con,"SELECT `category_id`, `c_name`, `img`, `status` FROM `category` where status=1 order by c_name;");
                        ?>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                    
                    <div class="table-users">
                        <div class="header">Categories</div>

                        <table cellspacing="0" id="myTable">
                           
                           <tr>
                              <th>Picture</th>
                              <th>Category Name</th>
                          
                           </tr>
                            <?php
                                while (($t=mysqli_fetch_array($result))){
                            ?>
                           <tr>
                              <td><img src="<?php echo $t['img']; ?>" alt="" /></td>
                              <td><?php  echo ucfirst($t['c_name']);  ?></td>
                              
                           </tr>
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