<?php
session_start();
include 'conn.php';
include 'header.php';

?>


<!doctype html>
<html>
<head>
	<title>Juan Store - Home Page</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <script src = "js/bootstrap.min.js"></script>
	<link rel = 'stylesheet' href = 'main.css'></link>
	<script type="text/javascript" src = 'jquery-2.1.4.min.js'></script>
	<script type="text/javascript">
		$(function(){
			$('#home').click(function(){
				$('#home').css('color','red');
			});
			setInterval('swapImages()', 2000);

			$("#1").click(function(){
				$("#img1").fadeIn();
				$("#img2").hide();
				$("#img3").hide();
				$("#img1").fadeOut();
			});
			$("#2").click(function(){
				$("#img2").fadeIn();
				$("#img1").hide();
				$("#img3").hide();
				$("#img2").fadeOut();
			});
			$("#3").click(function(){
				$("#img3").fadeIn();
				$("#img2").hide();
				$("#img1").hide();
				$("#img3").fadeOut();
			});


			$('#register').click(function(){
				$('#overlay').fadeIn();
				$("#regFrame").fadeIn();

			});
			$('#login').click(function(){
				$('#overlay').fadeIn();
				$("#loginFrame").fadeIn();

			});

			$('#overlay').click(function (){
				$('#overlay').fadeOut();
				$('#regFrame').fadeOut();
				$('#loginFrame').fadeOut();

			});

			$("#loginBtn").click(function(){
					
					var uname = $("#unameTB1").val();
					var pword = $("#pwordTB1").val();
					$.post("login.php",{uname:uname,pword:pword},function(data){
					
					});
				});

			$("#regBtn").click(function(){
					var pword = $("#pwordTB").val();
					var pword2 = $("#pword2TB").val();
					if (pword != pword2){
							$("#errorLabel").empty();
							$("#errorLabel").append("Passwords don't match");
							return false;
					}
			});
			$("#resetBtn").click(function(){
				$("errorLabel").empty();
			});
				

		});

		function swapImages(){
			var $active = $('#content1 .active');
			var $next = ($('#content1 .active').next().length > 0) ? $('#content1 .active').next() : $('#content1 img:first');
			$active.fadeOut(function(){
    			$active.removeClass('active');
    			$next.fadeIn().addClass('active');
				});
		}
		function submitform(val)
		{
			$("#hx").val(val);
			document.men.submit();
		}
		function submitform(val)
		{
			$("#hx1").val(val);
			document.women.submit();
		}
	</script>

	
