<?php
if(!isset($_SESSION["uname"])) {
	header("Location: /SussexCompanions");
    exit();
}

error_reporting(0);
date_default_timezone_set('Asia/Colombo');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <style type="text/css">
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            padding: 0;
        }

        #checkout-button {
            height: 36px;
            background: #556cd6;
            color: white;
            font-size: 14px;
            border: 0;
            font-weight: 500;
            cursor: pointer;
            letter-spacing: 1px;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
        }

        #checkout-button:hover {
            opacity: 0.8;
        }
    </style>

	
<!-- checkout -->
    <script type="text/javascript">
        function checkout(amount) {
            var stripe = Stripe("pk_test_51HzKLqEMwQT53eCJUk1yruFeD0pXwOTAC3Z1owduEM4NNLIhxyx5XN2P86AuzHNL3o3HBw8Niq5HflULoA9md99N00PMxx6aAy");
            console.log(amount);
            fetch("create-checkout-session.php?amt="+amount, {
                method: "POST",
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (session) {
                    return stripe.redirectToCheckout({sessionId: session.id});
                })
                .then(function (result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function (error) {
                    console.error("Error:", error);
                });
        }
    </script>

</head>
<body>

</body>
</html>

<?php
//DB Connection
$servername = "localhost";
$username = "root";
$password = "Bals@123";
$dbname = "sc_club";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("failed: " . $conn->conn_error);
}

$username = $_SESSION["username"];
$result = mysqli_query($conn, "SELECT id FROM client WHERE username='$username'");
$row = mysqli_fetch_assoc($result);
$clientId = $row['id'];

echo'
<script>
document.cookie = "cid='.$clientId.'";
</script>';

$sql = "SELECT membershipDue FROM client WHERE id= '$clientId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$membershipDue = $row['membershipDue'];	
echo "Membership Fee due - £".$membershipDue;
echo "</br>";
		
$sql = "SELECT eventDue FROM client WHERE id= '$clientId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$eventDue = $row['eventDue'];	
echo "Event fee due - £".$eventDue;
echo "</br>";
		
$totalDue = ($membershipDue+$eventDue) * 100;
echo "Total due - £".($totalDue/100);
echo "</br>";
echo "</br>";

if($totalDue!=0){
	echo '
	<div>
		<button id="checkout-button" onclick="checkout(' . $totalDue . ')">Pay Due</button>
	</div>';
};

$conn->close();