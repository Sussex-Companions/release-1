<?php include "header.php";  require_once "config2.php";?>
<html>
  <head>
   
	<!-- Latest compiled and minified Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css"/>
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style>
      .noborder td, .noborder th {
         border: none !important;
      }
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
            <h2 class="pull-left">Schedule</h2>
            <a href="create-event.php" class="btn btn-success pull-right">Add New Event</a>
                    
                    <?php
                    $sql = "SELECT * FROM `event` ORDER BY id DESC";
                    $result = $pdo->query($sql);

                    if($result) {
                        if($result->rowCount() > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Type</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Location</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Fee</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td> £" . $row['fees'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='book-event.php?id=". $row['id'] ."' title='Book Event' data-toggle='tooltip'><span style='color:#4169E1;' class='glyphicon glyphicon-book'></span></a>";
                                            //echo "<a href='update-event.php?id=". $row['id'] ."' title='Update Event' data-toggle='tooltip'><span style='color:#4169E1;' class='glyphicon glyphicon-pencil'></span></a>";
                                            //echo "<a href='delete-event.php?id=". $row['id'] ."' title='Delete Event' data-toggle='tooltip'><span style='color:#4169E1;' class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No events found to display in the Schedule.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);?>
        </div>
     </div>
  </body>
  <div class="footer"><?php require_once "footer.php";?></div>
</html>