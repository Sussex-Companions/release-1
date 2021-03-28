<?php include "header.php";?>	
<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style2.css"/>
	
    <style>
      .noborder td, .noborder th {
         border: none !important;
      }
    </style>
  </head>
  <body style="background-color:#407B6F;">

     <div class="frame">
        <div class="main">
           <?php include "navbar3.php";?>
        </div>
        <div class="section">
	
            <p><h1>Successfully Matched Reports</h1><br>
			<button class="btn btn-primary" onclick="window.open('PDF/staff.pdf')">Matched Reports</button></p>
		     <br><br><br><br><br>	
			 <br><br><br><br><br>
             <br><br><br><br><br>
             <br><br><br><br><br>
             		 
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>

</html>
	<?php
//db connection 
   require ("config/database.php");
   require "vendor/autoload.php";
   require("pdfSuccessfullMatch.php");
   //table 
   $stmt=$conn->prepare("SELECT id,clientId_1,clientId_2,response_1,response_2,overall,Date FROM matching ORDER BY id");
   $stmt->execute();
   $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

   $header=array('id','clientId','clientId','response','response','overall','Date');
   $headerWidth=array(50,150,50,100,80,100,100,100);
   $PDF= new CreatePDF();
   $table=$PDF->ClientPDF($header,$headerWidth,$rows);
   echo $table;
   
?>
<div class="footer"><?php require_once "footer.php";?></div>