<?php
session_start();
include 'conn.php';
include 'header.php';

?>


<html>
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "css/bootstrap.css">
<script src = "js/bootstrap.min.js"></script>
<script type="text/javascript" src = "jquery-2.1.4.min.js" ></script>
<script type="text/javascript">
$(function(){
		
		});
	function submitform(val)
		{
			$("#hx").val(val);
			document.galleryFrom.submit();
		}
	function CopyMe(oFileInput, sTargetID) {
    	document.getElementById(sTargetID).value = oFileInput.value;
	}
	</script>
<head>
    

    
	<style>
	#dashBoardContainer {
		margin-top: 20px;
		width: 800px;
		margin-left: 200px;
		background: linear-gradient(#b4b4b4, black);
		padding-top: 30px;
		border-radius: 8px;
		font-family: Lucida Sans Unicode;
        padding: 10px;

	}
	table {
		margin-left: 60px;
	}
        
    #txt_image{
            width: 200px;
        }

	</style>
    

	</head>
<div id = 'dashBoardContainer'>

<form action = 'insertproduct.php' method = 'POST'>
<table cellspacing = '20px' cellpadding = '20px'>
	
	<tr><td>Product Name:</td>
        
    <td>
        <div class="form-group input-group">
        <input type = 'text' class = "form-control" name = 'productName' placeholder = 'Enter product Name'>
        </div>
    </td>
        
	</tr><tr><td>Category:</td>
    <td>
        <div class="form-group input-group">
        <select id = 'categoryID' name = 'categoryselect' class = "form-control">
										<option>Long-Sleeves</option>
										<option>Pants</option>
										<option>Mens Shirts</option>
										<option>Mens Watches</option>
										<option>Dresses</option>
										<option>Office Wear</option>
										<option>Womens Shirts</option>
										<option>Womens Watches</option>
										
        </select>
        </div>
    </td>
										
	</tr><tr><td><h5>Gender:</h5></td>
    <td>
        <div class="form-group input-group">
        <select id = 'genderID' name = 'genderselect' class = "form-control">
										<option>Male</option>
										<option>Female</option>
        </select>
        </div>
    </td>
										
	<tr><td>Price:</td>
        <td>
            <div class="form-group input-group">
            <input type = 'number' min = '0.00'name = 'price' placeholder = 'Enter price' class = "form-control">
            </div>
        </td>
        
	<tr><td>Image:</td>
        <td>
            <div class="form-group input-group">
            <input id="txtFileName" type="text" readonly="readonly" name = 'image' class = "form-control" id = "txt_image"><input class = 'buttons' type = 'file'  onchange="CopyMe(this, 'txtFileName');">
            <div class="form-group input-group">
        </td>								
	</tr><tr><td></input></td><td>
    <input type = 'button' class = 'buttons btn btn-primary' type = 'submit' value = 'Save'>
    <input class = 'buttons btn btn-primary' type = 'reset' value = 'Reset'></td>
	</tr>
</table>
</form>

</div>

</html>



