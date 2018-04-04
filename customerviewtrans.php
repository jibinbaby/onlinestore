<!DOCTYPE html>

<html>
    <head>
        <?php
            include './conn.php';
            include './analyticstracking.php';  
            session_start();
            $uname=$_SESSION['uname'];
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
    
    <link rel="stylesheet" href="css/style2.css">
    </head>
    <body style="background-color: lightgoldenrodyellow;">
        <?php
            if($_SESSION['utype']==='S'){ 
                include 'menu.php';
        ?>
       
        
        <div class="inner text-center" style="margin-top: 50px;">
            <form action="#" name="myform" method="POST" class="form-inline">
                <center>
                <div class="span12" style="border-radius: 5px; border-style: solid; border-width: 1px; width:80%;" >
                    <center>
                    <table>
                        <tr>
                            <td>
                                <label>Select By Date</label>
                                <input type="date" name="mydate1" id="mydate1" class="input-medium" required="" />&nbsp;
                            </td>
                            <td>
                                <label>Select By Date</label>
                                <input type="date" name="mydate2" id="mydate2" class="input-medium" />&nbsp;
                            </td>
                            <td>
                                <input type="submit" class="btn-primary" name="myday" value="Search" id='myday' />
                            </td>
                            
                    </tr>
                    </table>
                    </center>
                </div>
                </center>
            </form>
            <table border="2" width="300" cellspacing="2" cellpadding="1" class="table table-striped" style=" border-radius: 5px; border-style: solid; border-width: 1px; ">
            <?php
                if(isset($_POST['submit']))
                {
                }
                if(isset($_POST['myday']))
                    {
                    
                        $mydate1=$_POST["mydate1"];
                        $mydate2=$_POST["mydate2"];
                        if($mydate1==$mydate2){
                            $aa="select `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`,DATE(date) as date, `status` from purchase where uname=$uname and date like '$mydate1%' ";
                        }
                        else{
                            $aa="select  `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`, DATE(date) as date, `status` from purchase where uname=$uname and date between '$mydate1' and '$mydate2' ";
                        }
                        $result=mysqli_query($con,$aa);
                        $row_num=mysqli_num_rows($result);
                       // echo $row_num;
                        if($row_num != 0){
                        
            ?>
            <head>
                <tr>
                    <th>Transaction ID</th>
                    <th>User Name</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Date Of Transaction</th>
                </tr>
            </head>
                <tbody>
                        <?php
                            while($row=mysqli_fetch_array($result))
                            {
                                $pay_id=$row['pay_id'];
                                $unm=$row['uname'];
                                $it=$row['item_id'];
                                $pay="select * from payment where pay_id=$pay_id";
                                $result1=mysqli_query($con,$pay);
                                while($row1=mysqli_fetch_array($result1)){
                                    $un=mysqli_query($con,"select * from user where uname=$unm");
                                        while($row2=mysqli_fetch_array($un)){
                                            $itm=mysqli_query($con,"select * from items where item_id=$it");
                                                while($row3=mysqli_fetch_array($itm)){

                     ?>
                <tr>
                    <td><?php echo $row['pur_id'];?></td>
                    <td><?php echo $row2['name'];?></td>
                    <td><?php echo ucfirst($row3['item_name']);?></td>
                    <td><?php echo $row3['price'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row1['amount'];?></td>
                    <td><?php echo $row['date'];?></td>
                </tr>
    

            <?php
                                                }
                                }
                                }
                }
             
            ?>
                    
    <tr>
        
        <td colspan="7">
            <center>
                <button class="btn-primary" name="print" id="print" onclick="window.print()">Print</button> 
            </center>   
        </td>
            
    </tr>
                    
    </table>

               



     <?php
      }else{
          echo "No Items";
      }
                    }
        }
            else{

            ?>
                    <script>
                        window.location.href="login.php";
                    </script>
            <?php
                }    
            ?>
 </div>
    </div>
	
    </body>
</html>
