<?php
include "loginFunctions.php";

if (isset($_SESSION['username'])) {
    if (!($role = "admin")) {
        header("Location: index.php");
        exit();
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
    <title> Quotes | Waggin Wheels</title>

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
    <link rel="stylesheet" href="stylesheets/responsive.css">
</head>

<body>

    <?php


    ?>

    <!-- Navbar -->
    <?php
    include("admin_editQuote.php");
    include("navbar.php");
    ?>
    <!--  -->


    <!-- Edit Quote -->
    <div class="container-fluid">
        <br>
        <a href="admin_quotes.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Quotes</a>
        <h1 class="header1">EDIT QUOTE</h1>

        <div class="container account">
            <div class="row">
                <!--Sidebar-->
                <div class="col col-4 sidebar" style="height: 38em;">
                    <a class="active nav-link nav-text" href="admin_editOverview.php?quote_id=<?php echo $quote_id ?>"><i class="fa-solid fa-user"></i>Owner
                        Information</a>
                    <a class="nav-link nav-text" href="admin_editPickUp.php?quote_id=<?php echo $quote_id ?>"><i
                            class="fa-solid fa-house"></i>Pick
                        Up Information</a>
                    <a class="nav-link nav-text" href="admin_editDropOff.php?quote_id=<?php echo $quote_id ?>"><i
                            class="fa-solid fa-location-dot"></i>Drop Off Information</a>
                    <a class="nav-link nav-text" href="admin_editPetInfo.php?quote_id=<?php echo $quote_id ?>"><i class="fa-solid fa-dog"></i>Pet's
                        Information</a>
                </div>

                <div class="col col-8" style="height: 38em;">
                    <div class="row row1">
                        <div class="col-3">
                            <?php if (isset($profile)) { ?>
                                <img src="images/profileImg/<?php echo $profile ?>" height="80" width="80"
                                    style="object-fit: cover; border-radius: 50%;">
                            <?php } else { ?>
                                <img src="images/person.svg" height="80" width="80">
                            <?php } ?>
                        </div>

                        <div class="col">
                            <h3 class="header3">
                                <?php echo strtoupper($po_fname) . " " . strtoupper($po_lname) ?>
                            </h3>
                            <span class="para">aka @
                                <?php echo $po_username ?>
                            </span>
                        </div>
                    </div>

                    <div class="row row2">
                        <div class="col-5">
                            <span class="para">Email:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php echo $po_email ?>
                            </span>
                        </div>
                    </div>

                    <hr class="rounded">

                    <div class="row row2">
                        <div class="col-5">
                            <span class="para">Contact No.:</span>
                        </div>

                        <div class="col">
                            <span class="para">
                                <?php
                                $mobile = strval($po_mobile);
                                $arrMobile = str_split($mobile, 4);
                                echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                ?>
                            </span>
                        </div>
                    </div>
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
    <script src="scripts/sidebarscript.js"></script>
</body>

</html>