<?php
session_start();
if(!isset($_SESSION["uname"])) {
	header("Location: /SussexCompanions");
    exit();
}

header( "refresh:8;url=include/logout.incust.php" );

date_default_timezone_set('Asia/Colombo');
$referenceNumber = substr(md5(uniqid(rand(), true)), 16, 16);

echo'
<html>
<head>
  <title>Thanks for your payment!</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <section>
    <p>
      Thank you for your payment. </br> Your payment reference number is '.$referenceNumber.'
    </p>
  </section>
</body>
</html>';

//DB Connection
$servername="localhost";
$username="root";
$password="Bals@123";
$dbname="sc_club";

$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die ("failed: ".$conn->conn_error);
}

$clientId = $_COOKIE["cid"];

$result = mysqli_query($conn, "SELECT * FROM client WHERE id='$clientId'");
$row = mysqli_fetch_array($result);
$membershipFee = $row['membershipDue'];
$eventFee = $row['eventDue'];

$date = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "INSERT INTO `payment_history`(`clientId`,`membershipFee`,`eventFee`,`paidOn`,`referenceNumber`) VALUES ('$clientId','$membershipFee','$eventFee','$date','$referenceNumber')");

$result = mysqli_query($conn, "UPDATE client SET membershipDue='0' WHERE id='$clientId'");
$result = mysqli_query($conn, "UPDATE client SET eventDue='0' WHERE id='$clientId'");

$today = date("Y-n-j"); 
$result = mysqli_query($conn, "UPDATE client SET lastPayment='$today' WHERE id='$clientId'");

$result = mysqli_query($conn, "SELECT email FROM client WHERE id='$clientId'");
$row = mysqli_fetch_assoc($result);
$cEmail = $row['email'];

$result = mysqli_query($conn, "SELECT name FROM client WHERE id='$clientId'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];

require 'vendor/autoload.php';
use SendGrid\Mail\Mail;

$email = new Mail();
$email->setFrom("payment@sussex-companions.com", "Payment - Sussex Companions");
$email->setSubject("Thank you for your payment");
$email->addTo($cEmail, $name);
$email->addContent("text/html", "Your payment reference number is ".$referenceNumber);

$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}

?>