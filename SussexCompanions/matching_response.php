<?php session_start();?>
<html>
  <head>   
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	
    <style>
      .noborder td, .noborder th {
         border: none !important;
      }
	  .container{height:502px;}
    </style>
  </head>
  <body>        
      
		<?php include "page_header.html";?>
		<div class="container">
<div style="text-align:left;font-size:30px;"><br>Match Clients
			<a href="hobby.php"><button style="float:right;font-size:15px;" type="submit" class="btn btn-warning">Add Hobbies and Personality</button><br/><br/></a>			
			 </div>		
            
			
			 <?php 
			 $con=new mysqli("localhost","root","Bals@123","sc_club") or die($mqsqli->connect_error);             
			 
			 $blah=$_SESSION['uname'];

             $result=$con->query("SELECT id FROM client WHERE username='$blah'")
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$client=$data['id'];				               				
		    }            
			 
			      $result=$con->query("SELECT * FROM matching where clientId_1=$client AND response_1='Pending' Or 
				  clientId_2=$client AND response_2='Pending'") or die($mysqli->error);
				  $num = mysqli_num_rows($result);			
					      
				   if ($num==0){
				      echo "<div class='alert alert-danger'>No matches yet</div>";
				   }
				   else{
				  
            ?>
  
                  <section id="left">  
	                 <table class='table table-hover table-responsive table-bordered'><br/><br/><br/>	           
		                <tr>	
                           <th class="col-md-1">ID</th>		  
			               <th class="col-md-2">client 1</th>
			               <th class="col-md-2">client 2</th>
		                   <th class="col-md-2">response 1</th>
			               <th class="col-md-2">response 2</th>	
                           <th class="col-md-2">date</th>
						   <th class="col-md-2"></th>
		               </tr>
		 
	        <?php
                       while ($data=$result->fetch_assoc()){
						   $_SESSION['client2']=$data['clientId_2'];
						   $_SESSION['row']=$data['id'];
						   $cl1=$data['clientId_1'];
						   
						   
$result2=$con->query("SELECT name FROM client where id='".$data['clientId_1']."'") or die($mysqli->error);
 while ($row=$result2->fetch_assoc()){	
 $result3=$con->query("SELECT name FROM client where id='".$data['clientId_2']."'") or die($mysqli->error);
 while ($rows=$result3->fetch_assoc()){
			?>				    
		                   <tr>
			                  <td><?php echo $data['id'];?></td>
                              <td><?php echo $row['name'];?></td>	             
				              <td><?php echo $rows['name']; ?></td>					 				
                              <td><?php echo $data['response_1']; ?></td>
                              <td><?php echo $data['response_2']; ?></td>
							  <td><?php echo $data['Date']; ?></td>
							  <td>
							  <a href="accept.php?id=<?php echo $cl1;?>">&nbsp;<i style="color:green;" class="fas fa-check-circle"></i></a>
							  <a href="deny.php?id=<?php echo $cl1;?>">&nbsp;<i style="color:red;" class="fas fa-times-circle"></i></a>
							  </td>							  
	                       </tr>
		    <?php  		     			
				  }}}}
			
	        ?>
		            </table>		    			
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