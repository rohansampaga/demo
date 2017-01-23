<?php
include 'conn.php';
$custName = $_POST['custName'];
$custAdd = $_POST['custAdd'];
$custCon = $_POST['custCon'];
$custPass = $_POST['custPword'];
$custPass2 = $_POST['custPword2'];

$sql = "INSERT INTO customer VALUES(NULL,'$custName','$custAdd','$custCon','$custPass')";

if (mysql_query($sql,$conn) or die(mysql_error())){
	$retrieve = "SELECT custID FROM customer WHERE custName = '$custName'";
	$result = mysql_query($retrieve,$conn) or die(mysql_error());
	while ($row = mysql_fetch_array($result)){
		$id = $row['custID'];

		echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Your login id is $id');
        window.location.replace('index.php');
    	</SCRIPT>";
	}
}


?>