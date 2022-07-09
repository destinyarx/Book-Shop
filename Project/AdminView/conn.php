<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

/* Establishing the connection to the database using mysqli_connect(hostname, user, password, database name);*/
$conn = new mysqli($servername, $username, $password, $dbname);

if ($con = mysqli_connect('localhost', 'root', '', 'shop')) {
}
else {
    die("Could not connect because". mysqli_connect_error());
}

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
