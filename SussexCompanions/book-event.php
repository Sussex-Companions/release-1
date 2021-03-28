 <?php
 session_start();
 $conn=new mysqli("localhost","root","Bals@123","sc_club");
 $blah=$_SESSION['uname'];

   $result=$conn->query("SELECT id FROM client WHERE username='$blah'")
			   or die($mysqli->error);			  		     
              
	     	while($data=$result->fetch_assoc()){
				$e=$data['id'];
                				
		    }
		
// Include config file
    require_once "db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
	<?php
    // If a Booking was made
    if (isset($_POST)) {
        if (isset($_POST['event'])) {
            $event = $_POST['event'];
            $client = $e;

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
?><?php include "page_header.html";?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
					
                        <h2>Book Event</h2>
                    </div>
                    <p>Please fill this form and submit to book event.</p>
                    <b><p class="text-danger">Bookings cannot be cancelled</p></b><br />
                    <form action="" method="post">           		       		                           
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
                                                                                                                                                                
                                    echo '<br><br><input type="submit" class="btn btn-success" value="Save Booking"/>';
                                
                            } else {

                                
                                    echo '<label>Event</label>';
                                    echo '<select name="event" id="event" class="form-control">';
                                        while ($row = $allevents->fetch()) {
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
											
                                        }
                                    echo '</select>';                                                                                                                                  
                               
                                   echo '<br><br><input type="submit" class="btn btn-success" value="Save Booking"/>';
                              
                            }?>
							<br><br><br><br><br><br>
               </form>
                </div>
            </div>        
        </div>
    </div>
		 <div class = "about">
   <div class = "us">About Us<br><br>
   <i class="fab fa-facebook"></i>
   <i class="fab fa-twitter-square"></i>
   <i class="fab fa-instagram"></i>
   <i class="fab fa-youtube"></i>
   
 <div style="float:right;">
     Sussex Companions Club<br>
     Brighton<br>
     England<br>
     United Kingdom<br>
     Contact No: +44 7911 132546
	 </div>
 </div>
</div>
 <div class = "footer">  	
<div class="copyright"> © 2021 Copyright: SussexCompanions.com<br><br></div>
  </div>
</body>
</html>