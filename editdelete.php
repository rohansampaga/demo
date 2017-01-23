<?php

session_start();
include 'conn.php';
include 'header.php';

$sql = "SELECT productID,productName,product.catID,gender,price,image,category.catName FROM product INNER JOIN category ON product.catID = category.catID ";
$result = mysql_query($sql, $conn) or die(mysql_error());

echo "<table cellpadding = 20px class = 'table table-striped table-hover custabs qwerk success table-responsive'><tr id = 'header'>";
echo "<td>Product Name</td><td>Category</td><td>Gender</td><td>Price</td><td>Image</td><td id = 'right' colspan = '2'>Action</td></tr>";

while ($row = mysql_fetch_array($result)){

	$prodID = $row['productID'];
	$catID = $row['catID'];
	$prodName = $row['productName'];
	$category = $row['catName'];
	$gender = $row['gender'];
	$price = $row['price'];
	$image = $row['image'];
	
	echo "<form action = 'deleteproduct.php' method = 'POST'><input type = 'hidden' name = 'prodIDtoUPDATE' value = $prodID></input>";
	echo "<tr><td>$prodName</td><td>$category</td><td>$gender</td><td>$price</td><td>$image</td><td class = 'right'><input type = 'submit' value = 'Update' class='btn btn-primary'></input></form></td>";
	echo "<td><form action = 'deleteproduct.php' method = 'POST'>";
	echo "<input type = 'hidden' name = 'prodIDtoDELETE' value = $prodID></input><input type = 'submit' value = 'Delete' class='btn btn-danger'></input></form></td></tr>";

}

echo "</table>";

?>
<html>
<script type="text/javascript" src = "jquery-2.1.4.min.js" ></script>
<script type="text/javascript">
function submitform(val)
		{
			$("#hx").val(val);
			document.galleryForm.submit();
		}
			</script>
<style>
	table {
		margin-top: 20px;
		font-family: Lucida Sans Unicode;
		font-size: 12px;

	}
	#header {
		font-size: 18px;
		text-align: center;
		background-color: #e3e3e3;

	}
	td {
		
		padding-bottom: 10px;
	}
</style>
</html>