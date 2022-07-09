<?php 
// Include the database configuration file  
require('conn.php');
echo "<br>";
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 

    $name =    $_POST['name'];
    $description =    $_POST['description'];
    $category =  $_POST['category'];
    $price =  $_POST['price'];
    $quantity = $_POST['quantity'];

   

     

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES['image']['tmp_name']; 
     
        echo "Eto :  ".$filename."<br>";
        $folder = "../image/".$filename;
        
        // Allow certain file formats 

        $picture  = strval($filename);

        mysqli_query($con, "INSERT into stock(Book_ID, Images, Book_Name, Description, Category, Price, Quantity) VALUES (null, '$filename', '$name','$description','$category','$price', '$quantity')");
        echo mysqli_affected_rows($con)." Record has been added. <br>"; 

             if (move_uploaded_file($tempname, $folder))  {
                echo "Image successfully move";
            } 
            
        }

        $result = mysqli_query($con, "SELECT * FROM stock");
        while($row = mysqli_fetch_array($result))
        {
            
            $print = "../image/".$row['Images'];
            
            ?>

            <img src="<?php echo $print; ?>" height  = 150 width = 200>
        
<?php
}

header("Location: product.php ");
?>

