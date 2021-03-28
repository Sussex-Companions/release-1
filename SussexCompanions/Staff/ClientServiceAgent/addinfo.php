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
            <h2 style="text-align:left;">Client Hobbies and Personality</h2><br/>
			   <?php
           $conn=new mysqli("localhost","root","Bals@123","sc_club");
          
		   if(isset($_POST["send"])){
           $name = $_POST['name'];
		   $add = $_POST['details'];
           $personality = $_POST['personality'];
           
           $first= "SELECT name FROM client WHERE name='$name'";
           $result = $conn->query($first); 
		   $num = mysqli_num_rows($result);					
			   
			   if($result==true){		  
				   if ($num>0){
                       $do = "UPDATE client SET personality='$personality',additional='$add' WHERE name='$name'";

                       if(mysqli_query($conn,$do)) {
   	                       $checkbox1 = $_POST['hobby'];
                           $check="";  
						   
                           foreach($checkbox1 as $check1){  
                               $check.= $check1.",";  
                           }  
                           $edit=substr($check,0,-1);
               			   $sql = "UPDATE client SET hobby='$edit' WHERE name='$name'";

                           if(mysqli_query($conn,$sql)) {
                               echo "<div class='alert alert-success'>Record was updated.</div>";
                           } 
                           else {
                               echo "<div class='alert alert-danger'>Please try again.</div>";
                           }					  
                       }
                  }
				  else{
                       echo "<div class='alert alert-danger'>Invalid Client. Please try again.</div>";
                  }
              }
			  else{
                  echo "<div class='alert alert-danger'>Please try again.</div>";
              }
		   }
           mysqli_close($conn); 
	   ?>
            <form action="" method="post">
		      <table class='table table-responsive table noborder'>	
			    <tr>
				    <td class="col-md-2">Enter Client Name</td>
		            <td><input type='text' name='name' class='form-control' placeholder="client name" required /><br/></td>
			    </tr>		
			    <tr>
				    <td>Choose personality</td>
			    </tr>
		        <tr> 
			 	    <td class="col-md-2"><input type="radio" name="personality" value="Driver" checked> Drivers</td>
                    <td class="col-md-2"><input type="radio" name="personality" value="Analyticals"> Analyticals</td>
                    <td class="col-md-2"><input type="radio" name="personality" value="Expressives"> Expressives</td>
                    <td class="col-md-2"><input type="radio" name="personality" value="Amiables"> Amiables<br/><br/></td>
				</tr>		  
			    <tr>
				    <td>Choose hobbies</td>
			    </tr>
		        <tr> 
			        <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Reading" checked> Reading</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Fishing"> Fishing</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Traveling"> Traveling</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Volunteer Work"> Volunteer Work</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Hiking"> Hiking</td>
				</tr>
                <tr>
				    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Church Activities"> Church Activities</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Arts and Crafts"> Arts and Crafts</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Gardening"> Gardening</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Rock-climbing"> Rock-climbing</td>
                    <td class="col-md-2"><input type="checkbox" name="hobby[]" value="Yoga and Meditation"> Yoga and Meditation<br><br/></td>
				</tr>
				<tr> 
				    <td>Additional Details</td>
		            <td><textarea name='details' class='form-control' placeholder="Additional Details" /></textarea><br/></td>
				</tr><tr>
				    <td></td><td></td><td></td>
					<td><input type="submit" name="send" value="Submit" class="btn btn-success">
			    </tr>
		     </table>
		   </form>
	    </div>      			                
     </div>
  </body>
     <div class="footer"><?php require_once "footer.php";?></div>
	 
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
     <!-- Latest compiled and minified Bootstrap JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
</html>