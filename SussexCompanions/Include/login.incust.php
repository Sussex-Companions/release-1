<?php
	require('config.php');
    session_start();
	if(isset($_SESSION["uname"])) {
        header("Location: home.php");
        exit();
    }
	
	//echo $_SESSION['current_page'];
	
    if (isset($_POST['u_name'])) {
        $username = stripslashes($_REQUEST['u_name']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['pswd']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `client` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['uname'] = $username;
			if(isset($_SESSION['current_page'])){
				header("Location: ". $_SESSION['current_page']);
				exit();
			}
            header("Location: ..\home.php");
        } else {
            $_SESSION['message'] = "You have enterd wrong password, try again";
			$_SESSION['msg_type'] = "Failure";
			header("Location: ..\custlogin.php");
        }
    }

?>


