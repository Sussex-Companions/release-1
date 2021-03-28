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
            <h2 style="text-align:left;">Match Clients</h2><br/>
			 <?php 
			 $con=new mysqli("localhost","root","Bals@123","sc_club") or die($mqsqli->connect_error);
             if(isset($_POST["addMatch"])){			   			   
		         $clientId_1=$_POST['clientId_1'];
				 $clientId_2=$_POST['clientId_2'];
				 
				 if($clientId_1==$clientId_2){
					 echo "<div class='alert alert-danger'>Enter two different Client IDs</div>";
			     }
				 
			     else{
	             $q="SELECT clientId_1,clientId_2 FROM matching WHERE clientId_1=$clientId_1 AND clientId_2=$clientId_2";
				 $result = $con->query($q); 
		         $num = mysqli_num_rows($result);			
			
			     if($result==true){
				   if ($num>0){
				      echo "<div class='alert alert-danger'>Record already exist.</div>";
				   }
				    
				   else{
				       $q="SELECT clientId_1,clientId_2 FROM matching WHERE clientId_1=$clientId_2 AND clientId_2=$clientId_1";					
			           $result = $con->query($q); 
		               $num = mysqli_num_rows($result);			
			
			           if($result==true){
				          if ($num>0){
				             echo "<div class='alert alert-danger'>Record already exist.</div>";
					      }
						 
				          else{				  	   
			                 $query="INSERT INTO matching SET clientId_1='$clientId_1',clientId_2='$clientId_2'";
			                 $result=mysqli_query($con,$query);
				  
                             if ($result==true){				     					   
	                            echo "<div class='alert alert-success'>Record was added.</div>";
                             }
                             else{
	                            echo "<script>alert('Please try again');</script>";
                             }
				          }
				      }
		           }
				 }
				 }
			 }?>
			 
            <form action="" method="post">
		      <table class='table table-responsive table noborder'>		       
		        <tr>
		            <td class="col-md-1">Client 1 ID</td>
		            <td class="col-md-3"><input type='text' name='clientId_1' class='form-control' required /></td>		        					           
		        </tr>	     
				<tr>
		            <td>Client 2 ID</td>				
		            <td><input type='text' name='clientId_2' class='form-control' required ></input></td>
		        </tr>
				<tr></tr>
		        <tr>
				    <td></td>
		            <td><input type="submit" name="addMatch" class="btn btn-success" value="Add Match"></td>
		        </tr>
		      </table>
		    </form>
			</div>
			
            <div class="section">
            <h2 style="text-align:left;">Client Details</h2><br/>  
		
		 	<!-- search bar -->
		    <form class="navbar-form navbar-right" role="search" method="POST">
     		   <div class="form-group">            
    		      <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search by hobby or personality">     
			   </div>         
			      <button type="submit" class="btn btn-primary">Submit</button>    
	         </form> 	
		 
			 <?php 							 
			if(!empty($_POST["keyword"])){
		       $keyword =$_POST['keyword'];	
			   $result=$con->query("SELECT * FROM client WHERE hobby LIKE '%$keyword%' OR personality LIKE '%$keyword%'") 
			   or die($mysqli->error);
			   
			   $num = mysqli_num_rows($result);	

		       if ($num==0){
				   echo "<br><br><br><br><div class='alert alert-danger'>No records found.</div>";
			   }
               else{   
               ?>
	              <table class='table table-hover table-responsive table-bordered'><br/><br/><br/>
		            <tr>	
                       <th class="col-md-1">ID</th>		  
		           	   <th class="col-md-2">Name</th>
			           <th class="col-md-2">Personality ID</th>
			           <th class="col-md-2">Hobby</th>
			           <th class="col-md-2">Member type</th>
		            </tr>
		 
	          <?php
	   			    while ($data=$result->fetch_assoc()){		              			   			  			   		  
			   ?>				    
		            <tr>
			           <td><?php echo $data['id'];?></td>
                       <td><?php echo $data['name'];?></td>
	                   <td><?php echo $data['personality']; ?></td>
				       <td><?php echo $data['hobby']; ?></td>	              
				       <td><?php echo $data['type']; ?></td>
	                </tr>
			   <?php  		     			    
				    }
				}
		    }
		
			else{ 
			      $result=$con->query("SELECT * FROM client") or die($mysqli->error);
            ?>
  
                  <section id="left">  
	                 <table class='table table-hover table-responsive table-bordered'><br/><br/><br/>	           
		                <tr>	
                           <th class="col-md-1">ID</th>		  
			               <th class="col-md-2">Name</th>
			               <th class="col-md-2">Personality</th>
		                   <th class="col-md-2">Hobby</th>
			               <th class="col-md-2">Member type</th>			
		               </tr>
		 
	        <?php
                       while ($data=$result->fetch_assoc()){		            				
			?>				    
		                   <tr>
			                  <td><?php echo $data['id'];?></td>
                              <td><?php echo $data['name'];?></td>	             
				              <td><?php echo $data['personality']; ?></td>					 				
                              <td><?php echo $data['hobby']; ?></td>
                              <td><?php echo $data['type']; ?></td>	 				  
	                       </tr>
		    <?php  		     			
		               }
			}
	        ?>
		            </table>		    			
            </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>