<?php
session_start();
include 'conn.php';
$custName = $_SESSION['SID'];
$sqlID = "SELECT custID FROM customer WHERE custName = '$custName'";
$resultID = mysql_query($sqlID,$conn) or die(mysql_error());
while ($row=mysql_fetch_array($resultID)){
	$custID = $row['custID'];
}

$prodID = $_POST['productID'];
$prodName = $_POST['productName'];
$price = $_POST['price'];

$image = $_POST['image'];
$newImg = str_replace("\\", "\\\\", $image);

$qty = $_POST['qtyTB'];
$totalPrice = $price * $qty;
date_default_timezone_set('Asia/Taipei');
$date = (string)date('Y-m-d');
//$date = "now";




$sql = "INSERT INTO cart(orderDate,custID,productID,quantity,price,image,prodName,totalPrice) VALUES('$date',$custID,$prodID,$qty,$price,'$newImg','$prodName',$totalPrice)";
if (mysql_query($sql,$conn) or die(mysql_error())){
header("Location:gallery.php");
}
?>