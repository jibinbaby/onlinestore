<!DOCTYPE html>
<?php
    session_start();
    include './analyticstracking.php';  
    include './conn.php';
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        .container10 {
          border: 2px solid #ccc;
          background-color: #eee;
          border-radius: 5px;
          padding: 16px;
          margin: 16px 0
        }

        .container10::after {
          content: "";
          clear: both;
          display: table;
        }

        .container10 img {
          float: left;
          margin-right: 20px;
          border-radius: 50%;
        }

        .container10 span {
          font-size: 20px;
          margin-right: 15px;
        }

        @media (max-width: 500px) {
          .container10 {
              text-align: center;
          }
          .container10 img {
              margin: auto;
              float: none;
              display: block;
          }
        }
        </style>
    </head>
    <body style="background-color:lightgoldenrodyellow;">
        <?php
            include './menu.php';
        ?>
        <hr/>
        <br/>
        <?php
            if(isset($_SESSION['utype'])){
                if($_SESSION['utype']==='S'){
                    $sql1=mysqli_query($con,"SELECT `pur_id`, `uname`, `item_id`, `pay_id`, `qty`, `place_id`, `date`, `status` FROM `purchase` where uname=".$_SESSION['uname']." and (status=3 or status=4) order by pur_id  desc;");
                        while($records1=mysqli_fetch_array($sql1)){
                            $item_id=$records1['item_id'];
                            $sql2=mysqli_query($con,"select * from items where item_id=$item_id");
                            while($records2=mysqli_fetch_array($sql2)){
        ?>
                
            <div class="container10">
                Purchase ID:<?php echo "{$records1['pur_id']}"; ?>
                <img src="<?php echo "{$records2['img']}"; ?>" alt="Avatar" style="width:90px">
                <p><span><?php echo ucfirst("{$records2['item_name']}"); ?></span> CEO at Mighty Schools.</p>
                <p>Number of Items:<?php echo "{$records1['qty']}"; ?></p>
                <?php 
                                            $a=$records1['status']; 
                                            if($a==3){
                                                echo "<p style='color:red;'>Pending<p>";
                                            }
                                            else {
                                                echo "<p style='color:green;'>Delivered<p>";
                                            }
                                        ?>
            </div>
            <hr/>
        <?php
                        }                        
                    }
                }
            }
        ?>
    </body>
</html>
