<?php  
require('conn.php');

$id=$_REQUEST['checkout'];

echo $id;

$result = mysqli_query($con, "SELECT * FROM cart WHERE Buyer = '$id' ");
        while($row = mysqli_fetch_array($result))
        {   
            $book_name = $row['Book_Name'];
            $price = $row['Price'];
            $quantity =  $row['Quantity'];
            $date = date('Y/m/d H:i:s');

            echo $price."   ".$quantity;
            mysqli_query($con, "INSERT into sales(Transaction_ID, Book_Name, Price, Quantity, Date_Time) VALUES (null,'$book_name','$price','$quantity','$date')");
        }


echo mysqli_affected_rows($con). " record has been added!";

//Delete the products from cart from specific user since it is already ben checkout
$query = "DELETE FROM cart WHERE Buyer='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: index.php"); 

?>