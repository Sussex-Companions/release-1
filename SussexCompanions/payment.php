<?php 
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION["uname"])) {
	header("Location: custlogin.php");
    exit();
}
include "header.php";
?>
<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css"/>
	
    <style>
      .noborder td, .noborder th {
         border: none !important;
      }
    </style>
  </head>
  <body style="background-color:#407B6F;">
     <div class="frame">
        <div class="main">
           <?php include "navbar.php";?>
        </div>
        <div class="section">
            <?php include "ProcessPayment.php";?>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>