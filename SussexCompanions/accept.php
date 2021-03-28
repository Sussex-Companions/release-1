<?php
session_start();

$conn= new mysqli('localhost','root','Bals@123','sc_club') or die($mqsqli->connect_error);
   $client1=$_GET['id'];
   //echo $client1;
   
   $client2=$_SESSION['client2'];
   //echo $client2;
   
   $row=$_SESSION['row'];
   //echo $row;
   
   $blah=$_SESSION['uname'];

   $result=$conn->query("SELECT name FROM client WHERE username='$blah'")
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$name=$data['name'];               				
		    }

 $result=$conn->query("SELECT id FROM client WHERE name='$name'")
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$id=$data['id'];               				
		    }
//echo $id; 

if($client1==$id){
	$do="UPDATE matching SET response_1='Accepted' WHERE id='$row'";
	$result = mysqli_query($conn,$do);	   
	   
	 $do="SELECT response_2 FROM matching WHERE id='$row'";
	   $result = mysqli_query($conn,$do); 
       while($data=$result->fetch_assoc()){	
	   $answer=$data['response_2'];
	   }
	   
	   if ($answer=="Accepted"){
	   $do="UPDATE matching SET overall='Successful' WHERE id='$row'";
	   $result = mysqli_query($conn,$do);
	   header('Location: matching_response.php');
	   exit();
	   }
	   elseif($answer=="Denied"){	
	   $do="UPDATE matching SET overall='Unsuccessful' WHERE id='$row'";
	   $result = mysqli_query($conn,$do);
	   header('location:matching_response.php');	
	   }
	   header('location:matching_response.php');
} 
elseif($client2==$id){
	$do="UPDATE matching SET response_2='Accepted' WHERE id='$row'";
	   $result = mysqli_query($conn,$do);
	   
	   $do="SELECT response_1 FROM matching WHERE id='$row'";
	   $result = mysqli_query($conn,$do); 
       while($data=$result->fetch_assoc()){	
	   $answer=$data['response_1'];
	   }
	   
	   if ($answer=="Accepted"){
	   $do="UPDATE matching SET overall='Successful' WHERE id='$row'";
	   $result = mysqli_query($conn,$do);
	   header('Location: matching_response.php');			      
	   }
	   elseif($answer=="Denied"){	
	   $do="UPDATE matching SET overall='Unsuccessful' WHERE id='$row'";
	   $result = mysqli_query($conn,$do);
	   header('location:matching_response.php');	
	   }
	   header('location:matching_response.php');
}
else{echo 'nope';}
  
 ?>