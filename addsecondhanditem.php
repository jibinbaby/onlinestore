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
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
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
        function gIname(){
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
                var itemnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_item_add_form.gl_item_name.value.search(itemnam)==-1)
                 {
                    alert("Enter correct  Item name");
                    document.gl_item_add_form.gl_item_name.focus();

                    return false;
                }
            }
        function gIprice(){
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
        function gIdes(){
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
                var itemnam=/^[a-zA-Z ]{4,25}$/;
                if(document.gl_item_add_form.gl_item_name.value.search(itemnam)==-1)
                 {
                    alert("Enter correct  Item name");
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
<body style="background-color:lightgoldenrodyellow;">
    <?php
        if($_SESSION['utype']==='S'){
            include './menu.php';  
    ?>
    <hr />
<center>
    <div class="gl_add_citem_main_container">
        <div class="form-style-5">
    <form class="gl_add_item_form" name="gl_item_add_form" action="#" method="POST"  onsubmit="return addItem()" enctype="multipart/form-data">
    <fieldset>
        <legend><span class="number">.</span> Add Item</legend>
        <input type="text" placeholder="Item Name" name="gl_item_name"  id="gl_item_name" required onChange="return gIname()">
        <input type="text" placeholder="Price" name="gl_item_price"  id="gl_item_price" required onChange="return gIprice()">
        <textarea  name="gl_item_description" id="gl_item_description" width="30" height="5" required onChange="return gIdes()" placeholder="Description"/></textarea>
        <input type="file" placeholder="Item Image" name="gl_item_pic"  id="gl_item_pic" required>
    </fieldset>
        <input type="submit" class="gl_item_addbtn" name="gl_item_addbtn" id="gl_item_addbtn" value="Save"/>
    </form>
</div>
                    
                      
    </div>
</center>   

</body>
    <?php
        if(isset($_POST["gl_item_addbtn"])){
            $uname=$_SESSION['uname'];
            $gl_item_name= htmlspecialchars($_POST['gl_item_name']);
            
            $gl_item_price=htmlspecialchars($_POST['gl_item_price']);
            
            $gl_item_description=htmlspecialchars($_POST['gl_item_description']);
            
            $picfile= "Items/".time()."".htmlspecialchars($_FILES['gl_item_pic']['name']);
//                echo "$picfile";
            move_uploaded_file($_FILES['gl_item_pic']['tmp_name'], $picfile);
            $imageFileType = pathinfo($picfile,PATHINFO_EXTENSION);
            //echo $imageFileType;
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
                    
            }
            else{
            
                $sql1="INSERT INTO `sh_item`(`uname`, `sitem_name`, `sprice`, `sdes`, `simg`, `status`)"
                        . "values($uname,LOWER('$gl_item_name'),$gl_item_price,'$gl_item_description','$picfile',1);";
                //var_dump($sql1);
                if (mysqli_query($con,$sql1) > 0){

                    echo "<script> alert('Success'); </script>";
                }
                else{
                        echo "<script> alert ('OopZZ... Try Again !'); </script>";
                    }
            }
        }
    
     }
        else{
            header("location:login.php");
        }
    ?>
    
</html>