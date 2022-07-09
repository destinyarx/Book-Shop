<?php

require('conn.php');

$id=$_REQUEST['id'];
echo "ETOOOOOO ".$id;
$total = 0;

$comment = "Wala lang tong comment na to ";


 // Palitan ang Book_Name ng user;
$sql1 = "SELECT Book_Name, Price, Quantity FROM cart WHERE Book_Name = '$id' ";
$result = mysqli_query($con, $sql1);

        while($row = mysqli_fetch_array($result)){
            $book_name = $row['Book_Name'];
            $price = $row['Price'];
            $quantity = $row['Quantity'];

            echo "ETOOOOO :   Book Name: ".$book_name ."      Price: ".$price."<input type'number' name=name value = '1'> "."<br>";
            $total = $total + $row['Price'];
        

        }


        mysqli_query($con, "INSERT into cart(Cart_ID, Book_Name, Price, Quantity) VALUES (null,  '$book_name','$price', '$quantity')");
        echo mysqli_affected_rows($con);


			

    echo "Total Price: ".$total;
    $total = 0;

// DITO YUNG Checkout


    echo "<form method=post>";
    echo "<input type = submit name=checkout value=Checkout> </form>";


    if(isset($_POST['checkout'])){


        // Palitan ang Book_Name ng user;
        $result = mysqli_query($con, "SELECT * FROM cart  WHERE Buyer = '$user' ");

        while($row = mysqli_fetch_array($result)){
            
            $book_name = $row['Book_Name'];
            $price = $row['Price'];
            $quantity = $row['Quantity'];
            $date = date("Y/m/d");
            
            echo $date."<br>";

            $sql_sales = "INSERT INTO sales(Transaction_ID,Book_Name,Price,Quantity,Date) VALUES(null,'$book_name','$price','$quantity','$date')"; 
            mysqli_query($con,$sql_sales);
            echo mysqli_affected_rows($con);

        }
    
    }

    
    
        
 //header("Location: index.php");

?>