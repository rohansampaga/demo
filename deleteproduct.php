<?php
include 'conn.php';
include 'header.php';

if (isset($_POST['prodIDtoDELETE'])){
		$prodID = $_POST['prodIDtoDELETE'];

		$sql1 = "DELETE FROM product WHERE productID = $prodID";
	if ($result=mysql_query($sql1,$conn)){
		header("location:editdelete.php");
	}

}

?>
<html>
<style>
table {
	
	
	
}
label {	
	width: 200px;
	height: 40px;
	background-color: gray;
}
#container {
	text-align: center;
	margin-top: 20px;
	width:300px;
	border-style: solid;
	border-width: thin;
	
	
	box-shadow: 2px 2px 2px;
	margin-top: 20px;
	font-family: Lucida Sans Unicode;
	margin-left: 500px;
}
</style>
<?php
$prodID = $_POST['prodIDtoUPDATE'];
$sql = "SELECT * FROM product WHERE productID = $prodID";
$result = mysql_query($sql,$conn) or die(mysql_error());

while ($row = mysql_fetch_array($result)){
	$productID = $row['productID'];
	$catID = $row['catID'];
	$prodName = $row['productName'];
	$gender = $row['gender'];
	$price = $row['price'];
	$image = $row['image'];
	echo "<div id = 'container'";
	echo "<label>UPDATE PRODUCT INFORMATION</label>";
	echo "<table><form action = 'updateQuery.php' method = 'POST'>";
	echo "<input type = 'hidden' name = 'prodID' value = $productID></input>";
	echo "<tr><td>Product Name:</td><td><input type = 'text' name = 'pname' value = '$prodName' required></input></td></tr>";
	echo "<tr><td>Category:</td><td><input type = 'text' name = 'cat' value = '$catID' required></input></td></tr>";
	echo "<tr><td>Gender:</td><td><input type = 'text' name = 'gender' value = '$gender' required></input></td></tr>";
	echo "<tr><td>Price:</td><td><input type = 'text' name = 'price' value = '$price' required></input></td></tr>";
	echo "<tr><td>Image:</td><td><input type = 'text' name = 'image' value = '$image' required></input></td></tr>";
	echo "<tr><td><input type = 'submit' value = 'Update'></input></td></form>";
	echo "<td><form action = 'editdelete.php'><input type = 'submit' value = 'Cancel'></input></form></td></tr>";
	echo " </table>";
	echo "</div>";

}






?>





</html>