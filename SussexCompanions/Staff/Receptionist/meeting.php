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
           <?php include "navbar.php";?>
        </div>
        <div class="section">
            <h2 style="text-align:left;">Schedule New Meeting</h2><br/>
			  <?php
           $conn=new mysqli("localhost","root","Bals@123","sc_club");
          
		   if(isset($_POST["send"])){
           $client = $_POST['clientId'];
		   $staff = $_POST['staffId'];
           $date = $_POST['date'];
		   
		    $result=$conn->query("SELECT id FROM client WHERE name='$client'") 
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$e=$data['id'];				
		    }
			
			$result=$conn->query("SELECT id FROM staff WHERE name='$staff'") 
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$s=$data['id'];				
			}
                     
                       $do = "INSERT INTO meeting(clientId, staffId, date) VALUES (?, ?, ?)";
					   $stmt = $conn->prepare($do); 
                       $stmt->bind_param("sss",$e, $s, $date);


                       if($stmt->execute()) { 	                       
                               echo "<div class='alert alert-success'>Record was updated.</div>";
                           } 
                           else {
                               echo "<div class='alert alert-danger'>Please try again.</div>";
                           }					                 
		   }
           mysqli_close($conn); 
	   ?>
	   
            <form action="" method="post">
		      <table class='table table-responsive table noborder'>		       
		        <tr>
		            <td>Enter Client Name:</td>
		            <td><input type='text' name='clientId' class='form-control' required /></td>		        					           
		        </tr>
		     
				<tr>
		            <td>Enter Client Service Provider Name:</td>				
		            <td><input type='text' name='staffId' class='form-control' required ></td>
		        </tr>
				<tr>
		            <td>Select date</td>				
		            <td><input type='datetime-local' name='date' class='form-control' required ></td>
		        </tr>
				<tr></tr>
		        <tr>
				    <td></td>
		            <td>
		                <input type='submit' name="send" value='Submit' class='btn btn-success'/>
		            </td>
		        </tr>
		      </table>
		    </form>
			<br><br><br><br><br><br><br><br><br>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>