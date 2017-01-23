<?php
include 'conn.php';

$insert = "INSERT INTO order_table (orderDate,custID,productID,quantity) SELECT orderDate,custID,productID,quantity FROM cart ";
mysql_query($insert,$conn) or die(mysql_error());
$delete = "DELETE FROM cart";
mysql_query($delete,$conn);
header("location:cart.php");




?>