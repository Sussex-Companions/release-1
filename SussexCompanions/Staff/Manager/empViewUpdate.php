<?php include "header.php";
include "config.php"?>
<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css"/>
	
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
            <h2 style="text-align:left;">Update Employee Details </h2><br/>          
		      <table class='table table-responsive table noborder'>		       
		       
				<?php
$update=$_GET['update'];
$result = mysqli_query($mysqli,"SELECT * FROM staff where id ='$update'");
?>
<?php if($row = mysqli_fetch_array($result))
  {?> 	
   <form class="register active" action="empUpdate.php" method="POST" autocomplete="off">
		 <table class='table table-responsive table noborder'>
			
   <tr>  
   <td>
   	  <label>Employee ID:</label>		
	  <input type="text" id="id" name="id" value="<?php echo $row['id'];?>"  placeholder="Full name" class='form-control' required readonly>		
	</td>
   </tr>
   <tr>
    <td>  
	  <label>Full Name:</label>		
		<input type="text" id="name" name="name" value="<?php echo $row['name'];?>"  placeholder="Full name" class='form-control' required>		
	</td>
	<td>   
	     <label>Role:</label>
		<input type="text" id="role" name="role" value="<?php echo $row['role'];?>" placeholder="Employee Role" class='form-control'/>		
		</td>
   	</tr>

	<tr>   			
	<td>   
	     <label>Email:</label>
		<input type="text" id="email" name="email" value="<?php echo $row['email'];?>" placeholder="E-mail" class='form-control' />		
    </td>	   
    <td>   
	     <label>Contact Number:</label>
		<input type="text" id="contactNo" name="contactNo" value="<?php echo $row['contactNo'];?>" placeholder="Contact number" class='form-control' />		
	</td>
	</tr>

	<tr> 
       <td>  
		<label> Enter Address:</label>		
		<input type="text" id="address" name="address" value="<?php echo $row['address'];?>" placeholder="Address" class='form-control'>	
		</td>
    </tr>
	
	<tr> 
	   <td>   
	<label>Username:</label>
		<input type="text" id="username" name="username" value="<?php echo $row['username'];?>" placeholder="User name" class='form-control' required>		
   </td>
	<td>	
		<label> Password:</label>		
		<input type="password" id="password" name="password" value="<?php echo $row['password'];?>" placeholder="*******" class='form-control' required>
		<span id="pass-info"> </span>                               
	</td>
	</tr>	
	<tr>
						<td>							
						<button type="submit"  name="submit" value="Update" class="btn btn-success"> <span class="a-btn-text">Update Employee</span></button>						
						</td>														
	</tr>
					
	</table>
	</form>	
         <?php }?>			   
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>