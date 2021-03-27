<?php 
include "header.php";
session_start();
if(!isset($_SESSION["username"])) {
	header("Location: /SussexCompanions/Staff");
    exit();
}
?>
<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styl.css"/>
	
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
		<h2 style="text-align:left;color:white;">Welcome to Sussex Companions<br><br></h2><br/>
            <form action="" method="post">
		      <table class='table table-responsive table noborder'>		       
				<p style="color:white;font-size:20px;">
		         As the finance manager you can,<br>
				 Calculate the payments using the "Run Service" tab   <br>
				 Send clients notifications using the "Notification Service" tab<br>
				 Check the Events report <br><br><br><br><br><br><br><br><br><br><br><br><br>				  
				</p>
		        <tr>
				    <td></td>
		          
		        </tr>
		      </table>
		    </form>		
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>