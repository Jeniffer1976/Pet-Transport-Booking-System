<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/account.css">
</head>

<body>

    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!--  -->

    <!--Account Overview Section-->
    <div class="container-fluid">
        <br>
        <h1 class="header1">ACCOUNT OVERVIEW</h1>
        <h3 class="header2">PROFILE INFORMATION</h3>

        <div class="container-fluid account">
            <div class="row">
                <div class="col col-4 sidebar">
                    <a class="active nav-link nav-text" href="#home"><i class="fa-solid fa-house"></i>Account Overview</a>
                    <a class="nav-link nav-text" href="editAccount.php"><i class="fa-solid fa-pen"></i>Edit Account</a>
                    <a class="nav-link nav-text" href="membershipStatus.php"><i class="fa-solid fa-crown"></i>Membership</a>
                    <a class="nav-link nav-text" href="invoiceHist.php"><i class="fa-solid fa-clock"></i>Invoice History</a>
                </div>

                <div class="col col-8">
                    <div class="row row1">
                        <div class="col-3">
                            <img src="images/person.svg" id="profilePic">
                        </div>

                        <div class="col">
                            <h3 class="header3">JOHN LEUWIS</h3>
                            <span class="para">aka @john_leuwis12</span>
                        </div>
                    </div>

                    <div class="row row2">
                        <div class="col-5">
                            <span class="para">Username:</span>
                        </div>

                        <div class="col">
                            <span class="para">john_leuwis12</span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">First Name:</span>
                        </div>

                        <div class="col">
                            <span class="para">John</span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Last Name:</span>
                        </div>

                        <div class="col">
                            <span class="para">Leuwis</span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Email:</span>
                        </div>

                        <div class="col">
                            <span class="para">johnleuwis12@email.com</span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Password:</span>
                        </div>

                        <div class="col">
                            <span class="para">********</span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Mobile No.:</span>
                        </div>

                        <div class="col">
                            <span class="para">+65 1234 5678</span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <button type="submit" class="btn btn-primary primarybtn rounded-pill">Edit Profile</button>
                </div>
            </div>
        </div>  
    </div>
    <!-- -->

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