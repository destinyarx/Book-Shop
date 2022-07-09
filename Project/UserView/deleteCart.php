<?php
require('conn.php');

$id=$_REQUEST['id'];
echo $id;
$query = "DELETE FROM cart WHERE Book_Name='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
echo mysqli_affected_rows($con). " record has been added!";

header("Location: index.php"); 
?>