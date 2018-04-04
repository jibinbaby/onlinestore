<?php
include("conn.php");
?>
<html>
<head>
<title>How Genrate PDF From MYSQL Usig PHP</title>
</head>
<body>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="3318815534"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<p><a href="genratepdf.php" target="_blank">Generate PDF</a></p>
<table border="1">
<tr>
<td style="font-weight:bold;">EmpId</td>
<td style="font-weight:bold;">EmpName</td>
<td style="font-weight:bold;">EmpDepartment</td>
<td style="font-weight:bold;">EmpRegDate</td>
</tr>
<?php 
$sql = "SELECT * from  user";
echo $sql;
$query = mysqli_query($con,$sql);
while($results=mysqli_fetch_array($query))
 
	{ ?>

<tr>
<td><?php echo $results['uname'];?></td>
<td><?php echo $results['name'];?></td>
<td><?php echo $results['email'];?></td>
<td><?php echo $results['phone'];?></td>
</tr>

<?php } 
?>
</table>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- horizental ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="6662734336"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</html>