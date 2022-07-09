<?php
require('conn.php');

//itutuloy

$id=$_REQUEST['id'];

//$query = "DELETE FROM stock WHERE Book_ID=$id"; 
//$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: product.php"); 
?>