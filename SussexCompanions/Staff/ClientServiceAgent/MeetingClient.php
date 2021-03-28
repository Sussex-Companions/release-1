<?php include "header.php";?>
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
           <?php include "navbar2.php";?>
        </div>
        <div class="section">
          <p><h1>Daily Reports</h1><br>
		  <button class="btn btn-primary" onclick="window.open('PDF/staff.pdf')">click to daily report</button></p>
		  <br><br><br><br><br><br><br><br>
		  <br><br><br><br><br><br><br><br>
		  <br><br><br><br>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>
<?php
//db connection 
   require ("config/database.php");
   require "vendor/autoload.php";
   require("CreateMeeting.php");
   //table 
   $stmt=$conn->prepare("SELECT id,clientId,staffId,date FROM meeting ORDER BY id");
   $stmt->execute();
   $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
   
   $header=array('id','clientId','staffId','date');
   $headerWidth=array(150,200,150,100,150,150,150,150);
   $PDF= new CreatePDF();
   $table=$PDF->ClientPDF($header,$headerWidth,$rows);
   
   echo $table;
?>