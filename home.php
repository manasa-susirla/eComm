<?php 
require 'includes/connect.php';
if (isset($_SESSION['buyer_user_name'])||isset($_SESSION['user_name'])){
if (isset($_SESSION['buyer_user_name'])) {
     $buyer_user_name=$_SESSION['buyer_user_name'];
$result=mysqli_query($con,"SELECT buyerid FROM buyer_users WHERE username='".$buyer_user_name."'"); 
$row=mysqli_fetch_array($result);
$buyerid=$row['buyerid'];}

if (isset($_SESSION['user_name'])) {
     $user_name=$_SESSION['user_name'];
$result=mysqli_query($con,"SELECT id FROM users WHERE username='".$user_name."'"); 
$row=mysqli_fetch_array($result);
$sellerid=$row['id'];}
?>

<!DOCTYPE html>
<html>
<title>Welcome to Home Feed</title>
<meta charset="UTF-8">
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
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">
    <?php include 'includes/header.php'; ?>
    

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
        
      <!-- Profile -->
       
      <?php if(isset($_SESSION['buyer_user_name'])) { ?>
      <div class="w3-card-2 w3-round w3-white">
     
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"> <img src="<?php  ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-user-circle fa-fw w3-margin-right w3-text-theme"></i><?php echo $buyer_user_name ?></p>
    <!--  <p><i class="fa fa-link fa-fw w3-margin-right w3-text-theme"></i> <?php// echo $row['siteurl']; ?></p>
         <p><i class="fa fa-address-card fa-fw w3-margin-right w3-text-theme"></i> <?php //echo $row['address']; ?></p>  -->
        </div>
      </div>
     <?php } ?>
     <?php if(isset($_SESSION['user_name'])) {
         
$query="SELECT orgname,address,coverimage,siteurl,contact,email FROM org_info WHERE sellerid='".$sellerid."'";
$result= mysqli_query($con, $query);
 $row= mysqli_fetch_array($result);      
        
        ?>
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"> <img src="<?php echo "img/org_coverimg/".$row['coverimage'].""; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-user-circle fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['orgname']; ?></p>
         <p><i class="fa fa-link fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['siteurl']; ?></p>
         <p><i class="fa fa-address-card fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['address']; ?></p>
        </div>
      </div>
     <?php } ?>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Followers</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Products</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>New Collection Launched. Check out this website.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    
    <div class="w3-col m7">
        <?php if(isset($_SESSION['user_name'])){ ?>
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
                <h4 class="w3-opacity"><center>POST NEW PRODUCT</center></h4>
           
            <center>   <button onclick="location.href = 'postproduct.php'" id="myButton"  class="float-left submit-button btn-info" >Post Product</button></center>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
      
   <?php
         require('includes/connect.php');
         $user_name=$_SESSION['user_name'];
         $query="SELECT * FROM product_info";
         $result= mysqli_query($con, $query);
         while ($row = mysqli_fetch_array($result)) {
           $sellerinfo=$row['sellerid'];
            
            $result1= mysqli_query($con,"SELECT coverimage,orgname FROM org_info WHERE sellerid='".$sellerinfo."'");
            $row1= mysqli_fetch_array($result1);                    
    ?>
     
        

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="<?php echo "img/org_coverimg/".$row['coverimage'].""; ?>" alt="Store Image" class="w3-left w3-margin-right w3-block" style="width:60px">
        <span class="w3-right w3-opacity"><?php
date_default_timezone_set("India/Kolkata");
echo "Posted on " . date("h:i:sa");
?></span>
        
        <h4><?php echo"".$row1["orgname"].""?></h4><br>
        <hr class="w3-clear">
        <p>Have you seen this?</p>
        <img src="<?php echo "img/product_img/".$row['productimage'].""; ?>" style="width:75%" class="w3-margin-bottom">
        <p><b>Product Name:  </b><?php echo"".$row["productname"].""?><br>
            <b>Product Description:  </b><?php echo"".$row["description"].""?><br>
            <b>Product Category:  </b><?php echo"".$row["category"].""?><br>
            <b>Product Quantity:  </b><?php echo"".$row["quantity"].""?><br>
             
        </p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-heart"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Review</button> 
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="	fa fa-shopping-cart"></i>  Buy (<?php echo"".$row["quantity"].""?>) left!</button> 
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-share"></i>  Share</button> 
      </div> 
         <?php } ?>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
  
    </div>
    

  </div>
  

</div>
<br>


<?php include("includes/footer.php"); ?>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 
<?php } ?>