<?php 
include "config.php";
?>

<?php
$delete=$_GET['delete'];
if(empty($delete)){
echo "you don't select any record";

}else{
$query="delete from staff where id=".$delete."";
$result=mysqli_query($mysqli,$query);
header("location:Employee.php?msg= succesfully deleted one record !!");
exit();
mysqli_close($mysqli);
}
?>

