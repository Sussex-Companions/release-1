<?php include "header.php";include "config.php";?>
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
   <script type="text/javascript">
        $(function() {
            $('#empValid').keyup(function() {
			
                if (this.value.match(/[^a-zA-Z]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z ]/g, '');
					
                }
				Alart("Numbers IS NOT Allowed Sir!!!!!! !!!");
            });
        });
    </script>
     <div class="frame">
        <div class="main">
           <?php include "navbar.php";?>
        </div>
        <div class="section">
            <h2 style="text-align:left;">Registration Form</h2><br/>
            <form class="register active" id="myForm" action="custRegistration.php"  method="POST" >
		      <table class='table table-responsive table noborder'>		       		        
        <tr>
			<td class="col-md-2"> 
				<label>Full Name:</label>		
				<input type="text" id="name" name="name" placeholder="Full name" class='form-control' required />
				
			 </td>	  
			 <td class="col-md-2">   
				 <label>Contact Number:</label>
				<input type="text" id="contactNo" name="contactNo" placeholder="Contact number" class='form-control' required /><br>
				
			</td>
		</tr>
		<tr>	
			<td class="col-md-2">   
				 <label>Email:</label>
				<input type="text" id="email" name="email" placeholder="E-mail" class='form-control' required />
				
			</td>			
			<td class="col-md-2">  
				<label>Type:</label>
				<input type="text" id="type" name="type" placeholder="Customer Type" class='form-control' required /><br>
				                             
			</td>
		</tr>
		<tr>
		   <td class="col-md-2">  
				<label>Address:</label>		
				<textarea id="address" name="address" placeholder="Address" class='form-control' required></textarea><br>
				
			</td>	
		</tr>
		<tr>
			<td class="col-md-2">   
				<label>Username:</label>
				<input type="text" id="username" name="username" placeholder="User name" class='form-control' required />
				
			</td>			
			<td class="col-md-2">  
				<label>Password:</label>		
				<input type="password" id="password" name="password" placeholder="*****" class='form-control' required >
				                       
			</td>
		</tr>		
		<tr>
		<td></td>
		<td><button name="submit" id="submit" title="Click to Save"  class="btn btn-success"> <span class="a-btn-text"> Add </span></button>						
		</td>														
   </tr>
		      </table>
		    </form>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
  <script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
    
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'empRegistration.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
</html>