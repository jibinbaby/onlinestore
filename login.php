<!DOCTYPE html>
<html lang="en">
<?php
        include './conn.php';
        include './analyticstracking.php';  
        session_start();
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
        
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
        <script src='https://www.google.com/recaptcha/api.js'></script>
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="../../../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<script>
            function loginPwd(){
                var fpwd1=/^[a-z0-9]{4,25}$/;
                    if(document.frmLogin.lpwd.value.search(fpwd1)==-1)
                     {
                          alert("OoppZz.. Wrong Password");
                          document.frmLogin.lpwd.focus();

                          return false;
                    }
            }

            function gName(){

                    var fnam=/^[a-zA-Z ]{4,25}$/;
                    if(document.gl_reg_form.gl_reg_name.value.search(fnam)==-1)
                     {
                        alert("Enter correct  Name");
                        document.gl_reg_form.gl_reg_name.focus();

                        return false;
                    }


                    var gl_reg_name= document.gl_reg_form.gl_reg_name.value;
                    if((gl_reg_name===null)||(gl_reg_name.length<5)){

                        alert("Enter Full Name");
                        document.gl_reg_form.gl_reg_name.focus();
                        return false;
                    }

                    if((gl_reg_name.length>25)){

                        alert("Name Must Not Exceed 24 Characters");
                        document.gl_reg_form.gl_reg_name.focus();
                        return false;
                    }
            }
            function gEmail(){
                var gl_reg_email=document.gl_reg_form.gl_reg_email.value;
                    var atpos = gl_reg_email.indexOf("@");
                    var dotpos = gl_reg_email.lastIndexOf(".");
                    if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>gl_reg_email.length)){

                        document.gl_reg_form.gl_reg_email.focus();
                        alert("Enter a Valid Email Address");
                        return false;
                    }
            }
            function gPhone(){
                var ph=/^([7-9]{1})([0-9]{9})$/;
                if(document.gl_reg_form.gl_reg_num.value.search(ph)==-1)
                     {
                          alert("Enter a Valid Number");
                          document.gl_reg_form.gl_reg_num.focus();
                          return false;
                    }

                var gl_reg_num=document.gl_reg_form.gl_reg_num.value;
                    if(isNaN(gl_reg_num)){

                        alert("Phone Number Only Contain Digits");
                        document.gl_reg_form.gl_reg_num.focus();
                        return false;
                    }
                    if(gl_reg_num.length !== 10){
                        document.gl_reg_form.gl_reg_num.focus();
                        alert("Phone Number must be 10 Digits");

                        return false;
                    }
            }
            function gAdhar(){
                var gl_reg_adhar=document.gl_reg_form.gl_reg_adhar.value;
                    if(gl_reg_adhar.length !== 12){
                        document.gl_reg_form.gl_reg_adhar.style.border = "1px solid red";
                        alert("Adhar Number Must Contain 12 Numbers");
                        document.gl_reg_form.gl_reg_adhar.focus();
                        return false;
                    }
                    var ad=/^([1-9]{1})([0-9]{11})$/;
                    if(document.gl_reg_form.gl_reg_adhar.value.search(ad)==-1)
                     {
                          alert("Enter a Valid Adhar Number");
                          document.gl_reg_form.gl_reg_adhar.focus();
                          return false;
                    }
                    if(isNaN(gl_reg_adhar)){
                        document.gl_reg_form.gl_reg_adhar.style.border = "1px solid red";
                        alert("Adhar Number Only Contain Digits");
                        document.gl_reg_form.gl_reg_adhar.focus();
                        return false;
                    }
                    if(gl_edt_adhar <100000000000){
                        document.gl_reg_form.gl_reg_adhar.style.border = "1px solid red";
                        alert("Enter a Valid Adhar Number");
                        document.gl_reg_form.gl_reg_adhar.focus();
                        return false;
                    }
            }
            function gAdmNo(){
                var gl_reg_id=document.gl_reg_form.gl_reg_id.value;
                    if(gl_reg_id.length<4){
                        document.gl_reg_form.gl_reg_id.style.border = "1px solid red";
                        alert("Admission Number Must Be 4 characters Long");
                        document.gl_reg_form.gl_reg_id.focus();
                        return false;
                    }
                    if(gl_reg_id.length>5){
                        document.gl_reg_form.gl_reg_id.style.border = "1px solid red";
                        alert("Admission Number Must Not Exceed 5 characters");
                        document.gl_reg_form.gl_reg_id.focus();
                        return false;
                    }
                    if(isNaN(gl_reg_id)){
                        document.gl_reg_form.gl_reg_id.style.border = "1px solid red";
                        alert("Admission Number Only Contain Digits");
                        document.gl_reg_form.gl_reg_id.focus();
                        return false;
                    }
            }
            function gPwd(){
                var gl_reg_pwd= document.gl_reg_form.gl_reg_pwd.value;
                    var gl_reg_cpwd=document.gl_reg_form.gl_reg_cpwd.value;
                    if(gl_reg_pwd.length < 4 ){
                        document.gl_reg_form.gl_reg_pwd.style.border = "1px solid red";
                        document.gl_reg_form.gl_reg_pwd.focus();
                        alert("Password Should contain atleast 4 characters");
                        return false;
                    }
                    if(gl_reg_pwd !== gl_reg_cpwd){
                        document.gl_reg_form.gl_reg_cpwd.style.border = "1px solid red";
                        document.gl_reg_form.gl_reg_cpwd.focus();
                        alert("Mismatching Passwords");
                        return false;
                    }
            }


            function  addUser(){
                    var gl_reg_name= document.gl_reg_form.gl_reg_name.value;
                    if((gl_reg_name===null)||(gl_reg_name.length<5)){
                        document.gl_reg_form.gl_reg_name.style.border = "1px solid red";
                        alert("Enter Full Name");
                        document.gl_reg_form.gl_reg_name.focus();
                        return false;
                    }
                    var fnam=/^[a-zA-Z ]{4,25}$/;
                    if(document.gl_reg_form.gl_reg_name.value.search(fnam)==-1)
                     {
                          alert("Enter correct  Name");
                          document.gl_reg_form.gl_reg_name.focus();
                          document.gl_reg_form.gl_reg_name.style.border = "1px solid red";
                          return false;
                        }
                    if((gl_reg_name.length>25)){
                        document.gl_reg_form.gl_reg_name.style.border = "1px solid red";
                        alert("Name Must Not Exceed 24 Characters");
                        document.gl_reg_form.gl_reg_name.focus();
                        return false;
                    }
                     var ph=/^([7-9]{1})([0-9]{9})$/;
                    if(document.gl_reg_form.gl_reg_num.value.search(ph)==-1)
                     {
                          alert("Enter a Valid Number");
                          document.gl_reg_form.gl_reg_num.focus();
                          return false;
                    }
                    var gl_reg_num=document.gl_reg_form.gl_reg_num.value;
                    if(isNaN(gl_reg_num)){
                        document.gl_reg_form.gl_reg_num.style.border = "1px solid red";
                        alert("Phone Number Only Contain Digits");
                        document.gl_reg_form.gl_reg_num.focus();
                        return false;
                    }
                    if(gl_reg_num.length !== 10){
                        document.gl_reg_form.gl_reg_num.style.border = "1px solid red";
                        alert("Phone Number must be 10 Digits");
                        document.gl_reg_form.gl_reg_num.focus();
                        return false;
                    }
                    var ad=/^([1-9]{1})([0-9]{11})$/;
                    if(document.gl_reg_form.gl_reg_adhar.value.search(ad)==-1)
                     {
                          alert("Enter a Valid Adhar Number");
                          document.gl_reg_form.gl_reg_adhar.focus();
                          return false;
                    }
                    var gl_reg_adhar=document.gl_reg_form.gl_reg_adhar.value;
                    if(gl_reg_adhar.length !== 12){
                        document.gl_reg_form.gl_reg_adhar.style.border = "1px solid red";
                        alert("Adhar Number Must Contain 12 Numbers");
                        document.gl_reg_form.gl_reg_adhar.focus();
                        return false;
                    }
                    if(isNaN(gl_reg_adhar)){
                        document.gl_reg_form.gl_reg_adhar.style.border = "1px solid red";
                        alert("Adhar Number Only Contain Digits");
                        document.gl_reg_form.gl_reg_adhar.focus();
                        return false;
                    }
                    if(gl_edt_adhar <100000000000){
                        document.gl_reg_form.gl_reg_adhar.style.border = "1px solid red";
                        alert("Enter a Valid Adhar Number");
                        document.gl_reg_form.gl_reg_adhar.focus();
                        return false;
                    }

                    var gl_reg_id=document.gl_reg_form.gl_reg_id.value;
                    if(gl_reg_id.length<4){
                        document.gl_reg_form.gl_reg_id.style.border = "1px solid red";
                        alert("Admission Number Must Be 4 characters Long");
                        document.gl_reg_form.gl_reg_id.focus();
                        return false;
                    }
                    if(gl_reg_id.length>5){
                        document.gl_reg_form.gl_reg_id.style.border = "1px solid red";
                        alert("Admission Number Must Not Exceed 5 characters");
                        document.gl_reg_form.gl_reg_id.focus();
                        return false;
                    }
                    if(isNaN(gl_reg_id)){
                        document.gl_reg_form.gl_reg_id.style.border = "1px solid red";
                        alert("Admission Number Only Contain Digits");
                        document.gl_reg_form.gl_reg_id.focus();
                        return false;
                    }



                    var gl_reg_email=document.gl_reg_form.gl_reg_email.value;
                    var atpos = gl_reg_email.indexOf("@");
                    var dotpos = gl_reg_email.lastIndexOf(".");
                    if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>gl_reg_email.length)){

                        document.gl_reg_form.gl_reg_email.focus();
                        alert("Enter a Valid Email Address");
                        return false;
                    }


                    var gl_reg_pwd= document.gl_reg_form.gl_reg_pwd.value;
                    var gl_reg_cpwd=document.gl_reg_form.gl_reg_cpwd.value;


                    if(gl_reg_pwd.length < 4 ){
                        document.gl_reg_form.gl_reg_pwd.style.border = "1px solid red";
                        document.gl_reg_form.gl_reg_pwd.focus();
                        alert("Password Should contain atleast 4 characters");
                        return false;
                    }
                    if(gl_reg_pwd !== gl_reg_cpwd){
                        document.gl_reg_form.gl_reg_cpwd.style.border = "1px solid red";
                        document.gl_reg_form.gl_reg_cpwd.focus();
                        alert("Mismatching Passwords");
                        return false;
                    }
                    var fpwd=/^[a-z0-9]{4,25}$/;
                    if(document.gl_reg_form.gl_reg_pwd.value.search(fpwd)==-1)
                     {
                          alert("Lowercase Letters,numbers(0-9) are allowed,Password Should not exceed 25 Characters");
                          document.gl_reg_form.gl_reg_pwd.focus();

                          return false;
                    }
                }
        </script>
