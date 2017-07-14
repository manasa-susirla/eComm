<?php 
require 'includes/connect.php';

if (isset($_SESSION['buyer_user_name'])||isset($_SESSION['user_name'])){
if (isset($_SESSION['buyer_user_name'])) {
     $buyer_user_name=$_SESSION['buyer_user_name'];
$result=mysqli_query($con,"SELECT buyerid FROM buyer_users WHERE username='".$buyer_user_name."'"); 
$row=mysqli_fetch_array($result);
$buyerid=$row['buyerid'];
$result5=mysqli_query($con,"SELECT * FROM buyer_info WHERE buyerid='".$buyerid."'");
$row2= mysqli_fetch_array($result5);

}
if(!empty($_GET)){ 
      $prodid=$_GET['prodid'];
      $seller_result= mysqli_query($con,"SELECT sellerid FROM product_info WHERE productid='".$prodid."'");
      
      $seller_row= mysqli_fetch_array($seller_result);
      $sell_id=$seller_row['sellerid'];
      $query="INSERT INTO product_likes VALUES('','".$prodid."','".$sell_id."','".$buyerid."')";
      $like_result=mysqli_query($con,$query);
}
      
      
      
  

if (isset($_SESSION['user_name'])) {
     $user_name=$_SESSION['user_name'];
$result=mysqli_query($con,"SELECT id FROM users WHERE username='".$user_name."'"); 
$row=mysqli_fetch_array($result);
$sellerid=$row['id'];}

//logic to insert comments into database using comment modal
  if(isset($_POST['comment_submit']))
  {

  }

//end of logic to insert comment
  
  
  
  
  
  
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
	<link href="css/modal.css" rel="stylesheet" type="text/css"  media="all" />
        <!-- Custom CSS -->
       
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

.comment_section {
  background-color:#dcdcdc;
  padding-top:5px;
  padding-bottom: 5px;


}

</style>
<body class="w3-theme-l5">
    <?php include 'includes/header.php'; ?>
    
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->

<?php if(isset($_SESSION['user_name'])) { 
$query="SELECT orgname,address,coverimage,siteurl,contact,email FROM org_info WHERE sellerid='".$sellerid."'";
$result= mysqli_query($con, $query);
 $row= mysqli_fetch_array($result);       
        
        ?>
<!-- Page Container -->

      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
          
         <h4 class="w3-center">My Profile </h4>
         <p class="w3-center"> <img src="<?php echo "img/org_coverimg/".$row['coverimage'].""; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-user-circle fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['orgname']; ?></p>
         <p><i class="fa fa-link fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['siteurl']; ?></p>
         <p><i class="fa fa-address-card fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['address']; ?></p>
        </div>
      </div>
<?php } ?>
      <br>
      <?php if(isset($_SESSION['buyer_user_name'])) { ?>
      <div class="w3-card-2 w3-round w3-white">
     
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"> <img src="<?php echo "img/buyer_img/".$row2['profilepic'].""; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-user-circle fa-fw w3-margin-right w3-text-theme"></i> <?php echo $buyer_user_name;?></p>
    <!--  <p><i class="fa fa-link fa-fw w3-margin-right w3-text-theme"></i> <?php// echo $row['siteurl']; ?></p>
         <p><i class="fa fa-address-card fa-fw w3-margin-right w3-text-theme"></i> <?php //echo $row['address']; ?></p>  -->
        </div>
      </div>
     <?php } ?>
      
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
     <?php if(isset($_SESSION['user_name'])) { ?>
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
             <h6 class="w3-opacity">POST NEW PRODUCT</h6>
            <center>   <button onclick="location.href = 'postproduct.php'" id="myButton" class="float-left submit-button" >Post Product</button></center>
            </div>
          </div>
        </div>
      </div>
     <?php } ?>
      
   <?php
         
         $user_name=$_SESSION['user_name'];
         $query="SELECT * FROM product_info";
         $result= mysqli_query($con, $query);
         $flag = 0;
         while ($row = mysqli_fetch_array($result)) {
            $sellerinfo=$row['sellerid'];
            $productname=$row['productname'];
            
             $result1= mysqli_query($con,"SELECT coverimage,orgname FROM org_info WHERE sellerid='".$sellerinfo."'");
             $row1= mysqli_fetch_array($result1); 

             $get_productid_query = mysqli_query($con,"SELECT productid FROM product_info WHERE sellerid = $sellerinfo AND productname = '".$productname."' ");
             $result_productinfo_query = mysqli_fetch_array($get_productid_query);
             $productid = $result_productinfo_query['productid'];
            // echo $productid;                   
    ?>
     
        

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="<?php echo "img/org_coverimg/".$row1['coverimage'].""; ?>" alt="Store Image" class="w3-left w3-margin-right w3-block" style="width:60px">
        <span class="w3-right w3-opacity"><?php

echo "Posted on " . date("h:i:sa");
?></span>
        
        <h4><a href="seller_profile.php?id=<?php echo $row['sellerid'];?>"><?php echo"".$row1["orgname"].""?></a></h4><br>
        <hr class="w3-clear">
        <p>Have you seen this?</p>
        <img src="<?php echo "img/product_img/".$row['productimage'].""; ?>" style="width:75%" class="w3-margin-bottom">
        <p><b>Product Name:  </b><?php echo"".$row["productname"].""?><br>
            <b>Product Description:  </b><?php echo"".$row["description"].""?><br>
            <b>Product Category:  </b><?php echo"".$row["category"].""?><br>
            <b>Product Quantity:  </b><?php echo"".$row["quantity"].""?><br>
             
        </p>
        <form id="like" method="post" action="home1.php">
            <a href="home1.php?prodid=<?php echo $row['productid'];?>"<button type="submit" class="w3-button w3-theme-d1 w3-margin-bottom" name="like"><i class="fa fa-heart"></i>  Like</button></a>
        </form>
        <!--logic for review starts here  -->
        <button type="button"  class="w3-button w3-theme-d2 w3-margin-bottom " data-toggle="modal" data-target="#myModal" ><i class="fa fa-comment"></i>  Review</button> 

        <!-- Clicking review button above launches comment modal -->
            <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

             
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add your comments here...</h4>
                </div>
                <div class="modal-body">
                <!--  form starts here-->
                <form id = "comment_form" action="home1.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <textarea class="form-control" name="comment_body" placeholder="your comment goes here..."></textarea>
                  </div>
                  <input type="submit" class="btn btn-block btn-success " value="submit" name="comment_submit">
                  <!--  form ends here-->
                </form>
                <!-- logic to insert comment-->
                 <?php

                   //logic to insert comments into database using comment modal
                    if(isset($_POST['comment_submit']) && $flag == 0)
                    {
                        
                        $review_body = $_POST['comment_body'];
  
                          
                          $insert_comment =mysqli_query($con,"INSERT INTO productreview(productid, sellerid, buyerid, review) VALUES ('".$productid."','".$sellerinfo."','".$buyerid."','".$review_body."')");
                          $flag = 1;//set flag so that comment is not inserted multiple times


                        
                    } 

                    //end of logic to insert comment 
                  ?>

                <!--end of logic to insert comment-->

                </div>
                
              </div>

            </div>
          </div>

        <!--End of comment modal -->
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="	fa fa-shopping-cart"></i>  Buy (<?php echo"".$row["quantity"].""?>) left!</button> 
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-share"></i>  Share</button> 

          
        <div class="comment_section">
          <!--  -->
          <label>Comments</label>
          <div class="panel panel-info panel_setting" >
          <div class="panel-body">

                  
                      
                
               <!-- logic to display comment goes here--> 
          testing ....



          </div>
          </div>

          <!-- -->
        </div>
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
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
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
<?php } 


$_SESSION['sellerid']=$sellerid;
$_SESSION['user_name']=$user_name;
$_SESSION['buyerid']=$buyerid;
$_SESSION['buyer_user_name']=$buyer_user_name;?>