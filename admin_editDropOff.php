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
                    <a class="nav-link nav-text" href="admin_editOverview.php?quote_id=<?php echo $quote_id ?>"><i class="fa-solid fa-user"></i>Owner
                        Information</a>
                    <a class="nav-link nav-text" href="admin_editPickUp.php?quote_id=<?php echo $quote_id ?>"><i class="fa-solid fa-house"></i>Pick
                        Up Information</a>
                    <a class="active nav-link nav-text" href="admin_editDropOff.php?quote_id<?php echo $quote_id ?>"><i
                            class="fa-solid fa-location-dot"></i>Drop Off Information</a>
                    <a class="nav-link nav-text" href="admin_editPetInfo.php?quote_id=<?php echo $quote_id ?>"><i class="fa-solid fa-dog"></i>Pet's
                        Information</a>
                </div>

                <div class="col col-8" style="height: 38em;">

                    <div class="container-fluid d-flex justify-content-center">
                        <form class="row g-3 gx-5" method="post" action="">
                            <div class="col-12">
                                <label for="dropOffAddress" class="form-label para">Address:</label>
                                <input type="text" class="form-control rounded-pill" name="dropOffAddress"
                                    placeholder="<?php echo $dropOff_address ?>" value='<?php echo $dropOff_address ?>'>
                            </div>

                            <hr class="rounded">
                            <span class='para'>Recipient's Information</span>
                            <hr class="rounded">

                            <div class="col-md-6">
                                <label for="s_fname" class="form-label para">First Name:</label>
                                <input type="text" class="form-control rounded-pill" name="s_fname"
                                    placeholder="<?php echo ucfirst($r_firstName) ?>"
                                    value="<?php echo ucfirst($r_firstName) ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="s_lname" class="form-label para">Last Name:</label>
                                <input type="text" class="form-control rounded-pill" name="s_lname"
                                    placeholder="<?php echo ucfirst($r_lastName) ?>"
                                    value="<?php echo ucfirst($r_lastName) ?>">
                            </div>

                            <div class="col-12">
                                <label for="s_email" class="form-label para">Email:</label>
                                <input type="email" class="form-control rounded-pill" name="s_email"
                                    placeholder="<?php echo $r_email ?>" value="<?php echo $r_email ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label para">Mobile Number:</label>
                                <input type="tel" class="form-control rounded-pill" name="phone" pattern="[0-9]{8}"
                                    placeholder="<?php
                                    $mobile = strval($r_contact);
                                    $arrMobile = str_split($mobile, 4);
                                    echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                    ?>" value='<?php
                                    $mobile = strval($r_contact);
                                    $arrMobile = str_split($mobile, 4);
                                    echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                    ?>'>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="reset"
                                        class="btn btn-outline-danger btn-light primarybtn rounded-pill"
                                        style="margin-top: 15%">Cancel</button>
                                </div>

                                <div class="col" style="">
                                    <button type="submit" class="btn btn-primary primarybtn rounded-pill"
                                        style="float: right; margin-top: 15%">Save Profile</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php if (isset($message)) { ?>
                        <?php if ($isSuccessful == true) { ?>
                            <div class="alert alert-success errorMsg" role="alert">
                                <?php echo $message ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger errorMsg" role="alert">
                                <?php echo $message ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
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