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
        function gName(){
//            var fnam=/^[a-zA-Z ]{2,25}$/;
//                if(document.gl_item_add_form.gl_item_name.value.search(fnam)==-1)
//                 {
//                      alert("Enter correct  Item Name");
//                      document.gl_item_add_form.gl_item_name.focus();
//                      
//                      return false;
//                    }
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
//                var fnam=/^[a-zA-Z ]{4,25}$/;
//                if(document.gl_item_add_form.gl_item_name.value.search(fnam)==-1)
//                 {
//                      alert("Enter correct  Item Name");
//                      document.gl_item_add_form.gl_item_name.focus();
//                      
//                      return false;
//                    }
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

<body style="background-color: #4c4c4c;">
    <?php
         if(isset($_POST["gl_sub_categoty_addbtn"])){
            $category_id= htmlspecialchars($_POST['gl_sub_category_category']);
            $sub_cname=htmlspecialchars($_POST['gl_sub_category_name']); 
            $picfile= "Subcategory/".time()."".htmlspecialchars($_FILES['gl_sub_category_pic']['name']);
//                echo "$picfile";
            move_uploaded_file($_FILES['gl_sub_category_pic']['tmp_name'], $picfile);
            
            $imageFileType = pathinfo($picfile,PATHINFO_EXTENSION);
            //echo $imageFileType;
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
                    
            }
            else{

                $sql1="insert into subcategory (category_id,sub_cname,img,status)"
                        . "values($category_id,LOWER('$sub_cname'),'$picfile',1);";

                if (mysqli_query($con,$sql1) > 0){

                    echo "<script> alert('Success'); </script>";
                }
                else{
                        echo "<script> alert ('Sub Category Already Exists !'); </script>";
                    }
            }
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
                                                     <li class="active">Add Item</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <center>
                        
                            <div class="form-style-5" style="border:2px solid cyan;">
                                <form class="gl_add_item_form" name="gl_item_add_form" action="#" method="POST"  onsubmit="return addItem()" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend><span class="number">.</span> Add Items</legend>
                                         <input type="text" placeholder="Item Name" name="gl_item_name"  id="gl_item_name" required onChange="return gName()">
                        <br/>
                        <!--<label>Select a Category</label><br/>-->
                        <select name="gl_item_category" id="gl_item_category" required>
                            <?php
                                $sql="Select category_id,c_name from category Order By c_name;";
                                $rset=mysqli_query($con,$sql);
                                $records=mysqli_fetch_array($sql);
                                echo "<option value=''>Select a Category</option>";
                                foreach($rset as $records){
                                    
                                    echo "<option value='{$records["category_id"]}'>{$records["c_name"]}  </option>";
                                    
                                }
                             ?>
                           
                        </select>
                        <br/>
                        <!--<label>Select a Sub Category</label><br/>-->
                        <select name="gl_item_sub_category" id="gl_item_sub_category" required="">
                           
                        </select>
                        <br/>
                        <!--<label>Price</label><br/>-->
                        <input type="number" placeholder="Price" name="gl_item_price" min="1"  id="gl_item_price" required onChange="return gPrice()">
                        <br/>
                        <!--<label>Number of Items</label><br/>-->
                        <input type="number" placeholder="Number of Items" name="gl__item_no" min="1"  id="gl__item_no" required onChange="return gStock()">
                        <br/>
                                                                      
                        <textarea  name="gl_item_description" id="gl_item_description" width="30" height="5" required  placeholder="Description" onChange="return gDes()"></textarea>
                        <br/>
                        
                        <input type="file" placeholder="Item Image" name="gl_item_pic"  id="gl_item_pic" required>
                        <br/>  
                        
                                    </fieldset>
                                    <div class="gl_category_clearfix">
                                        <input type="submit" class="gl_item_addbtn" name="gl_item_addbtn" id="gl_item_addbtn" value="Save"/>
                                    </div>
                                </form>
                            </div>
                    </center>
                   
                        <?php
                             $result =mysqli_query($con,"SELECT `item_id`, `item_name`, `subcategory_id`, `price`, `stock`, `description`, `img`, `category_id`, `offer_price`, `status` FROM `items` where status=1 order by item_name;");
                        ?>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                    
                    <div class="table-users">
                        <div class="header">Items</div>

                        <table cellspacing="0" id="myTable">
                           
                            <tr>
                                 <th>Picture</th>
                                 <th>Item Name</th>
                                 <th>Price</th>
                                 <th>Stock</th>
                                 <th>Description</th>

                            </tr>
                            <?php
                                while (($t=mysqli_fetch_array($result))){
                            ?>
                           <tr>
                              <tr>
                                    <td><img src="<?php echo $t['img']; ?>" alt=""  /></td>
                                    <td><b><?php  echo ucfirst($t['item_name']);  ?></b> </td>
                                    <td><b><?php  echo $t['price'];  ?></b> </td>
                                    <td><b><?php  echo $t['stock'];  ?></b> </td>
                                    <td><b><?php  echo $t['description'];  ?></b> </td>
                                </tr>
                              
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

</body>
    
<script src="js/jqueryori.min.js"></script>
    <script>
        $('body').on('change', '#gl_item_category', function () {
            $additem = $('#gl_item_category').val();
            $.ajax({type:'post',url:''});
            $.ajax({
            type:'post',
                    url:'get_state.php',
                    data:{additem:$additem},
                    success:function(response)
                    {
                    //console.log(response);
                    $ar = response.split(",");
                            $str = "";
                            for (var i = 0; i < $ar.length; i++)
                    {
                    $str += '<option>' + $ar[i] + "</option>";
                    }
                    $('#gl_item_sub_category').html($str);
                }
                    });
        });


    </script>
    <?php
        if(isset($_POST["gl_item_addbtn"])){
            $gl_item_name= htmlspecialchars($_POST['gl_item_name']);
            $gl_item_category=htmlspecialchars($_POST['gl_item_category']);
            $gl_item_sub_category=htmlspecialchars($_POST['gl_item_sub_category']); 
            $gl_item_price=htmlspecialchars($_POST['gl_item_price']);
            $gl__item_no=htmlspecialchars($_POST['gl__item_no']);
            $gl_item_description=htmlspecialchars($_POST['gl_item_description']);
            
            $q = mysqli_query($con, "SELECT `subcategory_id`,`sub_cname` FROM `subcategory` WHERE `sub_cname`='" . $gl_item_sub_category . "' and status=1");
            $row = mysqli_fetch_array($q);
            $sub_cate_id=$row['subcategory_id'];
            //echo $sub_cate_id;
            
            $picfile= "Items/".time()."".htmlspecialchars($_FILES['gl_item_pic']['name']);
//                echo "$picfile";
            move_uploaded_file($_FILES['gl_item_pic']['tmp_name'], $picfile);
            
            $imageFileType = pathinfo($picfile,PATHINFO_EXTENSION);
            //echo $imageFileType;
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
                    
            }
            else{
            
                $sql1="INSERT INTO `items`(`item_name`, `subcategory_id`, `price`, `stock`, `description`, `img`, `category_id`, `offer_price`, `status`)"
                        . "values(LOWER('$gl_item_name'),'$sub_cate_id',$gl_item_price,$gl__item_no,'$gl_item_description','$picfile',$gl_item_category,0,1);";
                //var_dump($sql1);
                if (mysqli_query($con,$sql1) > 0){
                ?>
                    <script> 
                        alert('Success'); 
                        window.location.href="additem.php";
                    </script>
                <?php   
                }
                else{
                        echo "<script> alert ('Item Already Exists !'); </script>";
                    }
            }
        }
    ?>
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
</html>