<?php
session_start();
if(!isset($_SESSION["username"])) {
	header("Location: /SussexCompanions/Staff");
    exit();
}

date_default_timezone_set('Asia/Colombo');
$bill = date("F - Y");
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

$result = mysqli_query($conn, "SELECT email FROM client");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//echo $row["email"];
		//echo "</br>";
		
		$cEmail = $row["email"];
		$sql = "SELECT membershipDue FROM client WHERE email= '$cEmail'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$membershipDue = $r['membershipDue'];	
		//echo $membershipDue;
		//echo "</br>";
		
		$sql = "SELECT eventDue FROM client WHERE email= '$cEmail'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$eventDue = $r['eventDue'];	
		//echo $eventDue;
		//echo "</br>";
		
		$totalDue = $membershipDue+$eventDue;
		
		$sql = "SELECT name FROM client WHERE email= '$cEmail'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$name = $r['name'];	
		//echo $name;
		//echo "</br>";
		//echo "</br>";

		$email = new Mail();
		$email->setFrom("finance@sussex-companions.com", "Finance - Sussex Companions");
		$email->setSubject("Monthly Bill : ".$bill);
		$email->addTo($cEmail, $name);
		$email->addContent("text/html", "Your membership fee is £$membershipDue <br> Your event fee is £$eventDue <br> Your total fee is £$totalDue <br> <a href='localhost/SussexCompanions/payment.php'>Click here to pay</a>");

		try {
			$response = $sendgrid->send($email);
		} catch (Exception $e) {
			echo 'Caught exception: '.  $e->getMessage(). "\n";
		}
		
		echo "Monthly bill successfully sent to ".$cEmail;
		echo "</br>";
		echo "</br>";
	}
} else {
    echo '0 results';
}

$conn->close();