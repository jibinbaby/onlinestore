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
.form-style-5 input[type="phone"],
.form-style-5 input[type="password"],
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
.form-style-5 input[type="phone"]:focus,
.form-style-5 input[type="password"]:focus,
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
            function asName(){
                var gl_as_name= document.gl_add_staff_form.gl_as_name.value;
                if((gl_as_name===null)||(gl_as_name.length<5)){
                    document.gl_add_staff_form.gl_as_name.style.border = "1px solid red";
                    alert("Enter Full Name");
                    document.gl_add_staff_form.gl_as_name.focus();
                    return false;
                }
                var fnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_add_staff_form.gl_as_name.value.search(fnam)==-1)
                 {
                      alert("Enter correct  Name");
                      document.gl_add_staff_form.gl_as_name.focus();
                      document.gl_add_staff_form.gl_as_name.style.border = "1px solid red";
                      return false;
                    }
                if((gl_as_name.length>25)){
                    document.gl_add_staff_form.gl_as_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_add_staff_form.gl_as_name.focus();
                    return false;
                }
            }
            function asEmail(){
                var gl_as_email=document.gl_add_staff_form.gl_as_email.value;
                var atpos = gl_as_email.indexOf("@");
                var dotpos = gl_as_email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>gl_as_email.length)){
                    document.gl_add_staff_form.gl_as_email.style.border = "1px solid red";
                    document.gl_add_staff_form.gl_as_email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
            }
            function asPhone(){
                var gl_as_num=document.gl_add_staff_form.gl_as_num.value;
                if(isNaN(gl_as_num)){
                    document.gl_add_staff_form.gl_as_num.style.border = "1px solid red";
                    alert("Phone Number Only Contain Digits");
                    document.gl_add_staff_form.gl_as_num.focus();
                    return false;
                }
                if(gl_as_num.length !== 10){
                    document.gl_add_staff_form.gl_as_num.style.border = "1px solid red";
                    alert("Phone Number must be 10 Digits");
                    document.gl_add_staff_form.gl_as_num.focus();
                    return false;
                }
                 var ph=/^([7-9]{1})([0-9]{9})$/;
                if(document.gl_add_staff_form.gl_as_num.value.search(ph)==-1)
                 {
                      alert("Enter a Valid Number");
                      document.gl_add_staff_form.gl_as_num.focus();
                      return false;
                }
                
            }
            function asAdhar(){
                var gl_as_adhar=document.gl_add_staff_form.gl_as_adhar.value;
                 var ad=/^([1-9]{1})([0-9]{11})$/;
                if(document.gl_add_staff_form.gl_as_adhar.value.search(ad)==-1)
                 {
                      alert("Enter a Valid Adhar Number");
                      document.gl_add_staff_form.gl_as_adhar.focus();
                      return false;
                }
                if(isNaN(gl_as_adhar)){
                    document.gl_add_staff_form.gl_as_adhar.style.border = "1px solid red";
                    alert("Adhar Number Only Contain Digits");
                    document.gl_add_staff_form.gl_as_adhar.focus();
                    return false;
                }
                if(gl_as_adhar.length !== 12){
                    document.gl_add_staff_form.gl_as_adhar.style.border = "1px solid red";
                    alert("Adhar Number Must Contain 12 Numbers");
                    document.gl_add_staff_form.gl_as_adhar.focus();
                    return false;
                }
                if(gl_edt_adhar <100000000000){
                    document.gl_add_staff_form.gl_as_adhar.style.border = "1px solid red";
                    alert("Enter a Valid Adhar Number");
                    document.gl_add_staff_form.gl_as_adhar.focus();
                    return false;
                }
            }
            function asID(){
                
                var id1=/^([1-9]{1})/;
                if(document.gl_add_staff_form.gl_as_id.value.search(id1)==-1)
                 {
                      alert("Enter a Valid ID");
                      document.gl_add_staff_form.gl_as_adhar.focus();
                      return false;
                }
                
                var gl_as_id=document.gl_add_staff_form.gl_as_id.value;
                if(gl_as_id.length<4){
                    document.gl_add_staff_form.gl_as_id.style.border = "1px solid red";
                    alert("Staff ID Must Be 4 characters Long");
                    document.gl_add_staff_form.gl_as_id.focus();
                    return false;
                }
                if(isNaN(gl_as_id)){
                    document.gl_add_staff_form.gl_as_id.style.border = "1px solid red";
                    alert("Staff ID Only Contain Digits");
                    document.gl_add_staff_form.gl_as_id.focus();
                    return false;
                }
            }
            function asPwd(){
                var gl_as_pwd= document.gl_add_staff_form.gl_as_pwd.value;
                var gl_as_cpwd=document.gl_add_staff_form.gl_as_cpwd.value;
                if(gl_as_pwd.length < 4 ){
                    document.gl_add_staff_form.gl_as_pwd.style.border = "1px solid red";
                    document.gl_add_staff_form.gl_as_pwd.focus();
                    alert("Password Should contain atleast 4 characters");
                    return false;
                }
                if(gl_as_pwd !== gl_as_cpwd){
                    document.gl_add_staff_form.gl_as_cpwd.style.border = "1px solid red";
                    document.gl_add_staff_form.gl_as_cpwd.focus();
                    alert("Mismatching Passwords");
                    return false;
                }
            }
            
            
            
            function  addStaff(){
                var gl_as_name= document.gl_add_staff_form.gl_as_name.value;
                if((gl_as_name===null)||(gl_as_name.length<5)){
                    document.gl_add_staff_form.gl_as_name.style.border = "1px solid red";
                    alert("Enter Full Name");
                    document.gl_add_staff_form.gl_as_name.focus();
                    return false;
                }
                var fnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_add_staff_form.gl_as_name.value.search(fnam)==-1)
                 {
                      alert("Enter correct  Name");
                      document.gl_add_staff_form.gl_as_name.focus();
                      document.gl_add_staff_form.gl_as_name.style.border = "1px solid red";
                      return false;
                    }
                if((gl_as_name.length>25)){
                    document.gl_add_staff_form.gl_as_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_add_staff_form.gl_as_name.focus();
                    return false;
                }
                
                
                
                var gl_as_num=document.gl_add_staff_form.gl_as_num.value;
                if(isNaN(gl_as_num)){
                    document.gl_add_staff_form.gl_as_num.style.border = "1px solid red";
                    alert("Phone Number Only Contain Digits");
                    document.gl_add_staff_form.gl_as_num.focus();
                    return false;
                }
                if(gl_as_num.length !== 10){
                    document.gl_add_staff_form.gl_as_num.style.border = "1px solid red";
                    alert("Phone Number must be 10 Digits");
                    document.gl_add_staff_form.gl_as_num.focus();
                    return false;
                } 
                var ph=/^([7-9]{1})([0-9]{9})$/;
                if(document.gl_add_staff_form.gl_as_num.value.search(ph)==-1)
                 {
                      alert("Enter a Valid Number");
                      document.gl_add_staff_form.gl_as_num.focus();
                      return false;
                }
                
                var gl_as_adhar=document.gl_add_staff_form.gl_as_adhar.value;
                if(isNaN(gl_as_adhar)){
                    document.gl_add_staff_form.gl_as_adhar.style.border = "1px solid red";
                    alert("Adhar Number Only Contain Digits");
                    document.gl_add_staff_form.gl_as_adhar.focus();
                    return false;
                }
                var ad=/^([1-9]{1})([0-9]{11})$/;
                if(document.gl_add_staff_form.gl_as_adhar.value.search(ad)==-1)
                 {
                      alert("Enter a Valid Adhar Number");
                      document.gl_add_staff_form.gl_as_adhar.focus();
                      return false;
                }
                if(gl_as_adhar.length !== 12){
                    document.gl_add_staff_form.gl_as_adhar.style.border = "1px solid red";
                    alert("Adhar Number Must Contain 12 Numbers");
                    document.gl_add_staff_form.gl_as_adhar.focus();
                    return false;
                }
                if(gl_edt_adhar <100000000000){
                    document.gl_add_staff_form.gl_as_adhar.style.border = "1px solid red";
                    alert("Enter a Valid Adhar Number");
                    document.gl_add_staff_form.gl_as_adhar.focus();
                    return false;
                }
                
                
                var gl_as_id=document.gl_add_staff_form.gl_as_id.value;
                if(gl_as_id.length<4){
                    document.gl_add_staff_form.gl_as_id.style.border = "1px solid red";
                    alert("Admission Number Must Be 4 characters Long");
                    document.gl_add_staff_form.gl_as_id.focus();
                    return false;
                }
                if(isNaN(gl_as_id)){
                    document.gl_add_staff_form.gl_as_id.style.border = "1px solid red";
                    alert("Admission Number Only Contain Digits");
                    document.gl_add_staff_form.gl_as_id.focus();
                    return false;
                }
                
                
                var gl_as_email=document.gl_add_staff_form.gl_as_email.value;
                var atpos = gl_as_email.indexOf("@");
                var dotpos = gl_as_email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>gl_as_email.length)){
                    document.gl_add_staff_form.gl_as_email.style.border = "1px solid red";
                    document.gl_add_staff_form.gl_as_email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
                
                var gl_as_pwd= document.gl_add_staff_form.gl_as_pwd.value;
                var gl_as_cpwd=document.gl_add_staff_form.gl_as_cpwd.value;
                
                
                if(gl_as_pwd.length < 4 ){
                    document.gl_add_staff_form.gl_as_pwd.style.border = "1px solid red";
                    document.gl_add_staff_form.gl_as_pwd.focus();
                    alert("Password Should contain atleast 4 characters");
                    return false;
                }
                if(gl_as_pwd !== gl_as_cpwd){
                    document.gl_add_staff_form.gl_as_cpwd.style.border = "1px solid red";
                    document.gl_add_staff_form.gl_as_cpwd.focus();
                    alert("Mismatching Passwords");
                    return false;
                }
                var fpwd1=/^[a-z0-9]{4,25}$/;
                if(document.gl_add_staff_form.gl_as_pwd.value.search(fpwd1)==-1)
                 {
                      alert("Lowercase Letters,numbers(0-9) are allowed,Password Should not exceed 25 Characters");
                      document.gl_add_staff_form.gl_as_pwd.focus();
                      
                      return false;
                }
            }
        
        </script>