</head>
<body>
    <?php
        if(isset($_POST["gl_login_button"])){
            $uname= mysqli_real_escape_string($con,$_POST['llid']);
            $pw=mysqli_real_escape_string($con,$_POST['lpwd']);
                
            $p = encryptIt($pw);
                
            $sql3=mysqli_query($con,"SELECT  * FROM `login` where uname=$uname and password='$p' and status=1 ");
                if($row= mysqli_fetch_array($sql3)){
                    $secret = '6LeFukAUAAAAALkHqsLIG5bmglz_gWmYHiH7Kn0f';
                    $response =$_POST['g-recaptcha-response'];
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$response);
                    $response = json_decode($response, true);
                    if($response["success"] === true){

                    $_SESSION['uname']=$uname;
                    $_SESSION['utype']=$row['utype'];
                    
                    $sql4=mysqli_query($con,"SELECT  * FROM `user` where uname=$uname");
                    $row1= mysqli_fetch_array($sql4);
                    if($row1['status']==2){
                        echo "<script> alert('Waiting for Admin Approval')</script>";
                    }
                    else{
                        if(($_SESSION['utype'])=='S'){
                           
                            ?>
                                <script>
                                        window.location="userhome1.php";
                                </script>
        <?php
                        }else{
                        
        ?>
                        <script>
				window.location="userhome.php";
			</script>
        <?php
                        }
                }
                }
                
            else{
               // echo("actions if failed");
            echo "<script>if(confirm('Wrong CAPTCHA Code !!!!')){document.location.href='login.php'}else{document.location.href='index.php'};</script>";
            }
                }
                else{
                    echo "<script> alert('Invalid username/Password')</script>";
                }
        }
        ?>

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
						<li><a onclick="document.getElementById('id01').style.display='block'" >Register</a></li>
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
		
		
		<!-- MY ACCOUNT PAGE -->
		<section class="my_account parallax">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<div class="my_account_block clearfix">
					<div class="login">
                                            
                                            
						<h2>I'M ALREADY REGISTERED</h2>
                                                 <form id="frmLogin" method="POST" action="login.php" class="login_form" onsubmit="return loginPwd()"  name="frmLogin">
                                                        
                                                    <input type="text" name="llid" value="Username" style="width:100%;" onFocus="if (this.value == 'Username') this.value = '';" onBlur="if (this.value == '') this.value = 'Username';" />
                                                        <input class="last" type="password" name="lpwd" id="lpwd" style="width:100%;" value="Password" onFocus="if (this.value == 'Password') this.value = '';" onBlur="if (this.value == '') this.value = 'Password';" />
                                                        
                                                        <div style="margin-left:20%" class="g-recaptcha" data-sitekey="6LeFukAUAAAAAJBjhsfN5LXWly7scrZu8JfdZMbh"></div> 
                                                        <div class="clearfix">
								
								<div class="pull-left"><a class="forgot_pass" href="forgotpassword.php" >Forgot password?</a></div>
							</div>
                                                        
							<div class="center"><input type="submit" name="gl_login_button" value="Login"></div>
						</form>
					</div>
                                    
					<div class="new_customers">
						<h2>NEW CUSTOMERS</h2>
						<p>Register with Global Store to enjoy personalized services, including:</p>
						<ul>
							<li><a href="javascript:void(0);" >—  Online Order Status</a></li>
							<li><a href="javascript:void(0);" >—  Love List</a></li>
							<li><a href="javascript:void(0);" >—  Sign up to receive exclusive news and private sales</a></li>
							<li><a href="javascript:void(0);" >—  Place Test Orders</a></li>
							<li><a href="javascript:void(0);" >—  Quick and easy checkout</a></li>
						</ul>
						<div class="center"><a class="btn active" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" alt="New users click Here">Create new account</a></div>
					</div>
				</div>
				
				<div class="my_account_note center">HAVE A QUESTION? <b>1 800 888 02828</b></div>
			</div><!-- //CONTAINER -->
		</section><!-- //MY ACCOUNT PAGE -->
		<div id="id01" class="gl_reg_modal">
        <?php
            function encryptIt($q){
                $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
                $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
                return( $qEncoded );
            }
            if(isset($_POST["gl_reg_signupbtn"])){
            $name= htmlspecialchars($_POST['gl_reg_name']);
            $utype= htmlspecialchars($_POST['gl_reg_utype']);
            $dept= htmlspecialchars($_POST['gl_reg_dept']);
            $gender= htmlspecialchars($_POST['gl_reg_gender']);
            $email= htmlspecialchars($_POST['gl_reg_email']);
            $pno= htmlspecialchars($_POST['gl_reg_num']);
            $adharno= htmlspecialchars($_POST['gl_reg_adhar']);
            $id= htmlspecialchars($_POST['gl_reg_id']);
            $pwd= htmlspecialchars($_POST['gl_reg_pwd']);
            
            
            $encrypted = encryptIt($pwd);
            
            $picfile= "profile/".time()."".htmlspecialchars($_FILES['gl_reg_picname']['name']);
//                echo "$picfile";
            move_uploaded_file($_FILES['gl_reg_picname']['tmp_name'], $picfile);
                
            $imageFileType = pathinfo($picfile,PATHINFO_EXTENSION);
            //echo $imageFileType;
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
                    
            }
            else{

                $sql1="insert into user (uname,name,department,email,phone,adhar,gender,pic,status)"
                        . "values('$id','$name','$dept',"
                        . "'$email',$pno,'$adharno','$gender','$picfile',2);";

                $sql2="insert into login (uname,password,utype,status)"
                        . "values('$id','$encrypted','S',1);";
    //                echo $sql1;
    //                echo $sql2;
                if (mysqli_query($con,$sql1) > 0){
                if (mysqli_query($con,$sql2) > 0){
                    echo "<script> alert('Success'); </script>";
                    ?>
                        <script>
				window.location="login.php";
			</script>
        <?php
                }
                }
                else{
                        echo "<script> alert ('Admission Number / Staff ID Already Exists !'); </script>";
                    }
            }
            }
    ?>
        
        
        
        
            <span onclick="document.getElementById('id01').style.display='none'" class="gl_form_close" title="Close Modal">×</span>
                <form class="gl_reg_modal-content animate" id="gl_reg_form" name="gl_reg_form" action="login.php" method="POST"  onsubmit="return addUser()" enctype="multipart/form-data" >
                    <div class="gl_form_container" align="center">
                        <h2 align="center" style="color: black;">I'M NEW</h2>
                        <input type="text" placeholder="Enter Name" name="gl_reg_name"  id="gl_reg_name" required onChange="return gName()">
                        <br/>
                        
                        <select name="gl_reg_utype" id="gl_reg_utype" required>
                            <option value="T">Staff</option>
                            <option value="S">Student</option>
                        </select>
                        <br/>
                        
                        <select name="gl_reg_dept" id="gl_reg_dept" required>
                            <option value="">Department</option>
                            <option value="MCA">MCA</option>
                            <option value="Auto Mobile">Auto Mobile</option>
                            <option value="Machanical">Machanical</option>
                            <option value="EEE">EEE</option>
                            <option value="EC">EC</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Chemical">Chemical</option>
                            <option value="IT">IT</option>
                            <option value="Metallaurgy">Metallaurgy</option>
                            <option value="Civil">Civil</option>
                        </select>
                        <br/>
                        
                        <select name="gl_reg_gender" id="gl_reg_gender" required>
                            <option value="">Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="t">Transgender</option>
                        </select>
                        <br/>
                        
                        <input type="email" placeholder="Email" name="gl_reg_email" id="gl_reg_email" required onChange="return gEmail()">
                        <br/>
                        
                        <input type="phone" placeholder="Phone Number" name="gl_reg_num"  id="gl_reg_num" required onChange="return gPhone()">
                        <br/>
                        
                        <input type="text" placeholder="Adhar Number" name="gl_reg_adhar"  id="gl_reg_adhar" required onChange="return gAdhar()" >
                        <br/>
                        
                        <input type="text" placeholder="Admission No/Staff ID" name="gl_reg_id"  id="gl_reg_id" required onChange="return gAdmNo()">
                        <br/>
                        
                        <input type="password" placeholder="Password" name="gl_reg_pwd"  id="gl_reg_pwd" required>
                        <br/>
                        
                        <input type="password" placeholder="Confirm Password" name="gl_reg_cpwd"  id="gl_reg_cpwd" required onChange="return gPwd()">
                        <br/>
                        
                        <input type="file" id="gl_reg_picname" name="gl_reg_picname" placeholder="Upload Profile Pic" required />
                        <br/>
                        <br/>
                        
                        <center>
                            <div class="gl_reg_clearfix">
                                <center>
                                    <input type="submit" name="gl_reg_signupbtn" class="gl_reg_signupbtn" id="gl_reg_signupbtn"  value="Sign Up" style="width:100%;">
                                </center>
                            </div>
                        </center>
                    </div>
                </form>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        
	
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
	<script src="js/jqueryui.custom.min.html" type="text/javascript"></script>
	<script src="js/fancySelect.js"></script>
	<script src="js/animate.js" type="text/javascript"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	
</body>

<!-- Mirrored from demo.evatheme.com/html/glammy/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2017 08:03:27 GMT -->
</html>