<?php include "header.php";

// Include config file
    require_once "db.php";?>
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
  <?php
    // If a Booking was made
    if (isset($_POST)) {
        if (isset($_POST['event']) && isset($_POST['client'])) {
            $event = $_POST['event'];
            $client = $_POST['client'];

            $errormsg = "";
            $fail=false;

            // Validate Event
            $sql="SELECT * FROM `event` WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $event);
            $stmt->execute();
            if (!($stmt->rowCount() == 1)) {
                $errormsg.="Invalid Event<br>";
                $fail=true;
            }

            // Validate Client
            $sql="SELECT * FROM `client` WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $client);
            $stmt->execute();
            if (!($stmt->rowCount() == 1)) {
                $errormsg.="Invalid Client<br>";
                $fail=true;
            }

            if ($fail != true) {

                $sql="INSERT INTO `booking` (eventId, clientId) VALUES(:eventId,:clientId)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":eventId",$event);
                $stmt->bindParam(":clientId",$client);

                if ($stmt->execute()) {
                    $success=true;
                    $successmsg="Successfully Created New Booking!";
                } else {
                    $errormsg="Failed to Create New Booking!";
                }
            }
        }
    }
?>
     <div class="frame">
        <div class="main">
           <?php include "navbar.php";?>
        </div>
        <div class="section">
            <h2 style="text-align:left;">Book Event</h2><br/>
			<p>Please fill this form and submit to book event.</p>
                    <b><p class="text-danger">Bookings cannot be cancelled</p></b><br /> 
            <form action="" method="post">
		      <table class='table table-responsive table noborder'>		       		                           
                        <?php
                            
                            // Check if Error messages exist to print
                            if (isset($errormsg) && $errormsg != '') {
                                echo '<div class="alert alert-danger" type="alert">'.$errormsg.'</div>';
                            }

                            if (isset($success) && isset($successmsg) && $successmsg != '') {
                                echo '<div class="alert alert-success" type="alert">'.$successmsg.'</div>';
                            }
                            
                            $exists=false;

                            $sql = "SELECT * FROM `event` WHERE id";                            
                            $allevents = $pdo->query($sql);

                            $sql = "SELECT * FROM `client` ORDER BY name ASC";
                            $allclients = $pdo->query($sql);

                            if (isset($_GET)) {
                                if (isset($_GET['id'])) {
                                    $sql="SELECT * FROM `event` WHERE id = :id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindParam(":id", $_GET['id']);

                                    if ($stmt->execute()) {
                                        if ($stmt->rowCount() == 1) {
                                            $exists=true;
                                            $chosenevent = $stmt->fetch(PDO::FETCH_ASSOC);
                                        }
                                    }
                                }
                            }

                            if ($exists) {
                                
                                    echo '<label>Event</label>';
                                    echo '<select name="event" id="event" class="form-control">';
                                        if (!isset($chosenevent)) {
                                            echo '<option value="" selected></option>';
                                        }
                                        while ($row = $allevents->fetch()) {
                                            if ($row['id'] == $chosenevent['id']) {
                                                echo '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
                                            } else {
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        }
                                    echo '</select>';
                                

                                
                                    echo '<br><label>Client</label>';
                                    echo '<select name="client" id="client" class="form-control">';
                                        echo '<option value="" selected></option>';
                                        while ($row = $allclients->fetch()) {
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                    echo '</select>';
                                

                                
                                    echo '<br><br><input type="submit" class="btn btn-success" value="Save Booking"/>';
                                
                            } else {

                                
                                    echo '<label>Event</label>';
                                    echo '<select name="event" id="event" class="form-control">';
                                        while ($row = $allevents->fetch()) {
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                    echo '</select>';
                                

                               
                                    echo '<br><label>Client</label>';
                                    echo '<select name="client" id="client" class="form-control">';
                                        while ($row = $allclients->fetch()) {
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                    echo '</select>';
                               

                               
                                    echo '<br><br><input type="submit" class="btn btn-success" value="Save Booking"/>';
                              
                            }
                        ?>		        
		      </table>
		    </form>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>