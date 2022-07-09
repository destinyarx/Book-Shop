<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookify Admin Sign-In Form</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <figure class="logo2"><img src="../GeneralImages/logo.png" alt="logo"></figure>
                        <h2 class="form-title">Admin Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="your_name" placeholder="Admin Username"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


<?php
  require('conn.php');
  session_start();
  if(isset($_POST['signin'])){

    /* Assigning the value of the textfields to its respective variables */
    $name     = $_POST['name'];
    $password = $_POST['password'];

    /* Search a record in the database */


   $var = mysqli_query($con, "SELECT * from admin");
    while($row = mysqli_fetch_array($var)) {
        
        $pass = $row['Password'];
        $username = $row['Username'];
        
        if($pass == $password&&$username == $name){
            $error = 0;
            echo "Login Successful!";
            header("Location: ../AdminView/index.php ");
            $_SESSION['Adminname'] = $name;
            exit();
        } else{ 
            $error = 1; 
        }

    }

        if($error == 1 ) {

            ?>
            <script type="text/javascript">
                alert("Wrong Credentials!");
            </script> 
             <?php

        }
    
}
?>