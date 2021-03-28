<?php
 session_start();
 $conn=new mysqli("localhost","root","","sc_club");
 $blah=$_SESSION['username'];

   $result=$conn->query("SELECT name FROM client WHERE username='$blah'")
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$e=$data['name'];
                echo $e;				
		    }
echo $e;			
?>