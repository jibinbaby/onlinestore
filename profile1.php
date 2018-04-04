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
        if($_SESSION['utype']=='S'){
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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
    <style>
    /* Profile container */
    .profile {
      margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
      
      width:650px;
      padding: 20px 0 10px 0;
      background: #fff;
    }

    .profile-userpic img {
      float: none;
      margin: 0 auto;
      width: 20%;
      height: 20%;
      -webkit-border-radius: 50% !important;
      -moz-border-radius: 50% !important;
      border-radius: 50% !important;
    }

    .profile-usertitle {
      text-align: center;
      margin-top: 20px;
    }

    .profile-usertitle-name {
      color: #5a7391;
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 7px;
    }

    .profile-usertitle-job {
      text-transform: uppercase;
      color: #5b9bd1;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .profile-userbuttons {
      text-align: center;
      margin-top: 10px;
    }

    .profile-userbuttons .btn {
      text-transform: uppercase;
      font-size: 11px;
      font-weight: 600;
      padding: 6px 15px;
      margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
      margin-right: 0px;
    }

    .profile-usermenu {
      margin-top: 30px;
    }

    .profile-usermenu ul li {
      border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
      border-bottom: none;
    }

    .profile-usermenu ul li a {
      color: #93a3b5;
      font-size: 14px;
      font-weight: 400;
    }

    .profile-usermenu ul li a i {
      margin-right: 8px;
      font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
      background-color: #fafcfd;
      color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
      border-bottom: none;
    }

    .profile-usermenu ul li.active a {
      color: #5b9bd1;
      background-color: #f6f9fb;
      border-left: 2px solid #5b9bd1;
      margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
      padding: 20px;
      background: #fff;
      min-height: 460px;
    }
</style>
        <script>
        function gName(){
            var gl_edt_name= document.gl_edit_form.gl_edt_name.value;
                if((gl_edt_name===null)||(gl_edt_name.length<5)){
                    document.gl_edit_form.gl_edt_name.style.border = "1px solid red";
                    alert("Enter Full Name");
                    document.gl_edit_form.gl_edt_name.focus();
                    return false;
                }
                var fnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_edit_form.gl_edt_name.value.search(fnam)==-1)
                {
                      alert("Enter correct  Name");
                      document.gl_edit_form.gl_edt_name.focus();
                      document.gl_edit_form.gl_edt_name.style.border = "1px solid red";
                      return false;
                
                }
                if((gl_edt_name.length>25)){
                    document.gl_edit_form.gl_edt_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_edit_form.gl_edt_name.focus();
                    return false;
                }
        }
        function gEmail(){
             var gl_edt_email=document.gl_edit_form.gl_edt_email.value;
                var atpos = gl_edt_email.indexOf("@");
                var dotpos = gl_edt_email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>gl_edt_email.length)){
                    document.gl_edit_form.gl_edt_email.style.border = "1px solid red";
                    document.gl_edit_form.gl_edt_email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
            
        }
        function gPhone(){
            var gl_edt_num=document.gl_edit_form.gl_edt_num.value;
                if(isNaN(gl_edt_num)){
                    document.gl_edit_form.gl_edt_num.style.border = "1px solid red";
                    alert("Phone Number Only Contain Digits");
                    document.gl_edit_form.gl_edt_num.focus();
                    return false;
                }
                if(gl_edt_num.length !== 10){
                    document.gl_edit_form.gl_edt_num.style.border = "1px solid red";
                    alert("Phone Number must be 10 Digits");
                    document.gl_edit_form.gl_edt_num.focus();
                    return false;
                }
                var ph=/^([7-9]{1})([0-9]{9})$/;
                if(document.gl_edit_form.gl_edt_num.value.search(ph)==-1)
                 {
                      alert("Enter a Valid Number");
                      document.gl_edit_form.gl_edt_num.focus();
                      return false;
                }
        }
        function gAdhar(){
            var gl_edt_adhar=document.gl_edit_form.gl_edt_adhar.value;
                if(gl_edt_adhar.length !== 12){
                    document.gl_edit_form.gl_edt_adhar.style.border = "1px solid red";
                    alert("Adhar Number Must Contain 12 Numbers");
                    document.gl_edit_form.gl_edt_adhar.focus();
                    return false;
                }
                if(isNaN(gl_edt_adhar)){
                    document.gl_edit_form.gl_edt_adhar.style.border = "1px solid red";
                    alert("Admission Number Only Contain Digits");
                    document.gl_edit_form.gl_edt_adhar.focus();
                    return false;
                }
                if(gl_edt_adhar <100000000000){
                    document.gl_edit_form.gl_edt_adhar.style.border = "1px solid red";
                    alert("Enter a Valid Adhar Number");
                    document.gl_edit_form.gl_edt_adhar.focus();
                    return false;
                }
        }
            
            
            
        function  addUser(){
                var gl_edt_name= document.gl_edit_form.gl_edt_name.value;
                if((gl_edt_name===null)||(gl_edt_name.length<5)){
                    document.gl_edit_form.gl_edt_name.style.border = "1px solid red";
                    alert("Enter Full Name");
                    document.gl_edit_form.gl_edt_name.focus();
                    return false;
                }
                var fnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_edit_form.gl_edt_name.value.search(fnam)==-1)
                {
                      alert("Enter correct  Name");
                      document.gl_edit_form.gl_edt_name.focus();
                      document.gl_edit_form.gl_edt_name.style.border = "1px solid red";
                      return false;
                
                }
                if((gl_edt_name.length>25)){
                    document.gl_edit_form.gl_edt_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                    document.gl_edit_form.gl_edt_name.focus();
                    return false;
                }
                
                
                var gl_edt_num=document.gl_edit_form.gl_edt_num.value;
                if(isNaN(gl_edt_num)){
                    document.gl_edit_form.gl_edt_num.style.border = "1px solid red";
                    alert("Phone Number Only Contain Digits");
                    document.gl_edit_form.gl_edt_num.focus();
                    return false;
                }
                if(gl_edt_num.length !== 10){
                    document.gl_edit_form.gl_edt_num.style.border = "1px solid red";
                    alert("Phone Number must be 10 Digits");
                    document.gl_edit_form.gl_edt_num.focus();
                    return false;
                }
                var ph=/^([7-9]{1})([0-9]{9})$/;
                if(document.gl_edit_form.value.search(ph)==-1)
                 {
                      alert("Enter a Valid Number");
                      document.gl_edit_form.gl_edt_num.focus();
                      return false;
                }
                
                
                
                var gl_edt_adhar=document.gl_edit_form.gl_edt_adhar.value;
                if(gl_edt_adhar.length !== 12){
                    document.gl_edit_form.gl_edt_adhar.style.border = "1px solid red";
                    alert("Adhar Number Must Contain 12 Numbers");
                    document.gl_edit_form.gl_edt_adhar.focus();
                    return false;
                }
                var ad=/^([1-9]{1})([0-9]{11})$/;
                if(document.gl_edit_form.gl_edt_adhar.value.search(ad)==-1)
                 {
                      alert("Enter a Valid Adhar Number");
                      document.gl_edit_form.gl_edt_adhar.focus();
                      return false;
                }
                if(isNaN(gl_edt_adhar)){
                    document.gl_edit_form.gl_edt_adhar.style.border = "1px solid red";
                    alert("Admission Number Only Contain Digits");
                    document.gl_edit_form.gl_edt_adhar.focus();
                    return false;
                }
                 if(gl_edt_adhar <100000000000){
                    document.gl_edit_form.gl_edt_adhar.style.border = "1px solid red";
                    alert("Enter a Valid Adhar Number");
                    document.gl_edit_form.gl_edt_adhar.focus();
                    return false;
                }
                
                
                
                var gl_edt_email=document.gl_edit_form.gl_edt_email.value;
                var atpos = gl_edt_email.indexOf("@");
                var dotpos = gl_edt_email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>gl_edt_email.length)){
                    document.gl_edit_form.gl_edt_email.style.border = "1px solid red";
                    document.gl_edit_form.gl_edt_email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
            }
            
            function cPass(){
                var gl_new_pwd= document.gl_cp_form.gl_new_pwd.value;
                var gl_c_pwd=document.gl_cp_form.gl_c_pwd.value;
                
                if(gl_new_pwd.length < 4 || gl_c_pwd.length < 4 ){
                    document.gl_cp_form.gl_new_pwd.style.border = "1px solid red";
                    document.gl_cp_form.gl_new_pwd.focus();
                    alert("Password is Too Short");
                    return false;
                }
                if(gl_new_pwd !== gl_c_pwd){
                    document.gl_cp_form.gl_c_pwd.style.border = "1px solid red";
                    document.gl_cp_form.gl_c_pwd.focus();
                    alert("Mismatching Passwords");
                    return false;
                }
                var fpwd1=/^[a-z0-9]{4,25}$/;
                if(document.gl_cp_form.gl_c_pwd.value.search(fpwd1)==-1)
                 {
                      alert("Lowercase Letters,numbers(0-9) are allowed,Password Should not exceed 25 Characters");
                      document.gl_cp_form.gl_c_pwd.focus();
                      
                      return false;
                }
            }
        </script>
