<!DOCTYPE html>
<html>
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="style.css"/>
     <style>
      .dropdown-container {
     	  display: none;
          padding-left:10%;
      }
      .dropdown-btn {
          padding: 15px;
          font-size: 15px;
          color: grey;
          display: block;
          border: none;
          background: none;
          cursor: pointer;
          outline: none;
     }
     .dropdown-btn:hover {
          color: white;
     }
    </style>
  </head>
  <body>

      <div class="sidenav navbar navbar-inverse">
         <ul class="widget widget-menu unstyled">         
            <li><button class="dropdown-btn"><i class="fas fa-money-check-alt"></i> &nbsp Run Fee Service  
			<i class="fa fa-caret-down"></i></button>
               <div class="dropdown-container">
					<a href="EventFee.php" target="_blank"><i class="fas fa-cog"></i>&nbsp &nbsp Run event service</a>
					<a href="MembershipFee.php" target="_blank"><i class="fas fa-cog"></i>&nbsp &nbsp Run membership service</a>
               </div>
           </li>
		   
		   <li><button class="dropdown-btn"><i class="fas fa-address-card"></i> &nbsp Notification Service  
			<i class="fa fa-caret-down"></i></button>
               <div class="dropdown-container">
					<a href="MonthlyBill.php" target="_blank"><i class="fas fa-cog"></i>&nbsp &nbsp Send monthly bill</a>
					<a href="PaymentOverdue.php" target="_blank"><i class="fas fa-cog"></i>&nbsp &nbsp Send overdue letter</a>
               </div>
           </li>	   
        </ul> 
      </div>  
     
      <div class="sidenav navbar navbar-inverse">
        <ul class="widget widget-menu unstyled">
           <li><a href="change_pwd_fm.php"><i class="far fa-user-circle"></i>&nbsp &nbsp Profile</a></li>
           <li><a href="logout.inc.php"><i class="fas fa-sign-out-alt"></i>&nbsp &nbsp Sign out</a></li>
        </ul>
      </div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var dropdownContent1 = dropdown[0].nextElementSibling;
var dropdownContent2 = dropdown[1].nextElementSibling;

  dropdown[0].addEventListener("click", function() {
	if (dropdownContent1.style.display === "block") {
		dropdownContent1.style.display = "none";
	} else {
		if(dropdownContent2.style.display === "block"){
			dropdownContent2.style.display = "none";  
		}
		dropdownContent1.style.display = "block";
	}
  });
  
  dropdown[1].addEventListener("click", function() {
	if (dropdownContent2.style.display === "block") {
		dropdownContent2.style.display = "none";
	} else {
		if(dropdownContent1.style.display === "block"){
			dropdownContent1.style.display = "none";  
		}
		dropdownContent2.style.display = "block";
	}
  });
</script>
</body>
</html> 
