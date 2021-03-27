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

$result = mysqli_query($conn, "SELECT * FROM booking WHERE serviceRun='No'");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//echo $row["eventId"];
		//echo "</br>";
		
		$eventId = $row["eventId"];
		$sql = "SELECT fees FROM event WHERE id= '$eventId'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$fees = $r['fees'];
		//echo $fees;
		//echo "</br>";
		
		$clientId = $row["clientId"];
		$sql = "SELECT eventDue FROM client WHERE id= '$clientId'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$due = $r['eventDue'];
		//echo $due;
		//echo "</br>";
		
		$eventDue = $due+$fees;
		//echo $eventDue;
		//echo "</br>";
		$sql = "UPDATE client SET eventDue='$eventDue' WHERE id='$clientId'";
		$res = mysqli_query($conn, $sql);

		$id = $row["id"];
		$sql = "UPDATE booking SET serviceRun='Yes' WHERE id='$id'";
		$res = mysqli_query($conn, $sql);
		echo "Event fee service successfully run for record ".$row['id'];
		echo "</br>";
		echo "</br>";
	}
} else {
    echo '0 results';
}

$conn->close();