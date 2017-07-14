<?php

require 'includes/connect.php';
require 'register_handler.php';

 //Declaring variables to prevent error

?>

<!DOCTYPE html>
<html>
	<head>
		<title>seller registration</title>
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

		<div class="container">
		  <div class="col-sm-offset-4"><h2>Seller Registration Page</h2></div><br>
                  <form class="form-horizontal" id = "sell_reg" action="seller_reg1.php" method="POST" enctype="multipart/form-data">
		  
		  <h3>Owner's Personal Information &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Organization Details</h3>
		  <br>
		  
			    <div class="form-group">
			      <label class="control-label col-sm-2" >Owner Name:</label>
			      <div class="col-sm-3">
			        <input type="text" class="form-control"  placeholder="Enter Owner's Name.." name="owner_name" value="<?php 
						if(isset($_SESSION['owner_name'])) {
							echo $_SESSION['owner_name'];
							} 
							?>" required>
			      </div>
			    
			      <label class="control-label col-sm-offset-2 col-sm-2" >Store Name:</label>
			      <div class="col-sm-3">
			        <input type="text" class="form-control"  placeholder="Enter Store Name.." name="store_name"
			        value="<?php 
						if(isset($_SESSION['store_name'])) {
							echo $_SESSION['store_name'];
							} 
							?>" required>
			      </div>
			    </div>
		    
			    <div class="form-group">
			    	<label class="control-label col-sm-2" >Gender:</label>
			    	<div class="col-sm-3">
				        <label class="radio-inline "><input type="radio" name="gender" value="Male">Male</label>
						<label class="radio-inline "><input type="radio" name="gender" value="Female">Female</label>
						<label class="radio-inline "><input type="radio" name="gender" value="Others">Others</label>
					</div>

					<label class="control-label col-sm-offset-2 col-sm-2" >Category:</label>
				      <div class="col-sm-3">
				        <input type="text" class="form-control" id="category" placeholder="" name="category" value="<?php 
						if(isset($_SESSION['category'])) {
							echo $_SESSION['category'];
							} 
							?>" required>
				      </div>

			    </div>

			    <div class="form-group">        
			      <label class="control-label col-sm-2">D.O.B:</label>
			      <div class="col-sm-3">
			      	<input type="date" class="form-control"  name="dob" placeholder="Date of Birth"  required>
			      </div>

			      <label class="control-label col-sm-offset-2 col-sm-2">Store Address:</label>
			      <div class=" col-sm-3">
			      	<textarea class="form-control" rows="2"  name="org_address"  required></textarea>
			      </div>
			    </div>

			     <div class="form-group">        
			      <label class="control-label col-sm-2">Address:</label>
			      <div class="col-sm-3">
			      	<textarea class="form-control" rows="2" name="sell_address"  required></textarea>
			      </div>

			      <label class="control-label col-sm-offset-2 col-sm-2">Contact:</label>
			      <div class="col-sm-3">
			      	
			  			<input name="contact" placeholder="Enter 10 digits" class="form-control" type="text" value="<?php 
						if(isset($_SESSION['contact'])) {
							echo $_SESSION['contact'];
							} 
							?>"
			  			required>
			  			<?php if(in_array("Enter a valid 10 digit contact no.<br>", $error_array))  echo "Enter a valid 10 digit contact no.<br>";
						 ?>
			      </div>

			    </div>

			    <div class="form-group">        
			      <label class="control-label col-sm-2">Mobile:</label>
			      <div class="col-sm-3">
			      	
			  			<input name="mobile" placeholder="Enter 10 digits" class="form-control" type="text" 
			  	   value="<?php 
						if(isset($_SESSION['mobile'])) {
							echo $_SESSION['mobile'];
							} 
							?>"	required>
							<?php if(in_array("Enter a valid 10 digit mobile no.<br>", $error_array))  echo "Enter a valid 10 digit mobile no.<br>";
						 ?>
			      </div>

			      <label class="control-label col-sm-offset-2 col-sm-2">Store Email:</label>
			      <div class="col-sm-3">
			      	
			  			<input name="org_email" placeholder="xyz@gmail.com" class="form-control" type="text"
			  			value="<?php 
						if(isset($_SESSION['org_email'])) {
							echo $_SESSION['org_email'];
							} 
							?>" required>
							<br>
						<?php if(in_array("This Email already in use<br>", $error_array))  echo "This Email already in use<br>";
						 else if(in_array("INAVLID FORMAT!<br>", $error_array))  echo "INAVLID FORMAT!<br>";?>
			      </div>

			    </div>

			    <div class="form-group">        
			    <label class="control-label col-sm-2">Email:</label>
			      <div class="col-sm-3">
			      	
			  			<input name="owner_email" placeholder="xyz@gmail.com" class="form-control" type="text" value="<?php 
						if(isset($_SESSION['owner_email'])) {
							echo $_SESSION['owner_email'];
							} 
							?>" required>
							<br>
						<?php if(in_array("Email already in use<br>", $error_array))  echo "Email already in use<br>";
						 else if(in_array("INAVLID FORMAT<br>", $error_array))  echo "INAVLID FORMAT<br>";?>
			      </div>

			      <label class="control-label col-sm-offset-2 col-sm-2">Website:</label>
			      	<div class="col-sm-3">
			      	 <input type="url" name="website" class="form-control" placeholder="e.g. www.xyz.com" value="<?php 
						if(isset($_SESSION['website'])) {
							echo $_SESSION['website'];
							} 
							?>" required >
							<?php if(in_array("This website is already in use<br>", $error_array))  echo "This website is already in use<br>";?>

			      	 </div>
			    </div>

			     <div class="form-group"> 
				 
				
			    <label class="control-label col-sm-offset-7 col-sm-2">Cover image:</label>
			    
			      <div class="col-sm-3">
			      	
			  			<input type='hidden' name='size' value='1000000'>
                                                <div>
                                             Select image to upload:<input type="file" name="image">
                                             
                                               </div>
                                                
			      </div>

			      
			    </div>


			     <div class="form-group"> 
				 <div class=" col-sm-offset-2 col-sm-5">
				 <input type="submit" class="btn btn-lg btn-success " value="Register" name="sell_reg">
				 </div>
			      
			    <label class="control-label col-sm-offset-7 col-sm-2">Description:</label>
			      <div class="col-sm-3">
			      	
			  		<textarea class="form-control" rows="2" name="org_description" placeholder="About your store"  required></textarea>
			      </div>

			      
			    </div>

		   
		  </form>
		</div>

	</body>
	
</html>