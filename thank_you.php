 <?php
require("includes/connect.php");

// Redirects the user to products page if he/she is logged in.
//if (isset($_SESSION['email'])) {
 // header('location: .php');
//}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Ringel WebSite</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>





<body style="padding-top: 50px;">
        <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>
        <!--Header end-->

        <div id="content">
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container">	
                    <center>
                        <div id="banner_content">
                            <h1>Thank You For Registering with us.</h1>
                            <p> Please Log In to Continue</p>
                            <br/>
                            <a  href="index.php" class="btn btn-danger btn-lg active">Login</a>
                        </div>
                    </center>
                </div>
            </div>
            
             <?php
        include 'includes/footer.php';
        ?>
        </body>
        </html>