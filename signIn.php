<?php
include "loginFunctions.php";

if (isset($_POST['login'])) {
    $response = login($_POST['username'], $_POST['password']);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Waggin Wheels</title>

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
    <link rel="stylesheet" href="stylesheets/signIn.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->


    <!-- Sign In form -->
    <br>
    <div class="container">
        <h1 class="header1">SIGN IN</h1>
        <div align="center">
            <div class="bgCircle">
                <div class="form-content" style="height:fit-content">
                    <form action="" method="post">
                        <label for="username" class="form-label para">Username:</label>
                        <input type="text" class="form-control rounded-pill" id="username" name="username" required>
                        <br>
                        <label for="password" class="form-label para">Password:</label>
                        <input type="password" class="form-control rounded-pill" id="password" name="password" required>

                        <br>
                        <div align="center">
                            <input type="submit" class="btn btn-primary rounded-pill primaryBtn" value="Sign In"
                                name="login">
                        </div>
                    </form>
                    <a href="signUp.php">Sign up for a new account</a><br><br>
                    <?php if (@$response == true) { ?>
                        <div class="alert alert-danger errorMsg" role="alert">
                            <?php echo @$response ?>
                        </div>
                    <?php } ?>
                    <!-- <p id=errorMsg></p> -->
                    <!-- <p id=errorMsg>That's not the right password. <br>Please try again</p> -->
                </div>
            </div>
        </div>
    </div>


    <!--  -->


    <!-- Footer -->
    <?php include("footer.php") ?>
    <!--  -->


    <!-- Background -->
    <div class="bgclass">
        <div class="gradient"></div>
    </div>
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
</body>

</html>