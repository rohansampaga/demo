<?php
include 'conn.php';

$productName = $_POST['productName'];
$price = $_POST['price'];
$category = $_POST['categoryselect'];
$gender = $_POST['genderselect'];
$image = $_POST['image'];
$trimimage = str_replace("C:\\fakepath\\", "", $image);



echo "$productName";
echo "$price";
echo "$category";
echo "$gender";

$catID = 0;
if ($category == 'Long-Sleeves'){
	$catID = 1;
	$path = "Images\\Mens\\Long Sleeve\\";

}
if ($category == 'Pants'){
	$catID = 2;
	$path = "Images\\Mens\\Pants\\";
}

if ($category == 'Mens Shirts'){
	$catID = 3;
	$path = "Images\\Mens\\Tshirts\\";
}
if ($category == 'Mens Watches'){
	$catID = 4;
	$path = "Images\\Mens\\Wa\\";
}
if ($category == 'Dresses'){
	$catID = 5;
	$path = "Images\\Womens\\dresesses\\";
}
if ($category == 'Office Wear'){
	$catID = 6;
	$path = "Images\\Womens\\office wear\\";
}
if ($category == 'Womens Shirts'){
	$catID = 7;
	$path = "Images\\Womens\\tshirt\\";
	
}
if ($category == 'Womens Watches'){
	$catID = 8;
	$path = "Images\\Womens\\watches\\";
}

$path = "$path$trimimage";
$newImage =str_replace("\\", "\\\\", $path);



$sql = "INSERT INTO product (productName,price,gender,catID,image) VALUES('$productName',$price,'$gender',$catID,'$newImage')";
if(mysql_query($sql,$conn) or die(mysql_error())){
	header("location:dashboard.php");
}




?>