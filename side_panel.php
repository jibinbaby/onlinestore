<?php
include './conn.php';  
if($_SESSION['utype']==='A'){
?>
<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="userhome.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Oders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="orderdetails.php">Orders</a>
                            </li>
                            <li>
                                <a href="deliveredorderdetails.php">Delivered Orders</a>
                            </li>
                            <li>
                                <a href="payment_view.php">Payments</a>
                            </li>
                            <li>
                                <a href="viewtransactions.php">Transactions</a>
                            </li>
                        </ul>
                    </li>	
							
                    <li>
                        <a href=""><i class="fa fa-qrcode"></i> View<span class="fa arrow"></span></a>
                    
                         <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="adminviewitems.php">Items</a>
                            </li>
                            <li>
                                <a href="adminviewcomp.php">Complaints</a>
                            </li>
                            <li>
                                <a href="shortitem.php">Shortage Items</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="userdetails.php">Add User</a>
                            </li>
                            <li>
                                <a href="deletedusers.php">Deleted Users</a>
                            </li>
                            <li>
                                <a href="viewallusers.php">View Users</a>
                            </li>
                            <li>
                                <a href="viewallstaff.php">View Staff</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Add<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addstaff.php">Staff</a>
                            </li>
                            <li>
                                <a href="addcategory.php">Category</a>
                            </li>
                            <li>
                                <a href="addsubcategory.php">Subcategory</a>
                            </li>
                            <li>
                                <a href="additem.php">Items</a>
                            </li>
                            <li>
                                <a href="addplace.php">Place</a>
                            </li>
                        </ul>
                    </li>	
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Delete <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="deleteitem.php">Items</a>
                            </li>
                            <li>
                                <a href="deletecategory.php">Category</a>
                            </li>
                            <li>
                                <a href="deletesub.php">Subcategory</a>
                            </li>
                        </ul>
                    </li>


                   
                    <li>
                        <a href="chatroom.php"><i class="fa fa-fw fa-file"></i> Chat Staff</a>
                    </li>
                    <li>
                        <a href="sectransadm.php"><i class="fa fa-sitemap"></i> Used Items<span class="fa arrow"></span></a>
                        
                    </li>
					 <li>
                        <a href="https://analytics.google.com/analytics/web/?authuser=1#/embed/report-home/a112608881w167806595p168001390"><i class="fa fa-sitemap"></i> Analytics<span class="fa arrow"></span></a>
                        
                    </li>
					
                </ul>

            </div>
<?php
}elseif($_SESSION['utype']==='T'){
?>

<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="userhome.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Oders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="orderdetails.php">Orders</a>
                            </li>
                            <li>
                                <a href="deliveredorderdetails.php">Delivered Orders</a>
                            </li>
                            <li>
                                <a href="payment_view.php">Payments</a>
                            </li>
                            <li>
                                <a href="viewtransactions.php">Transactions</a>
                            </li>
                        </ul>
                    </li>	
							
                    <li>
                        <a href=""><i class="fa fa-qrcode"></i> View<span class="fa arrow"></span></a>
                    
                         <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="adminviewitems.php">Items</a>
                            </li>
                            <li>
                                <a href="adminviewcomp.php">Complaints</a>
                            </li>
                            <li>
                                <a href="shortitem.php">Shortage Items</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Add<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <<li>
                                <a href="additem.php">Items</a>
                            </li>
                            <li>
                                <a href="addplace.php">Place</a>
                            </li>
                        </ul>
                    </li>	
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Delete <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="deleteitem.php">Items</a>
                            </li>
                           
                        </ul>
                    </li>


                   
                    <li>
                        <a href="chattingadmin.php"><i class="fa fa-fw fa-file"></i> Chat Admin</a>
                    </li>
                    <li>
                        <a href="sectransadm.php"><i class="fa fa-sitemap"></i> Used Items<span class="fa arrow"></span></a>
                        
                    </li>
                </ul>

            </div>

<?php
}
?>