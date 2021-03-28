<?php include "header.php";
require_once "config2.php";?>
<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style2.css"/>
	
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
            <h2 style="text-align:left;">Daily Report</h2>
			<p>Report for the Date: <?php echo date('m/d/Y', time()); ?></p><br/>
           
                    <?php
                    $sql = "SELECT * FROM `booking` WHERE DATE(createdOn) = CURDATE()";
                    $result = $pdo->query($sql);
                    
                    if($result) {
                        if($result->rowCount() > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Event Type</th>";
                                        echo "<th>Event Name</th>";
                                        echo "<th>Event Location</th>";
                                        echo "<th>Event Date</th>";
                                        echo "<th>Client Name</th>";
                                        echo "<th>Client Contact</th>";                                     
                                        echo "<th>Client Email</th>";
                                        echo "<th>Booking Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($row = $result->fetch()){
                                    
                                    // Fetch Event Using Event ID
                                    $stmt = $pdo->prepare("SELECT * FROM `event` WHERE id = :id");
                                    $stmt->bindParam(":id",$row['eventId']);
                                    $stmt->execute();
                                    $event = $stmt->fetch(PDO::FETCH_ASSOC);

                                    // Fetch Client Using Client ID
                                    $stmt=$pdo->prepare("SELECT * FROM `client` WHERE id=:id");
                                    $stmt->bindParam(':id', $row['clientId']);
                                    $stmt->execute();
                                    $client = $stmt->fetch(PDO::FETCH_ASSOC);

                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $event['type'] . "</td>";
                                        echo "<td>" . $event['name'] . "</td>";
                                        echo "<td>" . $event['location'] . "</td>";
                                        echo "<td>" . $event['date'] . "</td>";
                                        echo "<td>" . $client['name'] . "</td>";
                                        echo "<td>" . $client['contactNo'] . "</td>";                                       
                                        echo "<td>" . $client['email'] . "</td>";
                                        echo "<td>" . $row['createdOn'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No Bookings found to display for the day.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
		      
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>