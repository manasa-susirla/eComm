<?php

require 'includes/connect.php';

 //Declaring variables to prevent error
if(isset($_SESSION['buyer_user_name'])||isset($_SESSION['user_name']))
{
    header('Location: home1.php');
}

$user_id="";
$pass_1 = "";
$pass_2 = "";
$error_array = array();

if(isset($_POST['buyer_reg'])){

	$buyer_user_name = strip_tags($_POST['user_name']); 
 	$_SESSION['buyer_user_name'] = $buyer_user_name; 

 	$pass_1 = strip_tags($_POST['pass1']);

 	$pass_2 = strip_tags($_POST['pass2']);


 	if($pass_1 != $pass_2) {
 		array_push($error_array, "Your passwords dont match<br>");
 	}
 	else{
 		if(preg_match('/[^A-Za-z0-9]/', $pass_1)){
 			array_push($error_array, "Your password can only contain english characters or numbers<br>");
 		}
 	}

 	if( strlen($pass_1) > 40 || strlen($pass_1) < 5 ) {
 		array_push($error_array, "Your password must be between 5 and 40 characters<br>");
 	}

 	if(empty($error_array)) {

 		$pass_1 = md5($pass_1);

	}

 	$check_username_query = mysqli_query($con,"SELECT username FROM buyer_users WHERE username = '$buyer_user_name'");

 	$count = mysqli_num_rows($check_username_query);

 	if($count > 0)
 		array_push($error_array, "This user id is taken...<br>");

 	if(empty($error_array)) {

 		$query =mysqli_query($con,"INSERT INTO buyer_users VALUES ('','$buyer_user_name','$pass_1')");
                session_start();
                $_SESSION['buyer_user_name'] =$buyer_user_name;
 		header("Location: home1.php");

 		
 		$_SESSION['pass1'] = "";
 		$_SESSION['pass2'] = "";
 		

	}

}
 	?>









<html>
<head>
	<title> Ringel Website|Index </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/modal.css" rel="stylesheet" type="text/css"  media="all" />
        <!-- Custom CSS -->
       
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
</head>
<style>
    .navbar-brand {
    position: absolute;
    padding: 20px;
}
	button{
		cursor: pointer;
		background: #3B5998;
		color: #fff;
		padding: 8px 8px 8px 8px;
		font-size: 110%;
		font-family: sans-serif;
	}
	.registration{
		float: left;
		}
		#sign_button{
			cursor: pointer;
		}
		/* index file css */

		#login_button
		{
			width: 100%;
			cursor: pointer;
			background: #1A356E;
			color: #fff;
			padding:5px 30px 5px 30px;
			font-size: 150%;
			font-family: sans-serif;
		}
    footer{
                position: fixed;
                bottom: 0;
                width: 100%;
                padding: 1em;
                color: white;
                background-color: black;
                clear: left;
                text-align: center;
                
            }
		 #mobile_button
		{
			font-size:12px;
			height:30;
			width:150;
			background-color:#5B74A8; color:#FFFFFF;
			border-top:#29447E;
			border-right-color:#29447E;
			border-bottom-color:#1A356E;
			border-left-color:#29447E;
			font-weight:bold;
		}

		/* Sign Up */
		.inputbox
		{
			height:38;
			width:265;
			font-size:18px;
		}
		#sign_button
		{
			background:#69A74E;
			color:#FFFFFF;
			border-top-color:#3B6E22;
			border-right-color:#2C5115;
			border-left-color:#3B6E22;
			font-size:18px;
			height:40;
			width:112;
			font-weight:bold;
			box-shadow:5px 0px 10px 1px rgb(0,0,0);
		}
		.left{
			width:50%;
			float: left;

		}
		.left div{
			width: 95%;
			font-family: sans-serif;
			font-size: 125%;
			margin-top: 32.2%;
			margin-left: 7%;
			line-height: 125%;
		}
		.login{
			float: right;
			margin-top:2%;
			margin-right: 5%;
			position:absolute;left:81.8%;top:1.2%;
		}
		.login a{
			padding: 8% 28% 8% 28%;
			background: #1A356E;
			color: #fff;
			text-decoration: none;
			font-family: sans-serif;
			font-size: 120%;
		}
		.left a{
			margin-left: 7%;
		}
		.left a button{
			padding: 2% 4% 2% 4%;
			font-size: 115%;
		}
		#login_box{
			width:100%;
			height:4%;
			font-size: 125%;
		}
		#login_check_box{
			width: 10%;
			height:2%;
			font-size: 75%;

		}