</head>

<body style="background-color: #4c4c4c;">
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
		  
            <div id="page-inner">
                <?php
                    $sql1=mysqli_query($con,"select * from user where uname=".$_SESSION['uname']." and status=1 ;");
                        $records=mysqli_fetch_array($sql1);
                
                ?>
                <div class="row profile">
                    <div class="col-md-3">
                            <div class="profile-sidebar">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                            <img src="<?php if($_SESSION['utype']==='A'){ ?>profile/admin.jpg <?php }else{ echo $records['pic'];}?>" class="img-responsive" alt="">
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                            <div class="profile-usertitle-name">
                                                   <?php if($_SESSION['utype']==='A'){ echo "Admin"; }else{ echo ucfirst($records['name']);}?> 
                                            </div>
                                            <div class="profile-usertitle-job">
                                                    <?php if($_SESSION['utype']==='A'){ echo "Administration"; }else{ echo "Store Staff"; }?> 
                                            </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="profile-userbuttons">
                                        <?php if($_SESSION['utype']==='T'){ ?>
                                            <button type="button" class="btn btn-success btn-sm" onclick="document.getElementById('id01').style.display='block'">Edit Profile</button>
                                        <?php
                                            }
                                        ?>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('id02').style.display='block'">Change Password</button>
                                    </div>
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                            <ul class="nav">
                                                    <?php
                                                    if($_SESSION['utype']==='T'){
                                                    
                                                    ?>
                                                    <li>
                                                            <a href="#">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                            Phone: <?php echo $records['phone']; ?> </a>
                                                    </li>
                                                    <li>
                                                            <a href="#" target="_blank">
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                            Email: <?php echo $records['email']; ?> </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                            <i class="glyphicon glyphicon-flag"></i>
                                                            Adhar Number: <?php echo $records['adhar']; ?></a>
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                            </ul>
                                    </div>
                                    <!-- END MENU -->
                            </div>
                        </div>
                </div>
                
                

            </div>

        </div>
        <div id="id02" class="gl_reg_modal">
        <?php
            if(isset($_POST["gl_cp_editbtn"])){
                function encryptIt($q){
                    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
                    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
                    return( $qEncoded );
                }
                
                $pwd1= htmlspecialchars($_POST['gl_new_pwd']);
                
                
                $npwd = encryptIt($pwd1);
                $sql7="UPDATE `login` SET `password`='$npwd'"
                        . "WHERE `uname`={$_SESSION['uname']};";
                        
                echo $sql7;
                if (mysqli_query($con,$sql7) > 0){

                    echo "<script> alert('Password Changed Successfully'); </script>";
                ?>
                    <script>
                            window.location="profile1.php";
                    </script>
                <?php
                }

                else{
                        echo "<script> alert ('Unsuccessfull !'); </script>";
                    }
                }
        ?>
        
        
        
        
            <span onclick="document.getElementById('id02').style.display='none'" class="gl_form_close" title="Close Modal">×</span>
                <form class="gl_reg_modal-content animate" id="gl_cp_form" name="gl_cp_form" action="profile1.php" onsubmit="return cPass()" method="POST" enctype="multipart/form-data" >
                    <div class="gl_form_container" align="center">
                        <h2 align="center" style="color: black;">Change Password</h2>
                        
                        <input type="password" placeholder="Enter New Password" name="gl_new_pwd"  id="gl_new_pwd" required>
                        <br/>
                        
                        <input type="password" placeholder="Confirm Password" name="gl_c_pwd" id="gl_c_pwd" required>
                        <br/>
                        
                            <div class="gl_reg_clearfix">
                                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="gl_reg_cancelbtn">Cancel</button>
                                <input type="submit"  name="gl_cp_editbtn" class="gl_reg_signupbtn" id="gl_cp_editbtn"   value="Change">
                            </div>
                    </div>
                </form>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    
        <div id="id01" class="gl_reg_modal">
        <?php
            if(isset($_POST["gl_prof_editbtn"])){
            $name= htmlspecialchars($_POST['gl_edt_name']);
            $email= htmlspecialchars($_POST['gl_edt_email']);
            $pno= htmlspecialchars($_POST['gl_edt_num']);
            $adharno= htmlspecialchars($_POST['gl_edt_adhar']);

            $sql6="UPDATE `user` SET `name`='$name',"
                    . "`email`='$email',`phone`=$pno,`adhar`=$adharno WHERE `uname`={$_SESSION['uname']};";
            
            if (mysqli_query($con,$sql6) > 0){
            
                echo "<script> alert('Success'); </script>";
            ?>
                <script>
                        window.location="profile1.php";
                </script>
            <?php
            }
            
            else{
                    echo "<script> alert ('Unsuccessfull !'); </script>";
                }
            }
    ?>
        
        
        
        
            <span onclick="document.getElementById('id01').style.display='none'" class="gl_form_close" title="Close Modal">×</span>
                <form class="gl_reg_modal-content animate" id="gl_edit_form" name="gl_edit_form" action="profile1.php" onsubmit="return addUser()" method="POST" enctype="multipart/form-data" >
                    <div class="gl_form_container" align="center">
                        <h2 align="center" style="color: black;">Edit Profile</h2>
                        <?php
                            if($_SERVER['REQUEST_METHOD']==='GET'){
                            $sql5=mysqli_query($con,"select * from user where uname=".$_SESSION['uname']." and status=1 ;");
                            $records=mysqli_fetch_array($sql5);
                        ?>
                        Name:<input type="text" value="<?php echo "{$records['name']}" ?>" name="gl_edt_name"  id="gl_edt_name" required onChange="return gName()"  />
                        <br/>
                        
                        Email:<input type="email" value="<?php echo "{$records['email']}" ?>" name="gl_edt_email" id="gl_edt_email" required onChange="return gEmail()" />
                        <br/>
                        
                        Phone:<input type="phone" value="<?php echo "{$records['phone']}" ?>" name="gl_edt_num"  id="gl_edt_num" required onChange="return gPhone()" />
                        <br/>
                        
                        Adhar:<input type="number" value="<?php echo "{$records['adhar']}" ?>" name="gl_edt_adhar"  id="gl_edt_adhar" required onChange="return gAdhar()" />
                        <br/>
                        <?php
                        }
                        ?>
                        
                                              
                        
                            <div class="gl_reg_clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="gl_reg_cancelbtn">Cancel</button>
                                <input type="submit"  name="gl_prof_editbtn" class="gl_reg_signupbtn" id="gl_prof_editbtn"  value="Save">
                            </div>
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
    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
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


<!-- Mirrored from webthemez.com/demo/brilliant-free-bootstrap-admin-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Mar 2018 03:47:22 GMT -->
</html>