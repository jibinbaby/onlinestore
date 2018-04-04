<!DOCTYPE html>
<html >
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
    <script src="https://use.typekit.net/xft2oih.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
  
  
      <link rel="stylesheet" href="css/style1.css">

  
</head>

<body>
    <?php
        include './menu.php';
    
    ?>
    <form class="gl_wallet_form" name="gl_wallet_form" id="checkout" action="wallet.php" method="POST"  onsubmit="return addWallet()" enctype="multipart/form-data">
    
    <div id="wrapper">
    <div id="container">
    <div id="info">
      
      <img id="product" src="http://enwaara.se/codepen/product.png"/>
      <?php
            $uname1=$_SESSION['uname'];
            $sql5="SELECT `w_id`, `uname`, `bank_name`, `balance`, `status` FROM `wallet` WHERE uname=$uname1";
            $result5=mysqli_query($con,$sql5);
            if($result5){
            $t5=mysqli_fetch_array($result5);
            $blce_amt=$t5['balance'];
            
        ?>
      <p style="color:blue;">Balance: <?php echo $blce_amt; ?></p>
      <?php
      }
      ?>
      <p>Credit/Debit</p>
      <input class="card" id="visa" type="button" name="card" value="">
        <input class="card" id="mastercard" type="button" name="card" value="">
    </div>

    <div id="payment">

        
        

        
      
    
        <label>Credit Card Number</label>
        <input id="cardnumber" type=text pattern="[0-9]{13,16}" name="cardnumber" requierd="true" placeholder="0123-4567-8901-2345">

        <label>Card Holder</label>
       <input id="cardholder" type="text" name="name" requierd="true" maxlength="50" placeholder="Cardholder">

        <label>Expiration Date</label>
        <label id="cvc-label">CVC/CVV</label>
        <div id="left">
            <select name="month" id="month" onchange="" size="1" required="">
              <option value="00">MM</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
        <p>/</p>
        <select name="year" id="year" onchange="" size="1" required>
              <option value="00">YY</option>
              <option value="01">18</option>
              <option value="02">19</option>
              <option value="03">20</option>
              <option value="04">21</option>
              <option value="05">22</option>
              <option value="06">23</option>
              <option value="07">24</option>
              <option value="08">25</option>
              <option value="09">26</option>
              <option value="10">27</option>
            </select>
        </div>


        <input id="cvc" name="cvv" type="text" placeholder="Cvc/Cvv" maxlength="3" />
        <label>Amount</label>
       <input id="cardholder" type="number" min="1" max="10000" name="amt" requierd="true"  placeholder="Amount">
       <input class="btn" type="submit" name="gl_wallet_addbtn" value="ADD">
      
    </div>

  </div>
</div>
        </form>
<?php
    if(isset($_POST["gl_wallet_addbtn"])){
               $gl_cardno= htmlspecialchars($_POST['cardnumber']);
               $gl_cvv=htmlspecialchars($_POST['cvv']); 
               $gl_amt=htmlspecialchars($_POST['amt']); 
               $uname=$_SESSION['uname'];
               $sql2="SELECT `w_id`, `uname`,`balance`, `status` FROM `wallet` WHERE uname=$uname";
               $result=mysqli_query($con,$sql2);
               $t=mysqli_fetch_array($result);
               $blce_amt=$t['balance'];
               if($t['status']==1 ) {
                   $amt=$gl_amt+$t['balance'];
                   $sql3="UPDATE `wallet` SET `balance`=$amt WHERE uname=$uname;";
                   $result3=mysqli_query($con,$sql3);
                   echo "<script> alert('Money Added'); </script>";
               }
               else{

                   $sql1="INSERT INTO `wallet`(`uname`, `balance`, `status`) VALUES ($uname,$gl_amt,1);";
                   if (mysqli_query($con,$sql1) > 0){
                       echo "<script> alert('Added'); </script>";
                   }
                   else{
                       echo "<script> alert ('Unsuccessfull !'); </script>";
                   }
               }
       }
    ?> 
  
</body>
</html>