</style>
<body>
	
	<!--body background -->
	<div style="position:absolute;left:0%;top:0%; height:100%; width:100%; z-index:-1; background:#E7EBF2">  </div> 
	
	
        <div style="height:10%;" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php"><img class="img-circle" src="img/logo.png"</a> 
           
      
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['user_name'])) {
                    ?>
                <li><a href = "home1.php"><span class = "glyphicon glyphicon-home"></span> Home </a></li>
                    <li><a href = "seller_account.php"><span class = "glyphicon glyphicon-cog"></span> Settings </a></li>
                    <li><a href = "seller_profile.php"><span class = "glyphicon glyphicon-user"></span> Profile</a></li>
                    <li><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-out"></span> Logout</a></li>
                    ?>
                    <?php
                } else {
                    ?>
                    <form method="post">
                        <li><a href=#openModal onclick="fun()"><h2><span class="glyphicon glyphicon-log-in"></span>Login</a></h2></li>
                    </form>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</div>
       
	<div id="openModal" class="modalDialog">
						<div> <a href="#close" title="Close" class="close">X</a>
                                                    <form  action="login_script.php" method="POST">
									<h2 style="text-align:center;">LOGIN</h2>
								<div>
									<span>Full Name: </span>
									<span><input type="text" name="username" id="login_box" /></span>
								</div>
								<div>
									<span>Password: </span>
									<span><input type="password" name="password" id="login_box"/></span>
								</div><br>
								<div>
									<span>Login as: </span><br>
									<span><input type="radio" name="usertype" id="login_check_box" value="buyer"/>Buyer</span><span><input type="radio" name="usertype" id="login_check_box" value="seller"/>Seller</span>
								</div>
								<div>
									<input type="submit" name="Submit" value="Sign in" id="login_button" />
								</div>
                                                                <?php echo $_GET['error']; ?>
							</form>
						</div>
				</div>
		<!--Left part-->
		<!--Seller registration -->
	<div class="left">
<!--	  <div>  RINGEL WEB TFCHNOLOGY PVT LTD brings a platform where e-commerce can be performed in style of social media as it is being popular day by day for communication and commercial purpose. It welcomes to type of user: Seller and Buyer. It enables a online chat option for sender and buyer to communicate directly.</div> -->
		
                <div>
                    <h1><b><center>RINGEL WEB TECHNOLOGY PVT LTD</center></b></h1>
                    <p><center>brings a platform where e-commerce can be performed in style of social media as it is being popular day by day for communication and commercial purpose. It welcomes to type of user: Seller and Buyer. It enables a online chat option for sender and buyer to communicate directly.</center> </p>
                            <br/>
                            
                            <center> <a  href="seller_reg1.php" class="btn btn-success btn-lg">Seller Registration</a></center>
                        </div>
	</div>   
                
<!-- Buyer Registration -->
<div class="registration">
	<form  method="POST" onSubmit="return check();" name="buyer_reg" action="index.php">
		<div style="position:absolute;left:64%; top:18.5%; color:#000066; font-size:200%;"> <h2> BUYER REGISTRATION</h2> </div>
		<div style="position:absolute;left:60.3%; top:30.1%; height:1; width:385; background-color:#CCCCCC;"> </div>
                <div style="position:absolute;left:62.4%; top:34%; font-size:16px; color:#000000; font-family:sans-serif"> Username </div>
		
		<div style="position:absolute;left:70.2%; top:33%; "> <input class="form-control" placeholder="Username" name="user_name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$"value="<?php 
						if(isset($_SESSION['user_name'])) {
							echo $_SESSION['user_name'];
							} 
							?>"><br>
						<?php if(in_array("This user id is taken...<br>", $error_array))  echo "This user id is taken...<br>";?></div>
		<div style="position:absolute;left:62.4%; top:41%; font-size:16px; color:#000000; font-family:sans-serif"> Password:  </div>
		<div style="position:absolute;left:70.2%; top:39.8%; "> <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="pass1" required = "true"> </div>
		<div style="position:absolute;left:58.9%; top:48%; font-size:16px; color:#000000; font-family:sans-serif"> Confirm Password:  </div>
                
		<div style="position:absolute;left:70.2%; top:46.8%; "> <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="pass2" required = "true">  </div>
                <br>
                <?php if(in_array("Your passwords dont match<br>", $error_array))  echo "Your passwords dont match<br>";
						 else if(in_array("Your password can only contain english characters or numbers<br>", $error_array))  echo "Your password can only contain english characters or numbers<br>";
						 else if(in_array("Your password must be between 5 and 40 characters<br>", $error_array))  echo "Your password must be between 5 and 40 characters<br>";?>
	
		<div style="position:absolute;left:72.2%; top:54%; ">  <input type="submit" name="buyer_reg" value="Sign Up" id="sign_button" > </div>
		<div style="position:absolute;left:75.2%;top:61.4%;font-size:150%; color:#000000; font-family:sans-serif"> or	 </div>
		<div style="position:absolute;left:70.6%; top:66.5%; font-size:16px; color:#000000; font-family:sans-serif; "><a href="#"><button>Sign in with facebook</button></a> </div>
		</div> 


    
<?php include 'includes/footer.php'; ?>
	</form>
	<!--Script for openModal-->
	<script>
		function fun()
		{
			var y = document.getElementById('hide1').value;
		}

</script>
</body>
</html>
