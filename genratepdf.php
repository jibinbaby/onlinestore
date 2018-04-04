<?php
require_once("conn.php");
ini_set("include_path", '/home/phpgurukul/php/PEAR:' . ini_get("include_path") );
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

// code for print Heading of tables
$pdf->SetFont('Arial','B',12);	
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='global_db' AND `TABLE_NAME`='user'";
$query1 = mysqli_query($con,$ret);
while($heading=mysqli_fetch_array($query1))
 {
foreach($heading as $column_heading)
$pdf->Cell(46,12,$column_heading,1);
}
//code for print data
$sql = "SELECT * from  user";
$query = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query))
 {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(46,12,$column,1);
}
$pdf->Output();
?>