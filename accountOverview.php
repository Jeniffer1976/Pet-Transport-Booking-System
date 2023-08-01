<?php
include "loginFunctions.php";

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $mobile = $_SESSION['mobile'];
    $password = $_SESSION['password'];
    $role = $_SESSION['role'];

    if ($role == 'admin') {
        $birthdate = $_SESSION['birthDate'];
        $gender = $_SESSION['gender'];

        if($gender == 'F'){
            $gender = 'Female';
        } else {
            $gender = 'Male';
        }
    }

} else {
    header("Location: signIn.php");
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Overview | Waggin Wheels</title>

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
    <?php
    include("navbar.php");
    ?>
    <!--  -->

    <!--Account Overview Section-->
    <div class="container-fluid">
        <br>
        <?php if ($_SESSION['role'] != 'customer') { ?>
            <a href="admin.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Dashboard</a>
        <?php } ?>
        <h1 class="header1">ACCOUNT OVERVIEW</h1>
        <h3 class="header2">PROFILE INFORMATION</h3>

        <div class="container account">
            <div class="row">
                <div class="col col-4 sidebar" style="height: 50em;">
                    <a class="active nav-link nav-text" href="accountOverview.php"><i
                            class="fa-solid fa-house"></i>Account Overview</a>
                    <a class="nav-link nav-text" href="editAccount.php"><i class="fa-solid fa-pen"></i>Edit Account</a>
                    <?php if ($_SESSION['role'] == 'customer') { ?>
                        <a class="nav-link nav-text" href="invoiceHist.php"><i class="fa-solid fa-clock"></i>Invoice
                            History</a>
                    <?php } ?>
                </div>

                <div class="col col-8" style="height: 50em;">
                    <div class="row row1">
                        <div class="col-3">
                            <?php if (isset($_SESSION['profile'])) {
                                $profile = $_SESSION['profile']
                                    ?>
                                <img src="data:image/png;base64,<?php echo base64_encode($profile)?>" height="80" width="80"
                                    style="object-fit: cover; border-radius: 50%;">
                            <?php } else { ?>
                                <img src="images/person.svg" height="80" width="80">
                            <?php } ?>
                        </div>

                        <div class="col">
                            <h3 class="header3">
                                <?php echo strtoupper($firstName) . " " . strtoupper($lastName) ?>
                            </h3>
                            <span class="para">aka @
                                <?php echo $username ?>
                            </span>
                        </div>
                    </div>

                    <div class="row row2">
                        <div class="col-5">
                            <span class="para">Username:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php echo $username ?>
                            </span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">First Name:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php echo ucfirst($firstName) ?>
                            </span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Last Name:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php echo ucfirst($lastName) ?>
                            </span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Email:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php echo $email ?>
                            </span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Password:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php
                                $count = strlen($password);
                                echo str_repeat("*", $count);
                                ?>
                            </span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5">
                            <span class="para">Mobile No.:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php
                                $mobile = strval($mobile);

                                $arrMobile = str_split($mobile, 4);

                                echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                ?>
                            </span>
                        </div>
                    </div>
                    <?php if ($_SESSION['role'] != 'customer') { ?>

                        <hr class="rounded">

                        <div class="row">
                            <div class="col-5">
                                <span class="para">Gender: </span>
                            </div>

                            <div class="col">
                                <span class="para">
                                    <?php echo $gender ?>
                                </span>
                            </div>
                        </div>

                        <hr class="rounded">

                        <div class="row">
                            <div class="col-5">
                                <span class="para">Birthdate: </span>
                            </div>

                            <div class="col">
                                <span class="para">
                                    <?php echo $birthdate ?>
                                </span>
                            </div>
                        </div>

                    <?php } ?>

                    <hr class="rounded">

                    <button type="submit" class="btn btn-primary primarybtn rounded-pill"
                        onclick="document.location='editAccount.php'">Edit Profile</button>
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