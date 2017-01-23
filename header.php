<html>
	<head>
        
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "css/bootstrap.css">
<script src = "js/bootstrap.min.js"></script>
    
    <link rel = "stylesheet" href="Home.css">
	<script type="text/javascript" src = 'jquery-2.1.4.min.js'></script>
	<script type="text/javascript">
    
	function submitform(val)
		{
			$("#hx").val(val);
			document.galleryFrom.submit();
		}
	$(function(){
		$("#dbBTn").click(function(){
			if($("#dashboardPanel").is(":visible") == false){
				$("#dashboardPanel").fadeIn();
			}
			else {
				$("#dashboardPanel").fadeOut();
			}
		});
		
	});

	
	</script>
		<style>

		header {
			margin-left: 200px;
			border-style: solid;
			border-width: thin;
			border-radius: 10px;
			box-shadow: 1px 1px 1px;
			height: 200px;
			width: 950px;
		}
		#logo1 {
			
			margin-left: 0px;
			margin-bottom: 40px;
		}

		#logo2 {
			margin-left: 400px;
			height: 199px;
		}
		
		#nav ul {
			font-family: arial black;
			font-size: 12px;
			position: absolute;
			margin-left: 393px;
			margin-top: -46px;
			border-style: groove;
			border-bottom-left-radius: 20px;
			border-top-left-radius: 20px;
			border-bottom-right-radius: 10px;
			background-color: white;
			opacity: 0.9;
			padding-left: 0px;
			width: 550px;
			padding-top: 5px;
			padding-bottom: 0px;
			height:24px;
		}
		#nav ul li {

			cursor: pointer;
			text-shadow: 1px 1px 3px #543F1A;
			display: inline;
			margin-right: 0px;
			margin-left: 0px;
			padding-left:30px;
			padding-right: 20px;
			padding-top: 10px;
			padding-bottom: 0px;
		}

		#loginpanel ul{
			font-family: arial;
            color:  #9d9d9d;
			font-size: 12px;

            margin-top: 10px;
            margin-bottom: -10px;
            
			padding-left: 0px;
			width: 250px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
         
		#loginpanel ul li
		{	cursor: pointer;
			margin-right: 0px;
			margin-left: 0px;
			padding-left:30px;
			padding-right: 30px;
			padding-top: 10px;
			padding-bottom: 10px;
			display: inline;

            }
		a {
			text-decoration: none;
			color: black;
		}
		/*#logoutBtn{
			background-color:  #3b3b3b;
			color: white;
			font-family: arial;
			font-size: 10px;
			border-radius: 5px;
            height:32px;
		}   */
	/*	#logout{
			position: absolute;
			left: 465px;
			top: 190px;
			display: none;  
		}  */
	/*	#dashboard{
			position: absolute;
			left: 465px;
			top: 170px;
			display: none;     
			
		}  */
            
            #dashboard{
                margin-top: 7px;
                margin-bottom: -10px;
                display: none;
            }
            #logout{
                margin-top: 7px;
                margin-bottom: -10px;
                display: none;
                margin-left: 5px;
            }
            
            
            
	#dbBTn{
        background: #141313;
        height:35px;
        margin-top:-5px;
        margin-left:10px;
        color:#ebe9e9;
        font-size: 12px;
        border: none;
        border-radius: 5px; 
      
   
            }
            #dbBTn:hover{
        background: linear-gradient(#8b0d0d, black)
            }
            
        #logoutBtn{
        background: #141313;
        height:35px;
        margin-left: 10px;
        margin-top:-5px;
        color:#ebe9e9;
        font-size: 12px;
        border: none;
        border-radius: 5px; 
   
            }
            #logoutBtn:hover{
        background: linear-gradient(#8b0d0d, black)
            }
		#dashboardPanel{
			position: absolute;
			top: 28%;
			left:90%;
			display: none;
			width: 200px;
			height: 40px;
			
		}
		.dboard {
			border-radius: 5px;
			width: 120px;
			font-size: 10px;
			color: white;
            }
		#editDeleteBtn{
			margin-top: -13px;
		}
            .col-md-7 img{
                margin-top:50px;
                width:250px;
                margin-right: 40px;
            }
            
        .container-fluid{
             background-color:#520505;
             height: 40px;
             border-radius:4px;
    
}

		</style>
		<?php

	if (isset($_SESSION['SID'])){
	echo "<style>#loginpanel {display:none;} #welcome {display:block;} #logout{display:block;}</style>";
	$sid = $_SESSION['SID'];
		if($sid == 'admin'){
			echo "<style>#dashboard {display:block;}</style>";
		}
	}





	?>
	</head>
    
    
    
                <div class="row" id = "header">
                <!--Sidebar Navigation-->
                    <div class="col-md-5 hidden-sm hidden-xs" id = "logo_fixed" >
                        <img src = "Images/Banner/shopping1.png" id = "picture_logo">
                    </div>
                    <div class="col-md-7" >
                        <center>
                            <img src="Images/logo.png">
                            
                        </center>
                        
                        
                    </div>
            </div>
    
           <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Fashion Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href = 'javascript: submitform("gallery")'>Gallery</a></li>
              </ul>
              <form class="navbar-form navbar-right" role="search">
              <ul class="nav navbar-nav navbar-right">
                <li>
                    <div id = 'loginpanel'>
                    <ul>
                        <li id = 'register'>REGISTER</li>
                        <li id = 'login'>LOGIN</li>

                    </ul>
			         </div>  
                </li>
                <li><a href='cart.php'><span class = "glyphicon glyphicon-shopping-cart" id = "glyph_order"></span></a></li>
                            
            <li><div id = 'dashboard'><form action = 'dashboard.php'><input type = 'button' id = 'dbBTn'value = 'DASHBOARD' class = "btn btn-inverse"></input></form></div></li>
              
			<li><div id = 'logout'><form action = 'logout.php'><input type = 'submit' id = 'logoutBtn'value = 'LOGOUT' class = "btn btn-inverse"></input></form></div></li>
                  
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    
    
    
		<div id = 'dashboardPanel'>
				<form action = 'dashboard.php'><input class = 'dboard btn btn-primary' id = 'addNew'type ='submit' value = 'Add New Product'></input></form>
				<form action = 'editdelete.php'><input class = 'dboard btn btn-primary' id = 'editDeleteBtn'type ='submit' value = 'Edit/Delete Product'></input></form>
        </div>
	<body>
		
	</body>



</html>


