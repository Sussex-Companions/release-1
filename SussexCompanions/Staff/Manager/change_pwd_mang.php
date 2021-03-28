<?php session_start();
include "header.php";

if(!isset($_SESSION['username'])){
  header('location: .\index.php');
}?>
<?php

$conn=new mysqli('localhost','root','','sc_club') or die(mysqli_error());
 if(count($_POST)>0){
    $username=$_POST["username"];
  $crpass=$_POST["cpassword"];
  $nwpass=$_POST["npassword"];
  $cnpass=$_POST["cfpassword"];
    
  $result = mysqli_query($conn, "SELECT password FROM staff WHERE username=$username");
  
  if (!$result) {
    echo "The username you entered doesnot exixt";
  }
  else if($crpass!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }    
    if($nwpass==$cnpass){
       $sql=mysqli_query($conn,"UPDATE staff SET password='$nwpass' where username='$username'");  
  }  
   if($sql)
        {
        echo "<script>alert('Password Changed Sucessfully'); window.location='Customer.php'</script>";
        }
       else
        {
       echo "<script>alert('Your new and Retype Password is not match'); window.location='new1.php'</script>";
       }    
 }
 ?> 

<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style2.css"/>
	
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>	
	<script type="text/javascript"> 
		$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
</script>  
<script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
    <style>
      .noborder td, .noborder th {
         border: none !important;
      }
    </style>
  </head>
  <body style="background-color:#407B6F;">
     <div class="frame">
        <div class="main">
           <?php include "navbar5.php";?>
        </div>
        <div class="section">
            <h2 style="text-align:left;">Change Password</h2><br/>
            <form method = "POST" action="" method="post" onSubmit="return validatePassword()">
		      <table class='table table-responsive table noborder'>		       
		        <tr>		
              <tr>
              	<td><label for = "u_name" style = "font-size:15px; color:black;">Username</label></td>
			    <td><input type="text" name="username" placeholder="Enter username you used to login" class="form-control" required></td>
			  </tr> 

			  <tr>
			  	<td><label for = "cpassword" style = "font-size:15px; color:black;">Current Password</label></td>
				<td><input type="password" name="cpassword" placeholder="Enter Current Password..." class="form-control" required></td>
			  </tr>
      
       		  <tr>
       		  	<td><label for = "npassword" style = "font-size:15px; color:black;">New Password</label></td>
			  <td><input type="password" name="npassword" placeholder="Enter New Password..." class="form-control" required></td>
			</tr> 

        	  <tr>
        	  	<td><label for = "cfpassword" style = "font-size:15px; color:black;">Confirm Password</label></td>
			    <td><input type="password" name="cfpassword" placeholder="Enter Confirm Password..." class="form-control" required><br/></td>
			  </tr>
			 		           		       
			   <tr>
			   <td></td>
			   <td>
               <button type="submit" name="change" class="btn btn-primary" value="Change Password"><b>Change</b></button>              
			   </td>
			   </tr> 
               <br>		   		   
		      </table>
		    </form>
			   <script type="text/javascript">
function validatePassword() {
var cpassword,npassword,cpassword,output = true;

cpassword = document.frmChange.cpassword;
npassword = document.frmChange.npassword;
cpassword = document.frmChange.confirmpassword;

if(!cpassword.value) {
cpassword.focus();
document.getElementById("cpassword").innerHTML = "required";
output = false;
}
else if(!npassword.value) {
npassword.focus();
document.getElementById("npassword").innerHTML = "required";
output = false;
}
else if(!cpassword.value) {
cpassword.focus();
document.getElementById("cpassword").innerHTML = "required";
output = false;
}
if(npassword.value != cpassword.value) {
npassword.value="";
cpassword.value="";
npassword.focus();
document.getElementById("cpassword").innerHTML = "not same";
output = false;
}   
return output;
}
</script>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>