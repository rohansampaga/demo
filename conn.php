<?php
$conn = @mysql_connect("localhost","root","") or die(mysql_error());
$dbconn = mysql_select_db("shopping cart", $conn) or die(mysql_error());
?>