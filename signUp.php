<?php
session_start();
include("dbFunctions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then
{   
    //something was posted
    $email = $_POST['email'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];

        //save to database
        $insertUsers = "INSERT INTO users
          (username, password) 
          VALUES 
          ('$username', '$password')";

        $checkUsername = "SELECT DISTINCT username
        FROM users
        WHERE username = '$username'"; 

        $checkUsernameStatus = mysqli_query($link, $checkUsername);

        if (mysqli_num_rows($checkUsernameStatus)) {
            $row = mysqli_fetch_array($checkUsernameStatus);
            $checkUsername = $row['username'];
        
            echo "The username " . $checkUsername . " already exists";
        
        } else {
            $insertUsersStatus = mysqli_query($link, $insertUsers);
            
            $insertPetOwners = "INSERT INTO pet_owner
            (first_name, last_name, email, mobile, username) 
            VALUES 
            ('$firstName','$lastName','$email',
            '$phone', '$username')";
            
            $insertPetOwnersStatus = mysqli_query($link, $insertPetOwners);

            if ($insertUsersStatus && $insertPetOwnersStatus) {
                echo "Your new account has been successfully created";
                
                header("Location: signIn.php"); //makes it go to signIn page directly.

            } else {
                echo "Account creation failed";
            }
        }
    }

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="/images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/signUp.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->


    <!-- Sign Up Form -->
    <div class="container-fluid" id="signUpSection">
        <h1 class="header1">SIGN UP FOR AN ACCOUNT</h1>
        <h3 class="header2">USER'S INFORMATION</h3>

        <section class="inverse full-bleed overflow-hidden" id="signUpForm">
            <div class="container-fluid d-flex justify-content-center">            
                <form class="row g-3 gx-5" method="post" action="">
                    <div class="col-12">
                    <label for="username" class="form-label para">Username:</label>
                    <input type="username" class="form-control rounded-pill" name="username" placeholder="Johnny2314" required>
                    </div>
                    <div class="col-md-6">
                    <label for="firstName" class="form-label para">First Name:</label>
                    <input type="text" class="form-control rounded-pill" name="firstName" placeholder="Johnny" required>
                    </div>
                    <div class="col-md-6">
                    <label for="lastName" class="form-label para">Last Name:</label>
                    <input type="text" class="form-control rounded-pill" name="lastName" placeholder="Leuwis" required>
                    </div>
                    <div class="col-12">
                    <label for="email" class="form-label para">Email:</label>
                    <input type="email" class="form-control rounded-pill" name="email" placeholder="test@email.com" required>
                    </div>
                    <div class="col-md-6">
                    <label for="password" class="form-label para">Password:</label>
                    <input type="password" class="form-control rounded-pill" name="password" required>
                    </div>
                    <div class="col-6">
                        <label for="phone" class="form-label para">Mobile Number:</label>
                        <input type="tel" class="form-control rounded-pill" name="phone" pattern="[0-9]{8}"
                        required placeholder="12345678">
                    </div>
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary primarybtn rounded-pill">Sign Up</button>
                    </div>
                </form>
            </div>


        </section>
    </div>

    <!--  -->


    <!-- Footer -->

    <!--  -->

    <!-- Background --> 
    <div class="bgclass"> 
        <div class="gradient"></div> 
    </div> 
    <!--  -->

</body>

</html>