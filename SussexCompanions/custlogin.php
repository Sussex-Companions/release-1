<?php
    include('Include\login.incust.php');
?>
<!DOCTYPE html>
<html lang = "en">
<head>
   <meta charset="utf-8">
   
     <link rel = "stylesheet" type = "text/css" href = "css/about_us.css">

  <!--Bootstrap--> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

   <meta name="viewport" content="width=device-width, initial-scale=1">



<style>

p.heading{
	   text-align : center;	
	   padding : 20px;
	   font-size : 50px;
	   color : #B0C4DE;
	   font-family: HeadFont;
	   background: #1A2238;
	}
	
body{
	   background: ;
	   background-size: cover;
	   background-repeat: no-repeat;
       background-attachment:fixed;
	   background-position : center center;
	   
	   
	}
	
input[type=text], input[type=password] {
	   width: 90%;
	   padding: 5px 2px;
	   margin: 10px 0;
	   display: inline-block;
	   border: 1px solid #ccc;
	   border-radius: 5px;
	   
    } 

label{
		color : #B0C4DE;
}

.start_login{
	   padding: 16px;
	   text-align : center;
	  
	}

.form_design{
	   margin : 3% 30% 0% 35%;
	   width  : 30%;
	   background: #1A2238;
	   border: 1px solid black;
	   border-radius: 40px;
	   
    }
	
*{
       box-sizing: border-box;
    }

@font-face {
   	   font-family: HeadFont;
   	   src: url(Fonts/AGENCYR.TTF);
   
}
	
</style>
</head>

<body>

<?php 
  if(isset($_SESSION['message'])): 
?>

        <div class = "alert" style = "color:red; text-align: center;" alert-<?=$_SESSION['msg_type']?>">


<?php
   echo $_SESSION['message'];
   unset($_SESSION['message']);
?>
        </div>

<?php 
  endif 
?>

	 <p class = "heading"><b>SUSSEX COMPANIONS <br>
	 LOGIN</b></p>
   
       <form class = "form_design"  action = "Include/login.incust.php" method = "post">

        <div class = "start_login">
		  	<label for = "u_name" style = "font-size:30px; color:#F5FFFA;">Username</label>
		  	<input type = "text" placeholder = "Enter Username" name = "u_name" required>
		  
		 	<label for = "pswd" style = "font-size:30px; color:#F5FFFA;">Password</label>
		  	<input type = "password" placeholder = "Enter Password" name = "pswd" required><br><br>
		  
		  	<button type = "submit" class="btn btn-primary" name = "user-login" style="font-size: 20px; width: 50%;"><b>Login</b></button>
		</div>
	   </form>
	
	
	<!--Footer-->
	<hr>
	
	    <div class = "about">
	  
	     <div class = "col-3" style = "font-size: 20px; padding-left: 100px;">About Us<br>
	   		<img src="Image/About (2).jpg" alt = "SUPERMARKET" width = "200px" height = "150px" style = "padding-top:10px;">
	     </div>
	   
	     <div class = "col-6" style = "text-align: justify; text-justify: inter-word; padding-top:60px;">
		      Welcome to Sussex Companions, the one place to meet new friends. We enable our members to interact and find new friends by matching up our members with common interests. Join our large family of members to make new friends, participate in events and much more.
		 </div>
		       
		 <div class = "col-3" style = "padding-top:60px;">
			   Sussex Companions Club<br>
			   Brighton<br>
			   England<br>
			   United Kingdom<br>
			   Contact No: +44 7911 132546
		 </div>
	 
        </div>		 
</body>
</html>