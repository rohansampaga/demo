<?php
include 'conn.php';

$prodID = $_POST['prodID'];
$pname = $_POST['pname'];
$cat = $_POST['cat'];
$gender = $_POST['gender'];
$price = $_POST['price'];
$image = $_POST['image'];
$newimage = str_replace('\\', '\\\\', $image);


$sql = "UPDATE product SET productName = '$pname', catID = $cat, gender = '$gender',price = $price, image = '$newimage' WHERE productID = $prodID ";

if (mysql_query($sql, $conn) or die(mysql_error())) {
	header("Location:editdelete.php");
}




?>