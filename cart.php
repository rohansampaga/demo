<?php

session_start();
if (isset($_SESSION['SID']) == false){
	header("Location:index.php");
}

include 'conn.php';
include 'header.php';




$sql ="SELECT * FROM cart";
$sqlCOUNT = "SELECT COUNT(*) as itemCount FROM cart";
$result = mysql_query($sql,$conn) or die(mysql_error());
$resultCOUNT = mysql_query($sqlCOUNT, $conn) or die(mysql_error());

?>


<html>
<head>
<script type="text/javascript" src = "jquery-2.1.4.min.js" ></script>
<script type="text/javascript">
		$(function(){
		
		});
		function submitform(val)
		{
			$("#hx").val(val);
			document.galleryForm.submit();
		}
			</script>
<style>
#cartContainer {
	width: 700px;
	font-family: Lucida Sans Unicode;
	margin-left: 330px;
	margin-top: 10px;
	padding-left:30px;
	padding-bottom:40px;
}
table {
	padding-top:20px;
	padding-bottom:20px;
	width: 650px;
	border-bottom-style:solid;
	border-width: thin;
	
}
td {
	
}

#deleteBtn{
	border-radius:10px;
	height:20px;
	width:20px;
	font-size:8px;
	background-color:red;
	color:white;
}
#delete	{
	width: 10px;
}
#item {
	width: 70px;
}
#name {
	width: 160px;
	text-align: center;
	font-weight:bold;
	color:#086A87;
}
#price {
	text-align: right;
	width: 150px;
	margin-right: 0px;
	margin-left:20px;
	font-weight:bold;
}
#x {
	text-align: right;
	width: 50px;
}
#qty{
	width: 40px;
	text-align: left;
}
#subtotal{
	width: 150px;
	text-align: right;
	font-weight:bold;
}
#aaron {
	position:absolute;
	margin-left:480px;
	margin-top:-50px;
}
#totalValue {
	font-weight:bold;
}
#count{
	text-align: center;
	margin-left: 200px;
	margin-top:10px;
	font-family: Lucida Sans Unicode;
	font-size: 20px;
	font-weight: bold;
	border-style:outset;
	width:330px;
	border-radius:10px;
	background-color:dimgray;
	color:white;
}
#emptyBtn{
	background-color:red;
	color:white;
	border-radius:5px;
	font-size:11px;
}
#checkout{
	margin-top:50px;
	background-color:dimgray;
	color:white;
	border-radius:5px;
	font-size: 15px;
	height:30px;
	width:110px;
}
</style>
</head>

<body>
	<div id = 'count'>
		<?php
			while($rowCount = mysql_fetch_array($resultCOUNT)){
				$count = $rowCount['itemCount'];
				
				echo"Your shopping cart - $count items";
			}
			if ($count == 0){
				echo"<style>#aaron{display:none;} #checkout{display:none;} #emptyBtn {display:none;}</style>";
			}
		?>
	</div>
	<div id = "cartContainer">
	<?php
	while($row=mysql_fetch_array($result)){
		$orderDate = $row['orderDate'];
		$custID = $row['custID'];
		$prodID = $row['productID'];
		$qty = $row['quantity'];
		$img = $row['image'];
		$price = $row['price'];
		$prodName = $row['prodName'];
		$subTotal = $row['totalPrice'];


		echo"<table>";
		echo"<td id = 'delete'><form action = 'delete.php' method= 'POST'><input type = 'hidden' name = 'idToDelete' value ='$prodID'></input><input id = 'deleteBtn'type = 'submit' value = 'X'></form></td>";
		echo"<td id = 'item'><img src = '$img' width = '100' height = '120'></img></td>";
		echo"<td id = 'name'><label id = 'prodName'>$prodName</label></td>";
		echo"<td id = 'price'><label id = 'prodPrice'>PhP $price</label></td>";
		echo"<td id = 'x'>X</td>";
		echo"<td id = 'qty'>$qty</td>";
		echo"<td id = 'subtotal'>PhP $subTotal</td>";
		echo "</table>";
	}

	?>
	<p><form action = 'delete.php'><input type = 'submit' id = 'emptyBtn' value = 'Empty your cart'></input></form></p>
	<form action = 'insertToOrder.php'><input id = 'checkout' type = 'submit' value = "Checkout"></input></form><br>

<?php
$sqlSUm = "SELECT SUM(totalPrice) as total_sum FROM cart";
$resultSUM = mysql_query($sqlSUm, $conn) or die(mysql_error());
while($rowSUM = mysql_fetch_array($resultSUM)){

	$total = $rowSUM['total_sum'];

	echo "<div id = 'aaron'><label id = 'total'>Subtotal: </label><label id = 'totalValue'>PhP $total</label></div>";
}
?>



</div>
</body>

</html>