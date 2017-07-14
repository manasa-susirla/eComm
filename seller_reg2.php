<?php

require 'includes/connect.php';

 //Declaring variables to prevent error

$user_id="";
$pass_1 = "";
$pass_2 = "";
$error_array = array();

if(isset($_POST['user_reg'])){

	$user_id = strip_tags($_POST['user_name']); 
 	$_SESSION['user_name'] = $user_id; 

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

 	$check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username = '$user_id'");

 	$count = mysqli_num_rows($check_username_query);

 	if($count > 0)
 		array_push($error_array, "This user id is taken...<br>");

 	if(empty($error_array)) {

 		$query =mysqli_query($con,"INSERT INTO users VALUES ('','$user_id','$pass_1')");
                session_start();
                $_SESSION['user_name'] =$user_id;
 		header("Location: home1.php");

 		
 		$_SESSION['pass1'] = "";
 		$_SESSION['pass2'] = "";
 		

	}

}
 	



 	
 	

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/seller_profile.css">
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
  	<body>
            <?php include 'includes/header.php'; ?>
            

		<div class="container">
		  <div class="col-sm-offset-4"><h2>Create Username and Password</h2></div><br>
		  <br><br><br><br>
		  <form class="form-horizontal" id = "" action="seller_reg2.php" method="POST">
		  
		 
		  <br>
		  
			    <div class="form-group">
			      <label class="control-label col-sm-offset-2 col-sm-2" >Username:</label>
			      <div class="col-sm-offset-1 col-sm-5">
			        <input type="text" class="form-control"  placeholder="Pick a Username" name="user_name"  value="<?php 
						if(isset($_SESSION['user_name'])) {
							echo $_SESSION['user_name'];
							} 
							?>" required>
							<br>
						<?php if(in_array("This user id is taken...<br>", $error_array))  echo "This user id is taken...<br>";?>
			      </div>
			    
			      
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-offset-2 col-sm-2" >Password:</label>
			      <div class="col-sm-offset-1 col-sm-5">
			        <input type="password" class="form-control"  placeholder="****" name="pass1" required>
			      </div>
			    
			      
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-offset-2 col-sm-2" >Confirm Password:</label>
			      <div class="col-sm-offset-1 col-sm-5">
			        <input type="password" class="form-control"  placeholder="****" name="pass2" required>

			        <br>

						<?php if(in_array("Your passwords dont match<br>", $error_array))  echo "Your passwords dont match<br>";
						 else if(in_array("Your password can only contain english characters or numbers<br>", $error_array))  echo "Your password can only contain english characters or numbers<br>";
						 else if(in_array("Your password must be between 5 and 40 characters<br>", $error_array))  echo "Your password must be between 5 and 40 characters<br>";?>
			      </div>
			    
			      
			    </div>


		    
			   

			     <div class="form-group"> 
				 <div class=" col-sm-offset-2 col-sm-8">
				 <input type="submit" class="btn btn-lg btn-block btn-success " value="Register" name="user_reg">
				
				 </div>

				 </div>

		   
		  </form>
		</div>
            <?php include 'includes/footer.php'; ?>
	</body>
	
</html>