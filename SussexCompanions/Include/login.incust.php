<?php

  session_start();

      $mysqli = new mysqli('localhost', 'root', '', 'sc_club') or die(mysqli_error($mysqli));

 if(isset($_POST['user-login']))
  {
    
      $username = $_POST['u_name'];
      $password = $_POST['pswd'];

      $result = $mysqli -> query("SELECT * FROM client WHERE username='$username' AND password='$password'") or die($mysqli->error());

   if($result->num_rows == 0)
    {
      $_SESSION['message'] = "User does not exist";
      $_SESSION['msg_type'] = "NotExisst";
       header('location: ..\custlogin.php');
    }

    else
    {
      $row = $result -> fetch_assoc();

      if($_POST['pswd'] == $row['password'])
       {

          $_SESSION['username'] = $row['username'];
          $_SESSION['message'] = "You have logged in";
          $_SESSION['msg_type'] = "Success";
            
            header('location: ..\home.php');

       }
		
	   else
       {
          $_SESSION['message'] = "You have enterd wrong password, try again";
          $_SESSION['msg_type'] = "Failure";

            header('location: ..\adminlogin.php');
       }
    }
  }


?>


