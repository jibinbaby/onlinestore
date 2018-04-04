<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Global Store </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
        <style>
            
        </style>
    </head>
    <body>
       <div class="menu_container" >
            <div class="container clearfix">

                <!-- LOGO -->
                <div class="logo">
                    <a href="userhome1.php" ><img src="images/logo.png" alt="" style=" height:60px;" /></a>
                </div><!-- //LOGO -->

                <!-- MENU -->
                <?php
                if(isset($_SESSION)){
                        require_once 'conn.php';
                            if(isset($_SESSION['utype'])){
                                if($_SESSION['utype']==='S'){
                                    echo "<ul class='navmenu center'>
                                            <li class='sub-menu'><a href='userhome1.php' >Home</a>
                                            </li>
                                            <li class='sub-menu'><a href='profile.php' >Profile</a>
                                            </li>
                                            <li class='sub-menu'><a href='viewbids.php' >Viewbids</a>
                                            </li>
                                            
                                            <li class='sub-menu'><a href='addsecondhanditem.php' >Add Item</a>
                                            </li>
                                            <li class='sub-menu'><a href='cart.php' >Cart</a>
                                            </li>
                                            <li class='sub-menu'><a href='wallet.php' >Wallet</a>
                                            </li>
                                            <li class='sub-menu'><a href='trackitems.php' >Track</a>
                                            </li>
                                            <li class='sub-menu'><a href='reportsandcomplaints.php' >Complaints</a>
                                            </li>
                                            <li class='sub-menu'><a href='customerviewtrans.php' >Transactions</a></li>
                                            <li class='sub-menu'><a href='logout.php' >Log Out</a></li>
                                        </ul>";
                                }
                                elseif($_SESSION['utype']==='T'){
                                    echo "<ul class='navmenu center'>
                                            <li class='sub-menu'><a href='userhome.php' >Home</a>
                                            </li>
                                            <li class='sub-menu'><a href='profile.php' >Profile</a>
                                            </li>
                                            <li class='sub-menu'><a href='contacts.php' >contact</a>
                                            </li>
                                            <li class='sub-menu'><a href='javascript:void(0);' >Blog</a>
                                            </li>
                                            <li class='sub-menu'><a href='logout.php' >Log Out</a></li>
                                        </ul>";
                                }
                                elseif($_SESSION['utype']==='A'){
                                    echo "<ul class='navmenu center'>
                                            <li class='sub-menu'><a href='userhome.php' >Home</a>
                                            </li>
                                            <li class='sub-menu'><a href='profile.php' >Profile</a>
                                            </li>
                                            <li class='sub-menu'><a href='addcategory.php' >ADD</a>
                                            </li>
                                            <li class='sub-menu'><a href='userdetails.php' >View</a>
                                            </li>
                                            
                                            <li class='sub-menu'><a href='logout.php' >Log Out</a></li>
                                        </ul>";
                                }
                               
                            }
                }
                
                ?>
            </div>
        </div>
    </body>
</html>
