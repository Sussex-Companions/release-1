<?php    
    // Include config file
    require_once "db.php";
	require_once "page_header.html";
?>
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Schedule</h2>
                        
                    </div>

                    <?php
                    $sql = "SELECT * FROM `event` ORDER BY id DESC";
                    $result = $pdo->query($sql);

                    if($result) {
                        if($result->rowCount() > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
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
                                        
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>£" . $row['fees'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='book-event.php?id=". $row['id'] ."' title='Book Event' data-toggle='tooltip'><span class='glyphicon glyphicon-book'></span></a>";
                                            
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
                    unset($pdo);
                    ?>
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