</head>
	
	<body>
		
		
		<div id = 'regFrame'>
			<div id = 'innerFrame'>
				<p><label> REGISTER</label></p>
				<form action = 'register.php' method = 'POST'>
				<table>
					<tr><td>Name:</td><td><input type = 'text' id = 'unameTB'  name = 'custName' required></td></tr>
					<tr><td>Address:</td><td><input type = 'text' id = 'unameTB'  name = 'custAdd' required></td></tr>
					<tr><td>Contact:</td><td><input type = 'text' id = 'unameTB'  name = 'custCon' required></td></tr>
					<tr><td>Password:</td><td><input type = 'password' id = 'pwordTB' name = 'custPword' required></td></tr>
					<tr><td>Re-type password:</td><td><input type = 'password' id = 'pword2TB' name = 'custPword2' required></td></tr>
					<tr><td colspan = '2' id = 'error'><div id = 'container'></div><br></td></tr>
				</table>
				<label id = 'errorLabel' value = ''></label>
				<input type ='reset' id = 'resetBtn'></input><input type ='submit' id = 'regBtn' value = 'Register'></input>
			</form>
			</div>
		</div>
		<div id = 'loginFrame'>
			<div id = 'innerFrame'>
				<p><label> LOGIN</label></p>
				<form action = 'login.php' method = 'POST'>
				<table>
					<tr><td>USERNAME:</td><td><input type = 'text' id = 'unameTB1'  name = 'uname1' required></td></tr>
					<tr><td>PASSWORD:</td><td><input type = 'password' id = 'pwordTB1' name = 'pword1' required></td></tr>
				</table>
				
				<input type ='reset' id = 'resetBtn'></input><input type ='submit' id = 'loginBtn' value = 'Login'></input>
			</form>
			</div>
		</div>
		<div id = 'mainframe'>
		<div id = 'sidebar'>
			<div id = 'searchpanel'>
				<p><label>Search</label></p>
				<input type = 'text' id = 'searchTB' placeholder = 'Search...'></input>
				<input type = 'button' id = 'searchBtn' value = 'Go'></input>
			</div>
			<div id = 'menpanel'>
				<p><label>MEN</label></p>
				<ul><form name = 'men' action = 'gallery.php' method = 'POST'>
					<input type='hidden' id='hx' name='hx' value=''>
					<li><a href = 'javascript: submitform("1")'>Long Sleeves</a></li>
					<li><a href = 'javascript: submitform("2")'>Jeans</a></li>
					<li><a href = 'javascript: submitform("3")'>T-shirts</a></li>
					<li><a href = ''>Footwear</a></li>
					<li><a href = ''>Shorts</a></li>
					<li><a href = 'javascript: submitform("4")'>Watches</a></li>
					</form>
				</ul>
			</div>
			<div id = 'womenpanel'>
				<p><label>WOMEN</label></p>
				<ul><form name = 'women' action = 'gallery.php' method = 'POST'>
				<input type='hidden' id='hx1' name='hx' value=''>
				<li><a href = 'javascript: submitform("5")'><b id="font">Dresses</b></a></li>
				<li><a href = ''>Churldar Suits</a></li>
				<li><a href = 'javascript: submitform("7")'>T-shirts</a></li>
				<li><a href = ''>Sandals</a></li>
				<li><a href = 'javascript: submitform("6")'>Office Wear</a></li>
				<li><a href = 'javascript: submitform("8")'>Artificial Jewelry</a></li>
				</form>
			</ul>
			</div>
			<div id = 'kidspanel'>
				<p><label>KIDS</label></p>
				<ul>
				<li><a href = ''>Baby Apparel</a></li>
				<li><a href = ''>Girls Apparel</a></li>
				<li><a href = ''>Boys Apparel</a></li>
				<li><a href = ''>Kids Toys</a></li>
			</ul>
			</div>
             <br><br>
			<div id = 'fillerpic'>
				<img src = 'Images\Banners and Logo\shopping logo.jpg' ></img>
			</div>
		</div>
		<div id = 'article'>
			<div><ul id = 'imageindex'>
					<li id = "1">1</li>
					<li id = "2">2</li>
					<li id = "3">3</li>
				</ul></div>
			<div id = 'content1'>
					<img class = 'active' src = "Images\Banners and Logo\banner2.png" width = "600" id = "img1">
					<img class = '' src = "Images\Banners and Logo\banner3.jpg" width = "600" id = "img2">
					<img class = '' src = "Images\Banners and Logo\banner4.jpg" width = "600" id = "img3">
			</div>

			<div id = 'content2'>
				<div id = 'content2pic'><img src = 'Images\Banners and Logo\main article.jpg' height = '200'></div>
				<div id = 'content2text'><p>Latest Fashion News</p>
					<label>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
						Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque 
						penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
						Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. 
						Nulla consequat massa quis enim. Donec pede justo, 
						fringilla vel, aliquet nec, vulputate eget, arcu.In enim justo, rhoncus ut, imperdiet a, v
						enenatis vitae, justo. 
						Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. 
						Vivamus elementum semper nisi.  </label>

				</div>



			</div>
			<div id = 'content3'>
				<div id = 'content3-1'>
					<img src = 'Images\Banners and Logo\article1-1.jpg' width = '180'>
					<p class = 'title'>Lorem Ipsum Dolor</p>
					<label>Lorem ipsum dolor sit amet,elit.Aenean commodo ligula eget dolor. 
						Aenean massa. Cum sociis et magni parturient montes, nascetur ridiculus mus. </label>
				</div>
				<div id = 'content3-2'>
					<img src = 'Images\Banners and Logo\article2-1.jpg' width = '210'>
					<p class = 'title'>Lorem Ipsum Dolor</p>
					<label>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </label>
				</div>
				<div id = 'content3-3'>
					<img src = 'Images\Banners and Logo\article3-1.jpg' width = '210'>
					<p class = 'title'>Lorem Ipsum Dolor</p>
					<label>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </label>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>