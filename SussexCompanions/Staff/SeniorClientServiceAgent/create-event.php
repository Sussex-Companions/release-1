<?php include "header.php";
// Include config file
    require_once "config2.php";?>
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
	 <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
  </head>
  <body style="background-color:#407B6F;">
     <div class="frame">
        <div class="main">
           <?php include "navbar3.php";?>
        </div>
        <div class="section">
            <h2 style="text-align:left;">Add Event</h2>
			 <p>Please fill this form and submit to book event.</p><br/>
			<?php
    // If a Booking was made
    if (isset($_POST)) {
        if (isset($_POST['eventType']) && isset($_POST['eventName']) && isset($_POST['eventLocation']) && isset($_POST['eventDate']) && isset($_POST['eventFees'])) {
            $eventType = $_POST['eventType'];
            $eventName = $_POST['eventName'];
            $eventLocation = $_POST['eventLocation'];
            $eventDate = $_POST['eventDate'];
            $eventFees = $_POST['eventFees'];
            
            $errormsg = "";
            $fail=false;

            // Validate Status
            if ($eventType != "Indoor" && $eventType != "Outdoor") {
                $errormsg="Invalid Event Type<br>";
                $fail=true;
            }

            if ($fail != true) {
                $sql="INSERT INTO `event` (type, name, location, date, fees) VALUES(:type,:name,:location,:date,:fees)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":type",$eventType);
                $stmt->bindParam(":name",$eventName);
                $stmt->bindParam(":location",$eventLocation);
                $stmt->bindParam(":date",$eventDate);
                $stmt->bindParam(":fees",$eventFees);

                if ($stmt->execute()) {
                    $success=true;
                    $successmsg="Successfully Created New Event!";
                } else {
                    $fail=true;
                    $errormsg="Failed to Create New Event!";
                }
            }
        }
    }
?>
                  
                    <form action="" method="post">
                     <table class='table table-responsive table noborder'>
                        <?php
                            if (isset($successmsg)) {
                                echo '<div class="alert alert-success">'.$successmsg.'</div>';
                            }

                            if (isset($fail) && $fail==true && isset($errormsg)) {
                                echo '<div class="alert alert-danger">'.$errormsg.'</div>';
                            }
                        ?>
						<tr>
                        <td>
                            <label for="eventType">Event Type</label>
                            <select class="form-control" name="eventType" id="eventType" required>
                                <option value="Outdoor">Outdoor</option>
                                <option value="Indoor">Indoor</option>
                            </select>
                        </td>
                        
						<tr>
                        <td>
                            <label for="eventName">Event Name</label>
                            <input type="text" id="eventName" name="eventName" class="form-control" required/>
                        </td>
						</tr>
                        
						<tr>
                        <td>
                            <label for="eventLocation">Event Location</label>
                            <input type="text" id="eventLocation" name="eventLocation" class="form-control" required/>
                        </td>
						</tr>
                        
						<tr>
                        <td>
                            <label for="eventDate">Event Date</label>
                            <input type="datetime-local" id="eventDate" name="eventDate" class="form-control" required/>
                        </td>
						</tr>
                        
						<tr>
                        <td>
                            <label for="eventFees">Event Fees</label>
                            <input type="text" id="eventFees" name="eventFees" class="form-control" required/>
                        </td>
						</tr>
                        
						<tr>
                        <td>
                            <input type="submit" class="btn btn-success" value="Save Event"/>
                        </td>
						</tr>
						</table>
						</form>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>