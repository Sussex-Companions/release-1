<?php
include "config.php";
?>

<?php 

if (isset($_POST['submit'])){

echo $Title=$_POST['name'];
echo  $Author=$_POST['username'];
echo  $Role=$_POST['role'];
echo  $Email=$_POST['email'];
echo $PublisherName=$_POST['password'];
echo  $Num=$_POST['contactNo'];
echo  $Add=$_POST['address'];
$id=$_POST['id'];

echo $query="update staff set name ='$Title',username='$Author',role='$Role',email='$Email',password='$PublisherName', contactNo='$Num',address='$Add' where id=$id";
$rows=mysqli_query($mysqli,$query);
echo "succes full updated ".$rows;
mysqli_close($con);
header("location: Employee.php?msg=succes full update one record");
exit();
}

?>

