<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
          border: 2px solid cyan;
          
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 500px;
          margin: auto;
          text-align: center;
          font-family: arial;
        }

        .title {
          color: grey;
          font-size: 18px;
        }

        button {
          border: none;
          outline: 0;
          display: inline-block;
          padding: 8px;
          color: white;
          background-color: #000;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
        }

        a {
          text-decoration: none;
          font-size: 22px;
          color: black;
        }

        button:hover, a:hover {
          opacity: 0.7;
        }
    </style>
    </head>
    <body>
<?php
include './conn.php';
session_start();

if (!empty($_POST["item_id"])) {

  $item_id = $_POST["item_id"];
  // $_SESSION['spid']=$_POST["cat_id"];
  $query = "SELECT `item_id`, `item_name`, `subcategory_id`, `price`, `stock`,"
          . " `description`, `img`, `category_id`, `offer_price`, `status` FROM `items` WHERE item_id = $item_id";

  $results = mysqli_query($con, $query);

  foreach($results as $res){
    ?>
        <div class="card" style="margin-top: 50px;">
<img src="<?php echo $res ["img"]; ?>" alt="item_img" width="150px" height="150px;">
  <br>
  <p style="font-size: 20px;"> <b>Name: <?php echo ucfirst($res["item_name"]); ?></b></p>
 <!--<form action="#" method="POST" name="item_edit_form">-->
  <p style="font-size: 20px;">  <b>Price: <?php echo $res["price"]; ?></b></p>
    <br> 
    <b>Stock:<?php echo $res["stock"]; ?> </b>
     <?php
     $stock=$res['stock'];
     if($stock < 10){
         echo "<p style='font-size:20px; color:red;'>Low Stock</p>";
     }
     else{
         echo "<p style='font-size:20px; color:green;'>In Stock</p>";
     }
     ?>
    <a  style="text-decoration: none; color: black;" href=<?php echo "edititems.php?item_id={$res['item_id']}" ?> >
        <input type="submit" name="submit"  value="EDIT" class="gl_item_addbtn" style="width:30%"/></a>
  <!--</form>-->
  </div>
    <?php
}
}
?>
    </body>
</html>