<!DOCTYPE html>
<?php
    session_start();
    include './analyticstracking.php';  
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
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
    <body>
        <?php
            if($_SESSION['utype']==='A' || $_SESSION['utype']==='T'){
                include './menu1.php';
            }else{
                include './menu.php';
            }
        ?>
        <div class="gl_profile_main_container">
            <div class="gl_profile_container">
                <?php
                    require_once 'conn.php';
                    if($_SERVER['REQUEST_METHOD']==='GET'){
                        if(isset($_SESSION['utype'])){
                            
                            if($_SESSION['utype']==='S'){
                                $sql1=mysqli_query($con,"select * from user where uname=".$_SESSION['uname']." and status=1 ;");
                                $records=mysqli_fetch_array($sql1);
                                echo "<h2 align='center'>{$records['name']}</h2>";
                                echo "<table align='center' cellpadding='5px'>"
                                        . "<tr>"
                                            . "<td colspan='2' align='center'>"
                                            . "<img src={$records['pic']} alt='profilepic' width='200' height='200' align='center' /></td>"
                                        . "</tr>"
//                                        . "<tr><td>Department</td><td>:{$records['department']}</td></tr>"
//                                        . "<tr><td>Phone</td><td>:{$records['phone']}</td></tr>"
//                                        . "<tr>"
//                                            . "<td>Email</td><td>:{$records['email']}</td>"
//                                        . "</tr>"
                                    . "</table>";
                    
                           }
                            elseif($_SESSION['utype']==='T'){
                                $sql2=mysqli_query($con,"select * from user where uname=".$_SESSION['uname']." and status=1 ;");
                                $records2=mysqli_fetch_array($sql2);
                                echo "<table align='center'  cellpadding='8px' style='font-size:20px;'>"
                                        . "<tr>"
                                            . "<td colspan='2' align='center'>"
                                            . "<img src={$records2['pic']} alt='' width='200' height='200' /></td>"
                                        . "</tr>"
//                                        . "<tr>"
//                                            . "<td>Department</td><td>:Store Staff</td>"
//                                        . "</tr>"
//                                        . "<tr>"
//                                            . "<td>Phone</td><td>:{$records2['phone']}</td>"
//                                        . "</tr>"
//                                        . "<tr>"
//                                            . "<td>Email</td><td>:{$records2['email']}</td>"
//                                        . "</tr>"
                                    . "</table>";
                                
                           }
                            elseif($_SESSION['utype']==='A'){
                                echo "<h2 align='center'>Admin</h2>";
                                echo "<table align='center'><tr><td><img src='profile/admin.jpg' alt='' width='200' height='200' align='center' /></tr></td></table>";
                             ?> 
                            
                            <?php
                           }
                        else {
                               echo 'Your Account is No Longer Exists';
                        }
                       }
                   }
               ?> 
                
            </div>
            <div class="gl_profile_det_container">
            <?php
                if($_SERVER['REQUEST_METHOD']==='GET'){
                        if(isset($_SESSION['utype'])){
                            echo "<h2 align='center'>PROFILE</h2>";
                            if($_SESSION['utype']==='S'){
                                $sql1=mysqli_query($con,"select * from user where uname=".$_SESSION['uname']." and status=1 ;");
                                $records=mysqli_fetch_array($sql1);
                                
                                echo "<table align='center' cellpadding='10px' >"
                                        . "<tr><td>Name</td><td>:{$records['name']}</td></tr>"
                                        . "<tr><td>Department</td><td>:{$records['department']}</td></tr>"
                                        . "<tr><td>Phone</td><td>:{$records['phone']}</td></tr>"
                                        . "<tr>"
                                            . "<td>Email</td><td>:{$records['email']}</td>"
                                        . "</tr>"
                                        . "<tr><td>Adhar Number</td><td>:{$records['adhar']}</td></tr>"
                                        
                                    . "</table>";
                                        ?> 
                                        <center>
                                            <button class="gl_edit_button" style="vertical-align:middle"  onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span>Edit Profile </span></button>
                                            <br/>
                                            <button class="gl_cp_button" style="vertical-align:middle" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"><span>Change Password </span></a></button>
                                        </center>
                         <?php       
                    
                           }
                            elseif($_SESSION['utype']==='T'){
                                $sql2=mysqli_query($con,"select * from user where uname=".$_SESSION['uname']." and status=1 ;");
                                $records2=mysqli_fetch_array($sql2);
                                echo "<table align='center'  cellpadding='10px' style='font-size:20px;'>"
                                        . "<tr>"
                                            . "<td>Name</td><td>:{$records2['name']}</td>"
                                        . "</tr>"
                                        . "<tr>"
                                            . "<td>Department</td><td>:Store Staff</td>"
                                        . "</tr>"
                                        . "<tr>"
                                            . "<td>Phone</td><td>:{$records2['phone']}</td>"
                                        . "</tr>"
                                        . "<tr>"
                                            . "<td>Email</td><td>:{$records2['email']}</td>"
                                        . "</tr>"
                                        . "<tr><td>Adhar Number</td><td>:{$records2['adhar']}</td></tr>"            
                                    . "</table>";
                                      ?> 
                                        <center>
                                            <button class="gl_edit_button" style="vertical-align:middle"  onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span>Edit Profile </span></button>
                                            <br/>
                                            <button class="gl_cp_button" style="vertical-align:middle" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"><span>Change Password </span></a></button>
                                        </center>
                         <?php       
                           }
                            elseif($_SESSION['utype']==='A'){
                                echo "<table align='center'  cellpadding='10px' style='font-size:20px;'>"
                                        . "<tr>"
                                            . "<td>Name</td><td>:Admin</td>"
                                        . "</tr>"
                                        . "<tr>"
                                            . "<td>Department</td><td>:Administration</td>"
                                        . "</tr>"
                                    . "</table>";
                                ?>
                <center>
                    <button class="gl_cp_button" style="vertical-align:middle" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"><span>Change Password </span></a></button>
                </center>
                         <?php       
                           }
                        else {
                               echo 'Your Account is No Longer Exists';
                        }
                       }
                   }
               ?> 
                
                
            </div>
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
                        window.location="profile.php";
                </script>
            <?php
            }
            
            else{
                    echo "<script> alert ('Unsuccessfull !'); </script>";
                }
            }
    ?>
        
        
        
        
            <span onclick="document.getElementById('id01').style.display='none'" class="gl_form_close" title="Close Modal">×</span>
                <form class="gl_reg_modal-content animate" id="gl_edit_form" name="gl_edit_form" action="profile.php" onsubmit="return addUser()" method="POST" enctype="multipart/form-data" >
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
                            window.location="profile.php";
                    </script>
                <?php
                }

                else{
                        echo "<script> alert ('Unsuccessfull !'); </script>";
                    }
                }
        ?>
        
        
        
        
            <span onclick="document.getElementById('id02').style.display='none'" class="gl_form_close" title="Close Modal">×</span>
                <form class="gl_reg_modal-content animate" id="gl_cp_form" name="gl_cp_form" action="profile.php" onsubmit="return cPass()" method="POST" enctype="multipart/form-data" >
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
        
        
        
    </body>
</html>
