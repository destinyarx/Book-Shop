<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookify Sign-Up Form</title>

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <figure class="logo"><img src="../GeneralImages/logo.png" alt="logo"></figure>
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="User Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>

                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="address" id="address" placeholder="Address"/>
                            </div>

                            <div class="form-group">
                                <label for="contactNo"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="contact" id="contact" placeholder="Contact Number"/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.png" alt="sing up image"></figure>
                        <a href="Sign-in.html" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php

  require('conn.php');


  if(isset($_POST['signup'])){

    /* Assigning the value of the textfields to its respective variables */
    $username = $_POST['username'];
    //$name     = $_POST['name'];
    $address  = $_POST['address'];
    $contact  = $_POST['contact'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];


    $var = mysqli_query($con, "SELECT * from user");
    while($row = mysqli_fetch_array($var)) {
        
        $user = $row['Username'];
        
        if($user == $username){
            $same_pass = 1;
            echo "User already exist!";
            
        } else{

            if($password == $re_pass){
                $same_pass = 1;
                /* Inserting a record in the database */
                mysqli_query($con, "INSERT into user(user_ID, Username, Name, Address, Contact, Email, Password) VALUES (null,'$username', 'unknown','$address','$contact','$email', '$password')");
                echo mysqli_affected_rows($con)." Record has been added. <br>"; /* to check if the record is added to the database */
                echo "Login Successful!";
                header("Location: Sign-in.php");
                exit();

            }else{
                $same_pass = 0;
            }

            
        }

    }

    if($same_pass == 0){
        echo "Password is not the same";
    }
    
    }

?>

