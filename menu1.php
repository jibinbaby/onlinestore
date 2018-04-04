<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.ico">
        <style>
            .gl_menu_container{
                overflow: hidden;
                background-color: #fff;
                height:60px;
                font-family: Arial;

            }   
            .gl_logo {
                float:left; width:115px;
            }
            .gl_logo a {
                display:block;
            }

            ul.gl_navmenu {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: white;
                color: black;
                float: right;
            }

            li {
                float: left;
            }

            li a, .gl_dropbtn {
                display: inline-block;
                color: black;
                text-align: center;
                text-decoration: none;
                padding:20px 16px;
                text-transform:uppercase;
                font-weight:900;
                line-height:20px;
                font-size:13px;
                color:#333;
                transition: none;
                -webkit-transition: none;
            }

            li a:hover, .gl_dropdown:hover .gl_dropbtn {

                background-color: #f9f9f9;
            }

            li.gl_dropdown {
                display: inline-block;
            }

            .gl_dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .gl_dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: right;
            }

            .gl_dropdown-content a:hover {background-color: #f1f1f1}

            .gl_dropdown:hover .gl_dropdown-content {
                display: block;
            }

            
            
        </style>
</head>
<body>
    <div class="gl_menu_container">
        <div class="gl_logo">
                    <a href="userhome.php" ><img src="images/logo.png" alt="" style=" height:60px;" /></a>
        </div>
        <?php
            if(isset($_SESSION)){
                require_once 'conn.php';
                    if(isset($_SESSION['utype'])){
                        if($_SESSION['utype']==='A'){
                            echo "<ul class='gl_navmenu'>"
                                ."<li><a href='userhome.php' >Home</a></li>"
                                ."<li><a href='profile.php' >Admin Profile</a></li>"
                                
                                ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>Orders</a>"
                                    ."<div class='gl_dropdown-content'>"
                                      ."<a href='orderdetails.php' >Orders</a>"
                                      ."<a href='deliveredorderdetails.php'>Delivered Orders</a>"
                                      ."<a href='payment_view.php'>Payments</a>"
                                      ."<a href='viewtransactions.php'>Transactions</a>"
                                    ."</div>"
                                ."</li>"
                                 
                                  ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>View</a>"
                                    ."<div class='gl_dropdown-content'>"
                                      ."<a href='adminviewitems.php' >Items</a>"
                                    ."<a href='adminviewcomp.php' >Complaints</a>"
                                    ."<a href='shortitem.php' >Shortage Items</a>"
                                      
                                    ."</div>"
                                ."</li>"
                                     
                                ."<li class='gl_dropdown'>"
                                    ."<a href='javascript:void(0)' class='gl_dropbtn'>Users</a>"
                                        ."<div class='gl_dropdown-content'>"
                                          ."<a href='userdetails.php'>Add User</a>"
                                          ."<a href='deletedusers.php'>Deleted Users</a>"
                                          ."<a href='viewallusers.php'>View Users</a>"
                                        ."</div>"
                                ."</li>"
                                ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>ADD</a>"
                                    ."<div class='gl_dropdown-content'>"
                                    ."<a href='addstaff.php'>Staff</a>"
                                      ."<a href='addcategory.php'>Category</a>"
                                      ."<a href='addsubcategory.php'>Subcategory</a>"
                                      ."<a href='additem.php'>Items</a>"
                                    ."<a href='addplace.php'>Place</a>"
                                    ."</div>"
                                ."</li>"
                                  
                                ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>Delete</a>"
                                    ."<div class='gl_dropdown-content'>"
                                      ."<a href='deleteitem.php' >Items</a>"
                                    ."<a href='deletecategory.php' >Category</a>"
                                    ."<a href='deletesub.php' >Subcategory</a>"
                                      
                                    ."</div>"
                                ."</li>"    
                                  
                                 ."<li><a href='chatlist.php' >Chat Staff</a></li>"   
                                ."<li><a href='logout.php' >Log Out</a></li>"
                            ."</ul>"

                        ."</div>"
                         ."<hr/>";
                    }
                    if($_SESSION['utype']==='T'){
//                        $sqlm1= mysqli_query($con,"Select name from user where uname=".$_SESSION['uname']." and status=1 ;");
//                        $recm1= mysqli_fetch_array($sqlm1);
                            echo "<ul class='gl_navmenu'>"
                                ."<li><a href='userhome.php' >Home</a></li>"
                                ."<li><a href='profile.php' >Staff Profile</a></li>"
                                
                                ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>Orders</a>"
                                    ."<div class='gl_dropdown-content'>"
                                      ."<a href='orderdetails.php' >Orders</a>"
                                      ."<a href='deliveredorderdetails.php'>Delivered Orders</a>"
                                      ."<a href='payment_view.php'>Payments</a>"
                                    ."<a href='viewtransactions.php'>Transactions</a>"
                                    ."</div>"
                                ."</li>"
                                 
                                  ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>View</a>"
                                    ."<div class='gl_dropdown-content'>"
                                      ."<a href='adminviewitems.php' >Items</a>"                                    
                                    ."<a href='adminviewcomp.php' >Complaints</a>"
                                     ."<a href='shortitem.php' >Shortage Items</a>"
                                    ."</div>"
                                ."</li>"
                                     
                                
                                ."<li class='gl_dropdown'>"
                                ."<a href='javascript:void(0)' class='gl_dropbtn'>ADD</a>"
                                    ."<div class='gl_dropdown-content'>"
                                   
                                      ."<a href='additem.php'>Items</a>"
                                    ."<a href='addplace.php'>Place</a>"
                                    ."</div>"
                                ."</li>"
                                ."<li><a href='chatwithadmin.php' >Chat Admin</a></li>"   
                                ."<li><a href='logout.php' >Log Out</a></li>"
                            ."</ul>"

                        ."</div>"
                         ."<hr/>";
                    }
                    else{
                        
                    }

                }

            }
        ?>
</body>
</html>