</head>

<body style="background-color: #4c4c4c;">
    <?php
        function encryptIt($q){
                $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
                $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
                return( $qEncoded );
            }
            if(isset($_POST["gl_as_signupbtn"])){
                $name= htmlspecialchars($_POST['gl_as_name']);
//                $utype= htmlspecialchars($_POST['gl_reg_utype']);
//                $dept= htmlspecialchars($_POST['gl_reg_dept']);
                $gender= htmlspecialchars($_POST['gl_as_gender']);
                $email= htmlspecialchars($_POST['gl_as_email']);
                $pno= htmlspecialchars($_POST['gl_as_num']);
                $adharno= htmlspecialchars($_POST['gl_as_adhar']);
                $id= htmlspecialchars($_POST['gl_as_id']);
                $pw= htmlspecialchars($_POST['gl_as_pwd']);
                
                $pwd = encryptIt($pw);

                $picfile= "profile/".time()."".htmlspecialchars($_FILES['gl_as_picname']['name']);
    //                echo "$picfile";
                move_uploaded_file($_FILES['gl_as_picname']['tmp_name'], $picfile);
                $imageFileType = pathinfo($picfile,PATHINFO_EXTENSION);
                //echo $imageFileType;
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
                    
                }
                else{

                $sql1="insert into user (uname,name,department,email,phone,adhar,gender,pic,status)"
                        . "values('$id','$name','Store Staff',"
                        . "'$email',$pno,'$adharno','$gender','$picfile',1);";

                $sql2="insert into login (uname,password,utype,status)"
                        . "values('$id','$pwd','T',1);";
    //                echo $sql1;
    //                echo $sql2;
                    if (mysqli_query($con,$sql1) > 0){
                    if (mysqli_query($con,$sql2) > 0){
                        echo "<script> alert('Success'); </script>";
                        ?>
                        <script>
				window.location="addstaff.php";
			</script>
                    <?php
                        
                    }
                    }
                    else{
                            echo "<script> alert ('Staff ID Already Exists !'); </script>";
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
                                                     <li class="active">Add Staff</li>
					  
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <center>
                        
                            <div class="form-style-5" style="border:2px solid cyan;">
                                 <form class="gl_add_staff_form" id="gl_add_staff_form" name="gl_add_staff_form" action="addstaff.php" method="POST"  onsubmit="return addStaff()" enctype="multipart/form-data" >
                                    <fieldset>
                                        <legend><span class="number">.</span> Add Staff</legend>
                                         <input type="text" placeholder="Enter Name" name="gl_as_name"  id="gl_as_name" required onChange="return asName()">
                        <br/>
                        
                        <select name="gl_as_gender" id="gl_as_gender" required>
                            <option value="">Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="t">Transgender</option>
                        </select>
                        <br/>
                        
                        <input type="email" placeholder="Email" name="gl_as_email" id="gl_as_email" required onChange="return asEmail()">
                        <br/>
                        
                        <input type="phone" placeholder="Phone Number" name="gl_as_num"  id="gl_as_num" required onChange="return asPhone()">
                        <br/>
                        
                        <input type="text" placeholder="Adhar Number" name="gl_as_adhar"  id="gl_as_adhar" required onChange="return asAdhar()">
                        <br/>
                        
                        <input type="text" placeholder="Staff ID" name="gl_as_id"  id="gl_as_id" required required onChange="return asID()" >
                        <br/>
                        
                        <input type="password" placeholder="Password" name="gl_as_pwd"  id="gl_as_pwd" required>
                        <br/>
                        
                        <input type="password" placeholder="Confirm Password" name="gl_as_cpwd"  id="gl_as_cpwd" required onChange="return asPwd()">
                        <br/>
                        
                        <input type="file" id="gl_as_picname" name="gl_as_picname" placeholder="Upload Profile Pic" required />
                        <br/>
                        <br/>
                        
                        
                            <div class="gl_reg_clearfix">
                                
                                <input type="submit" name="gl_as_signupbtn" class="gl_reg_signupbtn" id="gl_as_signupbtn"  value="ADD STAFF">
                            </div>
                                </form>
                            </div>
                    </center>
                   
                    
					
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
</html>