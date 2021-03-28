
<?php
include "config.php";

$sql="INSERT INTO staff (name, role, email, contactNo, address, username, password) 
VALUES ('$_POST[name]', '$_POST[role]', '$_POST[email]', '$_POST[contactNo]', '$_POST[address]', '$_POST[username]', '$_POST[password]')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
   header("location: Employee.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 



