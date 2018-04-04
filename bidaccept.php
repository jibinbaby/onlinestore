<?php
    session_start();
    include './analyticstracking.php';  
    if(!isset($_SESSION['uname'])){
        header("location:login.php");
    }
    include './conn.php';
	if(isset($_GET['bid_id'])){
	function decrypt($string, $key) {
				$result = '';
				$string = base64_decode($string);
				for($i=0; $i<strlen($string); $i++) {
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key))-1, 1);
				$char = chr(ord($char)-ord($keychar));
				$result.=$char;
				}
				return $result;
			}	
    $id=decrypt($_REQUEST['bid_id'],'dgafg12');
    $sql2="SELECT `bid_id`, `uname`, `amount`, `date`, `sitem_id`, `status` FROM `bid` WHERE status=1 and bid_id='$id' ";
    $records2= mysqli_query($con, $sql2);
    $result2= mysqli_fetch_array($records2);
    $sid=$result2['sitem_id'];
    
    $sql4="UPDATE `bid` SET `status`=0 WHERE sitem_id='$sid' and status=1";
    $results4=mysqli_query($con,$sql4);
    
    $sql3="UPDATE`sh_item` SET `status`=4 WHERE sitem_id=$sid ";
    $results3=mysqli_query($con,$sql3);
    
    $sql="UPDATE `bid` SET `status`=4 WHERE bid_id='$id' ";
    $results=mysqli_query($con,$sql);
    
    if($results3>0){
    if($results>0)
        {
?>
            <script>
                   window.location="viewbids.php";
                    alert("Accepted");
            </script>

<?php
        }
    }
        else{
		?>
		<script>
            alert("Can't Complete");
            window.location="viewbids.php";
		</script>
		<?php
        }
	}
?>

