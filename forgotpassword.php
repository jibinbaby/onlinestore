<?php
    include 'conn.php';
    include './analyticstracking.php';  
    if(isset($_POST['gl_fp_email_check']))
    {   
        $email1=htmlspecialchars($_POST['gl_fp_email']);
        $u=htmlspecialchars($_POST['gl_fp_uname']);
       // echo $email1;
        $sql1="SELECT  * FROM `user` where email='$email1' and (status=1 or status=2)";
        $rec1= mysqli_query($con, $sql1);
        //echo $sql1;
       
        $sql4="SELECT  * FROM `login` where uname='$u' and (status=1 or status=2)";
        $rec4= mysqli_query($con, $sql4);
        //echo $sql4;
        
        if($row4=mysqli_fetch_array($rec4)){
        if($row= mysqli_fetch_array($rec1)){
                    $mail=$row['email'];
                    $uname=$row['uname'];
                    $sql2=mysqli_query($con,"SELECT  * FROM `login` where uname='$uname' and (status=1 or status=2)");
                    $row2= mysqli_fetch_array($sql2);
                    $pw=$row2['password'];
                   
                    if($email1==$mail && $u==$uname){
                        echo "hello";
                        $subject = "Global Store Password Reset";
                        $message ="<html>
                            <head>
                            <title>User registeration</title>
                            </head>
                            <body>
                            <p>Your Username and Password is GIven Below</p>
                            <table>
                            <tr>
                            <th>User Id</th>
                            <th>Password</th>
                            </tr>
                            <tr>
                            <td>'$uname'</td>
                            <td>'$pw'</td>
                            </tr>
                            </table>
                            </body>
                            </html>";
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $headers .= 'From: <jibinbaby@mca.ajce.in>' . "\r\n";
                            $headers .= 'Cc: jibinbaby@mca.ajce.in' . "\r\n";
                            mail($mail,$subject,$message,$headers);
                            echo "<script> alert('Password has been Sent to Your Mail ID')</script>";
                    }
                    else{
                        echo "<script> alert('Invalid Email')</script>";
                    }
        }
        }
        else{
            echo "<script> alert('Invalid Email')</script>";
        }
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
        
    </head>
    <?php
    include './menu.php';
    
    ?>
    <body>
    <form name='gl_fp_form' method='post' action="#">
        <center>
        <input type="text" name="gl_fp_uname" placeholder="Enter Username" style="width: 20%;" />
        <br/>
        <input type="email" name="gl_fp_email" placeholder="Enter Email" style="width: 20%;" />
        <br/>
        
        <input type="submit"  name="gl_fp_email_check" class="gl_item_addbtn" value="GO"  style="width: 20%;" ></center>
    </form>
    </body>
</html>