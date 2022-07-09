<?php
require('conn.php');

$id=$_REQUEST['id'];

$query = "DELETE FROM user WHERE User_ID=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: user.php"); 
?>