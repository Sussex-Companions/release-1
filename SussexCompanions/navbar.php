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
		   <li><a href="home.php"><i class="fas fa-home"></i>&nbsp &nbsp Back to Home Page</a></li>
           <li><a href="include/logout.incust.php"><i class="fas fa-sign-out-alt"></i>&nbsp &nbsp Sign Out</a></li>
        </ul>
      </div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</body>
</html> 
