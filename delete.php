<?php
include 'conn.php';


if (isset($_POST['idToDelete'])){
	$cartprodID = $_POST['idToDelete'];

	$sql = "DELETE FROM cart WHERE productID = $cartprodID";
	if ($result=mysql_query($sql,$conn)){
		header("location:cart.php");
	}
	else {
	echo"failed";
	echo "$prodID";
	}
}
else {
	$sql = "DELETE FROM cart";
	if ($result=mysql_query($sql,$conn)){
	header("location:cart.php");
	}
	else {
	echo "deletion failed";
	}
}




?>