<?php
include 'conn.php';

$uname = $_POST['uname1'];
$pword = $_POST['pword1'];
if ($uname == 'admin'){
		session_start();
		$_SESSION['SID'] = 'admin';
		header("location:index.php");

}
else {
	$sqlCust = "SELECT custName,custID FROM customer WHERE custID = $uname AND password = '$pword'";
	$resultCust = mysql_query($sqlCust,$conn) or die(mysql_error());
		while($row = mysql_fetch_array($resultCust)){
		$sid = $row['custName'];
		$name = strtok($sid, " ");
		$custID = $row['custID'];
		session_start();
		$_SESSION['SID'] = $name;
		$_SESSION['custID'] = $custID; 
		header("location:index.php");
		}
		

}

	

	


?>