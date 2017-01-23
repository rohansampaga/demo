<?php
session_start();
if (isset($_SESSION['SID']) == false){
	header("Location:index.php");
}


include 'conn.php';
include 'header.php';

if (isset($_POST['hx'])){
	$sample = $_POST['hx'];
if ($sample == 'gallery'){
	$sql = "SELECT productID, productName, price, image FROM product";
}
else {
	$sql = "SELECT productID, productName, price, image FROM product WHERE catID = $sample";
}
}
else {
	$sql = "SELECT productID, productName, price, image FROM product";
}


$result = mysql_query($sql, $conn) or die(mysql_error());

?>

<html>
<head>
	<style type="text/css">
	#galleryContainer {
		margin-top: 20px;
		width: 880px;
		margin-left: 200px;
		background-color:#222222;
		padding-top: 30px;
		border-radius: 20px;
	}
	#galleryContainer table {
		width: 200px;
		text-align: center;
		border-style: solid;
		border-width: thin;
		margin-left: 30px;
		margin-bottom: 30px;
		background-color: white;
		box-shadow: 2px 2px 2px;
		font-family: Lucida Sans Unicode;
		font-size: 13px;
        color:white;
	}
	#galleryContainer table td {
		
		padding-bottom: 20px;

	}

	.viewBtn{
		background-color: dimgrey;
		color: white;
		border-radius: 5px;
		font-size: 12px;
	}
	#overlay {
	position: fixed;
	top: 0px;
	height: 3000px;
	width: 2000px;
	background-color: black;
	display: none;
	opacity: 0.7;
	}

	#viewFrame {
		width: 600px;
		height: 320px;
		background-color: black;
		position: fixed;
		margin-left: 400px;
		margin-top: -60px;
		border-radius: 20px;
		display:none;
	}
	#itemFrame {
		margin-top: 10px;
		margin-left: 10px;
		width: 580px;
		height: 300px;
		background-color: #EFEFEF;
		border-radius: 10px;
	}
	#main {
		margin-top: 30px;
		margin-left: 30px;
		box-shadow: 2px 2px 5px;
	}
	#item {
		float: left;

	}
	#details {
		text-align: center;
		margin-top: 30px;
		margin-left: 30px;
		width: 280px;
		height: 200px;
		float: left;
		line-height: 40px;
	}
	#details table {
		margin-left: 30px;
	}
	#details table td {
		padding-left: 10px;
	}
	#prodLabel {
		font-family: Lucida Sans Unicode;
		font-weight: bold;
	}
	#priceLabel {
		font-family: arial black;
	}
	#qtyTB {
		width: 50px;
		border-radius: 5px;
	}
	#addBtn {
		border-radius: 5px;
		background-color: dimgray;
		font-family: arial;
		font-weight: bold;
		font-size: 11px;
		color: white;
	}

	</style>
	<script type="text/javascript" src = "jquery-2.1.4.min.js" ></script>
			<script type="text/javascript">
				
				$(function(){
					$("#overlay").click(function(){
						$("#overlay").fadeOut();
						$("#viewFrame").fadeOut();
					});
					$(".viewBtn").click(function(){
						var id = $(this).parent().attr("id");
						var imgsrc = $(this).parent().children("img").attr("src");
						var prodName = $(this).parent().children("#prodName").val();
						var price = $(this).parent().children("#priceTB").val();

						$("#productID").val(id);
						$("#productName").val(prodName);
						$("#productprice").val(price);
						$("#productimg").val(imgsrc);

						$("#overlay").fadeIn();
						$("#viewFrame").fadeIn();
						$("#main").attr("src",imgsrc);
						$("#prodLabel").empty();
						$("#prodLabel").append(prodName);
						$("#priceLabel").empty();
						$("#priceLabel").append(price);
					});

				});
				function submitform(val)
				{
					$("#hx").val(val);
					document.galleryForm.submit();
				}
			</script>
			</script>
	</head>
	
		<body>
			<div id = 'overlay'></div>
			<div id = 'viewFrame'>
				<div id = 'itemFrame'>
					<div id = 'item'><img id = "main" src = "" width = "220" height = "240"></img></div>
					<div id = 'details'><form action = 'addtocart.php' method = 'POST'>
						<p><label id = 'prodLabel'></label></p>
						<p><label id = 'priceLabel' ></label></p>
						<table><td>Qty</td><td><input id = 'qtyTB' name = 'qtyTB' type = 'number' min = '0' required></input></td>
							<input id = "productID" name = "productID" type = 'hidden' value = ''></input>
							<input id = "productName" name = "productName" type = 'hidden' value = ''></input>
							<input id = "productprice" name = "price" type = 'hidden' value = ''></input>
							<input id = "productimg" name = "image" type = 'hidden' value = ''></input>
							<td><input id = 'addBtn'type = 'submit' value = "Add to Cart"></input></td></table>
						</form>
					</div>
				</div>
			</div>
			<div id = "galleryContainer">
				<?php
						while($row=mysql_fetch_array($result)){
						$prodID = $row['productID'];
						$name = $row['productName'];
						$price = $row['price'];
						$img = $row['image'];

						echo "<table style='display:inline'><td id = '$prodID'><img src = '$img' width = '180' height = '200'><p>$name</p>$price<input type = 'hidden'  name = 'prodID' value = '$prodID'";
						echo "<br><br><input type = 'button' class = 'viewBtn' value = 'View'></input>";
						echo "<input type = 'hidden' id = 'prodName' value = '$name'></input><input type = 'hidden' id = 'priceTB' value = '$price'></input></td></tr></table>";
						}
						
						
					
					
				?>
			
			
		</div>

		</body>
</html>