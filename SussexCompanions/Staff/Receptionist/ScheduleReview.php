<?php
session_start();
if(!isset($_SESSION["username"])) {
	header("Location: /SussexCompanions/Staff");
    exit();
}

date_default_timezone_set('Asia/Colombo');

//DB Connection
$servername = "localhost";
$username = "root";
$password = "Bals@123";
$dbname = "sc_club";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("failed: " . $conn->conn_error);
}

require 'C:\Apache24\htdocs\SussexCompanions\vendor\autoload.php';
use SendGrid\Mail\Mail;

$result = mysqli_query($conn, "SELECT * FROM client WHERE `lastReview` + INTERVAL 90 DAY < NOW()");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		
		$clientId = $row['id'];
		$sql = "SELECT COUNT(*) as count FROM matching WHERE overall='unsuccessful' and clientId_1='$clientId' or clientId_2='$clientId'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$count = $r['count'];
		
		if($count>5){
			$sql = "SELECT email FROM client WHERE id= '$clientId'";
			$res = mysqli_query($conn, $sql);
			$r = mysqli_fetch_array($res);
			$cEmail = $r['email'];
		} else {
			echo "No records found for the criteria";
			return;
		}
		
		$sql = "SELECT name FROM client WHERE id= '$clientId'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$name = $r['name'];
		
		$reviewDate  = date("Y-n-j", mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
		
		$email = new Mail();
		$email->setFrom("receptionist@sussex-companions.com", "Receptionist - Sussex Companions");
		$email->setSubject("You have a review meeting on ".$reviewDate);
		$email->addTo($cEmail, $name);
		$email->addContent("text/html", "Based on your past matching history, we have scheduled a meeting for you on $reviewDate. Kindly participate to increase your future matching chance.");

		try {
			$response = $sendgrid->send($email);
		} catch (Exception $e) {
			echo 'Caught exception: '.  $e->getMessage(). "\n";
		}
		
		$sql = "UPDATE client SET lastReview='$reviewDate' WHERE id='$clientId'";
		$res = mysqli_query($conn, $sql);	
		
		echo "Scheduled review mail successfully sent to ".$cEmail;
		echo "</br>";
		echo "</br>";
	}
} else {
    echo '0 results';
}

$conn->close();