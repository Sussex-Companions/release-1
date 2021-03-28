<?php session_start();?>
<html>
  <head>  
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	
	
    <style>
      .noborder td, .noborder th {
         border: none !important;
      }
	 
    </style>
  </head>
  <body>
    <?php include "page_header.html";?>
		<div class="container">
            <h2 style="text-align:left;"><br>Client Hobbies and Personality</h2><br/>
			   <?php
           $conn=new mysqli("localhost","root","","sc_club");
          
		   if(isset($_POST["send"])){
			 $blah=$_SESSION['username'];
             $result=$conn->query("SELECT name FROM client WHERE username='$blah'")
			   or die($mysqli->error);			  		     
              
	     	 while($data=$result->fetch_assoc()){
				$name=$data['name'];				               				
		     }                       		   
           $personality = $_POST['personality'];
           
           $first= "SELECT name FROM client WHERE name='$name'";
           $result = $conn->query($first); 
		   $num = mysqli_num_rows($result);					
			   
			   if($result==true){		  
				   if ($num>0){
                       $do = "UPDATE client SET personality='$personality' WHERE name='$name'";

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
				    <td>Choose a personality</td>
			    </tr>
		        <tr> 
			 	    <td class="col-md-3"><input type="radio" name="personality" value="Driver" checked> Drivers-<br>
					Drivers are very strong personalities. Typically they have a go-get-it-done or whatever-it-takes personality. 
					They can seem very dominant and are quick to take action. 
					<br/></td>
                    <td class="col-md-3"><input type="radio" name="personality" value="Analyticals"> Analyticals-<br>				
					Analytical types are constantly assessing, determining pros and cons, making lists of to do items. 					 
					Others see them as talented with brilliant ideas. 
					</td>
                    <td class="col-md-3"><input type="radio" name="personality" value="Expressives"> Expressives-<br>
					Expressives types enjoy socializing and talking. 					 
					They also are good at communicating vision, getting others exited about ideas and issues.
					</td>
                    <td class="col-md-3"><input type="radio" name="personality" value="Amiables"> Amiables-<br>
					Amiables are the most calm, flat-type personality. Amiable types are laid back and are hard to excite. 
					They seem to constantly be relaxed and desire a peaceful environment over anything else.
					<br/><br/></td>
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
				</tr><tr>				    
					<td><input type="submit" name="send" value="Submit" class="btn btn-success"></td>
			    </tr>
		     </table>
		   </form>
	    </div>
		
<div class = "about">
   <div class = "us">About Us<br><br>
   <i class="fab fa-facebook"></i>
   <i class="fab fa-twitter-square"></i>
   <i class="fab fa-instagram"></i>
   <i class="fab fa-youtube"></i>
   
 <div style="float:right;">
     Sussex Companions Club<br>
     Brighton<br>
     England<br>
     United Kingdom<br>
     Contact No: +44 7911 132546
	 </div>
 </div>
</div>
 <div class = "footer">  	
<div class="copyright"> © 2021 Copyright: SussexCompanions.com<br><br></div>
  </div>		
  </body>
</html>