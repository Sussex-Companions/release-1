<?php
session_start();
if(!isset($_SESSION["username"])) {
	header("Location: /SussexCompanions/Staff");
    exit();
}

//DB Connection
$servername = "localhost";
$username = "root";
$password = "Bals@123";
$dbname = "sc_club";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("failed: " . $conn->conn_error);
}

$result = mysqli_query($conn, "SELECT * FROM client");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//echo $row["email"];
		//echo "</br>";
		
		$clientId = $row["id"];
		$sql = "SELECT type FROM client WHERE id= '$clientId'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$type = $r['type'];	
		//echo $type;
		//echo "</br>";
		
		if($type=='Local') {
			$amount = 40;
		} else {
			$amount = 5;
		}
		//echo $amount;
		//echo "</br>";
		
		$sql = "SELECT membershipDue FROM client WHERE id= '$clientId'";
		$res = mysqli_query($conn, $sql);
		$r = mysqli_fetch_array($res);
		$due = $r['membershipDue'];
		//echo $due;
		//echo "</br>";
		
		$membershipDue = $due+$amount;
		//echo $membershipDue;
		$sql = "UPDATE client SET membershipDue='$membershipDue' WHERE id='$clientId'";
		$res = mysqli_query($conn, $sql);	
		echo "Monthly membership fee service successfully run for the client ".$clientId;
		echo "</br>";
		echo "</br>";
	}
} else {
    echo '0 results';
}

$conn->close();