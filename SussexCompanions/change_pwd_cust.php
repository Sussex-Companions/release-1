<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: .\custlogin.php');
}

?>
<?php

$conn=new mysqli('localhost','root','','sc_club') or die(mysqli_error());
 if(count($_POST)>0){
    $username=$_POST["username"];
  $crpass=$_POST["cpassword"];
  $nwpass=$_POST["npassword"];
  $cnpass=$_POST["cfpassword"];
  

$result = mysqli_query($conn, "SELECT password FROM client WHERE username=$username");
  
  if (!$result) {
    echo "The username you entered doesnot exixt";
  }
  else if($crpass!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }    
    if($nwpass==$cnpass){
       $sql=mysqli_query($conn,"UPDATE client SET password='$nwpass' where username='$username'");  
  }  
   if($sql)
        {
        echo "<script>alert('Password Changed Sucessfully'); window.location='change_pwd_cust.php'</script>";
        }
       else
        {
       echo "<script>alert('Your new and Retype Password is not match'); window.location='change_pwd_cust.php'</script>";
       }    
 }
?>
<HTML>
<head>
<title></title>
</head>
<body>
    <!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style3.css"/>
	
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
  <body> 
  <?php require_once "page_header.html";?>
  <div class="container">
		<div style="text-align:left;font-size:30px;"><br><br>Change Password<br><br></div>
            <form method = "POST" action="" method="post" onSubmit="return validatePassword()">
		      <table class='table table-responsive table noborder'>		       		  			   	  			
              <tr>
              	<td><label for = "u_name" style = "font-size:15px; color:black;">User Name</label></td>
			    <td><input type="text" name="username" placeholder="Enter username you used to login" class='form-control' required></td>
			  </tr> 

			  <tr>
			  	<td><label for = "cpassword" style = "font-size:15px; color:black;">Current Password</label></td>
				<td><input type="password" name="cpassword" placeholder="Enter Current Password..." class='form-control' required></td>
			  </tr>
      
       		  <tr>
       		  	<td><label for = "npassword" style = "font-size:15px; color:black;">New Password</label></td>
			  <td><input type="password" name="npassword" placeholder="Enter New Password..." class='form-control' required></td>
			</tr> 

        	  <tr>
        	  	<td><label for = "cfpassword" style = "font-size:15px; color:black;">Confirm Password</label></td>
			    <td><input type="password" name="cfpassword" placeholder="Enter Confirm Password..." class='form-control' required></td>
			  </tr>
		<td></td>
		<td><button type="submit" name="change" class="btn btn-primary" style="font-size: 18px; width: 20%;" value="Change Password"><b>Change</b></button>          
						</td>											
   </tr>
		        </tr>
		      </table>
          <br><br><br><br><br><br><br><br>
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
     </div><br><br>
	 <div class = "about">
   <div class = "us">About Us<br><br>
   <i class="fab fa-facebook"></i>
   <i class="fab fa-twitter-square"></i>
   <i class="fab fa-instagram"></i>
   <i class="fab fa-youtube"></i>
   
 <div style="float:right;">
     Sussex Companions Club<br>
     South Coast,<br>
     England<br>
     United Kingdom<br>
     Contact No: +44 7911 132546
	 </div>
 </div>
</div>
 <div class = "footer">  	
<div class="copyright"> © 2020 Copyright: Sussex Companions.com<br><br></div>
  </div>
  </body>
  <script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
    
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'custRegistration.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
</html>